<?php $this->load->view('partials/header'); ?>
<div class="container"> 
  <div class="row text-center">
    <div class="col-xs-12">
      <h1>Order Details</h1><hr class="reduced_margin" />
    </div>
	</div>
  <div class="row">
 	 	<div class="col-sm-2">
      <div class="left-sidebar">
        <?php $this->load->view('partials/bookings') ?>
      </div>
    </div>
    <div class='col-sm-10'>
      <?php 
      if($order['type'] == 'Export'):
      	$this->load->view('partials/export_order_details', array('order'=>$order));
      else:
      	$this->load->view('partials/order_details', array('order'=>$order));
      endif;
      ?>
 	  </div>
 </div>
	
</div>

<?php  $this->load->view('partials/footer'); ?>