<?php
include './conn.php';
$trades = '';

$sql = mysqli_query($conn, "SELECT * FROM trade");
while ($fetch = mysqli_fetch_assoc($sql)) {
    $trades .= '<option value="' . $fetch['trade_id'] . '">' . $fetch['tradeName'] . '</option>';
}

if (isset($_POST['add'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $gender = $_POST['gender'];
    $trade_id = $_POST['trade_id'];

    $query = "INSERT INTO trainees(`firstname`,`lastname`,`gender`,`trade_id`) VALUES('{$firstname}','{$lastname}','{$gender}','{$trade_id}') ";
    $add = mysqli_query($conn, $query);


    if ($add) {
        header("location: ./trainees.php");
    } else {
        echo "Error to add trainee!";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add trainee</title>
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
            left: 38%;
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
            margin-bottom: 10px;
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        input {
            margin-right: 7px;
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
            position: relative;
            text-align: center;
            top: 75px;
            left: 0px;
        }

        select {
            margin-bottom: 10px;
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="link">

        <div class="a"><a href="./trainees.php">BACK</a></div>

    </div><br>
    <div class="container">
        <h1>ADD TRAINEE</h1>
        <form action="" method="POST">

            <label for="">firstname:</label>
            <input type="text" name="fname" required>
            <label for="">lastname:</label>
            <input type="text" name="lname" required>
            <label for="">gender:</label>
            <label>male</label>
            <input type="radio" name="gender" value="male" required>
            <label>female</label>
            <input type="radio" name="gender" value="female" required> <br>
            <select name="trade_id">
                <?php echo $trades; ?>
            </select>
            <button type="submit" name="add">add trainee</button>

        </form>
    </div>
</body>

</html>