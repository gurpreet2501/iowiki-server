<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

    public function index(){

    	$this->load->view('contact/index');

    }

    public function email(){

        $this->load->library('email');
        $this->email->from('info@iowiki.com', $_POST['name']);
        $this->email->to('er.gurpreetsingh@live.com','tech@iowiki.com'); 
        $this->email->cc('gupreet2501gmail.com'); 
        $this->email->subject('IOWIKI Queries');
        
        if(!verify($_POST['recaptcha_challenge_field'],$_POST['recaptcha_response_field'])){
            lako::get('flash')->set('failure',"Wrong Recaptcha Field");  //set in controller 
            redirect('/contact');

        }


        $message = '<b>Name</b>: '.$_POST['name'].'<br>';
        $message .= '<b>Email</b>: '.$_POST['email'].'<br>';
        $message .= '<b>Message</b>: '.$_POST['message'].'<br>';
      
        $this->email->message($message);  
        if($this->email->send()){
            lako::get('flash')->set('success',"Mail sent successfully");  //set in controller 
            redirect('/contact');
        }else{
            lako::get('flash')->set('failure',"Error in sending mail please try again..");  //set in controller 
            redirect('/contact');
        }
    }

}