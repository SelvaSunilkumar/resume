<html>
    <head>
        <title>Feedback & Suggession</title>
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

                    <label>Feedback / Suggession</label>
                    <textarea id="message" class="form-control" placeholder = "Enter your Feedback or Suggession"></textarea>
                    <br>
                    <div class="text-center">
                        <div class="alert alert-success" style="display: none;" id="success">
                            Feedback submitted Successfully
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="fail">
                            Failed to submit Feedback
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="miss">
                            Please enter a message
                        </div>
                        <div class="alert alert-warning" style="display: none;" id="error">
                            Error in submiting Feedback
                        </div>
                    </div>
                </div>
                <div class="card-footer shadow text-end">
                    <button class="btn btn-sm btn-success" style="float: right;" onclick="sendFeedback()">&emsp;&emsp;Send Feedback <i class="fa fa-comment"></i>&emsp;&emsp;</button>
                    <br>
                    <label class="text-danger" style="font-size: 10px; float: left;"><b>*</b> To be honest, we don't know about who is sending feedbacks. We don't get your mail Id in feeback section. We accept all your valuable feedbacks.</label>
                </div>
            <div>
        </div>
    </body>
    <script>

        function _(el) {
            return document.getElementById(el);
        }

        function sendFeedback() {
            var message = _("message").value;
            
            _("success").style.display = "none";
            _("fail").style.display = "none";
            _("error").style.display = "none";
            _("miss").style.display = "none";

            if (message == "") {
                _("miss").style.display = "block";
            } else {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/feedback/sendFeed",
                    data:{message:message},
                    success:function(data) {
                        if (data == "ok") {
                            _("success").style.display = "block";
                        } else {
                            _("fail").style.display = "block";
                        }
                    }, error:function() {
                        _("error").style.display = "block";
                    }
                });
            }
        }
    
    </script>
</html>