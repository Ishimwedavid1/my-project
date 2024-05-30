<?php

include './conn.php';
if (!isset($_GET['id'])) {
    header("Location:/login.php");
}
$id = $_GET['id'];

$sql = mysqli_query($conn, "SELECT *  FROM trade WHERE trade_id = '{$id}' ");
if ($sql == true) {
    $fetch = mysqli_fetch_assoc($sql);
    $form = '<form action="" method="POST">
                    <div>
                        <label for="tname">tradeName</label>
                        <input type="text" name="tradeName" value="' . $fetch['tradeName'] . '" >
                    </div>
                    <button type="submit" name="submit">Update</button>
                </form>';
}

if (isset($_POST['submit'])) {
    $tradeName = $_POST['tradeName'];

    $update = "UPDATE trade SET tradeName ='{$tradeName}' WHERE trade_id = '{$id}'";
    $sql = mysqli_query($conn, $update);
    if ($sql) {
        header("location:./trade.php");
    } else {
        echo "Not updated";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRADE UPDATE</title>
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
            left: 2%;

        }
    </style>
</head>

<body>
    <h1>UPDATE TRADE</h1>
    <div class="container"><?php echo $form; ?></div>
</body>

</html>