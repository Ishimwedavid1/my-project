<?php

session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
}

$conn = mysqli_connect("localhost", "root", "", "xwisdom_tvet");
if (!$conn) {
    echo " not connected";
} else {
}



if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $pass = $_POST['pass'];

    $check = mysqli_query($conn, "SELECT * FROM user where username = '{$username}' ");
    if (mysqli_num_rows($check) > 0) {
        echo "Username already exist!";
    } else {
        $insert = mysqli_query($conn, " INSERT INTO user(username,`password`) VALUES('{$username}','{$pass}')");

        if ($insert) {
            $select =  mysqli_query($conn, "SELECT * FROM user WHERE username='{$username}' AND `password`='{$pass}' ");


            if ($select) {
                $fetch = mysqli_fetch_assoc($select)['user_id'];
                $_SESSION['user_id'] = $fetch;
                header("Location: ./index.php");
            }
        }
    }
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher registration form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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

        h1 {
            text-align: center;
            color: #333;
        }

        fieldset {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
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

        button[name="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border: none;
            cursor: pointer;
        }

        button[name="submit"]:hover {
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
    </style>
</head>

<body>

    <div class="circle">XWISDOM_TVET</div>
    <fieldset>`
        <h1>REGISTER NOW</h1>
        <form action="" method="POST">
            <div>
                <label for=""></label>
                <input type="text" name="uname" placeholder="username" required>
            </div>
            <div>
                <label for=""></label>
                <input type="text" name="pass" placeholder="password" required>
            </div>
            <button type='submit' name="submit">REGISTER</button>
        </form>
        <h4> have account?</h4>
        <div class="a"><a href="./login.php">LOGIN</a></div>
    </fieldset>
</body>

</html>