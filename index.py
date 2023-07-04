import mysql.connector
import requests
import re
from bs4 import BeautifulSoup


db = mysql.connector.connect(
  host="localhost",
  port=3306,
  user="root",
  password="abdu",
  database="HabeshaHorizon"
)

cursor = db.cursor()


headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3'
}

req = requests.get("https://www.ethiopianreporter.com/kinin-and-bahil/", headers=headers)

Soup = BeautifulSoup(req.content, 'html.parser')



# maincounter-number
image_url =''
res = Soup.find_all('div', class_="td-module-container td-category-pos-above")
for res in res:
    title = res.find('h3').text
 
    span = res.find('span', class_="entry-thumb td-thumb-css", style=lambda value: value and "background-image" in value)
    if span:
        style = span.get("style")
        match = re.search(r"url\('([^']+)'\)", style)
        image_url = style.split("('")[0].split("')")[0]
        image_url = image_url.split("(")[1]
        image_url = image_url[:len(image_url) - 1]
    other_element = res.find('a')['href']
    req2 = requests.get(other_element, headers= headers)
    Soup2 = BeautifulSoup(req2.content, 'html.parser')

    title2= ''
    texts =''
    strings = ''
    detail = Soup2.find_all('div', class_ = 'tdb-block-inner td-fix-index')

    for details in detail:
        title2 = Soup2.find('h1', class_ ='tdb-title-text').text
        
        texts = details.find_all('p')
     
        for text in texts:
            strings += text.text
          

       
  
            

            
    print(title)
    print(image_url)
   

    sql = "INSERT INTO News (Title, Detail, Image_Url, Other) VALUES (%s,%s, %s, %s)"

    # Define the values to insert
    values = (title,strings , image_url, "Other")

    # Execute the query with the values
    cursor.execute(sql, values)

    # Commit the changes to the database
    db.commit()
    # Define the values to insert

cursor.close()
db.close()

  
