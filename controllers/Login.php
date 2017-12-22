<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Login');
		$this->load->model('InteractiveDataProfile');
	}
	public function CheckInformation(){
		$Email= $this->input->post('Email');
		$Password=$this->input->post('Password');
		$partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
		if (preg_match($partten ,$Email, $matchs)) {
			$result= $this->InteractiveDataProfile->GetProfile($Email,$Pasword);
			// sau đó kiểm tra xem result trả về cái gì , nếu tồn tại thì load đên trang newfeed 
		}
		
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
