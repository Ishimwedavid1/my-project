<?php
$conn = mysqli_connect("localhost", "root", "", "xwisdom_tvet");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$body = '';
$decision = '';
$select = mysqli_query($conn, "SELECT marks.*, trainees.firstname, trainees.lastname, trainees.gender, trade.tradeName 
                                FROM marks 
                                INNER JOIN trainees ON marks.trainee_id = trainees.trainee_id 
                                INNER JOIN trade ON marks.trade_id = trade.trade_id");
$num_rows = mysqli_num_rows($select);
if ($num_rows > 0) {
    $a = 0;
    while ($fetch = mysqli_fetch_assoc($select)) {
        $a++;
        if ($fetch['total_marks/100'] >= 70) {
            $decision = 'COMPETENT';
        } else {
            $decision = 'NOT YET COMPETENT';
        }
        $body .= '<tr>
                    <td>' . $a . '</td>
                    <td>' . $fetch['firstname'] . '</td>
                    <td>' . $fetch['lastname'] . '</td>
                    <td>' . $fetch['gender'] . '</td>
                    <td>' . $fetch['tradeName'] . '</td>
                    <td>' . $fetch['module_name'] . '</td>
                    <td>' . $fetch['formative_assessment/50'] . '</td>
                    <td>' . $fetch['summative_assessment/50'] . '</td>
                    <td>' . $fetch['total_marks/100'] . '</td>
                    <td>' . $decision . '</td>    
                </tr>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student report</title>
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

        button {
            position: relative;
            top: 70%;
            left: 95%;
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
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr.total-row td {
            background-color: #ddd;
            font-weight: bold;
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
    </nav><br><br><br>
    <table border="2">
        <thead>
            <tr>

                <th>No</th>
                <th>Firstname</th>
                <th>Lastaname</th>
                <th>Gender</th>
                <th>TradeName</th>
                <th>Module_name</th>
                <th>Formative_assessment/50</th>
                <th>Summative_assessment/50</th>
                <th>Total_marks</th>
                <th>Decision</th>



            </tr>
        </thead>
        <tbody>

            <?php
            echo $body;
            ?>
            <tr>
                <td>Total</td>
                <td colspan="8">
                    <?php echo $num_rows; ?>

                </td>
            </tr>

            <button class="print" onclick="print()">Print</button>
</body>

</html>