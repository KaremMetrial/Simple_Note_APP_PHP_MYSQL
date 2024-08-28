<?php

$conn = require_once "connection.php";
$id = $_POST['id'] ?? "";
if ($id) {
    $conn->updateNote($id, $_POST);
}else {
    $conn->addNote($_POST);
}
header("location: index.php");
exit();