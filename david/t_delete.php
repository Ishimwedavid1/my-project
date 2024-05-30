<?php

include './conn.php';
if (!isset($_GET['id'])) {
    header("location: ./index.php");
}
$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE  FROM trade WHERE trade_id ='{$id}'");

if ($delete == true) {
    header("location: ./trade.php");
}
