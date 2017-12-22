<?php

//if (!defined('BASEPATH'))
//    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InteractiveDataProfile');
        $this->load->library('mongodb');
    }

    public function index($error = '') {
//        $this->load->view('Login');
//        $this->load->model('InteractiveDataProfile');
        if ($error) {
            $data['login_error'] = $error;
        } else {
            $data['login_error'] = '';
        }
        $data['title'] = 'Mạng xã hội | Kết nối bạn bè';
       
        $this->load->view('LoginView', $data);
    }

    public function CheckInformation() {
//        $Email = $this->input->post('Email');
//        $Password = $this->input->post('Password');
//        $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
//        if (preg_match($partten, $Email, $matchs)) {
//            $result = $this->InteractiveDataProfile->GetProfile($Email, $Pasword);
//            // sau đó kiểm tra xem result trả về cái gì , nếu tồn tại thì load đên trang newfeed 
//        }

        $this->form_validation->set_rules('Email', 'Email', 'required|valid_email'); // Email is requried
        $this->form_validation->set_rules('Password', 'Password', 'required'); // Password required
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $Email = $this->input->post('Email');
            $Password = $this->input->post('Password');
//            $data = array(
//                "email" => $this->input->post('Email'),
//                "password" => ($this->input->post('Password'))
//            );
            $query = $this->InteractiveDataProfile->GetProfileWithUser($Email, $Password);
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
                $this->load->view('timelineview');
            } else {
                $error = 'Incorrect email or password!';
                $this->index($error);
            }
        }
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
