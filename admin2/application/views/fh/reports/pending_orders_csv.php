<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Report-'.date('Y-m-d_H-i-s').'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, ['ID','Customer','District','Payment','Date','Status']);
if(!intval($filters['plant'])){
  foreach($plants as $plant){
    fputcsv($output, [$plant['full_name']]);
    
    $orders_filtered = $orders;
    $orders_filtered['results'] = [];
    foreach($orders['results'] as $result)
      if($result['plant_id'] == $plant['id'])
        $orders_filtered['results'][] = $result;  
    
    if(empty($orders_filtered['results']))
      fputcsv($output, ['No Orders']);  
    else
      $this->load->view('fhcattlefeed/reports/partials/orders-grid-csv',['orders'=>$orders_filtered,'output'=>$output]);
  }
}else if(empty($orders['results']))
  fputcsv($output, ['Sorry, No orders found.']);  
else
  $this->load->view('fhcattlefeed/reports/partials/orders-grid-csv',['orders'=>$orders,'output'=>$output]);



