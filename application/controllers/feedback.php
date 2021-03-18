<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function sendFeed() {
        include 'dbconn.php';

        $message = $this->input->post("message");
        date_default_timezone_set("Asia/Kolkata");
        $feed_date = date(DATE_RFC822);

        $add_feedback_query = "INSERT INTO `feedback_comments`(`f_date`, `comment`) VALUES ('$feed_date','$message')";
        $add_feedback_result = mysqli_query($connection,$add_feedback_query);

        if ($add_feedback_result) {
            echo "ok";
        } else {
            echo "fail";
        }
    }

}