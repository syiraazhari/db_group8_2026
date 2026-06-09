<?php

session_start();

include("db_connect.php");

$slots = [
    "10:00 AM",
    "11:00 AM",
    "12:00 PM",
    "2:00 PM",
    "3:00 PM",
    "4:00 PM"
];

$bookedSlots = [];

$sqlSlots = "SELECT AppointmentTime
             FROM appointment
             WHERE AppointmentDate = CURDATE()
             AND Status != 'Cancelled'";

$resultSlots = mysqli_query($conn, $sqlSlots);

while($row = mysqli_fetch_assoc($resultSlots))
{
    $bookedSlots[] = date("g:i A", strtotime($row['AppointmentTime']));
}

$username = $_SESSION['username'];

$sql_customer = "SELECT CustomerID
                 FROM customer
                 WHERE Username='$username'";

$result_customer = mysqli_query($conn,$sql_customer);

$row_customer = mysqli_fetch_assoc($result_customer);

$customerID = $row_customer['CustomerID'];

if(isset($_POST['book']))
{
    $treatment = $_POST['treatment'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $remarks = $_POST['remarks'];

    if($treatment == "Aromatherapy Massage")
    {
        $treatmentID = 1;
    }
    elseif($treatment == "Facial Treatment")
    {
        $treatmentID = 2;
    }
    else
    {
        $treatmentID = 3;
    }

    $sql = "INSERT INTO appointment
            (CustomerID, TreatmentID, AppointmentDate, AppointmentTime, Remarks, Status)
            VALUES
			('$customerID', '$treatmentID', '$appointment_date',
			 '$appointment_time', '$remarks', 'Upcoming')";

    mysqli_query($conn,$sql);

    echo "<script>alert('Appointment Booked Successfully');</script>";
}

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

    <h1>Book Appointment</h1>

    <p>
        Schedule your next spa treatment.
    </p>
	
	<div class="availability-card">

    <h3>Available Time Slots Today</h3>

    <div class="slot-container">

        <?php
		foreach($slots as $slot)
		{
			if(in_array($slot, $bookedSlots))
			{
				echo "<span class='slot booked'>$slot</span>";
			}
			else
			{
				echo "<span class='slot available'>$slot</span>";
			}
		}
		?>

    </div>

	</div>

    <div class="booking-card">

        <form method="POST">

            <div class="form-group">

                <label>Treatment</label>

                <select name="treatment">

                    <option>Aromatherapy Massage</option>

                    <option>Facial Treatment</option>

                    <option>Hot Stone Therapy</option>

                </select>

            </div>

            <div class="form-group">

                <label>Appointment Date</label>

                <input type="date" name="appointment_date">

            </div>

            <div class="form-group">

                <label>Appointment Time</label>

            <select name="appointment_time">

				<?php
				foreach($slots as $slot)
				{
					if(in_array($slot, $bookedSlots))
					{
						echo "<option disabled>$slot (Booked)</option>";
					}
					else
					{
						echo "<option>$slot</option>";
					}
				}
				?>

			</select>
			
			<p class="availability-note">
				* Greyed-out slots are already booked and unavailable.
			</p>

            </div>

            <div class="form-group">

                <label>Remarks</label>

                <textarea name="remarks"
							placeholder="Optional notes..."></textarea>

            </div>

            <button type="submit"
					name="book"
					class="book-btn">
                Confirm Appointment
            </button>

        </form>

    </div>

</main>

</div>

</body>

</html>