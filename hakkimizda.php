<?php 
require_once __DIR__."/panel/classes/Autoloader.php";
$pageObj = new PagesContent();
$p = $pageObj->findAll(['page_name'=>'hakkimizda'])[0];
$seoTitle = $p['seo_title'];
$seoDescription = $p['seo_description'];
require_once __DIR__."/includes/navbar.php";


?>

    <!-- About Hero Section -->
    <section class="about-hero">
        <div class="about-hero-content">
            <h1>Hakkımızda</h1>
            <p>Mum yapımı tutkusu ve kaliteli hizmet anlayışıyla yanınızdayız</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <div class="section-header">
                        <span class="section-subtitle">Hakkımızda</span>
                        <h2><?=$p['title']?></h2>
                    </div>
                    <div class="about-description">
                   <?php  echo $p['sub_title']; ?>
                    </div>
                    <!-- <div class="about-features">
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Kaliteli Hammaddeler</h4>
                                <p>En kaliteli ve güvenilir hammaddeler</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Uzman Desteği</h4>
                                <p>7/24 teknik destek ve danışmanlık</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Hızlı Teslimat</h4>
                                <p>Aynı gün kargo imkanı</p>
                            </div>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Uygun Fiyatlar</h4>
                                <p>Rekabetçi fiyatlar ve özel indirimler</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="about-image">
                    <div class="image-wrapper">
                        <img src="<?=$router->getBaseUrl().'/assets/images/pages/'.$p['image']?>" alt="MumDekor Atölyesi">
                        <!-- <div class="image-overlay">
                            <div class="overlay-content">
                                <span class="experience">3+</span>
                                <p>Yıllık Deneyim</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="mission-vision">
        <div class="container">
            <div class="mission-vision-grid">
                <div class="mission">
                    <h3>Misyonumuz</h3>
                    <p>Mum yapımına ilgi duyan herkese kaliteli hammaddeler ve gerekli ekipmanları sağlayarak, yaratıcılıklarını ortaya çıkarmalarına yardımcı olmak.</p>
                </div>
                <div class="vision">
                    <h3>Vizyonumuz</h3>
                    <p>Türkiye'nin en güvenilir mum yapım malzemeleri tedarikçisi olmak ve mum yapımı kültürünü yaygınlaştırmak.</p>
                </div>
            </div>
        </div>
    </section> -->

    <section class="values-section">
        <div class="container">
            <div class="section-header center">
                <span class="section-subtitle">Değerlerimiz</span>
                <h2>Neden Bizi Tercih Etmelisiniz?</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Kalite</h3>
                    <p>En kaliteli hammaddeleri kullanarak, müşterilerimize en iyi ürünleri sunmayı hedefliyoruz.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Güven</h3>
                    <p>Müşterilerimizle güvene dayalı, uzun vadeli ilişkiler kurmayı önemsiyoruz.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Yenilikçilik</h3>
                    <p>Sürekli kendimizi geliştiriyor, yeni ürünler ve çözümler sunuyoruz.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Müşteri Odaklılık</h3>
                    <p>Müşterilerimizin ihtiyaçlarını anlıyor, beklentilerini aşmayı hedefliyoruz.</p>
                </div>
            </div>
        </div>
    </section>

    <?php 
require_once __DIR__."/includes/footer.php";
?>