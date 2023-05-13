<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

$teamItems = $body_elementObj->getTeam();

include_once "html_menu_team.php";

if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br><br>";
}
?>

<ul>
    <?php
    foreach ($teamItems as $key=>$TeamItem) {
        echo "<li>ID: ". $TeamItem['id'] . ", Meno: " . $TeamItem['meno'] . " " .$TeamItem['priezvisko']. "  Pozícia: " .$TeamItem['pozicia'] ." ".
            '<a href="delete_team.php?id='.$TeamItem['id'].'">Delete</a> /
             <a href="update_form_team.php?id='.$TeamItem['id'].'">Update</a>
            </li>';
    }
    ?>
</ul>
