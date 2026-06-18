<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Orders | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/support/custom_orders.css">
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
            <li><a href="index.php#contact">Contact Us</a></li>
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
        <a href="index.php#home">Home</a>
        <a href="index.php#about">About</a>
        <a href="index.php#catalog">Catalog</a>
        <a href="index.php#contact">Contact Us</a>
    </div>
</div>

<!-- ======================== CUSTOM ORDERS HEADER ======================== -->
<header class="page-header">
    <div class="section-container">
        <div class="section-label">Bespoke Service</div>
        <h1 class="section-header" style="font-size: 3rem;">Create Something Unique</h1>
        <p class="section-subheader" style="margin: 0 auto;">Collaborate with Hattie to design a one-of-a-kind piece tailored specifically to your style and occasion.</p>
    </div>
</header>

<!-- ======================== CUSTOM ORDER FORM ======================== -->
<section class="custom-section">
    <div class="section-container">
        <div class="custom-grid">
            
            <!-- Left Side: Process Info -->
            <div class="process-info">
                <div class="section-label">How It Works</div>
                <h2 style="font-size: 2rem; margin-bottom: 32px; color: var(--fg);">From Vision to Reality</h2>
                
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h3>The Consultation</h3>
                        <p>Fill out the form with your details, occasion, and inspiration. The more details you provide, the better we can understand your vision.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h3>The Design</h3>
                        <p>We will review your request and contact you within 48 hours to discuss materials, colors, pricing, and timelines. A digital sketch may be provided.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h3>The Creation</h3>
                        <p>Once the design is finalized and a deposit is paid, Hattie begins crafting your hat by hand. This process typically takes 2-4 weeks.</p>
                    </div>
                </div>

                <div style="margin-top: 40px; padding: 24px; background: var(--cream); border-radius: var(--radius-md); border: 1px solid var(--border-light);">
                    <i class="fa-solid fa-circle-info" style="color: var(--red); margin-right: 8px;"></i>
                    <span style="font-size: 0.9rem; color: var(--fg-secondary); font-weight: 500;">
                        Please note: Custom orders are non-refundable unless defective. A 50% deposit is required to commence work.
                    </span>
                </div>
            </div>

            <!-- Right Side: The Form -->
            <div class="custom-form-card">
                <h3 style="font-size: 1.5rem; margin-bottom: 24px; color: var(--fg);">Start Your Request</h3>
                
                <form action="#" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" class="form-input" placeholder="e.g. Jane Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-input" placeholder="jane@example.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-input" placeholder="+27 (0) 83 123 4567">
                        </div>
                        <div class="form-group">
                            <label for="date">Date Needed By</label>
                            <input type="date" id="date" class="form-input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="occasion">Occasion</label>
                        <select id="occasion" class="form-input">
                            <option value="">Select an occasion...</option>
                            <option value="wedding">Wedding (Guest/Mother of Bride)</option>
                            <option value="raceday">Raceday / Derby</option>
                            <option value="bridal">Bridal / Bachelorette</option>
                            <option value="church">Church / High Tea</option>
                            <option value="photoshoot">Photoshoot</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="budget">Estimated Budget (ZAR)</label>
                        <input type="text" id="budget" class="form-input" placeholder="e.g. R 1500 - R 2500">
                    </div>

                    <div class="form-group">
                        <label for="description">Describe Your Vision</label>
                        <textarea id="description" class="form-input" placeholder="Tell us about colors, style preferences, size, and any specific details you have in mind..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Inspiration Images</label>
                        <div class="upload-zone" id="uploadZone">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <p>Drag & drop images here, or click to browse</p>
                            <span>SVG, PNG, JPG or GIF (max. 10MB)</span>
                            <input type="file" id="fileInput" multiple accept="image/*">
                        </div>
                        <div class="upload-previews" id="uploadPreviews">
                            <!-- Previews will appear here dynamically -->
                        </div>
                    </div>

                    <button type="submit" class="btn-full">
                        Submit Request <i class="fa-solid fa-paper-plane"></i>
                    </button>

                    <p style="text-align: center; margin-top: 16px; font-size: 0.85rem; color: var(--fg-muted);">
                        By submitting, you agree to our custom order terms.
                    </p>
                </form>
            </div>

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
            <a href="/api/support/custom_orders.php" aria-current="page">Custom Orders</a>
        </div>
        <div class="footer-col">
            <h4>Support</h4>
            <a href="/api/support/return_policy.php">Return Policy</a>
            <a href="/api/support/shipping_info.php">Shipping Info</a>
            <a href="/index.php#contact">Contact Us</a>
            <a href="/api/support/faq.php">FAQ</a>
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

        /* --- File Upload Zone Logic --- */
        const uploadZone = document.getElementById('uploadZone');
        const fileInput = document.getElementById('fileInput');
        const uploadPreviews = document.getElementById('uploadPreviews');

        // Drag & Drop effects
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadZone.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadZone.addEventListener(eventName, () => uploadZone.classList.add('drag-over'), false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadZone.addEventListener(eventName, () => uploadZone.classList.remove('drag-over'), false);
        });

        // Handle Drop
        uploadZone.addEventListener('drop', handleDrop, false);
        
        // Handle Click/Input
        fileInput.addEventListener('change', handleFiles, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles({ target: { files: files } });
        }

        function handleFiles(e) {
            const files = [...e.target.files];
            files.forEach(previewFile);
        }

        function previewFile(file) {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = function() {
                const div = document.createElement('div');
                div.className = 'upload-preview';
                
                const img = document.createElement('img');
                img.src = reader.result;
                
                const removeBtn = document.createElement('div');
                removeBtn.className = 'upload-preview-remove';
                removeBtn.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                removeBtn.onclick = function() {
                    div.remove();
                };

                div.appendChild(img);
                div.appendChild(removeBtn);
                uploadPreviews.appendChild(div);
            }
        }
    });
</script>

</body>
</html>