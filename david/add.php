<?php
include './conn.php';
$trades = '';
$trainees = '';

$sql = mysqli_query($conn, "SELECT * FROM trade");
while ($fetch = mysqli_fetch_assoc($sql)) {
    $trades .= '<option value="' . $fetch['trade_id'] . '">' . $fetch['tradeName'] . '</option>';
}

$sql = mysqli_query($conn, "SELECT * FROM trainees");
while ($fetch = mysqli_fetch_assoc($sql)) {
    $trainees .= '<option value="' . $fetch['trainee_id'] . '">' . $fetch['firstname'] . ' ' . $fetch['lastname'] . '</option>';
}

if (isset($_POST['new'])) {
    $trainee_id = $_POST['trainee_id'];
    $trade_id = $_POST['trade_id'];
    $gender = $_POST['gender'];
    $name = $_POST['module_name'];
    $formative = $_POST['formative_assessment/50'];
    $summative = $_POST['summative_assessment/50'];
    $total_mark = $formative + $summative;

    $insert = "INSERT INTO marks (trainee_id, trade_id,`module_name`,`formative_assessment/50`,`summative_assessment/50`,`total_marks/100`) VALUES('{$trainee_id}','{$trade_id}','{$name}','{$formative}','{$summative}','{$total_mark}')";
    $add = mysqli_query($conn, $insert);

    if ($insert) {
        header("location:./mark.php");
    } else {
        echo "there is error to add mark";
    }
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        .a {
            text-align: left;
        }

        .container form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }


        form {
            position: absolute;
            max-width: 400px;
            margin: 0 auto;
            top: 25%;
            left: 37%;
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

        h1 {
            position: relative;
            text-align: center;
            top: 80px;
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
        <div class="a"><a href="./mark.php">BACK</a></div>
    </div>
    <h1>ADD MARK</h1>
    <div class="container">
        <form action="" method="POST">
            <select name="trainee_id" id="">
                <?php echo $trainees; ?>
            </select>
            <br>
            <select name="trade_id" id="">
                <?php echo $trades; ?>
            </select><br>
            <label for="">module_name</label>
            <input type="text" name="module_name" required>
            <label for="">formative_assessment/50</label>
            <input type="number" max="50" min="0" name="formative_assessment/50" required>
            <label for="">summative_assessment/50</label>
            <input type="number" max="50" min="0" name="summative_assessment/50" required>
            <button type="submit" name="new">add mark</button>
        </form>
    </div>
</body>

</html>