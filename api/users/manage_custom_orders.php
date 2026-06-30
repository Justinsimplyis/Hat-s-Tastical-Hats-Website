<?php
// session_start();
// if (!isset($_SESSION['user_id'])) { header('Location: /login'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Hat Requests | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="/assets/css/users/users.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — User Dashboard Base Styles
   ================================================================ */
        :root {
            --red: #C93B39; --red-hover: #DA4E4C; --red-light: rgba(201, 59, 57, 0.10); --red-muted: rgba(201, 59, 57, 0.05);
            --pink: #CFA1A8; --pink-light: rgba(207, 161, 168, 0.18); --pink-muted: rgba(207, 161, 168, 0.08);
            --bg: #FFF8F6; --bg-elevated: #FFFFFF; --card: #FFFFFF; --topbar-bg: #FFF8F6;
            --cream: #FFF0ED; --cream-dark: #FFE8E3; --cream-deeper: #FFDAD3;
            --sidebar-bg: #FFFFFF; --sidebar-hover: #FFF0ED; --sidebar-active: rgba(201, 59, 57, 0.10);
            --sidebar-text: #6B5558; --sidebar-text-hover: #2A1F21; --sidebar-text-active: #C93B39;
            --fg: #2A1F21; --fg-secondary: #6B5558; --fg-muted: #9A8588;
            --border: #F0DDD8; --border-light: #F8EDEA;
            --shadow-sm: 0 1px 3px rgba(42, 31, 33, 0.06); --shadow-md: 0 4px 12px rgba(42, 31, 33, 0.08); --shadow-lg: 0 12px 32px rgba(42, 31, 33, 0.12);
            --radius-sm: 6px; --radius-md: 10px; --radius-lg: 16px; --radius-full: 9999px;
            --sidebar-width: 260px; --sidebar-collapsed-width: 72px; --topbar-height: 68px;
            --ease: cubic-bezier(0.4, 0, 0.2, 1); --duration: 0.2s;
        }
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 15px; -webkit-font-smoothing: antialiased; }
        body { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--fg); line-height: 1.6; overflow-x: hidden; }
        a { color: inherit; text-decoration: none; }
        button { font: inherit; border: none; background: none; cursor: pointer; color: inherit; }
        input { font: inherit; border: none; outline: none; background: none; }
        table { border-collapse: collapse; width: 100%; }

        /* Sidebar & Topbar Base */
        .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-width); background: var(--sidebar-bg); display: flex; flex-direction: column; z-index: 1000; transition: width 0.3s var(--ease), transform 0.35s var(--ease); overflow: hidden; box-shadow: var(--shadow-sm); }
        .sidebar-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 16px 12px; flex-shrink: 0; border-bottom: 1px solid var(--border-light); }
        .sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }
        .logo-mark { width: 40px; height: 40px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 1.15rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .logo-text { display: flex; flex-direction: column; white-space: nowrap; }
        .logo-name { font-size: 1.05rem; font-weight: 700; color: var(--fg); line-height: 1.2; }
        .logo-tagline { font-size: 0.68rem; font-weight: 500; color: var(--pink); letter-spacing: 0.02em; }
        .sidebar-collapse-btn { width: 28px; height: 28px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--fg-muted); font-size: 0.7rem; flex-shrink: 0; transition: all var(--duration) var(--ease); }
        .sidebar-collapse-btn:hover { background: var(--sidebar-hover); color: var(--red); }
        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; overflow-x: hidden; }
        .nav-section-label { font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.12em; color: var(--fg-muted); padding: 0 12px; margin-bottom: 10px; white-space: nowrap; }
        .nav-item { margin-bottom: 2px; }
        .nav-link { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: var(--radius-sm); color: var(--sidebar-text); font-size: 0.88rem; font-weight: 500; transition: all var(--duration) var(--ease); position: relative; user-select: none; white-space: nowrap; overflow: hidden; }
        .nav-link:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
        .nav-link.active { background: var(--sidebar-active); color: var(--sidebar-text-active); font-weight: 600; }
        .nav-link.active::before { content: ''; position: absolute; left: -12px; top: 50%; transform: translateY(-50%); width: 3px; height: 24px; background: var(--red); border-radius: 0 3px 3px 0; }
        .nav-icon { width: 20px; text-align: center; font-size: 0.95rem; flex-shrink: 0; }
        .nav-label { transition: opacity 0.2s var(--ease); overflow: hidden; }
        .dropdown-icon { margin-left: auto; font-size: 0.6rem; color: var(--fg-muted); transition: transform 0.25s var(--ease); flex-shrink: 0; }
        .nav-link[aria-expanded="true"] .dropdown-icon { transform: rotate(180deg); }
        .dropdown-menu { max-height: 0; overflow: hidden; transition: max-height 0.3s var(--ease); padding-left: 20px; }
        .dropdown-menu.open { max-height: 400px; }
        .dropdown-menu a { display: flex; align-items: center; gap: 8px; padding: 8px 12px 8px 32px; font-size: 0.82rem; font-weight: 500; color: var(--sidebar-text); border-radius: var(--radius-sm); transition: all var(--duration) var(--ease); position: relative; }
        .dropdown-menu a::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--cream-deeper); flex-shrink: 0; transition: background var(--duration) var(--ease); }
        .dropdown-menu a:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
        .dropdown-menu a:hover::before { background: var(--red); }
        .dropdown-menu a.active { color: var(--sidebar-text-active); font-weight: 600; }
        .dropdown-menu a.active::before { background: var(--red); }
        .sidebar-footer { padding: 12px; border-top: 1px solid var(--border-light); flex-shrink: 0; }
        .logout-link { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: var(--radius-sm); color: var(--red); font-size: 0.88rem; font-weight: 500; transition: all var(--duration) var(--ease); }
        .logout-link:hover { background: var(--cream); color: var(--red-hover); }
        .sidebar.collapsed { width: var(--sidebar-collapsed-width); }
        .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label, .sidebar.collapsed .dropdown-icon, .sidebar.collapsed .dropdown-menu { opacity: 0; width: 0; height: 0; display: none; }
        .sidebar-overlay { position: fixed; inset: 0; background: rgba(42, 31, 33, 0.4); backdrop-filter: blur(4px); z-index: 999; opacity: 0; visibility: hidden; transition: all 0.3s var(--ease); }
        .sidebar-overlay.visible { opacity: 1; visibility: visible; }

        .main-wrapper { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; transition: margin-left 0.3s var(--ease); }
        body:has(.sidebar.collapsed) .main-wrapper { margin-left: var(--sidebar-collapsed-width); }
        .topbar { position: sticky; top: 0; z-index: 100; height: var(--topbar-height); background: var(--topbar-bg); border-bottom: 1px solid var(--border-light); display: flex; align-items: center; justify-content: space-between; padding: 0 28px; box-shadow: var(--shadow-sm); }
        .topbar-left { display: flex; align-items: center; gap: 16px; }
        .mobile-toggle { display: none; width: 38px; height: 38px; border-radius: var(--radius-sm); color: var(--fg-secondary); font-size: 1.1rem; }
        .topbar-greeting h2 { font-size: 1.15rem; font-weight: 600; color: var(--fg); }
        .topbar-greeting p { font-size: 0.8rem; color: var(--fg-muted); }
        .topbar-right { display: flex; align-items: center; gap: 10px; }
        .search-box { display: flex; align-items: center; background: var(--cream); border: 1px solid var(--border-light); border-radius: var(--radius-full); padding: 0 4px 0 14px; height: 38px; width: 220px; transition: all var(--duration) var(--ease); }
        .search-box:focus-within { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); width: 260px; }
        .search-icon { color: var(--fg-muted); font-size: 0.82rem; margin-right: 8px; }
        .search-box input { flex: 1; font-size: 0.84rem; color: var(--fg); }
        .search-btn { width: 30px; height: 30px; border-radius: var(--radius-full); background: var(--red); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; transition: all var(--duration) var(--ease); }
        .search-btn:hover { background: var(--red-hover); transform: scale(1.05); }
        .topbar-icon-btn { position: relative; width: 38px; height: 38px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 1rem; color: var(--fg-secondary); }
        .badge-dot { position: absolute; top: 8px; right: 8px; width: 8px; height: 8px; background: var(--red); border-radius: 50%; border: 2px solid var(--topbar-bg); }
        .profile-btn { display: flex; align-items: center; gap: 8px; padding: 4px 12px 4px 4px; border-radius: var(--radius-full); }
        .profile-avatar { width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; justify-content: center; }
        .profile-label { font-size: 0.82rem; font-weight: 500; color: var(--fg-secondary); }

        /* ================================================================
           PAGE SPECIFICS — Custom Orders
           ================================================================ */
        .main-content { flex: 1; padding: 28px; }
        .page-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 16px; }
        .page-header h1 { font-size: 1.4rem; font-weight: 700; color: var(--fg); margin-bottom: 4px; }
        .page-header p { font-size: 0.85rem; color: var(--fg-muted); max-width: 500px; }
        .back-link { display: inline-flex; align-items: center; gap: 6px; font-size: 0.84rem; font-weight: 500; color: var(--red); margin-bottom: 8px; transition: all var(--duration) var(--ease); }
        .back-link:hover { color: var(--red-hover); gap: 8px; }

        .panel { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; margin-bottom: 28px; }
        .panel-header { display: flex; align-items: center; justify-content: space-between; padding: 18px 24px; border-bottom: 1px solid var(--border-light); }
        .panel-header h2 { font-size: 1rem; font-weight: 600; color: var(--fg); }
        .panel-body { padding: 0; overflow-x: auto; }

        .data-table thead { position: sticky; top: 0; z-index: 2; }
        .data-table th { padding: 12px 24px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--fg-muted); background: var(--cream); text-align: left; border-bottom: 1px solid var(--border-light); white-space: nowrap; }
        .data-table td { padding: 14px 24px; font-size: 0.87rem; color: var(--fg); border-bottom: 1px solid var(--border-light); vertical-align: middle; }
        .data-table tbody tr { transition: background var(--duration) var(--ease); }
        .data-table tbody tr:hover { background: var(--cream); }
        .data-table tbody tr:last-child td { border-bottom: none; }

        .table-date { white-space: nowrap; color: var(--fg-secondary); font-size: 0.84rem; }

        /* Stage Badges */
        .stage-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 0.76rem; font-weight: 600; padding: 4px 11px; border-radius: var(--radius-full); white-space: nowrap; }
        .stage-design { background: rgba(107,92,231,0.10); color: #6B5CE7; }
        .stage-creation { background: rgba(212,148,42,0.10); color: #D4942A; }
        .stage-review { background: rgba(201,59,57,0.10); color: var(--red); }
        .stage-complete { background: rgba(45,155,110,0.10); color: #2D9B6E; }

        /* Context-Aware Action Buttons */
        .table-action-btn { font-size: 0.78rem; font-weight: 500; padding: 5px 14px; border-radius: var(--radius-full); transition: all var(--duration) var(--ease); white-space: nowrap; display: inline-flex; align-items: center; gap: 5px; }
        
        /* Default / Completed */
        .btn-view { color: var(--red); border: 1px solid var(--red-light); background: var(--red-light); }
        .btn-view:hover { background: var(--red); color: #fff; border-color: var(--red); }
        
        /* Design / Creation (Purple) */
        .btn-progress { color: #6B5CE7; border: 1px solid rgba(107,92,231,0.2); background: rgba(107,92,231,0.1); }
        .btn-progress:hover { background: #6B5CE7; color: #fff; border-color: #6B5CE7; }

        /* Review (Red solid to draw attention) */
        .btn-approve { background: var(--red); color: #fff; border: 1px solid var(--red); }
        .btn-approve:hover { background: var(--red-hover); border-color: var(--red-hover); transform: translateY(-1px); box-shadow: 0 4px 10px rgba(201, 59, 57, 0.2); }

        .table-empty { padding: 60px 24px; text-align: center; }
        .table-empty i { font-size: 2.5rem; color: var(--cream-deeper); margin-bottom: 14px; display: block; }
        .table-empty p { font-size: 0.92rem; color: var(--fg-muted); margin-bottom: 18px; }
        .table-empty-btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 18px; border-radius: var(--radius-full); background: var(--red); color: #fff; font-size: 0.82rem; font-weight: 600; transition: all var(--duration) var(--ease); }
        .table-empty-btn:hover { background: var(--red-hover); transform: translateY(-1px); }

        .main-footer { padding: 18px 28px; text-align: center; font-size: 0.78rem; color: var(--fg-muted); border-top: 1px solid var(--border-light); }
        .main-footer span { font-weight: 600; color: var(--fg-secondary); }
        
        .toast-container { position: fixed; bottom: 24px; right: 24px; z-index: 3000; display: flex; flex-direction: column; gap: 10px; }
        .toast { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 14px 20px; box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 12px; min-width: 280px; transform: translateX(120%); opacity: 0; transition: all 0.4s var(--ease); }
        .toast.visible { transform: translateX(0); opacity: 1; }
        .toast-icon { font-size: 1.1rem; flex-shrink: 0; }
        .toast-icon.info { color: #6B5CE7; }
        .toast-msg { font-size: 0.84rem; color: var(--fg); font-weight: 500; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
            .sidebar.collapsed { width: var(--sidebar-width) !important; }
            .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label, .sidebar.collapsed .dropdown-icon, .sidebar.collapsed .dropdown-menu { opacity: 1; width: auto; height: auto; display: block; }
            .sidebar.open { transform: translateX(0); }
            .main-wrapper { margin-left: 0 !important; }
            .mobile-toggle { display: flex; align-items: center; justify-content: center; }
            .topbar { padding: 0 16px; }
            .search-box { display: none; }
            .profile-label { display: none; }
            .main-content { padding: 20px 16px; }
            .hide-mobile { display: none !important; }
        }
        :focus-visible { outline: 2px solid var(--pink); outline-offset: 2px; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: var(--cream-deeper); border-radius: 6px; }
    </style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="/account/dashboard" class="sidebar-logo">
            <span class="logo-mark">H</span>
            <span class="logo-text">
                <span class="logo-name">Hattie's</span>
                <span class="logo-tagline">Hat'istical Hats</span>
            </span>
        </a>
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" aria-label="Collapse sidebar">
            <i class="fa-solid fa-angles-left"></i>
        </button>
    </div>

    <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>
        <div class="nav-item">
            <a href="/account/dashboard" class="nav-link" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="My Shopping">
                <i class="fa-solid fa-bag-shopping nav-icon"></i>
                <span class="nav-label">My Shopping</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/account/cart" role="menuitem">Shopping Bag (2)</a>
                <a href="/account/wishlist" role="menuitem">Saved Wishlist</a>
            </div>
        </div>

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="true" data-tooltip="Purchases & Tracking">
                <i class="fa-solid fa-truck-fast nav-icon"></i>
                <span class="nav-label">Purchases & Tracking</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu open" role="menu">
                <a href="/account/orders" role="menuitem">My Orders & Tracking</a>
                <a href="/account/invoices" role="menuitem">Past Invoices & Receipts</a>
                <!-- ACTIVE PAGE SET HERE -->
                <a href="/account/custom-orders" class="active" role="menuitem">Custom Hat Requests</a>
                <a href="/account/returns" role="menuitem">Returns & Enquiries</a>
            </div>
        </div>

        <div class="nav-item">
            <a href="/account/settings" class="nav-link" data-tooltip="Settings">
                <i class="fa-solid fa-user-gear nav-icon"></i>
                <span class="nav-label">My Details & Settings</span>
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <a href="/logout" class="logout-link" data-tooltip="Logout">
            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
            <span class="nav-label">Sign Out</span>
        </a>
    </div>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="main-wrapper">
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="topbar-greeting">
                <h2>Welcome back, Hattie</h2>
                <p>Here's what's happening with your hats today.</p>
            </div>
        </div>
        <div class="topbar-right">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Search for hats..." id="searchInput" aria-label="Search">
                <button class="search-btn" id="searchBtn" aria-label="Submit search"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
            <button class="topbar-icon-btn" id="notifToggle" aria-label="Notifications">
                <i class="fa-solid fa-bell"></i>
                <span class="badge-dot"></span>
            </button>
            <a href="/account/profile" class="profile-btn" aria-label="Go to profile">
                <span class="profile-avatar">H</span>
                <span class="profile-label">My Profile</span>
            </a>
        </div>
    </header>

    <main class="main-content">
        <div class="page-header">
            <div>
                <a href="/account/dashboard" class="back-link">
                    <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
                </a>
                <h1>Custom Hat Requests</h1>
                <p>Watch your unique designs come to life, from the initial sketch to the final stitch.</p>
            </div>
            <!-- User Perspective: "Start a Project" rather than "Create Request" -->
            <a href="/shop/custom-hats" class="table-empty-btn" style="margin-top:24px;">
                <i class="fa-solid fa-plus"></i> Start a New Project
            </a>
        </div>

        <div class="panel">
            <div class="panel-header">
                <h2>My Projects</h2>
            </div>
            <div class="panel-body" id="requestsPanelBody">
                <!-- Populated by JS -->
            </div>
        </div>
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   MOCK DATA
   ================================================================ */
const customRequests = [
    // stage: design | creation | review | complete
    { type: "Bridal Fascinator", stage: "creation", stageLabel: "In Creation", date: "2025-06-09", id: "CR-0042" },
    { type: "Victorian Top Hat", stage: "review", stageLabel: "Awaiting Approval", date: "2025-05-20", id: "CR-0039" },
    { type: "Custom Silk Beret", stage: "design", stageLabel: "Sketching", date: "2025-06-11", id: "CR-0043" },
    { type: "Racing Day Hat", stage: "complete", stageLabel: "Completed", date: "2025-04-15", id: "CR-0031" },
    { type: "Straw Boater Custom", stage: "complete", stageLabel: "Completed", date: "2025-03-28", id: "CR-0028" }
];

/* ================================================================
   HELPERS
   ================================================================ */
function formatDate(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}
function escapeHtml(unsafe) {
    return unsafe.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;");
}

/* ================================================================
   RENDER TABLE
   ================================================================ */
function renderRequests() {
    const container = document.getElementById('requestsPanelBody');
    
    if (customRequests.length === 0) {
        container.innerHTML = `
            <div class="table-empty">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <p>You don't have any custom projects yet. Dream up something special!</p>
                <a href="/shop/custom-hats" class="table-empty-btn"><i class="fa-solid fa-plus"></i> Start a New Project</a>
            </div>
        `;
        return;
    }

    container.innerHTML = `
        <table class="data-table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Current Stage</th>
                    <th class="hide-mobile">Last Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                ${customRequests.map(r => {
                    // USER PERSPECTIVE: Dynamic buttons based on collaboration stage
                    let actionBtn = '';
                    if (r.stage === 'review') {
                        // Draw attention: The milliner needs approval to proceed
                        actionBtn = `<a href="/account/custom-orders?id=${escapeHtml(r.id)}" class="table-action-btn btn-approve"><i class="fa-solid fa-check" style="font-size:0.65rem;"></i> Review Design</a>`;
                    } else if (r.stage === 'design' || r.stage === 'creation') {
                        // Informational: The user wants to see progress
                        actionBtn = `<a href="/account/custom-orders?id=${escapeHtml(r.id)}" class="table-action-btn btn-progress"><i class="fa-solid fa-eye" style="font-size:0.65rem;"></i> View Progress</a>`;
                    } else {
                        // Completed: Standard viewing
                        actionBtn = `<a href="/account/custom-orders?id=${escapeHtml(r.id)}" class="table-action-btn btn-view">View Final Piece</a>`;
                    }

                    return `
                    <tr>
                        <td style="font-weight:600;">${escapeHtml(r.type)}</td>
                        <td><span class="stage-badge stage-${r.stage}">${r.stageLabel}</span></td>
                        <td class="hide-mobile"><span class="table-date">${formatDate(r.date)}</span></td>
                        <td>${actionBtn}</td>
                    </tr>
                    `;
                }).join('')}
            </tbody>
        </table>
    `;
}

renderRequests();

/* ================================================================
   SIDEBAR & TOPBAR LOGIC
   ================================================================ */
const sidebar = document.getElementById('sidebar');
const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
const mobileToggle = document.getElementById('mobileToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');

if (sidebarCollapseBtn && sidebar) {
    sidebarCollapseBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        const icon = sidebarCollapseBtn.querySelector('i');
        icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
        icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
    });
}
if (mobileToggle) {
    mobileToggle.addEventListener('click', () => { sidebar.classList.toggle('open'); sidebarOverlay.classList.toggle('visible'); });
    sidebarOverlay.addEventListener('click', () => { sidebar.classList.remove('open'); sidebarOverlay.classList.remove('visible'); });
}
document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
    const trigger = item.querySelector('.nav-link');
    const menu = item.querySelector('.dropdown-menu');
    trigger.addEventListener('click', () => {
        const expanded = trigger.getAttribute('aria-expanded') === 'true';
        document.querySelectorAll('.nav-item[data-dropdown]').forEach(other => {
            if (other !== item) { other.querySelector('.nav-link').setAttribute('aria-expanded', 'false'); other.querySelector('.dropdown-menu').classList.remove('open'); }
        });
        trigger.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('open');
    });
    trigger.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); trigger.click(); } });
});

const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
if (searchBtn && searchInput) {
    searchBtn.addEventListener('click', () => { const q = searchInput.value.trim(); if (q) window.location.href = '/shop?search=' + encodeURIComponent(q); });
    searchInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') searchBtn.click(); });
}
const notifToggle = document.getElementById('notifToggle');
if (notifToggle) { notifToggle.addEventListener('click', () => showToast('Hattie has uploaded new sketches for your Bridal Fascinator!', 'info')); }

function showToast(message, type) {
    type = type || 'info';
    const iconMap = { success: 'fa-solid fa-circle-check', info: 'fa-solid fa-circle-info', warning: 'fa-solid fa-triangle-exclamation' };
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = '<i class="toast-icon ' + type + ' ' + (iconMap[type] || iconMap['info']) + '"></i><span class="toast-msg">' + escapeHtml(message) + '</span>';
    document.getElementById('toastContainer').appendChild(toast);
    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('visible')));
    setTimeout(() => { toast.classList.remove('visible'); setTimeout(() => toast.remove(), 400); }, 4000);
}
</script>
</body>
</html>