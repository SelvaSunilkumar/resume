
<html>
    <head>
        <title>New User - Register</title>
        <link rel="shortcut icon" type="image/icon" href="<?php echo base_url(); ?>icons/ivon v4.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="background: #ccc;">
        <div class="container" style="position: absolute; top:50%; left: 50%; transform: translate(-50%,-50%);">
            <div class="card shadow">
                <div class="card-header text-center shadow">
                    <img src="<?php echo base_url(); ?>icons/logo v2.png" height=100px;>
                </div>
                <div class="card-body">

                    <label>Email-Id</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="text" id="username" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter a Valid Email Id">
                    </div>
                    <label>Password</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter your Password">
                    </div>
                    <label>Confirm Password</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-lock"></i></span>
                        </div>
                        <input type="password" id="confirmPassword" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Re-enter your Password">
                    </div>
                    <div class="text-center">
                        <div class="alert alert-success" style="display: none;" id="success">
                            Registered Successfully ! <a href="<?php base_url(); ?>index" class="text-success"><b>Login Now</b></a>
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="fail">
                            Failed to Register User
                        </div>
                        <div class="alert alert-warning" style="display: none;" id="error">
                            Error in Registering
                        </div>
                    </div>
                </div>
                <div class="card-footer shadow">
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>index.php/auth">&emsp;&emsp;<i class="fa fa-sign-in"></i> Login Now&emsp;&emsp;</a>
                    <button class="btn btn-sm btn-success" style="float: right;" onclick="registerUser()">&emsp;&emsp;Register <i class="fa fa-user-plus"></i>&emsp;&emsp;</button>
                </div>
            <div>
        </div>
    </body>
    <script>
    
        function _(el) {
            return document.getElementById(el);
        }

        function registerUser() {
            var username = _("username").value;
            var password = _("password").value;
            var cpassword = _("confirmPassword").value;

            _("success").style.display = "none";
            _("fail").style.display = "none";
            _("error").style.display = "none";

            
            if (username == "" || password == "" || cpassword == "") {
                _("fail").style.display = "block";
                _("fail").innerHTML = "Please fill all the input fields";
            } else {
                if (cpassword == password) {
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/register/addUser",
                        type:"POST",
                        data:{username:username,password:password},
                        success:function(data) {
                            if (data == "exist") {
                                _("fail").style.display = "block";
                                _("fail").innerHTML = "Username Exists already";
                            } else if (data == "ok") {
                                _("success").style.display = "block";
                            } else {
                                _("fail").style.display = "block";
                                _("fail").innerHTML = "Failed to Register, Please try again";
                            }
                        },error:function() {
                            _("error").style.display = "block";
                        }
                    });
                } else {
                    _("fail").style.display = "block";
                    _("fail").innerHTML = "Passwords Doesn't Match";
                    _("confirmPassword").value = "";
                }
            }
        }
    
    </script>
</html>