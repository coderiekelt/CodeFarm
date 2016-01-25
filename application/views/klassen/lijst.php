<div class="page-header">
	<h1>
		Klassen
		<!-- HEHEHE BUTTON-SM -->
		<a href="<?php echo site_url("klassen/create"); ?>">
			<button class="btn btn-sm btn-primary pull-right">
				<i class="ace-icon fa fa-plus"></i> Nieuwe klas
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
<table id="tabel_alle" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th>Naam</th>
			<th>Acties</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($klassen as $klas)
		{
			print("<tr>");
				print('<td>' . $klas->naam . '</td>');
				print('<td>');
					print('<a href="' . site_url("klassen/persons/" . $klas->klas_id) . '">');
						print('<button class="btn btn-minier btn-warning">');
							print('<i class="ace-icon fa fa-group"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("klassen/edit/" . $klas->klas_id) . '">');
						print('<button class="btn btn-minier btn-success">');
							print('<i class="ace-icon fa fa-edit"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("klassen/delete/" . $klas->klas_id) . '">');
						print('<button class="btn btn-minier btn-danger">');
							print('<i class="ace-icon fa fa-remove"></i>');
						print('</button>');
					print('</a>');
				print('</td>');
			print("</tr>");
		}
	?>
	</tbody>
</table>