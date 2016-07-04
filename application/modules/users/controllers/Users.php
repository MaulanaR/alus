<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Users extends CI_Controller {

	private $privilege;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('users/Users_model','model');

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

         	$data['users'] = $this->alus_auth->users()->result();
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->alus_auth->get_users_groups($user->id)->result();
			}
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('template/header',$head);
		 	$this->load->view('users/index.php',$data);
		 	$this->load->view('template/footer');
		}else
		{
			redirect('admin/Login','refresh');
		}
	}

	public function table_users()
	{
	
		if($this->alus_auth->logged_in())
         {
         	
         	$data['users'] = $this->alus_auth->users()->result();
			foreach ($data['users'] as $k => $user)
			{
				$data['users'][$k]->groups = $this->alus_auth->get_users_groups($user->id)->result();
			}
         	$data['can_add'] = $this->privilege['can_add'];
     		$data['can_edit'] = $this->privilege['can_edit'];
     		$data['can_delete'] = $this->privilege['can_delete'];
     		$data['can_view'] = $this->privilege['can_view'];
     		
		 	$this->load->view('users/index.php',$data);
		}else
		{
			redirect('admin/Login','refresh');
		}
	}


	public function new_user()
	{
		if($this->privilege['can_add'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki akses untuk menambahkan user');
			redirect('users/table_users');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[alus_u.abc]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim');
		$this->form_validation->set_rules('phone', 'Phone', 'numeric');
		$this->form_validation->set_rules('group[]', 'Group', 'required');

		if ($this->form_validation->run() == true)
		{
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			$email = $this->input->post('email', TRUE);
			foreach ($this->input->post('group') as $key) {
			 	$group[] = $key;
			 };
			$additional_data = array(
								'username' => $this->input->post('username'),
								'job_title' => $this->input->post('job'),
								'first_name' => $this->input->post('first_name', TRUE),
								'last_name' => $this->input->post('last_name', TRUE),
								'phone' => $this->input->post('phone', TRUE),
								'active' => $this->input->post('active', TRUE)
								);
			$proces = 	$this->alus_auth->register($username, $password, $email, $additional_data,$group);
		
			if($proces)
			{
				$this->session->set_flashdata('message','Berhasil ditambah');
				redirect('users/table_users');	
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menambahkan user');	
				redirect('users/table_users');	
			}
			
		}
		else
		{
			$this->session->set_flashdata('message',validation_errors());		
			redirect('users/table_users');	
		}

	}
	function delete_user($id)
	{
		
		//re-check hak akses
		if($this->privilege['can_delete'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki hak untuk action ini');
			redirect('users/table_users');	
		}

		$proces = $this->alus_auth->delete_user($id);
		if($proces)
			{
				$this->session->set_flashdata('message','Berhasil dihapus');
				redirect('users/table_users');	
			}
			else
			{
				$this->session->set_flashdata('message','Gagal menghapus user');	
				redirect('users/table_users');	
			}

	}

	function get_data_user($id)
	{
		$user = $this->alus_auth->user($id)->row();
		$groups=$this->alus_auth->groups()->result_array();
		$currentGroups = $this->alus_auth->get_users_groups($id)->result();

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['job_title'] = $user->job_title;
		$this->data['first_name'] = $user->first_name;
		$this->data['last_name'] = $user->last_name;
		$this->data['company'] = $user->company;
		$this->data['phone'] = $user->phone;

		$this->load->view('users/get_user',$this->data);

	}
	function edit_data_users()
	{
		if($this->privilege['can_edit'] == 0)
		{
			$this->session->set_flashdata('message','Anda tidak memiliki akses untuk action ini');
			redirect('users/table_users');
		}

		$this->form_validation->set_rules('id', "ID", 'required|trim');
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'required');
		

		if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'alus_auth') . ']|max_length[' . $this->config->item('max_password_length', 'alus_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

		if ($this->form_validation->run() === TRUE)
			{
				$id = $this->input->post('id', TRUE);
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
					'active'	 => $this->input->post('active')
					
				);

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}
				$groupData = $this->input->post('groups');
				if (isset($groupData) && !empty($groupData)) {
						$this->alus_auth->remove_from_group('', $id);
						foreach ($groupData as $grp) {
							$this->alus_auth->add_to_group($grp, $id);
						}
					}
				if($this->alus_auth->update($id, $data))
			    {
			    	$this->session->set_flashdata('message','Berhasil');
					redirect('users/table_users');	
			    }else
			    {
			    	$this->session->set_flashdata('message','Gagal mengubah user');	
					redirect('users/table_users');	
			    }
			}
		else{
				$this->session->set_flashdata('message',validation_errors());		
				redirect('users/table_users');	
			}
	}
}

/* End of file  Home.php */
/* Location: ./application/controllers/ Home.php */