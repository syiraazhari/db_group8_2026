<?php

session_start();

include("db_connect.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $sql_delete = "DELETE FROM staff
                   WHERE StaffID='$id'";

if(mysqli_query($conn,$sql_delete))
{
    echo "<script>
            alert('Staff deleted successfully');
            window.location='manage-staff.php';
          </script>";
}
else
{
    echo "<script>
            alert('Cannot delete this staff member.');
            window.location='manage-staff.php';
          </script>";
}

    echo "<script>
            alert('Staff deleted successfully');
            window.location='manage-staff.php';
          </script>";
}

$sql = "SELECT * FROM staff";

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
            <a href="manage-treatments.php" class="active">
                💆 Manage Treatments
            </a>
        </li>

        <li>
            <a href="manage-staff.php" class="active">
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
            <a href="login.php" class="active">
                🚪 Logout
            </a>
        </li>

    </ul>

</aside>

    <main class="dashboard-content">

<h1>Manage Staff</h1>

<p>
Manage staff accounts and information.
</p>

<a href="add-staff.php" class="book-btn">+ Add Staff</a>

<div class="recent-bookings">

    <table>

        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['StaffID']; ?></td>

    <td><?php echo $row['StaffName']; ?></td>

    <td><?php echo $row['Position']; ?></td>

    <td><?php echo $row['PhoneNumber']; ?></td>

    <td>
		<a href="edit-staff.php?id=<?php echo $row['StaffID']; ?>">Edit</a> |
		<a href="delete-staff.php?id=<?php echo $row['StaffID']; ?>">Delete</a>
	</td>

</tr>

<?php
}

?>

    </table>

</div>

</body>
</html>