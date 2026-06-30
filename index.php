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
                    <span class="stat-change up"><i class="fa-solid fa-arrow-up"></i> +3 this month</span>
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
                    <span class="stat-change up"><i class="fa-solid fa-arrow-up"></i> +65 earned</span>
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
        <section class="quick-actions-section" aria-label="Quick Actions">
            <div class="quick-actions-grid">
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
                <a href="/api/users/manage_orders.php" class="quick-action-card">
                    <div class="quick-action-icon"><i class="fa-solid fa-truck"></i></div>
                    <div class="quick-action-label">Track Orders</div>
                    <div class="quick-action-desc">See where your hats are</div>
                </a>
                <a href="/api/users/manage_wishlist.php" class="quick-action-card">
                    <div class="quick-action-icon"><i class="fa-solid fa-heart"></i></div>
                    <div class="quick-action-label">Wishlist</div>
                    <div class="quick-action-desc">View your saved favourites</div>
                </a>
            </div>
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

<!-- Toast Container -->
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
                        <td class="table-hat-type">${r.type}</td>
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
   INIT
   ================================================================ */
renderOrders();
renderRequests();
</script>

</body>
</html>