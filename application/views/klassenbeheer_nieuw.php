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
				<div class="input-group">
					<input id="klasInpt" class="form-control input-mask-date" type="text" id="form-field-mask-1" placeholder="leerlingnr" />
					<span class="input-group-btn">
						<button id="klasBtn" class="btn btn-sm btn-success" type="button">
							<i class="ace-icon fa fa-plus bigger-110"></i>
						</button>
					</span>
				</div>
				<table class="table" id="klassen">
				</table>
				<script>
					$(document).ready(function() {
						$("#klasBtn").click(function()
						{
							$("#klassen").append('<a id="removeDlnr" href="#"><tr><td><b><input type="hidden" name="deelnemers[]" value="' + $("#klasInpt").val() + '"/>' + $("#klasInpt").val() + "</b></td></tr></a>");
						});
						
						$("#removeDlnr").click(function()
						{
							$(this).remove();
						})
					});
					
					
				</script>
				<br><button type="submit" class="btn btn-success"><i class="ace-icon fa fa-save"></i> Nieuwe groep aanmaken</button>
			</form>
		</div>
	</div>
</div>