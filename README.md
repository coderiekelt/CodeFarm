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

#PHP4Noobs
The noob friendly PHP library.

## What does it do?
PHP4Noobs aims to simplify common tasks within PHP such as writing to files, connecting to and using a database, etc.

## How do I get it?
`composer require coderiekelt/php4noobs`

### What the hell is composer?
The package manager you need to install this PHP library.

#### What is a package manager?
Are you sure you are supposed to be doing PHP?

## Samples
Simple usage of the database class
`$db = new PHP4Noobs\Database();

// Establish a connection
$db->connect("localhost", "username", "password", "database", $port=3306);

// Insert a row
$db->insert("users", "'username', 'password', 'email'", "'test', 'test', 'test'");

// Print some strings for all users
while($row = $db->fetchArray("users")) {
	echo $row['username'] . "<br>";
}

// Close the database connection
$db->close();
`
