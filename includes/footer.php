<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">

            <img src="<?= $router->assets('images/' . $settings['logo']) ?>" alt="" style="border-rounded:10px">
        </div>
        <div class="footer-section">
            <h3><?=$settings['site_title']?></h3>
            <p>
                <?=$settings['footer_desc']?>
            </p>

        </div>
        <div class="footer-section">
            <h3>Hızlı Linkler</h3>
            <a href="urunler.php">Ürünler</a>
            <a href="hakkimizda.php">Hakkımızda</a>
            <a href="iletisim.php">İletişim</a>
        </div>

        <div class="footer-section">
            <h3>Sosyal Medya</h3>
            <div class="social-links">

                <a href="<?= $settings['facebook'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="<?= $settings['instagram'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>

            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 MumDekor. Tüm hakları saklıdır.</p>
    </div>
</footer>
<script src="assets/js/main.js"></script>
<script src="assets/js/cart.js"></script>
</body>

</html>