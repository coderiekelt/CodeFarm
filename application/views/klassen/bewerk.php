<div class="page-header">
	<h1>
		<?php echo $klas->naam; ?>
	</h1>
</div>
<?php echo form_open("klassen/edit/". $klas->klas_id ."/confirm"); ?>
<div>
	<label>
		Klas naam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="naam" value="<?php echo $klas->naam; ?>"/>
	</div>
</div>
<br>
<button type="submit" id="submitbtn" class="btn btn-primary"><i class="ace-icon fa fa-save"></i> Klas opslaan</button>
</form>