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
        			'tax' => $data['settings'][0]->tax,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter
					);

		$this->session->set_userdata($setting_data);

		$this->shop2 = new Udp_cart("shop2");

		if(!isset($_SESSION['my_state']))
		{
			$_SESSION['url'] = $_SERVER["REQUEST_URI"];
		}

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
		$data['shipping_companies'] = $this->shippingcompany_model->getShippingCompanies();

		$this->load->view('wholesalecart', $data);
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

		if($data['product'][0]->stock > $this->input->post('quantity'.$i))
		{
			$data = array(
		       	'id'      => $data['product'][0]->id_product,
		        'qty'     => $this->input->post('quantity'.$i),
		        'price'   => $data['product'][0]->wholesale_price,
		        'name'    => $data['product'][0]->title,
		        'options' => array('image' => $data['product'][0]->image)
			);

			if($this->shop2->insert($data))
			{
				$this->session->set_userdata('store_status', '1');
			}

			redirect('wholesale');
		}
		else
		{
			$error = array(
        			'error'  => $data['product'][0]->title,
        			'stock'  => $data['product'][0]->stock
					);

			$this->session->set_userdata($error);

			redirect('wholesale');
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
	public function destroy()
	{
		$id = $this->uri->segment(3);

		$this->shop2->remove_item($id);

		redirect('wholesalecart');
	}
}
