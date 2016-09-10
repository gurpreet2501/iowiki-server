<? $this->load->view('admin/partials/header'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class='text-center'>
      <form class="form-inline">
        
        <div class="form-group">
          <label class="sr-only" for="order">Plant</label>
          <select type="email" class="form-control" id="order" name='filters[plant]'>
            <option value="0" >All Plants</option>
            <? foreach($plants as $plant): ?>
              <option value="<?=av($plant['id'])?>" <?=($filters['plant']==$plant['id'])?'selected':''?>>
                <?=t($plant['full_name'])?>
              </option>
            <? endforeach; ?>
          </select>
        </div>
        
        <div class="form-group">
          <label class="sr-only" for="order">Sort</label>
          <select type="email" class="form-control" id="order" name='filters[order]'>
            <option value="latest" <?=($filters['order']=='latest')?'selected':''?>>Latest First</option>
            <option value="oldest" <?=($filters['order']=='oldest')?'selected':''?>>Oldest First</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="sr-only" for="status">Status</label>
          <select type="email" class="form-control" id="status" name='filters[status]'>
            <option value="0">-- ANY STATUS --</option>
            <option value="Pending" <?=($filters['status']=='Pending')?'selected':''?>>Pending</option>
            <option value="Processing" <?=($filters['status']=='Processing')?'selected':''?>>Processing</option>
            <option value="Shipped" <?=($filters['status']=='Shipped')?'selected':''?>>Shipped</option>
            <option value="Canceled" <?=($filters['status']=='Canceled')?'selected':''?>>Canceled</option>
            <option value="Completed" <?=($filters['status']=='Completed')?'selected':''?>>Completed</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="sr-only" for="per_page">Records</label>
          <select type="email" class="form-control" id="per_page" name='filters[per_page]'>
            <option value="0">-- PER PAGE --</option>
            <option value="-1" <?=(intval($filters['per_page'])==-1)?'selected':''?>>All Records</option>
            <option value="10" <?=(intval($filters['per_page'])==10)?'selected':''?>>10 Records Per Page</option>
            <option value="20" <?=(intval($filters['per_page'])==20)?'selected':''?>>20 Records Per Page</option>
            <option value="50" <?=(intval($filters['per_page'])==50)?'selected':''?>>50 Records Per Page</option>
            <option value="80" <?=(intval($filters['per_page'])==80)?'selected':''?>>80 Records Per Page</option>
            <option value="100" <?=(intval($filters['per_page'])==100)?'selected':''?>>100 Records Per Page</option>
          </select>
        </div>
        <hr />
        <div class="form-group">
          <label class="sr-only" for="from">From Date</label>
          <input type='text' name='filters[from]' id='from' class="form-control date-input input-sm" placeholder="From Date" value='<?=av($filters['from'])?>' />
        </div>
        <div class="form-group">
          - to -
        </div>
        <div class="form-group">
          <label class="sr-only" for="to">To Date</label>
          <input type='text' name='filters[to]' id='to' class="form-control date-input input-sm" placeholder='To date'
          value='<?=av($filters['to'])?>' />
        </div>
        
        
        <button type="submit" class="btn btn-success">Filter Results</button>
      </form>
    </div>
    <hr />
    
    <div class="text-center">
      <a  target="__blank"
          href='<?=site_url('fh/reports/pending_orders/print_version/?'.http_build_query(['filters'=>$filters]))?>' 
          class='btn btn-primary'>Print</a>
      <a  href='<?=site_url('fh/reports/pending_orders/csv?'.http_build_query(['filters'=>$filters]))?>' 
          class='btn btn-primary'>Download CSV</a>
    </div>
    
    
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
          <? $this->load->view('fhcattlefeed/reports/partials/orders-grid',['orders'=>$orders_filtered]); ?>
        <? endif; ?>
          
      <? endforeach; ?>
    <? else: ?> 
      <? $this->load->view('fhcattlefeed/reports/partials/orders-grid',['orders'=>$orders])?>  
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
              $prev_link = site_url('fh/reports/pending_orders').'?'.http_build_query($prev_link);  
            ?>
            <li><a href="<?=av($prev_link)?>">Previous</a></li>
          <? endif; ?>
          <? if($orders['pagination']['next']): ?>
            <?
              $next_link = ['filters'=>$filters];
              $next_link['filters']['page'] = $orders['pagination']['next'];  
              $next_link = site_url('fh/reports/pending_orders').'?'.http_build_query($next_link);  
            ?>
            <li><a href="<?=av($next_link)?>">Next</a></li>
          <? endif; ?>
        </ul>
      </nav>
    <? endif; ?>
  </div>
</div>
<? $this->load->view('admin/partials/footer') ?>



