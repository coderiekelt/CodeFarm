<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>CodeFarm<?php
			if (isset($title))
			{
				echo " - " . $title;
			}
		?></title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-fonts.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="<?php echo asset_url(); ?>js/ace-extra.js"></script>
		<script src="<?php echo asset_url(); ?>js/jquery.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo asset_url(); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo asset_url(); ?>js/bootstrap.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.scroller.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.colorpicker.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.fileinput.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.typeahead.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.wysiwyg.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.spinner.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.treeview.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.wizard.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.aside.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.ajax-content.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.touch-drag.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.sidebar.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.submenu-hover.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.widget-box.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.settings.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.settings-rtl.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.settings-skin.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.widget-on-reload.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.searchbox-autocomplete.js"></script>
		<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="<?php echo site_url("trajecten"); ?>" class="navbar-brand">
						<small>
							<i class="fa fa-home"></i>
							CodeFarm
						</small>
					</a>
				</div>
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php $this->load->model("gebruiker");
																$email = $this->gebruiker->get($_SESSION['usernaam'], "email");
																echo $this->gebruiker->get_gravatar($email); ?>" alt="Avatar" />
								<span class="user-info">
									<small>Welkom,</small>
									<?php if (isset($_SESSION['displaynaam'])) { echo $_SESSION['displaynaam']; } else { echo "NULL"; } ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="<?php echo site_url("profiel"); ?>">
										<i class="ace-icon fa fa-user"></i>
										Mijn Profiel
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo site_url("login/loguit"); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Uitloggen
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>
				<ul class="nav nav-list">
					<li>
						<a href="<?php echo site_url("trajecten"); ?>">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text">Trajecten</span>
						</a>
						<b class="arrow"></b>
					</li>
					<?php if ($_SESSION['domein'] == "beheerder") { ?>
					<li>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Gebruikers </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url("klassen/list"); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Klassen
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url("gebruikers/lijst/deelnemer"); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Deelnemers
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url("gebruikers/lijst/beheerder"); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Beheerders
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="<?php echo site_url("gebruikers/lijst/gast"); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Gasten
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					<?php } ?>
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<?php if (isset($notificatie))	
								{
									?>
										<div class="alert alert-success"><?php echo $notificatie; ?></div>
									<?php
								}
								if (isset($foutmelding))
								{
									?> 
										<div class="alert alert-danger"><?php echo $foutmelding; ?></div>
									<?php
								}
								if (isset($waarschuwing))
								{
									?> 
										<div class="alert alert-warning"><?php echo $waarschuwing; ?></div>
									<?php
								} ?>