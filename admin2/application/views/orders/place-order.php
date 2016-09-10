<div class="row">
 <div class="col-xs-2"><div class="headings">Product Name</div></div>
 <div class="col-xs-2"><div class="headings">Image</div></div>
 <div class="col-xs-2"><div class="headings">Price</div></div>
 <div class="col-xs-2"><div class="headings">Order Items</div></div>
 <div class="col-xs-2"><div class="headings">Remaining Items</div></div>
 <div class="col-xs-2"><div class="headings">Total Price</div></div>
</div>

<form action="<?=site_url('/booking/process')?>" method="post">	
	<?php foreach ($data[0]['booking_items'] as $key => $value): ?>
	 	<input type="hidden" name="booking_id" value="<?=$value['book_id']?>">
		<div class="row">
	     <div class="col-xs-2"><?=$value['products']['product_name']?></div>
	     <div class="col-xs-2">
	     	  <? if($value['products']['image']): ?>
                      <img src="<?=base_url('assets/uploads/files/'.$value['products']['image'])?>"  class="img-fit-container" alt="" />                  
                <? else: ?>                    
                      <img src="<?=base_url('assets/images/no-image.png')?>"  class="img-fit-container" alt="" />                  
                <? endif; ?>
	        	

	     </div>
			 <div class="col-xs-2">
			 	  <div class="pprice-<?=$value['product_id']?>" data-price="<?=$value['price']?>">
			 	  	  Rs. <?=$value['price']?>
			 	  </div>
			 </div>	  
			 <div class="col-xs-2">
			 	 <input type="text" class="process_booked" name="<?=$value['product_id']?>">
			 </div>
			 <div class="col-xs-2">
			 	 <div class="remaining_items-<?=$value['product_id']?>"  data-rem="<?=$value['remaining_stock']?>"><?=$value['remaining_stock']?></div>
	     </div>
	     <div class="col-xs-2">Rs. <span class="total_order_price-<?=$value['product_id']?>">0</span></div>
	   </div>  
	   <hr/>
  <? endforeach; ?>
   <div class="row">
     <div class="col-xs-9"></div>
     <div class="col-xs-3">
       <input  type="submit"  class="btn btn-success" value="Process Booking"></div>
   </div>
 </form>	
 <br/>

