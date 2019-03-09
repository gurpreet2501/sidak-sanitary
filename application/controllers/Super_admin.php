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

	function bill_preview(){

		if(empty($_POST))
			return 404;

		if(empty($_POST['party']) && empty($_POST['party_name_for_addition'])){
			failure('Party Name is required');
			redirect('super_admin/create_bill');
		}
		$freight_charges = 0;
		if(!empty($_POST['freight_charges']))
			$freight_charges = $_POST['freight_charges'];
		$party_id = 0;
		$party_name = '';
    if(!empty($_POST['party'])){
			$party_id = $_POST['party'];
			$par = Models\Parties::find($party_id);
			$party_name = $par->name; 
		
    }
		
		else if(!empty($_POST['party_name_for_addition'])){

			$party_name = trim($_POST['party_name_for_addition']);
			
			$resp = Models\Parties::where('name', $party_name)->first();

			if(!$resp)
				$resp = Models\Parties::create([
					'name' => $party_name
				]);

			$party_id = $resp->id;
		}

	
		$items = $_POST['item'];
		foreach ($items as $key => $item) {
      			
      			if($item['item_id']<=0)
      				continue;

				$items[$key]['item_details'] = Models\Items::find($item['item_id']);

		}		
		
		$this->load->view('super_admin/bill_preview',[
			'items' => $items,
			'party_name' => $party_name,
			'party_id' => $party_id,
			'freight_charges' => $freight_charges,
			'bill_date' => $_POST['bill_date']
		]);
		
	}

	public function bill_printing($bill_id){
	
		$bill_details = Models\Bill::with('billingItems.items')->find($bill_id);
		$data['css_files'] = [base_url('assets/css/billing/style.css')];
		$data['bill_details'] = $bill_details;
		 $this->load->view('billing/billing-template', $data);
	
	}

	function generate_bill(){
			
		 if(empty($_POST))
		  return 404;

		 $bill_id = bill_processing($_POST);
	
		 return redirect('super_admin/bill_printing/'.$bill_id);
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



