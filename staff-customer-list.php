<?php
include("db_connect.php");

$sql = "SELECT * FROM customer";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Staff Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="dashboard">

<aside class="sidebar">

    <h2>Serenity Spa</h2>

    <ul>
		
        <li><a href="staff-dashboard.php" class="active">📊 Dashboard</a></li>

        <li><a href="manage-appointments.php" class="active">📅 Manage Appointments</a></li>

        <li><a href="staff-customer-list.php" class="active">👥 Customer List</a></li>

        <li><a href="index.html" class="active">🏠 Home</a></li>
		
		<li><a href="logout.php">🚪 Logout</a></li>

    </ul>

</aside>

    <main class="dashboard-content">

<h1>Customer List</h1>

<p>
View registered customer information.
</p>

<div class="recent-bookings">

    <table>
	
		<tr>
			<th>Customer ID</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>

        <?php
			while($row = mysqli_fetch_assoc($result))
			{
			?>
			<tr>
				<td><?php echo $row['CustomerID']; ?></td>
				<td><?php echo $row['FullName']; ?></td>
				<td><?php echo $row['PhoneNumber']; ?></td>
				<td><?php echo $row['Email']; ?></td>
			</tr>
		<?php
		}
		?>

    </table>

</div>

</body>
</html>