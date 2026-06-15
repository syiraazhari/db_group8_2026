<?php

include("db_connect.php");

if(isset($_POST['register']))
{
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Customer
    (FullName, PhoneNumber, Email, Address, Username, Password)

    VALUES

    ('$fullname',
    '$phone',
    '$email',
    '$address',
    '$username',
    '$password')";

    mysqli_query($conn, $sql);

    echo "<script>
    alert('Registration Successful');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Serenity Spa</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<section class="login-page">

    <div class="login-image">

    </div>

    <div class="login-form-container">

        <div class="login-box">

            <h1>Create Account</h1>

			<p>
				Start your wellness journey with Serenity Spa.
			</p>
			
           <form action="register.php" method="POST">

				<input type="text" name="fullname" placeholder="Full Name">

				<input type="text" name="phone" placeholder="Phone Number">

				<input type="email" name="email" placeholder="Email Address">

				<textarea name="address" placeholder="Address"></textarea>

				<input type="text" name="username" placeholder="Username">

				<input type="password" name="password" placeholder="Password">

			<button type="submit" name="register">
				Register
			</button>

			</form>

            <div class="register-link">
                Already have an account?
				<a href="login.php">Login</a>
            </div>

        </div>

    </div>

</section>

</body>
</html>