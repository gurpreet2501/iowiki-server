<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Report-'.date('Y-m-d_H-i-s').'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, ['Plant-wise Summary of Orders']);

fputcsv($output, ['']);

$period = (($filters['from'] != '')  && ($filters['to'] != ''))
            ? date2($filters['from']).' to '.date2($filters['to'])
            : 'All Time';
    
    
fputcsv($output, ["Period: {$period}",' ',' ',' ','Dated: '.date1(date('Y-m-d H:i:s'))]);
fputcsv($output, ['']);

fputcsv($output, ['Plant Name','Total Orders','Pending Orders','Processing Orders',
                  'Shipped Orders','Cancelled Orders','Completed Orders']);

foreach($results as $result){
  fputcsv($output, [$result['plant_name'],$result['total'],$result['Pending'],$result['Processing'],
                    $result['Shipped'],$result['Canceled'],$result['Completed']]);
}

