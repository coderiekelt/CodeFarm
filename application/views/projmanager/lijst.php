<div class="page-header">
	<h1>
		Projecten
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
		<?php foreach($projecten as $project) {
			print('<tr>');
				print('<td>' . $project->naam . '</td>');
				print('<td>');
					print('<a href="' . site_url("projmanager/persons/" . $project->project_id) . '">');
						print('<button class="btn btn-minier btn-default">');
							print('<i class="ace-icon fa fa-group"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("projmanager/edit/" . $project->project_id) . '">');
						print('<button class="btn btn-minier btn-success">');
							print('<i class="ace-icon fa fa-edit"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("projmanager/theorie/" . $project->project_id) . '">');
						print('<button class="btn btn-minier btn-primary">');
							print('<i class="ace-icon fa fa-book"></i>');
						print('</button>');
					print('</a> ');
					print('<a href="' . site_url("projmanager/delete/" . $project->project_id) . '">');
						print('<button class="btn btn-minier btn-danger">');
							print('<i class="ace-icon fa fa-remove"></i>');
						print('</button>');
					print('</a>');
				print('</td>');
			print('</tr>');
		} ?>
	</tbody>
</table>
