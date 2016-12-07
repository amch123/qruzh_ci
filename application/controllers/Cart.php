<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
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
		$data['shipping_companies'] = $this->shippingcompany_model->getShippingCompanies();

		$this->load->view('cart', $data);
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
	public function update()
	{
		$id = $this->input->post('id_product');

		$data['product'] = $this->product_model->getProduct($id);

		$data = array(
        'id'      => $data['product'][0]->id_product,
        'qty'     => $this->input->post('quantity'),
        'price'   => $data['product'][0]->unit_price,
        'name'    => $data['product'][0]->title,
        'options' => array('image' => $data['product'][0]->image)
		);

		if($this->shop1->insert($data))
		{
			$this->session->set_userdata('store_status', '1');
		}

		redirect('product/show/'.$id);
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
	public function totalCheck()
	{
		$i = 0;

		foreach($this->shop1->get_content() as $items)
       	{
       		$data['product'] = $this->product_model->getProduct($items['id']);

			if($data['product'][0]->stock > $this->input->post('quantity'.$i))
			{
				$article = array("id" => $items['id'], "qty" => $this->input->post('quantity'.$i), "name" => $items['name'], "price" => $items['price']);
	    		$article["options"] = array("image" => $items['options']['image']);

				$this->shop1->update($article);

				$this->session->set_userdata('update_status', '1');
			}
			else
			{
				$_SESSION['error'][$i] = "<strong>Producto:</strong> ".$data['product'][0]->title.". <strong>Stock:</strong> ".$data['product'][0]->stock." Unidades.";
			}

			$i = $i + 1;
       	}

		redirect('cart');
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

		if($data['product'][0]->stock > $this->input->post('quantity'))
		{
			$data = array(
	        'id'      => $data['product'][0]->id_product,
	        'qty'     => $this->input->post('quantity'),
	        'price'   => $data['product'][0]->unit_price,
	        'name'    => $data['product'][0]->title,
	        'options' => array('image' => $data['product'][0]->image)
			);

			if($this->shop1->insert($data))
			{
				$this->session->set_userdata('store_status', '1');
			}

			redirect('product/show/'.$id);
		}
		else
		{
			$error = array(
        			'error'  => $data['product'][0]->title,
        			'stock'  => $data['product'][0]->stock
					);

			$this->session->set_userdata($error);

			redirect('product/show/'.$id);
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

		if($this->shop1->remove_item($id))
		{
			$this->session->set_userdata('delete_status', '1');
		}

		redirect('cart');
	}
}
