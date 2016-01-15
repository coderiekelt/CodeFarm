<span style="font-size: 20pt; font-weight: bold;">
	Nieuwe klas
</span>
<div class="widget-box" id="widget-box-2">
	<div class="widget-header">
		<h5 class="widget-title">Klas toevoegen</h5>
	</div>
	<div class="widget-body">
		<div class="widget-main">
			<?php echo form_open("klassenbeheer/toevoegen"); ?>
				<b>Klas naam:</b><br>
				<input class="frm-control" style="width: 100%" type="text" name="naam" /><br>
				<b>Deelnemers:</b><br>
				<small>Deelnemers die nog niet bestaan worden geregistreerd, bestaande deelnemers worden uit hun oude klas gehaald en toegewezen aan de nieuwe.</small><br>
			</form>
		</div>
	</div>
</div>