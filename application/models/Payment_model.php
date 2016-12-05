<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function storePayment($data)
	{
		$query = $this->db->insert('payments', array('id_order' => $data['id_order'], 'status' => $data['status'], 'created_at' => date('Y-m-d')));

		if($query)
		{   
			return true;
		}
		else
		{
			return false;
		}
	}

	function getPayments($id = NULL)
	{
		$this->db->select('payments.*, DATE_FORMAT(payments.created_at, "%d-%m-%Y") as custom_created_at, orders.*, users.*');
		$this->db->where('payments.id_order = orders.id_order');
		$this->db->where('payments.id_user = users.id_user');

		if($id != NULL)
		{
			$this->db->where('payments.id_user', $id);
		}

		$this->db->from('payments, orders, users');
		$this->db->order_by("payments.created_at", "desc");
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

	function getPayment($id)
	{
		$this->db->select('payments.*, orders.*, users.*, payment_types.*');
		$this->db->from('payments, orders, users, payment_types');
		$this->db->where('payments.id_order = orders.id_order');
		$this->db->where('payments.id_user = users.id_user');
		$this->db->where('payments.id_payment_type = payment_types.id_payment_type');
		$this->db->where('payments.id_payment = '.$id);
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

	function deletePayment($id)
	{
		$product = $this->db->delete('payments', array('id_payment' => $id));

		if($product)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function updateProduct($data)
	{
		$this->db->set('id_category', $data['id_category']);
		$this->db->set('title', $data['title']);
		$this->db->set('description', $data['description']);
		$this->db->set('unit_price', $data['unit_price']);
		$this->db->set('wholesale_price', $data['wholesale_price']);
		$this->db->where('id_product',  $data['id_product']);
		$query = $this->db->update('products');

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