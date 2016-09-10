<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_helper {

   // public static function add_media(){

   //  return '<p>'.
   //          '<a target="_BLANK" href="'.site_url("settings/dggsjm_add_media").'" class="fancybox iframe">Add Post Images</a>'.
   //        '</p>';

   // }


     public static function add_tags($value='', $pkey=0){
      
      return '<a href="/settings/add_post_tags/'.$pkey.'" class="iframe fancybox">Add tags</a>';
  }

  public static function add_media($value='', $pkey=0){
      
      return '<a href="/settings/add_media/'.$pkey.'" class="iframe fancybox">Add Media</a>';
  }

}
