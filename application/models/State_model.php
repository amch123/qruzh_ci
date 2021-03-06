<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getStates()
	{
		$this->db->select('states.*, shops.*');
		$this->db->from('states, shops');
		$this->db->where('states.id_shop = shops.id_shop');
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

	function getState($id)
	{
		$this->db->select('states.*, shops.*');
		$this->db->from('states, shops');
		$this->db->where('states.id_shop = shops.id_shop');
		$this->db->where('states.id_state = '.$id);
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
	
	function storeState($data)
	{
		$query = $this->db->insert('states', array('state' => $data['state'], 'id_shop' => $data['id_shop']));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function deleteState($id)
	{
		$shop = $this->db->delete('states', array('id_state' => $id));

		if($shop)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateState($data)
	{
		$this->db->set('state', $data['state']);
		$this->db->set('id_shop', $data['id_shop']);
		$this->db->where('id_state',  $data['id_state']);
		$query = $this->db->update('states');

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