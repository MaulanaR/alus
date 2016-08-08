<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Theme_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function update($data)
	{
		$this->db->update('themes', $data);
		return $this->db->affected_rows();
	}
}

/* End of file  */
/* Location: ./application/models/ */