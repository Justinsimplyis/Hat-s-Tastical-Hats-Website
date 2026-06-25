<?php
// You can fetch cart data here later
// Example: $cartItems = getUserCart($_SESSION['user']['id']);
//          $cartTotal = calculateCartTotal($cartItems);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>My Cart | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — My Cart
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
   MAIN CONTENT — CART
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 0.82rem; color: var(--fg-muted); margin-bottom: 24px; flex-wrap: wrap; }
.breadcrumb a { color: var(--fg-secondary); font-weight: 500; transition: color var(--duration) var(--ease); }
.breadcrumb a:hover { color: var(--red); }
.breadcrumb .sep { color: var(--cream-deeper); font-size: 0.65rem; }
.breadcrumb .current { color: var(--fg); font-weight: 600; }

/* ── Page Header ──────────────────────────────────────────────── */
.page-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 20px; flex-wrap: wrap; }
.page-header-left h1 { font-size: 1.45rem; font-weight: 700; color: var(--fg); line-height: 1.3; letter-spacing: -0.02em; margin-bottom: 4px; }
.page-header-left p { font-size: 0.87rem; color: var(--fg-muted); }

/* ── Free Shipping Bar ────────────────────────────────────────── */
.shipping-bar-wrap {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 18px 24px; margin-bottom: 24px;
}
.shipping-bar-info { display: flex; align-items: center; justify-content: space-between; margin-bottom: 10px; flex-wrap: wrap; gap: 8px; }
.shipping-bar-info .label { font-size: 0.85rem; font-weight: 600; color: var(--fg); display: flex; align-items: center; gap: 8px; }
.shipping-bar-info .label i { color: var(--red); }
.shipping-bar-info .amount { font-size: 0.84rem; font-weight: 600; color: var(--fg-secondary); }
.shipping-bar-info .amount span { color: var(--red); font-weight: 700; }
.shipping-bar-info .achieved { color: #2D9B6E; font-weight: 600; font-size: 0.84rem; display: flex; align-items: center; gap: 6px; }
.shipping-progress { height: 8px; background: var(--cream); border-radius: var(--radius-full); overflow: hidden; position: relative; }
.shipping-progress-fill { height: 100%; border-radius: var(--radius-full); background: linear-gradient(90deg, var(--red), var(--pink)); transition: width 0.5s var(--ease); position: relative; }
.shipping-progress-fill.complete { background: linear-gradient(90deg, #2D9B6E, #4CC38A); }

/* ── Cart Layout ──────────────────────────────────────────────── */
.cart-layout {
    display: grid; grid-template-columns: 1fr 380px; gap: 24px;
    margin-bottom: 32px;
}

/* ── Cart Items Panel ─────────────────────────────────────────── */
.cart-items-panel {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden;
}
.cart-items-header {
    padding: 18px 24px; border-bottom: 1px solid var(--border-light);
    display: flex; align-items: center; justify-content: space-between;
}
.cart-items-header h2 { font-size: 1rem; font-weight: 700; color: var(--fg); display: flex; align-items: center; gap: 10px; }
.cart-items-header h2 i { color: var(--red); font-size: 0.9rem; }
.cart-count-badge {
    font-size: 0.72rem; font-weight: 700; background: var(--red);
    color: #fff; padding: 2px 9px; border-radius: var(--radius-full);
}
.clear-cart-btn { font-size: 0.8rem; font-weight: 500; color: var(--fg-muted); display: flex; align-items: center; gap: 5px; transition: color var(--duration) var(--ease); }
.clear-cart-btn:hover { color: var(--red); }

/* ── Cart Item ────────────────────────────────────────────────── */
.cart-item {
    display: flex; align-items: flex-start; gap: 18px;
    padding: 22px 24px; border-bottom: 1px solid var(--border-light);
    transition: background var(--duration) var(--ease);
    position: relative;
}
.cart-item:hover { background: var(--pink-muted); }
.cart-item:last-child { border-bottom: none; }
.cart-item.removing { opacity: 0; transform: translateX(-30px); pointer-events: none; transition: all 0.35s var(--ease); }

.cart-item-img {
    width: 100px; height: 100px; border-radius: var(--radius-md);
    background: var(--cream); overflow: hidden; flex-shrink: 0;
    border: 1px solid var(--border-light);
}
.cart-item-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
.cart-item-img a { display: block; }

.cart-item-info { flex: 1; min-width: 0; }
.cart-item-category { font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: var(--pink); margin-bottom: 3px; }
.cart-item-name { font-size: 0.95rem; font-weight: 700; color: var(--fg); margin-bottom: 4px; line-height: 1.3; }
.cart-item-name a { transition: color var(--duration) var(--ease); }
.cart-item-name a:hover { color: var(--red); }
.cart-item-variant { font-size: 0.82rem; color: var(--fg-muted); margin-bottom: 12px; }
.cart-item-stock { font-size: 0.74rem; font-weight: 600; display: flex; align-items: center; gap: 5px; margin-bottom: 2px; }
.stock-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.stock-in { color: #2D9B6E; }
.stock-in .stock-dot { background: #2D9B6E; }
.stock-low { color: #D4942A; }
.stock-low .stock-dot { background: #D4942A; }

.cart-item-right { flex-shrink: 0; display: flex; flex-direction: column; align-items: flex-end; gap: 10px; }
.cart-item-remove {
    width: 28px; height: 28px; border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.78rem; color: var(--fg-muted);
    transition: all var(--duration) var(--ease);
}
.cart-item-remove:hover { background: var(--red-light); color: var(--red); }

.cart-item-bottom { display: flex; align-items: center; justify-content: space-between; width: 100%; margin-top: auto; padding-top: 8px; }

/* ── Quantity Controls ────────────────────────────────────────── */
.qty-control { display: flex; align-items: center; border: 1px solid var(--border-light); border-radius: var(--radius-sm); overflow: hidden; background: var(--bg); }
.qty-btn {
    width: 34px; height: 34px; display: flex; align-items: center; justify-content: center;
    font-size: 0.8rem; color: var(--fg-secondary);
    transition: all var(--duration) var(--ease);
}
.qty-btn:hover:not(:disabled) { background: var(--cream); color: var(--fg); }
.qty-btn:disabled { opacity: 0.3; cursor: not-allowed; }
.qty-value {
    width: 40px; text-align: center; font-size: 0.88rem; font-weight: 700;
    color: var(--fg); border-left: 1px solid var(--border-light);
    border-right: 1px solid var(--border-light); line-height: 34px;
    user-select: none;
}

.cart-item-price { text-align: right; }
.cart-item-unit { font-size: 0.76rem; color: var(--fg-muted); margin-bottom: 2px; }
.cart-item-total { font-size: 1.08rem; font-weight: 800; color: var(--fg); }

/* ── Order Summary ────────────────────────────────────────────── */
.order-summary {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden; position: sticky; top: calc(var(--topbar-height) + 28px);
}
.order-summary-header {
    padding: 18px 24px; border-bottom: 1px solid var(--border-light);
}
.order-summary-header h3 { font-size: 1rem; font-weight: 700; color: var(--fg); display: flex; align-items: center; gap: 10px; }
.order-summary-header h3 i { color: var(--red); font-size: 0.85rem; }

.order-summary-body { padding: 20px 24px; }
.summary-row { display: flex; justify-content: space-between; padding: 8px 0; font-size: 0.87rem; color: var(--fg-secondary); }
.summary-row .label { display: flex; align-items: center; gap: 4px; }
.summary-row .free { color: #2D9B6E; font-weight: 600; }
.summary-row .discount { color: #2D9B6E; font-weight: 600; }
.summary-row.grand { padding-top: 14px; margin-top: 10px; border-top: 2px solid var(--border); font-size: 1.15rem; font-weight: 800; color: var(--fg); }

.summary-savings {
    background: rgba(45,155,110,0.08); border: 1px solid rgba(45,155,110,0.15);
    border-radius: var(--radius-sm); padding: 10px 14px; margin-top: 12px;
    display: flex; align-items: center; gap: 10px; font-size: 0.82rem; color: #2D9B6E; font-weight: 600;
}
.summary-savings i { font-size: 1rem; }

/* ── Coupon Code ──────────────────────────────────────────────── */
.coupon-section { padding: 0 24px 20px; }
.coupon-input-wrap {
    display: flex; gap: 8px; margin-bottom: 8px;
}
.coupon-input {
    flex: 1; height: 40px; padding: 0 14px;
    background: var(--cream); border: 1px solid var(--border-light);
    border-radius: var(--radius-sm); font-size: 0.84rem; color: var(--fg);
    transition: all var(--duration) var(--ease);
}
.coupon-input::placeholder { color: var(--fg-muted); }
.coupon-input:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }
.coupon-input.error { border-color: var(--red); }
.coupon-input.success { border-color: #2D9B6E; }
.coupon-apply-btn {
    height: 40px; padding: 0 18px; border-radius: var(--radius-sm);
    background: var(--red); color: #fff; font-size: 0.82rem; font-weight: 600;
    transition: all var(--duration) var(--ease); white-space: nowrap;
}
.coupon-apply-btn:hover { background: var(--red-hover); }
.coupon-msg { font-size: 0.76rem; font-weight: 500; min-height: 18px; }
.coupon-msg.error { color: var(--red); }
.coupon-msg.success { color: #2D9B6E; }

.coupon-applied {
    display: flex; align-items: center; justify-content: space-between;
    background: rgba(45,155,110,0.08); border: 1px solid rgba(45,155,110,0.15);
    border-radius: var(--radius-sm); padding: 10px 14px;
}
.coupon-applied-info { display: flex; align-items: center; gap: 8px; font-size: 0.82rem; color: #2D9B6E; font-weight: 600; }
.coupon-remove-btn { font-size: 0.76rem; color: var(--fg-muted); transition: color var(--duration) var(--ease); }
.coupon-remove-btn:hover { color: var(--red); }

/* ── Checkout Button ──────────────────────────────────────────── */
.checkout-section { padding: 0 24px 24px; }
.checkout-btn {
    width: 100%; height: 50px; border-radius: var(--radius-md);
    background: var(--red); color: #fff; font-size: 0.95rem; font-weight: 700;
    display: flex; align-items: center; justify-content: center; gap: 10px;
    transition: all 0.25s var(--ease); box-shadow: 0 4px 12px rgba(201,59,57,0.2);
}
.checkout-btn:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 8px 20px rgba(201,59,57,0.3); }
.checkout-btn:active { transform: translateY(0); }

.checkout-trust { display: flex; align-items: center; justify-content: center; gap: 16px; margin-top: 14px; flex-wrap: wrap; }
.trust-item { font-size: 0.74rem; color: var(--fg-muted); display: flex; align-items: center; gap: 5px; }
.trust-item i { font-size: 0.72rem; color: #2D9B6E; }

/* ── Continue Shopping ─────────────────────────────────────────── */
.continue-shopping {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 0.85rem; font-weight: 500; color: var(--fg-secondary);
    padding: 10px 0; transition: color var(--duration) var(--ease);
}
.continue-shopping:hover { color: var(--red); }
.continue-shopping i { transition: transform var(--duration) var(--ease); }
.continue-shopping:hover i { transform: translateX(-3px); }

/* ── Suggested Items ──────────────────────────────────────────── */
.suggested-section { margin-bottom: 28px; }
.suggested-section h3 {
    font-size: 1.05rem; font-weight: 700; color: var(--fg);
    margin-bottom: 18px; display: flex; align-items: center; gap: 10px;
}
.suggested-section h3 i { color: var(--red); font-size: 0.9rem; }
.suggested-grid {
    display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 16px;
}
.suggested-card {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    overflow: hidden; transition: all 0.25s var(--ease);
}
.suggested-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.suggested-card-img { width: 100%; aspect-ratio: 5/3; background: var(--cream); overflow: hidden; }
.suggested-card-img img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s var(--ease); }
.suggested-card:hover .suggested-card-img img { transform: scale(1.05); }
.suggested-card-body { padding: 14px 16px; }
.suggested-card-name { font-size: 0.85rem; font-weight: 600; color: var(--fg); margin-bottom: 6px; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.suggested-card-price { font-size: 0.92rem; font-weight: 700; color: var(--fg); margin-bottom: 10px; }
.suggested-add-btn {
    width: 100%; height: 34px; border-radius: var(--radius-sm);
    background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light);
    font-size: 0.8rem; font-weight: 600;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    transition: all var(--duration) var(--ease);
}
.suggested-add-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }

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
@media (max-width: 1100px) { .cart-layout { grid-template-columns: 1fr; } .order-summary { position: static; } }
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
    .cart-item { padding: 16px; gap: 14px; flex-wrap: wrap; }
    .cart-item-img { width: 80px; height: 80px; }
    .cart-item-right { flex-direction: row; align-items: center; width: 100%; justify-content: space-between; }
    .cart-item-bottom { flex-wrap: wrap; gap: 10px; }
    .suggested-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
}
@media (max-width: 480px) {
    .suggested-grid { grid-template-columns: 1fr; }
    .cart-item-img { width: 100%; height: 160px; }
    .cart-item { flex-direction: column; }
    .cart-item-right { flex-direction: column; align-items: stretch; }
    .cart-item-bottom { flex-direction: column; }
    .cart-item-price { text-align: left; }
    .checkout-trust { gap: 10px; }
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
                <a href="/api/users/manage_cart.php" role="menuitem" class="active" aria-current="page">My Cart</a>
                <a href="/api/users/manage_wishlist.php" role="menuitem">Wishlist</a>
            </div>
        </div>
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="My Orders">
                <i class="fa-solid fa-history nav-icon"></i>
                <span class="nav-label">My Orders History</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/users/manage_orders.php" role="menuitem">My Orders</a>
                <a href="/api/users/manage_order_history.php" role="menuitem">My Orders History</a>
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
                <h2>My Cart</h2>
                <p>Review your items before checkout.</p>
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
   CART DATA — Replace with PHP/AJAX in production
   ================================================================ */
const FREE_SHIPPING_THRESHOLD = 75;

let cartData = [
    {
        id: 1, name: "Velvet Wide-Brim Fedora", category: "Fedora",
        variant: "Burgundy / Medium", sku: "VWF-BUR-M",
        price: 118.00, originalPrice: null,
        qty: 1, maxQty: 8, stock: "in",
        img: "https://picsum.photos/seed/cart-fedora-velvet/200/200.jpg",
        slug: "velvet-wide-brim-fedora"
    },
    {
        id: 2, name: "Straw Picot Hat with Silk Ribbon", category: "Sun Hat",
        variant: "Ivory / Medium", sku: "SPH-IVY-M",
        price: 62.00, originalPrice: 78.00,
        qty: 1, maxQty: 5, stock: "in",
        img: "https://picsum.photos/seed/cart-straw-picot/200/200.jpg",
        slug: "straw-picot-silk-ribbon"
    },
    {
        id: 3, name: "Hand-Felted Cloche", category: "Cloche",
        variant: "Plum / Small", sku: "HFC-PLU-S",
        price: 95.00, originalPrice: null,
        qty: 2, maxQty: 4, stock: "in",
        img: "https://picsum.photos/seed/cart-cloche-felt/200/200.jpg",
        slug: "hand-felted-cloche"
    },
    {
        id: 4, name: "Linen Bucket Hat", category: "Bucket",
        variant: "Sage / Medium", sku: "LBH-SAG-M",
        price: 48.00, originalPrice: null,
        qty: 1, maxQty: 2, stock: "low",
        img: "https://picsum.photos/seed/cart-bucket-linen/200/200.jpg",
        slug: "linen-bucket-hat"
    },
    {
        id: 5, name: "Silk Ribbon Band — Navy", category: "Accessories",
        variant: "Navy Blue / One Size", sku: "SRB-NVY-OS",
        price: 12.00, originalPrice: null,
        qty: 3, maxQty: 20, stock: "in",
        img: "https://picsum.photos/seed/cart-ribbon-navy/200/200.jpg",
        slug: "silk-ribbon-band-navy"
    }
];

/* Valid coupon codes */
const COUPONS = {
    "HATTIE15": { type: "percent", value: 15, label: "15% off" },
    "HAT10":    { type: "fixed", value: 10, label: "\u00A310 off" },
    "FREESHIP": { type: "shipping", value: 0, label: "Free shipping" }
};

let appliedCoupon = null;
let removedStack = [];

/* Suggested items */
const suggestedItems = [
    { name: "Tweed Newsboy Cap", price: 52.00, img: "https://picsum.photos/seed/sug-newsboy/400/240.jpg", slug: "tweed-newsboy-cap" },
    { name: "Panama Hat — Optimo", price: 88.00, img: "https://picsum.photos/seed/sug-panama/400/240.jpg", slug: "panama-optimo-style" },
    { name: "Embroidered Baseball Cap", price: 28.00, img: "https://picsum.photos/seed/sug-baseball/400/240.jpg", slug: "embroidered-baseball-cap" },
    { name: "Feather Fascinator", price: 35.00, img: "https://picsum.photos/seed/sug-fascinator/400/240.jpg", slug: "feather-fascinator" }
];

/* ================================================================
   HELPERS
   ================================================================ */
function formatCurrency(n) { return '\u00A3' + n.toFixed(2); }

function getSubtotal() {
    return cartData.reduce((sum, item) => sum + (item.price * item.qty), 0);
}

function getItemCount() {
    return cartData.reduce((sum, item) => sum + item.qty, 0);
}

function getShipping(subtotal) {
    if (appliedCoupon && appliedCoupon.type === 'shipping') return 0;
    return subtotal >= FREE_SHIPPING_THRESHOLD ? 0 : 5.99;
}

function getDiscount(subtotal) {
    if (!appliedCoupon) return 0;
    if (appliedCoupon.type === 'percent') return subtotal * (appliedCoupon.value / 100);
    if (appliedCoupon.type === 'fixed') return Math.min(appliedCoupon.value, subtotal);
    return 0;
}

function getTotalSavings() {
    let savings = 0;
    cartData.forEach(item => {
        if (item.originalPrice) savings += (item.originalPrice - item.price) * item.qty;
    });
    savings += getDiscount(getSubtotal());
    return savings;
}

/* ================================================================
   RENDER
   ================================================================ */
function render() {
    const mainContent = document.getElementById('mainContent');

    if (cartData.length === 0) {
        mainContent.innerHTML = renderEmpty();
        return;
    }

    const subtotal = getSubtotal();
    const shipping = getShipping(subtotal);
    const discount = getDiscount(subtotal);
    const total = subtotal - discount + shipping;
    const itemCount = getItemCount();
    const savings = getTotalSavings();
    const shippingProgress = Math.min((subtotal / FREE_SHIPPING_THRESHOLD) * 100, 100);
    const shippingRemaining = Math.max(FREE_SHIPPING_THRESHOLD - subtotal, 0);
    const freeShippingAchieved = subtotal >= FREE_SHIPPING_THRESHOLD;

    mainContent.innerHTML = `
        <!-- Breadcrumb -->
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/dashboards/user/index.php">Dashboard</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <a href="#" onclick="return false">My Shopping</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">My Cart</span>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-left">
                <h1>Shopping Cart</h1>
                <p>${itemCount} item${itemCount !== 1 ? 's' : ''} in your cart</p>
            </div>
            <a href="/shop.php" class="continue-shopping"><i class="fa-solid fa-arrow-left"></i> Continue Shopping</a>
        </div>

        <!-- Free Shipping Bar -->
        <div class="shipping-bar-wrap">
            <div class="shipping-bar-info">
                ${freeShippingAchieved
                    ? '<div class="achieved"><i class="fa-solid fa-circle-check"></i> You\'ve earned free shipping!</div>'
                    : '<div class="label"><i class="fa-solid fa-truck"></i> Add <span>' + formatCurrency(shippingRemaining) + '</span> more for free shipping</div>'
                }
            </div>
            <div class="shipping-progress">
                <div class="shipping-progress-fill ${freeShippingAchieved ? 'complete' : ''}" style="width:${shippingProgress}%"></div>
            </div>
        </div>

        <!-- Cart Layout -->
        <div class="cart-layout">
            <!-- Items -->
            <div>
                <div class="cart-items-panel">
                    <div class="cart-items-header">
                        <h2><i class="fa-solid fa-bag-shopping"></i> Cart Items <span class="cart-count-badge">${itemCount}</span></h2>
                        <button class="clear-cart-btn" id="clearCartBtn"><i class="fa-solid fa-trash-can"></i> Clear</button>
                    </div>
                    <div id="cartItemsContainer">
                        ${cartData.map(renderCartItem).join('')}
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <div class="order-summary-header">
                    <h3><i class="fa-solid fa-receipt"></i> Order Summary</h3>
                </div>
                <div class="order-summary-body">
                    <div class="summary-row"><span class="label">Subtotal (${itemCount} items)</span><span>${formatCurrency(subtotal)}</span></div>
                    ${discount > 0 ? '<div class="summary-row"><span class="label">Discount</span><span class="discount">-' + formatCurrency(discount) + '</span></div>' : ''}
                    <div class="summary-row"><span class="label">Shipping</span><span>${shipping === 0 ? '<span class="free">Free</span>' : formatCurrency(shipping)}</span></div>
                    <div class="summary-row grand"><span>Total</span><span>${formatCurrency(total)}</span></div>
                    ${savings > 0 ? '<div class="summary-savings"><i class="fa-solid fa-piggy-bank"></i> You\'re saving ' + formatCurrency(savings) + ' on this order!</div>' : ''}
                </div>

                <!-- Coupon -->
                <div class="coupon-section" id="couponSection">
                    ${appliedCoupon ? renderAppliedCoupon() : renderCouponInput()}
                </div>

                <!-- Checkout -->
                <div class="checkout-section">
                    <button class="checkout-btn" id="checkoutBtn"><i class="fa-solid fa-lock"></i> Proceed to Checkout</button>
                    <div class="checkout-trust">
                        <span class="trust-item"><i class="fa-solid fa-shield-halved"></i> Secure Payment</span>
                        <span class="trust-item"><i class="fa-solid fa-rotate-left"></i> 30-Day Returns</span>
                        <span class="trust-item"><i class="fa-solid fa-truck-fast"></i> Fast Delivery</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Suggested Items -->
        <div class="suggested-section">
            <h3><i class="fa-solid fa-sparkles"></i> You Might Also Like</h3>
            <div class="suggested-grid">
                ${suggestedItems.map(item => `
                    <div class="suggested-card">
                        <div class="suggested-card-img">
                            <a href="/shop/${item.slug}"><img src="${item.img}" alt="${item.name}" loading="lazy"></a>
                        </div>
                        <div class="suggested-card-body">
                            <div class="suggested-card-name"><a href="/shop/${item.slug}">${item.name}</a></div>
                            <div class="suggested-card-price">${formatCurrency(item.price)}</div>
                            <button class="suggested-add-btn" data-suggest-name="${item.name}"><i class="fa-solid fa-plus"></i> Add to Cart</button>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;

    wireCartActions();
}

function renderCartItem(item) {
    const lineTotal = item.price * item.qty;
    const stockClass = item.stock === 'low' ? 'stock-low' : 'stock-in';
    const stockLabel = item.stock === 'low' ? 'Low Stock \u2014 Only ' + item.maxQty + ' left' : 'In Stock';

    return `
        <div class="cart-item" data-id="${item.id}">
            <div class="cart-item-img">
                <a href="/shop/${item.slug}"><img src="${item.img}" alt="${item.name}" loading="lazy"></a>
            </div>
            <div class="cart-item-info">
                <div class="cart-item-category">${item.category}</div>
                <div class="cart-item-name"><a href="/shop/${item.slug}">${item.name}</a></div>
                <div class="cart-item-variant">${item.variant}</div>
                <div class="cart-item-stock ${stockClass}"><span class="stock-dot"></span> ${stockLabel}</div>
            </div>
            <div class="cart-item-right">
                <button class="cart-item-remove" data-remove="${item.id}" aria-label="Remove ${item.name}"><i class="fa-solid fa-xmark"></i></button>
                <div class="cart-item-price">
                    <div class="cart-item-unit">${formatCurrency(item.price)} each</div>
                    <div class="cart-item-total">${formatCurrency(lineTotal)}</div>
                </div>
                <div class="qty-control">
                    <button class="qty-btn" data-qty-action="decrease" data-qty-id="${item.id}" ${item.qty <= 1 ? 'disabled' : ''} aria-label="Decrease quantity"><i class="fa-solid fa-minus"></i></button>
                    <div class="qty-value" id="qty-${item.id}">${item.qty}</div>
                    <button class="qty-btn" data-qty-action="increase" data-qty-id="${item.id}" ${item.qty >= item.maxQty ? 'disabled' : ''} aria-label="Increase quantity"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
        </div>
    `;
}

function renderCouponInput() {
    return `
        <div class="coupon-input-wrap">
            <input type="text" class="coupon-input" id="couponInput" placeholder="Enter coupon code" autocomplete="off" spellcheck="false">
            <button class="coupon-apply-btn" id="couponApplyBtn">Apply</button>
        </div>
        <div class="coupon-msg" id="couponMsg"></div>
    `;
}

function renderAppliedCoupon() {
    return `
        <div class="coupon-applied">
            <div class="coupon-applied-info">
                <i class="fa-solid fa-ticket"></i>
                <span>${appliedCoupon.code} \u2014 ${appliedCoupon.label}</span>
            </div>
            <button class="coupon-remove-btn" id="couponRemoveBtn">Remove</button>
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
            <span class="current">My Cart</span>
        </nav>
        <div class="empty-state">
            <div class="empty-state-icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <h3>Your cart is empty</h3>
            <p>Looks like you haven't added any hats yet. Browse our collection and find the perfect piece for your collection.</p>
            <div class="empty-state-btns">
                <a href="/shop.php" class="btn btn-primary" style="height:44px;padding:0 28px;border-radius:var(--radius-sm);background:var(--red);color:#fff;font-size:0.9rem;font-weight:600;display:inline-flex;align-items:center;gap:8px;transition:all var(--duration) var(--ease);"><i class="fa-solid fa-shopping-bag"></i> Browse Hats</a>
                <a href="/api/users/manage_wishlist.php" class="btn btn-secondary" style="height:44px;padding:0 28px;border-radius:var(--radius-sm);background:var(--cream);color:var(--fg-secondary);border:1px solid var(--border-light);font-size:0.9rem;font-weight:600;display:inline-flex;align-items:center;gap:8px;transition:all var(--duration) var(--ease);"><i class="fa-solid fa-heart"></i> View Wishlist</a>
            </div>
        </div>
    `;
}

/* ================================================================
   CART ACTIONS
   ================================================================ */
function wireCartActions() {
    /* Remove buttons */
    document.querySelectorAll('[data-remove]').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = parseInt(btn.dataset.remove, 10);
            removeItem(id);
        });
    });

    /* Quantity buttons */
    document.querySelectorAll('[data-qty-action]').forEach(btn => {
        btn.addEventListener('click', () => {
            const id = parseInt(btn.dataset.qtyId, 10);
            const action = btn.dataset.qtyAction;
            changeQty(id, action);
        });
    });

    /* Clear cart */
    const clearBtn = document.getElementById('clearCartBtn');
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            removedStack.push(...cartData.map(i => ({...i})));
            cartData = [];
            render();
            showToast('Cart cleared.', 'warning');
        });
    }

    /* Coupon apply */
    const couponApplyBtn = document.getElementById('couponApplyBtn');
    const couponInput = document.getElementById('couponInput');
    if (couponApplyBtn && couponInput) {
        const applyCoupon = () => {
            const code = couponInput.value.trim().toUpperCase();
            const msgEl = document.getElementById('couponMsg');

            if (!code) {
                msgEl.className = 'coupon-msg error';
                msgEl.textContent = 'Please enter a coupon code.';
                couponInput.classList.add('error');
                couponInput.classList.remove('success');
                return;
            }

            if (COUPONS[code]) {
                appliedCoupon = { ...COUPONS[code], code: code };
                render();
                showToast('Coupon "' + code + '" applied \u2014 ' + COUPONS[code].label + '!', 'success');
            } else {
                msgEl.className = 'coupon-msg error';
                msgEl.textContent = 'Invalid coupon code. Please try again.';
                couponInput.classList.add('error');
                couponInput.classList.remove('success');
            }
        };

        couponApplyBtn.addEventListener('click', applyCoupon);
        couponInput.addEventListener('keydown', (e) => { if (e.key === 'Enter') applyCoupon(); });
        couponInput.addEventListener('input', () => {
            couponInput.classList.remove('error', 'success');
            document.getElementById('couponMsg').textContent = '';
        });
    }

    /* Coupon remove */
    const couponRemoveBtn = document.getElementById('couponRemoveBtn');
    if (couponRemoveBtn) {
        couponRemoveBtn.addEventListener('click', () => {
            const code = appliedCoupon.code;
            appliedCoupon = null;
            render();
            showToast('Coupon "' + code + '" removed.', 'info');
        });
    }

    /* Checkout */
    const checkoutBtn = document.getElementById('checkoutBtn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            /* In production: POST to checkout endpoint */
            showToast('Redirecting to checkout...', 'info');
            /* window.location.href = '/checkout.php'; */
        });
    }

    /* Suggested add to cart */
    document.querySelectorAll('[data-suggest-name]').forEach(btn => {
        btn.addEventListener('click', () => {
            const name = btn.dataset.suggestName;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Added';
            btn.style.background = 'var(--red)';
            btn.style.color = '#fff';
            btn.style.borderColor = 'var(--red)';
            btn.disabled = true;
            showToast(name + ' added to cart.', 'success');
            setTimeout(() => {
                btn.innerHTML = '<i class="fa-solid fa-plus"></i> Add to Cart';
                btn.style.background = '';
                btn.style.color = '';
                btn.style.borderColor = '';
                btn.disabled = false;
            }, 2000);
        });
    });
}

function removeItem(id) {
    const idx = cartData.findIndex(i => i.id === id);
    if (idx === -1) return;

    const removed = cartData.splice(idx, 1)[0];
    removedStack.push(removed);

    /* If removing item would drop below free shipping and coupon is shipping type, remove coupon */
    if (appliedCoupon && appliedCoupon.type === 'shipping') {
        appliedCoupon = null;
    }

    const card = document.querySelector('.cart-item[data-id="' + id + '"]');
    if (card) {
        card.classList.add('removing');
        setTimeout(() => render(), 350);
    } else {
        render();
    }

    showToast(removed.name + ' removed.', 'warning', true, removed);
}

function changeQty(id, action) {
    const item = cartData.find(i => i.id === id);
    if (!item) return;

    if (action === 'increase' && item.qty < item.maxQty) {
        item.qty++;
    } else if (action === 'decrease' && item.qty > 1) {
        item.qty--;
    } else {
        return;
    }

    render();
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

    const undoBtn = toast.querySelector('.toast-undo');
    if (undoBtn) {
        undoBtn.addEventListener('click', () => {
            const item = removedStack.find(i => i.id === parseInt(undoBtn.dataset.undoId, 10));
            if (item) {
                cartData.push(item);
                removedStack = removedStack.filter(i => i.id !== item.id);
                render();
                showToast(item.name + ' restored to cart.', 'success');
            }
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