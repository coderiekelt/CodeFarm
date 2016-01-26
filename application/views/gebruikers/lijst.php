<div class="page-header">
	<h1>
		Gebruikers
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Domein: <?php echo $domein; ?>
		</small>
		<!-- HEHEHE BUTTON-SM -->
		<a href="<?php echo site_url("gebruikers/create"); ?>">
			<button class="btn btn-sm btn-primary pull-right">
				<i class="ace-icon fa fa-plus"></i> Nieuwe gebruiker
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
			<th>Gebruikersnaam</th>
			<th>Voornaam</th>
			<th>Achternaam</th>
			<th>Registratie Datum</th>
			<th>Acties</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($gebruikers as $gebruiker)
		{
			print("<tr>");
				print('<td>' . $gebruiker->gebruikersnaam . '</td>');
				print('<td>' . $gebruiker->voornaam . '</td>');
				print('<td>' . $gebruiker->achternaam . '</td>');
				print('<td>' . $gebruiker->datum_aangemeld . '</td>');
				print('<td>');
					print('<a href="' . site_url("gebruikers/profile/" . $gebruiker->gebruikersnaam) . '">');
						print('<button class="btn btn-minier btn-warning">');
							print('<i class="ace-icon fa fa-eye"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("gebruikers/edit/" . $gebruiker->gebruikersnaam) . '">');
						print('<button class="btn btn-minier btn-success">');
							print('<i class="ace-icon fa fa-edit"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("gebruikers/password/" . $gebruiker->gebruikersnaam) . '">');
						print('<button class="btn btn-minier btn-primary">');
							print('<i class="ace-icon fa fa-asterisk"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("gebruikers/delete/" . $gebruiker->gebruikersnaam . "/" . $domein) . '">');
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