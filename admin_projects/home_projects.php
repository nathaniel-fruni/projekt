<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

if (isset($_POST['submit'])) {
    $insert = $body_elementObj->insertProject($_POST['partner'],$_POST['popis'],$_POST['sluzba']);
    if ($insert) {
        header('Location: home_projects.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
} else {
    include_once "html_menu_projects.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }
    ?>

    <form action="home_projects.php" method="post">
        Partner: <br>
        <input type="text" name="partner" placeholder="Partner" value=""><br>
        Popis:<br>
        <textarea name="popis" placeholder="Popis" rows="10" cols="25"></textarea><br>
        Služba:<br>
        pre SEO - seo <br>
        pre PPC reklamu - ppc <br>
        pre Sociálne siete - soc_siete <br>
        <input type="text" name="sluzba" placeholder="Služba" value=""><br>
        <input type="submit" name="submit" value="Vložiť"><br>
    </form>
    <?php
}