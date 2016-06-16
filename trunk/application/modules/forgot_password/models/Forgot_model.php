<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author 		Maulana Rahman <maulana.code@gmail.com>
*/
class Forgot_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek($email)
	{
		$this->db->where('email', $email);
		$this->db->limit(1);
		return $this->db->get('alus_users');
	}

	public function get_forgot_act($email)
	{
		$this->db->where('email', $email);
		$this->db->limit(1);
		$a = $this->db->get('alus_users')->row();

		return $a;

	}
}

/* End of file  */
/* Location: ./application/models/ */