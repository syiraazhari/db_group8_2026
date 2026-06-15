<?php

include("db_connect.php");

$id = $_GET['id'];

$sql = "DELETE FROM staff WHERE StaffID='$id'";

mysqli_query($conn,$sql);

header("Location: manage-staff.php");
exit();

?>