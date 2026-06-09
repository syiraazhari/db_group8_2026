<?php
include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM staff WHERE StaffID='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['updateStaff']))
{
    $staffname = $_POST['staffname'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $username = $_POST['username'];

    $sqlUpdate = "UPDATE staff
                  SET StaffName='$staffname',
                      PhoneNumber='$phone',
                      Position='$position',
                      Username='$username'
                  WHERE StaffID='$id'";

    mysqli_query($conn,$sqlUpdate);

    header("Location: manage-staff.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Staff</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="register-container">
<div class="register-box">

<h1>Edit Staff</h1>

<form method="POST">

<input type="text"
       name="staffname"
       value="<?php echo $row['StaffName']; ?>"
       required>

<input type="text"
       name="phone"
       value="<?php echo $row['PhoneNumber']; ?>"
       required>

<input type="text"
       name="position"
       value="<?php echo $row['Position']; ?>"
       required>

<input type="text"
       name="username"
       value="<?php echo $row['Username']; ?>"
       required>

<button type="submit" name="updateStaff">
    Update Staff
</button>

</form>

</div>
</div>

</body>
</html>