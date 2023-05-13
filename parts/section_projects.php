<?php
include_once 'functions_body.php';

use main\body_element;
$body_elementObj = new body_element();
$projects = $body_elementObj->getProjects();
?>

<section class="section" id="projects">
      <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-heading">
                    <h6>Naše Projekty</h6>
                    <h2>Niektoré z našich posledných projektov</h2>
                </div>
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">Všetko</li>
                        <li data-filter=".seo">SEO</li>
                        <li data-filter=".ppc">PPC reklama</li>
                        <li data-filter=".soc_siete">Sociálne siete</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="filters-content">
                    <div class="row grid">
                        <?php
                        $body_elementObj->printProjects($projects);
                        ?>>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>