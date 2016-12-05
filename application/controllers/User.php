<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '4');

		$data['settings'] = $this->setting_model->getSettings(1);
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter
					);

		$this->session->set_userdata($setting_data);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['users'] = $this->user_model->getUsers();

		$this->load->view('usercrud', $data);
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function login()
	{
		$this->session->set_userdata('button', '0');

		$this->load->view('login');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function sessionStart()
	{
		$this->session->set_userdata('button', '0');

		$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
				);

		$data['user'] = $this->user_model->login($data);

		if(count($data['user'][0]) > 0)
		{
			$data = array(
						'id_user' => $data['user'][0]->id_user,
						'name' => $data['user'][0]->name,
						'email' => $data['user'][0]->email,
						'id_role' => $data['user'][0]->id_role
					);

			$this->session->set_userdata($data);

			redirect('account');
		}
		else
		{
			redirect('/');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function sessionDestroy()
	{
		session_destroy();

		redirect('/');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function create()
	{
		$url = $this->uri->segment(1);

		if($url == "account")
		{
			$data['roles'] = $this->role_model->getRoles();

			$this->load->view('adduser', $data);
		}
		else
		{
			$this->session->set_userdata('button', '0');

			$this->load->view('register');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function edit()
	{
		$id = $this->uri->segment(4);

		$data['user'] = $this->user_model->getUser($id);

		$data['roles'] = $this->role_model->getRoles();

		$this->load->view('edituser', $data);
	}

	/**
	 * Update Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/category/destroy/{$id}
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function update()
	{
		$data['status'] = $this->user_model->updateUser($this->input->post());
		
		if($data['status'] == true)
		{
			$data = array(
						'update_status' => '1',
					);

			$this->session->set_userdata($data);
		}
		
		redirect('account/user/edit/'.$this->input->post('id_user'));
	}

	/**
	 * Store Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/category/store
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function store()
	{
		$url = $this->uri->segment(1);

		$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'id_role' => $this->input->post('id_role')
				);

		$data['status'] = $this->user_model->storeUser($data);

		if($data['status'] == true)
		{
			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		if($url == "account")
		{
			redirect('account/user');
		}
		else
		{
			redirect('register');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function destroy()
	{
		$id = $this->uri->segment(4);

		$data['status'] = $this->user_model->deleteUser($id);

		if($data['status'] == true)
		{
			$data = array(
						'delete_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/user');
	}
}
