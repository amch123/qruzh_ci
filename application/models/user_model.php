<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeUser($data)
	{
		$query = $this->db->insert('users', array('name' => $data['name'], 'email' => $data['email'], 'password' => $data['password'], 'id_role' => $data['id_role'], 'status' => $data['status'], 'activation_code' => $data['activation_code'], 'created_at' => date('Y-m-d')));

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

	function recoverPassword($data)
	{
		$query = $this->db->get_where('users', 
									array('email =' => $data['email']))
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

	function getUsers()
	{
		$this->db->select('*, DATE_FORMAT(created_at, "%d-%m-%Y") as custom_created_at');
		$this->db->from('users');
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

	function getUser($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id_user = '.$id);
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

	function deleteUser($id)
	{
		$user = $this->db->delete('users', array('id_user' => $id));

		if($user)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateUser($data)
	{
		$this->db->set('name', $data['name']);
		$this->db->set('email', $data['email']);
		$this->db->set('password', md5($data['password']));
		$this->db->set('id_role', $data['id_role']);
		$this->db->where('id_user',  $data['id_user']);
		$query = $this->db->update('users');

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updatePassword($data)
	{
		$this->db->set('password', md5($data['password']));
		$this->db->where('activation_code',  $data['activation_code']);
		$query = $this->db->update('users');

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function activateUser($data)
	{
		$this->db->set('status', 1);
		$this->db->where('activation_code',  $data['activation_code']);
		$query = $this->db->update('users');

		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function checkUser($code)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where("activation_code", $code);
		$query = $this->db->get()->result();

		if(count($query) > 0)
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