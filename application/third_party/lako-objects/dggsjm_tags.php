<?php
lako::get('objects')->add_config('dggsjm_tags',array(
  "table"     => "dggsjm_tags",
  "name"      => "dggsjm_tags",
  "pkey"      => "id",
  "fields"    => array(),
  "relations" => array(
    "dggsjm_posts" => array(
        "type"                => "N-M",
        "path"                => ["id","tag_id","post_id","id"],
        "connection_table"    => "dggsjm_post_dggsjm_tags",
        "object"              => "dggsjm_posts"
        )
    )
));