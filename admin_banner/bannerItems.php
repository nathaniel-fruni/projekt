<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

$banner = $body_elementObj->getBanner();

include_once "html_menu_banner.php";

if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br><br>";
}
?>

<ul>
    <?php
    foreach ($banner as $key=>$bannerItem) {
        echo "<li>ID: ". $bannerItem['id'] . "<br> Prvý popis : " . $bannerItem['popis1'] . "<br> Druhý popis : " .$bannerItem['popis2'] ." ".
            '<a href="delete_bannerItem.php?id='.$bannerItem['id'].'">Delete</a> /
             <a href="update_form_banner.php?id='.$bannerItem['id'].'">Update</a>
            </li>
            <br>';
    }
    ?>
</ul>