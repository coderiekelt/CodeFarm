<div class="page-header">
	<h1>
		Project <?php echo $project->naam; ?>
	</h1>
</div>
<ol class="dd-list">
	<?php
		foreach($content as $theorie)
		{
			$data = $this->theorie->fetchdetails($theorie->theorie_id);
			print('<a href="' . site_url("projecten/theorie/" . $data->theorie_id) . '">');
				print('<li class="dd-item dd2-item"><div class="dd-handle dd2-handle">');
				print('<i class="normal-icon ace-icon fa fa-book bigger-130"></i><i class="drag-icon ace-icon fa fa-arrows bigger-125"></i></div>');
				print('<div class="dd2-content">' . $data->naam . '</div></li>');
			print('</a>');
		}
	?>
</ol>