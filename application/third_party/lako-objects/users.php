<?php
lako::get('objects')->add_config('users',array(
  "table"     => "users",
  "name"      => "users",
  "pkey"      => "id",
  "fields"    => array(),
  "relations" => array(
    "user_info" => array(
      "type"                => "1-1",
      "path"                => ["id","user_id"],
      "object"              => "user_info",
      "holds_foreign_key"   => 0
		),	
    "orders" => array(
      "type"                => "1-M",
      "path"                => ["id","user_id"],
      "object"              => "orders"
		)				  
  )
));