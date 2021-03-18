<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgot extends CI_Controller {

    public function isEmailValid() {

        include 'dbconn.php';

        $email_id = $this->input->post("emailId");

        $valid_user_query = "SELECT * FROM user_data WHERE username='$email_id'";
        $valid_user_result = mysqli_query($connection,$valid_user_query);

        $user_count = mysqli_num_rows($valid_user_result);

        if ($user_count > 0) {
            #code to create link for forgot password
            #this is just to reduce the number of calls to the server
            $url_hash = hash("sha256",$email_id.date(DATE_RFC822));
            
            $pre_query = "SELECT * FROM forgot_pass_user WHERE username='$email_id'";
            $pre_result = mysqli_query($connection,$pre_query);

            $pre_count = mysqli_num_rows($pre_result);

            if ($pre_count > 0) {
                #code to update data
                $url_update_query = "UPDATE `forgot_pass_user` SET `fhash`='$url_hash' WHERE username='$email_id'";
                $url_update_result = mysqli_query($connection,$url_update_query);

            } else {
                #code to create new data
                $create_url_query = "INSERT INTO `forgot_pass_user`(`username`, `fhash`) VALUES ('$email_id','$url_hash')";
                $create_url_result = mysqli_query($connection,$create_url_query);
            }

            echo "ok";
        } else {
            echo "fail";
        }

    }

    public function reset($hash) {
        include 'dbconn.php';

        $get_email_query = "SELECT * FROM forgot_pass_user WHERE fhash='$hash'";
        $get_email_result = mysqli_query($connection,$get_email_query);

        $hash_count = mysqli_num_rows($get_email_result);

        if ($hash_count > 0) {
            $hash_attr = mysqli_fetch_assoc($get_email_result);
            $email_id_reset = $hash_attr["username"];
            $hash_data = array(
                "email_id" => $email_id_reset
            );
            $this->load->view("reset",$hash_data);

        } else {
            $hash_expired_query = "SELECT * FROM expired_link WHERE hash='$hash'";
            $hash_expired_result = mysqli_query($connection,$hash_expired_query);

            $is_hash_expired = mysqli_num_rows($hash_expired_result);

            if ($is_hash_expired > 0) {
                #page indication expired link
                $this->load->view("expired");
            } else {
                #page indicating unauthorised link
                $this->load->view("unauthorised");
            }
        }

    }

    public function resetPassword() {
        include 'dbconn.php';

        $emailid = $this->input->post("emailid");
        $password = $this->input->post("password");

        $get_reset_query = "SELECT * FROM forgot_pass_user WHERE username='$emailid'";
        $get_reset_result = mysqli_query($connection,$get_reset_query);

        $get_reset_hash_attr = mysqli_fetch_assoc($get_reset_result);
        $password_reset_hash = $get_reset_hash_attr["fhash"];

        $is_reset_requested = mysqli_num_rows($get_reset_result);

        if ($is_reset_requested < 1) {
            echo "exp";
        } else {
            $password_hash = hash("sha256",$password);
            $reset_password_query = "UPDATE `user_data` SET `password`='$password_hash' WHERE username='$emailid'";
            $reset_password_result = mysqli_query($connection,$reset_password_query);
            
            $delete_reset_request_query = "DELETE FROM `forgot_pass_user` WHERE username='$emailid'";
            $delete_reset_request_result = mysqli_query($connection,$delete_reset_request_query);

            $confirm_reset_query = "INSERT INTO `expired_link`(`hash`) VALUES ('$password_reset_hash')";
            $confirm_reset_result = mysqli_query($connection,$confirm_reset_query);

            if ($reset_password_result && $delete_reset_request_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        }

    }

 }