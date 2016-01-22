<div class="page-header">
	<h1>
		Nieuwe klas toevoegen
	</h1>
</div>
<?php echo form_open("klas/create/confirm"); ?>
<div>
	<label>
		Klas naam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="naam" />
	</div>
</div>
<br>
<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Klas aanmaken</button>
</form>