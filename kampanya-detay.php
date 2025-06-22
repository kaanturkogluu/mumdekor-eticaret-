<?php
require_once __DIR__ . '/panel/classes/Autoloader.php';
require_once __DIR__ . '/includes/navbar.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// $campaignObj = new Campaigns();
// $campaign = $campaignObj->getCampaignDetail($id);

$pageTitle = $campaign ? $campaign['campaign_title'] . ' - ' . $settings['site_title'] : 'Kampanya Bulunamadı - ' . $settings['site_title'];
$pageDescription = $campaign ? $campaign['campaign_description'] : '';


$campaign = 
    [
        'id' => 1,
        'campaign_title' => 'Yaz İndirimi',
        'campaign_subtitle' => 'Tüm ürünlerde %20 indirim!',
        'campaign_description' => 'Yaz boyunca geçerli büyük indirim fırsatını kaçırmayın.',
        'campaign_image' => 'kampanya1.jpg',
        'valid_until' => '2024-08-31',
    ];
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
                <?php if (!empty($campaign['campaign_image'])): ?>
                    <div class="campaign-detail-image">
                        <img src="<?= $router->getBaseUrl() ?>assets/images/campaigns/<?= $campaign['campaign_image'] ?>" alt="<?= htmlspecialchars($campaign['campaign_title']) ?>">
                    </div>
                <?php endif; ?>
                <div class="campaign-detail-content">
                    <h2><?= htmlspecialchars($campaign['campaign_title']) ?></h2>
                    <?php if (!empty($campaign['campaign_subtitle'])): ?>
                        <p class="campaign-detail-subtitle"> <?= htmlspecialchars($campaign['campaign_subtitle']) ?> </p>
                    <?php endif; ?>
                    <div class="campaign-detail-description">
                        <?= $campaign['campaign_description'] ?>
                    </div>
                    <?php if (!empty($campaign['valid_until'])): ?>
                        <div class="campaign-detail-date">
                            <i class="far fa-clock"></i>
                            Son Geçerlilik: <?= date('d.m.Y', strtotime($campaign['valid_until'])) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="no-campaign-detail">
                <i class="fas fa-exclamation-circle"></i>
                <h2>Kampanya Bulunamadı</h2>
                <p>Aradığınız kampanya mevcut değil veya yayından kaldırılmış olabilir.</p>
                <a href="kampanyalar.php" class="cta-button">Tüm Kampanyalar</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<style>
.page-hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?= $router->getBaseUrl() ?>assets/images/campaigns-hero.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
    padding: 80px 0;
    margin-bottom: 40px;
}
.campaign-detail-section {
    padding: 40px 0;
}
.campaign-detail-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: flex-start;
    border: 1px solid #eee;
    margin-bottom: 40px;
}
.campaign-detail-image {
    flex: 1 1 350px;
    min-width: 320px;
    max-width: 450px;
    height: 320px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fafafa;
}
.campaign-detail-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.campaign-detail-content {
    flex: 2 1 400px;
    padding: 35px 25px;
}
.campaign-detail-content h2 {
    font-size: 2rem;
    margin-bottom: 18px;
    color: #333;
    font-weight: 600;
}
.campaign-detail-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 18px;
    font-weight: 500;
}
.campaign-detail-description {
    color: #555;
    margin-bottom: 25px;
    line-height: 1.7;
    font-size: 1.05rem;
}
.campaign-detail-date {
    margin-top: 18px;
    color: #888;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 7px;
}
.no-campaign-detail {
    text-align: center;
    padding: 60px 0;
}
.no-campaign-detail i {
    font-size: 3rem;
    color: #e74c3c;
    margin-bottom: 18px;
}
.no-campaign-detail h2 {
    font-size: 1.7rem;
    margin-bottom: 12px;
    color: #333;
}
.no-campaign-detail p {
    color: #666;
    margin-bottom: 18px;
}
.no-campaign-detail .cta-button {
    display: inline-block;
    background: var(--primary-color, #4a90e2);
    color: #fff;
    padding: 12px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}
.no-campaign-detail .cta-button:hover {
    background: var(--primary-color-dark, #357abd);
}
</style> 