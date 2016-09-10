<h3 id="payment-details">Payment Details</h3>
<hr />
<div class="row order-row">
  <div class="col-md-3"><label>Receipt</label></div>
  <div class="col-md-9">
    <? if((user_role()=='plant_manager') || (user_role()=='admin') ):?>
      <?=htmlentities($order['payment_details']['receipt']?$order['payment_details']['receipt']: 'Not Available'); ?>
    <? else: ?>
      <form method='post'>
        <div class='row'>
          <div class='col-sm-4'>
            <input  type="text" 
                name='receipt'
                value='<?=htmlspecialchars($order['payment_details']['receipt'])?>' 
                placeholder='Receipt' 
                class="input-sm form-control" />
          </div>
          <div class='col-sm-3'>
            <input type='submit' class="btn btn-sm btn-info" value='Update Receipt' />
          </div>
        </div>
      </form>
      
    <? endif; ?>
    
    <!--
    <?
      $receipt = $order['payment_details']? $order['payment_details']['receipt']: '';
    ?>
    Payment Receipt
    
    -->
  </div>
</div>