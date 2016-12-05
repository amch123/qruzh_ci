<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '3');
		$this->session->set_userdata('account_button_client', '2');

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

		$data['payments'] = $this->payment_model->getPayments($id);

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
		$data = array(
					'id_order' => $this->input->post('id_ordr'),
					'status' => 2,
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
