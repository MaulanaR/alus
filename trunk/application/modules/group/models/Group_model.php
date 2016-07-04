<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Group_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->alus_co = $this->alus_auth->alus_co();
	}

	public function all()
	{
		return $this->db->get($this->alus_co['alus_g']);
	}

	public function get_group($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->alus_co['alus_g']);
	}
	function del_ga($id)
	{
		$this->db->delete($this->alus_co['alus_mga'], array('id_group' => $id)); 
	}
	function upres($res)
	{
		return $this->db->insert_batch($this->alus_co['alus_mga'], $res);
	}

	function hak_akses_mod($id)
	{
		$this->db->where('id_group',$id);
		return $this->db->get($this->alus_co['alus_mga']);
	}
	function hak_akses_list()
	{
		return $this->db->get($this->alus_co['alus_mg']);
	}

	public function all_tree()
	{
		$nodes = $this->db->get($this->alus_co['alus_mg'])->result();
		return $this->getChildren($nodes, 0, 0);
	}

	public function getChildren($nodes ,$pid = 0, $depth = 0)
	{
		$tree = [];

		foreach($nodes as $node) {

			if ($node->menu_parent == $pid) {
				
				$node->menu_nama = str_repeat('---', $depth) . $node->menu_nama;
				$children   = $this->getChildren($nodes, $node->menu_id, ($depth + 1));
				$tree[]     = $node;

				if (count($children) > 0) {
					$tree   = array_merge($tree, $children);
				}
			}

		}

		return $tree;
	}
	

}

/* End of file  */
/* Location: ./application/models/ */