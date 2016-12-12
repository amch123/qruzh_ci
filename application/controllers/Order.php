<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		if(!isset($_SESSION['id_user']))
		{
			session_destroy();

			redirect('/');
		}

		//////////
		
		$this->session->set_userdata('button', '0');
		$this->session->set_userdata('account_button', '2');
		$this->session->set_userdata('account_button_client', '1');

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
		if(isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 2))
		{
			$id = $_SESSION['id_user'];
		}
		else
		{
			$id = "";
		}

		$data['orders'] = $this->order_model->getOrders($id);

		$this->load->view('ordercrud', $data);
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
		$id = $this->uri->segment(4);

		$data['statuses'] = $this->orderstatus_model->getOrderStatuses();

		$data['order'] = $this->order_model->getOrder($id);

		$data['orders_products'] = $this->orderproduct_model->getOrdersProducts($id);

		$this->load->view('orderdetail', $data);
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
		$data['status'] = $this->orderstatus_model->updateStatus($this->input->post());
		
		if($data['status'] == true)
		{
			$data = array(
						'update_status' => '1',
					);

			$this->session->set_userdata($data);
		}
		
		redirect('account/order');
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
		$tax = ($this->shop1->total_cart() * 12)/100;

		$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shipping_company' => $_SESSION['id_shipping_company'],
					'subtotal' => $this->shop1->total_cart(),
					'total_tax' => $tax,
					'total_shipping' => $_SESSION['shipping_price'],
					'total_amount' => $tax + $_SESSION['shipping_price'] + $this->shop1->total_cart()
				);

		$id_order = $this->order_model->storeOrder($data);

		$data = array(
					'id_order' => $id_order,
					'name' => $this->input->post('name'),
					'lastname' => $this->input->post('lastname'),
					'adress' => $this->input->post('adress'),
					'city' => $this->input->post('city'),
					'phone' => $this->input->post('phone')
				);

		$data['status'] = $this->order_model->storeOrderShipping($data);

		if($data['status'] == true)
		{
			foreach($this->shop1->get_content() as $items) {
				$data = array(
					'id_order' => $id_order,
					'id_product' => $items['id'],
					'quantity' => $items['qty']
				);

				$data['status'] = $this->order_model->storeOrderProduct($data);
			}

			$this->shop1->destroy();


			/////////

			////////
			
			$data = array(
						'placed_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/order');
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

		$data['payment'] = $this->payment_model->getPayment($id);

		if($data['payment'] == "")
		{
			$data['status'] = $this->order_model->deleteOrder($id);

			if($data['status'] == true)
			{
				$data = array(
							'delete_status' => '1',
						);

				$this->session->set_userdata($data);
			}

			redirect('account/order');
		}
		else
		{

			$data = array(
						'delete_status' => '2',
					);

			$this->session->set_userdata($data);
			
			redirect('account/order');
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
	public function checkout()
	{
		if(isset($_SESSION['id_user']))
		{
			$this->load->view('checkout');
		}
		else
		{
			redirect('login/checkout');
		}
	}
}
