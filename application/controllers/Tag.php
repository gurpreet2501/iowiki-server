<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Tag extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');

	}



	function index($tag){

		$slug = seo_url($tag);
		
		$data = get_posts_by_tag($slug);

		$this->load->view('post/tags',array(

		 	'results' 		=> $data['dggsjm_posts'],

		 	'tag_name'		=> $data['tag_name'],

		 	'total_results' => count($data['dggsjm_posts']),

		 	'page'			=> 'search'

		 ));

	}



}

