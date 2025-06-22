<?php
require_once __DIR__ . "/panel/classes/Autoloader.php";



// Ürün ID'sini URL'den al
$product_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$productObj = new Products();
$pdata = $productObj->getProductsForList($product_id)[0];

if (!$pdata || empty($pdata)) {

    $session->setFlash('warning', "Aradığınız Ürün Satışta Değil");
    $router->forcedRedirect($router->getBaseUrl() . "index.php");
}

$seoTitle = $pdata['seotitle'];
$seoDescription=$pdata['seodescription'];
require_once __DIR__ . "/includes/navbar.php";

// seotitle
// seodescription

// Örnek ürün verisi (gerçek uygulamada veritabanından gelecek)
$product = [
    'id' => $pdata['id'],
    'name' => $pdata['title'],
    'category' => $pdata['category_name'],
    'price' => $pdata['price'],
    'old_price' => $pdata['old_price'],
    'discount' => $pdata['discount'],
    'description' => $pdata['description'],
    'long_description' => $pdata['long_description'],
    'features' => json_decode($pdata['features']),
    'images' => [
        'main' => $pdata['images'],
        'gallery' =>
            json_decode($pdata['sub_images'])

    ],
    'stock' => $pdata['stok'],
    'color' => $pdata['color_title'],
    'smell' => $pdata['smell_title'],
    'color_code' => $pdata['color_code'],

    'material' => 'Doğal soya mumu'
];

$related_products = $productObj->getSmiliarProductsForList($product_id);
// İlgili ürünler
 
?>

<!-- Product Detail Section -->
<section class="product-detail-section">
    <div class="container">
        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="index.php">Ana Sayfa</a>
            <span>/</span>
            <a href="urunler.php">Ürünler</a>
            <span>/</span>
            <a href="katalog.php?kat"><?= $product['category'] ?></a>
            <span>/</span>
            <span><?= $product['name'] ?></span>
        </div>

        <!-- Product Main Content -->
        <div class="product-detail-container">
            <!-- Product Images -->
            <div class="product-images">
                <div class="main-image">
                    <img src="<?= $router->getBaseUrl() . 'assets/images/urunler/' . $product['images']['main'] ?>"
                        alt="<?= $product['name'] ?>" id="mainProductImage">
                </div>
                <div class="image-gallery">
                    <div class="gallery-item active" onclick="changeImage('<?= $product['images']['main'] ?>')">
                        <img src="<?= $router->getBaseUrl() . 'assets/images/urunler/' . $product['images']['main'] ?>"
                            alt="<?= $product['name'] ?>">
                    </div>
                    <?php foreach ($product['images']['gallery'] as $image): ?>
                        <div class="gallery-item" onclick="changeImage('<?= $image ?>')">
                            <img src="<?= $router->getBaseUrl() . 'assets/images/urunler/' . $image ?>"
                                alt="<?= $product['name'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <div class="product-header">
                    <h1><?= $product['name'] ?></h1>
                    <div class="product-category"><?= $product['category'] ?></div>
                </div>

                <!-- Rating -->
                <!-- <div class="product-rating">
                    <div class="stars">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <i class="fas fa-star <?= $i <= $product['rating'] ? 'filled' : '' ?>"></i>
                        <?php endfor; ?>
                    </div>
                    <span class="rating-text"><?= $product['rating'] ?> (<?= $product['reviews'] ?>
                        değerlendirme)</span>
                </div> -->

                <!-- Price -->
                <div class="product-price">
                    <?php if (!empty($product['discount'])): ?>
                        <?php if ($product['old_price']): ?>
                            <span class="old-price"><?= number_format($product['old_price'], 2) ?> ₺</span>
                        <?php endif; ?>
                        <span class="current-price"><?= number_format($product['price'], 2) ?> ₺</span>
                        <span class="discount-badge">%<?= $product['discount'] ?> İndirim</span>
                    <?php else: ?>
                        <span class="current-price"><?= number_format($product['price'], 2) ?> ₺</span>
                    <?php endif; ?>
                </div>

                <!-- Description -->
                <div class="product-description">
                    <p><?= $product['description'] ?></p>
                </div>

                <!-- Features -->
                <div class="product-features">
                    <h3>Özellikler</h3>
                    <ul>
                        <?php foreach ($product['features'] as $feature): ?>
                            <li><i class="fas fa-check"></i> <?= $feature ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Product Details -->
                <div class="product-details">


                    <div class="detail-item">
                        <span class="label">Malzeme:</span>
                        <span class="value"><?= $product['material'] ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="label">Koku:</span>
                        <span class="value"><?= $product['smell'] ?></span>
                    </div>
                    <div class="detail-item">
                        <span class="label">Renk:</span>
                        <span style="color:<?= $product['color_code'] ?>" class="value"><?= $product['color'] ?>
                    </div>

                </div>

                <!-- Stock Status -->
                <div class="stock-status">
                    <?php if ($product['stock'] > 0): ?>
                        <span class="in-stock"><i class="fas fa-check-circle"></i> Stokta (<?= $product['stock'] ?>
                            adet)</span>
                    <?php else: ?>
                        <span class="out-of-stock"><i class="fas fa-times-circle"></i> Stokta Yok</span>
                    <?php endif; ?>
                </div>

                <!-- Add to Cart -->
                <div class="add-to-cart-section">
                    <div class="quantity-selector">
                        <label for="quantity">Adet:</label>
                        <div class="quantity-controls">
                            <button type="button" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="<?= $product['stock'] ?>">
                            <button type="button" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>
                    <button class="add-to-cart-btn add-to-cart" 
                        data-product-id="<?= $product['id'] ?>"
                        data-product-name="<?= htmlspecialchars($product['name'], ENT_QUOTES) ?>"
                        data-product-price="<?= $product['price'] ?>"
                        data-product-image="<?= $product['images']['main'] ?>">
                        <i class="fas fa-shopping-cart"></i>
                        Sepete Ekle
                    </button>
                    <!-- <button class="buy-now-btn" onclick="buyNow(<?= $product['id'] ?>)">
                        <i class="fas fa-bolt"></i>
                        Hemen Al
                    </button> -->
                </div>

                <!-- Social Share -->
                <div class="social-share">
                    <span>Paylaş:</span>
                    <a href="#" onclick="shareOnFacebook()"><i class="fab fa-facebook"></i></a>
                    <a href="#" onclick="shareOnInstagram()"><i class="fab fa-instagram"></i></a>
                    <a href="#" onclick="shareOnTwitter()"><i class="fab fa-twitter"></i></a>
                    <a href="#" onclick="shareOnWhatsApp()"><i class="fab fa-whatsapp"></i></a>
                    <a href="#" id="copyLinkBtn" onclick="copyLink(event)" title="Linki Kopyala"><i
                            class="fas fa-share"></i></a>
                    <span id="copyTooltip" style="display:none; margin-left:8px; color:#1a8917; font-size:0.95em;">Link
                        kopyalandı!</span>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="product-tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="showTab('description')">Açıklama</button>
                <!-- <button class="tab-btn" onclick="showTab('reviews')">Değerlendirmeler</button> -->
                <button class="tab-btn" onclick="showTab('shipping')">Kargo & İade</button>
            </div>

            <div class="tab-content">
                <div id="description" class="tab-panel active">
                    <h3>Ürün Açıklaması</h3>
                    <p><?= $product['long_description'] ?></p>

                    <h4>Kullanım Önerileri</h4>
                    <ul>
                        <li>İlk kullanımda 2-3 saat yanmasına izin verin</li>
                        <li>Düz bir yüzeyde kullanın</li>
                        <li>Çocuklardan uzak tutun</li>
                        <li>Yanarken üzerini kapatmayın</li>
                    </ul>
                </div>

                <!-- <div id="reviews" class="tab-panel">
                    <h3>Müşteri Değerlendirmeleri</h3>
                    <div class="reviews-summary">
                        <div class="overall-rating">
                            <div class="rating-number"><?= $product['rating'] ?></div>
                            <div class="rating-stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?= $i <= $product['rating'] ? 'filled' : '' ?>"></i>
                                <?php endfor; ?>
                            </div>
                            <div class="total-reviews"><?= $product['reviews'] ?> değerlendirme</div>
                        </div>
                    </div>

              
                    <div class="review-item">
                        <div class="review-header">
                            <div class="reviewer-name">Ayşe K.</div>
                            <div class="review-rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                            </div>
                            <div class="review-date">2 gün önce</div>
                        </div>
                        <div class="review-text">
                            "Harika bir ürün! Lavanta kokusu çok güzel ve uzun süre yanıyor. Kesinlikle tavsiye ederim."
                        </div>
                    </div>
                </div> -->

                <div id="shipping" class="tab-panel">
                    <h3>Kargo & İade Bilgileri</h3>
                    <div class="shipping-info">
                        <h4>Kargo Bilgileri</h4>
                        <ul>
                            <li>Ücretsiz kargo (<?= $settings['ucretsiz_kargo_limiti'] ?>₺ üzeri alışverişlerde)</li>
                            <li>1-3 iş günü içinde kargoya verilir</li>
                            <li>Türkiye geneli teslimat</li>
                        </ul>

                        <h4>İade Koşulları</h4>
                        <ul>
                            <li>14 gün içinde iade hakkı</li>
                            <li>Kullanılmamış ürünlerde iade kabul edilir</li>
                            <li>Kargo ücreti müşteriye aittir</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="related-products">
            <h2>Benzer Ürünler</h2>
            <div class="related-products-grid">
                <?php foreach ($related_products as $related): ?>
                    <div class="related-product-card">
                        <div class="related-product-image">
                            <img src="<?=$router->getBaseUrl().'assets/images/urunler/'. $related['images'] ?>" alt="<?= $related['title'] ?>">
                        </div>
                        <div class="related-product-info">
                            <h3><?= $related['title'] ?></h3>
                            <div class="related-product-category"><?= $related['category_name'] ?></div>
                            <div class="related-product-price"><?= number_format($related['price'], 2) ?> ₺</div>
                            <a href="urundetay.php?id=<?= $related['id'] ?>" class="view-product-btn">Ürünü İncele</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<style>
    /* Product Detail Styles */
    .product-detail-section {
        padding: 120px 0 4rem;
        background-color: var(--light-background);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    /* Breadcrumb */
    .breadcrumb {
        margin-bottom: 2rem;
        font-size: 0.9rem;
    }

    .breadcrumb a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .breadcrumb span {
        margin: 0 0.5rem;
        color: #666;
    }

    /* Product Container */
    .product-detail-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 3rem;
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    /* Product Images */
    .product-images {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .main-image {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
    }

    .main-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .main-image:hover img {
        transform: scale(1.05);
    }

    .image-gallery {
        display: flex;
        gap: 0.5rem;
    }

    .gallery-item {
        width: 80px;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .gallery-item.active {
        border-color: var(--primary-color);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Product Info */
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .product-header h1 {
        font-size: 2rem;
        color: var(--text-color);
        margin-bottom: 0.5rem;
    }

    .product-category {
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Rating */
    .product-rating {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stars {
        display: flex;
        gap: 0.2rem;
    }

    .stars i {
        color: #ddd;
        font-size: 1.1rem;
    }

    .stars i.filled {
        color: #ffd700;
    }

    .rating-text {
        color: #666;
        font-size: 0.9rem;
    }

    /* Price */
    .product-price {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin: 1rem 0;
    }

    .old-price {
        color: #999;
        text-decoration: line-through;
        font-size: 1.1rem;
    }

    .current-price {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .discount-badge {
        background: #ff4757;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    /* Features */
    .product-features {
        background: var(--light-background);
        padding: 1.5rem;
        border-radius: 10px;
    }

    .product-features h3 {
        margin-bottom: 1rem;
        color: var(--text-color);
    }

    .product-features ul {
        list-style: none;
        padding: 0;
    }

    .product-features li {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        color: #666;
    }

    .product-features i {
        color: var(--primary-color);
        font-size: 0.8rem;
    }

    /* Product Details */
    .product-details {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
    }

    .detail-item {


        align-items: center;
    }

    .detail-item .label {
        font-weight: 600;
        color: var(--text-color);
    }

    .detail-item .value {
        color: #666;
    }

    /* Stock Status */
    .stock-status {
        padding: 1rem;
        border-radius: 8px;
        font-weight: 600;
    }

    .in-stock {
        color: #28a745;
        background: #d4edda;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .out-of-stock {
        color: #dc3545;
        background: #f8d7da;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Add to Cart */
    .add-to-cart-section {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .quantity-controls button {
        background: #f8f9fa;
        border: none;
        padding: 0.8rem 1rem;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .quantity-controls button:hover {
        background: #e9ecef;
    }

    .quantity-controls input {
        border: none;
        padding: 0.8rem;
        text-align: center;
        width: 60px;
        font-size: 1rem;
    }

    .add-to-cart-btn,
    .buy-now-btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .add-to-cart-btn {
        background: var(--primary-color);
        color: white;
    }

    .add-to-cart-btn:hover {
        background: var(--accent-color);
        transform: translateY(-2px);
    }

    .buy-now-btn {
        background: var(--accent-color);
        color: white;
    }

    .buy-now-btn:hover {
        background: #ff1493;
        transform: translateY(-2px);
    }

    /* Social Share */
    .social-share {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .social-share span {
        color: #666;
        font-weight: 600;
    }

    .social-share a {
        color: var(--primary-color);
        font-size: 1.2rem;
        transition: color 0.3s ease;
    }

    .social-share a:hover {
        color: var(--accent-color);
    }

    /* Product Tabs */
    .product-tabs {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 3rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .tab-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 2px solid #eee;
    }

    .tab-btn {
        background: none;
        border: none;
        padding: 1rem 2rem;
        cursor: pointer;
        font-weight: 600;
        color: #666;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
    }

    .tab-btn.active {
        color: var(--primary-color);
        border-bottom-color: var(--primary-color);
    }

    .tab-panel {
        display: none;
    }

    .tab-panel.active {
        display: block;
    }

    .tab-panel h3 {
        margin-bottom: 1rem;
        color: var(--text-color);
    }

    .tab-panel h4 {
        margin: 1.5rem 0 0.5rem;
        color: var(--text-color);
    }

    .tab-panel ul {
        margin-left: 1.5rem;
        color: #666;
    }

    .tab-panel li {
        margin-bottom: 0.5rem;
    }

    /* Reviews */
    .reviews-summary {
        display: flex;
        align-items: center;
        gap: 2rem;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: var(--light-background);
        border-radius: 10px;
    }

    .overall-rating {
        text-align: center;
    }

    .rating-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .rating-stars {
        margin: 0.5rem 0;
    }

    .total-reviews {
        color: #666;
        font-size: 0.9rem;
    }

    .review-item {
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 1.5rem;
        margin-bottom: 1rem;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--text-color);
    }

    .review-date {
        color: #666;
        font-size: 0.9rem;
    }

    .review-text {
        color: #666;
        line-height: 1.6;
    }

    /* Related Products */
    .related-products {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .related-products h2 {
        margin-bottom: 2rem;
        color: var(--text-color);
        text-align: center;
    }

    .related-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .related-product-card {
        border: 1px solid #eee;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .related-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .related-product-image {
        height: 200px;
        overflow: hidden;
    }

    .related-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .related-product-card:hover .related-product-image img {
        transform: scale(1.1);
    }

    .related-product-info {
        padding: 1.5rem;
    }

    .related-product-info h3 {
        margin-bottom: 0.5rem;
        color: var(--text-color);
        font-size: 1.1rem;
    }

    .related-product-category {
        color: var(--primary-color);
        font-size: 0.9rem;
        margin-bottom: 0.1rem;
    }

    .related-product-price {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .view-product-btn {
        display: inline-block;
        padding: 0.8rem 1.5rem;
        background: var(--primary-color);
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background 0.3s ease;
        text-align: center;
        width: 100%;
    }

    .view-product-btn:hover {
        background: var(--accent-color);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .product-detail-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .product-details {
            grid-template-columns: 1fr;
        }

        .tab-buttons {
            flex-direction: column;
        }

        .related-products-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .main-image img {
            height: 300px;
        }

        .product-header h1 {
            font-size: 1.5rem;
        }

        .current-price {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .product-detail-section {
            padding: 100px 0 2rem;
        }

        .product-detail-container {
            padding: 1rem;
        }

        .main-image img {
            height: 250px;
        }

        .related-products-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // Image Gallery
    function changeImage(imageSrc) {
        document.getElementById('mainProductImage').src = '<?= $router->getBaseUrl() . 'assets/images/urunler/' ?>' + imageSrc;

        // Update active state
        document.querySelectorAll('.gallery-item').forEach(item => {
            item.classList.remove('active');
        });
        event.target.closest('.gallery-item').classList.add('active');
    }

    // Quantity Controls
    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }

    function increaseQuantity() {
        const input = document.getElementById('quantity');
        const max = parseInt(input.getAttribute('max'));
        if (input.value < max) {
            input.value = parseInt(input.value) + 1;
        }
    }

    // Tab System
    function showTab(tabName) {
        // Hide all tabs
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.classList.remove('active');
        });

        // Remove active class from all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('active');
        });

        // Show selected tab
        document.getElementById(tabName).classList.add('active');

        // Add active class to clicked button
        event.target.classList.add('active');
    }

    // Cart Functions
    function addToCart(productId) {
        const quantity = document.getElementById('quantity').value;
        // Add to cart logic here
        alert(`${quantity} adet ürün sepete eklendi!`);
    }

    function buyNow(productId) {
        const quantity = document.getElementById('quantity').value;
        // Buy now logic here
        alert('Satın alma sayfasına yönlendiriliyorsunuz...');
    }

    // Social Share Functions
    function shareOnFacebook() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
    }

    function shareOnInstagram() {
        alert('Instagram paylaşımı için ürün ekran görüntüsü alabilirsiniz.');
    }

    function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank');
    }

    function shareOnWhatsApp() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://wa.me/?text=${title}%20${url}`, '_blank');
    }

    function copyLink(e) {
        e.preventDefault();
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(function () {
            const tooltip = document.getElementById('copyTooltip');
            tooltip.style.display = 'inline';
            setTimeout(() => { tooltip.style.display = 'none'; }, 1500);
        });
    }
</script>

<?php
require_once __DIR__ . "/includes/footer.php";
?>