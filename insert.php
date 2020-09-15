<?php
$servername = "localhost";
$username = "id14851405_root";
$password = "=7Kvo]Jr{nh_w][A";
$database = "id14851405_adhar_data";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry unable to connect, We regret for inconvinenece");
}
$insert = false;
$delete = false;
$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $mobile = $_POST['editmobile'];
        $sql = "UPDATE `citizen` SET `mobile` = '$mobile ' WHERE `citizen`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        $update = true;
        
    } else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $adharno = $_POST['adharno'];
        $state = $_POST['state'];



        $sql = "INSERT INTO `citizen` ( `name`, `email`,`mobile`, `adharno`,`state`, `time`) 
                VALUES ('$name', '$email','$mobile', '$adharno','$state', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `citizen` WHERE `sno` = $sno";
    $result = mysqli_query($conn,$sql);
    $delete = true;

}

if ($insert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong>YOUR DATA IS SUBMITTED
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
if ($update) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>UPDATED!</strong> YOUR DETATILS ARE UPDATED
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if ($delete) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DELETED!</strong> Your DETAILS ARE DELETED!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
include('index.php');
