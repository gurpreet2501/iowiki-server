<h3 id="payment-details">Payment Details</h3>
<? if(user_role()=='plant_manager'):?>
  <div class='text-right desktop-only'>
    <a href="<?=site_url("admin/payment_details/edit/{$order['payment_details']['id']}")?>"
       class='btn btn-sm btn-success fancy iframe'>Update Payment Details</a>
  </div>
<? endif;?>
<form method='post'>
<div class="row order-row">
  <div class='col-xs-12'>
    <div class="row">
      <div class="col-xs-6 text-right"><label>Receipt</label></div>
      <div class="col-xs-6">
        <? if((user_role()=='customer') && !$p_order->payment_verified()):?>
          <div class='desktop-only'>
            <input  type="text" 
                      name='receipt'
                      value='<?=av($order['payment_details']['receipt'])?>' 
                      placeholder='Receipt' 
                      class="input-sm form-control" />

            <input type='submit' class='btn btn-primary btn-sm' value='Update Payment Information' />
          </div>
          <div class='print-only'>
            <?=t($p_order->payment_receipt())?>
          </div>
        <? else: ?>            
          <?=t($p_order->payment_receipt())?>
        <? endif; ?>
        
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-6 text-right"><label>Verification Status</label></div>
      <div class="col-xs-6">
        <?=$p_order->payment_verified()? 'Verified': 'Not Verified'; ?>
      </div>
    </div>
  </div>
</div>
</form>