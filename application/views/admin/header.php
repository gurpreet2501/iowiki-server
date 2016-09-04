<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?=base_url('js/jquery.js')?>"></script>
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap.min.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/jquery.fancybox.css')?>" />
    <script type="text/javascript" src="<?=base_url('js\jquery.fancybox-1.3.4.js')?>"></script>

<?php 


foreach($css_files as $file): ?>

	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>

<?php foreach($js_files as $file): ?>

	<script src="<?php echo $file; ?>"></script>

<?php endforeach; ?>

<style type='text/css'>

body

{

	font-family: Arial;

	font-size: 14px;

}

a {

    color: blue;

    text-decoration: none;

    font-size: 14px;

}

a:hover

{

	text-decoration: underline;

}

input{

	height: 35px !important;

}

textarea#field-post_description {

    width: 791px;

    height: 500px;

}

</style>

</head>