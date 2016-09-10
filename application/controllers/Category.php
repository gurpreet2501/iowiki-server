<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Category extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');

	}



	function index($cat_id){

		if(!$cat_id)
			redirect('404');

 		 $data = get_category_name($cat_id);

		 $posts = category_posts($cat_id);
		

		 $this->load->view('post/category',array(

		 	'results' 		=> $posts,

		 	'category_name'	=> $data['category_name'],

		 	'total_results' => count($posts),

		 	'page'			=> 'search'

		 ));

	}



}

