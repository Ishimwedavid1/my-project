<?php

include './conn.php';

if (!isset($_GET['trade_id'])) {
    header("Location:/mark.php");
}
$trade_id = $_GET['trade_id'];
$trainee_id = $_GET['trainee_id'];

$sql = mysqli_query($conn, "SELECT *  FROM marks WHERE trade_id = '{$trade_id}' AND trainee_id = '{$trainee_id}'");
if ($sql == true) {
    $fetch = mysqli_fetch_assoc($sql);
    $form = '<form action="" method="POST">
                    <div>
                        <label for="module">module_name</label>
                        <input type="text" name="module_name" value="' . $fetch['module_name'] . '" >
                    </div>
                    <div>
                        <label for="formative">formative_assessment/50</label>
                        <input type="number" max="50" min="0" name="formative_assessment/50" value="' . $fetch['formative_assessment/50'] . '" >
                    </div>
                    <div>
                    <label for="summative">summative_assessment/50</label>
                    <input type="number" max="50" min="0" name="summative_assessment/50" value="' . $fetch['summative_assessment/50'] . '" >
                </div>
                    <button type="submit" name="submit">Update</button>
                </form>';
}

if (isset($_POST['submit'])) {

    $module = $_POST['module_name'];
    $formative = $_POST['formative_assessment/50'];
    $summative = $_POST['summative_assessment/50'];
    $total_marks = $formative + $summative;

    $update = "UPDATE marks SET module_name ='{$module}', `formative_assessment/50` ='{$formative}',`summative_assessment/50` ='{$summative}', `total_marks/100` = '{$total_marks}' WHERE trade_id='{$trade_id}' AND trainee_id='{$trainee_id}' ";

    $sql = mysqli_query($conn, $update);

    if ($sql) {
        header("location:./mark.php");
    } else {
        echo "Not Updated!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE MARK</title>
    <style>
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
            margin-bottom: 10px;
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        input {
            margin-right: 5px;
        }


        h1 {
            position: relative;
            text-align: center;
            top: 120px;
            left: 3%;
        }
    </style>
</head>

<body>
    <h1>UPDATE MARK</h1>
    <div class="container"><?php echo $form; ?></div>
</body>

</html>