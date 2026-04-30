<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>Custom Requests — Hattie's Hat'istical Hats</title>
    <style>
/* ================================================================
   User Dashboard — Light theme, same tokens as public.css
   ================================================================ */
:root {
    --red:#C93B39;--red-hover:#DA4E4C;--red-light:rgba(201,59,57,.10);--red-muted:rgba(201,59,57,.06);
    --pink:#CFA1A8;--pink-light:rgba(207,161,168,.18);--pink-muted:rgba(207,161,168,.10);
    --bg:#FFF8F6;--bg-elevated:#FFFFFF;--card:#FFFFFF;--topbar-bg:rgba(255,248,246,.92);
    --cream:#FFF0ED;--cream-dark:#FFE8E3;--cream-deeper:#FFDCD5;
    --fg:#2A1F21;--fg-secondary:#6B5558;--fg-muted:#9A8588;
    --border:#F0DDD8;--border-light:#F8EDEA;
    --shadow-sm:0 1px 3px rgba(42,31,33,.06);--shadow-md:0 4px 12px rgba(42,31,33,.08);
    --shadow-lg:0 12px 32px rgba(42,31,33,.12);--shadow-xl:0 24px 48px rgba(42,31,33,.16);
    --radius-sm:6px;--radius-md:10px;--radius-lg:16px;--radius-xl:24px;--radius-full:9999px;
    --ease:cubic-bezier(.4,0,.2,1);--duration:.2s;
    --sidebar-w:260px;--sidebar-collapsed-w:72px;--topbar-h:68px;
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{font-size:15px;-webkit-font-smoothing:antialiased}
body{font-family:'Segoe UI',system-ui,-apple-system,sans-serif;background:var(--bg);color:var(--fg);line-height:1.65;overflow-x:hidden}
a{color:inherit;text-decoration:none}
button{font:inherit;border:none;background:none;cursor:pointer;color:inherit}
img{max-width:100%;display:block}
input,textarea,select{font:inherit;border:none;outline:none;background:none}
table{border-collapse:collapse;width:100%}
ul{list-style:none}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--cream-deeper);border-radius:6px}

/* ── TOPBAR ──────────────────────────────────────────────── */
.topbar{position:fixed;top:0;left:0;right:0;height:var(--topbar-h);background:var(--topbar-bg);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-bottom:1px solid var(--border-light);z-index:100;display:flex;align-items:center;justify-content:space-between;padding:0 28px;transition:box-shadow .3s var(--ease)}
.topbar.scrolled{box-shadow:var(--shadow-sm)}
.topbar-left{display:flex;align-items:center;gap:16px}
.mobile-toggle{display:none;width:38px;height:38px;border-radius:var(--radius-sm);color:var(--fg-secondary);font-size:1.1rem;align-items:center;justify-content:center;transition:all var(--duration) var(--ease)}
.mobile-toggle:hover{background:var(--cream);color:var(--fg)}
.topbar-logo{display:flex;align-items:center;gap:10px}
.topbar-logo-mark{width:36px;height:36px;border-radius:var(--radius-md);background:linear-gradient(135deg,var(--red),var(--pink));color:#fff;font-size:1rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.topbar-logo-text{display:flex;flex-direction:column;line-height:1.15}
.topbar-logo-name{font-size:.92rem;font-weight:700;color:var(--fg)}
.topbar-logo-tagline{font-size:.6rem;font-weight:600;color:var(--pink);letter-spacing:.03em}
.topbar-right{display:flex;align-items:center;gap:10px}
.topbar-icon-btn{position:relative;width:38px;height:38px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease)}
.topbar-icon-btn:hover{background:var(--cream);color:var(--fg)}
.profile-btn{display:flex;align-items:center;gap:8px;padding:4px 12px 4px 4px;border-radius:var(--radius-full);transition:all var(--duration) var(--ease)}
.profile-btn:hover{background:var(--cream)}
.profile-avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--red),var(--pink));color:#fff;font-size:.8rem;font-weight:600;display:flex;align-items:center;justify-content:center}
.profile-label{font-size:.82rem;font-weight:500;color:var(--fg-secondary)}

/* ── SIDEBAR ─────────────────────────────────────────────── */
.sidebar{position:fixed;top:var(--topbar-h);left:0;bottom:0;width:var(--sidebar-w);background:var(--bg-elevated);border-right:1px solid var(--border-light);display:flex;flex-direction:column;z-index:90;transition:width .3s var(--ease);overflow:hidden}
.sidebar-header{display:flex;align-items:center;justify-content:space-between;padding:20px 16px 12px;flex-shrink:0}
.sidebar-collapse-btn{width:28px;height:28px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:.7rem;transition:all var(--duration) var(--ease)}
.sidebar-collapse-btn:hover{background:var(--cream);color:var(--fg-secondary)}
.sidebar-nav{flex:1;padding:8px 12px;overflow-y:auto}
.sidebar-section-label{font-size:.65rem;font-weight:600;text-transform:uppercase;letter-spacing:.12em;color:var(--pink);padding:0 12px;margin:16px 0 8px}
.sb-nav-item{margin-bottom:2px}
.sb-nav-link{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);color:var(--fg-secondary);font-size:.88rem;font-weight:500;transition:all var(--duration) var(--ease);position:relative;white-space:nowrap;overflow:hidden}
.sb-nav-link:hover{background:var(--cream);color:var(--fg)}
.sb-nav-link.active{background:var(--red-light);color:var(--red);font-weight:600}
.sb-nav-link.active::before{content:'';position:absolute;left:-12px;top:50%;transform:translateY(-50%);width:3px;height:22px;background:var(--red);border-radius:0 3px 3px 0}
.sb-nav-icon{width:20px;text-align:center;font-size:.95rem;flex-shrink:0}
.sb-nav-label{transition:opacity .2s var(--ease),transform .2s var(--ease)}
.sb-nav-badge{margin-left:auto;font-size:.7rem;font-weight:600;background:var(--red);color:#fff;padding:2px 8px;border-radius:var(--radius-full);flex-shrink:0}
.sidebar-footer{padding:12px;border-top:1px solid var(--border-light);flex-shrink:0}
.sb-logout{display:flex;align-items:center;gap:12px;padding:10px 12px;border-radius:var(--radius-sm);color:var(--pink);font-size:.88rem;font-weight:500;transition:all var(--duration) var(--ease);width:100%}
.sb-logout:hover{background:var(--pink-light);color:#c27a80}
.sidebar-overlay{position:fixed;inset:0;background:rgba(42,31,33,.4);backdrop-filter:blur(4px);z-index:89;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
.sidebar-overlay.visible{opacity:1;visibility:visible}
.sidebar.collapsed{width:var(--sidebar-collapsed-w)}
.sidebar.collapsed .sidebar-collapse-btn{display:none}
.sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge{opacity:0;width:0;overflow:hidden}
.sidebar.collapsed .sb-nav-link{justify-content:center;padding:10px}
.sidebar.collapsed .sb-logout{justify-content:center;padding:10px}
.sidebar.collapsed .sidebar-header{justify-content:center}

/* ── MAIN WRAPPER ────────────────────────────────────────── */
.main-wrapper{margin-left:var(--sidebar-w);min-height:100vh;display:flex;flex-direction:column;transition:margin-left .3s var(--ease)}
.sidebar.collapsed~.main-wrapper{margin-left:var(--sidebar-collapsed-w)}
.main-content{flex:1;padding:28px}

/* ── SECTION HEADER ──────────────────────────────────────── */
.dash-section-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:12px}
.dash-section-header h1{font-size:1.6rem;font-weight:700;letter-spacing:-.02em}
.dash-section-header p{font-size:.88rem;color:var(--fg-muted)}

/* ── PANEL ───────────────────────────────────────────────── */
.panel{background:var(--card);border:1px solid var(--border-light);border-radius:var(--radius-lg);box-shadow:var(--shadow-sm);overflow:hidden;margin-bottom:24px}
.panel-header{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--border-light)}
.panel-header h2{font-size:1rem;font-weight:600}
.panel-body{padding:0;overflow-x:auto}

/* ── DATA TABLE ──────────────────────────────────────────── */
.dtable th{padding:12px 20px;font-size:.7rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--fg-muted);background:var(--cream);text-align:left;white-space:nowrap}
.dtable td{padding:14px 20px;font-size:.87rem;color:var(--fg);border-bottom:1px solid var(--border-light);vertical-align:middle}
.dtable tbody tr{transition:background var(--duration) var(--ease)}
.dtable tbody tr:hover{background:var(--cream)}
.dtable tbody tr:last-child td{border-bottom:none}
.dtable-thumb{width:48px;height:48px;border-radius:var(--radius-sm);object-fit:cover;background:var(--cream);flex-shrink:0}
.dtable-product{display:flex;align-items:center;gap:12px}
.dtable-product-name{font-weight:600;color:var(--fg);line-height:1.3}
.dtable-product-cat{font-size:.72rem;color:var(--fg-muted);max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.dtable-price{font-weight:700;color:var(--red)}

/* ── STATUS BADGES ───────────────────────────────────────── */
.status-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 12px;border-radius:var(--radius-full);font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.03em}
.status-badge.pending{background:var(--cream);color:#D4923A}
.status-badge.processing{background:var(--red-light);color:var(--red)}
.status-badge.completed{background:rgba(107,203,139,.12);color:#27753F}
.status-badge.cancelled{background:rgba(122,106,109,.1);color:#7A6A6D}
.status-badge.reviewing{background:var(--pink-light);color:var(--pink)}
.status-badge.quoted{background:rgba(212,146,58,.1);color:#D4923A}
.status-badge.in-progress{background:rgba(201,59,57,.1);color:var(--red)}
.status-badge.submitted{background:var(--cream);color:#D4923A}
.sbadge-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0}
.status-badge.pending .sbadge-dot{background:#D4923A}
.status-badge.processing .sbadge-dot{background:var(--red)}
.status-badge.completed .sbadge-dot{background:#6BCB8B}
.status-badge.cancelled .sbadge-dot{background:#7A6A6D}
.status-badge.reviewing .sbadge-dot{background:var(--pink)}
.status-badge.quoted .sbadge-dot{background:#D4923A}
.status-badge.in-progress .sbadge-dot{background:var(--red)}
.status-badge.submitted .sbadge-dot{background:#D4923A}

/* ── BUTTONS ─────────────────────────────────────────────── */
.btn-sm{padding:10px 20px;border-radius:var(--radius-full);font-size:.84rem;font-weight:600;display:inline-flex;align-items:center;gap:6px;transition:all var(--duration) var(--ease)}
.btn-sm.primary{background:var(--red);color:#fff}
.btn-sm.primary:hover{background:var(--red-hover);transform:translateY(-1px);box-shadow:0 4px 12px rgba(201,59,57,.25)}
.btn-sm.primary:disabled{opacity:.5;cursor:not-allowed;transform:none;box-shadow:none}
.btn-sm.ghost{background:var(--cream);color:var(--fg-secondary);border:1px solid var(--border)}
.btn-sm.ghost:hover{background:var(--cream-dark);color:var(--fg)}
.btn-sm.danger{background:rgba(201,59,57,.08);color:var(--red);border:1px solid rgba(201,59,57,.2)}
.btn-sm.danger:hover{background:rgba(201,59,57,.15);border-color:rgba(201,59,57,.35)}
.btn-sm.success{background:rgba(107,203,139,.1);color:#27753F;border:1px solid rgba(107,203,139,.2)}
.btn-sm.success:hover{background:rgba(107,203,139,.18);border-color:rgba(107,203,139,.35)}
.btn-sm.warning{background:rgba(212,146,58,.1);color:#D4923A;border:1px solid rgba(212,146,58,.2)}
.btn-sm.warning:hover{background:rgba(212,146,58,.18);border-color:rgba(212,146,58,.35)}

/* ── EMPTY STATE ─────────────────────────────────────────── */
.empty-state{text-align:center;padding:60px 20px;color:var(--fg-muted)}
.empty-state i{font-size:2.5rem;margin-bottom:14px;opacity:.35;display:block}
.empty-state h3{font-size:1rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.empty-state p{font-size:.88rem;margin-bottom:20px}

/* ── MODAL ───────────────────────────────────────────────── */
.modal-overlay{position:fixed;inset:0;z-index:200;background:rgba(42,31,33,.5);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.modal-overlay.visible{opacity:1;visibility:visible}
.modal-box{width:100%;max-width:660px;max-height:85vh;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);overflow:hidden;transform:scale(.95) translateY(12px);transition:transform .3s var(--ease);position:relative}
.modal-overlay.visible .modal-box{transform:scale(1) translateY(0)}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:20px 24px;border-bottom:1px solid var(--border-light)}
.modal-header h3{font-size:1.05rem;font-weight:600}
.modal-close{width:36px;height:36px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:1rem;transition:all var(--duration) var(--ease)}
.modal-close:hover{background:var(--cream);color:var(--fg)}
.modal-body{padding:24px;overflow-y:auto;max-height:calc(85vh - 80px)}

/* Detail rows */
.detail-row{display:flex;gap:8px;padding:10px 0;border-bottom:1px solid var(--border-light)}
.detail-row:last-child{border-bottom:none}
.detail-label{font-size:.78rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.04em;min-width:120px;flex-shrink:0}
.detail-value{font-size:.9rem;font-weight:500;color:var(--fg)}

/* Reference images */
.ref-images-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:8px}
.ref-img{aspect-ratio:1;border-radius:var(--radius-md);overflow:hidden;background:var(--cream);cursor:pointer;transition:all var(--duration) var(--ease);position:relative}
.ref-img:hover{transform:scale(1.04);box-shadow:var(--shadow-md)}
.ref-img img{width:100%;height:100%;object-fit:cover}
.ref-img-count{position:absolute;bottom:4px;right:4px;width:22px;height:22px;border-radius:50%;background:rgba(42,31,33,.7);color:#fff;font-size:.6rem;font-weight:600;display:flex;align-items:center;justify-content:center}

/* Quote highlight box */
.quote-box{background:rgba(212,146,58,.06);border:1.5px solid rgba(212,146,58,.2);border-radius:var(--radius-md);padding:16px 20px;margin:12px 0;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
.quote-box-left{display:flex;flex-direction:column;gap:2px}
.quote-box-label{font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:#D4923A}
.quote-box-price{font-size:1.3rem;font-weight:700;color:var(--red)}
.quote-box-actions{display:flex;gap:8px}

/* Admin notes */
.admin-notes{background:var(--cream);border-radius:var(--radius-md);padding:14px 18px;margin:12px 0}
.admin-notes-header{font-size:.72rem;font-weight:600;text-transform:uppercase;letter-spacing:.06em;color:var(--pink);margin-bottom:6px;display:flex;align-items:center;gap:6px}
.admin-notes-body{font-size:.88rem;color:var(--fg-secondary);line-height:1.7}

/* Timeline */
.order-timeline{margin-top:20px}
.timeline-step{display:flex;gap:14px;position:relative;padding-bottom:20px}
.timeline-step:last-child{padding-bottom:0}
.timeline-step::before{content:'';position:absolute;left:13px;top:28px;bottom:0;width:2px;background:var(--border-light)}
.timeline-step:last-child::before{display:none}
.timeline-dot{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.65rem;flex-shrink:0;border:2px solid var(--border-light);background:var(--bg);color:var(--fg-muted);z-index:1}
.timeline-dot.done{background:var(--red-light);border-color:var(--red);color:var(--red)}
.timeline-dot.active{background:var(--red);border-color:var(--red);color:#fff;box-shadow:0 0 0 4px var(--red-muted)}
.timeline-dot.cancelled{background:rgba(122,106,109,.1);border-color:#7A6A6D;color:#7A6A6D}
.timeline-content{padding-top:3px}
.timeline-title{font-size:.85rem;font-weight:600;color:var(--fg)}
.timeline-date{font-size:.75rem;color:var(--fg-muted);margin-top:2px}

/* ── NEW REQUEST FORM ────────────────────────────────────── */
.form-group{margin-bottom:18px}
.form-group label{display:block;font-size:.82rem;font-weight:600;color:var(--fg-secondary);margin-bottom:6px}
.form-input{width:100%;padding:11px 16px;border-radius:var(--radius-md);border:1.5px solid var(--border);background:var(--bg);font-size:.9rem;color:var(--fg);transition:all var(--duration) var(--ease)}
.form-input:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.form-input::placeholder{color:var(--fg-muted)}
.form-input.invalid{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
textarea.form-input{min-height:120px;resize:vertical;line-height:1.7}
.form-error{display:block;font-size:.75rem;color:var(--red);margin-top:4px}
.form-hint{display:block;font-size:.72rem;color:var(--fg-muted);margin-top:4px}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}

/* Image upload area */
.upload-area{border:2px dashed var(--border);border-radius:var(--radius-lg);padding:28px;text-align:center;cursor:pointer;transition:all var(--duration) var(--ease);position:relative}
.upload-area:hover,.upload-area.drag-over{border-color:var(--red);background:var(--red-muted)}
.upload-area-icon{font-size:1.8rem;color:var(--fg-muted);margin-bottom:8px;transition:color var(--duration) var(--ease)}
.upload-area:hover .upload-area-icon{color:var(--red)}
.upload-area-text{font-size:.88rem;color:var(--fg-secondary);font-weight:500}
.upload-area-hint{font-size:.75rem;color:var(--fg-muted);margin-top:4px}
.upload-area input{position:absolute;inset:0;opacity:0;cursor:pointer}

/* Preview grid for uploaded images */
.upload-preview-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-top:12px}
.upload-preview-item{aspect-ratio:1;border-radius:var(--radius-md);overflow:hidden;background:var(--cream);position:relative}
.upload-preview-item img{width:100%;height:100%;object-fit:cover}
.upload-preview-remove{position:absolute;top:4px;right:4px;width:22px;height:22px;border-radius:50%;background:rgba(42,31,33,.75);color:#fff;font-size:.6rem;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all var(--duration) var(--ease)}
.upload-preview-remove:hover{background:var(--red);transform:scale(1.1)}

/* ── CONFIRM DIALOG ──────────────────────────────────────── */
.confirm-overlay{position:fixed;inset:0;z-index:250;background:rgba(42,31,33,.5);backdrop-filter:blur(6px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .25s var(--ease)}
.confirm-overlay.visible{opacity:1;visibility:visible}
.confirm-box{width:100%;max-width:400px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);padding:28px;text-align:center;transform:scale(.95);transition:transform .3s var(--ease)}
.confirm-overlay.visible .confirm-box{transform:scale(1)}
.confirm-icon{width:52px;height:52px;border-radius:50%;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;font-size:1.3rem}
.confirm-icon.warn{background:var(--cream);color:#D4923A}
.confirm-icon.danger{background:rgba(201,59,57,.1);color:var(--red)}
.confirm-icon.success{background:rgba(107,203,139,.1);color:#27753F}
.confirm-box h3{font-size:1.05rem;font-weight:700;margin-bottom:8px}
.confirm-box p{font-size:.88rem;color:var(--fg-muted);margin-bottom:24px;line-height:1.6}
.confirm-actions{display:flex;gap:10px;justify-content:center}
.confirm-actions .btn-sm{min-width:110px;justify-content:center}

/* ── LIGHTBOX ────────────────────────────────────────────── */
.lightbox{position:fixed;inset:0;z-index:300;background:rgba(0,0,0,.85);display:flex;align-items:center;justify-content:center;opacity:0;visibility:hidden;transition:all .25s var(--ease);cursor:zoom-out}
.lightbox.visible{opacity:1;visibility:visible}
.lightbox img{max-width:90vw;max-height:85vh;object-fit:contain;border-radius:var(--radius-md);animation:lbIn .3s var(--ease) forwards}
@keyframes lbIn{from{transform:scale(.9);opacity:0}to{transform:scale(1);opacity:1}}

/* ── SEARCH / FILTER ─────────────────────────────────────── */
.requests-toolbar{display:flex;align-items:center;gap:12px;margin-bottom:20px;flex-wrap:wrap}
.requests-search{position:relative;flex:1;min-width:200px;max-width:360px}
.requests-search input{width:100%;padding:10px 16px 10px 40px;border-radius:var(--radius-full);border:1.5px solid var(--border);background:var(--bg-elevated);font-size:.88rem;color:var(--fg);transition:all var(--duration) var(--ease)}
.requests-search input:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.requests-search input::placeholder{color:var(--fg-muted)}
.requests-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--fg-muted);font-size:.85rem}
.requests-filter-select{padding:10px 36px 10px 16px;border-radius:var(--radius-full);border:1.5px solid var(--border);background:var(--bg-elevated) url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%239A8588' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E") no-repeat right 14px center;font-size:.85rem;color:var(--fg-secondary);cursor:pointer;appearance:none;transition:all var(--duration) var(--ease)}
.requests-filter-select:focus{border-color:var(--red);box-shadow:0 0 0 3px var(--red-muted)}
.requests-count{font-size:.82rem;color:var(--fg-muted);margin-left:auto;white-space:nowrap}
.requests-count strong{color:var(--fg-secondary);font-weight:600}

/* ── TOAST ───────────────────────────────────────────────── */
.toast-container{position:fixed;bottom:24px;right:24px;z-index:9999;display:flex;flex-direction:column;gap:10px;pointer-events:none}
.toast{display:flex;align-items:center;gap:10px;padding:14px 22px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.88rem;font-weight:500;pointer-events:auto;animation:toastIn .35s var(--ease) forwards}
.toast.success i{color:#6BCB8B}.toast.error i{color:#E07070}.toast.info i{color:var(--pink)}
@keyframes toastIn{from{opacity:0;transform:translateY(12px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

/* ── FOOTER & LOADING ────────────────────────────────────── */
.dash-footer{padding:18px 28px;text-align:center;font-size:.78rem;color:var(--fg-muted);border-top:1px solid var(--border-light)}
.dash-footer span{font-weight:600;color:var(--fg-secondary)}
.dash-loading{display:flex;align-items:center;justify-content:center;gap:12px;padding:60px;color:var(--fg-muted)}
.dash-loading .spinner{width:28px;height:28px;border:3px solid var(--border);border-top-color:var(--red);border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* ── RESPONSIVE ───────────────────────────────────────────── */
@media(max-width:768px){
    .sidebar{transform:translateX(-100%);width:var(--sidebar-w)!important;z-index:200}
    .sidebar.open{transform:translateX(0)}
    .sidebar.collapsed .sb-nav-label,.sidebar.collapsed .sidebar-section-label,.sidebar.collapsed .sb-nav-badge,.sidebar.collapsed .sb-logout .nav-label{opacity:1;width:auto;overflow:visible}
    .sidebar.collapsed .sb-nav-link{justify-content:flex-start;padding:10px 12px}
    .sidebar.collapsed .sb-logout{justify-content:flex-start;padding:10px 12px}
    .main-wrapper{margin-left:0!important}
    .mobile-toggle{display:flex}
    .topbar{padding:0 16px}
    .profile-label{display:none}
    .main-content{padding:20px 16px}
    .requests-toolbar{flex-direction:column;align-items:stretch}
    .requests-search{max-width:100%}
    .requests-count{margin-left:0;text-align:center}
    .dtable th,.dtable td{padding:10px 14px}
    .detail-row{flex-direction:column;gap:2px}
    .detail-label{min-width:auto}
    .ref-images-grid{grid-template-columns:repeat(3,1fr)}
    .upload-preview-grid{grid-template-columns:repeat(3,1fr)}
    .quote-box{flex-direction:column;align-items:stretch;text-align:center}
    .quote-box-actions{justify-content:center}
    .form-row{grid-template-columns:1fr}
}
@media(max-width:480px){
    .dtable .hide-mobile{display:none}
    .ref-images-grid{grid-template-columns:repeat(2,1fr)}
    .upload-preview-grid{grid-template-columns:repeat(2,1fr)}
    .confirm-actions{flex-direction:column}
    .confirm-actions .btn-sm{width:100%}
}
:focus-visible{outline:2px solid var(--red);outline-offset:2px}
    </style>
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
            <span class="profile-avatar" id="topAvatar">H</span>
            <span class="profile-label" id="topName">Loading...</span>
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
            <a href="/api/manage_customer_request.php" class="sb-nav-link active" data-section="custom-requests">
                <i class="fa-solid fa-wand-magic-sparkles sb-nav-icon"></i>
                <span class="sb-nav-label">Custom Requests</span>
            </a>
        </div>

        <div class="sidebar-section-label">Account</div>
        <div class="sb-nav-item">
            <a href="/dashboards/user/profile.php" class="sb-nav-link" data-section="profile">
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
            <div><h1>Custom Requests</h1><p>Track your custom hat requests and their progress.</p></div>
            <button class="btn-sm primary" id="newRequestBtn"><i class="fa-solid fa-plus"></i> New Request</button>
        </div>

        <!-- Search & Filter toolbar -->
        <div class="requests-toolbar" id="requestsToolbar" style="display:none;">
            <div class="requests-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="requestSearchInput" placeholder="Search by name or ID...">
            </div>
            <select class="requests-filter-select" id="requestStatusFilter">
                <option value="">All Statuses</option>
                <option value="submitted">Submitted</option>
                <option value="reviewing">Reviewing</option>
                <option value="quoted">Quoted</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <div class="requests-count" id="requestsCount"></div>
        </div>

        <div class="dash-loading" id="requestsLoading"><div class="spinner"></div><span>Loading requests...</span></div>
        <div id="requestsContent" style="display:none;"><!-- populated by JS --></div>

    </main>

    <footer class="dash-footer">&copy; 2025 <span>Hattie's Hat'istical Hats</span>. All rights reserved.</footer>
</div>

<!-- ======================== REQUEST DETAIL MODAL ======================== -->
<div class="modal-overlay" id="requestDetailModal">
    <div class="modal-box">
        <div class="modal-header">
            <h3 id="requestDetailTitle">Request Details</h3>
            <button class="modal-close" id="requestDetailClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body" id="requestDetailBody"></div>
    </div>
</div>

<!-- ======================== NEW REQUEST MODAL ======================== -->
<div class="modal-overlay" id="newRequestModal">
    <div class="modal-box" style="max-width:580px;">
        <div class="modal-header">
            <h3>Submit Custom Request</h3>
            <button class="modal-close" id="newRequestClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
            <form id="newRequestForm" novalidate>
                <div class="form-group">
                    <label for="nrProductName">Hat Name / Style <span style="color:var(--red);">*</span></label>
                    <input type="text" id="nrProductName" class="form-input" placeholder="e.g. Wide Brim Sun Hat with Feather Band">
                    <span class="form-error" id="nrProductNameError"></span>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="nrBudget">Budget (ZAR)</label>
                        <input type="number" id="nrBudget" class="form-input" placeholder="e.g. 1500" min="0" step="0.01">
                        <span class="form-hint">Leave blank if flexible</span>
                        <span class="form-error" id="nrBudgetError"></span>
                    </div>
                    <div class="form-group">
                        <label for="nrSize">Preferred Size</label>
                        <select id="nrSize" class="form-input">
                            <option value="">Select size</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="Custom">Custom Measurements</option>
                        </select>
                        <span class="form-error" id="nrSizeError"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nrColor">Preferred Colour(s)</label>
                    <input type="text" id="nrColor" class="form-input" placeholder="e.g. Burgundy, Navy, Natural Straw">
                </div>
                <div class="form-group">
                    <label for="nrDescription">Description <span style="color:var(--red);">*</span></label>
                    <textarea id="nrDescription" class="form-input" placeholder="Describe your ideal hat in detail — materials, shape, embellishments, occasion, any inspiration images you have in mind..."></textarea>
                    <span class="form-error" id="nrDescriptionError"></span>
                </div>
                <div class="form-group">
                    <label>Reference Images</label>
                    <div class="upload-area" id="uploadArea">
                        <input type="file" id="nrFiles" accept="image/*" multiple hidden>
                        <div class="upload-area-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                        <div class="upload-area-text">Click or drag images here</div>
                        <div class="upload-area-hint">Up to 5 images, JPG or PNG, max 5MB each</div>
                    </div>
                    <div class="upload-preview-grid" id="uploadPreviewGrid"></div>
                    <span class="form-error" id="nrFilesError"></span>
                </div>
                <button type="submit" class="btn-sm primary" style="width:100%;justify-content:center;padding:12px;margin-top:8px;" id="nrSubmitBtn">
                    <i class="fa-solid fa-paper-plane"></i> Submit Request
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ======================== CONFIRM DIALOG ======================== -->
<div class="confirm-overlay" id="confirmOverlay">
    <div class="confirm-box">
        <div class="confirm-icon" id="confirmIcon"><i class="fa-solid fa-triangle-exclamation"></i></div>
        <h3 id="confirmTitle">Are you sure?</h3>
        <p id="confirmMessage">This action cannot be undone.</p>
        <div class="confirm-actions">
            <button class="btn-sm ghost" id="confirmCancel">Cancel</button>
            <button class="btn-sm danger" id="confirmOk">Confirm</button>
        </div>
    </div>
</div>

<!-- ======================== LIGHTBOX ======================== -->
<div class="lightbox" id="lightbox"><img src="" alt="Full view"></div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE
   ================================================================ */
var customRequests = [];
var filteredRequests = [];
var confirmCallback = null;
var pendingUploads = []; // {file, dataUrl}

/* ================================================================
   UTILITIES
   ================================================================ */
function fmt(n){ return 'R ' + Number(n).toFixed(2); }
function esc(s){ var d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

function statusBadge(s){
    var map = {
        pending:'pending', processing:'processing', completed:'completed',
        cancelled:'cancelled', reviewing:'reviewing', quoted:'quoted',
        'in-progress':'in-progress', submitted:'submitted'
    };
    var labels = {
        pending:'Pending', processing:'Processing', completed:'Completed',
        cancelled:'Cancelled', reviewing:'Reviewing', quoted:'Quoted',
        'in-progress':'In Progress', submitted:'Submitted'
    };
    var cls = map[s] || 'pending';
    return '<span class="status-badge '+cls+'"><span class="sbadge-dot"></span>'+esc(labels[s]||s)+'</span>';
}

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

function emptyHTML(icon, title, desc, action){
    return '<div class="empty-state"><i class="fa-solid '+icon+'"></i><h3>'+title+'</h3><p>'+desc+'</p>'+(action||'')+'</div>';
}

function formatDate(dateStr){
    if(!dateStr) return '—';
    var d = new Date(dateStr);
    if(isNaN(d.getTime())) return esc(dateStr);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear();
}

function formatDateTime(dateStr){
    if(!dateStr) return '—';
    var d = new Date(dateStr);
    if(isNaN(d.getTime())) return esc(dateStr);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var h = d.getHours(); var m = d.getMinutes();
    var ampm = h >= 12 ? 'PM' : 'AM';
    h = h % 12 || 12;
    return d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+', '+h+':'+(m<10?'0':'')+m+' '+ampm;
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
function showConfirm(title, message, type, callback, okLabel){
    type = type || 'warn';
    confirmCallback = callback;
    document.getElementById('confirmTitle').textContent = title;
    document.getElementById('confirmMessage').textContent = message;
    var iconEl = document.getElementById('confirmIcon');
    iconEl.className = 'confirm-icon ' + type;
    var icons = {warn:'fa-triangle-exclamation', danger:'fa-trash-can', success:'fa-circle-check'};
    iconEl.innerHTML = '<i class="fa-solid '+(icons[type]||icons.warn)+'"></i>';
    var okBtn = document.getElementById('confirmOk');
    okBtn.className = 'btn-sm ' + (type==='danger'?'danger':type==='success'?'success':'primary');
    okBtn.textContent = okLabel || (type==='danger'?'Delete':'Confirm');
    document.getElementById('confirmOverlay').classList.add('visible');
    document.body.style.overflow = 'hidden';
}
function closeConfirm(){
    document.getElementById('confirmOverlay').classList.remove('visible');
    if(!document.querySelector('.modal-overlay.visible')){
        document.body.style.overflow = '';
    }
    confirmCallback = null;
}
document.getElementById('confirmCancel').addEventListener('click', closeConfirm);
document.getElementById('confirmOk').addEventListener('click', function(){
    if(typeof confirmCallback === 'function') confirmCallback();
    closeConfirm();
});
document.getElementById('confirmOverlay').addEventListener('click', function(e){
    if(e.target === this) closeConfirm();
});

/* ================================================================
   MODALS — open/close
   ================================================================ */
function closeModals(){
    document.querySelectorAll('.modal-overlay').forEach(function(m){ m.classList.remove('visible'); });
    document.body.style.overflow = '';
}

document.getElementById('requestDetailClose').addEventListener('click', closeModals);
document.getElementById('requestDetailModal').addEventListener('click', function(e){ if(e.target === this) closeModals(); });
document.getElementById('newRequestClose').addEventListener('click', closeModals);
document.getElementById('newRequestModal').addEventListener('click', function(e){ if(e.target === this) closeModals(); });

/* New request button */
document.getElementById('newRequestBtn').addEventListener('click', function(){
    resetNewRequestForm();
    document.getElementById('newRequestModal').classList.add('visible');
    document.body.style.overflow = 'hidden';
});

/* ================================================================
   LIGHTBOX
   ================================================================ */
document.getElementById('lightbox').addEventListener('click', function(){ this.classList.remove('visible'); });
function openLightbox(src){
    document.getElementById('lightbox').querySelector('img').src = src;
    document.getElementById('lightbox').classList.add('visible');
}

/* ================================================================
   CUSTOM REQUESTS — API
   ================================================================ */

/*
   Expected response from GET /api/user/custom_requests.php:

   {
     requests: [
       {
         id: 1,
         date: "2025-01-10",
         product_name: "Custom Fedora",
         product_image: "/assets/img/...",
         description: "I'd like a custom fedora with...",
         budget: 1500.00,
         quoted_price: 1800.00,
         status: "quoted",
         size: "M",
         color: "Navy",
         reference_images: ["/assets/uploads/ref1.jpg", ...],
         admin_notes: "Based on your description...",
         timeline: [
           { status: "submitted", date: "2025-01-10 09:00", label: "Request Submitted" },
           { status: "reviewing", date: "2025-01-10 14:00", label: "Under Review" },
           { status: "quoted", date: "2025-01-12 10:00", label: "Quote Provided" },
           { status: "in-progress", date: null, label: "In Production" },
           { status: "completed", date: null, label: "Completed" }
         ],
         can_cancel: true,
         can_accept_quote: true
       }
     ]
   }
*/

function loadRequests(){
    var loading = document.getElementById('requestsLoading');
    var content = document.getElementById('requestsContent');
    loading.style.display = '';
    content.style.display = 'none';

    fetch('/api/user/custom_requests.php')
      .then(function(r){ return r.json(); })
      .then(function(data){
          customRequests = data.requests || [];
          filteredRequests = customRequests.slice();
          loading.style.display = 'none';
          content.style.display = '';
          document.getElementById('requestsToolbar').style.display = '';
          renderRequests();
      })
      .catch(function(err){
          console.error('Requests load error:', err);
          loading.style.display = 'none';
          content.innerHTML = emptyHTML('fa-wand-magic-sparkles', 'Unable to load requests', 'Please try refreshing the page.', '<button class="btn-sm ghost" onclick="loadRequests()" style="display:inline-flex;"><i class="fa-solid fa-rotate-right"></i> Retry</button>');
      });
}

function renderRequests(){
    var countEl = document.getElementById('requestsCount');
    countEl.innerHTML = 'Showing <strong>'+filteredRequests.length+'</strong> of <strong>'+customRequests.length+'</strong> request'+(customRequests.length!==1?'s':'');

    if(!filteredRequests.length && customRequests.length){
        document.getElementById('requestsContent').innerHTML = emptyHTML('fa-magnifying-glass', 'No matching requests', 'Try adjusting your search or filter.');
        return;
    }

    if(!customRequests.length){
        document.getElementById('requestsContent').innerHTML = emptyHTML('fa-wand-magic-sparkles', 'No custom requests yet', 'Describe your dream hat and we\'ll make it happen.', '<button class="btn-sm primary" onclick="document.getElementById(\'newRequestBtn\').click()" style="display:inline-flex;"><i class="fa-solid fa-plus"></i> Submit Your First Request</button>');
        return;
    }

    var rows = filteredRequests.map(function(r){
        var imgHtml = r.product_image
            ? '<img class="dtable-thumb" src="'+esc(r.product_image)+'" alt="" onerror="this.style.display=\'none\'">'
            : '<div class="dtable-thumb" style="display:flex;align-items:center;justify-content:center;"><i class="fa-solid fa-hat-wizard" style="color:var(--fg-muted);font-size:.8rem;"></i></div>';

        var desc = (r.description||'').substring(0,70) + (r.description && r.description.length > 70 ? '...' : '');
        var refCount = (r.reference_images && r.reference_images.length) ? '<span style="font-size:.72rem;color:var(--fg-muted);margin-left:6px;"><i class="fa-solid fa-images" style="font-size:.6rem;"></i> '+r.reference_images.length+'</span>' : '';

        var quoteIndicator = '';
        if(r.status === 'quoted' && r.quoted_price){
            quoteIndicator = '<div style="font-size:.72rem;color:#D4923A;font-weight:600;margin-top:2px;"><i class="fa-solid fa-tag" style="font-size:.6rem;"></i> Quoted: '+fmt(r.quoted_price)+'</div>';
        }

        return '<tr>'+
            '<td style="font-weight:600;white-space:nowrap;">#'+esc(r.id)+'</td>'+
            '<td><div class="dtable-product">'+imgHtml+'<div><div class="dtable-product-name">'+esc(r.product_name||'Custom Hat')+'</div><div class="dtable-product-cat">'+esc(desc)+refCount+'</div>'+quoteIndicator+'</div></div></td>'+
            '<td class="hide-mobile" style="white-space:nowrap;">'+(r.budget ? fmt(r.budget) : '<span style="color:var(--fg-muted);">—</span>')+'</td>'+
            '<td>'+statusBadge(r.status)+'</td>'+
            '<td style="white-space:nowrap;">'+
                '<button class="btn-sm ghost" data-view-request="'+r.id+'" style="padding:6px 14px;font-size:.78rem;" title="View details"><i class="fa-solid fa-eye"></i> <span class="hide-mobile">View</span></button>'+
                (r.can_accept_quote ? '<button class="btn-sm success" data-accept-quote="'+r.id+'" style="padding:6px 14px;font-size:.78rem;margin-left:4px;" title="Accept quote"><i class="fa-solid fa-check"></i></button>' : '')+
                (r.can_cancel ? '<button class="btn-sm danger" data-cancel-request="'+r.id+'" style="padding:6px 14px;font-size:.78rem;margin-left:4px;" title="Cancel request"><i class="fa-solid fa-xmark"></i></button>' : '')+
            '</td>'+
        '</tr>';
    }).join('');

    document.getElementById('requestsContent').innerHTML =
        '<div class="panel">'+
            '<div class="panel-header"><h2>'+filteredRequests.length+' Request'+(filteredRequests.length!==1?'s':'')+'</h2></div>'+
            '<div class="panel-body">'+
                '<table class="dtable">'+
                    '<thead><tr><th>ID</th><th>Request</th><th class="hide-mobile">Budget</th><th>Status</th><th>Actions</th></tr></thead>'+
                    '<tbody>'+rows+'</tbody>'+
                '</table>'+
            '</div>'+
        '</div>';

    // Bind buttons
    document.querySelectorAll('[data-view-request]').forEach(function(b){
        b.addEventListener('click', function(){ openRequestDetail(b.dataset.viewRequest); });
    });
    document.querySelectorAll('[data-accept-quote]').forEach(function(b){
        b.addEventListener('click', function(){ acceptQuote(b.dataset.acceptQuote); });
    });
    document.querySelectorAll('[data-cancel-request]').forEach(function(b){
        b.addEventListener('click', function(){ cancelRequest(b.dataset.cancelRequest); });
    });
}

/* ── Request Detail Modal ────────────────────────────────── */
function openRequestDetail(id){
    var r = customRequests.find(function(x){ return x.id == id; });
    if(!r) return;

    document.getElementById('requestDetailTitle').textContent = 'Request #'+esc(r.id);

    // Reference images
    var refHtml = '';
    if(r.reference_images && r.reference_images.length){
        refHtml = '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:20px 0 10px;">Reference Images ('+r.reference_images.length+')</h4>'+
            '<div class="ref-images-grid" id="refImagesGrid">'+r.reference_images.map(function(img, i){
                return '<div class="ref-img" data-lightbox="'+esc(img)+'"><img src="'+esc(img)+'" alt="Reference '+(i+1)+'" onerror="this.parentElement.style.display=\'none\'"></div>';
            }).join('')+'</div>';
    }

    // Quote box (when status is quoted)
    var quoteHtml = '';
    if(r.status === 'quoted' && r.quoted_price){
        quoteHtml = '<div class="quote-box" id="modalQuoteBox">'+
            '<div class="quote-box-left">'+
                '<span class="quote-box-label">Quoted Price</span>'+
                '<span class="quote-box-price">'+fmt(r.quoted_price)+'</span>'+
                (r.budget ? '<span style="font-size:.78rem;color:var(--fg-muted);">Your budget: '+fmt(r.budget)+'</span>' : '')+
            '</div>'+
            '<div class="quote-box-actions">'+
                (r.can_accept_quote ? '<button class="btn-sm success" data-accept-quote="'+r.id+'"><i class="fa-solid fa-check"></i> Accept Quote</button>' : '')+
                (r.can_cancel ? '<button class="btn-sm danger" data-cancel-request="'+r.id+'"><i class="fa-solid fa-xmark"></i> Decline</button>' : '')+
            '</div>'+
        '</div>';
    }

    // Admin notes
    var adminNotesHtml = '';
    if(r.admin_notes){
        adminNotesHtml = '<div class="admin-notes">'+
            '<div class="admin-notes-header"><i class="fa-solid fa-comment-dots"></i> Message from Hattie\'s</div>'+
            '<div class="admin-notes-body">'+esc(r.admin_notes)+'</div>'+
        '</div>';
    }

    // Timeline
    var timelineHtml = '';
    if(r.timeline && r.timeline.length){
        var statusFlow = ['submitted','reviewing','quoted','in-progress','completed'];
        var currentIdx = statusFlow.indexOf(r.status);
        if(currentIdx === -1) currentIdx = 0;
        var allCancelled = r.status === 'cancelled';

        timelineHtml = '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:24px 0 12px;">Progress</h4><div class="order-timeline">';
        r.timeline.forEach(function(step, i){
            var stepIdx = statusFlow.indexOf(step.status);
            var isDone = false, isActive = false, isCancelled = false;

            if(allCancelled){
                if(i < r.timeline.length - 1){ isDone = true; }
                else { isCancelled = true; }
            } else {
                isDone = stepIdx < currentIdx || (stepIdx === currentIdx && step.date);
                isActive = stepIdx === currentIdx && !step.date;
            }

            // Show quote price in timeline if available
            var extraInfo = '';
            if(step.status === 'quoted' && r.quoted_price){
                extraInfo = ' — <span style="color:var(--red);font-weight:600;">'+fmt(r.quoted_price)+'</span>';
            }

            timelineHtml +=
                '<div class="timeline-step">'+
                    '<div class="timeline-dot '+(isDone?'done':'')+(isActive?' active':'')+(isCancelled?' cancelled':'')+'">'+
                        '<i class="fa-solid '+(isDone||isActive ? 'fa-check' : isCancelled ? 'fa-xmark' : 'fa-circle')+'" style="font-size:'+(isDone||isActive||isCancelled?'.65rem':'.3rem')+'"></i>'+
                    '</div>'+
                    '<div class="timeline-content">'+
                        '<div class="timeline-title" style="'+((isDone||isActive)?'':'color:var(--fg-muted)')+'">'+esc(step.label)+extraInfo+'</div>'+
                        '<div class="timeline-date">'+(step.date ? formatDateTime(step.date) : (isActive ? 'In progress...' : (isCancelled ? 'Request cancelled' : 'Pending')))+'</div>'+
                    '</div>'+
                '</div>';
        });
        timelineHtml += '</div>';
    }

    // Action buttons at bottom
    var actionsHtml = '';
    if((r.can_cancel || r.can_accept_quote) && r.status !== 'cancelled' && r.status !== 'completed'){
        actionsHtml = '<div style="margin-top:24px;padding-top:20px;border-top:1px solid var(--border-light);display:flex;justify-content:flex-end;gap:10px;flex-wrap:wrap;">';
        if(r.can_accept_quote){
            actionsHtml += '<button class="btn-sm success" data-accept-quote="'+r.id+'"><i class="fa-solid fa-check"></i> Accept Quote</button>';
        }
        if(r.can_cancel){
            actionsHtml += '<button class="btn-sm danger" data-cancel-request="'+r.id+'"><i class="fa-solid fa-xmark"></i> Cancel Request</button>';
        }
        actionsHtml += '</div>';
    }

    // Size and color details
    var detailsHtml = '';
    if(r.size || r.color){
        detailsHtml = '<div class="detail-row"><span class="detail-label">Size</span><span class="detail-value">'+esc(r.size||'Not specified')+'</span></div>';
        detailsHtml += '<div class="detail-row"><span class="detail-label">Colour</span><span class="detail-value">'+esc(r.color||'Not specified')+'</span></div>';
    }

    document.getElementById('requestDetailBody').innerHTML =
        '<div class="detail-row"><span class="detail-label">Date</span><span class="detail-value">'+formatDate(r.date)+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Product</span><span class="detail-value" style="font-weight:600;">'+esc(r.product_name||'Custom Hat')+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Status</span><span class="detail-value">'+statusBadge(r.status)+'</span></div>'+
        '<div class="detail-row"><span class="detail-label">Budget</span><span class="detail-value">'+(r.budget ? fmt(r.budget) : 'Flexible')+'</span></div>'+
        detailsHtml+
        quoteHtml+
        adminNotesHtml+
        '<h4 style="font-size:.85rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.06em;margin:20px 0 8px;">Description</h4>'+
        '<p style="font-size:.9rem;color:var(--fg-secondary);line-height:1.7;padding-bottom:4px;">'+esc(r.description||'No description provided.')+'</p>'+
        refHtml+
        timelineHtml+
        actionsHtml;

    // Bind modal buttons
    document.querySelectorAll('#requestDetailBody [data-accept-quote]').forEach(function(b){
        b.addEventListener('click', function(){ closeModals(); acceptQuote(b.dataset.acceptQuote); });
    });
    document.querySelectorAll('#requestDetailBody [data-cancel-request]').forEach(function(b){
        b.addEventListener('click', function(){ closeModals(); cancelRequest(b.dataset.cancelRequest); });
    });

    // Bind lightbox
    document.querySelectorAll('#refImagesGrid .ref-img[data-lightbox]').forEach(function(img){
        img.addEventListener('click', function(){ openLightbox(img.dataset.lightbox); });
    });

    document.getElementById('requestDetailModal').classList.add('visible');
    document.body.style.overflow = 'hidden';
}

/* ── Accept Quote ────────────────────────────────────────── */
function acceptQuote(id){
    var r = customRequests.find(function(x){ return x.id == id; });
    if(!r) return;

    var priceText = r.quoted_price ? ' at '+fmt(r.quoted_price) : '';

    showConfirm(
        'Accept Quote?',
        'You are accepting the quote for "'+esc(r.product_name||'Custom Hat')+'"'+priceText+'. We will begin production once confirmed.',
        'success',
        function(){
            showToast('Accepting quote...', 'info');

            fetch('/api/handlers/custom_request_handler.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({action: 'accept_quote', request_id: id})
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if(data.success){
                    showToast('Quote accepted! Production will begin shortly.', 'success');
                    // Optimistic update
                    r.status = 'in-progress';
                    r.can_accept_quote = false;
                    r.can_cancel = false;
                    if(r.timeline){
                        var quotedStep = r.timeline.find(function(s){ return s.status === 'in-progress'; });
                        if(quotedStep) quotedStep.date = new Date().toISOString();
                    }
                    applyFilters();
                    renderRequests();
                } else {
                    showToast(data.message || 'Unable to accept quote', 'error');
                }
            })
            .catch(function(){
                showToast('Network error — please try again', 'error');
            });
        },
        'Accept Quote'
    );
}

/* ── Cancel Request ──────────────────────────────────────── */
function cancelRequest(id){
    var r = customRequests.find(function(x){ return x.id == id; });
    if(!r) return;

    var isQuoted = r.status === 'quoted';

    showConfirm(
        'Cancel Request #'+r.id+'?',
        isQuoted
            ? 'This will decline the quote and cancel your request for "'+esc(r.product_name||'Custom Hat')+'". You can always submit a new request later.'
            : 'Are you sure you want to cancel your request for "'+esc(r.product_name||'Custom Hat')+'"? This action cannot be undone.',
        'danger',
        function(){
            showToast('Cancelling request...', 'info');

            fetch('/api/handlers/custom_request_handler.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({action: 'cancel', request_id: id})
            })
            .then(function(r){ return r.json(); })
            .then(function(data){
                if(data.success){
                    showToast('Request cancelled', 'info');
                    // Optimistic update
                    r.status = 'cancelled';
                    r.can_cancel = false;
                    r.can_accept_quote = false;
                    if(r.timeline && r.timeline.length){
                        var lastStep = r.timeline[r.timeline.length - 1];
                        if(!lastStep.date){
                            lastStep.date = new Date().toISOString();
                        } else {
                            r.timeline.push({status:'cancelled', date: new Date().toISOString(), label:'Request Cancelled'});
                        }
                    }
                    applyFilters();
                    renderRequests();
                } else {
                    showToast(data.message || 'Unable to cancel request', 'error');
                }
            })
            .catch(function(){
                showToast('Network error — please try again', 'error');
            });
        },
        isQuoted ? 'Decline & Cancel' : 'Cancel Request'
    );
}

/* ── Search & Filter ─────────────────────────────────────── */
function applyFilters(){
    var query = (document.getElementById('requestSearchInput').value || '').toLowerCase().trim();
    var statusFilter = document.getElementById('requestStatusFilter').value;

    filteredRequests = customRequests.filter(function(r){
        var searchStr = (r.product_name||'') + ' #' + r.id + ' ' + (r.description||'');
        var matchSearch = !query || searchStr.toLowerCase().indexOf(query) !== -1;
        var matchStatus = !statusFilter || r.status === statusFilter;
        return matchSearch && matchStatus;
    });
}

document.getElementById('requestSearchInput').addEventListener('input', function(){
    applyFilters(); renderRequests();
});
document.getElementById('requestStatusFilter').addEventListener('change', function(){
    applyFilters(); renderRequests();
});

/* ================================================================
   NEW REQUEST FORM
   ================================================================ */
var uploadArea = document.getElementById('uploadArea');
var nrFilesInput = document.getElementById('nrFiles');
var maxFiles = 5;
var maxFileSize = 5 * 1024 * 1024; // 5MB

// Click to upload
uploadArea.addEventListener('click', function(){ nrFilesInput.click(); });

// Drag and drop
uploadArea.addEventListener('dragover', function(e){ e.preventDefault(); uploadArea.classList.add('drag-over'); });
uploadArea.addEventListener('dragleave', function(){ uploadArea.classList.remove('drag-over'); });
uploadArea.addEventListener('drop', function(e){
    e.preventDefault();
    uploadArea.classList.remove('drag-over');
    handleFiles(e.dataTransfer.files);
});

nrFilesInput.addEventListener('change', function(){
    handleFiles(nrFilesInput.files);
    nrFilesInput.value = ''; // Reset so same file can be re-selected
});

function handleFiles(fileList){
    var files = Array.prototype.slice.call(fileList);
    var remaining = maxFiles - pendingUploads.length;
    if(remaining <= 0){
        showToast('Maximum '+maxFiles+' images allowed','error');
        return;
    }
    files = files.slice(0, remaining);

    var errors = [];
    files.forEach(function(file){
        if(!file.type.match(/^image\/(jpeg|jpg|png|gif|webp)$/)){
            errors.push(file.name+' is not a supported image format');
            return;
        }
        if(file.size > maxFileSize){
            errors.push(file.name+' exceeds 5MB limit');
            return;
        }
        // Read as data URL for preview
        var reader = new FileReader();
        reader.onload = function(e){
            pendingUploads.push({file: file, dataUrl: e.target.result});
            renderUploadPreviews();
        };
        reader.readAsDataURL(file);
    });

    if(errors.length){
        showToast(errors.join('. '),'error');
    }
}

function renderUploadPreviews(){
    var grid = document.getElementById('uploadPreviewGrid');
    if(!pendingUploads.length){ grid.innerHTML = ''; return; }

    grid.innerHTML = pendingUploads.map(function(item, i){
        return '<div class="upload-preview-item">'+
            '<img src="'+item.dataUrl+'" alt="Preview '+(i+1)+'">'+
            '<div class="upload-preview-remove" data-remove-upload="'+i+'"><i class="fa-solid fa-xmark"></i></div>'+
        '</div>';
    }).join('');

    // Update upload area hint
    var hint = document.querySelector('.upload-area-hint');
    if(hint){
        hint.textContent = pendingUploads.length+'/'+maxFiles+' image'+(pendingUploads.length!==1?'s':'')+' selected';
    }

    document.querySelectorAll('[data-remove-upload]').forEach(function(btn){
        btn.addEventListener('click', function(e){
            e.stopPropagation();
            pendingUploads.splice(parseInt(btn.dataset.removeUpload), 1);
            renderUploadPreviews();
        });
    });
}

function resetNewRequestForm(){
    pendingUploads = [];
    document.getElementById('newRequestForm').reset();
    document.getElementById('uploadPreviewGrid').innerHTML = '';
    ['nrProductName','nrBudget','nrDescription','nrFiles'].forEach(function(id){
        var err = document.getElementById(id+'Error');
        if(err) err.textContent = '';
        var inp = document.getElementById(id);
        if(inp) inp.classList.remove('invalid');
    });
    var hint = document.querySelector('.upload-area-hint');
    if(hint) hint.textContent = 'Up to 5 images, JPG or PNG, max 5MB each';
}

document.getElementById('newRequestForm').addEventListener('submit', function(e){
    e.preventDefault();

    // Clear errors
    ['nrProductName','nrBudget','nrDescription','nrFiles'].forEach(function(id){
        var err = document.getElementById(id+'Error');
        if(err) err.textContent = '';
        var inp = document.getElementById(id);
        if(inp) inp.classList.remove('invalid');
    });

    var valid = true;
    var productName = document.getElementById('nrProductName').value.trim();
    var budget = document.getElementById('nrBudget').value;
    var size = document.getElementById('nrSize').value;
    var color = document.getElementById('nrColor').value.trim();
    var description = document.getElementById('nrDescription').value.trim();

    if(!productName){
        setFormError('nrProductName', 'Please enter a hat name or style');
        valid = false;
    }
    if(budget && (isNaN(budget) || Number(budget) < 0)){
        setFormError('nrBudget', 'Enter a valid amount');
        valid = false;
    }
    if(!description){
        setFormError('nrDescription', 'Please describe your custom hat');
        valid = false;
    } else if(description.length < 20){
        setFormError('nrDescription', 'Please provide at least 20 characters of detail');
        valid = false;
    }
    if(!valid) return;

    // Disable submit
    var submitBtn = document.getElementById('nrSubmitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Submitting...';

    // Build FormData for file upload
    var fd = new FormData();
    fd.append('action', 'submit');
    fd.append('product_name', productName);
    fd.append('description', description);
    if(budget) fd.append('budget', budget);
    if(size) fd.append('size', size);
    if(color) fd.append('color', color);
    pendingUploads.forEach(function(item, i){
        fd.append('reference_images[]', item.file);
    });

    fetch('/api/handlers/custom_request_handler.php', {
        method: 'POST',
        body: fd
    })
    .then(function(r){ return r.json(); })
    .then(function(data){
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Submit Request';

        if(data.success){
            showToast('Custom request submitted successfully!', 'success');
            closeModals();
            loadRequests(); // Reload list
        } else {
            showToast(data.message || 'Unable to submit request', 'error');
            if(data.errors){
                Object.keys(data.errors).forEach(function(field){
                    var fieldMap = {product_name:'nrProductName',description:'nrDescription',budget:'nrBudget',reference_images:'nrFiles'};
                    var formField = fieldMap[field];
                    if(formField) setFormError(formField, data.errors[field]);
                });
            }
        }
    })
    .catch(function(err){
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Submit Request';
        showToast('Network error — please try again', 'error');
    });
});

function setFormError(id, msg){
    var err = document.getElementById(id+'Error');
    if(err) err.textContent = msg;
    var inp = document.getElementById(id);
    if(inp) inp.classList.add('invalid');
}

/* ================================================================
   LOAD USER INFO FOR TOPBAR
   ================================================================ */
function loadUserInfo(){
    fetch('/api/user/profile.php')
      .then(function(r){ return r.json(); })
      .then(function(data){
          if(data.first_name && data.last_name){
              var initials = data.first_name.charAt(0) + data.last_name.charAt(0);
              document.getElementById('topAvatar').textContent = initials;
              document.getElementById('topName').textContent = data.first_name + ' ' + data.last_name;
          }
      })
      .catch(function(){ /* silent */ });
}

/* ================================================================
   INIT
   ================================================================ */
loadUserInfo();
loadRequests();

/* ================================================================
   KEYBOARD
   ================================================================ */
document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        closeModals();
        closeConfirm();
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('visible');
        // Close lightbox too
        document.getElementById('lightbox').classList.remove('visible');
    }
});
</script>
</body>
</html>