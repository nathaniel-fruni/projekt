<?php
include_once "../functions_body.php";

use main\body_element;

$body_elementObj = new body_element();

if (isset($_POST['submit'])) {
    $insert = $body_elementObj->insertMail($_POST['mail']);
    if ($insert) {
        header('Location: ../index.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
}
?>