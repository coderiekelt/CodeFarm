<?php $this->load->view("header"); ?>
<?php if (isset($koppelfout)) { ?>
	<div class="alert alert-danger">
		<b>Foutmelding!</b><br>
		Uw account is nog niet gekoppeld aan een klas, hierdoor hebben wij geen trajecten kunnen test ophalen.<br>
		Vraag aan uw docent om u aan de correcte klas te koppelen.
	</div>
<?php } else { ?>
	<h6>Trajecten voor <?php echo $klas; ?></h6>
<?php } ?>
<?php $this->load->view("footer"); ?>