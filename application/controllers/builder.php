<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Builder extends CI_Controller { 

    public function createNew() {
        include 'dbconn.php';

        $jsonData = $_POST["json"];
        
        $unique_id = md5(uniqid(rand(), true));
        date_default_timezone_set("Asia/Kolkata");
        $rate_date = date(DATE_RFC822);
        $rate_date = date_create($rate_date);
        $date_format = date_format($rate_date,"d/m/Y @ H:i:s");
        //$date_d = date('d/m/Y',time());
        $user_name = $_POST["id"];
        $url = "http://localhost/ss";
        
        $upload_query = "INSERT INTO `resume_data`(`uname`, `id`, `c_date`, `json`, `image_url`, `sign_url`) VALUES ('$user_name','$unique_id','$date_format','$jsonData','$url','$url')";
        $upload_result = mysqli_query($connection,$upload_query);

        if ($upload_result) {
            echo $unique_id;
        } else {
            echo mysqli_error($connection);
        }
        
    }

    public function viewPDF($id) {
        include 'dbconn.php';

        $getPDF_query = "SELECT * FROM resume_data where id='$id'";
        $getPDF_result = mysqli_query($connection,$getPDF_query);

        $getPDF_data = mysqli_fetch_assoc($getPDF_result);

        $htmlJSON = $getPDF_data["json"];
        
        $json = json_decode($htmlJSON,true);

        $profile_image_url = $json['data']['profileUrl'];
        $signature_image_url = $json['data']['signatureUrl'];

        $no_of_intrests = $json['data']['intrests'];
        $no_of_expertise = $json['data']['expertise'];
        $no_of_project = $json['data']['project'];
        $no_of_industry = $json['data']['industry'];
        $no_of_achievement = $json['data']['achievement'];
        $no_of_activity = $json['data']['activity'];
        $no_of_extras = $json['data']['extras'];
        $no_of_traits = $json['data']['traits'];
        $no_of_hobby = $json['data']['hobby'];
        $no_of_language = $json['data']['language'];
        $additional_details = $json['data']['additional'];

        //Primary Details 
        $name = $json['primaryDetails']['name'];
        $regno = $json['primaryDetails']['regno'];
        $dept = $json['primaryDetails']['dept'];
        $objective = $json['primaryDetails']['objective'];
        echo $name;

        //personal details like name, regno, department
        $htmlFile = '';
        $htmlFile = '<html>
        <style>
            .acaT,.acaH,.acaD {
                border: 1px solid black;
                border-collapse: collapse;
                height: auto;
                text-align: center;
                padding-top: 10px;
                padding-bottom: 10px;
                font-size: 18px;
            }
            .acaH {
                background: #ccc;
            }
            .acaD {
                font-size: 20px;
            }
            .tablefont {
                border: 1px solid black;
                border-collapse: collapse;
                height: auto;
                font-size: 12px;
                text-align: left;
                padding-left: 10px;
            }

        </style>
        <body>
            <div style="width: 100%; margin-left:20px; margin-right:20px;">
                <div style="width: 15%;float: left;">
                    <img src="https://img.collegedekhocdn.com/media/img/institute/logo/tce_logo.png" width="100%" alt="lfm">
                </div>
                <div style="width: 85%; text-align: center;float: right;">
                    <div style="font-size: 18px; font-weight: bold;">
                        Thiagarajar College of Engineering
                    </div>
                    <div style="font-size: 10px; font-weight: bold;">
                        A Government Aided ISO 9001:2000 Certified Autonomous Institution Affiliated to Anna University
                    </div>
                    <div style="font-size: 10px;">
                        Contact Address: C/o The Placement officer, Thiagarajar College of Engineering, Madurai – 625015
                    </div>
                    <div style="width: 100%;">
                        <div style="width: 40%;float: left;text-align: justify; margin-left: 25px;">
                            <div style="font-size: 10px;">
                                Telephone: +91+452+2482243
                            </div>
                            <div style="font-size: 10px;">
                                Fax : +91+452+2483427
                            </div>
                        </div>
                        <div style="width: 30%;float: right; text-align: justify; margin-left: 50px;">
                            <div style="font-size: 10px;">
                                Email: placement@tce.edu
                            </div>
                            <div style="font-size: 10px;">
                                Website : www.tce.edu
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <hr style="border-top: 3px solid #000;">
            </div>
            <div style="margin-top: 10px; width: 100%; margin-left:20px; margin-right:20px;">
                <div style="width: 75%; float: left;">
                    <div style="width: 90%; margin-top: 25px;">
                        <div style="width: 20%; float: left;">
                            <b>NAME</b>
                        </div>
                        <div style="width: 75%; float: right;">
                            <b>:&emsp;&emsp;'.$name.'</b>
                        </div>
                    </div>
                    <div style="width: 90%; margin-top: 15px;">
                        <div style="width: 20%; float: left;">
                            <b>REG No</b>
                        </div>
                        <div style="width: 75%; float: right;">
                            <b>:&emsp;&emsp;'.$regno.'</b>
                        </div>
                    </div>
                    <div style="width: 90%; margin-top: 15px;">
                        <div style="width: 20%; float: left;">
                            <b>DEGREE</b>
                        </div>
                        <div style="width: 75%; float: right;">
                            <b>:&emsp;&emsp;'.$dept.'</b>
                        </div>
                    </div>
                </div>
                <div style="width: 15%; float: right;">
                    <img src="'.$profile_image_url.'" width="110px" height="120px">
                </div>
            </div>
            <br>';

        //Professional Objective 
        $htmlFile .= '<div>
        <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
        <label style="width:100%; background-color: #ccc; height: 50px;">PROFESSIONAL OBJECTIVE</label>
        </div>
        <div style="font-size: 15px; margin-top: 10px;">
            '.$objective.'
        </div>
        </div>
        <br>';

        //UG Details
        $ug_dept = $json['ug_details']['dept'];
        $ug_insti = $json['ug_details']['institute'];
        $ug_board = $json['ug_details']['board'];
        $ug_pass = $json['ug_details']['pass'];
        $ug_cgpa = $json['ug_details']['cgpa'];

        $htmlFile .= '<div>
        <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
        <label style="width:100%; background-color: #ccc; height: 50px;">ACADEMIC RECORD</label>
        </div>
        <div style="margin-top: 10px;">
            <table class="acaT">
                <thead>
                    <tr>
                        <th class="acaH" style="width: 10%;">CLASS / COURSE</th>
                        <th class="acaH" style="width: 30%;">NAME OF THE INSTITUTION</th>
                        <th class="acaH" style="width: 30%;">BOARD OF STUDY</th>
                        <th class="acaH" style="width: 10%;">YEAR OF PASSING</th>
                        <th class="acaH" style="width: 10%;">MARKS(%) / CGPA</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <tr>
                        <th class="acaH">'.$ug_dept.'</th>
                        <td class="acaD">'.$ug_insti.'</td>
                        <td class="acaD">'.$ug_board.'</td>
                        <td class="acaD">'.$ug_pass.'</td>
                        <td class="acaD">'.$ug_cgpa.'</td>
                    </tr>';

        //additional details
        if ($additional_details) {

            $add_dept = $json['add_details']['dept'];
            $add_insti = $json['add_details']['insti'];
            $add_board = $json['add_details']['board'];
            $add_pass = $json['add_details']['pass'];
            $add_cgpa = $json['add_details']['cgpa'];

            $htmlFile .= '<tr>
            <th class="acaH">'.$add_dept.'</th>
            <td class="acaD">'.$add_insti.'</td>
            <td class="acaD">'.$add_board.'</td>
            <td class="acaD">'.$add_pass.'</td>
            <td class="acaD">'.$add_cgpa.'</td>
        </tr>';
        }

        //12th or Diplomo and 10th
        $ss_dept = $json['ss_details']['dept'];
        $ss_insti = $json['ss_details']['insti'];
        $ss_board = $json['ss_details']['board'];
        $ss_pass = $json['ss_details']['pass'];
        $ss_cgpa = $json['ss_details']['cgpa'];

        $s_dept = $json['s_details']['dept'];
        $s_insti = $json['s_details']['insti'];
        $s_board = $json['s_details']['board'];
        $s_pass = $json['s_details']['pass'];
        $s_cgpa = $json['s_details']['cgpa'];

        $htmlFile .= '
        <tr>
            <th class="acaH">'.$ss_dept.'</th>
            <td class="acaD">'.$ss_insti.'</td>
            <td class="acaD">'.$ss_board.'</td>
            <td class="acaD">'.$ss_pass.'</td>
            <td class="acaD">'.$ss_cgpa.'</td>
        </tr>
        <tr>
            <th class="acaH">'.$s_dept.'</th>
            <td class="acaD">'.$s_insti.'</td>
            <td class="acaD">'.$s_board.'</td>
            <td class="acaD">'.$s_pass.'</td>
            <td class="acaD">'.$s_cgpa.'</td>
        </tr>
        </tbody>
        </table>
        <div>
        </div>';

        if ($no_of_intrests > 0) {
            $intrest_iterator = 0;
            
            $htmlFile .='<div style="margin-top: 20px;">
            <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
            <label style="width:100%; background-color: #ccc; height: 50px;">AREA OF INTEREST    </label>
            </div>';

            while ($intrest_iterator < $no_of_intrests) {
                $intrest_data = $json['intrest'][$intrest_iterator]["intrest"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                <div style="width: 5%; float: left;">
                    <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                </div>
                <div style="width: 92%; float: right;">
                    '.$intrest_data.'
                </div>
                </div>';
                $intrest_iterator = $intrest_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_expertise > 0) {
            $expertise_iterator = 0;

            $htmlFile .= '<div style="margin-top: 20px;">
            <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
            <label style="width:100%; background-color: #ccc; height: 50px;">TECHNICAL EXPERTISE    </label>
            </div>
            <div style="width: 100%; margin-top: 10px; margin-left: 15px;">
            <table>';
            
            while ($expertise_iterator < $no_of_expertise) {
                $expertise_title = $json['expertise'][$expertise_iterator]["title"];
                $expertise_list = $json['expertise'][$expertise_iterator]["list"];
                $htmlFile .= '
                        <tr class="exp">
                            <th style="width: 5%; justify-content: start; vertical-align: top;">
                                <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                            </th>
                            <th style="width: 30%; text-align: start; vertical-align: top;">
                                '.$expertise_title.'
                            </th>
                            <th style="width: 5%; vertical-align: top;">
                                :
                            </th>
                            <td style="width: 50%; text-align: left; vertical-align: top;">
                                '.$expertise_list.'
                            </td>
                        </tr>';
                $expertise_iterator = $expertise_iterator + 1;
            }
            $htmlFile .= '
            </table>
            </div>
            </div>';
        }

        if ($no_of_project > 0) {
            $project_iterator = 0;

            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">PROJECTS</label>
                </div>';
            
            

            while ($project_iterator < $no_of_project) {
                $pro_title = $json['project'][$project_iterator]["title"];
                $pro_startdate = $json['project'][$project_iterator]["projectTeamSize"];
                $pro_frontend = $json['project'][$project_iterator]["frontend"];
                $pro_backend = $json['project'][$project_iterator]["backend"];
                $pro_desc = $json['project'][$project_iterator]["description"];
                $pro_link = $json['project'][$project_iterator]["link"];

                /*$htmlFile .= '<div style="margin-left: 15px; margin-top: 15px;">
                    <div style="font-size: 12px;">
                        '.$pro_startmonth.' &ensp; '.$pro_startYear.' &nbsp; &#x2015; &ensp; '.$pro_endMonth.' &nbsp; '.$pro_endYear.'
                    </div>
                    <div style="font-size: 16px; font-weight: bold; margin-top: 10px">
                        '.$pro_title.'
                    </div>
                    <div style="font-size: 14px; margin-top: 10px">
                        '.$pro_tools.'
                    </div>
                    <div style="font-size: 14px; margin-top: 10px">
                        '.$pro_desc.'
                    </div>
                    <div style="margin-top: 10px; font-size: 12px;">
                        <a href="'.$pro_link.'">'.$pro_link.'</a>
                    </div>
                </div>';*/

                $htmlFile .= '<br><table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="acaH" style=" font-size: 16px; text-align: left; padding-left: 10px;">'.$pro_title.'</th>
                    </tr>
                </table>';
                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 20%;">FrontEnd</th>
                        <td class="tablefont">'.$pro_frontend.'</td>
                    </tr>
                    <tr>
                        <th class="tablefont" style="width: 20%;">BackEnd</th>
                        <td class="tablefont">'.$pro_backend.'</td>
                    </tr>
                    </table>
                    <table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 30%;">Team Size</th>
                        <td class="tablefont">'.$pro_startdate.'</td>
                    </tr>
                    </table>';

                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th style="font-size: 14px; text-align: left; padding-left: 10px;">Description</th>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; text-align: left; padding-left: 10px;">'.$pro_desc.'</td>
                    </tr>
                </table>';

                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 20%;">Project URL</th>
                        <td class="tablefont"><a href="'.$pro_link.'">'.$pro_link.'</a></td>
                    </tr>
                </table>';

                    $project_iterator = $project_iterator + 1;
                }

            $htmlFile .= '</div>';
        }

        if ($no_of_industry > 0) {
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">INDUSTRIAL TRAINING</label>
                </div>';

            $industry_iterator = 0;

            while ($industry_iterator < $no_of_industry) {
                $pro_title = $json['intern'][$industry_iterator]["title"];
                $pro_startmonth = $json['intern'][$industry_iterator]["startDate"];
                $pro_startYear = $json['intern'][$industry_iterator]["endDate"];
                $pro_endMonth = $json['intern'][$industry_iterator]["frontEnd"];
                $pro_endYear = $json['intern'][$industry_iterator]["backEnd"];
                $pro_desc = $json['intern'][$industry_iterator]["description"];
                $pro_link = $json['intern'][$industry_iterator]["link"];
                
                /*$htmlFile .= '<div style="margin-left: 15px; margin-top: 15px;">
                    <div style="font-size: 12px;">
                        '.$pro_startmonth.' &ensp; '.$pro_startYear.' &nbsp; &#x2015; &ensp; '.$pro_endMonth.' &nbsp; '.$pro_endYear.'
                    </div>
                    <div style="font-size: 16px; font-weight: bold; margin-top: 10px">
                        '.$pro_title.'
                    </div>
                    <div style="font-size: 14px; margin-top: 10px">
                        '.$pro_tools.'
                    </div>
                    <div style="font-size: 14px; margin-top: 10px">
                        '.$pro_desc.'
                    </div>
                    <div style="margin-top: 10px; font-size: 12px;">
                        <a href="'.$pro_link.'">'.$pro_link.'</a>
                    </div>
                </div>';*/

                $htmlFile .= '<br><table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="acaH" style=" font-size: 16px; text-align: left; padding-left: 10px;">'.$pro_title.'</th>
                    </tr>
                </table>';
                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 20%;">FrontEnd</th>
                        <td class="tablefont">'.$pro_endMonth.'</td>
                    </tr>
                    <tr>
                        <th class="tablefont" style="width: 20%;">BackEnd</th>
                        <td class="tablefont">'.$pro_endYear.'</td>
                    </tr>
                    </table>
                    <table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 20%;">Start Date</th>
                        <td class="tablefont" style="width: 30%;">'.$pro_startmonth.'</td>
                        <th class="tablefont" style="width: 20%;">End Date</th>
                        <td class="tablefont" style="width: 30%;">'.$pro_startYear.'</td>
                    </tr>
                    </table>';

                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th style="font-size: 14px; text-align: left; padding-left: 10px;">Description</th>
                    </tr>
                    <tr>
                        <td style="font-size: 15px; text-align: left; padding-left: 10px;">'.$pro_desc.'</td>
                    </tr>
                </table>';

                $htmlFile .= '<table class="acaT" style="width: 100%;">
                    <tr>
                        <th class="tablefont" style="width: 20%;">Project URL</th>
                        <td class="tablefont"><a href="'.$pro_link.'">'.$pro_link.'</a></td>
                    </tr>
                </table>';

                $industry_iterator = $industry_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_achievement > 0) {
            $achievement_iterator = 0;
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">ACHIEVEMENT</label>
                </div>';

            while ($achievement_iterator < $no_of_achievement) {
                $achievement_data = $json['achievement'][$achievement_iterator]["data"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                    <div style="width: 5%; float: left;">
                        <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                    </div>
                    <div style="width: 92%; float: right;">
                        '.$achievement_data.'
                    </div>
                </div>';
                $achievement_iterator = $achievement_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_activity > 0) {
            $activity_iterator = 0;

            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">CO-CURRICULAR ACTIVITIES</label>
                </div>';
            
            while ($activity_iterator < $no_of_activity) {
                $activity_data = $json['activity'][$activity_iterator]["data"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                    <div style="width: 5%; float: left;">
                        <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                    </div>
                    <div style="width: 92%; float: right;">
                        '.$activity_data.'
                    </div>
                </div>';
                $activity_iterator = $activity_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_extras > 0) {
            $extra_iterator = 0;
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">EXTRA-CURRICULAR ACTIVITIES</label>
                </div>';

            while ($extra_iterator < $no_of_extras) {
                $extra_data = $json['extraActivity'][$extra_iterator]["data"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                    <div style="width: 5%; float: left;">
                        <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                    </div>
                    <div style="width: 92%; float: right;">
                        '.$extra_data.'
                    </div>
                </div>';
                $extra_iterator = $extra_iterator + 1;
            }
            
            $htmlFile .= '</div>';
        }

        if ($no_of_traits > 0) {
            $trait_iterator = 0;
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">LEADERSHIP TRAITS</label>
                </div>';
            
            while ($trait_iterator < $no_of_traits) {
                $trait_data = $json['trait'][$trait_iterator]["data"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                    <div style="width: 5%; float: left;">
                        <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                    </div>
                    <div style="width: 92%; float: right;">
                        '.$trait_data.'
                    </div>
                </div>';
                $trait_iterator = $trait_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_hobby > 0) {
            $hobby_iterator = 0;
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">HOBBIES</label>
                </div>';

            while ($hobby_iterator < $no_of_hobby) {
                $hobby_data = $json['hobby'][$hobby_iterator]["data"];
                $htmlFile .= '<div style="width: 100%; margin-top: 10px;">
                    <div style="width: 5%; float: left;">
                        <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                    </div>
                    <div style="width: 92%; float: right;">
                        '.$hobby_data.'
                    </div>
                </div>';
                $hobby_iterator = $hobby_iterator + 1;
            }

            $htmlFile .= '</div>';
        }

        if ($no_of_language > 0) {
            $language_iterator = 0;
            $htmlFile .= '<div style="margin-top: 20px;">
                <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
                <label style="width:100%; background-color: #ccc; height: 50px;">LANGUAGES</label>
                </div><div style="width: 100%; margin-top: 10px; margin-left: 15px;">
                <table>';

            while ($language_iterator < $no_of_language) {
                $language_data = $json['language'][$language_iterator]["language"];
                $read = $json['language'][$language_iterator]["read"];
                $speak = $json['language'][$language_iterator]["speak"];
                $write = $json['language'][$language_iterator]["write"];

                $data = '';

                if ($read) {
                    $data .= 'Read, ';
                }
                if ($speak) {
                    $data .= 'Speak, ';
                }
                if ($write) {
                    $data .= 'Write';
                }

                $htmlFile .= '
                        <tr class="exp">
                            <th style="width: 5%; justify-content: start; vertical-align: top;">
                                <img src="http://localhost/trial/dot.png" style="width: 5px; height: 5px; float: right; margin-top: 6px;">
                            </th>
                            <th style="width: 30%; text-align: start; vertical-align: top;">
                                '.$language_data.'
                            </th>
                            <th style="width: 5%; vertical-align: top;">
                                :
                            </th>
                            <td style="width: 50%; text-align: left; vertical-align: top;">
                                '.$data.'
                            </td>
                        </tr>';
                $language_iterator = $language_iterator + 1;
            }

            $htmlFile .= '
            </table>
            </div></div>';
        }

        $address_part_one = $json["personalDetails"]["address1"];
        $address_part_two = $json["personalDetails"]["address2"];
        $address_part_three = $json["personalDetails"]["address3"];
        $contact_no = $json["personalDetails"]["contactNo"];
        $email = $json['personalDetails']['email'];
        $dob = $json['personalDetails']['dob'];
        $age = $json['personalDetails']['age'];
        $gender = $json['personalDetails']['gender'];
        $fatherName = $json['personalDetails']['fatherName'];
        $motherName = $json['personalDetails']['motherName'];
        $motherTongue = $json['personalDetails']['motherTongue'];
        $place = $json['personalDetails']['place'];
        $date = $json['personalDetails']['date'];

        $htmlFile .= '<div style="margin-top: 20px;">
            <div style=" font-size: 15px; font-weight: bold; background-color: #ccc; padding: 5px;">
            <label style="width:100%; background-color: #ccc; height: 50px;">PERSONAL DETAILS</label>
            </div>
            <div style="width: 100%; margin-top: 10px; margin-left: 15px;">
                <table style="width: 100%;">
                    <tr style="width: 100%;">
                        <td style="width: 40%; vertical-align: top;">
                            <div>
                                <h4>Contact Address</h4>
                            </div>
                            <br>
                            <div>
                                C/O the Placement Officer
                            </div>
                            <div style="padding-top: 15px;">
                                Thiagarajar College of Engineering
                            </div>
                            <div style="padding-top: 15px;">
                                Thiruparankundaram, Madurai -15
                            </div>
                            <br>
                            <table>
                                <tr>
                                    <th style="text-align: left;">Ph</th>
                                    <td>:&emsp; 0452-2482240/41</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Email</th>
                                    <td>:&emsp; placement@tce.edu</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 40%; vertical-align: top;">
                            <div>
                                <h4>Permanent Address</h4>
                            </div>
                            <br>
                            <div>
                                '.$address_part_one.'
                            </div>
                            <div style="padding-top: 15px;">
                                '.$address_part_two.'
                            </div>
                            <div style="padding-top: 15px;">
                                '.$address_part_three.'
                            </div>
                            <br>
                            <table>
                                <tr>
                                    <th style="text-align: left;">Ph</th>
                                    <td>:&emsp; '.$contact_no.'</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Email</th>
                                    <td>:&emsp; '.$email.'</td>
                                </tr>
                            </table>
                        </td>
                    </td>
                </table>
            </div>
            </div>
            <div style="margin-top: 25px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;">
                        <b>Date Of Birth :</b>&emsp; '.$dob.'
                    </td>
                    <td style="width: 20%;">
                        <b>Age :</b>&emsp; '.$age.'
                    </td>
                    <td style="width: 30%;">
                        <b>Gender :</b>&emsp; '.$gender.'
                    </td>
                </tr>
            </table>
            </div>
            <div style="margin-top: 25px;">
            <table style="width: 100%;">
                <tr>
                    <th style="width: 25%; text-align: left;">
                        Father\'s Name
                    </th>
                    <td style="width: 60%;">
                        : &emsp; '.$fatherName.'
                    <td>
                </tr>
                <tr>
                    <th style="width: 25%; text-align: left;">
                        Mother\'s Name
                    </th>
                    <td style="width: 60%;">
                        : &emsp; '.$motherName.'
                    <td>
                </tr>
                <tr>
                    <th style="width: 25%; text-align: left;">
                    Mother Tongue
                    </th>
                    <td style="width: 60%;">
                        : &emsp; '.$motherTongue.'
                    <td>
                </tr>
            </table>
            </div>
            <div style="margin-top: 50px;">
            I, <u><b>S Sunil Kumar</b></u> do hereby confirm that the information given above is true to the best of my knowledge. 
            </div>
            <div style="margin-top:50px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%">
                        <table>
                            <tr>
                                <th style="width: 25%; text-align: left;">
                                    PLACE
                                </th>
                                <td style="width: 60%;">
                                    : &emsp; '.$place.'
                                <td>
                            </tr> 
                            <tr>
                                <th style="width: 25%; text-align: left;">
                                    DATE
                                </th>
                                <td style="width: 60%;">
                                    : &emsp; '.$date.'
                                <td>
                            </tr> 
                        </table>
                    </td>
                    <td style="width: 50%; text-align: right;">
                        <div>
                            <img src="'.$signature_image_url.'" width="150px" height="50px";>
                        </div>
                        <div style="text-align: right;">
                            <b>SIGNATURE</b>
                        </div>
                    <td>
                </tr>
            </table>
            </div>
            </body>
            </html>';

            //echo $htmlFile;
            require 'vendor/autoload.php';
            $pdf = new \Mpdf\Mpdf();

            //$mpdf->cacheTables = true;
            //$mpdf->simpleTables=true;
            //$mpdf->packTableData=true;

            $pdf->WriteHTML($htmlFile);
            $fileName = $id.".pdf";
            $pdf->Output($fileName,"I");
    }

}