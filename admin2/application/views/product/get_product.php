 <script>
   var data=<?=json_encode($prod_details)?>; //Fetching prod detail from assets.Ajax_getProductDetail.js
   var host=window.location.origin;
 </script>
 
<div id="products">
	<div class="text-center"><?=$data['text'];?></div>
	<img src="<?=base_url('images/shop/processing.gif')?>"/>

</div>

