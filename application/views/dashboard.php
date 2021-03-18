<?php 
    include 'dbconn.php';

    $getResume_query = "SELECT * FROM resume_data where uname='$id'";
    $getResume_result = mysqli_query($connection,$getResume_query);

    $getResume_count = mysqli_num_rows($getResume_result);

?>
<div class="container">
    <div class="container" style="margin-top: 15px; float: right;">
        <a href="<?php echo base_url(); ?>index.php/auth/newResume" class="btn btn-success" style="float: right;">New Resume</a>
    </div>
    <div class="container" style="margin-top: 15px; float: right;">
        <table class="table shadow bg-light">
            <thead class="green-bg" style="color: white;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">.</th>
                    <th scope="col">.</th>
                </tr>
            </thead>
            <?php
                $iterator = 0; 
                if ($getResume_count > 0) {
                    ?>
                    <tbody class="bg-light">
                    <?php
                    while ($getResume_data = mysqli_fetch_array($getResume_result)) {
                        $iterator = $iterator + 1;
                        $date_created = $getResume_data["c_date"];
                        $data_editLink = base_url()."index.php/builder/viewPDF/".$getResume_data["id"];
                        $data_viewLink = base_url()."index.php/viewPDF/".$getResume_data["id"];
                        echo "<tr>
                                <td scope='col'>$iterator</td>
                                <td scope='col'>$date_created</td>
                                <td scope='col'><a href='$data_editLink'>Edit</a></td>
                                <td scope='col'><a href='$data_viewLink'>View and Download</a></td>
                            </tr>";
                    }
                    ?> 
                    </tbody>
                </table>
                    <?php
                } else {
                    ?>
                    </table>
                    <div class="shadow bg-light">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo base_url(); ?>icons/nothing.png" style="opacity: 0.4; width: 20%;">
                        </div>
                        <div class="d-flex justify-content-center text-secondary h5 font-weight-light">
                            No Data Found
                        </div>
                        <div class="d-flex justify-content-center text-secondary font-weight-light">
                            Click &nbsp; <a href="<?php echo base_url(); ?>index.php/auth/newResume" class="text-success"> <b>New Resume</b></a> &nbsp; to create new Resume
                        </div>
                        <br>
                    </div>
                    <?php
                }
            ?>
    </div>
</div>