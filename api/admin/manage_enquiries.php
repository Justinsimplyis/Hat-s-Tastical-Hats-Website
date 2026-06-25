<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/enquiries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <title>Hattie's Hats'tastcial Hats | Admin | All Enquiries </title>   
</head>
<body>

<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="/dashboards/admin/index.php" class="sidebar-logo">
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

        <div class="nav-item" data-dropdown>
            <div class="nav-link" role="button" tabindex="0" aria-expanded="false" data-tooltip="Customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <span class="nav-label">Customers</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/manage_customer_request.php" role="menuitem">All Customers</a>
                <a href="/api/admin/manage_customer_request.php" role="menuitem">All Customer Requests</a>            
            </div>
        </div>

        <div class="nav-item open"> <!-- Added 'open' class so the dropdown is expanded by default -->
            <div class="nav-link active" role="button" tabindex="0" aria-expanded="true" data-tooltip="Settings">
                <i class="fa-solid fa-gear nav-icon"></i>
                <span class="nav-label">Settings</span>
                <i class="fa-solid fa-chevron-down dropdown-icon"></i>
            </div>
            <div class="dropdown-menu" role="menu">
                <a href="/api/admin/settings.php" role="menuitem">General Settings</a>
                <a href="/api/notifications.php" role="menuitem">Notification Settings</a>
                <a href="/api/admin/manage_enquiries.php" role="menuitem" class="active">All Enquiries</a>
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
                <h2>All Enquiries</h2>
                <p>Manage contact form submissions and customer questions.</p>
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

    <main class="main-content">
        <!-- Modern Split-View Grid -->
        <div class="enquiries-grid">
            
            <!-- Left Pane: List -->
            <div class="list-pane">
                <div class="list-toolbar">
                    <div class="tabs">
                        <button class="tab active" data-filter="all">All</button>
                        <button class="tab" data-filter="contact">Contact</button>
                        <button class="tab" data-filter="question">Questions</button>
                    </div>
                    <div class="list-controls">
                        <div class="local-search">
                            <i class="fa-solid fa-filter" style="color:var(--fg-muted); font-size:0.8rem;"></i>
                            <input type="text" placeholder="Filter list..." id="localSearchInput">
                        </div>
                        <select class="sort-select" id="sortSelect">
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                            <option value="unread">Unread</option>
                            <option value="read">Read</option>
                        </select>
                    </div>
                </div>
                
                <div class="enquiry-list" id="enquiryListContainer">
                    <?php foreach($all_enquiries as $enquiry): 
                        $initials = implode('', array_map(function($n) { return strtoupper(substr($n, 0, 1)); }, explode(' ', $enquiry['name'])));
                        $is_question = $enquiry['type'] === 'question';
                    ?>
                        <div class="enquiry-item <?= !$enquiry['is_read'] ? 'unread' : '' ?>" 
                             data-type="<?= $enquiry['type'] ?>" 
                             data-read="<?= $enquiry['is_read'] ? 'true' : 'false' ?>"
                             data-timestamp="<?= strtotime($enquiry['timestamp']) ?>"
                             data-name="<?= htmlspecialchars($enquiry['name']) ?>"
                             data-subject="<?= htmlspecialchars($enquiry['subject']) ?>"
                             data-message="<?= htmlspecialchars($enquiry['message']) ?>"
                             data-email="<?= $enquiry['email'] ?>"
                             data-initials="<?= $initials ?>"
                             onclick="viewEnquiry(this)">
                            
                            <div class="item-avatar-sm"><?= $initials ?></div>
                            <div class="item-content-sm">
                                <div class="item-top-row">
                                    <span class="item-name-sm"><?= htmlspecialchars($enquiry['name']) ?></span>
                                    <span class="item-time-sm"><?= date('M d', strtotime($enquiry['timestamp'])) ?></span>
                                </div>
                                <div class="item-subject-sm">
                                    <?php if($is_question): ?>
                                        <span class="item-type-badge-sm question">Q</span>
                                    <?php else: ?>
                                        <span class="item-type-badge-sm">C</span>
                                    <?php endif; ?>
                                    <?= htmlspecialchars($enquiry['subject']) ?>
                                </div>
                                <div class="item-preview-sm"><?= htmlspecialchars($enquiry['message']) ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Right Pane: Details -->
            <div class="detail-pane">
                <!-- Empty State -->
                <div class="empty-state" id="emptyState">
                    <i class="fa-solid fa-envelope-open-text"></i>
                    <h3>No Enquiry Selected</h3>
                    <p>Select an item from the list to view its details.</p>
                </div>

                <!-- Populated State -->
                <div class="detail-content" id="detailContent">
                    <div class="detail-header">
                        <div>
                            <h2 class="detail-subject" id="detailSubject">Subject</h2>
                            <div class="detail-meta">
                                <div class="detail-avatar" id="detailAvatar">A</div>
                                <div class="detail-user-info">
                                    <h4 id="detailName">Name</h4>
                                    <span id="detailEmail">email@example.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="detail-actions">
                            <button class="detail-btn" title="Mark as Read" onclick="markCurrentRead()"><i class="fa-solid fa-check"></i></button>
                            <button class="detail-btn" title="Delete" style="color: #E07070;" onclick="deleteCurrent()"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="detail-body">
                        <p class="detail-message" id="detailMessage">Message body goes here...</p>
                    </div>
                    <div class="detail-footer">
                        <button class="btn-outline">Archive</button>
                        <button class="btn-primary"><i class="fa-solid fa-reply"></i> Reply via Email</button>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
</div>

<script>
    // --- Sidebar Logic ---
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

    document.querySelectorAll('.nav-item[data-dropdown]').forEach(item => {
        const trigger = item.querySelector('.nav-link');
        trigger.addEventListener('click', (e) => {
            // Prevent navigation if it's a dropdown toggle
            if (trigger.getAttribute('role') === 'button') {
                e.preventDefault();
                if (sidebar.classList.contains('collapsed')) {
                    sidebar.classList.remove('collapsed');
                    return;
                }
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.nav-item[data-dropdown]').forEach(other => other.classList.remove('open'));
                item.classList.toggle('open', !isOpen);
            }
        });
    });

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

    // --- Enquiries Split View Logic ---
    let currentSelectedItem = null;
    const items = document.querySelectorAll('.enquiry-item');
    const emptyState = document.getElementById('emptyState');
    const detailContent = document.getElementById('detailContent');

    function viewEnquiry(element) {
        // Remove selected from all
        items.forEach(i => i.classList.remove('selected'));
        // Add selected to clicked
        element.classList.add('selected');
        currentSelectedItem = element;

        // Hide empty state, show content
        emptyState.style.display = 'none';
        detailContent.style.display = 'flex';

        // Populate data
        document.getElementById('detailSubject').innerText = element.dataset.subject;
        document.getElementById('detailName').innerText = element.dataset.name;
        document.getElementById('detailEmail').innerText = element.dataset.email;
        document.getElementById('detailAvatar').innerText = element.dataset.initials;
        document.getElementById('detailMessage').innerText = element.dataset.message;

        // Auto mark as read if unread
        if (element.dataset.read === 'false') {
            markAsRead(element);
        }
    }

    function markAsRead(element) {
        element.classList.remove('unread');
        element.dataset.read = 'true';
        // In a real app, you'd send an AJAX request here to update the DB
    }

    function markCurrentRead() {
        if (currentSelectedItem) markAsRead(currentSelectedItem);
    }

    function deleteCurrent() {
        if (currentSelectedItem) {
            currentSelectedItem.remove();
            currentSelectedItem = null;
            emptyState.style.display = 'flex';
            detailContent.style.display = 'none';
        }
    }

    // --- Filtering & Sorting Logic ---
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const filter = tab.dataset.filter;
            items.forEach(item => {
                if (filter === 'all' || item.dataset.type === filter) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    document.getElementById('sortSelect').addEventListener('change', function() {
        const sortValue = this.value;
        const container = document.getElementById('enquiryListContainer');
        let itemsArray = Array.from(container.querySelectorAll('.enquiry-item'));
        
        itemsArray.sort((a, b) => {
            if (sortValue === 'newest') return b.dataset.timestamp - a.dataset.timestamp;
            if (sortValue === 'oldest') return a.dataset.timestamp - b.dataset.timestamp;
            if (sortValue === 'unread') return (a.dataset.read === 'false' ? 0 : 1) - (b.dataset.read === 'false' ? 0 : 1);
            if (sortValue === 'read') return (a.dataset.read === 'true' ? 0 : 1) - (b.dataset.read === 'true' ? 0 : 1);
        });
        itemsArray.forEach(item => container.appendChild(item));
    });

    document.getElementById('localSearchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        items.forEach(item => {
            const name = item.dataset.name.toLowerCase();
            const subject = item.dataset.subject.toLowerCase();
            if (name.includes(searchTerm) || subject.includes(searchTerm)) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>