<?php
$conn = require_once "connection.php";

$conn->removeNote($_POST['id']);
header("location: index.php");
exit();