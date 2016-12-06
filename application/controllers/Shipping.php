<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '3');
		$this->session->set_userdata('account_button_client', '3');

		$data['settings'] = $this->setting_model->getSettings(1);
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
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

		$data['shippings'] = $this->shipping_model->getShippings($id);

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
		$data['orders'] = $this->order_model->getOrders();

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
}
