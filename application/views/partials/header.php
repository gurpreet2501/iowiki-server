<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <?php  
    
    //Home page meta info
    $meta= array(
        'meta_title' => $this->config->item('meta_title'),
        'meta_desc'  => $this->config->item('meta_desc'),
        'meta_keywords'  => $this->config->item('meta_keywords'),
        'meta_author'  => $this->config->item('meta_author'),
        'meta_doctype'  => $this->config->item('meta_doctype')
    );
   
 	//Getting post meta info
    if($this->uri->segment(2) && $this->uri->segment(1) == 'post'){ 
	    $meta = get_post_meta($this->uri->segment(2)); 
    } 
     ?>
	<title>IOWIKI</title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8"  />
    <meta name="fb:app_id" content="494308877441580"  />
    <meta name="concept" content="Welcome to iowiki"  />
    <meta name="locale" content="US"  />
    <meta name="language" content="en"  />
    <meta name="country" content="US"  />
    <meta name="google-site-verification" content="CMo2xPWddlQkFMcTognJRxf_Aq46x8W-o6suQd5gJdA" />
    <meta property="og:site_name" content="iowiki"  />
    <meta property="og:image" content="http://iowiki.com/img/logo.png"  />
    <meta property="og:type" content="website"  />
    <meta property="og:title" content="<?=($meta['meta_title']) ? $meta['meta_title'] : '' ?>"  />
    <meta property="og:description" content="<?=($meta['meta_desc']) ? $meta['meta_desc'] : '' ?>"  />
    <meta property="og:url" content="<?=current_url()?>"  />
    <meta name="msvalidate.01" content="5AEA68CE178EA0759955AE6A7B0C3974" />
    <meta name="title" content="<?=($meta['meta_title']) ? $meta['meta_title'] : '' ?>">
    <meta name="description" content="<?=($meta['meta_desc']) ? $meta['meta_desc'] : '' ?>">
    <meta name="keywords" content="<?=($meta['meta_keywords']) ? $meta['meta_keywords'] : '' ?>">
    <meta name="author" content="iowiki , <?=($meta['meta_author']) ? $meta['meta_author'] : '' ?>">
    <!-- Google Webmaster tool links -->
	  <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/syntaxHighlighter.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/syntaxHighlighterSublimeTemplate.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap-submenu.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/font-awesome.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/style.css')?>" />
	  <link rel="shortcut icon" type="image/png" href="<?=base_url('img/favicon.png')?>" />
    <?php require_once('recaptcha/recaptchalib.php');?>
    <?php require_once('mobile_detect.php');?>

</head>
<body class="<?=isset($page) ? $page : ''?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=494308877441580";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?
    if (strpos($_SERVER['REQUEST_URI'], 'post') == false) {
            redirect_old_wordpress_urls($_SERVER['REQUEST_URI']);
    }
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
<?php $categories = get_post_categories(); ?>	

<div class="header clearfix"
<!-- New Navbar  -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			 <a href="/"><img src="<?=base_url('assets/uploads/files/logo.png')?>" class="img-fit-containter" /></a>
		</div>
		<div class="col-md-8">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>
			    <? $controller = $this->router->fetch_class(); ?> 
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			       <li class="<?=($controller=='Home')?'active':''?>"><a href="/">Home <span class="sr-only">(current)</span></a></li>
			       <?php foreach(get_pages_list() as $key => $value): ?>        
				        <li>
			            <a href="<?=site_url('pages/'.$value['page_slug'].'/'.$value['id'])?>">
			                <?=$value['page_name']?>
			            </a>
				        </li>
			        <?php endforeach; ?>    
			        <!-- Categories Dropdown -->    
			            <li class="dropdown  m-b<?=($controller=='category')?'active':''?>">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" data-submenu="" aria-expanded="false">Categories<span class="caret"></span></a>
			              <ul class="dropdown-menu">
			                <?php foreach ($categories as $key => $value): ?>
			                     <li>
			                        <a href="<?=site_url('category/'.seo_url($value['category_slug']))?>">
			                            <?=$value['category_name']?>
			                        </a>
			                    </li>
			                <?  endforeach; ?>                                
			              </ul>
			            </li>
			        <!-- Cateory Dropdown ends -->    
			        <li class="<?=($controller=='contact')?'active':''?>"><a href="<?=site_url('contact')?>">Contact</a></li> 
			      </ul>
			      <form class="navbar-form navbar-left" method="get" action="<?=site_url('/search')?>">
			        <div class="form-group">
			          <input type="text" class="form-control" name="search_keyword" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Search</button>
			      </form>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div> <!-- col-md-8 -->
		<div class="col-md-2">
				  	<div class="social-icons-header">
                    		<a target="_BLANK" href="https://www.facebook.com/iowiki/"><i class="icon-facebook"></i></a>
                        	<a target="_BLANK" href="https://www.twitter.com/iowiki"><i class="icon-twitter"></i></a>
                        	<a target="_BLANK" href=""><i class="icon-linkedin"></i></a>
                        	<a target="_BLANK" href=""><i class="icon-google-plus"></i></a>
                        	<a target="_BLANK" href="https://www.youtube.com/channel/UC4HgMfW9s_AdADMMeGDmAcg">
                        		<i class="icon-youtube"></i>
                        	</a>
                        </div>
		</div>
	</div>
</div>
<!-- New Navbar ends -->
</div>
<div class="container">  

  <div class="row">

  		<div class="col-md-12">

       	<?php $success_message = lako::get('flash')->get('success');

		    if(!is_null($success_message)):?>

		        <div class="alert alert-success" role="alert"><p><?=htmlentities($success_message);?></p></div>

		<?endif;?> 

		<?php $failure = lako::get('flash')->get('failure');

		    if(!is_null($failure)):?>

		        <div class="alert alert-danger" role="alert"><p><?=htmlentities($failure);?></p></div>

		<?endif;?> 

  		</div>

  </div>





