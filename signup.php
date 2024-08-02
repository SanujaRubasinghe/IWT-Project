<?php
    include 'user_db_connect.php';
    
    $fname = $lname = $email = $password = $message = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $sql = "INSERT INTO `users` (firstname, lastname, email, password)
                VALUES('$fname', '$lname', '$email', '$password')";

        if (!mysqli_query($conn, $sql)) {
            die("Account Creation Failed.".mysqli_error($conn));
        }

        $message = "Account Created Successfully.";
    }

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up</title>
</head>
<body>
    
    <section id="login-signup">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>Sign Up</h2>
            <section id="login-signup-error"><?php echo $message?></section>
            First Name: <input type="text" name="fname" required><br>
            Last Name: <input type="text" name="lname" requried><br>
            Email: <input type="email" name="email" required><br>
            Password: <input type="password" name="password" required><br>
            <input type="submit" value="Sign Up">
    
            <a href="login.php">Log In</a>
        </form>
    
    </section>
</body>
</html>