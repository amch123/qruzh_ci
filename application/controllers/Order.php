<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('button', '0');
		$this->session->set_userdata('account_button', '2');
		$this->session->set_userdata('account_button_client', '1');

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
		if(isset($_SESSION['id_role']) && ($_SESSION['id_role'] == 2))
		{
			$id = $_SESSION['id_user'];
		}
		else
		{
			$id = "";
		}

		$data['orders'] = $this->order_model->getOrders($id);

		$this->load->view('ordercrud', $data);
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
	public function show()
	{
		$id = $this->uri->segment(4);

		$data['statuses'] = $this->orderstatus_model->getOrderStatuses();

		$data['order'] = $this->order_model->getOrder($id);

		$data['orders_products'] = $this->orderproduct_model->getOrdersProducts($id);
		
		$this->load->view('orderdetail', $data);
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
		$data['categories'] = $this->category_model->getCategories();

		$this->load->view('addproduct', $data);
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

		$data['product'] = $this->product_model->getProduct($id);

		$data['categories'] = $this->category_model->getCategories();

		$this->load->view('editproduct', $data);
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
		$data['status'] = $this->orderstatus_model->updateStatus($this->input->post());
		
		if($data['status'] == true)
		{
			$data = array(
						'update_status' => '1',
					);
			$email = $this->input->post('email');

			$this->email->from('info@qruzh.com.mx', 'MobilePhone');
			$this->email->set_mailtype("html");
			$this->email->to($email);

			$this->email->subject('Estatus pago de MobilePhone');
			
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
<body style="font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; background-color:#eeeeee; margin:0; padding:0; color:#333333;">

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
                                                            <p align="center" style="font-size:14px; line-height:22px; font-weight:bold; color:#333333; margin:0 0 5px;">&nbsp;</p>
                                                            <p align="center" style="margin:0 0 10px; font-size:20px; line-height:18px; color:#333333;">Su pago para la orden de compra</p>
                                                            </p>
                                                            <p align="center" style="margin:0 0 10px; font-size:20px; line-height:18px; color:#333333;"> N- $numero</p>
                                                            <p align="center" style="margin:0 0 10px; font-size:20px; line-height:18px; color:#333333;">ha cambiado de estatus a </p>
                                                            <p align="center" style="margin:0 0 10px; font-size:20px; line-height:18px; color:#333333;"> $status. </p>
                                                            <p>&nbsp;</p>
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
		
		redirect('account/order');
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
	public function store()
	{
		$tax = ($this->shop1->total_cart() * 12)/100;

		$data = array(
					'id_user' => $_SESSION['id_user'],
					'id_shipping_company' => $_SESSION['id_shipping_company'],
					'subtotal' => $this->shop1->total_cart(),
					'total_tax' => $tax,
					'total_shipping' => $_SESSION['shipping_price'],
					'total_amount' => $tax + $_SESSION['shipping_price'] + $this->shop1->total_cart()
				);

		$id_order = $this->order_model->storeOrder($data);

		$data = array(
					'id_order' => $id_order,
					'name' => $this->input->post('name'),
					'lastname' => $this->input->post('lastname'),
					'adress' => $this->input->post('adress'),
					'city' => $this->input->post('city'),
					'phone' => $this->input->post('phone')
				);

		$data['status'] = $this->order_model->storeOrderShipping($data);

		if($data['status'] == true)
		{
			foreach($this->shop1->get_content() as $items) {
				$data = array(
					'id_order' => $id_order,
					'id_product' => $items['id'],
					'quantity' => $items['qty']
				);

				$data['status'] = $this->order_model->storeOrderProduct($data);
			}


			$data = array(
						'store_status' => '1',
					);

			$this->session->set_userdata($data);
		}

		redirect('account/order');
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

		$data['payment'] = $this->payment_model->getPayment($id);

		if($data['payment'] == "")
		{
			$data['status'] = $this->order_model->deleteOrder($id);

			if($data['status'] == true)
			{
				$data = array(
							'delete_status' => '1',
						);

				$this->session->set_userdata($data);
			}

			redirect('account/order');
		}
		else
		{

			$data = array(
						'delete_status' => '2',
					);

			$this->session->set_userdata($data);
			
			redirect('account/order');
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
	public function checkout()
	{
		if(isset($_SESSION['id_user']))
		{
			$this->load->view('checkout');
		}
		else
		{
			redirect('login/checkout');
		}
	}
}
