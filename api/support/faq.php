<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ | Hattie's Hats'tastical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="/assets/css/support/faq.css">
</head>
<body>

<!-- ======================== NAVIGATION ======================== -->
<nav class="nav" id="nav">
    <div class="nav-inner">
        <a href="index.php" class="nav-logo">
             <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
            <span class="logo-text">
                <span class="nav-logo-name">Hattie's</span>
                <span class="nav-logo-tagline">Hat'istical Hats</span>
            </span>
        </a>             
        
        <ul class="nav-links">
            <li><a href="/index.php#home">Home</a></li>
            <li><a href="/index.php#about">About</a></li>
            <li><a href="/index.php#catalog">Catalog</a></li>
            <li><a href="/index.php#contact">Contact Us</a></li>
        </ul>
        <div class="nav-actions">

        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="index.php" class="nav-logo">
            <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
        </a>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="mobile-menu-links">
        <a href="/index.php#home">Home</a>
        <a href="/index.php#about">About</a>
        <a href="/index.php#catalog">Catalog</a>
        <a href="/index.php#contact">Contact Us</a>
    </div>
    <div class="mobile-menu-footer">        
    </div>
</div>

<!-- ======================== FAQ HEADER ======================== -->
<section class="page-header">
    <div class="section-container">
        <div class="section-label">Help Center</div>
        <h1 class="section-header" style="font-size: 3rem;">Frequently Asked Questions</h1>
        <p class="section-subheader" style="margin: 0 auto;">Find answers to common questions about our hats, orders, and shipping.</p>
    </div>
</section>

<!-- ======================== FAQ CONTENT ======================== -->
<section class="faq-section">
    <div class="section-container">
        <div class="faq-grid">
            
            <!-- Column 1: Orders & Shipping -->
            <div class="faq-column">
                <h3 class="faq-category-title">
                    <i class="fa-solid fa-box-open"></i> Orders & Shipping
                </h3>

                <details open>
                    <summary>How long does delivery take?</summary>
                    <p>For major cities (Johannesburg, Cape Town, Durban), delivery typically takes 2-3 business days. Regional areas may take 3-5 business days. Please note that custom orders require an additional 3-5 business days for crafting before shipping.</p>
                </details>

                <details>
                    <summary>Do you ship internationally?</summary>
                    <p>Currently, we primarily ship within South Africa. However, if you are located abroad and fall in love with one of our pieces, please <a href="/index.php#contact" style="color:var(--red); font-weight:600;">contact us</a> directly for a custom shipping quote via DHL or FedEx.</p>
                </details>

                <details>
                    <summary>How do I track my order?</summary>
                    <p>Once your order is dispatched, you will receive an email with your tracking number. You can enter this number on our <a href="/api/support/shipping_info.php" style="color:var(--red); font-weight:600;">Shipping Info</a> page to track your parcel's journey.</p>
                </details>

                <details>
                    <summary>Can I cancel my order?</summary>
                    <p>You may cancel your order within 12 hours of placing it, provided it has not yet been processed or shipped. After this window, please refer to our <a href="/api/support/return_policy.php" style="color:var(--red); font-weight:600;">Return Policy</a>.</p>
                </details>

                <details>
                    <summary>What payment methods do you accept?</summary>
                    <p>We accept EFT (Electronic Funds Transfer), Credit/Debit cards (Visa & Mastercard), and Instant EFT via PayFast or Yoco.</p>
                </details>
            </div>

            <!-- Column 2: Product & Care -->
            <div class="faq-column">
                <h3 class="faq-category-title">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> Product & Care
                </h3>

                <details open>
                    <summary>How do I care for my hat?</summary>
                    <p>Store your hat in a cool, dry place away from direct sunlight to prevent fading. If it gets dusty, use a soft brush to gently wipe it away. For felt hats, you can use a slightly damp cloth. Avoid getting straw hats wet.</p>
                </details>

                <details>
                    <summary>How do I know my hat size?</summary>
                    <p>Measure the circumference of your head about 1cm above your eyebrows and ears, where the hat naturally sits. Use a soft tape measure. If you are between sizes, we generally recommend sizing up and using the adjustable inner band (if included).</p>
                </details>

                <details>
                    <summary>Can I wear a hat with a large fascinator?</summary>
                    <p>Our fascinators are designed to be worn on the side of the head, often with a headband or comb. They can be paired with a smaller base hat, but we generally recommend wearing them alone to let the intricate millinery work shine.</p>
                </details>

                <details>
                    <summary>Are the materials sustainable?</summary>
                    <p>We strive to use high-quality, sustainable materials where possible, including wool felt, sinamay (natural straw fiber), and ethically sourced feathers. We also upcycle vintage trims in our limited edition collections.</p>
                </details>

                <details>
                    <summary>Do you repair hats?</summary>
                    <p>We offer repair services for hats purchased from our store. If your hat needs a little TLC (reblocking, retrimming), please <a href="/index.php#contact" style="color:var(--red); font-weight:600;">contact us</a> for a quote.</p>
                </details>
            </div>

        </div>

        <!-- CTA Section -->
        <div class="faq-contact-cta">
            <h2>Still have questions?</h2>
            <p>We're just a click away. Chat to us about sizing, custom orders, or anything else on your mind.</p>
            <a href="/index.php#contact" class="btn-white">
                Contact Support <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

<!-- ======================== FOOTER ======================== -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col footer-brand">
            <a href="/index.php" class="nav-logo">
                <span class="logo-text">
                    <span class="nav-logo-name">Hattie's</span>
                    <span class="nav-logo-tagline">Hat'istical Hats</span>
                </span>
            </a>
            <p>Handcrafted millinery for the bold and the beautiful. Designed in South Africa with love and precision.</p>
        </div>
        <div class="footer-col">
            <h4>Shop</h4>
            <a href="/index.php#catalog">All Products</a>
            <a href="#">New Arrivals</a>
            <a href="#">Best Sellers</a>
            <a href="/api/support/custom_orders.php">Custom Orders</a>
        </div>
        <div class="footer-col">
            <h4>Support</h4>
            <a href="/api/support/returns_policy.php">Return Policy</a>
            <a href="/api/support/shipping_info.php">Shipping Info</a>
            <a href="/api/support/faq.php" aria-current="page">FAQ</a>
            <a href="/index.php#contact">Contact Us</a>
        </div>
        <div class="footer-col">
            <h4>Connect</h4>
            <a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fa-brands fa-pinterest"></i> Pinterest</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; 2023 Hattie's Hat'istical Hats. All rights reserved.</span>
        <span>Designed with <i class="fa-solid fa-heart" style="color:var(--red)"></i> in South Africa</span>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        /* --- Navigation Logic --- */
        const nav = document.getElementById('nav');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        const mobileMenuClose = document.getElementById('mobileMenuClose');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('open');
            if (isOpen) {
                mobileMenu.classList.remove('open');
                mobileMenuOverlay.classList.remove('visible');
                document.body.style.overflow = '';
            } else {
                mobileMenu.classList.add('open');
                mobileMenuOverlay.classList.add('visible');
                document.body.style.overflow = 'hidden';
            }
        }

        mobileMenuBtn.addEventListener('click', toggleMenu);
        mobileMenuClose.addEventListener('click', toggleMenu);
        mobileMenuOverlay.addEventListener('click', toggleMenu);
    });
</script>

</body>
</html>