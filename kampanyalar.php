<?php 
require_once __DIR__."/panel/classes/Autoloader.php";
require_once __DIR__."/includes/navbar.php";

// Geçici kampanya verileri
$default_campaigns = [
    [
        'id' => 1,
        'campaign_title' => 'Yaz İndirimi',
        'campaign_subtitle' => 'Tüm ürünlerde %20 indirim!',
        'campaign_description' => 'Yaz boyunca geçerli büyük indirim fırsatını kaçırmayın.',
        'campaign_image' => 'kampanya1.jpg',
        'valid_until' => '2024-08-31',
        'products' => [
            [
                'id' => 101,
                'title' => 'Kokulu Mum - Limon',
                'image' => 'urun1.jpg',
                'price' => 120
            ],
            [
                'id' => 102,
                'title' => 'Kokulu Mum - Lavanta',
                'image' => 'urun2.jpg',
                'price' => 110
            ]
        ]
    ],
    [
        'id' => 2,
        'campaign_title' => 'Kargo Bedava',
        'campaign_subtitle' => '250 TL ve üzeri alışverişlerde kargo ücretsiz!',
        'campaign_description' => 'Sadece bu ay geçerli kampanya ile kargonuz bizden.',
        'campaign_image' => 'kampanya2.jpg',
        'valid_until' => '2024-07-15',
        'products' => [
            [
                'id' => 103,
                'title' => 'Dekoratif Mum Seti',
                'image' => 'urun3.jpg',
                'price' => 250
            ]
        ]
    ],
    [
        'id' => 3,
        'campaign_title' => 'Yeni Ürün Lansmanı',
        'campaign_subtitle' => 'Yeni koleksiyonumuz şimdi satışta!',
        'campaign_description' => 'Yepyeni ürünlerimizi keşfedin ve avantajlı fiyatlardan yararlanın.',
        'campaign_image' => 'kampanya3.jpg',
        'valid_until' => '2024-09-10',
        'products' => [
            [
                'id' => 104,
                'title' => 'Büyük Boy Soya Mum',
                'image' => 'urun4.jpg',
                'price' => 180
            ],
            [
                'id' => 105,
                'title' => "Mini Mum 3'lü Paket",
                'image' => 'urun5.jpg',
                'price' => 90
            ]
        ]
    ],
];
$campaigns = $default_campaigns;

// Sayfa başlığı ve meta bilgileri
$pageTitle = "Kampanyalar - " . $settings['site_title'];
$pageDescription = "Mumdekor kampanyaları ve özel fırsatlar. En güncel kampanyalarımızı kaçırmayın!";
?>

<!-- Kampanyalar Hero Section -->
<section class="page-hero">
    <div class="container">
        <h1>Kampanyalar</h1>
        <p>En güncel kampanyalarımız ve özel fırsatlar</p>
    </div>
</section>

<!-- Kampanyalar Listesi -->
<section class="campaigns-section">
    <div class="container">
        <?php if (!empty($campaigns)): ?>
            <div class="campaigns-grid">
                <?php foreach ($campaigns as $campaign): ?>
                    <div class="campaign-card">
                        <?php if (!empty($campaign['campaign_image'])): ?>
                            <div class="campaign-image">
                                <img src="<?= $router->getBaseUrl() ?>assets/images/campaigns/<?= $campaign['campaign_image'] ?>" 
                                     alt="<?= htmlspecialchars($campaign['campaign_title']) ?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="campaign-content">
                            <h2><?= htmlspecialchars($campaign['campaign_title']) ?></h2>
                            
                            <?php if (!empty($campaign['campaign_subtitle'])): ?>
                                <p class="campaign-subtitle"><?= htmlspecialchars($campaign['campaign_subtitle']) ?></p>
                            <?php endif; ?>
                            
                            <div class="campaign-description">
                                <?= $campaign['campaign_description'] ?>
                            </div>
                            
                            <a href="kampanya-detay.php?id=<?= $campaign['id'] ?>" class="campaign-button">
                                Detayları Gör
                            </a>
                            
                            <?php if (!empty($campaign['valid_until'])): ?>
                                <div class="campaign-date">
                                    <i class="far fa-clock"></i>
                                    Son Geçerlilik: <?= date('d.m.Y', strtotime($campaign['valid_until'])) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-campaigns">
                <i class="fas fa-gift"></i>
                <h2>Şu an aktif kampanya bulunmuyor</h2>
                <p>Yeni kampanyalarımızdan haberdar olmak için bizi takip etmeye devam edin!</p>
                <a href="<?= $router->getBaseUrl() ?>" class="cta-button">Ana Sayfaya Dön</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__."/includes/footer.php"; ?>

<style>
/* Kampanyalar Hero Section */
.page-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url('<?= $router->getBaseUrl() ?>assets/images/campaigns-hero.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
    padding: 80px 0;
    margin-bottom: 40px;
}

.page-hero h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    font-weight: 600;
}

.page-hero p {
    font-size: 1.2rem;
    opacity: 0.9;
}

/* Kampanyalar Grid */
.campaigns-section {
    padding: 40px 0;
}

.campaigns-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

/* Kampanya Kartı */
.campaign-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.campaign-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
}

.campaign-image {
    width: 100%;
    height: 220px;
    overflow: hidden;
    position: relative;
}

.campaign-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.campaign-card:hover .campaign-image img {
    transform: scale(1.05);
}

.campaign-content {
    padding: 25px;
}

.campaign-content h2 {
    font-size: 1.5rem;
    margin-bottom: 12px;
    color: #333;
    font-weight: 600;
    line-height: 1.3;
}

.campaign-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 15px;
    font-weight: 500;
}

.campaign-description {
    color: #555;
    margin-bottom: 20px;
    line-height: 1.6;
    font-size: 0.95rem;
}

.campaign-button {
    display: inline-block;
    background: var(--primary-color, #4a90e2);
    color: #fff;
    padding: 12px 24px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
    text-align: center;
    border: none;
    cursor: pointer;
}

.campaign-button:hover {
    background: var(--primary-color-dark, #357abd);
    transform: translateY(-2px);
}

.campaign-date {
    margin-top: 20px;
    color: #888;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.campaign-date i {
    color: var(--primary-color, #4a90e2);
}

/* Kampanya Yok */
.no-campaigns {
    text-align: center;
    padding: 60px 20px;
    background: #f9f9f9;
    border-radius: 12px;
    margin: 20px 0;
}

.no-campaigns i {
    font-size: 4rem;
    color: var(--primary-color, #4a90e2);
    margin-bottom: 20px;
}

.no-campaigns h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 15px;
    font-weight: 600;
}

.no-campaigns p {
    color: #666;
    margin-bottom: 25px;
    font-size: 1.1rem;
}

.no-campaigns .cta-button {
    display: inline-block;
    background: var(--primary-color, #4a90e2);
    color: #fff;
    padding: 12px 30px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 500;
}

.no-campaigns .cta-button:hover {
    background: var(--primary-color-dark, #357abd);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .page-hero {
        padding: 60px 0;
    }

    .page-hero h1 {
        font-size: 2rem;
    }

    .campaigns-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .campaign-image {
        height: 200px;
    }

    .campaign-content {
        padding: 20px;
    }

    .campaign-content h2 {
        font-size: 1.3rem;
    }

    .campaign-subtitle {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .page-hero {
        padding: 40px 0;
    }

    .page-hero h1 {
        font-size: 1.8rem;
    }

    .page-hero p {
        font-size: 1rem;
    }

    .campaign-image {
        height: 180px;
    }

    .campaign-button {
        width: 100%;
        padding: 10px 20px;
    }
}
</style>