<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orderstatus_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getOrderStatuses()
	{
		$this->db->select('*');
		$this->db->from('order_statuses');
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

	function updateStatus($data)
	{
		$this->db->set('status', $data['id_order_status']);
		$this->db->where('id_order',  $data['id_order']);
		$query = $this->db->update('orders');

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