<?php
require_once __DIR__ . "/panel/classes/Autoloader.php";
require_once __DIR__ . "/includes/navbar.php";

$freecargominprice = $settings['ucretsiz_kargo_limiti'];
$csrf = CSRF::getInstance();
?>

<style>
    .cart-page-container {
        display: flex;
        flex-direction: column;
        min-height: 70vh;
        /* Footer'ı aşağıda tutmak için */
    }

    .cart-section {
        flex: 1;
    }

    #empty-cart-message {
        display: none;
        /* Başlangıçta gizli */
        text-align: center;
        padding: 80px 20px;
        background-color: #f9f9f9;
        border-radius: 12px;
        border: 1px dashed #ddd;
        margin: 40px auto;
        max-width: 600px;
        transition: opacity 0.3s ease-in-out;
    }

    #empty-cart-message.visible {
        display: block;
        opacity: 1;
    }

    .empty-cart-icon {
        font-size: 4rem;
        color: #6c757d;
        margin-bottom: 20px;
    }

    .empty-cart-text {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        margin-bottom: 25px;
    }

    .continue-shopping-btn {
        text-decoration: none;
        background-color: #343a40;
        color: white;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
        display: inline-block;
    }

    .continue-shopping-btn:hover {
        background-color: #23272b;
        transform: translateY(-2px);
    }
</style>

<!-- Cart Section -->
<div class="cart-page-container">
    <section class="cart-section">
        <div class="container">
            <h1 class="section-title">Sepetim</h1>

            <!-- Empty Cart Message -->
            <div id="empty-cart-message">
                <div class="empty-cart-icon">🛒</div>
                <p class="empty-cart-text">Sepetinizde henüz ürün bulunmuyor.</p>
                <a href="urunler.php" class="continue-shopping-btn">
                    <i class="fas fa-arrow-left"></i>
                    Alışverişe Devam Et
                </a>
            </div>

            <!-- Cart Container - Grid Layout -->
            <div class="cart-container">
                <!-- Cart Items Container -->
                <div id="cart-items-container" class="cart-items">
                    <!-- Sepet ürünleri buraya dinamik olarak yüklenecek -->
                </div>

                <!-- Cart Summary -->
                <div class="cart-summary" style="display: none;">
                    <h2>Sipariş Özeti</h2>
                    <div class="summary-item">
                        <span>Ara Toplam</span>
                        <span id="cart-subtotal">₺0.00</span>
                    </div>
                    <div class="summary-item">
                        <span>Kargo</span>
                        <span id="cart-shipping">₺0.00</span>
                    </div>
                    <div class="summary-item total">
                        <span>Toplam</span>
                        <span id="cart-total">₺0.00</span>
                    </div>
                    <div class="free-shipping-info">
                        <i class="fas fa-truck"></i>
                        <p><?= $freecargominprice ?> TL üzeri alışverişlerde kargo bedava!</p>
                    </div>
                </div>
            </div>

            <!-- Cart Actions -->
            <div class="cart-actions" style="display: none;">
                <button class="checkout-button" onclick="openCheckoutModal()">
                    Sepeti Onayla
                </button>
                <button class="clear-cart-btn" onclick="clearCart()">Sepeti Temizle</button>
                <a href="urunler.php" class="continue-shopping">
                    <i class="fas fa-arrow-left"></i>
                    Alışverişe Devam Et
                </a>
            </div>
        </div>
    </section>

    <!-- Checkout Modal -->
    <div id="checkoutModal" class="modal"
        style="display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); overflow-y: auto;">
        <div class="modal-content"
            style="background-color: #fff; margin: 5% auto; padding: 0; border-radius: 10px; width: 90%; max-width: 600px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);">
            <div class="modal-header"
                style="display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 2rem; border-bottom: 1px solid #e0e0e0; background-color: #f9f5ff; border-radius: 10px 10px 0 0;">
                <h2 style="margin: 0; color: #333; font-size: 1.5rem;">Sipariş Bilgileri</h2>
                <span class="close" onclick="closeCheckoutModal()"
                    style="color: #666; font-size: 2rem; font-weight: bold; cursor: pointer; transition: color 0.3s ease;">&times;</span>
            </div>
            <div class="modal-body" style="padding: 2rem;">
                <form id="checkoutForm">
                    <div class="form-group">
                        <div class="payment-info-message"
                            style="background: linear-gradient(135deg, #007bff,#17a2b8 ); color: white; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #c44569; box-shadow: 0 2px 10px rgba(238, 90, 36, 0.2);">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="font-size: 1.5rem;">ℹ️</div>
                                <div>
                                    <div style="font-size: 0.9rem; opacity: 0.9;">Bilgileri doldurup whatsap ile sipariş et
                                        butonuna tıklayınız.</div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-info-message"
                            style="background: linear-gradient(135deg, #ff6b6b, #ee5a24); color: white; padding: 1rem 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border-left: 4px solid #c44569; box-shadow: 0 2px 10px rgba(238, 90, 36, 0.2);">
                            <div style="display: flex; align-items: center; gap: 0.8rem;">
                                <div style="font-size: 1.5rem;">⚠️</div>
                                <div>
                                    <div style="font-weight: 600; font-size: 1.1rem; margin-bottom: 0.3rem;">Kart İle Ödeme
                                        Geçici Süreliğine Kapalı</div>
                                    <div style="font-size: 0.9rem; opacity: 0.9;">Şu anda sadece WhatsApp üzerinden sipariş
                                        alıyoruz. EFT/Havale ile ödeme yapabilirsiniz.</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-row"
                        style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="customerName"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">Ad *</label>
                            <input type="text" id="customerName" name="customerName" required
                                style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box;">
                            <div class="error-message"
                                style="color: red; font-size: 0.8rem; margin-top: 0.2rem; display: none;"></div>
                        </div>
                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="customerSurname"
                                style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">Soyad
                                *</label>
                            <input type="text" id="customerSurname" name="customerSurname" required
                                style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box;">
                            <div class="error-message"
                                style="color: red; font-size: 0.8rem; margin-top: 0.2rem; display: none;"></div>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="customerPhone"
                            style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">Telefon Numarası
                            *</label>
                        <input type="tel" id="customerPhone" name="customerPhone" placeholder="05XX XXX XX XX" required
                            style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box;">
                        <div class="error-message"
                            style="color: red; font-size: 0.8rem; margin-top: 0.2rem; display: none;"></div>
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="customerEmail"
                            style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">E-posta Adresi *
                            <br>
                            (Sadece Bilgilendirme İçin Kullanılacaktır. Tarafımızca herhangibir reklam amaçlı mail
                            almayacaksınız)</label>
                        <input type="email" id="customerEmail" name="customerEmail" placeholder="ornek@email.com" required
                            style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box;">
                        <div class="error-message"
                            style="color: red; font-size: 0.8rem; margin-top: 0.2rem; display: none;"></div>
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="customerAddress"
                            style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">Açık Adres
                            *</label>
                        <textarea id="customerAddress" name="customerAddress" rows="3"
                            placeholder="Mahalle, Sokak, Bina No, Daire No, İl/İlçe" required
                            style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box; resize: vertical; min-height: 80px;"></textarea>
                        <div class="error-message"
                            style="color: red; font-size: 0.8rem; margin-top: 0.2rem; display: none;"></div>
                    </div>
                    <div class="form-group" style="margin-bottom: 1.5rem;">
                        <label for="customerNote"
                            style="display: block; margin-bottom: 0.5rem; font-weight: 500; color: #333;">Sipariş Notu
                            (Opsiyonel)</label>
                        <textarea id="customerNote" name="customerNote" rows="2"
                            placeholder="Siparişinizle ilgili eklemek istediğiniz notlar..."
                            style="width: 100%; padding: 0.8rem; border: 1px solid #e0e0e0; border-radius: 5px; font-size: 1rem; box-sizing: border-box; resize: vertical; min-height: 80px;"></textarea>
                    </div>
                    <div class="order-summary"
                        style="background-color: #f9f5ff; padding: 1.5rem; border-radius: 8px; margin: 1.5rem 0;">
                        <h3 style="margin: 0 0 1rem 0; color: #333; font-size: 1.2rem;">Sipariş Özeti</h3>
                        <div id="modalOrderSummary">
                            <!-- Sipariş özeti buraya dinamik olarak yüklenecek -->
                        </div>
                    </div>
                    <div class="form-actions"
                        style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 2rem;">
                        <button type="button" class="btn-secondary" onclick="closeCheckoutModal()"
                            style="padding: 0.8rem 1.5rem; background-color: #6c757d; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: 500;">İptal</button>
                        <button type="button" class="btn-primary" onclick="proceedToPayment()"
                            style="padding: 0.8rem 1.5rem; background-color: #28a745; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: 500;">Whatssap
                            ile Sipariş Et</button>
                        <!-- <button type="button" disabled class="btn-primary" onclick="completeOrderWithWhatsApp()" style="padding: 0.8rem 1.5rem; background-color: #8A2BE2; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: 500;">Siparişi Tamamla</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Global modal functions
    function openCheckoutModal() {
        console.log('openCheckoutModal çağrıldı');
        const modal = document.getElementById('checkoutModal');
        console.log('Modal element:', modal);

        if (modal) {
            console.log('Modal bulundu, açılıyor...');
            updateModalOrderSummary();
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
            console.log('Modal açıldı');
        } else {
            console.error('Modal bulunamadı - checkoutModal ID\'li element yok');
        }
    }

    function closeCheckoutModal() {
        console.log('closeCheckoutModal çağrıldı');
        const modal = document.getElementById('checkoutModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
            console.log('Modal kapatıldı');
        }
    }

    function updateModalOrderSummary() {
        console.log('updateModalOrderSummary çağrıldı');
        const modalOrderSummary = document.getElementById('modalOrderSummary');
        console.log('Modal order summary element:', modalOrderSummary);

        if (!modalOrderSummary) {
            console.error('modalOrderSummary element bulunamadı');
            return;
        }

        if (typeof window.cart === 'undefined') {
            console.error('window.cart tanımlı değil');
            return;
        }

        const cartData = window.cart.getCart();
        console.log('Sepet verisi:', cartData);

        const freeShippingLimit = <?= $freecargominprice ?>;
        const shippingCost = 150;

        let subtotal = 0;
        let itemsHTML = '';

        cartData.forEach(item => {
            subtotal += item.price * item.quantity;
            itemsHTML += `
                <div class="modal-order-item">
                    <span>${item.name} x ${item.quantity}</span>
                    <span>₺${(item.price * item.quantity).toFixed(2)}</span>
                </div>
            `;
        });

        const isFreeShipping = subtotal >= freeShippingLimit;
        const finalShippingCost = isFreeShipping ? 0 : shippingCost;
        const total = subtotal + finalShippingCost;

        modalOrderSummary.innerHTML = `
            ${itemsHTML}
            <div class="modal-order-divider"></div>
            <div class="modal-order-item">
                <span>Ara Toplam</span>
                <span>₺${subtotal.toFixed(2)}</span>
            </div>
            <div class="modal-order-item">
                <span>Kargo</span>
                <span>${isFreeShipping ? 'Ücretsiz' : `₺${finalShippingCost.toFixed(2)}`}</span>
            </div>
            <div class="modal-order-item total">
                <span>Toplam</span>
                <span>₺${total.toFixed(2)}</span>
            </div>
        `;
        console.log('Modal order summary güncellendi');
    }

    // Modal dışına tıklandığında kapat
    window.onclick = function (event) {
        const modal = document.getElementById('checkoutModal');
        if (event.target === modal) {
            closeCheckoutModal();
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const routerBaseUrl = '<?= $router->getBaseUrl() ?>';

        const phoneInput = document.getElementById('customerPhone');
        if (phoneInput) {
            phoneInput.addEventListener('input', e => {
                const input = e.target.value.replace(/\D/g, '').substring(0, 11);
                const parts = [];
                if (input.length > 0) parts.push(input.substring(0, 4));
                if (input.length > 4) parts.push(input.substring(4, 7));
                if (input.length > 7) parts.push(input.substring(7, 9));
                if (input.length > 9) parts.push(input.substring(9, 11));
                e.target.value = parts.join(' ');
            });
        }

        function renderCart() {
            const cartContainer = document.getElementById('cart-items-container');
            const cartSubtotalElement = document.getElementById('cart-subtotal');
            const cartTotalElement = document.getElementById('cart-total');
            const cartShippingElement = document.getElementById('cart-shipping');
            const emptyCartMessage = document.getElementById('empty-cart-message');
            const cartSummary = document.querySelector('.cart-summary');
            const cartActions = document.querySelector('.cart-actions');
            const freeShippingInfo = document.querySelector('.free-shipping-info');

            if (!cartContainer || !cartSubtotalElement || !cartTotalElement || !emptyCartMessage) {
                console.error("Sepet elemanları bulunamadı. Sayfa yapısını kontrol edin.");
                return;
            }

            // cart.js yüklendiğinden ve window.cart'ın var olduğundan emin ol
            if (typeof window.cart === 'undefined') {
                console.error('Sepet sistemi (cart.js) yüklenemedi veya `window.cart` tanımlı değil.');
                emptyCartMessage.innerHTML = '<p>Sepet yüklenirken bir sorun oluştu. Lütfen sayfayı yenileyin.</p>';
                emptyCartMessage.style.display = 'block';
                cartSummary.style.display = 'none';
                cartActions.style.display = 'none';
                return;
            }

            const cartData = window.cart.getCart();
            const freeShippingLimit = <?= $freecargominprice ?>; // PHP'den gelen değer
            const shippingCost = 150; // Sabit kargo ücreti

            if (cartData.length === 0) {
                cartContainer.innerHTML = '';
                cartContainer.style.display = 'none'; // Sepet boşken gizle
                cartSummary.style.display = 'none';
                cartActions.style.display = 'none';
                emptyCartMessage.classList.add('visible'); // Animasyonlu gösterme
            } else {
                cartContainer.style.display = 'block'; // Sepette ürün varken göster
                cartContainer.innerHTML = '';
                let subtotal = 0;

                cartData.forEach(item => {
                    subtotal += item.price * item.quantity;
                    cartContainer.innerHTML += `
                        <div class="cart-item" data-id="${item.id}">
                            <div class="cart-item-image">
                                <img src="${routerBaseUrl}assets/images/urunler/${item.image}" alt="${item.name}">
                            </div>
                            <div class="cart-item-details">
                                <h3>${item.name}</h3>
                                <p class="cart-item-price">₺${parseFloat(item.price).toFixed(2)}</p>
                                <div class="cart-item-quantity">
                                    <button onclick="decreaseQuantity(${item.id})">-</button>
                                    <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)">
                                    <button onclick="increaseQuantity(${item.id})">+</button>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                ₺${(item.price * item.quantity).toFixed(2)}
                            </div>
                            <div class="cart-item-remove">
                                <button onclick="removeFromCart(${item.id})"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    `;
                });

                // Kargo ücreti hesaplama
                const isFreeShipping = subtotal >= freeShippingLimit;
                const finalShippingCost = isFreeShipping ? 0 : shippingCost;
                const total = subtotal + finalShippingCost;

                // Kargo bilgisi güncelleme
                if (cartShippingElement) {
                    cartShippingElement.textContent = isFreeShipping ? 'Ücretsiz' : `₺${finalShippingCost.toFixed(2)}`;
                }

                // Kargo mesajı güncelleme
                if (freeShippingInfo) {
                    if (isFreeShipping) {
                        freeShippingInfo.innerHTML = `
                            <i class="fas fa-truck" style="color: green;"></i>
                            <p style="color: green; font-weight: 600;">Kargonuz ücretsiz!</p>
                        `;
                    } else {
                        const remainingAmount = freeShippingLimit - subtotal;
                        freeShippingInfo.innerHTML = `
                            <i class="fas fa-truck"></i>
                            <p>${freeShippingLimit} TL üzeri alışverişlerde kargo bedava! (${remainingAmount.toFixed(2)} TL daha alışveriş yapın)</p>
                        `;
                    }
                }

                cartSubtotalElement.textContent = `₺${subtotal.toFixed(2)}`;
                cartTotalElement.textContent = `₺${total.toFixed(2)}`;

                cartSummary.style.display = 'block';
                cartActions.style.display = 'block';
                emptyCartMessage.classList.remove('visible');
            }
        }

        function updateQuantity(productId, quantity) {
            const newQuantity = parseInt(quantity, 10);
            if (!isNaN(newQuantity)) {
                window.cart.updateQuantity(productId, newQuantity);
                renderCart();
            }
        }

        function increaseQuantity(productId) {
            const cartData = window.cart.getCart();
            const item = cartData.find(p => p.id === productId);
            if (item) {
                window.cart.updateQuantity(productId, item.quantity + 1);
                renderCart();
            }
        }

        function decreaseQuantity(productId) {
            const cartData = window.cart.getCart();
            const item = cartData.find(p => p.id === productId);
            if (item && item.quantity > 1) {
                window.cart.updateQuantity(productId, item.quantity - 1);
            } else {
                removeFromCart(productId);
            }
            renderCart();
        }

        function removeFromCart(productId) {
            if (confirm('Ürünü sepetten kaldırmak istediğinizden emin misiniz?')) {
                window.cart.removeFromCart(productId);
                renderCart();
            }
        }

        function clearCart() {
            if (confirm('Sepeti tamamen boşaltmak istediğinizden emin misiniz?')) {
                window.cart.clearCart();
                renderCart();
            }
        }

        // Kart ile ödeme fonksiyonu
        function proceedToPayment() {
            console.log('Sipariş gönderme işlemi başlatıldı...');

            const form = document.getElementById('checkoutForm');
            const name = form.querySelector('#customerName');
            const surname = form.querySelector('#customerSurname');
            const phone = form.querySelector('#customerPhone');
            const email = form.querySelector('#customerEmail');
            const address = form.querySelector('#customerAddress');
            let isValid = true;

            // Clear previous errors
            form.querySelectorAll('.error-message').forEach(el => {
                el.style.display = 'none';
                el.textContent = '';
            });
            form.querySelectorAll('input, textarea').forEach(el => {
                if (el.id !== 'customerNote') { // Not alanı hariç
                    el.style.borderColor = '#e0e0e0';
                }
            });

            function showError(inputElement, message) {
                const errorDiv = inputElement.parentElement.querySelector('.error-message');
                if (errorDiv) {
                    errorDiv.textContent = message;
                    errorDiv.style.display = 'block';
                }
                inputElement.style.borderColor = 'red';
                isValid = false;
            }

            if (!name.value.trim()) {
                showError(name, 'Ad alanı zorunludur.');
            }
            if (!surname.value.trim()) {
                showError(surname, 'Soyad alanı zorunludur.');
            }
            if (!email.value.trim()) {
                showError(email, 'E-posta adresi zorunludur.');
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
                showError(email, 'Lütfen geçerli bir e-posta adresi girin.');
            }
            const rawPhone = phone.value.replace(/\s/g, '');
            if (!rawPhone) {
                showError(phone, 'Telefon numarası zorunludur.');
            } else if (rawPhone.length !== 11 || !rawPhone.startsWith('05')) {
                showError(phone, 'Telefon numarası 05 ile başlamalı ve 11 haneli olmalıdır.');
            }
            if (!address.value.trim()) {
                showError(address, 'Açık adres zorunludur.');
            }

            if (!isValid) {
                console.log('Form validasyonu başarısız.');
                return;
            }

            console.log('Form verileri geçerli. API\'ye gönderiliyor...');
            // Form verilerini al
            const formData = new FormData(document.getElementById('checkoutForm'));
            const cartData = window.cart.getCart();
            const freeShippingLimit = <?= $freecargominprice ?>;
            const shippingCost = 150;

            let subtotal = 0;
            cartData.forEach(item => {
                subtotal += item.price * item.quantity;
            });

            const isFreeShipping = subtotal >= freeShippingLimit;
            const finalShippingCost = isFreeShipping ? 0 : shippingCost;
            const total = subtotal + finalShippingCost;

            // Sipariş verilerini hazırla
            const orderData = {
                customer: {
                    name: formData.get('customerName'),
                    surname: formData.get('customerSurname'),
                    phone: formData.get('customerPhone'),
                    email: formData.get('customerEmail'),
                    address: formData.get('customerAddress'),
                    note: formData.get('customerNote')
                },
                items: cartData,
                subtotal: subtotal,
                shipping: finalShippingCost,
                total: total,
                isFreeShipping: isFreeShipping,
                paymentMethod: 'whatsapp'
            };

            fetch('<?=$router->getPanelUrl()."api/create_order.php"?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?= $csrf->getToken() ?>'
                },
                body: JSON.stringify(orderData)
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        console.log('Sipariş başarıyla oluşturuldu:', data);
                        orderData.orderId = data.orderId;
                        orderData.uniqorderId = data.uniqOrderId;
                        const orderSummaryUrl = `siparis-ozet.php?order=${encodeURIComponent(JSON.stringify(orderData))}`;
                        window.location.href = orderSummaryUrl;
                    } else {
                        console.error('Sipariş oluşturma hatası:', data.message);
                        alert('Sipariş oluşturulurken bir hata oluştu: ' + (data.message || 'Bilinmeyen bir hata.'));
                    }
                })
                .catch(error => {
                    console.error('Fetch hatası:', error);
                    alert('Siparişiniz gönderilirken bir ağ hatası oluştu. Lütfen tekrar deneyin.');
                });
        }

        // Fonksiyonları global scope'a ekle
        window.updateQuantity = updateQuantity;
        window.increaseQuantity = increaseQuantity;
        window.decreaseQuantity = decreaseQuantity;
        window.removeFromCart = removeFromCart;
        window.clearCart = clearCart;
        window.proceedToPayment = proceedToPayment;

        // Sayfa yüklendiğinde sepeti render et
        renderCart();
    });
</script>

<!-- Footer -->
<?php
require_once __DIR__ . "/includes/footer.php";
?>