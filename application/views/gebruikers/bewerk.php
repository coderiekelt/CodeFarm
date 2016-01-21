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
<script>
	function randomPassword(length) {
    	var chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOP1234567890";
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
			$("input[name='wachtwoord']").val(pass);
			$("#passInfo").text("Uw nieuwe wachtwoord is: " + pass);
			$("#passInfo").show();
		});
	});
</script>
<div>
	<label>
		Wachtwoord: <small>laat dit leeg om dit niet te veranderen</small>
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="password" name="wachtwoord" value=""/>
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