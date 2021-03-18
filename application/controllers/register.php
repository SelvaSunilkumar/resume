<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

    public function addUser() {

        include "dbconn.php";

        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $validate_query = "SELECT * FROM user_data WHERE username='$username'";
        $validate_result = mysqli_query($connection,$validate_query);

        $user_count = mysqli_num_rows($validate_result);

        if ($user_count > 0) {
            echo "exist";
        } else {
            $enc_username = hash("sha1",$username);
            $enc_password = hash("sha256",$password);
            $register_query = "INSERT INTO `user_data`(`username`, `user_hash`, `password`) VALUES ('$username','$enc_username','$enc_password')";
            $register_result = mysqli_query($connection,$register_query);

            if ($register_result) {
                echo "ok";
            } else {
                echo "fail";
            }

        }

    }

}