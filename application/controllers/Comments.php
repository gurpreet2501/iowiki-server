<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Comments extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('tank_auth');

	}



	function index()
	{
		if(empty($_POST)){
			redirect('/');
		}

		$url =  htmlspecialchars($_POST['post_url']);
		
		if(!verify($_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']))
		{
		 	    lako::get('flash')->set('failure',"Wrong Recatcha");
				redirect($url);
		}
		

        // validate_captcha($_POST); 
        unset($_POST['post_url']);
		unset($_POST['recaptcha_challenge_field']);
		unset($_POST['recaptcha_response_field']);

		if(insert_comments($_POST)){
		    lako::get('flash')->set('success',"Comment posted successfully");
			redirect($url);
		}
		
	}

	


}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */

