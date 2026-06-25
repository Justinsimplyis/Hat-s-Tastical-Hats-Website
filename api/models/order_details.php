<?php
// Fetch order ID from URL: order_details.php?id=HH-10024
 $orderId = $_GET['id'] ?? '';
// In production: fetch order from database using $orderId
// $order = fetchOrderById($orderId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>Order Details | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — Order Details
   ================================================================ */
:root {
    --red:           #C93B39;
    --red-hover:     #DA4E4C;
    --red-light:     rgba(201, 59, 57, 0.10);
    --red-muted:     rgba(201, 59, 57, 0.05);

    --pink:          #CFA1A8;
    --pink-light:    rgba(207, 161, 168, 0.18);
    --pink-muted:    rgba(207, 161, 168, 0.08);

    --bg:            #FFF8F6;
    --bg-elevated:   #FFFFFF;
    --card:          #FFFFFF;
    --topbar-bg:     #FFF8F6;

    --cream:         #FFF0ED;
    --cream-dark:    #FFE8E3;
    --cream-deeper:  #FFDAD3;

    --sidebar-bg:    #FFFFFF;
    --sidebar-hover: #FFF0ED;
    --sidebar-active:rgba(201, 59, 57, 0.10);
    --sidebar-text:  #6B5558;
    --sidebar-text-hover: #2A1F21;
    --sidebar-text-active: #C93B39;

    --fg:            #2A1F21;
    --fg-secondary:  #6B5558;
    --fg-muted:      #9A8588;

    --border:        #F0DDD8;
    --border-light:  #F8EDEA;

    --shadow-sm:     0 1px 3px rgba(42, 31, 33, 0.06);
    --shadow-md:     0 4px 12px rgba(42, 31, 33, 0.08);
    --shadow-lg:     0 12px 32px rgba(42, 31, 33, 0.12);
    --shadow-xl:     0 24px 48px rgba(42, 31, 33, 0.18);

    --radius-sm:     6px;
    --radius-md:     10px;
    --radius-lg:     16px;
    --radius-full:   9999px;

    --sidebar-width:          260px;
    --sidebar-collapsed-width: 72px;
    --topbar-height:           68px;

    --ease:          cubic-bezier(0.4, 0, 0.2, 1);
    --duration:      0.2s;
}

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
html { font-size: 15px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
body { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--fg); line-height: 1.6; overflow-x: hidden; }
a { color: inherit; text-decoration: none; }
button { font: inherit; border: none; background: none; cursor: pointer; color: inherit; }
input, select, textarea { font: inherit; border: none; outline: none; background: none; }

/* ================================================================
   SIDEBAR
   ================================================================ */
.sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-width); background: var(--sidebar-bg); display: flex; flex-direction: column; z-index: 1000; transition: width 0.3s var(--ease), transform 0.35s var(--ease); overflow: hidden; box-shadow: var(--shadow-sm); }
.sidebar-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 16px 12px; flex-shrink: 0; border-bottom: 1px solid var(--border-light); }
.sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }
.logo-mark { width: 40px; height: 40px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 1.15rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; letter-spacing: -0.02em; }
.logo-text { display: flex; flex-direction: column; white-space: nowrap; transition: opacity 0.2s var(--ease), transform 0.2s var(--ease); }
.logo-name { font-size: 1.05rem; font-weight: 700; color: var(--fg); line-height: 1.2; }
.logo-tagline { font-size: 0.68rem; font-weight: 500; color: var(--pink); letter-spacing: 0.02em; line-height: 1.3; }
.sidebar-collapse-btn { width: 28px; height: 28px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--fg-muted); font-size: 0.7rem; flex-shrink: 0; transition: all var(--duration) var(--ease); }
.sidebar-collapse-btn:hover { background: var(--sidebar-hover); color: var(--red); }
.sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; overflow-x: hidden; }
.nav-section-label { font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.12em; color: var(--fg-muted); padding: 0 12px; margin-bottom: 10px; white-space: nowrap; overflow: hidden; transition: opacity 0.2s var(--ease); }
.nav-item { margin-bottom: 2px; }
.nav-link { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: var(--radius-sm); color: var(--sidebar-text); font-size: 0.88rem; font-weight: 500; transition: all var(--duration) var(--ease); position: relative; user-select: none; white-space: nowrap; overflow: hidden; }
.nav-link:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.nav-link.active { background: var(--sidebar-active); color: var(--sidebar-text-active); font-weight: 600; }
.nav-link.active::before { content: ''; position: absolute; left: -12px; top: 50%; transform: translateY(-50%); width: 3px; height: 24px; background: var(--red); border-radius: 0 3px 3px 0; }
.nav-icon { width: 20px; text-align: center; font-size: 0.95rem; flex-shrink: 0; }
.nav-label { transition: opacity 0.2s var(--ease), transform 0.2s var(--ease); overflow: hidden; }
.dropdown-icon { margin-left: auto; font-size: 0.6rem; color: var(--fg-muted); transition: transform 0.25s var(--ease); flex-shrink: 0; }
.nav-link[aria-expanded="true"] .dropdown-icon { transform: rotate(180deg); }
.dropdown-menu { max-height: 0; overflow: hidden; transition: max-height 0.3s var(--ease); padding-left: 20px; }
.dropdown-menu.open { max-height: 300px; }
.dropdown-menu a { display: flex; align-items: center; gap: 8px; padding: 8px 12px 8px 32px; font-size: 0.82rem; font-weight: 500; color: var(--sidebar-text); border-radius: var(--radius-sm); transition: all var(--duration) var(--ease); position: relative; }
.dropdown-menu a::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--cream-deeper); flex-shrink: 0; transition: background var(--duration) var(--ease); }
.dropdown-menu a:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.dropdown-menu a:hover::before { background: var(--red); }
.dropdown-menu a.active { color: var(--sidebar-text-active); font-weight: 600; }
.dropdown-menu a.active::before { background: var(--red); }
.sidebar.collapsed .nav-link[data-tooltip]::after { content: attr(data-tooltip); position: absolute; left: calc(100% + 12px); top: 50%; transform: translateY(-50%); background: var(--card); color: var(--fg); padding: 6px 14px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 500; white-space: nowrap; box-shadow: var(--shadow-lg); border: 1px solid var(--border); opacity: 0; visibility: hidden; transition: opacity 0.15s var(--ease), visibility 0.15s var(--ease); pointer-events: none; z-index: 10; }
.sidebar.collapsed .nav-link[data-tooltip]:hover::after { opacity: 1; visibility: visible; }
.sidebar.collapsed { width: var(--sidebar-collapsed-width); }
.sidebar.collapsed .sidebar-header { justify-content: center; padding: 20px 0 12px; }
.sidebar.collapsed .sidebar-logo { justify-content: center; }
.sidebar.collapsed .logo-text { opacity: 0; transform: translateX(-8px); pointer-events: none; }
.sidebar.collapsed .sidebar-collapse-btn { position: absolute; right: -14px; top: 24px; width: 28px; height: 28px; background: var(--cream); border: 1px solid var(--border); border-radius: 50%; z-index: 10; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md); }
.sidebar.collapsed .sidebar-collapse-btn:hover { background: var(--cream-dark); color: var(--red); }
.sidebar.collapsed .nav-section-label { opacity: 0; height: 0; margin: 0; overflow: hidden; }
.sidebar.collapsed .nav-link { justify-content: center; padding: 10px; gap: 0; }
.sidebar.collapsed .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
.sidebar.collapsed .dropdown-icon { display: none; }
.sidebar.collapsed .dropdown-menu { display: none; }
.sidebar.collapsed .sidebar-nav { padding: 16px 10px; }
.sidebar.collapsed .nav-link.active::before { left: -10px; }
.sidebar-overlay { position: fixed; inset: 0; background: rgba(42, 31, 33, 0.4); backdrop-filter: blur(4px); z-index: 999; opacity: 0; visibility: hidden; transition: all 0.3s var(--ease); }
.sidebar-overlay.visible { opacity: 1; visibility: visible; }

/* ================================================================
   MAIN WRAPPER & TOPBAR
   ================================================================ */
.main-wrapper { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; transition: margin-left 0.3s var(--ease); }
body:has(.sidebar.collapsed) .main-wrapper { margin-left: var(--sidebar-collapsed-width); }
.topbar { position: sticky; top: 0; z-index: 100; height: var(--topbar-height); background: var(--topbar-bg); border-bottom: 1px solid var(--border-light); display: flex; align-items: center; justify-content: space-between; padding: 0 28px; box-shadow: var(--shadow-sm); }
.topbar-left { display: flex; align-items: center; gap: 16px; }
.mobile-toggle { display: none; width: 38px; height: 38px; border-radius: var(--radius-sm); color: var(--fg-secondary); font-size: 1.1rem; transition: all var(--duration) var(--ease); }
.mobile-toggle:hover { background: var(--cream); color: var(--fg); }
.topbar-greeting h2 { font-size: 1.15rem; font-weight: 600; color: var(--fg); line-height: 1.3; }
.topbar-greeting p { font-size: 0.8rem; color: var(--fg-muted); }
.topbar-right { display: flex; align-items: center; gap: 10px; }
.search-box { display: flex; align-items: center; background: var(--cream); border: 1px solid var(--border-light); border-radius: var(--radius-full); padding: 0 4px 0 14px; height: 38px; transition: all var(--duration) var(--ease); width: 220px; }
.search-box:focus-within { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); width: 260px; }
.search-icon { color: var(--fg-muted); font-size: 0.82rem; margin-right: 8px; }
.search-box input { flex: 1; font-size: 0.84rem; color: var(--fg); min-width: 0; }
.search-box input::placeholder { color: var(--fg-muted); }
.search-btn { width: 30px; height: 30px; border-radius: var(--radius-full); background: var(--red); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; transition: all var(--duration) var(--ease); flex-shrink: 0; }
.search-btn:hover { background: var(--red-hover); transform: scale(1.05); }
.topbar-icon-btn { position: relative; width: 38px; height: 38px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 1rem; color: var(--fg-secondary); transition: all var(--duration) var(--ease); }
.topbar-icon-btn:hover { background: var(--cream); color: var(--fg); }
.badge-dot { position: absolute; top: 8px; right: 8px; width: 8px; height: 8px; background: var(--red); border-radius: 50%; border: 2px solid var(--topbar-bg); }
.profile-btn { display: flex; align-items: center; gap: 8px; padding: 4px 12px 4px 4px; border-radius: var(--radius-full); transition: all var(--duration) var(--ease); margin-left: 4px; }
.profile-btn:hover { background: var(--cream); }
.profile-avatar { width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; justify-content: center; }
.profile-label { font-size: 0.82rem; font-weight: 500; color: var(--fg-secondary); }

/* ================================================================
   MAIN CONTENT — ORDER DETAILS
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb {
    display: flex; align-items: center; gap: 8px;
    font-size: 0.82rem; color: var(--fg-muted); margin-bottom: 24px;
    flex-wrap: wrap;
}
.breadcrumb a {
    color: var(--fg-secondary); font-weight: 500;
    transition: color var(--duration) var(--ease);
}
.breadcrumb a:hover { color: var(--red); }
.breadcrumb .sep { color: var(--cream-deeper); font-size: 0.65rem; }
.breadcrumb .current { color: var(--fg); font-weight: 600; }

/* ── Page Header ──────────────────────────────────────────────── */
.page-header {
    display: flex; align-items: flex-start; justify-content: space-between;
    gap: 16px; margin-bottom: 28px; flex-wrap: wrap;
}
.page-header-left { display: flex; flex-direction: column; gap: 6px; }
.page-header-left h1 { font-size: 1.45rem; font-weight: 700; color: var(--fg); line-height: 1.3; letter-spacing: -0.02em; }
.page-header-meta { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.page-header-meta span { font-size: 0.84rem; color: var(--fg-muted); display: flex; align-items: center; gap: 6px; }
.page-header-meta span i { font-size: 0.78rem; }
.page-header-actions { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }

.btn {
    height: 40px; padding: 0 20px; border-radius: var(--radius-sm);
    font-size: 0.84rem; font-weight: 600;
    display: inline-flex; align-items: center; gap: 8px;
    transition: all var(--duration) var(--ease);
    white-space: nowrap;
}
.btn-primary { background: var(--red); color: #fff; }
.btn-primary:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(201,59,57,0.3); }
.btn-secondary { background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light); }
.btn-secondary:hover { background: var(--cream-dark); color: var(--fg); }
.btn-ghost { color: var(--fg-secondary); }
.btn-ghost:hover { color: var(--red); background: var(--red-light); }
.btn-outline-red { background: transparent; color: var(--red); border: 1px solid var(--red); }
.btn-outline-red:hover { background: var(--red); color: #fff; }

/* ── Status Badge (reusable) ──────────────────────────────────── */
.status-badge { display: inline-flex; align-items: center; gap: 6px; font-size: 0.76rem; font-weight: 600; padding: 5px 14px; border-radius: var(--radius-full); white-space: nowrap; }
.status-badge .status-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.status-delivered { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.status-delivered .status-dot { background: #2D9B6E; }
.status-in-transit { background: rgba(212,148,42,0.10); color: #D4942A; }
.status-in-transit .status-dot { background: #D4942A; animation: pulse-dot 1.5s infinite; }
.status-processing { background: rgba(107,92,231,0.10); color: #6B5CE7; }
.status-processing .status-dot { background: #6B5CE7; animation: pulse-dot 1.5s infinite; }
.status-cancelled { background: rgba(42,31,33,0.06); color: var(--fg-muted); }
.status-cancelled .status-dot { background: var(--fg-muted); }
.status-returned { background: var(--red-light); color: var(--red); }
.status-returned .status-dot { background: var(--red); }
@keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.7)} }

/* ── Order Tracking Timeline ──────────────────────────────────── */
.timeline-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 28px 32px; margin-bottom: 24px;
}
.timeline-card h3 {
    font-size: 0.95rem; font-weight: 700; color: var(--fg);
    margin-bottom: 24px; display: flex; align-items: center; gap: 10px;
}
.timeline-card h3 i { color: var(--red); font-size: 0.9rem; }

.timeline { display: flex; align-items: flex-start; position: relative; padding: 0 10px; }
.timeline::before {
    content: ''; position: absolute; top: 18px; left: 38px; right: 38px;
    height: 3px; background: var(--cream); border-radius: 3px;
}
.timeline-progress {
    position: absolute; top: 18px; left: 38px;
    height: 3px; background: var(--red); border-radius: 3px;
    transition: width 0.6s var(--ease);
}

.timeline-step {
    flex: 1; display: flex; flex-direction: column; align-items: center;
    position: relative; z-index: 1; text-align: center;
}
.timeline-dot {
    width: 36px; height: 36px; border-radius: 50%;
    background: var(--cream); border: 3px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.75rem; color: var(--fg-muted);
    transition: all 0.4s var(--ease); margin-bottom: 10px;
}
.timeline-step.completed .timeline-dot {
    background: var(--red); border-color: var(--red); color: #fff;
}
.timeline-step.current .timeline-dot {
    background: var(--red-light); border-color: var(--red); color: var(--red);
    box-shadow: 0 0 0 4px var(--red-muted);
}
.timeline-label { font-size: 0.78rem; font-weight: 600; color: var(--fg-muted); margin-bottom: 2px; }
.timeline-step.completed .timeline-label,
.timeline-step.current .timeline-label { color: var(--fg); }
.timeline-date { font-size: 0.7rem; color: var(--fg-muted); font-weight: 500; }

/* ── Two Column Layout ────────────────────────────────────────── */
.detail-grid {
    display: grid; grid-template-columns: 1fr 380px; gap: 24px;
    margin-bottom: 24px;
}

/* ── Items Card ───────────────────────────────────────────────── */
.detail-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden;
}
.detail-card-header {
    padding: 18px 24px; border-bottom: 1px solid var(--border-light);
    display: flex; align-items: center; justify-content: space-between;
}
.detail-card-header h3 {
    font-size: 0.95rem; font-weight: 700; color: var(--fg);
    display: flex; align-items: center; gap: 10px;
}
.detail-card-header h3 i { color: var(--red); font-size: 0.85rem; }
.detail-card-body { padding: 0; }

.order-item {
    display: flex; align-items: center; gap: 18px;
    padding: 20px 24px; border-bottom: 1px solid var(--border-light);
    transition: background var(--duration) var(--ease);
}
.order-item:last-child { border-bottom: none; }
.order-item:hover { background: var(--pink-muted); }

.order-item-img {
    width: 72px; height: 72px; border-radius: var(--radius-md);
    background: var(--cream); overflow: hidden; flex-shrink: 0;
    border: 1px solid var(--border-light);
}
.order-item-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.order-item-info { flex: 1; min-width: 0; }
.order-item-name { font-size: 0.92rem; font-weight: 600; color: var(--fg); margin-bottom: 2px; }
.order-item-variant { font-size: 0.8rem; color: var(--fg-muted); margin-bottom: 6px; }
.order-item-sku { font-size: 0.72rem; color: var(--fg-muted); font-weight: 500; letter-spacing: 0.03em; }
.order-item-right { text-align: right; flex-shrink: 0; }
.order-item-qty-label { font-size: 0.76rem; color: var(--fg-muted); margin-bottom: 2px; }
.order-item-price { font-size: 1rem; font-weight: 700; color: var(--fg); }

/* ── Price Summary ────────────────────────────────────────────── */
.price-summary { padding: 20px 24px; border-top: 2px solid var(--border); background: var(--cream-muted); }
.price-row { display: flex; justify-content: space-between; padding: 6px 0; font-size: 0.87rem; color: var(--fg-secondary); }
.price-row.grand { padding-top: 12px; margin-top: 8px; border-top: 1px solid var(--border); font-size: 1.08rem; font-weight: 700; color: var(--fg); }
.price-row .free { color: #2D9B6E; font-weight: 600; }

/* ── Sidebar Info Cards ───────────────────────────────────────── */
.sidebar-cards { display: flex; flex-direction: column; gap: 20px; }

.info-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden;
}
.info-card-header {
    padding: 16px 20px; border-bottom: 1px solid var(--border-light);
    display: flex; align-items: center; gap: 10px;
}
.info-card-header i { color: var(--red); font-size: 0.85rem; }
.info-card-header h4 { font-size: 0.88rem; font-weight: 700; color: var(--fg); }
.info-card-body { padding: 16px 20px; }
.info-row { display: flex; justify-content: space-between; align-items: flex-start; padding: 8px 0; }
.info-row + .info-row { border-top: 1px solid var(--border-light); }
.info-label { font-size: 0.8rem; color: var(--fg-muted); font-weight: 500; }
.info-value { font-size: 0.84rem; color: var(--fg); font-weight: 600; text-align: right; max-width: 60%; }

.info-card-body .address-block {
    font-size: 0.84rem; color: var(--fg); line-height: 1.7;
    font-weight: 500;
}

/* ── Notes Card ───────────────────────────────────────────────── */
.note-box {
    background: var(--cream); border: 1px solid var(--cream-deeper);
    border-radius: var(--radius-sm); padding: 12px 16px;
    font-size: 0.84rem; color: var(--fg-secondary); line-height: 1.6;
    font-style: italic;
}
.note-box i { color: var(--fg-muted); margin-right: 6px; font-style: normal; }

/* ── Activity Log ─────────────────────────────────────────────── */
.activity-list { padding: 4px 0; }
.activity-item {
    display: flex; gap: 14px; padding: 12px 0;
    border-bottom: 1px solid var(--border-light);
}
.activity-item:last-child { border-bottom: none; }
.activity-dot-col {
    display: flex; flex-direction: column; align-items: center;
    padding-top: 5px; flex-shrink: 0;
}
.activity-dot {
    width: 10px; height: 10px; border-radius: 50%;
    background: var(--cream-deeper); border: 2px solid var(--border);
    flex-shrink: 0;
}
.activity-item:first-child .activity-dot { background: var(--red); border-color: var(--red); }
.activity-line { width: 2px; flex: 1; background: var(--border-light); margin-top: 4px; }
.activity-content { flex: 1; min-width: 0; }
.activity-text { font-size: 0.84rem; color: var(--fg); font-weight: 500; }
.activity-time { font-size: 0.74rem; color: var(--fg-muted); margin-top: 2px; }

/* ── Bottom Actions Bar ───────────────────────────────────────── */
.bottom-bar {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 20px 28px; display: flex; align-items: center;
    justify-content: space-between; flex-wrap: wrap; gap: 12px;
}
.bottom-bar-left { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
.bottom-bar-right { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }

/* ── Help Modal ───────────────────────────────────────────────── */
.modal-overlay {
    position: fixed; inset: 0; z-index: 2000;
    background: rgba(42, 31, 33, 0.5); backdrop-filter: blur(6px);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; visibility: hidden; transition: all 0.3s var(--ease);
    padding: 24px;
}
.modal-overlay.visible { opacity: 1; visibility: visible; }
.modal {
    background: var(--card); border-radius: var(--radius-lg);
    width: 100%; max-width: 520px; max-height: 85vh;
    overflow: hidden; display: flex; flex-direction: column;
    box-shadow: var(--shadow-xl);
    transform: translateY(20px) scale(0.97);
    transition: transform 0.35s var(--ease);
}
.modal-overlay.visible .modal { transform: translateY(0) scale(1); }
.modal-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 24px; border-bottom: 1px solid var(--border-light); flex-shrink: 0;
}
.modal-header h3 { font-size: 1.05rem; font-weight: 700; color: var(--fg); }
.modal-close { width: 32px; height: 32px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--fg-muted); font-size: 0.9rem; transition: all var(--duration) var(--ease); }
.modal-close:hover { background: var(--cream); color: var(--red); }
.modal-body { padding: 24px; overflow-y: auto; flex: 1; }
.modal-footer { padding: 16px 24px; border-top: 1px solid var(--border-light); display: flex; align-items: center; justify-content: flex-end; gap: 10px; flex-shrink: 0; }

.form-group { margin-bottom: 18px; }
.form-label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--fg-secondary); margin-bottom: 6px; }
.form-input, .form-textarea {
    width: 100%; padding: 10px 14px; font-size: 0.87rem; color: var(--fg);
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-sm); transition: all var(--duration) var(--ease);
}
.form-input:focus, .form-textarea:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }
.form-textarea { resize: vertical; min-height: 100px; line-height: 1.6; }
.form-input::placeholder, .form-textarea::placeholder { color: var(--fg-muted); }

/* ── Toast ────────────────────────────────────────────────────── */
.toast-container { position: fixed; bottom: 24px; right: 24px; z-index: 3000; display: flex; flex-direction: column; gap: 10px; }
.toast { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 14px 20px; box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 12px; min-width: 280px; max-width: 400px; transform: translateX(120%); opacity: 0; transition: all 0.4s var(--ease); }
.toast.visible { transform: translateX(0); opacity: 1; }
.toast-icon { font-size: 1.1rem; flex-shrink: 0; }
.toast-icon.success { color: #2D9B6E; }
.toast-icon.info { color: #6B5CE7; }
.toast-icon.warning { color: #D4942A; }
.toast-msg { font-size: 0.84rem; color: var(--fg); font-weight: 500; }

/* ── Footer ───────────────────────────────────────────────────── */
.main-footer { padding: 18px 28px; text-align: center; font-size: 0.78rem; color: var(--fg-muted); border-top: 1px solid var(--border-light); }
.main-footer span { font-weight: 600; color: var(--fg-secondary); }

/* ── 404 State ────────────────────────────────────────────────── */
.not-found-state { text-align: center; padding: 80px 24px; }
.not-found-state i { font-size: 3.5rem; color: var(--cream-deeper); margin-bottom: 20px; }
.not-found-state h2 { font-size: 1.3rem; font-weight: 700; color: var(--fg); margin-bottom: 8px; }
.not-found-state p { font-size: 0.9rem; color: var(--fg-muted); margin-bottom: 24px; }

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1100px) { .detail-grid { grid-template-columns: 1fr; } .sidebar-cards { display: grid; grid-template-columns: 1fr 1fr; } }
@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
    .sidebar.collapsed { width: var(--sidebar-width) !important; }
    .sidebar.collapsed .sidebar-collapse-btn { display: none; }
    .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label { opacity: 1; width: auto; transform: none; height: auto; margin: 0; }
    .sidebar.collapsed .nav-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
    .sidebar.collapsed .dropdown-icon { display: inline; }
    .sidebar.collapsed .dropdown-menu { display: block; }
    .sidebar.collapsed .sidebar-header { justify-content: flex-start; padding: 20px 16px 12px; }
    .sidebar.collapsed .sidebar-logo { justify-content: flex-start; }
    .sidebar.open { transform: translateX(0); }
    .main-wrapper { margin-left: 0 !important; }
    .mobile-toggle { display: flex; align-items: center; justify-content: center; }
    .topbar { padding: 0 16px; }
    .topbar-greeting h2 { font-size: 1rem; }
    .topbar-greeting p { display: none; }
    .search-box { display: none; }
    .profile-label { display: none; }
    .main-content { padding: 20px 16px; }
    .page-header { flex-direction: column; }
    .page-header-left h1 { font-size: 1.2rem; }
    .sidebar-cards { grid-template-columns: 1fr; }
    .timeline { gap: 0; }
    .timeline::before { left: 18px; right: 18px; }
    .timeline-progress { left: 18px; }
    .timeline-dot { width: 28px; height: 28px; font-size: 0.65rem; }
    .timeline-label { font-size: 0.68rem; }
    .timeline-date { font-size: 0.62rem; }
    .order-item { padding: 16px; gap: 14px; }
    .order-item-img { width: 56px; height: 56px; }
    .bottom-bar { flex-direction: column; align-items: stretch; }
    .bottom-bar-left, .bottom-bar-right { justify-content: center; }
}
@media (max-width: 480px) {
    .timeline-label { display: none; }
    .timeline-date { display: none; }
    .page-header-actions { width: 100%; }
    .page-header-actions .btn { flex: 1; justify-content: center; }
    .order-item-right { text-align: left; }
}

:focus-visible { outline: 2px solid var(--pink); outline-offset: 2px; }
.nav-link:focus-visible { outline-offset: -2px; }
::-webkit-scrollbar { width: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--cream-deeper); border-radius: 6px; }
::-webkit-scrollbar-thumb:hover { background: var(--fg-muted); }
    </style>
</head>
<body>

<!-- ================================================================
     SIDEBAR
     ================================================================ -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-logo">
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
            <a href="/dashboards/user/index.php" class="nav-link" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="My Shopping">
                <i class="fa-solid fa-shopping-bag nav-icon"></i>
                <span class="nav-label">My Shopping</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/users/manage_cart.php" role="menuitem">My Cart</a>
                <a href="/api/users/manage_wishlist.php" role="menuitem">Wishlist</a>
            </div>
        </div>
        <div class="nav-item" data-dropdown>
            <div class="nav-link active" role="button" tabindex="0" aria-expanded="true" data-tooltip="My Orders">
                <i class="fa-solid fa-history nav-icon"></i>
                <span class="nav-label">My Orders History</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu open" role="menu">
                <a href="/api/users/manage_order_history.php" role="menuitem">Orders History</a>
                <a href="/api/users/manage_enquiries.php" role="menuitem">Custom Requests</a>
                <a href="/api/users/manage_enquiries.php" role="menuitem">My Enquiries</a>
            </div>
        </div>
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Settings">
                <i class="fa-solid fa-user-gear nav-icon"></i>
                <span class="nav-label">Settings</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/users/manage_settings.php" role="menuitem">General Settings</a>
            </div>
        </div>
    </nav>
</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ================================================================
     MAIN WRAPPER
     ================================================================ -->
<div class="main-wrapper">
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="topbar-greeting">
                <h2>Order Details</h2>
                <p>View your order information and tracking.</p>
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
            <a href="/dashboards/user/profile.php" class="profile-btn" aria-label="Go to profile">
                <span class="profile-avatar">H</span>
                <span class="profile-label">My Profile</span>
            </a>
        </div>
    </header>

    <main class="main-content" id="mainContent">
        <!-- Populated by JS based on order ID -->
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ── Help / Return Modal ─────────────────────────────────────── -->
<div class="modal-overlay" id="helpModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="helpModalTitle">
        <div class="modal-header">
            <h3 id="helpModalTitle">Need Help With This Order?</h3>
            <button class="modal-close" id="helpModalClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label" for="helpSubject">Subject</label>
                <select class="form-input" id="helpSubject">
                    <option value="">Select a topic...</option>
                    <option value="damaged">Item arrived damaged</option>
                    <option value="wrong">Wrong item received</option>
                    <option value="missing">Missing items in package</option>
                    <option value="return">Request a return / refund</option>
                    <option value="address">Update shipping address</option>
                    <option value="other">Other issue</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="helpMessage">Message</label>
                <textarea class="form-textarea" id="helpMessage" placeholder="Describe your issue in detail so we can help you quickly..."></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="helpAttachment">Attach Photo (optional)</label>
                <div style="border:2px dashed var(--border);border-radius:var(--radius-sm);padding:24px;text-align:center;cursor:pointer;transition:all var(--duration) var(--ease);" id="dropZone"
                     onmouseover="this.style.borderColor='var(--red)';this.style.background='var(--red-muted)'"
                     onmouseout="this.style.borderColor='var(--border)';this.style.background='transparent'">
                    <i class="fa-solid fa-cloud-arrow-up" style="font-size:1.4rem;color:var(--fg-muted);margin-bottom:8px;display:block;"></i>
                    <span style="font-size:0.82rem;color:var(--fg-muted);font-weight:500;">Click to upload or drag and drop</span>
                    <span style="font-size:0.72rem;color:var(--fg-muted);display:block;margin-top:4px;">PNG, JPG up to 5MB</span>
                    <input type="file" accept="image/*" style="display:none;" id="fileInput">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="helpCancelBtn">Cancel</button>
            <button class="btn btn-primary" id="helpSubmitBtn"><i class="fa-solid fa-paper-plane"></i> Submit Request</button>
        </div>
    </div>
</div>

<!-- ── Toast Container ─────────────────────────────────────────── -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   ORDER DATA — In production, fetch from server using the URL param
   ================================================================ */
const ordersDB = {
    "HH-10024": {
        id: "HH-10024", date: "2025-06-10", status: "in-transit",
        placedAt: "2025-06-10T09:14:00",
        processingAt: "2025-06-10T14:30:00",
        shippedAt: "2025-06-11T10:05:00",
        deliveredAt: null,
        trackingNumber: "HAT-UK-2025-48291",
        carrier: "Royal Mail Tracked 48",
        items: [
            { name: "Velvet Cloche Hat", variant: "Burgundy / Medium", qty: 1, price: 89.00, sku: "VCH-BUR-M", img: "https://picsum.photos/seed/hat-velvet/200/200.jpg" }
        ],
        subtotal: 89.00, shipping: 5.99, tax: 0, total: 94.99,
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "Visa", last4: "4821", icon: "fa-brands fa-cc-visa" },
        note: "Please leave at the front door if I'm not home. Ring the doorbell twice.",
        activity: [
            { text: "Package is in transit — estimated delivery by 13 Jun", time: "11 Jun, 10:05 AM", icon: "fa-solid fa-truck" },
            { text: "Order shipped via Royal Mail Tracked 48", time: "11 Jun, 10:05 AM", icon: "fa-solid fa-box" },
            { text: "Order is being prepared for dispatch", time: "10 Jun, 2:30 PM", icon: "fa-solid fa-gear" },
            { text: "Order confirmed and payment processed", time: "10 Jun, 9:14 AM", icon: "fa-solid fa-circle-check" },
            { text: "Order placed successfully", time: "10 Jun, 9:14 AM", icon: "fa-solid fa-cart-shopping" }
        ]
    },
    "HH-10023": {
        id: "HH-10023", date: "2025-06-08", status: "delivered",
        placedAt: "2025-06-08T11:42:00",
        processingAt: "2025-06-08T15:00:00",
        shippedAt: "2025-06-09T08:20:00",
        deliveredAt: "2025-06-11T14:33:00",
        trackingNumber: "HAT-UK-2025-48015",
        carrier: "Royal Mail Tracked 24",
        items: [
            { name: "Straw Boater Hat", variant: "Natural / Large", qty: 1, price: 65.00, sku: "SBH-NAT-L", img: "https://picsum.photos/seed/hat-boater/200/200.jpg" },
            { name: "Silk Ribbon Band", variant: "Navy Blue", qty: 2, price: 12.00, sku: "SRB-NVY-OS", img: "https://picsum.photos/seed/ribbon-navy/200/200.jpg" }
        ],
        subtotal: 89.00, shipping: 0, tax: 0, total: 89.00,
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "PayPal", last4: "hattie.c@email.com", icon: "fa-brands fa-cc-paypal" },
        note: "",
        activity: [
            { text: "Package delivered — signed by H. CLARKSON", time: "11 Jun, 2:33 PM", icon: "fa-solid fa-circle-check" },
            { text: "Out for delivery in Bath area", time: "11 Jun, 7:15 AM", icon: "fa-solid fa-truck-fast" },
            { text: "Package arrived at Bath sorting office", time: "10 Jun, 11:40 PM", icon: "fa-solid fa-warehouse" },
            { text: "Order shipped via Royal Mail Tracked 24", time: "9 Jun, 8:20 AM", icon: "fa-solid fa-box" },
            { text: "Order confirmed and payment processed", time: "8 Jun, 11:42 AM", icon: "fa-solid fa-circle-check" },
            { text: "Order placed successfully", time: "8 Jun, 11:42 AM", icon: "fa-solid fa-cart-shopping" }
        ]
    },
    "HH-10018": {
        id: "HH-10018", date: "2025-05-18", status: "delivered",
        placedAt: "2025-05-18T16:05:00",
        processingAt: "2025-05-18T17:30:00",
        shippedAt: "2025-05-19T09:10:00",
        deliveredAt: "2025-05-21T11:20:00",
        trackingNumber: "HAT-UK-2025-47230",
        carrier: "Evri",
        items: [
            { name: "Pillbox Hat with Veil", variant: "Champagne / Small", qty: 1, price: 120.00, sku: "PHV-CHP-S", img: "https://picsum.photos/seed/hat-pillbox/200/200.jpg" },
            { name: "Feather Fascinator", variant: "Ostrich White", qty: 1, price: 35.00, sku: "FF-OWH-OS", img: "https://picsum.photos/seed/fascinator/200/200.jpg" }
        ],
        subtotal: 155.00, shipping: 0, tax: 0, total: 155.00,
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "PayPal", last4: "hattie.c@email.com", icon: "fa-brands fa-cc-paypal" },
        note: "This is for a wedding on 24th May — please ensure timely delivery!",
        activity: [
            { text: "Package delivered", time: "21 May, 11:20 AM", icon: "fa-solid fa-circle-check" },
            { text: "Out for delivery", time: "21 May, 8:05 AM", icon: "fa-solid fa-truck-fast" },
            { text: "Order shipped via Evri", time: "19 May, 9:10 AM", icon: "fa-solid fa-box" },
            { text: "Order confirmed", time: "18 May, 5:30 PM", icon: "fa-solid fa-circle-check" },
            { text: "Order placed successfully", time: "18 May, 4:05 PM", icon: "fa-solid fa-cart-shopping" }
        ]
    },
    "HH-10016": {
        id: "HH-10016", date: "2025-05-14", status: "cancelled",
        placedAt: "2025-05-14T10:30:00",
        processingAt: null, shippedAt: null, deliveredAt: null,
        trackingNumber: null, carrier: null,
        items: [
            { name: "Cowboy Hat Leather", variant: "Tan / Large", qty: 1, price: 145.00, sku: "CHL-TAN-L", img: "https://picsum.photos/seed/hat-cowboy/200/200.jpg" }
        ],
        subtotal: 145.00, shipping: 5.99, tax: 0, total: 150.99,
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "Visa", last4: "4821", icon: "fa-brands fa-cc-visa" },
        note: "",
        activity: [
            { text: "Order cancelled by customer — full refund issued", time: "14 May, 11:15 AM", icon: "fa-solid fa-ban" },
            { text: "Cancellation request received", time: "14 May, 11:02 AM", icon: "fa-solid fa-xmark" },
            { text: "Order placed successfully", time: "14 May, 10:30 AM", icon: "fa-solid fa-cart-shopping" }
        ]
    },
    "HH-10018-r": {
        id: "HH-10018", date: "2025-05-18", status: "returned",
        placedAt: "2025-05-18T16:05:00",
        processingAt: "2025-05-18T17:30:00",
        shippedAt: "2025-05-19T09:10:00",
        deliveredAt: "2025-05-21T11:20:00",
        trackingNumber: "HAT-UK-2025-47230-RET",
        carrier: "Royal Mail Returns",
        items: [
            { name: "Pillbox Hat with Veil", variant: "Champagne / Small", qty: 1, price: 120.00, sku: "PHV-CHP-S", img: "https://picsum.photos/seed/hat-pillbox/200/200.jpg" },
            { name: "Feather Fascinator", variant: "Ostrich White", qty: 1, price: 35.00, sku: "FF-OWH-OS", img: "https://picsum.photos/seed/fascinator/200/200.jpg" }
        ],
        subtotal: 155.00, shipping: 0, tax: 0, total: 155.00,
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "PayPal", last4: "hattie.c@email.com", icon: "fa-brands fa-cc-paypal" },
        note: "",
        activity: [
            { text: "Refund of \u00A3155.00 issued to PayPal account", time: "26 May, 3:45 PM", icon: "fa-solid fa-rotate-left" },
            { text: "Return received and inspected — approved", time: "26 May, 11:20 AM", icon: "fa-solid fa-box-open" },
            { text: "Return package shipped by customer", time: "24 May, 9:00 AM", icon: "fa-solid fa-dolly" },
            { text: "Return request submitted", time: "23 May, 2:10 PM", icon: "fa-solid fa-arrow-rotate-left" },
            { text: "Package delivered", time: "21 May, 11:20 AM", icon: "fa-solid fa-circle-check" },
            { text: "Order placed successfully", time: "18 May, 4:05 PM", icon: "fa-solid fa-cart-shopping" }
        ]
    }
};

/* ================================================================
   HELPERS
   ================================================================ */
function formatDate(dateStr) {
    if (!dateStr) return '—';
    const d = new Date(dateStr);
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}
function formatDateTime(dateStr) {
    if (!dateStr) return '—';
    const d = new Date(dateStr);
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short' }) + ', ' + d.toLocaleTimeString('en-GB', { hour: 'numeric', minute: '2-digit' });
}
function formatCurrency(n) { return '\u00A3' + n.toFixed(2); }
function getStatusLabel(s) { return { 'delivered':'Delivered','in-transit':'In Transit','processing':'Processing','cancelled':'Cancelled','returned':'Returned' }[s] || s; }

function getAddressHTML(addr) {
    let parts = [addr.name, addr.line1, addr.line2, addr.city, addr.county, addr.postcode, addr.country].filter(Boolean);
    return parts.join('<br>');
}

/* ================================================================
   GET ORDER ID FROM URL
   ================================================================ */
const urlParams = new URLSearchParams(window.location.search);
const orderId = urlParams.get('id') || '';
const order = ordersDB[orderId];

/* ================================================================
   RENDER PAGE
   ================================================================ */
const mainContent = document.getElementById('mainContent');

if (!order) {
    /* ── Not Found ──────────────────────────────────────────── */
    mainContent.innerHTML = `
        <div class="not-found-state">
            <i class="fa-solid fa-box-open"></i>
            <h2>Order Not Found</h2>
            <p>We couldn't find an order with that ID. It may have been removed or the link is incorrect.</p>
            <a href="/api/users/manage_order_history.php" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Back to Order History</a>
        </div>
    `;
} else {
    /* ── Determine timeline step ────────────────────────────── */
    let currentStep = 0;
    if (order.processingAt) currentStep = 1;
    if (order.shippedAt) currentStep = 2;
    if (order.deliveredAt) currentStep = 3;
    if (order.status === 'cancelled') currentStep = -1;
    if (order.status === 'returned') currentStep = 4;

    const timelineWidth = order.status === 'cancelled' ? 0 : (order.status === 'returned' ? 100 : (currentStep / 3) * 100);

    let timelineHTML = '';
    if (order.status === 'cancelled') {
        timelineHTML = `
            <div class="timeline-card">
                <h3><i class="fa-solid fa-route"></i> Order Status</h3>
                <div style="text-align:center;padding:12px 0;">
                    <span class="status-badge status-cancelled"><span class="status-dot"></span> Cancelled</span>
                    <p style="margin-top:12px;font-size:0.87rem;color:var(--fg-secondary);">This order was cancelled and a full refund was issued to your original payment method.</p>
                </div>
            </div>
        `;
    } else if (order.status === 'returned') {
        timelineHTML = `
            <div class="timeline-card">
                <h3><i class="fa-solid fa-route"></i> Order Status</h3>
                <div style="text-align:center;padding:12px 0;">
                    <span class="status-badge status-returned"><span class="status-dot"></span> Returned</span>
                    <p style="margin-top:12px;font-size:0.87rem;color:var(--fg-secondary);">This order was returned and a refund of <strong>${formatCurrency(order.total)}</strong> has been issued.</p>
                </div>
            </div>
        `;
    } else {
        timelineHTML = `
            <div class="timeline-card">
                <h3><i class="fa-solid fa-route"></i> Order Tracking</h3>
                <div class="timeline">
                    <div class="timeline-progress" style="width:${timelineWidth}%"></div>
                    <div class="timeline-step ${currentStep >= 0 ? 'completed' : ''}">
                        <div class="timeline-dot"><i class="fa-solid fa-check" style="font-size:0.7rem;"></i></div>
                        <div class="timeline-label">Ordered</div>
                        <div class="timeline-date">${formatDate(order.placedAt)}</div>
                    </div>
                    <div class="timeline-step ${currentStep >= 1 ? 'completed' : ''} ${currentStep === 1 ? 'current' : ''}">
                        <div class="timeline-dot"><i class="fa-solid fa-check" style="font-size:0.7rem;"></i></div>
                        <div class="timeline-label">Processing</div>
                        <div class="timeline-date">${formatDate(order.processingAt)}</div>
                    </div>
                    <div class="timeline-step ${currentStep >= 2 ? 'completed' : ''} ${currentStep === 2 ? 'current' : ''}">
                        <div class="timeline-dot"><i class="fa-solid fa-check" style="font-size:0.7rem;"></i></div>
                        <div class="timeline-label">Shipped</div>
                        <div class="timeline-date">${formatDate(order.shippedAt)}</div>
                    </div>
                    <div class="timeline-step ${currentStep >= 3 ? 'completed' : ''} ${currentStep === 3 ? 'current' : ''}">
                        <div class="timeline-dot"><i class="fa-solid fa-check" style="font-size:0.7rem;"></i></div>
                        <div class="timeline-label">Delivered</div>
                        <div class="timeline-date">${formatDate(order.deliveredAt)}</div>
                    </div>
                </div>
            </div>
        `;
    }

    /* ── Items ──────────────────────────────────────────────── */
    const itemsHTML = order.items.map(item => `
        <div class="order-item">
            <div class="order-item-img"><img src="${item.img}" alt="${item.name}" loading="lazy"></div>
            <div class="order-item-info">
                <div class="order-item-name">${item.name}</div>
                <div class="order-item-variant">${item.variant}</div>
                <div class="order-item-sku">SKU: ${item.sku}</div>
            </div>
            <div class="order-item-right">
                <div class="order-item-qty-label">Qty: ${item.qty} &times; ${formatCurrency(item.price)}</div>
                <div class="order-item-price">${formatCurrency(item.price * item.qty)}</div>
            </div>
        </div>
    `).join('');

    /* ── Activity Log ───────────────────────────────────────── */
    const activityHTML = order.activity.map((a, i) => `
        <div class="activity-item">
            <div class="activity-dot-col">
                <div class="activity-dot"></div>
                ${i < order.activity.length - 1 ? '<div class="activity-line"></div>' : ''}
            </div>
            <div class="activity-content">
                <div class="activity-text">${a.text}</div>
                <div class="activity-time">${a.time}</div>
            </div>
        </div>
    `).join('');

    /* ── Tracking info (only for shippable orders) ──────────── */
    let trackingHTML = '';
    if (order.trackingNumber) {
        trackingHTML = `
            <div class="info-card">
                <div class="info-card-header"><i class="fa-solid fa-truck-fast"></i><h4>Tracking Information</h4></div>
                <div class="info-card-body">
                    <div class="info-row"><span class="info-label">Tracking No.</span><span class="info-value" style="color:var(--red);font-family:monospace;letter-spacing:0.03em;">${order.trackingNumber}</span></div>
                    <div class="info-row"><span class="info-label">Carrier</span><span class="info-value">${order.carrier}</span></div>
                </div>
            </div>
        `;
    }

    /* ── Note ───────────────────────────────────────────────── */
    let noteHTML = '';
    if (order.note) {
        noteHTML = `
            <div class="info-card">
                <div class="info-card-header"><i class="fa-solid fa-note-sticky"></i><h4>Order Note</h4></div>
                <div class="info-card-body">
                    <div class="note-box"><i class="fa-solid fa-quote-left"></i>${order.note}</div>
                </div>
            </div>
        `;
    }

    /* ── Action buttons based on status ─────────────────────── */
    let actionBtns = `<a href="/dashboards/user/order_history.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Back to History</a>`;

    if (order.status === 'delivered') {
        actionBtns += `
            <button class="btn btn-secondary" id="reorderBtn"><i class="fa-solid fa-cart-plus"></i> Reorder</button>
            <button class="btn btn-outline-red" id="returnBtn"><i class="fa-solid fa-rotate-left"></i> Return / Refund</button>
        `;
    } else if (order.status === 'in-transit') {
        actionBtns += `<button class="btn btn-primary" id="trackBtn"><i class="fa-solid fa-location-dot"></i> Track Package</button>`;
    } else if (order.status === 'processing') {
        actionBtns += `<button class="btn btn-outline-red" id="cancelBtn"><i class="fa-solid fa-xmark"></i> Cancel Order</button>`;
    }

    actionBtns += `<button class="btn btn-ghost" id="helpBtn"><i class="fa-solid fa-headset"></i> Need Help?</button>`;

    /* ── Estimated delivery ─────────────────────────────────── */
    let estDeliveryHTML = '';
    if (order.status === 'in-transit') {
        estDeliveryHTML = `
            <div class="info-row"><span class="info-label">Est. Delivery</span><span class="info-value" style="color:#2D9B6E;font-weight:700;">13 Jun 2025</span></div>
        `;
    }

    /* ── Assemble Page ──────────────────────────────────────── */
    mainContent.innerHTML = `
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/dashboards/user/index.php">Dashboard</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <a href="/dashboards/user/order_history.php">Order History</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">${order.id}</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h1>Order ${order.id}</h1>
                <div class="page-header-meta">
                    <span><i class="fa-regular fa-calendar"></i> ${formatDate(order.date)}</span>
                    <span><i class="fa-solid fa-box"></i> ${order.items.length} item${order.items.length > 1 ? 's' : ''}</span>
                    <span class="status-badge status-${order.status}"><span class="status-dot"></span>${getStatusLabel(order.status)}</span>
                </div>
            </div>
            <div class="page-header-actions">
                <button class="btn btn-secondary" onclick="window.print()"><i class="fa-solid fa-print"></i> Print</button>
                <button class="btn btn-secondary" id="downloadBtn"><i class="fa-solid fa-download"></i> Invoice</button>
            </div>
        </div>

        <!-- Timeline -->
        ${timelineHTML}

        <!-- Two Column Grid -->
        <div class="detail-grid">
            <!-- Left: Items + Price -->
            <div>
                <div class="detail-card" style="margin-bottom:24px;">
                    <div class="detail-card-header">
                        <h3><i class="fa-solid fa-bag-shopping"></i> Items Ordered</h3>
                        <span style="font-size:0.8rem;color:var(--fg-muted);font-weight:500;">${order.items.length} item${order.items.length > 1 ? 's' : ''}</span>
                    </div>
                    <div class="detail-card-body">
                        ${itemsHTML}
                    </div>
                    <div class="price-summary">
                        <div class="price-row"><span>Subtotal</span><span>${formatCurrency(order.subtotal)}</span></div>
                        <div class="price-row"><span>Shipping</span><span>${order.shipping === 0 ? '<span class="free">Free</span>' : formatCurrency(order.shipping)}</span></div>
                        ${order.tax > 0 ? `<div class="price-row"><span>Tax</span><span>${formatCurrency(order.tax)}</span></div>` : ''}
                        <div class="price-row grand"><span>Total</span><span>${formatCurrency(order.total)}</span></div>
                    </div>
                </div>

                <!-- Activity Log -->
                <div class="detail-card">
                    <div class="detail-card-header">
                        <h3><i class="fa-solid fa-clock-rotate-left"></i> Activity Log</h3>
                    </div>
                    <div class="detail-card-body" style="padding:16px 24px;">
                        <div class="activity-list">
                            ${activityHTML}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Info Cards -->
            <div class="sidebar-cards">
                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-circle-info"></i><h4>Order Summary</h4></div>
                    <div class="info-card-body">
                        <div class="info-row"><span class="info-label">Order ID</span><span class="info-value" style="font-family:monospace;letter-spacing:0.03em;">${order.id}</span></div>
                        <div class="info-row"><span class="info-label">Date Placed</span><span class="info-value">${formatDate(order.placedAt)}</span></div>
                        <div class="info-row"><span class="info-label">Status</span><span class="info-value"><span class="status-badge status-${order.status}" style="font-size:0.72rem;padding:3px 10px;"><span class="status-dot"></span>${getStatusLabel(order.status)}</span></span></div>
                        ${estDeliveryHTML}
                    </div>
                </div>

                ${trackingHTML}

                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-location-dot"></i><h4>Shipping Address</h4></div>
                    <div class="info-card-body">
                        <div class="address-block">${getAddressHTML(order.shippingAddress)}</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-credit-card"></i><h4>Payment Method</h4></div>
                    <div class="info-card-body">
                        <div class="info-row">
                            <span class="info-label" style="display:flex;align-items:center;gap:8px;"><i class="${order.payment.icon}" style="font-size:1.3rem;color:var(--fg-secondary);"></i> ${order.payment.method}</span>
                            <span class="info-value">${order.payment.last4}</span>
                        </div>
                        <div class="info-row"><span class="info-label">Total Charged</span><span class="info-value" style="font-weight:700;">${formatCurrency(order.total)}</span></div>
                    </div>
                </div>

                ${noteHTML}
            </div>
        </div>

        <!-- Bottom Actions -->
        <div class="bottom-bar">
            <div class="bottom-bar-left">${actionBtns}</div>
            <div class="bottom-bar-right">
                <button class="btn btn-ghost" id="shareBtn"><i class="fa-solid fa-share-nodes"></i> Share</button>
            </div>
        </div>
    `;

    /* ── Wire up dynamic buttons ────────────────────────────── */
    wireUpButtons(order);
}

/* ================================================================
   BUTTON HANDLERS
   ================================================================ */
function wireUpButtons(order) {
    const helpBtn = document.getElementById('helpBtn');
    const helpModal = document.getElementById('helpModal');
    const helpModalClose = document.getElementById('helpModalClose');
    const helpCancelBtn = document.getElementById('helpCancelBtn');
    const helpSubmitBtn = document.getElementById('helpSubmitBtn');

    /* Help Modal */
    if (helpBtn) {
        helpBtn.addEventListener('click', () => helpModal.classList.add('visible'));
    }
    if (helpModalClose) helpModalClose.addEventListener('click', () => helpModal.classList.remove('visible'));
    if (helpCancelBtn) helpCancelBtn.addEventListener('click', () => helpModal.classList.remove('visible'));
    helpModal.addEventListener('click', (e) => { if (e.target === helpModal) helpModal.classList.remove('visible'); });

    if (helpSubmitBtn) {
        helpSubmitBtn.addEventListener('click', () => {
            const subject = document.getElementById('helpSubject').value;
            const message = document.getElementById('helpMessage').value.trim();
            if (!subject || !message) {
                showToast('Please fill in all required fields.', 'warning');
                return;
            }
            helpModal.classList.remove('visible');
            showToast('Your request has been submitted. We\'ll respond within 24 hours.', 'success');
            document.getElementById('helpSubject').value = '';
            document.getElementById('helpMessage').value = '';
        });
    }

    /* File upload zone */
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    if (dropZone && fileInput) {
        dropZone.addEventListener('click', () => fileInput.click());
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.style.borderColor = 'var(--red)'; dropZone.style.background = 'var(--red-muted)'; });
        dropZone.addEventListener('dragleave', () => { dropZone.style.borderColor = 'var(--border)'; dropZone.style.background = 'transparent'; });
        dropZone.addEventListener('drop', (e) => { e.preventDefault(); dropZone.style.borderColor = 'var(--border)'; dropZone.style.background = 'transparent'; showToast('Photo attached successfully.', 'success'); });
        fileInput.addEventListener('change', () => { if (fileInput.files.length) showToast('Photo attached successfully.', 'success'); });
    }

    /* Reorder */
    const reorderBtn = document.getElementById('reorderBtn');
    if (reorderBtn) {
        reorderBtn.addEventListener('click', () => {
            showToast('Items from ' + order.id + ' added to your cart.', 'success');
        });
    }

    /* Return */
    const returnBtn = document.getElementById('returnBtn');
    if (returnBtn) {
        returnBtn.addEventListener('click', () => {
            helpModal.classList.add('visible');
            document.getElementById('helpSubject').value = 'return';
        });
    }

    /* Track */
    const trackBtn = document.getElementById('trackBtn');
    if (trackBtn) {
        trackBtn.addEventListener('click', () => {
            if (order.trackingNumber) {
                showToast('Tracking: ' + order.trackingNumber + ' via ' + order.carrier, 'info');
            } else {
                showToast('Tracking information not available yet.', 'warning');
            }
        });
    }

    /* Cancel */
    const cancelBtn = document.getElementById('cancelBtn');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            helpModal.classList.add('visible');
            document.getElementById('helpSubject').value = 'other';
            document.getElementById('helpMessage').value = 'I would like to cancel order ' + order.id + '. Please process a full refund.';
            document.getElementById('helpMessage').focus();
        });
    }

    /* Download Invoice */
    const downloadBtn = document.getElementById('downloadBtn');
    if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
            showToast('Invoice for ' + order.id + ' is being prepared for download.', 'info');
        });
    }

    /* Share */
    const shareBtn = document.getElementById('shareBtn');
    if (shareBtn) {
        shareBtn.addEventListener('click', () => {
            if (navigator.share) {
                navigator.share({ title: 'Order ' + order.id, text: 'View order ' + order.id + ' from Hattie\'s Hat\'istical Hats', url: window.location.href });
            } else {
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showToast('Order link copied to clipboard.', 'success');
                }).catch(() => {
                    showToast('Could not copy link. Please copy the URL manually.', 'warning');
                });
            }
        });
    }
}

/* ================================================================
   TOAST
   ================================================================ */
function showToast(message, type) {
    type = type || 'info';
    const iconMap = { success:'fa-solid fa-circle-check', info:'fa-solid fa-circle-info', warning:'fa-solid fa-triangle-exclamation' };
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = '<i class="toast-icon ' + type + ' ' + iconMap[type] + '"></i><span class="toast-msg">' + message + '</span>';
    document.getElementById('toastContainer').appendChild(toast);
    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('visible')));
    setTimeout(() => { toast.classList.remove('visible'); setTimeout(() => toast.remove(), 400); }, 3500);
}

/* ================================================================
   SIDEBAR — Collapse, Mobile, Dropdowns
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
            if (other !== item) { other.querySelector('.nav-link').setAttribute('aria-expanded','false'); other.querySelector('.dropdown-menu').classList.remove('open'); }
        });
        trigger.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('open');
    });
    trigger.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); trigger.click(); } });
});

/* Topbar search */
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
if (searchBtn && searchInput) {
    searchBtn.addEventListener('click', () => { const q = searchInput.value.trim(); if (q) window.location.href = '/shop?search=' + encodeURIComponent(q); });
    searchInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') searchBtn.click(); });
}

/* Notification bell */
const notifToggle = document.getElementById('notifToggle');
if (notifToggle) notifToggle.addEventListener('click', () => showToast('You have no new notifications.', 'info'));

/* Escape key closes modals */
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        document.getElementById('helpModal').classList.remove('visible');
    }
});
</script>
</body>
</html>