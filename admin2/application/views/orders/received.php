<?php $this->load->view('partials/header'); ?>
<hr/>
<div class="container"> 
  <div class="row text-center">
    <div class="col-xs-12">
      <h1>Confirm Order Receiving</h1><hr/>
    </div>
	</div>
  <div class="row">
 	 	<div class="col-sm-2">
      <div class="left-sidebar">
        <?php $this->load->view('partials/bookings') ?>
      </div>
    </div>
    <div class='col-sm-10'>
       <div class="row">
       	 <div class="col-xs-offset-4">
       	 	<a href="<?=site_url('orders/received/'.$_GET['order_id'])?>">
       	 	 <button type="button" class="btn btn-success">Order Received Successfully</button>
       	 	</a> 
       	 </div>
       </div>
       <br/>
       <div class="row">
       	 <div class="col-xs-offset-4">
       	 	  <button type="button" class="btn btn-danger" id="missing-item">Missing Or Damaged Items</button>
       	 </div>
       </div>
       <br/>
       <hr/>
       <div class="row">
       	 <div class="col-xs-12">
           <div class="mis_items"> 
           	  <div class="row">
           	   	 <div class="col-xs-1"><strong>Sno.</strong></div>
           	   	 <div class="col-xs-5"><strong>Items.</strong></div>
           	   	 <div class="col-xs-2"><strong>Quantity Ordered</strong></div>
           	   	 <div class="col-xs-4"><strong>Status</strong></div>
           	  </div>
           	  <form method="post">
           	     <?php foreach ($order as $key => $value): 
           	         if($value['received']==1)
           	           continue;    //if item already received then hiding it from missing/ damaged form 
           	     ?>            	  	 
           	        <div class="row">
           	        	 <div class="col-xs-1"><?=$key?></div>
           	        	 <div class="col-xs-5"><?=$value['product_name']?></div>
           	        	 <div class="col-xs-2"><?=$value['qty']?></div>
           	        	 <div class="col-xs-4">
           	        	 	 <div class="input-group">
											     <input type="radio" name="prod-<?=$value['prod_id']?>" value="<?=$value['prod_id']?>"  class="required receiving_complete" data-attr="<?=$value['prod_id']?>" id="received-<?=$value['prod_id']?>"> Received Complete <br/>
											     <input type="hidden" value="<?=$_GET['order_id']?>" name="o_id" />
											     <input type="radio" name="prod-<?=$value['prod_id']?>" value="0" class="required damaged_items" id="<?=$value['prod_id']?>"> Damaged/missing
											   </div>
                       </div>
           	        </div>
           	        <iframe width="100%" height="auto" class="iframes" id="missing-item-form-<?=$value['prod_id']?>" src="<?=site_url('orders/damaged_items/?prod_id='.$value['prod_id'].'&order_id='.$_GET['order_id']);?>"> 
			                  
			              </iframe>
              <? endforeach; ?> 
              <input type="submit" value="Submit" />
      			</form>
             <!-- pop up modal code  -->
              

             <!-- pop up modal code  ends-->



           </div>
         </div>
       </div> 
      <br/><br/> 
 	  </div>
 </div>
	
</div> <!-- Container ends -->

<?php  $this->load->view('partials/footer'); ?>