<? $this->load->view('admin/partials/header-print_version') ?>

<div class="row">
  <div class="col-lg-12">
    <h4>Printed on: <?=date1(date('Y-m-d H:i:s'))?></h4>
    
    
    <h4>
      Period: 
      <? if(($filters['from'] != '')  && ($filters['to'] != '')): ?>
        <?=date2($filters['from'])?> to <?=date2($filters['to'])?> 
      <? else: ?>
        All Time
      <? endif; ?>
    </h4>
    
    <h4>
      Order Status: 
      <? if((String)$filters['status'] === '0'):?>
        Any Status
      <? else: ?>
        <?=t($filters['status'])?>
      <? endif; ?>
    </h4>
    
    
    <? if(!intval($filters['plant'])): ?>         
      <? foreach($plants as $plant): ?>
        <h2><?=t($plant['full_name'])?></h2>
        <hr />
        <? 
          $orders_filtered = $orders;
          $orders_filtered['results'] = [];
          foreach($orders['results'] as $result)
            if($result['plant_id'] == $plant['id'])
              $orders_filtered['results'][] = $result;  
        ?>
        
        <? if(empty($orders_filtered['results'])): ?>
          <h4 class="">No Orders</h4>
        <? else: ?>
          <? $this->load->view('fhcattlefeed/reports/partials/orders-grid-print_version',['orders'=>$orders_filtered]); ?>
        <? endif; ?>
          
      <? endforeach; ?>
    <? else: ?> 
      <h3><?=t($selected_plant['full_name'])?></h3>
      <? $this->load->view('fhcattlefeed/reports/partials/orders-grid-print_version',['orders'=>$orders])?>  
    <? endif; ?> 
    
    <? if(empty($orders['results'])):?>
      <h3 class='text-center'>Sorry, No orders found.</h3>
    <? endif;?>
    
    <hr />
    <? if(!empty($orders['results'])): ?>
      <h5 class='text-center'>
        Total <?=t($orders['pagination']['total_results'])?> orders found. Showing page <?=t($filters['page'])?> of <?=t($orders['pagination']['total_pages'])?>.
      </h5>
      <nav>
        <ul class="pager">
          <? if($orders['pagination']['previous']): ?>
            <?
              $prev_link = ['filters'=>$filters];
              $prev_link['filters']['page'] = $orders['pagination']['previous'];  
              $prev_link = site_url('reports/fhcattlefeed/pending_orders').'?'.http_build_query($prev_link);  
            ?>
            <li><a href="<?=av($prev_link)?>">Previous</a></li>
          <? endif; ?>
          <? if($orders['pagination']['next']): ?>
            <?
              $next_link = ['filters'=>$filters];
              $next_link['filters']['page'] = $orders['pagination']['next'];  
              $next_link = site_url('reports/fhcattlefeed/pending_orders').'?'.http_build_query($next_link);  
            ?>
            <li><a href="<?=av($next_link)?>">Next</a></li>
          <? endif; ?>
        </ul>
      </nav>
    <? endif; ?>
    
    
  </div>
</div>
<? $this->load->view('admin/partials/footer') ?>
<script>
  window.print();
</script>