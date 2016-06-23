<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
	}
		

	public function index()
	{
	
		if($this->ion_auth->logged_in())
         {
		 redirect('dashboard/','refresh');
		}else
		{	
			$data['captcha'] = $this->load_captcha();
			$this->load->view('login',$data);
		}
	}

// membuat captcha img
	function load_captcha()
	{
		
		$option = array(
			'img_path' => './Assets/dist/img/capimg/',
			'img_url' => base_url().'Assets/dist/img/capimg/',
			'img_width' => '140',
			'img_height' => '40',
			'word_length' => '4',
			'font_path' => base_url().'Assets/dist/fonts/PatternFlyIcons-webfont',
			'expiration' => 7200
			);

		$cap = create_captcha($option);

		$image = $cap['image'];
		$this->session->set_userdata('captchaword',md5($cap['word']));

		return $cap['image'];

	}
// fungsi check captcha
	function check_captcha($teks){
		if( md5($teks) == $this->session->userdata('captchaword'))
		{
			return true;

		}else{

			return false;
		}
	}
	public function login()
	{
		$this->data['title'] = "Login";
		//login attemp . jika sudah melampaui kesempatan ( jumlah kesempatan ada di config ) maka dilempar kembali ke halaman login . 
		if ($this->ion_auth->is_max_login_attempts_exceeded($this->input->post('identity')))
		{
				if($this->ion_auth->is_time_locked_out($this->input->post('identity')))
				{
					$this->session->set_flashdata('message', 'You have too many login attempts. please wait 5 minutes and try again');
					redirect('admin/Login/');
				}
		}

		

		//validate form input
		$this->form_validation->set_rules('identity', 'Identity', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('captcha', 'captcha', 'required');


		if ($this->form_validation->run() == true)
		{
			$captcha = $this->input->post('captcha');
			//cek captcha
				$captchacek = $this->check_captcha($captcha);

				if($captchacek == false)
				{
					$this->session->set_flashdata('message',"Kode Captcha tidak sesuai");
					redirect('admin/Login/', 'refresh');
				}

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password')))
			{
				//if the login is successful
				//redirect them back to the home page
				// mereset kesemepatan login
				$this->ion_auth->clear_login_attempts($this->input->post('identity'));
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				
				redirect('dashboard/','refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				// saat gagal login, mengurangi sisa kesempatan .
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/Login/', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->session->set_flashdata('message', $this->data['message']);
			redirect('admin/Login');
		}
	}

	public function logout()
	{
		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('admin/Login','refresh');
	}


}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */