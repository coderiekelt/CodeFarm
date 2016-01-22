<div class="page-header">
	<h1>
		Nieuwe klas toevoegen
	</h1>
</div>
<?php echo form_open("klassen/create/confirm"); ?>
<div>
	<label>
		Klas naam:
	</label>

	<div class="input-group" style="width: 100%">
		<input class="form-control" type="text" name="naam" />
	</div>
</div>
<br>
<div>
	<label>
		Deelnemers:
		<small>Waarschuwing! Als een deelnemer al in een klas zit, wordt deze toegewezen aan de nieuwe klas.</small>
	</label>
	<div class="row">
		<div class="col-xs-6">
				<div>
					<table id="dynamic-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Leerlingnummer</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<a href="#">app.com</a>
								</td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
		<div class="col-xs-6">
			<div class="well">
				Hier komen de deelnemers van de klas
			</div>
		</div>
	</div>
</div>
<br>
<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-plus"></i> Klas aanmaken</button>
</form>