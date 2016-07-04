<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Dashboard extends CI_Controller {

//	private $privilege;

	public function __construct()
	{
		parent::__construct();
		if(!$this->alus_auth->logged_in())
		{
			redirect('admin/Login','refresh');
		}
//		if(! $this->Alus_hmvc->cek_view_privilege($this->uri->segment(1)))
//		{
//			
//			echo "<script type='text/javascript'>alert('You dont have permission to access this menu');</script>";
//			redirect('dashboard','refresh');
//			
//		}
//		$this->privilege = $this->Alus_hmvc->cek_privilege($this->uri->segment(1));
	}
		

	public function index()
	{
	
		if($this->alus_auth->logged_in())
         {
         	$head['head'] = $this->Alus_hmvc->get_menu();

		 	$this->load->view('template/header',$head);
		 	$this->load->view('dashboard/index');
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}

	function error404()
	{
	
		if($this->alus_auth->logged_in())
         {
         	$head['head'] = $this->Alus_hmvc->get_menu();

		 	$this->load->view('template/header',$head);
		 	$this->load->view('template/404page');
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}


}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */