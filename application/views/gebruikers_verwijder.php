<h3>Verwijder <?php echo $gebruiker->voornaam . " " . $gebruiker->achternaam . "<small>". $gebruiker->gebruikersnaam . "</small>"; ?></h3>
<div class="panel panel-danger">
	<div class="panel-heading">
		U staat op het punt om een actie te ondernemen die niet ongedaan gemaakt kan worden!
	</div>
	<div class="panel-body">
		Weet u zeker dat u deze gebruiker wilt verwijderen?<br>
		Deze actie kan <b>niet</b> ongedaan gemaakt worden!<br>
		<br>
		<a href="<?php echo site_url("gebruikers/edit/" . $gebruiker->gebruikersnaam); ?>">Nee, laat mij deze gebruiker bewerken.</a><br>
		<a href="<?php echo site_url("gebruikers"); ?>">Nee, breng mij terug naar de gebruikerslijst.</a><br>
		<a href="<?php echo site_url("gebruikers/delete/" . $gebruiker->gebruikersnaam . "/confirm"); ?>">Ja, verwijder deze gebruiker.</a>
	</div>
</div>