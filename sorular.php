<?php

$pagename = rtrim(basename($_SERVER['PHP_SELF']), '.php');
$questionObj = new Questions();
$sorular = $questionObj->get('*', "page_name = 'all' OR page_name = '$pagename'");



?>
<section class="faq-section">
    <div class="container">
        <h2 class="section-title">Sıkça Sorulan Sorular</h2>
        <div class="faq-grid">
            <?php
            foreach ($sorular as $v) {
                ?>
                <div class="faq-item">
                    <div class="faq-question">
                        <h3><?= $v['title'] ?></h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p><?= $v['description'] ?></p>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
</section>