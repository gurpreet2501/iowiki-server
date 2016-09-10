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
  <? foreach($orders['results'] as $order): ?>
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
          if(($order['status']=='Pending'))
            $slabel_type = 'danger';
          elseif($order['status']== 'Completed')
            $slabel_type = 'success';
          else
            $slabel_type = 'default';            
        ?>
        <span class="label label-<?=av($slabel_type)?>">
          <?=t($order['status'])?>
        </span>
      </td>
      <td><a href='<?=site_url("admin/order_details/{$order['id']}")?>' class='btn btn-sm btn-primary'>Details</a></td>
    </tr>
  <? endforeach; ?>
  </tbody>
</table>