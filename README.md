# CodeFarm

Deze repository wordt rechtstreeks geupdate naar de server die op school staat, deze server is de ontwikkelings omgeving.

## Mappen
Naam | Gebruik
--- | ---
`system` | CodeIgniter systeem bestanden.
`applicaton` | CodeFarm applicatie bestanden.
`assets` | Alle bestanden die betrekking hebben tot opmaak en grafische inhoud van CodeFarm.
`user_guide` | Handleiding voor CodeIgniter versie waarvan CodeFarm gebruik maakt.

## Update Tijd
Elke vijf minuten checkt de server voor updates, deze worden dan gecloned naar de server.

## Omgeving opzetten
Om zelf een ontwikkelingsomgeving op te zetten moet je zelf de database blijven updaten, om git op te zetten kun je via het commando `sudo apt-get install git` de git client downloaden, hiervoor zul je zelf een SSH key moeten instellen op je github account.

### Vereisten
#### Test
Naam | Gebruik
--- | ---
Apache | Webserver
PHP | PHP Processor
MySQL | Database
