<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InteractiveDataProfile extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function GetProfileWithOther($IdProfile){
		$this->mongodb->select();
	}
	public function GetProfileWithUser($email_input, $password_input) {
		$this->load->library('mongodb');
		$data = array(
		    "email" => $email_input,
		    "password" => $password_input
		);
		$result = $this->mongodb->where($data)->get('profile');
		return $result;
	}
	public function InsertProfile($name,$email,$password,$birth,$hometown,$highschool,$unversity){

	}
	public function UdateProfile($IdProfile){
		
	}
}

/* End of file InteractiveDataProfile.php */
/* Location: ./application/models/InteractiveDataProfile.php */
