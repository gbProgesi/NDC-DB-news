import pandas as pd
import os
import requests
from requests.auth import HTTPBasicAuth
import tkinter as tk
from tkinter import filedialog
from tqdm import tqdm  # Per la barra di avanzamento
import time  # Per calcolare il tempo totale

# =======================
# CONFIGURAZIONE
# =======================
WORDPRESS_URL = "http://localhost/wordpress/wp-json/wp/v2"
WORDPRESS_USER = "ndc_publisher"
WORDPRESS_PASS = "ndc12345"
CARTELLA_IMMAGINI = r"C:\Users\gbernardini\OneDrive - BV TECH S.p.A\ndc\NDC DB news"
MAX_NEWS_ID = 1903

auth = HTTPBasicAuth(WORDPRESS_USER, WORDPRESS_PASS)

# Pulisce il terminale e mostra il titolo
def pulisci_terminale_e_mostra_titolo():
    # Pulisce il terminale
    os.system('cls' if os.name == 'nt' else 'clear')
    
    # Stampa il titolo
    print("=" * 50)
    print("PROGRAMA PER CARICARE NEWS IN WORDPRESS".center(50))
    print("=" * 50)

pulisci_terminale_e_mostra_titolo()

# =======================
# OTTIENE O CREA CATEGORIA
# =======================
def ottieni_o_crea_categoria(nome_categoria):
    url = f"{WORDPRESS_URL}/categories?slug={nome_categoria}"
    risposta = requests.get(url, auth=auth)

    if risposta.status_code == 200:
        categorie = risposta.json()
        if categorie:
            return categorie[0]['id']

    # Se non esiste, creala
    risposta = requests.post(
        f"{WORDPRESS_URL}/categories",
        json={"name": nome_categoria, "slug": nome_categoria},
        auth=auth
    )
    if risposta.status_code == 201:
        return risposta.json()['id']
    else:
        print(f"⚠️ Errore creando categoria '{nome_categoria}': {risposta.content}")
        return None


# =======================
# SELEZIONA FILE EXCEL
# =======================
root = tk.Tk()
root.withdraw()
percorso_excel = filedialog.askopenfilename(title="Seleziona il file Excel", filetypes=[("Excel files", "*.xlsx *.xls")])
if not percorso_excel:
    print("Nessun file selezionato.")
    exit()

# =======================
# CARICA DATI
# =======================
df_news = pd.read_excel(percorso_excel, sheet_name='news')
df_images = pd.read_excel(percorso_excel, sheet_name='images')

# Filtro: solo news con ID <= 1903 e immagini tipo 'news'
df_news = df_news[df_news['news_id'] <= MAX_NEWS_ID]
df_images = df_images[df_images['type'] == 'news']

# =======================
# LOG
# =======================
log_successi = []
log_errori = []

# =======================
# FUNZIONI DI SUPPORTO
# =======================
def costruisci_contenuto_html(news_row, immagini):
    contenuto = ""

    # Aggiungi paragrafi (p1 - p11)
    for i in range(1, 12):
        testo = news_row.get(f'news_p{i}')
        if pd.notnull(testo):
            contenuto += f'<p class="eplus-wrapper">{testo}</p>\n'

    # Aggiungi immagini con didascalia
    for img in immagini:
        url = img['url']
        didascalia = img['caption']
        contenuto += f'<figure><img src="{url}" alt="{didascalia}" /><figcaption>{didascalia}</figcaption></figure>\n'

    # Firma
    firma = news_row.get('signature')
    if pd.notnull(firma):
        contenuto += f"<p><em>{firma}</em></p>"

    return contenuto

def ottieni_immagini(news_row):
    immagini = []
    for i in range(1, 22):  # Da news_image a news_image21
        colonna = f'news_image{i}' if i > 1 else 'news_image'
        img_id = news_row.get(colonna)

        if pd.notnull(img_id) and int(img_id) > 0:
            img_row = df_images[df_images['image_id'] == int(img_id)]
            if not img_row.empty:
                img_info = img_row.iloc[0]
                # Elimina eventuale slash iniziale e crea percorso assoluto
                image_subpath = img_info['image_name'].lstrip('/').replace('/', os.sep)
                percorso_locale = os.path.join(CARTELLA_IMMAGINI, image_subpath)

                didascalia = img_info['image_caption']
                immagini.append({
                    'local_path': percorso_locale,
                    'caption': didascalia
                })
    return immagini

def carica_immagine(percorso_locale):
    if not os.path.exists(percorso_locale):
        tqdm.write(f"❌ Immagine non trovata: {percorso_locale}")
        return None

    nome_file = os.path.basename(percorso_locale)
    headers = {
        'Content-Disposition': f'attachment; filename="{nome_file}"'
    }

    with open(percorso_locale, 'rb') as img_file:
        risposta = requests.post(
            f"{WORDPRESS_URL}/media",
            headers=headers,
            files={'file': img_file},
            auth=auth
        )

    if risposta.status_code == 201:
        media_data = risposta.json()
        return {
            'id': media_data['id'],
            'url': media_data['source_url']
        }
    else:
        tqdm.write(f"❌ Errore caricando l'immagine {nome_file}: {risposta.content}")
        return None

def pubblica_noticia(titolo, contenuto, data_pubblicazione, news_id, featured_image_id=None):

    ID_CATEGORIA_NEWS = ottieni_o_crea_categoria("news")

    dati = {
        "title": titolo,
        "content": contenuto,
        "status": "publish",
        "date": data_pubblicazione.strftime("%Y-%m-%dT%H:%M:%S"),
        "categories": [ID_CATEGORIA_NEWS]
    }

    if featured_image_id:
        dati["featured_media"] = featured_image_id

    risposta = requests.post(
        f"{WORDPRESS_URL}/posts",
        json=dati,
        auth=auth
    )

    if risposta.status_code == 201:
        log_successi.append({
            "news_id": news_id,
            "titolo": titolo,
            "data": data_pubblicazione,
            "utente": WORDPRESS_USER
        })
    else:
        errore = risposta.content.decode(errors='ignore')
        log_errori.append({
            "news_id": news_id,
            "titolo": titolo,
            "data": data_pubblicazione,
            "errore": errore,
            "utente": WORDPRESS_USER
        })

# =======================
# CICLO PRINCIPALE CON BARRA DI AVANZAMENTO
# =======================
start_time = time.time()  # Inizio del timer

# Lunghezza fissa per il titolo 
LUNGHEZZA_TITOLO = 80

# Inizializza la barra di avanzamento
with tqdm(
    total=len(df_news), 
    desc="Caricamento notizie", 
    unit="notizia", 
    dynamic_ncols=True, 
    bar_format="{desc} {bar}| {n_fmt}/{total_fmt} [{elapsed}<{remaining}, {rate_fmt}]"
    )  as pbar:

    for idx, riga in df_news.iterrows():
        titolo = riga['news_title']
        data_pubblicazione = riga['news_date']
        immagini_info = ottieni_immagini(riga)

        # Carica immagini e ottieni URL
        immagini_con_url = []
        id_immagine_principale = None

        for i, img in enumerate(immagini_info):
            risultato = carica_immagine(img['local_path'])
            if risultato:
                immagini_con_url.append({
                    'url': risultato['url'],
                    'caption': img['caption']
                })
                if i == 0:
                    id_immagine_principale = risultato['id']

        contenuto_html = costruisci_contenuto_html(riga, immagini_con_url)

        pubblica_noticia(titolo, contenuto_html, data_pubblicazione, riga['news_id'], id_immagine_principale)
        
        titolo_pulito = titolo.replace('\n', ' ').replace('\r', '')
        titolo_troncato = (titolo_pulito[:LUNGHEZZA_TITOLO] + "...") if len(titolo_pulito) > LUNGHEZZA_TITOLO else titolo_pulito.ljust(LUNGHEZZA_TITOLO)
        pbar.set_description(f"✅ Notizia publicata: {titolo_troncato}")

        # Aggiorna la barra di avanzamento
        pbar.update(1)

# Calcola il tempo totale impiegato
end_time = time.time()
tempo_totale = end_time - start_time

# =======================
# ESPORTA LOG IN EXCEL
# =======================
percorso_log = os.path.join(os.path.dirname(percorso_excel), "log_carga_noticias.xlsx")
with pd.ExcelWriter(percorso_log, engine="openpyxl") as writer:
    pd.DataFrame(log_successi).to_excel(writer, sheet_name="pubblicate", index=False)
    pd.DataFrame(log_errori).to_excel(writer, sheet_name="errori", index=False)

print(f"\n📄 Log salvato in: {percorso_log}")

# Mostra il tempo totale impiegato
print(f"\n⏱️ Tempo totale impiegato: {tempo_totale:.2f} secondi")
