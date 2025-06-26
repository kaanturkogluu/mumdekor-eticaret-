<?php
require_once __DIR__ . '/panel/classes/Autoloader.php';


$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$campaignObj = new Campaigns();
$campaign = $campaignObj->findById($id);
$alturunler = $campaignObj->getCampaingProductById(json_decode($campaign['products']));

$seoTitle = $campaign['seo_title'];
$seoDescription = $campaign['seo_description'];
require_once __DIR__ . '/includes/navbar.php';



?>

<section class="page-hero">
    <div class="container">
        <h1><?= $campaign ? htmlspecialchars($campaign['campaign_title']) : 'Kampanya Bulunamadı' ?></h1>
        <?php if ($campaign && !empty($campaign['campaign_subtitle'])): ?>
            <p><?= htmlspecialchars($campaign['campaign_subtitle']) ?></p>
        <?php endif; ?>
    </div>
</section>


<section class="campaign-detail-section">
    <div class="container">
        <?php if ($campaign): ?>
            <div class="campaign-detail-card">
                <div class="campaign-main-content">
                    <!-- Sol taraf - Kampanya görseli -->
                    <div class="campaign-image-wrapper">
                        <?php if (!empty($campaign['campaign_image'])): ?>
                            <div class="campaign-detail-image">
                                <img src="<?= $router->getBaseUrl() ?>assets/images/kampanyalar/<?= $campaign['campaign_image'] ?>"
                                    alt="<?= htmlspecialchars($campaign['campaign_title']) ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Orta kısım - Kampanya bilgileri -->
                    <div class="campaign-info-wrapper">
                        <div class="campaign-detail-content">
                            <h2 class="campaign-title"><?= htmlspecialchars($campaign['campaign_title']) ?></h2>
                            <?php if (!empty($campaign['campaign_subtitle'])): ?>
                                <p class="campaign-subtitle"><?= htmlspecialchars($campaign['campaign_subtitle']) ?></p>
                            <?php endif; ?>
                            <div class="campaign-description">
                                <?= $campaign['campaign_description'] ?>
                            </div>
                            <?php if (!empty($campaign['valid_until'])): ?>
                                <div class="campaign-validity">
                                    <i class="far fa-clock"></i>
                                    <span>Son Geçerlilik: <?= date('d.m.Y', strtotime($campaign['valid_until'])) ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Sağ taraf - Paket içeriği -->
                    <?php if (!empty($alturunler)): ?>
                        <div class="package-content-wrapper">
                            <div class="package-content-card">
                                <h3 class="package-title">
                                    <i class="fas fa-box-open"></i>
                                    Paket İçeriği
                                </h3>
                                <div class="products-grid">
                                    <?php foreach ($alturunler as $a): ?>

                                        <div class="product-item">
                                            <div class="product-image">
                                                <img src="<?= $router->getBaseUrl() . 'assets/images/urunler/' . $a['images'] ?>"
                                                    alt="<?= htmlspecialchars($a['title']) ?>">
                                            </div>
                                            <div class="product-title">
                                                <a href="urundetay.php?id=<?= $a['id'] ?>">

                                                    <?= htmlspecialchars($a['title']) ?>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="action-section">
                <a href="kampanyalar.php" class="cta-button">
                    <i class="fas fa-arrow-left"></i>
                    Tüm Kampanyalara Göz At
                </a>
            </div>

        <?php else: ?>
            <div class="no-campaign-found">
                <div class="error-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h2>Kampanya Bulunamadı</h2>
                <p>Aradığınız kampanya mevcut değil veya yayından kaldırılmış olabilir.</p>
                <a href="kampanyalar.php" class="cta-button secondary">
                    <i class="fas fa-home"></i>
                    Tüm Kampanyalar
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    :root {
        --primary-color: #8A2BE2;
        --secondary-color: #D8BFD8;
        --accent-color: #FF69B4;
        --text-color: #333;
        --text-light: #666;
        --light-text: #fff;
        --background-color: #fff;
        --light-background: #f9f5ff;
        --border-color: #e0e0e0;
        --border-radius: 8px;
        --transition: all 0.3s ease;
        --danger-color: #e74c3c;
        --primary-dark: #6a1b9a;
    }

    .page-hero {
        padding: 2rem 0;
        background: linear-gradient(135deg, #2d7be5 0%, #1a5bb8 100%);
    }

    .campaign-detail-section {
        padding: 2rem 0;
        background: linear-gradient(135deg, var(--light-background) 0%, rgba(216, 191, 216, 0.1) 100%);
        min-height: 60vh;
    }

    .campaign-detail-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow:
            0 20px 40px rgba(138, 43, 226, 0.08),
            0 8px 16px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(216, 191, 216, 0.2);
        margin-bottom: 2rem;
        transition: var(--transition);
    }

    .campaign-detail-card:hover {
        transform: translateY(-4px);
        box-shadow:
            0 32px 64px rgba(138, 43, 226, 0.12),
            0 16px 32px rgba(0, 0, 0, 0.06);
    }

    .campaign-main-content {
        display: grid;
        grid-template-columns: 1fr 1.5fr 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    /* Kampanya Görseli */
    .campaign-image-wrapper {
        position: relative;
    }

    .campaign-detail-image {
        width: 100%;
        aspect-ratio: 4/3;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 12px 24px rgba(138, 43, 226, 0.15);
        border: 3px solid rgba(216, 191, 216, 0.4);
    }

    .campaign-detail-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 70%, rgba(138, 43, 226, 0.1));
        z-index: 1;
    }

    .campaign-detail-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .campaign-detail-image:hover img {
        transform: scale(1.05);
    }

    /* Kampanya Bilgileri */
    .campaign-info-wrapper {
        padding: 0 1rem;
    }

    .campaign-title {
        font-size: 2.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .campaign-subtitle {
        font-size: 1.2rem;
        color: var(--text-light);
        margin-bottom: 1.5rem;
        font-weight: 500;
        line-height: 1.4;
    }

    .campaign-description {
        font-size: 1.05rem;
        line-height: 1.7;
        color: var(--text-color);
        margin-bottom: 2rem;
    }

    .campaign-description p {
        margin-bottom: 1rem;
    }

    .campaign-validity {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, var(--accent-color) 0%, #ff1493 100%);
        color: var(--light-text);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(255, 105, 180, 0.3);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.02);
        }
    }

    .campaign-validity i {
        font-size: 1.1rem;
    }

    /* Paket İçeriği */
    .package-content-wrapper {
        position: relative;
    }

    .package-content-card {
        background: rgba(249, 245, 255, 0.8);
        border: 2px solid rgba(138, 43, 226, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        backdrop-filter: blur(5px);
        position: relative;
        overflow: hidden;
    }

    .package-content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    }

    .package-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        text-align: center;
        justify-content: center;
    }

    .package-title i {
        font-size: 1.4rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 1rem;
    }

    .product-item {
        background: var(--background-color);
        border-radius: 12px;
        padding: 1rem 0.5rem;
        text-align: center;
        transition: var(--transition);
        border: 2px solid rgba(138, 43, 226, 0.1);
        position: relative;
        overflow: hidden;
    }

    .product-item::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(138, 43, 226, 0.05), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
        opacity: 0;
    }

    .product-item:hover::before {
        opacity: 1;
        animation: shimmer 1.5s ease-in-out;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }

        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }

    .product-item:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 8px 20px rgba(138, 43, 226, 0.15);
        border-color: var(--primary-color);
    }

    .product-image {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.75rem;
        background: rgba(248, 250, 252, 0.5);
        border-radius: 8px;
    }

    .product-image img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .product-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2d7be5;
        line-height: 1.3;
        word-break: break-word;
    }

    /* Action Section */
    .action-section {
        text-align: center;
        margin-top: 2rem;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
        color: var(--light-text);
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 8px 20px rgba(138, 43, 226, 0.3);
        transition: var(--transition);
        border: none;
        position: relative;
        overflow: hidden;
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .cta-button:hover::before {
        left: 100%;
    }

    .cta-button:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 12px 28px rgba(138, 43, 226, 0.4);
        color: var(--light-text);
        text-decoration: none;
    }

    .cta-button.secondary {
        background: linear-gradient(135deg, var(--text-light) 0%, #475569 100%);
        box-shadow: 0 8px 20px rgba(100, 116, 139, 0.3);
    }

    .cta-button.secondary:hover {
        box-shadow: 0 12px 28px rgba(100, 116, 139, 0.4);
    }

    /* Error State */
    .no-campaign-found {
        text-align: center;
        padding: 4rem 2rem;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 24px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .error-icon {
        font-size: 4rem;
        color: var(--danger-color);
        margin-bottom: 1.5rem;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(-5px);
        }
    }

    .no-campaign-found h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-color);
        margin-bottom: 1rem;
    }

    .no-campaign-found p {
        font-size: 1.1rem;
        color: var(--text-light);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .campaign-main-content {
            grid-template-columns: 1fr 1.2fr 1fr;
            gap: 2rem;
        }

        .campaign-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 992px) {
        .campaign-main-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .campaign-detail-card {
            padding: 2rem;
        }

        .package-content-wrapper {
            order: 3;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .campaign-detail-section {
            padding: 1rem 0;
        }

        .campaign-detail-card {
            padding: 1.5rem;
            margin: 0 1rem 1.5rem 1rem;
        }

        .campaign-title {
            font-size: 1.8rem;
        }

        .campaign-subtitle {
            font-size: 1.1rem;
        }

        .products-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
        }

        .product-item {
            padding: 0.75rem 0.25rem;
        }

        .product-image {
            height: 50px;
        }

        .product-title {
            font-size: 0.8rem;
        }

        .cta-button {
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .campaign-title {
            font-size: 1.5rem;
        }

        .campaign-validity {
            padding: 0.625rem 1.25rem;
            font-size: 0.9rem;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .package-content-card {
            padding: 1rem;
        }

        .no-campaign-found {
            padding: 3rem 1rem;
        }

        .error-icon {
            font-size: 3rem;
        }

        .no-campaign-found h2 {
            font-size: 1.5rem;
        }
    }
</style>

<style>
    .campaign-detail-section {
        padding: 2rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e3f2fd 100%);
        min-height: 60vh;
    }

    .campaign-detail-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        padding: 2.5rem;
        box-shadow:
            0 20px 40px rgba(45, 123, 229, 0.08),
            0 8px 16px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.2);
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .campaign-detail-card:hover {
        transform: translateY(-4px);
        box-shadow:
            0 32px 64px rgba(45, 123, 229, 0.12),
            0 16px 32px rgba(0, 0, 0, 0.06);
    }

    .campaign-main-content {
        display: grid;
        grid-template-columns: 1fr 1.5fr 1fr;
        gap: 2.5rem;
        align-items: start;
    }

    /* Kampanya Görseli */
    .campaign-image-wrapper {
        position: relative;
    }

    .campaign-detail-image {
        width: 100%;
        aspect-ratio: 4/3;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        box-shadow: 0 12px 24px rgba(45, 123, 229, 0.15);
        border: 3px solid rgba(255, 255, 255, 0.8);
    }

    .campaign-detail-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 70%, rgba(45, 123, 229, 0.1));
        z-index: 1;
    }

    .campaign-detail-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .campaign-detail-image:hover img {
        transform: scale(1.05);
    }

    /* Kampanya Bilgileri */
    .campaign-info-wrapper {
        padding: 0 1rem;
    }

    .campaign-title {
        font-size: 2.2rem;
        font-weight: 800;
        background: linear-gradient(135deg, #2d7be5 0%, #1a5bb8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
        line-height: 1.2;
    }

    .campaign-subtitle {
        font-size: 1.2rem;
        color: #64748b;
        margin-bottom: 1.5rem;
        font-weight: 500;
        line-height: 1.4;
    }

    .campaign-description {
        font-size: 1.05rem;
        line-height: 1.7;
        color: #475569;
        margin-bottom: 2rem;
    }

    .campaign-description p {
        margin-bottom: 1rem;
    }

    .campaign-validity {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(255, 107, 53, 0.3);
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.02);
        }
    }

    .campaign-validity i {
        font-size: 1.1rem;
    }

    /* Paket İçeriği */
    .package-content-wrapper {
        position: relative;
    }

    .package-content-card {
        background: rgba(248, 250, 252, 0.8);
        border: 2px solid rgba(45, 123, 229, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        backdrop-filter: blur(5px);
        position: relative;
        overflow: hidden;
    }

    .package-content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #2d7be5 0%, #1a5bb8 100%);
    }

    .package-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.3rem;
        font-weight: 700;
        color: #2d7be5;
        margin-bottom: 1.5rem;
        text-align: center;
        justify-content: center;
    }

    .package-title i {
        font-size: 1.4rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
        gap: 1rem;
    }

    .product-item {
        background: white;
        border-radius: 12px;
        padding: 1rem 0.5rem;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid rgba(45, 123, 229, 0.1);
        position: relative;
        overflow: hidden;
    }

    .product-item::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(45, 123, 229, 0.05), transparent);
        transform: rotate(45deg);
        transition: all 0.6s ease;
        opacity: 0;
    }

    .product-item:hover::before {
        opacity: 1;
        animation: shimmer 1.5s ease-in-out;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%) translateY(-100%) rotate(45deg);
        }

        100% {
            transform: translateX(100%) translateY(100%) rotate(45deg);
        }
    }

    .product-item:hover {
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 8px 20px rgba(45, 123, 229, 0.15);
        border-color: #2d7be5;
    }

    .product-image {
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.75rem;
        background: rgba(248, 250, 252, 0.5);
        border-radius: 8px;
    }

    .product-image img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    .product-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #2d7be5;
        line-height: 1.3;
        word-break: break-word;
    }

    /* Action Section */
    .action-section {
        text-align: center;
        margin-top: 2rem;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        /* background: linear-gradient(135deg, #2d7be5 0%, #1a5bb8 100%); */
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 8px 20px rgba(45, 123, 229, 0.3);
        transition: all 0.3s ease;
        border: none;
        position: relative;
        overflow: hidden;
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s ease;
    }

    .cta-button:hover::before {
        left: 100%;
    }

    .cta-button:hover {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 12px 28px rgba(45, 123, 229, 0.4);
        color: white;
        text-decoration: none;
    }

    .cta-button.secondary {
        background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        box-shadow: 0 8px 20px rgba(100, 116, 139, 0.3);
    }

    .cta-button.secondary:hover {
        box-shadow: 0 12px 28px rgba(100, 116, 139, 0.4);
    }

    /* Error State */
    .no-campaign-found {
        text-align: center;
        padding: 4rem 2rem;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 24px;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .error-icon {
        font-size: 4rem;
        color: #ef4444;
        margin-bottom: 1.5rem;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-10px);
        }

        60% {
            transform: translateY(-5px);
        }
    }

    .no-campaign-found h2 {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
    }

    .no-campaign-found p {
        font-size: 1.1rem;
        color: #64748b;
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .campaign-main-content {
            grid-template-columns: 1fr 1.2fr 1fr;
            gap: 2rem;
        }

        .campaign-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 992px) {
        .campaign-main-content {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .campaign-detail-card {
            padding: 2rem;
        }

        .package-content-wrapper {
            order: 3;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .campaign-detail-section {
            padding: 1rem 0;
        }

        .campaign-detail-card {
            padding: 1.5rem;
            margin: 0 1rem 1.5rem 1rem;
        }

        .campaign-title {
            font-size: 1.8rem;
        }

        .campaign-subtitle {
            font-size: 1.1rem;
        }

        .products-grid {
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
        }

        .product-item {
            padding: 0.75rem 0.25rem;
        }

        .product-image {
            height: 50px;
        }

        .product-title {
            font-size: 0.8rem;
        }

        .cta-button {
            padding: 0.875rem 1.5rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .campaign-title {
            font-size: 1.5rem;
        }

        .campaign-validity {
            padding: 0.625rem 1.25rem;
            font-size: 0.9rem;
        }

        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .package-content-card {
            padding: 1rem;
        }

        .no-campaign-found {
            padding: 3rem 1rem;
        }

        .error-icon {
            font-size: 3rem;
        }

        .no-campaign-found h2 {
            font-size: 1.5rem;
        }
    }
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>