<?php

function get_cats_from_targets($targets){
  $cats = [];
  foreach($targets as $target)
    foreach($target['district_target'] as $cat)
      $cats[$cat['category']['id']] = $cat['category'];
  return $cats;
}

function fill_report_categories($dist_target, $cats ,$orders){
  $sales = [];
  foreach($cats as $cat){
    $sale = [
      'target'      => 0,
      'sale'        => 0,
      'percentage'  => 0
    ];
    if($target = cat_in_target($dist_target['district_target'],$cat)){
      $sale['sale'] = weight_ordered_in_district($target['district_id'],$target['category']['id'],$target['weight_unit'], $orders);
      $sale['target'] = number_format($target['target'],2) .' '. $target['weight_unit'];
      $sale['percentage'] = number_format((floatval($sale['sale'])/floatval($target['target'])) * 100,2).'%';
      $sale['sale'] = number_format($sale['sale'],2) .' '. $target['weight_unit'];
    }
    $sales[$cat['id']] = $sale;
  }
  return $sales;
}

function weight_ordered_in_district($district_id,$category_id,$weight_unit,$orders){

  get_instance()->load->helper('unit');
  $weight = 0;

  foreach($orders as $order){
    if($order['user']['district']['id'] != $district_id)
      continue;
    
    foreach($order['items'] as $item){
      if($item['product']['category'] != $category_id)
        continue;
      $weight += convert_weight($item['weight_unit'],$weight_unit,$item['weight']*$item['qty']);
    }
  }
  return $weight;
}


function cat_in_target($dist_targets,$cat){
  foreach($dist_targets as $target)
    if($target['category']['id'] == $cat['id'])
      return $target;
  return false;
}

function make_customer_target_report_friendly(&$dist_targets){
  $temp = [];
  foreach($dist_targets as $tk => $target){
    $disctrict_id = $target['customer']['district']['id'];
    
      $target['district_id'] = $disctrict_id;
      
    if(!isset($temp[$disctrict_id])){
      $temp[$disctrict_id] = $target['customer']['district'];
      $temp[$disctrict_id]['district_target'] = [];  
    }
    
    unset($target['customer']);
    
    $temp[$disctrict_id]['district_target'][] = $target;
  }
    
  $dist_targets = $temp;
}



function keep_plant_targets(&$targets, $plant_id){
  foreach($targets as $tk => $target)
    foreach($target['district_target'] as $dtk => $district_target)
      if($district_target['user_id'] != $plant_id)
        unset($targets[$tk]['district_target'][$dtk]);
}

