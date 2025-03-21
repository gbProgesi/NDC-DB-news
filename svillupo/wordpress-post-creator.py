import requests
from bs4 import BeautifulSoup
from datetime import datetime
from typing import Optional, Dict, Any
import json
import base64

class WordPressPostCreator:
    def __init__(self, wordpress_url: str, username: str, application_password: str):
        """
        Inizializza il creatore di post WordPress.
        
        Args:
            wordpress_url: URL del sito WordPress (es: https://miosito.com)
            username: Nome utente WordPress
            application_password: Password applicazione generata da WordPress
        """
        self.wordpress_url = wordpress_url.rstrip('/')
        self.auth = base64.b64encode(f"{username}:{application_password}".encode()).decode()
        self.headers = {
            'Authorization': f'Basic {self.auth}',
            'Content-Type': 'application/json'
        }

    def extract_content_from_url(self, url: str) -> Dict[str, Any]:
        """
        Estrae il contenuto da un URL dato.
        
        Args:
            url: URL della pagina da cui estrarre il contenuto
            
        Returns:
            Dictionary con titolo, contenuto e immagine principale
        """
        try:
            response = requests.get(url)
            response.raise_for_status()
            soup = BeautifulSoup(response.text, 'html.parser')
            
            # Estrai il titolo
            title = soup.title.string if soup.title else ''
            
            # Estrai il contenuto principale (questo è un esempio base, potrebbe necessitare
            # di personalizzazione in base al sito target)
            main_content = soup.find('main') or soup.find('article') or soup.find('div', class_='content')
            if main_content:
                # Rimuovi elementi indesiderati
                for element in main_content.find_all(['script', 'style', 'nav', 'header', 'footer']):
                    element.decompose()
                content = main_content.get_text(separator='\n', strip=True)
            else:
                content = ''
            
            # Trova la prima immagine
            featured_image_url = None
            image = soup.find('meta', property='og:image') or soup.find('img')
            if image:
                featured_image_url = image.get('content') or image.get('src')
            
            return {
                'title': title,
                'content': content,
                'featured_image_url': featured_image_url
            }
            
        except Exception as e:
            raise Exception(f"Errore nell'estrazione del contenuto: {str(e)}")

    def upload_media(self, image_url: str) -> Optional[int]:
        """
        Carica un'immagine su WordPress e restituisce l'ID del media.
        
        Args:
            image_url: URL dell'immagine da caricare
            
        Returns:
            ID del media caricato o None in caso di errore
        """
        try:
            # Scarica l'immagine
            image_response = requests.get(image_url)
            image_response.raise_for_status()
            
            # Prepara l'upload
            filename = image_url.split('/')[-1]
            files = {
                'file': (filename, image_response.content)
            }
            
            # Carica su WordPress
            upload_url = f"{self.wordpress_url}/wp-json/wp/v2/media"
            response = requests.post(
                upload_url,
                headers={'Authorization': f'Basic {self.auth}'},
                files=files
            )
            response.raise_for_status()
            
            return response.json()['id']
            
        except Exception as e:
            print(f"Errore nel caricamento dell'immagine: {str(e)}")
            return None

    def create_post(self, title: str, content: str, featured_media_id: Optional[int] = None) -> Dict[str, Any]:
        """
        Crea un nuovo post su WordPress.
        
        Args:
            title: Titolo del post
            content: Contenuto del post
            featured_media_id: ID dell'immagine in evidenza (opzionale)
            
        Returns:
            Risposta JSON da WordPress con i dettagli del post creato
        """
        post_data = {
            'title': title,
            'content': content,
            'status': 'draft',  # Imposta come bozza per default
            'date': datetime.now().isoformat()
        }
        
        if featured_media_id:
            post_data['featured_media'] = featured_media_id
        
        try:
            response = requests.post(
                f"{self.wordpress_url}/wp-json/wp/v2/posts",
                headers=self.headers,
                data=json.dumps(post_data)
            )
            response.raise_for_status()
            return response.json()
            
        except Exception as e:
            raise Exception(f"Errore nella creazione del post: {str(e)}")

    def create_post_from_url(self, url: str, status: str = 'draft') -> Dict[str, Any]:
        """
        Crea un post WordPress completo a partire da un URL.
        
        Args:
            url: URL da cui estrarre il contenuto
            status: Stato del post ('draft' o 'publish')
            
        Returns:
            Dettagli del post creato
        """
        try:
            # Estrai il contenuto dall'URL
            content_data = self.extract_content_from_url(url)
            
            # Carica l'immagine in evidenza se presente
            featured_media_id = None
            if content_data['featured_image_url']:
                featured_media_id = self.upload_media(content_data['featured_image_url'])
            
            # Crea il post
            post_data = self.create_post(
                title=content_data['title'],
                content=content_data['content'],
                featured_media_id=featured_media_id
            )
            
            # Aggiorna lo stato se necessario
            if status == 'publish':
                update_response = requests.post(
                    f"{self.wordpress_url}/wp-json/wp/v2/posts/{post_data['id']}",
                    headers=self.headers,
                    data=json.dumps({'status': 'publish'})
                )
                update_response.raise_for_status()
                post_data = update_response.json()
            
            return post_data
            
        except Exception as e:
            raise Exception(f"Errore nella creazione del post dall'URL: {str(e)}")


# Esempio di utilizzo
if __name__ == "__main__":
    # Configurazione
    WORDPRESS_URL = "https://miosito.wordpress.com"
    USERNAME = "admin"
    APP_PASSWORD = "xxxx xxxx xxxx xxxx xxxx xxxx"
    
    # Inizializza il creatore di post
    post_creator = WordPressPostCreator(WORDPRESS_URL, USERNAME, APP_PASSWORD)
    
    # Crea un post da un URL
    try:
        url_to_post = "https://esempio.com/articolo"
        result = post_creator.create_post_from_url(url_to_post, status='draft')
        print(f"Post creato con successo! ID: {result['id']}")
        print(f"URL del post: {result['link']}")
    except Exception as e:
        print(f"Errore: {str(e)}")
