<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>My Profile — Hattie's Hat'istical Hats</title>
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

/* ── PROFILE GRID ────────────────────────────────────────── */
.profile-grid{display:grid;grid-template-columns:320px 1fr;gap:32px;align-items:start}

/* Profile Card */
.profile-card{background:var(--card);border:1px solid var(--border-light);border-radius:var(--radius-lg);padding:28px;box-shadow:var(--shadow-sm)}
.profile-avatar-upload{text-align:center;margin-bottom:24px}
.profile-avatar-large{width:110px;height:110px;border-radius:50%;background:linear-gradient(135deg,var(--red),var(--pink));color:#fff;font-size:2.4rem;font-weight:700;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;position:relative;overflow:hidden;border:4px solid var(--bg);box-shadow:var(--shadow-md)}
.profile-avatar-large img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover}
.avatar-edit{position:absolute;bottom:2px;right:2px;width:32px;height:32px;border-radius:50%;background:var(--fg);color:#fff;font-size:.7rem;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all var(--duration) var(--ease);border:3px solid var(--bg)}
.avatar-edit:hover{background:var(--red);transform:scale(1.1)}
.profile-name-display{font-size:1.15rem;font-weight:700;color:var(--fg);margin-bottom:2px}
.profile-email-display{font-size:.85rem;color:var(--fg-muted);word-break:break-all}
.profile-since{font-size:.78rem;color:var(--fg-muted);margin-top:10px;display:flex;align-items:center;gap:6px}
.profile-divider{height:1px;background:var(--border-light);margin:20px 0}
.profile-stat-row{display:flex;justify-content:space-between;align-items:center;padding:8px 0}
.profile-stat-row .label{font-size:.82rem;color:var(--fg-muted)}
.profile-stat-row .value{font-size:.88rem;font-weight:600;color:var(--fg)}
.profile-stat-row .value.accent{color:var(--red)}
.profile-danger-zone{margin-top:24px;padding-top:20px;border-top:1.5px solid rgba(201,59,57,.15)}
.profile-danger-zone h4{font-size:.78rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--red);margin-bottom:10px;display:flex;align-items:center;gap:6px}
.btn-sm-danger{padding:9px 18px;border-radius:var(--radius-full);font-size:.82rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;transition:all var(--duration) var(--ease);background:rgba(201,59,57,.06);color:var(--red);border:1.5px solid rgba(201,59,57,.18)}
.btn-sm-danger:hover{background:rgba(201,59,57,.12);border-color:rgba(201,59,57,.3);transform:translateY(-1px)}

/* ── FORMS ───────────────────────────────────────────────── */
.form-group{margin-bottom:18px}
.form-group label{display:block;font-size:.82rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.form-input{width:100%;padding:11px 16px;border-radius:var(--radius-md);border:1.5px solid var(--border);background:var(--bg);font-size:.9rem;color:var(--fg);transition:all var(--duration) var(--ease)}
.form-input:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.form-input::placeholder{color:var(--fg-muted)}
.form-input.invalid{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.form-input.success{border-color:#6BCB8B;box-shadow:0 0 0 3px rgba(107,203,139,.1)}
.form-error{display:none;font-size:.75rem;color:var(--red);margin-top:4px;align-items:center;gap:4px}
.form-error.visible{display:flex}
.form-hint{display:block;font-size:.72rem;color:var(--fg-muted);margin-top:4px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.pwd-divider{display:flex;align-items:center;gap:12px;margin:28px 0 20px}
.pwd-divider::before,.pwd-divider::after{content:'';flex:1;height:1px;background:var(--border-light)}
.pwd-divider span{font-size:.78rem;color:var(--fg-muted);font-weight:500;white-space:nowrap}

/* Password strength bar */
.pwd-strength{margin-top:8px}
.pwd-strength-bar{height:4px;border-radius:4px;background:var(--border-light);overflow:hidden}
.pwd-strength-fill{height:100%;border-radius:4px;transition:all .3s var(--ease);width:0}
.pwd-strength-fill.weak{width:25%;background:#E07070}
.pwd-strength-fill.fair{width:50%;background:#D4923A}
.pwd-strength-fill.good{width:75%;background:#D4923A}
.pwd-strength-fill.strong{width:100%;background:#6BCB8B}
.pwd-strength-label{font-size:.72rem;font-weight:600;margin-top:4px;transition:color .3s var(--ease)}

/* ── BUTTONS ─────────────────────────────────────────────── */
.btn-sm{padding:10px 20px;border-radius:var(--radius-full);font-size:.84rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;transition:all var(--duration) var(--ease)}
.btn-sm.primary{background:var(--red);color:#fff}
.btn-sm.primary:hover{background:var(--red-hover);transform:translateY(-1px);box-shadow:0 4px 12px rgba(201,59,57,.25)}
.btn-sm.primary:disabled{opacity:.55;cursor:not-allowed;transform:none;box-shadow:none}
.btn-sm.ghost{background:var(--cream);color:var(--fg-secondary);border:1px solid var(--border)}
.btn-sm.ghost:hover{background:var(--cream-dark);color:var(--fg)}
.btn-sm.danger{background:rgba(201,59,57,.08);color:var(--red);border:1px solid rgba(201,59,57,.2)}
.btn-sm.danger:hover{background:rgba(201,59,57,.15);border-color:rgba(201,59,57,.35)}
.btn-sm.success{background:rgba(107,203,139,.1);color:#27753F;border:1px solid rgba(107,203,139,.2)}
.btn-sm.success:hover{background:rgba(107,203,139,.18);border-color:rgba(107,203,139,.35)}

/* ── CONFIRM DIALOG ──────────────────────────────────────── */
.confirm-overlay{position:fixed;inset:0;z-index:250;background:rgba(42,31,33,.5);backdrop-filter:blur(6px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.confirm-overlay.visible{opacity:1;visibility:visible}
.confirm-box{width:100%;max-width:420px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);padding:28px;text-align:center;transform:scale(.95);transition:transform .3s var(--ease)}
.confirm-overlay.visible .confirm-box{transform:scale(1)}
.confirm-icon{width:52px;height:52px;border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;font-size:1.3rem}
.confirm-icon.danger{background:rgba(201,59,57,.1);color:var(--red)}
.confirm-icon.warn{background:var(--cream);color:#D4923A}
.confirm-box h3{font-size:1.05rem;font-weight:700;margin-bottom:8px}
.confirm-box p{font-size:.88rem;color:var(--fg-muted);margin-bottom:24px;line-height:1.6}
.confirm-actions{display:flex;gap:10px;justify-content:center}
.confirm-actions .btn-sm{min-width:110px;justify-content:center}
.confirm-input-row{margin-bottom:18px;text-align:left}
.confirm-input-row label{display:block;font-size:.8rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.confirm-input-row input{width:100%;padding:10px 16px;border-radius:var(--radius-md);border:1.5px solid var(--border);background:var(--bg);font-size:.9rem;color:var(--fg);text-align:center}
.confirm-input-row input:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.confirm-input-row input.invalid{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}

/* ── TOAST ───────────────────────────────────────────────── */
.toast-container{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.88rem;font-weight:500;pointer-events:auto;animation:toastIn .35s var(--ease) forwards}
.toast.success i{color:#6BCB8B}.toast.error i{color:#E07070}.toast.info i{color:var(--pink)}
@keyframes toastIn{from{opacity:0;transform:translateY(12px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

/* ── FOOTER & LOADING ────────────────────────────────────── */
.dash-footer{padding:18px 28px;text-align:center;font-size:.78rem;color:var(--fg-muted);border-top:1px solid var(--border-light)}
.dash-footer span{font-weight:600;color:var(--fg-secondary)}
.dash-loading{display:flex;align-items:center;justify-content:center;gap:12px;padding:60px;color:var(--fg-muted)}
.dash-loading .spinner{width:28px;height:28px;border:3px solid var(--border);border-top-color:var(--red);border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* Saved flash */
@keyframes savedFlash{0%{box-shadow:0 0 0 0 rgba(107,203,139,.4)}70%{box-shadow:0 0 0 12px rgba(107,203,139,0)}100%{box-shadow:0 0 0 0 rgba(107,203,139,0)}}
.form-input.just-saved{animation:savedFlash .6s var(--ease);border-color:#6BCB8B}

/* ── RESPONSIVE ───────────────────────────────────────────── */
@media(max-width:900px){
    .profile-grid{grid-template-columns:1fr}
    .profile-card{order:-1}
}
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
    .form-row{grid-template-columns:1fr}
}
@media(max-width:480px){
    .profile-avatar-large{width:90px;height:90px;font-size:2rem}
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
            <a href="/api/models/manage_customers_orders.php" class="sb-nav-link" data-section="orders">
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
            <a href="/dashboards/user/profile.php" class="sb-nav-link active" data-section="profile">
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
            <div><h1>My Profile</h1><p>Update your personal information and account settings.</p></div>
        </div>

        <div class="dash-loading" id="profileLoading"><div class="spinner"></div><span>Loading profile...</span></div>
        <div id="profileContent" style="display:none;"><!-- populated by JS --></div>

    </main>

    <footer class="dash-footer">&copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved.</footer>
</div>

<!-- ======================== CONFIRM DIALOG ======================== -->
<div class="confirm-overlay" id="confirmOverlay">
    <div class="confirm-box">
        <div class="confirm-icon" id="confirmIcon"><i class="fa-solid fa-triangle-exclamation"></i></div>
        <h3 id="confirmTitle">Are you sure?</h3>
        <p id="confirmMessage">This action cannot be undone.</p>
        <div id="confirmExtraContent"></div>
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
var userData = null;
var confirmCallback = null;

/* ================================================================
   UTILITIES
   ================================================================ */
function fmt(n){ return 'R ' + Number(n).toFixed(2); }
function esc(s){ var d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

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
    }, 3500);
}

function emptyHTML(icon, title, desc){
    return '<div style="text-align:center;padding:60px 20px;color:var(--fg-muted);"><i class="fa-solid '+icon+'" style="font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block;"></i><h3 style="font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px;">'+title+'</h3><p style="font-size:.88rem;margin-bottom:20px;">'+desc+'</p><button class="btn-sm ghost" onclick="loadProfile()" style="display:inline-flex;"><i class="fa-solid fa-rotate-right"></i> Retry</button></div>';
}

function formatDate(dateStr){
    if(!dateStr) return '—';
    var d = new Date(dateStr);
    if(isNaN(d.getTime())) return esc(dateStr);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

function getInitials(first, last){
    return ((first||'').charAt(0) + (last||'').charAt(0)).toUpperCase() || 'U';
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
function showConfirm(title, message, type, callback, okLabel, extraHtml){
    type = type || 'warn';
    confirmCallback = callback;
    document.getElementById('confirmTitle').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    document.getElementById('confirmExtraContent').innerHTML = extraHtml || '';
    var iconEl = document.getElementById('confirmIcon');
    iconEl.className = 'confirm-icon ' + type;
    var icons = {warn:'fa-triangle-exclamation', danger:'fa-trash-can'};
    iconEl.innerHTML = '<i class="fa-solid '+(icons[type]||icons.warn)+'"></i>';
    var okBtn = document.getElementById('confirmOk');
    okBtn.className = 'btn-sm ' + (type==='danger'?'danger':'primary');
    okBtn.textContent = okLabel || 'Confirm';
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
});
document.getElementById('confirmOverlay').addEventListener('click', function(e){
    if(e.target === this) closeConfirm();
});

/* ================================================================
   PROFILE — API
   ================================================================ */

/*
   Expected responses:

   GET /api/user/profile.php
   {
     first_name: "Hattie",
     last_name: "M",
     email: "hattie@example.co.za",
     phone: "+27 82 345 6789",
     avatar: "/assets/uploads/avatars/123.jpg",  // null if none
     created_at: "2024-03-15",
     total_spent: 3450.00,
     total_orders: 8,
     total_requests: 2,
     address: {
       street: "12 Hat Lane",
       city: "Cape Town",
       province: "Western Cape",
       postal_code: "8001"
     }
   }

   POST /api/user/profile.php (update personal info)
   Content-Type: multipart/form-data
   Fields: first_name, last_name, email, phone, street, city, province, postal_code
   Response: { success: true } or { success: false, message: "...", errors: { email: "..." } }

   POST /api/user/profile.php (upload avatar)
   Content-Type: multipart/form-data
   Fields: avatar (file)
   Response: { success: true, avatar: "/assets/uploads/..." }

   POST /api/user/profile.php (change password)
   Content-Type: application/json
   Body: { action: "change_password", current_password: "...", new_password: "..." }
   Response: { success: true } or { success: false, message: "Current password is incorrect" }

   POST /api/user/profile.php (delete account)
   Content-Type: application/json
   Body: { action: "delete_account", password: "..." }
   Response: { success: true } or { success: false, message: "..." }
*/

function loadProfile(){
    var loading = document.getElementById('profileLoading');
    var content = document.getElementById('profileContent');
    loading.style.display = '';
    content.style.display = 'none';

    fetch('/api/user/profile.php')
      .then(function(r){
          if(!r.ok) throw new Error('HTTP '+r.status);
          return r.json();
      })
      .then(function(data){
          userData = data;
          loading.style.display = 'none';
          content.style.display = '';
          renderProfile();
          updateTopbar();
      })
      .catch(function(err){
          console.error('Profile load error:', err);
          loading.style.display = 'none';
          content.innerHTML = emptyHTML('fa-user', 'Unable to load profile', 'Please try refreshing the page.');
      });
}

function updateTopbar(){
    if(!userData) return;
    var initials = getInitials(userData.first_name, userData.last_name);
    document.getElementById('topAvatar').textContent = initials;
    document.getElementById('topAvatar').style.backgroundImage = userData.avatar ? 'url('+esc(userData.avatar)+')' : '';
    document.getElementById('topAvatar').style.backgroundSize = userData.avatar ? 'cover' : '';
    document.getElementById('topName').textContent = (userData.first_name||'') + ' ' + (userData.last_name||'');
}

function renderProfile(){
    var initials = getInitials(userData.first_name, userData.last_name);
    var addr = userData.address || {};

    // Avatar HTML
    var avatarImg = userData.avatar
        ? '<img src="'+esc(userData.avatar)+'" alt="Avatar" id="avatarImage">'
        : '';
    var avatarHtml =
        '<div class="profile-avatar-large" id="avatarContainer">'+
            avatarImg +
            (!userData.avatar ? esc(initials) : '') +
            '<label class="avatar-edit" for="avatarInput" title="Change photo"><i class="fa-solid fa-camera"></i></label>'+
            '<input type="file" id="avatarInput" accept="image/jpeg,image/png,image/gif,image/webp" hidden>'+
        '</div>';

    // Address section
    var addressHtml =
        '<div class="pwd-divider"><span>Delivery Address</span></div>'+
        '<div class="form-row">'+
            '<div class="form-group" style="grid-column:1/-1;"><label>Street Address</label><input type="text" id="pStreet" class="form-input" value="'+esc(addr.street||'')+'" placeholder="e.g. 12 Hat Lane"><span class="form-error" id="pStreetError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
        '</div>'+
        '<div class="form-row">'+
            '<div class="form-group"><label>City</label><input type="text" id="pCity" class="form-input" value="'+esc(addr.city||'')+'" placeholder="e.g. Cape Town"><span class="form-error" id="pCityError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
            '<div class="form-group"><label>Province</label>'+
                '<select id="pProvince" class="form-input">'+
                    '<option value="">Select province</option>'+
                    '<option value="Eastern Cape"'+(addr.province==='Eastern Cape'?' selected':'')+'>Eastern Cape</option>'+
                    '<option value="Free State"'+(addr.province==='Free State'?' selected':'')+'>Free State</option>'+
                    '<option value="Gauteng"'+(addr.province==='Gauteng'?' selected':'')+'>Gauteng</option>'+
                    '<option value="KwaZulu-Natal"'+(addr.province==='KwaZulu-Natal'?' selected':'')+'>KwaZulu-Natal</option>'+
                    '<option value="Limpopo"'+(addr.province==='Limpopo'?' selected':'')+'>Limpopo</option>'+
                    '<option value="Mpumalanga"'+(addr.province==='Mpumalanga'?' selected':'')+'>Mpumalanga</option>'+
                    '<option value="Northern Cape"'+(addr.province==='Northern Cape'?' selected':'')+'>Northern Cape</option>'+
                    '<option value="North West"'+(addr.province==='North West'?' selected':'')+'>North West</option>'+
                    '<option value="Western Cape"'+(addr.province==='Western Cape'?' selected':'')+'>Western Cape</option>'+
                '</select>'+
                '<span class="form-error" id="pProvinceError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span>'+
            '</div>'+
        '</div>'+
        '<div class="form-row">'+
            '<div class="form-group"><label>Postal Code</label><input type="text" id="pPostalCode" class="form-input" value="'+esc(addr.postal_code||'')+'" placeholder="e.g. 8001" maxlength="4"><span class="form-error" id="pPostalCodeError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
            '<div class="form-group"></div>'+
        '</div>';

    document.getElementById('profileContent').innerHTML =
        '<div class="profile-grid">'+

            /* ── Left: Profile Card ── */
            '<div class="profile-card">'+
                '<div class="profile-avatar-upload">'+avatarHtml+'</div>'+
                '<div class="profile-name-display" id="profileDisplayName">'+esc(userData.first_name+' '+userData.last_name)+'</div>'+
                '<div class="profile-email-display" id="profileDisplayEmail">'+esc(userData.email)+'</div>'+
                '<div class="profile-since"><i class="fa-regular fa-calendar"></i> Member since '+formatDate(userData.created_at)+'</div>'+

                '<div class="profile-divider"></div>'+

                '<div class="profile-stat-row"><span class="label">Total Orders</span><span class="value">'+(userData.total_orders||0)+'</span></div>'+
                '<div class="profile-stat-row"><span class="label">Custom Requests</span><span class="value">'+(userData.total_requests||0)+'</span></div>'+
                '<div class="profile-stat-row"><span class="label">Total Spent</span><span class="value accent">'+fmt(userData.total_spent||0)+'</span></div>'+

                '<div class="profile-danger-zone">'+
                    '<h4><i class="fa-solid fa-shield-halved"></i> Danger Zone</h4>'+
                    '<button class="btn-sm-danger" id="deleteAccountBtn"><i class="fa-solid fa-trash-can"></i> Delete Account</button>'+
                    '<p style="font-size:.72rem;color:var(--fg-muted);margin-top:8px;line-height:1.5;">Permanently delete your account and all associated data. This cannot be undone.</p>'+
                '</div>'+
            '</div>'+

            /* ── Right: Forms ── */
            '<div class="profile-card">'+
                '<h3 style="font-size:1rem;font-weight:700;margin-bottom:20px;display:flex;align-items:center;gap:8px;"><i class="fa-solid fa-user" style="color:var(--red);font-size:.85rem;"></i> Personal Information</h3>'+
                '<form id="profileForm" novalidate>'+
                    '<div class="form-row">'+
                        '<div class="form-group"><label>First Name <span style="color:var(--red);">*</span></label><input type="text" id="pFirstName" class="form-input" value="'+esc(userData.first_name||'')+'" placeholder="First name"><span class="form-error" id="pFirstNameError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                        '<div class="form-group"><label>Last Name <span style="color:var(--red);">*</span></label><input type="text" id="pLastName" class="form-input" value="'+esc(userData.last_name||'')+'" placeholder="Last name"><span class="form-error" id="pLastNameError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '</div>'+
                    '<div class="form-group"><label>Email Address <span style="color:var(--red);">*</span></label><input type="email" id="pEmail" class="form-input" value="'+esc(userData.email||'')+'" placeholder="you@example.co.za"><span class="form-error" id="pEmailError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '<div class="form-group"><label>Phone Number</label><input type="tel" id="pPhone" class="form-input" value="'+esc(userData.phone||'')+'" placeholder="+27 82 345 6789"><span class="form-error" id="pPhoneError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+

                    addressHtml +

                    '<div style="display:flex;gap:10px;margin-top:8px;">'+
                        '<button type="submit" class="btn-sm primary" id="profileSaveBtn" style="flex:1;justify-content:center;padding:12px;"><i class="fa-solid fa-check"></i> Save Changes</button>'+
                        '<button type="button" class="btn-sm ghost" id="profileResetBtn" style="padding:12px 20px;"><i class="fa-solid fa-rotate-left"></i> Reset</button>'+
                    '</div>'+
                '</form>'+

                '<div class="pwd-divider"><span>Change Password</span></div>'+

                '<form id="passwordForm" novalidate>'+
                    '<div class="form-group"><label>Current Password</label><input type="password" id="pCurrentPwd" class="form-input" placeholder="Enter your current password" autocomplete="current-password"><span class="form-error" id="pCurrentPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '<div class="form-row">'+
                        '<div class="form-group"><label>New Password</label><input type="password" id="pNewPwd" class="form-input" placeholder="Minimum 8 characters" autocomplete="new-password"><div class="pwd-strength" id="pwdStrength" style="display:none;"><div class="pwd-strength-bar"><div class="pwd-strength-fill" id="pwdStrengthFill"></div></div><div class="pwd-strength-label" id="pwdStrengthLabel"></div></div><span class="form-error" id="pNewPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                        '<div class="form-group"><label>Confirm New Password</label><input type="password" id="pConfirmPwd" class="form-input" placeholder="Re-enter new password" autocomplete="new-password"><span class="form-error" id="pConfirmPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '</div>'+
                    '<button type="submit" class="btn-sm primary" id="pwdSaveBtn" style="width:100%;justify-content:center;padding:12px;margin-top:8px;"><i class="fa-solid fa-lock"></i> Update Password</button>'+
                '</form>'+
            '</div>'+

        '</div>';

    // Bind all events
    bindProfileEvents();
}

/* ── Event Bindings ──────────────────────────────────────── */
function bindProfileEvents(){

    /* Avatar upload */
    var avatarInput = document.getElementById('avatarInput');
    if(avatarInput){
        avatarInput.addEventListener('change', function(){
            var file = avatarInput.files[0];
            if(!file) return;

            // Validate
            if(!file.type.match(/^image\/(jpeg|jpg|png|gif|webp)$/)){
                showToast('Please select a valid image file (JPG, PNG, GIF, WebP)','error');
                avatarInput.value = '';
                return;
            }
            if(file.size > 5 * 1024 * 1024){
                showToast('Image must be under 5MB','error');
                avatarInput.value = '';
                return;
            }

            // Show preview immediately
            var reader = new FileReader();
            reader.onload = function(e){
                var container = document.getElementById('avatarContainer');
                var existing = document.getElementById('avatarImage');
                if(existing){
                    existing.src = e.target.result;
                } else {
                    var img = document.createElement('img');
                    img.id = 'avatarImage';
                    img.src = e.target.result;
                    img.alt = 'Avatar';
                    container.insertBefore(img, container.firstChild);
                    // Remove text initials
                    var textNodes = Array.from(container.childNodes).filter(function(n){ return n.nodeType === 3; });
                    textNodes.forEach(function(n){ n.remove(); });
                }
            };
            reader.readAsDataURL(file);

            // Upload
            var fd = new FormData();
            fd.append('avatar', file);

            fetch('/api/user/profile.php', { method: 'POST', body: fd })
              .then(function(r){ return r.json(); })
              .then(function(data){
                  if(data.success){
                      userData.avatar = data.avatar;
                      showToast('Profile photo updated!','success');
                      updateTopbar();
                  } else {
                      showToast(data.message || 'Failed to upload photo','error');
                      loadProfile(); // Revert
                  }
              })
              .catch(function(){
                  showToast('Network error — photo not saved','error');
                  loadProfile();
              });
        });
    }

    /* Profile form */
    var profileForm = document.getElementById('profileForm');
    profileForm.addEventListener('submit', function(e){
        e.preventDefault();
        clearFormErrors();

        var valid = true;
        var fn = document.getElementById('pFirstName').value.trim();
        var ln = document.getElementById('pLastName').value.trim();
        var em = document.getElementById('pEmail').value.trim();
        var ph = document.getElementById('pPhone').value.trim();
        var street = document.getElementById('pStreet').value.trim();
        var city = document.getElementById('pCity').value.trim();
        var province = document.getElementById('pProvince').value;
        var postal = document.getElementById('pPostalCode').value.trim();

        if(!fn){ setFormError('pFirstName','First name is required'); valid=false; }
        else if(fn.length < 2){ setFormError('pFirstName','Must be at least 2 characters'); valid=false; }
        if(!ln){ setFormError('pLastName','Last name is required'); valid=false; }
        else if(ln.length < 2){ setFormError('pLastName','Must be at least 2 characters'); valid=false; }
        if(!em){ setFormError('pEmail','Email is required'); valid=false; }
        else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em)){ setFormError('pEmail','Enter a valid email address'); valid=false; }
        if(ph && !/^[\d\s\+\-\(\)]{7,20}$/.test(ph)){ setFormError('pPhone','Enter a valid phone number'); valid=false; }
        if(postal && !/^\d{4}$/.test(postal)){ setFormError('pPostalCode','Must be 4 digits'); valid=false; }

        if(!valid){
            // Scroll to first error
            var firstErr = document.querySelector('.form-error.visible');
            if(firstErr) firstErr.closest('.form-group').scrollIntoView({behavior:'smooth',block:'center'});
            return;
        }

        // Disable button
        var btn = document.getElementById('profileSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        var fd = new FormData();
        fd.append('first_name', fn);
        fd.append('last_name', ln);
        fd.append('email', em);
        if(ph) fd.append('phone', ph);
        if(street) fd.append('street', street);
        if(city) fd.append('city', city);
        if(province) fd.append('province', province);
        if(postal) fd.append('postal_code', postal);

        fetch('/api/user/profile.php', { method: 'POST', body: fd })
          .then(function(r){ return r.json(); })
          .then(function(data){
              btn.disabled = false;
              btn.innerHTML = '<i class="fa-solid fa-check"></i> Save Changes';

              if(data.success){
                  userData.first_name = fn;
                  userData.last_name = ln;
                  userData.email = em;
                  userData.phone = ph;
                  userData.address = { street: street, city: city, province: province, postal_code: postal };

                  // Update display
                  document.getElementById('profileDisplayName').textContent = fn + ' ' + ln;
                  document.getElementById('profileDisplayEmail').textContent = em;
                  updateTopbar();

                  // Flash inputs
                  document.querySelectorAll('#profileForm .form-input').forEach(function(inp){
                      if(inp.value.trim()){
                          inp.classList.add('just-saved');
                          setTimeout(function(){ inp.classList.remove('just-saved'); }, 700);
                      }
                  });

                  showToast('Profile updated successfully!','success');
              } else {
                  // Map server errors
                  if(data.errors){
                      var fieldMap = {
                          first_name:'pFirstName', last_name:'pLastName', email:'pEmail',
                          phone:'pPhone', street:'pStreet', city:'pCity',
                          province:'pProvince', postal_code:'pPostalCode'
                      };
                      Object.keys(data.errors).forEach(function(field){
                          var formField = fieldMap[field];
                          if(formField) setFormError(formField, data.errors[field]);
                      });
                  }
                  showToast(data.message || 'Failed to save changes','error');
              }
          })
          .catch(function(err){
              btn.disabled = false;
              btn.innerHTML = '<i class="fa-solid fa-check"></i> Save Changes';
              showToast('Network error — changes not saved','error');
          });
    });

    /* Reset button */
    document.getElementById('profileResetBtn').addEventListener('click', function(){
        loadProfile();
        showToast('Form reset to saved values','info');
    });

    /* Password strength meter */
    var newPwdInput = document.getElementById('pNewPwd');
    newPwdInput.addEventListener('input', function(){
        var val = newPwdInput.value;
        var strengthEl = document.getElementById('pwdStrength');
        var fillEl = document.getElementById('pwdStrengthFill');
        var labelEl = document.getElementById('pwdStrengthLabel');

        if(!val){
            strengthEl.style.display = 'none';
            return;
        }
        strengthEl.style.display = '';

        var score = 0;
        if(val.length >= 8) score++;
        if(val.length >= 12) score++;
        if(/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
        if(/\d/.test(val)) score++;
        if(/[^A-Za-z0-9]/.test(val)) score++;

        var level, cls, color;
        if(score <= 1){ level='Weak'; cls='weak'; color='#E07070'; }
        else if(score <= 2){ level='Fair'; cls='fair'; color='#D4923A'; }
        else if(score <= 3){ level='Good'; cls='good'; color='#D4923A'; }
        else { level='Strong'; cls='strong'; color='#6BCB8B'; }

        fillEl.className = 'pwd-strength-fill ' + cls;
        labelEl.textContent = level;
        labelEl.style.color = color;
    });

    /* Password form */
    var passwordForm = document.getElementById('passwordForm');
    passwordForm.addEventListener('submit', function(e){
        e.preventDefault();
        clearFormErrors();

        var valid = true;
        var curPwd = document.getElementById('pCurrentPwd').value;
        var newPwd = document.getElementById('pNewPwd').value;
        var cfmPwd = document.getElementById('pConfirmPwd').value;

        if(!curPwd){ setFormError('pCurrentPwd','Current password is required'); valid=false; }
        if(!newPwd){ setFormError('pNewPwd','New password is required'); valid=false; }
        else if(newPwd.length < 8){ setFormError('pNewPwd','Must be at least 8 characters'); valid=false; }
        else if(newPwd === curPwd){ setFormError('pNewPwd','Must differ from current password'); valid=false; }
        if(!cfmPwd){ setFormError('pConfirmPwd','Please confirm your new password'); valid=false; }
        else if(newPwd !== cfmPwd){ setFormError('pConfirmPwd','Passwords do not match'); valid=false; }

        if(!valid) return;

        var btn = document.getElementById('pwdSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Updating...';

        fetch('/api/user/profile.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                action: 'change_password',
                current_password: curPwd,
                new_password: newPwd
            })
        })
        .then(function(r){ return r.json(); })
        .then(function(data){
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-lock"></i> Update Password';

            if(data.success){
                showToast('Password updated successfully!','success');
                document.getElementById('pCurrentPwd').value = '';
                document.getElementById('pNewPwd').value = '';
                document.getElementById('pConfirmPwd').value = '';
                document.getElementById('pwdStrength').style.display = 'none';
            } else {
                if(data.errors && data.errors.current_password){
                    setFormError('pCurrentPwd', data.errors.current_password);
                } else {
                    showToast(data.message || 'Failed to update password','error');
                }
            }
        })
        .catch(function(){
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-lock"></i> Update Password';
            showToast('Network error — password not changed','error');
        });
    });

    /* Delete account */
    document.getElementById('deleteAccountBtn').addEventListener('click', function(){
        var extraHtml =
            '<div class="confirm-input-row">'+
                '<label>Type <strong style="color:var(--red);">DELETE</strong> to confirm</label>'+
                '<input type="text" id="deleteConfirmInput" placeholder="DELETE" autocomplete="off">'+
            '</div>';

        showConfirm(
            'Delete Your Account?',
            'This will permanently delete your account, all orders, custom requests, and personal data. This action is irreversible.',
            'danger',
            function(){
                var input = document.getElementById('deleteConfirmInput');
                if(!input || input.value.trim() !== 'DELETE'){
                    input.classList.add('invalid');
                    return; // Don't close
                }
                closeConfirm();
                deleteAccount();
            },
            'Delete Forever',
            extraHtml
        );

        // Focus the input after dialog appears
        setTimeout(function(){
            var input = document.getElementById('deleteConfirmInput');
            if(input){
                input.focus();
                input.addEventListener('input', function(){ input.classList.remove('invalid'); });
            }
        }, 100);
    });
}

/* ── Delete Account ──────────────────────────────────────── */
function deleteAccount(){
    showToast('Requesting account deletion...', 'info');

    // Show password prompt
    var extraHtml =
        '<div class="confirm-input-row">'+
            '<label>Enter your password to confirm</label>'+
            '<input type="password" id="deletePwdInput" placeholder="Your password" autocomplete="current-password">'+
            '<span class="form-error" id="deletePwdError" style="justify-content:center;"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span>'+
        '</div>';

    showConfirm(
        'Final Confirmation',
        'Please enter your password to permanently delete your account.',
        'danger',
        function(){
            var pwdInput = document.getElementById('deletePwdInput');
            var errEl = document.getElementById('deletePwdError');
            var pwd = pwdInput ? pwdInput.value : '';

            if(!pwd){
                if(errEl) { errEl.querySelector('i').nextSibling.textContent = ' Password is required'; errEl.classList.add('visible'); }
                if(pwdInput) pwdInput.classList.add('invalid');
                return;
            }

            closeConfirm();
            showToast('Deleting account...', 'info');

            fetch('/api/user/profile.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ action: 'delete_account', password: pwd })
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if(data.success){
                    showToast('Account deleted. Redirecting...','success');
                    setTimeout(function(){ window.location.href = '/index.php'; }, 1500);
                } else {
                    showToast(data.message || 'Failed to delete account','error');
                }
            })
            .catch(function(){
                showToast('Network error — please try again','error');
            });
        },
        'Delete Forever',
        extraHtml
    );

    setTimeout(function(){
        var input = document.getElementById('deletePwdInput');
        if(input) input.focus();
    }, 100);
}

/* ── Form Error Helpers ──────────────────────────────────── */
function setFormError(id, msg){
    var err = document.getElementById(id + 'Error');
    var inp = document.getElementById(id);
    if(err){
        // Keep the icon, update text
        var textNode = err.querySelector('i') ? err.querySelector('i').nextSibling : err.firstChild;
        if(textNode) textNode.textContent = ' ' + msg;
        else err.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> ' + esc(msg);
        err.classList.add('visible');
    }
    if(inp) inp.classList.add('invalid');
}

function clearFormErrors(){
    document.querySelectorAll('.form-error').forEach(function(el){
        el.classList.remove('visible');
        var textNode = el.querySelector('i') ? el.querySelector('i').nextSibling : el.firstChild;
        if(textNode) textNode.textContent = ' ';
    });
    document.querySelectorAll('.form-input').forEach(function(el){
        el.classList.remove('invalid','just-saved');
    });
}

// Clear individual field errors on input
document.addEventListener('input', function(e){
    if(e.target.classList && e.target.classList.contains('form-input') && e.target.classList.contains('invalid')){
        e.target.classList.remove('invalid');
        var errEl = document.getElementById(e.target.id + 'Error');
        if(errEl) errEl.classList.remove('visible');
    }
});

/* ================================================================
   INIT
   ================================================================ */
loadProfile();

/* ================================================================
   KEYBOARD
   ================================================================ */
document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        closeConfirm();
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    }
});
</script>
</body>
</html>