// Daha sağlam bir yapı: 'cart' nesnesini window'a atayarak tekrar tanımlama hatasını önle
(function(window) {
    'use strict';

    // Eğer 'cart' zaten tanımlıysa, tekrar tanımlama
    if (typeof window.cart !== 'undefined') {
        console.warn('cart object is already defined.');
        return;
    }

    const cartManager = {
        key: 'mumDekorCart',

        // Sepeti localStorage'dan al
        getCart: function() {
            return JSON.parse(localStorage.getItem(this.key)) || [];
        },

        // Sepeti localStorage'a kaydet
        saveCart: function(cartData) {
            localStorage.setItem(this.key, JSON.stringify(cartData));
            this.updateCartIcon(); // Her kayıttan sonra ikonu güncelle
        },

        // Sepete ürün ekle
        addToCart: function(product) {
            let cartData = this.getCart();
            const existingProductIndex = cartData.findIndex(item => item.id === product.id);

            if (existingProductIndex > -1) {
                // Ürün zaten sepette, miktarını artır
                cartData[existingProductIndex].quantity += product.quantity;
            } else {
                // Ürünü sepete ekle
                cartData.push(product);
            }
            this.saveCart(cartData);
            alert(`${product.name} sepete eklendi!`);
        },

        // Sepetten ürün sil
        removeFromCart: function(productId) {
            let cartData = this.getCart();
            cartData = cartData.filter(item => item.id !== productId);
            this.saveCart(cartData);
        },

        // Ürün miktarını güncelle
        updateQuantity: function(productId, quantity) {
            let cartData = this.getCart();
            const productIndex = cartData.findIndex(item => item.id === productId);

            if (productIndex > -1) {
                if (quantity > 0) {
                    cartData[productIndex].quantity = quantity;
                } else {
                    // Miktar 0 veya daha az ise ürünü sil
                    cartData.splice(productIndex, 1);
                }
                this.saveCart(cartData);
            }
        },
        
        // Sepetteki toplam ürün sayısını al
        getCartCount: function() {
            return this.getCart().reduce((total, item) => total + item.quantity, 0);
        },

        // Header'daki sepet ikonunu güncelle
        updateCartIcon: function() {
            const cartCountElement = document.querySelector('.cart-count');
            if (cartCountElement) {
                const count = this.getCartCount();
                cartCountElement.textContent = count;
                cartCountElement.style.display = count > 0 ? 'flex' : 'none';
            }
        },

        // Sepeti temizle
        clearCart: function() {
            localStorage.removeItem(this.key);
            this.updateCartIcon();
        }
    };

    // 'cart' nesnesini global window nesnesine ata
    window.cart = cartManager;

    // Sayfa yüklendiğinde sepet ikonunu güncelle
    document.addEventListener('DOMContentLoaded', () => {
        if(window.cart) {
            window.cart.updateCartIcon();
        }
    });

})(window); 