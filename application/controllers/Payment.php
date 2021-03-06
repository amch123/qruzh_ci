<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		if(!isset($_SESSION['id_user']))
		{
			session_destroy();

			redirect('/');
		}

		$this->session->set_userdata('account_button', '3');
		$this->session->set_userdata('account_button_client', '2');

		$data['settings'] = $this->setting_model->getSettings(1);
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
        			'tax' => $data['settings'][0]->tax,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter,
        			'paypal' => $data['settings'][0]->paypal
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
		if(isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 2))
		{
			$data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

			$id = $_SESSION['id_user'];

			$data = array(
					'id' => $id,
					'id_shop' => $data['shop'][0]->id_shop
				);
		}
		else
		{
			$data = array(
					'id' => '',
					'id_shop' => $_SESSION['id_shop']
				);
		}

		$data['payments'] = $this->payment_model->getPayments($data);

		$this->load->view('paymentcrud', $data);	
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
		if($_SESSION['id_role'] == 1)
		{
			$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shop' => $_SESSION['id_shop']
				);

			$data['orders'] = $this->order_model->getAcceptedOrders($data);
		}
		else
		{
			$data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

			$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shop' => $data['shop'][0]->id_shop
				);

			$data['orders'] = $this->order_model->getAcceptedOrders($data);
		}

		$this->load->view('addpayment', $data);
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
	public function getValues()
	{
		$id = $this->uri->segment(3);

		$data['order'] = $this->order_model->getOrder($id);

		if(count($data['order']) > 0) 
		{
			$_SESSION['id_order'] = $data['order'][0]->id_order;

			$_SESSION['total_amount'] = $data['order'][0]->total_amount;
		}

		redirect('/payment/create');
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

		$data['payment'] = $this->payment_model->getPayment($id);

		$data['orders_products'] = $this->orderproduct_model->getOrdersProducts($data['payment'][0]->id_order);
		
		$this->load->view('paymentdetail', $data);
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
		$data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

		$data = array(
					'id_order' => $_SESSION['id_order'],
					'id_user' => $_SESSION['id_user'],
					'id_shop' => $data['shop'][0]->id_shop,
					'id_payment_type' => 2,
					'status' => 2
				);

		$data['status'] = $this->payment_model->storePayment($data);

		if($data['status'] == true)
		{
			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/payment');
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

		$data['status'] = $this->payment_model->deletePayment($id);

		if($data['status'] == true)
		{
			$data = array(
						'delete_status' => '1',
						);

			

			$this->session->set_userdata($data);
		}

		redirect('account/payment');
	}
}
