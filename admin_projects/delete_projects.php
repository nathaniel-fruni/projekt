<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

if (isset($_GET['id'])) {
    $delete = $body_elementObj->deleteProject($_GET['id']);
    if ($delete) {
        header('Location: projects.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: projects.php');
}
