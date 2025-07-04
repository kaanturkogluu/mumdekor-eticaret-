<?php
require_once __DIR__ . "/panel/classes/Autoloader.php";
$pagesObj = new PagesContent();
$p = $pagesObj->findAll(["page_name" => 'iletisim'])[0];
$seoTitle = $p['seo_title'];
$seoDescription = $p['seo_description'];
require_once __DIR__ . "/includes/navbar.php";


?>

<!-- Contact Hero Section -->

<style>
    .contact-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= $router->getBaseUrl() . 'assets/images/pages/' . $p['image'] ?>');

    }
</style>
<section class="contact-hero">
    <div class="contact-hero-content">
        <h1><?= $p['title'] ?></h1>
        <p><?= $p['sub_title'] ?></p>
    </div>
</section>

<!-- Contact Info Section -->
<section class="contact-info">
    <div class="container">
        <div class="contact-info-grid">
            <div class="contact-info-card">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Adres</h3>
                <p>MumDekor Merkez Ofis<br>
                    <?= $settings['adress'] ?>

            </div>
            <div class="contact-info-card">
                <i class="fas fa-phone"></i>
                <h3>Telefon</h3>
                <p><?= $settings['phone'] ?>

            </div>
            <div class="contact-info-card">
                <i class="fas fa-envelope"></i>
                <h3>E-posta</h3>
                <p><?= $settings['site_mail'] ?></p>
            </div>
            <div class="contact-info-card">
                <i class="fas fa-clock"></i>
                <h3>Çalışma Saatleri</h3>
                <?= $settings['calisma_saatleri'] ?>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="map-container">
            <iframe src="<?= $settings['google_map'] ?>" width="100%" height="450" style="border:0;" allowfullscreen=""
                loading="lazy"></iframe>
        </div>
    </div>
</section>

<!-- FAQ Section -->
 
<?php
require_once __DIR__."/sorular.php";

require_once __DIR__ . "/includes/footer.php";
?>