<?php
// You can fetch user data here later
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Dashboard - Hattie's Hat'istical Hats</title>
    <link rel="stylesheet" href="/assets/css/users/users.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
            <a href="/dashboards/user/index.php" class="nav-link active" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>
        <div class="nav-item">
            <a href="/api/users/manage_cart.php" class="nav-link" data-tooltip="Cart">
                <i class="fa-solid fa-shopping-cart nav-icon"></i>
                <span class="nav-label">Cart</span>
            </a>
        </div>
        

        <div class="nav-item">
            <a href="/api/users/manage_orders.php" class="nav-link" data-tooltip="My Orders">
                <i class="fa-solid fa-bag-shopping nav-icon"></i>
                <span class="nav-label">My Orders</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="/api/users/manage_enquiries.php" class="nav-link" data-tooltip="Custom Requests">
                <i class="fa-solid fa-wand-magic-sparkles nav-icon"></i>
                <span class="nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="/api/users/manage_enquiries.php" class="nav-link" data-tooltip="My Enquiries">
                <i class="fa-solid fa-circle-question nav-icon"></i>
                <span class="nav-label">My Enquiries</span>
            </a>
        </div>

        <div class="nav-item">
            <a href="/api/users/manage_wishlist.php" class="nav-link" data-tooltip="Wishlist">
                <i class="fa-solid fa-heart nav-icon"></i>
                <span class="nav-label">Wishlist</span>
            </a>
        </div>

        <div class="nav-section-label">Settings</div>
        <div class="nav-item">
            <a href="/api/users/account_settings.php" class="nav-link" data-tooltip="Account Settings">
                <i class="fa-solid fa-user-gear nav-icon"></i>
                <span class="nav-label">Account Settings</span>
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="logout-link" id="logoutBtn">
            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
            <span>Logout</span> 
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
                <h2>Welcome back</h2>
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
                <span class="profile-avatar"></span>
                <span class="profile-label">My Profile</span>
            </a>
        </div>
    </header>

    <main class="main-content">
        <!-- Customer Stat Cards -->
        <section class="stats-grid" aria-label="Account Metrics">
            <div class="stat-card sales">
                <div class="stat-info">
                    <h3>Total Orders</h3>
                    <div class="stat-number" data-target="0">0</div>
                    <span class="stat-change"></span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-box-archive"></i></div>
            </div>
            <div class="stat-card customers">
                <div class="stat-info">
                    <h3>Active Requests</h3>
                    <div class="stat-number" data-target="0">0</div>
                    <span class="stat-change"></span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            </div>
            <div class="stat-card requests">
                <div class="stat-info">
                    <h3>Reward Points</h3>
                    <div class="stat-number" data-target="0">0</div>
                    <span class="stat-change"></span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-coins"></i></div>
            </div>
            <div class="stat-card enquiries">
                <div class="stat-info">
                    <h3>Wishlist Items</h3>
                    <div class="stat-number" data-target="0">0</div>
                    <span class="stat-change"></span>
                </div>
                <div class="stat-icon"><i class="fa-solid fa-heart"></i></div>
            </div>
        </section>

        <!-- Content Panels -->
        <section class="content-grid">
            <!-- Recent Orders Panel -->
            <div class="panel">
                <div class="panel-header">
                    <h2>Recent Orders</h2>
                    <a href="/api/users/manage_orders.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="panel-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Fetch and loop through orders here -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Custom Hat Requests Panel -->
            <div class="panel">
                <div class="panel-header">
                    <h2>My Custom Requests</h2>
                    <a href="/api/users/manage_custom_requests.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                </div>
                <div class="panel-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Hat Type</th>
                                <th>Current Stage</th>
                                <th>Last Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Fetch and loop through custom requests here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
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

    // --- Stat Counter Animation ---
    function animateCounters() {
        document.querySelectorAll('.stat-number[data-target]').forEach(el => {
            const target = parseInt(el.dataset.target, 10);
            if (target === 0) {
                el.textContent = '0';
                return;
            }
            
            const duration = 1200;
            const startTime = performance.now();

            function update(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3); // easeOutCubic
                el.textContent = Math.round(eased * target);
                if (progress < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
        });
    }

    // Trigger animation when stats grid comes into view
    const statsGrid = document.querySelector('.stats-grid');
    if (statsGrid) {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    statsObserver.disconnect();
                }
            });
        }, { threshold: 0.3 });
        statsObserver.observe(statsGrid);
    } else {
        // Fallback if IntersectionObserver isn't supported
        animateCounters();
    }
</script>
</body>
</html>