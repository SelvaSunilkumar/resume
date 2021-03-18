<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
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
    .green-bg {
        background: #ccc;
        color: #000;
    }

    .log {
        color: #000;
        font-weight: 500;
    }

    .log:hover {
        color: #4b4b4b;
    }

</style>
<body style="background: #fff;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark green-bg">
            <a class="navbar-brand text-dark font-weight-bold"><img src="<?php echo base_url();?>icons/icon v3.png" height=30px> &ensp;TCE Resume Creator</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle log" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Miscellaneous
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/auth/feedback"><i class="fa fa-comments"></i> Feedback & Suggestions</a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/auth/RateUs"><i class="fa fa-star text-warning"></i> Rate Us</a>
                        </div>
                    </div>
                    <a class="nav-link log" href="<?php echo base_url(); ?>index.php/auth/aboutus"><i class="fa fa-info"></i> &nbsp; About Us <span class="sr-only">(current)</span></a>
                    <a class="nav-link log" href="<?php echo base_url(); ?>index.php/auth/logout"><i class="fa fa-sign-out"></i> &nbsp; Log Out <span class="sr-only">(current)</span></a>
                </form>
            </div>
        </nav>
    </header>