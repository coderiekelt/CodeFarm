<div class="page-header">
	<h1>
		Gebruiker bewerken
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $gebruiker->gebruikersnaam; ?>
		</small>
	</h1>
</div>
<?php echo form_open("gebruikers/create/confirm"); ?>
<div>
	<label>
		Voornaam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="voornaam" value="<?php echo $gebruiker->voornaam; ?>"/>
	</div>
</div>
<br>
<div>
	<label>
		Achternaam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="achternaam" value="<?php echo $gebruiker->achternaam; ?>"/>
	</div>
</div>
<br>
<div>
	<label>
		E-mail adres:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="email" value="<?php echo $gebruiker->email; ?>"/>
	</div>
</div>
<br>
<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Gebruiker aanmaken</button>
</form>