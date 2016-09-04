<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Post extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');

	}

	function index($post_name)

	{   

		$post_slug = seo_url($post_name);

		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		
		if ($_SERVER['REMOTE_ADDR'] == '117.205.62.128'):
          increase_post_count($post_slug); // Incrementing post visits by visitor
		endif;

	    $post_data = get_post_by_slug($post_slug);
        
		$this->load->view('post/single-post',array(
			'page' 			=> 'single-post',	
			'single_post'	=> $post_data,
			 'comments'		=> read_comments($post_slug)
		));
	}
}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */

