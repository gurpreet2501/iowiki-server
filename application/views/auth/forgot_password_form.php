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
        <h1> Forgot Password</h1>
      </div>
    </div> 
  </div>
</div>
<div class="container">
<div class="row">
  <div class="col-xs-12">
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
		<td style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('reset', 'Get a new password'); ?>
<?php echo form_close(); ?>