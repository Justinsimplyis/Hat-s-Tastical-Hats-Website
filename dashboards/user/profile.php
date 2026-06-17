<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/users/profile.css">
    <title>My Profile — Hattie's Hat'istical Hats</title>  
</head>
<body>

<!-- ======================== TOPBAR ======================== -->
<header class="topbar" id="topbar">
    <div class="topbar-left">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar"><i class="fa-solid fa-bars"></i></button>
        <a href="../../index.php" class="topbar-logo">
            <div class="topbar-logo-mark">H</div>
            <div class="topbar-logo-text">
                <span class="topbar-logo-name">Hattie's</span>
                <span class="topbar-logo-tagline">Hat'istical Hats</span>
            </div>
        </a>
    </div>
    <div class="topbar-right">
        <a href="../../index.php" class="topbar-icon-btn" aria-label="Back to store" title="Back to store"><i class="fa-solid fa-store"></i></a>
        <a href="#" class="profile-btn" id="profileTopBtn" aria-label="Profile">
            <span class="profile-avatar" id="topAvatar"></span>
            <span class="profile-label" id="topName"></span>
        </a>
    </div>
</header>

<!-- ======================== SIDEBAR ======================== -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="sidebar-collapse-btn" id="sidebarCollapseBtn" aria-label="Collapse sidebar"><i class="fa-solid fa-angles-left"></i></button>
    </div>
    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Dashboard</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/index.php" class="sb-nav-link" data-section="overview">
                <i class="fa-solid fa-gauge sb-nav-icon"></i>
                <span class="sb-nav-label">Overview</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_cart.php" class="sb-nav-link" data-section="cart">
                <i class="fa-solid fa-bag-shopping sb-nav-icon"></i>
                <span class="sb-nav-label">My Cart</span>
                <span class="sb-nav-badge" id="sidebarCartBadge" style="display:none;">0</span>
            </a>
        </div>
        <div class="sb-nav-item">
            <a href="/api/models/manage_customers_orders.php" class="sb-nav-link" data-section="orders">
                <i class="fa-solid fa-receipt sb-nav-icon"></i>
                <span class="sb-nav-label">My Orders</span>
            </a>
        </div>

        <div class="sidebar-section-label">Requests</div>
        <div class="sb-nav-item">
            <a href="/api/manage_customer_request.php" class="sb-nav-link" data-section="custom-requests">
                <i class="fa-solid fa-wand-magic-sparkles sb-nav-icon"></i>
                <span class="sb-nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="sidebar-section-label">Account</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/profile.php" class="sb-nav-link active" data-section="profile">
                <i class="fa-solid fa-user-pen sb-nav-icon"></i>
                <span class="sb-nav-label">My Profile</span>
            </a>
        </div>
    </nav>
    <div class="sidebar-footer">
        <a href="/public/auth/logout.php" class="sb-logout">
            <i class="fa-solid fa-right-from-bracket sb-nav-icon"></i>
            <span class="sb-nav-label">Logout</span>
        </a>
    </div>
</aside>
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- ======================== MAIN ======================== -->
<div class="main-wrapper">

    <main class="main-content">

        <div class="dash-section-header">
            <div><h1>My Profile</h1><p>Update your personal information and account settings.</p></div>
        </div>

        <div class="dash-loading" id="profileLoading"><div class="spinner"></div><span>Loading profile...</span></div>
        <div id="profileContent" style="display:none;"><!-- populated by JS --></div>

    </main>

    <footer class="dash-footer">&copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved.</footer>
</div>

<!-- ======================== CONFIRM DIALOG ======================== -->
<div class="confirm-overlay" id="confirmOverlay">
    <div class="confirm-box">
        <div class="confirm-icon" id="confirmIcon"><i class="fa-solid fa-triangle-exclamation"></i></div>
        <h3 id="confirmTitle">Are you sure?</h3>
        <p id="confirmMessage">This action cannot be undone.</p>
        <div id="confirmExtraContent"></div>
        <div class="confirm-actions">
            <button class="btn-sm ghost" id="confirmCancel">Cancel</button>
            <button class="btn-sm danger" id="confirmOk">Confirm</button>
        </div>
    </div>
</div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE
   ================================================================ */
var userData = null;
var confirmCallback = null;

/* ================================================================
   UTILITIES
   ================================================================ */
function fmt(n){ return 'R ' + Number(n).toFixed(2); }
function esc(s){ var d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

function showToast(msg, type){
    type = type || 'info';
    var c = document.getElementById('toastContainer');
    var t = document.createElement('div');
    t.className = 'toast ' + type;
    var icon = type==='success' ? 'fa-circle-check' : type==='error' ? 'fa-circle-xmark' : 'fa-circle-info';
    t.innerHTML = '<i class="fa-solid '+icon+'"></i> '+esc(msg);
    c.appendChild(t);
    setTimeout(function(){
        t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all .3s ease';
        setTimeout(function(){ t.remove(); }, 300);
    }, 3500);
}

function emptyHTML(icon, title, desc){
    return '<div style="text-align:center;padding:60px 20px;color:var(--fg-muted);"><i class="fa-solid '+icon+'" style="font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block;"></i><h3 style="font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px;">'+title+'</h3><p style="font-size:.88rem;margin-bottom:20px;">'+desc+'</p><button class="btn-sm ghost" onclick="loadProfile()" style="display:inline-flex;"><i class="fa-solid fa-rotate-right"></i> Retry</button></div>';
}

function formatDate(dateStr){
    if(!dateStr) return '—';
    var d = new Date(dateStr);
    if(isNaN(d.getTime())) return esc(dateStr);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

function getInitials(first, last){
    return ((first||'').charAt(0) + (last||'').charAt(0)).toUpperCase() || 'U';
}

/* ================================================================
   SIDEBAR
   ================================================================ */
var sidebar = document.getElementById('sidebar');
var sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
var sidebarOverlay = document.getElementById('sidebarOverlay');
var mobileToggle = document.getElementById('mobileToggle');

sidebarCollapseBtn.addEventListener('click', function(){
    sidebar.classList.toggle('collapsed');
    var icon = sidebarCollapseBtn.querySelector('i');
    icon.classList.toggle('fa-angles-left', !sidebar.classList.contains('collapsed'));
    icon.classList.toggle('fa-angles-right', sidebar.classList.contains('collapsed'));
});
mobileToggle.addEventListener('click', function(){ sidebar.classList.add('open'); sidebarOverlay.classList.add('visible'); });
sidebarOverlay.addEventListener('click', function(){ sidebar.classList.remove('open'); sidebarOverlay.classList.remove('visible'); });

document.querySelectorAll('.sb-nav-link[data-section]').forEach(function(link){
    link.addEventListener('click', function(e){
        e.preventDefault();
        var href = link.getAttribute('href');
        if(href && href !== '#' && href !== window.location.pathname){
            window.location.href = href;
        }
    });
});

window.addEventListener('scroll', function(){ document.getElementById('topbar').classList.toggle('scrolled', window.scrollY > 10); });

/* ================================================================
   CONFIRM DIALOG
   ================================================================ */
function showConfirm(title, message, type, callback, okLabel, extraHtml){
    type = type || 'warn';
    confirmCallback = callback;
    document.getElementById('confirmTitle').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    document.getElementById('confirmExtraContent').innerHTML = extraHtml || '';
    var iconEl = document.getElementById('confirmIcon');
    iconEl.className = 'confirm-icon ' + type;
    var icons = {warn:'fa-triangle-exclamation', danger:'fa-trash-can'};
    iconEl.innerHTML = '<i class="fa-solid '+(icons[type]||icons.warn)+'"></i>';
    var okBtn = document.getElementById('confirmOk');
    okBtn.className = 'btn-sm ' + (type==='danger'?'danger':'primary');
    okBtn.textContent = okLabel || 'Confirm';
    document.getElementById('confirmOverlay').classList.add('visible');
    document.body.style.overflow = 'hidden';
}
function closeConfirm(){
    document.getElementById('confirmOverlay').classList.remove('visible');
    document.body.style.overflow = '';
    confirmCallback = null;
}
document.getElementById('confirmCancel').addEventListener('click', closeConfirm);
document.getElementById('confirmOk').addEventListener('click', function(){
    if(typeof confirmCallback === 'function') confirmCallback();
});
document.getElementById('confirmOverlay').addEventListener('click', function(e){
    if(e.target === this) closeConfirm();
});

/* ================================================================
   PROFILE — RENDERING
   ================================================================ */

function loadProfile(){
    var loading = document.getElementById('profileLoading');
    var content = document.getElementById('profileContent');
    loading.style.display = '';
    content.style.display = 'none';

    // Load from your backend here
    userData = {
        first_name: '',
        last_name: '',
        email: '',
        phone: '',
        avatar: null,
        created_at: null,
        total_spent: 0,
        total_orders: 0,
        total_requests: 0,
        address: {}
    };
    
    loading.style.display = 'none';
    content.style.display = '';
    renderProfile();
    updateTopbar();
}

function updateTopbar(){
    if(!userData) return;
    var initials = getInitials(userData.first_name, userData.last_name);
    document.getElementById('topAvatar').textContent = initials;
    document.getElementById('topAvatar').style.backgroundImage = userData.avatar ? 'url('+esc(userData.avatar)+')' : '';
    document.getElementById('topAvatar').style.backgroundSize = userData.avatar ? 'cover' : '';
    document.getElementById('topName').textContent = (userData.first_name||'') + ' ' + (userData.last_name||'');
}

function renderProfile(){
    var initials = getInitials(userData.first_name, userData.last_name);
    var addr = userData.address || {};

    var avatarImg = userData.avatar
        ? '<img src="'+esc(userData.avatar)+'" alt="Avatar" id="avatarImage">'
        : '';
    var avatarHtml =
        '<div class="profile-avatar-large" id="avatarContainer">'+
            avatarImg +
            (!userData.avatar ? esc(initials) : '') +
            '<label class="avatar-edit" for="avatarInput" title="Change photo"><i class="fa-solid fa-camera"></i></label>'+
            '<input type="file" id="avatarInput" accept="image/jpeg,image/png,image/gif,image/webp" hidden>'+
        '</div>';

    var addressHtml =
        '<div class="pwd-divider"><span>Delivery Address</span></div>'+
        '<div class="form-row">'+
            '<div class="form-group" style="grid-column:1/-1;"><label>Street Address</label><input type="text" id="pStreet" class="form-input" value="'+esc(addr.street||'')+'" placeholder="e.g. 12 Hat Lane"><span class="form-error" id="pStreetError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
        '</div>'+
        '<div class="form-row">'+
            '<div class="form-group"><label>City</label><input type="text" id="pCity" class="form-input" value="'+esc(addr.city||'')+'" placeholder="e.g. Cape Town"><span class="form-error" id="pCityError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
            '<div class="form-group"><label>Province</label>'+
                '<select id="pProvince" class="form-input">'+
                    '<option value="">Select province</option>'+
                    '<option value="Eastern Cape"'+(addr.province==='Eastern Cape'?' selected':'')+'>Eastern Cape</option>'+
                    '<option value="Free State"'+(addr.province==='Free State'?' selected':'')+'>Free State</option>'+
                    '<option value="Gauteng"'+(addr.province==='Gauteng'?' selected':'')+'>Gauteng</option>'+
                    '<option value="KwaZulu-Natal"'+(addr.province==='KwaZulu-Natal'?' selected':'')+'>KwaZulu-Natal</option>'+
                    '<option value="Limpopo"'+(addr.province==='Limpopo'?' selected':'')+'>Limpopo</option>'+
                    '<option value="Mpumalanga"'+(addr.province==='Mpumalanga'?' selected':'')+'>Mpumalanga</option>'+
                    '<option value="Northern Cape"'+(addr.province==='Northern Cape'?' selected':'')+'>Northern Cape</option>'+
                    '<option value="North West"'+(addr.province==='North West'?' selected':'')+'>North West</option>'+
                    '<option value="Western Cape"'+(addr.province==='Western Cape'?' selected':'')+'>Western Cape</option>'+
                '</select>'+
                '<span class="form-error" id="pProvinceError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span>'+
            '</div>'+
        '</div>'+
        '<div class="form-row">'+
            '<div class="form-group"><label>Postal Code</label><input type="text" id="pPostalCode" class="form-input" value="'+esc(addr.postal_code||'')+'" placeholder="e.g. 8001" maxlength="4"><span class="form-error" id="pPostalCodeError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
            '<div class="form-group"></div>'+
        '</div>';

    document.getElementById('profileContent').innerHTML =
        '<div class="profile-grid">'+

            '<div class="profile-card">'+
                '<div class="profile-avatar-upload">'+avatarHtml+'</div>'+
                '<div class="profile-name-display" id="profileDisplayName">'+esc(userData.first_name+' '+userData.last_name)+'</div>'+
                '<div class="profile-email-display" id="profileDisplayEmail">'+esc(userData.email)+'</div>'+
                '<div class="profile-since"><i class="fa-regular fa-calendar"></i> Member since '+formatDate(userData.created_at)+'</div>'+

                '<div class="profile-divider"></div>'+

                '<div class="profile-stat-row"><span class="label">Total Orders</span><span class="value">'+(userData.total_orders||0)+'</span></div>'+
                '<div class="profile-stat-row"><span class="label">Custom Requests</span><span class="value">'+(userData.total_requests||0)+'</span></div>'+
                '<div class="profile-stat-row"><span class="label">Total Spent</span><span class="value accent">'+fmt(userData.total_spent||0)+'</span></div>'+

                '<div class="profile-danger-zone">'+
                    '<h4><i class="fa-solid fa-shield-halved"></i> Danger Zone</h4>'+
                    '<button class="btn-sm-danger" id="deleteAccountBtn"><i class="fa-solid fa-trash-can"></i> Delete Account</button>'+
                    '<p style="font-size:.72rem;color:var(--fg-muted);margin-top:8px;line-height:1.5;">Permanently delete your account and all associated data. This cannot be undone.</p>'+
                '</div>'+
            '</div>'+

            '<div class="profile-card">'+
                '<h3 style="font-size:1rem;font-weight:700;margin-bottom:20px;display:flex;align-items:center;gap:8px;"><i class="fa-solid fa-user" style="color:var(--red);font-size:.85rem;"></i> Personal Information</h3>'+
                '<form id="profileForm" novalidate>'+
                    '<div class="form-row">'+
                        '<div class="form-group"><label>First Name <span style="color:var(--red);">*</span></label><input type="text" id="pFirstName" class="form-input" value="'+esc(userData.first_name||'')+'" placeholder="First name"><span class="form-error" id="pFirstNameError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                        '<div class="form-group"><label>Last Name <span style="color:var(--red);">*</span></label><input type="text" id="pLastName" class="form-input" value="'+esc(userData.last_name||'')+'" placeholder="Last name"><span class="form-error" id="pLastNameError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '</div>'+
                    '<div class="form-group"><label>Email Address <span style="color:var(--red);">*</span></label><input type="email" id="pEmail" class="form-input" value="'+esc(userData.email||'')+'" placeholder="you@example.co.za"><span class="form-error" id="pEmailError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '<div class="form-group"><label>Phone Number</label><input type="tel" id="pPhone" class="form-input" value="'+esc(userData.phone||'')+'" placeholder="+27 82 345 6789"><span class="form-error" id="pPhoneError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+

                    addressHtml +

                    '<div style="display:flex;gap:10px;margin-top:8px;">'+
                        '<button type="submit" class="btn-sm primary" id="profileSaveBtn" style="flex:1;justify-content:center;padding:12px;"><i class="fa-solid fa-check"></i> Save Changes</button>'+
                        '<button type="button" class="btn-sm ghost" id="profileResetBtn" style="padding:12px 20px;"><i class="fa-solid fa-rotate-left"></i> Reset</button>'+
                    '</div>'+
                '</form>'+

                '<div class="pwd-divider"><span>Change Password</span></div>'+

                '<form id="passwordForm" novalidate>'+
                    '<div class="form-group"><label>Current Password</label><input type="password" id="pCurrentPwd" class="form-input" placeholder="Enter your current password" autocomplete="current-password"><span class="form-error" id="pCurrentPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '<div class="form-row">'+
                        '<div class="form-group"><label>New Password</label><input type="password" id="pNewPwd" class="form-input" placeholder="Minimum 8 characters" autocomplete="new-password"><div class="pwd-strength" id="pwdStrength" style="display:none;"><div class="pwd-strength-bar"><div class="pwd-strength-fill" id="pwdStrengthFill"></div></div><div class="pwd-strength-label" id="pwdStrengthLabel"></div></div><span class="form-error" id="pNewPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                        '<div class="form-group"><label>Confirm New Password</label><input type="password" id="pConfirmPwd" class="form-input" placeholder="Re-enter new password" autocomplete="new-password"><span class="form-error" id="pConfirmPwdError"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span></div>'+
                    '</div>'+
                    '<button type="submit" class="btn-sm primary" id="pwdSaveBtn" style="width:100%;justify-content:center;padding:12px;margin-top:8px;"><i class="fa-solid fa-lock"></i> Update Password</button>'+
                '</form>'+
            '</div>'+

        '</div>';

    bindProfileEvents();
}

function bindProfileEvents(){

    var avatarInput = document.getElementById('avatarInput');
    if(avatarInput){
        avatarInput.addEventListener('change', function(){
            var file = avatarInput.files[0];
            if(!file) return;

            if(!file.type.match(/^image\/(jpeg|jpg|png|gif|webp)$/)){
                showToast('Please select a valid image file (JPG, PNG, GIF, WebP)','error');
                avatarInput.value = '';
                return;
            }
            if(file.size > 5 * 1024 * 1024){
                showToast('Image must be under 5MB','error');
                avatarInput.value = '';
                return;
            }

            var reader = new FileReader();
            reader.onload = function(e){
                var container = document.getElementById('avatarContainer');
                var existing = document.getElementById('avatarImage');
                if(existing){
                    existing.src = e.target.result;
                } else {
                    var img = document.createElement('img');
                    img.id = 'avatarImage';
                    img.src = e.target.result;
                    img.alt = 'Avatar';
                    container.insertBefore(img, container.firstChild);
                    var textNodes = Array.from(container.childNodes).filter(function(n){ return n.nodeType === 3; });
                    textNodes.forEach(function(n){ n.remove(); });
                }
                
                // Simulate Upload Success
                userData.avatar = e.target.result;
                showToast('Profile photo updated!','success');
                updateTopbar();
            };
            reader.readAsDataURL(file);
        });
    }

    var profileForm = document.getElementById('profileForm');
    profileForm.addEventListener('submit', function(e){
        e.preventDefault();
        clearFormErrors();

        var valid = true;
        var fn = document.getElementById('pFirstName').value.trim();
        var ln = document.getElementById('pLastName').value.trim();
        var em = document.getElementById('pEmail').value.trim();
        var ph = document.getElementById('pPhone').value.trim();
        var street = document.getElementById('pStreet').value.trim();
        var city = document.getElementById('pCity').value.trim();
        var province = document.getElementById('pProvince').value;
        var postal = document.getElementById('pPostalCode').value.trim();

        if(!fn){ setFormError('pFirstName','First name is required'); valid=false; }
        else if(fn.length < 2){ setFormError('pFirstName','Must be at least 2 characters'); valid=false; }
        if(!ln){ setFormError('pLastName','Last name is required'); valid=false; }
        else if(ln.length < 2){ setFormError('pLastName','Must be at least 2 characters'); valid=false; }
        if(!em){ setFormError('pEmail','Email is required'); valid=false; }
        else if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(em)){ setFormError('pEmail','Enter a valid email address'); valid=false; }
        if(ph && !/^[\d\s\+\-\(\)]{7,20}$/.test(ph)){ setFormError('pPhone','Enter a valid phone number'); valid=false; }
        if(postal && !/^\d{4}$/.test(postal)){ setFormError('pPostalCode','Must be 4 digits'); valid=false; }

        if(!valid){
            var firstErr = document.querySelector('.form-error.visible');
            if(firstErr) firstErr.closest('.form-group').scrollIntoView({behavior:'smooth',block:'center'});
            return;
        }

        var btn = document.getElementById('profileSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Saving...';

        // Simulate Form Save Success
        setTimeout(function(){
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-check"></i> Save Changes';

            userData.first_name = fn;
            userData.last_name = ln;
            userData.email = em;
            userData.phone = ph;
            userData.address = { street: street, city: city, province: province, postal_code: postal };

            document.getElementById('profileDisplayName').textContent = fn + ' ' + ln;
            document.getElementById('profileDisplayEmail').textContent = em;
            updateTopbar();

            document.querySelectorAll('#profileForm .form-input').forEach(function(inp){
                if(inp.value.trim()){
                    inp.classList.add('just-saved');
                    setTimeout(function(){ inp.classList.remove('just-saved'); }, 700);
                }
            });

            showToast('Profile updated successfully!','success');
        }, 800);
    });

    document.getElementById('profileResetBtn').addEventListener('click', function(){
        loadProfile();
        showToast('Form reset to saved values','info');
    });

    var newPwdInput = document.getElementById('pNewPwd');
    newPwdInput.addEventListener('input', function(){
        var val = newPwdInput.value;
        var strengthEl = document.getElementById('pwdStrength');
        var fillEl = document.getElementById('pwdStrengthFill');
        var labelEl = document.getElementById('pwdStrengthLabel');

        if(!val){
            strengthEl.style.display = 'none';
            return;
        }
        strengthEl.style.display = '';

        var score = 0;
        if(val.length >= 8) score++;
        if(val.length >= 12) score++;
        if(/[A-Z]/.test(val) && /[a-z]/.test(val)) score++;
        if(/\d/.test(val)) score++;
        if(/[^A-Za-z0-9]/.test(val)) score++;

        var level, cls, color;
        if(score <= 1){ level='Weak'; cls='weak'; color='#E07070'; }
        else if(score <= 2){ level='Fair'; cls='fair'; color='#D4923A'; }
        else if(score <= 3){ level='Good'; cls='good'; color='#D4923A'; }
        else { level='Strong'; cls='strong'; color='#6BCB8B'; }

        fillEl.className = 'pwd-strength-fill ' + cls;
        labelEl.textContent = level;
        labelEl.style.color = color;
    });

    var passwordForm = document.getElementById('passwordForm');
    passwordForm.addEventListener('submit', function(e){
        e.preventDefault();
        clearFormErrors();

        var valid = true;
        var curPwd = document.getElementById('pCurrentPwd').value;
        var newPwd = document.getElementById('pNewPwd').value;
        var cfmPwd = document.getElementById('pConfirmPwd').value;

        if(!curPwd){ setFormError('pCurrentPwd','Current password is required'); valid=false; }
        if(!newPwd){ setFormError('pNewPwd','New password is required'); valid=false; }
        else if(newPwd.length < 8){ setFormError('pNewPwd','Must be at least 8 characters'); valid=false; }
        else if(newPwd === curPwd){ setFormError('pNewPwd','Must differ from current password'); valid=false; }
        if(!cfmPwd){ setFormError('pConfirmPwd','Please confirm your new password'); valid=false; }
        else if(newPwd !== cfmPwd){ setFormError('pConfirmPwd','Passwords do not match'); valid=false; }

        if(!valid) return;

        var btn = document.getElementById('pwdSaveBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Updating...';

        // Simulate Password Update
        setTimeout(function(){
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-lock"></i> Update Password';
            showToast('Password updated successfully!','success');
            
            document.getElementById('pCurrentPwd').value = '';
            document.getElementById('pNewPwd').value = '';
            document.getElementById('pConfirmPwd').value = '';
            document.getElementById('pwdStrength').style.display = 'none';
        }, 800);
    });

    document.getElementById('deleteAccountBtn').addEventListener('click', function(){
        var extraHtml =
            '<div class="confirm-input-row">'+
                '<label>Type <strong style="color:var(--red);">DELETE</strong> to confirm</label>'+
                '<input type="text" id="deleteConfirmInput" placeholder="DELETE" autocomplete="off">'+
            '</div>';

        showConfirm(
            'Delete Your Account?',
            'This will permanently delete your account, all orders, custom requests, and personal data. This action is irreversible.',
            'danger',
            function(){
                var input = document.getElementById('deleteConfirmInput');
                if(!input || input.value.trim() !== 'DELETE'){
                    input.classList.add('invalid');
                    return;
                }
                closeConfirm();
                deleteAccount();
            },
            'Delete Forever',
            extraHtml
        );

        setTimeout(function(){
            var input = document.getElementById('deleteConfirmInput');
            if(input){
                input.focus();
                input.addEventListener('input', function(){ input.classList.remove('invalid'); });
            }
        }, 100);
    });
}

function deleteAccount(){
    showToast('Requesting account deletion...', 'info');

    var extraHtml =
        '<div class="confirm-input-row">'+
            '<label>Enter your password to confirm</label>'+
            '<input type="password" id="deletePwdInput" placeholder="Your password" autocomplete="current-password">'+
            '<span class="form-error" id="deletePwdError" style="justify-content:center;"><i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> </span>'+
        '</div>';

    showConfirm(
        'Final Confirmation',
        'Please enter your password to permanently delete your account.',
        'danger',
        function(){
            var pwdInput = document.getElementById('deletePwdInput');
            var errEl = document.getElementById('deletePwdError');
            var pwd = pwdInput ? pwdInput.value : '';

            if(!pwd){
                if(errEl) { errEl.querySelector('i').nextSibling.textContent = ' Password is required'; errEl.classList.add('visible'); }
                if(pwdInput) pwdInput.classList.add('invalid');
                return;
            }

            closeConfirm();
            showToast('Deleting account...', 'info');

            // Simulate Account Deletion
            setTimeout(function(){
                showToast('Account deleted. Redirecting...','success');
                // window.location.href = '/index.php';
            }, 1500);
        },
        'Delete Forever',
        extraHtml
    );

    setTimeout(function(){
        var input = document.getElementById('deletePwdInput');
        if(input) input.focus();
    }, 100);
}

function setFormError(id, msg){
    var err = document.getElementById(id + 'Error');
    var inp = document.getElementById(id);
    if(err){
        var textNode = err.querySelector('i') ? err.querySelector('i').nextSibling : err.firstChild;
        if(textNode) textNode.textContent = ' ' + msg;
        else err.innerHTML = '<i class="fa-solid fa-circle-exclamation" style="font-size:.65rem;"></i> ' + esc(msg);
        err.classList.add('visible');
    }
    if(inp) inp.classList.add('invalid');
}

function clearFormErrors(){
    document.querySelectorAll('.form-error').forEach(function(el){
        el.classList.remove('visible');
        var textNode = el.querySelector('i') ? el.querySelector('i').nextSibling : el.firstChild;
        if(textNode) textNode.textContent = ' ';
    });
    document.querySelectorAll('.form-input').forEach(function(el){
        el.classList.remove('invalid','just-saved');
    });
}

document.addEventListener('input', function(e){
    if(e.target.classList && e.target.classList.contains('form-input') && e.target.classList.contains('invalid')){
        e.target.classList.remove('invalid');
        var errEl = document.getElementById(e.target.id + 'Error');
        if(errEl) errEl.classList.remove('visible');
    }
});

loadProfile();

document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        closeConfirm();
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
    }
});
</script>
</body>
</html>