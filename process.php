<?php
session_start();
$mysqli = new mysqli('localhost','root','','goyal') or die($mysqli_error($mysqli));
$update = false;
$name='';
$degree='';
$speciality='';
$education='';
$membership='';
$attachments='';
$image='';
$id = 0; 
if(isset($_POST['save'])){
    $name = mysqli_real_escape_string($mysqli,$_REQUEST['name']);
    $degree= mysqli_real_escape_string($mysqli,$_REQUEST['degree']);
    $speciality= mysqli_real_escape_string($mysqli,$_REQUEST['speciality']);
    $education= mysqli_real_escape_string($mysqli,$_REQUEST['education']);
    $membership= mysqli_real_escape_string($mysqli,$_REQUEST['membership']);
    $attachments= mysqli_real_escape_string($mysqli,$_REQUEST['attachments']);
    $image= mysqli_real_escape_string($mysqli,$_FILES['image']['name']);
    


    if(file_exists("doctors/" .$_FILES['image']['name']))
    {
        $store= $_FILES['image']['name'];
        $_SESSION['message'] = "Image already exists. '.$store.'";
    $_SESSION['msg_type'] = "danger";
    header("location: adddoctor.php");
    }

    else{
    if(preg_match("!image!", $_FILES['image']['type']))
    {
           $sql = "INSERT INTO doctors (name,degree,speciality,education,membership,attachments,image) VALUES('$name','$degree','$speciality','$education','$membership','$attachments','$image')";
           if($mysqli->query($sql) ===true){
               move_uploaded_file($_FILES['image']['tmp_name'],"doctors/".$_FILES['image']['name']);
            $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";

    header("location: adddoctor.php");
           }
           else{
            $_SESSION['message'] = "Record could not be added";
            $_SESSION['msg_type'] = "danger";
           }
    }
    else{
        $_SESSION['message'] = "Please upload only .jpg or .png file";
            $_SESSION['msg_type'] = "danger";
    }
} 
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM doctors WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: adddoctor.php");
}

if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM doctors WHERE id=$id") or die($mysqli_error());
    if(isset($result->num_rows)==1)
    {
        $row = $result->fetch_array();
        $name = $row['name'];
        $degree = $row['degree'];
        $speciality = $row['speciality'];
        $education = $row['education'];
        $membership = $row['membership'];
        $attachments = $row['attachments'];
        $image = $row['image'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $speciality = $_POST['speciality'];
    $education = $_POST['education'];
    $membership = $_POST['membership'];
    $attachments = $_POST['attachments'];
    $image = $_FILES['image']['name'];
    
    if(preg_match("!image!", $_FILES['image']['type']))
    {
           $sql = "UPDATE doctors SET name='$name', degree='$degree' , speciality='$speciality' , education='$education' , membership='$membership' , attachments='$attachments' , image='$image' WHERE id=$id";
           if($mysqli->query($sql) ===true){
               move_uploaded_file($_FILES['image']['tmp_name'],"doctors/".$_FILES['image']['name']);
            $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header("location: adddoctor.php");
           }
           else{
            $_SESSION['message'] = "Record could not be updated";
            $_SESSION['msg_type'] = "danger";
           }
    }
    else{
        $_SESSION['message'] = "Please upload only .jpg or .png file";
            $_SESSION['msg_type'] = "danger";
    }
}


?>