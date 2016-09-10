<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Report-'.date('Y-m-d').'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, ['Total Stock Report of All Products']);

fputcsv($output, ['ID','Product Name','Stock','Ordered Quantity','Shipped Quantity','Pending Shipping']);
foreach($data as $test){
   fputcsv($output, [
    $test['id'],
    $test['product_name'],
    $test['stock'],
    $test['ordered_qty'],
    $test['shipped_qty'],
    $test['pending_shipping'],
  ]);
}
  

?>

