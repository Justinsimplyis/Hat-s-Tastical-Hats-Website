<?php
// You can fetch user data here later
// Example: $user = $_SESSION['user'] ?? null;
//          $orders = fetchUserOrders($user['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hattie's Hats'tatical Hats | My Order History</title>
    <link rel="stylesheet" href="/assets/css/users/order_history.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — Order History
   Light warm palette derived from brand identity
   ================================================================ */

/* ── Custom Properties ────────────────────────────────────────── */
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

/* ── Reset & Base ─────────────────────────────────────────────── */
*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

html {
    font-size: 15px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

body {
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    background: var(--bg);
    color: var(--fg);
    line-height: 1.6;
    overflow-x: hidden;
}

a { color: inherit; text-decoration: none; }
button { font: inherit; border: none; background: none; cursor: pointer; color: inherit; }
input, select { font: inherit; border: none; outline: none; background: none; }
table { border-collapse: collapse; width: 100%; }

/* ================================================================
   SIDEBAR
   ================================================================ */
.sidebar {
    position: fixed; top: 0; left: 0; bottom: 0;
    width: var(--sidebar-width);
    background: var(--sidebar-bg);
    display: flex; flex-direction: column;
    z-index: 1000;
    transition: width 0.3s var(--ease), transform 0.35s var(--ease);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.sidebar-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 16px 12px; flex-shrink: 0;
    border-bottom: 1px solid var(--border-light);
}

.sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }

.logo-mark {
    width: 40px; height: 40px;
    border-radius: var(--radius-md);
    background: linear-gradient(135deg, var(--red), var(--pink));
    color: #fff; font-size: 1.15rem; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; letter-spacing: -0.02em;
}

.logo-text {
    display: flex; flex-direction: column; white-space: nowrap;
    transition: opacity 0.2s var(--ease), transform 0.2s var(--ease);
}
.logo-name { font-size: 1.05rem; font-weight: 700; color: var(--fg); line-height: 1.2; letter-spacing: -0.01em; }
.logo-tagline { font-size: 0.68rem; font-weight: 500; color: var(--pink); letter-spacing: 0.02em; line-height: 1.3; }

.sidebar-collapse-btn {
    width: 28px; height: 28px; border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--fg-muted); font-size: 0.7rem; flex-shrink: 0;
    transition: all var(--duration) var(--ease);
}
.sidebar-collapse-btn:hover { background: var(--sidebar-hover); color: var(--red); }

.sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; overflow-x: hidden; }

.nav-section-label {
    font-size: 0.65rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.12em;
    color: var(--fg-muted); padding: 0 12px; margin-bottom: 10px;
    white-space: nowrap; overflow: hidden;
    transition: opacity 0.2s var(--ease);
}

.nav-item { margin-bottom: 2px; }

.nav-link {
    display: flex; align-items: center; gap: 12px;
    padding: 10px 12px; border-radius: var(--radius-sm);
    color: var(--sidebar-text); font-size: 0.88rem; font-weight: 500;
    transition: all var(--duration) var(--ease);
    position: relative; user-select: none; white-space: nowrap; overflow: hidden;
}
.nav-link:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.nav-link.active { background: var(--sidebar-active); color: var(--sidebar-text-active); font-weight: 600; }

.nav-link.active::before {
    content: ''; position: absolute; left: -12px; top: 50%;
    transform: translateY(-50%); width: 3px; height: 24px;
    background: var(--red); border-radius: 0 3px 3px 0;
}

.nav-icon { width: 20px; text-align: center; font-size: 0.95rem; flex-shrink: 0; }
.nav-label { transition: opacity 0.2s var(--ease), transform 0.2s var(--ease); overflow: hidden; }

/* ── Dropdown Menus ───────────────────────────────────────────── */
.dropdown-icon {
    margin-left: auto; font-size: 0.6rem; color: var(--fg-muted);
    transition: transform 0.25s var(--ease);
    flex-shrink: 0;
}
.nav-link[aria-expanded="true"] .dropdown-icon { transform: rotate(180deg); }

.dropdown-menu {
    max-height: 0; overflow: hidden;
    transition: max-height 0.3s var(--ease);
    padding-left: 20px;
}
.dropdown-menu.open { max-height: 300px; }

.dropdown-menu a {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 12px 8px 32px;
    font-size: 0.82rem; font-weight: 500; color: var(--sidebar-text);
    border-radius: var(--radius-sm);
    transition: all var(--duration) var(--ease);
    position: relative;
}
.dropdown-menu a::before {
    content: ''; width: 5px; height: 5px; border-radius: 50%;
    background: var(--cream-deeper); flex-shrink: 0;
    transition: background var(--duration) var(--ease);
}
.dropdown-menu a:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.dropdown-menu a:hover::before { background: var(--red); }
.dropdown-menu a.active {
    color: var(--sidebar-text-active); font-weight: 600;
}
.dropdown-menu a.active::before { background: var(--red); }

/* ── Sidebar Tooltip (collapsed) ──────────────────────────────── */
.sidebar.collapsed .nav-link[data-tooltip]::after {
    content: attr(data-tooltip); position: absolute;
    left: calc(100% + 12px); top: 50%;
    transform: translateY(-50%);
    background: var(--card); color: var(--fg);
    padding: 6px 14px; border-radius: var(--radius-sm);
    font-size: 0.8rem; font-weight: 500;
    white-space: nowrap; box-shadow: var(--shadow-lg);
    border: 1px solid var(--border);
    opacity: 0; visibility: hidden;
    transition: opacity 0.15s var(--ease), visibility 0.15s var(--ease);
    pointer-events: none; z-index: 10;
}
.sidebar.collapsed .nav-link[data-tooltip]:hover::after { opacity: 1; visibility: visible; }

/* ── Sidebar Collapsed State ──────────────────────────────────── */
.sidebar.collapsed { width: var(--sidebar-collapsed-width); }
.sidebar.collapsed .sidebar-header { justify-content: center; padding: 20px 0 12px; }
.sidebar.collapsed .sidebar-logo { justify-content: center; }
.sidebar.collapsed .logo-text { opacity: 0; transform: translateX(-8px); pointer-events: none; }
.sidebar.collapsed .sidebar-collapse-btn {
    position: absolute; right: -14px; top: 24px;
    width: 28px; height: 28px; background: var(--cream);
    border: 1px solid var(--border); border-radius: 50%;
    z-index: 10; display: flex; align-items: center; justify-content: center;
    box-shadow: var(--shadow-md);
}
.sidebar.collapsed .sidebar-collapse-btn:hover { background: var(--cream-dark); color: var(--red); }
.sidebar.collapsed .nav-section-label { opacity: 0; height: 0; margin: 0; overflow: hidden; }
.sidebar.collapsed .nav-link { justify-content: center; padding: 10px; gap: 0; }
.sidebar.collapsed .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
.sidebar.collapsed .dropdown-icon { display: none; }
.sidebar.collapsed .dropdown-menu { display: none; }
.sidebar.collapsed .sidebar-nav { padding: 16px 10px; }
.sidebar.collapsed .nav-link.active::before { left: -10px; }

.sidebar-overlay {
    position: fixed; inset: 0;
    background: rgba(42, 31, 33, 0.4);
    backdrop-filter: blur(4px); z-index: 999;
    opacity: 0; visibility: hidden;
    transition: all 0.3s var(--ease);
}
.sidebar-overlay.visible { opacity: 1; visibility: visible; }

/* ================================================================
   MAIN WRAPPER & TOPBAR
   ================================================================ */
.main-wrapper {
    margin-left: var(--sidebar-width); min-height: 100vh;
    display: flex; flex-direction: column;
    transition: margin-left 0.3s var(--ease);
}
body:has(.sidebar.collapsed) .main-wrapper { margin-left: var(--sidebar-collapsed-width); }

.topbar {
    position: sticky; top: 0; z-index: 100;
    height: var(--topbar-height); background: var(--topbar-bg);
    border-bottom: 1px solid var(--border-light);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 28px; box-shadow: var(--shadow-sm);
}
.topbar-left { display: flex; align-items: center; gap: 16px; }
.mobile-toggle {
    display: none; width: 38px; height: 38px;
    border-radius: var(--radius-sm); color: var(--fg-secondary);
    font-size: 1.1rem;
    transition: all var(--duration) var(--ease);
}
.mobile-toggle:hover { background: var(--cream); color: var(--fg); }
.topbar-greeting h2 { font-size: 1.15rem; font-weight: 600; color: var(--fg); line-height: 1.3; }
.topbar-greeting p { font-size: 0.8rem; color: var(--fg-muted); }
.topbar-right { display: flex; align-items: center; gap: 10px; }

.search-box {
    display: flex; align-items: center;
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-full); padding: 0 4px 0 14px;
    height: 38px; transition: all var(--duration) var(--ease); width: 220px;
}
.search-box:focus-within {
    border-color: var(--red); background: var(--bg-elevated);
    box-shadow: 0 0 0 3px var(--red-muted); width: 260px;
}
.search-icon { color: var(--fg-muted); font-size: 0.82rem; margin-right: 8px; }
.search-box input { flex: 1; font-size: 0.84rem; color: var(--fg); min-width: 0; }
.search-box input::placeholder { color: var(--fg-muted); }
.search-btn {
    width: 30px; height: 30px; border-radius: var(--radius-full);
    background: var(--red); color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.72rem; flex-shrink: 0;
    transition: all var(--duration) var(--ease);
}
.search-btn:hover { background: var(--red-hover); transform: scale(1.05); }

.topbar-icon-btn {
    position: relative; width: 38px; height: 38px;
    border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; color: var(--fg-secondary);
    transition: all var(--duration) var(--ease);
}
.topbar-icon-btn:hover { background: var(--cream); color: var(--fg); }
.badge-dot {
    position: absolute; top: 8px; right: 8px;
    width: 8px; height: 8px; background: var(--red);
    border-radius: 50%; border: 2px solid var(--topbar-bg);
}

.profile-btn {
    display: flex; align-items: center; gap: 8px;
    padding: 4px 12px 4px 4px; border-radius: var(--radius-full);
    transition: all var(--duration) var(--ease); margin-left: 4px;
}
.profile-btn:hover { background: var(--cream); }
.profile-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    background: linear-gradient(135deg, var(--red), var(--pink));
    color: #fff; font-size: 0.8rem; font-weight: 600;
    display: flex; align-items: center; justify-content: center;
}
.profile-label { font-size: 0.82rem; font-weight: 500; color: var(--fg-secondary); }

/* ================================================================
   MAIN CONTENT — ORDER HISTORY
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Stats Grid ───────────────────────────────────────────────── */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 28px;
}

.stat-card {
    background: var(--card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    padding: 20px 22px;
    display: flex; align-items: center; gap: 16px;
    box-shadow: var(--shadow-sm);
    transition: all 0.25s var(--ease);
    position: relative;
    overflow: hidden;
}
.stat-card::after {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 3px; border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    opacity: 0; transition: opacity 0.25s var(--ease);
}
.stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
.stat-card:hover::after { opacity: 1; }

.stat-card:nth-child(1)::after { background: var(--red); }
.stat-card:nth-child(2)::after { background: #2D9B6E; }
.stat-card:nth-child(3)::after { background: #D4942A; }
.stat-card:nth-child(4)::after { background: #6B5CE7; }

.stat-icon {
    width: 46px; height: 46px; border-radius: var(--radius-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0;
}
.stat-card:nth-child(1) .stat-icon { background: var(--red-light); color: var(--red); }
.stat-card:nth-child(2) .stat-icon { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.stat-card:nth-child(3) .stat-icon { background: rgba(212,148,42,0.10); color: #D4942A; }
.stat-card:nth-child(4) .stat-icon { background: rgba(107,92,231,0.10); color: #6B5CE7; }

.stat-info { min-width: 0; }
.stat-label { font-size: 0.76rem; font-weight: 500; color: var(--fg-muted); margin-bottom: 2px; white-space: nowrap; }
.stat-number { font-size: 1.65rem; font-weight: 700; color: var(--fg); line-height: 1.2; letter-spacing: -0.02em; }

/* ── Filter Bar ───────────────────────────────────────────────── */
.filter-bar {
    background: var(--card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    padding: 16px 22px;
    margin-bottom: 20px;
    box-shadow: var(--shadow-sm);
    display: flex; align-items: center; gap: 14px;
    flex-wrap: wrap;
}

.filter-bar label {
    font-size: 0.78rem; font-weight: 600; color: var(--fg-secondary);
    display: flex; align-items: center; gap: 6px;
}
.filter-bar label i { color: var(--fg-muted); font-size: 0.82rem; }

.filter-select {
    height: 36px; padding: 0 32px 0 12px;
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-sm);
    font-size: 0.82rem; color: var(--fg);
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='%239A8588'%3E%3Cpath d='M0 0l5 6 5-6z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    transition: all var(--duration) var(--ease);
}
.filter-select:hover { border-color: var(--pink); }
.filter-select:focus { border-color: var(--red); box-shadow: 0 0 0 3px var(--red-muted); }

.filter-search {
    flex: 1; min-width: 180px; height: 36px;
    padding: 0 14px; background: var(--cream);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-sm);
    font-size: 0.82rem; color: var(--fg);
    transition: all var(--duration) var(--ease);
}
.filter-search::placeholder { color: var(--fg-muted); }
.filter-search:hover { border-color: var(--pink); }
.filter-search:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }

.filter-divider { width: 1px; height: 24px; background: var(--border); flex-shrink: 0; }

.filter-btn {
    height: 36px; padding: 0 18px;
    border-radius: var(--radius-sm);
    font-size: 0.82rem; font-weight: 600;
    display: flex; align-items: center; gap: 6px;
    transition: all var(--duration) var(--ease);
}
.filter-btn.primary { background: var(--red); color: #fff; }
.filter-btn.primary:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(201,59,57,0.3); }
.filter-btn.secondary { background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light); }
.filter-btn.secondary:hover { background: var(--cream-dark); color: var(--fg); }

/* ── Orders Table ─────────────────────────────────────────────── */
.orders-panel {
    background: var(--card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

.orders-panel-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 24px;
    border-bottom: 1px solid var(--border-light);
}
.orders-panel-header h2 { font-size: 1rem; font-weight: 600; color: var(--fg); }
.orders-count {
    font-size: 0.78rem; font-weight: 500; color: var(--fg-muted);
    background: var(--cream); padding: 4px 12px;
    border-radius: var(--radius-full);
}

.orders-table-wrap { overflow-x: auto; }

.orders-table thead { position: sticky; top: 0; z-index: 2; }
.orders-table th {
    padding: 12px 20px; font-size: 0.7rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.06em;
    color: var(--fg-muted); background: var(--cream);
    text-align: left; border-bottom: 1px solid var(--border-light);
    white-space: nowrap;
}
.orders-table td {
    padding: 16px 20px; font-size: 0.87rem; color: var(--fg);
    border-bottom: 1px solid var(--border-light); vertical-align: middle;
}
.orders-table tbody tr { transition: background var(--duration) var(--ease); }
.orders-table tbody tr:hover { background: var(--pink-muted); }
.orders-table tbody tr:last-child td { border-bottom: none; }

.order-id {
    font-weight: 600; color: var(--red); font-size: 0.84rem;
    cursor: pointer; transition: color var(--duration) var(--ease);
}
.order-id:hover { color: var(--red-hover); text-decoration: underline; }

.order-product { display: flex; align-items: center; gap: 12px; min-width: 220px; }
.order-product-img {
    width: 44px; height: 44px; border-radius: var(--radius-sm);
    background: var(--cream); overflow: hidden; flex-shrink: 0;
    border: 1px solid var(--border-light);
}
.order-product-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.order-product-info { min-width: 0; }
.order-product-name {
    font-weight: 600; font-size: 0.85rem; color: var(--fg);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    max-width: 180px;
}
.order-product-variant { font-size: 0.76rem; color: var(--fg-muted); margin-top: 1px; }

.order-date { white-space: nowrap; color: var(--fg-secondary); font-size: 0.84rem; }
.order-qty { font-weight: 600; text-align: center; }
.order-total { font-weight: 700; white-space: nowrap; }

/* Status Badges */
.status-badge {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.76rem; font-weight: 600;
    padding: 5px 12px; border-radius: var(--radius-full);
    white-space: nowrap;
}
.status-badge .status-dot {
    width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0;
}

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

@keyframes pulse-dot {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(0.7); }
}

.order-action-btn {
    font-size: 0.78rem; font-weight: 500; color: var(--red);
    padding: 6px 14px; border-radius: var(--radius-full);
    border: 1px solid var(--red-light); background: var(--red-light);
    transition: all var(--duration) var(--ease);
    white-space: nowrap;
}
.order-action-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }

/* ── Empty State ──────────────────────────────────────────────── */
.empty-state {
    padding: 60px 24px; text-align: center;
    display: none;
}
.empty-state.visible { display: block; }
.empty-state-icon {
    width: 72px; height: 72px; margin: 0 auto 18px;
    border-radius: 50%; background: var(--cream);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem; color: var(--fg-muted);
}
.empty-state h3 { font-size: 1.05rem; font-weight: 600; color: var(--fg); margin-bottom: 6px; }
.empty-state p { font-size: 0.85rem; color: var(--fg-muted); max-width: 340px; margin: 0 auto 20px; }
.empty-state-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 24px; border-radius: var(--radius-full);
    background: var(--red); color: #fff; font-size: 0.85rem; font-weight: 600;
    transition: all var(--duration) var(--ease);
}
.empty-state-btn:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(201,59,57,0.3); }

/* ── Pagination ───────────────────────────────────────────────── */
.pagination {
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 24px;
    border-top: 1px solid var(--border-light);
}
.pagination-info { font-size: 0.8rem; color: var(--fg-muted); }
.pagination-info strong { color: var(--fg-secondary); font-weight: 600; }

.pagination-controls { display: flex; align-items: center; gap: 4px; }
.page-btn {
    min-width: 34px; height: 34px;
    display: flex; align-items: center; justify-content: center;
    border-radius: var(--radius-sm); font-size: 0.82rem; font-weight: 500;
    color: var(--fg-secondary); transition: all var(--duration) var(--ease);
}
.page-btn:hover { background: var(--cream); color: var(--fg); }
.page-btn.active { background: var(--red); color: #fff; font-weight: 700; }
.page-btn.disabled { opacity: 0.35; pointer-events: none; }
.page-btn.arrow { font-size: 0.72rem; }

/* ── Order Detail Modal ───────────────────────────────────────── */
.modal-overlay {
    position: fixed; inset: 0; z-index: 2000;
    background: rgba(42, 31, 33, 0.5);
    backdrop-filter: blur(6px);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; visibility: hidden;
    transition: all 0.3s var(--ease);
    padding: 24px;
}
.modal-overlay.visible { opacity: 1; visibility: visible; }

.modal {
    background: var(--card);
    border-radius: var(--radius-lg);
    width: 100%; max-width: 620px; max-height: 85vh;
    overflow: hidden; display: flex; flex-direction: column;
    box-shadow: var(--shadow-xl);
    transform: translateY(20px) scale(0.97);
    transition: transform 0.35s var(--ease);
}
.modal-overlay.visible .modal { transform: translateY(0) scale(1); }

.modal-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 24px; border-bottom: 1px solid var(--border-light);
    flex-shrink: 0;
}
.modal-header h3 { font-size: 1.05rem; font-weight: 700; color: var(--fg); }
.modal-close {
    width: 32px; height: 32px; border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--fg-muted); font-size: 0.9rem;
    transition: all var(--duration) var(--ease);
}
.modal-close:hover { background: var(--cream); color: var(--red); }

.modal-body { padding: 24px; overflow-y: auto; flex: 1; }

.modal-detail-row {
    display: flex; justify-content: space-between; align-items: flex-start;
    padding: 10px 0; border-bottom: 1px solid var(--border-light);
}
.modal-detail-row:last-child { border-bottom: none; }
.modal-detail-label { font-size: 0.8rem; color: var(--fg-muted); font-weight: 500; }
.modal-detail-value { font-size: 0.87rem; color: var(--fg); font-weight: 600; text-align: right; max-width: 60%; }

.modal-items-section { margin-top: 20px; }
.modal-items-section h4 {
    font-size: 0.82rem; font-weight: 600; color: var(--fg-secondary);
    text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 12px;
}
.modal-item {
    display: flex; align-items: center; gap: 14px;
    padding: 12px 0; border-bottom: 1px solid var(--border-light);
}
.modal-item:last-child { border-bottom: none; }
.modal-item-img {
    width: 52px; height: 52px; border-radius: var(--radius-sm);
    background: var(--cream); overflow: hidden; flex-shrink: 0;
    border: 1px solid var(--border-light);
}
.modal-item-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.modal-item-info { flex: 1; min-width: 0; }
.modal-item-name { font-size: 0.85rem; font-weight: 600; color: var(--fg); }
.modal-item-variant { font-size: 0.76rem; color: var(--fg-muted); }
.modal-item-qty { font-size: 0.78rem; color: var(--fg-muted); }
.modal-item-price { font-weight: 700; font-size: 0.87rem; color: var(--fg); white-space: nowrap; }

.modal-totals { margin-top: 16px; padding-top: 16px; border-top: 2px solid var(--border); }
.modal-total-row {
    display: flex; justify-content: space-between; padding: 4px 0;
    font-size: 0.84rem; color: var(--fg-secondary);
}
.modal-total-row.grand {
    font-size: 1rem; font-weight: 700; color: var(--fg);
    margin-top: 8px; padding-top: 10px; border-top: 1px solid var(--border-light);
}

.modal-footer {
    padding: 16px 24px; border-top: 1px solid var(--border-light);
    display: flex; align-items: center; justify-content: flex-end; gap: 10px;
    flex-shrink: 0;
}

/* ── Toast Notification ───────────────────────────────────────── */
.toast-container {
    position: fixed; bottom: 24px; right: 24px; z-index: 3000;
    display: flex; flex-direction: column; gap: 10px;
}
.toast {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-md); padding: 14px 20px;
    box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 12px;
    min-width: 280px; max-width: 400px;
    transform: translateX(120%); opacity: 0;
    transition: all 0.4s var(--ease);
}
.toast.visible { transform: translateX(0); opacity: 1; }
.toast-icon { font-size: 1.1rem; flex-shrink: 0; }
.toast-icon.success { color: #2D9B6E; }
.toast-icon.info { color: #6B5CE7; }
.toast-icon.warning { color: #D4942A; }
.toast-msg { font-size: 0.84rem; color: var(--fg); font-weight: 500; }

/* ── Footer ───────────────────────────────────────────────────── */
.main-footer {
    padding: 18px 28px; text-align: center;
    font-size: 0.78rem; color: var(--fg-muted);
    border-top: 1px solid var(--border-light);
}
.main-footer span { font-weight: 600; color: var(--fg-secondary); }

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1200px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
    .sidebar.collapsed { width: var(--sidebar-width) !important; }
    .sidebar.collapsed .sidebar-collapse-btn { display: none; }
    .sidebar.collapsed .nav-label,
    .sidebar.collapsed .logo-text,
    .sidebar.collapsed .nav-section-label { opacity: 1; width: auto; transform: none; height: auto; margin: 0; }
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
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .stat-card { padding: 16px 18px; }
    .stat-number { font-size: 1.5rem; }
    .stat-icon { width: 38px; height: 38px; font-size: 0.95rem; }
    .filter-bar { padding: 14px 16px; gap: 10px; }
    .filter-search { min-width: 140px; }
    .filter-divider { display: none; }
    .orders-panel-header { padding: 14px 16px; }
    .orders-table th, .orders-table td { padding: 12px 14px; font-size: 0.8rem; }
    .order-product { min-width: 180px; }
    .order-product-name { max-width: 130px; }
    .pagination { padding: 14px 16px; flex-direction: column; gap: 12px; }
    .modal { max-height: 90vh; }
    .modal-body { padding: 18px; }
}
@media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .filter-bar { flex-direction: column; align-items: stretch; }
    .filter-select { width: 100%; }
    .order-product-img { width: 36px; height: 36px; }
    .order-product { min-width: 150px; gap: 8px; }
    .order-product-name { max-width: 100px; }
    .hide-mobile { display: none !important; }
}

/* ── Focus & Scrollbar ────────────────────────────────────────── */
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
                <a href="/api/users/manage_orders.php" role="menuitem">My Orders</a>
                <a href="#" role="menuitem" class="active" aria-current="page">My Orders History</a>
                <a href="/api/users/manage_custom_orders.php" role="menuitem">My Custom Orders</a>
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
                <h2>My Order History</h2>
                <p>Track your orders and custom hat requests.</p>
            </div>
        </div>
        <div class="topbar-right">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" placeholder="Search for hats..." id="searchInput" aria-label="Search">
                <button class="search-btn" id="searchBtn" aria-label="Submit search">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
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

    <main class="main-content">
        <!-- ── Stats Cards ──────────────────────────────────────── -->
        <section class="stats-grid" aria-label="Order History Metrics">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-box"></i></div>
                <div class="stat-info">
                    <div class="stat-label">Total Orders</div>
                    <div class="stat-number" id="statTotal">24</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="stat-info">
                    <div class="stat-label">Delivered</div>
                    <div class="stat-number" id="statDelivered">18</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-truck"></i></div>
                <div class="stat-info">
                    <div class="stat-label">In Transit</div>
                    <div class="stat-number" id="statTransit">3</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-rotate-left"></i></div>
                <div class="stat-info">
                    <div class="stat-label">Returns</div>
                    <div class="stat-number" id="statReturns">1</div>
                </div>
            </div>
        </section>

        <!-- ── Filter Bar ───────────────────────────────────────── -->
        <div class="filter-bar">
            <label><i class="fa-solid fa-filter"></i> Filters</label>
            <select class="filter-select" id="filterStatus" aria-label="Filter by status">
                <option value="all">All Statuses</option>
                <option value="delivered">Delivered</option>
                <option value="in-transit">In Transit</option>
                <option value="processing">Processing</option>
                <option value="cancelled">Cancelled</option>
                <option value="returned">Returned</option>
            </select>
            <select class="filter-select" id="filterSort" aria-label="Sort by">
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
                <option value="highest">Highest Amount</option>
                <option value="lowest">Lowest Amount</option>
            </select>
            <div class="filter-divider"></div>
            <input type="text" class="filter-search" id="filterSearch" placeholder="Search order ID or product..." aria-label="Search orders">
            <button class="filter-btn secondary" id="filterResetBtn"><i class="fa-solid fa-rotate-left"></i> Reset</button>
        </div>

        <!-- ── Orders Table ─────────────────────────────────────── -->
        <div class="orders-panel">
            <div class="orders-panel-header">
                <h2>All Orders</h2>
                <span class="orders-count" id="ordersCount">Showing 10 orders</span>
            </div>

            <div class="orders-table-wrap">
                <table class="orders-table" id="ordersTable">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th class="hide-mobile">Qty</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="ordersBody">
                        <!-- Populated by JS -->
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div class="empty-state" id="emptyState">
                <div class="empty-state-icon"><i class="fa-solid fa-box-open"></i></div>
                <h3>No orders found</h3>
                <p>We couldn't find any orders matching your criteria. Try adjusting your filters or start shopping for hats.</p>
                <a href="#" class="empty-state-btn"><i class="fa-solid fa-shopping-bag"></i> Browse Hats</a>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <div class="pagination-info" id="paginationInfo">Showing <strong>1–10</strong> of <strong>24</strong> orders</div>
                <div class="pagination-controls" id="paginationControls">
                    <!-- Populated by JS -->
                </div>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ── Order Detail Modal ──────────────────────────────────────── -->
<div class="modal-overlay" id="orderModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-header">
            <h3 id="modalTitle">Order Details</h3>
            <button class="modal-close" id="modalClose" aria-label="Close modal"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body" id="modalBody">
            <!-- Populated by JS -->
        </div>
        <div class="modal-footer">
            <button class="filter-btn secondary" id="modalCloseBtn">Close</button>
            <button class="filter-btn primary" id="modalTrackBtn"><i class="fa-solid fa-truck"></i> Track Order</button>
        </div>
    </div>
</div>

<!-- ── Toast Container ─────────────────────────────────────────── -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   ORDER DATA — Replace with PHP/AJAX fetch in production
   ================================================================ */
const ordersData = [
    {
        id: "HH-10024", date: "2025-06-10", status: "in-transit",
        items: [
            { name: "Velvet Cloche Hat", variant: "Burgundy / Medium", qty: 1, price: 89.00, img: "https://picsum.photos/seed/hat-velvet/120/120.jpg" }
        ],
        subtotal: 89.00, shipping: 5.99, total: 94.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10023", date: "2025-06-08", status: "delivered",
        items: [
            { name: "Straw Boater Hat", variant: "Natural / Large", qty: 1, price: 65.00, img: "https://picsum.photos/seed/hat-boater/120/120.jpg" },
            { name: "Silk Ribbon Band", variant: "Navy Blue", qty: 2, price: 12.00, img: "https://picsum.photos/seed/ribbon-navy/120/120.jpg" }
        ],
        subtotal: 89.00, shipping: 0, total: 89.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "PayPal"
    },
    {
        id: "HH-10022", date: "2025-06-05", status: "delivered",
        items: [
            { name: "Felt Fedora", variant: "Charcoal / Small", qty: 1, price: 110.00, img: "https://picsum.photos/seed/hat-fedora/120/120.jpg" }
        ],
        subtotal: 110.00, shipping: 5.99, total: 115.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10021", date: "2025-06-01", status: "processing",
        items: [
            { name: "Wide-Brim Sun Hat", variant: "Ivory / Medium", qty: 1, price: 78.00, img: "https://picsum.photos/seed/hat-sun/120/120.jpg" },
            { name: "Crochet Flower Pin", variant: "Coral", qty: 1, price: 15.00, img: "https://picsum.photos/seed/pin-coral/120/120.jpg" }
        ],
        subtotal: 93.00, shipping: 5.99, total: 98.99,
        address: "15 Willow Walk, Bristol, BS1 4AB",
        payment: "Mastercard ending 7356"
    },
    {
        id: "HH-10020", date: "2025-05-28", status: "delivered",
        items: [
            { name: "Beret Classic", variant: "Black / One Size", qty: 2, price: 42.00, img: "https://picsum.photos/seed/hat-beret/120/120.jpg" }
        ],
        subtotal: 84.00, shipping: 0, total: 84.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Apple Pay"
    },
    {
        id: "HH-10019", date: "2025-05-25", status: "delivered",
        items: [
            { name: "Bucket Hat Linen", variant: "Sage Green / L", qty: 1, price: 55.00, img: "https://picsum.photos/seed/hat-bucket/120/120.jpg" }
        ],
        subtotal: 55.00, shipping: 5.99, total: 60.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10018", date: "2025-05-22", status: "returned",
        items: [
            { name: "Trilby Tweed Hat", variant: "Herringbone / M", qty: 1, price: 95.00, img: "https://picsum.photos/seed/hat-trilby/120/120.jpg" }
        ],
        subtotal: 95.00, shipping: 5.99, total: 100.99,
        address: "8 Cedar Court, Exeter, EX1 2GF",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10017", date: "2025-05-18", status: "delivered",
        items: [
            { name: "Pillbox Hat with Veil", variant: "Champagne / S", qty: 1, price: 120.00, img: "https://picsum.photos/seed/hat-pillbox/120/120.jpg" },
            { name: "Feather Fascinator", variant: "Ostrich White", qty: 1, price: 35.00, img: "https://picsum.photos/seed/fascinator/120/120.jpg" }
        ],
        subtotal: 155.00, shipping: 0, total: 155.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "PayPal"
    },
    {
        id: "HH-10016", date: "2025-05-14", status: "cancelled",
        items: [
            { name: "Cowboy Hat Leather", variant: "Tan / L", qty: 1, price: 145.00, img: "https://picsum.photos/seed/hat-cowboy/120/120.jpg" }
        ],
        subtotal: 145.00, shipping: 5.99, total: 150.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10015", date: "2025-05-10", status: "delivered",
        items: [
            { name: "Cloche Wool Blend", variant: "Plum / M", qty: 1, price: 72.00, img: "https://picsum.photos/seed/hat-wool/120/120.jpg" }
        ],
        subtotal: 72.00, shipping: 5.99, total: 77.99,
        address: "3 Oakfield Road, Taunton, TA1 4BJ",
        payment: "Mastercard ending 7356"
    },
    {
        id: "HH-10014", date: "2025-05-06", status: "delivered",
        items: [
            { name: "Panama Hat Classic", variant: "Ecru / M", qty: 1, price: 88.00, img: "https://picsum.photos/seed/hat-panama/120/120.jpg" },
            { name: "Hat Box Storage", variant: "Large", qty: 1, price: 22.00, img: "https://picsum.photos/seed/hatbox/120/120.jpg" }
        ],
        subtotal: 110.00, shipping: 0, total: 110.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10013", date: "2025-05-02", status: "delivered",
        items: [
            { name: "Turban Wrap", variant: "Emerald / OS", qty: 1, price: 38.00, img: "https://picsum.photos/seed/hat-turban/120/120.jpg" }
        ],
        subtotal: 38.00, shipping: 5.99, total: 43.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Apple Pay"
    },
    {
        id: "HH-10012", date: "2025-04-28", status: "in-transit",
        items: [
            { name: "Newsboy Cap Corduroy", variant: "Rust / L", qty: 1, price: 52.00, img: "https://picsum.photos/seed/hat-newsboy/120/120.jpg" },
            { name: "Leather Hat Band", variant: "Brown", qty: 1, price: 18.00, img: "https://picsum.photos/seed/band-leather/120/120.jpg" }
        ],
        subtotal: 70.00, shipping: 5.99, total: 75.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10011", date: "2025-04-24", status: "delivered",
        items: [
            { name: "Floppy Sun Hat", variant: "Sand / L", qty: 1, price: 68.00, img: "https://picsum.photos/seed/hat-floppy/120/120.jpg" }
        ],
        subtotal: 68.00, shipping: 0, total: 68.00,
        address: "19 Birch Grove, Plymouth, PL4 6ER",
        payment: "PayPal"
    },
    {
        id: "HH-10010", date: "2025-04-20", status: "delivered",
        items: [
            { name: "Top Hat Satin", variant: "Black / M", qty: 1, price: 135.00, img: "https://picsum.photos/seed/hat-tophat/120/120.jpg" }
        ],
        subtotal: 135.00, shipping: 5.99, total: 140.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10009", date: "2025-04-16", status: "delivered",
        items: [
            { name: "Baseball Cap Embroidered", variant: "Cream / OS", qty: 3, price: 28.00, img: "https://picsum.photos/seed/hat-baseball/120/120.jpg" }
        ],
        subtotal: 84.00, shipping: 0, total: 84.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Apple Pay"
    },
    {
        id: "HH-10008", date: "2025-04-12", status: "delivered",
        items: [
            { name: "Sinamay Fascinator", variant: "Blush / OS", qty: 1, price: 48.00, img: "https://picsum.photos/seed/hat-sinamay/120/120.jpg" }
        ],
        subtotal: 48.00, shipping: 5.99, total: 53.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10007", date: "2025-04-08", status: "delivered",
        items: [
            { name: "Flat Cap Herringbone", variant: "Grey / L", qty: 1, price: 62.00, img: "https://picsum.photos/seed/hat-flatcap/120/120.jpg" }
        ],
        subtotal: 62.00, shipping: 5.99, total: 67.99,
        address: "7 Elm Street, Cardiff, CF10 1EP",
        payment: "Mastercard ending 7356"
    },
    {
        id: "HH-10006", date: "2025-04-04", status: "delivered",
        items: [
            { name: "Tam O'Shanter", variant: "Green Tartan / M", qty: 1, price: 75.00, img: "https://picsum.photos/seed/hat-tam/120/120.jpg" }
        ],
        subtotal: 75.00, shipping: 5.99, total: 80.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10005", date: "2025-03-30", status: "delivered",
        items: [
            { name: "Picot Hat Straw", variant: "Natural / S", qty: 1, price: 58.00, img: "https://picsum.photos/seed/hat-picot/120/120.jpg" },
            { name: "Satin Pouch", variant: "Dusty Rose", qty: 1, price: 14.00, img: "https://picsum.photos/seed/pouch-rose/120/120.jpg" }
        ],
        subtotal: 72.00, shipping: 0, total: 72.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "PayPal"
    },
    {
        id: "HH-10004", date: "2025-03-26", status: "delivered",
        items: [
            { name: "Bowler Hat Felt", variant: "Dark Brown / M", qty: 1, price: 98.00, img: "https://picsum.photos/seed/hat-bowler/120/120.jpg" }
        ],
        subtotal: 98.00, shipping: 5.99, total: 103.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10003", date: "2025-03-22", status: "delivered",
        items: [
            { name: "Visor Sport", variant: "White / OS", qty: 2, price: 22.00, img: "https://picsum.photos/seed/hat-visor/120/120.jpg" }
        ],
        subtotal: 44.00, shipping: 0, total: 44.00,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Apple Pay"
    },
    {
        id: "HH-10002", date: "2025-03-18", status: "delivered",
        items: [
            { name: "Cartwheel Hat", variant: "Navy / M", qty: 1, price: 115.00, img: "https://picsum.photos/seed/hat-cartwheel/120/120.jpg" }
        ],
        subtotal: 115.00, shipping: 5.99, total: 120.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    },
    {
        id: "HH-10001", date: "2025-03-14", status: "in-transit",
        items: [
            { name: "Kettle Brim Hat", variant: "Camel / L", qty: 1, price: 82.00, img: "https://picsum.photos/seed/hat-kettle/120/120.jpg" }
        ],
        subtotal: 82.00, shipping: 5.99, total: 87.99,
        address: "42 Rosemary Lane, Bath, BA1 3QR",
        payment: "Visa ending 4821"
    }
];

/* ================================================================
   STATE
   ================================================================ */
let filteredOrders = [...ordersData];
let currentPage = 1;
const perPage = 10;

/* ================================================================
   DOM REFS
   ================================================================ */
const ordersBody = document.getElementById('ordersBody');
const ordersCount = document.getElementById('ordersCount');
const emptyState = document.getElementById('emptyState');
const paginationInfo = document.getElementById('paginationInfo');
const paginationControls = document.getElementById('paginationControls');
const pagination = document.getElementById('pagination');
const filterStatus = document.getElementById('filterStatus');
const filterSort = document.getElementById('filterSort');
const filterSearch = document.getElementById('filterSearch');
const filterResetBtn = document.getElementById('filterResetBtn');
const orderModal = document.getElementById('orderModal');
const modalBody = document.getElementById('modalBody');
const modalClose = document.getElementById('modalClose');
const modalCloseBtn = document.getElementById('modalCloseBtn');
const modalTrackBtn = document.getElementById('modalTrackBtn');
const toastContainer = document.getElementById('toastContainer');

/* ================================================================
   HELPERS
   ================================================================ */
function formatDate(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}

function formatCurrency(amount) {
    return '\u00A3' + amount.toFixed(2);
}

function getStatusLabel(status) {
    const map = {
        'delivered': 'Delivered',
        'in-transit': 'In Transit',
        'processing': 'Processing',
        'cancelled': 'Cancelled',
        'returned': 'Returned'
    };
    return map[status] || status;
}

function getStatusClass(status) {
    return 'status-' + status;
}

function getFirstItem(order) {
    return order.items[0];
}

function getTotalQty(order) {
    return order.items.reduce((sum, item) => sum + item.qty, 0);
}

/* ================================================================
   RENDER TABLE
   ================================================================ */
function renderOrders() {
    const start = (currentPage - 1) * perPage;
    const pageOrders = filteredOrders.slice(start, start + perPage);
    const total = filteredOrders.length;

    /* Update count badge */
    ordersCount.textContent = total === 0
        ? 'No orders found'
        : 'Showing ' + total + ' order' + (total !== 1 ? 's' : '');

    /* Toggle empty state */
    const tableEl = document.getElementById('ordersTable');
    if (total === 0) {
        tableEl.style.display = 'none';
        pagination.style.display = 'none';
        emptyState.classList.add('visible');
        return;
    } else {
        tableEl.style.display = '';
        pagination.style.display = '';
        emptyState.classList.remove('visible');
    }

    /* Build rows */
    ordersBody.innerHTML = pageOrders.map(order => {
        const item = getFirstItem(order);
        const extraCount = order.items.length > 1 ? ' +' + (order.items.length - 1) + ' more' : '';
        return `
            <tr>
                <td><span class="order-id" data-order-id="${order.id}">${order.id}</span></td>
                <td>
                    <div class="order-product">
                        <div class="order-product-img">
                            <img src="${item.img}" alt="${item.name}" loading="lazy">
                        </div>
                        <div class="order-product-info">
                            <div class="order-product-name" title="${item.name}">${item.name}${extraCount}</div>
                            <div class="order-product-variant">${item.variant}</div>
                        </div>
                    </div>
                </td>
                <td><span class="order-date">${formatDate(order.date)}</span></td>
                <td class="hide-mobile"><span class="order-qty">${getTotalQty(order)}</span></td>
                <td><span class="order-total">${formatCurrency(order.total)}</span></td>
                <td>
                    <span class="status-badge ${getStatusClass(order.status)}">
                        <span class="status-dot"></span>
                        ${getStatusLabel(order.status)}
                    </span>
                </td>
                <td>
                    <button class="order-action-btn" data-order-id="${order.id}">View</button>
                </td>
            </tr>
        `;
    }).join('');

    /* Pagination info */
    const end = Math.min(start + perPage, total);
    paginationInfo.innerHTML = 'Showing <strong>' + (start + 1) + '\u2013' + end + '</strong> of <strong>' + total + '</strong> orders';

    renderPagination();
}

/* ================================================================
   RENDER PAGINATION
   ================================================================ */
function renderPagination() {
    const totalPages = Math.ceil(filteredOrders.length / perPage);
    if (totalPages <= 1) {
        paginationControls.innerHTML = '';
        return;
    }

    let html = '';
    /* Prev */
    html += '<button class="page-btn arrow' + (currentPage === 1 ? ' disabled' : '') + '" data-page="prev" aria-label="Previous page"><i class="fa-solid fa-chevron-left"></i></button>';

    /* Page numbers */
    const maxVisible = 5;
    let startPage = Math.max(1, currentPage - Math.floor(maxVisible / 2));
    let endPage = Math.min(totalPages, startPage + maxVisible - 1);
    if (endPage - startPage < maxVisible - 1) {
        startPage = Math.max(1, endPage - maxVisible + 1);
    }

    if (startPage > 1) {
        html += '<button class="page-btn" data-page="1">1</button>';
        if (startPage > 2) html += '<span style="padding:0 4px;color:var(--fg-muted);font-size:0.8rem;">...</span>';
    }

    for (let i = startPage; i <= endPage; i++) {
        html += '<button class="page-btn' + (i === currentPage ? ' active' : '') + '" data-page="' + i + '">' + i + '</button>';
    }

    if (endPage < totalPages) {
        if (endPage < totalPages - 1) html += '<span style="padding:0 4px;color:var(--fg-muted);font-size:0.8rem;">...</span>';
        html += '<button class="page-btn" data-page="' + totalPages + '">' + totalPages + '</button>';
    }

    /* Next */
    html += '<button class="page-btn arrow' + (currentPage === totalPages ? ' disabled' : '') + '" data-page="next" aria-label="Next page"><i class="fa-solid fa-chevron-right"></i></button>';

    paginationControls.innerHTML = html;
}

/* ================================================================
   FILTERING & SORTING
   ================================================================ */
function applyFilters() {
    const status = filterStatus.value;
    const sort = filterSort.value;
    const search = filterSearch.value.trim().toLowerCase();

    filteredOrders = ordersData.filter(order => {
        /* Status filter */
        if (status !== 'all' && order.status !== status) return false;

        /* Search filter */
        if (search) {
            const matchId = order.id.toLowerCase().includes(search);
            const matchProduct = order.items.some(item =>
                item.name.toLowerCase().includes(search) ||
                item.variant.toLowerCase().includes(search)
            );
            if (!matchId && !matchProduct) return false;
        }

        return true;
    });

    /* Sort */
    filteredOrders.sort((a, b) => {
        switch (sort) {
            case 'newest': return new Date(b.date) - new Date(a.date);
            case 'oldest': return new Date(a.date) - new Date(b.date);
            case 'highest': return b.total - a.total;
            case 'lowest': return a.total - b.total;
            default: return 0;
        }
    });

    currentPage = 1;
    renderOrders();
}

filterStatus.addEventListener('change', applyFilters);
filterSort.addEventListener('change', applyFilters);
filterSearch.addEventListener('input', applyFilters);
filterResetBtn.addEventListener('click', () => {
    filterStatus.value = 'all';
    filterSort.value = 'newest';
    filterSearch.value = '';
    applyFilters();
    showToast('Filters cleared', 'info');
});

/* ================================================================
   PAGINATION CLICK
   ================================================================ */
paginationControls.addEventListener('click', (e) => {
    const btn = e.target.closest('.page-btn');
    if (!btn || btn.classList.contains('disabled')) return;

    const page = btn.dataset.page;
    const totalPages = Math.ceil(filteredOrders.length / perPage);

    if (page === 'prev') {
        currentPage = Math.max(1, currentPage - 1);
    } else if (page === 'next') {
        currentPage = Math.min(totalPages, currentPage + 1);
    } else {
        currentPage = parseInt(page, 10);
    }

    renderOrders();
    /* Scroll to top of table */
    document.querySelector('.orders-panel').scrollIntoView({ behavior: 'smooth', block: 'start' });
});

/* ================================================================
   ORDER DETAIL MODAL
   ================================================================ */
function openModal(orderId) {
    const order = ordersData.find(o => o.id === orderId);
    if (!order) return;

    const itemsHtml = order.items.map(item => `
        <div class="modal-item">
            <div class="modal-item-img"><img src="${item.img}" alt="${item.name}" loading="lazy"></div>
            <div class="modal-item-info">
                <div class="modal-item-name">${item.name}</div>
                <div class="modal-item-variant">${item.variant}</div>
                <div class="modal-item-qty">Qty: ${item.qty}</div>
            </div>
            <div class="modal-item-price">${formatCurrency(item.price * item.qty)}</div>
        </div>
    `).join('');

    modalBody.innerHTML = `
        <div class="modal-detail-row">
            <span class="modal-detail-label">Order ID</span>
            <span class="modal-detail-value">${order.id}</span>
        </div>
        <div class="modal-detail-row">
            <span class="modal-detail-label">Order Date</span>
            <span class="modal-detail-value">${formatDate(order.date)}</span>
        </div>
        <div class="modal-detail-row">
            <span class="modal-detail-label">Status</span>
            <span class="modal-detail-value"><span class="status-badge ${getStatusClass(order.status)}"><span class="status-dot"></span>${getStatusLabel(order.status)}</span></span>
        </div>
        <div class="modal-detail-row">
            <span class="modal-detail-label">Shipping Address</span>
            <span class="modal-detail-value">${order.address}</span>
        </div>
        <div class="modal-detail-row">
            <span class="modal-detail-label">Payment Method</span>
            <span class="modal-detail-value">${order.payment}</span>
        </div>

        <div class="modal-items-section">
            <h4>Items</h4>
            ${itemsHtml}
        </div>

        <div class="modal-totals">
            <div class="modal-total-row">
                <span>Subtotal</span>
                <span>${formatCurrency(order.subtotal)}</span>
            </div>
            <div class="modal-total-row">
                <span>Shipping</span>
                <span>${order.shipping === 0 ? 'Free' : formatCurrency(order.shipping)}</span>
            </div>
            <div class="modal-total-row grand">
                <span>Total</span>
                <span>${formatCurrency(order.total)}</span>
            </div>
        </div>
    `;

    /* Store current order ID for track button */
    modalTrackBtn.dataset.orderId = order.id;
    modalTrackBtn.dataset.status = order.status;

    orderModal.classList.add('visible');
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    orderModal.classList.remove('visible');
    document.body.style.overflow = '';
}

/* Click on order ID or View button */
ordersBody.addEventListener('click', (e) => {
    const idEl = e.target.closest('[data-order-id]');
    if (idEl) openModal(idEl.dataset.orderId);
});

modalClose.addEventListener('click', closeModal);
modalCloseBtn.addEventListener('click', closeModal);
orderModal.addEventListener('click', (e) => {
    if (e.target === orderModal) closeModal();
});

modalTrackBtn.addEventListener('click', () => {
    const status = modalTrackBtn.dataset.status;
    if (status === 'delivered') {
        showToast('This order has already been delivered.', 'success');
    } else if (status === 'cancelled') {
        showToast('This order was cancelled.', 'warning');
    } else if (status === 'returned') {
        showToast('This order has been returned.', 'warning');
    } else {
        showToast('Tracking your order ' + modalTrackBtn.dataset.orderId + '...', 'info');
    }
    closeModal();
});

/* Escape key */
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && orderModal.classList.contains('visible')) closeModal();
});

/* ================================================================
   TOAST NOTIFICATIONS
   ================================================================ */
function showToast(message, type) {
    type = type || 'info';
    const iconMap = {
        success: 'fa-solid fa-circle-check',
        info: 'fa-solid fa-circle-info',
        warning: 'fa-solid fa-triangle-exclamation'
    };

    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = '<i class="toast-icon ' + type + ' ' + iconMap[type] + '"></i><span class="toast-msg">' + message + '</span>';
    toastContainer.appendChild(toast);

    /* Trigger animation */
    requestAnimationFrame(() => {
        requestAnimationFrame(() => toast.classList.add('visible'));
    });

    /* Auto dismiss */
    setTimeout(() => {
        toast.classList.remove('visible');
        setTimeout(() => toast.remove(), 400);
    }, 3500);
}

/* ================================================================
   SIDEBAR — Collapse, Mobile Toggle, Dropdowns
   ================================================================ */
const sidebar = document.getElementById('sidebar');
const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
const mobileToggle = document.getElementById('mobileToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');

/* Collapse toggle */
if (sidebarCollapseBtn && sidebar) {
    sidebarCollapseBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        const icon = sidebarCollapseBtn.querySelector('i');
        icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
        icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
    });
}

/* Mobile toggle */
if (mobileToggle) {
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('visible');
    });
    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    });
}

/* Dropdown menus */
document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
    const trigger = item.querySelector('.nav-link');
    const menu = item.querySelector('.dropdown-menu');

    trigger.addEventListener('click', () => {
        const expanded = trigger.getAttribute('aria-expanded') === 'true';
        /* Close all others */
        document.querySelectorAll('.nav-item[data-dropdown]').forEach(other => {
            if (other !== item) {
                other.querySelector('.nav-link').setAttribute('aria-expanded', 'false');
                other.querySelector('.dropdown-menu').classList.remove('open');
            }
        });
        trigger.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('open');
    });

    trigger.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            trigger.click();
        }
    });
});

/* ================================================================
   TOPBAR SEARCH — redirect to shop search
   ================================================================ */
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');

if (searchBtn && searchInput) {
    searchBtn.addEventListener('click', () => {
        const q = searchInput.value.trim();
        if (q) {
            window.location.href = '/shop?search=' + encodeURIComponent(q);
        }
    });
    searchInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') searchBtn.click();
    });
}

/* ================================================================
   NOTIFICATION BELL — placeholder
   ================================================================ */
const notifToggle = document.getElementById('notifToggle');
if (notifToggle) {
    notifToggle.addEventListener('click', () => {
        showToast('You have no new notifications.', 'info');
    });
}

/* ================================================================
   INIT
   ================================================================ */
applyFilters();
</script>
</body>
</html>