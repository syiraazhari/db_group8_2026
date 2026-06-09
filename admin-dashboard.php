<?php

session_start();

include("db_connect.php");

$sql_customer = "SELECT COUNT(*) AS total FROM customer";
$result_customer = mysqli_query($conn,$sql_customer);
$row_customer = mysqli_fetch_assoc($result_customer);
$totalCustomers = $row_customer['total'];

$sql_staff = "SELECT COUNT(*) AS total FROM staff";
$result_staff = mysqli_query($conn,$sql_staff);
$row_staff = mysqli_fetch_assoc($result_staff);
$totalStaff = $row_staff['total'];

$sql_appointment = "SELECT COUNT(*) AS total FROM appointment";
$result_appointment = mysqli_query($conn,$sql_appointment);
$row_appointment = mysqli_fetch_assoc($result_appointment);
$totalAppointments = $row_appointment['total'];

$sql_treatment = "SELECT COUNT(*) AS total FROM treatment";
$result_treatment = mysqli_query($conn,$sql_treatment);
$row_treatment = mysqli_fetch_assoc($result_treatment);
$totalTreatments = $row_treatment['total'];

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
            <a href="logout.php">
                🚪 Logout
            </a>
        </li>

    </ul>

</aside>

    <main class="dashboard-content">

	<h1>Welcome Back, <?php echo $_SESSION['username']; ?></h1>

<p>
Manage system operations and monitor spa performance.
</p>

<div class="stats">

    <div class="stat-card">
		<h3><?php echo $totalCustomers; ?></h3>
		<p>Total Customers</p>
	</div>

	<div class="stat-card">
		<h3><?php echo $totalAppointments; ?></h3>
		<p>Total Appointments</p>
	</div>

	<div class="stat-card">
		<h3><?php echo $totalTreatments; ?></h3>
		<p>Total Treatments</p>
	</div>

</div>

<div class="recent-bookings">

    <h2>System Overview</h2>

    <table>

        <tr>
            <th>Category</th>
            <th>Total</th>
        </tr>

        <tr>
			<td>Customers</td>
			<td><?php echo $totalCustomers; ?></td>
		</tr>

		<tr>
			<td>Staff Members</td>
			<td><?php echo $totalStaff; ?></td>
		</tr>

		<tr>
			<td>Treatments</td>
			<td><?php echo $totalTreatments; ?></td>
		</tr>

		<tr>
			<td>Appointments</td>
			<td><?php echo $totalAppointments; ?></td>
		</tr>

    </table>

</div>

</body>
</html>