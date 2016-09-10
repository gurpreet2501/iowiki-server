<? $this->load->view('admin/partials/header'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class='text-center'>
      <form class="form-inline">
        
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
            <option value="" <?=($status=='')?'selected':''?>>-- ANY STATUS --</option>
            <option value="Pending" <?=($status=='Pending')?'selected':''?>>Pending</option>
            <option value="Completed" <?=($status=='Completed')?'selected':''?>>Completed</option>
          </select>
        </div>
        
        <div class="form-group">
          <label class="sr-only" for="per_page">Records</label>
          <select type="email" class="form-control" id="per_page" name='filters[per_page]'>
            <option value="0">-- PER PAGE --</option>
            <option value="10" <?=(intval($filters['per_page'])==10)?'selected':''?>>10 Records Per Page</option>
            <option value="20" <?=(intval($filters['per_page'])==20)?'selected':''?>>20 Records Per Page</option>
            <option value="50" <?=(intval($filters['per_page'])==50)?'selected':''?>>50 Records Per Page</option>
            <option value="80" <?=(intval($filters['per_page'])==80)?'selected':''?>>80 Records Per Page</option>
            <option value="100" <?=(intval($filters['per_page'])==100)?'selected':''?>>100 Records Per Page</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success">Filter Results</button>
      </form>
    </div>
    <hr />
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Customer</th>
          <th>District</th>
          <th>Payment</th>
          <th>Date</th>
          <th>Status</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <? foreach($orders as $order): 
        
      $status = $order->status;

      ?>

        <tr>
          <th><?=t($order['id'])?></th>
          <td><?=t($order['customer']['full_name'])?></td>
          <td><?=t($order['customer']['district'])?></td>
          <td>
            <?
              $verified   = intval($order['payment_details']['verified']);
              $plabel_type = $verified?'success'   : 'danger';
              $plabel_text = $verified?'Verified'  : 'Not Verified';
            ?>
            <span class="label label-<?=av($plabel_type)?>"><?=t($plabel_text)?></span>
          </td>
          <td><?=date1($order['date'])?></td>
          <td>
            <?
              if(($status=='Pending'))
                $slabel_type = 'danger';
              elseif($status== 'Shipped')
                $slabel_type = 'success';
              else
                $slabel_type = 'default';            
            ?>
            <span class="label label-<?=av($slabel_type)?>">
              <?=t($status)?>
            </span>
          </td>
          <td><a href='<?=site_url("admin/export_order_detail/{$order['id']}")?>' class='btn btn-sm btn-primary'>Details</a></td>
        </tr>
      <? endforeach; ?>
      </tbody>
    </table>
    
    <? if(empty($orders)):?>
      <h3 class='text-center'>Sorry, No orders found.</h3>
    <? endif;?>
    
     <? if(!empty($orders)):
      $orders = $orders->toArray();
   
      ?>
      <h5 class='text-center'>
        Total <?=$orders['total']?> orders found. Showing page <?=$orders['current_page']?> of <?=$orders['last_page']?>
        <nav>
          <ul class="pager">
          <?php if(($orders['current_page'] <= $orders['last_page']) && $orders['current_page']!=1):?>
             <li><a href="<?=site_url('admin/all_export_orders'.$orders['prev_page_url'])?>">Previous</a></li>
           <?php endif;?>

             <?php if(($orders['last_page'] - $orders['current_page']) !=0):?>
                <li><a href="<?=site_url('admin/all_export_orders'.$orders['next_page_url'])?>">Next</a></li>
            <?php endif;?>
          </ul>
        </nav>    
    
      </h5>
<?php endif;?>
   
  </div>
</div>
<? $this->load->view('admin/partials/footer') ?>



