<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InteractiveDataProfile extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function GetProfile($IdProfile){
		$this->mongodb->select();
	}
	public function InsertProfile($){

	}
	public function UdateProfile($IdProfile,){
		
	}
}

/* End of file InteractiveDataProfile.php */
/* Location: ./application/models/InteractiveDataProfile.php */