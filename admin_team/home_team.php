<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

if (isset($_POST['submit'])) {
    $insert = $body_elementObj->insertTeamMember($_POST['id'],$_POST['meno'],$_POST['priezvisko'],$_POST['pozicia']);
    if ($insert) {
        header('Location: home_team.php?status=1');
    } else {
        echo "Nebolo možné vložiť dáta.";
    }
} else {
    include_once "html_menu_team.php";
    if(isset($_GET['status']) && $_GET['status'] == 1) {
        echo "<strong>Dáta vložené</strong><br><br>";
    }
?>

<form action="home_team.php" method="post">
    ID: <br>
    <input type="text" name="id" placeholder="ID" value=""><br>
    Meno: <br>
    <input type="text" name="meno" placeholder="Meno" value=""><br>
    Priezvisko:<br>
    <input type="text" name="priezvisko" placeholder="Priezvisko" value=""><br>
    Pozícia:<br>
    <input type="text" name="pozicia" placeholder="Pozícia" value=""><br>
    <input type="submit" name="submit" value="Vložiť"><br>
</form>
<?php
}
