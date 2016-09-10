<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Search extends CI_Controller

{

	function __construct()

	{

		parent::__construct();



		$this->load->helper('url');

		$this->load->library('tank_auth');

	}



	function index($page_no=1)

	{   
		

    $data = array();

		if(!$_GET['search_keyword']){

			lako::get('flash')->set('failure',"Please enter search keyword.");

			redirect('/');

		}
		
		$data = lako::get('objects')->get('dggsjm_posts')->read(array(

			'select' 	=>  array('^*'),

			'where'		=>  array('post_name','LIKE',"%".htmlspecialchars($_GET['search_keyword'])."%"),

			'pagination' => array(

							'per_page' => 10,

							'page' => $page_no,

			)

		));

		

		$this->load->view('post/search',array(

			'results' 		=> $data['results'],

			'page' 			=> 'search',

			'pagination'	=> $data['pagination']

		));

		

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */