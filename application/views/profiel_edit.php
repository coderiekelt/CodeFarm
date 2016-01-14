<?php $this->load->view("header", array("title" => "Mijn Profiel" )) ?>
<div id="user-profile-2" class="user-profile">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18">
			<li>
				<a href="<?php echo site_url("profiel/index"); ?>">
					<i class="green ace-icon fa fa-user bigger-120"></i>
					Profiel
				</a>
			</li>
			<?php if ($gebruiker['gebruikersnaam'] == $_SESSION['usernaam'])
			{ ?>
			<li class="active">
				<a href="<?php echo site_url("profiel/edit"); ?>">
					<i class="orange ace-icon fa fa-edit bigger-120"></i>
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
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
</div>
<?php $this->load->view("footer"); ?>