<div class="page-header">
	<h1>
		Deelnemers toevoegen
	</h1>
</div>
<script>
	$(document).ready(function()
	{
		$("#tabel_alle").DataTable({
			searching: true,
			ordering: true,
			paging: true,
			"language": {
				"url": "http://cdn.datatables.net/plug-ins/1.10.10/i18n/Dutch.json"
			}
		});
	});
</script>
<?php echo form_open("klassen/addpersons/". $id ."/confirm"); ?>
<table id="tabel_alle" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th></th>
			<th>Leerlingnummer</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($deelnemers as $deelnemer)
		{
			print("<tr>");
				print('<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" name="selected[]" value="'. $deelnemer->gebruikersnaam .'"/><span class="lbl"></span></label></td>');
				print('<td>' . $deelnemer->gebruikersnaam . '</td>');
			print("</tr>");
		}
	?>
	</tbody>
</table>
<button type="submit" id="submitbtn" class="btn btn-primary"><i class="ace-icon fa fa-save"></i> Deelnemers toevoegen</button>
</form>