<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

	}
   
    public function index($slug, $id){
        
        $this->load->view('pages/index',array(
            'data'   => get_page($id),
            'page'   => 'pages'
        ));
    }

}