<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model {
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

	function getSettings($id)
	{
		$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('id_setting = '.$id);
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

	function updateSetting($data)
	{
		$this->db->set('title', $data['title']);
		$this->db->set('mission', $data['mission']);
		$this->db->set('vision', $data['vision']);
		$this->db->set('currency', $data['currency']);
		$this->db->set('facebook', $data['facebook']);
		$this->db->set('twitter', $data['twitter']);
		$this->db->where('id_setting',  $data['id_setting']);
		$query = $this->db->update('settings');

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