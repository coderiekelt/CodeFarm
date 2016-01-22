<div class="page-header">
	<h1>
		Nieuwe klas toevoegen
	</h1>
</div>
<?php echo form_open("klassen/create/confirm"); ?>
<div>
	<label>
		Klas naam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="naam" />
	</div>
</div>
<br>
<script>
	var available = ['199386', '199439', '200101', '198716'];
	var participating = [];

	function reloadAvailable()
	{
		$("#availableStudents").empty();
		available.forEach(function (entry)
		{
			var sn = "moveToPart('" + entry + "')";
			$("#availableStudents").append('<tr><td>'+ entry +'</td><td><button type="button" onclick="'+ sn +'" class="btn btn-minier btn-success dropdown-toggle"><i class="ace-icon fa fa-angle-double-right icon-only bigger-120"></i></button</td></tr>');
		});
	}

	function reloadParticipating()
	{
		$("#participatingStudents").empty();
		participating.forEach(function (entry)
		{
			var sn = "moveToAvail('" + entry + "')";
			$("#participatingStudents").append('<tr><td>'+ entry +'</td><td><button type="button" onclick="'+ sn +'" class="btn btn-minier btn-danger dropdown-toggle"><i class="ace-icon fa fa-remove icon-only bigger-120"></i></button</td></tr>');
		});
	}


	function moveToAvail(dlnr)
	{
		for (var i = 0; i < participating.length; i++)
		{
			if (participating[i] == dlnr)
			{
				available.push(dlnr);
				participating.splice(i, 1);
			}
		}

		reloadAvailable();
		reloadParticipating();
	}

	function moveToPart(dlnr)
	{
		for (var i = 0; i < available.length; i++)
		{
			if (available[i] == dlnr)
			{
				participating.push(dlnr);
				available.splice(i, 1);
			}
		}

		reloadAvailable();
		reloadParticipating();
	}

	$(document).ready(function()
	{
		$("#submitbtn").hide();
		$("#postgenlist").hide();
		reloadAvailable();
		reloadParticipating();

		$("#klasbtn").click(function()
		{
			$("#finalStudents").empty();
			participating.forEach(function (entry)
			{
				$("#finalStudents").append('<tr><td>'+ entry +'</td></tr>');
			});

			$("#pregenlijst").fadeOut(1000, function() {
				$("#postgenlist").fadeIn(1000);
			});
		});
	});
</script>
<div>
	<label>
		Deelnemers:
		<small>Waarschuwing! Als een deelnemer al in een klas zit, wordt deze toegewezen aan de nieuwe klas.</small>
	</label>
	<div class="row" id="pregenlijst">
		<div class="col-xs-6">
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Leerlingnummer</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="availableStudents">
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-xs-6">
			<div>
				<table id="dynamic-table" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Leerlingnummer</th>
							<th></th>
						</tr>
					</thead>
					<tbody id="participatingStudents">
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div id="postgenlist">
		<table id="dynamic-table" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>Leerlingnummer</th>
				</tr>
			</thead>
			<tbody id="finalStudents">
			</tbody>
		</table>
	</div>
</div>
<br>
<button type="button" id="klasbtn" class="btn btn-primary"><i class="ace-icon fa fa-gears"></i> Genereer klassenlijst</button>
<button type="submit" id="submitbtn" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Klas aanmaken</button>
</form>