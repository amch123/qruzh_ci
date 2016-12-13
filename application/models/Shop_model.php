<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getShops()
	{
		$this->db->select('*');
		$this->db->from('shops');
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

	function getShopState($id)
	{
		$this->db->select('shops.*, states.*');
		$this->db->from('shops, states');
		$this->db->where('shops.id_state = states.id_state');
		$this->db->where('states.id_shop = '.$id);
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
		$this->db->set('id_state', $data['id_state']);
		$this->db->set('shop_name', $data['shop_name']);
		$this->db->where('id_shop',  $data['id_shop']);
		$query = $this->db->update('shops');

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