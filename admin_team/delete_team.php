<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

if (isset($_GET['id'])) {
    $delete = $body_elementObj->deleteTeamMember($_GET['id']);
    if ($delete) {
        header('Location: teamlist.php');
    } else {
        echo "Error";
    }
} else {
    header('Location: teamlist.php');
}