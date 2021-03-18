<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer extends CI_Controller {

    public function sendMail() {
        #691ea9eb2bf30506f9493f20871d04f0a8c85db23fc989b661fc533e3bacc721

        include 'dbconn.php';
        
        //$to_mail_id = $this->input->post("emailId");
        $to_mail_id = "sunil@student.tce.edu";

        $get_url_query = "SELECT * FROM forgot_pass_user WHERE username='$to_mail_id'";
        $get_url_result = mysqli_query($connection,$get_url_query);

        $get_url_attr = mysqli_fetch_assoc($get_url_result);
        $url_hash = $get_url_attr["fhash"];

        $fp_url = base_url()."index.php/reset_password/$url_hash";

        $mail_subject = "Forgotten password Reset";
        $mail_from = "TCE Resume Team";

        $mail_message_content = '<html>
            <body>
                <div>
                    Somebody (hopefully you) requested a new password for TCE Resume Creator account for '.$to_mail_id.'. No changes has been made to your account yet.
                    <br>
                    <br>
                    You can reset your password by clicking the link below:
                    <br>
                    <a href="'.$fp_url.'">'.$fp_url.'</a>
                </div>
                <div style="background: #ba382f; color: #fff; ">
                    <b><i>Link expires once you have reset your password. Link will be valid until you reset your password !.</i></b>
                </div>
                <div>
                    <br>
                    Yours,
                    <br>
                    The TCE Resume Team
                    <br>
                    Department of Computer Science and Engineering
                </div>
            </body>
        </html>';

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '60';

        $config['smtp_user'] = 'sunilselva3335@gmail.com';
        $config['smtp_pass'] = 'sunilkumar001';

        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE;

        $mail_reply = "noreply@tceresume.com";

        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->from($mail_from);
        $this->email->to($to_mail_id);
        $this->email->reply_to($mail_reply);
        $this->email->subject($mail_subject);
        $this->email->message($mail_message_content);
        $this->email->send();
        echo "ok";
    }

}