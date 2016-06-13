<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Group_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function all()
	{
		return $this->db->get('alus_groups');
	}

	public function get_group($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('alus_groups');
	}

}

/* End of file  */
/* Location: ./application/models/ */