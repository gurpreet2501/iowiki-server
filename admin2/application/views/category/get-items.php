<script>
  var data1=<?=json_encode($data);?>; // Data used in assets/js/ajax_getproducts.js file ?>
  var host=window.location.origin;
</script>
   
<div id="products">
	<div class="text-center"><?=$text?></div>
	<img src="<?=base_url('images/shop/processing.gif')?>"/>  
</div>
