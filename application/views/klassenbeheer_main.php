<div class="container">
	<span class="pull-left" style="font-size: 16pt; font-weight: bold;">
		Klassenbeheer
	</span>
	<span class="pull-right">
		<a href="<?php echo site_url("klassenbeheer/nieuw"); ?>">
			<button type="button" class="btn btn-success">
				<i class="ace-icon fa fa-plus"></i> 
				Nieuwe klas
			</button>
		</a>
	</span>
</div>
<?php if (!isset($klassen))
{
	?>
	<div class="container">
		<div class="alert alert-danger">
			<b>Foutmelding</b><br>
			Wij hebben helaas geen klassen kunnen ophalen, dit komt omdat er helaas nog geen klassen bestaan.<br>
			Klik op de knop "Nieuwe klas" om een nieuwe klas aan te maken!
		</div>
	</div>
	<?php
} ?>