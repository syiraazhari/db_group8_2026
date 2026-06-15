<?php

include("db_connect.php");

$id = $_GET['id'];

$sql = "DELETE FROM treatment
        WHERE TreatmentID='$id'";

mysqli_query($conn,$sql);

header("Location: manage-treatments.php");
exit();

?>