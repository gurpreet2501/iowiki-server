<?php
function get_prod_detail($id){
  $data = lako::get('objects')->get('products')->read(array(
    'select'  =>  array('product_name', 'weight_unit', 'weight','price' ,'id'),
    'where'   =>  array('id', $id)
  ));
  
  return $data[0];
}
