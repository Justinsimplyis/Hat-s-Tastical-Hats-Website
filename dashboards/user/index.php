<?php
// You can fetch user data here later
// Example: $user = $_SESSION['user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hattie's Hat'istical Hats | My Dashboard</title>
    <link rel="stylesheet" href="/assets/css/users/users.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — User Dashboard
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
html { font-size: 15px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
body { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--fg); line-height: 1.6; overflow-x: hidden; }
a { color: inherit; text-decoration: none; }
button { font: inherit; border: none; background: none; cursor: pointer; color: inherit; }
input, select { font: inherit; border: none; outline: none; background: none; }
table { border-collapse: collapse; width: 100%; }

/* ================================================================
   SIDEBAR
   ================================================================ */
.sidebar {
    position: fixed; top: 0; left: 0; bottom: 0;
    width: var(--sidebar-width); background: var(--sidebar-bg);
    display: flex; flex-direction: column; z-index: 1000;
    transition: width 0.3s var(--ease), transform 0.35s var(--ease);
    overflow: hidden; box-shadow: var(--shadow-sm);
}
.sidebar-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 20px 16px 12px; flex-shrink: 0;
    border-bottom: 1px solid var(--border-light);
}
.sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }
.logo-mark {
    width: 40px; height: 40px; border-radius: var(--radius-md);
    background: linear-gradient(135deg, var(--red), var(--pink));
    color: #fff; font-size: 1.15rem; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; letter-spacing: -0.02em;
}
.logo-text { display: flex; flex-direction: column; white-space: nowrap; transition: opacity 0.2s var(--ease), transform 0.2s var(--ease); }
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
    font-size: 0.65rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.12em;
    color: var(--fg-muted); padding: 0 12px; margin-bottom: 10px;
    white-space: nowrap; overflow: hidden; transition: opacity 0.2s var(--ease);
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
    transition: transform 0.25s var(--ease); flex-shrink: 0;
}
.nav-link[aria-expanded="true"] .dropdown-icon { transform: rotate(180deg); }
.dropdown-menu {
    max-height: 0; overflow: hidden;
    transition: max-height 0.3s var(--ease); padding-left: 20px;
}
.dropdown-menu.open { max-height: 400px; }
.dropdown-menu a {
    display: flex; align-items: center; gap: 8px;
    padding: 8px 12px 8px 32px; font-size: 0.82rem; font-weight: 500;
    color: var(--sidebar-text); border-radius: var(--radius-sm);
    transition: all var(--duration) var(--ease); position: relative;
}
.dropdown-menu a::before {
    content: ''; width: 5px; height: 5px; border-radius: 50%;
    background: var(--cream-deeper); flex-shrink: 0;
    transition: background var(--duration) var(--ease);
}
.dropdown-menu a:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.dropdown-menu a:hover::before { background: var(--red); }
.dropdown-menu a.active { color: var(--sidebar-text-active); font-weight: 600; }
.dropdown-menu a.active::before { background: var(--red); }

/* ── Sidebar Tooltip (collapsed) ──────────────────────────────── */
.sidebar.collapsed .nav-link[data-tooltip]::after,
.sidebar.collapsed .logout-link[data-tooltip]::after {
    content: attr(data-tooltip); position: absolute; left: calc(100% + 12px); top: 50%;
    transform: translateY(-50%); background: var(--card); color: var(--fg);
    padding: 6px 14px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 500;
    white-space: nowrap; box-shadow: var(--shadow-lg); border: 1px solid var(--border);
    opacity: 0; visibility: hidden; transition: opacity 0.15s var(--ease), visibility 0.15s var(--ease);
    pointer-events: none; z-index: 10;
}
.sidebar.collapsed .nav-link[data-tooltip]:hover::after,
.sidebar.collapsed .logout-link[data-tooltip]:hover::after { opacity: 1; visibility: visible; }

/* ── Sidebar Footer / Logout ──────────────────────────────────── */
.sidebar-footer { padding: 12px; border-top: 1px solid var(--border-light); flex-shrink: 0; }
.logout-link {
    display: flex; align-items: center; gap: 12px; padding: 10px 12px;
    border-radius: var(--radius-sm); color: var(--red); font-size: 0.88rem; font-weight: 500;
    transition: all var(--duration) var(--ease); position: relative; white-space: nowrap; overflow: hidden;
}
.logout-link:hover { background: var(--cream); color: var(--red-hover); }

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
.sidebar.collapsed .logout-link { justify-content: center; padding: 10px; gap: 0; }
.sidebar.collapsed .logout-link .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
.sidebar.collapsed .sidebar-nav { padding: 16px 10px; }
.sidebar.collapsed .nav-link.active::before { left: -10px; }
.sidebar-overlay {
    position: fixed; inset: 0; background: rgba(42, 31, 33, 0.4);
    backdrop-filter: blur(4px); z-index: 999;
    opacity: 0; visibility: hidden; transition: all 0.3s var(--ease);
}
.sidebar-overlay.visible { opacity: 1; visibility: visible; }

/* ================================================================
   MAIN WRAPPER & TOPBAR
   ================================================================ */
.main-wrapper {
    margin-left: var(--sidebar-width); min-height: 100vh;
    display: flex; flex-direction: column; transition: margin-left 0.3s var(--ease);
}
body:has(.sidebar.collapsed) .main-wrapper { margin-left: var(--sidebar-collapsed-width); }
.topbar {
    position: sticky; top: 0; z-index: 100; height: var(--topbar-height);
    background: var(--topbar-bg); border-bottom: 1px solid var(--border-light);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 28px; box-shadow: var(--shadow-sm);
}
.topbar-left { display: flex; align-items: center; gap: 16px; }
.mobile-toggle {
    display: none; width: 38px; height: 38px; border-radius: var(--radius-sm);
    color: var(--fg-secondary); font-size: 1.1rem;
    transition: all var(--duration) var(--ease);
}
.mobile-toggle:hover { background: var(--cream); color: var(--fg); }
.topbar-greeting h2 { font-size: 1.15rem; font-weight: 600; color: var(--fg); line-height: 1.3; }
.topbar-greeting p { font-size: 0.8rem; color: var(--fg-muted); }
.topbar-right { display: flex; align-items: center; gap: 10px; }
.search-box {
    display: flex; align-items: center; background: var(--cream);
    border: 1px solid var(--border-light); border-radius: var(--radius-full);
    padding: 0 4px 0 14px; height: 38px;
    transition: all var(--duration) var(--ease); width: 220px;
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
    position: relative; width: 38px; height: 38px; border-radius: var(--radius-sm);
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
   MAIN CONTENT — DASHBOARD
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Welcome Banner ───────────────────────────────────────────── */
.welcome-banner {
    background: linear-gradient(135deg, var(--red) 0%, #e06a68 50%, var(--pink) 100%);
    border-radius: var(--radius-lg); padding: 32px 36px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; margin-bottom: 28px; position: relative; overflow: hidden;
    box-shadow: 0 8px 24px rgba(201, 59, 57, 0.20);
}
.welcome-banner::before {
    content: ''; position: absolute; top: -40px; right: -20px;
    width: 180px; height: 180px; border-radius: 50%;
    background: rgba(255,255,255,0.08); pointer-events: none;
}
.welcome-banner::after {
    content: ''; position: absolute; bottom: -60px; right: 80px;
    width: 120px; height: 120px; border-radius: 50%;
    background: rgba(255,255,255,0.06); pointer-events: none;
}
.welcome-text { position: relative; z-index: 1; }
.welcome-text h1 {
    font-size: 1.5rem; font-weight: 800; color: #fff;
    margin-bottom: 6px; letter-spacing: -0.02em;
}
.welcome-text p { font-size: 0.92rem; color: rgba(255,255,255,0.85); max-width: 480px; line-height: 1.5; }
.welcome-actions { display: flex; gap: 10px; margin-top: 18px; flex-wrap: wrap; position: relative; z-index: 1; }

.btn-welcome {
    height: 40px; padding: 0 20px; border-radius: var(--radius-sm);
    font-size: 0.84rem; font-weight: 600;
    display: inline-flex; align-items: center; gap: 8px;
    transition: all var(--duration) var(--ease); white-space: nowrap;
}
.btn-welcome.white { background: #fff; color: var(--red); }
.btn-welcome.white:hover { background: var(--cream); transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
.btn-welcome.ghost { background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.3); }
.btn-welcome.ghost:hover { background: rgba(255,255,255,0.25); }

.welcome-illustration {
    position: relative; z-index: 1; flex-shrink: 0;
    font-size: 4.5rem; color: rgba(255,255,255,0.2);
    line-height: 1;
}

/* ── Stats Grid ───────────────────────────────────────────────── */
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 20px; margin-bottom: 28px;
}
.stat-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); padding: 22px 24px;
    display: flex; align-items: flex-start; justify-content: space-between;
    box-shadow: var(--shadow-sm); transition: all 0.3s var(--ease);
    position: relative; overflow: hidden; cursor: default;
}
.stat-card::after {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 3px; border-radius: var(--radius-lg) var(--radius-lg) 0 0;
    opacity: 0; transition: opacity 0.3s var(--ease);
}
.stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); border-color: var(--border); }
.stat-card:hover::after { opacity: 1; }
.stat-card.orders::after { background: var(--red); }
.stat-card.requests::after { background: #6B5CE7; }
.stat-card.points::after { background: #D4942A; }
.stat-card.wishlist::after { background: var(--pink); }

.stat-info h3 {
    font-size: 0.75rem; font-weight: 500; color: var(--fg-muted);
    text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 6px;
}
.stat-number {
    font-size: 1.9rem; font-weight: 700; color: var(--fg);
    line-height: 1.2; margin-bottom: 6px;
}
.stat-change {
    font-size: 0.74rem; font-weight: 500;
    display: inline-flex; align-items: center; gap: 3px;
    padding: 2px 8px; border-radius: var(--radius-full);
}
.stat-change.up { color: #2D9B6E; background: rgba(45,155,110,0.10); }
.stat-change.down { color: #E07070; background: rgba(224,112,112,0.10); }
.stat-change.neutral { color: var(--fg-muted); background: var(--cream); }

.stat-icon {
    width: 46px; height: 46px; border-radius: var(--radius-md);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0;
}
.stat-card.orders .stat-icon { background: var(--red-light); color: var(--red); }
.stat-card.requests .stat-icon { background: rgba(107,92,231,0.10); color: #6B5CE7; }
.stat-card.points .stat-icon { background: rgba(212,148,42,0.10); color: #D4942A; }
.stat-card.wishlist .stat-icon { background: var(--pink-light); color: var(--pink); }

/* ── Content Grid ─────────────────────────────────────────────── */
.content-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 24px; margin-bottom: 28px; }
.panel {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden;
}
.panel-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 24px; border-bottom: 1px solid var(--border-light);
}
.panel-header h2 { font-size: 1rem; font-weight: 600; color: var(--fg); }
.view-all {
    font-size: 0.8rem; font-weight: 500; color: var(--red);
    display: flex; align-items: center; gap: 5px;
    transition: all var(--duration) var(--ease);
}
.view-all i { font-size: 0.7rem; transition: transform var(--duration) var(--ease); }
.view-all:hover { color: var(--red-hover); }
.view-all:hover i { transform: translateX(3px); }
.panel-body { padding: 0; max-height: 380px; overflow-y: auto; }
.panel-body::-webkit-scrollbar { width: 4px; }
.panel-body::-webkit-scrollbar-track { background: transparent; }
.panel-body::-webkit-scrollbar-thumb { background: var(--cream-deeper); border-radius: 4px; }

/* ── Data Tables ──────────────────────────────────────────────── */
.data-table thead { position: sticky; top: 0; z-index: 2; }
.data-table th {
    padding: 12px 24px; font-size: 0.7rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: 0.06em;
    color: var(--fg-muted); background: var(--cream);
    text-align: left; border-bottom: 1px solid var(--border-light);
    white-space: nowrap;
}
.data-table td {
    padding: 14px 24px; font-size: 0.87rem; color: var(--fg);
    border-bottom: 1px solid var(--border-light); vertical-align: middle;
}
.data-table tbody tr { transition: background var(--duration) var(--ease); }
.data-table tbody tr:hover { background: var(--cream); }
.data-table tbody tr:last-child td { border-bottom: none; }

.table-order-id {
    font-weight: 600; color: var(--red); font-size: 0.84rem;
    cursor: pointer; transition: color var(--duration) var(--ease);
}
.table-order-id:hover { color: var(--red-hover); text-decoration: underline; }

.table-date { white-space: nowrap; color: var(--fg-secondary); font-size: 0.84rem; }
.table-total { font-weight: 700; white-space: nowrap; }

/* Status Badges */
.status-badge {
    display: inline-flex; align-items: center; gap: 6px;
    font-size: 0.76rem; font-weight: 600; padding: 4px 11px;
    border-radius: var(--radius-full); white-space: nowrap;
}
.status-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.status-delivered { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.status-delivered .status-dot { background: #2D9B6E; }
.status-in-transit { background: rgba(212,148,42,0.10); color: #D4942A; }
.status-in-transit .status-dot { background: #D4942A; animation: pulse-dot 1.5s infinite; }
.status-processing { background: rgba(107,92,231,0.10); color: #6B5CE7; }
.status-processing .status-dot { background: #6B5CE7; animation: pulse-dot 1.5s infinite; }
@keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.7)} }

.table-action-btn {
    font-size: 0.78rem; font-weight: 500; color: var(--red);
    padding: 5px 14px; border-radius: var(--radius-full);
    border: 1px solid var(--red-light); background: var(--red-light);
    transition: all var(--duration) var(--ease); white-space: nowrap;
}
.table-action-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }

/* Custom request stages */
.stage-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 0.76rem; font-weight: 600; padding: 4px 11px;
    border-radius: var(--radius-full); white-space: nowrap;
}
.stage-design { background: rgba(107,92,231,0.10); color: #6B5CE7; }
.stage-creation { background: rgba(212,148,42,0.10); color: #D4942A; }
.stage-review { background: rgba(201,59,57,0.10); color: var(--red); }
.stage-complete { background: rgba(45,155,110,0.10); color: #2D9B6E; }

/* ── Empty Table State ────────────────────────────────────────── */
.table-empty {
    padding: 40px 24px; text-align: center;
}
.table-empty i { font-size: 2rem; color: var(--cream-deeper); margin-bottom: 10px; display: block; }
.table-empty p { font-size: 0.85rem; color: var(--fg-muted); margin-bottom: 14px; }
.table-empty-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 18px; border-radius: var(--radius-full);
    background: var(--red); color: #fff; font-size: 0.82rem; font-weight: 600;
    transition: all var(--duration) var(--ease);
}
.table-empty-btn:hover { background: var(--red-hover); transform: translateY(-1px); }

/* ── Quick Actions Grid ───────────────────────────────────────── */
.quick-actions-grid {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;
}
.quick-action-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); padding: 22px 20px;
    text-align: center; box-shadow: var(--shadow-sm);
    transition: all 0.25s var(--ease); cursor: pointer;
    display: flex; flex-direction: column; align-items: center; gap: 12px;
}
.quick-action-card:hover {
    transform: translateY(-3px); box-shadow: var(--shadow-md);
    border-color: var(--cream-deeper);
}
.quick-action-icon {
    width: 50px; height: 50px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; transition: all 0.25s var(--ease);
}
.quick-action-card:nth-child(1) .quick-action-icon { background: var(--red-light); color: var(--red); }
.quick-action-card:nth-child(2) .quick-action-icon { background: var(--pink-light); color: var(--pink); }
.quick-action-card:nth-child(3) .quick-action-icon { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.quick-action-card:nth-child(4) .quick-action-icon { background: rgba(212,148,42,0.10); color: #D4942A; }
.quick-action-card:hover .quick-action-icon { transform: scale(1.1); }
.quick-action-label { font-size: 0.84rem; font-weight: 600; color: var(--fg); }
.quick-action-desc { font-size: 0.76rem; color: var(--fg-muted); line-height: 1.4; }

/* ── Footer ───────────────────────────────────────────────────── */
.main-footer {
    padding: 18px 28px; text-align: center;
    font-size: 0.78rem; color: var(--fg-muted);
    border-top: 1px solid var(--border-light);
}
.main-footer span { font-weight: 600; color: var(--fg-secondary); }

/* ── Toast ────────────────────────────────────────────────────── */
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

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1200px) {
    .stats-grid { grid-template-columns: repeat(2, 1fr); }
    .quick-actions-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 1100px) { .content-grid { grid-template-columns: 1fr; } }
@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
    .sidebar.collapsed { width: var(--sidebar-width) !important; }
    .sidebar.collapsed .sidebar-collapse-btn { display: none; }
    .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text,
    .sidebar.collapsed .nav-section-label, .sidebar.collapsed .logout-link .nav-label {
        opacity: 1; width: auto; transform: none; height: auto; margin: 0;
    }
    .sidebar.collapsed .nav-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
    .sidebar.collapsed .logout-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
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
    .welcome-banner { flex-direction: column; padding: 28px 24px; text-align: center; }
    .welcome-text p { max-width: 100%; }
    .welcome-actions { justify-content: center; }
    .welcome-illustration { display: none; }
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .stat-card { padding: 16px 18px; }
    .stat-number { font-size: 1.5rem; }
    .stat-icon { width: 38px; height: 38px; font-size: 0.95rem; }
    .quick-actions-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .quick-action-card { padding: 18px 14px; }
}
@media (max-width: 480px) {
    .stats-grid { grid-template-columns: 1fr; }
    .quick-actions-grid { grid-template-columns: 1fr; }
    .panel-header { padding: 14px 16px; }
    .data-table th, .data-table td { padding: 10px 16px; font-size: 0.8rem; }
    .hide-mobile { display: none !important; }
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
            <a href="/dashboards/user/index.php" class="nav-link active" data-tooltip="Dashboard">
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
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="My Orders History">
                <i class="fa-solid fa-history nav-icon"></i>
                <span class="nav-label">My Orders History</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/users/manage_orders.php" role="menuitem">My Orders</a>
                <a href="/api/users/manage_order_history.php" role="menuitem">My Order History</a>
                <a href="/api/users/manage_custom_orders.php" role="menuitem"> My Custom Orders</a>
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

    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="logout-link" data-tooltip="Logout">
            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
            <span class="nav-label">Logout</span>
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
        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <div class="welcome-text">
                <h1>Good afternoon, Hattie!</h1>
                <p>You have 2 orders on the way and 1 custom request in progress. Your reward points are looking lovely — keep shopping to earn more.</p>
                <div class="welcome-actions">
                    <a href="/index.php#catalog" class="btn-welcome white"><i class="fa-solid fa-shopping-bag"></i> Browse Hats</a>
                    <a href="/api/users/manage_orders.php" class="btn-welcome ghost"><i class="fa-solid fa-history"></i> View Orders</a>
                </div>
            </div>
            <div class="welcome-illustration" aria-hidden="true">
                <i class="fa-solid fa-hat-cowboy-side"></i>
            </div>
        </div>

        <!-- Stat Cards -->
        <section class="stats-grid" aria-label="Account Metrics">
            <div class="stat-card orders">
                <div class="stat-info">
                    <h3>Total Orders</h3>
                    <div class="stat-number" data-target="24">0</div>
                    <span class="stat-change up"><i class="fa-solid fa-arrow-up" style="font-size:0.6rem;"></i> +3 this month</span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-box-archive"></i></div>
            </div>
            <div class="stat-card requests">
                <div class="stat-info">
                    <h3>Active Requests</h3>
                    <div class="stat-number" data-target="1">0</div>
                    <span class="stat-change neutral">1 in creation</span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            </div>
            <div class="stat-card points">
                <div class="stat-info">
                    <h3>Reward Points</h3>
                    <div class="stat-number" data-target="485">0</div>
                    <span class="stat-change up"><i class="fa-solid fa-arrow-up" style="font-size:0.6rem;"></i> +65 earned</span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
            </div>
            <div class="stat-card wishlist">
                <div class="stat-info">
                    <h3>Wishlist Items</h3>
                    <div class="stat-number" data-target="7">0</div>
                    <span class="stat-change neutral">2 on sale now</span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-heart"></i></div>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="quick-actions-grid" aria-label="Quick Actions" style="margin-bottom:28px;">
            <a href="/index.php#catalog" class="quick-action-card">
                <div class="quick-action-icon"><i class="fa-solid fa-bag-shopping"></i></div>
                <div class="quick-action-label">Shop Now</div>
                <div class="quick-action-desc">Browse our latest hat collection</div>
            </a>
            <a href="/api/users/manage_custom_orders.php" class="quick-action-card">
                <div class="quick-action-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                <div class="quick-action-label">Custom Order</div>
                <div class="quick-action-desc">Design your dream hat</div>
            </a>
            <a href="/api/users/manage_custom_orders.php" class="quick-action-card">
                <div class="quick-action-icon"><i class="fa-solid fa-truck"></i></div>
                <div class="quick-action-label">Track Orders</div>
                <div class="quick-action-desc">See where your hats are</div>
            </a>
            <a href="/api/users/manage_wishlist.php" class="quick-action-card">
                <div class="quick-action-icon"><i class="fa-solid fa-heart"></i></div>
                <div class="quick-action-label">Wishlist</div>
                <div class="quick-action-desc">View your saved favourites</div>
            </a>
        </section>

        <!-- Content Panels -->
        <section class="content-grid">
            <!-- Recent Orders Panel -->
            <div class="panel">
                <div class="panel-header">
                    <h2>Recent Orders</h2>
                    <a href="/api/users/manage_order_history.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="panel-body" id="ordersPanelBody">
                    <!-- Populated by JS -->
                </div>
            </div>

            <!-- Custom Hat Requests Panel -->
            <div class="panel">
                <div class="panel-header">
                    <h2>My Custom Requests</h2>
                    <a href="/api/users/manage_enquiries.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="panel-body" id="requestsPanelBody">
                    <!-- Populated by JS -->
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ── Toast Container ─────────────────────────────────────────── -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   DEMO DATA — Replace with PHP/AJAX fetch in production
   ================================================================ */
const recentOrders = [
    { id: "HH-10024", date: "2025-06-10", status: "in-transit", total: 94.99 },
    { id: "HH-10023", date: "2025-06-08", status: "delivered", total: 89.00 },
    { id: "HH-10022", date: "2025-06-05", status: "delivered", total: 115.99 },
    { id: "HH-10021", date: "2025-06-01", status: "processing", total: 98.99 },
    { id: "HH-10020", date: "2025-05-28", status: "delivered", total: 84.00 },
    { id: "HH-10019", date: "2025-05-25", status: "delivered", total: 60.99 }
];

const customRequests = [
    { type: "Bridal Fascinator", stage: "creation", stageLabel: "In Creation", date: "2025-06-09", id: "CR-0042" },
    { type: "Victorian Top Hat", stage: "review", stageLabel: "Under Review", date: "2025-05-20", id: "CR-0039" },
    { type: "Custom Beret", stage: "complete", stageLabel: "Completed", date: "2025-05-02", id: "CR-0035" },
    { type: "Racing Day Hat", stage: "complete", stageLabel: "Completed", date: "2025-04-15", id: "CR-0031" },
    { type: "Straw Boater Custom", stage: "complete", stageLabel: "Completed", date: "2025-03-28", id: "CR-0028" }
];

/* ================================================================
   HELPERS
   ================================================================ */
function formatDate(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short' });
}
function formatCurrency(n) { return '\u00A3' + n.toFixed(2); }
function getStatusLabel(s) {
    return { 'delivered': 'Delivered', 'in-transit': 'In Transit', 'processing': 'Processing' }[s] || s;
}

/* ================================================================
   RENDER RECENT ORDERS TABLE
   ================================================================ */
function renderOrders() {
    const container = document.getElementById('ordersPanelBody');
    if (recentOrders.length === 0) {
        container.innerHTML = `
            <div class="table-empty">
                <i class="fa-solid fa-box-open"></i>
                <p>No orders yet. Start exploring our hat collection!</p>
                <a href="/shop.php" class="table-empty-btn"><i class="fa-solid fa-shopping-bag"></i> Shop Now</a>
            </div>
        `;
        return;
    }

    container.innerHTML = `
        <table class="data-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th class="hide-mobile">Status</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                ${recentOrders.map(o => `
                    <tr>
                        <td><a href="/dashboards/user/order_details.php?id=${o.id}" class="table-order-id">${o.id}</a></td>
                        <td><span class="table-date">${formatDate(o.date)}</span></td>
                        <td class="hide-mobile">
                            <span class="status-badge status-${o.status}">
                                <span class="status-dot"></span>
                                ${getStatusLabel(o.status)}
                            </span>
                        </td>
                        <td><span class="table-total">${formatCurrency(o.total)}</span></td>
                        <td><a href="/dashboards/user/order_details.php?id=${o.id}" class="table-action-btn">View</a></td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
}

/* ================================================================
   RENDER CUSTOM REQUESTS TABLE
   ================================================================ */
function renderRequests() {
    const container = document.getElementById('requestsPanelBody');
    if (customRequests.length === 0) {
        container.innerHTML = `
            <div class="table-empty">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <p>No custom requests yet. Dream up something special!</p>
                <a href="/api/users/manage_custom_requests.php" class="table-empty-btn"><i class="fa-solid fa-plus"></i> New Request</a>
            </div>
        `;
        return;
    }

    container.innerHTML = `
        <table class="data-table">
            <thead>
                <tr>
                    <th>Hat Type</th>
                    <th>Stage</th>
                    <th class="hide-mobile">Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                ${customRequests.map(r => `
                    <tr>
                        <td style="font-weight:600;">${r.type}</td>
                        <td><span class="stage-badge stage-${r.stage}">${r.stageLabel}</span></td>
                        <td class="hide-mobile"><span class="table-date">${formatDate(r.date)}</span></td>
                        <td><a href="/api/users/manage_enquiries.php?id=${r.id}" class="table-action-btn">View</a></td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
}

/* ================================================================
   STAT COUNTER ANIMATION
   ================================================================ */
function animateCounters() {
    document.querySelectorAll('.stat-number[data-target]').forEach(el => {
        const target = parseInt(el.dataset.target, 10);
        if (target === 0) { el.textContent = '0'; return; }
        const duration = 1200;
        const startTime = performance.now();
        function update(now) {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.round(eased * target);
            if (progress < 1) requestAnimationFrame(update);
        }
        requestAnimationFrame(update);
    });
}

/* Trigger when stats come into view */
const statsGrid = document.querySelector('.stats-grid');
if (statsGrid) {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.disconnect();
            }
        });
    }, { threshold: 0.3 });
    observer.observe(statsGrid);
} else {
    animateCounters();
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
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('visible');
    });
    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    });
}
document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
    const trigger = item.querySelector('.nav-link');
    const menu = item.querySelector('.dropdown-menu');
    trigger.addEventListener('click', () => {
        const expanded = trigger.getAttribute('aria-expanded') === 'true';
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
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); trigger.click(); }
    });
});

/* ================================================================
   TOPBAR SEARCH & NOTIFICATIONS
   ================================================================ */
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
if (searchBtn && searchInput) {
    searchBtn.addEventListener('click', () => {
        const q = searchInput.value.trim();
        if (q) window.location.href = '/shop?search=' + encodeURIComponent(q);
    });
    searchInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') searchBtn.click(); });
}

const notifToggle = document.getElementById('notifToggle');
if (notifToggle) {
    notifToggle.addEventListener('click', () => showToast('You have 2 orders in transit and 1 request update.', 'info'));
}

/* ================================================================
   TOAST
   ================================================================ */
function showToast(message, type) {
    type = type || 'info';
    const iconMap = { success: 'fa-solid fa-circle-check', info: 'fa-solid fa-circle-info', warning: 'fa-solid fa-triangle-exclamation' };
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = '<i class="toast-icon ' + type + ' ' + iconMap[type] + '"></i><span class="toast-msg">' + message + '</span>';
    document.getElementById('toastContainer').appendChild(toast);
    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('visible')));
    setTimeout(() => { toast.classList.remove('visible'); setTimeout(() => toast.remove(), 400); }, 4000);
}

/* ================================================================
   INITIALIZE
   ================================================================ */
renderOrders();
renderRequests();
</script>
</body>
</html>