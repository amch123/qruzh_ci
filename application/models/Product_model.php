<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeProduct($data)
	{
		$query = $this->db->insert('users', array('id_category' => $data['id_category'], 'title' => $data['title'], 'description' => $data['description'], 'unit_price' => $data['unit_price'], 'wholesale_price' => $data['wholesale_price']));

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
		$this->db->select('*');
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
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */