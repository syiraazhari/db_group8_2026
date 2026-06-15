<?php
session_start();

include("db_connect.php");

$username = $_SESSION['username'];

$sql_customer = "SELECT CustomerID
                 FROM customer
                 WHERE Username='$username'";

$result_customer = mysqli_query($conn, $sql_customer);

$row_customer = mysqli_fetch_assoc($result_customer);

$customerID = $row_customer['CustomerID'];

$sql_total = "SELECT COUNT(*) AS total
              FROM appointment
              WHERE CustomerID='$customerID'";

$result_total = mysqli_query($conn, $sql_total);

$row_total = mysqli_fetch_assoc($result_total);

$totalAppointments = $row_total['total'];

$sql_upcoming = "SELECT COUNT(*) AS total
                 FROM appointment
                 WHERE CustomerID='$customerID'
                 AND Status='Upcoming'";

$result_upcoming = mysqli_query($conn, $sql_upcoming);

$row_upcoming = mysqli_fetch_assoc($result_upcoming);

$upcomingAppointments = $row_upcoming['total'];

$sql_next = "SELECT AppointmentDate
             FROM appointment
             WHERE CustomerID='$customerID'
             AND Status='Upcoming'
             ORDER BY AppointmentDate ASC
             LIMIT 1";

$result_next = mysqli_query($conn,$sql_next);

$row_next = mysqli_fetch_assoc($result_next);

$sql_completed = "SELECT COUNT(*) AS total
                  FROM appointment
                  WHERE CustomerID='$customerID'
                  AND Status='Completed'";

$result_completed = mysqli_query($conn,$sql_completed);

$row_completed = mysqli_fetch_assoc($result_completed);

$completedTreatments = $row_completed['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Customer Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

    <h2>Serenity Spa</h2>

    <ul>
	
		<li>
			<a href="index.html">🏠 Home</a>
		</li>

        <li>
            <a href="customer-dashboard.php">📊 Dashboard</a>
        </li>

        <li>
            <a href="treatments.php">🌿 Treatments</a>
        </li>

        <li>
            <a href="book-appointment.php">📅 Book Appointment</a>
        </li>

        <li>
            <a href="appointment-history.php">📋 Appointment History</a>
        </li>

        <li>
            <a href="profile.php">👤 Profile</a>
        </li>

        <li>
            <a href="logout.php">🚪 Logout</a>
        </li>

    </ul>

</aside>

    <main class="dashboard-content">

        <h1>
			Welcome Back,
			<?php echo $_SESSION['username']; ?>
		</h1>

        <p>
            Here's an overview of your spa activities.
        </p>
		
	<div class="welcome-card">

		<h3>
			Good Afternoon,
			<?php echo $_SESSION['username']; ?> ✨
		</h3>

		<p>

		<?php

		if($row_next)
		{
			echo "Your next appointment is scheduled for "
				 . date("d F Y", strtotime($row_next['AppointmentDate']))
				 . ".";
		}
		else
		{
			echo "You have no upcoming appointments.";
		}

		?>

		</p>

	</div>

<div class="stats">
		<div class="stat-card">
			<h3><?php echo $totalAppointments; ?></h3>
			<p>Total Appointments</p>
		</div>

		<div class="stat-card">
			<h3><?php echo $upcomingAppointments; ?></h3>
			<p>Upcoming Appointments</p>
		</div>

		<div class="stat-card">
			<h3><?php echo $completedTreatments; ?></h3>
			<p>Completed Treatments</p>
		</div>
		
</div>

        <div class="recent-bookings">

            <h2>Recent Appointments</h2>

            <table>

                <tr>
                    <th>Date</th>
                    <th>Treatment</th>
                    <th>Status</th>
                </tr>
	
<?php

$sql_recent = "SELECT appointment.AppointmentDate,
                      appointment.Status,
                      treatment.TreatmentName
               FROM appointment
               INNER JOIN treatment
               ON appointment.TreatmentID = treatment.TreatmentID
               WHERE appointment.CustomerID='$customerID'
               ORDER BY appointment.AppointmentDate DESC
               LIMIT 5";

$result_recent = mysqli_query($conn,$sql_recent);

if(mysqli_num_rows($result_recent) > 0)
{
    while($row = mysqli_fetch_assoc($result_recent))
    {
?>

<tr>
    <td><?php echo date("d F Y", strtotime($row['AppointmentDate'])); ?></td>
    <td><?php echo $row['TreatmentName']; ?></td>
    <td><?php echo $row['Status']; ?></td>
</tr>

<?php
    }
}
else
{
?>
<tr>
    <td colspan="3">No appointments found.</td>
</tr>
<?php
}
?>
		
            </table>

        </div>

    </main>

</div>

</body>
</html>