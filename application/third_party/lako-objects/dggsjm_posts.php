<?php
lako::get('objects')->add_config('dggsjm_posts',array(
  "table"     => "dggsjm_posts",
  "name"      => "dggsjm_posts",
  "pkey"      => "id",
  "fields"    => array(),
  "relations" => array(
	"dggsjm_tags" => array(
	    "type"                => "N-M",
	    "path"                => ["id","post_id","tag_id","id"],
	    "connection_table"	  => "dggsjm_post_dggsjm_tags",
	    "object"              => "dggsjm_tags"
	    ),

	"dggsjm_comments" => array(
	    "type"                => "1-M",
	    "path"                => ["id","post_id"],
	    "object"              => "dggsjm_comments"
	   ),
	"dggsjm_categories" => array(
	    "type"                => "N-M",
	    "path"                => ["id","category_id","post_id","id"],
	    "connection_table"	  => "dggsjm_post_dggsjm_categories",
	    "object"              => "dggsjm_categories"
	    )

  	)
));