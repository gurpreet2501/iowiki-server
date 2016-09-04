<html>
<head>
<link rel="stylesheet" type="text/css" href="<?echo base_url()?>css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?echo base_url()?>css/tank_auth.css" />
<title>
 Admin Login 
</title>
</head>
<body>
<div class="login_header">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1> Confirmation</h1>
      </div>
    </div> 
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-xs-12">
<?php echo $message; ?>
 <a href="<?echo base_url();?>auth/login"><button type="button" class="btn btn-success">Back to login Page</button>