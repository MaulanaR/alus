<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Menus extends CI_Controller {

	private $privilege;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('menus/Menus_model','model');

		if(!$this->ion_auth->logged_in())
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
	
		if($this->ion_auth->logged_in())
         {
         	$head['head'] = $this->Alus_hmvc->get_menu();

         	$data['list'] = $this->model->all();
         	$data['tree'] = $this->model->all_tree();
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('template/header',$head);
		 	$this->load->view('menus/index.php',$data);
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}

	public function table_menus()
	{
	
		if($this->ion_auth->logged_in())
         {
         	
         	$data['list'] = $this->model->all();
         	$data['tree'] = $this->model->all_tree();
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('menus/index.php',$data);
		}else
		{
			redirect('admin/Login','refresh');
		}
	}


	public function new_menus()
	{
		if($this->privilege['can_add'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki akses untuk menambahkan user');
			redirect('menus/table_menus');
		}

		$this->form_validation->set_rules('name', 'Nama Menu', 'required|trim');
		$this->form_validation->set_rules('uri', 'URI Menu', 'required|trim');
		$this->form_validation->set_rules('parent', 'Parent Menu', 'required');

		if ($this->form_validation->run() == true)
		{
			
			$data = array(
								'menu_parent' => $this->input->post('parent'),
								'menu_nama' => $this->input->post('name'),
								'menu_uri' => $this->input->post('uri'),
								'menu_target' => $this->input->post('target'),
								'menu_icon' => $this->input->post('icon'),
								'order_num' => $this->input->post('order')
								
								);
			$proces = $this->model->save($data);
		
			if($proces)
			{
				$this->session->set_flashdata('message','Berhasil ditambah');
				redirect('menus/table_menus');
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menambahkan menu');	
				redirect('menus/table_menus');
			}
			
		}
		else
		{
			$this->session->set_flashdata('message',validation_errors());		
			redirect('menus/table_menus');
		}

	}

	function delete_menus($id)
	{
		
		//re-check hak akses
		if($this->privilege['can_delete'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('menus/table_menus');	
		}

		$proces = $this->model->delete_menu($id);
		if($proces)
			{
				$this->session->set_flashdata('message','Berhasil dihapus');
				redirect('menus/table_menus');
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menghapus menu');	
				redirect('menus/table_menus');
			}

	}

	function get_data_menu($id)
	{
		$menu = $this->model->get_detail($id)->row();

		$data['tree'] = $this->model->all_tree();
		$data['nama'] = $menu->menu_nama;
		$data['uri'] = $menu->menu_uri;
		$data['order'] = $menu->order_num;
		$data['target'] = $menu->menu_target;
		$data['parent'] = $menu->menu_parent;
		$data['icon'] = $menu->menu_icon;
		$data['id'] = $id ;

		$this->load->view('menus/get_menu',$data);

	}
	function edit_data_menus()
	{
		if($this->privilege['can_edit'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki akses untuk menambahkan user');
			redirect('menus/table_menus');
		}

		$this->form_validation->set_rules('name', 'Nama Menu', 'required|trim');
		$this->form_validation->set_rules('uri', 'URI Menu', 'required|trim');
		$this->form_validation->set_rules('parent', 'Parent Menu', 'required');

		if ($this->form_validation->run() === TRUE)
			{
				$id = $this->input->post('id', TRUE);
				$data = array(
								'menu_parent' => $this->input->post('parent'),
								'menu_nama' => $this->input->post('name'),
								'menu_uri' => $this->input->post('uri'),
								'menu_target' => $this->input->post('target'),
								'menu_icon' => $this->input->post('icon'),
								'order_num' => $this->input->post('order')
								
								);

				$proces = $this->model->update_menu($id,$data);
				if($proces)
				{
			    	$this->session->set_flashdata('message','Berhasil');
					redirect('menus/table_menus');
			    }else
			    {
			    	$this->session->set_flashdata('message','Gagal mengubah menu');	
					redirect('menus/table_menus');
			    }
			}
		else{
				$this->session->set_flashdata('message',validation_errors());		
				redirect('menus/table_menus');
			}
	}
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */