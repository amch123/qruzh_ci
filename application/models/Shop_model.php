<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getShops()
	{
		$this->db->select('shops.*, states.*');
		$this->db->from('shops, states');
		$this->db->where('shops.id_state = states.id_state');
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

	function getShop($id)
	{
		$this->db->select('shops.*, states.*');
		$this->db->from('shops, states');
		$this->db->where('shops.id_state = states.id_state');
		$this->db->where('shops.id_shop = '.$id);
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

	function deleteShop($id)
	{
		$shop = $this->db->delete('shops', array('id_shop' => $id));

		if($shop)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateShop($data)
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

	function storeShop($data)
	{
		$query = $this->db->insert('shops', array('id_state' => $data['id_state'], 'shop_name' => $data['shop_name']));

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