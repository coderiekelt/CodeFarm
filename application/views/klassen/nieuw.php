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

	function reloadAvailable()
	{
		$("#availableStudents").empty();
		available.forEach(function (entry)
		{
			var sn = "moveToPart('" + entry + "')";
			$("#availableStudents").append('<tr><td>'+ entry +'</td><td><button type="button" onclick="'+ sn +'" class="btn btn-minier btn-success dropdown-toggle"><i class="ace-icon fa fa-angle-double-right icon-only bigger-120"></i></button</td></tr>');
		});
	}

	$(document).ready(function()
	{
		$("#btnsubmit").hide();
		reloadAvailable();
	});
</script>
<div>
	<label>
		Deelnemers:
		<small>Waarschuwing! Als een deelnemer al in een klas zit, wordt deze toegewezen aan de nieuwe klas.</small>
	</label>
	<div class="row">
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
						<tr>
							<td>
								199386
							</td>
							<td>
								<button class="btn btn-minier btn-success dropdown-toggle">
									<i class="ace-icon fa fa-angle-double-right icon-only bigger-120"></i>
								</button>
							</td>
						</tr>
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
					<tbody id="participatingaStudents">
						<tr>
							<td>
								199386
							</td>
							<td>
								<button class="btn btn-minier btn-danger dropdown-toggle">
									<i class="ace-icon fa fa-remove icon-only bigger-120"></i>
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<br>
<button type="submit" id="submitbtn" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Klas aanmaken</button>
</form>