<?php

function seo_url($post_name) {

    //Lower case everything

    $string = strtolower($post_name);

    //Make alphanumeric (removes all other characters)

    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

    //Clean up multiple dashes or whitespaces

    $string = preg_replace("/[\s-]+/", " ", $string);

    //Convert whitespaces and underscore to dash

    $string = preg_replace("/[\s_]/", "-", $string);

    return $string;

}



function read_comments($slug){

	return lako::get('objects')->get('dggsjm_comments')->read(array(

		'select' 	=>  array('name','user_email','comments','created_at'),

		'where'  	=>	array('post_slug', $slug),

		'order_by'	=> 	array('created_at','DESC')

	));

}



function insert_comments($data){

  // Hacking Prevention using htmlspecialchars

  foreach ($data as $key => $value) {

    $data[$key] =  htmlspecialchars($value);

  };

	$flag = lako::get('objects')->get('dggsjm_comments')->insert($data);

  	if(isset($flag['dggsjm_comments']))

  		 return true;



}



function get_most_visited($items_count=8){



    $CI = &get_instance();

    $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

    //Get the list of most visited posts

    if (!$most_visited = $CI->cache->get('most-visited-'.$items_count))

      {
          $most_visited = lako::get('objects')->get('dggsjm_posts')->read(array(
            'select'        =>  array('id','post_name','featured_image'),
            'pagination'    =>  array(
                  'per_page' => $items_count,
                  'page'     => 1
                ),
          'order_by'      =>  array('most_visited','DESC')
          ));

          $CI->cache->save('most-visited-'.$items_count, $most_visited, 60*60);

      }



  // foreach($most_visited['results'] as $key => $value){

  //    if(!$value['featured_image']) 

  //       $most_visited['results'][$key]['featured_image'] = 'sample.png';

  // }  

  return $most_visited['results'];



}

function increase_post_count($slug){

    $data = lako::get('objects')->get('dggsjm_posts')->read(array(

        'select'        =>  array('most_visited'),

        'where'         =>  array('post_slug', $slug)

    ));
      

    $inc = $data[0]['most_visited'] + 1;


    lako::get('objects')->get('dggsjm_posts')->update(array('most_visited' => $inc), array('post_slug', $slug)); 

}



function get_home_page_posts($page_no){
  

  $data = lako::get('objects')->get('dggsjm_posts')->read(array(

      'select'  =>  array('id','post_name','post_description', 'featured_image'),

      'order_by'  =>  array('id','DESC'),

      'where'   =>  array('post_status', 'Published'),  

      'pagination' => array(

              'per_page' => 5,

              'page' => $page_no,

            )

    ));
  
  return $data;



}



function get_post_by_slug($slug){

    $post_data = lako::get('objects')->get('dggsjm_posts')->read(array(

        'select'  => array('^*','dggsjm_tags.^*'),

        'where'   => array('post_slug', $slug)

      ));

    return $post_data[0] ? $post_data[0] : redirect(404);

}



function get_post_categories(){

  $cat = lako::get('objects')->get('dggsjm_categories')->read(array(

        'select'  => array('^*'),

        ));

  return $cat;

}


/* fetch category posts by id */

function category_posts($cat_id){

  
  $select = array('post_name','id','featured_image');

  $cat_posts = lako::get('objects')->get('dggsjm_posts')->read(array(

        'select'  => $select,

        'where'   => array('category_id' , $cat_id),

        'pagination' => array(

              'per_page' => 10,

              'page' => isset($_GET['page_no']) ? $_GET['page_no'] : 1,

            )

        ));


  return $cat_posts ? $cat_posts : [];

}

function get_category_name($id){

    $data = lako::get('objects')->get('dggsjm_categories')->read(array(

        'select'  => ['category_name','category_slug'],

        'where'   => array('id' , $id),
       )); 

    return $data[0];
}

function get_posts_by_tag($slug){
  

  $select = array('^*','dggsjm_posts.post_name','dggsjm_posts.id','dggsjm_posts.featured_image');

  $tag_posts = lako::get('objects')->get('dggsjm_tags')->read(array(

        'select'  => $select,

        'where'   => array('tag_slug' , $slug),

        ));

   return $tag_posts[0] ? $tag_posts[0] : redirect(404);

}


function get_post_meta($slug){
  $meta = lako::get('objects')->get('dggsjm_posts')->read(array(
    'select'  =>  array('meta_title','meta_desc','meta_keywords','meta_author'),
    'where'   =>  array('post_slug',$slug)
    ));
  return $meta[0];
}



function the_excert($string){

  $string = strip_tags($string);

  if (strlen($string) > 500) {

      // truncate string
      $stringCut = substr($string, 0, 500);

      // make sure it ends in a word so assassinate doesn't become ass...
      $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'.....'; 
  }
return $string;

}

function verify($challenge_field, $response_field){
    
    require_once('recaptcha/recaptchalib.php');
    $privatekey = "6LeloRcTAAAAAGacXIXpxSN-JpgIHraenUouxPkD";
    $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $challenge_field,
                                $response_field);

    if (!$resp->is_valid) {
      return false;
    } else {
      return true;
    }
  }
  
function redirect_old_wordpress_urls($url){
  $url = trim($url, '/');
  $meta = lako::get('objects')->get('dggsjm_posts')->read(array(
    'select'  =>  array('id'),
    'where'   =>  array('post_slug',$url)
  ));
  
  if(isset($meta[0]['id']))
    redirect(base_url('/post/'.$url));

}  

