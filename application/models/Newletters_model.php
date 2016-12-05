<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newletters_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storeNewletters($data)
	{
		$query = $this->db->insert('newletters', array('email' => $data['name']));

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