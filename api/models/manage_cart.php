<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/cart.css">
    <title>My Cart — Hattie's Hat'istical Hats</title>
    <style>
/* ================================================================
   User Dashboard Sub-Pages — Light theme
   ================================================================ */
:root {
    --red:#C93B39;--red-hover:#DA4E4C;--red-light:rgba(201,59,57,.10);--red-muted:rgba(201,59,57,.06);
    --pink:#CFA1A8;--pink-light:rgba(207,161,168,.18);--pink-muted:rgba(207,161,168,.10);
    --green:#4EA66A;--green-light:rgba(78,166,106,.12);
    --bg:#FFF8F6;--bg-elevated:#FFFFFF;--card:#FFFFFF;--topbar-bg:rgba(255,248,246,.92);
    --cream:#FFF0ED;--cream-dark:#FFE8E3;--cream-deeper:#FFDCD5;
    --fg:#2A1F21;--fg-secondary:#6B5558;--fg-muted:#9A8588;
    --border:#F0DDD8;--border-light:#F8EDEA;
    --shadow-sm:0 1px 3px rgba(42,31,33,.06);--shadow-md:0 4px 12px rgba(42,31,33,.08);
    --shadow-lg:0 12px 32px rgba(42,31,33,.12);--shadow-xl:0 24px 48px rgba(42,31,33,.16);
    --radius-sm:6px;--radius-md:10px;--radius-lg:16px;--radius-xl:24px;--radius-full:9999px;
    --ease:cubic-bezier(.4,0,.2,1);--duration:.2s;
    --sidebar-w:260px;--sidebar-collapsed-w:72px;--topbar-h:68px;
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{font-size:15px;-webkit-font-smoothing:antialiased}
body{font-family:'Segoe UI',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--fg);line-height:1.65;overflow-x:hidden}
a{color:inherit;text-decoration:none}
button{font:inherit;border:none;background:none;cursor:pointer;color:inherit}
img{max-width:100%;display:block}
input,textarea,select{font:inherit;border:none;outline:none;background:none}
table{border-collapse:collapse;width:100%}
ul{list-style:none}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--cream-deeper);border-radius:6px}

/* ── TOPBAR ──────────────────────────────────────────────── */
.topbar{position:fixed;top:0;left:0;right:0;height:var(--topbar-h);background:var(--topbar-bg);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-bottom:1px solid var(--border-light);z-index:100;display:flex;align-items:center;justify-content:space-between;padding:0 28px;transition:box-shadow .3s var(--ease)}
.topbar.scrolled{box-shadow:var(--shadow-sm)}
.topbar-left{display:flex;align-items:center;gap:16px}
.mobile-toggle{display:none;width:38px;height:38px;border-radius:var(--radius-sm);color:var(--fg-secondary);font-size:1.1rem;align-items:center;justify-content:center;transition:all var(--duration) var(--ease)}
.mobile-toggle:hover{background:var(--cream);color:var(--fg)}
.topbar-logo{display:flex;align-items:center;gap:10px}
.topbar-logo-mark{width:36px;height:36px;border-radius:var(--radius-md);background:linear-gradient(135deg,var(--red),var(--pink));color:#fff;font-size:1rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.topbar-logo-text{display:flex;flex-direction:column;line-height:1.15}
.topbar-logo-name{font-size:.92rem;font-weight:700;color:var(--fg)}
.topbar-logo-tagline{font-size:.6rem;font-weight:600;color:var(--pink);letter-spacing:.03em}
.topbar-greeting h2{font-size:1.05rem;font-weight:600;color:var(--fg);line-height:1.3}
.topbar-greeting p{font-size:.78rem;color:var(--fg-muted)}
.topbar-right{display:flex;align-items:center;gap:6px}
.topbar-icon-btn{position:relative;width:38px;height:38px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease)}
.topbar-icon-btn:hover{background:var(--cream);color:var(--fg)}
.badge-dot{position:absolute;top:8px;right:8px;width:8px;height:8px;background:var(--red);border-radius:50%;border:2px solid var(--bg);pointer-events:none}
.profile-btn{display:flex;align-items:center;gap:8px;padding:4px 12px 4px 4px;border-radius:var(--radius-full);transition:all var(--duration) var(--ease)}
.profile-btn:hover{background:var(--cream)}
.profile-avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--red),var(--pink));color:#fff;font-size:.8rem;font-weight:600;display:flex;align-items:center;justify-content:center}
.profile-label{font-size:.82rem;font-weight:500;color:var(--fg-secondary)}

/* ── SIDEBAR ─────────────────────────────────────────────── */
.sidebar{position:fixed;top:var(--topbar-h);left:0;bottom:0;width:var(--sidebar-w);background:var(--bg-elevated);border-right:1px solid var(--border-light);display:flex;flex-direction:column;z-index:90;transition:width .3s var(--ease);overflow:hidden}
.sidebar-header{display:flex;align-items:center;justify-content:space-between;padding:20px 16px 12px;flex-shrink:0}
.sidebar-collapse-btn{width:28px;height:28px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:.7rem;transition:all var(--duration) var(--ease)}
.sidebar-collapse-btn:hover{background:var(--cream);color:var(--fg-secondary)}
.sidebar-nav{flex:1;padding:8px 12px;overflow-y:auto}
.sidebar-section-label{font-size:.65rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:var(--pink);padding:0 12px;margin:16px 0 8px}
.sb-nav-item{margin-bottom:2px}
.sb-nav-link{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);color:var(--fg-secondary);font-size:.88rem;font-weight:500;transition:all var(--duration) var(--ease);position:relative;white-space:nowrap;overflow:hidden}
.sb-nav-link:hover{background:var(--cream);color:var(--fg)}
.sb-nav-link.active{background:var(--red-light);color:var(--red);font-weight:600}
.sb-nav-link.active::before{content:'';position:absolute;left:-12px;top:50%;transform:translateY(-50%);width:3px;height:22px;background:var(--red);border-radius:0 3px 3px 0}
.sb-nav-icon{width:20px;text-align:center;font-size:.95rem;flex-shrink:0}
.sb-nav-label{transition:opacity .2s var(--ease),transform .2s var(--ease)}
.sb-nav-badge{margin-left:auto;font-size:.7rem;font-weight:600;background:var(--red);color:#fff;padding:2px 8px;border-radius:var(--radius-full);flex-shrink:0}
.sidebar-footer{padding:12px;border-top:1px solid var(--border-light);flex-shrink:0}
.sb-logout{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);color:var(--pink);font-size:.88rem;font-weight:500;transition:all var(--duration) var(--ease);width:100%}
.sb-logout:hover{background:var(--pink-light);color:#c27a80}
.sidebar-overlay{position:fixed;inset:0;background:rgba(42,31,33,.4);backdrop-filter:blur(4px);z-index:89;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
.sidebar-overlay.visible{opacity:1;visibility:visible}

/* Sidebar collapsed */
.sidebar.collapsed{width:var(--sidebar-collapsed-w)}
.sidebar.collapsed .sidebar-collapse-btn{display:none}
.sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge{opacity:0;width:0;overflow:hidden}
.sidebar.collapsed .sb-nav-link{justify-content:center;padding:10px}
.sidebar.collapsed .sb-logout{justify-content:center;padding:10px}
.sidebar.collapsed .sidebar-header{justify-content:center}

/* ── MAIN WRAPPER ────────────────────────────────────────── */
.main-wrapper{margin-left:var(--sidebar-w);min-height:100vh;display:flex;flex-direction:column;transition:margin-left .3s var(--ease)}
.main-content{flex:1;padding:28px}

/* ── DASHBOARD SECTIONS ──────────────────────────────────── */
.dash-section-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:12px}
.dash-section-header h1{font-size:1.6rem;font-weight:700;letter-spacing:-.02em}
.dash-section-header p{font-size:.88rem;color:var(--fg-muted)}

/* Panel */
.panel{background:var(--card);border:1px solid var(--border-light);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:24px}
.panel-header{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--border-light)}
.panel-header h2{font-size:1rem;font-weight:600}
.panel-body{padding:0;overflow-x:auto}

/* Data Tables */
.dtable th{padding:12px 20px;font-size:.7rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--fg-muted);background:var(--cream);text-align:left;white-space:nowrap}
.dtable td{padding:14px 20px;font-size:.87rem;color:var(--fg);border-bottom:1px solid var(--border-light);vertical-align:middle}
.dtable tbody tr{transition:background var(--duration) var(--ease)}
.dtable tbody tr:hover{background:var(--cream)}
.dtable tbody tr:last-child td{border-bottom:none}
.dtable-thumb{width:48px;height:48px;border-radius:var(--radius-sm);object-fit:cover;background:var(--cream);flex-shrink:0}
.dtable-product{display:flex;align-items:center;gap:12px}
.dtable-product-name{font-weight:600;color:var(--fg);line-height:1.3}
.dtable-product-cat{font-size:.72rem;color:var(--fg-muted)}
.dtable-price{font-weight:700;color:var(--red)}
.dtable-qty{display:inline-flex;align-items:center;border:1px solid var(--border);border-radius:var(--radius-sm);overflow:hidden}
.dtable-qty button{width:28px;height:28px;display:flex;align-items:center;justify-content:center;font-size:.7rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease)}
.dtable-qty button:hover{background:var(--cream);color:var(--fg)}
.dtable-qty button:disabled{opacity:.4;cursor:not-allowed}
.dtable-qty button:disabled:hover{background:none;color:var(--fg-secondary)}
.dtable-qty span{width:30px;text-align:center;font-size:.82rem;font-weight:600;border-left:1px solid var(--border);border-right:1px solid var(--border);line-height:28px}
.dtable-qty.updating span{opacity:.5}
.dtable-remove{width:30px;height:30px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:.78rem;transition:all var(--duration) var(--ease)}
.dtable-remove:hover{background:rgba(201,59,57,.1);color:var(--red)}

/* Cart Summary */
.cart-summary{padding:24px;border-top:1px solid var(--border-light);display:flex;flex-wrap:wrap;gap:24px;align-items:center;justify-content:space-between}
.cart-summary-left{display:flex;gap:32px}
.cart-summary-row{display:flex;flex-direction:column;gap:2px}
.cart-summary-row label{font-size:.78rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.04em}
.cart-summary-row span{font-size:1rem;font-weight:700;color:var(--fg)}
.cart-summary-row span.total{font-size:1.2rem;color:var(--red)}
.cart-summary-actions{display:flex;gap:10px;align-items:center}
.btn-sm{padding:10px 20px;border-radius:var(--radius-full);font-size:.84rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;transition:all var(--duration) var(--ease)}
.btn-sm.primary{background:var(--red);color:#fff}
.btn-sm.primary:hover{background:var(--red-hover);transform:translateY(-1px);box-shadow:0 4px 12px rgba(201,59,57,.25)}
.btn-sm.ghost{background:var(--cream);color:var(--fg-secondary);border:1px solid var(--border)}
.btn-sm.ghost:hover{background:var(--cream-dark);color:var(--fg)}
.btn-sm:disabled{opacity:.5;cursor:not-allowed;transform:none!important;box-shadow:none!important}
.btn-sm .btn-spinner{width:14px;height:14px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:spin .6s linear infinite}
.free-delivery-note{width:100%;text-align:center;font-size:.8rem;color:#27753F;background:rgba(107,203,139,.08);padding:8px 16px;border-radius:var(--radius-sm);margin-top:4px}
.free-delivery-note.near{color:var(--fg-muted);background:var(--cream)}
.free-delivery-note i{margin-right:4px}

/* Empty State */
.empty-state{text-align:center;padding:60px 20px;color:var(--fg-muted)}
.empty-state i{font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block}
.empty-state h3{font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.empty-state p{font-size:.88rem;margin-bottom:20px}

/* Error State */
.error-state{text-align:center;padding:60px 20px;color:var(--fg-muted)}
.error-state i{font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block;color:var(--red)}
.error-state h3{font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.error-state p{font-size:.88rem;margin-bottom:20px}

/* Toast */
.toast-container{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.88rem;font-weight:500;pointer-events:auto;animation:toastIn .35s var(--ease) forwards}
.toast.success i{color:#6BCB8B}.toast.error i{color:#E07070}.toast.info i{color:var(--pink)}
@keyframes toastIn{from{opacity:0;transform:translateY(12px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

/* Modal */
.modal-overlay{position:fixed;inset:0;z-index:2000;background:rgba(42,31,33,.5);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.modal-overlay.visible{opacity:1;visibility:visible}
.modal-box{width:100%;max-width:400px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);overflow:hidden;transform:scale(.95) translateY(12px);transition:transform .3s var(--ease)}
.modal-overlay.visible .modal-box{transform:scale(1) translateY(0)}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:20px 24px;border-bottom:1px solid var(--border-light)}
.modal-header h3{font-size:1.05rem;font-weight:700;color:var(--fg)}
.modal-close{width:34px;height:34px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.9rem;color:var(--fg-muted);transition:all var(--duration) var(--ease)}
.modal-close:hover{background:var(--cream);color:var(--fg)}
.modal-body{padding:24px}
.modal-description{font-size:.9rem;color:var(--fg-secondary);line-height:1.65}
.modal-actions{display:flex;justify-content:flex-end;gap:10px;margin-top:20px}
.btn-modal{padding:10px 22px;border-radius:var(--radius-full);font-size:.84rem;font-weight:600;transition:all var(--duration) var(--ease)}
.btn-modal.secondary{background:var(--cream);color:var(--fg-secondary)}
.btn-modal.secondary:hover{background:var(--cream-dark);color:var(--fg)}
.btn-modal.danger{background:var(--red);color:#fff}
.btn-modal.danger:hover{background:var(--red-hover);box-shadow:0 4px 12px rgba(201,59,57,.25)}

/* Footer */
.dash-footer{padding:18px 28px;text-align:center;font-size:.78rem;color:var(--fg-muted);border-top:1px solid var(--border-light)}
.dash-footer span{font-weight:600;color:var(--fg-secondary)}

/* Loading */
.dash-loading{display:flex;align-items:center;justify-content:center;gap:12px;padding:60px;color:var(--fg-muted)}
.dash-loading .spinner{width:28px;height:28px;border:3px solid var(--border);border-top-color:var(--red);border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* ── RESPONSIVE ───────────────────────────────────────────── */
@media(max-width:768px){
    .sidebar{transform:translateX(-100%);width:var(--sidebar-w)!important;z-index:200}
    .sidebar.open{transform:translateX(0)}
    .sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge,.sidebar.collapsed .sb-logout .sb-nav-label{opacity:1;width:auto;overflow:visible}
    .sidebar.collapsed .sb-nav-link{justify-content:flex-start;padding:10px 12px}
    .sidebar.collapsed .sb-logout{justify-content:flex-start;padding:10px 12px}
    .sidebar.collapsed .sidebar-collapse-btn{display:flex}
    .main-wrapper{margin-left:0!important}
    .mobile-toggle{display:flex}
    .topbar{padding:0 16px}
    .topbar-greeting p{display:none}
    .profile-label{display:none}
    .main-content{padding:20px 16px}
    .cart-summary{flex-direction:column;align-items:stretch;gap:16px}
    .cart-summary-left{gap:16px}
    .cart-summary-actions{justify-content:stretch}
    .cart-summary-actions .btn-sm{width:100%;justify-content:center}
    .dtable th,.dtable td{padding:10px 14px}
    .dtable-product-name{font-size:.82rem;max-width:140px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
}
@media(max-width:480px){
    .form-row{grid-template-columns:1fr}
    .dtable-hide-sm{display:none}
}
:focus-visible{outline:2px solid var(--red);outline-offset:2px}
    </style>
</head>
<body>

<!-- ======================== TOPBAR ======================== -->
<header class="topbar" id="topbar">
    <div class="topbar-left">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar"><i class="fa-solid fa-bars"></i></button>
        <a href="/dashboards/user/index.php" class="topbar-logo">
            <div class="topbar-logo-mark">H</div>
            <div class="topbar-logo-text">
                <span class="topbar-logo-name">Hattie's</span>
                <span class="topbar-logo-tagline">Hat'istical Hats</span>
            </div>
        </a>
    </div>
    <div class="topbar-right">
        <a href="/index.php" class="topbar-icon-btn" aria-label="Back to store" title="Back to store"><i class="fa-solid fa-store"></i></a>
        <button class="topbar-icon-btn" id="notifToggle" aria-label="Notifications">
            <i class="fa-solid fa-bell"></i>
            <span class="badge-dot" id="notifBadge" style="display:none;"></span>
        </button>
        <a href="/dashboards/user/profile.php" class="profile-btn" aria-label="Profile">
            <span class="profile-avatar" id="topAvatar">U</span>
            <span class="profile-label" id="topName">Loading...</span>
        </a>
    </div>
</header>

<!-- ======================== SIDEBAR OVERLAY ======================== -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ======================== SIDEBAR ======================== -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" aria-label="Collapse sidebar"><i class="fa-solid fa-angles-left"></i></button>
    </div>
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Dashboard</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/index.php" class="sb-nav-link">
                <i class="fa-solid fa-gauge sb-nav-icon"></i>
                <span class="sb-nav-label">Overview</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_cart.php" class="sb-nav-link active">
                <i class="fa-solid fa-bag-shopping sb-nav-icon"></i>
                <span class="sb-nav-label">My Cart</span>
                <span class="sb-nav-badge" id="sidebarCartBadge" style="display:none;">0</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_my_orders.php" class="sb-nav-link">
                <i class="fa-solid fa-receipt sb-nav-icon"></i>
                <span class="sb-nav-label">My Orders</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_my_enquiries.php" class="sb-nav-link">
                <i class="fa-solid fa-circle-question sb-nav-icon"></i>
                <span class="sb-nav-label">My Enquiries</span>
            </a>
        </div>

        <div class="sidebar-section-label">Requests</div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_my_custom_requests.php" class="sb-nav-link">
                <i class="fa-solid fa-wand-magic-sparkles sb-nav-icon"></i>
                <span class="sb-nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="sidebar-section-label">Account</div>
        <div class="sb-nav-item">
            <a href="/api/manage_settings.php" class="sb-nav-link">
                <i class="fa-solid fa-gear sb-nav-icon"></i>
                <span class="sb-nav-label">Settings</span>
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="sb-logout">
            <i class="fa-solid fa-right-from-bracket sb-nav-icon"></i>
            <span class="sb-nav-label">Logout</span>
        </a>
    </div>
</aside>

<!-- ======================== MAIN ======================== -->
<div class="main-wrapper" id="mainWrapper">
    <main class="main-content">

        <div class="dash-section-header">
            <div>
                <h1>My Cart</h1>
                <p>Items you've added — proceed to checkout when ready.</p>
            </div>
            <a href="/index.php#catalog" class="btn-sm ghost"><i class="fa-solid fa-plus"></i> Browse More</a>
        </div>

        <div class="dash-loading" id="cartLoading"><div class="spinner"></div><span>Loading cart...</span></div>
        <div id="cartContent" style="display:none;"></div>

    </main>
    <footer class="dash-footer">&copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved.</footer>
</div>

<!-- ======================== CLEAR CART CONFIRM MODAL ======================== -->
<div class="modal-overlay" id="clearCartModal">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Clear Cart</h3>
            <button class="modal-close" id="clearCartModalClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <p class="modal-description">Are you sure you want to remove all items from your cart? This cannot be undone.</p>
            <div class="modal-actions">
                <button class="btn-modal secondary" id="clearCartCancel">Cancel</button>
                <button class="btn-modal danger" id="clearCartConfirm"><i class="fa-solid fa-trash-can"></i> Clear All</button>
            </div>
        </div>
    </div>
</div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE
   ================================================================ */
var cartItems = [];
var MAX_QTY = 99;
var isUpdating = false;
var PLACEHOLDER_IMG = '/assets/images/placeholder.jpg';
var FREE_DELIVERY_THRESHOLD = 1500;
var DELIVERY_FEE = 120;
var CURRENCY = 'R';

/* ================================================================
   UTILITIES
   ================================================================ */
function fmt(n) {
    return CURRENCY + ' ' + Number(n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function esc(s) {
    if (s === null || s === undefined) return '';
    var d = document.createElement('div');
    d.textContent = String(s);
    return d.innerHTML;
}

function showToast(msg, type) {
    type = type || 'info';
    var c = document.getElementById('toastContainer');
    if (!c) return;
    var t = document.createElement('div');
    t.className = 'toast ' + type;
    var icons = { success: 'fa-circle-check', error: 'fa-circle-xmark', info: 'fa-circle-info' };
    t.innerHTML = '<i class="fa-solid ' + (icons[type] || icons.info) + '"></i> ' + esc(msg);
    c.appendChild(t);
    setTimeout(function() {
        t.style.opacity = '0';
        t.style.transform = 'translateX(20px)';
        t.style.transition = 'all .3s ease';
        setTimeout(function() { t.remove(); }, 300);
    }, 3500);
}

function emptyHTML(icon, title, desc, action) {
    return '<div class="empty-state">' +
        '<i class="fa-solid ' + icon + '"></i>' +
        '<h3>' + esc(title) + '</h3>' +
        '<p>' + esc(desc) + '</p>' +
        (action || '') +
    '</div>';
}

function errorHTML(title, desc, action) {
    return '<div class="error-state">' +
        '<i class="fa-solid fa-triangle-exclamation"></i>' +
        '<h3>' + esc(title) + '</h3>' +
        '<p>' + esc(desc) + '</p>' +
        (action || '') +
    '</div>';
}

/* ================================================================
   SIDEBAR
   ================================================================ */
var sidebar = document.getElementById('sidebar');
var sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
var sidebarOverlay = document.getElementById('sidebarOverlay');
var mobileToggle = document.getElementById('mobileToggle');
var mainWrapper = document.getElementById('mainWrapper');

function updateMainMargin() {
    if (window.innerWidth <= 768) {
        mainWrapper.style.marginLeft = '0';
    } else {
        mainWrapper.style.marginLeft = sidebar.classList.contains('collapsed')
            ? 'var(--sidebar-collapsed-w)'
            : 'var(--sidebar-w)';
    }
}

if (sidebarCollapseBtn) {
    sidebarCollapseBtn.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
        var icon = sidebarCollapseBtn.querySelector('i');
        icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
        icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
        updateMainMargin();
    });
}

if (mobileToggle && sidebar && sidebarOverlay) {
    mobileToggle.addEventListener('click', function() {
        sidebar.classList.add('open');
        sidebarOverlay.classList.add('visible');
    });
    sidebarOverlay.addEventListener('click', function() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    });
}

window.addEventListener('scroll', function() {
    var tb = document.getElementById('topbar');
    if (tb) tb.classList.toggle('scrolled', window.scrollY > 10);
});

window.addEventListener('resize', updateMainMargin);

/* ================================================================
   CLEAR CART MODAL
   ================================================================ */
var clearCartModal = document.getElementById('clearCartModal');
var clearCartModalClose = document.getElementById('clearCartModalClose');
var clearCartCancel = document.getElementById('clearCartCancel');
var clearCartConfirm = document.getElementById('clearCartConfirm');

function openClearCartModal() {
    if (clearCartModal) clearCartModal.classList.add('visible');
}
function closeClearCartModal() {
    if (clearCartModal) clearCartModal.classList.remove('visible');
}

if (clearCartModalClose) clearCartModalClose.addEventListener('click', closeClearCartModal);
if (clearCartCancel) clearCartCancel.addEventListener('click', closeClearCartModal);
if (clearCartModal) {
    clearCartModal.addEventListener('click', function(e) {
        if (e.target === clearCartModal) closeClearCartModal();
    });
}

/* ================================================================
   CART API ENDPOINTS
   ================================================================ */
var API_CART_GET     = '/api/user/cart.php';
var API_CART_HANDLER  = '/api/handlers/cart_handler.php';

/*
   Expected API responses:

   GET  /api/user/cart.php
   { "items": [
       { "id": 1, "product_id": 42, "product_name": "Straw Boater", "product_image": "/assets/images/...", "price": 350.00, "qty": 2 }
   ]}

   POST /api/handlers/cart_handler.php   (JSON body)
   { "action": "update_qty", "item_id": 1, "qty": 3 }
   → { "success": true }
   → { "success": false, "message": "Product out of stock" }
   → { "success": false, "removed": true, "message": "Product no longer available" }

   { "action": "remove", "item_id": 1 }
   → { "success": true }

   { "action": "clear" }
   → { "success": true }
*/

/* ================================================================
   LOAD CART
   ================================================================ */
function loadCart() {
    var loading = document.getElementById('cartLoading');
    var content = document.getElementById('cartContent');
    loading.style.display = '';
    content.style.display = 'none';

    fetch(API_CART_GET, { credentials: 'include' })
        .then(function(r) {
            if (!r.ok) throw new Error('HTTP ' + r.status);
            return r.json();
        })
        .then(function(data) {
            cartItems = (data && data.items) ? data.items : [];
            loading.style.display = 'none';
            content.style.display = '';
            renderCart();
        })
        .catch(function(err) {
            console.error('Cart load error:', err);
            loading.style.display = 'none';
            content.style.display = '';
            content.innerHTML = errorHTML(
                'Unable to load cart',
                'Something went wrong. Please try again.',
                '<button class="btn-sm primary" onclick="loadCart()" style="display:inline-flex;"><i class="fa-solid fa-rotate-right"></i> Retry</button>'
            );
        });
}

/* ================================================================
   RENDER CART
   ================================================================ */
function renderCart() {
    var badge = document.getElementById('sidebarCartBadge');

    /* Update sidebar badge */
    if (cartItems.length > 0) {
        badge.style.display = '';
        badge.textContent = cartItems.length;
    } else {
        badge.style.display = 'none';
    }

    /* Empty state */
    if (!cartItems.length) {
        document.getElementById('cartContent').innerHTML = emptyHTML(
            'fa-bag-shopping',
            'Your cart is empty',
            'Browse our catalog and add some beautiful hats!',
            '<a href="/index.php#catalog" class="btn-sm primary" style="display:inline-flex;"><i class="fa-solid fa-hat-cowboy"></i> Browse Catalog</a>'
        );
        return;
    }

    /* Calculate totals */
    var subtotal = cartItems.reduce(function(s, i) { return s + (Number(i.price) * Number(i.qty)); }, 0);
    var deliveryFee = subtotal >= FREE_DELIVERY_THRESHOLD ? 0 : DELIVERY_FEE;
    var total = subtotal + deliveryFee;
    var remaining = Math.max(0, FREE_DELIVERY_THRESHOLD - subtotal);

    /* Build table rows */
    var rows = cartItems.map(function(item) {
        var imgSrc = item.product_image || PLACEHOLDER_IMG;
        var lineTotal = Number(item.price) * Number(item.qty);
        var qty = Number(item.qty);

        return '<tr data-item-id="' + item.id + '">' +
            '<td><div class="dtable-product">' +
                '<img class="dtable-thumb" src="' + esc(imgSrc) + '" alt="' + esc(item.product_name) + '" loading="lazy" onerror="this.onerror=null;this.src=\'' + PLACEHOLDER_IMG + '\';">' +
                '<div>' +
                    '<div class="dtable-product-name">' + esc(item.product_name) + '</div>' +
                    '<div class="dtable-product-cat">SKU #' + esc(item.product_id) + '</div>' +
                '</div>' +
            '</div></td>' +
            '<td class="dtable-price">' + fmt(item.price) + '</td>' +
            '<td><div class="dtable-qty">' +
                '<button data-cart-minus="' + item.id + '" aria-label="Decrease quantity"' + (qty <= 1 ? ' disabled' : '') + '><i class="fa-solid fa-minus"></i></button>' +
                '<span>' + qty + '</span>' +
                '<button data-cart-plus="' + item.id + '" aria-label="Increase quantity"' + (qty >= MAX_QTY ? ' disabled' : '') + '><i class="fa-solid fa-plus"></i></button>' +
            '</div></td>' +
            '<td class="dtable-price" style="font-weight:600;">' + fmt(lineTotal) + '</td>' +
            '<td><button class="dtable-remove" data-cart-remove="' + item.id + '" aria-label="Remove ' + esc(item.product_name) + '" title="Remove"><i class="fa-solid fa-trash-can"></i></button></td>' +
        '</tr>';
    }).join('');

    /* Delivery note */
    var deliveryNote = deliveryFee === 0
        ? '<div class="free-delivery-note"><i class="fa-solid fa-truck-fast"></i> You qualify for free delivery!</div>'
        : '<div class="free-delivery-note near"><i class="fa-solid fa-circle-info"></i> Add ' + fmt(remaining) + ' more for free delivery</div>';

    /* Full HTML */
    document.getElementById('cartContent').innerHTML =
        '<div class="panel">' +
            '<div class="panel-header">' +
                '<h2>' + cartItems.length + ' Item' + (cartItems.length !== 1 ? 's' : '') + '</h2>' +
            '</div>' +
            '<div class="panel-body">' +
                '<table class="dtable">' +
                    '<thead><tr>' +
                        '<th>Product</th>' +
                        '<th>Unit Price</th>' +
                        '<th>Quantity</th>' +
                        '<th class="dtable-hide-sm">Line Total</th>' +
                        '<th style="width:40px;"></th>' +
                    '</tr></thead>' +
                    '<tbody>' + rows + '</tbody>' +
                '</table>' +
            '</div>' +
            '<div class="cart-summary">' +
                '<div class="cart-summary-left">' +
                    '<div class="cart-summary-row"><label>Subtotal</label><span>' + fmt(subtotal) + '</span></div>' +
                    '<div class="cart-summary-row"><label>Delivery</label><span>' + (deliveryFee === 0 ? '<span style="color:#27753F;font-weight:600;">Free</span>' : fmt(deliveryFee)) + '</span></div>' +
                    '<div class="cart-summary-row"><label>Total</label><span class="total">' + fmt(total) + '</span></div>' +
                '</div>' +
                '<div class="cart-summary-actions">' +
                    '<button class="btn-sm ghost" id="clearCartBtn"><i class="fa-solid fa-trash-can"></i> Clear Cart</button>' +
                    '<button class="btn-sm primary" id="checkoutBtn"><i class="fa-solid fa-lock"></i> Checkout</button>' +
                '</div>' +
                deliveryNote +
            '</div>' +
        '</div>';

    /* Bind events */
    bindCartEvents();
}

/* ================================================================
   BIND CART EVENTS (after render)
   ================================================================ */
function bindCartEvents() {
    /* Quantity buttons */
    document.querySelectorAll('[data-cart-minus]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            updateCartQty(parseInt(btn.dataset.cartMinus), -1);
        });
    });
    document.querySelectorAll('[data-cart-plus]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            updateCartQty(parseInt(btn.dataset.cartPlus), 1);
        });
    });

    /* Remove buttons */
    document.querySelectorAll('[data-cart-remove]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            removeCartItem(parseInt(btn.dataset.cartRemove));
        });
    });

    /* Clear & Checkout */
    var clearBtn = document.getElementById('clearCartBtn');
    if (clearBtn) clearBtn.addEventListener('click', openClearCartModal);

    var checkoutBtn = document.getElementById('checkoutBtn');
    if (checkoutBtn) checkoutBtn.addEventListener('click', checkout);
}

/* ================================================================
   UPDATE QUANTITY
   ================================================================ */
function updateCartQty(itemId, delta) {
    if (isUpdating) return;

    var idx = cartItems.findIndex(function(i) { return Number(i.id) === Number(itemId); });
    if (idx === -1) return;

    var newQty = Number(cartItems[idx].qty) + delta;

    if (newQty <= 0) {
        removeCartItem(itemId);
        return;
    }
    if (newQty > MAX_QTY) {
        showToast('Maximum quantity is ' + MAX_QTY, 'error');
        return;
    }

    /* Optimistic UI */
    cartItems[idx].qty = newQty;
    setRowUpdating(itemId, true);
    renderCart();

    /* Persist to backend */
    isUpdating = true;
    fetch(API_CART_HANDLER, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include',
        body: JSON.stringify({ action: 'update_qty', item_id: itemId, qty: newQty })
    })
    .then(function(r) {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
    })
    .then(function(data) {
        isUpdating = false;
        if (!data.success) {
            if (data.removed) {
                showToast(data.message || 'Product is no longer available', 'error');
            } else {
                showToast(data.message || 'Failed to update quantity', 'error');
            }
            loadCart(); /* Re-sync from server */
        }
    })
    .catch(function(err) {
        isUpdating = false;
        console.error('Update qty error:', err);
        showToast('Network error — reverting changes', 'error');
        loadCart(); /* Re-sync from server */
    });
}

/* ================================================================
   REMOVE ITEM
   ================================================================ */
function removeCartItem(itemId) {
    if (isUpdating) return;

    var idx = cartItems.findIndex(function(i) { return Number(i.id) === Number(itemId); });
    if (idx === -1) return;

    var name = cartItems[idx].product_name;

    /* Optimistic UI */
    cartItems.splice(idx, 1);
    renderCart();
    showToast(esc(name) + ' removed', 'info');

    /* Persist to backend */
    isUpdating = true;
    fetch(API_CART_HANDLER, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include',
        body: JSON.stringify({ action: 'remove', item_id: itemId })
    })
    .then(function(r) {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
    })
    .then(function(data) {
        isUpdating = false;
        if (!data.success) {
            showToast(data.message || 'Failed to remove item', 'error');
            loadCart();
        }
    })
    .catch(function(err) {
        isUpdating = false;
        console.error('Remove item error:', err);
        showToast('Network error — reverting changes', 'error');
        loadCart();
    });
}

/* ================================================================
   CLEAR CART (via modal)
   ================================================================ */
if (clearCartConfirm) {
    clearCartConfirm.addEventListener('click', function() {
        closeClearCartModal();
        performClearCart();
    });
}

function performClearCart() {
    if (isUpdating) return;
    if (!cartItems.length) return;

    /* Optimistic UI */
    cartItems = [];
    renderCart();
    showToast('Cart cleared', 'info');

    /* Persist to backend */
    isUpdating = true;
    fetch(API_CART_HANDLER, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        credentials: 'include',
        body: JSON.stringify({ action: 'clear' })
    })
    .then(function(r) {
        if (!r.ok) throw new Error('HTTP ' + r.status);
        return r.json();
    })
    .then(function(data) {
        isUpdating = false;
        if (!data.success) {
            showToast(data.message || 'Failed to clear cart', 'error');
            loadCart();
        }
    })
    .catch(function(err) {
        isUpdating = false;
        console.error('Clear cart error:', err);
        showToast('Network error — reverting changes', 'error');
        loadCart();
    });
}

/* ================================================================
   CHECKOUT
   ================================================================ */
function checkout() {
    if (!cartItems.length) {
        showToast('Your cart is empty', 'error');
        return;
    }

    var btn = document.getElementById('checkoutBtn');
    if (!btn || btn.disabled) return;

    /* Disable button + show spinner */
    btn.disabled = true;
    btn.innerHTML = '<span class="btn-spinner"></span> Processing...';

    /* Small delay so the user sees the feedback, then redirect */
    setTimeout(function() {
        window.location.href = '/api/models/checkout.php';
    }, 600);
}

/* ================================================================
   VISUAL: set row updating state (before re-render removes it)
   ================================================================ */
function setRowUpdating(itemId, state) {
    var row = document.querySelector('tr[data-item-id="' + itemId + '"]');
    if (!row) return;
    var qtyWrap = row.querySelector('.dtable-qty');
    if (qtyWrap) qtyWrap.classList.toggle('updating', state);
}

/* ================================================================
   LOAD USER INFO
   ================================================================ */
function loadUserInfo() {
    fetch('/api/user/profile.php', { credentials: 'include' })
        .then(function(r) {
            if (!r.ok) throw new Error('HTTP ' + r.status);
            return r.json();
        })
        .then(function(data) {
            if (data && data.first_name && data.last_name) {
                var initials = data.first_name.charAt(0).toUpperCase() + data.last_name.charAt(0).toUpperCase();
                var avatarEl = document.getElementById('topAvatar');
                var nameEl = document.getElementById('topName');
                if (avatarEl) avatarEl.textContent = initials;
                if (nameEl) nameEl.textContent = data.first_name + ' ' + data.last_name;
            }
        })
        .catch(function() {
            /* Silent — keep defaults */
        });
}

/* ================================================================
   NOTIFICATIONS TOGGLE (basic)
   ================================================================ */
var notifToggle = document.getElementById('notifToggle');
if (notifToggle) {
    notifToggle.addEventListener('click', function() {
        window.location.href = '/api/notifications.php';
    });
}

/* ================================================================
   KEYBOARD
   ================================================================ */
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeClearCartModal();
        if (sidebar) sidebar.classList.remove('open');
        if (sidebarOverlay) sidebarOverlay.classList.remove('visible');
    }
});

/* ================================================================
   INIT
   ================================================================ */
updateMainMargin();
loadUserInfo();
loadCart();
</script>
</body>
</html>