<?php

include './conn.php';
if (!isset($_GET['trade_id'])) {
    header("location: ./index.php");
}
$trade_id = $_GET['trade_id'];
$trainee_id = $_GET['trainee_id'];
$delete = mysqli_query($conn, "DELETE  FROM trainees WHERE trade_id ='{$trade_id}' and trainee_id = '{$trainee_id}'");

if ($delete == true) {
    header("location:./trainees.php");
}