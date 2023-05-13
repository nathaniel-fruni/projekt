<?php
include_once "../functions_body.php";

use main\body_element;

if(isset($_POST['submit'])) {
    $body_elementObj = new body_element();
    $update = $body_elementObj->updateProject(
        $_POST['id'],
        $_POST['partner'],
        $_POST['popis'],
        $_POST['sluzba']
    );
    if($update) {
        header('Location: projects.php?status=2');
    } else {
        header('Location: projects.php?status=3');
    }
} else {
    header('Location: projects.php');
}
