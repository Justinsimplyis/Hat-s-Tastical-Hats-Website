<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/customers.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Manage Customers — Admin</title>
    
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
                <a href="/api/admin/manage_products.php" role="menuitem">All Products</a>
                <a href="/api/admin/manage_orders.php" role="menuitem">All Orders</a>
            </div>
        </div>

        <div class="nav-item open" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="true" data-tooltip="Customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <span class="nav-label">Customers</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/manage_customers.php" role="menuitem" class="active">All Customers</a>
                <a href="/api/admin/manage_customer_request.php" role="menuitem">All Customer Requests</a>
            </div>
        </div>

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Settings">
                <i class="fa-solid fa-gear nav-icon"></i>
                <span class="nav-label">Settings</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/settings.php" role="menuitem">General Settings</a>
                <a href="/api/manage_notifications.php" role="menuitem">Notification Settings</a>
                <a href="/api/admin/manage_enquiries.php" role="menuitem">All Enquiries</a>
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
                <h2>Customers</h2>
                <p>Manage your customer base</p>
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
        </div>
    </header>

    <!-- ========== CUSTOMERS MAIN CONTENT ========== -->
    <main class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-info">
                <h1>All Customers</h1>
                <p class="customer-count" id="customerCount">0 customers</p>
            </div>
            <button class="btn-primary" id="addCustomerBtn">
                <i class="fa-solid fa-user-plus"></i>
                <span>Add Customer</span>
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search by name, email, phone..." id="customerSearch" aria-label="Search customers">
            </div>
            <div class="filter-select">
                <select id="filterGender" aria-label="Filter by gender">
                    <option value="">All Genders</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option value="prefer-not-to-say">Prefer not to say</option>
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
                <i class="fa-solid fa-users"></i>
            </div>
            <h3>No customers yet</h3>
            <p>Add your first customer to start building your client list</p>
            <button class="btn-primary" id="emptyAddBtn">
                <i class="fa-solid fa-user-plus"></i>
                <span>Add Customer</span>
            </button>
        </div>

        <!-- Customers Table -->
        <div class="table-wrapper" id="tableWrapper" style="display:none;">
            <table class="data-table customers-table" id="customersTable">
                <thead>
                    <tr>
                        <th class="col-customer">Customer</th>
                        <th class="col-email">Email</th>
                        <th class="col-phone">Phone</th>
                        <th class="col-gender">Gender</th>
                        <th class="col-orders">Orders</th>
                        <th class="col-actions">Actions</th>
                    </tr>
                </thead>
                <tbody id="customersBody">
                    <!-- Populated dynamically -->
                </tbody>
            </table>
        </div>

        <!-- No Results State -->
        <div class="empty-state empty-state-sm" id="noResults" style="display:none;">
            <i class="fa-solid fa-filter-circle-xmark"></i>
            <h3>No customers match your filters</h3>
            <p>Try adjusting your search or filter criteria</p>
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

<!-- ========== CUSTOMER FORM MODAL ========== -->
<div class="modal-overlay" id="customerFormModal">
    <div class="modal-box modal-box-lg">
        <div class="modal-header">
            <h3 id="customerFormTitle">Add Customer</h3>
            <button class="modal-close" id="customerFormClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body modal-body-lg">
            <form id="customerForm" novalidate>

                <div class="form-grid">
                    <!-- First Name -->
                    <div class="form-group">
                        <label for="custFirstName">First Name <span class="required">*</span></label>
                        <input type="text" id="custFirstName" class="form-input" placeholder="e.g. Sarah" required>
                        <span class="form-error" id="custFirstNameError"></span>
                    </div>

                    <!-- Surname -->
                    <div class="form-group">
                        <label for="custSurname">Surname <span class="required">*</span></label>
                        <input type="text" id="custSurname" class="form-input" placeholder="e.g. Mitchell" required>
                        <span class="form-error" id="custSurnameError"></span>
                    </div>

                    <!-- Age -->
                    <div class="form-group">
                        <label for="custAge">Age <span class="required">*</span></label>
                        <input type="number" id="custAge" class="form-input" placeholder="e.g. 32" min="1" max="150" required>
                        <span class="form-error" id="custAgeError"></span>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                        <label for="custGender">Gender <span class="required">*</span></label>
                        <select id="custGender" class="form-select" required>
                            <option value="">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            <option value="prefer-not-to-say">Prefer not to say</option>
                        </select>
                        <span class="form-error" id="custGenderError"></span>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="custEmail">Email Address <span class="required">*</span></label>
                    <input type="email" id="custEmail" class="form-input" placeholder="e.g. sarah@example.com" required>
                    <span class="form-error" id="custEmailError"></span>
                </div>

                <!-- Telephone -->
                <div class="form-group">
                    <label for="custPhone">Telephone Number <span class="required">*</span></label>
                    <input type="tel" id="custPhone" class="form-input" placeholder="e.g. +27 82 123 4567" required>
                    <span class="form-error" id="custPhoneError"></span>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="custAddress">Address <span class="required">*</span></label>
                    <textarea id="custAddress" class="form-textarea" rows="3" placeholder="Street, suburb, city, postal code, country" required></textarea>
                    <span class="form-error" id="custAddressError"></span>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <button type="button" class="btn-ghost" id="customerFormCancel">Cancel</button>
                    <button type="submit" class="btn-primary" id="customerFormSubmit">
                        <i class="fa-solid fa-check"></i>
                        <span id="customerFormSubmitText">Save Customer</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- ========== VIEW CUSTOMER DETAIL MODAL ========== -->
<div class="modal-overlay" id="viewCustomerModal">
    <div class="modal-box modal-box-lg">
        <div class="modal-header">
            <h3 id="viewCustomerTitle">Customer Details</h3>
            <button class="modal-close" id="viewCustomerClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body modal-body-lg">
            <div class="customer-detail-top">
                <div class="customer-avatar-large" id="viewCustomerAvatar"></div>
                <div class="customer-detail-identity">
                    <h2 id="viewCustomerFullName"></h2>
                    <span class="customer-detail-meta" id="viewCustomerMeta"></span>
                </div>
            </div>

            <div class="customer-detail-grid" id="customerDetailGrid">
                <!-- Populated dynamically -->
            </div>

            <!-- Orders Section -->
            <div class="customer-orders-section">
                <div class="customer-orders-header">
                    <h3>Orders</h3>
                </div>
                <div class="customer-orders-body" id="customerOrdersBody">
                    <!-- Populated dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== DELETE CONFIRMATION MODAL ========== -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box modal-box-sm">
        <div class="delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <h3>Delete Customer</h3>
            <p>Are you sure you want to delete <strong id="deleteCustomerName"></strong>? This action cannot be undone.</p>
        </div>
        <div class="modal-actions">
            <button class="btn-ghost" id="deleteCancelBtn">Cancel</button>
            <button class="btn-danger" id="confirmDeleteBtn">
                <i class="fa-solid fa-trash-can"></i>
                <span>Delete</span>
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
        document.querySelectorAll('.nav-item[data-dropdown]').forEach(o => {
            if (o !== item) o.classList.remove('open');
        });
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
    mobileToggle.addEventListener('click', () => {
        sidebar.classList.toggle('open');
        sidebarOverlay.classList.toggle('visible');
    });
    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    });
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
    if (e.key === 'Escape') { closeSearch(); closeNotifPanel(); closeCustomerForm(); closeViewCustomer(); closeDeleteModal(); }
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
   CUSTOMER DATA STORE
   ================================================================ */
let customers = [];
let editingCustomerId = null;
let deleteCustomerId = null;
const PER_PAGE = 10;
let currentPage = 1;

/* ================================================================
   HELPERS
   ================================================================ */
function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}

function formatGender(slug) {
    const map = { 'male': 'Male', 'female': 'Female', 'other': 'Other', 'prefer-not-to-say': 'Prefer not to say' };
    return map[slug] || slug;
}

function genderBadge(gender) {
    const map = {
        'male':               { cls: 'gender-male',   icon: 'fa-mars' },
        'female':             { cls: 'gender-female', icon: 'fa-venus' },
        'other':              { cls: 'gender-other',  icon: 'fa-genderless' },
        'prefer-not-to-say':  { cls: 'gender-na',     icon: 'fa-minus' },
    };
    const g = map[gender] || { cls: 'gender-na', icon: 'fa-minus' };
    return `<span class="gender-badge ${g.cls}"><i class="fa-solid ${g.icon}"></i> ${formatGender(gender)}</span>`;
}

function getInitials(first, last) {
    return ((first || '').charAt(0) + (last || '').charAt(0)).toUpperCase() || '?';
}

/* ================================================================
   RENDER CUSTOMERS
   ================================================================ */
function getFilteredCustomers() {
    const search = document.getElementById('customerSearch').value.toLowerCase().trim();
    const gender = document.getElementById('filterGender').value;

    return customers.filter(c => {
        if (search) {
            const haystack = `${c.firstName} ${c.surname} ${c.email} ${c.phone}`.toLowerCase();
            if (!haystack.includes(search)) return false;
        }
        if (gender && c.gender !== gender) return false;
        return true;
    });
}

function renderCustomers() {
    const filtered = getFilteredCustomers();
    const total = filtered.length;
    const totalPages = Math.max(1, Math.ceil(total / PER_PAGE));
    if (currentPage > totalPages) currentPage = totalPages;
    const start = (currentPage - 1) * PER_PAGE;
    const pageItems = filtered.slice(start, start + PER_PAGE);

    const emptyState = document.getElementById('emptyState');
    const tableWrapper = document.getElementById('tableWrapper');
    const noResults = document.getElementById('noResults');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const customerCount = document.getElementById('customerCount');

    customerCount.textContent = `${customers.length} customer${customers.length !== 1 ? 's' : ''}`;

    const clearBtn = document.getElementById('clearFiltersBtn');
    const hasFilters = document.getElementById('customerSearch').value || document.getElementById('filterGender').value;
    clearBtn.style.display = hasFilters ? 'flex' : 'none';

    if (customers.length === 0) {
        emptyState.style.display = '';
        tableWrapper.style.display = 'none';
        noResults.style.display = 'none';
        paginationWrapper.style.display = 'none';
        return;
    }

    emptyState.style.display = 'none';

    if (filtered.length === 0) {
        tableWrapper.style.display = 'none';
        noResults.style.display = '';
        paginationWrapper.style.display = 'none';
        return;
    }

    noResults.style.display = 'none';
    tableWrapper.style.display = '';
    paginationWrapper.style.display = totalPages > 1 ? '' : 'none';

    const tbody = document.getElementById('customersBody');
    tbody.innerHTML = pageItems.map(c => {
        const initials = getInitials(c.firstName, c.surname);
        const orderCount = c.orders ? c.orders.length : 0;
        return `
            <tr>
                <td class="col-customer">
                    <div class="customer-cell">
                        <span class="customer-avatar-sm" style="background:linear-gradient(135deg, var(--red), var(--pink));">${initials}</span>
                        <span class="customer-name-cell">${escapeHtml(c.firstName)} ${escapeHtml(c.surname)}</span>
                    </div>
                </td>
                <td class="col-email">${escapeHtml(c.email)}</td>
                <td class="col-phone">${escapeHtml(c.phone)}</td>
                <td class="col-gender">${genderBadge(c.gender)}</td>
                <td class="col-orders">
                    ${orderCount > 0
                        ? `<a href="/api/manage_orders.php" class="order-count-link"><span class="order-count-num">${orderCount}</span> order${orderCount !== 1 ? 's' : ''} <i class="fa-solid fa-arrow-right"></i></a>`
                        : `<span class="order-count-none">No orders</span>`
                    }
                </td>
                <td class="col-actions">
                    <div class="table-actions">
                        <button class="table-action-icon" data-view="${c.id}" aria-label="View customer" title="View">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                        <button class="table-action-icon" data-edit="${c.id}" aria-label="Edit customer" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="table-action-icon table-action-icon-danger" data-delete="${c.id}" aria-label="Delete customer" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
    }).join('');

    tbody.querySelectorAll('[data-view]').forEach(btn => {
        btn.addEventListener('click', () => openViewCustomer(btn.dataset.view));
    });
    tbody.querySelectorAll('[data-edit]').forEach(btn => {
        btn.addEventListener('click', () => openCustomerForm(btn.dataset.edit));
    });
    tbody.querySelectorAll('[data-delete]').forEach(btn => {
        btn.addEventListener('click', () => openDeleteModal(btn.dataset.delete));
    });

    renderPagination(total, totalPages, start, pageItems.length);
}

function renderPagination(total, totalPages, start, showing) {
    const info = document.getElementById('paginationInfo');
    info.textContent = `Showing ${start + 1}–${start + showing} of ${total}`;

    const pag = document.getElementById('pagination');
    let html = '';
    html += `<button class="pag-btn" data-page="${currentPage - 1}" ${currentPage === 1 ? 'disabled' : ''} aria-label="Previous"><i class="fa-solid fa-chevron-left"></i></button>`;
    for (let i = 1; i <= totalPages; i++) {
        if (totalPages > 7 && i > 2 && i < totalPages - 1 && Math.abs(i - currentPage) > 1) {
            if (i === 3 || i === totalPages - 2) html += `<span class="pag-dots">...</span>`;
            continue;
        }
        html += `<button class="pag-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
    }
    html += `<button class="pag-btn" data-page="${currentPage + 1}" ${currentPage === totalPages ? 'disabled' : ''} aria-label="Next"><i class="fa-solid fa-chevron-right"></i></button>`;
    pag.innerHTML = html;

    pag.querySelectorAll('.pag-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const p = parseInt(btn.dataset.page);
            if (p >= 1 && p <= totalPages) { currentPage = p; renderCustomers(); }
        });
    });
}

/* ================================================================
   CUSTOMER FORM MODAL
   ================================================================ */
const customerFormModal = document.getElementById('customerFormModal');
const customerForm = document.getElementById('customerForm');

function openCustomerForm(customerId = null) {
    editingCustomerId = customerId;
    customerForm.reset();
    clearAllErrors();

    if (customerId) {
        const c = customers.find(x => x.id === customerId);
        if (!c) return;
        document.getElementById('customerFormTitle').textContent = 'Edit Customer';
        document.getElementById('customerFormSubmitText').textContent = 'Update Customer';
        document.getElementById('custFirstName').value = c.firstName;
        document.getElementById('custSurname').value = c.surname;
        document.getElementById('custAge').value = c.age;
        document.getElementById('custGender').value = c.gender;
        document.getElementById('custEmail').value = c.email;
        document.getElementById('custPhone').value = c.phone;
        document.getElementById('custAddress').value = c.address;
    } else {
        document.getElementById('customerFormTitle').textContent = 'Add Customer';
        document.getElementById('customerFormSubmitText').textContent = 'Save Customer';
    }

    customerFormModal.classList.add('visible');
}

function closeCustomerForm() {
    customerFormModal.classList.remove('visible');
    editingCustomerId = null;
}

document.getElementById('addCustomerBtn').addEventListener('click', () => openCustomerForm());
document.getElementById('emptyAddBtn').addEventListener('click', () => openCustomerForm());
document.getElementById('customerFormClose').addEventListener('click', closeCustomerForm);
document.getElementById('customerFormCancel').addEventListener('click', closeCustomerForm);
customerFormModal.addEventListener('click', (e) => { if (e.target === customerFormModal) closeCustomerForm(); });

/* ── Validation & Submit ──────────────────────────────────────── */
function clearAllErrors() {
    document.querySelectorAll('.form-error').forEach(e => e.textContent = '');
    document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(e => e.classList.remove('invalid'));
}

function setError(id, msg) {
    document.getElementById(id + 'Error').textContent = msg;
    const input = document.getElementById(id);
    if (input) input.classList.add('invalid');
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

customerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    clearAllErrors();

    let valid = true;
    const firstName = document.getElementById('custFirstName').value.trim();
    const surname = document.getElementById('custSurname').value.trim();
    const age = document.getElementById('custAge').value;
    const gender = document.getElementById('custGender').value;
    const email = document.getElementById('custEmail').value.trim();
    const phone = document.getElementById('custPhone').value.trim();
    const address = document.getElementById('custAddress').value.trim();

    if (!firstName) { setError('custFirstName', 'First name is required'); valid = false; }
    if (!surname) { setError('custSurname', 'Surname is required'); valid = false; }
    if (!age || parseInt(age) < 1 || parseInt(age) > 150) { setError('custAge', 'Enter a valid age (1–150)'); valid = false; }
    if (!gender) { setError('custGender', 'Select a gender'); valid = false; }
    if (!email) { setError('custEmail', 'Email is required'); valid = false; }
    else if (!isValidEmail(email)) { setError('custEmail', 'Enter a valid email address'); valid = false; }
    if (!phone) { setError('custPhone', 'Phone number is required'); valid = false; }
    if (!address) { setError('custAddress', 'Address is required'); valid = false; }

    if (!valid) return;

    const formData = new FormData();
    formData.append('firstName', firstName);
    formData.append('surname', surname);
    formData.append('age', age);
    formData.append('gender', gender);
    formData.append('email', email);
    formData.append('phone', phone);
    formData.append('address', address);
    if (editingCustomerId) formData.append('id', editingCustomerId);

    /*
       In production, send formData to your API:
       fetch('/api/manage_customers.php', { method: 'POST', body: formData })
         .then(res => res.json())
         .then(data => { ... })
    */

    if (editingCustomerId) {
        const idx = customers.findIndex(c => c.id === editingCustomerId);
        if (idx !== -1) {
            customers[idx] = { ...customers[idx], firstName, surname, age: parseInt(age), gender, email, phone, address };
        }
        showToast('Customer updated successfully', 'success');
    } else {
        customers.push({
            id: 'c' + Date.now(),
            firstName, surname, age: parseInt(age), gender, email, phone, address,
            orders: []
        });
        showToast('Customer added successfully', 'success');
    }

    closeCustomerForm();
    renderCustomers();
});

/* ================================================================
   VIEW CUSTOMER DETAIL MODAL
   ================================================================ */
const viewCustomerModal = document.getElementById('viewCustomerModal');

function openViewCustomer(customerId) {
    const c = customers.find(x => x.id === customerId);
    if (!c) return;

    const initials = getInitials(c.firstName, c.surname);
    document.getElementById('viewCustomerTitle').textContent = 'Customer Details';
    document.getElementById('viewCustomerAvatar').textContent = initials;
    document.getElementById('viewCustomerFullName').textContent = `${c.firstName} ${c.surname}`;
    document.getElementById('viewCustomerMeta').textContent = `${formatGender(c.gender)} · Age ${c.age}`;

    document.getElementById('customerDetailGrid').innerHTML = `
        <div class="detail-card">
            <div class="detail-card-label"><i class="fa-solid fa-envelope"></i> Email</div>
            <div class="detail-card-value">${escapeHtml(c.email)}</div>
        </div>
        <div class="detail-card">
            <div class="detail-card-label"><i class="fa-solid fa-phone"></i> Phone</div>
            <div class="detail-card-value">${escapeHtml(c.phone)}</div>
        </div>
        <div class="detail-card detail-card-full">
            <div class="detail-card-label"><i class="fa-solid fa-location-dot"></i> Address</div>
            <div class="detail-card-value">${escapeHtml(c.address)}</div>
        </div>
    `;

    const ordersBody = document.getElementById('customerOrdersBody');
    const orders = c.orders || [];

    if (orders.length === 0) {
        ordersBody.innerHTML = `
            <div class="customer-orders-empty">
                <i class="fa-solid fa-bag-shopping"></i>
                <p>This customer has no orders yet</p>
            </div>`;
    } else {
        ordersBody.innerHTML = `
            <table class="data-table orders-mini-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    ${orders.map(o => `
                        <tr>
                            <td><span class="order-id-cell">#${escapeHtml(o.id)}</span></td>
                            <td>${escapeHtml(o.date)}</td>
                            <td>$${parseFloat(o.total).toFixed(2)}</td>
                            <td>${statusBadge(o.status)}</td>
                            <td>
                                <a href="/api/manage_orders.php" class="table-action-icon" aria-label="View order" title="View Order">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </td>
                        </tr>
                    `).join('')}
                </tbody>
            </table>`;
    }

    viewCustomerModal.classList.add('visible');
}

function closeViewCustomer() {
    viewCustomerModal.classList.remove('visible');
}

document.getElementById('viewCustomerClose').addEventListener('click', closeViewCustomer);
viewCustomerModal.addEventListener('click', (e) => { if (e.target === viewCustomerModal) closeViewCustomer(); });

function statusBadge(status) {
    const map = {
        'pending':   { label: 'Pending',   cls: 'status-low-stock' },
        'processing':{ label: 'Processing', cls: 'status-featured' },
        'shipped':   { label: 'Shipped',   cls: 'status-in-stock' },
        'delivered': { label: 'Delivered', cls: 'status-on-sale' },
        'cancelled': { label: 'Cancelled', cls: 'status-out-of-stock' },
    };
    const s = map[status] || { label: status, cls: '' };
    return `<span class="status-badge ${s.cls}">${s.label}</span>`;
}

/* ================================================================
   DELETE MODAL
   ================================================================ */
const deleteModal = document.getElementById('deleteModal');

function openDeleteModal(customerId) {
    deleteCustomerId = customerId;
    const c = customers.find(x => x.id === customerId);
    document.getElementById('deleteCustomerName').textContent = c ? `${c.firstName} ${c.surname}` : 'this customer';
    deleteModal.classList.add('visible');
}

function closeDeleteModal() {
    deleteModal.classList.remove('visible');
    deleteCustomerId = null;
}

document.getElementById('deleteCancelBtn').addEventListener('click', closeDeleteModal);
deleteModal.addEventListener('click', (e) => { if (e.target === deleteModal) closeDeleteModal(); });

document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
    if (!deleteCustomerId) return;
    /*
       In production:
       fetch('/api/manage_customers.php', {
           method: 'DELETE',
           headers: { 'Content-Type': 'application/json' },
           body: JSON.stringify({ id: deleteCustomerId })
       }).then(...)
    */
    customers = customers.filter(c => c.id !== deleteCustomerId);
    closeDeleteModal();
    renderCustomers();
    showToast('Customer deleted', 'success');
});

/* ================================================================
   FILTERS
   ================================================================ */
document.getElementById('customerSearch').addEventListener('input', () => { currentPage = 1; renderCustomers(); });
document.getElementById('filterGender').addEventListener('change', () => { currentPage = 1; renderCustomers(); });
document.getElementById('clearFiltersBtn').addEventListener('click', () => {
    document.getElementById('customerSearch').value = '';
    document.getElementById('filterGender').value = '';
    currentPage = 1;
    renderCustomers();
});

/* ================================================================
   INITIAL RENDER
   ================================================================ */
renderCustomers();
</script>
</body>
</html>