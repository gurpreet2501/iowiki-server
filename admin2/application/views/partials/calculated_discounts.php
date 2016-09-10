<? if(!empty($calculated_discounts)): 
$currency = ($user_type == 'Export') ? '$' : 'Rs. ';
?>
  <table class="table">
    <tr>
      <th colspan='3'>Discounts</td>
    </tr>
    <? foreach($calculated_discounts as $discount): ?>
    <tr>
      <td><?=t($discount['discount_title'])?></td>
      <td><?=t($discount['calculation'])?></td>
      <td><?=$currency?><?=t(number_format($discount['discount_amount'],2))?></td>
    </tr>
    <? endforeach; ?>
    <tr>
      <th colspan='2'>Total Discount</td>
      <th><?=$currency?><?=t(number_format($total_discount,2))?></td>
    </tr>
  </table>
<? endif; ?>