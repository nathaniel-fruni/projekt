<?php
include_once "../functions_body.php";

use main\body_element;

if(isset($_POST['submit'])) {
    $body_elementObj = new body_element();
    $update = $body_elementObj->updateTeamMember(
        $_POST['id'],
        $_POST['meno'],
        $_POST['priezvisko'],
        $_POST['pozicia']
    );
    if($update) {
        header('Location: teamlist.php?status=2');
    } else {
        header('Location: teamlist.php?status=3');
    }
} else {
    header('Location: teamlist.php');
}