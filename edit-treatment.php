<?php

include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM treatment
        WHERE TreatmentID='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE treatment
            SET TreatmentName='$name',
                Duration='$duration',
                Price='$price',
                Description='$description'
            WHERE TreatmentID='$id'";

    mysqli_query($conn,$sql);

    header("Location: manage-treatments.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Edit Treatment</h2>

<form method="POST">

Treatment Name:
<input type="text"
name="name"
value="<?php echo $row['TreatmentName']; ?>">

<br><br>

Duration:
<input type="text"
name="duration"
value="<?php echo $row['Duration']; ?>">

<br><br>

Price:
<input type="text"
name="price"
value="<?php echo $row['Price']; ?>">

<br><br>

Description:
<textarea name="description"><?php echo $row['Description']; ?></textarea>

<br><br>

<button type="submit" name="update">
Update Treatment
</button>

</form>

</body>
</html>