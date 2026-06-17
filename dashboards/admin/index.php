<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/admin.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Admin Dashboard</title>
</head>
<body>

<div class="sidebar" id="sidebar">

    <!-- Logo & Collapse Toggle -->
    <div class="sidebar-header">
        <a href="/assets/images/logo.png" class="sidebar-logo">
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

        <!-- Dashboard -->
        <div class="nav-item">
            <a href="#" class="nav-link active" aria-current="page" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>

        <!-- Inventory -->
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Inventory">
                <i class="fa-solid fa-box nav-icon"></i>
                <span class="nav-label">Inventory</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/manage_products.php" role="menuitem">All Products</a>
                <a href="/api/admin/manage_orders.php" role="menuitem">All Orders</a>
            </div>
        </div>

        <!-- Customers -->
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <span class="nav-label">Customers</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/manage_customers.php" role="menuitem">All Customers</a>
                <a href="/api/admin/manage_customer_request.php" role="menuitem">All Customer Requests</a>            
            </div>
        </div>

        <!-- Settings -->
        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Settings">
                <i class="fa-solid fa-gear nav-icon"></i>
                <span class="nav-label">Settings</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/settings.php" role="menuitem">General Settings</a>
                <a href="/api/notifications.php" role="menuitem">Notification Settings</a>
                <a href="/api/admin/manage_enquiries.php" role="menuitem">All Enquiries</a>
            </div>
        </div>
    </nav>
    <div class="sidebar-footer">
    <a href="/public/auth/logout.php" class="logout-link" id="logoutBtn">
        <i class="fa-solid fa-right-from-bracket nav-icon"></i>
        <span>Logout</span> 
    </a>
</div>

</div> <!-- sidebar -->

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

 <!-- ========== MAIN WRAPPER ========== -->
    <div class="main-wrapper">

        <!-- Top Bar -->
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="topbar-greeting">
                    <h2>Welcome back, Admin</h2>
                    <p>Here's what's happening with your store today.</p>
                </div>
            </div>
            <div class="topbar-right">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="text" placeholder="Search anything..." id="searchInput" aria-label="Search">
                    <button class="search-btn" id="searchBtn" aria-label="Submit search">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

                <button class="topbar-icon-btn" id="notifToggle" aria-label="Notifications" aria-haspopup="true">
                    <i class="fa-solid fa-bell"></i>
                    <span class="badge-dot"></span>
                </button>

                <a href="/dashboards/admin/profile.php" class="profile-btn" aria-label="Go to profile">
                    <span class="profile-avatar">A</span>
                    <span class="profile-label">Profile</span>
                </a>
            </div>
        </header>

          <!-- ========== MAIN CONTENT ========== -->
        <main class="main-content">

            <!-- Stat Cards -->
            <section class="stats-grid" aria-label="Key Metrics">
                <div class="stat-card sales">
                    <div class="stat-info">
                        <h3>Total Sales</h3>
                        <div class="stat-number" data-target="0">0</div>
                        <span class="stat-change"></span>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-chart-line"></i></div>
                </div>
                <div class="stat-card customers">
                    <div class="stat-info">
                        <h3>Customers</h3>
                        <div class="stat-number" data-target="0">0</div>
                        <span class="stat-change"></span>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-user-group"></i></div>
                </div>
                <div class="stat-card requests">
                    <div class="stat-info">
                        <h3>Custom Requests</h3>
                        <div class="stat-number" data-target="0">0</div>
                        <span class="stat-change"></span>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                </div>
                <div class="stat-card enquiries">
                    <div class="stat-info">
                        <h3>Enquiries</h3>
                        <div class="stat-number" data-target="0">0</div>
                        <span class="stat-change"></span>
                    </div>
                    <div class="stat-icon"><i class="fa-solid fa-circle-question"></i></div>
                </div>
            </section>

            <!-- Content Panels Side by Side -->
            <section class="content-grid">
                <!-- New Customers Panel -->
                <div class="panel">
                    <div class="panel-header">
                        <h2>New Customers</h2>
                        <a href="/api/admin/manage_customers.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="panel-body">
                        <table class="data-table" id="customersTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- New Customer Requests Panel -->
                <div class="panel">
                    <div class="panel-header">
                        <h2>New Customer Requests</h2>
                        <a href="/api/admin/manage_customer_request.php" class="view-all">View All <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="panel-body">
                        <table class="data-table" id="requestsTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Request</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="main-footer">
            &copy; 2025 <span>Hat's Tastical Hats</span>. All rights reserved. Crafted with care.
        </footer>
    </div>

    <!-- ========== SEARCH POPUP ========== -->
    <div class="search-overlay" id="searchOverlay" role="dialog" aria-label="Search">
        <div class="search-popup">
            <div class="search-popup-header">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search customers, orders, products..." id="searchPopupInput" aria-label="Search query">
                <span class="esc-hint">ESC</span>
            </div>
            <div class="search-popup-body" id="searchResults">
                <div class="search-popup-empty">
                    <i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>
                    Start typing to search across your store
                </div>
            </div>
        </div>
    </div>

    <!-- ========== NOTIFICATION PANEL ========== -->
    <div class="notif-panel" id="notifPanel" role="dialog" aria-label="Notifications">
        <div class="notif-panel-header">
            <h3>Notifications</h3>
            <a href="/api/notifications.php">View All</a>
        </div>
        <div class="notif-list">
            <!-- Populated dynamically -->
        </div>
        <div class="notif-panel-footer">
            <a href="/api/notifications.php">See all notifications</a>
        </div>
    </div>

    <!-- ========== VIEW DETAIL MODAL ========== -->
    <div class="modal-overlay" id="detailModal">
        <div class="modal-box">
            <div class="modal-header">
                <h3 id="modalTitle">Details</h3>
                <button class="modal-close" id="modalClose" aria-label="Close modal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body" id="modalBody"></div>
        </div>
    </div>
    
    <!-- ========== LOGOUT CONFIRM MODAL ========== -->
<div class="modal-overlay" id="logoutModal">
    <div class="modal-box" style="max-width: 380px;">
        <div class="modal-header">
            <h3>Confirm Logout</h3>
        </div>
        <div class="modal-body">
            <p style="font-size:0.9rem; color:var(--fg-secondary);">
                Are you sure you want to log out of your account?
            </p>

            <div class="modal-actions" style="margin-top:20px; display:flex; justify-content:flex-end; gap:10px;">
                <button class="btn-secondary" id="cancelLogout">Cancel</button>
                <a href="/public/auth/logout.php" class="btn-danger" id="confirmLogout">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>


    <!-- ========== TOAST CONTAINER ========== -->
    <div class="toast-container" id="toastContainer"></div>

    <script>
        /* ========== DATA ========== */
        const searchData = [];

        /* ========== SIDEBAR COLLAPSE ========== */
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');

        if (sidebarCollapseBtn && sidebar) {
            sidebarCollapseBtn.addEventListener('click', () => {
                // Close any open dropdowns first
                document.querySelectorAll('.nav-item[data-dropdown].open').forEach(item => {
                    item.classList.remove('open');
                    const trigger = item.querySelector('.nav-link');
                    if (trigger) trigger.setAttribute('aria-expanded', 'false');
                });

                sidebar.classList.toggle('collapsed');

                // Flip the chevron icon
                const icon = sidebarCollapseBtn.querySelector('i');
                icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
                icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
            });
        }

        /* ========== SIDEBAR DROPDOWNS ========== */
        document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
            const trigger = item.querySelector('.nav-link');
            trigger.addEventListener('click', () => {
                // If sidebar is collapsed, expand it instead of opening dropdown
                if (sidebar && sidebar.classList.contains('collapsed')) {
                    sidebar.classList.remove('collapsed');
                    if (sidebarCollapseBtn) {
                        const icon = sidebarCollapseBtn.querySelector('i');
                        icon.classList.add('fa-angles-left');
                        icon.classList.remove('fa-angles-right');
                    }
                    return;
                }

                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.nav-item[data-dropdown]').forEach(other => {
                    if (other !== item) other.classList.remove('open');
                });
                item.classList.toggle('open', !isOpen);
                trigger.setAttribute('aria-expanded', !isOpen);
            });
            trigger.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    trigger.click();
                }
            });
        });
        /* ========== LOGOUT CONFIRMATION ========== */
const logoutBtn = document.getElementById('logoutBtn');
const logoutModal = document.getElementById('logoutModal');
const cancelLogout = document.getElementById('cancelLogout');

if (logoutBtn && logoutModal) {
    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault(); // Stop immediate redirect
        logoutModal.classList.add('visible');
    });
}

if (cancelLogout) {
    cancelLogout.addEventListener('click', () => {
        logoutModal.classList.remove('visible');
    });
}

// Close when clicking outside
logoutModal.addEventListener('click', (e) => {
    if (e.target === logoutModal) {
        logoutModal.classList.remove('visible');
    }
});


        /* ========== MOBILE SIDEBAR TOGGLE ========== */
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileToggle = document.getElementById('mobileToggle');

        if (mobileToggle && sidebar && sidebarOverlay) {
            mobileToggle.addEventListener('click', () => {
                sidebar.classList.toggle('open');
                sidebarOverlay.classList.toggle('visible');
            });
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.remove('open');
                sidebarOverlay.classList.remove('visible');
            });
        }

        /* ========== SEARCH POPUP ========== */
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');
        const searchOverlay = document.getElementById('searchOverlay');
        const searchPopupInput = document.getElementById('searchPopupInput');
        const searchResults = document.getElementById('searchResults');

        function openSearch() {
            searchOverlay.classList.add('visible');
            setTimeout(() => searchPopupInput.focus(), 100);
        }
        function closeSearch() {
            searchOverlay.classList.remove('visible');
            searchPopupInput.value = '';
            renderSearchResults('');
        }

        searchInput.addEventListener('focus', openSearch);
        searchBtn.addEventListener('click', openSearch);
        searchOverlay.addEventListener('click', (e) => {
            if (e.target === searchOverlay) closeSearch();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeSearch();
                closeNotifPanel();
                closeModal();
            }
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                openSearch();
            }
        });

        function renderSearchResults(query) {
            const q = query.toLowerCase().trim();
            if (!q) {
                searchResults.innerHTML = `
                    <div class="search-popup-empty">
                        <i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>
                        Start typing to search across your store
                    </div>`;
                return;
            }
            const filtered = searchData.filter(item =>
                item.label.toLowerCase().includes(q) || item.type.toLowerCase().includes(q)
            );
            if (filtered.length === 0) {
                searchResults.innerHTML = `
                    <div class="search-popup-empty">
                        No results found for "<strong>${escapeHtml(query)}</strong>"
                    </div>`;
                return;
            }
            searchResults.innerHTML = filtered.map((item, index) => `
                <div class="search-result-item" data-search-index="${index}">
                    <i class="fa-solid ${item.icon}"></i>
                    <div>
                        <div class="result-label">${highlightMatch(item.label, q)}</div>
                        <div class="result-type">${item.type}</div>
                    </div>
                </div>
            `).join('');

            searchResults.querySelectorAll('.search-result-item').forEach((el, index) => {
                el.addEventListener('click', () => {
                    handleSearchSelect(searchData[index].label);
                });
            });
        }

        searchPopupInput.addEventListener('input', (e) => renderSearchResults(e.target.value));

        function handleSearchSelect(label) {
            closeSearch();
            showToast(`Navigating to: ${label}`, 'info');
        }

        function highlightMatch(text, query) {
            const idx = text.toLowerCase().indexOf(query);
            if (idx === -1) return escapeHtml(text);
            return escapeHtml(text.slice(0, idx)) +
                `<strong style="color:var(--red)">${escapeHtml(text.slice(idx, idx + query.length))}</strong>` +
                escapeHtml(text.slice(idx + query.length));
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        /* ========== NOTIFICATION PANEL ========== */
        const notifToggle = document.getElementById('notifToggle');
        const notifPanel = document.getElementById('notifPanel');

        function closeNotifPanel() {
            notifPanel.classList.remove('visible');
        }

        notifToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            const isOpen = notifPanel.classList.contains('visible');
            closeNotifPanel();
            if (!isOpen) {
                notifPanel.classList.add('visible');
            }
        });

        document.addEventListener('click', (e) => {
            if (!notifPanel.contains(e.target) && !notifToggle.contains(e.target)) {
                closeNotifPanel();
            }
        });

        /* ========== DETAIL MODAL ========== */
        const detailModal = document.getElementById('detailModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalBody = document.getElementById('modalBody');
        const modalClose = document.getElementById('modalClose');

        function openModal(title, rows) {
            modalTitle.textContent = title;
            modalBody.innerHTML = rows.map(([label, value]) =>
                `<div class="detail-row">
                    <span class="detail-label">${label}</span>
                    <span class="detail-value">${value}</span>
                </div>`
            ).join('');
            detailModal.classList.add('visible');
        }

        function closeModal() {
            detailModal.classList.remove('visible');
        }

        modalClose.addEventListener('click', closeModal);
        detailModal.addEventListener('click', (e) => {
            if (e.target === detailModal) closeModal();
        });

        document.querySelectorAll('[data-view-customer]').forEach(btn => {
            btn.addEventListener('click', () => {
                const d = JSON.parse(btn.dataset.viewCustomer);
                openModal('Customer Details', [
                    ['Name', d.name],
                    ['Email', d.email],
                    ['Phone', d.phone],
                    ['Joined', d.joined],
                    ['Total Orders', d.orders],
                ]);
            });
        });

        document.querySelectorAll('[data-view-request]').forEach(btn => {
            btn.addEventListener('click', () => {
                const d = JSON.parse(btn.dataset.viewRequest);
                openModal('Request Details', [
                    ['Customer', d.name],
                    ['Email', d.email],
                    ['Type', `<span class="request-tag">${d.type}</span>`],
                    ['Details', d.details],
                    ['Date', d.date],
                ]);
            });
        });

        /* ========== TOAST ========== */
        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            const icon = type === 'success' ? 'fa-circle-check' : 'fa-circle-info';
            toast.innerHTML = `<i class="fa-solid ${icon}"></i> ${message}`;
            container.appendChild(toast);
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(20px)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        /* ========== STAT COUNTER ANIMATION ========== */
        function animateCounters() {
            document.querySelectorAll('.stat-number[data-target]').forEach(el => {
                const target = parseInt(el.dataset.target, 10);
                if (target === 0) return;
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
        }

        /* ========== INITIAL TOAST ========== */
        setTimeout(() => {
            showToast('Dashboard loaded successfully', 'success');
        }, 800);
    </script>
</body>
</html>