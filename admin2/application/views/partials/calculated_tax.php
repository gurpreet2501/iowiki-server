<? if(!empty($calculated_tax)):
$currency = ($user_type == 'Export') ? '$' : 'Rs. ';
 ?>
  <table class="table">
    <tr>
      <th colspan='3'>Taxes</td>
    </tr>
    <? foreach($calculated_tax as $tax): ?>
    <tr>
      <td><?=t($tax['tax_title'])?></td>
      <td><?=t($tax['calculation'])?></td>
      <td><?=$currency?><?=t(number_format($tax['tax_amount'],2))?></td>
    </tr>
    <? endforeach; ?>
    <tr>
      <th colspan='2'>Total Tax</td>
      <th><?=$currency?><?=t(number_format($total_tax,2))?></td>
    </tr>
  </table>
<? endif; ?>