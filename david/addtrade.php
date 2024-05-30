<?php
include './conn.php';

if (isset($_POST['add'])) {
    $tradeName = $_POST['tname'];



    $query = mysqli_query($conn, "INSERT INTO trade (tradeName) VALUES('{$tradeName}')");

    if ($query) {
        echo "is inserted";
    }
    if ($query == true) {
        header("location:./trade.php");
    } else {
        echo "there is error to add trade";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add trade</title>
    <style>
        .link {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
        }

        .link a {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            margin: 0 5px;
        }

        .link a:hover {
            background-color: #f2f2f2;
            border-radius: 5px;
        }


        .container form {
            position: absolute;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            top: 30%;
            left: 40%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }


        label {
            display: block;
            margin-bottom: 5px;
        }


        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        button a {

            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }


        button:hover {
            background-color: #0056b3;
        }

        .a {
            text-align: left;
        }

        h1 {
            text-align: center;
            margin-top: 90px;
        }
    </style>
</head>

<body>
    <div class="link">

        <div class="a"><a href="./trade.php">BACK</a></div>
    </div><br>
    <div class="container">
        <h1>ADD TRADE</h1>
        <form action="" method="POST">

            <label for="">TradeName:</label>
            <input type="text" name="tname" required>

            <button type="submit" name="add">add trade</button>

        </form>
    </div>
</body>

</html>