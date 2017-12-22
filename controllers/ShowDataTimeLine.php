<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowDataTimeLine extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('TimeLine');
	}

}

/* End of file ShowDataTimeLine.php */
/* Location: ./application/controllers/ShowDataTimeLine.php */