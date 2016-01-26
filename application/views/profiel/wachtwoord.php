<div class="page-header">
	<h1>
		Wachtwoord weizigen
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $this->gebruiker->get($naam, "voornaam") . " " . $this->gebruiker->get($naam, "achternaam"); ?>
		</small>
	</h1>
</div>
<?php echo form_open("profiel/password/" . $naam . "/confirm"); ?>
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
		Wachtwoord:
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
<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-save"></i> Wachtwoord opslaan</button>
</form>