<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends MY_Controller
{
   function __construct(){
    parent::__construct();
      $this->load->database();
   }

    public function index(){
        // $this->view('Dashboard');
        redirect('/data/posts');

    }

    
    public function posts()
    {
      
        $crud = $this->crud_init('dggsjm_posts',['']);
        $crud->set_theme('flexigrid');
        $crud->where('post_status', 'Published');
        if($crud->getState() == 'add')
            $this->create_post_draft_and_edit();

        $crud->callback_before_update(array($this,'add_post_slug'));
        $crud->add_fields('meta_title','meta_desc','meta_keywords','meta_author','post_name','post_slug','post_description','add_media','featured_image','post_status','post_tags','created_at');
        $crud->set_field_upload('featured_image','../assets/uploads/files');  
        $crud->callback_field('add_media', 'Crud_helper::add_media');
        $crud->field_type('created_at', 'hidden', date('Y-m-d H:i:s'));
        $crud->field_type('user_id', 'hidden', 1);
        $crud->field_type('most_visited', 'hidden');
        $crud->columns('post_name','post_slug','post_description','post_status','featured_image');
        $crud->set_relation('category_id','dggsjm_categories','category_name');
        $crud->callback_field('post_tags', 'Crud_helper::add_tags');
        $crud->display_as('category_id','Category');
        $this->view_crud($crud->render(), 'Posts');

    }

      function add_post_slug($post_array)
      {
        
        $slug = $this->to_prety_url($post_array['post_name']);

        $post_array['post_slug'] = $slug;

        return $post_array;

      }

   private function create_post_draft_and_edit(){
    //Cleaning empty posts
    $this->db->delete('dggsjm_posts', array('post_name' => '','post_status' => 'Draft'));  

    $data = array(
              'post_status' => 'draft',
              'post_name' => '-GPS-',
    );

    $this->db->insert('dggsjm_posts', $data);
    $insert_id = $this->db->insert_id();
    redirect("data/posts/edit/".$insert_id);
  }

    // # $pkey is the post id
    public function add_post_tags($pkey)
    {
        $crud = $this->crud_init('dggsjm_tags',['tag_name','tag_slug']);
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
        $this->popup_view_crud($crud->render(), 'Tags');
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

  public function add_media($pkey)
    {
        $crud = $this->crud_init('dggsjm_add_media',[]);
        $crud->add_fields('file','media_url','post_id');
        $crud->field_type('post_id','hidden', $pkey);
        $crud->field_type('media_url','hidden');
        $crud->where('post_id',$pkey);
        $crud->set_theme('datatables');
        $crud->set_field_upload('file','../assets/uploads/files');
        $crud->callback_before_insert(array($this,'generate_url'));
        $this->view_crud($crud->render(), 'Media');
  }

  function generate_url($post_array)
  {
    
    $post_array['media_url'] = base_url('../assets/uploads/files/'.$post_array['file']); 
    return $post_array;
  }


   
}
