<h3 id='shipment-progress'>Export Shipping Progress</h3>
<hr />
<? foreach($order['shpiment_export'] as $shipment_stage => $status): 
    if(in_array($shipment_stage,array('id','order_id')))
      continue;
?>    
  <div class="row order-row">
    <div class="col-md-4 text-right"><label><?=htmlentities(stage_name($shipment_stage))?></label></div>
    <div class="col-md-8">
      <?=(stage_value($status))?>
    </div>
  </div>
<? endforeach; ?>