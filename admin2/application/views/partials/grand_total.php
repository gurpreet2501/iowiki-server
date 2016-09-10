<?php 
$currency = ($user_type == 'Export') ? '$' : 'Rs. ';
?>
  <table class="table">
    <tr>
      <th colspan='3'>Sub Total(inc taxes &amp; discounts) </td>
    </tr>
    <tr>
      <td><?=$currency?><?=t(number_format($ptotal,2))?></td> 
      <input type="hidden" class="sb_tot" name="sb_tot[]['val']" value="<?=$ptotal?>" >
    </tr>
  </table>
  