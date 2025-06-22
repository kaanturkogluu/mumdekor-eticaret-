<?php

require_once __DIR__."/panel/classes/Autoloader.php";
require_once __DIR__ . "/includes/navbar.php";
$categoriesObj = new Categories();
$productsPageObj = new PagesContent();
$page = $productsPageObj->findAll(['page_name'=>'urunler'])[0];
$categories = $categoriesObj->get();

?>

<!-- Products Hero Section -->

<style>
    .page-hero{
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?=$router->getBaseUrl().'assets/images/pages/'.$page['image']?>');
 
    }
</style>
<section class="page-hero">
    <div class="container">
        <h1><?= $page['title'] ?></h1>
        <p><?= $page['sub_title'] ?></p>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="categories-grid">
            <?php
            foreach ($categories as $category) {

                ?>
                <div class="category-card">
                    <div class="category-image">
                        <img src="<?= $router->assets('images/categories/' . $category['category_image']) ?>"
                            style="background-size: contain;" alt="Mum Bazları">
                    </div>
                    <div class="category-content">
                        <h2><?= $category['category_name'] ?></h2>
                        <p><?= $category['category_sub_description'] ?></p>
                        <a href="katalog.php?kat=<?=$category['id']?>" class="category-link">Ürünleri Gör</a>
                    </div>
                </div>
                <?php
            }
            ?>


        </div>
    </div>
</section>
<?php

require_once __DIR__."/sorular.php";
?>

<!-- Footer -->
<?php
require_once __DIR__ . "/includes/footer.php";
?>