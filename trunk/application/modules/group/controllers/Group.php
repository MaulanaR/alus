<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Group extends CI_Controller {

	private $privilege;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('group/Group_model','model');

		if(!$this->alus_auth->logged_in())
		{
			redirect('admin/Login','refresh');
		}
		if(! $this->Alus_hmvc->cek_view_privilege($this->uri->segment(1)))
		{
			
			echo "<script type='text/javascript'>alert('You dont have permission to access this menu');</script>";
			redirect('dashboard','refresh');
			
		}
		$this->privilege = $this->Alus_hmvc->cek_privilege($this->uri->segment(1));
	}
		

	public function index()
	{
	
		if($this->alus_auth->logged_in())
         {
         	$head['head'] = $this->Alus_hmvc->get_menu();

         	$data['group'] = $this->model->all()->result();
			
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('template/header',$head);
		 	$this->load->view('group/index.php',$data);
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}

	public function table_group()
	{
	
		if($this->alus_auth->logged_in())
         {
         	
         	$data['group'] = $this->model->all()->result();
			
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('group/index.php',$data);

		}else
		{
			redirect('admin/Login','refresh');
		}
	}


	public function new_group()
	{
		if($this->privilege['can_add'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('group/table_group');
		}

		$this->form_validation->set_rules('group_nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('des_group', 'Deskripsi', 'trim');

		if ($this->form_validation->run() == true)
		{
			$name = $this->input->post('group_nama', TRUE);
			$desc = $this->input->post('des_group', TRUE);
		
			$proces = 	$this->alus_auth->create_group($name,$desc);
			if($proces)
			{
				$this->session->set_flashdata('message','Berhasil ditambah');
				redirect('group/table_group');
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menambahkan group');	
				redirect('group/table_group');
			}
			
		}
		else
		{
			$this->session->set_flashdata('message',validation_errors());		
			redirect('group/table_group');
		}
	}

	function get_group($id)
	{
		$data = $this->model->get_group($id)->result_array();
		header('Content-Type: application/json');
		print json_encode($data);
	}

	public function edit_group()
	{
		if($this->privilege['can_edit'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('group/table_group');
		}

		$this->form_validation->set_rules('group_nama_edit', 'Nama', 'required|trim');
		$this->form_validation->set_rules('des_group_edit', 'Deskripsi', 'trim');
		if ($this->form_validation->run() == true)
		{
			$id = $this->input->post('idg', TRUE);
			$name = $this->input->post('group_nama_edit', TRUE);
			$desc = $this->input->post('des_group_edit', TRUE);
		
			$proces = $this->alus_auth->update_group($id, $name, $desc);
			if($proces)
			{
				$this->session->set_flashdata('message','Berhasil diubah');
				redirect('group/table_group');
			}
			else
			{
				$this->session->set_flashdata('message','Gagal mengubah group');	
				redirect('group/table_group');
			}
			
		}
		else
		{
			$this->session->set_flashdata('message',validation_errors());		
			redirect('group/table_group');
		}

	}

	public function hak_akses($id)
	{
		$data['id'] = $id;
		$data['sql'] = $this->model->hak_akses_mod($id);
		$data['result'] = $this->model->all_tree();
		$this->load->view('group/hak_akses',$data);
	}

	public function save_hak_akses()
	{
		if($this->privilege['can_edit'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('group/table_group');
		}
		$this->form_validation->set_rules('bot[]', 'Menu', 'required');

		if ($this->form_validation->run() == true)
		{

			$id_group = $this->input->post('id_group');
			$mlist = $this->input->post('bot');
			$result = array();
			$i = 0;
			$sum =0;
			foreach($mlist AS $key=>$val){
						if($val){
							//delete hak sebelumnya clear all 
							$this->model->del_ga($id_group);
							//buat baru
							$result[] = array(
							"id_group" => $id_group,
							"id_menu" => $_POST['menu'][$val],
							"can_view" => $_POST['canview'][$val],
							"can_edit" => $_POST['canedit'][$val],
							"can_add" => $_POST['canadd'][$val],
							"can_delete" => $_POST['candelete'][$val]
							);
						}			
			}

			$a = $this->model->upres($result);
			if($a)
			{
				$this->session->set_flashdata('message','Berhasil Mengubah Hak akses');	
      			redirect('group/table_group');
			}else{
				$this->session->set_flashdata('message','Gagal Mengubah Hak akses');	
      			redirect('group/table_group');
			}
		}else{
			$this->session->set_flashdata('message',validation_errors());		
			redirect('group/table_group');
		}
	}

	function delete_group($id)
	{
		//re-check hak akses
		if($this->privilege['can_delete'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('group/table_group');
		}

		$proces = $this->alus_auth->delete_group($id);
		if($proces)
			{
				$this->session->set_flashdata('message','Berhasil dihapus');
				redirect('group/table_group');
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menghapus group');	
				redirect('group/table_group');
			}

	}
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */