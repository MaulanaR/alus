<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Menus_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->alus_co = $this->alus_auth->alus_co();
	}

	public function all()
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

	function save($data)
	{
		$this->db->insert($this->alus_co['alus_mg'], $data);
		return $this->db->affected_rows();
	}
	function delete_menu($id)
	{
		$this->db->where('menu_id', $id);
		$this->db->delete($this->alus_co['alus_mg']);
		return $this->db->affected_rows();
	}
	function get_detail($id)
	{
		$this->db->where('menu_id', $id);
		$this->db->limit(1);
		return $this->db->get($this->alus_co['alus_mg']);
	}
	function update_menu($id,$data)
	{
		$this->db->where('menu_id', $id);
		$this->db->update($this->alus_co['alus_mg'], $data);
		return $this->db->affected_rows();
	}
}

/* End of file  */
/* Location: ./application/models/ */