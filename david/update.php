<?php

include './conn.php';
if (!isset($_GET['trade_id'])) {
    header("Location:./trainees.php");
}
$trade_id = $_GET['trade_id'];
$trainee_id = $_GET['trainee_id'];

$sql = mysqli_query($conn, "SELECT *  FROM trainees WHERE trade_id = '{$trade_id}' AND trainee_id = '{$trainee_id}'");
if ($sql == true) {
    $fetch = mysqli_fetch_assoc($sql);
    $form = '<form action="" method="POST">
                    <div>
                        <label for="fname">firstname</label>
                        <input type="text" name="firstname" value="' . $fetch['firstname'] . '" >
                    </div>
                    <div>
                        <label for="lname">lastname</label>
                        <input type="text" name="lastname" value="' . $fetch['lastname'] . '" >
                    </div>
                    <div>
                    <label for="gender">gender</label>
                    <input type="text" name="gender" value="' . $fetch['gender'] . '" >
                </div>
                    <button type="submit" name="submit">Update</button>
                </form>';
}

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $gender = $_POST['gender'];




    $sql = mysqli_query($conn, " UPDATE trainees SET firstname = '{$fname}', lastname = '{$lname}', gender = '{$gender}' WHERE trade_id='{$trade_id}' AND trainee_id='{$trainee_id}'");

    if ($sql == true) {
        header("location:./trainees.php");
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
    <title>update trainee</title>
</head>
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

<body>

    <div class="container">
        <h1>UPDATE TRAINEE</h1>
        <?php echo $form; ?>
    </div>
</body>

</html>