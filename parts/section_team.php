<?php
include_once 'functions_body.php';

use main\body_element;
$body_elementObj = new body_element();
$teamItems = $body_elementObj->getTeam();
?>

<section class="section" id="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h6>Náš Tím</h6>
                    <h2>mladí a talentovaní členovia</h2>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                <div class="owl-carousel owl-theme">
                    <?php
                    $body_elementObj->printTeam($teamItems);
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>