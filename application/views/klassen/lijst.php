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
<?php print_r($klassen); ?>
<table class="table table-bordered">
	<tr>
		<th>#</th>
		<th>Naam</th>
		<th>Acties</th>
	</tr>
	<?php
		foreach($klassen as $klas)
		{
			print("<tr>");
				print('<td>' . $klas->klas_id . '</td>');
				print('<td>' . $klas->naam . '</td>');
				print('<td>');
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
</table>