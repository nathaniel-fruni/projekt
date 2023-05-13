<?php
include_once "../functions_body.php";

use main\body_element;

$body_elementObj = new body_element();

$teamItem = $body_elementObj->getTeamMember($_GET['id']);

include_once "html_menu_team.php";
?>
<form action="update_team.php" method="post">
    Meno:<br>
    <input type="text" name="meno" placeholder="Meno" value="<?php echo $teamItem['meno']; ?>"><br>
    Priezvisko:<br>
    <input type="text" name="priezvisko" placeholder="Priezvisko" value="<?php echo $teamItem['priezvisko']; ?>"><br>
    Pozícia:<br>
    <input type="text" name="pozicia" placeholder="Pozícia" value="<?php echo $teamItem['pozicia']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $teamItem['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>