<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "xwisdom_tvet");

if (isset($_SESSION['user_id'])) {
    header("Location:./index.php");
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = "SELECT * FROM user WHERE username = '{$username}' and `password` ='{$password}' ";
    $login = mysqli_query($conn, $select);

    if (mysqli_num_rows($login) == 1) {
        $fetch = mysqli_fetch_assoc($login)['user_id'];
        $_SESSION['user_id'] = $fetch;
        header("location:./index.php");
    } else {
        echo "<script>alert('username or password is incorrect')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <title>login</title>
    <style>
        /* CSS for login form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        fieldset {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        button[name="login"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border: none;
            cursor: pointer;
        }

        button[name="login"]:hover {
            background-color: #45a049;
        }

        h4 {
            text-align: center;
            margin-top: 20px;
        }

        .a {
            text-align: center;
        }

        .a a {
            text-decoration: none;
            color: #333;
        }

        .a a:hover {
            text-decoration: underline;
            color: #555;
        }

        .circle {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            line-height: 200px;
            font-size: 24px;
            margin: 50px auto;
        }
    </style>
</head>

<body>
    <div class="circle">XWISDOM_TVET</div>

    <fieldset>
        <h1>LOGIN HERE</h1>
        <form action="" method="POST">
            <label for="username"></label>
            <input type="text" name="username" placeholder="username" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
            <label for="showPassword">Show Password</label><br>
            <button name="login">login</button>
        </form>
        <h4>don't have account?</h4>
        <div class="a"><a href="./signup.php">REGISTER</a></div>
    </fieldset>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var checkbox = document.getElementById("showPassword");
            if (checkbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>

</body>

</html>