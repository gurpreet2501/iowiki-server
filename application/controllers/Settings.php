<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Settings extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->load->database();

		$this->load->helper('url');

		$this->load->library('tank_auth');

		$this->lang->load('tank_auth');

		if (!$this->tank_auth->is_logged_in()) 

		 	redirect('/auth/login/');

		$this->load->library('grocery_CRUD');

	}



	public function _example_output($output = null)

	{

		$this->load->view('example.php',$output);

	}



	public function offices()

	{

		$output = $this->grocery_crud->render();



		$this->_example_output($output);

	}



	public function index()

	{

		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

	}



	public function dggsjm_posts()

	{

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		$crud->set_table('dggsjm_posts');

		$crud->order_by('created_at','desc');

		$crud->required_fields('post_name','post_description');

		$crud->unique_fields('post_name');

		$crud->field_type('post_slug', 'hidden');

		$crud->fields('meta_title','meta_desc','post_slug','meta_keywords','meta_author','add_media','post_name','post_description','featured_image','post_status','post_categories','post_tags','created_at');

		$crud->callback_field('add_media','Crud_helper::add_media');

		$crud->columns('post_name','featured_image','post_slug');

		$crud->set_relation_n_n('post_categories','dggsjm_post_dggsjm_categories','dggsjm_categories','post_id','category_id','category_name');

		$crud->set_relation_n_n('post_tags','dggsjm_post_dggsjm_tags','dggsjm_tags','post_id','tag_id','tag_name');

		$crud->field_type('user_id', 'hidden', $this->tank_auth->get_user_id());

		$crud->callback_before_insert(array($this, 'generate_post_slug'));

		$crud->callback_after_insert(array($this, 'generate_sitemap_on_new_post_insert'));

		$crud->callback_after_update(array($this, 'generate_sitemap_on_new_post_insert'));

    	$crud->callback_before_update(array($this, 'generate_post_slug'));

		$crud->set_subject('Posts');

		$output = $crud->render();

		$this->_example_output($output);

	}


	function generate_sitemap_on_new_post_insert($post_array,$primary_key)
	{	

		Generate_sitemap::generate();
	 
	    return true;
	}

	function generate_post_slug($post_array,$primary_key)
	{	

		$post_array['post_slug'] = seo_url($post_array['post_name']);
	 
	    return $post_array;
	}



    public function dggsjm_categories()

    {

            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');

            $crud->set_table('dggsjm_categories');

            $crud->unique_fields('category_name');

            $crud->field_type('category_slug', 'hidden');
            
            $crud->callback_before_insert(array($this, 'generate_category_slug'));

            $crud->callback_before_update(array($this, 'generate_category_slug'));

            $crud->required_fields('category_name');

            $crud->set_subject('Categories');

            $output = $crud->render();

            $this->_example_output($output);

    }

    public function dggsjm_comments()

	{

			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');

			$crud->set_table('dggsjm_comments');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->columns('name','user_email','comments','post_slug');
            $crud->fields('name','user_email','comments','post_slug');
			
			$crud->set_subject('Comments');

			$output = $crud->render();

			$this->_example_output($output);

	}

	function generate_category_slug($post_array,$primary_key)
	{	

		$post_array['category_slug'] = seo_url($post_array['category_name']);
	 
	    return $post_array;
	}

	function tech_events()

	{

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		$crud->set_table('dggsjm_tech_events');

		$crud->required_fields('event_name');

		$crud->required_fields('date');

        $crud->order_by('start_date','desc');

		$crud->required_fields('location');

		$crud->required_fields('site_url');

		$crud->set_subject('Tech Events');

		$output = $crud->render();

		$this->_example_output($output);

	}



	function hiring_agencies()

	{

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		$crud->set_table('dggsjm_hiring_agencies');

		$crud->required_fields('company_name','url','company_logo');

		$crud->set_subject('Hiring Agencies');

		$crud->set_field_upload('company_logo','assets/uploads/files');

		$output = $crud->render();

		$this->_example_output($output);

	}



	function dggsjm_pages()

	{

		$crud = new grocery_CRUD();

		$crud->set_theme('datatables');

		$crud->set_table('dggsjm_pages');

		// $crud->unset_texteditor('description');

		$crud->required_fields('page_slug','page_name','disable');

		$crud->set_subject('Pages');

		$crud->set_field_upload('page_image','assets/uploads/files');

		$output = $crud->render();

		$this->_example_output($output);

	}



	public function dggsjm_add_media()

	{

		$crud = new grocery_CRUD();


		if($crud->getState()=='add')

			$crud->field_type('media_url', 'hidden');


		$crud->callback_before_insert(array($this,'read_file_name'));

		$crud->set_theme('datatables');

		$crud->set_table('dggsjm_add_media');

		$crud->order_by('id','desc');

		$crud->set_subject('File');

		$crud->callback_before_delete(array($this,'delete_thumb'));

		$crud->set_field_upload('file',"assets/uploads/files");

		$output = $crud->render();

		$this->_example_output($output);

	}

	function read_file_name($post_array)
	{
		$post_array['media_url'] = base_url('assets/uploads/files/'.$post_array['file']);	
		return $post_array;
	}

    function delete_thumb($primary_key)
	{
	   $data = 	lako::get('objects')->get('dggsjm_add_media')->read(array(
			 'select'  => array('file'),
			 'where'   => array('id',$primary_key)
			));

	   $file_path =  APPPATH.'/../assets/uploads/files/'.$data[0]['file'];

	    unlink($file_path);

	 

	   return true;

	  	



	}



	public function dggsjm_tags()

	{

			$crud = new grocery_CRUD();

			$crud->set_theme('datatables');

			$crud->set_table('dggsjm_tags');

			$crud->field_type('tag_slug', 'hidden');

			$crud->set_subject('Tags');

			$crud->callback_before_insert(array($this, 'generate_tags_slug'));

    		$crud->callback_before_update(array($this, 'generate_tags_slug'));

			$crud->required_fields('tag_name');

			$crud->unique_fields('tag_name');

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);

	}

	function generate_tags_slug($post_array,$primary_key)
	{	

		$post_array['tag_slug'] = seo_url($post_array['tag_name']);
	 
	    return $post_array;
	}

	

}