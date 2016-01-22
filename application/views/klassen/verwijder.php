<div class="page-header">
	<h1>
		Verwijder <?php echo $this->klas->fetchDetails($klas)->naam; ?>
	</h1>
</div>
<div class="panel panel-danger">
	<div class="panel-heading">
		U staat op het punt om een actie te ondernemen die niet ongedaan gemaakt kan worden!
	</div>
	<div class="panel-body">
		Weet u zeker dat u deze gebruiker wilt verwijderen?<br>
		Deze actie kan <b>niet</b> ongedaan gemaakt worden!<br>
		<br>
		<a href="<?php echo site_url("klassen/edit/" . $klas); ?>">Nee, laat mij deze klas bewerken.</a><br>
		<a href="<?php echo site_url("klassen/lijst"); ?>">Nee, breng mij terug naar de klassenlijst.</a><br>
		<a href="<?php echo site_url("klassen/delete/" . $klas ."/confirm"); ?>">Ja, verwijder deze klas.</a>
	</div>
</div>