<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
		$id = $this->input->post('id_product');

		$data['product'] = $this->product_model->getProduct($id);

		$data = array(
        'id'      => $data['product'][0]->id_product,
        'qty'     => $this->input->post('quantity'),
        'price'   => $data['product'][0]->unit_price,
        'name'    => $data['product'][0]->title
		);

		if($this->cart->insert($data))
		{
			$this->session->set_userdata('store_status', '1');
		}

		redirect('product/show/'.$id);
	}
}
