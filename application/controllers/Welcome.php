<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('button', '1');
		$this->session->set_userdata('account_button', '0');
		$this->session->set_userdata('account_button_client', '0');

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
		if($this->session->userdata('id_user') == FALSE)
		{
			$data['recent_products'] = $this->product_model->getRecentProducts();

			$this->load->view('index', $data);
		}
		else
		{
			$this->load->view('account');
		}
	}
}
