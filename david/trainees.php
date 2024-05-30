<?php

include "./conn.php";


$sql = mysqli_query($conn, " SELECT *, trainees.trade_id as TradeId , trainees.trainee_id as TraineeId FROM trainees INNER JOIN trade ON trainees.trade_id = trade.trade_id");
$tbody = '';
$num_rows = '';


if ($sql == true) {
    $num_rows = mysqli_num_rows($sql);

    if ($num_rows > 0) {
        $a = 0;
        while ($fetch = mysqli_fetch_assoc($sql)) {
            $a++;
            $tbody .= '
            <tr>
              <td>' . $a . '</td>
              <td>' . $fetch['trainee_id'] . '</td>
              <td>' . $fetch['tradeName'] . '</td>
              <td>' . $fetch['firstname'] . '</td>
              <td>' . $fetch['lastname'] . '</td>
              <td>' . $fetch['gender'] . '</td>
              <td><a href="update.php?trade_id=' . $fetch['TradeId'] . '&trainee_id=' . $fetch['TraineeId'] . '">Update</a></td>
              <td><a href="delete.php?trade_id=' . $fetch['TradeId'] . '&trainee_id=' . $fetch['TraineeId'] . '">Delete</a></td>
                </tr>
            ';
        }
    } else {
        $tbody .= '<tr> <td colspan="5"> NO RECORD FOUND! </td> </tr>';
    }
} else {
    echo "Not selected";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAINEES</title>
    <style>
        .link {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Courier New', Courier, monospace;
            font-size: 20px;
        }

        .link a {
            position: relative;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            margin: 0 5px;
            margin-top: 30px;

        }

        .link a:hover {
            background-color: #f2f2f2;
            border-radius: 5px;
            color: black;
        }

        nav {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: left;
        }


        td {
            padding: 8px;
        }

        tbody tr:last-child td {
            font-weight: bold;
        }

        th[colspan="4"] {
            text-align: center;
        }

        button {
            position: relative;
            top: 40%;
            left: 40%;
            padding: 10px 20px;
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

        a {
            text-decoration: none;
            outline: none;
        }
    </style>
</head>

<body>
    <nav>
        <div class="link">

            <a href="./index.php">Home</a>
            <a href="./trainees.php">Trainees</a>
            <a href="./trade.php">Trades</a>
            <a href="./mark.php">Marks</a>
        </div>
    </nav><br><br>
    <h1>WELCOME TO TRAINEE CENTER </h1>

    <table border="1">
        <thead>
            <tr>

                <th>No</th>
                <th>Trainee_id</th>
                <th>TradeName</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $tbody; ?>
            <tr>
                <td>Total:</td>
                <td colspan="6"> <?php echo $num_rows; ?> </td>
            </tr>
        </tbody>
    </table><br>
    <button><a href="addtrainee.php">Add new trainee</a></button>

</body>

</html>