<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>Shopping Cart — Hattie's Hat'istical Hats</title>    
    <style>
        /* Importing the same design tokens and base layout */
        :root {
            --red:#C93B39;--red-hover:#DA4E4C;
            --red-light:rgba(201,59,57,.10);
            --red-muted:rgba(201,59,57,.06);
            --pink:#CFA1A8;
            --pink-light:rgba(207,161,168,.18);
            --pink-muted:rgba(207,161,168,.10);
            --bg:#FFF8F6;
            --bg-elevated:#FFFFFF;
            --card:#FFFFFF;
            --topbar-bg:rgba(255,248,246,.88);
            --cream:#FFF0ED;
            --cream-dark:#FFE8E3;
            --cream-deeper:#FFDCD5;
            --fg:#2A1F21;
            --fg-secondary:#6B5558;
            --fg-muted:#9A8588;
            --border:#F0DDD8;
            --border-light:#F8EDEA;

            --shadow-sm:0 1px 3px rgba(42,31,33,.06);
            --shadow-md:0 4px 12px rgba(42,31,33,.08);
            --shadow-lg:0 12px 32px rgba(42,31,33,.12);
            --shadow-xl:0 24px 48px rgba(42,31,33,.16);
            --radius-sm:6px;
            --radius-md:10px;
            --radius-lg:16px;
            --radius-xl:24px;
            --radius-full:9999px;
            --ease:cubic-bezier(.4,0,.2,1);
            --duration:.2s;
            --nav-height:72px;
            --container:1200px;
            --sidebar-width:260px;
        }
        *,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
        html{font-size:15px;-webkit-font-smoothing:antialiased;scroll-behavior:smooth}
        body{font-family:'Segoe UI',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--fg);line-height:1.65;overflow-x:hidden}
        a{color:inherit;text-decoration:none}
        button{font:inherit;border:none;background:none;cursor:pointer;color:inherit}
        img{max-width:100%;display:block}
        ul{list-style:none}
        ::-webkit-scrollbar{width:6px}
        ::-webkit-scrollbar-track{background:transparent}
        ::-webkit-scrollbar-thumb{background:var(--cream-deeper);border-radius:6px}

        /* SIDEBAR NAV */
        .sidebar{position:fixed;top:0;left:0;bottom:0;width:var(--sidebar-width);background:var(--bg-elevated);border-right:1px solid var(--border-light);z-index:1000;display:flex;flex-direction:column;padding:32px 20px;box-shadow:2px 0 12px rgba(42,31,33,.04);transition:transform .35s var(--ease)}
        .sidebar-logo{display:flex;align-items:center;gap:10px;margin-bottom:48px;padding:0 12px}
        .nav-logo-img{height:40px;width:auto;object-fit:contain}
        .nav-logo-text{display:flex;flex-direction:column;line-height:1.15}
        .nav-logo-name{font-size:1rem;font-weight:700;color:var(--fg);letter-spacing:-.01em}
        .nav-logo-tagline{font-size:.65rem;font-weight:600;color:var(--pink);letter-spacing:.03em}
        .sidebar-links{display:flex;flex-direction:column;gap:6px;flex:1}
        .sidebar-links a{padding:12px 16px;border-radius:var(--radius-md);font-size:.95rem;font-weight:500;color:var(--fg-secondary);transition:all var(--duration) var(--ease);display:flex;align-items:center;gap:12px}
        .sidebar-links a:hover{background:var(--cream);color:var(--fg)}
        .sidebar-links a i{width:20px;text-align:center}
        .sidebar-actions{display:flex;flex-direction:column;gap:12px;margin-top:auto;padding-top:24px;border-top:1px solid var(--border-light)}
        .sidebar-action-btn{width:100%;padding:12px 16px;border-radius:var(--radius-md);font-size:.95rem;font-weight:500;color:var(--fg-secondary);transition:all var(--duration) var(--ease);display:flex;align-items:center;gap:12px;position:relative;text-align:left}
        .sidebar-action-btn:hover{background:var(--cream);color:var(--fg)}
        .sidebar-action-btn i{width:20px;text-align:center}
        .cart-badge{position:absolute;top:50%;transform:translateY(-50%);right:16px;width:18px;height:18px;border-radius:50%;background:var(--red);color:#fff;font-size:.62rem;font-weight:700;display:flex;align-items:center;justify-content:center;opacity:0;transform:scale(.5) translateY(-50%);transition:all .25s var(--ease);pointer-events:none}
        .cart-badge.visible{opacity:1;transform:scale(1) translateY(-50%)}
        .btn-nav-account{padding:12px 16px;border-radius:var(--radius-md);background:var(--red);color:#fff;font-size:.95rem;font-weight:600;transition:all var(--duration) var(--ease);width:100%;display:flex;align-items:center;justify-content:flex-start;gap:12px}
        .btn-nav-account:hover{background:var(--red-hover)}
        .btn-nav-account i{width:20px;text-align:center}
        
        .mobile-sidebar-toggle{display:none;position:fixed;top:20px;left:20px;z-index:1001;width:44px;height:44px;border-radius:var(--radius-md);background:var(--bg-elevated);border:1px solid var(--border);align-items:center;justify-content:center;font-size:1.2rem;color:var(--fg);box-shadow:var(--shadow-sm)}
        .sidebar-overlay{display:none;position:fixed;inset:0;background:rgba(42,31,33,.4);backdrop-filter:blur(4px);z-index:999;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
        .sidebar-overlay.visible{opacity:1;visibility:visible}

        /* Section Common */
        .section-container{max-width:var(--container);margin:0 auto;padding:0 32px}
        .section-header{font-size:2rem;font-weight:700;color:var(--fg);letter-spacing:-.02em;margin-bottom:8px}
        .section-subheader{font-size:1rem;color:var(--fg-muted);margin-bottom:40px}
        .section-label{display:inline-flex;align-items:center;gap:8px;font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:var(--red);margin-bottom:12px}
        .section-label::before{content:'';width:24px;height:2px;background:var(--red);border-radius:2px}

        /* Buttons */
        .btn-primary{display:inline-flex;align-items:center;gap:8px;padding:14px 32px;border-radius:var(--radius-full);background:var(--red);color:#fff;font-size:.92rem;font-weight:600;transition:all var(--duration) var(--ease);justify-content:center;width:100%}
        .btn-primary:hover{background:var(--red-hover);transform:translateY(-2px);box-shadow:0 8px 24px rgba(201,59,57,.3)}
        .btn-outline{display:inline-flex;align-items:center;gap:8px;padding:14px 32px;border-radius:var(--radius-full);background:var(--bg-elevated);color:var(--fg);font-size:.92rem;font-weight:600;border:1.5px solid var(--border);transition:all var(--duration) var(--ease);justify-content:center;width:100%;margin-top:12px}
        .btn-outline:hover{border-color:var(--red);color:var(--red);background:var(--red-light)}

        /* Cart Page Specifics */
        .cart-page-section{padding-top:60px;padding-bottom:100px;min-height:100vh;margin-left:var(--sidebar-width)}
        .cart-page-grid{display:grid;grid-template-columns:1.6fr 1fr;gap:32px;align-items:start}
        
        /* List Container */
        .cart-list-card{background:var(--bg-elevated);border:1px solid var(--border-light);border-radius:var(--radius-xl);box-shadow:var(--shadow-sm);padding:8px 32px}
        .cart-row{display:flex;gap:24px;padding:24px 0;border-bottom:1px solid var(--border-light);align-items:center}
        .cart-row:last-child{border-bottom:none}
        .cart-row-img{width:90px;height:110px;border-radius:var(--radius-md);object-fit:cover;flex-shrink:0;background:var(--cream)}
        .cart-row-info{flex:1}
        .cart-row-category{font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--pink);margin-bottom:4px}
        .cart-row-name{font-size:1.1rem;font-weight:700;color:var(--fg);margin-bottom:8px}
        .cart-row-price{font-size:.95rem;color:var(--red);font-weight:600}
        
        .cart-item-qty{display:flex;align-items:center;border:1px solid var(--border);border-radius:var(--radius-sm);overflow:hidden;width:fit-content;margin-top:12px}
        .cart-item-qty button{width:32px;height:32px;display:flex;align-items:center;justify-content:center;font-size:.75rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease)}
        .cart-item-qty button:hover{background:var(--cream);color:var(--fg)}
        .cart-item-qty span{width:36px;text-align:center;font-size:.85rem;font-weight:600;color:var(--fg);border-left:1px solid var(--border);border-right:1px solid var(--border);line-height:32px}
        
        .cart-row-actions{display:flex;flex-direction:column;align-items:flex-end;gap:16px}
        .cart-row-total{font-size:1.05rem;font-weight:700;color:var(--fg);text-align:right}
        .cart-item-remove{width:34px;height:34px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:.9rem;transition:all var(--duration) var(--ease)}
        .cart-item-remove:hover{background:rgba(201,59,57,.1);color:var(--red)}

        /* Summary Container */
        .cart-summary-card{background:var(--bg-elevated);border:1px solid var(--border-light);border-radius:var(--radius-xl);padding:32px;box-shadow:var(--shadow-sm);position:sticky;top:20px}
        .cart-summary-card h4{font-size:1.3rem;font-weight:700;color:var(--fg);margin-bottom:24px;padding-bottom:20px;border-bottom:1px solid var(--border-light)}
        .cart-subtotal{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px}
        .cart-subtotal label{font-size:.9rem;color:var(--fg-secondary)}
        .cart-subtotal span{font-size:.95rem;font-weight:600;color:var(--fg)}
        .cart-total{display:flex;justify-content:space-between;align-items:center;margin:20px 0;padding-top:20px;border-top:1px solid var(--border-light)}
        .cart-total label{font-size:1.1rem;font-weight:700;color:var(--fg)}
        .cart-total span{font-size:1.4rem;font-weight:800;color:var(--red)}
        .cart-free-delivery{text-align:center;margin-top:16px;font-size:.8rem;color:var(--fg-muted);background:var(--cream);padding:10px;border-radius:var(--radius-md)}
        .cart-free-delivery i{color:#6BCB8B;margin-right:4px}

        /* Empty State */
        .catalog-empty{text-align:center;padding:80px 20px;color:var(--fg-muted)}
        .catalog-empty i{font-size:3rem;margin-bottom:16px;opacity:.35;display:block}
        .catalog-empty h4{font-size:1.1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}

        /* Footer */
        .footer{background:var(--fg);color:rgba(255,255,255,.7);padding:40px 0;margin-top:auto;margin-left:var(--sidebar-width)}
        .footer-inner{max-width:var(--container);margin:0 auto;padding:0 32px;display:flex;align-items:center;justify-content:space-between}
        .footer-brand .nav-logo-name{color:#fff}
        .footer-brand .nav-logo-tagline{color:var(--pink)}
        .footer-bottom{font-size:.82rem;width:100%;text-align:right}

        /* Search Overlay */
        .search-overlay{position:fixed;inset:0;z-index:2000;background:rgba(42,31,33,.5);backdrop-filter:blur(10px);display:flex;align-items:flex-start;justify-content:center;padding-top:14vh;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
        .search-overlay.visible{opacity:1;visibility:visible}
        .search-popup{width:100%;max-width:580px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-lg);box-shadow:var(--shadow-xl);overflow:hidden;transform:translateY(-12px) scale(.98);transition:transform .25s var(--ease)}
        .search-overlay.visible .search-popup{transform:translateY(0) scale(1)}
        .search-popup-header{display:flex;align-items:center;gap:12px;padding:18px 22px;border-bottom:1px solid var(--border-light);color:var(--fg-muted)}
        .search-popup-header i{font-size:1rem}
        .search-popup-header input{flex:1;font-size:1rem;color:var(--fg)}
        .search-popup-header input::placeholder{color:var(--fg-muted)}
        .esc-hint{font-size:.68rem;font-weight:600;color:var(--fg-muted);background:var(--cream);padding:3px 10px;border-radius:var(--radius-sm);letter-spacing:.04em;flex-shrink:0}
        .search-popup-body{max-height:400px;overflow-y:auto;padding:8px}
        .search-popup-empty{padding:36px 20px;text-align:center;color:var(--fg-muted);font-size:.9rem}
        .search-result-item{display:flex;align-items:center;gap:14px;padding:12px 14px;border-radius:var(--radius-md);cursor:pointer;transition:background var(--duration) var(--ease)}
        .search-result-item:hover{background:var(--cream)}
        .search-result-thumb{width:44px;height:44px;border-radius:var(--radius-sm);object-fit:cover;flex-shrink:0;background:var(--cream-dark)}
        .search-result-info strong{display:block;font-size:.9rem;font-weight:600;color:var(--fg)}
        .search-result-info span{font-size:.78rem;color:var(--fg-muted)}
        .search-result-price{margin-left:auto;font-size:.92rem;font-weight:700;color:var(--red);flex-shrink:0}

        /* Cart Panel */
        .cart-overlay{position:fixed;inset:0;z-index:1500;background:rgba(42,31,33,.4);backdrop-filter:blur(4px);opacity:0;visibility:hidden;transition:all .3s var(--ease)}
        .cart-overlay.visible{opacity:1;visibility:visible}
        .cart-panel{position:fixed;top:0;right:0;bottom:0;width:420px;max-width:100vw;background:var(--bg-elevated);z-index:1501;display:flex;flex-direction:column;transform:translateX(100%);transition:transform .35s var(--ease);box-shadow:var(--shadow-xl)}
        .cart-panel.open{transform:translateX(0)}
        .cart-panel-header{display:flex;align-items:center;justify-content:space-between;padding:24px;border-bottom:1px solid var(--border-light);flex-shrink:0}
        .cart-panel-header h3{font-size:1.1rem;font-weight:700;display:flex;align-items:center;gap:10px}
        .cart-panel-header h3 span{font-size:.78rem;font-weight:600;color:var(--fg-muted);background:var(--cream);padding:2px 10px;border-radius:var(--radius-full)}
        .cart-panel-close{width:36px;height:36px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:1rem}
        .cart-panel-close:hover{background:var(--cream);color:var(--fg)}
        .cart-panel-body{flex:1;overflow-y:auto;padding:16px 24px}
        .cart-empty{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;text-align:center;color:var(--fg-muted)}
        .cart-empty i{font-size:3rem;margin-bottom:16px;opacity:.4}
        .cart-empty h4{font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
        .cart-item{display:flex;gap:14px;padding:16px 0;border-bottom:1px solid var(--border-light);align-items:flex-start}
        .cart-item:last-child{border-bottom:none}
        .cart-item-image{width:72px;height:72px;border-radius:var(--radius-md);object-fit:cover;flex-shrink:0;background:var(--cream)}
        .cart-item-info{flex:1;min-width:0}
        .cart-item-name{font-size:.9rem;font-weight:600;color:var(--fg);margin-bottom:4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
        .cart-item-price{font-size:.88rem;font-weight:700;color:var(--red);margin-bottom:10px}
        .cart-panel-footer{padding:24px;border-top:1px solid var(--border-light);flex-shrink:0}
        .cart-checkout-btn{width:100%;padding:14px;border-radius:var(--radius-full);background:var(--red);color:#fff;font-size:.92rem;font-weight:600;text-align:center;transition:all var(--duration) var(--ease);display:flex;align-items:center;justify-content:center;gap:8px}
        .cart-checkout-btn:hover{background:var(--red-hover)}

        /* Toast */
        .toast-container{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none}
        .toast{display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.88rem;font-weight:500;pointer-events:auto;animation:toastIn .35s var(--ease) forwards}
        .toast.info i{color:var(--pink)}
        @keyframes toastIn{from{opacity:0;transform:translateY(12px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

        @media(max-width:992px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .cart-page-section, .footer{margin-left:0}
            .mobile-sidebar-toggle{display:flex}
            .sidebar-overlay{display:block}
        }
        @media(max-width:768px){
            .cart-page-grid{grid-template-columns:1fr}
            .cart-row{flex-wrap:wrap;gap:16px}
            .cart-row-img{width:70px;height:80px}
            .cart-row-actions{width:100%;flex-direction:row-reverse;justify-content:space-between;align-items:center}
            .cart-summary-card{position:static}
            .cart-panel{width:100vw}
        }
    </style>
</head>
<body>

<!-- MOBILE TOGGLE -->
<button class="mobile-sidebar-toggle" id="mobileSidebarToggle" aria-label="Open menu">
    <i class="fa-solid fa-bars"></i>
</button>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- SIDEBAR NAVIGATION -->
<aside class="sidebar" id="sidebar">
    <a href="index.php" class="sidebar-logo">
        <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
        <span class="nav-logo-text">
            <span class="nav-logo-name">Hattie's</span>
            <span class="nav-logo-tagline">Hat'istical Hats</span>
        </span>
    </a>             
    <ul class="sidebar-links">
        <li><a href="/dashboards/user/index.php"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="index.php#about"><i class="fa-solid fa-circle-info"></i> About</a></li>
        <li><a href="index.php#catalog"><i class="fa-solid fa-tags"></i> Catalog</a></li>
        <li><a href="index.php#contact"><i class="fa-solid fa-envelope"></i> Contact Us</a></li>
    </ul>
    <div class="sidebar-actions">
        <button class="sidebar-action-btn" id="navSearchBtn">
            <i class="fa-solid fa-magnifying-glass"></i> Search
        </button>
        <button class="sidebar-action-btn" id="navCartBtn" style="color:var(--red);">
            <i class="fa-solid fa-bag-shopping"></i> Cart
            <span class="cart-badge" id="cartBadge">0</span>
        </button>
        <button class="btn-nav-account" onclick="window.location.href='index.php'">
            <i class="fa-solid fa-store"></i> Store
        </button>
    </div>
</aside>

<!-- CART CONTENT -->
<section class="cart-page-section">
    <div class="section-container">
        <div class="section-label">Shopping Cart</div>
        <h1 class="section-header">Your Cart</h1>
        <p class="section-subheader">Review your selected items before proceeding to checkout</p>
        
        <div class="cart-page-grid" id="cartPageGrid">
            <div class="cart-items-col" id="cartItemsCol"></div>
            <div class="cart-summary-col" id="cartSummaryCol"></div>
        </div>
        
        <div class="catalog-empty" id="cartPageEmpty" style="display:none;">
            <i class="fa-solid fa-bag-shopping"></i>
            <h4>Your cart is empty</h4>
            <p>Looks like you haven't added any beautiful hats yet.</p>
            <a href="index.php#catalog" class="btn-primary" style="margin-top:24px; width:fit-content; padding:12px 28px;">
                <i class="fa-solid fa-arrow-left"></i> Continue Shopping
            </a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <div class="sidebar-logo" style="margin-bottom:0;">
                <div class="nav-logo-text">
                    <span class="nav-logo-name">Hattie's</span>
                    <span class="nav-logo-tagline">Hat'istical Hats</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; 2025 Hattie's Hat'istical Hats. Crafted with <i class="fa-solid fa-heart" style="color:var(--red);font-size:.75rem;"></i> By Justin Plaatjies</span>
        </div>
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

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
    // Load cart from localStorage (Matched to your index.php)
    var cart = JSON.parse(localStorage.getItem('cart')) || [];
    var allProducts = []; // Required for search functionality
    var FREE_DELIVERY_THRESHOLD = 1500;
    var DELIVERY_FEE = 150;
    var cartBadge = document.getElementById('cartBadge');

    function formatPrice(n) { return 'R ' + Number(n).toFixed(2); }
    function escapeHtml(s) { var d = document.createElement('div'); d.textContent = s; return d.innerHTML; }
    function categoryLabel(slug) { return (slug || '').split('-').map(function(w) { return w.charAt(0).toUpperCase() + w.slice(1); }).join(' '); }
    function firstImage(images) { return (images && images.length > 0) ? images[0] : '/assets/images/placeholder.jpg'; }
    
    function showToast(msg, type) {
        type = type || 'info';
        var c = document.getElementById('toastContainer');
        var t = document.createElement('div');
        t.className = 'toast ' + type;
        var icon = 'fa-circle-info';
        t.innerHTML = '<i class="fa-solid ' + icon + '"></i> ' + escapeHtml(msg);
        c.appendChild(t);
        setTimeout(function() { t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all .3s ease'; setTimeout(function(){ t.remove(); },300); }, 3000);
    }

    function updateNavBadge() {
        var totalItems = cart.reduce(function(s,i){return s+i.qty;},0);
        cartBadge.textContent = totalItems;
        cartBadge.classList.toggle('visible', totalItems>0);
    }

    // ==========================================
    // CART PAGE MAIN RENDER
    // ==========================================
    function renderPageCart() {
        var col = document.getElementById('cartItemsCol');
        var sumCol = document.getElementById('cartSummaryCol');
        var empty = document.getElementById('cartPageEmpty');
        var grid = document.getElementById('cartPageGrid');
        
        updateNavBadge();
        renderCartPanel(); // Keep slide-out panel in sync
        
        if (!cart.length) {
            grid.style.display = 'none';
            empty.style.display = '';
            return;
        }
        
        grid.style.display = 'grid';
        empty.style.display = 'none';
        
        var subtotal = cart.reduce(function(s,i){return s+(i.price*i.qty);},0);
        var totalItems = cart.reduce(function(s,i){return s+i.qty;},0);
        var delivery = subtotal >= FREE_DELIVERY_THRESHOLD ? 0 : DELIVERY_FEE;
        var total = subtotal + delivery;
        
        col.innerHTML = '<div class="cart-list-card">' + cart.map(function(item){
            return '<div class="cart-row">' +
                '<img src="'+escapeHtml(item.image)+'" alt="'+escapeHtml(item.name)+'" class="cart-row-img">' +
                '<div class="cart-row-info">' +
                    '<div class="cart-row-category">Hat\'istical Hats</div>' +
                    '<div class="cart-row-name">'+escapeHtml(item.name)+'</div>' +
                    '<div class="cart-row-price">'+formatPrice(item.price)+'</div>' +
                    '<div class="cart-item-qty">' +
                        '<button data-qm="'+item.id+'" aria-label="Decrease"><i class="fa-solid fa-minus"></i></button>' +
                        '<span>'+item.qty+'</span>' +
                        '<button data-qp="'+item.id+'" aria-label="Increase"><i class="fa-solid fa-plus"></i></button>' +
                    '</div>' +
                '</div>' +
                '<div class="cart-row-actions">' +
                    '<div class="cart-row-total">'+formatPrice(item.price*item.qty)+'</div>' +
                    '<button class="cart-item-remove" data-rm="'+item.id+'" aria-label="Remove"><i class="fa-solid fa-trash-can"></i></button>' +
                '</div>' +
            '</div>';
        }).join('') + '</div>';
        
        col.querySelectorAll('[data-rm]').forEach(function(b){b.addEventListener('click',function(){removeItem(b.dataset.rm);});});
        col.querySelectorAll('[data-qm]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qm,-1);});});
        col.querySelectorAll('[data-qp]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qp,1);});});
        
        var deliveryNote = '';
        if (delivery === 0) {
            deliveryNote = '<div class="cart-free-delivery"><i class="fa-solid fa-truck-fast"></i> You qualify for free delivery!</div>';
        } else {
            deliveryNote = '<div class="cart-free-delivery"><i class="fa-solid fa-truck"></i> Add <strong>'+formatPrice(FREE_DELIVERY_THRESHOLD - subtotal)+'</strong> more for FREE delivery</div>';
        }
        
        sumCol.innerHTML = '<div class="cart-summary-card">' +
            '<h4>Order Summary</h4>' +
            '<div class="cart-subtotal"><label>Subtotal ('+totalItems+' items)</label><span>'+formatPrice(subtotal)+'</span></div>' +
            '<div class="cart-subtotal"><label>Delivery</label><span>'+(delivery === 0 ? 'FREE' : formatPrice(delivery))+'</span></div>' +
            '<div class="cart-total"><label>Total</label><span>'+formatPrice(total)+'</span></div>' +
            '<button class="btn-primary" onclick="proceedToCheckout()"><i class="fa-solid fa-lock"></i> Proceed to Checkout</button>' +
            '<a href="index.php#catalog" class="btn-outline"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>' +
            deliveryNote +
        '</div>';
    }

    function updateQty(id, d) {
        var item = cart.find(function(i){return i.id===id;});
        if(!item) return;
        item.qty += d;
        if(item.qty <= 0) { removeItem(id); return; }
        localStorage.setItem('cart', JSON.stringify(cart));
        renderPageCart();
    }

    function removeItem(id) {
        cart = cart.filter(function(i){return i.id!==id;});
        localStorage.setItem('cart', JSON.stringify(cart));
        renderPageCart();
        showToast('Item removed from cart', 'info');
    }

    function proceedToCheckout() {
        if(!cart.length) return;
        window.location.href = '/api/users/manage_cart.php';
    }

    // ==========================================
    // SLIDE-OUT CART PANEL FUNCTIONALITY (from index.php)
    // ==========================================
    var cartOverlay = document.getElementById('cartOverlay');
    var cartPanel = document.getElementById('cartPanel');

    function openCart() { if(cart.length===0) return; cartPanel.classList.add('open'); cartOverlay.classList.add('visible'); document.body.style.overflow='hidden'; }
    function closeCart() { cartPanel.classList.remove('open'); cartOverlay.classList.remove('visible'); document.body.style.overflow=''; }

    document.getElementById('navCartBtn').addEventListener('click', function(){ 
        if(cart.length>0) openCart(); 
        else showToast('Your cart is empty — browse our catalog first!','info'); 
    });
    document.getElementById('cartPanelClose').addEventListener('click', closeCart);
    cartOverlay.addEventListener('click', closeCart);

    function renderCartPanel() {
        var totalItems = cart.reduce(function(s,i){return s+i.qty;},0);
        var subtotal = cart.reduce(function(s,i){return s+(i.price*i.qty);},0);
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

        body.querySelectorAll('[data-rm]').forEach(function(b){b.addEventListener('click',function(){removeItem(b.dataset.rm);});});
        body.querySelectorAll('[data-qm]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qm,-1);});});
        body.querySelectorAll('[data-qp]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qp,1);});});
    }

    document.getElementById('checkoutBtn').addEventListener('click', function(){
        if(!cart.length) return;
        window.location.href = '/api/users/manage_cart.php';
    });

    // ==========================================
    // SEARCH OVERLAY FUNCTIONALITY (from index.php)
    // ==========================================
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
            item.addEventListener('click', function(){ 
                closeSearch(); 
                // Redirect to index.php to view product since allProducts is empty on cart.php
                window.location.href = 'index.php#catalog'; 
            });
        });
    });

    // ==========================================
    // MOBILE SIDEBAR TOGGLE
    // ==========================================
    document.getElementById('mobileSidebarToggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.add('open');
        document.getElementById('sidebarOverlay').classList.add('visible');
    });
    document.getElementById('sidebarOverlay').addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('sidebarOverlay').classList.remove('visible');
    });

    // Keyboard Shortcuts
    document.addEventListener('keydown', function(e){
        if(e.key==='Escape'){closeSearch();closeCart();}
    });

    // Initial Render
    renderPageCart();
</script>
</body>
</html>