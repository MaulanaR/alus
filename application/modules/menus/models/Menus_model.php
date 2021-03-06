<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Menus_model extends CI_Model {

	var $table = 'alus_mg';
    var $table_aks = 'alus_mga';
    var $column_order = array('menu_nama','menu_uri','menu_id','order_num',null);
    var $column_search = array('menu_nama','menu_uri');
    var $order = array('menu_id' => 'desc'); 

	public function __construct()
	{
		parent::__construct();
		$this->alus_co = $this->alus_auth->alus_co();
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
				
				$node->menu_nama = str_repeat('---', $depth) . $this->alus_auth->decrypt($node->menu_nama);
				$children   = $this->getChildren($nodes, $node->menu_id, ($depth + 1));
				$tree[]     = $node;

				if (count($children) > 0) {
					$tree   = array_merge($tree, $children);
				}
			}

		}

		return $tree;
	}

	/* Server Side Data */
	/* Modified by : Maulana.code@gmail.com */
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $this->alus_auth->encrypt($_POST['search']['value']));
                }
                else
                {
                    $this->db->or_like($item, $this->alus_auth->encrypt($_POST['search']['value']));
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('menu_id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('menu_id', $id);
        $this->db->delete($this->table);
    }

    public function delete_detail_grupakses($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete($this->table_aks);
    }

}

/* End of file  */
/* Location: ./application/models/ */