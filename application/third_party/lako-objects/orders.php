<?php
lako::get('objects')->add_config('orders',array(
  "table"     => "orders",
  "name"      => "orders",
  "pkey"      => "id",
  "fields"    => array(),
  "relations" => array(
    "user_info" => array(
      "type"                => "M-1",
      "path"                => ["user_id","user_id"],
      "object"              => "user_info"
    ),	
    "users" => array(
      "type"                => "M-1",
      "path"                => ["user_id","id"],
      "object"              => "users"
    ), 
    "payment_details" => array(
      "type"                => "1-1",
      "path"                => ["id","order_id"],
      "object"              => "payment_details"
    )       
  	  
  )
));