# Milou's online bookstore
## Inleiding
Dit was een opdracht die ik heb uitgevoerd in de php full-stack bootcamp van YoungCoders. Tijdens de lessen kregen we te telkens maken met nieuwe stof, daarbij zaten praktische opdrachten die we in de lessen oefenden en thuis zelf in de praktijk brachten in een ander project. In de les maakten we allemaal ons eigen booksproject.
## Functionele requirements
- Het project werkt met een sql-database.
- Er is een login functie gemaakt in het navigatie menu, als je daar ingelogd bent krijg je meer toegang tot functionaliteiten zoals:
  * Het aanmaken van een nieuw boek.
  * Het aanpassen van een bestaand boek.
  * Het verwijderen van een bestaand boek.
- Op de hoofdpagina is een top 5 te zien van boeken, gebaseerd op de hoeveelheid gegeven votes. 
Als je daarop klikt kom je bij de detailpagina van het boek.

- Als in het menu op 'Books' wordt geklikt is daar een tabel te zien met alle boeken in de database. 
Als op een boek geklikt wordt kom je terecht bij de detailpagina van de boeken, daar worden alle details van het boek zichtbaar.
Hier kunnen ook foto's toegevoegd worden aan de boeken die opgeslagen worden in de database.
Daarnaast kunnen mensen aangeven of een boek leuk is of niet leuk, dit worden de votes genoemd. 
Dit is ook de plek waar een boek verwijderd of aangepast kan worden.
- Als in het navigatiemenu geklikt wordt op 'Authors' wordt een dropdown menu weergegeven met alle bestaande auteurs uit de database. 
Zodra er op 1 auteur geklikt word kom je op een pagina waar de biografie van de auteur zichtbaar wordt samen met alle boeken die de auteur geschreven heeft.
- Als in het navigatiemenu geklikt wordt op 'Categories' wordt een dropdown menu weergegeven met alle bestaande categorieën uit de database. 
Zodra er op 1 categorie geklikt word kom je op een pagina waar een korte uitleg is van die categorie, ook worden alle boeken zichtbaar die in die categorie zitten.

## Technische requirements
- Er is gebruik gemaakt van HTML, CSS, SCSS, Bootstrap en JavaScript 

- PHP als back-end taal, OOP
- Er is gewerkt met het Model, View, Controller (MVC) systeem.
- MySQL als database voor opslag van de boeken en gerelateerde informatie

## Installeren 
- Om te beginnen moet je deze repository clonen / downloaden. 

- Ga naar de www folder van de computer, maak hier een nieuwe map aan en plaats de bestanden in die map.
- Zorg dat composer geinstalleerd is op de computer.
- Hierna moeten de packages geinstalleerd worden. Typ dit in de command-line:
```composer.install```
- Maak een nieuwe database aan en importeer de bestanden uit:
```sql/Books.sql```
- Maak nu een kopie van het bestand .env-example, noem deze .env en typ daar jou gegevens in.
- Maak ook een kopie van het bestand .envoirement-settings-example, noem deze .envoirement-settings en typ daar jou gegevens in.
