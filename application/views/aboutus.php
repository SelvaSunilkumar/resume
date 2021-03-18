<?php 
    include 'dbconn.php';

    $is_rated_query = "SELECT * FROM user_ratings";
    $is_rated_result = mysqli_query($connection,$is_rated_query);

    $is_rated = mysqli_num_rows($is_rated_result);

    $total_rating_sum = 0;
    $one_star_sum = 0;
    $two_star_sum = 0;
    $three_star_sum = 0;
    $four_star_sum = 0;
    $five_star_sum = 0;

    $roller_html = '';

    while ($is_rated_attr = mysqli_fetch_array($is_rated_result)) {
        $star_acq = $is_rated_attr["rating"];
        $total_rating_sum += $star_acq;
        if ($star_acq == 1) {
            $one_star_sum += 1;
        } else if ($star_acq == 2) {
            $two_star_sum += 1;
        } else if ($star_acq == 3) {
            $three_star_sum += 1;
        } else if($star_acq == 4) {
            $four_star_sum += 1;
        } else if ($star_acq == 5) {
            $five_star_sum += 1;
        }
        $review_comment = $is_rated_attr["message"];
        $roller_html .= '<div class="carousel-item">
            <div class="card" style="background-color: #ccc; min-height: 165px;">
                <div class="card-body lead" style="font-size: 18px; display: flex; justify-content: center; align-items: center;">
                    '.$review_comment.'
                </div>
            </div>
        </div> ';
    }

    if ($is_rated > 0) {
        $total_rating = $total_rating_sum / $is_rated;
        $total_rating = round($total_rating,1);
    }

    $registered_users_query = "SELECT * FROM user_data";
    $registered_users_result = mysqli_query($connection,$registered_users_query);

    $registered_users_count = mysqli_num_rows($registered_users_result);

?>
<html>
    <head>
        <title>About Us</title>
        <link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>icons/ivon v4.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
    
        .card {
            margin-top: 20px;
        }

    </style>
    <body style="background: #ccc;">
        <br><br>
        <div class="container">
            <div class="card shadow">
                <div class="card-header text-center shadow">
                    <img src="<?php echo base_url(); ?>icons/logo v2.png" height=100px;>
                </div>
                <div class="card-body">
                    <div class="jumbotron">
                        <h1 class="display-5">Welcome,</h1>
                        <p class="lead">This is a Simple Resume creator which creates resume based on your inputs as per TCE (Thiagarajar College Of Enginerring) standards. This is a project developed by a student of CSE Department in 2020-21.</p>

                        <hr class="my-4">
                    </div>
                </div>
            </div>
            <br><br>
            <div class="card shadow">
                <div class="card-header shadow">
                    <h4>Ratings and Comments</h4>
                </div>
                <div class="card-body">
                    <?php 

                        if ($is_rated > 0) {
                            ?>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <!--<div class="card shadow">
                                        <div class="card-body"> -->
                                            <div class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="card bg-primary text-light">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;">Overall Rating</p>
                                                                <h3><?php echo $total_rating; ?> <i class="fa fa-star"></i> </h3>
                                                                <p class="lead" style="font-size: 17px;">from <?php echo $is_rated; ?> users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card bg-danger text-light">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;"><b>1</b> <i class="fa fa-star" style="color: orange;"></i> rating by</p>
                                                                <h3><?php echo $one_star_sum; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">active registered users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card bg-warning">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;"><b>2</b> <i class="fa fa-star" style="color: orange;"></i> rating by</p>
                                                                <h3><?php echo $two_star_sum; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">active registered users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card bg-secondary text-light">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;"><b>3</b> <i class="fa fa-star" style="color: orange;"></i> rating by</p>
                                                                <h3><?php echo $three_star_sum; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">active registered users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card text-light" style="background-color: #5cafdb;">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;"><b>4</b> <i class="fa fa-star" style="color: orange;"></i> rating by</p>
                                                                <h3><?php echo $four_star_sum; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">active registered users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card bg-success text-light">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;"><b>5</b> <i class="fa fa-star" style="color: orange;"></i> rating by</p>
                                                                <h3><?php echo $five_star_sum; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">active registered users</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="carousel-item">
                                                        <div class="card" style="background-color: #ccc;">
                                                            <div class="card-body text-center">
                                                                <p class="lead" style="font-size: 15px;">There are exactly</p>
                                                                <h3><?php echo $registered_users_count; ?></h3>
                                                                <p class="lead" style="font-size: 17px;">registerd users till date</p>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                <!--</div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="card" style="background-color: #ccc;">
                                                    <div class="card-body text-center">
                                                            <h3 class="display-1">User Reviews</h3>
                                                    </div>
                                                </div>
                                            </div> 
                                            <?php 
                                                /*$roller_html = '';
                                                while ($rate_attr = mysqli_fetch_array($is_rated_result)) {
                                                    $review_comment = $rate_attr["message"];
                                                    $roller_html .= '<div class="carousel-item">
                                                        <div class="card" style="background-color: #ccc; min-height: 165px;">
                                                            <div class="card-body lead text-center" style="font-size: 15px;">
                                                                '.$review_comment.'
                                                            </div>
                                                        </div>
                                                    </div> ';
                                                }*/
                                                echo $roller_html;
                                            ?>
                                            
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                        } else {
                            ?>
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    <img src="<?php echo base_url(); ?>gifs/sad.gif" width=100px></img>
                                </div>
                                <div class="col-sm-8 lead text-center" style="display: flex; justify-content: center; align-items: center;">
                                    We haven't been Reviewed so far...
                                </div>
                            </div>
                            
                            <?php
                        }
                    
                    ?>
                </div>
            </div>
            <br><br>
            <div class="card shadow">
                <div class="card-header shadow">
                    <h3 class="display-5">About TCE Resume</h3>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <img src="<?php echo base_url(); ?>images/dashboard.png" class="card-img-top" alt="image of Dashboard">
                        <div class="card-body" style="background: #e3e3e3;">
                            <h4>Dashboard</h4>
                            <p>
                                Dashboard is the page where all your resume that were created will be displayed in a list based on the date of creation.
                            </p>
                            <hr class="my-4">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#dashboard">&emsp;Read More&emsp;</button>
                            <div class="collapse" id="dashboard">
                                <br>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width: 15%;"><b>Date Created</td>
                                            <td style="width: 5%;"><b>:</td>
                                            <td style="width: 70%;"> Date created indicates the data of creation of particular resume.</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;"><b>Edit</td>
                                            <td style="width: 5%;"><b>:</td>
                                            <td style="width: 70%;"> Edit link would take you to edit the particular resume created.</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 15%;"><b>View and Download</td>
                                            <td style="width: 5%;"><b>:</td>
                                            <td style="width: 70%;"> To view the resume and download it from browser.</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <div class ="alert alert-primary text-center">
                                    Currently Edit link won't be working. We will enable the edit link as soon as possible. <b>Sorry for the Inconvenience</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="card shadow">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="<?php echo base_url(); ?>images/newresume1.png" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url(); ?>images/newresume2.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="<?php echo base_url(); ?>images/newresume3.png" alt="Third slide">
                                </div>
                            </div>
                            <style>
                                .carousel-control-prev-icon,
                                .carousel-control-next-icon {
                                    height: 50px;
                                    width: 50px;
                                    outline: none;
                                    background-size: 100%, 100%;
                                    border-radius: 50%;
                                    border: 1px ;
                                    background: #ccc;
                                    background-image: none;
                                }

                                .carousel-control-next-icon:after
                                {
                                    content: '>';
                                    font-size: 30px;
                                    color: white;
                                }

                                .carousel-control-prev-icon:after {
                                    content: '<';
                                    font-size: 30px;
                                    color: white;
                                }
                            </style>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only ">Next</span>
                            </a>
                        </div>
                        <div class="card-body" style="background: #e3e3e3;">
                            <h4>New Resume</h4>
                            <p>
                                Dashboard is the page where all your resume that were created will be displayed in a list based on the date of creation.
                            </p>
                            <hr class="my-4">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#newresume">&emsp;Read More&emsp;</button>
                            <div class="collapse" id="newresume">
                                <br>
                                <ul>
                                    <li>All the Fields that are available in ready state has to be filled to avoid empty spots in resume.</li>
                                    <li>The data would be jumbled when the page is moved from any other page. ie., on clicking back button from another page to this page</li>
                                    <li>Once after submiting, a link to view resume will be available. Please wait till that.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="card shadow text-center box">
                                <div class="text-center shadow">
                                    <img src="<?php echo base_url(); ?>icons/reset.png" class="rounded" alt="...">
                                </div>
                                <div class="card-body" style="background: #e3e3e3;">
                                    <h5>Email & Reset Password</h5>
                                    <p>
                                        The email id should be a valid email id. Email Id depicts your Identity in this project.    
                                    </p>
                                    <p>
                                        If you have forgot your password. The link to reset your existing password will be send through mail.
                                    </p>
                                    <p>The link to reset password send via mail is a single purpose mail. ie., the link will be expired once you have reset your password</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card shadow text-center box">
                                <div class="text-center shadow">
                                    <img src="<?php echo base_url(); ?>icons/password.jpg" class="rounded" alt="...">
                                </div>
                                <div class="card-body" style="background: #e3e3e3;">
                                    <h5>Password Security</h5>
                                    <p>
                                        The password won't be known to anyone other than you including the Admin.  
                                    </p>
                                    <p>
                                        The password stored in database is encrypted in 256 bit format.
                                    </p>
                                    <p>No one other than you can view your resume at any cost.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <footer class="bg-dark text-center text-lg-start">
            <div class="text-center p-3 text-light">
                © 2021 Copyright:
                <a class="text-light" href="?"> Department of Computer Science and Engineering <b>(TCE)</b></a>
            </div>
        </footer>
        
    </body>
    <style>
    
        .box {
            margin-bottom: 15px;
        }

    </style>
</html>