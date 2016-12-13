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
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */