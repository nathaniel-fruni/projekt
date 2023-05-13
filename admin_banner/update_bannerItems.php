<?php
include_once "../functions_body.php";

use main\body_element;

if(isset($_POST['submit'])) {
    $body_elementObj = new body_element();
    $update = $body_elementObj->updateBannerItem(
        $_POST['id'],
        $_POST['popis1'],
        $_POST['popis2'],
    );
    if($update) {
        header('Location: bannerItems.php?status=2');
    } else {
        header('Location: bannerItems.php?status=3');
    }
} else {
    header('Location: bannerItems.php');
}