<?php
session_start();

include("db_connect.php");

$sqlToday = "SELECT COUNT(*) AS total
             FROM appointment
             WHERE AppointmentDate = CURDATE()";

$resultToday = mysqli_query($conn,$sqlToday);
$rowToday = mysqli_fetch_assoc($resultToday);

$totalToday = $rowToday['total'];

$sqlPending = "SELECT COUNT(*) AS total
               FROM appointment
               WHERE Status='Upcoming'";

$resultPending = mysqli_query($conn,$sqlPending);
$rowPending = mysqli_fetch_assoc($resultPending);

$pendingConfirmations = $rowPending['total'];

$sqlCompleted = "SELECT COUNT(*) AS total
                 FROM appointment
                 WHERE Status='Completed'";

$resultCompleted = mysqli_query($conn,$sqlCompleted);
$rowCompleted = mysqli_fetch_assoc($resultCompleted);

$completedTreatments = $rowCompleted['total'];

$sqlSchedule = "
SELECT
    a.AppointmentTime,
    c.FullName,
    t.TreatmentName,
    a.Status
FROM appointment a
JOIN customer c ON a.CustomerID = c.CustomerID
JOIN treatment t ON a.TreatmentID = t.TreatmentID
WHERE a.AppointmentDate >= CURDATE()
ORDER BY a.AppointmentTime
";

$resultSchedule = mysqli_query($conn, $sqlSchedule);

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

    <h1>
        Welcome Back, <?php echo $_SESSION['username']; ?>
    </h1>

	<div class="welcome-card">
		<h3>
			Good Afternoon, <?php echo $_SESSION['username']; ?> ✨
		</h3>

		<p>
			Manage customer appointments and treatment schedules.
		</p>
	</div>

<div class="stats">

	<div class="stat-card">
		<h3><?php echo $totalToday; ?></h3>
		<p>Today's Appointments</p>
	</div>

	<div class="stat-card">
		<h3><?php echo $pendingConfirmations; ?></h3>
		<p>Upcoming Appointments</p>
	</div>

	<div class="stat-card">
		<h3><?php echo $completedTreatments; ?></h3>
		<p>Completed Treatments</p>
	</div>
	
</div>	

<div class="recent-bookings">

    <h2>Today's Schedule</h2>

    <table>

        <tr>
            <th>Time</th>
            <th>Customer</th>
            <th>Treatment</th>
            <th>Status</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($resultSchedule)) { ?>
		<tr>
			<td><?php echo $row['AppointmentTime']; ?></td>
			<td><?php echo $row['FullName']; ?></td>
			<td><?php echo $row['TreatmentName']; ?></td>
			<td><?php echo $row['Status']; ?></td>
		</tr>
		<?php } ?>

    </table>

</div>

</body>
</html>