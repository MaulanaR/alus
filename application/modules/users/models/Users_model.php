<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Users_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->alus_co = $this->alus_auth->alus_co();
	}

	public function all()
	{
		return $this->db->get($this->alus_co['alus_u']);
	}

}

/* End of file  */
/* Location: ./application/models/ */