<?php


session_start();
// $_SESSION['message'] = '';
// $_SESSION['msg_type'] = "";


$mysqli = new mysqli('localhost', 'root', '', 'curd') or die(mysqli_error($mysqli));
$first_name = '';
$last_name = '';
$age = '';
if (isset($_POST['save'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $mysqli->query("INSERT INTO data  (first_name,last_name,age) VALUES('$first_name','$last_name','$age')") or
        die($mysqli->error);

    $_SESSION['message'] = "Record Has Been  Saved!!!";
    $_SESSION['msg_type'] = "success";

    header("Location: index.php");
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id");
    $_SESSION['message'] = "Record Has Been  Deleted!!!";
    $_SESSION['msg_type'] = "danger";
    $_SESSION['delete'] = true;
    header("Location: index.php");
}
if (isset($_GET['edit'])) {
    $id =  $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id");
    if (count($result) == 1) {
        $row = $result->fetch_array();
        $first_name = $row['$first_name'];
        $last_name = $row['$last_name'];
        $age = $row['$age'];
    }
}
