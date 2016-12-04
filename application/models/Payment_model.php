<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeProduct($data)
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

	function getPayments()
	{
		$this->db->select('payments.*, DATE_FORMAT(payments.created_at, "%d-%m-%Y") as custom_created_at, orders.*');
		$this->db->where('payments.id_order = orders.id_order');
		$this->db->from('payments, orders');
		$this->db->order_by("payments.created_at", "desc");
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

	function getRecentProducts()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->order_by("created_at", "desc");
		$this->db->limit(4);
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

	function getProduct($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id_product = '.$id);
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