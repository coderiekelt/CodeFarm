<div class="page-header">
    <h1>
        Mijn Trajecten
    </h1>
</div>
<div class="row">
	<?php foreach($trajecten as $traject) {
		$data = $this->traject->fetchdetails($traject->traject_id);
		print('<a href="' . site_url("trajecten/view/" . $traject->traject_id) . '">');
			print('<div class="col-xs-2">');
				print('<div class="well">');
					print('<center><img style="width: 100%; height: 100%;" src="' . $data->thumb . '" /></center>');
					print('<center><span style="font-size: 12pt; font-weight: bold;">' . $data->naam . "</span></center>");
				print('</div>');
			print('</div>');
		print('</a>');
	} ?>
</div>
