<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Generate_sitemap {

   public static function generate(){

    	$t = require_once('Sitemap.php');
    	

    	$sitemap = new Sitemap('http://iowiki.com');   
    	$sitemap->setPath('sitemap/');
    	$sitemap->setFilename('iowiki');

   		
    	foreach (Generate_sitemap::get_posts() as $key => $value) {
    		$sitemap->addItem('/post/'.seo_url($value['post_name']), '1.0', 'daily', 'Today');
    	}

      foreach (Generate_sitemap::get_tags() as $key => $value) {
        $sitemap->addItem('/tag/'.seo_url($value['tag_name']), '1.0', 'daily', 'Today');
      }

      foreach (Generate_sitemap::get_categories() as $key => $value) {
    		$sitemap->addItem('/category/'.seo_url($value['category_name']), '1.0', 'daily', 'Today');
    	}

    	$sitemap->setDomain('http://iowiki.com');
    	$sitemap->createSitemapIndex('http://iowiki.com/sitemap/', 'Today');

   }

   public static function get_posts(){
   		return  lako::get('objects')->get('dggsjm_posts')->read(array(
   			'select' => array('id','post_name')
   		));
   }
   public static function get_tags(){
      return  lako::get('objects')->get('dggsjm_tags')->read(array(
        'select' => array('^*')
      ));
    }
   public static function get_categories(){
   		return  lako::get('objects')->get('dggsjm_categories')->read(array(
   			'select' => array('^*')
   		));

   }
}
