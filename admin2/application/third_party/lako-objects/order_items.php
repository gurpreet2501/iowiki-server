<?php

lako::get('objects')->add_config('order_items',array(
  'table'     => 'order_items',
  'name'      => 'order_items',
  'pkey'      => 'id',
  'fields'    => array(),
  'relations' => array(
  
	  'product' => array(
      'type'    => 'M-1',
      'path'    => ['product_id','id'],
      'object'  => 'products'
		),
    
	  'discounts' => array(
      'type'    => '1-M',
      'path'    => ['id','order_item_id'],
      'object'  => 'order_items_discounts'
		),
    
		'taxes' => array(
      'type'    => '1-M',
      'path'    => ['id','order_item_id'],
      'object'  => 'order_items_taxes'
		),
  )
));