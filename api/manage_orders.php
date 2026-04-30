<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/orders.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Manage Orders — Admin</title>
    
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
            <a href="/dashboards/admin/index.php" class="nav-link" data-tooltip="Dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <span class="nav-label">Dashboard</span>
            </a>
        </div>

        <div class="nav-item open" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="true" data-tooltip="Inventory">
                <i class="fa-solid fa-box nav-icon"></i>
                <span class="nav-label">Inventory</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/manage_products.php" role="menuitem">All Products</a>
                <a href="/api/manage_orders.php" role="menuitem" class="active">All Orders</a>
            </div>
        </div>

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <span class="nav-label">Customers</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/manage_customers.php" role="menuitem">All Customers</a>
                <a href="/api/manage_customer_request.php" role="menuitem">All Customer Requests</a>
            </div>
        </div>

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Settings">
                <i class="fa-solid fa-gear nav-icon"></i>
                <span class="nav-label">Settings</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/manage_settings.php" role="menuitem">General Settings</a>
                <a href="/api/manage_notifications.php" role="menuitem">Notification Settings</a>
                <a href="/api/manage_enquiries.php" role="menuitem">All Enquiries</a>
            </div>
        </div>
    </nav>

</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="main-wrapper">

    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="topbar-greeting">
                <h2>Orders</h2>
                <p>Track and manage all store orders</p>
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

    <!-- ========== ORDERS MAIN CONTENT ========== -->
    <main class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-info">
                <h1>All Orders</h1>
                <p class="order-count" id="orderCount">0 orders</p>
            </div>
            <div class="page-header-actions">
                <div class="view-toggle">
                    <button class="view-toggle-btn active" data-view="tile" aria-label="Tile view" title="Tile view">
                        <i class="fa-solid fa-grip"></i>
                    </button>
                    <button class="view-toggle-btn" data-view="list" aria-label="List view" title="List view">
                        <i class="fa-solid fa-list"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search by order ID, customer..." id="orderSearch" aria-label="Search orders">
            </div>
            <div class="filter-select">
                <select id="filterStatus" aria-label="Filter by status">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <button class="btn-ghost btn-sm" id="clearFiltersBtn" style="display:none;">
                <i class="fa-solid fa-xmark"></i>
                <span>Clear</span>
            </button>
        </div>

        <!-- Status Summary Chips -->
        <div class="status-summary" id="statusSummary" style="display:none;">
            <!-- Populated dynamically -->
        </div>

        <!-- Empty State -->
        <div class="empty-state" id="emptyState">
            <div class="empty-state-icon">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <h3>No orders yet</h3>
            <p>When customers place orders, they will appear here</p>
        </div>

        <!-- No Results State -->
        <div class="empty-state empty-state-sm" id="noResults" style="display:none;">
            <i class="fa-solid fa-filter-circle-xmark"></i>
            <h3>No orders match your filters</h3>
            <p>Try adjusting your search or filter criteria</p>
        </div>

        <!-- Tile View -->
        <div class="order-tile-grid" id="tileView" style="display:none;">
            <!-- Populated dynamically -->
        </div>

        <!-- List View -->
        <div class="order-list-wrapper" id="listView" style="display:none;">
            <table class="data-table order-list-table" id="orderListTable">
                <thead>
                    <tr>
                        <th class="col-ord-id">Order</th>
                        <th class="col-ord-customer">Customer</th>
                        <th class="col-ord-items">Items</th>
                        <th class="col-ord-total">Total</th>
                        <th class="col-ord-status">Status</th>
                        <th class="col-ord-date">Date</th>
                        <th class="col-ord-actions">Actions</th>
                    </tr>
                </thead>
                <tbody id="orderListBody">
                    <!-- Populated dynamically -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper" id="paginationWrapper" style="display:none;">
            <div class="pagination-info" id="paginationInfo"></div>
            <div class="pagination" id="pagination"></div>
        </div>

    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ========== VIEW ORDER DETAIL MODAL ========== -->
<div class="modal-overlay" id="viewOrderModal">
    <div class="modal-box modal-box-lg">
        <div class="modal-header">
            <h3 id="viewOrderTitle">Order Details</h3>
            <button class="modal-close" id="viewOrderClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body modal-body-lg">
            <!-- Order Header -->
            <div class="order-detail-header">
                <div>
                    <h2 id="ordDetailId" class="order-detail-id-text"></h2>
                    <span class="order-detail-date-text" id="ordDetailDate"></span>
                </div>
                <span id="ordDetailStatus"></span>
            </div>

            <!-- Customer Info -->
            <div class="order-detail-customer-card">
                <div class="order-detail-customer-avatar" id="ordDetailAvatar"></div>
                <div class="order-detail-customer-info">
                    <h3 id="ordDetailCustomerName"></h3>
                    <div class="order-detail-contact-row">
                        <span><i class="fa-solid fa-envelope"></i> <span id="ordDetailEmail"></span></span>
                        <span><i class="fa-solid fa-phone"></i> <span id="ordDetailPhone"></span></span>
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="order-detail-section">
                <div class="order-detail-section-header">
                    <i class="fa-solid fa-truck"></i>
                    <h3>Shipping Address</h3>
                </div>
                <div class="order-detail-section-body" id="ordDetailAddress"></div>
            </div>

            <!-- Order Items -->
            <div class="order-detail-section">
                <div class="order-detail-section-header">
                    <i class="fa-solid fa-box"></i>
                    <h3>Items</h3>
                </div>
                <div class="order-detail-items" id="ordDetailItems">
                    <!-- Populated dynamically -->
                </div>
            </div>

            <!-- Order Totals -->
            <div class="order-detail-totals" id="ordDetailTotals">
                <!-- Populated dynamically -->
            </div>

            <!-- Notes -->
            <div class="order-detail-section" id="ordDetailNotesSection" style="display:none;">
                <div class="order-detail-section-header">
                    <i class="fa-solid fa-sticky-note"></i>
                    <h3>Notes</h3>
                </div>
                <div class="order-detail-section-body order-detail-notes" id="ordDetailNotes"></div>
            </div>

            <!-- Actions -->
            <div class="order-detail-actions" id="ordDetailActions">
                <!-- Populated dynamically based on status -->
            </div>
        </div>
    </div>
</div>

<!-- ========== UPDATE STATUS MODAL ========== -->
<div class="modal-overlay" id="updateStatusModal">
    <div class="modal-box modal-box-sm">
        <div class="delete-modal-body">
            <div class="delete-modal-icon status-update-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
            <h3 id="updateStatusTitle">Update Status</h3>
            <p>Change status for order <strong id="updateStatusOrderId"></strong></p>
            <div class="status-select-wrap">
                <select id="newStatusSelect" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="shipped">Shipped</option>
                    <option value="delivered">Delivered</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="modal-actions">
            <button class="btn-ghost" id="updateStatusCancelBtn">Cancel</button>
            <button class="btn-primary" id="updateStatusConfirmBtn">
                <i class="fa-solid fa-check"></i>
                <span>Update</span>
            </button>
        </div>
    </div>
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

<!-- ========== TOAST CONTAINER ========== -->
<div class="toast-container" id="toastContainer" role="status" aria-live="polite"></div>

<script>
/* ================================================================
   SIDEBAR
   ================================================================ */
const sidebar = document.getElementById('sidebar');
const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');

if (sidebarCollapseBtn && sidebar) {
    sidebarCollapseBtn.addEventListener('click', () => {
        document.querySelectorAll('.nav-item[data-dropdown].open').forEach(item => {
            item.classList.remove('open');
            const t = item.querySelector('.nav-link');
            if (t) t.setAttribute('aria-expanded', 'false');
        });
        sidebar.classList.toggle('collapsed');
        const icon = sidebarCollapseBtn.querySelector('i');
        icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
        icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
    });
}

document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
    const trigger = item.querySelector('.nav-link');
    trigger.addEventListener('click', () => {
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
        document.querySelectorAll('.nav-item[data-dropdown]').forEach(o => { if (o !== item) o.classList.remove('open'); });
        item.classList.toggle('open', !isOpen);
        trigger.setAttribute('aria-expanded', !isOpen);
    });
    trigger.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); trigger.click(); }
    });
});

const sidebarOverlay = document.getElementById('sidebarOverlay');
const mobileToggle = document.getElementById('mobileToggle');
if (mobileToggle && sidebar && sidebarOverlay) {
    mobileToggle.addEventListener('click', () => { sidebar.classList.toggle('open'); sidebarOverlay.classList.toggle('visible'); });
    sidebarOverlay.addEventListener('click', () => { sidebar.classList.remove('open'); sidebarOverlay.classList.remove('visible'); });
}

/* ================================================================
   GLOBAL SEARCH & NOTIFICATIONS
   ================================================================ */
const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchBtn');
const searchOverlay = document.getElementById('searchOverlay');
const searchPopupInput = document.getElementById('searchPopupInput');

function openSearch() { searchOverlay.classList.add('visible'); setTimeout(() => searchPopupInput.focus(), 100); }
function closeSearch() { searchOverlay.classList.remove('visible'); searchPopupInput.value = ''; }
searchInput.addEventListener('focus', openSearch);
searchBtn.addEventListener('click', openSearch);
searchOverlay.addEventListener('click', (e) => { if (e.target === searchOverlay) closeSearch(); });
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') { closeSearch(); closeNotifPanel(); closeViewOrder(); closeUpdateStatus(); }
    if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); openSearch(); }
});

const notifToggle = document.getElementById('notifToggle');
const notifPanel = document.getElementById('notifPanel');
function closeNotifPanel() { notifPanel.classList.remove('visible'); }
notifToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = notifPanel.classList.contains('visible');
    closeNotifPanel();
    if (!isOpen) notifPanel.classList.add('visible');
});
document.addEventListener('click', (e) => {
    if (!notifPanel.contains(e.target) && !notifToggle.contains(e.target)) closeNotifPanel();
});

/* ================================================================
   TOAST
   ================================================================ */
function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    const icon = type === 'success' ? 'fa-circle-check' : type === 'error' ? 'fa-circle-xmark' : 'fa-circle-info';
    toast.innerHTML = `<i class="fa-solid ${icon}"></i> ${message}`;
    container.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(20px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

/* ================================================================
   DATA STORE
   ================================================================ */
let orders = [];
let currentViewId = null;
let activeView = 'tile';
const PER_PAGE = 10;
let currentPage = 1;

// State populated by the API
let totalOrders = 0;
let totalPages = 1;
let statusCounts = { pending: 0, processing: 0, shipped: 0, delivered: 0, cancelled: 0 };

/* ================================================================
   HELPERS
   ================================================================ */
function escapeHtml(str) {
    if (str == null) return '';
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

function getInitials(first, last) {
    return ((first || '').charAt(0) + (last || '').charAt(0)).toUpperCase() || '?';
}

function statusBadge(status) {
    const map = {
        'pending':    { label: 'Pending',    cls: 'status-low-stock' },
        'processing': { label: 'Processing', cls: 'status-featured' },
        'shipped':    { label: 'Shipped',    cls: 'status-in-stock' },
        'delivered':  { label: 'Delivered',  cls: 'status-on-sale' },
        'cancelled':  { label: 'Cancelled',  cls: 'status-out-of-stock' },
    };
    const s = map[status] || { label: status, cls: '' };
    return `<span class="status-badge ${s.cls}">${s.label}</span>`;
}

function statusTileClass(status) {
    const map = {
        'pending': 'order-tile-pending',
        'processing': 'order-tile-processing',
        'shipped': 'order-tile-shipped',
        'delivered': 'order-tile-delivered',
        'cancelled': 'order-tile-cancelled',
    };
    return map[status] || 'order-tile-pending';
}

function statusSummaryClass(status) {
    const map = {
        'pending': 'summary-pending',
        'processing': 'summary-processing',
        'shipped': 'summary-shipped',
        'delivered': 'summary-delivered',
        'cancelled': 'summary-cancelled',
    };
    return map[status] || 'summary-pending';
}

/* ================================================================
   API FETCH
   ================================================================ */
async function fetchOrders() {
    try {
        const search = document.getElementById('orderSearch').value.trim();
        const status = document.getElementById('filterStatus').value;
        
        const params = new URLSearchParams({
            action: 'list',
            page: currentPage,
            per_page: PER_PAGE,
        });
        if (search) params.set('search', search);
        if (status) params.set('status', status);

        const res = await fetch(`/api/handlers/orders_handler.php?${params}`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        
        const data = await res.json();

        // Update global state
        orders = data.orders || [];
        totalOrders = data.total || 0;
        totalPages = data.total_pages || 1;
        statusCounts = data.status_counts || statusCounts;

        // Render the UI with the new data
        renderOrders();
    } catch (err) {
        console.error('Failed to fetch orders:', err);
        showToast('Failed to load orders', 'error');
    }
}

/* ================================================================
   VIEW TOGGLE
   ================================================================ */
document.querySelectorAll('.view-toggle-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.view-toggle-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        activeView = btn.dataset.view;
        currentPage = 1;
        fetchOrders(); // Re-fetch from API
    });
});

/* ================================================================
   RENDER (Pure UI Updates based on Global State)
   ================================================================ */
function renderOrders() {
    // `orders` array is already paginated and filtered from the API
    const pageItems = orders;
    const start = (currentPage - 1) * PER_PAGE; // For "Showing X-Y" text

    const emptyState = document.getElementById('emptyState');
    const noResults = document.getElementById('noResults');
    const tileView = document.getElementById('tileView');
    const listView = document.getElementById('listView');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const orderCount = document.getElementById('orderCount');
    const statusSummary = document.getElementById('statusSummary');

    orderCount.textContent = `${totalOrders} order${totalOrders !== 1 ? 's' : ''}`;

    const clearBtn = document.getElementById('clearFiltersBtn');
    const hasActiveFilters = document.getElementById('orderSearch').value || document.getElementById('filterStatus').value;
    clearBtn.style.display = hasActiveFilters ? 'flex' : 'none';

    // Reset visibility
    emptyState.style.display = 'none';
    noResults.style.display = 'none';
    tileView.style.display = 'none';
    listView.style.display = 'none';
    paginationWrapper.style.display = 'none';
    statusSummary.style.display = 'none';

    if (totalOrders === 0 && !hasActiveFilters) {
        emptyState.style.display = '';
        return;
    }

    if (pageItems.length === 0) {
        noResults.style.display = '';
        return;
    }

    // Status summary chips
    statusSummary.innerHTML = Object.entries(statusCounts).filter(([, v]) => v > 0).map(([k, v]) => `
        <div class="summary-chip ${statusSummaryClass(k)}">
            <span class="summary-chip-count">${v}</span>
            <span class="summary-chip-label">${k.charAt(0).toUpperCase() + k.slice(1)}</span>
        </div>
    `).join('');
    statusSummary.style.display = '';

    paginationWrapper.style.display = totalPages > 1 ? '' : 'none';

    if (activeView === 'tile') {
        renderTileView(pageItems);
        tileView.style.display = '';
    } else {
        renderListView(pageItems);
        listView.style.display = '';
    }

    renderPagination(totalOrders, totalPages, start, pageItems.length);
}

function renderTileView(items) {
    const grid = document.getElementById('tileView');
    grid.innerHTML = items.map(o => {
        const nameParts = (o.customerName || '').split(' ');
        const initials = getInitials(nameParts[0], nameParts[1]);
        const itemCount = o.items ? o.items.length : 0;
        return `
            <div class="order-tile ${statusTileClass(o.status)}" data-id="${escapeHtml(o.id)}">
                <div class="order-tile-top">
                    <span class="order-tile-id">${escapeHtml(o.id)}</span>
                    <span class="order-tile-status">${statusBadge(o.status)}</span>
                </div>
                <div class="order-tile-customer">
                    <span class="order-tile-avatar">${initials}</span>
                    <div>
                        <h3 class="order-tile-name">${escapeHtml(o.customerName)}</h3>
                        <p class="order-tile-email">${escapeHtml(o.customerEmail)}</p>
                    </div>
                </div>
                <div class="order-tile-meta">
                    <span class="order-tile-meta-item"><i class="fa-solid fa-box"></i> ${itemCount} item${itemCount !== 1 ? 's' : ''}</span>
                    <span class="order-tile-meta-item"><i class="fa-regular fa-calendar"></i> ${escapeHtml(o.date)}</span>
                </div>
                <div class="order-tile-footer">
                    <span class="order-tile-total">$${parseFloat(o.total || 0).toFixed(2)}</span>
                    <button class="btn-ghost btn-sm order-tile-view-btn" data-view="${escapeHtml(o.id)}">View Order</button>
                </div>
            </div>`;
    }).join('');

    grid.querySelectorAll('[data-view]').forEach(btn => {
        btn.addEventListener('click', () => openViewOrder(btn.dataset.view));
    });
}

function renderListView(items) {
    const tbody = document.getElementById('orderListBody');
    tbody.innerHTML = items.map(o => {
        const nameParts = (o.customerName || '').split(' ');
        const initials = getInitials(nameParts[0], nameParts[1]);
        const itemCount = o.items ? o.items.length : 0;
        return `
            <tr class="${statusTileClass(o.status)}">
                <td class="col-ord-id"><span class="order-id-cell">${escapeHtml(o.id)}</span></td>
                <td class="col-ord-customer">
                    <div class="customer-cell">
                        <span class="customer-avatar-sm">${initials}</span>
                        <div>
                            <span class="customer-name-cell">${escapeHtml(o.customerName)}</span>
                            <span class="customer-email-sub">${escapeHtml(o.customerEmail)}</span>
                        </div>
                    </div>
                </td>
                <td class="col-ord-items">${itemCount} item${itemCount !== 1 ? 's' : ''}</td>
                <td class="col-ord-total">$${parseFloat(o.total || 0).toFixed(2)}</td>
                <td class="col-ord-status">${statusBadge(o.status)}</td>
                <td class="col-ord-date">${escapeHtml(o.date)}</td>
                <td class="col-ord-actions">
                    <div class="table-actions">
                        <button class="table-action-icon" data-view="${escapeHtml(o.id)}" aria-label="View order" title="View">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
    }).join('');

    tbody.querySelectorAll('[data-view]').forEach(btn => {
        btn.addEventListener('click', () => openViewOrder(btn.dataset.view));
    });
}

function renderPagination(total, pages, start, showing) {
    const info = document.getElementById('paginationInfo');
    info.textContent = `Showing ${start + 1}–${start + showing} of ${total}`;

    const pag = document.getElementById('pagination');
    let html = '';
    html += `<button class="pag-btn" data-page="${currentPage - 1}" ${currentPage === 1 ? 'disabled' : ''} aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>`;
    
    for (let i = 1; i <= pages; i++) {
        if (pages > 7 && i > 2 && i < pages - 1 && Math.abs(i - currentPage) > 1) {
            if (i === 3 || i === pages - 2) html += `<span class="pag-dots">...</span>`;
            continue;
        }
        html += `<button class="pag-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
    }
    
    html += `<button class="pag-btn" data-page="${currentPage + 1}" ${currentPage === pages ? 'disabled' : ''} aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>`;
    pag.innerHTML = html;

    pag.querySelectorAll('.pag-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const p = parseInt(btn.dataset.page);
            if (p >= 1 && p <= pages) { 
                currentPage = p; 
                fetchOrders(); // Fetch new page from API
            }
        });
    });
}

/* ================================================================
   VIEW ORDER DETAIL MODAL
   ================================================================ */
const viewOrderModal = document.getElementById('viewOrderModal');

function openViewOrder(orderId) {
    // Find order in current state to avoid extra API call
    const o = orders.find(x => x.id === orderId);
    if (!o) return;
    currentViewId = orderId;

    document.getElementById('viewOrderTitle').textContent = 'Order Details';
    document.getElementById('ordDetailId').textContent = `Order ${o.id}`;
    document.getElementById('ordDetailDate').textContent = o.date || 'N/A';
    document.getElementById('ordDetailStatus').innerHTML = statusBadge(o.status);

    const nameParts = (o.customerName || '').split(' ');
    document.getElementById('ordDetailAvatar').textContent = getInitials(nameParts[0], nameParts[1]);
    document.getElementById('ordDetailCustomerName').textContent = o.customerName || 'N/A';
    document.getElementById('ordDetailEmail').textContent = o.customerEmail || 'N/A';
    document.getElementById('ordDetailPhone').textContent = o.customerPhone || 'N/A';
    document.getElementById('ordDetailAddress').textContent = o.shippingAddress || 'No address provided';

    // Items
    const itemsContainer = document.getElementById('ordDetailItems');
    const items = o.items || [];
    if (items.length > 0) {
        itemsContainer.innerHTML = items.map(item => `
            <div class="order-item-row">
                <div class="order-item-info">
                    <span class="order-item-name">${escapeHtml(item.name)}</span>
                    <span class="order-item-qty">Qty: ${item.quantity}</span>
                </div>
                <span class="order-item-price">$${parseFloat(item.price || 0).toFixed(2)}</span>
            </div>
        `).join('');
    } else {
        itemsContainer.innerHTML = '<p class="order-items-empty">No items</p>';
    }

    // Totals
    const subtotal = items.reduce((s, i) => s + (parseFloat(i.price || 0) * (parseInt(i.quantity) || 0)), 0);
    const shipping = parseFloat(o.shipping) || 0;
    const total = parseFloat(o.total) || 0;
    document.getElementById('ordDetailTotals').innerHTML = `
        <div class="order-total-row">
            <span>Subtotal</span>
            <span>$${subtotal.toFixed(2)}</span>
        </div>
        <div class="order-total-row">
            <span>Shipping</span>
            <span>$${shipping.toFixed(2)}</span>
        </div>
        <div class="order-total-row order-total-final">
            <span>Total</span>
            <span>$${total.toFixed(2)}</span>
        </div>
    `;

    // Notes
    const notesSection = document.getElementById('ordDetailNotesSection');
    if (o.notes && o.notes.trim()) {
        notesSection.style.display = '';
        document.getElementById('ordDetailNotes').textContent = o.notes;
    } else {
        notesSection.style.display = 'none';
    }

    // Actions
    const actionsEl = document.getElementById('ordDetailActions');
    if (o.status === 'cancelled' || o.status === 'delivered') {
        actionsEl.style.display = 'none';
    } else {
        actionsEl.style.display = '';
        actionsEl.innerHTML = `
            <button class="btn-danger btn-sm" id="cancelOrderBtn">
                <i class="fa-solid fa-xmark"></i>
                <span>Cancel Order</span>
            </button>
            <button class="btn-primary" id="updateStatusBtn">
                <i class="fa-solid fa-pen-to-square"></i>
                <span>Update Status</span>
            </button>
        `;

        document.getElementById('updateStatusBtn').addEventListener('click', () => {
            document.getElementById('updateStatusOrderId').textContent = o.id;
            document.getElementById('newStatusSelect').value = o.status;
            updateStatusModal.classList.add('visible');
        });

        document.getElementById('cancelOrderBtn').addEventListener('click', () => {
            updateOrderStatus(o.id, 'cancelled');
        });
    }

    viewOrderModal.classList.add('visible');
}

function closeViewOrder() {
    viewOrderModal.classList.remove('visible');
    currentViewId = null;
}

document.getElementById('viewOrderClose').addEventListener('click', closeViewOrder);
viewOrderModal.addEventListener('click', (e) => { if (e.target === viewOrderModal) closeViewOrder(); });

/* ================================================================
   API: UPDATE ORDER STATUS
   ================================================================ */
async function updateOrderStatus(orderId, newStatus) {
    if (!currentViewId && !orderId) return;
    const targetId = orderId || currentViewId;

    try {
        const res = await fetch('/api/handlers/orders_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'update_status', id: targetId, status: newStatus })
        });

        const data = await res.json();

        if (!res.ok || data.error) {
            throw new Error(data.error || 'Failed to update status');
        }

        // Success flow
        closeViewOrder();
        closeUpdateStatus();
        
        const label = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
        showToast(data.message || `Order status updated to ${label}`, 'success');
        
        // Re-fetch list to reflect changes and summary counts
        await fetchOrders();

    } catch (err) {
        console.error('Status update error:', err);
        showToast(err.message || 'Failed to update order status', 'error');
    }
}

/* ================================================================
   UPDATE STATUS MODAL
   ================================================================ */
const updateStatusModal = document.getElementById('updateStatusModal');

function closeUpdateStatus() { updateStatusModal.classList.remove('visible'); }
document.getElementById('updateStatusCancelBtn').addEventListener('click', closeUpdateStatus);
updateStatusModal.addEventListener('click', (e) => { if (e.target === updateStatusModal) closeUpdateStatus(); });

document.getElementById('updateStatusConfirmBtn').addEventListener('click', () => {
    const newStatus = document.getElementById('newStatusSelect').value;
    if (!currentViewId || !newStatus) return;
    updateOrderStatus(currentViewId, newStatus);
});

/* ================================================================
   FILTERS
   ================================================================ */
document.getElementById('orderSearch').addEventListener('input', () => { 
    currentPage = 1; 
    fetchOrders(); 
});
document.getElementById('filterStatus').addEventListener('change', () => { 
    currentPage = 1; 
    fetchOrders(); 
});
document.getElementById('clearFiltersBtn').addEventListener('click', () => {
    document.getElementById('orderSearch').value = '';
    document.getElementById('filterStatus').value = '';
    currentPage = 1;
    fetchOrders();
});

/* ================================================================
   INITIAL RENDER
   ================================================================ */
fetchOrders();
</script>
</body>
</html>