<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Theme extends CI_Controller {

	private $privilege;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('theme/Theme_model','model');

		if(!$this->alus_auth->logged_in())
		{
			redirect('admin/Login','refresh');
		}
		if(! $this->Alus_hmvc->cek_view_privilege($this->uri->segment(1)))
		{
			//jika tidak punya akses can_view 
			echo "<script type='text/javascript'>alert('You dont have permission to access this menu');</script>";
			redirect('dashboard','refresh');
			//langsung redirect saja 
		}
		$this->privilege = $this->Alus_hmvc->cek_privilege($this->uri->segment(1));
	}
		

	public function index()
	{
	
		if($this->alus_auth->logged_in())
         {
         	$head['head'] = $this->Alus_hmvc->get_menu();

     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('template/header',$head);
		 	$this->load->view('theme/index.php',$data);
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}

	public function refreshing()
	{
	
		if($this->alus_auth->logged_in())
         {
         	
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('theme/index.php',$data);
		}else
		{
			redirect('admin/Login','refresh');
		}
	}


	public function update()
	{
		$tipe = $this->input->post('tipe');
		$isi = $this->input->post('isi');

		if($tipe == 'header') {
				$data = array(
					'base_color' => $isi);
				$this->model->update($data);
				$this->session->set_flashdata('message','Berasil Silahkan login ulang untuk melihat perubahan');
				redirect('Theme/refreshing');
		}elseif($tipe == 'navbar')
		{
					$data = array(
					'base_menu' => $isi);
				$this->model->update($data);
				$this->session->set_flashdata('message','Berasil Silahkan login ulang untuk melihat perubahan');
				redirect('Theme/refreshing');
		}elseif($tipe == 'headmodal')
		{
			$data = array(
					'base_modal' => $isi);
				$this->model->update($data);
				$this->session->set_flashdata('message','Berasil Silahkan login ulang untuk melihat perubahan');
				redirect('Theme/refreshing');
		}elseif($tipe == 'textmodal')
		{
				$data = array(
					'base_text_modal_header' => $isi);
				$this->model->update($data);
				$this->session->set_flashdata('message','Berasil Silahkan login ulang untuk melihat perubahan');
				redirect('Theme/refreshing');
		}elseif($tipe == 'closemodal')
		{
				$data = array(
					'base_close_modal' => $isi);
				$this->model->update($data);
				$this->session->set_flashdata('message','Berasil Silahkan login ulang untuk melihat perubahan');
				redirect('Theme/refreshing');
		}
		redirect('Theme/refreshing');
	}
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */