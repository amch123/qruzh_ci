<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getRoles()
	{
		$this->db->select('*');
		$this->db->from('roles');
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */