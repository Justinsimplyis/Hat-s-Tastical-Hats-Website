<?php
// You can fetch the user's enquiries from the database here
 $enquiries = [
    [
        'id' => 'ENQ-1004',
        'subject' => 'Can I change the color of my custom order?',
        'category' => 'Custom Orders',
        'date' => 'Apr 12, 2025',
        'last_update' => '2 hours ago',
        'status' => 'Open',
        'messages' => [
            ['from' => 'customer', 'text' => 'I recently placed a custom order (CR-0042) for a bridal fascinator. I chose ivory, but after seeing my dress I think blush pink would work better. Is it possible to change the colour at this stage?', 'time' => 'Apr 12, 2025, 10:15 AM'],
            ['from' => 'support', 'text' => 'Hi Hattie! Thank you for reaching out. Since your fascinator is still in the creation stage, we can absolutely change the colour to blush pink. I\'ve updated your order details — you should receive a confirmation email shortly. Is there anything else you\'d like to adjust?', 'time' => 'Apr 12, 2025, 12:30 PM']
        ]
    ],
    [
        'id' => 'ENQ-1001',
        'subject' => 'Question about hat sizing guide',
        'category' => 'Sizing',
        'date' => 'Apr 08, 2025',
        'last_update' => '4 days ago',
        'status' => 'Answered',
        'messages' => [
            ['from' => 'customer', 'text' => 'I\'m looking at the Velvet Wide-Brim Fedora and I\'m between a Medium and Large. My head circumference is 57cm. Which would you recommend?', 'time' => 'Apr 08, 2025, 3:45 PM'],
            ['from' => 'support', 'text' => 'Great question! With a 57cm circumference, we\'d recommend the Medium. Our fedoras are designed with a slight give in the lining, and a Medium (56-58cm) will give you a comfortable fit without being loose. If you prefer a more relaxed look, the Large would also work. We offer free exchanges if the fit isn\'t right!', 'time' => 'Apr 08, 2025, 5:10 PM'],
            ['from' => 'customer', 'text' => 'That\'s really helpful, thank you! I\'ll go with the Medium.', 'time' => 'Apr 08, 2025, 5:22 PM']
        ]
    ],
    [
        'id' => 'ENQ-0995',
        'subject' => 'Issue with checkout payment',
        'category' => 'Payment',
        'date' => 'Mar 25, 2025',
        'last_update' => '3 weeks ago',
        'status' => 'Closed',
        'messages' => [
            ['from' => 'customer', 'text' => 'I tried to check out but my Visa payment kept getting declined. I\'ve checked with my bank and there are no issues on their end. The card works fine elsewhere.', 'time' => 'Mar 25, 2025, 11:00 AM'],
            ['from' => 'support', 'text' => 'I\'m sorry to hear that! We checked our payment processor logs and it appears the transaction was being blocked by an international security flag. We\'ve adjusted the settings — could you try again?', 'time' => 'Mar 25, 2025, 2:15 PM'],
            ['from' => 'customer', 'text' => 'That worked perfectly, thank you so much!', 'time' => 'Mar 25, 2025, 2:40 PM'],
            ['from' => 'support', 'text' => 'Wonderful! Glad we could sort that out. Your order HH-10016 has been confirmed. Happy hat shopping!', 'time' => 'Mar 25, 2025, 2:50 PM']
        ]
    ],
    [
        'id' => 'ENQ-0990',
        'subject' => 'Do you offer rush delivery to Cape Town?',
        'category' => 'Shipping',
        'date' => 'Mar 15, 2025',
        'last_update' => '1 month ago',
        'status' => 'Closed',
        'messages' => [
            ['from' => 'customer', 'text' => 'I need a hat delivered to Cape Town, South Africa by April 5th for a wedding. Is rush international delivery available and what would the cost be?', 'time' => 'Mar 15, 2025, 9:30 AM'],
            ['from' => 'support', 'text' => 'We do ship internationally! For Cape Town, our DHL Express International typically takes 5-7 working days. If you order by March 27th, it should arrive in time. The cost would be approximately £28.99 for express. Would you like us to set this up for you?', 'time' => 'Mar 15, 2025, 11:45 AM'],
            ['from' => 'customer', 'text' => 'That would be brilliant, yes please.', 'time' => 'Mar 15, 2025, 12:00 PM'],
            ['from' => 'support', 'text' => 'Done! We\'ve added the DHL Express option to your account. When you check out, select "International Express" as your shipping method. Let us know if you need any further assistance!', 'time' => 'Mar 15, 2025, 12:20 PM']
        ]
    ],
    [
        'id' => 'ENQ-0985',
        'subject' => 'Hat care instructions for straw hats',
        'category' => 'Product Care',
        'date' => 'Mar 02, 2025',
        'last_update' => '1 month ago',
        'status' => 'Answered',
        'messages' => [
            ['from' => 'customer', 'text' => 'I just bought a straw boater hat. What\'s the best way to clean and store it to keep it in good shape?', 'time' => 'Mar 02, 2025, 4:00 PM'],
            ['from' => 'support', 'text' => 'Great choice! For straw hats: 1) Use a soft brush to remove dust. 2) For stains, dab gently with a damp cloth — don\'t soak. 3) Always air dry naturally, never use heat. 4) Store in our hat box or on a stand, away from direct sunlight. 5) Avoid handling by the crown — hold by the brim. We include a care card with each order too!', 'time' => 'Mar 02, 2025, 5:30 PM']
        ]
    ],
    [
        'id' => 'ENQ-0978',
        'subject' => 'Return request for Trilby Hat',
        'category' => 'Returns',
        'date' => 'Feb 18, 2025',
        'last_update' => '2 months ago',
        'status' => 'Closed',
        'messages' => [
            ['from' => 'customer', 'text' => 'I\'d like to return the Herringbone Trilby (HH-10018) as it doesn\'t suit me as well as I hoped. It\'s unworn with all tags attached.', 'time' => 'Feb 18, 2025, 10:00 AM'],
            ['from' => 'support', 'text' => 'Of course! I\'ve initiated a return for you. You\'ll receive a prepaid Royal Mail label by email. Once we receive the hat, we\'ll process your refund of £155.00 within 3-5 working days.', 'time' => 'Feb 18, 2025, 10:45 AM'],
            ['from' => 'support', 'text' => 'Just to confirm — we\'ve received your return and the refund of £155.00 has been issued to your PayPal account. It may take 3-5 business days to appear.', 'time' => 'Feb 22, 2025, 3:00 PM']
        ]
    ]
];

/* Encode enquiries data for JS use */
 $enquiriesJson = json_encode($enquiries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>My Enquiries | Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
   Hattie's Hat'istical Hats — My Enquiries
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
table { border-collapse: collapse; width: 100%; }

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
   MAIN CONTENT — ENQUIRIES
   ================================================================ */
.main-content { flex: 1; padding: 28px; }

/* ── Breadcrumb ───────────────────────────────────────────────── */
.breadcrumb { display: flex; align-items: center; gap: 8px; font-size: 0.82rem; color: var(--fg-muted); margin-bottom: 24px; flex-wrap: wrap; }
.breadcrumb a { color: var(--fg-secondary); font-weight: 500; transition: color var(--duration) var(--ease); }
.breadcrumb a:hover { color: var(--red); }
.breadcrumb .sep { color: var(--cream-deeper); font-size: 0.65rem; }
.breadcrumb .current { color: var(--fg); font-weight: 600; }

/* ── Stats Grid ───────────────────────────────────────────────── */
.stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }
.stat-card { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-lg); padding: 18px 20px; display: flex; align-items: center; gap: 14px; box-shadow: var(--shadow-sm); transition: all 0.25s var(--ease); position: relative; overflow: hidden; cursor: default; }
.stat-card::after { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px; border-radius: var(--radius-lg) var(--radius-lg) 0 0; opacity: 0; transition: opacity 0.25s var(--ease); }
.stat-card:hover { box-shadow: var(--shadow-md); transform: translateY(-2px); }
.stat-card:hover::after { opacity: 1; }
.stat-card:nth-child(1)::after { background: var(--fg-secondary); }
.stat-card:nth-child(2)::after { background: var(--red); }
.stat-card:nth-child(3)::after { background: #2D9B6E; }
.stat-card:nth-child(4)::after { background: var(--fg-muted); }
.stat-icon { width: 42px; height: 42px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
.stat-card:nth-child(1) .stat-icon { background: var(--cream); color: var(--fg-secondary); }
.stat-card:nth-child(2) .stat-icon { background: var(--red-light); color: var(--red); }
.stat-card:nth-child(3) .stat-icon { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.stat-card:nth-child(4) .stat-icon { background: var(--pink-muted); color: var(--fg-muted); }
.stat-info h3 { font-size: 0.72rem; font-weight: 500; color: var(--fg-muted); text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 2px; }
.stat-number { font-size: 1.6rem; font-weight: 700; color: var(--fg); line-height: 1.2; }

/* ── Page Header ──────────────────────────────────────────────── */
.page-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 20px; flex-wrap: wrap; }
.page-header-left h1 { font-size: 1.4rem; font-weight: 700; color: var(--fg); line-height: 1.3; letter-spacing: -0.02em; margin-bottom: 4px; }
.page-header-left p { font-size: 0.87rem; color: var(--fg-muted); }

.btn { height: 40px; padding: 0 20px; border-radius: var(--radius-sm); font-size: 0.84rem; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: all var(--duration) var(--ease); white-space: nowrap; }
.btn-primary { background: var(--red); color: #fff; }
.btn-primary:hover { background: var(--red-hover); transform: translateY(-1px); box-shadow: 0 6px 16px rgba(201,59,57,0.3); }
.btn-secondary { background: var(--cream); color: var(--fg-secondary); border: 1px solid var(--border-light); }
.btn-secondary:hover { background: var(--cream-dark); color: var(--fg); }

/* ── Filter Bar ───────────────────────────────────────────────── */
.filter-bar { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; flex-wrap: wrap; }
.tabs-container { display: flex; gap: 6px; flex: 1; overflow-x: auto; scrollbar-width: none; }
.tabs-container::-webkit-scrollbar { display: none; }
.tab-btn { padding: 8px 18px; border-radius: var(--radius-full); font-weight: 600; color: var(--fg-muted); font-size: 0.82rem; background: var(--cream); border: 1px solid transparent; transition: all var(--duration) var(--ease); white-space: nowrap; }
.tab-btn:hover { color: var(--red); background: var(--red-light); }
.tab-btn.active { background: var(--red); color: #fff; box-shadow: var(--shadow-sm); }
.filter-search { height: 38px; padding: 0 14px; background: var(--cream); border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-size: 0.82rem; color: var(--fg); min-width: 200px; transition: all var(--duration) var(--ease); }
.filter-search::placeholder { color: var(--fg-muted); }
.filter-search:hover { border-color: var(--pink); }
.filter-search:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }

/* ── Enquiries Table ──────────────────────────────────────────── */
.enquiries-panel { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; }
.enquiries-header { padding: 16px 24px; border-bottom: 1px solid var(--border-light); display: flex; align-items: center; justify-content: space-between; }
.enquiries-header h2 { font-size: 0.95rem; font-weight: 700; color: var(--fg); display: flex; align-items: center; gap: 10px; }
.enquiries-header h2 i { color: var(--red); font-size: 0.85rem; }
.enquiries-count { font-size: 0.78rem; font-weight: 500; color: var(--fg-muted); background: var(--cream); padding: 4px 12px; border-radius: var(--radius-full); }
.enquiries-body { overflow-x: auto; }

.data-table thead { position: sticky; top: 0; z-index: 2; }
.data-table th { padding: 12px 20px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--fg-muted); background: var(--cream); text-align: left; border-bottom: 1px solid var(--border-light); white-space: nowrap; }
.data-table td { padding: 14px 20px; font-size: 0.87rem; color: var(--fg); border-bottom: 1px solid var(--border-light); vertical-align: middle; }
.data-table tbody tr { transition: background var(--duration) var(--ease); }
.data-table tbody tr:hover { background: var(--pink-muted); }
.data-table tbody tr:last-child td { border-bottom: none; }

.enquiry-id-cell { font-family: 'Courier New', monospace; color: var(--fg-muted); font-size: 0.82rem; font-weight: 600; white-space: nowrap; }
.enquiry-subject-cell { font-weight: 600; color: var(--fg); max-width: 360px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.enquiry-category { font-size: 0.74rem; font-weight: 600; color: var(--pink); background: var(--pink-light); padding: 3px 10px; border-radius: var(--radius-full); white-space: nowrap; }
.enquiry-date { white-space: nowrap; color: var(--fg-secondary); font-size: 0.84rem; }

.status-badge { display: inline-flex; align-items: center; gap: 6px; font-size: 0.76rem; font-weight: 600; padding: 4px 12px; border-radius: var(--radius-full); white-space: nowrap; }
.status-dot { width: 7px; height: 7px; border-radius: 50%; flex-shrink: 0; }
.status-open { background: var(--red-light); color: var(--red); }
.status-open .status-dot { background: var(--red); animation: pulse-dot 1.5s infinite; }
.status-answered { background: rgba(45,155,110,0.10); color: #2D9B6E; }
.status-answered .status-dot { background: #2D9B6E; }
.status-closed { background: var(--pink-muted); color: var(--fg-muted); }
.status-closed .status-dot { background: var(--fg-muted); }
@keyframes pulse-dot { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(.7)} }

.table-action-btn { font-size: 0.78rem; font-weight: 500; color: var(--red); padding: 5px 14px; border-radius: var(--radius-full); border: 1px solid var(--red-light); background: var(--red-light); transition: all var(--duration) var(--ease); white-space: nowrap; }
.table-action-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }

/* ── Empty State ──────────────────────────────────────────────── */
.empty-state { text-align: center; padding: 60px 24px; }
.empty-state-icon { width: 80px; height: 80px; margin: 0 auto 20px; border-radius: 50%; background: var(--cream); display: flex; align-items: center; justify-content: center; font-size: 2rem; color: var(--cream-deeper); }
.empty-state h3 { font-size: 1.1rem; font-weight: 700; color: var(--fg); margin-bottom: 6px; }
.empty-state p { font-size: 0.87rem; color: var(--fg-muted); max-width: 360px; margin: 0 auto 20px; }

/* ── Modal ────────────────────────────────────────────────────── */
.modal-overlay { position: fixed; inset: 0; z-index: 2000; background: rgba(42, 31, 33, 0.5); backdrop-filter: blur(6px); display: flex; align-items: center; justify-content: center; opacity: 0; visibility: hidden; transition: all 0.3s var(--ease); padding: 24px; }
.modal-overlay.visible { opacity: 1; visibility: visible; }
.modal { background: var(--card); border-radius: var(--radius-lg); width: 100%; max-width: 600px; max-height: 85vh; overflow: hidden; display: flex; flex-direction: column; box-shadow: var(--shadow-xl); transform: translateY(20px) scale(0.97); transition: transform 0.35s var(--ease); }
.modal-overlay.visible .modal { transform: translateY(0) scale(1); }
.modal-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 24px; border-bottom: 1px solid var(--border-light); flex-shrink: 0; }
.modal-header h3 { font-size: 1.05rem; font-weight: 700; color: var(--fg); }
.modal-close { width: 32px; height: 32px; border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--fg-muted); font-size: 0.9rem; transition: all var(--duration) var(--ease); }
.modal-close:hover { background: var(--cream); color: var(--red); }
.modal-body { padding: 24px; overflow-y: auto; flex: 1; }
.modal-footer { padding: 16px 24px; border-top: 1px solid var(--border-light); display: flex; align-items: center; justify-content: flex-end; gap: 10px; flex-shrink: 0; }

.form-group { margin-bottom: 18px; }
.form-label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--fg-secondary); margin-bottom: 6px; }
.form-input, .form-textarea, .form-select { width: 100%; padding: 10px 14px; font-size: 0.87rem; color: var(--fg); background: var(--cream); border: 1px solid var(--border-light); border-radius: var(--radius-sm); transition: all var(--duration) var(--ease); }
.form-input:focus, .form-textarea:focus, .form-select:focus { border-color: var(--red); background: var(--bg-elevated); box-shadow: 0 0 0 3px var(--red-muted); }
.form-textarea { resize: vertical; min-height: 120px; line-height: 1.6; }
.form-input::placeholder, .form-textarea::placeholder { color: var(--fg-muted); }
.form-select { cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' fill='%239A8588'%3E%3Cpath d='M0 0l5 6 5-6z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 14px center; }

/* ── Conversation Thread ──────────────────────────────────────── */
.thread-meta { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; padding-bottom: 16px; border-bottom: 1px solid var(--border-light); flex-wrap: wrap; }
.thread-meta-item { font-size: 0.8rem; color: var(--fg-muted); display: flex; align-items: center; gap: 5px; }
.thread-meta-item strong { color: var(--fg-secondary); font-weight: 600; }

.thread-messages { display: flex; flex-direction: column; gap: 16px; }
.thread-msg { display: flex; gap: 12px; }
.thread-msg-avatar { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; flex-shrink: 0; }
.thread-msg-avatar.customer { background: var(--cream); color: var(--fg-secondary); }
.thread-msg-avatar.support { background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; }
.thread-msg-content { flex: 1; min-width: 0; }
.thread-msg-header { display: flex; align-items: center; gap: 8px; margin-bottom: 4px; }
.thread-msg-name { font-size: 0.82rem; font-weight: 600; color: var(--fg); }
.thread-msg-time { font-size: 0.72rem; color: var(--fg-muted); }
.thread-msg-bubble { font-size: 0.87rem; color: var(--fg-secondary); line-height: 1.6; padding: 14px 18px; border-radius: var(--radius-md); }
.thread-msg.customer .thread-msg-bubble { background: var(--cream); }
.thread-msg.support .thread-msg-bubble { background: var(--bg); border: 1px solid var(--border-light); }

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

/* ================================================================
   RESPONSIVE
   ================================================================ */
@media (max-width: 1100px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 768px) {
    .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
    .sidebar.collapsed { width: var(--sidebar-width) !important; }
    .sidebar.collapsed .sidebar-collapse-btn { display: none; }
    .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label, .sidebar.collapsed .nav-label { opacity: 1; width: auto; transform: none; height: auto; margin: 0; }
    .sidebar.collapsed .nav-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
    .sidebar.collapsed  { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
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
    .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .stat-number { font-size: 1.3rem; }
    .filter-bar { flex-direction: column; align-items: stretch; }
    .filter-search { min-width: 0; }
    .data-table { min-width: 700px; }
    .thread-msg { flex-direction: column; gap: 6px; }
    .thread-msg-avatar { display: none; }
}
@media (max-width: 480px) { .stats-grid { grid-template-columns: 1fr 1fr; gap: 10px; } .hide-mobile { display: none !important; } }

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
                <a href="/api/users/manage_order_history.php" role="menuitem"> My Orders History</a>
                <a href="/api/users/manage_custom_orders.php" role="menuitem" > My Custom Orders</a>
                <a href="/api/users/manage_enquiries.php" role="menuitem" class="active">My Enquiries</a>
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
                <h2>My Enquiries</h2>
                <p>Track your support tickets and questions.</p>
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
        <!-- Populated by JS using PHP data -->
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ── New Enquiry Modal ───────────────────────────────────────── -->
<div class="modal-overlay" id="newEnquiryModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="newEnquiryTitle">
        <div class="modal-header">
            <h3 id="newEnquiryTitle">New Enquiry</h3>
            <button class="modal-close" id="newEnquiryClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label" for="enquiryCategory">Category</label>
                <select class="form-select" id="enquiryCategory">
                    <option value="">Select a category...</option>
                    <option value="Custom Orders">Custom Orders</option>
                    <option value="Sizing">Sizing</option>
                    <option value="Payment">Payment</option>
                    <option value="Shipping">Shipping</option>
                    <option value="Returns">Returns</option>
                    <option value="Product Care">Product Care</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label" for="enquirySubject">Subject</label>
                <input type="text" class="form-input" id="enquirySubject" placeholder="Brief summary of your question">
            </div>
            <div class="form-group">
                <label class="form-label" for="enquiryMessage">Message</label>
                <textarea class="form-textarea" id="enquiryMessage" placeholder="Describe your enquiry in detail so we can help you as quickly as possible..."></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Related Order (optional)</label>
                <input type="text" class="form-input" id="enquiryOrderId" placeholder="e.g. HH-10024">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="newEnquiryCancelBtn">Cancel</button>
            <button class="btn btn-primary" id="newEnquirySubmitBtn"><i class="fa-solid fa-paper-plane"></i> Submit Enquiry</button>
        </div>
    </div>
</div>

<!-- ── View Enquiry Modal ─────────────────────────────────────── -->
<div class="modal-overlay" id="viewEnquiryModal">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="viewEnquiryTitle" style="max-width:640px;">
        <div class="modal-header">
            <h3 id="viewEnquiryTitle">Enquiry Details</h3>
            <button class="modal-close" id="viewEnquiryClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body" id="viewEnquiryBody">
            <!-- Populated by JS -->
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" id="viewEnquiryCloseBtn">Close</button>
        </div>
    </div>
</div>

<!-- ── Toast Container ─────────────────────────────────────────── -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   DATA — Sourced from PHP
   ================================================================ */
const enquiriesData = <?php echo $enquiriesJson; ?>;

/* ================================================================
   STATE
   ================================================================ */
let currentFilter = 'all';
let searchQuery = '';

/* ================================================================
   HELPERS
   ================================================================ */
function getStatusClass(s) { return 'status-' + s.toLowerCase(); }
function getStatusHTML(s) {
    const dot = '<span class="status-dot"></span>';
    return '<span class="status-badge ' + getStatusClass(s) + '">' + dot + s + '</span>';
}

function getFilteredEnquiries() {
    return enquiriesData.filter(e => {
        if (currentFilter !== 'all' && e.status !== currentFilter) return false;
        if (searchQuery) {
            const q = searchQuery.toLowerCase();
            return e.id.toLowerCase().includes(q) ||
                   e.subject.toLowerCase().includes(q) ||
                   e.category.toLowerCase().includes(q);
        }
        return true;
    });
}

function countByStatus(status) {
    return enquiriesData.filter(e => e.status === status).length;
}

/* ================================================================
   RENDER
   ================================================================ */
function render() {
    const mainContent = document.getElementById('mainContent');
    const filtered = getFilteredEnquiries();
    const total = enquiriesData.length;
    const openCount = countByStatus('Open');
    const answeredCount = countByStatus('Answered');
    const closedCount = countByStatus('Closed');

    mainContent.innerHTML = `
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="/dashboards/user/index.php">Dashboard</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <a href="#" onclick="return false">My Orders History</a>
            <span class="sep"><i class="fa-solid fa-chevron-right"></i></span>
            <span class="current">My Enquiries</span>
        </nav>

        <div class="page-header">
            <div class="page-header-left">
                <h1>Support & Enquiries</h1>
                <p>View and manage your questions and support requests.</p>
            </div>
            <button class="btn btn-primary" id="newEnquiryBtn"><i class="fa-solid fa-plus"></i> New Enquiry</button>
        </div>

        <section class="stats-grid" aria-label="Enquiry Metrics">
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-messages"></i></div>
                <div class="stat-info">
                    <h3>Total</h3>
                    <div class="stat-number">${total}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                <div class="stat-info">
                    <h3>Open</h3>
                    <div class="stat-number">${openCount}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                <div class="stat-info">
                    <h3>Answered</h3>
                    <div class="stat-number">${answeredCount}</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
                <div class="stat-info">
                    <h3>Closed</h3>
                    <div class="stat-number">${closedCount}</div>
                </div>
            </div>
        </section>

        <div class="filter-bar">
            <div class="tabs-container">
                <button class="tab-btn ${currentFilter === 'all' ? 'active' : ''}" data-filter="all">All <span class="hide-mobile" style="opacity:0.6;margin-left:4px;">(${total})</span></button>
                <button class="tab-btn ${currentFilter === 'Open' ? 'active' : ''}" data-filter="Open">Open <span class="hide-mobile" style="opacity:0.6;margin-left:4px;">(${openCount})</span></button>
                <button class="tab-btn ${currentFilter === 'Answered' ? 'active' : ''}" data-filter="Answered">Answered <span class="hide-mobile" style="opacity:0.6;margin-left:4px;">(${answeredCount})</span></button>
                <button class="tab-btn ${currentFilter === 'Closed' ? 'active' : ''}" data-filter="Closed">Closed <span class="hide-mobile" style="opacity:0.6;margin-left:4px;">(${closedCount})</span></button>
            </div>
            <input type="text" class="filter-search" id="filterSearch" placeholder="Search enquiries..." aria-label="Search enquiries" value="${searchQuery}">
        </div>

        <div class="enquiries-panel">
            <div class="enquiries-header">
                <h2><i class="fa-solid fa-inbox"></i> Enquiries</h2>
                <span class="enquiries-count" id="enquiriesCount">Showing ${filtered.length} of ${total}</span>
            </div>
            <div class="enquiries-body">
                ${filtered.length === 0 ? renderEmptyState() : renderTable(filtered)}
            </div>
        </div>
    `;

    wirePageActions();
}

function renderTable(items) {
    return `
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th class="hide-mobile">Category</th>
                    <th>Date</th>
                    <th class="hide-mobile">Last Update</th>
                    <th>Status</th>
                    <th style="text-align:right;padding-right:20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                ${items.map(e => `
                    <tr>
                        <td><span class="enquiry-id-cell">${e.id}</span></td>
                        <td><span class="enquiry-subject-cell" title="${e.subject}">${e.subject}</span></td>
                        <td class="hide-mobile"><span class="enquiry-category">${e.category}</span></td>
                        <td><span class="enquiry-date">${e.date}</span></td>
                        <td class="hide-mobile"><span class="enquiry-date">${e.last_update}</span></td>
                        <td>${getStatusHTML(e.status)}</td>
                        <td style="text-align:right;padding-right:20px;">
                            <button class="table-action-btn" data-view-id="${e.id}">View <i class="fa-solid fa-arrow-right" style="margin-left:4px;font-size:0.65rem;"></i></button>
                        </td>
                    </tr>
                `).join('')}
            </tbody>
        </table>
    `;
}

function renderEmptyState() {
    if (enquiriesData.length === 0) {
        return `
            <div class="empty-state">
                <div class="empty-state-icon"><i class="fa-solid fa-inbox"></i></div>
                <h3>No Enquiries Yet</h3>
                <p>You haven't submitted any enquiries. If you have a question about an order or our products, we'd love to help.</p>
                <button class="btn btn-primary" onclick="document.getElementById('newEnquiryBtn').click()"><i class="fa-solid fa-plus"></i> Submit an Enquiry</button>
            </div>
        `;
    }
    return `
        <div class="empty-state" style="padding:40px 24px;">
            <div class="empty-state-icon"><i class="fa-solid fa-filter-circle-xmark"></i></div>
            <h3>No Matching Enquiries</h3>
            <p>No enquiries match your current filter or search. Try adjusting your criteria.</p>
        </div>
    `;
}

/* ================================================================
   PAGE ACTIONS
   ================================================================ */
function wirePageActions() {
    /* Tab filtering */
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            currentFilter = btn.dataset.filter;
            render();
        });
    });

    /* Search */
    const searchInput = document.getElementById('filterSearch');
    if (searchInput) {
        let debounce;
        searchInput.addEventListener('input', () => {
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                searchQuery = searchInput.value.trim();
                /* Update table without full re-render to keep focus */
                const filtered = getFilteredEnquiries();
                const body = document.querySelector('.enquiries-body');
                const countEl = document.getElementById('enquiriesCount');
                if (body) body.innerHTML = filtered.length === 0 ? renderEmptyState() : renderTable(filtered);
                if (countEl) countEl.textContent = 'Showing ' + filtered.length + ' of ' + enquiriesData.length;
            }, 200);
        });
    }

    /* View buttons */
    document.querySelectorAll('[data-view-id]').forEach(btn => {
        btn.addEventListener('click', () => openViewModal(btn.dataset.viewId));
    });

    /* New Enquiry button */
    const newBtn = document.getElementById('newEnquiryBtn');
    if (newBtn) newBtn.addEventListener('click', () => openNewEnquiryModal());
}

/* ================================================================
   VIEW ENQUIRY MODAL
   ================================================================ */
function openViewModal(id) {
    const enquiry = enquiriesData.find(e => e.id === id);
    if (!enquiry) return;

    const body = document.getElementById('viewEnquiryBody');
    const title = document.getElementById('viewEnquiryTitle');
    title.textContent = enquiry.id + ' — ' + enquiry.subject;

    const messagesHTML = enquiry.messages.map(m => `
        <div class="thread-msg ${m.from}">
            <div class="thread-msg-avatar ${m.from}">
                ${m.from === 'customer' ? 'HC' : 'HH'}
            </div>
            <div class="thread-msg-content">
                <div class="thread-msg-header">
                    <span class="thread-msg-name">${m.from === 'customer' ? 'You' : 'Hattie\'s Support'}</span>
                    <span class="thread-msg-time">${m.time}</span>
                </div>
                <div class="thread-msg-bubble">${m.text}</div>
            </div>
        </div>
    `).join('');

    body.innerHTML = `
        <div class="thread-meta">
            <div class="thread-meta-item"><i class="fa-solid fa-tag" style="color:var(--pink);font-size:0.72rem;"></i> <strong>${enquiry.category}</strong></div>
            <div class="thread-meta-item"><i class="fa-regular fa-calendar" style="font-size:0.72rem;"></i> Submitted <strong>${enquiry.date}</strong></div>
            <div class="thread-meta-item">${getStatusHTML(enquiry.status)}</div>
        </div>
        <div class="thread-messages">${messagesHTML}</div>
    `;

    document.getElementById('viewEnquiryModal').classList.add('visible');
    document.body.style.overflow = 'hidden';
}

/* ================================================================
   NEW ENQUIRY MODAL
   ================================================================ */
function openNewEnquiryModal() {
    document.getElementById('newEnquiryModal').classList.add('visible');
    document.body.style.overflow = 'hidden';
    document.getElementById('enquiryCategory').focus();
}

function closeNewEnquiryModal() {
    document.getElementById('newEnquiryModal').classList.remove('visible');
    document.body.style.overflow = '';
}

function closeViewModal() {
    document.getElementById('viewEnquiryModal').classList.remove('visible');
    document.body.style.overflow = '';
}

/* Close handlers */
document.getElementById('newEnquiryClose').addEventListener('click', closeNewEnquiryModal);
document.getElementById('newEnquiryCancelBtn').addEventListener('click', closeNewEnquiryModal);
document.getElementById('viewEnquiryClose').addEventListener('click', closeViewModal);
document.getElementById('viewEnquiryCloseBtn').addEventListener('click', closeViewModal);
document.getElementById('newEnquiryModal').addEventListener('click', (e) => { if (e.target === e.currentTarget) closeNewEnquiryModal(); });
document.getElementById('viewEnquiryModal').addEventListener('click', (e) => { if (e.target === e.currentTarget) closeViewModal(); });
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') { closeNewEnquiryModal(); closeViewModal(); }
});

/* Submit enquiry */
document.getElementById('newEnquirySubmitBtn').addEventListener('click', () => {
    const category = document.getElementById('enquiryCategory').value;
    const subject = document.getElementById('enquirySubject').value.trim();
    const message = document.getElementById('enquiryMessage').value.trim();
    const orderId = document.getElementById('enquiryOrderId').value.trim();

    if (!category) { showToast('Please select a category.', 'warning'); return; }
    if (!subject) { showToast('Please enter a subject.', 'warning'); return; }
    if (!message) { showToast('Please enter your message.', 'warning'); return; }

    /* In production: POST to server */
    closeNewEnquiryModal();
    showToast('Your enquiry has been submitted. We\'ll respond within 24 hours.', 'success');

    /* Clear form */
    document.getElementById('enquiryCategory').value = '';
    document.getElementById('enquirySubject').value = '';
    document.getElementById('enquiryMessage').value = '';
    document.getElementById('enquiryOrderId').value = '';
});

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