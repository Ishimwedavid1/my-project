<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body {
            background: whitesmoke;
        }

        /* button {
            position: relative;
            left: 30%;
            top: 70px;
            height: 55px;
            width: 150px;
            margin: 30px;
            border-radius: 10px;
            background: transparent;

        } */

        button a {
            font-family: cursive;
            color: black;
            border: none;
            outline: none;
            text-decoration: none;
            font-size: 20px;

        }


        button {
            position: relative;
            /* left: 90%; */
            left: 45%;
            top: 200px;
            padding: 10px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover {
            background-color: #0056b3;
        }

        button a {
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        h1 {
            position: relative;
            margin-left: 40px;
            /* margin-top: 10px; */
            font-family: cursive;
        }

        .circle {

            position: absolute;
            width: 10%;
            height: 100px;
            border-radius: 50%;
            border: 2px solid black;
            top: 30px;
            color: aqua;
        }

        p {
            font-family: cursive;
            color: black;
            font-size: 90px;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        img {
            width: 100px;
            height: 100px;
            border-radius: 50%;

        }
    </style>

</head>

<body>

    <h1>XWISDOM_TVET </h1><br><br><br><br><br><br><br>

    <button><a href="./login.php">LOGIN</a></button>
    <button><a href="./signup.php">SIGNUP</a></button>
    <p>
        <?php
        date_default_timezone_set('Africa/kigali'); // Set your desired timezone
        echo date('g:i a'); // Display the current time in 12-hour format
        ?>
    </p>
</body>

</html>