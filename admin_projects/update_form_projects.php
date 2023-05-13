<?php
include_once "../functions_body.php";

use main\body_element;

$body_elementObj = new body_element();

$project = $body_elementObj->getProject($_GET['id']);

include_once "html_menu_projects.php";
?>
<form action="update_projects.php" method="post">
    Partner:<br>
    <input type="text" name="partner" placeholder="Partner" value="<?php echo $project['partner']; ?>"><br>
    Popis:<br>
    <textarea name="popis" placeholder="Popis" rows="10" cols="25"><?php echo $project['popis']; ?></textarea><br>
    Služba:<br>
    pre SEO - seo <br>
    pre PPC reklamu - ppc <br>
    pre Sociálne siete - soc_siete <br>
    <input type="text" name="sluzba" placeholder="Služba" value="<?php echo $project['sluzba']; ?>"><br>
    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
    <input type="submit" name="submit" value="Update">
</form>
