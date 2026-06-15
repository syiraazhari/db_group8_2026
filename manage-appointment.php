<?php

include("db_connect.php");

if(isset($_GET['confirm']))
{
    $id = $_GET['confirm'];

    $sql = "UPDATE appointment
            SET Status='Confirmed'
            WHERE AppointmentID='$id'";

    mysqli_query($conn,$sql);

<<<<<<< HEAD
    header("Location: manage-appointment.php");
=======
    header("Location: manage-appointments.php");
>>>>>>> 582af90be46039c99decc3864e6c6357dc2e4521
    exit();
}

if(isset($_GET['cancel']))
{
    $id = $_GET['cancel'];

    $sql = "UPDATE appointment
            SET Status='Cancelled'
            WHERE AppointmentID='$id'";

    mysqli_query($conn,$sql);

<<<<<<< HEAD
    header("Location: manage-appointment.php");
=======
    header("Location: manage-appointments.php");
>>>>>>> 582af90be46039c99decc3864e6c6357dc2e4521
    exit();
}

if(isset($_GET['complete']))
{
    $id = $_GET['complete'];

    $sql = "UPDATE appointment
            SET Status='Completed'
            WHERE AppointmentID='$id'";

    mysqli_query($conn,$sql);

<<<<<<< HEAD
    header("Location: manage-appointment.php");
=======
    header("Location: manage-appointments.php");
>>>>>>> 582af90be46039c99decc3864e6c6357dc2e4521
    exit();
}

$sql = "SELECT appointment.*,
               customer.FullName,
               treatment.TreatmentName
        FROM appointment
        INNER JOIN customer
        ON appointment.CustomerID = customer.CustomerID
        INNER JOIN treatment
        ON appointment.TreatmentID = treatment.TreatmentID";

$result = mysqli_query($conn,$sql);

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

        <li><a href="customer-list.php" class="active">👥 Customer List</a></li>

        <li><a href="index.html" class="active">🏠 Home</a></li>

        <li><a href="login.php" class="active">🚪 Logout</a></li>

    </ul>

</aside>

    <main class="dashboard-content">

	<h1>Manage Appointments</h1>

<p>
View and manage customer bookings.
</p>

<div class="recent-bookings">

    <table>

        <tr>
            <th>Customer</th>
            <th>Treatment</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['FullName']; ?></td>

    <td><?php echo $row['TreatmentName']; ?></td>

    <td><?php echo $row['AppointmentDate']; ?></td>

    <td><?php echo $row['AppointmentTime']; ?></td>

    <td><?php echo $row['Status']; ?></td>

    <td>
	
		<div class="action-buttons">

			<a href="manage-appointments.php?confirm=<?php echo $row['AppointmentID']; ?>">
				<button class="confirm-btn">Confirm</button>
			</a>

			<a href="manage-appointments.php?cancel=<?php echo $row['AppointmentID']; ?>">
				<button class="cancel-btn">Cancel</button>
			</a>

			<a href="manage-appointments.php?complete=<?php echo $row['AppointmentID']; ?>">
				<button class="complete-btn">Complete</button>
			</a>

		</div>
		
	</td>

</tr>

<?php
}
?>

    </table>

</div>

</body>
</html>