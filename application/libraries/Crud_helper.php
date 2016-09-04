<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_helper {

   public static function add_media(){

    return '<p>'.
            '<a target="_BLANK" href="'.site_url("settings/dggsjm_add_media").'" class="fancy iframe">Add Post Images</a>'.
          '</p>';

   }
}
