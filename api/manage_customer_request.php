<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/requests.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Customer Requests — Admin</title>
    
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

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Inventory">
                <i class="fa-solid fa-box nav-icon"></i>
                <span class="nav-label">Inventory</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/manage_products.php" role="menuitem">All Products</a>
                <a href="/api/manage_orders.php" role="menuitem">All Orders</a>
            </div>
        </div>

        <div class="nav-item open" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="true" data-tooltip="Customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <span class="nav-label">Customers</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/manage_customers.php" role="menuitem">All Customers</a>
                <a href="/api/manage_customer_request.php" role="menuitem" class="active">All Customer Requests</a>
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
                <h2>Customer Requests</h2>
                <p>Review and manage custom hat requests</p>
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

    <!-- ========== REQUESTS MAIN CONTENT ========== -->
    <main class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-info">
                <h1>All Customer Requests</h1>
                <p class="request-count" id="requestCount">0 requests</p>
            </div>
            <div class="page-header-actions">
                <div class="view-toggle">
                    <button class="view-toggle-btn active" data-view="tile" aria-label="Tile view" title="Tile view">
                        <i class="fa-solid fa-grid-2"></i>
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
                <input type="text" placeholder="Search by name, request type..." id="requestSearch" aria-label="Search requests">
            </div>
            <div class="filter-select">
                <select id="filterStatus" aria-label="Filter by status">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="added-to-order">Added to Order</option>
                    <option value="ignored">Ignored</option>
                </select>
            </div>
            <button class="btn-ghost btn-sm" id="clearFiltersBtn" style="display:none;">
                <i class="fa-solid fa-xmark"></i>
                <span>Clear</span>
            </button>
        </div>

        <!-- Empty State -->
        <div class="empty-state" id="emptyState">
            <div class="empty-state-icon">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>
            <h3>No requests yet</h3>
            <p>When customers submit custom hat requests, they will appear here</p>
        </div>

        <!-- No Results State -->
        <div class="empty-state empty-state-sm" id="noResults" style="display:none;">
            <i class="fa-solid fa-filter-circle-xmark"></i>
            <h3>No requests match your filters</h3>
            <p>Try adjusting your search or filter criteria</p>
        </div>

        <!-- Tile View -->
        <div class="request-tile-grid" id="tileView" style="display:none;">
            <!-- Populated dynamically -->
        </div>

        <!-- List View -->
        <div class="request-list-wrapper" id="listView" style="display:none;">
            <table class="data-table request-list-table" id="requestListTable">
                <thead>
                    <tr>
                        <th class="col-req-customer">Customer</th>
                        <th class="col-req-preview">Request</th>
                        <th class="col-req-date">Date</th>
                        <th class="col-req-status">Status</th>
                        <th class="col-req-actions">Actions</th>
                    </tr>
                </thead>
                <tbody id="requestListBody">
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
        &copy; 2025 <span>Hat's Tastical Hats</span>. All rights reserved. Crafted with care.
    </footer>
</div>

<!-- ========== VIEW REQUEST DETAIL MODAL ========== -->
<div class="modal-overlay" id="viewRequestModal">
    <div class="modal-box modal-box-lg">
        <div class="modal-header">
            <h3 id="viewRequestTitle">Request Details</h3>
            <button class="modal-close" id="viewRequestClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body modal-body-lg">
            <div class="request-detail-top">
                <div class="request-detail-avatar" id="reqDetailAvatar"></div>
                <div class="request-detail-identity">
                    <h2 id="reqDetailFullName"></h2>
                    <span class="request-detail-date" id="reqDetailDate"></span>
                </div>
                <span class="request-detail-status" id="reqDetailStatus"></span>
            </div>

            <div class="request-detail-grid" id="reqDetailGrid">
                <!-- Populated dynamically -->
            </div>

            <div class="request-detail-section">
                <div class="request-detail-section-header">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <h3>Custom Request Details</h3>
                </div>
                <div class="request-detail-content" id="reqDetailContent">
                    <!-- Populated dynamically -->
                </div>
            </div>

            <div class="request-detail-actions" id="reqDetailActions">
                <button class="btn-danger btn-sm" id="reqIgnoreBtn">
                    <i class="fa-solid fa-ban"></i>
                    <span>Ignore</span>
                </button>
                <button class="btn-primary" id="reqAddToOrderBtn">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span>Add to Order</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- ========== ADD TO ORDER CONFIRMATION MODAL ========== -->
<div class="modal-overlay" id="addToOrderModal">
    <div class="modal-box modal-box-sm">
        <div class="delete-modal-body">
            <div class="delete-modal-icon confirm-icon">
                <i class="fa-solid fa-cart-plus"></i>
            </div>
            <h3>Add to Order</h3>
            <p>Convert <strong id="addToOrderName"></strong>'s custom request into a new order?</p>
        </div>
        <div class="modal-actions">
            <button class="btn-ghost" id="addToOrderCancelBtn">Cancel</button>
            <button class="btn-primary" id="addToOrderConfirmBtn">
                <i class="fa-solid fa-check"></i>
                <span>Confirm</span>
            </button>
        </div>
    </div>
</div>

<!-- ========== IGNORE CONFIRMATION MODAL ========== -->
<div class="modal-overlay" id="ignoreModal">
    <div class="modal-box modal-box-sm">
        <div class="delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fa-solid fa-ban"></i>
            </div>
            <h3>Ignore Request</h3>
            <p>Are you sure you want to ignore <strong id="ignoreName"></strong>'s request? You can still change this later.</p>
        </div>
        <div class="modal-actions">
            <button class="btn-ghost" id="ignoreCancelBtn">Cancel</button>
            <button class="btn-danger" id="ignoreConfirmBtn">
                <i class="fa-solid fa-ban"></i>
                <span>Ignore</span>
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
<div class="toast-container" id="toastContainer"></div>

<script>/* ================================================================
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
    if (e.key === 'Escape') { closeSearch(); closeNotifPanel(); closeViewRequest(); closeAddToOrder(); closeIgnore(); }
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
let requests = [];
let currentViewId = null;
let activeView = 'tile';
const PER_PAGE = 12;
let currentPage = 1;
let totalRequests = 0;
let totalPages = 1;

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

function truncate(str, len) {
    if (!str) return '';
    return str.length > len ? str.slice(0, len) + '...' : str;
}

function statusBadge(status) {
    const map = {
        'pending':        { label: 'Pending',         cls: 'status-low-stock' },
        'added-to-order': { label: 'Added to Order',  cls: 'status-in-stock' },
        'ignored':        { label: 'Ignored',         cls: 'status-out-of-stock' },
    };
    const s = map[status] || { label: status, cls: '' };
    return `<span class="status-badge ${s.cls}">${s.label}</span>`;
}

function statusClass(status) {
    const map = { 'pending': 'request-pending', 'added-to-order': 'request-added', 'ignored': 'request-ignored' };
    return map[status] || 'request-pending';
}

/* ================================================================
   API: FETCH REQUESTS
   ================================================================ */
async function fetchRequests() {
    try {
        const search = document.getElementById('requestSearch').value.trim();
        const status = document.getElementById('filterStatus').value;

        const params = new URLSearchParams({
            action: 'list',
            page: currentPage,
            per_page: PER_PAGE,
        });
        if (search) params.set('search', search);
        if (status) params.set('status', status);

        const res = await fetch(`/api/handlers/customers_request_handler.php?${params}`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        
        const data = await res.json();

        requests      = data.requests || [];
        totalRequests = data.total || 0;
        totalPages   = data.total_pages || 1;

        renderRequests();
    } catch (err) {
        console.error('Failed to fetch requests:', err);
        showToast('Failed to load requests', 'error');
    }
}

/* ================================================================
   API: UPDATE REQUEST STATUS
   ================================================================ */
async function updateRequestStatus(requestId, newStatus) {
    if (!requestId || !newStatus) return;
    
    try {
        const res = await fetch('/api/handlers/customers_request_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'update_status', id: requestId, status: newStatus })
        });
        
        const data = await res.json();
        if (!res.ok || data.error) throw new Error(data.error || 'Update failed');

        // Close modals first for snappy UI
        closeAddToOrder();
        closeIgnore();
        closeViewRequest();

        // Re-fetch list to reflect changes and update counts
        await fetchRequests();

        const label = newStatus === 'added-to-order' ? 'Added to Order' : 
                     newStatus === 'ignored' ? 'Ignored' : 
                     newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
        
        showToast(data.message || `Request ${label}`, 'success');
        
    } catch (err) {
        console.error('Status update error:', err);
        showToast(err.message, 'error');
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
        fetchRequests();
    });
});

/* ================================================================
   RENDER REQUESTS
   ================================================================ */
function getFilteredRequests() {
    const search = document.getElementById('requestSearch').value.toLowerCase().trim();
    const status = document.getElementById('filterStatus').value;
    return requests.filter(r => {
        if (search) {
            const haystack = `${r.firstName} ${r.surname} ${r.requestDetails}`.toLowerCase();
            if (!haystack.includes(search)) return false;
        }
        if (status && r.status !== status) return false;
        return true;
    });
}

function renderRequests() {
    const filtered = getFilteredRequests();
    const total = filtered.length;
    const tPages = Math.max(1, Math.ceil(total / PER_PAGE));
    if (currentPage > tPages) currentPage = tPages;
    const start = (currentPage - 1) * PER_PAGE;
    const pageItems = filtered.slice(start, start + PER_PAGE);

    const emptyState = document.getElementById('emptyState');
    const noResults = document.getElementById('noResults');
    const tileView = document.getElementById('tileView');
    const listView = document.getElementById('listView');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const requestCount = document.getElementById('requestCount');

    // Use total from API for main count, but filtered for local views
    const hasActiveFilters = document.getElementById('requestSearch').value || document.getElementById('filterStatus').value;
    requestCount.textContent = `${hasActiveFilters ? filtered.length : totalRequests} request${(hasActiveFilters ? filtered.length : totalRequests) !== 1 ? 's' : ''}`;

    const clearBtn = document.getElementById('clearFiltersBtn');
    clearBtn.style.display = hasActiveFilters ? 'flex' : 'none';

    // Hide everything first
    emptyState.style.display = 'none';
    noResults.style.display = 'none';
    tileView.style.display = 'none';
    listView.style.display = 'none';
    paginationWrapper.style.display = 'none';

    if (!hasActiveFilters && totalRequests === 0) {
        emptyState.style.display = '';
        return;
    }

    if (filtered.length === 0) {
        noResults.style.display = '';
        return;
    }

    paginationWrapper.style.display = tPages > 1 ? '' : 'none';

    if (activeView === 'tile') {
        renderTileView(pageItems);
        tileView.style.display = '';
    } else {
        renderListView(pageItems);
        listView.style.display = '';
    }

    renderPagination(total, tPages, start, pageItems.length);
}

function renderTileView(items) {
    const grid = document.getElementById('tileView');
    grid.innerHTML = items.map(r => {
        const initials = getInitials(r.firstName, r.surname);
        return `
            <div class="request-tile ${statusClass(r.status)}" data-id="${escapeHtml(r.id)}">
                <div class="request-tile-top">
                    <span class="request-tile-avatar">${initials}</span>
                    <span class="request-tile-status">${statusBadge(r.status)}</span>
                </div>
                <div class="request-tile-info">
                    <h3 class="request-tile-name">${escapeHtml(r.firstName)} ${escapeHtml(r.surname)}</h3>
                    <p class="request-tile-preview">${escapeHtml(truncate(r.requestDetails, 80))}</p>
                </div>
                <div class="request-tile-footer">
                    <span class="request-tile-date"><i class="fa-regular fa-calendar"></i> ${escapeHtml(r.date)}</span>
                    <button class="btn-ghost btn-sm request-tile-view-btn" data-view="${escapeHtml(r.id)}">View Details</button>
                </div>
            </div>`;
    }).join('');

    grid.querySelectorAll('[data-view]').forEach(btn => {
        btn.addEventListener('click', () => openViewRequest(btn.dataset.view));
    });
}

function renderListView(items) {
    const tbody = document.getElementById('requestListBody');
    tbody.innerHTML = items.map(r => {
        const initials = getInitials(r.firstName, r.surname);
        return `
            <tr class="${statusClass(r.status)}">
                <td class="col-req-customer">
                    <div class="customer-cell">
                        <span class="customer-avatar-sm">${initials}</span>
                        <span class="customer-name-cell">${escapeHtml(r.firstName)} ${escapeHtml(r.surname)}</span>
                    </div>
                </td>
                <td class="col-req-preview">${escapeHtml(truncate(r.requestDetails, 60))}</td>
                <td class="col-req-date">${escapeHtml(r.date)}</td>
                <td class="col-req-status">${statusBadge(r.status)}</td>
                <td class="col-req-actions">
                    <div class="table-actions">
                        <button class="table-action-icon" data-view="${escapeHtml(r.id)}" aria-label="View request" title="View">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
    }).join('');

    tbody.querySelectorAll('[data-view]').forEach(btn => {
        btn.addEventListener('click', () => openViewRequest(btn.dataset.view));
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
                fetchRequests(); 
            }
        });
    });
}

/* ================================================================
   VIEW REQUEST DETAIL MODAL
   ================================================================ */
const viewRequestModal = document.getElementById('viewRequestModal');

function openViewRequest(requestId) {
    const r = requests.find(x => String(x.id) === String(requestId));
    if (!r) return;
    currentViewId = r.id;

    document.getElementById('viewRequestTitle').textContent = 'Request Details';
    document.getElementById('reqDetailAvatar').textContent = getInitials(r.firstName, r.surname);
    document.getElementById('reqDetailFullName').textContent = `${r.firstName} ${r.surname}`;
    document.getElementById('reqDetailDate').textContent = r.date || 'N/A';
    document.getElementById('reqDetailStatus').innerHTML = statusBadge(r.status);

    document.getElementById('reqDetailGrid').innerHTML = `
        <div class="detail-card">
            <div class="detail-card-label"><i class="fa-solid fa-envelope"></i> Email</div>
            <div class="detail-card-value">${escapeHtml(r.email) || 'N/A'}</div>
        </div>
        <div class="detail-card">
            <div class="detail-card-label"><i class="fa-solid fa-phone"></i> Cell Number</div>
            <div class="detail-card-value">${escapeHtml(r.cellNum) || 'N/A'}</div>
        </div>
    `;

    document.getElementById('reqDetailContent').textContent = r.requestDetails || 'No details provided.';

    const actions = document.getElementById('reqDetailActions');
    if (r.status === 'pending') {
        actions.style.display = '';
    } else {
        actions.style.display = 'none';
    }

    viewRequestModal.classList.add('visible');
}

function closeViewRequest() {
    viewRequestModal.classList.remove('visible');
    currentViewId = null;
}

document.getElementById('viewRequestClose').addEventListener('click', closeViewRequest);
viewRequestModal.addEventListener('click', (e) => { if (e.target === viewRequestModal) closeViewRequest(); });

/* ================================================================
   ADD TO ORDER
   ================================================================ */
const addToOrderModal = document.getElementById('addToOrderModal');

document.getElementById('reqAddToOrderBtn').addEventListener('click', () => {
    const r = requests.find(x => x.id === currentViewId);
    if (!r) return;
    document.getElementById('addToOrderName').textContent = `${r.firstName} ${r.surname}`;
    addToOrderModal.classList.add('visible');
});

function closeAddToOrder() { addToOrderModal.classList.remove('visible'); }
document.getElementById('addToOrderCancelBtn').addEventListener('click', closeAddToOrder);
addToOrderModal.addEventListener('click', (e) => { if (e.target === addToOrderModal) closeAddToOrder(); });

document.getElementById('addToOrderConfirmBtn').addEventListener('click', () => {
    if (!currentViewId) return;
    updateRequestStatus(currentViewId, 'added-to-order');
});

/* ================================================================
   IGNORE REQUEST
   ================================================================ */
const ignoreModal = document.getElementById('ignoreModal');

document.getElementById('reqIgnoreBtn').addEventListener('click', () => {
    const r = requests.find(x => x.id === currentViewId);
    if (!r) return;
    document.getElementById('ignoreName').textContent = `${r.firstName} ${r.surname}`;
    ignoreModal.classList.add('visible');
});

function closeIgnore() { ignoreModal.classList.remove('visible'); }
document.getElementById('ignoreCancelBtn').addEventListener('click', closeIgnore);
ignoreModal.addEventListener('click', (e) => { if (e.target === ignoreModal) closeIgnore(); });

document.getElementById('ignoreConfirmBtn').addEventListener('click', () => {
    if (!currentViewId) return;
    updateRequestStatus(currentViewId, 'ignored');
});

/* ================================================================
   FILTERS
   ================================================================ */
document.getElementById('requestSearch').addEventListener('input', () => { 
    currentPage = 1; 
    fetchRequests(); 
});
document.getElementById('filterStatus').addEventListener('change', () => { 
    currentPage = 1; 
    fetchRequests(); 
});
document.getElementById('clearFiltersBtn').addEventListener('click', () => {
    document.getElementById('requestSearch').value = '';
    document.getElementById('filterStatus').value = '';
    currentPage = 1;
    fetchRequests();
});

/* ================================================================
   INITIAL LOAD
   ================================================================ */
fetchRequests();
</script>
</body>
</html>