import requests
from requests.auth import HTTPBasicAuth
import sys

# Configurazione (riutilizza le tue credenziali e URL)
WP_URL = "http://localhost/wordpress"
API_URL = WP_URL + "/wp-json/wp/v2"
USERNAME = "gianluca"
PASSWORD = "gianluca"

def verifica_ambiente_wordpress():
    print("\n🧪 Verifica ambiente WordPress prima della pubblicazione...\n")

    # 1. Verifica sito WordPress
    try:
        r = requests.get(WP_URL)
        if r.status_code != 200:
            print(f"❌ WordPress non risponde correttamente: {r.status_code}")
            sys.exit(1)
        print("✅ WordPress è raggiungibile.")
    except Exception as e:
        print(f"❌ Errore di connessione a WordPress: {e}")
        sys.exit(1)

    # 2. Verifica API REST
    try:
        r = requests.get(API_URL)
        if r.status_code == 200 and r.headers.get("Content-Type", "").startswith("application/json"):
            print("✅ API REST attiva.")
        else:
            print("❌ Problema con l’API REST. Possibili cause:")
            print("- mod_rewrite non attivo")
            print("- .htaccess mancante o errato")
            print("- Permalink non attivi in WordPress")
            print(f"Codice di risposta: {r.status_code}")
            sys.exit(1)
    except Exception as e:
        print(f"❌ Errore durante la verifica dell’API: {e}")
        sys.exit(1)

    # 3. Verifica autenticazione (opzionale ma utile)
    try:
        r = requests.get(API_URL + "/posts", auth=HTTPBasicAuth(USERNAME, PASSWORD))
        if r.status_code == 200:
            print("✅ Autenticazione riuscita.")
        elif r.status_code == 401:
            print("❌ Autenticazione fallita: controlla username e password.")
            sys.exit(1)
        else:
            print(f"❌ Errore autenticazione: codice {r.status_code}")
            sys.exit(1)
    except Exception as e:
        print(f"❌ Errore nella verifica dell’autenticazione: {e}")
        sys.exit(1)

    print("\n🚀 Tutto pronto per caricare le notizie!\n")

# === ESECUZIONE VERIFICA ===
verifica_ambiente_wordpress()
