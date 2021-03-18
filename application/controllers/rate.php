<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rate extends CI_Controller {

    public function validateUser() {
        $username = $this->input->post("uname");
        $username_enc = $this->input->post("uenc");
        $username_hash = hash("sha1",$username);

        if ($username_enc == $username_hash) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

    public function Ratings() {
        include 'dbconn.php';

        $message = $this->input->post("message");
        $rating = $this->input->post("rating");
        $username = $this->input->post("uname");

        date_default_timezone_set("Asia/Kolkata");
        $rate_date = date(DATE_RFC822);
        $rate_date = date_create($rate_date);
        $date_format = date_format($rate_date,"d/m/Y");

        $is_user_reviewed_query = "SELECT * FROM user_ratings WHERE username='$username'";
        $is_user_reviewed_result = mysqli_query($connection,$is_user_reviewed_query);

        $is_user_reviewed = mysqli_num_rows($is_user_reviewed_result);

        if ($is_user_reviewed > 0) {
            $rate_update_query = "UPDATE `user_ratings` SET `message`='$message',`rating`='$rating',`r_date`='$date_format' WHERE username='$username'";
            $rate_update_result = mysqli_query($connection,$rate_update_query);
            
            if ($rate_update_result) {
                echo "ok";
            } else {
                echo "fail";
            }
        } else {
            $rate_query = "INSERT INTO `user_ratings`(`username`, `message`, `rating`, `r_date`) VALUES ('$username','$message','$rating','$date_format')";
            $rate_result = mysqli_query($connection,$rate_query);

            if ($rate_result) {
                echo "ok";
            } else {
                echo "fail";
            }   
        }
    }

}