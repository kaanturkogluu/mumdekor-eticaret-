<?php
require_once __DIR__ . "/panel/classes/Autoloader.php";
require_once __DIR__ . "/includes/navbar.php";

$sliderObj = new Sliders();
$sliders = $sliderObj->get();
$campaignObj = new Campaigns();
$kampanyalar = $campaignObj->findAll(['isActive' => 1], null, 3);
$categoriesObj = new Categories();
$populerCategories = $categoriesObj->findAll(['isPopuler' => 1], null, 3);

$productsObj = new Products();
$featured = $productsObj->findAll(['isFeatured' => 1], null, 5);

?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1 class="hero-title"><?= htmlspecialchars($sliders[0]['slider_title'] ?? '') ?></h1>
        <p class="hero-description"><?= htmlspecialchars($sliders[0]['sub_title'] ?? '') ?></p>
        <div class="hero-buttons">
            <?php if ($sliders[0]['button_first_visible'] ?? false): ?>
                <a href="<?= htmlspecialchars($sliders[0]['button_first_target'] ?? '#') ?>"
                    class="cta-button primary-button">
                    <?= htmlspecialchars($sliders[0]['button_first_title'] ?? '') ?>
                </a>
            <?php endif; ?>
            <?php if ($sliders[0]['button_second_visible'] ?? false): ?>
                <a href="<?= htmlspecialchars($sliders[0]['button_second_target'] ?? '#') ?>"
                    class="cta-button secondary-button">
                    <?= htmlspecialchars($sliders[0]['button_second_title'] ?? '') ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="hero-dots">
        <?php foreach ($sliders as $index => $slider): ?>
            <button class="hero-dot <?= $index === 0 ? 'active' : '' ?>" aria-label="Slide <?= $index + 1 ?>"
                data-index="<?= $index ?>">
            </button>
        <?php endforeach; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const heroSection = document.querySelector('.hero');
        const dots = document.querySelectorAll('.hero-dot');
        const heroTitle = document.querySelector('.hero-title');
        const heroDescription = document.querySelector('.hero-description');
        const heroButtons = document.querySelector('.hero-buttons');

        // Slide içerikleri
        const slides = [
            <?php
            $total = count($sliders);
            $i = 0;
            foreach ($sliders as $slider):
                $i++;
                // Buton görünürlüğünü hem visible hem de text kontrolüne göre belirle
                $primaryButtonVisible = ($slider['button_first_visible'] == 1 && !empty($slider['button_first_title']));
                $secondaryButtonVisible = ($slider['button_second_visible'] == 1 && !empty($slider['button_second_title']));
                ?>
                                                                        {
                    background: "<?= $router->getBaseUrl() . 'assets/images/sliders/' . $slider['slider_image'] ?>",
                    title: "<?= $slider['slider_title'] ?>",
                    description: "<?= $slider['slider_sub_title'] ?>",
                    primaryButton: {
                        visible: <?= $primaryButtonVisible ? 'true' : 'false' ?>,
                        text: "<?= $slider['button_first_title'] ?>",
                        link: "<?= $slider['button_first_target'] ?>"
                    },
                    secondaryButton: {
                        visible: <?= $secondaryButtonVisible ? 'true' : 'false' ?>,
                        text: "<?= $slider['button_second_title'] ?>",
                        link: "<?= $slider['button_second_target'] ?>"
                    }
                }<?= $i < $total ? ',' : '' ?>
        <?php endforeach; ?>
        ];

        let currentIndex = 0;

        // Slide içeriğini değiştiren fonksiyon
        function changeSlide(index) {
            currentIndex = index;
            const slide = slides[index];

            // Geçiş efekti için opacity değişimi
            heroSection.style.opacity = '0';
            heroTitle.style.opacity = '0';
            heroDescription.style.opacity = '0';
            heroButtons.style.opacity = '0';

            setTimeout(() => {
                // Arka plan resmini değiştir
                heroSection.style.backgroundImage = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('${slide.background}')`;

                // İçerikleri değiştir
                heroTitle.textContent = slide.title;
                heroDescription.textContent = slide.description;

                // Butonları güncelle
                heroButtons.innerHTML = '';

                if (slide.primaryButton.visible) {
                    const primaryBtn = document.createElement('a');
                    primaryBtn.href = slide.primaryButton.link;
                    primaryBtn.className = 'cta-button primary-button';
                    primaryBtn.textContent = slide.primaryButton.text;
                    heroButtons.appendChild(primaryBtn);
                }

                if (slide.secondaryButton.visible) {
                    const secondaryBtn = document.createElement('a');
                    secondaryBtn.href = slide.secondaryButton.link;
                    secondaryBtn.className = 'cta-button secondary-button';
                    secondaryBtn.textContent = slide.secondaryButton.text;
                    heroButtons.appendChild(secondaryBtn);
                }

                // Aktif dot'u güncelle
                dots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === currentIndex);
                });

                // Opacity'yi geri getir
                heroSection.style.opacity = '1';
                heroTitle.style.opacity = '1';
                heroDescription.style.opacity = '1';
                heroButtons.style.opacity = '1';
            }, 300);
        }

        // Dot'lara tıklama olayları
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => changeSlide(index));
        });
        changeSlide(0)
    });
</script>

<style>
    .hero {
        transition: opacity 0.2s ease-in-out;
    }

    .hero-title,
    .hero-description,
    .hero-buttons {
        transition: opacity 0.3s ease-in-out;
    }
</style>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <div class="feature-grid">
            <div class="feature-item">
                <i class="fas fa-truck"></i>
                <h3><?= $settings['ucretsiz_kargo_limiti'] ?> TL Üzeri Ücretsiz Kargo</h3>
                <p>Tüm Türkiye'ye kargo imkanı</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-shield-alt"></i>
                <h3>Güvenli Alışveriş</h3>
                <p>256 Bit SSL ile güvenli ödeme</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-clock"></i>
                <h3>Hızlı Teslimat</h3>
                <p>2-3 iş gününde kargoda</p>
            </div>
            <div class="feature-item">
                <i class="fas fa-tags"></i>
                <h3>Uygun Fiyatlar</h3>
                <p>En uygun hammadde fiyatları</p>
            </div>
        </div>
    </div>
</section>

<!-- Campaigns Section -->
<section id="campaigns" class="campaigns">
    <div class="container">
        <h2 class="section-title">Güncel Kampanyalar</h2>
        <div class="campaign-grid">
            <?php


            foreach ($kampanyalar as $k) {
                ?>


                <div class="campaign-card">
                    <div class="campaign-image">
                        <img src="assets/images/kampanyalar/<?= $k['campaign_image'] ?>" alt="Başlangıç Paketi Kampanyası">
                        <!-- <div class="campaign-badge">%20 İndirim</div> -->
                    </div>
                    <div class="campaign-content">
                        <h3><?= $k['campaign_title'] ?></h3>
                        <p><?= $k['campaign_subtitle'] ?></p>
                        <a href="kampanya-detay.php?id=<?= $k['id'] ?>" class="campaign-link">Detayları Gör</a>
                    </div>
                </div> <?php } ?>

        </div>
    </div>
</section>

<!-- Popular Categories -->

<?php
if (!empty($populerCategories)) {
    ?>
    <section class="popular-categories">
        <div class="container">
            <h2 class="section-title">Popüler Kategoriler</h2>
            <div class="category-grid">
                <?php
                foreach ($populerCategories as $k) {
                    ?>
                    <div class="category-card">
                        <div class="category-image">
                            <img src="<?= $router->getPanelUrl() . 'assets/images/categories/' . $k['category_image'] ?>"
                                alt="Mum Bazları">
                        </div>
                        <div class="category-content">
                            <h3> <?= $k['category_name'] ?> </h3>
                            <p><?= $k['category_sub_description'] ?></p>
                            <a href="katalog.php?kat=<?= $k['id'] ?>" class="category-link">Ürünleri İncele</a>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
            <div class="view-all">
                <a href="urunler.php" class="view-all-link">Tüm Kategorileri Gör</a>
            </div>
        </div>
    </section>
    <?php
}
?>


<?php
if (!empty($featured)) {
    ?>
    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">Öne Çıkan Ürünler</h2>
            <div class="products-container">


                <?php
                foreach ($featured as $k) {
                    ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?= $router->getBaseUrl() . 'assets/images/urunler/' . $k['images'] ?> "
                                alt="<?= $k['title'] ?>">
                            <!-- <div class="product-overlay">
                                <button class="add-to-cart">Sepete Ekle</button>
                            </div> -->
                        </div>
                        <div class="product-info">

                            <h3>
                                <a href="urundetay.php?id=<?= $k['id'] ?>" style="text-decoration: none; color :#333">

                                    <?= $k['title'] ?>
                                </a>
                            </h3>
                            <p class="price">₺<?= number_format($k['price'], 2, '.', ',') ?></p>
                            <!-- <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div> -->
                        </div>
                    </div>
                    <?php
                }
                ?>



            </div>
        </div>
    </section>
<?php } ?>



<!-- FAQ Section -->

<?php
require_once __DIR__ . "/sorular.php";
?>
<!-- Footer -->
<?php
require_once __DIR__ . "/includes/footer.php";
?>