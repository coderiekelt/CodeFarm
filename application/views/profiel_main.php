<?php $this->load->view("header", array("title" => "Mijn Profiel")); ?>
<span style="font-size: 16pt;">Mijn Profiel</span>
<div class="widget-box">
	<div class="widget-header">
		<h5 class="widget-title">Mijn persoonlijke instellingen</h5>
		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="ace-icon fa fa-chevron-up"></i>
			</a>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			Alle informatie die u hier invult is alleen voor u en uw docent zichtbaar.<br>
			<?php form_open("profiel/update"); ?>
				<b>Uw voornaam:</b><br>
				<input type="text" class="frm-control" style="width:100%" name="voornaam" />
				<b>Uw achternaam:</b><br>
				<input type="text" class="frm-control" style="width:100%" name="achternaam" />
				<b>Uw e-mail adres:</b><br>
				<input type="text" class="frm-control" style="width:100%" name="email" /><br><br>
				<button type="submit" class="btn btn-success"><i class="ace-icon fa fa-save"></i> Mijn instellingen opslaan</button>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view("footer"); ?>