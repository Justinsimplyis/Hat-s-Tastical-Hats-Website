<?php
// You can fetch the user's enquiries from the database here
 $enquiries = [
    [
        'id' => 'ENQ-1004',
        'subject' => 'Can I change the color of my custom order?',
        'date' => 'Apr 12, 2025',
        'last_update' => '2 hours ago',
        'status' => 'Open'
    ],
    [
        'id' => 'ENQ-1001',
        'subject' => 'Question about hat sizing guide',
        'date' => 'Apr 08, 2025',
        'last_update' => '4 days ago',
        'status' => 'Answered'
    ],
    [
        'id' => 'ENQ-0995',
        'subject' => 'Issue with checkout payment',
        'date' => 'Mar 25, 2025',
        'last_update' => '3 weeks ago',
        'status' => 'Closed'
    ],
    [
        'id' => 'ENQ-0990',
        'subject' => 'Do you offer rush delivery to Cape Town?',
        'date' => 'Mar 15, 2025',
        'last_update' => '1 month ago',
        'status' => 'Closed'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Enquiries - Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* ================================================================
           Hattie's Hat'istical Hats — Customer Dashboard (Light Warm)
           Merged with My Enquiries Specific Styles
           ================================================================ */

        :root {
            /* Core brand */
            --red:           #C93B39;
            --red-hover:     #DA4E4C;
            --red-light:     rgba(201, 59, 57, 0.10);
            --red-muted:     rgba(201, 59, 57, 0.05);

            /* Blush / pink */
            --pink:          #CFA1A8;
            --pink-light:    rgba(207, 161, 168, 0.18);
            --pink-muted:    rgba(207, 161, 168, 0.08);

            /* Surfaces — light warm */
            --bg:            #FFF8F6;
            --bg-elevated:   #FFFFFF;
            --card:          #FFFFFF;
            --topbar-bg:     #FFF8F6;

            /* Cream equivalents — light tinted */
            --cream:         #FFF0ED;
            --cream-dark:    #FFE8E3;
            --cream-deeper:  #FFDAD3;

            /* Sidebar */
            --sidebar-bg:    #FFFFFF;
            --sidebar-hover: #FFF0ED;
            --sidebar-active:rgba(201, 59, 57, 0.10);
            --sidebar-text:  #6B5558;
            --sidebar-text-hover: #2A1F21;
            --sidebar-text-active: #C93B39;

            /* Text */
            --fg:            #2A1F21;
            --fg-secondary:  #6B5558;
            --fg-muted:      #9A8588;

            /* Borders */
            --border:        #F0DDD8;
            --border-light:  #F8EDEA;

            /* Shadows */
            --shadow-sm:     0 1px 3px rgba(42, 31, 33, 0.06);
            --shadow-md:     0 4px 12px rgba(42, 31, 33, 0.08);
            --shadow-lg:     0 12px 32px rgba(42, 31, 33, 0.12);
            --shadow-xl:     0 24px 48px rgba(42, 31, 33, 0.18);

            /* Radii */
            --radius-sm:     6px;
            --radius-md:     10px;
            --radius-lg:     16px;
            --radius-full:   9999px;

            /* Layout */
            --sidebar-width:          260px;
            --sidebar-collapsed-width: 72px;
            --topbar-height:           68px;

            /* Transitions */
            --ease:          cubic-bezier(0.4, 0, 0.2, 1);
            --duration:      0.2s;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { font-size: 15px; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }
        body { font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; background: var(--bg); color: var(--fg); line-height: 1.6; overflow-x: hidden; }
        a { color: inherit; text-decoration: none; }
        button { font: inherit; border: none; background: none; cursor: pointer; color: inherit; }
        input { font: inherit; border: none; outline: none; background: none; }
        table { border-collapse: collapse; width: 100%; }

        /* === SIDEBAR === */
        .sidebar { position: fixed; top: 0; left: 0; bottom: 0; width: var(--sidebar-width); background: var(--sidebar-bg); display: flex; flex-direction: column; z-index: 1000; transition: width 0.3s var(--ease), transform 0.35s var(--ease); overflow: hidden; box-shadow: var(--shadow-sm); }
        .sidebar-header { display: flex; align-items: center; justify-content: space-between; padding: 20px 16px 12px; flex-shrink: 0; border-bottom: 1px solid var(--border-light); }
        .sidebar-logo { display: flex; align-items: center; gap: 12px; overflow: hidden; min-width: 0; }
        .logo-mark { width: 40px; height: 40px; border-radius: var(--radius-md); background: linear-gradient(135deg, var(--red), var(--pink)); color: #fff; font-size: 1.15rem; font-weight: 700; display: flex; align-items: center; justify-content: center; flex-shrink: 0; letter-spacing: -0.02em; }
        .logo-text { display: flex; flex-direction: column; white-space: nowrap; transition: opacity 0.2s var(--ease), transform 0.2s var(--ease); }
        .logo-name { font-size: 1.05rem; font-weight: 700; color: var(--fg); line-height: 1.2; letter-spacing: -0.01em; }
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
        
        .sidebar.collapsed .nav-link[data-tooltip]::after, .sidebar.collapsed .logout-link[data-tooltip]::after { content: attr(data-tooltip); position: absolute; left: calc(100% + 12px); top: 50%; transform: translateY(-50%); background: var(--card); color: var(--fg); padding: 6px 14px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 500; white-space: nowrap; box-shadow: var(--shadow-lg); border: 1px solid var(--border); opacity: 0; visibility: hidden; transition: opacity 0.15s var(--ease), visibility 0.15s var(--ease); pointer-events: none; z-index: 10; }
        .sidebar.collapsed .nav-link[data-tooltip]:hover::after, .sidebar.collapsed .logout-link[data-tooltip]:hover::after { opacity: 1; visibility: visible; }
        
        .sidebar-footer { padding: 12px; border-top: 1px solid var(--border-light); flex-shrink: 0; }
        .logout-link { display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: var(--radius-sm); color: var(--red); font-size: 0.88rem; font-weight: 500; transition: all var(--duration) var(--ease); position: relative; white-space: nowrap; overflow: hidden; }
        .logout-link:hover { background: var(--cream); color: var(--red-hover); }
        
        .sidebar.collapsed { width: var(--sidebar-collapsed-width); }
        .sidebar.collapsed .sidebar-header { justify-content: center; padding: 20px 0 12px; }
        .sidebar.collapsed .sidebar-logo { justify-content: center; }
        .sidebar.collapsed .logo-text { opacity: 0; transform: translateX(-8px); pointer-events: none; }
        .sidebar.collapsed .sidebar-collapse-btn { position: absolute; right: -14px; top: 24px; width: 28px; height: 28px; background: var(--cream); border: 1px solid var(--border); border-radius: 50%; z-index: 10; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-md); }
        .sidebar.collapsed .sidebar-collapse-btn:hover { background: var(--cream-dark); color: var(--red); }
        .sidebar.collapsed .nav-section-label { opacity: 0; height: 0; margin: 0; overflow: hidden; }
        .sidebar.collapsed .nav-link { justify-content: center; padding: 10px; gap: 0; }
        .sidebar.collapsed .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
        .sidebar.collapsed .logout-link { justify-content: center; padding: 10px; gap: 0; }
        .sidebar.collapsed .logout-link .nav-label { opacity: 0; width: 0; transform: translateX(-8px); }
        .sidebar.collapsed .sidebar-nav { padding: 16px 10px; }
        .sidebar.collapsed .nav-link.active::before { left: -10px; }
        
        .sidebar-overlay { position: fixed; inset: 0; background: rgba(42, 31, 33, 0.4); backdrop-filter: blur(4px); z-index: 999; opacity: 0; visibility: hidden; transition: all 0.3s var(--ease); }
        .sidebar-overlay.visible { opacity: 1; visibility: visible; }

        /* === MAIN WRAPPER === */
        .main-wrapper { margin-left: var(--sidebar-width); min-height: 100vh; display: flex; flex-direction: column; transition: margin-left 0.3s var(--ease); }
        .sidebar.collapsed ~ .main-wrapper, body:has(.sidebar.collapsed) .main-wrapper { margin-left: var(--sidebar-collapsed-width); }

        /* === TOPBAR === */
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

        /* === MAIN CONTENT === */
        .main-content { flex: 1; padding: 28px; }

        /* === ENQUIRIES PAGE SPECIFIC === */
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; gap: 16px; flex-wrap: wrap; }
        .page-header h1 { font-size: 1.6rem; font-weight: 700; color: var(--fg); margin-bottom: 4px; letter-spacing: -0.02em; }
        .page-header p { font-size: 0.9rem; color: var(--fg-muted); }

        .btn-primary { background: var(--red); color: #fff; padding: 10px 18px; border-radius: var(--radius-md); font-weight: 600; display: inline-flex; align-items: center; gap: 8px; font-size: 0.85rem; transition: all var(--duration) var(--ease); box-shadow: var(--shadow-sm); border: 1px solid var(--red); }
        .btn-primary:hover { background: var(--red-hover); border-color: var(--red-hover); transform: translateY(-1px); box-shadow: var(--shadow-md); }

        .tabs-container { display: flex; gap: 8px; margin-bottom: 20px; border-bottom: 1px solid var(--border-light); padding-bottom: 12px; overflow-x: auto; scrollbar-width: none; }
        .tabs-container::-webkit-scrollbar { display: none; }
        .tab-btn { padding: 8px 18px; border-radius: var(--radius-full); font-weight: 600; color: var(--fg-muted); font-size: 0.82rem; background: var(--cream); border: 1px solid transparent; transition: all var(--duration) var(--ease); white-space: nowrap; cursor: pointer; }
        .tab-btn:hover { color: var(--red); background: var(--red-light); }
        .tab-btn.active { background: var(--red); color: #fff; box-shadow: var(--shadow-sm); }

        .status-tag { display: inline-flex; align-items: center; gap: 6px; font-size: 0.76rem; font-weight: 600; padding: 4px 12px; border-radius: var(--radius-full); line-height: 1.4; }
        .status-tag::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: currentColor; }
        .status-open { background: var(--red-light); color: var(--red); }
        .status-answered { background: rgba(46, 139, 87, 0.10); color: #2E8B57; }
        .status-closed { background: var(--cream-dark); color: var(--fg-muted); }

        .panel { background: var(--card); border: 1px solid var(--border-light); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); overflow: hidden; max-width: 100%; }
        .panel-body { padding: 0; overflow-x: auto; }
        
        .data-table thead { position: sticky; top: 0; z-index: 2; }
        .data-table th { padding: 12px 24px; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--fg-muted); background: var(--cream); text-align: left; border-bottom: 1px solid var(--border-light); }
        .data-table td { padding: 14px 24px; font-size: 0.87rem; color: var(--fg); border-bottom: 1px solid var(--border-light); vertical-align: middle; }
        .data-table tbody tr { transition: background var(--duration) var(--ease); }
        .data-table tbody tr:hover { background: var(--cream); }
        .data-table tbody tr:last-child td { border-bottom: none; }

        .table-action-btn { font-size: 0.78rem; font-weight: 500; color: var(--red); padding: 5px 14px; border-radius: var(--radius-full); border: 1px solid var(--red-light); background: var(--red-light); transition: all var(--duration) var(--ease); cursor: pointer; }
        .table-action-btn:hover { background: var(--red); color: #fff; border-color: var(--red); }
        
        .enquiry-subject-cell { font-weight: 600; color: var(--fg); max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .enquiry-id-cell { font-family: 'Courier New', monospace; color: var(--fg-muted); font-size: 0.82rem; font-weight: 600; }

        .empty-state-row { text-align: center; padding: 60px 20px; color: var(--fg-muted); }
        .empty-state-row i { font-size: 2.5rem; margin-bottom: 16px; display: block; opacity: 0.3; color: var(--fg-secondary); }
        .empty-state-row h3 { font-size: 1.1rem; color: var(--fg-secondary); margin-bottom: 6px; font-weight: 600; }

        /* === FOOTER === */
        .main-footer { padding: 18px 28px; text-align: center; font-size: 0.78rem; color: var(--fg-muted); border-top: 1px solid var(--border-light); }
        .main-footer span { font-weight: 600; color: var(--fg-secondary); }

        /* === RESPONSIVE === */
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); width: var(--sidebar-width) !important; }
            .sidebar.collapsed { width: var(--sidebar-width) !important; }
            .sidebar.collapsed .sidebar-collapse-btn { display: none; }
            .sidebar.collapsed .nav-label, .sidebar.collapsed .logo-text, .sidebar.collapsed .nav-section-label, .sidebar.collapsed .logout-link .nav-label { opacity: 1; width: auto; transform: none; height: auto; margin: 0; }
            .sidebar.collapsed .nav-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
            .sidebar.collapsed .logout-link { justify-content: flex-start; gap: 12px; padding: 10px 12px; }
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
            .page-header h1 { font-size: 1.3rem; }
            .data-table { min-width: 700px; }
        }

        :focus-visible { outline: 2px solid var(--pink); outline-offset: 2px; }
        .nav-link:focus-visible { outline-offset: -2px; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
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
        <div class="nav-section-label">My Account</div>
        
        <div class="nav-item">
            <a href="/dashboards/user/index.php" class="nav-link" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="#" class="nav-link" data-tooltip="My Orders">
                <i class="fa-solid fa-bag-shopping nav-icon"></i>
                <span class="nav-label">My Orders</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="#" class="nav-link" data-tooltip="Custom Requests">
                <i class="fa-solid fa-wand-magic-sparkles nav-icon"></i>
                <span class="nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="my_enquiries.php" class="nav-link active" data-tooltip="My Enquiries">
                <i class="fa-solid fa-circle-question nav-icon"></i>
                <span class="nav-label">My Enquiries</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="#" class="nav-link" data-tooltip="Wishlist">
                <i class="fa-solid fa-heart nav-icon"></i>
                <span class="nav-label">Wishlist</span>
            </a>
        </div>

        <div class="nav-section-label">Settings</div>
        <div class="nav-item">
            <a href="#" class="nav-link" data-tooltip="Account Settings">
                <i class="fa-solid fa-user-gear nav-icon"></i>
                <span class="nav-label">Account Settings</span>
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="logout-link" id="logoutBtn" data-tooltip="Logout">
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
                <h2>My Enquiries</h2>
                <p>Track your support tickets and questions.</p>
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
        </div>
    </header>

    <main class="main-content">
        <div class="page-header">
            <div>
                <h1>Support & Enquiries</h1>
                <p>View the status of your questions and support requests.</p>
            </div>
            <button class="btn-primary" onclick="alert('Open new enquiry modal')">
                <i class="fa-solid fa-plus"></i> New Enquiry
            </button>
        </div>

        <div class="tabs-container">
            <button class="tab-btn active" data-filter="all">All Enquiries</button>
            <button class="tab-btn" data-filter="Open">Open</button>
            <button class="tab-btn" data-filter="Answered">Answered</button>
            <button class="tab-btn" data-filter="Closed">Closed</button>
        </div>

        <div class="panel">
            <div class="panel-body">
                <table class="data-table" id="enquiriesTable">
                    <thead>
                        <tr>
                            <th>Enquiry ID</th>
                            <th>Subject</th>
                            <th>Date Submitted</th>
                            <th>Last Update</th>
                            <th>Status</th>
                            <th style="text-align: right; padding-right: 24px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($enquiries)): ?>
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state-row">
                                        <i class="fa-solid fa-inbox"></i>
                                        <h3>No Enquiries Found</h3>
                                        <p>You haven't submitted any enquiries yet.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($enquiries as $enquiry): 
                                $status_class = 'status-' . strtolower($enquiry['status']);
                            ?>
                                <tr data-status="<?= htmlspecialchars($enquiry['status']) ?>">
                                    <td class="enquiry-id-cell"><?= htmlspecialchars($enquiry['id']) ?></td>
                                    <td class="enquiry-subject-cell"><?= htmlspecialchars($enquiry['subject']) ?></td>
                                    <td><?= htmlspecialchars($enquiry['date']) ?></td>
                                    <td><?= htmlspecialchars($enquiry['last_update']) ?></td>
                                    <td><span class="status-tag <?= $status_class ?>"><?= htmlspecialchars($enquiry['status']) ?></span></td>
                                    <td style="text-align: right; padding-right: 24px;">
                                        <button class="table-action-btn" onclick="alert('Viewing <?= $enquiry['id'] ?>')">
                                            View <i class="fa-solid fa-arrow-right" style="margin-left:4px;"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hat's Tastical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<script>
    // --- Sidebar Collapse Logic ---
    const sidebar = document.getElementById('sidebar');
    const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');

    if (sidebarCollapseBtn && sidebar) {
        sidebarCollapseBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            const icon = sidebarCollapseBtn.querySelector('i');
            icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
            icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
        });
    }

    // --- Mobile Sidebar Toggle ---
    const mobileToggle = document.getElementById('mobileToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

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

    // --- Enquiry Tab Filtering ---
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tableRows = document.querySelectorAll('#enquiriesTable tbody tr[data-status]');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active state
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filter = btn.dataset.filter;

            // Filter rows
            tableRows.forEach(row => {
                if (filter === 'all' || row.dataset.status === filter) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
</body>
</html>