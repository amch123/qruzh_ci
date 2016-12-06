<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderproduct_model extends CI_Model {
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

	function getOrdersProducts($id)
	{
		$this->db->select('orders_products.*, products.*');
		$this->db->from('orders_products, products');
		$this->db->where('orders_products.id_product = products.id_product');
		$this->db->where('orders_products.id_order', $id);
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
		$this->db->select('products.*, categories.*');
		$this->db->from('products, categories');
		$this->db->where('products.id_category = categories.id_category');
		$this->db->where('products.id_product = '.$id);
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