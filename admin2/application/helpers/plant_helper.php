<?php
function plant_settings($key = false){
  global $__plant_settings;

  if(!$__plant_settings){
    $__plant_settings = obj('store_settings')->read(['select' => ['^*'],
                                                     'where'  => ['plant_id', plant()]]);
    $__plant_settings = isset($__plant_settings[0]) ? $__plant_settings[0] : '';
  }

  if($key){
    if(isset($__plant_settings[$key]))
      return $__plant_settings[$key];
    return null;
  }
  return $__plant_settings;
}

function plant($var = 'id'){
  global $plant;
  if($plant)
    return $plant[$var];

  if(($plant = lako::get('session')->get('plant')))
    return $plant[$var];
  return '';
}

function plant_set($in_plant){
  global $plant;
  $plant = $in_plant;
  lako::get('session')->set('plant',$in_plant);
  redirect('home');
}

function plant_set_by_id($in_plant_id, &$status){
  $plants = obj('users')->read(['select' => ['full_name','id'],
                               'where'  => ['id',$in_plant_id]]);
  $status = true;
  if(empty($plants)){
    $status = false;
    return;
  }
  return plant_set($plants[0]);
}



function plant_categories(){
  $plant_id = plant();
  if(!$plant_id)
    return array();
  return obj('categories')->read(array(
          'select'  => array('^*'),
          'where'   => array('added_by',$plant_id)
         ));
}


function plant_id_to_name($id){
  $plant_names = [
    12 => 'kapurthala',
    16 => 'khanna'
  ];
  return isset($plant_names[$id])? $plant_names[$id]: '';
}


function plant_home_func($id=0){
  $p_id = $id;
  if(!$id)
    $p_id = plant();
  return 'home_'.plant_id_to_name($p_id);
}

function current_user_price($product){
  $user_cat = user_category();
  foreach($product['customer_category_price'] as $cat){
    if($cat['customer_category_id'] == $user_cat->id)
      return $cat['price'];
  }

  return $product['price'];
}

function get_plants_list(){
    return obj('users')->read(array(
          'select'  => array('id','username'),
          'where'   => array('role','plant_manager')
    ));
}

function plant_force(){
  if(!plant())
    redirect('plant');
}