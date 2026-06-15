<?php

session_start();

include("db_connect.php");

$sql = "SELECT * FROM treatment";

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

        <h1>Our Treatments</h1>

        <p>
            Choose from our premium wellness treatments.
        </p>

        <div class="treatment-grid">

            <div class="treatment-card">

                <img src="assets/images/aromatherapy.jpeg" alt="Aromatherapy">

                <h3>Aromatherapy Massage</h3>

                <p>
                    Relaxing full-body massage using natural essential oils.
                </p>

                <a href="book-appointment.php" class="book-btn">>
                    Book Now
                </a>

            </div>

            <div class="treatment-card">

                <img src="assets/images/facial.jpeg" alt="Facial">

                <h3>Facial Treatment</h3>

                <p>
                    Revitalize and nourish your skin for a healthy radiant glow.
                </p>

                <a href="book-appointment.php" class="book-btn">>
                    Book Now
                </a>

            </div>

            <div class="treatment-card">

                <img src="assets/images/hotstone.jpeg" alt="Hot Stone">

                <h3>Hot Stone Therapy</h3>

                <p>
                    Relieve tension, improve circulation and promote relaxation.
                </p>

                <a href="book-appointment.php" class="book-btn">
					Book Now
				</a>

            </div>

        </div>

    </main>

</div>

</body>

</html>