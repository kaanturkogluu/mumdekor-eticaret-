<?php
 

$router = Router::getInstance();
$session = Session::getInstance();
require_once __DIR__ . "/../panel/includes/notification.php";
$settingsObejct = new Settings();
$settings = $settingsObejct->get()[0];

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($seoTitle) ? htmlspecialchars($seoTitle) : $settings['site_title'] ?></title>
    <meta name="description" content="<?= isset($seoDescription) ? htmlspecialchars($seoDescription) : $settings['site_description'] ?>">
    <link rel="icon" href="<?= $router->assets('images/' . $settings['favicon']) ?>" type="image/png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <a href="index.php">
                        <h1>MumDekor</h1>
                    </a>
                </div>
                <nav class="nav-menu">
                    <button class="mobile-menu-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <ul class="nav-list">
                        <li><a href="index.php">Ana Sayfa</a></li>
                        <li><a href="urunler.php">Ürünler</a></li>
                        <li><a href="hakkimizda.php">Hakkımızda</a></li>
                        <li><a href="iletisim.php">İletişim</a></li>
                    </ul>
                </nav>
                <div class="header-icons">
                    <a href="sepet.php" class="cart-icon">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>
                </div>
            </div>
        </div>
    </header>