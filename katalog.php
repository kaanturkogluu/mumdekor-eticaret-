<?php
require_once __DIR__."/panel/classes/Autoloader.php";
$kategeorId = intval($_GET['kat']);
$katalogObj = new Categories();

$katalog = $katalogObj->findById($kategeorId);
if (!$katalog || empty($katalog)) {
    $session->setFlash('warning', "Aradığınız  Kategori Bulunamadı");
    $router->forcedRedirect($router->getBaseUrl() . "index.php");
}
$productObj = new Products();
$urunler = $productObj->get(["title", "price", "description", "stok", "id", "images"], ["category" => $kategeorId]);

// SEO variables for dynamic head
$seoTitle = $katalog['category_name'] . ' | MumDekor';
$seoDescription = $katalog['category_sub_description'];

require_once __DIR__ . "/includes/navbar.php";

?>

<style>
    .page-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= $router->assets('images/categories/' . $katalog['category_page_image']) ?>');


    }
</style>
<!-- Category Hero Section -->
<section class="page-hero">
    <div class="container">
        <h1><?= $katalog['category_name'] ?></h1>
        <p><?= $katalog['category_sub_description'] ?></p>
    </div>
</section>

<!-- Products Section -->
<section class="products-section">
    <div class="container">
      

        <?php if (empty($urunler)): ?>
            <div class="row" style="margin: 60px 0;">
                <div class="col-12 mx-auto" style="text-align:center; font-size:1.3rem; color:#444; font-weight:500;">
                    <div class="bounce-cricket" style="font-size:2.5rem; margin-bottom:10px;">🦗</div> <br>
                    Görünüşe göre burada bir şey yok.
                </div>
            </div>
        <?php else: ?>
            <div class="filters">
            <div class="filter-group">
                <label for="sort">Sırala:</label>
                <select id="sort" class="filter-select">
                    <option value="popular">En Popüler</option>
                    <option value="price-low">Fiyat (Düşükten Yükseğe)</option>
                    <option value="price-high">Fiyat (Yüksekten Düşüğe)</option>
                    <option value="new">En Yeni</option>
                </select>
            </div>
        </div>
            <div class="products-container">
                <?php
                foreach ($urunler as $u) {
                ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= $router->getBaseUrl() . "assets/images/urunler/" . $u['images'] ?>"
                            alt="<?= $u['title'] ?>" style="background-size: cover;">
                        <div class="product-overlay">
                            <button class="add-to-cart" 
                                data-product-id="<?= $u['id'] ?>"
                                data-product-name="<?= htmlspecialchars($u['title'], ENT_QUOTES) ?>"
                                data-product-price="<?= $u['price'] ?>"
                                data-product-image="<?= $u['images'] ?>">
                                Sepete Ekle
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3>
                            <a href="<?= $router->getBaseUrl() . "urundetay.php?id=" . $u['id'] ?>">
                                <?= $u['title'] ?> </a>
                        </h3>
                        <div class="product-price">₺ <?= number_format($u['price'], 2, ".", ",") ?></div>
                        <div class="product-description">
                            <?= mb_strlen($u['description']) > 100
                                ? mb_substr($u['description'], 0, 100) . "..."
                                : $u['description']; ?>
                        </div>
                        <?php $stok = $u['stok']; ?>
                        <div class="<?= $stok >= 1 ? 'product-stock ' : 'product-outstock ' ?>">
                            <?= $u['stok'] >= 1 ? 'Stokta' : 'Tükendi' ?>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        <?php endif; ?>
        <style>
            .product-outstock {
                font-size: 0.9rem;
                color: #b8312c;
                font-weight: 500;
            }

            a {
                text-decoration: none;
                color: #333333;
            }

            @keyframes bounce {
                0%, 100% { transform: translateY(0); }
                20% { transform: translateY(-18px); }
                40% { transform: translateY(0); }
                60% { transform: translateY(-10px); }
                80% { transform: translateY(0); }
            }
            .bounce-cricket {
                display: inline-block;
                animation: bounce 1.6s infinite;
            }
        </style>

    </div>
</section>

<!-- Footer -->
<?php
require_once __DIR__ . "/includes/footer.php";
?>