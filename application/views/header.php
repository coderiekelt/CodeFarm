<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>CodeFarm</title>
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-fonts.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<script src="<?php echo asset_url(); ?>js/ace-extra.js"></script>
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
					<a href="#" class="navbar-brand">
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
								<img class="nav-user-photo" src="<?php echo asset_url(); ?>avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welkom,</small>
									<?php if (isset($_SESSION['displaynaam'])) { echo $_SESSION['displaynaam']; } else { echo "NULL"; } ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="profile.html">
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
					<li class="">
						<a href="<?php echo site_url("dashboard"); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text">Mijn Trajecten</span>
						</a>
						<b class="arrow"></b>
					</li>
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
									<div class="alert alert-danger">
										<b>Foutmelding!</b><br>
										Uw account is nog niet gekoppeld aan een klas, hierdoor hebben wij geen trajecten kunnen ophalen.<br>
										Vraag aan uw docent om u aan de correcte klas te koppelen.
									</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo asset_url(); ?>js/jquery.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo asset_url(); ?>js/jquery1x.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo asset_url(); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo asset_url(); ?>js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
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

		<!-- inline scripts related to this page -->

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace.onpage-help.css" />
		<link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="<?php echo asset_url(); ?>js/ace/elements.onpage-help.js"></script>
		<script src="<?php echo asset_url(); ?>js/ace/ace.onpage-help.js"></script>
		<script src="../docs/assets/js/rainbow.js"></script>
		<script src="../docs/assets/js/language/generic.js"></script>
		<script src="../docs/assets/js/language/html.js"></script>
		<script src="../docs/assets/js/language/css.js"></script>
		<script src="../docs/assets/js/language/javascript.js"></script>
	</body>
</html>
