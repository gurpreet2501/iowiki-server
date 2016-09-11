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
 
  // New code 

	 public function posts()
    {
      	
    		$crud = new grocery_CRUD();
        // $crud->where('post_status', 'Published');
        if($crud->getState() == 'add')
            $this->create_post_draft_and_edit();

       	$crud->set_table('dggsjm_posts');  
        $crud->field_type('meta_author','hidden','Simranjot Kaur');
        $crud->callback_before_update(array($this,'add_post_slug'));
        $crud->add_fields('meta_title','meta_desc','meta_keywords','meta_author','post_name','post_slug','post_description','add_media','featured_image','post_status','post_tags','created_at');
        $crud->set_field_upload('featured_image','assets/uploads/files');  
        $crud->callback_field('add_media', 'Crud_helper::add_media');
        $crud->field_type('created_at', 'hidden', date('Y-m-d H:i:s'));
       	$crud->callback_after_insert(array($this, 'generate_sitemap_on_new_post_insert'));
        $crud->field_type('user_id', 'hidden', 1);
        $crud->field_type('most_visited', 'hidden');
        $crud->columns('post_name','post_description','post_status','featured_image');
        $crud->set_relation('category_id','dggsjm_categories','category_name');
        $crud->callback_field('post_tags', 'Crud_helper::add_tags');
        $crud->display_as('category_id','Category');
  			$output = $crud->render();
	    	$this->_example_output($output);

    }

      function add_post_slug($post_array)
      {
        
        $slug = $this->to_prety_url($post_array['post_name']);

        $post_array['post_slug'] = $slug;

        return $post_array;

      }
    // # $pkey is the post id
    public function add_post_tags($pkey)
    {    
        $crud = new grocery_crud();
        $crud->set_table('dggsjm_tags');        	
        $crud->field_type('post_id','hidden', $pkey);
        $crud->unique_fields('tag_name');
        $crud->field_type('tag_slug','hidden');
        $crud->required_fields('tag_name');
        $crud->where('post_id',$pkey);
        $crud->callback_before_delete(array($this,'delete_everywhere'));
        $crud->callback_after_insert(array($this, 'add_tag_value_in_m_to_n_relation'));
        $crud->callback_before_insert(array($this, 'add_tag_slug'));
        $crud->callback_before_update(array($this,'add_tag_slug'));
        $crud->set_theme('datatables');
        $output = $crud->render();
        $this->load->view('crud-popup.php',$output);
    }

      public function delete_everywhere($primary_key)
      { 
        $row = $this->db->get_where('dggsjm_tags', array('id' => $primary_key))->row();
      
        return $this->db->delete('dggsjm_post_dggsjm_tags', array('tag_id' => $primary_key, 'post_id' => $row->post_id));  
      }
     

    function add_tag_value_in_m_to_n_relation($post_array, $primary_key)
    {
      
      $data = array(
              'post_id' => $post_array['post_id'],
              'tag_id' => $primary_key,
      );

      $this->db->insert('dggsjm_post_dggsjm_tags', $data); 

      $slug = $this->to_prety_url($post_array['tag_name']);

      $post_array['tag_slug'] = $slug;

      return $post_array;

    }

    function add_tag_slug($post_array)
    {
      
      $slug = $this->to_prety_url($post_array['tag_name']);

      $post_array['tag_slug'] = $slug;

      return $post_array;

    }

    function to_prety_url($str){
      if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )
        $str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));
      $str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');
      $str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);
      $str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');
      $str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);
      $str = strtolower( trim($str, '-') );
      return $str;
    }


    public function dggsjm_categories()

    {

            $crud = $this->crud_init('dggsjm_categories',['category_name']);

            $crud->set_theme('datatables');

            $crud->unique_fields('category_name');

            $crud->field_type('category_slug', 'hidden');
            
            $crud->callback_before_insert(array($this, 'generate_category_slug'));

            $crud->callback_before_update(array($this, 'generate_category_slug'));

            $crud->required_fields('category_name');

            $crud->set_subject('Categories');

            $this->view_crud($crud->render(), 'Categories');

    }
    
  public function dggsjm_comments()

  {

      $crud = $this->crud_init('dggsjm_comments',['name','user_email','comments','post_slug']);

      $crud->set_theme('datatables');
      $crud->unset_add();
      $crud->unset_edit();

      $crud->set_subject('Comments');

      $this->view_crud($crud->render(), 'Comments');

  }

  public function add_media($pkey=null)
    {   
    		$crud = new grocery_CRUD();
    	 	$crud->set_table('dggsjm_add_media');
        $crud->add_fields('file','media_url','post_id');
        $crud->field_type('post_id','hidden', $pkey);
        $crud->field_type('media_url','hidden');
        $crud->where('post_id', $pkey);
        $crud->set_theme('datatables');
        $crud->set_field_upload('file','assets/uploads/files');
        $crud->callback_before_insert(array($this,'generate_url'));
        $output = $crud->render();
		    $this->load->view('crud-popup.php',$output);
  }

  function generate_url($post_array)
  {
    
    $post_array['media_url'] = base_url('../assets/uploads/files/'.$post_array['file']); 
    return $post_array;
  }


// New code ends


	
  private function create_post_draft_and_edit(){
    //Cleaning empty posts
    $this->db->delete('dggsjm_posts', array('post_name' => '-DGGSJM-','post_status' => 'Draft'));  

    $data = array(
              'post_status' => 'draft',
              'post_name' => '-DGGSJM-',
    );

    $this->db->insert('dggsjm_posts', $data);
    $insert_id = $this->db->insert_id();
    redirect("settings/posts/edit/".$insert_id);
  }




	function generate_sitemap_on_new_post_insert($post_array,$primary_key)
	{	

		Generate_sitemap::generate();
	 
	    return true;
	}

	function generate_post_slug($post_array, $primary_key)
	{	

		$post_array['post_slug'] = seo_url($post_array['post_name']);
	 
	    return $post_array;
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

	public function crud_init($table, $col = Null)
    {
        $crud = new grocery_CRUD();
        $crud->set_table($table)->unset_print()->unset_export()->unset_texteditor(true);

        if ($col !== null){
            $crud->columns($col);
        }

        return $crud;
    }

       /* Load curd view
    */
    function view_crud($output, $heading = '', $base = 'example')
    {
        if  (!property_exists($output, 'css_files')){
            $output->css_files = [];
        }
        if  (!property_exists($output, 'js_files')){
            $output->js_files = [];
        }
        if  (!property_exists($output, 'output')){
            $output->output = '';
        }
         
        $output->heading = $heading;
        
         if(empty($output->template))
            $output->template = 'crud';
        $this->load->view($base, $output);
    }


}