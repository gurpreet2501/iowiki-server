<?php $this->load->view('partials/header'); 
$lang=site_lang();
 ?>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
    	 <?php $payment_successfull = lako::get('flash')->get('payment_successfull');
			     if(!is_null($payment_successfull)):?>
			      <div class="alert alert-success" role="alert">
			      	<p>
			      		  <?=htmlentities($payment_successfull);?>
			      	</p>
			       </div>
			    <?endif;?> 

       <h4><a href='<?=site_url("{$lang}/orders/history");?>'>Click here</a> to see your Order History</h4>  
    </div>
  </div> 
</div>
<?php $this->load->view('partials/footer'); ?>