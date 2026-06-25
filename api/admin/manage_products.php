<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/products.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>Hattie's Hats'tastical Hats | Admin | Manage Products</title>
    
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
                <a href="/api/admin/manage_products.php" role="menuitem" class="active">All Products</a>
                <a href="/api/admin/manage_orders.php" role="menuitem">All Orders</a>
            </div>
        </div>

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
                <h2>Products</h2>
                <p>Manage your store inventory</p>
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

    <!-- ========== PRODUCTS MAIN CONTENT ========== -->
    <main class="main-content">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-info">
                <h1>All Products</h1>
                <p class="product-count" id="productCount">0 products</p>
            </div>
            <button class="btn-primary" id="addProductBtn">
                <i class="fa-solid fa-plus"></i>
                <span>Add Product</span>
            </button>
        </div>

        <!-- Filter Bar -->
        <div class="filter-bar">
            <div class="filter-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search products..." id="productSearch" aria-label="Search products">
            </div>
            <div class="filter-select">
                <select id="filterCategory" aria-label="Filter by category"></select>
            </div>
            <div class="filter-select">
                <select id="filterStatus" aria-label="Filter by status">
                    <option value="">All Statuses</option>
                    <option value="in-stock">In Stock</option>
                    <option value="on-sale">On Sale</option>
                    <option value="low-stock">Low Stock</option>
                    <option value="out-of-stock">Out of Stock</option>
                    <option value="featured">Featured</option>
                    <option value="discontinued">Discontinued</option>
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
                <i class="fa-solid fa-box-open"></i>
            </div>
            <h3>No products yet</h3>
            <p>Add your first product to start building your inventory</p>
            <button class="btn-primary" id="emptyAddBtn">
                <i class="fa-solid fa-plus"></i>
                <span>Add Product</span>
            </button>
        </div>

        <!-- Products Table -->
        <div class="table-wrapper" id="tableWrapper" style="display:none;">
            <table class="data-table products-table" id="productsTable">
                <thead>
                    <tr>
                        <th class="col-image">Image</th>
                        <th class="col-name">Name</th>
                        <th class="col-category">Category</th>
                        <th class="col-price">Price</th>
                        <th class="col-status">Status</th>
                        <th class="col-actions">Actions</th>
                    </tr>
                </thead>
                <tbody id="productsBody">
                    <!-- Populated dynamically -->
                </tbody>
            </table>
        </div>

        <!-- No Results State -->
        <div class="empty-state empty-state-sm" id="noResults" style="display:none;">
            <i class="fa-solid fa-filter-circle-xmark"></i>
            <h3>No products match your filters</h3>
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

<!-- ========== PRODUCT FORM MODAL ========== -->
<div class="modal-overlay" id="productFormModal">
    <div class="modal-box modal-box-lg">
        <div class="modal-header">
            <h3 id="productFormTitle">Add Product</h3>
            <button class="modal-close" id="productFormClose" aria-label="Close modal">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body modal-body-lg">
            <form id="productForm" novalidate>

                <div class="form-grid">
                    <!-- Name -->
                    <div class="form-group form-group-full">
                        <label for="productName">Product Name <span class="required">*</span></label>
                        <input type="text" id="productName" class="form-input" placeholder="e.g. Classic Ivory Fedora" required>
                        <span class="form-error" id="productNameError"></span>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="productPrice">Price ($) <span class="required">*</span></label>
                        <div class="input-prefix-wrap">
                            <span class="input-prefix">$</span>
                            <input type="number" id="productPrice" class="form-input form-input-prefixed" placeholder="0.00" min="0" step="0.01" required>
                        </div>
                        <span class="form-error" id="productPriceError"></span>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="productCategory">Category <span class="required">*</span></label>
                        <select id="productCategory" class="form-select" required></select>
                        <span class="form-error" id="productCategoryError"></span>
                    </div>
                </div>
                <div class="form-group">

                <label>Manage Categories</label>
                <div class="category-manager">
                    <input type="text" id="newCategoryInput" class="form-input" placeholder="New category name">
                        <button type="button" class="btn-ghost btn-sm" id="addCategoryBtn">
                        <i class="fa-solid fa-plus"></i> Add
                        </button>
                </div>

    <div class="category-list" id="categoryList"></div>
</div>


                <!-- Description -->
                <div class="form-group">
                    <label for="productDescription">Description <span class="required">*</span></label>
                    <textarea id="productDescription" class="form-textarea" rows="4" placeholder="Describe the product — materials, sizing, features..." required></textarea>
                    <span class="form-error" id="productDescriptionError"></span>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label>Status <span class="required">*</span></label>
                    <div class="status-chips" id="statusChips">
                        <button type="button" class="status-chip" data-status="in-stock">
                            <span class="status-dot" style="background:#6BCB8B;"></span> In Stock
                        </button>
                        <button type="button" class="status-chip" data-status="on-sale">
                            <span class="status-dot" style="background:var(--red);"></span> On Sale
                        </button>
                        <button type="button" class="status-chip" data-status="low-stock">
                            <span class="status-dot" style="background:#E8B84B;"></span> Low Stock
                        </button>
                        <button type="button" class="status-chip" data-status="out-of-stock">
                            <span class="status-dot" style="background:#7A6A6D;"></span> Out of Stock
                        </button>
                        <button type="button" class="status-chip" data-status="featured">
                            <span class="status-dot" style="background:var(--pink);"></span> Featured
                        </button>
                        <button type="button" class="status-chip" data-status="discontinued">
                            <span class="status-dot" style="background:#5A4E50;"></span> Discontinued
                        </button>
                    </div>
                    <input type="hidden" id="productStatus" required>
                    <span class="form-error" id="productStatusError"></span>
                </div>

                <!-- Images -->
                <div class="form-group">
                    <label>Images <span class="required">*</span></label>
                    <div class="image-upload-zone" id="imageUploadZone">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Click to upload or drag and drop</p>
                        <span>PNG, JPG, WEBP up to 5MB each</span>
                        <input type="file" id="imageFileInput" multiple accept="image/png,image/jpeg,image/webp" hidden>
                    </div>
                    <div class="image-upload-meta">
                        <span class="image-count" id="imageCount">0 images selected</span>
                        <span class="image-min-warning" id="imageMinWarning">
                            <i class="fa-solid fa-circle-exclamation"></i> Minimum 5 images required
                        </span>
                    </div>
                    <div class="image-slots-grid" id="imageSlotsGrid"></div>
                    <span class="form-error" id="productImagesError"></span>
                </div>

                <!-- Actions -->
                <div class="form-actions">
                    <button type="button" class="btn-ghost" id="productFormCancel">Cancel</button>
                    <button type="submit" class="btn-primary" id="productFormSubmit">
                        <i class="fa-solid fa-check"></i>
                        <span id="productFormSubmitText">Save Product</span>
                    </button>
                </div>

            </form>
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
            <h3>Delete Product</h3>
            <p>Are you sure you want to delete <strong id="deleteProductName"></strong>? This action cannot be undone.</p>
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
    if (e.key === 'Escape') { closeSearch(); closeNotifPanel(); closeProductForm(); closeDeleteModal(); }
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
let products = [];
let categories = [];
let editingProductId = null;
let deleteProductId = null;
let uploadedImages = [];   // { file: File, preview: string }
let existingImages = [];   // URLs from server when editing
const PER_PAGE = 10;
let currentPage = 1;
let totalProducts = 0;
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

function statusBadge(status) {
    const map = {
        'in-stock':     { label: 'In Stock',      cls: 'status-in-stock' },
        'on-sale':      { label: 'On Sale',       cls: 'status-on-sale' },
        'low-stock':    { label: 'Low Stock',     cls: 'status-low-stock' },
        'out-of-stock': { label: 'Out of Stock',  cls: 'status-out-of-stock' },
        'featured':     { label: 'Featured',      cls: 'status-featured' },
        'discontinued': { label: 'Discontinued',  cls: 'status-discontinued' },
    };
    const s = map[status] || { label: status, cls: '' };
    return `<span class="status-badge ${s.cls}">${s.label}</span>`;
}

function formatCategory(slug) {
    if (!slug) return 'Uncategorized';
    return slug.split('-').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ');
}

/* ================================================================
   API: FETCH CATEGORIES
   ================================================================ */
async function fetchCategories() {
    try {
        const res = await fetch('/api/handlers/products_handler.php?action=list_categories');
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const data = await res.json();
        categories = data.categories || [];
        renderCategoryOptions();
        renderCategoryList();
    } catch (err) {
        console.error('Failed to fetch categories:', err);
    }
}

/* ================================================================
   API: FETCH PRODUCTS
   ================================================================ */
async function fetchProducts() {
    try {
        const search   = document.getElementById('productSearch').value.trim();
        const category = document.getElementById('filterCategory').value;
        const status   = document.getElementById('filterStatus').value;

        const params = new URLSearchParams({
            action: 'list',
            page: currentPage,
            per_page: PER_PAGE,
        });
        if (search)   params.set('search', search);
        if (category) params.set('category', category);
        if (status)   params.set('status', status);

        const res = await fetch(`/api/handlers/products_handler.php?${params}`);
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        const data = await res.json();

        products      = data.products || [];
        totalProducts = data.total || 0;
        totalPages    = data.total_pages || 1;

        renderProducts();
    } catch (err) {
        console.error('Failed to fetch products:', err);
        showToast('Failed to load products', 'error');
    }
}

/* ================================================================
   RENDER: CATEGORY OPTIONS
   ================================================================ */
function renderCategoryOptions() {
    const productSelect = document.getElementById('productCategory');
    const filterSelect  = document.getElementById('filterCategory');

    productSelect.innerHTML = `<option value="">Select category</option>` +
        categories.map(c => `<option value="${escapeHtml(c.id)}">${escapeHtml(c.name)}</option>`).join('');

    filterSelect.innerHTML = `<option value="">All Categories</option>` +
        categories.map(c => `<option value="${escapeHtml(c.id)}">${escapeHtml(c.name)}</option>`).join('');
}

/* ================================================================
   RENDER: CATEGORY LIST (inside form)
   ================================================================ */
function renderCategoryList() {
    const container = document.getElementById('categoryList');
    if (!container) return;

    container.innerHTML = categories.map(c => `
        <div class="category-item">
            <span>${escapeHtml(c.name)}</span>
            <div class="category-actions">
                <button data-edit-cat="${escapeHtml(c.id)}">
                    <i class="fa-solid fa-pen"></i>
                </button>
                <button data-delete-cat="${escapeHtml(c.id)}">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </div>
    `).join('');

    container.querySelectorAll('[data-edit-cat]').forEach(btn => {
        btn.addEventListener('click', () => editCategory(btn.dataset.editCat));
    });
    container.querySelectorAll('[data-delete-cat]').forEach(btn => {
        btn.addEventListener('click', () => deleteCategory(btn.dataset.deleteCat));
    });
}

/* ================================================================
   API: CATEGORY CRUD
   ================================================================ */
document.getElementById('addCategoryBtn').addEventListener('click', async () => {
    const input = document.getElementById('newCategoryInput');
    const name = input.value.trim();
    if (!name) { showToast('Please enter a category name', 'error'); return; }

    try {
        const res = await fetch('/api/handlers/products_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'create_category', name }),
        });
        const data = await res.json();
        if (!res.ok || data.error) throw new Error(data.error || 'Failed');

        input.value = '';
        await fetchCategories();
        showToast('Category added', 'success');
    } catch (err) {
        showToast(err.message, 'error');
    }
});

async function editCategory(id) {
    const cat = categories.find(c => c.id === id);
    if (!cat) return;

    const newName = prompt('Edit category name:', cat.name);
    if (!newName || newName.trim() === cat.name) return;

    try {
        const res = await fetch('/api/handlers/products_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'update_category', id, name: newName.trim() }),
        });
        const data = await res.json();
        if (!res.ok || data.error) throw new Error(data.error || 'Failed');

        await fetchCategories();
        await fetchProducts();
        showToast('Category updated', 'success');
    } catch (err) {
        showToast(err.message, 'error');
    }
}

async function deleteCategory(id) {
    const cat = categories.find(c => c.id === id);
    if (!cat) return;

    if (!confirm(`Delete category "${cat.name}"? Products using it will become uncategorized.`)) return;

    try {
        const res = await fetch('/api/handlers/products_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'delete_category', id }),
        });
        const data = await res.json();
        if (!res.ok || data.error) throw new Error(data.error || 'Failed');

        await fetchCategories();
        await fetchProducts();
        showToast('Category deleted', 'success');
    } catch (err) {
        showToast(err.message, 'error');
    }
}

/* ================================================================
   RENDER: PRODUCTS TABLE (pure UI, no filtering logic)
   ================================================================ */
function renderProducts() {
    const emptyState       = document.getElementById('emptyState');
    const tableWrapper     = document.getElementById('tableWrapper');
    const noResults        = document.getElementById('noResults');
    const paginationWrapper = document.getElementById('paginationWrapper');
    const productCount     = document.getElementById('productCount');

    productCount.textContent = `${totalProducts} product${totalProducts !== 1 ? 's' : ''}`;

    const clearBtn   = document.getElementById('clearFiltersBtn');
    const hasFilters = document.getElementById('productSearch').value ||
                       document.getElementById('filterCategory').value ||
                       document.getElementById('filterStatus').value;
    clearBtn.style.display = hasFilters ? 'flex' : 'none';

    emptyState.style.display       = 'none';
    tableWrapper.style.display     = 'none';
    noResults.style.display        = 'none';
    paginationWrapper.style.display = 'none';

    if (totalProducts === 0 && !hasFilters) {
        emptyState.style.display = '';
        return;
    }

    if (products.length === 0) {
        noResults.style.display = '';
        return;
    }

    tableWrapper.style.display = '';
    paginationWrapper.style.display = totalPages > 1 ? '' : 'none';

    const tbody = document.getElementById('productsBody');
    tbody.innerHTML = products.map(p => {
        const thumb = p.images && p.images.length > 0
            ? `<img src="${escapeHtml(p.images[0])}" alt="${escapeHtml(p.name)}" class="product-thumb">`
            : `<div class="product-thumb-placeholder"><i class="fa-solid fa-image"></i></div>`;
        return `
            <tr>
                <td class="col-image">${thumb}</td>
                <td class="col-name">
                    <span class="product-name-cell">${escapeHtml(p.name)}</span>
                </td>
                <td class="col-category"><span class="category-badge">${formatCategory(p.category)}</span></td>
                <td class="col-price">$${parseFloat(p.price || 0).toFixed(2)}</td>
                <td class="col-status">${statusBadge(p.status)}</td>
                <td class="col-actions">
                    <div class="table-actions">
                        <button class="table-action-icon" data-edit="${escapeHtml(p.id)}" aria-label="Edit product" title="Edit">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button class="table-action-icon table-action-icon-danger" data-delete="${escapeHtml(p.id)}" aria-label="Delete product" title="Delete">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
    }).join('');

    tbody.querySelectorAll('[data-edit]').forEach(btn => {
        btn.addEventListener('click', () => openProductForm(btn.dataset.edit));
    });
    tbody.querySelectorAll('[data-delete]').forEach(btn => {
        btn.addEventListener('click', () => openDeleteModal(btn.dataset.delete));
    });

    const start = (currentPage - 1) * PER_PAGE;
    renderPagination(totalProducts, totalPages, start, products.length);
}

/* ================================================================
   RENDER: PAGINATION
   ================================================================ */
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
                fetchProducts();
            }
        });
    });
}

/* ================================================================
   PRODUCT FORM MODAL
   ================================================================ */
const productFormModal = document.getElementById('productFormModal');
const productForm = document.getElementById('productForm');

async function openProductForm(productId = null) {
    editingProductId = productId;
    uploadedImages = [];
    existingImages = [];

    productForm.reset();
    clearAllErrors();
    document.querySelectorAll('.status-chip').forEach(c => c.classList.remove('active'));
    document.getElementById('productStatus').value = '';
    renderImageSlots();

    if (productId) {
        // Fetch full product from API
        try {
            const res = await fetch(`/api/handlers/products_handler.php?action=get&id=${encodeURIComponent(productId)}`);
            if (!res.ok) throw new Error('Product not found');
            const data = await res.json();
            const p = data.product;

            document.getElementById('productFormTitle').textContent = 'Edit Product';
            document.getElementById('productFormSubmitText').textContent = 'Update Product';
            document.getElementById('productName').value = p.name;
            document.getElementById('productPrice').value = p.price;
            document.getElementById('productCategory').value = p.category || '';
            document.getElementById('productDescription').value = p.description || '';
            document.getElementById('productStatus').value = p.status;

            const chip = document.querySelector(`.status-chip[data-status="${p.status}"]`);
            if (chip) chip.classList.add('active');

            if (p.images && p.images.length > 0) {
                existingImages = [...p.images];
            }
            renderImageSlots();
        } catch (err) {
            showToast(err.message, 'error');
            return;
        }
    } else {
        document.getElementById('productFormTitle').textContent = 'Add Product';
        document.getElementById('productFormSubmitText').textContent = 'Save Product';
    }

    productFormModal.classList.add('visible');
}

function closeProductForm() {
    productFormModal.classList.remove('visible');
    editingProductId = null;
    uploadedImages.forEach(img => URL.revokeObjectURL(img.preview));
    uploadedImages = [];
    existingImages = [];
}

document.getElementById('addProductBtn').addEventListener('click', () => openProductForm());
document.getElementById('emptyAddBtn').addEventListener('click', () => openProductForm());
document.getElementById('productFormClose').addEventListener('click', closeProductForm);
document.getElementById('productFormCancel').addEventListener('click', closeProductForm);
productFormModal.addEventListener('click', (e) => { if (e.target === productFormModal) closeProductForm(); });

/* ── Status Chips ─────────────────────────────────────────────── */
document.querySelectorAll('.status-chip').forEach(chip => {
    chip.addEventListener('click', () => {
        document.querySelectorAll('.status-chip').forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
        document.getElementById('productStatus').value = chip.dataset.status;
        document.getElementById('productStatusError').textContent = '';
    });
});

/* ── Image Upload ─────────────────────────────────────────────── */
const imageUploadZone = document.getElementById('imageUploadZone');
const imageFileInput = document.getElementById('imageFileInput');

imageUploadZone.addEventListener('click', () => imageFileInput.click());
imageUploadZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    imageUploadZone.classList.add('drag-over');
});
imageUploadZone.addEventListener('dragleave', () => {
    imageUploadZone.classList.remove('drag-over');
});
imageUploadZone.addEventListener('drop', (e) => {
    e.preventDefault();
    imageUploadZone.classList.remove('drag-over');
    handleFiles(e.dataTransfer.files);
});
imageFileInput.addEventListener('change', () => {
    handleFiles(imageFileInput.files);
    imageFileInput.value = '';
});

function handleFiles(files) {
    for (const file of files) {
        if (!file.type.match(/^image\/(png|jpeg|webp)$/)) {
            showToast(`"${file.name}" is not a supported format`, 'error');
            continue;
        }
        if (file.size > 5 * 1024 * 1024) {
            showToast(`"${file.name}" exceeds 5MB limit`, 'error');
            continue;
        }
        uploadedImages.push({ file, preview: URL.createObjectURL(file) });
    }
    renderImageSlots();
}

function removeUploadedImage(index) {
    URL.revokeObjectURL(uploadedImages[index].preview);
    uploadedImages.splice(index, 1);
    renderImageSlots();
}

function removeExistingImage(index) {
    existingImages.splice(index, 1);
    renderImageSlots();
}

function renderImageSlots() {
    const grid = document.getElementById('imageSlotsGrid');
    grid.innerHTML = '';

    existingImages.forEach((src, i) => {
        const slot = document.createElement('div');
        slot.className = 'image-slot';
        slot.innerHTML = `
            <img src="${src}" alt="Existing image ${i + 1}">
            <button type="button" class="image-slot-remove" aria-label="Remove image"><i class="fa-solid fa-xmark"></i></button>
            <span class="image-slot-order">${i + 1}</span>
        `;
        slot.querySelector('.image-slot-remove').addEventListener('click', () => removeExistingImage(i));
        grid.appendChild(slot);
    });

    uploadedImages.forEach((img, i) => {
        const slot = document.createElement('div');
        slot.className = 'image-slot image-slot-new';
        slot.innerHTML = `
            <img src="${img.preview}" alt="New image ${i + 1}">
            <button type="button" class="image-slot-remove" aria-label="Remove image"><i class="fa-solid fa-xmark"></i></button>
            <span class="image-slot-order">${existingImages.length + i + 1}</span>
            <span class="image-slot-badge">New</span>
        `;
        slot.querySelector('.image-slot-remove').addEventListener('click', () => removeUploadedImage(i));
        grid.appendChild(slot);
    });

    const total = existingImages.length + uploadedImages.length;
    if (total < 10) {
        const addSlot = document.createElement('div');
        addSlot.className = 'image-slot-add';
        addSlot.innerHTML = `<i class="fa-solid fa-plus"></i><span>Add</span>`;
        addSlot.addEventListener('click', () => imageFileInput.click());
        grid.appendChild(addSlot);
    }

    document.getElementById('imageCount').textContent = `${total} image${total !== 1 ? 's' : ''} selected`;
    document.getElementById('imageMinWarning').classList.toggle('visible', total < 5);
    document.getElementById('productImagesError').textContent = '';
}

/* ── Form Validation & Submit ─────────────────────────────────── */
function clearAllErrors() {
    document.querySelectorAll('.form-error').forEach(e => e.textContent = '');
    document.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(e => e.classList.remove('invalid'));
}

function setError(id, msg) {
    document.getElementById(id + 'Error').textContent = msg;
    const input = document.getElementById(id);
    if (input) input.classList.add('invalid');
}

productForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    clearAllErrors();

    let valid = true;
    const name        = document.getElementById('productName').value.trim();
    const price       = document.getElementById('productPrice').value;
    const category    = document.getElementById('productCategory').value;
    const description = document.getElementById('productDescription').value.trim();
    const status      = document.getElementById('productStatus').value;
    const totalImages = existingImages.length + uploadedImages.length;

    if (!name)              { setError('productName', 'Product name is required'); valid = false; }
    if (!price || parseFloat(price) <= 0) { setError('productPrice', 'Enter a valid price'); valid = false; }
    if (!category)          { setError('productCategory', 'Select a category'); valid = false; }
    if (!description)       { setError('productDescription', 'Description is required'); valid = false; }
    if (!status)            { setError('productStatus', 'Select a status'); valid = false; }
    if (totalImages < 5)    {
        document.getElementById('productImagesError').textContent = `At least 5 images required (${totalImages}/5)`;
        valid = false;
    }

    if (!valid) return;

    // Build FormData
    const formData = new FormData();
    formData.append('action', editingProductId ? 'update' : 'create');
    formData.append('name', name);
    formData.append('price', price);
    formData.append('category', category);
    formData.append('description', description);
    formData.append('status', status);
    if (editingProductId) formData.append('id', editingProductId);
    uploadedImages.forEach((img, i) => {
        formData.append(`images[${i}]`, img.file);
    });
    formData.append('existing_images', JSON.stringify(existingImages));

    // Loading state
    const submitBtn = document.getElementById('productFormSubmit');
    const submitText = document.getElementById('productFormSubmitText');
    submitBtn.disabled = true;
    submitText.textContent = editingProductId ? 'Updating...' : 'Saving...';

    try {
        const res = await fetch('/api/handlers/products_handler.php', {
            method: 'POST',
            body: formData,
        });
        const data = await res.json();

        if (!res.ok || data.error) {
            // Handle server-side validation errors
            if (data.errors) {
                const fieldMap = {
                    name: 'productName',
                    price: 'productPrice',
                    category: 'productCategory',
                    description: 'productDescription',
                    status: 'productStatus',
                    images: 'productImages',
                };
                for (const [field, msg] of Object.entries(data.errors)) {
                    const elId = fieldMap[field];
                    if (elId) setError(elId, msg);
                }
            }
            throw new Error(data.error || 'Submission failed');
        }

        closeProductForm();
        await fetchProducts();
        showToast(data.message || (editingProductId ? 'Product updated' : 'Product added'), 'success');

    } catch (err) {
        if (err.message !== 'Submission failed') {
            showToast(err.message, 'error');
        }
    } finally {
        submitBtn.disabled = false;
        submitText.textContent = editingProductId ? 'Update Product' : 'Save Product';
    }
});

/* ================================================================
   DELETE MODAL
   ================================================================ */
const deleteModal = document.getElementById('deleteModal');

function openDeleteModal(productId) {
    deleteProductId = productId;
    const p = products.find(x => x.id === productId);
    document.getElementById('deleteProductName').textContent = p ? p.name : 'this product';
    deleteModal.classList.add('visible');
}

function closeDeleteModal() {
    deleteModal.classList.remove('visible');
    deleteProductId = null;
}

document.getElementById('deleteCancelBtn').addEventListener('click', closeDeleteModal);
deleteModal.addEventListener('click', (e) => { if (e.target === deleteModal) closeDeleteModal(); });

document.getElementById('confirmDeleteBtn').addEventListener('click', async () => {
    if (!deleteProductId) return;

    const btn = document.getElementById('confirmDeleteBtn');
    btn.disabled = true;

    try {
        const res = await fetch('/api/handlers/products_handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'delete', id: deleteProductId }),
        });
        const data = await res.json();
        if (!res.ok || data.error) throw new Error(data.error || 'Failed to delete');

        closeDeleteModal();
        await fetchProducts();
        showToast(data.message || 'Product deleted', 'success');
    } catch (err) {
        showToast(err.message, 'error');
    } finally {
        btn.disabled = false;
    }
});

/* ================================================================
   FILTERS
   ================================================================ */
document.getElementById('productSearch').addEventListener('input', () => { currentPage = 1; fetchProducts(); });
document.getElementById('filterCategory').addEventListener('change', () => { currentPage = 1; fetchProducts(); });
document.getElementById('filterStatus').addEventListener('change', () => { currentPage = 1; fetchProducts(); });
document.getElementById('clearFiltersBtn').addEventListener('click', () => {
    document.getElementById('productSearch').value = '';
    document.getElementById('filterCategory').value = '';
    document.getElementById('filterStatus').value = '';
    currentPage = 1;
    fetchProducts();
});

/* ================================================================
   INITIAL LOAD
   ================================================================ */
fetchCategories().then(() => fetchProducts());
</script>
</body>
</html>