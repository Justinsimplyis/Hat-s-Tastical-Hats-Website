<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/admin/profile.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Profile — Admin</title>
    
</head>
<body>

<div class="sidebar sidebar--minimal" id="sidebar">
    <div class="sidebar--minimal-brand">
        <a href="/dashboards/admin/index.php" class="sidebar-logo">
            <span class="logo-mark">H</span>
            <span class="logo-text">
                <span class="logo-name">Hattie's</span>
                <span class="logo-tagline">Hat'istical Hats</span>
            </span>
        </a>
    </div>
    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="logout-link" data-tooltip="Logout">
            <i class="fa-solid fa-right-from-bracket nav-icon"></i>
            <span class="nav-label">Logout</span>
        </a>
    </div>
</div>

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

 <!-- ========== MAIN WRAPPER ========== -->
<div class="main-wrapper main-wrapper--profile">

    <!-- Top Bar -->
    <header class="topbar">
        <div class="topbar-left">
            <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="topbar-greeting">
                <h2>Profile</h2>
                <p>Manage your account settings</p>
            </div>
        </div>
        <div class="topbar-right">
            <button class="topbar-icon-btn" id="notifToggle" aria-label="Notifications" aria-haspopup="true">
                <i class="fa-solid fa-bell"></i>
                <span class="badge-dot"></span>
            </button>
            <a href="/dashboards/admin/index.php" class="profile-btn profile-btn--active" aria-label="Go to profile">
                <span class="profile-avatar">B</span>
                <span class="profile-label">Back</span>
            </a>
        </div>
    </header>

    <!-- ========== PROFILE MAIN CONTENT ========== -->
    <main class="main-content">

        <div class="profile-layout">
            <!-- Left Column: Avatar & Quick Actions -->
            <div class="profile-sidebar">

                <div class="profile-avatar-section">
                    <div class="profile-avatar-large" id="avatarDisplay">
                        <span id="avatarInitials">A</span>
                        <div class="profile-avatar-upload-btn" id="avatarUploadBtn" aria-label="Change profile photo">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                        <input type="file" id="avatarFileInput" accept="image/png,image/jpeg,image/webp" hidden>
                    </div>
                    <button class="btn-ghost btn-sm btn-fullwidth" id="removeAvatarBtn" style="display:none;">
                        <i class="fa-solid fa-trash-can"></i>
                        <span>Remove Photo</span>
                    </button>
                </div>

                <div class="profile-quick-info">
                    <div class="profile-quick-item">
                        <i class="fa-solid fa-calendar-check"></i>
                        <div>
                            <span class="profile-quick-label">Joined</span>
                            <span class="profile-quick-value" id="profileJoined">—</span>
                        </div>
                    </div>
                    <div class="profile-quick-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <div>
                            <span class="profile-quick-label">Role</span>
                            <span class="profile-quick-value">Administrator</span>
                        </div>
                    </div>
                    <div class="profile-quick-item">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <div>
                            <span class="profile-quick-label">Last Login</span>
                            <span class="profile-killer-value" id="profileLastLogin">—</span>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="profile-danger-zone">
                    <button class="btn-danger btn-fullwidth" id="deleteAccountBtn">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <span>Delete Account</span>
                    </button>
                </div>
            </div>

            <!-- Right Column: Form Sections -->
            <div class="profile-forms">

                <!-- Personal Information -->
                <div class="profile-section">
                    <div class="profile-section-header">
                        <div class="profile-section-icon"><i class="fa-solid fa-user"></i></div>
                        <h2>Personal Information</h2>
                    </div>
                    <div class="profile-section-body">
                        <form id="personalInfoForm" novalidate>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="profFirstName">First Name <span class="required">*</span></label>
                                    <input type="text" id="profFirstName" class="form-input" placeholder="e.g. Admin" required>
                                    <span class="form-error" id="profFirstNameError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="profSurname">Surname <span class="required">*</span></label>
                                    <input type="text" id="profSurname" class="form-input" placeholder="e.g. User" required>
                                    <span class="form-error" id="profSurnameError"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="profEmail">Email Address <span class="required">*</span></label>
                                <input type="email" id="profEmail" class="form-input" placeholder="admin@example.com" required>
                                <span class="form-error" id="profEmailError"></span>
                            </div>
                            <div class="form-group">
                                <label for="profPhone">Phone Number</label>
                                <input type="tel" id="profPhone" class="form-input" placeholder="+27 82 123 4567">
                                <span class="form-error" id="profPhoneError"></span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Save Changes</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="profile-section">
                    <div class="profile-section-header">
                        <div class="profile-section-icon"><i class="fa-solid fa-lock"></i></div>
                        <h2>Change Password</h2>
                    </div>
                    <div class="profile-section-body">
                        <p class="password-hint">Update your password to keep your account secure. Must be at least 8 characters.</p>
                        <form id="passwordForm" novalidate>
                            <div class="form-group">
                                <label for="profCurrentPassword">Current Password <span class="required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="fa-solid fa-lock input-field-icon"></i>
                                    <input type="password" id="profCurrentPassword" class="form-input form-input-icon-offset" placeholder="Enter current password" required>
                                </div>
                                <span class="form-error" id="profCurrentPasswordError"></span>
                            </div>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label for="profNewPassword">New Password <span class="required">*</span></label>
                                    <div class="input-icon-wrap">
                                        <i class="fa-solid fa-lock input-field-icon"></i>
                                        <input type="password" id="profNewPassword" class="form-input form-input-icon-offset" placeholder="New password" required>
                                    </div>
                                    <span class="form-error" id="profNewPasswordError"></span>
                                </div>
                                <div class="form-group">
                                    <label for="profConfirmPassword">Confirm Password <span class="required">*</span></label>
                                    <div class="input-icon-wrap">
                                        <i class="fa-solid fa-lock input-field-icon"></i>
                                        <input type="password" id="profConfirmPassword" class="form-input form-input-icon-offset" placeholder="Confirm new password" required>
                                    </div>
                                    <span class="form-error" id="profConfirmPasswordError"></span>
                                </div>
                            </div>
                            <div class="password-strength" id="passwordStrength" style="display:none;">
                                <div class="password-strength-bar"><div class="password-strength-fill" id="strengthFill"></div></div>
                                <span class="password-strength-text" id="strengthText"></span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn-primary">
                                    <i class="fa-solid fa-key"></i>
                                    <span>Update Password</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </main>

    <footer class="main-footer">
        &copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved. Crafted with care.
    </footer>
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

<!-- ========== DELETE ACCOUNT MODAL ========== -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box modal-box-sm">
        <div class="delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <h3>Delete Account</h3>
            <p>This will <strong>permanently delete</strong> your admin account and all associated data. This action cannot be undone.</p>
            <div class="modal-confirm-input">
                <label for="deleteConfirmInput">Type <strong>DELETE</strong> to confirm:</label>
                <input type="text" id="deleteConfirmInput" class="form-input" autocomplete="off">
            </div>
        </div>
        <div class="modal-actions">
            <button class="btn-ghost" id="deleteCancelBtn">Cancel</button>
            <button class="btn-danger" id="deleteConfirmBtn" disabled>
                <i class="fa-solid fa-trash-can"></i>
                <span>Delete Forever</span>
            </button>
        </div>
    </div>
</div>

<!-- ========== TOAST CONTAINER ========== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   SIDEBAR (minimal profile sidebar)
   ================================================================ */
const sidebar = document.getElementById('sidebar');
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
   NOTIFICATIONS
   ================================================================ */
const notifToggle = document.getElementById('notifToggle');
const notifPanel = document.getElementById('notifPanel');

function closeNotifPanel() {
    notifPanel.classList.remove('visible');
}

notifToggle.addEventListener('click', (e) => {
    e.stopPropagation();
    const isOpen = notifPanel.classList.contains('visible');
    closeNotifPanel();
    if (!isOpen) notifPanel.classList.add('visible');
});

document.addEventListener('click', (e) => {
    if (!notifPanel.contains(e.target) && !notifToggle.contains(e.target)) {
        closeNotifPanel();
    }
});

/* ================================================================
   TOAST NOTIFICATIONS
   ================================================================ */
function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    const icon = type === 'success' ? 'fa-circle-check' : type === 'error' ? 'fa-circle-xmark' : 'fa-circle-info';
    toast.innerHTML = `<i class="fa-solid ${icon}"></i> <span>${message}</span>`;
    container.appendChild(toast);
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(20px)';
        toast.style.transition = 'all 0.3s ease';
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}

/* ================================================================
   SHARED HELPERS & VALIDATION
   ================================================================ */
function showError(id, msg) {
    const errorEl = document.getElementById(id + 'Error');
    const inputEl = document.getElementById(id);
    if (errorEl) errorEl.textContent = msg;
    if (inputEl) inputEl.classList.add('invalid');
}

function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function isValidPhone(phone) {
    const stripped = phone.replace(/[\s\-\(\)]/g, '');
    return /^\+?\d{7,15}$/.test(stripped);
}

/* ================================================================
   AVATAR UPLOAD & REMOVE
   ================================================================ */
const avatarDisplay = document.getElementById('avatarDisplay');
const avatarUploadBtn = document.getElementById('avatarUploadBtn');
const avatarFileInput = document.getElementById('avatarFileInput');
const avatarInitials = document.getElementById('avatarInitials');
const removeAvatarBtn = document.getElementById('removeAvatarBtn');

avatarUploadBtn.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent triggering outer avatar click events
    avatarFileInput.click();
});

avatarFileInput.addEventListener('change', () => {
    const file = avatarFileInput.files[0];
    if (!file) return;

    // Client-side validation (mirrors backend)
    if (!file.type.match(/^image\/(png|jpeg|webp)$/)) {
        showToast('Please upload a PNG, JPG, or WEBP image', 'error');
        return;
    }
    if (file.size > 5 * 1024 * 1024) {
        showToast('Image must be under 5MB', 'error');
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        // Optimistic UI update (show image immediately)
        avatarDisplay.style.backgroundImage = `url(${e.target.result})`;
        avatarInitials.style.display = 'none';
        removeAvatarBtn.style.display = '';

        // Actual backend upload
        const formData = new FormData();
        formData.append('avatar', file);

        fetch('/api/handlers/a_profile_handler.php', { 
            method: 'POST', 
            body: formData 
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
            } else {
                // Revert UI on failure
                avatarDisplay.style.backgroundImage = '';
                avatarInitials.style.display = '';
                removeAvatarBtn.style.display = 'none';
                showToast(data.message || 'Upload failed', 'error');
            }
        })
        .catch(() => {
            avatarDisplay.style.backgroundImage = '';
            avatarInitials.style.display = '';
            removeAvatarBtn.style.display = 'none';
            showToast('Network error during upload', 'error');
        });
    };
    reader.readAsDataURL(file);
    avatarFileInput.value = ''; // Reset input so same file can be selected again
});

removeAvatarBtn.addEventListener('click', () => {
    fetch('/api/handlers/a_profile_handler.php', { 
        method: 'POST', 
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action: 'remove_avatar' })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            avatarDisplay.style.backgroundImage = '';
            avatarInitials.style.display = '';
            removeAvatarBtn.style.display = 'none';
            showToast(data.message, 'info');
        } else {
            showToast(data.message || 'Failed to remove photo', 'error');
        }
    })
    .catch(() => showToast('Network error', 'error'));
});

/* ================================================================
   PERSONAL INFO FORM
   ================================================================ */
const personalInfoForm = document.getElementById('personalInfoForm');

personalInfoForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let valid = true;
    const firstName = document.getElementById('profFirstName').value.trim();
    const surname = document.getElementById('profSurname').value.trim();
    const email = document.getElementById('profEmail').value.trim();
    const phone = document.getElementById('profPhone').value.trim();

    // Clear previous errors
    document.querySelectorAll('#personalInfoForm .form-error').forEach(el => el.textContent = '');
    document.querySelectorAll('#personalInfoForm .form-input').forEach(el => el.classList.remove('invalid'));

    // Client-side validation
    if (!firstName) { showError('profFirstName', 'First name is required'); valid = false; }
    if (!surname) { showError('profSurname', 'Surname is required'); valid = false; }
    if (!email) { showError('profEmail', 'Email is required'); valid = false; }
    else if (!isValidEmail(email)) { showError('profEmail', 'Enter a valid email address'); valid = false; }
    if (phone && !isValidPhone(phone)) { showError('profPhone', 'Enter a valid phone number'); valid = false; }

    if (!valid) return;

    // Backend update
    fetch('/api/handlers/a_profile_handler.php', { 
        method: 'POST', 
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            action: 'update_info',
            firstName: firstName,
            surname: surname,
            email: email,
            phone: phone
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
        } else {
            showToast(data.message, 'error');
            // Map backend errors to specific fields if needed
            if (data.message.includes('email')) showError('profEmail', data.message);
        }
    })
    .catch(() => showToast('Network error. Please try again.', 'error'));
});

/* ================================================================
   PASSWORD FORM & STRENGTH METER
   ================================================================ */
const passwordForm = document.getElementById('passwordForm');
const newPasswordInput = document.getElementById('profNewPassword');
const strengthFill = document.getElementById('strengthFill');
const strengthText = document.getElementById('strengthText');
const passwordStrength = document.getElementById('passwordStrength');

// Password Strength Logic
newPasswordInput.addEventListener('input', () => {
    const val = newPasswordInput.value;
    if (!val) {
        passwordStrength.style.display = 'none';
        return;
    }

    passwordStrength.style.display = ''; // Show the container

    let score = 0;
    if (val.length >= 8) score++;
    if (val.length >= 12) score++;
    if (/[a-z]/.test(val)) score++;
    if (/[A-Z]/.test(val)) score++;
    if (/\d/.test(val)) score++;
    if (/[^a-zA-Z0-9]/.test(val)) score++;

    const percent = Math.min(score / 5, 1) * 100;
    strengthFill.style.width = percent + '%';

    let label, color;
    if (score <= 1) { label = 'Very weak'; color = '#E07070'; }
    else if (score <= 2) { label = 'Weak'; color = '#E8B84B'; }
    else if (score <= 3) { label = 'Fair'; color = '#E8B84B'; }
    else if (score === 4) { label = 'Strong'; color = '#6BCB8B'; }
    else { label = 'Very strong'; color = '#6BCB8B'; }

    strengthFill.style.background = color;
    strengthText.textContent = label;
    strengthText.style.color = color;
});

// Password Form Submission
passwordForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let valid = true;
    const current = document.getElementById('profCurrentPassword').value;
    const newPass = document.getElementById('profNewPassword').value;
    const confirm = document.getElementById('profConfirmPassword').value;

    // Clear previous errors
    document.querySelectorAll('#passwordForm .form-error').forEach(el => el.textContent = '');
    document.querySelectorAll('#passwordForm .form-input').forEach(el => el.classList.remove('invalid'));

    // Client-side validation
    if (!current) { showError('profCurrentPassword', 'Current password is required'); valid = false; }
    if (!newPass) { showError('profNewPassword', 'New password is required'); valid = false; }
    else if (newPass.length < 8) { showError('profNewPassword', 'Must be at least 8 characters'); valid = false; }
    if (!confirm) { showError('profConfirmPassword', 'Please confirm your password'); valid = false; }
    else if (newPass !== confirm) { showError('profConfirmPassword', 'Passwords do not match'); valid = false; }

    if (!valid) return;

    // Backend update
    fetch('/api/handlers/a_profile_handler.php', { 
        method: 'POST', 
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
            action: 'change_password',
            current_password: current,
            new_password: newPass
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            passwordForm.reset();
            passwordStrength.style.display = 'none'; // Hide strength bar on success
        } else {
            showToast(data.message, 'error');
            // Highlight current password field if it was wrong
            if (data.message.includes('incorrect')) showError('profCurrentPassword', data.message);
        }
    })
    .catch(() => showToast('Network error. Please try again.', 'error'));
});

/* ================================================================
   DELETE ACCOUNT MODAL
   ================================================================ */
const deleteModal = document.getElementById('deleteModal');
const deleteConfirmInput = document.getElementById('deleteConfirmInput');
const deleteConfirmBtn = document.getElementById('deleteConfirmBtn');

document.getElementById('deleteAccountBtn').addEventListener('click', () => {
    deleteConfirmInput.value = '';
    deleteConfirmBtn.disabled = true;
    deleteModal.classList.add('visible');
    setTimeout(() => deleteConfirmInput.focus(), 150);
});

deleteConfirmInput.addEventListener('input', () => {
    deleteConfirmBtn.disabled = deleteConfirmInput.value.trim().toUpperCase() !== 'DELETE';
});

function closeDeleteModal() {
    deleteModal.classList.remove('visible');
}

document.getElementById('deleteCancelBtn').addEventListener('click', closeDeleteModal);
deleteModal.addEventListener('click', (e) => {
    if (e.target === deleteModal) closeDeleteModal();
});

deleteConfirmBtn.addEventListener('click', () => {
    if (deleteConfirmBtn.disabled) return;

    // Disable button immediately to prevent double clicks
    deleteConfirmBtn.disabled = true;
    deleteConfirmBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Deleting...';

    fetch('/api/handlers/a_profile_handler.php', { 
        method: 'DELETE' 
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            closeDeleteModal();
            showToast(data.message, 'success');
            // Redirect after a short delay so the user sees the toast
            setTimeout(() => {
                window.location.href = '/public/auth/login.php';
            }, 1500);
        } else {
            showToast(data.message || 'Failed to delete account', 'error');
            // Reset button state
            deleteConfirmBtn.disabled = false;
            deleteConfirmBtn.innerHTML = '<i class="fa-solid fa-trash-can"></i> <span>Delete Forever</span>';
        }
    })
    .catch(() => {
        showToast('Network error. Please try again.', 'error');
        deleteConfirmBtn.disabled = false;
        deleteConfirmBtn.innerHTML = '<i class="fa-solid fa-trash-can"></i> <span>Delete Forever</span>';
    });
});

/* ================================================================
   GLOBAL KEYBOARD SHORTCUTS
   ================================================================ */
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeNotifPanel();
        closeDeleteModal();
    }
});
</script>
</body>
</html>