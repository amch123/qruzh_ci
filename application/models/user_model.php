<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeUser($data)
	{
		$query = $this->db->insert('users', array('name' => $data['name'], 'email' => $data['email'], 'password' => $data['password'], 'id_role' => $data['id_role'], 'created_at' => date('Y-m-d')));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function login($data)
	{
		$query = $this->db->get_where('users', 
									array('email =' => $data['email'], '
										password =' => md5($data['password'])))
									->result();

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