<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->session->set_userdata('account_button', '3');
		$this->session->set_userdata('account_button_client', '2');

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

		$_SESSION['url'] = $_SERVER["REQUEST_URI"];

		$_SESSION['states'] = $this->state_model->getStates();
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
		$url = $this->uri->segment(3);

		$config['upload_path']          = './pre_uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
    	$config['max_size']             = 100;
		$config['max_width']            = 1024;
  	 	$config['max_height']           = 768;
  	 	$config['encrypt_name']         = TRUE;

      	$this->load->library('upload', $config);

  		if ( ! $this->upload->do_upload('image'))
  		{
          	$error = array('error' => $this->upload->display_errors());

			$this->session->set_userdata($error);

            if($url == "edit")
			{
				redirect('account/product/edit/'.$this->uri->segment(4));
			}
			else
			{
				redirect('account/product/create');
			}
   		}
    	else
  		{
  			$upload_data = array('upload_data' => $this->upload->data());

  			$data = array(
						'image' => $upload_data['upload_data']['file_name']
						);

			$this->session->set_userdata($data);

			if($url == "edit")
			{
				redirect('account/product/edit/'.$this->uri->segment(4));
			}
			else
			{
				redirect('account/product/create');
			}
  		}
	}
}
