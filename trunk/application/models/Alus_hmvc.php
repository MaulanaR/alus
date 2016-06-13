<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Alus_hmvc extends CI_Model {

const table_user = 'alus_users';
const table_group = 'alus_groups';
const table_menus = 'alus_menu_group';
const table_group_akses = 'alus_menu_group_akses';
const table_users_groups = 'alus_users_groups';
const table_group_dataset = 'alus_group_dataset';
const login_attempt = 'login_attempts';

	
	public function get_menu()
   		{

   		if($this->ion_auth->logged_in())
         { 

         	if($this->session->userdata('menus') != "")
         	{
         		return $this->session->userdata('menus');

         	}else{
         		$group = $this->session->userdata('group');
         		if (empty(array_filter($this->session->userdata('group')))) {
    				$menu[] = "";
   		   			return $menu;
				}
	         		
	         		$this->db->distinct('id_menu');
	   				$this->db->from(self::table_group_akses);
	   		   		foreach ($group as $key){
	   					$this->db->or_where('id_group',$key->id);
	   				}
	   				$this->db->where('can_view','1');
	
	   		   	$result = $this->db->get();
	   		   	if($result->num_rows()>0)
	   		   	{
	   		   	foreach ($result->result() as $list) {
	           	   $menu[] = $this->menu($list->id_menu);
	           	 }
				$this->session->set_userdata('menus', $menu);
	   		   	return $menu;

   			   	}
   				   	else
   		   		{
   		   		$menu[] = "";
   		   		return $menu;	
   		   		};
         	}
   		}else
   		{
   		   	redirect('admin/Login','refresh');
   		};

   		}
   	function menu($id)
   	{
   		$this->db->where('menu_id',$id);
   		$men = $this->db->get(self::table_menus)->row();
   		if(count($men) > 0)
   		{
   			$hasil ="<li><a href=".base_url().$men->menu_uri." target=".$men->menu_target.">".$men->menu_nama."</a></li>";	
   		}else{
   			$hasil ="";
   		}
   		
   		return $hasil;
   	}

   	function cek_privilege($menu_uri) //return array (can_add,can_edit,can_delete,can_view)
   	{
   		$group = $this->session->userdata('group');
   		$id = $this->cek_id_menu($menu_uri);
   		if($id)
   		{
   			foreach ($group as $key){
	   			$this->db->or_where('id_group',$key->id);
	   		}
   			$this->db->where('id_menu', $id);
   			$hak = $this->db->get(self::table_group_akses);
   			if($hak->num_rows() > 0)
   			{
   				foreach ($hak->result() as $key) {
   					$can_add[] = $key->can_add;
   					$can_edit[] = $key->can_edit;
   					$can_delete[] = $key->can_delete;
   					$can_view[] = $key->can_view;
   				}
   				if(in_array('1', $can_add))
	   				{
	   					$add = 1;
	   				}else
	   				{
	   					$add = 0;
	   				}
	   			if(in_array('1', $can_edit))
	   				{
	   					$edit = 1;
	   				}else
	   				{
	   					$edit = 0;
	   				}
	   			if(in_array('1', $can_delete))
	   				{
	   					$delete = 1;
	   				}else
	   				{
	   					$delete = 0;
	   				}
	   			if(in_array('1', $can_view))
	   				{
	   					$view = 1;
	   				}else
	   				{
	   					$view = 0;
	   				}
	   			$privil = array('can_add'=>$add,'can_edit'=>$edit,'can_delete'=>$delete,'can_view'=>$view);
	   			return $privil;
   			}else
   			{
   				$privil = array('can_add'=>0,'can_edit'=>0,'can_delete'=>0,'can_view'=>0);
   				return $privil;	
   			}


   		}else{
   			$privil = array('can_add'=>0,'can_edit'=>0,'can_delete'=>0,'can_view'=>0);
   			return $privil;
   		}
   	}

   	function cek_id_menu($menu_uri) //jika ada return angka ,  jika tidak return false
   	{
   		$this->db->select('menu_id');
   		$this->db->where('menu_uri', $menu_uri);
   		$this->db->limit(1);
   		$menu = $this->db->get(self::table_menus);
   		if($menu->num_rows() < 1)
   		{
   			return false;
   		}else
   		{
   			return $menu->row()->menu_id;
   		}
   	}
   	function cek_view_privilege($menu_uri) // return boolean
   	{
   		$group = $this->session->userdata('group');
   		//-----------------cari id menu--------------------//
   		$this->db->from(self::table_menus);
   		$this->db->select('menu_id');
   		$this->db->where('menu_uri', $menu_uri);
   		$this->db->limit(1);
   		$menu = $this->db->get();
   		if($menu->num_rows() < 1)
   		{
   			return false;
   		}
   		//-------------------cari privilege----------------//
	   	$this->db->from(self::table_group_akses);
	   		foreach ($group as $key){
	   			$this->db->or_where('id_group',$key->id);
	   		}
	   	$this->db->where('id_menu', $menu->row()->menu_id);	
	   	$result = $this->db->get();
	   	if($result->num_rows() > 0)
	   	{
	   		foreach ($result->result() as $key) {
	   			$can_view[] = $key->can_view ;
	   		}	
	   		if(in_array('1', $can_view))
	   		{
	   			return true;
	   		}else
	   		{
	   			return false;
	   		}

	   	}else
	   	{
	   		return false;
	   	}
   	}



}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */