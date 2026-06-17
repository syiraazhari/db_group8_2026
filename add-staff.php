<?php
include("db_connect.php");

if(isset($_POST['addStaff']))
{
    $staffname = $_POST['staffname'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO staff
    (StaffName, PhoneNumber, Position, Username, Password)
    VALUES
    ('$staffname','$phone','$position','$username','$password')";

    if(mysqli_query($conn,$sql))
{
    header("Location: manage-staff.php");
}
else
{
    echo "<script>alert('Username already exists!');</script>";
}

    header("Location: manage-staff.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Staff</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="register-container">
<div class="register-box">

<h1>Add Staff</h1>

<p style="text-align:center;">
Create a new staff account.
</p>

<p>Create a new staff account.</p>

<form method="POST">

    <input type="text" name="staffname" placeholder="Staff Name" required>

    <input type="text" name="phone" placeholder="Phone Number" required>

    <select name="position" required>
		<option value="">Select Position</option>
		<option value="Therapist">Therapist</option>
		<option value="Receptionist">Receptionist</option>
		<option value="Admin">Admin</option>
	</select>

    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit" name="addStaff">
        Add Staff
    </button>

</form>

</div>
</div>

</body>
</html>