<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InteractiveDataProfile');
        $this->load->library('mongodb');
    }

    public function index($error = '') {
        if ($error) {
            $data['login_error'] = $error;
        } else {
            $data['login_error'] = '';
        }
        $data['title'] = 'Social Network | Connecteur';
       
        $this->load->view('LoginView', $data);
    }

    public function CheckInformation() {
        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email'); // Email is requried
        $this->form_validation->set_rules('Password', 'Password', 'required'); // Password required
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email_input = $this->input->post('Email');
            $password_input = $this->input->post('Password');
            $query = $this->InteractiveDataProfile->GetProfileWithUser($email_input, $password_input);
            if ($query->num_rows() == 1) {
                foreach ($query->result() as $row) {
                    $email = $row->email;
                    $id = $row->_id;
                    $userdata = array(
                        'Email' => $email,
                        'id' => $id,
                        'is_logged_in' => true
                    );
                    $this->session->set_userdata($userdata);
                }
                $this->load->view('timelineView');
            } else {
                $error = 'Incorrect email or password!';
                $this->index($error);
            }
        }
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
