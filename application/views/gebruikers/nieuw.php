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
<script>
	function randomPassword(length) {
    	var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    	var pass = "";
    	for (var x = 0; x < length; x++) {
     	   var i = Math.floor(Math.random() * chars.length);
    	    pass += chars.charAt(i);
    	}
    	return pass;
	}

	$(document).ready(function() {
		$("#passInfo").hide();

		$("#genPass").click(function()
		{
			var pass = randomPassword(12);
			$("input[wachtwoord]").val(pass);
			$("#passInfo").text("Uw nieuwe wachtwoord is: " + pass);
		});
	});
</script>
<div>
	<label>
		Wachtwoord: <small>laat dit leeg om een willekeurig wachtwoord te genereren, gelieve dit alleen te doen voor deelnemers</small>
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="password" name="wachtwoord" />
		<span class="input-group-btn">
			<button class="btn btn-sm btn-primary" id="genPass" type="button">
				<i class="ace-icon fa fa-gears bigger-110"></i>
				Genereer
			</button>
		</span>
	</div>
</div>
<div class="alert alert-info" id="passInfo"></div>
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