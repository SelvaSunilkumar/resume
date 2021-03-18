
<!DOCTYPE html>
<html>
    <head>
        <title>TCE Resume - Forgot Password </title>
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

                    <div class="alert alert-primary text-center">
                        <b>Link to Change Password will be send to your Registered Mail Id.</b> And to recieve the mail please enter your <b><i>Registered Mail Id.</i></b>
                    </div>

                    <label>Email Id</label>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="text" id="mailid" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Enter a Valid Email Id">
                    </div>

                    <div id="ok" class="alert alert-success text-center" role="alert" style="display: none;">
                            Link has been send to your Mail
                    </div>
                    <div id="invalid" class="alert alert-danger text-center" role="alert" style="display: none;">
                            Mail Id not registered !
                    </div>
                    <div id="error" class="alert alert-danger text-center" role="alert" style="display: none;">
                        <b>Internal Error !!!</b>
                    </div>
                    <div id="warning" class="alert alert-warning text-center" role="alert" style="display: none;">
                        Please enter a valid Mail-id !
                    </div>
                </div>
                <div class="card-footer shadow text-center">
                    <button class="btn btn-sm btn-success" onclick="validateMail()">&emsp;&emsp;Send Mail &emsp; <i class="fa fa-envelope-open"></i>&emsp;&emsp;</button>
                </div>
            <div>
        </div>
    </body>
    <script>

        function _(el) {
            return document.getElementById(el);
        }
    
        function validateMail() {
            var emailId = _("mailid").value;

            _("ok").style.display = "none";
            _("invalid").style.display = "none";
            _("error").style.display = "none";
            _("warning").style.display = "none";

            if (emailId == "") {
                _("warning").style.display = "block";
            } else {
                $.ajax ({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/forgot/isEmailValid",
                    data:{emailId:emailId},
                    success:function(data) {
                        if (data == "ok") {
                            $.ajax ({
                                type:"POST",
                                url:"<?php echo base_url(); ?>index.php/mailer/sendMail",
                                data:{emailId:emailId},
                                success:function(data) {
                                    if (data == "ok") {
                                        _("ok").style.display = "block";
                                    } else {
                                        _("invalid").style.display = "block";
                                    }
                                },error:function() {
                                    _("error").style.display = "block";
                                }
                            });
                        } else {
                            _("invalid").style.display = "block";
                        }
                    },error:function() {
                        _("error").style.display = "block";
                    }
                });
            }
        }

    </script>
</html>