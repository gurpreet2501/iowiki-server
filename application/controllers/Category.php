<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Category extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');

	}



	function index($cat){

		

		 $data = category_posts($cat);

      

		 $this->load->view('post/category',array(

		 	'results' 		=> $data['dggsjm_posts'],

		 	'category_name'	=> $data['category_name'],

		 	'total_results' => count($data['dggsjm_posts']),

		 	'page'			=> 'search'

		 ));

	}



}

