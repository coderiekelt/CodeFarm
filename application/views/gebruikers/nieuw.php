<div class="page-header">
	<h1>
		Nieuwe gebruiker toevoegen
	</h1>
</div>
<?php echo form_open("gebruikers/create/confirm"); ?>
<div>
	<label>
		Gebruikersnaam/leerlingnummer:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="gebruikersnaam" />
	</div>
</div>
<br>
<div>
	<label>
		Wachtwoord: <small>laat dit leeg om een willekeurig wachtwoord te genereren, gelieve dit alleen te doen voor deelnemers</small>
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="password" name="wachtwoord" />
		<span class="input-group-btn">
			<button class="btn btn-sm btn-default" type="button">
				<i class="ace-icon fa fa-calendar bigger-110"></i>
				Go!
			</button>
		</span>
	</div>
</div>
<br>
<div>
	<label>
		Voornaam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="voornaam" />
	</div>
</div>
<br>
<div>
	<label>
		Achternaam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="achternaam" />
	</div>
</div>
<br>
<div>
	<label>
		E-mail adres:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="email" />
	</div>
</div>
<br>
<div>
	<label>
		Domein: <small>beheerders aanmaken vereist een bevoegdheidsgraad</small>
	</label>

	<div class="input-group" style="width: 100%">
		<select class="form-control" name="domein">
			<option value="deelnemer">deelnemer</option>
			<option value="beheerder">beheerder</option>
			<option value="gast">gast</option>
		</select>
	</div>
</div>
<br>
<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Gebruiker aanmaken</button>
</form>