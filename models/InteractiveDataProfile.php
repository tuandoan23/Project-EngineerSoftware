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
	public function GetProfileWithUser($Email,$Password){
		$this->load->library('mongodb');
		$Temp = array('email'=>$Email,'password'=>$Password);
		$result = $this->mongodb->where($Temp)->get('profile');
		//$result = $result->result_array(); // chỉ dùng với dữ liệu dùng hệ quản trị mysql hoặc sql server
		//echo "<pre>";
		//var_dump($result);
		return $result;
	}
	public function InsertProfile($name,$email,$password,$birth,$hometown,$highschool,$unversity){

	}
	public function UdateProfile($IdProfile){
		
	}
}

/* End of file InteractiveDataProfile.php */
/* Location: ./application/models/InteractiveDataProfile.php */
