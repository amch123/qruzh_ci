<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('button', '0');
		$this->session->set_userdata('account_button', '1');

		$data['settings'] = $this->setting_model->getSettings(1);
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
        			'tax' => $data['settings'][0]->tax,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter
					);

		$this->session->set_userdata($setting_data);

		$this->shop1 = new Udp_cart("shop1");

		$_SESSION['url'] = $_SERVER["REQUEST_URI"];

		$_SESSION['states'] = $this->state_model->getStates();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$url = $this->uri->segment(1);

		if($url == "account")
		{
			$data = array(
					'id_shop' => $_SESSION['id_shop']
				);

			$data['products'] = $this->product_model->getProducts($data);

			$this->load->view('productcrud', $data);
		}
		else
		{
			$data['categories'] = $this->category_model->getCategories();

			$this->session->set_userdata('button', '3');

			$this->load->library('pagination');

			$config["base_url"] = base_url() . "index.php/product/page";
        	$config["total_rows"] = $this->product_model->totalProducts();

			$config["per_page"] = 20;
			$config['num_links'] = 4;
        
	        $config['full_tag_open'] = '<ul class="pagination pull-right">';
	        $config['full_tag_close'] = '</ul>';
	        $config['first_link'] = false;
	        $config['last_link'] = false;
	        $config['first_tag_open'] = '<li>';
	        $config['first_tag_close'] = '</li>';
	        $config['prev_link'] = '&laquo';
	        $config['prev_tag_open'] = '<li class="prev">';
	        $config['prev_tag_close'] = '</li>';
	        $config['next_link'] = '&raquo';
	        $config['next_tag_open'] = '<li>';
	        $config['next_tag_close'] = '</li>';
	        $config['last_tag_open'] = '<li>';
	        $config['last_tag_close'] = '</li>';
	        $config['cur_tag_open'] = '<li class="active"><a href="#">';
	        $config['cur_tag_close'] = '</a></li>';
	        $config['num_tag_open'] = '<li>';
	        $config['num_tag_close'] = '</li>';


	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	        $data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

			$id = $_SESSION['id_user'];

			$data = array(
					'id_shop' => $data['shop'][0]->id_shop
				);

	        $data['products'] = $this->product_model->getProducts($data['shop'][0]->id_shop, $config["per_page"], $page);

        	$data["links"] = $this->pagination->create_links();

        	$data["total"] = $this->product_model->totalProducts();

        	$data["start"] = $this->product_model->totalProducts()/$config["per_page"];

        	$data["limit"] = $config["per_page"];

			$this->load->view('product', $data);
		}	
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function search()
	{
		$data['categories'] = $this->category_model->getCategories();

		$this->session->set_userdata('button', '3');

		if($this->input->post('search') != "")
		{
			$data['products'] = $this->product_model->searchProducts($this->input->post('search'));

			$this->load->library('pagination');

			$config["base_url"] = base_url() . "index.php/product/search/".$this->input->post('search')."/page";
        	$config["total_rows"] = $this->product_model->totalProducts();
    	}
    	else
    	{
    		$search = $this->uri->segment(3);
    		
			$data['products'] = $this->product_model->searchProducts($search);

			$this->load->library('pagination');

			$config["base_url"] = base_url() . "index.php/product/search/".$search."/page";
        	$config["total_rows"] = $this->product_model->totalProducts();
    	}

        $config["per_page"] = 20;
        $config['num_links'] = 4;
        
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data["links"] = $this->pagination->create_links();

		$this->load->view('product', $data);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function show()
	{
		$this->session->set_userdata('button', '3');

		$id = $this->uri->segment(3);

		$data['product'] = $this->product_model->getProduct($id);
		
		$this->load->view('productdetail', $data);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function create()
	{
		$data['categories'] = $this->category_model->getCategories();

		$data['shops'] = $this->shop_model->getShops();

		$this->load->view('addproduct', $data);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function edit()
	{
		$id = $this->uri->segment(4);

		$data['product'] = $this->product_model->getProduct($id);

		$data['categories'] = $this->category_model->getCategories();

		$this->session->set_userdata(array('image' => $data['product'][0]->image));

		$this->load->view('editproduct', $data);
	}

	/**
	 * Update Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/category/destroy/{$id}
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function update()
	{
		$data['status'] = $this->product_model->updateProduct($this->input->post());
		
		if($data['status'] == true)
		{
			$data = array(
						'update_status' => '1',
					);

			$this->session->set_userdata($data);
		}
		
		redirect('account/product/edit/'.$this->input->post('id_product'));
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function store()
	{
		$data = array(
					'id_shop' => $_SESSION['id_shop'],
					'id_category' => $this->input->post('id_category'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'unit_price' => $this->input->post('unit_price'),
					'wholesale_price' => $this->input->post('wholesale_price'),
					'stock' => $this->input->post('stock'),
					'image' => $_SESSION['image']
				);

		$data['status'] = $this->product_model->storeProduct($data);

		if($data['status'] == true)
		{
			copy('./pre_uploads/'. $_SESSION['image'], './uploads/'. $_SESSION['image']);

			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/product');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function destroy()
	{
		$id = $this->uri->segment(4);

		$data['status'] = $this->product_model->deleteProduct($id);

		if($data['status'] == true)
		{
			$data = array(
						'delete_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/product');
	}
}
