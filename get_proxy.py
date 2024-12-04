import requests
from bs4 import BeautifulSoup

def fetch_proxies(url):
    # Gửi yêu cầu GET đến trang web
    response = requests.get(url)
    content = response.content

    # Phân tích HTML bằng BeautifulSoup
    soup = BeautifulSoup(content, "html.parser")
    table = soup.find("table", {"id": "proxylisttable"})

    proxies = []
    for row in table.tbody.find_all("tr"):
        cells = row.find_all("td")
        ip = cells[0].text.strip()
        port = cells[1].text.strip()
        # Lưu proxy theo định dạng "IP:PORT"
        proxy = f"{ip}:{port}"
        proxies.append(proxy)
    
    return proxies

def save_proxies_to_file(proxies, filename):
    with open(filename, "w") as file:
        for proxy in proxies:
            file.write(proxy + "\n")

def main():
    url = "https://free-proxy-list.net/"
    proxies = fetch_proxies(url)
    save_proxies_to_file(proxies, "proxies.txt")
    print("Danh sách proxy đã được lưu vào tệp proxies.txt")

if __name__ == "__main__":
    main()