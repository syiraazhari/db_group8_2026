<?php

session_start();

include("db_connect.php");

$username = $_SESSION['username'];

$sql = "SELECT * FROM customer
        WHERE Username = '$username'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

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

<h1>My Profile</h1>

<p>
Manage your personal information.
</p>

<div class="profile-card">

    <div class="profile-header">

        <div class="profile-avatar">
            👤
        </div>

        <div>
            <h2><?php echo $row['FullName']; ?></h2>
            <p>Customer</p>
        </div>

    </div>

    <form class="profile-form">

        <div class="form-group">

            <label>Full Name</label>

            <input value="<?php echo $row['FullName']; ?>" readonly>

        </div>

        <div class="form-group">

            <label>Phone Number</label>

            <input value="<?php echo $row['PhoneNumber']; ?>" readonly>

        </div>

        <div class="form-group">

            <label>Email Address</label>

            <input value="<?php echo $row['Email']; ?>" readonly>

        </div>

        <div class="form-group">

            <label>Address</label>

            <input value="<?php echo $row['Address']; ?>" readonly>

        </div>

        <div class="form-group">

            <label>Username</label>

            <input 	type="text"
					value="<?php echo $row['Username']; ?>">
					
        </div>

        <button type="submit" class="save-btn">
            Save Changes
        </button>

    </form>

</div>

</main>

</div>

</body>

</html>