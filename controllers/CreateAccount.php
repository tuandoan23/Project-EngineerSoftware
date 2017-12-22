<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CreateAccount extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('CreateAccountView');
		//$this->load->model('InteractiveDataFriendRelation');
		//$this->load->model('InteractiveDataFriendRequest');
		//$this->load->model('InteractiveDataProrile');
	}
	public function CreateAccountOne(){
		$UserName =$this->input->post('UserName');
		$Email= $this->input->post('Email');
		$PassWord= $this->input->post('PassWord');
		$Year= $this->input->post('Year');
		$Month= $this->input->post('Month');
		$Day= $this->input->post('Day');
		$Birth=$Day ."/" .$Month ."/" .$Year;
		$HomeTown= $this->input->post('HomeTown');
		$HighSchool= $this->input->post('HighSchool');
		$University= $this->input->post('University');
		echo $University;
		$Partten = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/";
		if (preg_match($Partten ,$Email)) {	
			echo 'tên Email này chuẩn đấy chú mày';
			$this->load->model('InteractiveDataProfile');
			$result= $this->InteractiveDataProfile->GetProfileWithUser($Email,$PassWord);
			$this->load->view('FindFriendView');
			//$this->InteractiveDataProfile->GetProfileWithUser($Email,$Password);
			// sau đó kiểm tra xem result trả về cái gì , nếu tồn tại thì load đên trang newfeed 
		}else{
			echo 'hỏng rồi mày ơi , cái regular expression không ổn';
		}

		

		

		
	}

}

/* End of file CreateAccount.php */
/* Location: ./application/controllers/CreateAccount.php */