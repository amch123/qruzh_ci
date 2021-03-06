<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '4');
		$this->session->set_userdata('account_button_client', '3');

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
		if(isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 2))
		{
			$data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

			$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shop' => $data['shop'][0]->id_shop
				);
		}
		else
		{
			$data = array(
					'id_user' => '',
					'id_shop' => $_SESSION['id_shop']
				);
		}

		$data['shippings'] = $this->shipping_model->getShippings($data);

		$this->load->view('shippingcrud', $data);	
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
		if(isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 2))
		{
			$data['shop'] = $this->shop_model->getShopState($_SESSION['my_state']);

			$id = $_SESSION['id_user'];

			$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shop' => $data['shop'][0]->id_shop
				);
		}
		else
		{
			$data = array(
					'id_user' => '',
					'id_shop' => $_SESSION['id_shop']
				);
		}

		$data['orders'] = $this->order_model->getOrders($data);

		$data['shipping_companies'] = $this->shippingcompany_model->getShippingCompanies();

		$this->load->view('addshipping', $data);
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
		$id = $this->input->post('id_order');

		$data['order'] = $this->order_model->getOrder($id);

		$data = array(
					'id_user' => $data['order'][0]->id_user,
					'id_order' => $id,
					'id_shop' => $_SESSION['id_shop'],
					'id_shipping_company' => $this->input->post('id_shipping_company')
				);

		$data['status'] = $this->shipping_model->storeShipping($data);

		if($data['status'] == true)
		{
			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/shipping');
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

		$data['status'] = $this->shipping_model->deleteShipping($id);

		if($data['status'] == true)
		{
			$data = array(
						'delete_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/shipping');
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
	public function sessionShipping()
	{
		if($this->input->post('wholesalecart') != NULL)
		{
			$_SESSION['wholesalecart'] = 1;
		}

		$id = $this->input->post('id_shipping_company');

		$data['shipping_company'] = $this->shippingcompany_model->getShippingCompany($id);

		$_SESSION['id_shipping_company'] = $data['shipping_company'][0]->id_shipping_company;

		$_SESSION['shipping_company'] = $data['shipping_company'][0]->company_name;

		$_SESSION['shipping_price'] = $data['shipping_company'][0]->shipping_price;

		redirect('account/order/checkout');
	}
}
