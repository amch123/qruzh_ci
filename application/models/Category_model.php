<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function getCategories()
	{
		$this->db->select('*');
		$this->db->from('categories');
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

	function storeCategory($data)
	{
		$query = $this->db->insert('categories', array('category_name' => $data['category_name']));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function deleteCategory($id)
	{
		$product = $this->db->delete('categories', array('id_category' => $id));

		if($product)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getCategory($id)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('id_category = '.$id);
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

	function updateCategory($data)
	{
		$this->db->set('category_name', $data['category_name']);
		$this->db->where('id_category',  $data['id_category']);
		$query = $this->db->update('categories');

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