<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeOrder($data)
	{
		$query = $this->db->insert('products', array('id_category' => $data['id_category'], 'title' => $data['title'], 'description' => $data['description'], 'unit_price' => $data['unit_price'], 'wholesale_price' => $data['wholesale_price'], 'created_at' => date('Y-m-d')));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function getOrders()
	{
		$this->db->select('orders.*, DATE_FORMAT(orders.created_at, "%d-%m-%Y") as custom_created_at, users.*');
		$this->db->from('orders, users');
		$this->db->where('orders.id_user = users.id_user');
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
		$this->db->select('orders.*, users.*');
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