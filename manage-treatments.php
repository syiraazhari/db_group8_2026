<?php

include("db_connect.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    try
    {
        $sql = "DELETE FROM treatment
                WHERE TreatmentID='$id'";

        mysqli_query($conn,$sql);

        header("Location: manage-treatments.php");
        exit();
    }
    catch(Exception $e)
    {
        echo "<script>
                alert('Cannot delete treatment because it is used in existing appointments.');
                window.location='manage-treatments.php';
              </script>";
        exit();
    }
}

$sql = "SELECT * FROM Treatment";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="dashboard">

<aside class="sidebar">

    <h2>Serenity Spa</h2>

    <ul>

        <li>
            <a href="admin-dashboard.php" class="active">
                📊 Dashboard
            </a>
        </li>

        <li>
            <a href="manage-treatments.php">
                💆 Manage Treatments
            </a>
        </li>

        <li>
            <a href="manage-staff.php">
                👨‍💼 Manage Staff
            </a>
        </li>
		
		<li>
			<a href="customer-list.php">
				👥 Customer List
			</a>
		</li>

        <li>
            <a href="index.html">
                🏠 Home
            </a>
        </li>

        <li>
            <a href="login.php">
                🚪 Logout
            </a>
        </li>

    </ul>

</aside>

    <main class="dashboard-content">

	<h1>Manage Treatments</h1>

<p>
Add, edit and manage spa treatments.
</p>

<<<<<<< HEAD
<a href="add-treatment.php" class="book-btn">+ Add Treatment</a>

<br><br>

=======
>>>>>>> 582af90be46039c99decc3864e6c6357dc2e4521
<div class="recent-bookings">

    <table>

        <tr>
            <th>ID</th>
            <th>Treatment</th>
            <th>Duration</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['TreatmentID']; ?></td>

    <td><?php echo $row['TreatmentName']; ?></td>

    <td><?php echo $row['Duration']; ?></td>

    <td>RM<?php echo $row['Price']; ?></td>

    <td>
<<<<<<< HEAD
		<a href="edit-treatment.php?id=<?php echo $row['TreatmentID']; ?>">
			Edit
		</a>

		|

		<a href="delete-treatment.php?id=<?php echo $row['TreatmentID']; ?>"
			onclick="return confirm('Are you sure you want to delete this treatment?')">
=======
		<a href="manage-treatments.php?delete=<?php echo $row['TreatmentID']; ?>">
>>>>>>> 582af90be46039c99decc3864e6c6357dc2e4521
			Delete
		</a>
	</td>

</tr>

<?php
}
?>

    </table>

</div>

</body>
</html>