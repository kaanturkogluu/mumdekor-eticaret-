<?php
require_once __DIR__."/panel/classes/Autoloader.php";
require_once __DIR__ . "/includes/navbar.php";

$sliderObj = new Sliders();
$sliders = $sliderObj->get();


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
                <h3><?=$settings['ucretsiz_kargo_limiti']?> TL Üzeri Ücretsiz Kargo</h3>
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
            <div class="campaign-card">
                <div class="campaign-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Başlangıç Paketi Kampanyası">
                    <div class="campaign-badge">%20 İndirim</div>
                </div>
                <div class="campaign-content">
                    <h3>Başlangıç Paketi</h3>
                    <p>Mum yapımına başlamak için ihtiyacınız olan her şey tek pakette!</p>
                    <a href="baslangic-paketleri.html" class="campaign-link">Detayları Gör</a>
                </div>
            </div>
            <div class="campaign-card">
                <div class="campaign-image">
                    <img src="assets/images/sliders/hero.jpg" alt="İnci Tozu Mum Kampanyası">
                    <div class="campaign-badge">Yeni Ürün</div>
                </div>
                <div class="campaign-content">
                    <h3>İnci Tozu Mum</h3>
                    <p>Renkli ve kokulu inci tozu mumlar şimdi satışta!</p>
                    <a href="inci-tozu.html" class="campaign-link">Detayları Gör</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Categories -->
<section class="popular-categories">
    <div class="container">
        <h2 class="section-title">Popüler Kategoriler</h2>
        <div class="category-grid">
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Mum Bazları">
                </div>
                <div class="category-content">
                    <h3>Mum Bazları</h3>
                    <p>Soyawax, Parafin, Jel Mum ve daha fazlası</p>
                    <a href="soyawax.html" class="category-link">Ürünleri İncele</a>
                </div>
            </div>
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Başlangıç Paketleri">
                </div>
                <div class="category-content">
                    <h3>Başlangıç Paketleri</h3>
                    <p>Mum yapımına başlamak için ideal paketler</p>
                    <a href="baslangic-paketleri.html" class="category-link">Ürünleri İncele</a>
                </div>
            </div>
            <div class="category-card">
                <div class="category-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Esanslar">
                </div>
                <div class="category-content">
                    <h3>Esanslar</h3>
                    <p>100cc, 250cc ve 1L esanslar</p>
                    <a href="esanslar.html" class="category-link">Ürünleri İncele</a>
                </div>
            </div>
        </div>
        <div class="view-all">
            <a href="urunler.html" class="view-all-link">Tüm Kategorileri Gör</a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="container">
        <h2 class="section-title">Öne Çıkan Ürünler</h2>
        <div class="products-container">
            <div class="product-card">
                <div class="product-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Soyawax 1kg">
                    <div class="product-overlay">
                        <button class="add-to-cart">Sepete Ekle</button>
                    </div>
                </div>
                <div class="product-info">
                    <h3>Soyawax 1kg</h3>
                    <p class="price">₺149.99</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="assets/images/sliders/hero.jpg" alt="İnci Tozu Mum">
                    <div class="product-overlay">
                        <button class="add-to-cart">Sepete Ekle</button>
                    </div>
                </div>
                <div class="product-info">
                    <h3>İnci Tozu Mum 1kg</h3>
                    <p class="price">₺179.99</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Esans 100cc">
                    <div class="product-overlay">
                        <button class="add-to-cart">Sepete Ekle</button>
                    </div>
                </div>
                <div class="product-info">
                    <h3>Lavanta Esansı 100cc</h3>
                    <p class="price">₺89.99</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="assets/images/sliders/hero.jpg" alt="Ahşap Fitil">
                    <div class="product-overlay">
                        <button class="add-to-cart">Sepete Ekle</button>
                    </div>
                </div>
                <div class="product-info">
                    <h3>Ahşap Fitil 50'li Set</h3>
                    <p class="price">₺49.99</p>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- FAQ Section -->

<?php 
require_once __DIR__."/sorular.php";
?>
<!-- Footer -->
<?php
require_once __DIR__ . "/includes/footer.php";
?>