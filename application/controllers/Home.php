<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Home extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');
	}
	function index($page_no=1)
	{   
		
        //creating home page cache
		// $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$data = get_home_page_posts($page_no);
		// if (!$data = $this->cache->get('home-page-posts-'.$page_no))
		// {
		//     $this->cache->save('home-page-posts-'.$page_no, $data, 60*60);
		// }
	
		$this->load->view('home',array(

			'page' 			=> 'home',

			'posts'			=> $data['results'],

			'pagination'	=> $data['pagination'],

		)); 

	}

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */