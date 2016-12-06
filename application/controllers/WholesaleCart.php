<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wholesalecart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$data['settings'] = $this->setting_model->getSettings(1);

		$this->session->set_userdata('button', '0');
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter
					);

		$this->session->set_userdata($setting_data);

		$this->shop2 = new Udp_cart("shop2");
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
		$this->load->view('wholesalecart');
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
		$i = $this->input->post('records');

		$id = $this->input->post('id_product'.$i.'');

		$data['product'] = $this->product_model->getProduct($id);

		$data = array(
	       	'id'      => $data['product'][0]->id_product,
	        'qty'     => $this->input->post('quantity'.$i),
	        'price'   => $data['product'][0]->wholesale_price,
	        'name'    => $data['product'][0]->title
		);

		if($this->shop2->insert($data))
		{
			$this->session->set_userdata('store_status', '1');
		}

		redirect('wholesale');
	}
}
