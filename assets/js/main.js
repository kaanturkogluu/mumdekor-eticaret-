// Sepet işlemleri için basit bir yapı
let cart = [];
let cartCount = 0;

// Sepete ürün ekleme fonksiyonu
function addToCart(productName, price) {
    cart.push({ name: productName, price: price });
    cartCount++;
    updateCartCount();
    showNotification(`${productName} sepete eklendi!`);
}

// Sepet sayısını güncelleme
function updateCartCount() {
    const cartCountElement = document.querySelector('.cart-count');
    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }
}

// Bildirim gösterme fonksiyonu
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    
    // Bildirim stilini ayarla
    notification.style.position = 'fixed';
    notification.style.bottom = '20px';
    notification.style.right = '20px';
    notification.style.backgroundColor = '#8A2BE2';
    notification.style.color = 'white';
    notification.style.padding = '1rem 2rem';
    notification.style.borderRadius = '8px';
    notification.style.zIndex = '1000';
    notification.style.animation = 'slideIn 0.5s ease-out';
    
    document.body.appendChild(notification);
    
    // 3 saniye sonra bildirimi kaldır
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.5s ease-out';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 500);
    }, 3000);
}

// Sayfa yüklendiğinde çalışacak kodlar
document.addEventListener('DOMContentLoaded', () => {
    // Yeni Sepet Sistemi için Event Listener
    // Sayfa yüklendiğinde tüm .add-to-cart butonlarını bulur
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Tıklanan butondan ürün bilgilerini 'data-' attribute'larından al
            const productId = this.dataset.productId;
            const productName = this.dataset.productName;
            const productPrice = parseFloat(this.dataset.productPrice);
            const productImage = this.dataset.productImage;
            
            // Ürün detay sayfasındaki miktar inputunu kontrol et, yoksa 1 kabul et
            const quantityInput = document.getElementById('quantity');
            const quantity = quantityInput ? parseInt(quantityInput.value, 10) : 1;

            // 'cart' nesnesinin var olduğundan ve fonksiyonun çağrılabildiğinden emin ol
            if (window.cart && typeof window.cart.addToCart === 'function') {
                window.cart.addToCart({
                    id: parseInt(productId, 10),
                    name: productName,
                    price: productPrice,
                    quantity: quantity,
                    image: productImage
                });
            } else {
                console.error('Sepet sistemi (cart.js) yüklenemedi veya hatalı.');
            }
        });
    });

    // Smooth scroll için tüm iç linklere event listener ekle
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navList = document.querySelector('.nav-list');
    const body = document.body;

    if (mobileMenuBtn && navList) {
        mobileMenuBtn.addEventListener('click', function() {
            mobileMenuBtn.classList.toggle('active');
            navList.classList.toggle('active');
            body.style.overflow = navList.classList.contains('active') ? 'hidden' : '';
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.nav-menu') && navList.classList.contains('active')) {
                mobileMenuBtn.classList.remove('active');
                navList.classList.remove('active');
                body.style.overflow = '';
            }
        });

        // Close menu when clicking on a link
        const navLinks = navList.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuBtn.classList.remove('active');
                navList.classList.remove('active');
                body.style.overflow = '';
            });
        });
    }

    // FAQ Toggle
    const faqItems = document.querySelectorAll('.faq-item');
    if(faqItems.length > 0) {
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            if (question) {
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            otherItem.classList.remove('active');
                        }
                    });
        
                    // Toggle current item
                    item.classList.toggle('active');
                });
            }
        });
    }
});

// CSS Animasyonları için stil ekle
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style); 