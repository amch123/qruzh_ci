<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '2');
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
		$data['shippings'] = $this->shipping_model->getShippings();

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
	public function store()
	{
		$data = array(
					'id_category' => $this->input->post('id_category'),
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
					'unit_price' => $this->input->post('unit_price'),
					'wholesale_price' => $this->input->post('wholesale_price'),
				);

		$data['status'] = $this->product_model->storeProduct($data);

		if($data['status'] == true)
		{
			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/product');
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

		$data['status'] = $this->product_model->deleteProduct($id);

		if($data['status'] == true)
		{
			$data = array(
						'delete_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/product');
	}
}
