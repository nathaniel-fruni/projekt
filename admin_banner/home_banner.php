<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

if (isset($_POST['submit'])) {
    $insert = $body_elementObj->insertBannerItem($_POST['id'],$_POST['popis1'],$_POST['popis2']);
    if ($insert) {
        header('Location: home_banner.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
} else {
    include_once "html_menu_banner.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }
    ?>

    <form action="home_banner.php" method="post">
        ID: <br>
        <input type="text" name="id" placeholder="ID" value=""><br>
        Prvý popis:<br>
        <input type="text" name="popis1" placeholder="Prvý popis" value=""><br>
        Druhý popis:<br>
        <input type="text" name="popis2" placeholder="Druhý popis" value=""><br>
        <input type="submit" name="submit" value="Vložiť"><br>
    </form>
    <?php
}