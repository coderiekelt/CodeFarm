<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>CodeFarm - Inloggen</title>
		<meta name="description" content="Inlog pagina" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-fonts.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace.css" />
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/ace-rtl.css" />
	</head>
	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="white">CodeFarm</span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<?php if (isset($error_invalid))
								{
									?>
									<div class="alert alert-danger">Dit is geen geldig school e-mail adres.</div>
									<?php
								}?>
								<?php if (isset($error_creds))
								{
									?>
									<div class="alert alert-danger">Ongeldige gebruikersnaam of wachtwoord.</div>
									<?php
								}?>
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												Bent u een gast? Log hier in.
											</h4>
			
											<div class="space-6"></div>

											<?php echo form_open("login/process"); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Gebruikersnaam" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Wachtwoord" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" style="width: 100%;" class="btn btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Inloggen</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											<div class="social-or-login center">
												<span class="bigger-110">Bent u een student of beheerder?</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a href="<?php echo site_url("login/googledirector"); ?>">
													<button style="width: 100%;" class="btn btn-danger">
														<i class="ace-icon fa fa-google-plus"></i>
														Login met uw school email!
													</button>
												</a>
											</div>
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->
		<script src="<?php echo asset_url(); ?>js/jquery.js"></script>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo asset_url(); ?>js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
	</body>
</html>
