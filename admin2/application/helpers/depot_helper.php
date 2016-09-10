<?php

function get_depots_list($plant_id){
  return obj('users')->read([
    'select' => ['id','username'],
    'where'   =>['role','depot'],
  ]);
}