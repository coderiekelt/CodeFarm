<?php $this->load->view("header", array("title" => "Nieuwe groep")); ?>
<div class="widget-box" id="widget-box-1">
	<div class="widget-header">
		<h5 class="widget-title">Nieuwe groep</h5>
		<div class="widget-toolbar">
			<a href="#" data-action="collapse">
				<i class="ace-icon fa fa-chevron-up"></i>
			</a>
		</div>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<?php echo form_open("profiel/update_password"); ?>
				<b>Geef uw nieuwe groep een naam:</b><br>
				<input type="password" class="frm-control" name="oldpassword" style="width: 100%" /><br>
				<b>Indien u klassen al wilt koppelen voer dan hier de klas naam in en klik op het plusje.</b><br>
				Reeds toegevoegde klassen:<br>
				<i>Er zijn nog geen klassen toegevoegd</i><br>
				<br><button type="submit" class="btn btn-success"><i class="ace-icon fa fa-save"></i> Nieuwe groep aanmaken</button>
			</form>
		</div>
	</div>
</div>
<?php $this->load->view("footer"); ?>