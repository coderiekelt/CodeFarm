<h3>Gebruikers <small><?php echo $domein; ?></h3>
<table class="table table-bordered">
	<tr>
		<th>Gebruikersnaam</th>
		<th>Voornaam</th>
		<th>Achternaam</th>
		<th>Registratie Datum</th>
		<th>Acties</th>
	</tr>
	<?php
		foreach($gebruikers as $gebruiker)
		{
			print("<tr>");
				print('<td>' . $gebruiker->gebruikersnaam . '</td>');
				print('<td>' . $gebruiker->voornaam . '</td>');
				print('<td>' . $gebruiker->achternaam . '</td>');
				print('<td>' . $gebruiker->datum_registratie . '</td>');
			print("</tr>");
		}
	?>
</table>