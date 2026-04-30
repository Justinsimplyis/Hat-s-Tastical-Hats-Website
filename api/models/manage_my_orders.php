<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>My Orders — Hattie's Hat'istical Hats</title>
    <style>
/* ================================================================
   User Dashboard — Light theme, same tokens as public.css
   ================================================================ */
:root {
    --red:#C93B39;--red-hover:#DA4E4C;--red-light:rgba(201,59,57,.10);--red-muted:rgba(201,59,57,.06);
    --pink:#CFA1A8;--pink-light:rgba(207,161,168,.18);--pink-muted:rgba(207,161,168,.10);
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
.topbar-right{display:flex;align-items:center;gap:10px}
.topbar-icon-btn{position:relative;width:38px;height:38px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease)}
.topbar-icon-btn:hover{background:var(--cream);color:var(--fg)}
.badge-dot{position:absolute;top:8px;right:8px;width:8px;height:8px;background:var(--red);border-radius:50%;border:2px solid var(--bg)}
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
.sidebar.collapsed{width:var(--sidebar-collapsed-w)}
.sidebar.collapsed .sidebar-collapse-btn{display:none}
.sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge{opacity:0;width:0;overflow:hidden}
.sidebar.collapsed .sb-nav-link{justify-content:center;padding:10px}
.sidebar.collapsed .sb-logout{justify-content:center;padding:10px}
.sidebar.collapsed .sidebar-header{justify-content:center}

/* ── MAIN WRAPPER ────────────────────────────────────────── */
.main-wrapper{margin-left:var(--sidebar-w);min-height:100vh;display:flex;flex-direction:column;transition:margin-left .3s var(--ease)}
.sidebar.collapsed~.main-wrapper{margin-left:var(--sidebar-collapsed-w)}
.main-content{flex:1;padding:28px}

/* ── SECTION HEADER ──────────────────────────────────────── */
.dash-section-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:12px}
.dash-section-header h1{font-size:1.6rem;font-weight:700;letter-spacing:-.02em}
.dash-section-header p{font-size:.88rem;color:var(--fg-muted)}

/* ── PANEL ───────────────────────────────────────────────── */
.panel{background:var(--card);border:1px solid var(--border-light);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:24px}
.panel-header{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--border-light)}
.panel-header h2{font-size:1rem;font-weight:600}
.panel-body{padding:0;overflow-x:auto}

/* ── DATA TABLE ──────────────────────────────────────────── */
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

/* ── STATUS BADGES ───────────────────────────────────────── */
.status-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:var(--radius-full);font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.03em}
.status-badge.pending{background:var(--cream);color:#D4923A}
.status-badge.processing{background:var(--red-light);color:var(--red)}
.status-badge.completed{background:rgba(107,203,139,.12);color:#27753F}
.status-badge.cancelled{background:rgba(122,106,109,.1);color:#7A6A6D}
.status-badge.reviewing{background:var(--pink-light);color:var(--pink)}
.status-badge.quoted{background:rgba(212,146,58,.1);color:#D4923A}
.status-badge.in-progress{background:rgba(201,59,57,.1);color:var(--red)}
.status-badge.shipped{background:rgba(58,130,201,.1);color:#2B7FD4}
.status-badge.delivered{background:rgba(107,203,139,.12);color:#27753F}
.sbadge-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0}
.status-badge.pending .sbadge-dot{background:#D4923A}
.status-badge.processing .sbadge-dot{background:var(--red)}
.status-badge.completed .sbadge-dot{background:#6BCB8B}
.status-badge.cancelled .sbadge-dot{background:#7A6A6D}
.status-badge.reviewing .sbadge-dot{background:var(--pink)}
.status-badge.quoted .sbadge-dot{background:#D4923A}
.status-badge.in-progress .sbadge-dot{background:var(--red)}
.status-badge.shipped .sbadge-dot{background:#2B7FD4}
.status-badge.delivered .sbadge-dot{background:#6BCB8B}

/* ── BUTTONS ─────────────────────────────────────────────── */
.btn-sm{padding:10px 20px;border-radius:var(--radius-full);font-size:.84rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;transition:all var(--duration) var(--ease)}
.btn-sm.primary{background:var(--red);color:#fff}
.btn-sm.primary:hover{background:var(--red-hover);transform:translateY(-1px);box-shadow:0 4px 12px rgba(201,59,57,.25)}
.btn-sm.ghost{background:var(--cream);color:var(--fg-secondary);border:1px solid var(--border)}
.btn-sm.ghost:hover{background:var(--cream-dark);color:var(--fg)}
.btn-sm.danger{background:rgba(201,59,57,.08);color:var(--red);border:1px solid rgba(201,59,57,.2)}
.btn-sm.danger:hover{background:rgba(201,59,57,.15);border-color:rgba(201,59,57,.35)}
.btn-sm.success{background:rgba(107,203,139,.1);color:#27753F;border:1px solid rgba(107,203,139,.2)}
.btn-sm.success:hover{background:rgba(107,203,139,.18);border-color:rgba(107,203,139,.35)}

/* ── EMPTY STATE ─────────────────────────────────────────── */
.empty-state{text-align:center;padding:60px 20px;color:var(--fg-muted)}
.empty-state i{font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block}
.empty-state h3{font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.empty-state p{font-size:.88rem;margin-bottom:20px}

/* ── MODAL ───────────────────────────────────────────────── */
.modal-overlay{position:fixed;inset:0;z-index:200;background:rgba(42,31,33,.5);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.modal-overlay.visible{opacity:1;visibility:visible}
.modal-box{width:100%;max-width:640px;max-height:85vh;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);overflow:hidden;transform:scale(.95) translateY(12px);transition:transform .3s var(--ease);position:relative}
.modal-overlay.visible .modal-box{transform:scale(1) translateY(0)}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:20px 24px;border-bottom:1px solid var(--border-light)}
.modal-header h3{font-size:1.05rem;font-weight:600}
.modal-close{width:36px;height:36px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:1rem;transition:all var(--duration) var(--ease)}
.modal-close:hover{background:var(--cream);color:var(--fg)}
.modal-body{padding:24px;overflow-y:auto;max-height:calc(85vh - 80px)}

/* Detail rows */
.detail-row{display:flex;gap:8px;padding:10px 0;border-bottom:1px solid var(--border-light)}
.detail-row:last-child{border-bottom:none}
.detail-label{font-size:.78rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.04em;min-width:120px;flex-shrink:0}
.detail-value{font-size:.9rem;font-weight:500;color:var(--fg)}

/* Order item inside modal */
.order-item-row{display:flex;gap:12px;align-items:center;padding:12px 0;border-bottom:1px solid var(--border-light)}
.order-item-row:last-child{border-bottom:none}
.order-item-img{width:52px;height:52px;border-radius:var(--radius-sm);object-fit:cover;background:var(--cream);flex-shrink:0}
.order-item-info{flex:1;min-width:0}
.order-item-name{font-weight:600;font-size:.9rem;color:var(--fg);line-height:1.3}
.order-item-meta{font-size:.8rem;color:var(--fg-muted);margin-top:2px}

/* Order timeline */
.order-timeline{margin-top:20px}
.timeline-step{display:flex;gap:14px;position:relative;padding-bottom:20px}
.timeline-step:last-child{padding-bottom:0}
.timeline-step::before{content:'';position:absolute;left:13px;top:28px;bottom:0;width:2px;background:var(--border-light)}
.timeline-step:last-child::before{display:none}
.timeline-dot{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.65rem;flex-shrink:0;border:2px solid var(--border-light);background:var(--bg);color:var(--fg-muted);z-index:1}
.timeline-dot.done{background:var(--red-light);border-color:var(--red);color:var(--red)}
.timeline-dot.active{background:var(--red);border-color:var(--red);color:#fff;box-shadow:0 0 0 4px var(--red-muted)}
.timeline-dot.cancelled{background:rgba(122,106,109,.1);border-color:#7A6A6D;color:#7A6A6D}
.timeline-content{padding-top:3px}
.timeline-title{font-size:.85rem;font-weight:600;color:var(--fg)}
.timeline-date{font-size:.75rem;color:var(--fg-muted);margin-top:2px}

/* Toast */
.toast-container{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.88rem;font-weight:500;pointer-events:auto;animation:toastIn .35s var(--ease) forwards}
.toast.success i{color:#6BCB8B}.toast.error i{color:#E07070}.toast.info i{color:var(--pink)}
@keyframes toastIn{from{opacity:0;transform:translateY(12px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

/* Footer */
.dash-footer{padding:18px 28px;text-align:center;font-size:.78rem;color:var(--fg-muted);border-top:1px solid var(--border-light)}
.dash-footer span{font-weight:600;color:var(--fg-secondary)}

/* Loading */
.dash-loading{display:flex;align-items:center;justify-content:center;gap:12px;padding:60px;color:var(--fg-muted)}
.dash-loading .spinner{width:28px;height:28px;border:3px solid var(--border);border-top-color:var(--red);border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* Confirm dialog */
.confirm-overlay{position:fixed;inset:0;z-index:250;background:rgba(42,31,33,.5);backdrop-filter:blur(6px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.confirm-overlay.visible{opacity:1;visibility:visible}
.confirm-box{width:100%;max-width:400px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);padding:28px;text-align:center;transform:scale(.95);transition:transform .3s var(--ease)}
.confirm-overlay.visible .confirm-box{transform:scale(1)}
.confirm-icon{width:52px;height:52px;border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;font-size:1.3rem}
.confirm-icon.warn{background:var(--cream);color:#D4923A}
.confirm-icon.danger{background:rgba(201,59,57,.1);color:var(--red)}
.confirm-box h3{font-size:1.05rem;font-weight:700;margin-bottom:8px}
.confirm-box p{font-size:.88rem;color:var(--fg-muted);margin-bottom:24px;line-height:1.6}
.confirm-actions{display:flex;gap:10px;justify-content:center}
.confirm-actions .btn-sm{min-width:110px;justify-content:center}

/* Search / filter bar */
.orders-toolbar{display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
.orders-search{position:relative;flex:1;min-width:200px;max-width:360px}
.orders-search input{width:100%;padding:10px 16px 10px 40px;border-radius:var(--radius-full);border:1.5px solid var(--border);background:var(--bg-elevated);font-size:.88rem;color:var(--fg);transition:all var(--duration) var(--ease)}
.orders-search input:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.orders-search input::placeholder{color:var(--fg-muted)}
.orders-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--fg-muted);font-size:.85rem}
.orders-filter-select{padding:10px 36px 10px 16px;border-radius:var(--radius-full);border:1.5px solid var(--border);background:var(--bg-elevated) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%239A8588' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 14px center;font-size:.85rem;color:var(--fg-secondary);cursor:pointer;appearance:none;transition:all var(--duration) var(--ease)}
.orders-filter-select:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.orders-count{font-size:.82rem;color:var(--fg-muted);margin-left:auto;white-space:nowrap}
.orders-count strong{color:var(--fg-secondary);font-weight:600}

/* ── RESPONSIVE ───────────────────────────────────────────── */
@media(max-width:768px){
    .sidebar{transform:translateX(-100%);width:var(--sidebar-w)!important;z-index:200}
    .sidebar.open{transform:translateX(0)}
    .sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge,.sidebar.collapsed .sb-logout .nav-label{opacity:1;width:auto;overflow:visible}
    .sidebar.collapsed .sb-nav-link{justify-content:flex-start;padding:10px 12px}
    .sidebar.collapsed .sb-logout{justify-content:flex-start;padding:10px 12px}
    .main-wrapper{margin-left:0!important}
    .mobile-toggle{display:flex}
    .topbar{padding:0 16px}
    .profile-label{display:none}
    .main-content{padding:20px 16px}
    .orders-toolbar{flex-direction:column;align-items:stretch}
    .orders-search{max-width:100%}
    .orders-count{margin-left:0;text-align:center}
    .dtable th,.dtable td{padding:10px 14px}
    .detail-row{flex-direction:column;gap:2px}
    .detail-label{min-width:auto}
}
@media(max-width:480px){
    .dtable .hide-mobile{display:none}
    .confirm-actions{flex-direction:column}
    .confirm-actions .btn-sm{width:100%}
}
:focus-visible{outline:2px solid var(--red);outline-offset:2px}
    </style>
</head>
<body>

<!-- ======================== TOPBAR ======================== -->
<header class="topbar" id="topbar">
    <div class="topbar-left">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar"><i class="fa-solid fa-bars"></i></button>
        <a href="../../index.php" class="topbar-logo">
            <div class="topbar-logo-mark">H</div>
            <div class="topbar-logo-text">
                <span class="topbar-logo-name">Hattie's</span>
                <span class="topbar-logo-tagline">Hat'istical Hats</span>
            </div>
        </a>
    </div>
    <div class="topbar-right">
        <a href="../../index.php" class="topbar-icon-btn" aria-label="Back to store" title="Back to store"><i class="fa-solid fa-store"></i></a>
        <a href="#" class="profile-btn" id="profileTopBtn" aria-label="Profile">
            <span class="profile-avatar" id="topAvatar">H</span>
            <span class="profile-label" id="topName">Loading...</span>
        </a>
    </div>
</header>

<!-- ======================== SIDEBAR ======================== -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" aria-label="Collapse sidebar"><i class="fa-solid fa-angles-left"></i></button>
    </div>
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Dashboard</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/index.php" class="sb-nav-link" data-section="overview">
                <i class="fa-solid fa-gauge sb-nav-icon"></i>
                <span class="sb-nav-label">Overview</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_cart.php" class="sb-nav-link" data-section="cart">
                <i class="fa-solid fa-bag-shopping sb-nav-icon"></i>
                <span class="sb-nav-label">My Cart</span>
                <span class="sb-nav-badge" id="sidebarCartBadge" style="display:none;">0</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_customers_orders.php" class="sb-nav-link active" data-section="orders">
                <i class="fa-solid fa-receipt sb-nav-icon"></i>
                <span class="sb-nav-label">My Orders</span>
            </a>
        </div>

        <div class="sidebar-section-label">Requests</div>
        <div class="sb-nav-item">
            <a href="/api/manage_customer_request.php" class="sb-nav-link" data-section="custom-requests">
                <i class="fa-solid fa-wand-magic-sparkles sb-nav-icon"></i>
                <span class="sb-nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="sidebar-section-label">Account</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/profile.php" class="sb-nav-link" data-section="profile">
                <i class="fa-solid fa-user-pen sb-nav-icon"></i>
                <span class="sb-nav-label">My Profile</span>
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
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ======================== MAIN ======================== -->
<div class="main-wrapper">

    <main class="main-content">

        <div class="dash-section-header">
            <div><h1>My Orders</h1><p>Your purchase history and order statuses.</p></div>
            <a href="../../index.php#catalog" class="btn-sm ghost"><i class="fa-solid fa-plus"></i> Shop Again</a>
        </div>

        <!-- Search & Filter toolbar -->
        <div class="orders-toolbar" id="ordersToolbar" style="display:none;">
            <div class="orders-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="orderSearchInput" placeholder="Search by order number...">
            </div>
            <select class="orders-filter-select" id="orderStatusFilter">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <div class="orders-count" id="ordersCount"></div>
        </div>

        <div class="dash-loading" id="ordersLoading"><div class="spinner"></div><span>Loading orders...</span></div>
        <div id="ordersContent" style="display:none;"><!-- populated by JS --></div>

    </main>

    <footer class="dash-footer">&copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved.</footer>
</div>

<!-- ======================== ORDER DETAIL MODAL ======================== -->
<div class="modal-overlay" id="orderDetailModal">
    <div class="modal-box">
        <div class="modal-header">
            <h3 id="orderDetailTitle">Order Details</h3>
            <button class="modal-close" id="orderDetailClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body" id="orderDetailBody"></div>
    </div>
</div>

<!-- ======================== CONFIRM DIALOG ======================== -->
<div class="confirm-overlay" id="confirmOverlay">
    <div class="confirm-box">
        <div class="confirm-icon" id="confirmIcon"><i class="fa-solid fa-triangle-exclamation"></i></div>
        <h3 id="confirmTitle">Are you sure?</h3>
        <p id="confirmMessage">This action cannot be undone.</p>
        <div class="confirm-actions">
            <button class="btn-sm ghost" id="confirmCancel">Cancel</button>
            <button class="btn-sm danger" id="confirmOk">Confirm</button>
        </div>
    </div>
</div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE
   ================================================================ */
var orders = [];
var filteredOrders = [];
var confirmCallback = null;

/* ================================================================
   UTILITIES
   ================================================================ */
function fmt(n){ return 'R ' + Number(n).toFixed(2); }
function esc(s){ var d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

function statusBadge(s){
    var map = {
        pending:'pending', processing:'processing', completed:'completed',
        cancelled:'cancelled', reviewing:'reviewing', quoted:'quoted',
        'in-progress':'in-progress', shipped:'shipped', delivered:'delivered'
    };
    var labels = {
        pending:'Pending', processing:'Processing', completed:'Completed',
        cancelled:'Cancelled', reviewing:'Reviewing', quoted:'Quoted',
        'in-progress':'In Progress', shipped:'Shipped', delivered:'Delivered'
    };
    var cls = map[s] || 'pending';
    return '<span class="status-badge '+cls+'"><span class="sbadge-dot"></span>'+esc(labels[s]||s)+'</span>';
}

function showToast(msg, type){
    type = type || 'info';
    var c = document.getElementById('toastContainer');
    var t = document.createElement('div');
    t.className = 'toast ' + type;
    var icon = type==='success' ? 'fa-circle-check' : type==='error' ? 'fa-circle-xmark' : 'fa-circle-info';
    t.innerHTML = '<i class="fa-solid '+icon+'"></i> '+esc(msg);
    c.appendChild(t);
    setTimeout(function(){
        t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all .3s ease';
        setTimeout(function(){ t.remove(); }, 300);
    }, 3000);
}

function emptyHTML(icon, title, desc, action){
    return '<div class="empty-state"><i class="fa-solid '+icon+'"></i><h3>'+title+'</h3><p>'+desc+'</p>'+(action||'')+'</div>';
}

function formatDate(dateStr){
    if(!dateStr) return '—';
    var d = new Date(dateStr);
    if(isNaN(d.getTime())) return esc(dateStr);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

/* ================================================================
   SIDEBAR
   ================================================================ */
var sidebar = document.getElementById('sidebar');
var sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
var sidebarOverlay = document.getElementById('sidebarOverlay');
var mobileToggle = document.getElementById('mobileToggle');

sidebarCollapseBtn.addEventListener('click', function(){
    sidebar.classList.toggle('collapsed');
    var icon = sidebarCollapseBtn.querySelector('i');
    icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
    icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
});
mobileToggle.addEventListener('click', function(){ sidebar.classList.add('open'); sidebarOverlay.classList.add('visible'); });
sidebarOverlay.addEventListener('click', function(){ sidebar.classList.remove('open'); sidebarOverlay.classList.remove('visible'); });

document.querySelectorAll('.sb-nav-link[data-section]').forEach(function(link){
    link.addEventListener('click', function(e){
        e.preventDefault();
        var href = link.getAttribute('href');
        if(href && href !== '#' && href !== window.location.pathname){
            window.location.href = href;
        }
    });
});

window.addEventListener('scroll', function(){ document.getElementById('topbar').classList.toggle('scrolled', window.scrollY > 10); });

/* ================================================================
   CONFIRM DIALOG
   ================================================================ */
function showConfirm(title, message, type, callback){
    type = type || 'warn';
    confirmCallback = callback;
    document.getElementById('confirmTitle').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    var iconEl = document.getElementById('confirmIcon');
    iconEl.className = 'confirm-icon ' + type;
    iconEl.innerHTML = type === 'danger'
        ? '<i class="fa-solid fa-trash-can"></i>'
        : '<i class="fa-solid fa-triangle-exclamation"></i>';
    var okBtn = document.getElementById('confirmOk');
    okBtn.className = type === 'danger' ? 'btn-sm danger' : 'btn-sm primary';
    okBtn.textContent = type === 'danger' ? 'Delete Order' : 'Confirm';
    document.getElementById('confirmOverlay').classList.add('visible');
    document.body.style.overflow = 'hidden';
}
function closeConfirm(){
    document.getElementById('confirmOverlay').classList.remove('visible');
    document.body.style.overflow = '';
    confirmCallback = null;
}
document.getElementById('confirmCancel').addEventListener('click', closeConfirm);
document.getElementById('confirmOk').addEventListener('click', function(){
    if(typeof confirmCallback === 'function') confirmCallback();
    closeConfirm();
});
document.getElementById('confirmOverlay').addEventListener('click', function(e){
    if(e.target === this) closeConfirm();
});

/* ================================================================
   ORDERS — API
   ================================================================ */

/*
   Expected response from GET /api/user/orders.php:

   {
     orders: [
       {
         id: 1,
         order_number: "HAT-20250115-001",
         date: "2025-01-15",
         items_count: 3,
         total: 1250.00,
         status: "processing",
         shipping_address: { street, city, province, postal_code, phone },
         payment_method: "EFT",
         notes: "...",
         timeline: [
           { status: "pending", date: "2025-01-15 10:00", label: "Order Placed" },
           { status: "processing", date: "2025-01-15 14:30", label: "Payment Confirmed" },
           { status: "shipped", date: null, label: "Shipped" },
           { status: "delivered", date: null, label: "Delivered" }
         ],
         items: [
           { name: "Wide Brim Sun Hat", image: "/assets/img/...", price: 450.00, qty: 1, size: "M" },
           { name: "Fedora Classic", image: "/assets/img/...", price: 400.00, qty: 2, size: "L" }
         ],
         can_cancel: true
       }
     ]
   }
*/

function loadOrders(){
    var loading = document.getElementById('ordersLoading');
    var content = document.getElementById('ordersContent');
    loading.style.display = '';
    content.style.display = 'none';

    fetch('/api/user/orders.php')
      .then(function(r){ return r.json(); })
      .then(function(data){
          orders = data.orders || [];
          filteredOrders = orders.slice();
          loading.style.display = 'none';
          content.style.display = '';
          document.getElementById('ordersToolbar').style.display = '';
          renderOrders();
      })
      .catch(function(err){
          console.error('Orders load error:', err);
          loading.style.display = 'none';
          content.innerHTML = emptyHTML('fa-receipt', 'Unable to load orders', 'Please try refreshing the page.', '<button class="btn-sm ghost" onclick="loadOrders()" style="display:inline-flex;"><i class="fa-solid fa-rotate-right"></i> Retry</button>');
      });
}

function renderOrders(){
    var badge = document.getElementById('sidebarCartBadge');
    // Cart badge not directly related, but kept for consistency

    var countEl = document.getElementById('ordersCount');
    countEl.innerHTML = 'Showing <strong>'+filteredOrders.length+'</strong> of <strong>'+orders.length+'</strong> order'+(orders.length!==1?'s':'');

    if(!filteredOrders.length && orders.length){
        document.getElementById('ordersContent').innerHTML = emptyHTML('fa-magnifying-glass', 'No matching orders', 'Try adjusting your search or filter.');
        return;
    }

    if(!orders.length){
        document.getElementById('ordersContent').innerHTML = emptyHTML('fa-receipt', 'No orders yet', 'Your purchase history will appear here after your first order.', '<a href="../../index.php#catalog" class="btn-sm primary" style="display:inline-flex;"><i class="fa-solid fa-hat-cowboy"></i> Start Shopping</a>');
        return;
    }

    var rows = filteredOrders.map(function(o){
        return '<tr>'+
            '<td style="font-weight:600;white-space:nowrap;">'+esc(o.order_number)+'</td>'+
            '<td class="hide-mobile">'+formatDate(o.date)+'</td>'+
            '<td>'+o.items_count+' item'+(o.items_count!==1?'s':'')+'</td>'+
            '<td class="dtable-price">'+fmt(o.total)+'</td>'+
            '<td>'+statusBadge(o.status)+'</td>'+
            '<td style="white-space:nowrap;">'+
                '<button class="btn-sm ghost" data-view-order="'+o.id+'" style="padding:6px 14px;font-size:.78rem;" title="View details"><i class="fa-solid fa-eye"></i> <span class="hide-mobile">View</span></button>'+
                (o.can_cancel && (o.status==='pending'||o.status==='processing') ? '<button class="btn-sm danger" data-cancel-order="'+o.id+'" style="padding:6px 14px;font-size:.78rem;margin-left:4px;" title="Cancel order"><i class="fa-solid fa-xmark"></i></button>' : '')+
            '</td>'+
        '</tr>';
    }).join('');

    document.getElementById('ordersContent').innerHTML =
        '<div class="panel">'+
            '<div class="panel-header"><h2>'+filteredOrders.length+' Order'+(filteredOrders.length!==1?'s':'')+'</h2></div>'+
            '<div class="panel-body">'+
                '<table class="dtable">'+
                    '<thead><tr><th>Order</th><th class="hide-mobile">Date</th><th>Items</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead>'+
                    '<tbody>'+rows+'</tbody>'+
                '</table>'+
            '</div>'+
        '</div>';

    // Bind view buttons
    document.querySelectorAll('[data-view-order]').forEach(function(b){
        b.addEventListener('click', function(){ openOrderDetail(b.dataset.viewOrder); });
    });

    // Bind cancel buttons
    document.querySelectorAll('[data-cancel-order]').forEach(function(b){
        b.addEventListener('click', function(){ cancelOrder(b.dataset.cancelOrder); });
    });
}

/* ── Order Detail Modal ──────────────────────────────────── */
function openOrderDetail(id){
    var o = orders.find(function(x){ return x.id == id; });
    if(!o) return;

    document.getElementById('orderDetailTitle').textContent = 'Order ' + esc(o.order_number);

    // Items list
    var itemsHtml = (o.items || []).map(function(item){
        var metaParts = [];
        metaParts.push('Qty: '+item.qty);
        metaParts.push(fmt(item.price)+' each');
        if(item.size) metaParts.push('Size: '+esc(item.size));
        if(item.color) metaParts.push('Color: '+esc(item.color));

        return '<div class="order-item-row">'+
            '<img class="order-item-img" src="'+esc(item.image)+'" alt="" onerror="this.style.display=\'none\'">'+
            '<div class="order-item-info">'+
                '<div class="order-item-name">'+esc(item.name)+'</div>'+
                '<div class="order-item-meta">'+metaParts.join(' &middot; ')+'</div>'+
            '</div>'+
            '<span class="dtable-price" style="font-size:.88rem;white-space:nowrap;">'+fmt(item.price * item.qty)+'</span>'+
        '</div>';
    }).join('') || '<p style="color:var(--fg-muted);font-size:.88rem;padding:12px 0;">No item details available.</p>';

    // Timeline
    var timelineHtml = '';
    if(o.timeline && o.timeline.length){
        var allCancelled = o.status === 'cancelled';
        var doneStatuses = [];
        var activeIdx = -1;

        // Determine which steps are done
        var statusFlow = ['pending','processing','shipped','delivered','completed'];
        var currentIdx = statusFlow.indexOf(o.status);
        if(currentIdx === -1) currentIdx = 0; // fallback

        timelineHtml = '<div class="order-timeline">';
        o.timeline.forEach(function(step, i){
            var stepIdx = statusFlow.indexOf(step.status);
            var isDone = false;
            var isActive = false;
            var isCancelled = false;

            if(allCancelled){
                if(i < o.timeline.length - 1){ isDone = true; }
                else { isCancelled = true; }
            } else {
                isDone = stepIdx < currentIdx || (stepIdx === currentIdx && step.date);
                isActive = stepIdx === currentIdx && !step.date;
            }

            timelineHtml +=
                '<div class="timeline-step">'+
                    '<div class="timeline-dot '+(isDone?'done':'')+(isActive?' active':'')+(isCancelled?' cancelled':'')+'">'+
                        '<i class="fa-solid '+(isDone||isActive ? 'fa-check' : isCancelled ? 'fa-xmark' : 'fa-circle')+'" style="font-size:'+(isDone||isActive||isCancelled?'.65rem':'.3rem')+'"></i>'+
                    '</div>'+
                    '<div class="timeline-content">'+
                        '<div class="timeline-title" style="'+((isDone||isActive)?'':'color:var(--fg-muted)')+'">'+esc(step.label)+'</div>'+
                        '<div class="timeline-date">'+(step.date ? formatDate(step.date) : (isActive ? 'In progress...' : (isCancelled ? 'Order cancelled' : 'Pending')))+'</div>'+
                    '</div>'+
                '</div>';
        });
        timelineHtml += '</div>';
    }

    // Shipping address
    var shippingHtml = '';
    if(o.shipping_address){
        var sa = o.shipping_address;
        shippingHtml =
            '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:20px 0 8px;">Shipping Address</h4>'+
            '<div style="font-size:.9rem;color:var(--fg-secondary);line-height:1.7;padding-bottom:8px;">'+
                esc(sa.street)+(sa.street?',':'')+
                (sa.city?'<br>'+esc(sa.city):'')+
                (sa.province?'<br>'+esc(sa.province):'')+
                (sa.postal_code?'<br>'+esc(sa.postal_code):'')+
                (sa.phone?'<br><span style="color:var(--fg-muted);">'+esc(sa.phone)+'</span>':'')+
            '</div>';
    }

    // Notes
    var notesHtml = '';
    if(o.notes){
        notesHtml =
            '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:20px 0 8px;">Notes</h4>'+
            '<p style="font-size:.9rem;color:var(--fg-secondary);line-height:1.7;padding-bottom:8px;">'+esc(o.notes)+'</p>';
    }

    // Cancel button in modal (if allowed)
    var cancelBtnHtml = '';
    if(o.can_cancel && (o.status==='pending'||o.status==='processing')){
        cancelBtnHtml = '<div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--border-light);display:flex;justify-content:flex-end;">'+
            '<button class="btn-sm danger" id="modalCancelOrderBtn" data-cancel-order="'+o.id+'"><i class="fa-solid fa-xmark"></i> Cancel Order</button>'+
        '</div>';
    }

    // Payment method
    var paymentHtml = o.payment_method
        ? '<div class="detail-row"><span class="detail-label">Payment</span><span class="detail-value">'+esc(o.payment_method)+'</span></div>'
        : '';

    document.getElementById('orderDetailBody').innerHTML =
        '<div class="detail-row"><span class="detail-label">Date</span><span class="detail-value">'+formatDate(o.date)+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Status</span><span class="detail-value">'+statusBadge(o.status)+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Items</span><span class="detail-value">'+o.items_count+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Subtotal</span><span class="detail-value">'+fmt(o.total)+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Delivery</span><span class="detail-value">'+(o.delivery_fee !== undefined ? (o.delivery_fee === 0 ? '<span style="color:#27753F;">Free</span>' : fmt(o.delivery_fee)) : '—')+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Total</span><span class="detail-value dtable-price" style="font-size:1rem;">'+fmt(o.total + (o.delivery_fee || 0))+'</span></div>'+
        paymentHtml+
        shippingHtml+
        notesHtml+
        '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:20px 0 8px;">Items</h4>'+
        itemsHtml+
        timelineHtml+
        cancelBtnHtml;

    // Bind modal cancel button
    var modalCancelBtn = document.getElementById('modalCancelOrderBtn');
    if(modalCancelBtn){
        modalCancelBtn.addEventListener('click', function(){
            closeModals();
            cancelOrder(o.id);
        });
    }

    document.getElementById('orderDetailModal').classList.add('visible');
    document.body.style.overflow = 'hidden';
}

/* ── Cancel Order ────────────────────────────────────────── */
function cancelOrder(id){
    var o = orders.find(function(x){ return x.id == id; });
    if(!o) return;

    showConfirm(
        'Cancel Order '+o.order_number+'?',
        'Are you sure you want to cancel this order? If payment has been made, a refund will be processed. This action cannot be undone.',
        'danger',
        function(){
            // Show loading state
            showToast('Cancelling order...', 'info');

            fetch('/api/handlers/order_handler.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({action: 'cancel', order_id: id})
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if(data.success){
                    showToast('Order cancelled successfully', 'success');
                    // Optimistic update
                    o.status = 'cancelled';
                    o.can_cancel = false;
                    // Update timeline if exists
                    if(o.timeline && o.timeline.length){
                        var lastStep = o.timeline[o.timeline.length - 1];
                        if(!lastStep.date){
                            lastStep.date = new Date().toISOString();
                        } else {
                            o.timeline.push({status:'cancelled', date: new Date().toISOString(), label:'Order Cancelled'});
                        }
                    }
                    applyFilters();
                    renderOrders();
                } else {
                    showToast(data.message || 'Unable to cancel order', 'error');
                }
            })
            .catch(function(){
                showToast('Network error — please try again', 'error');
            });
        }
    );
}

/* ── Search & Filter ─────────────────────────────────────── */
function applyFilters(){
    var query = (document.getElementById('orderSearchInput').value || '').toLowerCase().trim();
    var statusFilter = document.getElementById('orderStatusFilter').value;

    filteredOrders = orders.filter(function(o){
        var matchSearch = !query || o.order_number.toLowerCase().indexOf(query) !== -1;
        var matchStatus = !statusFilter || o.status === statusFilter;
        return matchSearch && matchStatus;
    });
}

document.getElementById('orderSearchInput').addEventListener('input', function(){
    applyFilters();
    renderOrders();
});

document.getElementById('orderStatusFilter').addEventListener('change', function(){
    applyFilters();
    renderOrders();
});

/* ── Modals ──────────────────────────────────────────────── */
function closeModals(){
    document.querySelectorAll('.modal-overlay').forEach(function(m){ m.classList.remove('visible'); });
    document.body.style.overflow = '';
}
document.getElementById('orderDetailClose').addEventListener('click', closeModals);
document.getElementById('orderDetailModal').addEventListener('click', function(e){ if(e.target === this) closeModals(); });

/* ================================================================
   LOAD USER INFO FOR TOPBAR
   ================================================================ */
function loadUserInfo(){
    fetch('/api/user/profile.php')
      .then(function(r){ return r.json(); })
      .then(function(data){
          if(data.first_name && data.last_name){
              var initials = data.first_name.charAt(0) + data.last_name.charAt(0);
              document.getElementById('topAvatar').textContent = initials;
              document.getElementById('topName').textContent = data.first_name + ' ' + data.last_name;
          }
      })
      .catch(function(){ /* silent */ });
}

/* ================================================================
   INIT
   ================================================================ */
loadUserInfo();
loadOrders();

/* ================================================================
   KEYBOARD
   ================================================================ */
document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        closeModals();
        closeConfirm();
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    }
});
</script>
</body>
</html>