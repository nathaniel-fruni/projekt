<?php
include_once "../functions_body.php";
use main\body_element;

$body_elementObj = new body_element();

$projects = $body_elementObj->getProjects();

include_once "html_menu_projects.php";

if(isset($_GET['status']) && $_GET['status'] == 2) {
    echo "<strong>Value updated correctly</strong><br><br>";
} elseif (isset($_GET['status']) && $_GET['status'] == 3) {
    echo "<strong>Value cannot be updated</strong><br><br>";
}
?>

<ul>
    <?php
    foreach ($projects as $key=>$project) {
        echo "<li>ID: ". $project['id'] . "<br> Partner: " . $project['partner'] . "<br> Popis: " .$project['popis']. "  <br> Služba: " .$project['sluzba'] ." ".
            '<a href="delete_projects.php?id='.$project['id'].'">Delete</a> /
             <a href="update_form_projects.php?id='.$project['id'].'">Update</a>
            </li>
            <br>';
    }
    ?>
</ul>