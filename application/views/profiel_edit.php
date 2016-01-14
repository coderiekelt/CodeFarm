<?php $this->load->view("header", array("title" => "Mijn Profiel" )) ?>
<div id="user-profile-2" class="user-profile">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18">
			<li>
				<a href="<?php echo site_url("profiel/index"); ?>">
					<i class="ace-icon fa fa-user bigger-120"></i>
					Profiel
				</a>
			</li>
			<?php if ($gebruiker['gebruikersnaam'] == $_SESSION['usernaam'])
			{ ?>
			<li class="active">
				<a href="<?php echo site_url("profiel/edit"); ?>">
					<i class="ace-icon fa fa-edit bigger-120"></i>
					Aanpassen
				</a>
			</li>
			<?php } ?>
		</ul>
		<div class="tab-content no-border padding-24">
			<div id="home" class="tab-pane in active">
				<div class="widget-box" id="widget-box-1">
					<div class="widget-header">
						<h5 class="widget-title">Persoonlijke details</h5>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<?php echo form_open("profiel/update_personal"); ?>
								<b>Uw voornaam:</b><br>
								<input type="text" class="frm-control" name="voornaam" style="width: 100%" /><br>
								<b>Uw achternaam:</b><br>
								<input type="text" class="frm-control" name="achternaam" style="width: 100%" /><br>
								<br><button type="submit" class="btn btn-success"><i class="ace-icon fa fa-save"></i> Mijn persoonlijke details opslaan</button>
							</form>
						</div>
					</div>
				</div>
				<div class="widget-box" id="widget-box-2">
					<div class="widget-header">
						<h5 class="widget-title">Wachtwoord</h5>
						<div class="widget-toolbar">
							<a href="#" data-action="collapse">
								<i class="ace-icon fa fa-chevron-up"></i>
							</a>
						</div>
					</div>
					<div class="widget-body">
						<div class="widget-main">
							<?php echo form_open("profiel/update_personal"); ?>
								<b>Oude wachtwoord:</b><br>
								<input type="password" class="frm-control" name="oldpassword" style="width: 100%" /><br>
								<b>Gewenst wachtwoord:</b><br>
								<input type="password" class="frm-control" name="newpassword" style="width: 100%" /><br>
								<b>Herhaal gewenst wachtwoord:</b><br>
								<input type="password" class="frm-control" name="reppassword" style="width: 100%" /><br>
								<br><button type="submit" class="btn btn-success"><i class="ace-icon fa fa-save"></i> Mijn wachtwoord veranderen</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
</div>
<?php $this->load->view("footer"); ?>