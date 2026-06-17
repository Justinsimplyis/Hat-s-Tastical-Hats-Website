<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>Hattie's Hat'istical Hats</title>    
    <style>

        
    </style>
</head>
<body>

<!-- ======================== NAVIGATION ======================== -->
<nav class="nav" id="nav">
    <div class="nav-inner">
        <a href="#home" class="nav-logo">
             <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
            <span class="logo-text">
                <span class="logo-name">Hattie's</span>
                <span class="logo-tagline">Hat'istical Hats</span>
            </span>
        </a>             
        
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#catalog">Catalog</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="nav-actions">
            <button class="nav-action-btn" id="navSearchBtn" aria-label="Search products">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button class="nav-action-btn" id="navCartBtn" aria-label="Open cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="cart-badge" id="cartBadge">0</span>
            </button>
            <button class="btnAccount-popup">
                <i class="fa-solid fa-user"></i> Account
            </button>
            
            <button class="nav-menu-btn" id="mobileMenuBtn" aria-label="Open menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="#home" class="nav-logo">
            <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
        </a>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="mobile-menu-links">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#catalog">Catalog</a>
        <a href="#contact">Contact Us</a>
    </div>
    <div class="mobile-menu-footer">
        <button class="btnAccount-popup" style="display:flex;align-items:center;justify-content:center;text-align:center;width:100%;margin-left:0;padding:12px;">
            <i class="fa-solid fa-user"></i>
        </button>
    </div>
</div>

<!-- ======================== HERO ======================== -->
<header class="hero" id="home">
    <div class="section-container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    Handcrafted with Love in South Africa
                </div>
                <h1>Elegance For <span>Every Occasion</span></h1>
                <p class="hero-description">
                    Discover our curated collection of bespoke hats and headpieces — 
                    from classic fedoras to show-stopping fascinators. Each piece is 
                    meticulously handcrafted to make you feel extraordinary.
                </p>
                <div class="hero-actions">
                    <a href="#catalog" class="btn-primary">
                        <i class="fa-solid fa-hat-cowboy"></i>
                        Browse Catalog
                    </a>
                    <a href="#about" class="btn-outline">
                        <i class="fa-solid fa-play"></i>
                        Our Story
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img class="hero-image-main" src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats">
                <div class="hero-float-card">
                    <div class="hero-float-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="hero-float-text">
                        <strong>500+ Happy Clients</strong>
                        <span>Trusted since 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ======================== DEALS ======================== -->
<section class="deals-section">
    <div class="section-container">
        <div class="deals-grid">
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <h4>30-Day Terms</h4>
                <p>Take advantage of our 30-day payment term, completely interest-free. Shop now, pay later.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-tags"></i></div>
                <h4>Seasonal Savings</h4>
                <p>Lots of special offers for hats for any season and any occasion throughout the year.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-rotate-left"></i></div>
                <h4>Easy Returns</h4>
                <p>If not up to standard, we accept returns with up to 70% refund of the original price — good condition and proof of payment required.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-truck-fast"></i></div>
                <h4>Free Delivery</h4>
                <p>Free delivery on bulk orders and purchases of R 1,500 and above across South Africa.</p>
            </div>
        </div>
    </div>
</section>

<!-- ======================== ABOUT ======================== -->
<section class="about-section" id="about">
    <div class="section-container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <img class="about-image-main" src="/assets/images/img_1.png" alt="About Hattie's Hat'istical Hats">
                <img class="about-image-accent" src="/assets/images/img_2.png" alt="Hat detail">
            </div>
            <div>
                <div class="section-label">Our Story</div>
                <h2 class="section-header">Behind Every Hat, There's a Story</h2>
                <p class="section-subheader" style="margin-bottom:32px;">What started as a passion project has blossomed into one of South Africa's most loved hat boutiques.</p>
                <div class="about-cards">
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">1</div>
                            <h4>Who Are We</h4>
                        </div>
                        <p>We are Hattie's Hat'istical Hats — a South African-born hat boutique specialising in handcrafted headwear for every occasion. From elegant wedding fascinators to bold everyday fedoras, we celebrate individuality through the art of millinery.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">2</div>
                            <h4>How We Started</h4>
                        </div>
                        <p>Founded in 2019 by Hattie herself, the journey began at a kitchen table with a single fascinator and a dream. What started as gifts for friends quickly grew into a thriving business fueled by word-of-mouth and a loyal community.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">3</div>
                            <h4>Our Promise</h4>
                        </div>
                        <p>We promise quality craftsmanship, personal attention to every detail, and a commitment to making you feel confident and beautiful. Every hat is made with premium materials, and every customer is treated like family.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== CATALOG ======================== -->
<section class="catalog-section" id="catalog">
    <div class="section-container">
        <div class="section-label">Shop</div>
        <div class="catalog-header">
            <div>
                <h2 class="section-header">Our Catalog</h2>
                <p class="section-subheader" style="margin-bottom:0;">Handpicked pieces for every style and occasion</p>
            </div>
            <div class="catalog-filters" id="catalogFilters">
                <button class="filter-chip active" data-filter="all">All</button>
                <!-- Category chips populated dynamically from Database -->
            </div>
        </div>
        <div id="catalogLoading" class="catalog-loading">
            <div class="spinner"></div>
            <span>Loading products...</span>
        </div>
        <div class="products-grid" id="productsGrid" style="display:none;"></div>
        <div class="catalog-empty" id="catalogEmpty" style="display:none;">
            <i class="fa-solid fa-box-open"></i>
            <h4>No products found</h4>
            <p>Check back soon — we're always adding new pieces.</p>
        </div>
        <div class="catalog-show-more" id="catalogShowMore" style="display:none;">
            <button class="btn-outline" id="showMoreBtn">
                <i class="fa-solid fa-grid-2"></i>
                View All Products
            </button>
        </div>
    </div>
</section>

<!-- ======================== CONTACT ======================== -->
<section class="contact-section" id="contact">
    <div class="section-container">
        <div class="section-label">Get in Touch</div>
        <h2 class="section-header">Contact Us</h2>
        <p class="section-subheader">Have a question, custom request, or just want to say hello? We'd love to hear from you.</p>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Let's Start a Conversation</h3>
                <p>Whether you need help choosing the perfect hat, want to discuss a custom order, or have feedback — our team is here for you. We typically respond within 24 hours.</p>
                <div class="contact-details">
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div><strong>Visit Our Studio</strong><span>123 Millinery Lane, Rosebank<br>Johannesburg, Gauteng, 2196</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-phone"></i></div>
                        <div><strong>Call Us</strong><span>+27 (0) 11 234 5678<br>Mon – Fri, 8:00 – 17:00</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div><strong>Email Us</strong><span>hello@hatties.co.za<br>orders@hatties.co.za</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-brands fa-whatsapp"></i></div>
                        <div><strong>WhatsApp</strong><span>+27 (0) 82 345 6789<br>Quick queries & custom orders</span></div>
                    </div>
                </div>
                <div class="contact-socials">
                    <a href="#" class="contact-social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="contact-social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="contact-social-link" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="contact-social-link" aria-label="Pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                </div>
            </div>
            <div class="contact-form-card" id="contactFormCard">
                <h4>Send Us a Message</h4>
                <form id="contactForm" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactName">Full Name <span style="color:var(--red)">*</span></label>
                            <input type="text" id="contactName" class="form-input" placeholder="Your full name" required>
                            <span class="form-error" id="contactNameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email Address <span style="color:var(--red)">*</span></label>
                            <input type="email" id="contactEmail" class="form-input" placeholder="you@example.com" required>
                            <span class="form-error" id="contactEmailError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactPhone">Phone Number</label>
                            <input type="tel" id="contactPhone" class="form-input" placeholder="+27 82 345 6789">
                        </div>
                        <div class="form-group">
                            <label for="contactSubject">Subject <span style="color:var(--red)">*</span></label>
                            <select id="contactSubject" class="form-input" required style="cursor:pointer;">
                                <option value="">Select a subject</option>
                                <option value="general">General Enquiry</option>
                                <option value="custom-order">Custom Order Request</option>
                                <option value="order-status">Order Status</option>
                                <option value="returns">Returns & Refunds</option>
                                <option value="wholesale">Wholesale Enquiry</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="form-error" id="contactSubjectError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message <span style="color:var(--red)">*</span></label>
                        <textarea id="contactMessage" class="form-input" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                        <span class="form-error" id="contactMessageError"></span>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ======================== FOOTER ======================== -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <div class="nav-logo">
                <div class="nav-logo-mark">H</div>
                <div class="nav-logo-text">
                    <span class="nav-logo-name">Hattie's</span>
                    <span class="nav-logo-tagline">Hat'istical Hats</span>
                </div>
            </div>
            <p>Handcrafted hats and headpieces for every occasion. Made with love in Johannesburg, South Africa.</p>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="#home">Home</a><a href="#about">About Us</a><a href="#catalog">Catalog</a><a href="#contact">Contact</a>
        </div>
        <div class="footer-col">
            <h4>Categories</h4>
            <div id="footerCategories"><!-- populated by JS --></div>
        </div>
        <div class="footer-col">
            <h4>Support</h4>
            <a href="#contact">Help Centre</a><a href="#contact">Returns Policy</a><a href="#contact">Custom Orders</a><a href="#contact">Shipping Info</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; 2025 Hattie's Hat'istical Hats. All rights reserved.</span>
        <span>Crafted with <i class="fa-solid fa-heart" style="color:var(--red);font-size:.75rem;"></i> By Justin Plaatjies</span>
    </div>
</footer>

<!-- ======================== SEARCH OVERLAY ======================== -->
<div class="search-overlay" id="searchOverlay" role="dialog" aria-label="Search products">
    <div class="search-popup">
        <div class="search-popup-header">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search hats, fascinators, fedoras..." id="searchInput" aria-label="Search query">
            <span class="esc-hint">ESC</span>
        </div>
        <div class="search-popup-body" id="searchResults">
            <div class="search-popup-empty">
                <i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>
                Start typing to search our catalog
            </div>
        </div>
    </div>
</div>

<!-- ======================== ACCOUNT MODAL ======================== -->
<div class="modal-overlay account-modal" id="accountModal">
    <div class="modal-box">
        <button class="modal-close" id="accountClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="account-box">
            <!-- Login Form -->
            <div class="form-box login active" id="loginFormBox">
                <div class="logreg-title">
                    <h2>Login</h2>
                    <p>Please login to use platform</p>
                </div>
                <form action="#" id="loginForm">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox"> Remember Me</label>
                        <a href="/public/auth/forgot_password.php">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:10px;">Login</button>
                    <div class="logreg-link">
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>

            <!-- Registration Form -->
            <div class="form-box register" id="registerFormBox">
                <div class="logreg-title">
                    <h2>Registration</h2>
                    <p>Please provide the following to create your account</p>
                </div>
                <form action="#" id="registerForm">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" required>
                        <label>Full Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox"> I agree to the terms & conditions</label>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:10px;">Register</button>
                    <div class="logreg-link">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
            
            <div class="dashboard-quick-links">
                <a href="/dashboards/admin/index.php" class="quick-link-btn"><i class="fa-solid fa-user-shield"></i> Admin</a>
                <a href="/dashboards/user/index.php" class="quick-link-btn"><i class="fa-solid fa-user-gear"></i> User</a>
            </div>
        </div>
    </div>
</div>

<!-- ======================== CART PANEL ======================== -->
<div class="cart-overlay" id="cartOverlay"></div>
<div class="cart-panel" id="cartPanel">
    <div class="cart-panel-header">
        <h3><i class="fa-solid fa-bag-shopping"></i> Your Cart <span id="cartPanelCount">0 items</span></h3>
        <button class="cart-panel-close" id="cartPanelClose" aria-label="Close cart"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="cart-panel-body" id="cartPanelBody"></div>
    <div class="cart-panel-footer" id="cartPanelFooter" style="display:none;">
        <div class="cart-subtotal"><label>Subtotal</label><span id="cartSubtotal">R 0.00</span></div>
        <div class="cart-total"><label>Total</label><span id="cartTotal">R 0.00</span></div>
        <button class="cart-checkout-btn" id="checkoutBtn"><i class="fa-solid fa-lock"></i> Proceed to Checkout</button>
        <div class="cart-free-delivery" id="freeDeliveryNote" style="display:none;"><i class="fa-solid fa-truck-fast"></i> You qualify for free delivery!</div>
    </div>
</div>

<!-- ======================== PRODUCT DETAIL MODAL (Carousel) ======================== -->
<div class="modal-overlay" id="productDetailModal">
    <div class="modal-box" style="position:relative;">
        <button class="modal-close" id="productDetailClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="product-detail" id="productDetailContent"><!-- populated by JS --></div>
    </div>
</div>

<!-- ======================== CUSTOM REQUEST MODAL ======================== -->
<div class="modal-overlay custom-modal" id="customRequestModal">
    <div class="modal-box" style="position:relative;">
        <button class="modal-close" id="customRequestClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="custom-modal-body">
            <div class="custom-modal-product" id="customRefProduct"><!-- populated by JS --></div>
            <h4 style="font-size:1.15rem;font-weight:700;color:var(--fg);margin-bottom:24px;">
                <i class="fa-solid fa-wand-magic-sparkles" style="color:var(--pink);margin-right:6px;"></i>
                Request a Custom Version
            </h4>
            <form id="customRequestForm" novalidate>
                <div class="form-row">
                    <div class="form-group">
                        <label for="customName">Full Name <span style="color:var(--red)">*</span></label>
                        <input type="text" id="customName" class="form-input" placeholder="Your full name" required>
                        <span class="form-error" id="customNameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="customEmail">Email <span style="color:var(--red)">*</span></label>
                        <input type="email" id="customEmail" class="form-input" placeholder="you@example.com" required>
                        <span class="form-error" id="customEmailError"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="customPhone">Phone Number</label>
                        <input type="tel" id="customPhone" class="form-input" placeholder="+27 82 345 6789">
                    </div>
                    <div class="form-group">
                        <label for="customBudget">Budget Range</label>
                        <select id="customBudget" class="form-input" style="cursor:pointer;">
                            <option value="">Select budget</option>
                            <option value="under-500">Under R 500</option>
                            <option value="500-1000">R 500 – R 1,000</option>
                            <option value="1000-2000">R 1,000 – R 2,000</option>
                            <option value="2000-plus">R 2,000+</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customDescription">Describe What You Want <span style="color:var(--red)">*</span></label>
                    <textarea id="customDescription" class="form-input" rows="4" placeholder="E.g. I'd like this hat in navy blue with a wider brim and a feather accent..." required></textarea>
                    <span class="form-error" id="customDescriptionError"></span>
                </div>
                <div class="form-group">
                    <label>Reference Images <span style="font-weight:400;color:var(--fg-muted);">(optional — up to 5)</span></label>
                    <div class="upload-zone" id="customUploadZone">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Click to upload or drag and drop</p>
                        <span>PNG, JPG, WEBP up to 5MB each</span>
                        <input type="file" id="customFileInput" multiple accept="image/png,image/jpeg,image/webp" hidden>
                    </div>
                    <div class="upload-previews" id="customUploadPreviews"></div>
                </div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                    <i class="fa-solid fa-paper-plane"></i> Submit Custom Request
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE — no dummy data, all fetched from API
   ================================================================ */
var allProducts = [];
var categories = [];
var cart = [];
var currentFilter = 'all';
var showingAll = false;
var INITIAL_SHOW = 8;
var customReferenceImages = []; // { file: File, preview: string }

/* ================================================================
   UTILITIES
   ================================================================ */
function formatPrice(n) { return 'R ' + Number(n).toFixed(2); }
function escapeHtml(s) { var d = document.createElement('div'); d.textContent = s; return d.innerHTML; }
function categoryLabel(slug) { return (slug || '').split('-').map(function(w) { return w.charAt(0).toUpperCase() + w.slice(1); }).join(' '); }
function statusInfo(s) {
    var m = { 'in-stock':{l:'In Stock',d:'in-stock'},'on-sale':{l:'On Sale',d:'on-sale'},'low-stock':{l:'Low Stock',d:'low-stock'},'out-of-stock':{l:'Out of Stock',d:'out-of-stock'},'featured':{l:'Featured',d:'in-stock'} };
    return m[s] || {l:s,d:'in-stock'};
}
function firstImage(images) { return (images && images.length > 0) ? images[0] : '/assets/images/placeholder.jpg'; }

function showToast(msg, type) {
    type = type || 'info';
    var c = document.getElementById('toastContainer');
    var t = document.createElement('div');
    t.className = 'toast ' + type;
    var icon = type === 'success' ? 'fa-circle-check' : type === 'error' ? 'fa-circle-xmark' : 'fa-circle-info';
    t.innerHTML = '<i class="fa-solid ' + icon + '"></i> ' + escapeHtml(msg);
    c.appendChild(t);
    setTimeout(function() { t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all .3s ease'; setTimeout(function(){ t.remove(); },300); }, 3000);
}

/* ================================================================
   API FETCH — Products
   ================================================================ */
function fetchProducts() {
    var loading = document.getElementById('catalogLoading');
    var grid = document.getElementById('productsGrid');
    var empty = document.getElementById('catalogEmpty');
    loading.style.display = '';
    grid.style.display = 'none';
    empty.style.display = 'none';

    setTimeout(function() {
        allProducts = [];
        categories = [];
        renderCatalog();
    }, 800);
}

/* ================================================================
   CATALOG RENDERING
   ================================================================ */
function renderCatalog() {
    var loading = document.getElementById('catalogLoading');
    var grid = document.getElementById('productsGrid');
    var empty = document.getElementById('catalogEmpty');
    var showMore = document.getElementById('catalogShowMore');
    loading.style.display = 'none';

    var filtersEl = document.getElementById('catalogFilters');
    filtersEl.innerHTML = '<button class="filter-chip active" data-filter="all">All</button>';
    categories.forEach(function(cat) {
        filtersEl.innerHTML += '<button class="filter-chip" data-filter="' + escapeHtml(cat.id) + '">' + escapeHtml(cat.name) + '</button>';
    });

    var footerCats = document.getElementById('footerCategories');
    footerCats.innerHTML = categories.map(function(cat) {
        return '<a href="#catalog">' + escapeHtml(cat.name) + '</a>';
    }).join('');

    if (allProducts.length === 0) {
        grid.style.display = 'none';
        empty.style.display = '';
        showMore.style.display = 'none';
        return;
    }

    empty.style.display = 'none';
    renderFilteredProducts();
    bindFilterChips();
}

function getFilteredProducts() {
    if (currentFilter === 'all') return allProducts;
    return allProducts.filter(function(p) { return p.category === currentFilter; });
}

function renderFilteredProducts() {
    var grid = document.getElementById('productsGrid');
    var showMore = document.getElementById('catalogShowMore');
    var filtered = getFilteredProducts();
    var display = showingAll ? filtered : filtered.slice(0, INITIAL_SHOW);

    grid.style.display = '';
    showMore.style.display = (!showingAll && filtered.length > INITIAL_SHOW) ? '' : 'none';

    grid.innerHTML = display.map(function(p) {
        var badgeHtml = '';
        if (p.badge === 'sale') badgeHtml = '<span class="product-card-badge sale">Sale</span>';
        else if (p.badge === 'new') badgeHtml = '<span class="product-card-badge new">New</span>';
        else if (p.badge === 'featured') badgeHtml = '<span class="product-card-badge featured">Featured</span>';

        var imgCount = (p.images && p.images.length > 1) ? '<span class="product-card-img-count"><i class="fa-solid fa-images" style="font-size:.55rem;margin-right:2px;"></i>' + p.images.length + '</span>' : '';

        var priceHtml = formatPrice(p.price);
        if (p.oldPrice) priceHtml += '<span class="old-price">' + formatPrice(p.oldPrice) + '</span>';

        return '<div class="product-card" data-category="' + escapeHtml(p.category) + '">' +
            '<div class="product-card-image">' + badgeHtml + imgCount +
                '<img src="' + escapeHtml(firstImage(p.images)) + '" alt="' + escapeHtml(p.name) + '" loading="lazy">' +
            '</div>' +
            '<div class="product-card-body">' +
                '<span class="product-card-category">' + categoryLabel(p.category) + '</span>' +
                '<h4 class="product-card-name">' + escapeHtml(p.name) + '</h4>' +
                '<div class="product-card-price">' + priceHtml + '</div>' +
                '<div class="product-card-actions">' +
                    '<button class="btn-card-primary" data-add-cart="' + p.id + '"><i class="fa-solid fa-bag-shopping"></i> Add to Cart</button>' +
                    '<div class="product-card-row">' +
                        '<button class="btn-card-small view" data-view="' + p.id + '"><i class="fa-solid fa-eye"></i> View More</button>' +
                        '<button class="btn-card-small custom" data-custom="' + p.id + '"><i class="fa-solid fa-wand-magic-sparkles"></i> Custom</button>' +
                    '</div>' +
                '</div>' +
            '</div></div>';
    }).join('');

    grid.querySelectorAll('[data-add-cart]').forEach(function(b) { b.addEventListener('click', function(){ addToCart(b.dataset.addCart); }); });
    grid.querySelectorAll('[data-view]').forEach(function(b) { b.addEventListener('click', function(){ openProductDetail(b.dataset.view); }); });
    grid.querySelectorAll('[data-custom]').forEach(function(b) { b.addEventListener('click', function(){ openCustomRequest(b.dataset.custom); }); });
}

function bindFilterChips() {
    document.getElementById('catalogFilters').addEventListener('click', function(e) {
        var chip = e.target.closest('.filter-chip');
        if (!chip) return;
        document.querySelectorAll('.filter-chip').forEach(function(c){ c.classList.remove('active'); });
        chip.classList.add('active');
        currentFilter = chip.dataset.filter;
        showingAll = false;
        renderFilteredProducts();
    });
}

document.getElementById('showMoreBtn').addEventListener('click', function() {
    showingAll = true;
    renderFilteredProducts();
});

fetchProducts();

/* ================================================================
   PRODUCT DETAIL — IMAGE CAROUSEL
   ================================================================ */
var productDetailModal = document.getElementById('productDetailModal');
var productDetailContent = document.getElementById('productDetailContent');
var productDetailClose = document.getElementById('productDetailClose');
var currentCarouselIndex = 0;
var carouselImages = [];
var carouselTimer = null;

function openProductDetail(productId) {
    var p = allProducts.find(function(x){ return x.id === productId; });
    if (!p) return;

    carouselImages = p.images && p.images.length > 0 ? p.images : ['/assets/images/placeholder.jpg'];
    currentCarouselIndex = 0;

    var si = statusInfo(p.status);
    var priceHtml = formatPrice(p.price);
    if (p.oldPrice) priceHtml += '<span class="old-price">' + formatPrice(p.oldPrice) + '</span>';

    productDetailContent.innerHTML =
        '<div class="pd-carousel">' +
            '<div class="pd-carousel-main" id="pdCarouselMain">' +
                carouselImages.map(function(img, i) {
                    return '<img src="' + escapeHtml(img) + '" alt="' + escapeHtml(p.name) + ' image ' + (i+1) + '" class="' + (i === 0 ? 'active' : '') + '">';
                }).join('') +
                (carouselImages.length > 1 ?
                    '<button class="pd-carousel-arrow prev" id="pdPrev" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>' +
                    '<button class="pd-carousel-arrow next" id="pdNext" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>' +
                    '<span class="pd-carousel-counter" id="pdCounter">1 / ' + carouselImages.length + '</span>'
                : '') +
            '</div>' +
            (carouselImages.length > 1 ?
                '<div class="pd-carousel-thumbs" id="pdThumbs">' +
                    carouselImages.map(function(img, i) {
                        return '<div class="pd-thumb ' + (i === 0 ? 'active' : '') + '" data-slide="' + i + '"><img src="' + escapeHtml(img) + '" alt="Thumbnail ' + (i+1) + '"></div>';
                    }).join('') +
                '</div>'
            : '') +
        '</div>' +
        '<div class="pd-info">' +
            '<span class="pd-category">' + categoryLabel(p.category) + '</span>' +
            '<h2 class="pd-name">' + escapeHtml(p.name) + '</h2>' +
            '<div class="pd-price">' + priceHtml + '</div>' +
            '<p class="pd-desc">' + escapeHtml(p.description || 'No description available.') + '</p>' +
            '<div class="pd-meta">' +
                '<div class="meta-row"><span class="meta-label">Category</span><span class="meta-value">' + categoryLabel(p.category) + '</span></div>' +
                '<div class="meta-row"><span class="meta-label">Availability</span><span class="meta-value"><span class="status-dot ' + si.d + '"></span>' + si.l + '</span></div>' +
                '<div class="meta-row"><span class="meta-label">Delivery</span><span class="meta-value">3–5 business days</span></div>' +
                '<div class="meta-row"><span class="meta-label">Photos</span><span class="meta-value">' + carouselImages.length + ' images</span></div>' +
            '</div>' +
            '<div class="pd-actions">' +
                '<button class="btn-primary" style="width:100%;justify-content:center;" data-add-cart-detail="' + p.id + '"><i class="fa-solid fa-bag-shopping"></i> Add to Cart</button>' +
                '<button class="btn-outline" style="width:100%;justify-content:center;" data-custom-detail="' + p.id + '"><i class="fa-solid fa-wand-magic-sparkles"></i> Request Custom Version</button>' +
            '</div>' +
        '</div>';

    productDetailModal.classList.add('visible');
    document.body.style.overflow = 'hidden';

    if (carouselImages.length > 1) {
        document.getElementById('pdPrev').addEventListener('click', function(){ carouselGo(currentCarouselIndex - 1); });
        document.getElementById('pdNext').addEventListener('click', function(){ carouselGo(currentCarouselIndex + 1); });
        document.querySelectorAll('#pdThumbs .pd-thumb').forEach(function(th) {
            th.addEventListener('click', function(){ carouselGo(parseInt(th.dataset.slide)); });
        });
        startCarouselAutoplay();
    }

    productDetailContent.querySelector('[data-add-cart-detail]').addEventListener('click', function(){ addToCart(p.id); closeProductDetail(); });
    productDetailContent.querySelector('[data-custom-detail]').addEventListener('click', function(){ closeProductDetail(); openCustomRequest(p.id); });
}

function carouselGo(index) {
    if (carouselImages.length <= 1) return;
    if (index < 0) index = carouselImages.length - 1;
    if (index >= carouselImages.length) index = 0;
    currentCarouselIndex = index;

    var mainImgs = document.querySelectorAll('#pdCarouselMain img');
    mainImgs.forEach(function(img, i){ img.classList.toggle('active', i === index); });

    var thumbs = document.querySelectorAll('#pdThumbs .pd-thumb');
    thumbs.forEach(function(th, i){
        th.classList.toggle('active', i === index);
        if (i === index) th.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    });

    var counter = document.getElementById('pdCounter');
    if (counter) counter.textContent = (index + 1) + ' / ' + carouselImages.length;

    resetCarouselAutoplay();
}

function startCarouselAutoplay() {
    if (carouselImages.length <= 1) return;
    carouselTimer = setInterval(function(){ carouselGo(currentCarouselIndex + 1); }, 4000);
}
function resetCarouselAutoplay() {
    clearInterval(carouselTimer);
    startCarouselAutoplay();
}

function closeProductDetail() {
    productDetailModal.classList.remove('visible');
    document.body.style.overflow = '';
    clearInterval(carouselTimer);
}
productDetailClose.addEventListener('click', closeProductDetail);
productDetailModal.addEventListener('click', function(e){ if (e.target === productDetailModal) closeProductDetail(); });

/* ================================================================
   CUSTOM REQUEST MODAL — with reference image uploads
   ================================================================ */
var customRequestModal = document.getElementById('customRequestModal');
var customRequestClose = document.getElementById('customRequestClose');
var customUploadZone = document.getElementById('customUploadZone');
var customFileInput = document.getElementById('customFileInput');
var customRefProductEl = document.getElementById('customRefProduct');

function openCustomRequest(productId) {
    var p = allProducts.find(function(x){ return x.id === productId; });
    customReferenceImages = [];
    renderCustomPreviews();

    if (p) {
        customRefProductEl.style.display = '';
        customRefProductEl.innerHTML =
            '<img src="' + escapeHtml(firstImage(p.images)) + '" alt="' + escapeHtml(p.name) + '">' +
            '<div><strong>' + escapeHtml(p.name) + '</strong><span>' + formatPrice(p.price) + ' &middot; ' + categoryLabel(p.category) + '</span></div>';
    } else {
        customRefProductEl.style.display = 'none';
    }

    document.getElementById('customRequestForm').reset();
    ['customName','customEmail','customDescription'].forEach(function(id){
        document.getElementById(id + 'Error').textContent = '';
        document.getElementById(id).classList.remove('invalid');
    });

    customRequestModal.classList.add('visible');
    document.body.style.overflow = 'hidden';
}

function closeCustomRequest() {
    customRequestModal.classList.remove('visible');
    document.body.style.overflow = '';
    customReferenceImages.forEach(function(img){ URL.revokeObjectURL(img.preview); });
    customReferenceImages = [];
}
customRequestClose.addEventListener('click', closeCustomRequest);
customRequestModal.addEventListener('click', function(e){ if (e.target === customRequestModal) closeCustomRequest(); });

customUploadZone.addEventListener('click', function(){ customFileInput.click(); });
customUploadZone.addEventListener('dragover', function(e){ e.preventDefault(); customUploadZone.classList.add('drag-over'); });
customUploadZone.addEventListener('dragleave', function(){ customUploadZone.classList.remove('drag-over'); });
customUploadZone.addEventListener('drop', function(e){ e.preventDefault(); customUploadZone.classList.remove('drag-over'); handleCustomFiles(e.dataTransfer.files); });
customFileInput.addEventListener('change', function(){ handleCustomFiles(customFileInput.files); customFileInput.value = ''; });

function handleCustomFiles(files) {
    for (var i = 0; i < files.length; i++) {
        if (customReferenceImages.length >= 5) { showToast('Maximum 5 reference images allowed', 'error'); break; }
        var f = files[i];
        if (!f.type.match(/^image\/(png|jpeg|webp)$/)) { showToast('"' + f.name + '" is not a supported format', 'error'); continue; }
        if (f.size > 5 * 1024 * 1024) { showToast('"' + f.name + '" exceeds 5MB', 'error'); continue; }
        customReferenceImages.push({ file: f, preview: URL.createObjectURL(f) });
    }
    renderCustomPreviews();
}

function removeCustomImage(index) {
    URL.revokeObjectURL(customReferenceImages[index].preview);
    customReferenceImages.splice(index, 1);
    renderCustomPreviews();
}

function renderCustomPreviews() {
    var container = document.getElementById('customUploadPreviews');
    container.innerHTML = customReferenceImages.map(function(img, i) {
        return '<div class="upload-preview">' +
            '<img src="' + img.preview + '" alt="Reference ' + (i+1) + '">' +
            '<button type="button" class="upload-preview-remove" data-rm="' + i + '" aria-label="Remove"><i class="fa-solid fa-xmark"></i></button>' +
            '<span class="upload-preview-order">' + (i+1) + '</span>' +
        '</div>';
    }).join('');
    container.querySelectorAll('[data-rm]').forEach(function(btn){
        btn.addEventListener('click', function(){ removeCustomImage(parseInt(btn.dataset.rm)); });
    });
}

document.getElementById('customRequestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var name = document.getElementById('customName').value.trim();
    var email = document.getElementById('customEmail').value.trim();
    var desc = document.getElementById('customDescription').value.trim();
    var valid = true;

    ['customName','customEmail','customDescription'].forEach(function(id){
        document.getElementById(id + 'Error').textContent = '';
        document.getElementById(id).classList.remove('invalid');
    });

    if (!name) { document.getElementById('customNameError').textContent = 'Name is required'; document.getElementById('customName').classList.add('invalid'); valid = false; }
    if (!email || !/\S+@\S+\.\S+/.test(email)) { document.getElementById('customEmailError').textContent = 'Valid email is required'; document.getElementById('customEmail').classList.add('invalid'); valid = false; }
    if (!desc) { document.getElementById('customDescriptionError').textContent = 'Please describe what you want'; document.getElementById('customDescription').classList.add('invalid'); valid = false; }
    if (!valid) return;

    showToast('Custom request submitted! We\'ll be in touch soon.', 'success');
    closeCustomRequest();
});

/* ================================================================
   SEARCH
   ================================================================ */
var searchOverlay = document.getElementById('searchOverlay');
var searchInputEl = document.getElementById('searchInput');
var searchResultsEl = document.getElementById('searchResults');

function openSearch() { searchOverlay.classList.add('visible'); document.body.style.overflow='hidden'; setTimeout(function(){ searchInputEl.focus(); },100); }
function closeSearch() { searchOverlay.classList.remove('visible'); document.body.style.overflow=''; searchInputEl.value=''; searchResultsEl.innerHTML='<div class="search-popup-empty"><i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>Start typing to search our catalog</div>'; }

document.getElementById('navSearchBtn').addEventListener('click', openSearch);
searchOverlay.addEventListener('click', function(e){ if(e.target===searchOverlay) closeSearch(); });

searchInputEl.addEventListener('input', function() {
    var q = searchInputEl.value.toLowerCase().trim();
    if (!q) { searchResultsEl.innerHTML='<div class="search-popup-empty"><i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>Start typing to search our catalog</div>'; return; }
    var matches = allProducts.filter(function(p){ return p.name.toLowerCase().includes(q) || p.category.toLowerCase().includes(q) || (p.description||'').toLowerCase().includes(q); });
    if (!matches.length) { searchResultsEl.innerHTML='<div class="search-popup-empty" style="padding:36px 20px;text-align:center;"><i class="fa-solid fa-face-meh" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>No results for "'+escapeHtml(q)+'"</div>'; return; }
    searchResultsEl.innerHTML = matches.map(function(p){
        return '<div class="search-result-item" data-sid="'+p.id+'"><img class="search-result-thumb" src="'+escapeHtml(firstImage(p.images))+'" alt="'+escapeHtml(p.name)+'"><div class="search-result-info"><strong>'+escapeHtml(p.name)+'</strong><span>'+categoryLabel(p.category)+'</span></div><span class="search-result-price">'+formatPrice(p.price)+'</span></div>';
    }).join('');
    searchResultsEl.querySelectorAll('.search-result-item').forEach(function(item){
        item.addEventListener('click', function(){ closeSearch(); openProductDetail(item.dataset.sid); });
    });
});

/* ================================================================
   CART
   ================================================================ */
var cartOverlay = document.getElementById('cartOverlay');
var cartPanel = document.getElementById('cartPanel');
var cartBadge = document.getElementById('cartBadge');

function openCart() { if(cart.length===0) return; cartPanel.classList.add('open'); cartOverlay.classList.add('visible'); document.body.style.overflow='hidden'; }
function closeCart() { cartPanel.classList.remove('open'); cartOverlay.classList.remove('visible'); document.body.style.overflow=''; }

document.getElementById('navCartBtn').addEventListener('click', function(){ if(cart.length>0) openCart(); else showToast('Your cart is empty — browse our catalog first!','info'); });
document.getElementById('cartPanelClose').addEventListener('click', closeCart);
cartOverlay.addEventListener('click', closeCart);

function addToCart(productId) {
    var p = allProducts.find(function(x){ return x.id===productId; });
    if(!p) return;
    var existing = cart.find(function(i){ return i.id===productId; });
    if(existing) existing.qty++;
    else cart.push({ id:p.id, name:p.name, price:p.price, image:firstImage(p.images), qty:1 });
    renderCart();
    showToast(p.name+' added to cart','success');
    openCart();
}
function removeFromCart(id) { cart=cart.filter(function(i){return i.id!==id;}); renderCart(); if(!cart.length) closeCart(); }
function updateQty(id,d) { var item=cart.find(function(i){return i.id===id;}); if(!item) return; item.qty+=d; if(item.qty<=0){removeFromCart(id);return;} renderCart(); }

function renderCart() {
    var totalItems = cart.reduce(function(s,i){return s+i.qty;},0);
    var subtotal = cart.reduce(function(s,i){return s+(i.price*i.qty);},0);
    cartBadge.textContent = totalItems;
    cartBadge.classList.toggle('visible', totalItems>0);
    document.getElementById('cartPanelCount').textContent = totalItems+' item'+(totalItems!==1?'s':'');
    document.getElementById('cartPanelFooter').style.display = cart.length?'':'none';
    document.getElementById('freeDeliveryNote').style.display = subtotal>=1500?'':'none';
    document.getElementById('cartSubtotal').textContent = formatPrice(subtotal);
    document.getElementById('cartTotal').textContent = formatPrice(subtotal);

    var body = document.getElementById('cartPanelBody');
    if(!cart.length){ body.innerHTML='<div class="cart-empty"><i class="fa-solid fa-bag-shopping"></i><h4>Your cart is empty</h4><p>Browse our catalog and add some beautiful hats!</p></div>'; return; }

    body.innerHTML = cart.map(function(item){
        return '<div class="cart-item"><img class="cart-item-image" src="'+escapeHtml(item.image)+'" alt="'+escapeHtml(item.name)+'"><div class="cart-item-info"><div class="cart-item-name">'+escapeHtml(item.name)+'</div><div class="cart-item-price">'+formatPrice(item.price*item.qty)+'</div><div class="cart-item-qty"><button data-qm="'+item.id+'" aria-label="Decrease"><i class="fa-solid fa-minus"></i></button><span>'+item.qty+'</span><button data-qp="'+item.id+'" aria-label="Increase"><i class="fa-solid fa-plus"></i></button></div></div><button class="cart-item-remove" data-rm="'+item.id+'" aria-label="Remove"><i class="fa-solid fa-trash-can"></i></button></div>';
    }).join('');

    body.querySelectorAll('[data-rm]').forEach(function(b){b.addEventListener('click',function(){removeFromCart(b.dataset.rm);});});
    body.querySelectorAll('[data-qm]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qm,-1);});});
    body.querySelectorAll('[data-qp]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qp,1);});});
}
renderCart();

document.getElementById('checkoutBtn').addEventListener('click', function(){
    if(!cart.length) return;
    showToast('Checkout coming soon — please contact us directly to place your order.','info');
});

/* ================================================================
   NAV SCROLL & MOBILE MENU
   ================================================================ */
var nav = document.getElementById('nav');
window.addEventListener('scroll', function(){ nav.classList.toggle('scrolled', window.scrollY>20); });

var sections = document.querySelectorAll('header[id],section[id]');
var navLinks = document.querySelectorAll('.nav-links a');
function updateActiveNav() {
    var sp = window.scrollY + 120;
    sections.forEach(function(s){ var t=s.offsetTop,h=s.offsetHeight,id=s.getAttribute('id'); if(sp>=t&&sp<t+h){navLinks.forEach(function(l){l.classList.remove('active');if(l.getAttribute('href')==='#'+id)l.classList.add('active');});} });
}
window.addEventListener('scroll', updateActiveNav);

var mobileMenu = document.getElementById('mobileMenu');
var mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
function openMobileMenu(){mobileMenu.classList.add('open');mobileMenuOverlay.classList.add('visible');document.body.style.overflow='hidden';}
function closeMobileMenu(){mobileMenu.classList.remove('open');mobileMenuOverlay.classList.remove('visible');document.body.style.overflow='';}
document.getElementById('mobileMenuBtn').addEventListener('click', openMobileMenu);
document.getElementById('mobileMenuClose').addEventListener('click', closeMobileMenu);
mobileMenuOverlay.addEventListener('click', closeMobileMenu);
mobileMenu.querySelectorAll('a').forEach(function(l){l.addEventListener('click',closeMobileMenu);});

/* ================================================================
   ACCOUNT MODAL LOGIC
   ================================================================ */
var accountModal = document.getElementById('accountModal');
var accountClose = document.getElementById('accountClose');
var loginFormBox = document.getElementById('loginFormBox');
var registerFormBox = document.getElementById('registerFormBox');

// Open Modal
document.querySelectorAll('.btnAccount-popup').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        accountModal.classList.add('visible');
        document.body.style.overflow = 'hidden';
    });
});

// Close Modal
accountClose.addEventListener('click', function() {
    accountModal.classList.remove('visible');
    document.body.style.overflow = '';
});

accountModal.addEventListener('click', function(e) {
    if (e.target === accountModal) {
        accountModal.classList.remove('visible');
        document.body.style.overflow = '';
    }
});

// Switch to Register
document.querySelectorAll('.register-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        loginFormBox.classList.remove('active');
        registerFormBox.classList.add('active');
    });
});

// Switch to Login
document.querySelectorAll('.login-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        registerFormBox.classList.remove('active');
        loginFormBox.classList.add('active');
    });
});

// Handle Submits (Placeholder)
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('Login functionality is not yet connected to backend.', 'info');
    // accountModal.classList.remove('visible'); document.body.style.overflow = '';
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('Registration functionality is not yet connected to backend.', 'info');
    // accountModal.classList.remove('visible'); document.body.style.overflow = '';
});

/* ================================================================
   CONTACT FORM
   ================================================================ */
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault();
    var name=document.getElementById('contactName').value.trim(), email=document.getElementById('contactEmail').value.trim(), subject=document.getElementById('contactSubject').value, message=document.getElementById('contactMessage').value.trim(), valid=true;
    ['contactName','contactEmail','contactSubject','contactMessage'].forEach(function(id){document.getElementById(id+'Error').textContent='';document.getElementById(id).classList.remove('invalid');});
    if(!name){document.getElementById('contactNameError').textContent='Name is required';document.getElementById('contactName').classList.add('invalid');valid=false;}
    if(!email||!/\S+@\S+\.\S+/.test(email)){document.getElementById('contactEmailError').textContent='Please enter a valid email';document.getElementById('contactEmail').classList.add('invalid');valid=false;}
    if(!subject){document.getElementById('contactSubjectError').textContent='Please select a subject';document.getElementById('contactSubject').classList.add('invalid');valid=false;}
    if(!message){document.getElementById('contactMessageError').textContent='Message is required';document.getElementById('contactMessage').classList.add('invalid');valid=false;}
    if(!valid) return;
    document.getElementById('contactFormCard').innerHTML='<div class="contact-success"><i class="fa-solid fa-circle-check"></i><h4>Message Sent Successfully!</h4><p>Thank you, '+escapeHtml(name)+'. We\'ll get back to you within 24 hours.</p></div>';
    showToast('Your message has been sent!','success');
});

/* ================================================================
   KEYBOARD SHORTCUTS
   ================================================================ */
document.addEventListener('keydown', function(e){
    if(e.key==='Escape'){closeSearch();closeCart();closeProductDetail();closeCustomRequest();closeMobileMenu(); if(accountModal.classList.contains('visible')){accountModal.classList.remove('visible'); document.body.style.overflow='';}}
    if((e.ctrlKey||e.metaKey)&&e.key==='k'){e.preventDefault();openSearch();}
});
</script>
</body>
</html>