<div class="row">  
  <div class="col-xs-6">
    <h3>Order #<?=t($p_order->id()); ?></h3> 
    <? if(user_role()=='plant_manager' && 0):?>
      <div class=''>
        <a href="<?=site_url("manage/discount/price_adjust/".$order['id'])?>" class="btn btn-sm btn-warning fancy iframe">Adjust Price</a>
      </div>
    <? endif;?>
    <br/>
    <? if(user_role()=='plant_manager'):?>
      <div class='text-right desktop-only'>
        <a href="<?=site_url("admin/update_order/edit/{$order['id']}")?>"
           class='btn btn-sm btn-success fancy iframe'>Update Status</a>
      </div>
    <? endif;?>
    <div class="row order-row">
      <div class="col-xs-4 text-right"><label>Plant</label></div>
      <div class="col-xs-8"><?=t($order['plant']['full_name'])?></div>
    </div>
    <div class="row order-row">
      <div class="col-xs-4 text-right"><label>Date</label></div>
      <div class="col-xs-8"><?=$p_order->date()?></div>
    </div>
      
    <div class="row order-row">
      <div class="col-xs-4 text-right"><label>Status</label></div>
      <div class="col-xs-8"><?=$order['status']?></div>
    </div>

    <div class="row order-row">
      <div class="col-xs-4 text-right"><label>Total Amount</label></div>
      <div class="col-xs-8">Rs.<?=number_format($p_order->total(),2)?></div>
    </div>
   </div> 
   <div class="col-xs-6"> <!-- Payment DEtails -->
     <? if($p_order->from_booking()): ?>
      <div class="row order-row">
      <div class="col-xs-4 text-right"><label>Booking</label></div>
      <div class="col-xs-8">
        <a href="<?=site_url("booking/{$order['booking_id']}")?>">
          #<?=$order['booking_id']?>
        </a>
      </div>
      </div>
      <? endif; ?>
      
      <? $this->load->view('partials/order_details_payment_details',
                            array('order'   =>  $order,
                                  'p_order' =>  $p_order)) ?>
   </div>
</div>
<hr class="reduced_margin"/>
<div class="row">
   <div class="col-xs-6"> 
        <h3>Customer</h3>
        <hr />
        <div class="row order-row">
          <div class="col-xs-12">
            <div class="row">
              <div class="col-xs-4 text-right"><label>Name</label></div>
              <div class="col-xs-8"><?=t($order['customer']['full_name'])?></div>
            </div>
            <div class="row">
              <div class="col-xs-4 text-right"><label>Email</label></div>
              <div class="col-xs-8"><?=t($order['customer']['email'])?></div>
            </div>
            <div class="row">
              <div class="col-xs-4 text-right"><label>Phone Number</label></div> 
              <div class="col-xs-8"><?=t($order['customer']['phone_number'])?></div>
            </div>
            <div class="row">
              <div class="col-xs-4 text-right"><label>Address Line 1</label></div>
              <div class="col-xs-8"><?=t($order['customer']['address_line_1'])?></div>
            </div>
            <div class="row row-order">
              <div class="col-xs-4 text-right"><label>Address Line 2</label></div>
              <div class="col-xs-8"><?=t($order['customer']['address_line_2'])?></div>
            </div>
            <div class="row row-order">
              <div class="col-xs-4 text-right"><label>City</label></div>
              <div class="col-xs-8"><?=t($order['customer']['city'])?></div>
            </div>
            <div class="row row-order">
              <div class="col-xs-4 text-right"><label>State</label></div>
              <div class="col-xs-8"><?=t($order['customer']['state'])?></div>
            </div>
            <div class="row row-order">
              <div class="col-xs-4 text-right"><label>District</label></div>
              <div class="col-xs-8"><?=t($order['customer']['district'])?></div>
            </div>
            <div class="row row-order">
              <div class="col-xs-4 text-right"><label>Zip Code</label></div>
              <div class="col-xs-8"><?=t($order['customer']['zip_code'])?></div>
            </div>
          </div>
        </div>
        
        <!-- Remarks -->
        <h3>Remarks</h3>
        <hr />
        <p>
          <?if(trim($order['remarks'])): ?>
            <?=t($order['remarks'])?>
          <? else:?>
            <small class='mute'>Customer had no remarks.</small>
          <? endif;?>
          
        </p>
   </div>
   <div class="col-xs-6"> <!-- Order Items -->
      <h3>Items</h3>
      <hr />
      <div class="row order-row">
      <div class="col-xs-12">
        <strong>
          <? foreach($p_order->items() as $item): ?>
            <?=t($item->product_name_with_weight()) ?> 
             X <?=$item->qty()?> = Rs. <?= number_format($item->subtotal(),2) ?>
            <hr/>
          <? endforeach; ?>  
        </strong>
      </div>
      </div>
   </div>     
</div>  
<hr/>
  <? if($order['customer']['customer_type'] == 'Export'): ?>
    <? $this->load->view('partials/order_details_shipping_export', array('order'=>$order)); ?>
  <? else: ?>
    <? $this->load->view('partials/order_details_shipping_domestic', array('order'=>$order)); ?>
  <? endif; ?>

