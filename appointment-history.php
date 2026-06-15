<?php

session_start();

include("db_connect.php");

$username = $_SESSION['username'];

$sql = "SELECT appointment.*,
               treatment.TreatmentName
        FROM appointment
        INNER JOIN treatment
        ON appointment.TreatmentID = treatment.TreatmentID
        INNER JOIN customer
        ON appointment.CustomerID = customer.CustomerID
        WHERE customer.Username='$username'";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Treatments</title>

<link rel="stylesheet" href="assets/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>

<div class="dashboard">

    <aside class="sidebar">

        <h2>Serenity Spa</h2>

        <ul>

			<li><a href="index.html">🏠 Home</a></li>

            <li><a href="customer-dashboard.php">📊 Dashboard</a></li>

            <li><a href="treatments.php">🌿 Treatments</a></li>

            <li><a href="book-appointment.php">📅 Book Appointment</a></li>

            <li><a href="appointment-history.php">📋 Appointment History</a></li>

            <li><a href="profile.php">👤 Profile</a></li>

            <li><a href="login.php">🚪 Logout</a></li>

        </ul>

    </aside>

<main class="dashboard-content">

   <h1>Appointment History</h1>

	<p>
		View your previous and upcoming appointments.
	</p>

	<div class="history-card">

    <table>

        <tr>
            <th>Date</th>
            <th>Treatment</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
		
<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo date("d F Y", strtotime($row['AppointmentDate'])); ?></td>

    <td><?php echo $row['TreatmentName']; ?></td>

    <td><?php echo date("g:i A", strtotime($row['AppointmentTime'])); ?></td>

    <td><?php echo $row['Status']; ?></td>

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