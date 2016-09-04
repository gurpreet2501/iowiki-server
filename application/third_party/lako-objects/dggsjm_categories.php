<?php
lako::get('objects')->add_config('dggsjm_categories',array(
  "table"     => "dggsjm_categories",
  "name"      => "dggsjm_categories",
  "pkey"      => "id",
  "fields"    => array(),
  "relations" => array(
  	"dggsjm_posts" => array(
	    "type"                => "N-M",
	    "path"                => ["id","category_id","post_id","id"],
	    "connection_table"	  => "dggsjm_post_dggsjm_categories",
	    "object"              => "dggsjm_posts"
	    )

  	)
));