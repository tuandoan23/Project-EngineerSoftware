<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowDataMessage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Message');	
	}

}

/* End of file ShowDataMessage.php */
/* Location: ./application/controllers/ShowDataMessage.php */