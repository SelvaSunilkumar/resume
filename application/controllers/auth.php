<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function isSessionSet() {
        if ($this->session->userdata('username') == "") {
            return false;
        } else {
            return true;
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');

        if ($this->isSessionSet()) {
            $this->logout();
        } else {
            $this->index();
        }
    }

    public function index() {
        if ($this->isSessionSet()) {
            $this->dashboard();
        } else {
            $this->load->view('login');
        }
    }
    
    public function dashboard() {
        if ($this->isSessionSet()) {
            $headData = array(
                "title" => "DashBoard",
                "id" => $this->session->userdata('username')
            );
            $data = array(
                "id" => $this->session->userdata('username')
            );
            $this->load->view('header',$headData);
            $this->load->view('dashboard',$data);
        } else {
            $this->index();
        }
    }

    public function newResume() {
        if ($this->isSessionSet()) {
            $headData = array(
                "title" => "New Resume",
                "id" => $this->session->userdata('username')
            );
            $data = array(
                "id" => $this->session->userdata('username')
            );
            $this->load->view('header',$headData);
            $this->load->view('newresume',$data);
        } else {
            $this->index();
        }
    }

    public function validateUser() {

        include 'dbconn.php';

        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $hash_pass = hash("sha256",$password);

        $validate_query = "SELECT * FROM user_data where username='$username' and password='$hash_pass'";
        $isValid_user = mysqli_query($connection,$validate_query);
        $count = mysqli_num_rows($isValid_user);
        if ($count > 0) {
            $this->session->set_userdata("username",$username);
            $this->session->set_userdata("uhash",hash("sha1",$username));
            echo base_url()."index.php/auth/dashboard";
        } else {
            echo "fail";
        }

    }

    public function newUser() {
        $this->load->view("register");
    }

    public function ForgotPassword() {
        $this->load->view("forgotPassword");
    }

    public function aboutus() {
        $this->load->view("aboutus");
    }

    public function Feedback() {
        $this->load->view("feedback");
    }

    public function RateUs() {
        if ($this->isSessionSet()) {
            $data = array(
                "id" => $this->session->userdata('username'),
                "hash" => $this->session->userdata('uhash')
            );
            $this->load->view('ratings',$data);
        } else {
            $this->index();
        }
    }

}