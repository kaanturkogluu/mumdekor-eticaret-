<?php
require_once __DIR__ . "/panel/classes/Autoloader.php";
require_once __DIR__ . "/includes/navbar.php";

$freecargominprice = $settings['ucretsiz_kargo_limiti'];
$csrf = CSRF::getInstance();
?>




<style>
    .header {
        position: relative !important;
    }

    .order-summary-page {


        min-height: 100vh;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        padding: 2rem 0;
    }

    .order-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .order-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        text-align: center;
    }

    .order-header h1 {
        margin: 0;
        font-size: 2rem;
        font-weight: 600;
    }

    .order-header p {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 1.1rem;
    }

    .order-content {
        padding: 2rem;
    }

    .customer-info {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        margin-bottom: 2rem;
        border-left: 4px solid #667eea;
    }

    .customer-info h3 {
        margin: 0 0 1rem 0;
        color: #333;
        font-size: 1.3rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .info-item {
        display: flex;
        flex-direction: column;
    }

    .info-label {
        font-weight: 600;
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 0.3rem;
    }

    .info-value {
        color: #333;
        font-size: 1rem;
    }

    .order-items {
        margin-bottom: 2rem;
    }

    .order-items h3 {
        margin: 0 0 1rem 0;
        color: #333;
        font-size: 1.3rem;
    }

    .item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        margin-bottom: 0.5rem;
        background: #fff;
    }

    .item-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        margin-right: 1rem;
    }

    .item-details {
        flex: 1;
    }

    .item-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.3rem;
    }

    .item-price {
        color: #666;
        font-size: 0.9rem;
    }

    .item-quantity {
        background: #667eea;
        color: white;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .item-total {
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
    }

    .order-total {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        border-left: 4px solid #28a745;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.8rem;
    }

    .total-row:last-child {
        margin-bottom: 0;
        border-top: 2px solid #dee2e6;
        padding-top: 1rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: #28a745;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 2rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-whatsapp {
        background: #25d366;
        color: white;
    }

    .btn-whatsapp:hover {
        background: #128c7e;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
    }

    .btn-edit {
        background: #6c757d;
        color: white;
    }

    .btn-edit:hover {
        background: #5a6268;
        transform: translateY(-2px);
    }

    .payment-notice {
        background: linear-gradient(135deg, #ff6b6b, #ee5a24);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        border-left: 4px solid #c44569;
        box-shadow: 0 2px 10px rgba(238, 90, 36, 0.2);
    }

    .payment-notice .notice-content {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .payment-notice .notice-icon {
        font-size: 1.5rem;
    }

    .payment-notice .notice-text {
        font-size: 0.9rem;
        opacity: 0.9;
    }

    @media (max-width: 768px) {
        .order-container {
            margin: 1rem;
            border-radius: 10px;
        }

        .order-header {
            padding: 1.5rem;
        }

        .order-header h1 {
            font-size: 1.5rem;
        }

        .order-content {
            padding: 1.5rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="container">
    <div class="order-summary-page">
        <div class="order-container">
            <div class="order-header">
                <h1><i class="fas fa-check-circle"></i> Siparişiniz Alındı!</h1>
                <p>Lütfen siparişinizi onaylamak için aşağıdaki adımları takip edin.</p>
                <div id="orderIdContainer" style="margin-top: 1rem; font-size: 1.2rem;"></div>
            </div>

            <div class="order-content">
                <!-- Ödeme Bilgilendirme -->
                <div class="payment-notice">
                    <div class="notice-content">
                        <div class="notice-icon">⚠️</div>
                        <div class="notice-text">
                            <strong>Kart İle Ödeme Geçici Süreliğine Kapalı</strong><br>
                            Şu anda sadece WhatsApp üzerinden sipariş alıyoruz.
                          
                            EFT/Havale ile ödeme yapabilirsiniz.
                        </div>
                    </div>
                </div>

                <!-- Müşteri Bilgileri -->
                <div class="customer-info">
                    <h3><i class="fas fa-user"></i> Müşteri Bilgileri</h3>
                    <div class="info-grid" id="customerInfoGrid">
                        <!-- Müşteri bilgileri JavaScript ile doldurulacak -->
                    </div>
                </div>

                <!-- Sipariş Ürünleri -->
                <div class="order-items">
                    <h3><i class="fas fa-shopping-cart"></i> Sipariş Ürünleri</h3>
                    <div id="orderItemsContainer">
                        <!-- Ürünler JavaScript ile doldurulacak -->
                    </div>
                </div>

                <!-- Sipariş Toplamı -->
                <div class="order-total">
                    <div class="total-row">
                        <span>Ara Toplam:</span>
                        <span id="subtotal">₺0.00</span>
                    </div>
                    <div class="total-row">
                        <span>Kargo:</span>
                        <span id="shipping">₺0.00</span>
                    </div>
                    <div class="total-row">
                        <span>Toplam:</span>
                        <span id="total">₺0.00</span>
                    </div>
                </div>

                <!-- Aksiyon Butonları -->
                <div class="action-buttons">
                    <button class="btn btn-edit" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i>
                        Geri Dön ve Düzenle
                    </button>
                    <button class="btn btn-whatsapp" onclick="sendToWhatsApp()">
                        <i class="fab fa-whatsapp"></i>
                        WhatsApp ile Sipariş Ver
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // URL'den sipariş verilerini al
        const urlParams = new URLSearchParams(window.location.search);
        const orderData = urlParams.get('order');

        if (!orderData) {
            alert('Sipariş verisi bulunamadı!');
            window.location.href = 'sepet.php';
            return;
        }

        try {
            const order = JSON.parse(decodeURIComponent(orderData));
            displayOrderSummary(order);
        } catch (error) {
            console.error('Sipariş verisi parse edilemedi:', error);
            alert('Sipariş verisi okunamadı!');
            window.location.href = 'sepet.php';
        }
    });

    function displayOrderSummary(order) {
        // Sipariş Numarasını göster
        const orderIdContainer = document.getElementById('orderIdContainer');
        if (order.uniqorderId) {
            orderIdContainer.innerHTML = `Sipariş Numaranız: <strong style="background: #fff; color: #667eea; padding: 5px 10px; border-radius: 5px;">${order.uniqorderId}</strong>`;
        }
        // Müşteri bilgilerini göster
        const customerInfoGrid = document.getElementById('customerInfoGrid');
        customerInfoGrid.innerHTML = `
                <div class="info-item">
                    <div class="info-label">Ad Soyad</div>
                    <div class="info-value">${order.customer.name} ${order.customer.surname}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Telefon</div>
                    <div class="info-value">${order.customer.phone}</div>
                </div>
                ${order.customer.email ? `
                <div class="info-item">
                    <div class="info-label">E-posta</div>
                    <div class="info-value">${order.customer.email}</div>
                </div>
                ` : ''}
                <div class="info-item">
                    <div class="info-label">Adres</div>
                    <div class="info-value">${order.customer.address}</div>
                </div>
                ${order.customer.note ? `
                <div class="info-item">
                    <div class="info-label">Sipariş Notu</div>
                    <div class="info-value">${order.customer.note}</div>
                </div>
                ` : ''}
            `;

        // Ürünleri göster
        const orderItemsContainer = document.getElementById('orderItemsContainer');
        let itemsHTML = '';

        order.items.forEach(item => {
            itemsHTML += `
                    <div class="item">
                        <img src="assets/images/urunler/${item.image}" alt="${item.name}" class="item-image">
                        <div class="item-details">
                            <div class="item-name">${item.name}</div>
                            <div class="item-price">₺${parseFloat(item.price).toFixed(2)}</div>
                        </div>
                        <div class="item-quantity">x${item.quantity}</div>
                        <div class="item-total">₺${(item.price * item.quantity).toFixed(2)}</div>
                    </div>
                `;
        });

        orderItemsContainer.innerHTML = itemsHTML;

        // Toplamları göster
        document.getElementById('subtotal').textContent = `₺${order.subtotal.toFixed(2)}`;
        document.getElementById('shipping').textContent = order.isFreeShipping ? 'Ücretsiz' : `₺${order.shipping.toFixed(2)}`;
        document.getElementById('total').textContent = `₺${order.total.toFixed(2)}`;

        // Global order değişkeni olarak sakla
        window.currentOrder = order;
    }

    function sendToWhatsApp() {
        const order = window.currentOrder;

        // WhatsApp mesajını hazırla
        let message = `*YENİ SİPARİŞ - EFT/HAVALE*\n\n`;
        if (order.uniqorderId) {
            message += `*Sipariş Kodu:* ${order.uniqorderId}\n\n`;
        }
        message += `*Müşteri Bilgileri:*\n`;
        message += `Ad Soyad: ${order.customer.name} ${order.customer.surname}\n`;
        message += `Telefon: ${order.customer.phone}\n`;
        if (order.customer.email) {
            message += `E-posta: ${order.customer.email}\n`;
        }
        message += `Adres: ${order.customer.address}\n`;
        if (order.customer.note) {
            message += `Not: ${order.customer.note}\n`;
        }
        message += `\n*Sipariş Detayları:*\n`;

        order.items.forEach(item => {
            message += `• ${item.name} x ${item.quantity} = ₺${(item.price * item.quantity).toFixed(2)}\n`;
        });

        message += `\n*Özet:*\n`;
        message += `Ara Toplam: ₺${order.subtotal.toFixed(2)}\n`;
        message += `Kargo: ${order.isFreeShipping ? 'Ücretsiz' : `₺${order.shipping.toFixed(2)}`}\n`;
        message += `*Toplam: ₺${order.total.toFixed(2)}*\n`;
        message += `\n*Ödeme Yöntemi: EFT/HAVALE*\n`;
        message += `Banka bilgileri için lütfen iletişime geçin.`;

        // WhatsApp'a yönlendir
        const whatsappUrl = `https://wa.me/<?=$settings['whatsapp_number']?>?text=${encodeURIComponent(message)}`;
        window.open(whatsappUrl, '_blank');

        // Sepeti temizle
        if (typeof window.cart !== 'undefined') {
            window.cart.clearCart();
        }

        // Başarı mesajı göster
        alert('Siparişiniz WhatsApp üzerinden gönderildi! EFT/Havale bilgileri için iletişime geçilecek.');

        // Ana sayfaya yönlendir
        window.location.href = 'index.php';
    }

    function goBack() {
        const order = window.currentOrder;
        if (!order || !order.orderId) {
            console.error("Silinecek sipariş ID'si bulunamadı.");
            window.history.back(); // ID yoksa bile geri dön
            return;
        }

        if (confirm('Sepete geri dönmek bu siparişi iptal edecektir. Emin misiniz?')) {
            fetch('<?=$router->getPanelUrl()?>api/delete_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': '<?= $csrf->getToken() ?>'
                },
                body: JSON.stringify({ orderId: order.orderId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Sipariş başarıyla iptal edildi.');
                } else {
                    console.error('Sipariş iptal edilemedi:', data.message);
                    // Kullanıcıya bilgi verilebilir, ancak yine de geri yönlendirilir.
                    alert('Siparişiniz iptal edilirken bir sorun oluştu.');
                }
                window.history.back();
            })
            .catch(error => {
                console.error('Sipariş iptal etme hatası:', error);
                alert('Siparişiniz iptal edilirken bir ağ hatası oluştu.');
                window.history.back();
            });
        }
    }
</script>


<?php
require_once __DIR__ . "/includes/footer.php";
?>