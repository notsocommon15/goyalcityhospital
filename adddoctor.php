<html>
<head>
<title>ADMIN ADD DOCTORS</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.0.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
</head>
<body>
<?php require_once 'process.php'; ?>

<?php 

if(isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">
<?php
echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</div>
<?php endif ?>

<div class="container">
<h2 class="text-center">ADD DOCTORS</h2>
<?php 
$mysqli = new mysqli('localhost','root','','goyal') or die(mysqli_error($mysqli));
$result = $mysqli->query("SELECT * FROM doctors") or die($mysqli->error);
//pre_r($result->fetch_assoc());
?>
<div class="row justify-content-center">
<table class="table">
<thead>
<tr>
<th>NAME</th>
<th>DEGREE</th>
<th>SPECIALITY</th>
<th>EDUCATION</th>
<th>MEMBERSHIP</th>
<th>ATTACHMENTS</th>
<th>DOCTOR'S IMAGE</th>
<th colspan="2">ACTION</th>
</tr>
</thead>
<?php
while ($row = $result->fetch_assoc()): ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['degree']; ?></td>
<td><?php echo $row['speciality']; ?></td>
<td><?php echo $row['education']; ?></td>
<td><?php echo $row['membership']; ?></td>
<td><?php echo $row['attachments']; ?></td>
<td><?php echo '<img src="doctors/'.$row['image'].'" width="100px;" height="100px;" alt="image">'?></td>
<td>
<a href="adddoctor.php?edit=<?php echo $row['id'];?>"
class="btn btn-info">Edit</a>
<a href="process.php?delete=<?php echo $row['id'];?>"
class="btn btn-danger">Delete</a>
</td>
</tr>
<?php endwhile;
?></table>
</div>
<?php
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo'</pre>';
}
?>
<div class="row justify-content-center">
<form action="process.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<div class="form-group">
<label>Name of Doctor</label>
<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name of Doctor">
</div>
<div class="form-group">
<label>Qualification Degree</label>
<input type="text" name="degree" class="form-control" value="<?php echo $degree; ?>" placeholder="Qualification Degree">
</div>
<div class="form-group">
<label>Speciality</label>
<input type="text" name="speciality" class="form-control" value="<?php echo $speciality; ?>" placeholder="Speciality">
</div>
<div class="form-group">
<label>Education and Training</label>
<input type="text" name="education" class="form-control" value="<?php echo $education; ?>" placeholder="Education and Training">
</div>
<div class="form-group">
<label>Membership/Fellowship</label>
<input type="text" name="membership" class="form-control" value="<?php echo $membership; ?>" placeholder="Membership/Fellowship">
</div>
<div class="form-group">
<label>Former Attachments</label>
<input type="text" name="attachments" class="form-control" value="<?php echo $attachments; ?>" placeholder="Former Attachments">
</div>
<div class="form-group">
<label>Image of Doctor</label>
<input type="file" name="image" class="form-control" value="<?php echo $image; ?>" accept="image/*">
</div>
<div class="form-group">
<?php
if($update == true):
?>
<button type="submit" class="btn btn-info" name="update">Update</button>
<?php 
else:?>
    <button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif; ?>

</div>
</form>
</div>
</div>
</body>
</html>