<?php 
    echo '<input id="id" type="hidden" value="'.$id.'"';
?>
<br><br>
        <style>
        
            .box {
                margin-bottom: 15px;
            }
        
        </style>
        <div class="container">
            <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert-danger">
                            <div class="row">
                                <div class="col-sm-1">
                                    <i class="fa fa-warning fa-2x"></i>
                                </div>
                                <div class="col">
                                    <h4>&emsp;Missing</h4>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body" id="errorInfo">
                            Content
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">Close &times;</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="progressModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header alert-danger">
                            Uploading
                        </div>
                        <div class="modal-body" id="errorInfo">
                            <div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="profileProgress" role="progressbar" style="width: 10%;">Waiting...</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center">
                                        <div class="text-danger" style="display: none;" id="imageFail">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="text-success" style="display: none;" id="imageOk">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="signatureProgress" role="progressbar" style="width: 10%;">Waiting...</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 text-center">
                                        <div class="text-danger" style="display: none;" id="signatureFail">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <div class="text-success" style="display: none;" id="signatureOk">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="container text-center">
                                <div class="card shadow text-danger alert-danger" style="display: none; padding: 10px;" id="failed">
                                    <i class="fa fa-times-circle fa-3x"></i>
                                    <br>
                                    <b>Failed to Create Resume</b>
                                </div>
                                <div class="card shadow text-success alert-success" style="display: none; padding: 10px;" id="ok">
                                    <i class="fa fa-check-circle fa-3x"></i>
                                    <br>
                                    <b>Resume Created Successfully</b>
                                </div>
                                <div class="card shadow text-warning alert-warning" style="display: none; padding: 10px;" id="error">
                                    <i class="fa fa-exclamation-circle fa-3x"></i>
                                    <br>
                                    <b>Error Occured while Creating Resume</b>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="display: none;" id="exit">
                            <button class="btn btn-danger" data-dismiss="modal">Close &times;</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header green-bg">
                    Photo
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Upload Image
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input id="profile" type="file" class="form-control form-control-sm" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <img style="height: 140px;" id="profile-img">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Name
                </div>
                <div class="card-body">
                    <input type="text" id="name" class="form-control form-control-sm" placeholder="Enter your Name">
                </div>
            </div>
            <br>

            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Registration No
                                </div>
                                <div class="card-body">
                                    <input id="regno" type="text" class="form-control form-control-sm" placeholder="Reg No. here">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Degree & Department
                                </div>
                                <div class="card-body">
                                    <select id="dept" class="form-control form-control-sm">
                                        <option value="" disabled selected>-- SELECT DEPT --</option>
                                        <optgroup label="Bachelor of Technology (B.Tech)">
                                            <option value="B.Tech Information Technology">Information Technology</option>
                                        </optgroup>
                                        <optgroup label="Bachelor of Engineering (B.E)">
                                            <option value="B.E Computer Science and Engineering">Computer Science and Engineering</option>
                                            <option value="B.E Electrical and Elecronics Engineering">Electrical and Electronics Engineering</option>
                                            <option value="B.E Civil Engineering">Civil Engineering</option>
                                            <option value="B.E Mechatronics">Mechatronics</option>
                                            <option value="B.E Mechanical Engineering">Mechanical Engineering</option>
                                            <option value="B.E Electronics and Communication Engineering">Electronics and Communication Engineering</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Professional Objective
                </div>
                <div class="card-body">
                    <textarea id="objective" class="form-control form-control-sm"></textarea>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Academic Records`
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header green-bg">
                            UG-Course
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <select id="ug-dept" class="form-control form-control-sm">
                                    <option value="" disabled selected>-- SELECT DEPT --</option>
                                    <optgroup label="Bachelor of Technology (B.Tech)">
                                        <option value="B.Tech Information Technology">Information Technology</option>
                                    </optgroup>
                                    <optgroup label="Bachelor of Engineering (B.E)">
                                        <option value="B.E Computer Science and Engineering">Computer Science and Engineering</option>
                                        <option value="B.E Electrical and Elecronics Engineering">Electrical and Elecronics Engineering</option>
                                        <option value="B.E Civil Engineering">Civil Engineering</option>
                                        <option value="B.E Mechatronics">Mechatronics</option>
                                        <option value="B.E Mechanical Engineering">Mechanical Engineering</option>
                                        <option value="B.E Electronics and Communication Engineering">Electronics and Communication Engineering</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Institution Name</label>
                                <input id="ug-institute" type="text" class="form-control form-control-sm" placeholder="Enter Institution Name">
                            </div>
                            <div class="form-group">
                                <label>Board of Study</label>
                                <input id="ug-board" type="text" class="form-control form-control-sm" placeholder="Enter Board of Study">
                            </div>
                            <div class="form-group">
                                <label>Year of Passing</label>
                                <input id="ug-pass" type="number" class="form-control form-control-sm" value="2021" placeholder="Enter the year of Passing">
                            </div>
                            <div class="form-group">
                                <label>Marks or CGPA</label>
                                <input id="ug-cgpa" type="number" class="form-control form-control-sm" placeholder="Enter your CGPA/Marks">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header green-bg">
                            Other (Diplomo)
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="checkbox" onchange="isEnable()" id="diplomo">
                                Enable to add details about Diplomo or other course 
                            </div>
                            <div style="display: none;" id="other">
                                <div class="form-group">
                                    <label>Class / Course</label>
                                    <input id="add-course" type="text" class="form-control form-control-sm" placeholder="Enter Class / Course">
                                </div>
                                <div class="form-group">
                                    <label>Institution Name</label>
                                    <input id="add-insti" type="text" class="form-control form-control-sm" placeholder="Enter Institution Name">
                                </div>
                                <div class="form-group">
                                    <label>Board of Study</label>
                                    <input id="add-board" type="text" class="form-control form-control-sm" placeholder="Enter Board of Study">
                                </div>
                                <div class="form-group">
                                    <label>Year of Passing</label>
                                    <input id="add-pass" type="number" class="form-control form-control-sm" value="2021" placeholder="Enter the year of Passing">
                                </div>
                                <div class="form-group">
                                    <label>Marks or CGPA</label>
                                    <input id="add-cgpa" type="number" class="form-control form-control-sm" placeholder="Enter your CGPA/Marks">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header green-bg">
                            Diplomo / 12th
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Class/Course</label>
                                <select id="ss-course" class="form-control form-control-sm">
                                    <option value="" disabled selected>-- SELECT GRADE -- </option>
                                    <optgroup>
                                        <option value="12th">Class 12</option>
                                        <option value="diploma">Diploma</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Institution Name</label>
                                <input id="ss-insti" type="text" class="form-control form-control-sm" placeholder="Enter Institution Name">
                            </div>
                            <div class="form-group">
                                <label>Board of Study</label>
                                <input id="ss-board" type="text" class="form-control form-control-sm" placeholder="Enter Board of Study">
                            </div>
                            <div class="form-group">
                                <label>Year of Passing</label>
                                <input id="ss-pass" type="number" class="form-control form-control-sm" value="2021" placeholder="Enter the year of Passing">
                            </div>
                            <div class="form-group">
                                <label>Marks or CGPA</label>
                                <input id="ss-cgpa" type="number" class="form-control form-control-sm" placeholder="Enter your CGPA/Marks">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header green-bg">
                            10th
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Course / Class</label>
                                <input id="s-course" type="text" class="form-control form-control-sm" value="10th" readonly>
                            </div>
                            <div class="form-group">
                                <label>Institution Name</label>
                                <input id="s-insti" type="text" class="form-control form-control-sm" placeholder="Enter Institution Name">
                            </div>
                            <div class="form-group">
                                <label>Board of Study</label>
                                <input id="s-board" type="text" class="form-control form-control-sm" placeholder="Enter Board of Study">
                            </div>
                            <div class="form-group">
                                <label>Year of Passing</label>
                                <input id="s-pass" type="number" class="form-control form-control-sm" value="2021" placeholder="Enter the year of Passing">
                            </div>
                            <div class="form-group">
                                <label>Marks or CGPA</label>
                                <input id="s-cgpa" type="number" class="form-control form-control-sm" placeholder="Enter your CGPA/Marks">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Area of Intrest
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addIntrest()">+ &emsp;Add Interest</button>
                    </div>
                    <br>
                    <div id="new">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Technical Expertise
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addExpertise()">+ &emsp;Add Expertise</button>
                    </div>
                    <br>
                    <div id="newExpertise">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Projects
                </div>
                <div class="card-body">
                    <div class="form-group form-group-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addProject()">+ &emsp;Add Project</button>
                    </div>
                    <br>
                    <div id="newProject">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Industrial Training
                </div>
                <div class="card-body">
                    <div class="form-group form-group-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addIndustryTraining()">+ &emsp;Add Industry Training</button>
                    </div>
                    <br>
                    <div id="newIndustry">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Achievements
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addAchievement()">+ &emsp;Add Achievement</button>
                    </div>
                    <div id="newAchievement">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Co-Curricular Activities
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addActivity()">+ &emsp;Add Activity</button>
                    </div>
                    <div id="newActivity">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Extra-Curricular Activities
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addExtraActivity()">+ &emsp;Add Activity</button>
                    </div>
                    <div id="newExtraActivity">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Leadership Traits
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addTrait()">+ &emsp;Add Leadership Trait</button>
                    </div>
                    <div id="newTrait">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Hobbies
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addHobby()">+ &emsp;Add Hobby</button>
                    </div>
                    <div id="newHobby">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Languages Known
                </div>
                <div class="card-body">
                    <div class="form-group form-control-sm">
                        <button class="btn-sm btn-primary" style="float: right;" onclick="addLanguage()">+ &emsp;Add Language</button>
                    </div>
                    <div id="newLanguage">

                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Personal Details
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header green-bg">
                            Address
                        </div>
                        <div class="card-body">
                            <div class="form-group form-group-sm">
                                <input id="address1" type="text" class="form-control form-control-sm" placeholder="Address Part-1">
                            </div>
                            <div class="form-group form-group-sm">
                                <input id="address2" type="text" class="form-control form-control-sm" placeholder="Address Part-2">
                            </div>
                            <div class="form-group form-group-sm">
                                <input id="address3" type="text" class="form-control form-control-sm" placeholder="Address Part-3">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Contact Number
                                </div>
                                <div class="card-body">
                                    <input id="contactNo" type="text" class="form-control form-control-sm" placeholder="Contact Number">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Email
                                </div>
                                <div class="card-body">
                                    <div class="form-group-sm">
                                        <input id="email" type="email" class="form-control form-control-sm" placeholder="Enter Mail id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Date of Birth
                                </div>
                                <div class="card-body">
                                    <input id="dob" type="date" class="form-control form-control-sm" placeholder="Contact Number">
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Age
                                </div>
                                <div class="card-body">
                                    <div class="form-group-sm">
                                        <input id="age" type="number" class="form-control form-control-sm" placeholder="Enter Age here" value="20">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Gender
                                </div>
                                <div class="card-body">
                                    <select id="gender" class="form-control form-control-sm">
                                        <option value="" disabled selected>-- SELECT GENDER --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Father's Name
                                </div>
                                <div class="card-body">
                                    <input id="fatherName" type="text" class="form-control form-control-sm" placeholder="Enter your Father's Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Mother's Name
                                </div>
                                <div class="card-body">
                                    <input id="motherName" type="text" class="form-control form-control-sm" placeholder="Enter your Mother's Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Mother Tongue
                                </div>
                                <div class="card-body">
                                    <input id="tongue" type="text" class="form-control form-control-sm" placeholder="Enter your Mother Tongue">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card shadow">
                <div class="card-header green-bg">
                    Acknowledgement
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Place
                                </div>
                                <div class="card-body">
                                    <input id="place" type="text" class="form-control form-control-sm" placeholder="Enter your Place">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 box">
                            <div class="card">
                                <div class="card-header green-bg">
                                    Date
                                </div>
                                <div class="card-body">
                                    <input id="date" type="date" class="form-control form-control-sm" placeholder="Enter your Mother's Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header green-bg">
                            Signature
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 box">
                                    <div class="card">
                                        <div class="card-header green-bg">
                                            Signature Uploading
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="file" id="signature" class="form-control form-control-sm" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 box" style="text-align: center;">
                                    <img style="height: 120px; width: 250px;" id="signature-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div id ="progress" style="float: left;">

            </div>
            <button class="btn btn-secondary" style="float: right;" onclick="uploadImages()">Submit Credentials</button>
        </div>
        <br><br>
    </body>
    <script>

        var numberOfIntrest = 0;
        var numberOfExpertise = 0;
        var numberOfProject = 0;
        var numberOfIndustryProject = 0;
        var numberOfAchievement = 0;
        var numberOfActivity = 0;
        var numberOfExtraActivity = 0;
        var numberOfTrait = 0;
        var numberOfHobby = 0;
        var numberOfLanguage = 0;

        
        var profileUrl;
        var SignatureURL;

        function _(el) {
            return document.getElementById(el);
        }

        function uploadSignature() {

            var formdata = new FormData();

            var signatureFile = _("signature").files[0];

            formdata.append("signatureimage",signatureFile);

            $.ajax({
                xhr:function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",function(evt) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        _("signatureProgress").style.width = percentComplete + "%";
                        _("signatureProgress").innerHTML = percentComplete + "% Uploaded";
                    },false);
                    return xhr;
                },
                url:"<?php echo base_url(); ?>index.php/uploader/uploadSignatureImage",
                method:"POST",
                data:formdata,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function() {
                    _("signatureProgress").style.width = "0%";
                }, success:function(data) {
                    var signatureResult = JSON.parse(data);

                    if (signatureResult.status) {
                        _("signatureProgress").innerHTML = "Signature Uploaded";
                        _("signatureOk").style.display = "block";
                        SignatureURL = signatureResult.url;

                        console.log("Signature URL : " + SignatureURL);
                        console.log("Profile URL : " + profileUrl);

                        validateForm();
                    } else {
                        _("signatureFail").style.display = "block";
                        _("failed").style.display = "block";
                    }
                    _("exit").style.display = "block";
                }, error:function() {
                    _("signatureProgress").innerHTML = "Error in Uploading";
                    _("signatureFail").style.display = "block";
                    _("error").style.display = "block";
                    _("exit").style.display = "block";
                }
            });

        }

        function uploadProfileImage() {

            var formdata = new FormData();

            var profileImg = _("profile").files[0];

            formdata.append("profileimage",profileImg);

            $.ajax({
                xhr:function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress",function(evt) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        _("profileProgress").style.width = percentComplete + "%";
                        _("profileProgress").innerHTML = percentComplete + "%";
                    },false);
                    return xhr;
                },
                url:"<?php echo base_url(); ?>index.php/uploader/uploadProfileImage",
                method:"POST",
                data:formdata,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function() {
                    _("profileProgress").style.display = "0%";
                    _("profileProgress").innerHTML = "0% Uploaded";
                }, success:function(data) {

                    var profileResult = JSON.parse(data);

                    if (profileResult.status) {
                        //console.log(profileResult.url);
                        _("profileProgress").innerHTML = "Image Uploaded";

                        // code to upload signature and other details
                        _("imageOk").style.display = "block";
                        profileUrl = profileResult.url;
                        uploadSignature();

                    } else {
                        _("imageFail").style.display = "block";
                        _("signatureFail").style.display = "block";
                        _("failed").style.display = "block";
                    }
                    _("exit").style.display = "block";
                }, error:function() {
                    _("profileProgress").innerHTML = "Error";
                    _("signatureFail").style.display = "block";
                    _("exit").style.display = "block";
                    _("error").style.display = "block";
                }
            });

        }

        function uploadImages() {
            /*$('#errorModal').modal({
                backdrop: 'static',
                keyboard: false
            });
            $('#errorModal').modal('toggle');*/

            var signatureImg = _("signature").value;
            var profileImg = _("profile").value;

            _("imageFail").style.display = "none";
            _("imageOk").style.display = "none";
            _("signatureFail").style.display = "none";
            _("signatureOk").style.display = "none";
            _("failed").style.display = "none";
            _("ok").style.display = "none";
            _("error").style.display = "none";
            _("exit").style.display = "none";

            if (profileImg == "" && signatureImg == "") {
                _("errorInfo").innerHTML = "Please Upload your Image and your Signature, to continue creating your resume";
                $('#errorModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#errorModal').modal('toggle');
                /*$('#progressModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#progressModal').modal('toggle');*/
            } else if (profileImg == "") {
                _("errorInfo").innerHTML = "Please Upload your Image to Continue creating your resume";
                $('#errorModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#errorModal').modal('toggle');
            }
            else if (signatureImg == "") {
                _("errorInfo").innerHTML = "Please Upload your signature to Continue creating your resume";
                $('#errorModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#errorModal').modal('toggle');
            } else {
                $('#progressModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $('#progressModal').modal('toggle');

                uploadProfileImage();
            }

            //code to upload Profile Picture and Signature

            /*-----------------------------------------------------------------------------
                                    Uploading Profile Picture
            -----------------------------------------------------------------------------*/

        }
        
        function validateForm() {
            //json for adding the number of additional inputs given by the user
            var isAdditionalEntryEnabled = _("diplomo").checked;
            var jsonOut = {"data":
                {
                    "profileUrl" : profileUrl,
                    "signatureUrl" : SignatureURL,
                    "intrests" : numberOfIntrest,
                    "expertise" : numberOfExpertise,
                    "project" : numberOfProject,
                    "industry" : numberOfIndustryProject,
                    "achievement" : numberOfAchievement,
                    "activity" : numberOfActivity,
                    "extras" : numberOfExtraActivity,
                    "traits" : numberOfTrait,
                    "hobby" : numberOfHobby,
                    "language" : numberOfLanguage,
                    "additional" : isAdditionalEntryEnabled
                }
            };

            //json for uploading the user personal details
            var name = _("name").value;
            var regno = _("regno").value;
            var department = _("dept").value;
            var objective = _("objective").value;
            jsonOut.primaryDetails = {
                "name" : name,
                "regno" : regno,
                "dept" : department,
                "objective" : objective
            };
            //-----------academic records--------------
            //College details
            var ug_dept = _("ug-dept").value;
            var ug_institute = _("ug-institute").value;
            var ug_board = _("ug-board").value;
            var ug_pass = _("ug-pass").value;
            var ug_cgpa = _("ug-cgpa").value;

            jsonOut.ug_details = {
                "dept" : ug_dept,
                "institute" : ug_institute,
                "board" : ug_board,
                "pass" : ug_pass,
                "cgpa" : ug_cgpa
            };

            //additional details
            if (isAdditionalEntryEnabled) {
                var add_course = _("add-course").value;
                var add_insti = _("add-insti").value;
                var add_board = _("add-board").value;
                var add_pass = _("add-pass").value;
                var add_cgpa = _("add-cgpa").value;

                jsonOut.add_details = {
                    "dept" : add_course,
                    "insti" : add_insti,
                    "board" : add_board,
                    "pass" : add_pass,
                    "cgpa" : add_cgpa
                };
            }

            //Details about 12th/Diplomo
            var ss_course = _("ss-course").value;
            var ss_insti = _("ss-insti").value;
            var ss_board = _("ss-board").value;
            var ss_pass = _("ss-pass").value;
            var ss_cgpa = _("ss-cgpa").value;

            jsonOut.ss_details = {
                "dept" : ss_course,
                "insti" : ss_insti,
                "board" : ss_board,
                "pass" : ss_pass,
                "cgpa" : ss_cgpa
            };

            //Details about 10th Grade
            var s_course = _("s-course").value;
            var s_insti = _("s-insti").value;
            var s_board = _("s-board").value;
            var s_pass = _("s-pass").value;
            var s_cgpa = _("s-cgpa").value;

            jsonOut.s_details = {
                "dept" : s_course,
                "insti" : s_insti,
                "board" : s_board,
                "pass" : s_pass,
                "cgpa" : s_cgpa
            };

            //JSON for Intrest
            var intrestJson = {};
            for (var i=0;i < numberOfIntrest;i++) {
                var intrestData = _("intrest" + i).value;
                intrestJson[i] = {"intrest" : intrestData};
            }
            jsonOut.intrest = intrestJson;

            //JSON for Expertise
            var expertiseJSON = {};
            for (var i=0;i < numberOfExpertise; i++) {
                var expertiseTitle = _("expertise" + i).value;
                var expertiseList = _("expertiseList" + (i+1)).value;
                expertiseJSON[i] = {
                    "title" : expertiseTitle,
                    "list" : expertiseList
                };
            }
            jsonOut.expertise = expertiseJSON;

            //JSON for Projects1
            var projectJSON = {};
            for (var i=0;i < numberOfProject;i++) {
                var projectTitle = _("project" + i).value;
                var projectTeamSize = _("projectTeamSize" + (i+1)).value;
                var frontEnd = _("frontEnd" + (i+1)).value;
                var backEnd = _("projectEndYear" + (i+1)).value;
                var projectDescription = _("projectDescription" + (i+1)).value;
                var projectLink = _("projectLink" + (i+1)).value;

                projectJSON[i] = {
                    "title" : projectTitle,
                    "projectTeamSize" : projectTeamSize,
                    "frontend" : frontEnd,
                    "backend" : backEnd,
                    "description" : projectDescription,
                    "link" : projectLink
                };
            }
            jsonOut.project = projectJSON;

            //JSON for Internship
            var internJSON = {};
            for (var i=0;i < numberOfIndustryProject;i++) {
                var internTitle = _("industry" + i).value;
                var internStartDate = _("internStartDay" + (i+1)).value;
                var internEndDate = _("internEndDate" + (i+1)).value;
                var internFrontEnd = _("internFrontEnd" + (i+1)).value;
                var internBackEnd = _("internBackEnd" + (i+1)).value;
                var internDescription = _("internDescription" + (i+1)).value;
                var internLink = _("internLink" + (i+1)).value;

                internJSON[i] = {
                    "title" : internTitle,
                    "startDate" : internStartDate,
                    "endDate" : internEndDate,
                    "frontEnd" : internFrontEnd,
                    "backEnd" : internBackEnd,
                    "description" : internDescription,
                    "link" : internLink
                };
            }
            jsonOut.intern = internJSON;

            //JSON for Achievement 
            var achievementJSON = {};
            for (var i=0;i < numberOfAchievement;i++) {
                var achievementData = _("achievement" + i).value;
                achievementJSON[i] = {
                    "data" : achievementData
                };
            }
            jsonOut.achievement = achievementJSON;

            //JSON for Co-Curricular Activity
            var activityJSON = {};
            for (var i=0;i < numberOfActivity ;i++) {
                var activityData = _("activity" + i).value;
                activityJSON[i] = {
                    "data" : activityData
                };
            }
            jsonOut.activity = activityJSON;

            //JSON for Extra-Curricular Activity
            var extraActivityJSON = {};
            for (var i=0;i < numberOfExtraActivity;i++) {
                var extraActivityData = _("extraActivity" + i).value;
                extraActivityJSON[i] = {
                    "data" : extraActivityData
                };
            }
            jsonOut.extraActivity = extraActivityJSON;

            //JSON for Leadership Trait 
            var traitJSON = {};
            for (var i=0;i < numberOfTrait;i++) {
                var traitData = _("trait" + i).value;
                traitJSON[i] = {
                    "data" : traitData
                };
            }
            jsonOut.trait = traitJSON;

            //JSON for Hobbies
            var hobbiesJSON = {};
            for (var i=0;i < numberOfHobby;i++) {
                var hobbyData = _("hobby" + i).value;
                hobbiesJSON[i] = {
                    "data" : hobbyData
                };
            }
            jsonOut.hobby = hobbiesJSON;

            //JSON for languages known
            var languageJSON = {};
            for (var i=0;i < numberOfLanguage; i++) {
                var languageName = _("language" + i).value;
                var readData = _("read" + (i+1)).checked;
                var speakData = _("speak" + (i+1)).checked;
                var writeData = _("write" + (i+1)).checked;

                languageJSON[i] = {
                    "language" : languageName,
                    "read" : readData,
                    "speak" : speakData,
                    "write" : writeData
                };
            }
            jsonOut.language = languageJSON;

            //JSON for Personal Details
            var address1 = _("address1").value;
            var address2 = _("address2").value;
            var address3 = _("address3").value;
            var contactNo = _("contactNo").value;
            var emailId = _("email").value;
            var dob = _("dob").value;
            var age = _("age").value;
            var gender = _("gender").value;
            var fatherName = _("fatherName").value;
            var motherName = _("motherName").value;
            var motherTongue = _("tongue").value;
            var place = _("place").value;
            var date = _("date").value;

            jsonOut.personalDetails = {
                "address1" : address1,
                "address2" : address2,
                "address3" : address3,
                "contactNo" : contactNo,
                "email" : emailId,
                "dob" : dob,
                "age" : age,
                "gender" : gender,
                "fatherName" : fatherName,
                "motherName" : motherName,
                "motherTongue" : motherTongue,
                "place" : place,
                "date" : date
            };

            var id = _("id").value;

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/builder/createNew",
                data: {json:JSON.stringify(jsonOut),id:id},
                beforeSend:function() {
                    _("progress").innerHTML = "Processing...";
                },
                success:function(data) {
                    if (data != "fail") {
                        _("ok").style.display = "block";
                        _("progress").innerHTML = "<a class='btn btn-success' target='_blank' href='<?php echo base_url(); ?>index.php/viewPDF/"+data+"'>Link To View and Download</a>";
                    } else {
                        _("failed").style.display = "block";
                    }

                    _("exit").style.display = "block";

                },error:function() {
                    _("error").style.display = "block";
                    _("exit").style.display = "block";
                }
            });

            console.log(JSON.stringify(jsonOut));
        }

        function isEnable() {
            if (_("diplomo").checked == 1) {
                _("other").style.display = "block";
            } else {
                _("other").style.display = "none";
            }
        }

        function addIntrest() {
            var classNumber = "intrest" + numberOfIntrest;
            numberOfIntrest = numberOfIntrest + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group"><label>Intrest ' + (numberOfIntrest) +'</label><input type="text" class="form-control form-control-sm" id="'+ classNumber +'" placeholder="Enter your Intrest '+ numberOfIntrest +'"></div></div></div>');
            //newDiv.style.background = "#000";
            $('#new').append(newDiv);
        }

        function addExpertise() {
            var classNumber = "expertise" + numberOfExpertise;
            numberOfExpertise = numberOfExpertise + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group"><label>Expertise Title '+ numberOfExpertise +'</label><input type="text" class="form-control form-control-sm" id="'+ classNumber +'"></div><div class="form-group"><label>List of Expertise ' + numberOfExpertise + '</label><input type="text" class="form-control form-control-sm" id="expertiseList'+ numberOfExpertise +'"></div></div></div>');
            $('#newExpertise').append(newDiv);
        }

        function addProject() {
            var classNumber = "project" + numberOfProject;
            numberOfProject = numberOfProject + 1;
            var newDiv = $('<br><div class="card"><div class="card-header green-bg">Project ' + numberOfProject +'</div><div class="card-body"><div class="form-group"><label>Project Title</label><input type="text" id="'+ classNumber +'" class="form-control form-control-sm" placeholder="Enter the Project '+ numberOfProject +' title"></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Team Size</label><input type="number" id="projectTeamSize'+ numberOfProject +'" class="form-control form-control-sm" placeholder="Enter the Team size"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Front End</label><input id="frontEnd'+numberOfProject+'" type="text" class="form-control form-control-sm" placeholder="List the Front-end tools"></div></div><div class="col-md-6"><div class="form-group"><label>Back-end Tool</label><input id="projectEndYear'+numberOfProject+'" type="text" class="form-control form-control-sm" placeholder="List tools used in backend"></div></div></div><div class="form-group"><label>Project Description</label><textarea id="projectDescription'+numberOfProject+'" class="form-control form-control-sm"></textarea></div><div class="form-group"><label>Project Link (Github / Google Drive)</label><input id="projectLink'+numberOfProject+'" type="text" class="form-control form-control-sm" placeholder="Enter the Project link"></div></div></div>');
            $('#newProject').append(newDiv);
        }

        function addIndustryTraining() {
            var classNumber = "industry" + numberOfIndustryProject;
            numberOfIndustryProject = numberOfIndustryProject + 1;
            var newDiv = $('<br><div class="card"><div class="card-header green-bg">Industry Training ' + numberOfIndustryProject +'</div><div class="card-body"><div class="form-group"><label>Industry Training Title</label><input type="text" id="'+classNumber+'" class="form-control form-control-sm" placeholder="Enter the Industry Training '+ numberOfIndustryProject +' title"></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Start Date</label><input type="text" id="internStartDay'+ numberOfIndustryProject +'" class="form-control form-control-sm" placeholder="Enter the Industry Training Start Date"></div></div><div class="col-md-6"><div class="form-group"><label>End Date</label><input id="internEndDate'+ numberOfIndustryProject +'" type="text" class="form-control form-control-sm" placeholder="Enter the Industry Training End Date"></div></div></div><div class="row"><div class="col-md-6"><div class="form-group"><label>Front End</label><input id="internFrontEnd'+ numberOfIndustryProject +'" type="text" class="form-control form-control-sm" placeholder="List the Front End Tools"></div></div><div class="col-md-6"><div class="form-group"><label>Back-end Tools</label><input type="text" id="internBackEnd' + numberOfIndustryProject +'" class="form-control form-control-sm" placeholder="List the Back-end Tools"></div></div></div><div class="form-group"><label>Industry Training Description</label><textarea id="internDescription' + numberOfIndustryProject + '" class="form-control form-control-sm"></textarea></div><div class="form-group"><label>Industry Training Project Link (Github / Google Drive)</label><input id="internLink'+numberOfIndustryProject+'" type="text" class="form-control form-control-sm" placeholder="Enter the Industry Training Project link"></div></div></div>');
            $('#newIndustry').append(newDiv);
        }

        function addAchievement() {
            var classNumber = "achievement" + numberOfAchievement;
            numberOfAchievement = numberOfAchievement + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group form-group-sm"><label>Achievement '+ numberOfAchievement +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Achievement here"></div></div></div>');
            $('#newAchievement').append(newDiv);
        }

        function addActivity() {
            var classNumber = "activity" + numberOfActivity;
            numberOfActivity = numberOfActivity + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group form-group-sm"><label>Activity '+ numberOfActivity +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Activity here"></div></div></div>');
            $('#newActivity').append(newDiv);
        }

        function addExtraActivity() {
            var classNumber = "extraActivity" + numberOfExtraActivity;
            numberOfExtraActivity = numberOfExtraActivity + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group form-group-sm"><label>Activity '+ numberOfExtraActivity +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Activity here"></div></div></div>');
            $('#newExtraActivity').append(newDiv);
        }

        function addTrait() {
            var classNumber = "trait" + numberOfTrait;
            numberOfTrait = numberOfTrait + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group form-group-sm"><label>Leadership Trait '+ numberOfTrait +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Leadershipt Activity here"></div></div></div>');
            $('#newTrait').append(newDiv);
        }

        function addHobby() {
            var classNumber = "hobby" + numberOfHobby;
            numberOfHobby = numberOfHobby + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group form-group-sm"><label>Hobby '+ numberOfHobby +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Hobby here"></div></div></div>');
            $('#newHobby').append(newDiv);
        }

        function addLanguage() {
            var classNumber = "language" + numberOfLanguage;
            numberOfLanguage = numberOfLanguage + 1;
            var newDiv = $('<br><div class="card"><div class="card-body"><div class="form-group"><label>Language ' + numberOfLanguage +'</label><input id="'+classNumber+'" type="text" class="form-control form-control-sm" placeholder="Enter the Language here"></div><div class="card"><div class="card-body"><div class="row"><div class="col-md-4"><input id="read'+numberOfLanguage+'" type="checkbox"> <label>&emsp;Read</label></div><div class="col-6 col-md-4"><input id="speak'+numberOfLanguage+'" type="checkbox"> <label>&emsp;Speak</label></div><div class="col-md-4"><input id="write'+numberOfLanguage+'" type="checkbox"> <label>&emsp;Write</label></div><div></div></div></div>');
            $('#newLanguage').append(newDiv);
        }

        function readSignatureURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#signature-img").attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readProfileURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#profile-img").attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#signature").change(function() {
            readSignatureURL(this);
        });

        $("#profile").change(function() {
            readProfileURL(this);
        });

    </script>