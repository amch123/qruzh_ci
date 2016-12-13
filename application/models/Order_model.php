<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeOrder($data)
	{
		$query = $this->db->insert('orders', array('id_user' => $data['id_user'], 'id_shop' => $data['id_shop'], 'id_shipping_company' => $data['id_shipping_company'], 'subtotal' => $data['subtotal'], 'total_tax' => $data['total_tax'], 'total_shipping' => $data['total_shipping'], 'total_amount' => $data['total_amount'], 'status' => '2', 'created_at' => date('Y-m-d')));

		if($query)
		{   
			$id = $this->db->select('id_order')->order_by('id_order','desc')->limit(1)->get('orders')->row('id_order');

			return $id;
		}
		else
		{
			return false;
		}
	}

	function storeOrderShipping($data)
	{
		$query = $this->db->insert('orders_shippings', array('id_order' => $data['id_order'], 'name' => $data['name'], 'lastname' => $data['lastname'], 'adress' => $data['adress'], 'city' => $data['city'], 'phone' => $data['phone']));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function storeOrderProduct($data)
	{
		$query = $this->db->insert('orders_products', array('id_order' => $data['id_order'], 'id_product' => $data['id_product'], 'quantity' => $data['quantity']));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function getOrders($data)
	{
		$this->db->select('orders.*, DATE_FORMAT(orders.created_at, "%d-%m-%Y") as custom_created_at, users.*, shipping_companies.*, order_statuses.*');
		$this->db->from('orders, users, shipping_companies, order_statuses');
		$this->db->where('orders.id_user = users.id_user');
		$this->db->where('orders.id_shipping_company = shipping_companies.id_shipping_company');
		$this->db->where('orders.status = order_statuses.id_order_status');

		if($data['id_user'] != NULL)
		{
			$this->db->where('orders.id_user', $data['id_user']);
		}

		$this->db->where('orders.id_shop', $data['id_shop']);
		$this->db->order_by("orders.created_at", "desc");
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	function getAcceptedOrders($data)
	{
		$this->db->select('orders.*, DATE_FORMAT(orders.created_at, "%d-%m-%Y") as custom_created_at, users.*, shipping_companies.*, order_statuses.*, orders.status as order_status');
		$this->db->from('orders, users, shipping_companies, order_statuses');
		$this->db->where('orders.id_user = users.id_user');
		$this->db->where('orders.id_shipping_company = shipping_companies.id_shipping_company');
		$this->db->where('orders.status = order_statuses.id_order_status');
		
		if($data['id_user'] != NULL)
		{
			$this->db->where('orders.id_user', $data['id_user']);
		}

		$this->db->where('orders.id_shop', $data['id_shop']);
		
		$this->db->where('orders.status', 1);

		$this->db->order_by("orders.created_at", "desc");
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	function getOrder($id)
	{
		$this->db->select('orders.*, users.*, orders.status');
		$this->db->from('orders, users');
		$this->db->where('orders.id_user = users.id_user');
		$this->db->where('orders.id_order = '.$id);
		$query = $this->db->get()->result();

		if(count($query) > 0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	function deleteProduct($id)
	{
		$product = $this->db->delete('products', array('id_product' => $id));

		if($product)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateProduct($data)
	{
		$this->db->set('id_category', $data['id_category']);
		$this->db->set('title', $data['title']);
		$this->db->set('description', $data['description']);
		$this->db->set('unit_price', $data['unit_price']);
		$this->db->set('wholesale_price', $data['wholesale_price']);
		$this->db->where('id_product',  $data['id_product']);
		$query = $this->db->update('products');

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */