    <html>
    <head>
        <script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
       <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>" >
       <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/print.css')?>" >
       <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/main.css')?>" >
    </head>
    <body>
      <div class="container">
      <div class="print_template">    
          <div class="row">  
            <div class="col-xs-12">
              <h3 class="text-center">Markfed Vanaspati &amp; Allied Industries</h3> 
              <h5 class="text-center">(A Unit of the Pb. State Co-op. Supply &amp; Marketing Federation)
                    G.T. Road, Khanna-141401
              </h5>
            </div> 
          </div>
          <div class="row">
             <div class="col-xs-3">Order No : <?=t($order['id'])?></div>
             <div class="col-xs-3">Booking No : <?=t($order['booking_id'])?></div>
             <div class="col-xs-3">Date : <?=date("d-M-Y", strtotime($order['date']))?></div>
             <div class="col-xs-3">Time : <?=date("h:i a", strtotime($order['date']))?></div>
          </div>
          <div class="spacer-10"></div>
          <!--<div class="row">
            <div class="col-xs-12"><strong>Goods From:</strong>  <?=t($order['plant']['full_name'])?></div>
          </div>-->
          <div class="spacer-10"></div>
          <div class="row">
            <div class="col-xs-12">
             <div class="detail_box"> 
                <h4><strong>Customer Detail:</strong></h4>
                <div class="row">
                   <div class="col-xs-12 clearfix">
                      <strong>Name : </strong><?=t($order['customer']['full_name'])?>
                   </div>
                </div>
                <div class="spacer-10"></div> 
                <div class="row">
                   <div class="col-xs-6">
                     <strong>Contact Person:</strong> <?=t($order['customer']['contact_person'])?> 
                   </div>
                   <div class="col-xs-6">
                     <strong>Contact No:</strong> <?=t($order['customer']['phone_number'])?> 
                   </div>
                </div>
                <div class="spacer-10"></div> 
                <div class="row">
                   <div class="col-xs-6">
                     <div class="detail_box">
                       <strong>Billing Address:</strong> <?=nl2br(t($order['customer']['billing_address']))?>
                       <br/>
                     </div> 
                   </div>
                   <div class="col-xs-6">
                     <div class="detail_box"> 
                       <strong>Shipping Address:</strong> <?=nl2br(t($order['customer']['shipping_address']))?>
                       <br/>
                     </div>  
                   </div>
                 </div>
             </div>
            </div> <!-- main column ends -->  
          </div> <!-- Row ends -->
          <div class="row">
             <div class="col-xs-8">
              <div class="detail_box">
                  <strong>Please dispatch the following goods:</strong>
                  <table class="table">
                     <tr>
                       <th>SL</th>
                       <th>Item Description</th>
                       <th>Weight</th>
                       <th>Qty</th>
                       <th>Value</th>
                     </tr>
                <?php foreach($order['items'] as $key => $value): ?>
                     <tr>
                       <td><?=++$key?></td>
                       <td><?=t($value['product_name'])?></td>
                       <td><?=t($value['weight']).' '.t($value['weight_unit'])?></td>
                       <td><?=t($value['qty'])?></td>
                       <td><?=number_format($value['price'],2)?></td>
                     </tr>
                <?php endforeach; ?>    
                     <tr> 
                       
                       <th colspan='5' class='text-right'>Total: <?=number_format($p_order->total(),2)?></th>
                     </tr>
                  </table>
                </div>  
             </div>
             <div class="col-xs-4">
                <div class="payment_details detail_box">
                  <h5>Payment Detail:</h5>
                  <div class="fields">Rec./Chq No: <?=$order['payment_details']['cheque_no']?></div>
                  <div class="fields">Amount Rs: <?=$order['total']?></div>
                  <div class="fields">Receipt: <?=$order['payment_details']['receipt']?></div>
                  <div class="fields">Bank: <?=$order['payment_details']['bank']?></div>
                  <div class="fields">Branch Code: <?=$order['payment_details']['branch_code']?></div>
                  <div class="fields">Verification: 
                     <strong>
                      <?=$order['payment_details']['verified'] ? 'Verified' :  'Not Verified' ?>
                     </strong>
                   </div>
                </div>
                <div class="transport_details detail_box">
                  <h5>Transport Detail:</h5>
                  <div class="fields">Handed over to Transporter: 
                    <?=$order['shipment_domestic']['handed_over_to_transporter'] ? 'Completed' : 'Pending'; ?>
                  </div>
                  <div class="fields">Invoice No: <?=$order['shipment_domestic']['invoice_number']?></div>
                  <div class="fields">Vehicle No: <?=$order['shipment_domestic']['dispatched_vehicle_number']?></div>
                  <div class="fields">Challan No: <?=$order['shipment_domestic']['challan_number']?></div>
                  <div class="fields">Date &amp; Time: 
                     <?=date("d-M-Y", strtotime($order['shipment_domestic']['date']))?>
                     <?=date("h-i a", strtotime($order['shipment_domestic']['date']))?>
                  </div>
                </div>
             </div>
          </div>

          <hr class="reduced_margin"/>
        </div>
  </div> <!-- Container ends --> 
 </body>
</html>
<script>
 jQuery( document ).ready(function(){
   window.print();
 })
</script>
