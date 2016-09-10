<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Markfed</title>
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700|Changa+One' rel='stylesheet' type='text/css'>
    <link href="<?=base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/main.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/responsive.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/print.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/css/dev.css')?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url('assets/images/ico/favicon.ico')?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url('assets/images/ico/apple-touch-icon-144-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url('assets/images/ico/apple-touch-icon-114-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('assets/images/ico/apple-touch-icon-72-precomposed.png')?>">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/images/ico/apple-touch-icon-57-precomposed.png')?>">
    <? if(isset($css_files)): ?>
      <? foreach($css_files as $css_file): ?>
        <link rel="stylesheet" href="<?=av($css_file)?>" />
      <? endforeach; ?>
    <? endif; ?>

    <?php  require_once APPPATH.'/../vendor/autoload.php'; ?>
</head><!--/head-->

<body class="<?=isset($controllers_name) ? $controllers_name :'';?>"  >
    <div class="red-title"><h3 class="text-center">TESTING SITE</h3></div>
	<header id="header"><!--header-->
		<div class="header_top"></div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?=base_url('/')?>">
                <!-- <h3>MARKFED PUNJAB</h3> -->
               <img src="<?=base_url('images/logo.png')?>" alt="" />
              </a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
              <? if(logged_in()): ?>
								<li><a href="<?=site_url('account')?>"><i class="fa fa-user"></i> Account</a></li>
								<li><a href='<?=site_url("orders/history")?>'><i class="fa fa-shopping-cart"></i>Order History</a></li>
              <? endif; ?>

							<?php if (!logged_in()) {?>
								<li><a href="<?=site_url('auth/login');?>"><i class="fa fa-lock"></i> Login</a></li>
								<li><a href="<?=site_url('auth/register');?>"><i class="fa fa-lock"></i>Register</a></li><? } ?>
							<?php	if (logged_in()) {?>
							<li><a href="<?=site_url('auth/logout');?>"><i class="fa fa-lock"></i>Logout (<?=$this->tank_auth->get_username()?>)</a></li>
							<? }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?=site_url("plant")?>" class="active">Home</a></li>
								<li>
                  <a href="<?=site_url("plant")?>">
                    Viewing: <b><?=htmlentities(plant('full_name'))?></b>
                  </a>
                </li>
							</ul>
						</div>
					</div>

				</div>
					<hr class="header_separator"/>
			</div>
		</div><!--/header-bottom-->

	</header><!--/header-->

  <div class='container-wrap <?=av($this->uri->segment(1))?>-<?=av($this->uri->segment(2))?>'>
    <div class="container main">
     <?php if($msg = lako::get('flash')->get('global')):?>
      <div class="alert alert-<?=htmlspecialchars($msg['type'])?>" role="alert">
        <p><?=htmlentities($msg['msg']);?></p>
      </div>
    <?php endif; ?>
