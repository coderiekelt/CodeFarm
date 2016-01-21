<div class="page-header">
	<h1>
		<?php echo $gebruiker->voornaam . " " . $gebruiker->achternaam; ?>
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $gebruiker->gebruikersnaam; ?>
		</small>
	</h1>
</div>
<div class="row">
	<div class="col-xs-2">
		<div class="well">
			<img src="<?php echo $this->gebruiker->get_gravatar($gebruiker->email); ?>" width="100%" />
		</div>
	</div>
	<div class="col-xs-10">
		<div class="well">
			<b>Voornaam: </b><?php echo $gebruiker->voornaam; ?><br>
			<b>Achternaam: </b><?php echo $gebruiker->achternaam; ?><br>
			<b>E-mail adres: </b><?php echo $gebruiker->email; ?><br>
			<b>Datum van registratie: </b><?php echo $gebruiker->datum_aangemeld; ?><br>
			<b>Datum laatst gezien: </b><?php echo $gebruiker->datum_laatsgezien; ?><br>
		</div>
		<div class="well">
			Wij hebben geen voortgang voor deze gebruiker.
		</div>
	</div>
</div>
