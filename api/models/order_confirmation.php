<?php
// Order confirmation page — accessed after successful checkout
// In production: $order = getJustPlacedOrder($_SESSION['last_order_id']);
// Then redirect here: header('Location: order_confirmation.php?id=HH-10025');
 $orderId = $_GET['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>Order Confirmation | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — Order Confirmation
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
   MAIN CONTENT — ORDER CONFIRMATION
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Success Hero ─────────────────────────────────────────────── */
.success-hero {
    background: var(--card);
    border: 1px solid var(--border-light);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    padding: 48px 40px;
    text-align: center;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
}

/* Subtle decorative shapes */
.success-hero::before {
    content: ''; position: absolute; top: -60px; right: -60px;
    width: 200px; height: 200px; border-radius: 50%;
    background: var(--red-muted); pointer-events: none;
}
.success-hero::after {
    content: ''; position: absolute; bottom: -40px; left: -40px;
    width: 140px; height: 140px; border-radius: 50%;
    background: var(--pink-muted); pointer-events: none;
}

.success-check-ring {
    width: 88px; height: 88px; border-radius: 50%;
    background: linear-gradient(135deg, var(--red), #e06a68);
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 24px; position: relative; z-index: 1;
    box-shadow: 0 8px 24px rgba(201, 59, 57, 0.30);
    animation: checkPop 0.5s var(--ease) 0.1s both;
}
.success-check-ring i {
    font-size: 2rem; color: #fff;
    animation: checkDraw 0.4s var(--ease) 0.45s both;
}

@keyframes checkPop {
    0% { transform: scale(0); opacity: 0; }
    60% { transform: scale(1.15); }
    100% { transform: scale(1); opacity: 1; }
}
@keyframes checkDraw {
    0% { opacity: 0; transform: scale(0.5) rotate(-15deg); }
    100% { opacity: 1; transform: scale(1) rotate(0deg); }
}

.success-hero h1 {
    font-size: 1.65rem; font-weight: 800; color: var(--fg);
    margin-bottom: 8px; position: relative; z-index: 1;
    letter-spacing: -0.02em;
    animation: fadeUp 0.5s var(--ease) 0.3s both;
}
.success-hero .success-sub {
    font-size: 0.95rem; color: var(--fg-secondary);
    margin-bottom: 20px; position: relative; z-index: 1;
    animation: fadeUp 0.5s var(--ease) 0.4s both;
}

@keyframes fadeUp {
    0% { opacity: 0; transform: translateY(12px); }
    100% { opacity: 1; transform: translateY(0); }
}

.order-number-box {
    display: inline-flex; align-items: center; gap: 10px;
    background: var(--cream); border: 1px solid var(--cream-deeper);
    border-radius: var(--radius-md); padding: 10px 22px;
    position: relative; z-index: 1;
    animation: fadeUp 0.5s var(--ease) 0.5s both;
}
.order-number-box .label { font-size: 0.78rem; color: var(--fg-muted); font-weight: 500; }
.order-number-box .number {
    font-size: 1.05rem; font-weight: 800; color: var(--red);
    font-family: 'Courier New', monospace; letter-spacing: 0.04em;
}
.order-number-box .copy-btn {
    width: 28px; height: 28px; border-radius: var(--radius-sm);
    display: flex; align-items: center; justify-content: center;
    color: var(--fg-muted); font-size: 0.78rem;
    transition: all var(--duration) var(--ease);
}
.order-number-box .copy-btn:hover { background: var(--cream-dark); color: var(--red); }

/* ── Confirmation CTA Buttons ─────────────────────────────────── */
.confirmation-ctas {
    display: flex; align-items: center; justify-content: center;
    gap: 14px; margin-top: 28px; position: relative; z-index: 1;
    animation: fadeUp 0.5s var(--ease) 0.6s both;
    flex-wrap: wrap;
}

.btn {
    height: 44px; padding: 0 24px; border-radius: var(--radius-sm);
    font-size: 0.88rem; font-weight: 600;
    display: inline-flex; align-items: center; gap: 8px;
    transition: all var(--duration) var(--ease);
    white-space: nowrap;
}
.btn-primary { background: var(--red); color: #fff; }
.btn-primary:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(201,59,57,0.3); }
.btn-secondary { background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light); }
.btn-secondary:hover { background: var(--cream-dark); color: var(--fg); }
.btn-outline { background: transparent; color: var(--red); border: 1px solid var(--red); }
.btn-outline:hover { background: var(--red); color: #fff; }
.btn-ghost { color: var(--fg-secondary); }
.btn-ghost:hover { color: var(--red); background: var(--red-light); }

/* ── Two Column Detail Grid ───────────────────────────────────── */
.detail-grid {
    display: grid; grid-template-columns: 1fr 380px; gap: 24px;
    margin-bottom: 28px;
    animation: fadeUp 0.5s var(--ease) 0.65s both;
}

/* ── Detail Cards ─────────────────────────────────────────────── */
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

/* ── Order Items ──────────────────────────────────────────────── */
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
.price-summary { padding: 20px 24px; border-top: 2px solid var(--border); background: var(--pink-muted); }
.price-row { display: flex; justify-content: space-between; padding: 6px 0; font-size: 0.87rem; color: var(--fg-secondary); }
.price-row.grand { padding-top: 12px; margin-top: 8px; border-top: 1px solid var(--border); font-size: 1.1rem; font-weight: 700; color: var(--fg); }
.price-row .free { color: #2D9B6E; font-weight: 600; }
.price-row .discount { color: #2D9B6E; }

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
.address-block { font-size: 0.84rem; color: var(--fg); line-height: 1.7; font-weight: 500; }

/* ── What Happens Next ────────────────────────────────────────── */
.next-steps {
    background: var(--card); border: 1px solid var(--border-light);
    border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
    padding: 28px 32px; margin-bottom: 28px;
    animation: fadeUp 0.5s var(--ease) 0.75s both;
}
.next-steps h3 {
    font-size: 0.95rem; font-weight: 700; color: var(--fg);
    margin-bottom: 20px; display: flex; align-items: center; gap: 10px;
}
.next-steps h3 i { color: var(--red); font-size: 0.9rem; }

.steps-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
.step-item { text-align: center; }
.step-icon {
    width: 52px; height: 52px; border-radius: 50%;
    background: var(--cream); display: flex; align-items: center; justify-content: center;
    margin: 0 auto 12px; font-size: 1.1rem; color: var(--red);
    transition: all 0.3s var(--ease);
}
.step-item:hover .step-icon { background: var(--red); color: #fff; transform: translateY(-3px); box-shadow: 0 6px 16px rgba(201,59,57,0.25); }
.step-number { font-size: 0.68rem; font-weight: 700; color: var(--red); margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.1em; }
.step-title { font-size: 0.88rem; font-weight: 600; color: var(--fg); margin-bottom: 4px; }
.step-desc { font-size: 0.78rem; color: var(--fg-muted); line-height: 1.5; }

/* ── Promo Banner ─────────────────────────────────────────────── */
.promo-banner {
    background: linear-gradient(135deg, var(--cream), var(--cream-dark));
    border: 1px solid var(--cream-deeper);
    border-radius: var(--radius-lg);
    padding: 28px 32px;
    display: flex; align-items: center; gap: 24px;
    animation: fadeUp 0.5s var(--ease) 0.85s both;
}
.promo-icon {
    width: 64px; height: 64px; border-radius: var(--radius-lg);
    background: var(--red-light); display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: var(--red); flex-shrink: 0;
}
.promo-content { flex: 1; }
.promo-content h4 { font-size: 1.05rem; font-weight: 700; color: var(--fg); margin-bottom: 4px; }
.promo-content p { font-size: 0.85rem; color: var(--fg-secondary); }
.promo-cta { flex-shrink: 0; }

/* ── Confetti Canvas ──────────────────────────────────────────── */
#confettiCanvas {
    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    pointer-events: none; z-index: 5000;
}

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

/* ── Error State ──────────────────────────────────────────────── */
.error-state { text-align: center; padding: 80px 24px; }
.error-state i { font-size: 3.5rem; color: var(--cream-deeper); margin-bottom: 20px; display: block; }
.error-state h2 { font-size: 1.3rem; font-weight: 700; color: var(--fg); margin-bottom: 8px; }
.error-state p { font-size: 0.9rem; color: var(--fg-muted); margin-bottom: 24px; }

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1100px) {
    .detail-grid { grid-template-columns: 1fr; }
    .sidebar-cards { display: grid; grid-template-columns: 1fr 1fr; }
}
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
    .success-hero { padding: 36px 24px; }
    .success-hero h1 { font-size: 1.35rem; }
    .sidebar-cards { grid-template-columns: 1fr; }
    .steps-list { grid-template-columns: 1fr; gap: 20px; }
    .step-item { text-align: left; display: flex; align-items: flex-start; gap: 14px; }
    .step-icon { margin: 0; flex-shrink: 0; }
    .step-number { display: none; }
    .promo-banner { flex-direction: column; text-align: center; padding: 24px 20px; }
    .order-item { padding: 16px; gap: 14px; }
    .order-item-img { width: 56px; height: 56px; }
    .confirmation-ctas { flex-direction: column; }
    .confirmation-ctas .btn { width: 100%; justify-content: center; }
}
@media (max-width: 480px) {
    .order-item-right { text-align: left; }
    .order-number-box { flex-wrap: wrap; justify-content: center; }
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

<!-- Confetti Canvas -->
<canvas id="confettiCanvas"></canvas>

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
                <h2>Order Confirmation</h2>
                <p>Your order has been received successfully.</p>
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
   ORDER DATA
   ================================================================ */
const ordersDB = {
    "HH-10025": {
        id: "HH-10025", date: "2025-06-12",
        placedAt: "2025-06-12T10:47:00",
        estimatedDelivery: "2025-06-15",
        items: [
            { name: "Fascinator with Birdcage Veil", variant: "Ivory / One Size", qty: 1, price: 68.00, sku: "FBV-IVY-OS", img: "https://picsum.photos/seed/hat-fascinator-ivory/200/200.jpg" },
            { name: "Wide-Brim Straw Hat", variant: "Natural / Medium", qty: 1, price: 78.00, sku: "WBS-NAT-M", img: "https://picsum.photos/seed/hat-straw-wide/200/200.jpg" },
            { name: "Hat Pin Pearl Set", variant: "Gold & Pearl", qty: 2, price: 14.50, sku: "HPP-GP-OS", img: "https://picsum.photos/seed/hatpin-pearl/200/200.jpg" }
        ],
        subtotal: 175.00, shipping: 0, discount: 15.00, tax: 0, total: 160.00,
        discountCode: "HATTIE15",
        shippingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "Visa", last4: "4821", icon: "fa-brands fa-cc-visa" }
    },
    "HH-10026": {
        id: "HH-10026", date: "2025-06-12",
        placedAt: "2025-06-12T14:22:00",
        estimatedDelivery: "2025-06-14",
        items: [
            { name: "Wool Fedora Classic", variant: "Charcoal / Large", qty: 1, price: 110.00, sku: "WFC-CHR-L", img: "https://picsum.photos/seed/hat-fedora-wool/200/200.jpg" }
        ],
        subtotal: 110.00, shipping: 5.99, discount: 0, tax: 0, total: 115.99,
        discountCode: null,
        shippingAddress: { name: "Hattie Clarkson", line1: "15 Willow Walk", line2: "Flat 3B", city: "Bristol", county: "Avon", postcode: "BS1 4AB", country: "United Kingdom" },
        billingAddress: { name: "Hattie Clarkson", line1: "42 Rosemary Lane", line2: "", city: "Bath", county: "Somerset", postcode: "BA1 3QR", country: "United Kingdom" },
        payment: { method: "Mastercard", last4: "7356", icon: "fa-brands fa-cc-mastercard" }
    }
};

/* ================================================================
   HELPERS
   ================================================================ */
function formatDate(dateStr) {
    if (!dateStr) return '—';
    const d = new Date(dateStr);
    return d.toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
}
function formatCurrency(n) { return '\u00A3' + n.toFixed(2); }
function getAddressHTML(a) {
    return [a.name, a.line1, a.line2, a.city, a.county, a.postcode, a.country].filter(Boolean).join('<br>');
}

/* ================================================================
   GET ORDER
   ================================================================ */
const urlParams = new URLSearchParams(window.location.search);
const orderId = urlParams.get('id') || 'HH-10025'; /* Default to latest */
const order = ordersDB[orderId];
const mainContent = document.getElementById('mainContent');

if (!order) {
    mainContent.innerHTML = `
        <div class="error-state">
            <i class="fa-solid fa-circle-exclamation"></i>
            <h2>Confirmation Not Found</h2>
            <p>We couldn't locate that order confirmation. It may have expired or the link is incorrect.</p>
            <a href="/index.php#catalog class="btn btn-primary"><i class="fa-solid fa-shopping-bag"></i> Continue Shopping</a>
        </div>
    `;
} else {
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

    /* ── Discount row ───────────────────────────────────────── */
    let discountRow = '';
    if (order.discount > 0) {
        discountRow = `<div class="price-row"><span>Discount <span style="font-size:0.76rem;color:var(--fg-muted);font-weight:400;">(${order.discountCode})</span></span><span class="discount">-${formatCurrency(order.discount)}</span></div>`;
    }

    /* ── Delivery estimate ──────────────────────────────────── */
    const estDays = Math.ceil((new Date(order.estimatedDelivery) - new Date(order.date)) / 86400000);
    const estText = estDays <= 1 ? 'Tomorrow' : estDays <= 3 ? `Within ${estDays} days` : `Within ${estDays} days`;

    /* ── Assemble ───────────────────────────────────────────── */
    mainContent.innerHTML = `
        <!-- Success Hero -->
        <div class="success-hero">
            <div class="success-check-ring">
                <i class="fa-solid fa-check"></i>
            </div>
            <h1>Thank You for Your Order!</h1>
            <p class="success-sub">We've received your order and are getting it ready for you.</p>
            <div class="order-number-box">
                <span class="label">Order Number</span>
                <span class="number">${order.id}</span>
                <button class="copy-btn" id="copyOrderBtn" aria-label="Copy order number" title="Copy to clipboard">
                    <i class="fa-regular fa-copy"></i>
                </button>
            </div>
            <div class="confirmation-ctas">
                <a href="/api/models/order_details.php?id=${order.id}" class="btn btn-primary">
                    <i class="fa-solid fa-receipt"></i> View Order Details
                </a>
                <a href="/api/users/manage_order_history.php" class="btn btn-secondary">
                    <i class="fa-solid fa-list"></i> All Orders
                </a>
                <a href="/index.php#catalog" class="btn btn-outline">
                    <i class="fa-solid fa-shopping-bag"></i> Continue Shopping
                </a>
            </div>
        </div>

        <!-- What Happens Next -->
        <div class="next-steps">
            <h3><i class="fa-solid fa-shoe-prints"></i> What Happens Next?</h3>
            <div class="steps-list">
                <div class="step-item">
                    <div class="step-icon"><i class="fa-solid fa-envelope"></i></div>
                    <div>
                        <div class="step-number">Step 1</div>
                        <div class="step-title">Confirmation Email</div>
                        <div class="step-desc">A detailed confirmation has been sent to your email with all order information.</div>
                    </div>
                </div>
                <div class="step-item">
                    <div class="step-icon"><i class="fa-solid fa-gear"></i></div>
                    <div>
                        <div class="step-number">Step 2</div>
                        <div class="step-title">We Prepare Your Hats</div>
                        <div class="step-desc">Our team carefully packages each item with love and attention to detail.</div>
                    </div>
                </div>
                <div class="step-item">
                    <div class="step-icon"><i class="fa-solid fa-truck"></i></div>
                    <div>
                        <div class="step-number">Step 3</div>
                        <div class="step-title">Dispatch & Tracking</div>
                        <div class="step-desc">Once shipped, you'll receive a tracking number to follow your delivery.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Column Grid -->
        <div class="detail-grid">
            <!-- Left: Items + Price -->
            <div>
                <div class="detail-card">
                    <div class="detail-card-header">
                        <h3><i class="fa-solid fa-bag-shopping"></i> Items Ordered</h3>
                        <span style="font-size:0.8rem;color:var(--fg-muted);font-weight:500;">${order.items.length} item${order.items.length > 1 ? 's' : ''}</span>
                    </div>
                    <div class="detail-card-body">
                        ${itemsHTML}
                    </div>
                    <div class="price-summary">
                        <div class="price-row"><span>Subtotal</span><span>${formatCurrency(order.subtotal)}</span></div>
                        ${discountRow}
                        <div class="price-row"><span>Shipping</span><span>${order.shipping === 0 ? '<span class="free">Free</span>' : formatCurrency(order.shipping)}</span></div>
                        ${order.tax > 0 ? `<div class="price-row"><span>Tax</span><span>${formatCurrency(order.tax)}</span></div>` : ''}
                        <div class="price-row grand"><span>Total Paid</span><span>${formatCurrency(order.total)}</span></div>
                    </div>
                </div>
            </div>

            <!-- Right: Info Cards -->
            <div class="sidebar-cards">
                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-truck-fast"></i><h4>Delivery Estimate</h4></div>
                    <div class="info-card-body">
                        <div class="info-row"><span class="info-label">Estimated Date</span><span class="info-value" style="color:#2D9B6E;font-weight:700;">${formatDate(order.estimatedDelivery)}</span></div>
                        <div class="info-row"><span class="info-label">Timeframe</span><span class="info-value">${estText}</span></div>
                        <div class="info-row"><span class="info-label">Shipping Method</span><span class="info-value">${order.shipping === 0 ? 'Free Standard Delivery' : 'Express Delivery'}</span></div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-location-dot"></i><h4>Shipping Address</h4></div>
                    <div class="info-card-body">
                        <div class="address-block">${getAddressHTML(order.shippingAddress)}</div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-credit-card"></i><h4>Payment</h4></div>
                    <div class="info-card-body">
                        <div class="info-row">
                            <span class="info-label" style="display:flex;align-items:center;gap:8px;">
                                <i class="${order.payment.icon}" style="font-size:1.3rem;color:var(--fg-secondary);"></i> ${order.payment.method}
                            </span>
                            <span class="info-value">**** ${order.payment.last4}</span>
                        </div>
                        <div class="info-row"><span class="info-label">Total Charged</span><span class="info-value" style="font-weight:700;">${formatCurrency(order.total)}</span></div>
                        <div class="info-row"><span class="info-label">Status</span><span class="info-value" style="color:#2D9B6E;font-weight:600;"><i class="fa-solid fa-circle-check" style="font-size:0.72rem;margin-right:4px;"></i>Paid</span></div>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-card-header"><i class="fa-solid fa-circle-info"></i><h4>Need Help?</h4></div>
                    <div class="info-card-body" style="display:flex;flex-direction:column;gap:8px;">
                        <a href="mailto:support@hattieshats.co.uk" style="display:flex;align-items:center;gap:10px;padding:8px 0;font-size:0.84rem;color:var(--fg-secondary);font-weight:500;transition:color var(--duration) var(--ease);">
                            <i class="fa-solid fa-envelope" style="color:var(--red);width:18px;text-align:center;"></i> support@hattieshats.co.uk
                        </a>
                        <a href="tel:+441225123456" style="display:flex;align-items:center;gap:10px;padding:8px 0;font-size:0.84rem;color:var(--fg-secondary);font-weight:500;transition:color var(--duration) var(--ease);">
                            <i class="fa-solid fa-phone" style="color:var(--red);width:18px;text-align:center;"></i> +44 (0) 1225 123 456
                        </a>
                        <span style="font-size:0.76rem;color:var(--fg-muted);padding-left:28px;">Mon–Fri, 9am–5pm BST</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Banner -->
        <div class="promo-banner">
            <div class="promo-icon"><i class="fa-solid fa-gift"></i></div>
            <div class="promo-content">
                <h4>Share the Love — Get 10% Off</h4>
                <p>Refer a friend and they'll get 10% off their first order. You'll earn hat loyalty points too!</p>
            </div>
            <div class="promo-cta">
                <a href="#" class="btn btn-primary" id="referBtn"><i class="fa-solid fa-share-nodes"></i> Refer a Friend</a>
            </div>
        </div>
    `;

    /* ── Wire Buttons ───────────────────────────────────────── */
    const copyBtn = document.getElementById('copyOrderBtn');
    if (copyBtn) {
        copyBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(order.id).then(() => {
                showToast('Order number ' + order.id + ' copied to clipboard.', 'success');
                const icon = copyBtn.querySelector('i');
                icon.classList.remove('fa-regular', 'fa-copy');
                icon.classList.add('fa-solid', 'fa-check');
                setTimeout(() => { icon.classList.remove('fa-solid', 'fa-check'); icon.classList.add('fa-regular', 'fa-copy'); }, 2000);
            }).catch(() => showToast('Could not copy. Please copy manually.', 'warning'));
        });
    }

    const referBtn = document.getElementById('referBtn');
    if (referBtn) {
        referBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (navigator.share) {
                navigator.share({ title: 'Hattie\'s Hat\'istical Hats — 10% Off!', text: 'Get 10% off your first hat order at Hattie\'s Hat\'istical Hats!', url: window.location.origin + '/shop?ref=' + order.id });
            } else {
                navigator.clipboard.writeText(window.location.origin + '/shop?ref=' + order.id).then(() => {
                    showToast('Referral link copied to clipboard!', 'success');
                }).catch(() => showToast('Could not copy link.', 'warning'));
            }
        });
    }

    /* ── Fire confetti ──────────────────────────────────────── */
    launchConfetti();
}

/* ================================================================
   CONFETTI ANIMATION
   ================================================================ */
function launchConfetti() {
    const canvas = document.getElementById('confettiCanvas');
    const ctx = canvas.getContext('2d');
    let width = canvas.width = window.innerWidth;
    let height = canvas.height = window.innerHeight;
    window.addEventListener('resize', () => { width = canvas.width = window.innerWidth; height = canvas.height = window.innerHeight; });

    const colors = ['#C93B39', '#DA4E4C', '#CFA1A8', '#FFDAD3', '#FFE8E3', '#2D9B6E', '#D4942A', '#6B5CE7'];
    const particles = [];
    const count = 120;

    for (let i = 0; i < count; i++) {
        particles.push({
            x: width * 0.5 + (Math.random() - 0.5) * width * 0.6,
            y: height * 0.4 - Math.random() * height * 0.3,
            w: Math.random() * 8 + 4,
            h: Math.random() * 5 + 2,
            color: colors[Math.floor(Math.random() * colors.length)],
            vx: (Math.random() - 0.5) * 6,
            vy: -(Math.random() * 6 + 3),
            rotation: Math.random() * 360,
            rotSpeed: (Math.random() - 0.5) * 12,
            gravity: 0.12 + Math.random() * 0.06,
            opacity: 1,
            decay: 0.003 + Math.random() * 0.004
        });
    }

    let animId;
    function animate() {
        ctx.clearRect(0, 0, width, height);
        let alive = false;
        for (const p of particles) {
            if (p.opacity <= 0) continue;
            alive = true;
            p.vy += p.gravity;
            p.x += p.vx;
            p.y += p.vy;
            p.vx *= 0.99;
            p.rotation += p.rotSpeed;
            p.opacity -= p.decay;

            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate((p.rotation * Math.PI) / 180);
            ctx.globalAlpha = Math.max(0, p.opacity);
            ctx.fillStyle = p.color;
            ctx.fillRect(-p.w / 2, -p.h / 2, p.w, p.h);
            ctx.restore();
        }
        if (alive) {
            animId = requestAnimationFrame(animate);
        } else {
            ctx.clearRect(0, 0, width, height);
            cancelAnimationFrame(animId);
        }
    }

    /* Respect reduced motion */
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        animate();
    }
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

/* Notification bell */
const notifToggle = document.getElementById('notifToggle');
if (notifToggle) notifToggle.addEventListener('click', () => showToast('You have no new notifications.', 'info'));
</script>
</body>
</html>