<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use App\Libs\RestPaginator;

use Illuminate\Pagination\Paginator;

class Super_admin extends CI_Controller { 

	public function __construct(){
		parent::__construct();
    $this->load->library('grocery_CRUD');
  
    if(user_role() != 'SUPER_ADMIN')
    	redirect('auth/logout');
	}



	public function _example_output($output = null)
	{
		$this->load->view('crud.php',(array)$output);
	}


 	public function index($lang=false){

  	return	$this->load->view('super_admin/index');

  }

		public function add_items()
	{
			
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->columns('name','sku','color_id','price','stock');
			$crud->set_relation('color_id','sidak123_colors','name');
			$crud->set_relation('category_id','sidak123_item_categories','name');
			$crud->set_table('sidak123_items');
			$crud->display_as('color_id','Color');
			$crud->display_as('category_id','Product Category');
			$crud->field_type('created_at','hidden', date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden', date('Y-m-d H:i:s'));
	    $output = $crud->render();
			$this->_example_output($output);

	} 



	public function add_colors()
	{
			
			$crud = new grocery_CRUD();
		
			$crud->set_theme('bootstrap');
			$crud->set_table('sidak123_colors');
			$crud->field_type('created_at','hidden', date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden', date('Y-m-d H:i:s'));
	    $output = $crud->render();
			$this->_example_output($output);

	} 

	public function add_category()
	{
			
			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->set_table('sidak123_item_categories');
			$crud->field_type('created_at','hidden', date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden', date('Y-m-d H:i:s'));
	    $output = $crud->render();
			$this->_example_output($output);

	} 

	
	public function create_bill()
	{
			
		$data['parties'] = Models\Parties::get();
		
		$data['items'] = Models\Items::get();

		$data['js_files'] = [
			base_url('assets/js/jquery-ui.min.js'),
			base_url('assets/js/billing-form.js'),
		];

		$data['css_files'] = [
			base_url('assets/css/jquery-ui.min.css')
		];

		$data['for_js'] = [
			'allItems' => $data['items']
		];

		$this->load->view('super_admin/create_bill',$data);

	} 

	

	function on_update_encrypt_password_callback($post_array){

		if($post_array['password'] != '__DEFAULT_PASSWORD_'){
      $password=$post_array['password'];
			$hasher = new PasswordHash(
	    		$this->config->item('phpass_hash_strength', 'tank_auth'),
		    	$this->config->item('phpass_hash_portable', 'tank_auth')
			);

			$post_array['password'] = $hasher->HashPassword($password);
			$post_array['activated'] = 1;
			return $post_array;
		}

		unset($post_array['password']);
		return $post_array;
	}


  function edit_password_callback($post_array){
		return '<input type="password" class="form-control" value="__DEFAULT_PASSWORD_" name="password" style="width:462px">';
	}





}



