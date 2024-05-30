<?php

include "./conn.php";
$tbody = '';
$num_rows = '';

$select =  mysqli_query($conn, "SELECT *, marks.trade_id as TradeId, marks.trainee_id as TraineeId FROM marks INNER JOIN trainees ON trainees.trainee_id = marks.trainee_id INNER JOIN trade ON trade.trade_id = marks.trade_id ");

if ($select == true) {
    $num_rows = mysqli_num_rows($select);
    if ($num_rows > 0) {
        $a = 0;
        while ($fetch = mysqli_fetch_assoc($select)) {
            $a++;
            $tbody .= '<tr>
                            <td>' . $a . '</td>
                            <td>' . $fetch['firstname'] . ' ' . $fetch['lastname'] . '</td>
                            <td>' . $fetch['tradeName'] . '</td>
                            <td>' . $fetch['module_name'] . '</td>
                            <td>' . $fetch['formative_assessment/50'] . '</td>
                            <td>' . $fetch['summative_assessment/50'] . '</td>
                            <td>' . $fetch['total_marks/100'] . '</td>
                            <td><a href="m_update.php?trade_id=' . $fetch['TradeId'] . '&trainee_id=' . $fetch['TraineeId'] . '">Update</a></td>
                            <td><a href="m_delete.php?trade_id=' . $fetch['TradeId'] . '&trainee_id=' . $fetch['TraineeId'] . '">Delete</a></td>
                        </tr>';
        }
    } else {
        $tbody .= '<tr> <td> No mark Found!  </td> </tr>';
    }
}

$num_rows = '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mark</title>
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

        .a {
            position: absolute;
            left: 78%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            position: relative;
            top: 70%;
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



        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #333;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
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
    </nav><br>
    <h1>WELCOME TO MARK CENTER </h1>

    <table border="1">
        <thead>
            <tr>

                <th>No</th>
                <th>Names</th>
                <th>Tradename</th>
                <th>ModuleName</th>
                <th>Formative_assessment/50</th>
                <th>Summative_assessment/50</th>
                <th>Total_mark/100</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $tbody; ?>
            <!-- <tr>
                <td>Total:</td>
                <td colspan="5"> <?php echo $num_rows; ?> </td>
            </tr> -->
        </tbody>
    </table><br>
    <button><a href="add.php">Add new mark</a></button>

</body>

</html>