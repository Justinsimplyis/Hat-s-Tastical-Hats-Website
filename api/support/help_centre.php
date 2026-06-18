<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Centre | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/support/help_centre.css">
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

<!-- ======================== HELP HERO ======================== -->
<section class="help-hero">
    <div class="section-container">
        <div class="section-label">Knowledge Base</div>
        <h1>Hello, how can we help?</h1>
        <p>Search our articles for answers to your questions about orders, shipping, and product care.</p>
        
        <div class="search-container-large">
            <input type="text" class="search-large" placeholder="Type your question here (e.g., 'How to clean felt hat')...">
            <button class="search-icon-btn" onclick="alert('Search functionality would trigger here.')">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
</section>

<!-- ======================== HELP CONTENT ======================== -->
<section class="help-content">
    <div class="section-container">
        
        <!-- Categories -->
        <div class="help-categories">
            <a href="/api/support/shipping_info.php" class="help-cat-card">
                <div class="cat-icon"><i class="fa-solid fa-truck-fast"></i></div>
                <h3 class="cat-title">Orders & Shipping</h3>
                <p class="cat-desc">Track your package, change delivery address, or view shipping rates.</p>
            </a>

            <a href="/api/support/returns_policy.php" class="help-cat-card">
                <div class="cat-icon"><i class="fa-solid fa-rotate-left"></i></div>
                <h3 class="cat-title">Returns & Refunds</h3>
                <p class="cat-desc">Learn about our 70% refund policy and how to initiate a return.</p>
            </a>

            <a href="/api/support/faq.php" class="help-cat-card">
                <div class="cat-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                <h3 class="cat-title">Product Care</h3>
                <p class="cat-desc">Tips on cleaning, storing, and maintaining your hat's shape.</p>
            </a>
        </div>

        <!-- Popular Articles -->
        <div class="popular-articles">
            <h3>Popular Articles</h3>
            
            <a href="custom_orders.php" class="article-row">
                <div class="article-info">
                    <h4>How do I place a custom order?</h4>
                    <p>Step-by-step guide to designing your bespoke hat.</p>
                </div>
                <div class="article-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            </a>

            <a href="faq.php" class="article-row">
                <div class="article-info">
                    <h4>How do I measure my head size?</h4>
                    <p>Instructions for finding the perfect fit for your hat.</p>
                </div>
                <div class="article-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            </a>

            <a href="shipping_info.php" class="article-row">
                <div class="article-info">
                    <h4>Do you offer free shipping?</h4>
                    <p>Information on our free delivery threshold (R 1,500+).</p>
                </div>
                <div class="article-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            </a>

            <a href="faq.php" class="article-row">
                <div class="article-info">
                    <h4>Can I wear a hat in the rain?</h4>
                    <p>Advice on protecting your wool felt and straw hats from water damage.</p>
                </div>
                <div class="article-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            </a>

            <a href="return_policy.php" class="article-row">
                <div class="article-info">
                    <h4>What is the return time frame?</h4>
                    <p>You have 14 days from delivery to return your item.</p>
                </div>
                <div class="article-arrow"><i class="fa-solid fa-chevron-right"></i></div>
            </a>

        </div>

        <!-- Bottom CTA -->
        <div class="contact-cta-banner">
            <h2>Still need help?</h2>
            <p>If you couldn't find the answer you were looking for, our support team is ready to assist you.</p>
            <a href="/index.php#contact" class="btn-white-outline">
                Contact Support <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>

<!-- ======================== FOOTER ======================== -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-col footer-brand">
            <a href="index.php" class="nav-logo">
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
            <a href="/api/support/help_centre.php" aria-current="page">Help Centre</a>
            <a href="/api/support/returns_policy.php">Return Policy</a>
            <a href="/api/support/shipping_info.php">Shipping Info</a>
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