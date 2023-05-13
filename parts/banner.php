<?php
include_once 'functions_body.php';

use main\body_element;
$body_elementObj = new body_element();
$banner = $body_elementObj->getBanner();
?>

<div class="main-banner header-text" id="top">
    <div class="Modern-Slider">
        <?php
        $body_elementObj->printBanner($banner);
        ?>
    </div>
</div>
<div class="scroll-down scroll-to-section"><a href="#about"><i class="fa fa-arrow-down"></i></a></div>
