<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shipping_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeShipping($data)
	{
		$query = $this->db->insert('shippings', array('id_user' => $data['id_user'], 'id_order' => $data['id_order']));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function getShippings()
	{
		$this->db->select('*, DATE_FORMAT(created_at, "%d-%m-%Y") as custom_created_at');
		$this->db->from('shippings');
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

	function deleteShipping($id)
	{
		$user = $this->db->delete('shippings', array('id_user' => $id));

		if($user)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateShipping($data)
	{
		$this->db->set('id_user', $data['id_user']);
		$this->db->set('id_order', $data['id_order']);
		$this->db->where('id_shipping',  $data['id_shipping']);
		$query = $this->db->update('shippings');

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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */