<?php

include "./conn.php";
$mark_id = $_SESSION['user_id'];
$tbody = '';
$num_rows = '';
$select =  mysqli_query($conn, "SELECT * FROM trade");
if ($select == true) {
    $num_rows = mysqli_num_rows($select);
    if ($num_rows > 0) {
        $a = 0;
        while ($fetch = mysqli_fetch_assoc($select)) {
            $a++;
            $tbody .= '<tr>
                            <td>' . $a . '</td>
                            <td>' . $fetch['trade_id'] . '</td>
                            <td>' . $fetch['tradeName'] . '</td>
                            <td><a href="t_update.php?id=' . $fetch['trade_id'] . '">Update</a></td>
                            <td><a href="t_delete.php?id=' . $fetch['trade_id'] . '">Delete</a></td>       
                         </tr>';
        }
    } else {
        $tbody .= '<tr> <td> No trade Found!  </td> </tr>';
    }
}
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
            top: 50%;
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
    <h1>WELCOME TO TRADE CENTER </h1>

    <table border="1">
        <thead>
            <tr>

                <th>No</th>
                <th>Trade_id</th>
                <th>Trade_Name</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $tbody; ?>
            <tr>
                <td>Total:</td>
                <td colspan="5"> <?php echo $num_rows; ?> </td>
            </tr>
        </tbody>
    </table><br>
    <button> <a href="addtrade.php">Add new trade</a></button>

</body>

</html>