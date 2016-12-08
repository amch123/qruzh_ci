<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '4');
		$this->session->set_userdata('account_button_client', '4');

		$data['settings'] = $this->setting_model->getSettings(1);
		
		$setting_data = array(
        			'title'  => $data['settings'][0]->title,
        			'mission'     => $data['settings'][0]->mission,
        			'vision' => $data['settings'][0]->vision,
        			'currency' => $data['settings'][0]->currency,
        			'tax' => $data['settings'][0]->tax,
        			'facebook' => $data['settings'][0]->facebook,
        			'twitter' => $data['settings'][0]->twitter
					);

		$this->session->set_userdata($setting_data);

		$this->shop1 = new Udp_cart("shop1");
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
	public function forgotpassword()
	{
		$this->session->set_userdata('button', '0');

		$this->load->view('forgotpassword');
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
	public function recoverpassword()
	{
		$this->session->set_userdata('button', '0');

		$data = array(
					'email' => $this->input->post('email')
				);

		$status = $this->user_model->recoverpassword($data);

		if($status)
		{
			$data = array(
						'update_status' => '1');

			$email = $this->input->post('email');

			$this->email->from('info@qruzh.com.mx', 'MobilePhone');
			$this->email->set_mailtype("html");
			$this->email->to($email);

			$this->email->subject('Recuperar contraseña de MobilePhone');
			
			$message = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
<!--
.Estilo3 {color: #FF6600}
-->
</style>
</head>
<body style="font-family:"Helvetica Neue", Helvetica, Arial, sans-serif; background-color:#eeeeee; margin:0; padding:0; color:#333333;">

<table width="100%" bgcolor="#eeeeee" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="600" border="0" align="center">
                    <tbody>
                        <tr>
                            <td height="40" style="font-size:12px;" align="center"></td></tr>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" rowspan="3" bgcolor="#FFFFFF" style="padding:0">
                                                <!-- inicio contenido -->
                                                <a href="#"><img src="<?php echo base_url(); ?>template/img/header.jpg" width="600" alt="" style="display:block; border:0; margin:0 0 44px; background:#ffffff;"></a>                                                <!-- inicio articulos -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>                                                                        <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>
                                                            <td colspan="3">
                                                            <p align="center" style="font-size:24px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;">Recupere su contraseña</p>
                                                            <p align="center" style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;">&nbsp;</p>
                                                            <p align="center" style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">Has clic para realizar el cambio de su contraseña. </p>
                                                            <p align="center" style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">&nbsp;</p>
                                                            <p align="center" style="margin:0 0 10px; font-size:12px; line-height:18px; color:#333333;">
                                                            	<a href="<?php echo base_url(); ?>index.php/user/newpassword/"><input type="button" value="Cambiar contraseña" class="Estilo3" data-loading-text="Loading..."></a>
                                                            </p>
                                                            <p>&nbsp;</p>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px;line-height:1px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /fin articulos -->
                                                <table style="margin:0; font-size:5px; line-height:5px;" bgcolor="#DDDDDD" width="600" cellpadding="0" cellspacing="0"><tr><td height="30">&nbsp;</td></tr></table>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#DDDDDD">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td width="400">
                                                                <p style="margin:0 0 4px; font-weight:bold; color:#333333; font-size:14px; line-height:22px;">MOBILEPHONE</p>
                                                                <p style="margin:0; color:#333333; font-size:11px; line-height:18px;">Website:<span class="Estilo3"> <a href="#" target="_blank" style="color:#ff6600; text-decoration:none; font-weight:bold;">www.qruzh.com</a><strong>.mx</strong></span>
                                                                </p>
                                                            </td>
                                                            <td width="26"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>
                                                            <td width="114">
                                                                <a href="<?php echo $_SESSION["facebook"]; ?>" target="_blank" style="float:left; width:24px; height:24px; margin:6px 15px 10px 0;"><img src="<?php echo base_url(); ?>template/img/facebook.png" width="30" height="30" alt="facebook" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <a href="<?php echo $_SESSION["twitter"]; ?>" target="_blank" style="float:left; width:24px; height:24px; margin:6px 15px 10px 0;"><img src="<?php echo base_url(); ?>template/img/twitter.png" width="30" height="30" alt="twitter" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- fin contenido --> 
                                                <table style="margin:0; font-size:5px; line-height:5px;" bgcolor="#DDDDDD" width="600" cellpadding="0" cellspacing="0"><tr><td height="30">&nbsp;</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <p style="margin:0; padding:20px 0 20px 0; text-align:center; font-size:11px;line-height:13px; color:#333333;">
                                    Si no quiere seguir recibiendo emails puede <a href="[unsubscribe_url_direct]" style="color:#3399cc; text-decoration:underline; font-weight:bold;">darse de baja</a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end main block -->
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
'; 

			$this->email->message($message);

			$this->email->send();


			$this->session->set_userdata($data);
		}
		else 
		{
			$data = array(
						'update_status' => '0');

			$this->session->set_userdata($data);
		}

		redirect('user/forgotpassword');	
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
	public function newpassword()
	{
		$this->session->set_userdata('button', '0');

		$this->load->view('newpassword');
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
	public function updatepassword()
	{
		$data['status'] = $this->user_model->updatePassword($this->input->post());
		
		if($data['status'] == true)
		{
			$data = array(
						'update_status' => '1',
					);

			$this->session->set_userdata($data);
		}
		
		redirect('user/login);
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

			if($this->input->post('checkout') == 1)
			{
				redirect('account/order/checkout');
			}
			else
			{
				redirect('account');
			}
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
			$email = $this->input->post('email');

			$this->email->from('info@qruzh.com.mx', 'MobilePhone');
			$this->email->set_mailtype("html");
			$this->email->to($email);

			$this->email->subject('Activar la cuenta de MobilePhone');
			$this->email->message($message);

			$this->email->send();

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
