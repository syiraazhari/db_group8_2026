<?php

session_start();

include("db_connect.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if($role == "Customer")
    {
        $sql = "SELECT * FROM Customer
                WHERE Username='$username'
                AND Password='$password'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1)
        {
            $_SESSION['username'] = $username;

            header("Location: customer-dashboard.php");
            exit();
        }
    }
	
	if($role == "Staff")
	{
		$sql = "SELECT * FROM Staff
				WHERE Username='$username'
				AND Password='$password'";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username'] = $username;

			header("Location: staff-dashboard.php");
			exit();
		}
	}
	
	if($role == "Admin")
	{
		$sql = "SELECT * FROM Admin
				WHERE Username='$username'
				AND Password='$password'";

		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)==1)
		{
			$_SESSION['username'] = $username;

			header("Location: admin-dashboard.php");
			exit();
		}
	}

    echo "<script>alert('Invalid Login');</script>";
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

            <h1>Welcome Back</h1>

            <p>
                Login to continue your spa experience.
            </p>
			
            <form method="POST">

                <input 	type="text"
						name="username"
						placeholder="Username">

                <input 	type="password"
						name="password"
						placeholder="Password">

                <select name="role">
                    <option>Customer</option>
                    <option>Staff</option>
                    <option>Admin</option>
                </select>

                <button type="submit" name="login">
                    Login
                </button>

            </form>

            <div class="register-link">
                Don't have an account?
                <a href="register.php">Register</a>
            </div>

        </div>

    </div>

</section>

</body>
</html>