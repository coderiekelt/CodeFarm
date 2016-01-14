<?php $this->load->view("header", array("title" => $gebruiker['voornaam'] . " " . $gebruiker['achternaam'])); ?>
<div id="user-profile-2" class="user-profile">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18">
			<li class="active">
				<a data-toggle="tab" href="#home">
					<i class="green ace-icon fa fa-user bigger-120"></i>
					Profiel
				</a>
			</li>
			<?php if ($gebruiker['gebruikersnaam'] == $_SESSION['usernaam'])
			{ ?>
			<li>
				<a data-toggle="tab" href="#aanpassen">
					<i class="orange ace-icon fa fa-edit bigger-120"></i>
					Aanpassen
				</a>
			</li>
			<?php } ?>
		</ul>
		<div class="tab-content no-border padding-24">
			<div id="home" class="tab-pane in active">
				<div class="row">
					<div class="col-xs-12 col-sm-3 center">
						<span class="profile-picture">
							<img class="editable img-responsive" alt="<?php echo $gebruiker['voornaam']; ?>'s Avatar" id="avatar2" src="<?php echo $gebruiker['avatar']; ?>" />
						</span>
					</div>
					<div class="col-xs-12 col-sm-9">
						<h4 class="blue">
							<span class="middle"><?php echo $gebruiker['voornaam'] . " " . $gebruiker['achternaam']; ?></span>
						</h4>

						<div class="profile-user-info">
							<div class="profile-info-row">
								<div class="profile-info-name"> Voornaam </div>
								<div class="profile-info-value">
									<span><?php echo $gebruiker['voornaam']; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Achternaam </div>
								<div class="profile-info-value">
									<span><?php echo $gebruiker['achternaam']; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> E-mail adres </div>
								<div class="profile-info-value">
									<span><?php echo $gebruiker['email']; ?></span>
								</div>
							</div>
							<div class="profile-info-row">
								<div class="profile-info-name"> Registratie </div>
								<div class="profile-info-value">
									<span><?php echo $gebruiker['aangemeld']; ?></span>
								</div>
							</div>	
							<div class="profile-info-row">
								<div class="profile-info-name"> Laatst gezien </div>
								<div class="profile-info-value">
									<span><?php echo $gebruiker['laatsgezien']; ?></span>
								</div>
							</div>							
						</div>
					</div>
				</div>
				<div class="space-20"></div>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small">
								<h4 class="widget-title smaller">
									<i class="ace-icon fa fa-check-square-o bigger-110"></i>
									Over <?php echo $gebruiker['voornaam']; ?>
								</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main">
								<?php if (!isset($gebruiker['over']) || $gebruiker['over'] == "")
								{
									echo '<div class="alert alert-danger">Deze gebruiker heeft nog geen over mij ingevuld.</div>';
								} ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="widget-box transparent">
							<div class="widget-header widget-header-small header-color-blue2">
								<h4 class="widget-title smaller">
									<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
									Voortgang <small>simpele weergave</small>
								</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main padding-16">
									<?php if (!isset($gebruiker['voortgang']))
										{
										echo '<div class="alert alert-danger">Deze gebruiker heeft nog geen voortgang gemaakt.</div>';
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="aanpassen" class="tab-pane in active">
			hooi
		</div>					
	</div>
</div>
<?php $this->load->view("footer"); ?>