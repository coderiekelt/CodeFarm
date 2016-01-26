<div class="page-header">
	<h1>
		Deelnemers
		<a href="<?php echo site_url("klassen/addpersons/" . $id); ?>">
			<button class="btn btn-sm btn-primary pull-right">
				<i class="ace-icon fa fa-plus"></i> Toevoegen
			</button>
		</a>
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
<?php echo form_open("klassen/deletepersons/". $id); ?>
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
				print('<td class="center"><label class="pos-rel"><input type="checkbox" class="ace" name="selected[]" value="'. $deelnemer->deelnemer .'"/><span class="lbl"></span></label></td>');
				print('<td>' . $deelnemer->deelnemer . '</td>');
			print("</tr>");
		}
	?>
	</tbody>
</table>
<button type="submit" id="removebutton" class="btn btn-danger"><i class="ace-icon fa fa-close"></i> Deelnemers verwijderen</button>
</form>