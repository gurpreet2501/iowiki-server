<?php

function convert_weight($from,$to,$weight){
  $func = strtolower(str_replace(' ','_',$from)).'_to_'.strtolower(str_replace(' ','_',$to));
  if(function_exists($func))
    return $func($weight);
  return -1;
}

function kilogram_to_metric_ton($num){
  return floatval($num)/1000;
}
function gram_to_metric_ton($num){
  return floatval($num)/1000000;
}
function milligram_to_metric_ton($num){
  return floatval($num)/1000000000;
}

function liter_to_kiloliter($num){
  return floatval($num)/1000;
}
function milliliter_to_kiloliter($num){
  return floatval($num)/1000000;
}

