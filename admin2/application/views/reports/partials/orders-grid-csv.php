<?php

foreach($orders['results'] as $order){
  $verified   = intval($order['payment_details']['verified']);
  $plabel_text = $verified?'Verified'  : 'Not Verified';
        
  fputcsv($output, [
    $order['id'],
    $order['customer']['full_name'],
    $order['customer']['district'],
    $plabel_text,
    date1($order['date']),
    $order['status']
  ]);
}
  
  
  
  
  
  
  