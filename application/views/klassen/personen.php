<div class="page-header">
	<h1>
		Deelnemers
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
			<th>Leerlingnummer</th>
		</tr>
	</thead>
	<tbody>
	<?php
		foreach($deelnemers as $deelnemer)
		{
			print("<tr>");
				print('<td>' . $deelnemer->gebruikersnaam . '</td>');
			print("</tr>");
		}
	?>
	</tbody>
</table>