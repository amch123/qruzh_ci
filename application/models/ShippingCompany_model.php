<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shippingcompany_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getShippingCompanies()
	{
		$this->db->select('*');
		$this->db->from('shipping_companies');
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

	function getShippingCompany($id)
	{
		$this->db->select('*');
		$this->db->from('shipping_companies');
		$this->db->where('id_shipping_company', $id);
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */