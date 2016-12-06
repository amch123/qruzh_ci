<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeProduct($data)
	{
		$query = $this->db->insert('products', array('id_category' => $data['id_category'], 'title' => $data['title'], 'description' => $data['description'], 'unit_price' => $data['unit_price'], 'wholesale_price' => $data['wholesale_price'], 'stock' => $data['stock'], 'image' => $data['image'], 'created_at' => date('Y-m-d')));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function getProducts()
	{
		$this->db->select('*, DATE_FORMAT(created_at, "%d-%m-%Y") as custom_created_at');
		$this->db->from('products');
		$this->db->order_by("created_at", "desc");
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

	function getProductsCategories($id)
	{
		$this->db->select('*, DATE_FORMAT(created_at, "%d-%m-%Y") as custom_created_at');
		$this->db->from('products');
		$this->db->where('id_category', $id);
		$this->db->order_by("created_at", "desc");
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
		$this->db->set('image', $data['image']);
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