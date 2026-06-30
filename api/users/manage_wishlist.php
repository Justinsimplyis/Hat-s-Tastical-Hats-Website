<?php
// You can fetch wishlist data here later
// Example: $wishlistItems = getUserWishlist($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>My Wishlist | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — My Wishlist
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
input, select { font: inherit; border: none; outline: none; background: none; }

/* ================================================================
   SIDEBAR
   ================================================================ */
.sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-width); background: var(--sidebar-bg); display: flex; flex-direction: column; z-index: 1000; transition: width 0.3s var(--ease), transform 0.35s var(--ease); overflow: hidden; box-shadow: var(--shadow-sm); }
.sidebar-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 16px 12px; flex-shrink: 0; border-bottom: 1px solid var(--border-light); }
.sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }
.logo-mark { width: 40px; height: 40px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 1.15rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
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
.dropdown-menu.open { max-height: 400px; }
.dropdown-menu a { display: flex; align-items: center; gap: 8px; padding: 8px 12px 8px 32px; font-size: 0.82rem; font-weight: 500; color: var(--sidebar-text); border-radius: var(--radius-sm); transition: all var(--duration) var(--ease); position: relative; }
.dropdown-menu a::before { content: ''; width: 5px; height: 5px; border-radius: 50%; background: var(--cream-deeper); flex-shrink: 0; transition: background var(--duration) var(--ease); }
.dropdown-menu a:hover { background: var(--sidebar-hover); color: var(--sidebar-text-hover); }
.dropdown-menu a:hover::before { background: var(--red); }
.dropdown-menu a.active { color: var(--sidebar-text-active); font-weight: 600; }
.dropdown-menu a.active::before { background: var(--red); }
.sidebar.collapsed .nav-link[data-tooltip]::after { content: attr(data-tooltip); position: absolute; left: calc(100% + 12px); top: 50%; transform: translateY(-50%); background: var(--card); color: var(--fg); padding: 6px 14px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 500; white-space: nowrap; box-shadow: var(--shadow-lg); border: 1px solid var(--border); opacity: 0; visibility: hidden; transition: opacity 0.15s var(--ease), visibility 0.15s var(--ease); pointer-events: none; z-index: 10; }
.sidebar.collapsed .nav-link[data-tooltip]:hover::after { opacity: 1; visibility: visible; }
.sidebar-footer { padding: 12px; border-top: 1px solid var(--border-light); flex-shrink: 0; }
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
.sidebar.collapsed { justify-content: center; padding: 10px; gap: 0; }
.sidebar.collapsed .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
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
.search-btn { width: 30px; height: 30px; border-radius: var(--radius-full); background: var(--red); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 0.72rem; flex-shrink: 0; transition: all var(--duration) var(--ease); }
.search-btn:hover { background: var(--red-hover); transform: scale(1.05); }
.topbar-icon-btn { position: relative; width: 38px; height: 38px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; font-size: 1rem; color: var(--fg-secondary); transition: all var(--duration) var(--ease); }
.topbar-icon-btn:hover { background: var(--cream); color: var(--fg); }
.badge-dot { position: absolute; top: 8px; right: 8px; width: 8px; height: 8px; background: var(--red); border-radius: 50%; border: 2px solid var(--topbar-bg); }
.profile-btn { display: flex; align-items: center; gap: 8px; padding: 4px 12px 4px 4px; border-radius: var(--radius-full); transition: all var(--duration) var(--ease); margin-left: 4px; }
.profile-btn:hover { background: var(--cream); }
.profile-avatar { width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; justify-content: center; }
.profile-label { font-size: 0.82rem; font-weight: 500; color: var(--fg-secondary); }

/* ================================================================
   MAIN CONTENT — WISHLIST
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 0.82rem; color: var(--fg-muted); margin-bottom: 24px; flex-wrap: wrap; }
.breadcrumb a { color: var(--fg-secondary); font-weight: 500; transition: color var(--duration) var(--ease); }
.breadcrumb a:hover { color: var(--red); }
.breadcrumb .sep { color: var(--cream-deeper); font-size: 0.65rem; }
.breadcrumb .current { color: var(--fg); font-weight: 600; }

/* ── Page Header ──────────────────────────────────────────────── */
.page-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 24px; flex-wrap: wrap; }
.page-header-left h1 { font-size: 1.45rem; font-weight: 700; color: var(--fg); line-height: 1.3; letter-spacing: -0.02em; margin-bottom: 4px; }
.page-header-left p { font-size: 0.87rem; color: var(--fg-muted); }
.page-header-actions { display: flex; align-items: center; gap: 10px; flex-shrink: 0; flex-wrap: wrap; }

.btn { height: 40px; padding: 0 20px; border-radius: var(--radius-sm); font-size: 0.84rem; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all var(--duration) var(--ease); white-space: nowrap; }
.btn-primary { background: var(--red); color: #fff; }
.btn-primary:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(201,59,57,0.3); }
.btn-secondary { background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light); }
.btn-secondary:hover { background: var(--cream-dark); color: var(--fg); }
.btn-ghost { color: var(--fg-secondary); }
.btn-ghost:hover { color: var(--red); background: var(--red-light); }
.btn-sm { height: 34px; padding: 0 14px; font-size: 0.8rem; }

/* ── Summary Bar ──────────────────────────────────────────────── */
.summary-bar {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 18px 28px; margin-bottom: 24px;
    display: flex; align-items: center; gap: 32px; flex-wrap: wrap;
}
.summary-item { display: flex; align-items: center; gap: 10px; }
.summary-icon { width: 38px; height: 38px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 0.9rem; flex-shrink: 0; }
.summary-item:nth-child(1) .summary-icon { background: var(--red-light); color: var(--red); }
.summary-item:nth-child(2) .summary-icon { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.summary-item:nth-child(3) .summary-icon { background: rgba(212,148,42,0.10); color: #D4942A; }
.summary-value { font-size: 1.15rem; font-weight: 700; color: var(--fg); line-height: 1.2; }
.summary-label { font-size: 0.74rem; color: var(--fg-muted); font-weight: 500; }
.summary-divider { width: 1px; height: 32px; background: var(--border); flex-shrink: 0; }

/* ── Filter Bar ───────────────────────────────────────────────── */
.filter-bar {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 16px 22px; margin-bottom: 24px;
    display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
}
.filter-bar label { font-size: 0.78rem; font-weight: 600; color: var(--fg-secondary); display: flex; align-items: center; gap: 6px; }
.filter-bar label i { color: var(--fg-muted); font-size: 0.82rem; }
.filter-select {
    height: 36px; padding: 0 32px 0 12px;
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-sm); font-size: 0.82rem; color: var(--fg);
    cursor: pointer; appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='%239A8588'%3E%3Cpath d='M0 0l5 6 5-6z'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 12px center;
    transition: all var(--duration) var(--ease);
}
.filter-select:hover { border-color: var(--pink); }
.filter-select:focus { border-color: var(--red); box-shadow: 0 0 0 3px var(--red-muted); }
.filter-search {
    flex: 1; min-width: 180px; height: 36px; padding: 0 14px;
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-sm); font-size: 0.82rem; color: var(--fg);
    transition: all var(--duration) var(--ease);
}
.filter-search::placeholder { color: var(--fg-muted); }
.filter-search:hover { border-color: var(--pink); }
.filter-search:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }
.filter-divider { width: 1px; height: 24px; background: var(--border); flex-shrink: 0; }

/* ── View Toggle ──────────────────────────────────────────────── */
.view-toggle { display: flex; border: 1px solid var(--border-light); border-radius: var(--radius-sm); overflow: hidden; }
.view-toggle-btn { width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; color: var(--fg-muted); transition: all var(--duration) var(--ease); }
.view-toggle-btn.active { background: var(--red); color: #fff; }
.view-toggle-btn:not(.active):hover { background: var(--cream); color: var(--fg); }

/* ── Wishlist Grid ────────────────────────────────────────────── */
.wishlist-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
    gap: 20px; margin-bottom: 28px;
}

.wishlist-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden; transition: all 0.3s var(--ease);
    position: relative;
}
.wishlist-card:hover { box-shadow: var(--shadow-md); transform: translateY(-3px); }
.wishlist-card.removing { opacity: 0; transform: scale(0.95) translateY(10px); pointer-events: none; }

.wishlist-card-img {
    position: relative; width: 100%; aspect-ratio: 4/3;
    background: var(--cream); overflow: hidden;
}
.wishlist-card-img img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s var(--ease); }
.wishlist-card:hover .wishlist-card-img img { transform: scale(1.05); }

.wishlist-badge {
    position: absolute; top: 12px; left: 12px;
    font-size: 0.7rem; font-weight: 700; padding: 4px 10px;
    border-radius: var(--radius-full); z-index: 2;
    text-transform: uppercase; letter-spacing: 0.05em;
}
.badge-sale { background: var(--red); color: #fff; }
.badge-new { background: #2D9B6E; color: #fff; }
.badge-low-stock { background: #D4942A; color: #fff; }

.wishlist-remove {
    position: absolute; top: 12px; right: 12px;
    width: 32px; height: 32px; border-radius: 50%;
    background: rgba(255,255,255,0.9); backdrop-filter: blur(4px);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.78rem; color: var(--fg-muted); z-index: 2;
    transition: all var(--duration) var(--ease);
    opacity: 0; transform: scale(0.8);
}
.wishlist-card:hover .wishlist-remove { opacity: 1; transform: scale(1); }
.wishlist-remove:hover { background: var(--red); color: #fff; }

.wishlist-card-body { padding: 18px 20px; }
.wishlist-card-category { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--pink); margin-bottom: 6px; }
.wishlist-card-name { font-size: 0.95rem; font-weight: 700; color: var(--fg); line-height: 1.3; margin-bottom: 4px; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.wishlist-card-name a { transition: color var(--duration) var(--ease); }
.wishlist-card-name a:hover { color: var(--red); }

.wishlist-card-variants { display: flex; flex-wrap: wrap; gap: 6px; margin: 10px 0 14px; }
.variant-chip {
    font-size: 0.7rem; font-weight: 500; padding: 3px 10px;
    border-radius: var(--radius-full); background: var(--cream);
    color: var(--fg-secondary); border: 1px solid var(--border-light);
}
.variant-chip.selected { background: var(--red-light); color: var(--red); border-color: var(--red-light); font-weight: 600; }

.wishlist-card-price { display: flex; align-items: baseline; gap: 8px; margin-bottom: 16px; }
.price-current { font-size: 1.15rem; font-weight: 800; color: var(--fg); }
.price-original { font-size: 0.85rem; font-weight: 500; color: var(--fg-muted); text-decoration: line-through; }
.price-save { font-size: 0.72rem; font-weight: 700; color: #2D9B6E; background: rgba(45,155,110,0.10); padding: 2px 8px; border-radius: var(--radius-full); }

.wishlist-card-footer { display: flex; gap: 8px; }
.wishlist-card-footer .btn { flex: 1; justify-content: center; }

.stock-status { font-size: 0.74rem; font-weight: 600; display: flex; align-items: center; gap: 5px; margin-bottom: 12px; }
.stock-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.stock-in { color: #2D9B6E; }
.stock-in .stock-dot { background: #2D9B6E; }
.stock-low { color: #D4942A; }
.stock-low .stock-dot { background: #D4942A; }
.stock-out { color: var(--fg-muted); }
.stock-out .stock-dot { background: var(--fg-muted); }

.wishlist-card-date { font-size: 0.72rem; color: var(--fg-muted); margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border-light); display: flex; align-items: center; gap: 5px; }

/* ── List View ────────────────────────────────────────────────── */
.wishlist-list { display: flex; flex-direction: column; gap: 12px; margin-bottom: 28px; }
.wishlist-list-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    display: flex; align-items: center; gap: 20px; padding: 16px 20px;
    transition: all 0.3s var(--ease); position: relative;
}
.wishlist-list-card:hover { box-shadow: var(--shadow-md); border-color: var(--border); }
.wishlist-list-card.removing { opacity: 0; transform: translateX(-20px); pointer-events: none; }
.wishlist-list-img {
    width: 90px; height: 90px; border-radius: var(--radius-md);
    background: var(--cream); overflow: hidden; flex-shrink: 0;
    border: 1px solid var(--border-light);
}
.wishlist-list-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.wishlist-list-info { flex: 1; min-width: 0; }
.wishlist-list-info .wishlist-card-category { margin-bottom: 2px; }
.wishlist-list-info .wishlist-card-name { font-size: 1rem; margin-bottom: 4px; }
.wishlist-list-info .wishlist-card-variants { margin: 6px 0 8px; }
.wishlist-list-meta { display: flex; align-items: center; gap: 16px; flex-wrap: wrap; }
.wishlist-list-right { text-align: right; flex-shrink: 0; display: flex; flex-direction: column; align-items: flex-end; gap: 10px; }
.wishlist-list-actions { display: flex; gap: 8px; }
.wishlist-list-remove {
    position: absolute; top: 12px; right: 12px;
    width: 28px; height: 28px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.72rem; color: var(--fg-muted); z-index: 2;
    transition: all var(--duration) var(--ease);
}
.wishlist-list-remove:hover { background: var(--red-light); color: var(--red); }

/* ── Empty State ──────────────────────────────────────────────── */
.empty-state { text-align: center; padding: 80px 24px; }
.empty-state-icon { width: 96px; height: 96px; margin: 0 auto 24px; border-radius: 50%; background: var(--cream); display: flex; align-items: center; justify-content: center; font-size: 2.2rem; color: var(--cream-deeper); }
.empty-state h3 { font-size: 1.15rem; font-weight: 700; color: var(--fg); margin-bottom: 8px; }
.empty-state p { font-size: 0.9rem; color: var(--fg-muted); max-width: 380px; margin: 0 auto 24px; line-height: 1.6; }
.empty-state-btns { display: flex; align-items: center; justify-content: center; gap: 12px; flex-wrap: wrap; }

/* ── Toast ────────────────────────────────────────────────────── */
.toast-container { position: fixed; bottom: 24px; right: 24px; z-index: 3000; display: flex; flex-direction: column; gap: 10px; }
.toast { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 14px 20px; box-shadow: var(--shadow-lg); display: flex; align-items: center; gap: 12px; min-width: 280px; max-width: 420px; transform: translateX(120%); opacity: 0; transition: all 0.4s var(--ease); }
.toast.visible { transform: translateX(0); opacity: 1; }
.toast-icon { font-size: 1.1rem; flex-shrink: 0; }
.toast-icon.success { color: #2D9B6E; }
.toast-icon.info { color: #6B5CE7; }
.toast-icon.warning { color: #D4942A; }
.toast-msg { font-size: 0.84rem; color: var(--fg); font-weight: 500; flex: 1; }
.toast-undo { font-size: 0.78rem; font-weight: 600; color: var(--red); padding: 4px 12px; border-radius: var(--radius-full); border: 1px solid var(--red-light); background: var(--red-light); transition: all var(--duration) var(--ease); white-space: nowrap; flex-shrink: 0; }
.toast-undo:hover { background: var(--red); color: #fff; border-color: var(--red); }

/* ── Footer ───────────────────────────────────────────────────── */
.main-footer { padding: 18px 28px; text-align: center; font-size: 0.78rem; color: var(--fg-muted); border-top: 1px solid var(--border-light); }
.main-footer span { font-weight: 600; color: var(--fg-secondary); }

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1100px) { .wishlist-grid { grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); } }
@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
    .sidebar.collapsed { width: var(--sidebar-width) !important; }
    .sidebar.collapsed .sidebar-collapse-btn { display: none; }
    .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label, .sidebar.collapsed .nav-label { opacity: 1; width: auto; transform: none; height: auto; margin: 0; }
    .sidebar.collapsed .nav-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
    .sidebar.collapsed { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
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
    .summary-bar { padding: 14px 18px; gap: 20px; }
    .summary-divider { display: none; }
    .filter-bar { padding: 14px 16px; gap: 10px; }
    .filter-search { min-width: 140px; }
    .filter-divider { display: none; }
    .wishlist-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
    .wishlist-list-card { flex-direction: column; align-items: stretch; }
    .wishlist-list-img { width: 100%; height: 180px; }
    .wishlist-list-right { text-align: left; align-items: flex-start; flex-direction: row; justify-content: space-between; }
    .wishlist-list-remove { display: none; }
}
@media (max-width: 480px) {
    .wishlist-grid { grid-template-columns: 1fr; }
    .wishlist-card-footer { flex-direction: column; }
    .wishlist-card-footer .btn { width: 100%; }
    .page-header-actions { width: 100%; }
    .page-header-actions .btn { flex: 1; justify-content: center; }
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
            <div class="nav-link active" role="button" tabindex="0" aria-expanded="true" data-tooltip="My Shopping">
                <i class="fa-solid fa-shopping-bag nav-icon"></i>
                <span class="nav-label">My Shopping</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu open" role="menu">
                <a href="/api/users/manage_cart.php" role="menuitem">My Cart</a>
                <a href="/api/users/manage_wishlist.php" role="menuitem" class="active" aria-current="page">Wishlist</a>
            </div>
        </div>
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="My Orders">
                <i class="fa-solid fa-history nav-icon"></i>
                <span class="nav-label">My Orders History</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/users/manage_orders.php" role="menuitem"> My Orders</a>
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
                <h2>My Wishlist</h2>
                <p>Hats you've saved for later.</p>
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
        <!-- Populated by JS -->
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ── Toast Container ─────────────────────────────────────────── -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   WISHLIST DATA — Replace with PHP/AJAX in production
   ================================================================ */
let wishlistData = [
    {
        id: 1, name: "Velvet Wide-Brim Fedora", category: "Fedora",
        variants: ["Burgundy / M", "Black / L", "Forest Green / M"], selectedVariant: 0,
        price: 118.00, originalPrice: null, badge: null,
        stock: "in", addedDate: "2025-06-08",
        img: "https://picsum.photos/seed/wish-fedora-velvet/400/300.jpg",
        slug: "velvet-wide-brim-fedora"
    },
    {
        id: 2, name: "Straw Picot Hat with Silk Ribbon", category: "Sun Hat",
        variants: ["Natural / S", "Ivory / M"], selectedVariant: 1,
        price: 62.00, originalPrice: 78.00, badge: "sale",
        stock: "in", addedDate: "2025-06-06",
        img: "https://picsum.photos/seed/wish-straw-picot/400/300.jpg",
        slug: "straw-picot-silk-ribbon"
    },
    {
        id: 3, name: "Hand-Felted Cloche", category: "Cloche",
        variants: ["Plum / S"], selectedVariant: 0,
        price: 95.00, originalPrice: null, badge: "new",
        stock: "in", addedDate: "2025-06-05",
        img: "https://picsum.photos/seed/wish-cloche-felt/400/300.jpg",
        slug: "hand-felted-cloche"
    },
    {
        id: 4, name: "Linen Bucket Hat", category: "Bucket",
        variants: ["Sage / M", "Cream / L", "Terracotta / S"], selectedVariant: 0,
        price: 48.00, originalPrice: null, badge: null,
        stock: "low", addedDate: "2025-06-03",
        img: "https://picsum.photos/seed/wish-bucket-linen/400/300.jpg",
        slug: "linen-bucket-hat"
    },
    {
        id: 5, name: "Sinamay Fascinator with Feathers", category: "Fascinator",
        variants: ["Blush / OS", "Navy / OS"], selectedVariant: 0,
        price: 54.00, originalPrice: 68.00, badge: "sale",
        stock: "in", addedDate: "2025-06-01",
        img: "https://picsum.photos/seed/wish-fascinator-sin/400/300.jpg",
        slug: "sinamay-fascinator-feathers"
    },
    {
        id: 6, name: "Leather Cowboy Hat", category: "Western",
        variants: ["Tan / L", "Brown / M", "Black / L"], selectedVariant: 0,
        price: 145.00, originalPrice: null, badge: null,
        stock: "out", addedDate: "2025-05-28",
        img: "https://picsum.photos/seed/wish-cowboy-leather/400/300.jpg",
        slug: "leather-cowboy-hat"
    },
    {
        id: 7, name: "Tweed Newsboy Cap", category: "Flat Cap",
        variants: ["Herringbone / L", "Grey Check / M"], selectedVariant: 0,
        price: 52.00, originalPrice: null, badge: null,
        stock: "in", addedDate: "2025-05-25",
        img: "https://picsum.photos/seed/wish-newsboy-tweed/400/300.jpg",
        slug: "tweed-newsboy-cap"
    },
    {
        id: 8, name: "Silk Pillbox Hat with Veil", category: "Pillbox",
        variants: ["Champagne / S", "Ivory / S"], selectedVariant: 1,
        price: 125.00, originalPrice: null, badge: "new",
        stock: "low", addedDate: "2025-05-22",
        img: "https://picsum.photos/seed/wish-pillbox-silk/400/300.jpg",
        slug: "silk-pillbox-veil"
    },
    {
        id: 9, name: "Panama Hat — Optimo Style", category: "Panama",
        variants: ["Ecru / M", "Natural / L"], selectedVariant: 0,
        price: 88.00, originalPrice: 110.00, badge: "sale",
        stock: "in", addedDate: "2025-05-18",
        img: "https://picsum.photos/seed/wish-panama-optimo/400/300.jpg",
        slug: "panama-optimo-style"
    },
    {
        id: 10, name: "Embroidered Baseball Cap", category: "Casual",
        variants: ["Cream / OS", "Black / OS", "Olive / OS"], selectedVariant: 0,
        price: 28.00, originalPrice: null, badge: null,
        stock: "in", addedDate: "2025-05-15",
        img: "https://picsum.photos/seed/wish-baseball-emb/400/300.jpg",
        slug: "embroidered-baseball-cap"
    }
];

/* ================================================================
   STATE
   ================================================================ */
let currentView = 'grid'; /* 'grid' or 'list' */
let filteredItems = [...wishlistData];
let removedStack = []; /* for undo */

/* ================================================================
   HELPERS
   ================================================================ */
function formatCurrency(n) { return '\u00A3' + n.toFixed(2); }
function formatDate(dateStr) {
    const d = new Date(dateStr + 'T00:00:00');
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
}
function getStockInfo(stock) {
    if (stock === 'in') return { label: 'In Stock', cls: 'stock-in' };
    if (stock === 'low') return { label: 'Low Stock — Only 2 left', cls: 'stock-low' };
    return { label: 'Out of Stock', cls: 'stock-out' };
}
function getBadgeHTML(badge) {
    if (!badge) return '';
    if (badge === 'sale') return '<span class="wishlist-badge badge-sale">Sale</span>';
    if (badge === 'new') return '<span class="wishlist-badge badge-new">New</span>';
    return '';
}

/* ================================================================
   RENDER
   ================================================================ */
function render() {
    const mainContent = document.getElementById('mainContent');

    if (wishlistData.length === 0) {
        mainContent.innerHTML = renderEmpty();
        return;
    }

    const totalItems = wishlistData.length;
    const totalValue = wishlistData.reduce((s, i) => s + i.price, 0);
    const onSale = wishlistData.filter(i => i.originalPrice).length;

    mainContent.innerHTML = `
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/dashboards/user/index.php">Dashboard</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <a href="#" onclick="return false">My Shopping</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">Wishlist</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h1>My Wishlist</h1>
                <p>${totalItems} hat${totalItems !== 1 ? 's' : ''} saved for later</p>
            </div>
            <div class="page-header-actions">
                <button class="btn btn-secondary" id="addAllToCartBtn"><i class="fa-solid fa-cart-plus"></i> Add All to Cart</button>
                <button class="btn btn-secondary" id="clearWishlistBtn"><i class="fa-solid fa-trash-can"></i> Clear All</button>
            </div>
        </div>

        <!-- Summary Bar -->
        <div class="summary-bar">
            <div class="summary-item">
                <div class="summary-icon"><i class="fa-solid fa-heart"></i></div>
                <div>
                    <div class="summary-value">${totalItems}</div>
                    <div class="summary-label">Saved Items</div>
                </div>
            </div>
            <div class="summary-divider hide-mobile"></div>
            <div class="summary-item">
                <div class="summary-icon"><i class="fa-solid fa-coins"></i></div>
                <div>
                    <div class="summary-value">${formatCurrency(totalValue)}</div>
                    <div class="summary-label">Total Value</div>
                </div>
            </div>
            <div class="summary-divider hide-mobile"></div>
            <div class="summary-item">
                <div class="summary-icon"><i class="fa-solid fa-tag"></i></div>
                <div>
                    <div class="summary-value">${onSale}</div>
                    <div class="summary-label">On Sale Now</div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <label><i class="fa-solid fa-filter"></i> Filters</label>
            <select class="filter-select" id="filterCategory" aria-label="Filter by category">
                <option value="all">All Categories</option>
                <option value="Fedora">Fedora</option>
                <option value="Cloche">Cloche</option>
                <option value="Sun Hat">Sun Hat</option>
                <option value="Bucket">Bucket</option>
                <option value="Fascinator">Fascinator</option>
                <option value="Western">Western</option>
                <option value="Flat Cap">Flat Cap</option>
                <option value="Pillbox">Pillbox</option>
                <option value="Panama">Panama</option>
                <option value="Casual">Casual</option>
            </select>
            <select class="filter-select" id="filterStock" aria-label="Filter by availability">
                <option value="all">All Availability</option>
                <option value="in">In Stock</option>
                <option value="low">Low Stock</option>
                <option value="out">Out of Stock</option>
            </select>
            <select class="filter-select" id="filterSort" aria-label="Sort by">
                <option value="newest">Newest Added</option>
                <option value="oldest">Oldest Added</option>
                <option value="price-asc">Price: Low to High</option>
                <option value="price-desc">Price: High to Low</option>
                <option value="name">Name: A–Z</option>
            </select>
            <div class="filter-divider hide-mobile"></div>
            <input type="text" class="filter-search" id="filterSearch" placeholder="Search wishlist..." aria-label="Search wishlist">
            <div class="view-toggle">
                <button class="view-toggle-btn ${currentView === 'grid' ? 'active' : ''}" id="viewGrid" aria-label="Grid view"><i class="fa-solid fa-grid-2"></i></button>
                <button class="view-toggle-btn ${currentView === 'list' ? 'active' : ''}" id="viewList" aria-label="List view"><i class="fa-solid fa-list"></i></button>
            </div>
        </div>

        <!-- Items Container -->
        <div id="itemsContainer"></div>
    `;

    renderItems();
    wireFilters();
    wireViewToggle();
    wireBulkActions();
}

function renderItems() {
    const container = document.getElementById('itemsContainer');
    if (!container) return;

    if (filteredItems.length === 0) {
        container.innerHTML = `
            <div class="empty-state" style="padding:60px 24px;">
                <div class="empty-state-icon"><i class="fa-solid fa-filter-circle-xmark"></i></div>
                <h3>No items match your filters</h3>
                <p>Try adjusting your search or filter criteria to find what you're looking for.</p>
            </div>
        `;
        return;
    }

    if (currentView === 'grid') {
        container.innerHTML = '<div class="wishlist-grid">' + filteredItems.map(renderGridCard).join('') + '</div>';
    } else {
        container.innerHTML = '<div class="wishlist-list">' + filteredItems.map(renderListCard).join('') + '</div>';
    }

    wireItemActions();
}

function renderGridCard(item) {
    const stockInfo = getStockInfo(item.stock);
    const isOut = item.stock === 'out';
    const saveAmt = item.originalPrice ? item.originalPrice - item.price : 0;

    return `
        <div class="wishlist-card" data-id="${item.id}">
            <div class="wishlist-card-img">
                ${getBadgeHTML(item.badge)}
                ${item.badge === 'sale' ? '' : (item.stock === 'low' ? '<span class="wishlist-badge badge-low-stock">Low Stock</span>' : '')}
                <a href="/shop/${item.slug}"><img src="${item.img}" alt="${item.name}" loading="lazy"></a>
                <button class="wishlist-remove" data-remove="${item.id}" aria-label="Remove from wishlist"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="wishlist-card-body">
                <div class="wishlist-card-category">${item.category}</div>
                <div class="wishlist-card-name"><a href="/shop/${item.slug}">${item.name}</a></div>
                <div class="wishlist-card-variants">
                    ${item.variants.map((v, i) => `<span class="variant-chip ${i === item.selectedVariant ? 'selected' : ''}">${v}</span>`).join('')}
                </div>
                <div class="stock-status ${stockInfo.cls}"><span class="stock-dot"></span> ${stockInfo.label}</div>
                <div class="wishlist-card-price">
                    <span class="price-current">${formatCurrency(item.price)}</span>
                    ${item.originalPrice ? `<span class="price-original">${formatCurrency(item.originalPrice)}</span><span class="price-save">Save ${formatCurrency(saveAmt)}</span>` : ''}
                </div>
                <div class="wishlist-card-footer">
                    <button class="btn btn-primary btn-sm add-to-cart-btn" data-cart="${item.id}" ${isOut ? 'disabled style="opacity:0.5;pointer-events:none;"' : ''}><i class="fa-solid fa-cart-plus"></i> ${isOut ? 'Out of Stock' : 'Add to Cart'}</button>
                    <button class="btn btn-ghost btn-sm" onclick="window.location.href='/shop/${item.slug}'"><i class="fa-solid fa-eye"></i></button>
                </div>
                <div class="wishlist-card-date"><i class="fa-regular fa-clock"></i> Added ${formatDate(item.addedDate)}</div>
            </div>
        </div>
    `;
}

function renderListCard(item) {
    const stockInfo = getStockInfo(item.stock);
    const isOut = item.stock === 'out';
    const saveAmt = item.originalPrice ? item.originalPrice - item.price : 0;

    return `
        <div class="wishlist-list-card" data-id="${item.id}">
            <div class="wishlist-list-img">
                ${getBadgeHTML(item.badge)}
                <a href="/shop/${item.slug}"><img src="${item.img}" alt="${item.name}" loading="lazy"></a>
            </div>
            <div class="wishlist-list-info">
                <div class="wishlist-card-category">${item.category}</div>
                <div class="wishlist-card-name"><a href="/shop/${item.slug}">${item.name}</a></div>
                <div class="wishlist-card-variants">
                    ${item.variants.map((v, i) => `<span class="variant-chip ${i === item.selectedVariant ? 'selected' : ''}">${v}</span>`).join('')}
                </div>
                <div class="wishlist-list-meta">
                    <span class="stock-status ${stockInfo.cls}"><span class="stock-dot"></span> ${stockInfo.label}</span>
                    <span style="font-size:0.72rem;color:var(--fg-muted);"><i class="fa-regular fa-clock" style="margin-right:3px;"></i>${formatDate(item.addedDate)}</span>
                </div>
            </div>
            <div class="wishlist-list-right">
                <div>
                    <div class="wishlist-card-price" style="margin-bottom:0;">
                        <span class="price-current">${formatCurrency(item.price)}</span>
                        ${item.originalPrice ? `<span class="price-original">${formatCurrency(item.originalPrice)}</span>` : ''}
                    </div>
                    ${saveAmt > 0 ? `<span class="price-save" style="margin-top:4px;display:inline-block;">Save ${formatCurrency(saveAmt)}</span>` : ''}
                </div>
                <div class="wishlist-list-actions">
                    <button class="btn btn-primary btn-sm add-to-cart-btn" data-cart="${item.id}" ${isOut ? 'disabled style="opacity:0.5;pointer-events:none;"' : ''}><i class="fa-solid fa-cart-plus"></i> ${isOut ? 'Unavailable' : 'Add to Cart'}</button>
                    <button class="btn btn-ghost btn-sm" data-remove="${item.id}" aria-label="Remove"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </div>
            <button class="wishlist-list-remove" data-remove="${item.id}" aria-label="Remove from wishlist"><i class="fa-solid fa-xmark"></i></button>
        </div>
    `;
}

function renderEmpty() {
    return `
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/dashboards/user/index.php">Dashboard</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <a href="#" onclick="return false">My Shopping</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">Wishlist</span>
        </nav>
        <div class="empty-state">
            <div class="empty-state-icon"><i class="fa-regular fa-heart"></i></div>
            <h3>Your wishlist is empty</h3>
            <p>You haven't saved any hats yet. Browse our collection and tap the heart icon to save your favourites for later.</p>
            <div class="empty-state-btns">
                <a href="/shop.php" class="btn btn-primary"><i class="fa-solid fa-shopping-bag"></i> Browse Hats</a>
                <a href="/dashboards/user/index.php" class="btn btn-secondary"><i class="fa-solid fa-gauge"></i> Back to Dashboard</a>
            </div>
        </div>
    `;
}

/* ================================================================
   FILTERING & SORTING
   ================================================================ */
function applyFilters() {
    const category = document.getElementById('filterCategory').value;
    const stock = document.getElementById('filterStock').value;
    const sort = document.getElementById('filterSort').value;
    const search = document.getElementById('filterSearch').value.trim().toLowerCase();

    filteredItems = wishlistData.filter(item => {
        if (category !== 'all' && item.category !== category) return false;
        if (stock !== 'all' && item.stock !== stock) return false;
        if (search) {
            const matchName = item.name.toLowerCase().includes(search);
            const matchCat = item.category.toLowerCase().includes(search);
            const matchVariant = item.variants.some(v => v.toLowerCase().includes(search));
            if (!matchName && !matchCat && !matchVariant) return false;
        }
        return true;
    });

    filteredItems.sort((a, b) => {
        switch (sort) {
            case 'newest': return new Date(b.addedDate) - new Date(a.addedDate);
            case 'oldest': return new Date(a.addedDate) - new Date(b.addedDate);
            case 'price-asc': return a.price - b.price;
            case 'price-desc': return b.price - a.price;
            case 'name': return a.name.localeCompare(b.name);
            default: return 0;
        }
    });

    renderItems();
}

function wireFilters() {
    document.getElementById('filterCategory').addEventListener('change', applyFilters);
    document.getElementById('filterStock').addEventListener('change', applyFilters);
    document.getElementById('filterSort').addEventListener('change', applyFilters);
    document.getElementById('filterSearch').addEventListener('input', applyFilters);
}

/* ================================================================
   VIEW TOGGLE
   ================================================================ */
function wireViewToggle() {
    document.getElementById('viewGrid').addEventListener('click', () => {
        currentView = 'grid';
        document.getElementById('viewGrid').classList.add('active');
        document.getElementById('viewList').classList.remove('active');
        renderItems();
    });
    document.getElementById('viewList').addEventListener('click', () => {
        currentView = 'list';
        document.getElementById('viewList').classList.add('active');
        document.getElementById('viewGrid').classList.remove('active');
        renderItems();
    });
}

/* ================================================================
   ITEM ACTIONS
   ================================================================ */
function wireItemActions() {
    /* Remove buttons */
    document.querySelectorAll('[data-remove]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const id = parseInt(btn.dataset.remove, 10);
            removeItem(id);
        });
    });

    /* Add to cart buttons */
    document.querySelectorAll('[data-cart]').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = parseInt(btn.dataset.cart, 10);
            const item = wishlistData.find(i => i.id === id);
            if (item) {
                showToast(item.name + ' added to your cart.', 'success');
            }
        });
    });
}

function removeItem(id) {
    const idx = wishlistData.findIndex(i => i.id === id);
    if (idx === -1) return;

    const removed = wishlistData.splice(idx, 1)[0];
    removedStack.push(removed);

    /* Animate out */
    const card = document.querySelector('[data-id="' + id + '"]');
    if (card) {
        card.classList.add('removing');
        setTimeout(() => {
            applyFilters();
            updateSummary();
            /* Re-render entire page if list is now empty */
            if (wishlistData.length === 0) render();
        }, 300);
    } else {
        applyFilters();
        if (wishlistData.length === 0) render();
    }

    showToast(removed.name + ' removed from wishlist.', 'warning', true, removed);
}

function updateSummary() {
    /* Quick update of summary numbers without full re-render */
    const vals = document.querySelectorAll('.summary-value');
    if (vals.length >= 3) {
        vals[0].textContent = wishlistData.length;
        vals[1].textContent = formatCurrency(wishlistData.reduce((s, i) => s + i.price, 0));
        vals[2].textContent = wishlistData.filter(i => i.originalPrice).length;
    }
    /* Update header text */
    const headerP = document.querySelector('.page-header-left p');
    if (headerP) {
        headerP.textContent = wishlistData.length + ' hat' + (wishlistData.length !== 1 ? 's' : '') + ' saved for later';
    }
}

function undoRemove(item) {
    wishlistData.push(item);
    removedStack = removedStack.filter(i => i.id !== item.id);
    applyFilters();
    updateSummary();
    if (document.querySelector('.empty-state')) render();
    showToast(item.name + ' restored to wishlist.', 'success');
}

/* ================================================================
   BULK ACTIONS
   ================================================================ */
function wireBulkActions() {
    const addAllBtn = document.getElementById('addAllToCartBtn');
    if (addAllBtn) {
        addAllBtn.addEventListener('click', () => {
            const inStock = wishlistData.filter(i => i.stock !== 'out');
            if (inStock.length === 0) {
                showToast('No in-stock items to add.', 'warning');
                return;
            }
            showToast(inStock.length + ' item' + (inStock.length > 1 ? 's' : '') + ' added to your cart.', 'success');
        });
    }

    const clearBtn = document.getElementById('clearWishlistBtn');
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            if (wishlistData.length === 0) return;
            removedStack.push(...wishlistData);
            wishlistData = [];
            filteredItems = [];
            render();
            showToast('Wishlist cleared.', 'warning', true, null);
        });
    }
}

/* ================================================================
   TOAST WITH UNDO
   ================================================================ */
function showToast(message, type, showUndo, undoItem) {
    type = type || 'info';
    const iconMap = { success: 'fa-solid fa-circle-check', info: 'fa-solid fa-circle-info', warning: 'fa-solid fa-triangle-exclamation' };
    const toast = document.createElement('div');
    toast.className = 'toast';
    let html = '<i class="toast-icon ' + type + ' ' + iconMap[type] + '"></i><span class="toast-msg">' + message + '</span>';
    if (showUndo && undoItem) {
        html += '<button class="toast-undo" data-undo-id="' + undoItem.id + '">Undo</button>';
    }
    toast.innerHTML = html;
    document.getElementById('toastContainer').appendChild(toast);

    requestAnimationFrame(() => requestAnimationFrame(() => toast.classList.add('visible')));

    /* Undo button */
    const undoBtn = toast.querySelector('.toast-undo');
    if (undoBtn) {
        undoBtn.addEventListener('click', () => {
            const item = removedStack.find(i => i.id === parseInt(undoBtn.dataset.undoId, 10));
            if (item) undoRemove(item);
            toast.classList.remove('visible');
            setTimeout(() => toast.remove(), 400);
        });
    }

    setTimeout(() => {
        toast.classList.remove('visible');
        setTimeout(() => toast.remove(), 400);
    }, showUndo ? 5000 : 3500);
}

/* ================================================================
   SIDEBAR
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

/* Topbar search */
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
if (searchBtn && searchInput) {
    searchBtn.addEventListener('click', () => { const q = searchInput.value.trim(); if (q) window.location.href = '/shop?search=' + encodeURIComponent(q); });
    searchInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') searchBtn.click(); });
}
const notifToggle = document.getElementById('notifToggle');
if (notifToggle) notifToggle.addEventListener('click', () => showToast('You have no new notifications.', 'info'));

/* ================================================================
   INIT
   ================================================================ */
render();
</script>
</body>
</html>