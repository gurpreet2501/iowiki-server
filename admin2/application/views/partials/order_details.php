<?php 
use App\Models;

//Fetching Items belonging to the current plant only.

  $orderModel = Models\Orders::find($order['id']);

  // $orderModel->items = Models\OrderItems::WhereOrderId($order['id'])->WhereFromPlant($this->tank_auth->get_user_id())->get();
  if(user_role()!='customer'){
      if(isset($_GET['assigned'])): ?>
      <div class='alert alert-success'>
        Order is assigned to depot
      </div>
    <? endif; ?>
    <? if(isset($_GET['canceled_assignment'])): ?>
      <div class='alert alert-success'>
        Canceled order assignment to depot.
      </div>
    <? endif; ?>

    <? if(count($order['depots_orders'])): ?>
      <div class='alert alert-info'>
        This order is assigned to <strong><?=t($order['depots_orders'][0]['username'])?></strong> depot 
        <a href='<?=site_url('admin/cancel_assignment/'.$order['id'])?>' class='btn btn-danger'>Cancel Assignment</a>
      </div>
    <? endif; ?>
    <? if(empty($order['depots_orders'])):?>
      <form action="<?=site_url('admin/asign_order_to_depot')?>" class='form-inline'>
      <?php $depots = get_depots_list(user_id()); ?>
      <? if(count($depots)): ?>
      <hr >
        <select name="depot_id" id="" class='form-control col-span-3'>
          <? foreach($depots as $depot): ?>
            <option value='<?=av($depot['id'])?>'><?=t($depot['username'])?> Depot</option>
          <? endforeach; ?>
        </select>
        <input type='hidden' name='order_id' value='<?=av($order['id'])?>' />
        <input class='btn btn-primary' type='submit' name="__SUBMIT" value='Assign order to this depot' />
      <hr >
      <? endif; ?>
      </form>
    <? endif; ?>
<?php }//main if closed?>
<div class="text-right">
<?php /*if(user_role()!='plant_manager'):?> 
<div class="row">
  <div class="col-xs-12">
    <div class="received-order text-right">
      <a href="<?=site_url('/orders/confirmation?order_id='.$order['id'])?>"><button type="button" class="btn btn-warning" id="received_order">Received Order</button></a>
    </div>
  </div>
</div>
<?php endif;*/ ?>
</div>

<div class='text-right'>
  <? $this->load->view('partials/print_btn') ?>
</div>
<div class="container-fluid">
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
                                array('order'=>$order,
                                      'p_order'=>$p_order)) ?>
       </div>
    </div>


<hr class="reduced_margin"/>
<div class="row">
   <div class="col-xs-4"> 
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
        </div> <!-- row -->
        
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
   </div> <!-- col -->
 </div> <!-- row -->
 <div class="row">
  <div class="col-xs-12">
     <h3>Items</h3>
      <hr />
      <div class="row order-row">
      <div class="col-xs-12">
        <table border="2px" cellpadding="13px">
          <tr>
            <th>Item Name</th>
            <th>Weight</th>
            <th>Price</th>
            <th>Shipped Qty</th>
            <th>Pending Qty</th>
            <th>Ordered Qty</th>
          </tr>
         <? 
         
            
            
          foreach($orderModel->items as $item):  ?>
            <tr>
              <td><?=t($item->product_name) ?></td>
              <td><?=t($item->weight.' '.$item->weight_unit)?></td>
              <td>Rs. <?=t($item->price)?></td>
              <td><?=t($item->shipped_qty) ?></td>
              <td><?=t($item->qty-$item->shipped_qty) ?></td>
              <td><?=t($item->qty) ?></td>
            </tr>
          <? endforeach; ?>
        </table>
      </div>
      </div>
  </div>
</div> 
</div> <!-- container -->       
<hr/>
<? if($order['type'] == 'Export'): ?>
  <? $this->load->view('partials/order_details_shipping_export',array('order'=> $order)); ?>
<? else: ?>
  <? $this->load->view('partials/order_details_shipping_domestic',array('orderModel'=> $orderModel)); ?>
<? endif; ?>
