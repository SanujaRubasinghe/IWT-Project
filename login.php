<?php

    include 'user_db_connect.php';

    $email = $password = $error = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        $result = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stored_password = $row['password'];

            if ($stored_password === $password) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['firstname'];

                header("Location: /shop/index.php");
                exit;
            } else {
                $error = "Email or Password Incorrect.";
            }
        } else {
            $error = "Email Not Found.";
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>
<body>
    <section id="login-signup">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <h2>Log In</h2>
            <section id="login-signup-error"><?php echo $error; ?></section>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email_input" required><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password_input" required><br>
            <div class="buttons">
                <a href="signup.php">Sign Up</a><br>
                <input type="submit" value="Log In">
            </div>
        </form>
    </section>
</body>
</html>