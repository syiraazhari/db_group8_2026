<?php

include("db_connect.php");

if(isset($_POST['add']))
{
    $name = $_POST['name'];
	$duration = $_POST['duration'];
	$price = $_POST['price'];
	$description = $_POST['description'];

    $sql = "INSERT INTO treatment
        (TreatmentName, Duration, Price, Description)
        VALUES
        ('$name','$duration','$price','$description')";

    mysqli_query($conn,$sql);

    header("Location: manage-treatments.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Treatment</title>
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<div class="register-container">
<div class="register-box">

<h1 style="text-align:center; margin-bottom:10px;">
Add Treatment
</h1>

<p style="text-align:center;">
Create a new spa treatment.
</p>

<form method="POST">

<div class="form-group">
    <input type="text"
       name="name"
       placeholder="Treatment Name"
       required>

<input type="text"
       name="duration"
       placeholder="Duration (e.g. 60 Minutes)"
       required>

<input type="number"
       step="0.01"
       name="price"
       placeholder="Price"
       required>

<textarea
       name="description"
       placeholder="Treatment Description"
       rows="4"></textarea>

<button type="submit" name="add">
    Add Treatment
</button>

</form>

</div>
</div>

</body>

</html>