<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

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
		$this->session->set_userdata('button', '6');

		$this->load->view('message');
	}

	/**
	 * Store Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/category/store
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function store()
	{
		$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message'),
				);

		$data['status'] = $this->message_model->storeMessage($data);

		if($data['status'] == true)
		{
			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('contact');
	}
}
