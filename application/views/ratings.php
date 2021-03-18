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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Error</h5>
                </div>
                <div class="modal-body">
                    Some part of the Code is Crashed or been Modified. We request you to refresh the page to continue.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="refresh()">Refresh</button>
                </div>
                </div>
            </div>
        </div>
        <div class="container" style="position: absolute; top:50%; left: 50%; transform: translate(-50%,-50%);">
            <div class="card shadow">
                <div class="card-header text-center shadow">
                    <img src="<?php echo base_url(); ?>icons/logo v2.png" height=100px;>
                </div>
                <div class="card-body">
                    
                    <div class="form-group text-center">
                        <b>Rate Us :</b> &emsp;&emsp;
                        <span onclick="starOne()" id="starOne" class="fa fa-star"></span>&ensp;
                        <span onclick="starTwo()" id="starTwo" class="fa fa-star"></span>&ensp;
                        <span onclick="starThree()" id="starThree" class="fa fa-star"></span>&ensp;
                        <span onclick="starFour()" id="starFour" class="fa fa-star"></span>&ensp;
                        <span onclick="starFive()" id="starFive" class="fa fa-star"></span>
                    </div>
                    <div class="form-group">
                        <label>Email Id</label>
                        <input type="hidden" value="<?php echo $id; ?>" id="emailid">
                        <input type="hidden" value="<?php echo $hash; ?>" id="hash">
                        <input type="text" value="<?php echo $id; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Your Comments please</label>
                        <textarea id="message" placeholder="Please give a comment for the rating." class="form-control"></textarea>
                    </div>
                    
                    <div class="text-center">
                        <div class="alert alert-success" style="display: none;" id="success">
                            Rating submitted Successfully
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="fail">
                            Failed to submit Rating
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="miss">
                            Please enter a message
                        </div>
                        <div class="alert alert-danger" style="display: none;" id="rate">
                            Please rate us in stars
                        </div>
                        <div class="alert alert-warning" style="display: none;" id="error">
                            Error in submiting Rating
                        </div>
                    </div>
                </div>
                <div class="card-footer shadow text-end">
                    <button class="btn btn-sm btn-success" style="float: right;" onclick="sendRating()">&emsp;&emsp;Confirm Rating <i class="fa fa-star"></i>&emsp;&emsp;</button>
                </div>
            <div>
        </div>
    </body>
    <script>

        var rating = 0;
        var isStarOneChecked = false;
        var isStarTwoChecked = false;
        var isStarThreeChecked = false;
        var isStarFourChecked = false;
        var isStarFiveChecked = false;
    
        function _(el) {
            return document.getElementById(el);
        }

        function refresh() {
            location.reload();
        }
        
        function sendRating() {
            _("success").style.display = "none";
            _("fail").style.display = "none";
            _("miss").style.display = "none";
            _("rate").style.display = "none";
            _("error").style.display = "none";

            var message = _("message").value;

            var uname = _("emailid").value;
            var uenc = _("hash").value;

            if (!isStarOneChecked && !isStarTwoChecked && !isStarThreeChecked && !isStarFourChecked && !isStarFiveChecked) {
                rating = 0;
                _("rate").style.display = "block";
                
            } else if (message == "") {
                _("miss").style.display = "block";
            } else {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>index.php/rate/validateUser",
                    data:{uname:uname,uenc:uenc},
                    success:function(data) {
                        if (data == "ok") {
                            $.ajax({
                                type:"POST",
                                url:"<?php echo base_url(); ?>index.php/rate/Ratings",
                                data:{message:message,rating:rating,uname:uname},
                                success:function(data) {
                                    if (data == "ok") {
                                        _("success").style.display = "block";
                                    } else {
                                        _("fail").style.display = "block";
                                    }
                                },error:function() {
                                    _("error").style.display = "block";
                                }
                            });
                        } else {
                            //$('#exampleModalCenter').modal('toggle');
                            $('#exampleModalCenter').modal({
                                backdrop: 'static',
                                keyboard:false
                            });
                        }
                    }, error:function() {
                        _("error").style.display = "block";
                    }
                });
                /**/
            }
            console.log(rating);
        }

        /*$(document).ready(function() {
            $("#starFive").hover(function() {
                $("#starFive").css("color","orange");
                $("#starFour").css("color","orange");
                $("#starThree").css("color","orange");
                $("#starTwo").css("color","orange");
                $("#starOne").css("color","orange");
            },
            function() {
                if (isStarFiveChecked) {
                    $("#starFive").css("color","black");
                }
                if (isStarFourChecked) {
                    $("#starFour").css("color","black");
                }
                if (isStarThreeChecked) {
                    $("#starThree").css("color","black");
                }
                if (isStarTwoChecked) {
                    $("#starTwo").css("color","black");
                }
                if (isStarOneChecked) {
                    $("#starOne").css("color","black");
                }    
            });

            $("#starFour").hover(function() {
                $("#starFour").css("color","orange");
                $("#starThree").css("color","orange");
                $("#starTwo").css("color","orange");
                $("#starOne").css("color","orange");
            },
            function() {
                if (isStarFourChecked) {
                    $("#starFour").css("color","black");
                }
                if (isStarThreeChecked) {
                    $("#starThree").css("color","black");
                }
                if (isStarTwoChecked) {
                    $("#starTwo").css("color","black");
                }
                if (isStarOneChecked) {
                    $("#starOne").css("color","black");
                }
            });

            $("#starThree").hover(function() {
                $("#starThree").css("color","orange");
                $("#starTwo").css("color","orange");
                $("#starOne").css("color","orange");
            },
            function() {
                if (isStarThreeChecked) {
                    $("#starThree").css("color","black");
                }
                if (isStarTwoChecked) {
                    $("#starTwo").css("color","black");
                }
                if (isStarOneChecked) {
                    $("#starOne").css("color","black");
                }
            });

            $("#starTwo").hover(function() {
                $("#starTwo").css("color","orange");
                $("#starOne").css("color","orange");
            },
            function() {
                if (isStarTwoChecked) {
                    $("#starTwo").css("color","black");
                }
                if (isStarOneChecked) {
                    $("#starOne").css("color","black");
                }
            });

            $("#starOne").hover(function() {
                $("#starOne").css("color","orange");
            },
            function() {
                $("#starOne").css("color","black");
            });
        });*/

        /*$(document).ready(function() {
            $("#starFive").hover(function() {
                $("#starFive").css("color","orange");
            },function() {
                $("#starFive").css("color","black");
            }
            });
        });*/

        function starOne() {
            if (!isStarOneChecked) {
                _("starOne").style.color = "orange";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                rating = 1;
                isStarOneChecked = true;
                isStarTwoChecked = false;
                isStarThreeChecked = false;
                isStarFourChecked = false;
                isStarFiveChecked = false;
            } else {
                _("starOne").style.color = "black";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                isStarOneChecked = false;
            }
        }

        function starTwo() {
            if (!isStarTwoChecked) {
                _("starOne").style.color = "orange";
                _("starTwo").style.color = "orange";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                rating = 2;
                isStarTwoChecked = true;
                isStarOneChecked = false;
                isStarThreeChecked = false;
                isStarFourChecked = false;
                isStarFiveChecked = false;
            } else {
                _("starOne").style.color = "black";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                isStarTwoChecked = false;
            }
        }

        function starThree() {
            if (!isStarThreeChecked) {
                _("starOne").style.color = "orange";
                _("starTwo").style.color = "orange";
                _("starThree").style.color = "orange";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                rating = 3;
                isStarThreeChecked = true;
                isStarOneChecked = false;
                isStarTwoChecked = false;
                isStarFourChecked = false;
                isStarFiveChecked = false;
            } else {
                _("starOne").style.color = "black";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                isStarThreeChecked = false;
            }
        }

        function starFour() {
            if (!isStarFourChecked) {
                _("starOne").style.color = "orange";
                _("starTwo").style.color = "orange";
                _("starThree").style.color = "orange";
                _("starFour").style.color = "orange";
                _("starFive").style.color = "black";
                rating = 4;
                isStarFourChecked = true;
                isStarOneChecked = false;
                isStarThreeChecked = false;
                isStarTwoChecked = false;
                isStarFiveChecked = false;
            } else {
                _("starOne").style.color = "black";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                isStarFourChecked = false;
            }
        }

        function starFive() {
            if (!isStarFiveChecked) {
                _("starOne").style.color = "orange";
                _("starTwo").style.color = "orange";
                _("starThree").style.color = "orange";
                _("starFour").style.color = "orange";
                _("starFive").style.color = "orange";
                rating = 5;
                isStarFiveChecked = true;
                isStarOneChecked = false;
                isStarThreeChecked = false;
                isStarFourChecked = false;
                isStarTwoChecked = false;
            } else {
                _("starOne").style.color = "black";
                _("starTwo").style.color = "black";
                _("starThree").style.color = "black";
                _("starFour").style.color = "black";
                _("starFive").style.color = "black";
                isStarFiveChecked = false;
            }
        }
    
    </script>
</html>