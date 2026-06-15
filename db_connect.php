<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "spa_system"
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>