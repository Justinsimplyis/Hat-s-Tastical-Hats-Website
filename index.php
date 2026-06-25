<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="/assets/css/public.css">
    <title>Hattie's Hats'istical Hats | Home </title>    
    <style>
        /* Hattie's Hat'istical Hats — Modernized Public Storefront */
:root {
    --red:#B8302E;--red-hover:#D43C3A;
    --red-light:rgba(184,48,46,.08);
    --red-muted:rgba(184,48,46,.05);
    --pink:#D4A5A5;
    --pink-light:rgba(212,165,165,.15);
    --pink-muted:rgba(212,165,165,.08);
    --bg:#FBF7F6;
    --bg-elevated:#FFFFFF;
    --card:#FFFFFF;
    --topbar-bg:rgba(251,247,246,.75);
    --cream:#FFF2EF;
    --cream-dark:#FFE6E0;
    --cream-deeper:#FFD8D0;
    --fg:#1C1517;
    --fg-secondary:#5C4A4D;
    --fg-muted:#8B7A7D;
    --border:#EBD9D5;
    --border-light:#F5EBE8;

    --shadow-sm:0 2px 8px rgba(28,21,23,.04);
    --shadow-md:0 6px 16px rgba(28,21,23,.06);
    --shadow-lg:0 16px 40px rgba(28,21,23,.10);
    --shadow-xl:0 32px 64px rgba(28,21,23,.15);
    --radius-sm:8px;
    --radius-md:14px;
    --radius-lg:20px;
    --radius-xl:28px;
    --radius-full:9999px;
    --ease:cubic-bezier(.4,0,.2,1);
    --duration:.25s;
    --nav-height:80px;
    --container:1240px;
    --font-head: 'Playfair Display', serif;
    --font-body: 'Inter', system-ui, sans-serif;
}
*,*::before,*::after{
    margin:0;padding:0;
    box-sizing:border-box
}
html{
    font-size:16px;
    -webkit-font-smoothing:antialiased;
    scroll-behavior:smooth
}
body{
    font-family:var(--font-body);
    background:var(--bg);
    color:var(--fg);
    line-height:1.65;
    overflow-x:hidden
}
h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-head);
}
a{color:inherit;text-decoration:none}
button{font:inherit;border:none;background:none;cursor:pointer;color:inherit}
img{max-width:100%;display:block}
input,textarea,select{font:inherit;border:none;outline:none;background:none}
ul{list-style:none}
::-webkit-scrollbar{width:8px}
::-webkit-scrollbar-track{background:transparent}
::-webkit-scrollbar-thumb{background:var(--cream-deeper);border-radius:8px}
::-webkit-scrollbar-thumb:hover{background:var(--pink)}

/* NAV */
nav{position:fixed;top:0;left:0;right:0;height:var(--nav-height);background:var(--topbar-bg);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-bottom:1px solid transparent;z-index:1000;display:flex;align-items:center;padding:0 40px;transition:all .3s var(--ease)}
.nav.scrolled{box-shadow:var(--shadow-sm);border-bottom-color:var(--border-light);background:rgba(251,247,246,.95)}
.nav-inner{display:flex;align-items:center;justify-content:space-between;width:100%;max-width:var(--container);margin:0 auto;gap:12px;}
.nav-logo{display:flex;align-items:center;gap:12px;flex-shrink:0}
.nav-logo-img{height:44px;width:auto;object-fit:contain;transition:transform .3s var(--ease)}
.nav-logo:hover .nav-logo-img{transform:scale(1.03)}
.nav-logo-text{display:flex;flex-direction:column;line-height:1.15}
.nav-logo-name{font-family:var(--font-head);font-size:1.15rem;font-weight:700;color:var(--fg);letter-spacing:-.01em}
.nav-logo-tagline{font-size:.65rem;font-weight:600;color:var(--red);letter-spacing:.1em;text-transform:uppercase}
.nav-links{display:flex;align-items:center;gap:6px}
.nav-links a{padding:10px 18px;font-size:.88rem;font-weight:500;color:var(--fg-secondary);border-radius:var(--radius-full);transition:all var(--duration) var(--ease);position:relative}
.nav-links a:hover, .nav-links a.active{color:var(--fg);background:var(--cream)}
.nav-actions{display:flex;align-items:center;gap:8px}
.nav-action-btn{width:42px;height:42px;border-radius:var(--radius-full);display:flex;align-items:center;justify-content:center;font-size:1rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease);position:relative}
.nav-action-btn:hover{background:var(--cream);color:var(--red)}
.cart-badge{position:absolute;top:2px;right:2px;width:18px;height:18px;border-radius:50%;background:var(--red);color:#fff;font-size:.62rem;font-weight:700;display:flex;align-items:center;justify-content:center;opacity:0;transform:scale(.5);transition:all .25s var(--ease);pointer-events:none;border:2px solid var(--bg)}
.cart-badge.visible{opacity:1;transform:scale(1)}
.btn-nav-account{padding:10px 22px;border-radius:var(--radius-full);background:var(--fg);color:#fff;font-size:.84rem;font-weight:600;transition:all var(--duration) var(--ease);margin-left:8px;display:inline-flex;align-items:center;gap:8px}
.btn-nav-account:hover{background:var(--red);transform:translateY(-1px);box-shadow:0 6px 16px rgba(184,48,46,.3)}
.nav-menu-btn{display:none;width:42px;height:42px;border-radius:var(--radius-sm);align-items:center;justify-content:center;font-size:1.15rem;color:var(--fg)}

/* Mobile Menu */
.mobile-menu-overlay{position:fixed;inset:0;background:rgba(28,21,23,.5);backdrop-filter:blur(6px);z-index:999;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
.mobile-menu-overlay.visible{opacity:1;visibility:visible}
.mobile-menu{position:fixed;top:0;right:0;bottom:0;width:320px;background:var(--bg-elevated);z-index:1001;padding:28px;transform:translateX(100%);transition:transform .4s var(--ease);box-shadow:var(--shadow-xl);display:flex;flex-direction:column}
.mobile-menu.open{transform:translateX(0)}
.mobile-menu-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--border-light)}
.mobile-menu-close{width:40px;height:40px;border-radius:var(--radius-sm);display:flex;align-items:center;justify-content:center;color:var(--fg);font-size:1.1rem;background:var(--cream)}
.mobile-menu-close:hover{background:var(--cream-dark)}
.mobile-menu-links{display:flex;flex-direction:column;gap:4px;flex:1}
.mobile-menu-links a{padding:14px 18px;font-size:1.05rem;font-weight:500;color:var(--fg-secondary);border-radius:var(--radius-md);transition:all var(--duration) var(--ease)}
.mobile-menu-links a:hover{background:var(--cream);color:var(--red)}
.mobile-menu-footer{padding-top:24px;border-top:1px solid var(--border-light)}

/* Section Common */
.section-container{max-width:var(--container);margin:0 auto;padding:0 40px}
.section-header{font-size:2.5rem;font-weight:700;color:var(--fg);letter-spacing:-.02em;margin-bottom:12px;line-height:1.2}
.section-subheader{font-size:1.05rem;color:var(--fg-muted);margin-bottom:48px;max-width:600px}
.section-label{display:inline-flex;align-items:center;gap:10px;font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.15em;color:var(--red);margin-bottom:16px}
.section-label::before{content:'';width:32px;height:2px;background:var(--red);border-radius:2px}

/* Hero */
.hero{min-height:90vh;padding-top:calc(var(--nav-height) + 60px);padding-bottom:100px;display:flex;align-items:center;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;top:-20%;right:-10%;width:50%;height:80%;border-radius:50%;background:radial-gradient(circle,var(--pink-muted) 0%,transparent 70%);pointer-events:none}
.hero::after{content:'';position:absolute;bottom:-10%;left:-10%;width:40%;height:60%;border-radius:50%;background:radial-gradient(circle,var(--red-muted) 0%,transparent 70%);pointer-events:none}
.hero-inner{display:grid;grid-template-columns:1.1fr 0.9fr;gap:80px;align-items:center;position:relative;z-index:1}
.hero-content{max-width:620px}
.hero-badge{display:inline-flex;align-items:center;gap:10px;padding:8px 18px;border-radius:var(--radius-full);background:var(--cream);border:1px solid var(--border);font-size:.8rem;font-weight:600;color:var(--red);margin-bottom:28px}
.hero-badge i{font-size:.72rem}
.hero h1{font-size:4rem;font-weight:800;color:var(--fg);line-height:1.05;letter-spacing:-.03em;margin-bottom:24px}
.hero h1 span{color:var(--red);font-style:italic}
.hero-description{font-size:1.1rem;color:var(--fg-secondary);line-height:1.75;margin-bottom:40px}
.hero-actions{display:flex;gap:16px;flex-wrap:wrap}
.btn-primary{display:inline-flex;align-items:center;gap:8px;padding:16px 32px;border-radius:var(--radius-full);background:var(--fg);color:#fff;font-size:.92rem;font-weight:600;transition:all var(--duration) var(--ease)}
.btn-primary:hover{background:var(--red);transform:translateY(-2px);box-shadow:0 12px 24px rgba(184,48,46,.3)}
.btn-outline{display:inline-flex;align-items:center;gap:8px;padding:16px 32px;border-radius:var(--radius-full);background:var(--bg-elevated);color:var(--fg);font-size:.92rem;font-weight:600;border:1.5px solid var(--border);transition:all var(--duration) var(--ease)}
.btn-outline:hover{border-color:var(--fg);background:var(--fg);color:#fff}
.hero-image{position:relative}
.hero-image-main{width:100%;aspect-ratio:4/5;border-radius:var(--radius-xl);object-fit:cover;box-shadow:var(--shadow-lg);border: 8px solid var(--bg-elevated)}
.hero-float-card{position:absolute;bottom:-30px;left:-30px;background:var(--bg-elevated);border-radius:var(--radius-lg);padding:18px 24px;box-shadow:var(--shadow-lg);display:flex;align-items:center;gap:14px;animation:float 3s ease-in-out infinite}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
.hero-float-icon{width:48px;height:48px;border-radius:var(--radius-md);background:var(--cream);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.hero-float-text strong{display:block;font-size:.95rem;font-weight:700;color:var(--fg);font-family:var(--font-head)}
.hero-float-text span{font-size:.78rem;color:var(--fg-muted)}

/* Deals */
.deals-section{padding:80px 0;background:var(--bg-elevated);border-top:1px solid var(--border-light);border-bottom:1px solid var(--border-light)}
.deals-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:28px}
.deal-card{padding:32px 28px;border-radius:var(--radius-lg);background:var(--bg);border:1px solid var(--border-light);text-align:left;transition:all .3s var(--ease)}
.deal-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-md);border-color:var(--border)}
.deal-card-icon{width:56px;height:56px;border-radius:var(--radius-md);display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin:0 0 20px 0}
.deal-card:nth-child(1) .deal-card-icon{background:var(--red-light);color:var(--red)}
.deal-card:nth-child(2) .deal-card-icon{background:var(--pink-light);color:var(--pink)}
.deal-card:nth-child(3) .deal-card-icon{background:var(--cream);color:#D4923A}
.deal-card:nth-child(4) .deal-card-icon{background:rgba(107,203,139,.12);color:#4EA66A}
.deal-card h4{font-size:1.15rem;font-weight:600;color:var(--fg);margin-bottom:10px}
.deal-card p{font-size:.88rem;color:var(--fg-muted);line-height:1.6}

/* About */
.about-section{padding:120px 0}
.about-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:80px;align-items:center}
.about-image-wrapper{position:relative}
.about-image-main{width:100%;aspect-ratio:3/4;border-radius:var(--radius-xl);object-fit:cover;box-shadow:var(--shadow-md)}
.about-image-accent{position:absolute;top:-24px;right:-24px;width:140px;height:140px;border-radius:var(--radius-lg);border:6px solid var(--bg);box-shadow:var(--shadow-md);object-fit:cover}
.about-cards{display:flex;flex-direction:column;gap:24px;margin-top: 32px;}
.about-card{padding:28px;border-radius:var(--radius-lg);border:1px solid var(--border-light);background:var(--bg-elevated);transition:all .3s var(--ease)}
.about-card:hover{box-shadow:var(--shadow-sm);border-color:var(--border);transform: translateY(-2px);}
.about-card-header{display:flex;align-items:center;gap:14px;margin-bottom:12px}
.about-card-number{width:36px;height:36px;border-radius:var(--radius-sm);background:var(--red);color:#fff;font-size:.9rem;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.about-card h4{font-size:1.2rem;font-weight:600;color:var(--fg)}
.about-card p{font-size:.95rem;color:var(--fg-secondary);line-height:1.7;padding-left:50px}

/* Catalog */
.catalog-section{padding:120px 0;background:var(--bg-elevated);border-top:1px solid var(--border-light);border-bottom:1px solid var(--border-light)}
.catalog-header{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:48px;flex-wrap:wrap;gap:20px}
.catalog-filters{display:flex;gap:10px;flex-wrap:wrap}
.filter-chip{padding:10px 20px;border-radius:var(--radius-full);font-size:.85rem;font-weight:500;color:var(--fg-secondary);border:1px solid var(--border);background:var(--bg);transition:all var(--duration) var(--ease)}
.filter-chip:hover{border-color:var(--fg);color:var(--fg)}
.filter-chip.active{background:var(--fg);color:#fff;border-color:var(--fg)}
.products-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:28px}
.product-card{border-radius:var(--radius-lg);border:1px solid var(--border-light);background:var(--bg-elevated);overflow:hidden;transition:all .35s var(--ease);display:flex;flex-direction:column}
.product-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-lg);border-color:transparent}
.product-card-image{position:relative;aspect-ratio:4/5;overflow:hidden;background:var(--cream)}
.product-card-image img{width:100%;height:100%;object-fit:cover;transition:transform .6s var(--ease)}
.product-card:hover .product-card-image img{transform:scale(1.06)}
.product-card-badge{position:absolute;top:16px;left:16px;padding:6px 14px;border-radius:var(--radius-full);font-size:.7rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em}
.product-card-badge.sale{background:var(--red);color:#fff}
.product-card-badge.new{background:var(--fg);color:#fff}
.product-card-badge.featured{background:#D4923A;color:#fff}
.product-card-img-count{position:absolute;bottom:12px;right:12px;width:32px;height:32px;border-radius:50%;background:rgba(0,0,0,.55);color:#fff;font-size:.7rem;font-weight:600;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(4px)}
.product-card-body{padding:24px;display:flex;flex-direction:column;flex:1}
.product-card-category{font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.08em;color:var(--pink);margin-bottom:8px}
.product-card-name{font-size:1.15rem;font-weight:600;color:var(--fg);margin-bottom:8px;line-height:1.3}
.product-card-price{font-size:1.2rem;font-weight:700;color:var(--fg);margin-bottom:20px;font-family: var(--font-head)}
.product-card-price .old-price{font-size:.9rem;font-weight:500;color:var(--fg-muted);text-decoration:line-through;margin-left:10px}
.product-card-actions{display:flex;flex-direction:column;gap:10px;margin-top:auto}
.btn-card-primary{width:100%;padding:12px 18px;border-radius:var(--radius-md);background:var(--fg);color:#fff;font-size:.85rem;font-weight:600;text-align:center;transition:all var(--duration) var(--ease);display:flex;align-items:center;justify-content:center;gap:8px}
.btn-card-primary:hover{background:var(--red)}
.product-card-row{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.btn-card-small{padding:10px 12px;border-radius:var(--radius-md);font-size:.8rem;font-weight:500;text-align:center;transition:all var(--duration) var(--ease);display:flex;align-items:center;justify-content:center;gap:6px}
.btn-card-small.view{background:var(--cream);color:var(--fg-secondary)}
.btn-card-small.view:hover{background:var(--cream-dark);color:var(--fg)}
.btn-card-small.custom{background:var(--pink-light);color:var(--red)}
.btn-card-small.custom:hover{background:var(--red);color:#fff}
.catalog-show-more{text-align:center;margin-top:56px}
.catalog-empty{text-align:center;padding:80px 20px;color:var(--fg-muted)}
.catalog-empty i{font-size:3rem;margin-bottom:20px;opacity:.35;display:block}
.catalog-empty h4{font-size:1.25rem;font-weight:600;color:var(--fg-secondary);margin-bottom:8px}
.catalog-loading{display:flex;align-items:center;justify-content:center;gap:12px;padding:80px 20px;color:var(--fg-muted)}
.catalog-loading .spinner{width:32px;height:32px;border:3px solid var(--border);border-top-color:var(--red);border-radius:50%;animation:spin .7s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* Product Detail Modal — Carousel */
.modal-overlay{position:fixed;inset:0;z-index:2000;background:rgba(28,21,23,.6);backdrop-filter:blur(10px);display:flex;align-items:center;justify-content:center;padding:24px;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
.modal-overlay.visible{opacity:1;visibility:visible}
.modal-box{width:100%;max-width:1000px;max-height:90vh;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-xl);box-shadow:var(--shadow-xl);overflow:hidden;transform:scale(.95) translateY(16px);transition:transform .35s var(--ease);position:relative}
.modal-overlay.visible .modal-box{transform:scale(1) translateY(0)}
.modal-close{position:absolute;top:20px;right:20px;width:42px;height:42px;border-radius:50%;background:rgba(255,255,255,.95);color:var(--fg);display:flex;align-items:center;justify-content:center;font-size:1rem;z-index:10;transition:all var(--duration) var(--ease);box-shadow:var(--shadow-sm)}
.modal-close:hover{background:var(--fg);color:#fff;transform:rotate(90deg)}
.product-detail{display:grid;grid-template-columns:1fr 1fr;overflow-y:auto;max-height:90vh}

/* Carousel */
.pd-carousel{position:relative;background:var(--cream);overflow:hidden}
.pd-carousel-main{position:relative;width:100%;aspect-ratio:4/5;overflow:hidden}
.pd-carousel-main img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0;transition:opacity .5s var(--ease)}
.pd-carousel-main img.active{opacity:1}
.pd-carousel-arrow{position:absolute;top:50%;transform:translateY(-50%);width:40px;height:40px;border-radius:50%;background:rgba(255,255,255,.9);color:var(--fg);display:flex;align-items:center;justify-content:center;font-size:.85rem;z-index:5;transition:all var(--duration) var(--ease);box-shadow:var(--shadow-sm);backdrop-filter:blur(4px)}
.pd-carousel-arrow:hover{background:#fff;color:var(--red);box-shadow:var(--shadow-md)}
.pd-carousel-arrow.prev{left:16px}
.pd-carousel-arrow.next{right:16px}
.pd-carousel-counter{position:absolute;bottom:16px;left:50%;transform:translateX(-50%);padding:6px 16px;border-radius:var(--radius-full);background:rgba(0,0,0,.5);color:#fff;font-size:.75rem;font-weight:600;z-index:5;backdrop-filter:blur(4px)}
.pd-carousel-thumbs{display:flex;gap:8px;padding:12px;overflow-x:auto;background:var(--bg-elevated);border-top:1px solid var(--border-light)}
.pd-carousel-thumbs::-webkit-scrollbar{height:4px}
.pd-carousel-thumbs::-webkit-scrollbar-thumb{background:var(--cream-deeper);border-radius:4px}
.pd-thumb{width:60px;height:60px;border-radius:var(--radius-sm);overflow:hidden;flex-shrink:0;cursor:pointer;border:2px solid transparent;transition:all var(--duration) var(--ease);opacity:.6}
.pd-thumb:hover{opacity:.9}
.pd-thumb.active{border-color:var(--red);opacity:1}
.pd-thumb img{width:100%;height:100%;object-fit:cover}

/* Product Detail Info */
.pd-info{padding:48px 40px;display:flex;flex-direction:column}
.pd-category{font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.1em;color:var(--red);margin-bottom:10px}
.pd-name{font-size:2rem;font-weight:700;color:var(--fg);line-height:1.2;letter-spacing:-.02em;margin-bottom:16px}
.pd-price{font-size:1.75rem;font-weight:600;color:var(--fg);margin-bottom:24px;font-family: var(--font-head)}
.pd-price .old-price{font-size:1.1rem;font-weight:400;color:var(--fg-muted);text-decoration:line-through;margin-left:12px}
.pd-desc{font-size:.95rem;color:var(--fg-secondary);line-height:1.75;margin-bottom:28px;flex:1}
.pd-meta{display:flex;flex-direction:column;gap:14px;margin-bottom:32px;padding:24px;background:var(--bg);border-radius:var(--radius-md);border: 1px solid var(--border-light);}
.meta-row{display:flex;justify-content:space-between;align-items:center}
.meta-label{font-size:.8rem;font-weight:600;color:var(--fg-muted);text-transform:uppercase;letter-spacing:.04em}
.meta-value{font-size:.9rem;font-weight:600;color:var(--fg)}
.status-dot{display:inline-block;width:8px;height:8px;border-radius:50%;margin-right:6px}
.status-dot.in-stock{background:#6BCB8B}.status-dot.on-sale{background:var(--red)}.status-dot.low-stock{background:#E8B84B}.status-dot.out-of-stock{background:#7A6A6D}
.pd-actions{display:flex;flex-direction:column;gap:12px}

/* Custom Request Modal */
.custom-modal .modal-box{max-width:680px;position:relative}
.custom-modal-body{padding:40px}
.custom-modal-product{display:flex;align-items:center;gap:16px;padding:20px;background:var(--bg);border-radius:var(--radius-md);margin-bottom:32px;border: 1px solid var(--border-light);}
.custom-modal-product img{width:64px;height:64px;border-radius:var(--radius-sm);object-fit:cover;flex-shrink:0}
.custom-modal-product strong{display:block;font-size:1rem;color:var(--fg);font-family:var(--font-head)}
.custom-modal-product span{font-size:.85rem;color:var(--fg-muted)}
.form-group{margin-bottom:20px}
.form-group label{display:block;font-size:.85rem;font-weight:600;color:var(--fg-secondary);margin-bottom:8px}
.form-input{width:100%;padding:14px 18px;border-radius:var(--radius-md);border:1.5px solid var(--border);background:var(--bg);font-size:.95rem;color:var(--fg);transition:all var(--duration) var(--ease)}
.form-input:focus{border-color:var(--fg);background:var(--bg-elevated);box-shadow:0 0 0 4px var(--red-muted)}
.form-input::placeholder{color:var(--fg-muted)}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
.form-error{display:block;font-size:.78rem;color:var(--red);margin-top:6px;min-height:0}
.form-input.invalid{border-color:var(--red);background:var(--red-muted)}

/* Image Upload Zone */
.upload-zone{border:2px dashed var(--border);border-radius:var(--radius-lg);padding:36px 20px;text-align:center;cursor:pointer;transition:all var(--duration) var(--ease);background:var(--bg)}
.upload-zone:hover,.upload-zone.drag-over{border-color:var(--red);background:var(--red-muted)}
.upload-zone i{font-size:2rem;color:var(--fg-muted);margin-bottom:12px;display:block}
.upload-zone p{font-size:.95rem;color:var(--fg-secondary);margin-bottom:4px;font-weight:500}
.upload-zone span{font-size:.8rem;color:var(--fg-muted)}
.upload-previews{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-top:20px}
.upload-preview{position:relative;aspect-ratio:1;border-radius:var(--radius-md);overflow:hidden;background:var(--cream)}
.upload-preview img{width:100%;height:100%;object-fit:cover}
.upload-preview-remove{position:absolute;top:6px;right:6px;width:24px;height:24px;border-radius:50%;background:rgba(0,0,0,.6);color:#fff;font-size:.65rem;display:flex;align-items:center;justify-content:center;transition:all var(--duration) var(--ease)}
.upload-preview-remove:hover{background:var(--red)}
.upload-preview-order{position:absolute;bottom:6px;left:6px;width:24px;height:24px;border-radius:50%;background:var(--red);color:#fff;font-size:.7rem;font-weight:700;display:flex;align-items:center;justify-content:center}

/* Search */
.search-overlay{position:fixed;inset:0;z-index:2000;background:rgba(28,21,23,.6);backdrop-filter:blur(12px);display:flex;align-items:flex-start;justify-content:center;padding-top:15vh;opacity:0;visibility:hidden;transition:all .3s var(--ease)}
.search-overlay.visible{opacity:1;visibility:visible}
.search-popup{width:100%;max-width:620px;background:var(--bg-elevated);border:1px solid var(--border);border-radius:var(--radius-lg);box-shadow:var(--shadow-xl);overflow:hidden;transform:translateY(-16px) scale(.98);transition:transform .3s var(--ease)}
.search-overlay.visible .search-popup{transform:translateY(0) scale(1)}
.search-popup-header{display:flex;align-items:center;gap:14px;padding:22px 26px;border-bottom:1px solid var(--border-light);color:var(--fg-muted)}
.search-popup-header i{font-size:1.1rem}
.search-popup-header input{flex:1;font-size:1.05rem;color:var(--fg)}
.search-popup-header input::placeholder{color:var(--fg-muted)}
.esc-hint{font-size:.7rem;font-weight:600;color:var(--fg-muted);background:var(--cream);padding:4px 12px;border-radius:var(--radius-sm);letter-spacing:.04em;flex-shrink:0}
.search-popup-body{max-height:400px;overflow-y:auto;padding:10px}
.search-popup-empty{padding:40px 20px;text-align:center;color:var(--fg-muted);font-size:.95rem}
.search-result-item{display:flex;align-items:center;gap:16px;padding:14px 16px;border-radius:var(--radius-md);cursor:pointer;transition:background var(--duration) var(--ease)}
.search-result-item:hover{background:var(--cream)}
.search-result-thumb{width:48px;height:48px;border-radius:var(--radius-sm);object-fit:cover;flex-shrink:0;background:var(--cream-dark)}
.search-result-info strong{display:block;font-size:.95rem;font-weight:600;color:var(--fg)}
.search-result-info span{font-size:.8rem;color:var(--fg-muted)}
.search-result-price{margin-left:auto;font-size:.95rem;font-weight:700;color:var(--red);flex-shrink:0;font-family:var(--font-head)}

/* === Updated Cart UI === */
.cart-overlay{position:fixed;inset:0;z-index:1500;background:rgba(28,21,23,.5);backdrop-filter:blur(8px);opacity:0;visibility:hidden;transition:all .4s var(--ease)}
.cart-overlay.visible{opacity:1;visibility:visible}
.cart-panel{position:fixed;top:0;right:0;bottom:0;width:460px;max-width:100vw;background:linear-gradient(180deg, var(--bg-elevated) 0%, var(--bg) 100%);z-index:1501;display:flex;flex-direction:column;transform:translateX(105%);transition:transform .45s var(--ease);box-shadow:-16px 0 48px rgba(28,21,23,.1);border-left:1px solid var(--border-light)}
.cart-panel.open{transform:translateX(0)}
.cart-panel-header{display:flex;align-items:center;justify-content:space-between;padding:32px;border-bottom:1px solid var(--border-light);flex-shrink:0;background:var(--bg-elevated)}
.cart-panel-header h3{font-size:1.5rem;font-weight:700;display:flex;align-items:center;gap:12px;color:var(--fg);letter-spacing:-.02em}
.cart-panel-header h3 i{color:var(--red)}
.cart-panel-header h3 span{font-size:.75rem;font-weight:600;color:var(--red);background:var(--red-light);padding:4px 12px;border-radius:var(--radius-full)}
.cart-panel-close{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--fg);font-size:1rem;background:var(--cream);transition:all var(--duration) var(--ease)}
.cart-panel-close:hover{background:var(--fg);color:#fff;transform:rotate(90deg)}
.cart-panel-body{flex:1;overflow-y:auto;padding:24px}
.cart-empty{display:flex;flex-direction:column;align-items:center;justify-content:center;height:100%;text-align:center;color:var(--fg-muted)}
.cart-empty i{font-size:4rem;margin-bottom:20px;color:var(--pink);opacity:.6}
.cart-empty h4{font-size:1.25rem;font-weight:600;color:var(--fg-secondary);margin-bottom:8px}
.cart-empty p{font-size:.9rem}

.cart-item{display:flex;gap:18px;padding:18px;margin-bottom:14px;border-radius:var(--radius-md);background:var(--card);border:1px solid var(--border-light);align-items:center;transition:all .3s var(--ease)}
.cart-item:hover{box-shadow:var(--shadow-sm);border-color:var(--border)}
.cart-item-image{width:84px;height:84px;border-radius:var(--radius-md);object-fit:cover;flex-shrink:0;background:var(--cream);box-shadow:var(--shadow-sm)}
.cart-item-info{flex:1;min-width:0}
.cart-item-name{font-size:1rem;font-weight:600;color:var(--fg);margin-bottom:6px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-family:var(--font-head)}
.cart-item-price{font-size:1rem;font-weight:700;color:var(--red);margin-bottom:14px;font-family:var(--font-head)}
.cart-item-qty{display:flex;align-items:center;border:1px solid var(--border);border-radius:var(--radius-full);overflow:hidden;width:fit-content;background:var(--bg)}
.cart-item-qty button{width:34px;height:34px;display:flex;align-items:center;justify-content:center;font-size:.8rem;color:var(--fg-secondary);transition:all var(--duration) var(--ease);border-radius:50%}
.cart-item-qty button:hover{background:var(--cream-dark);color:var(--red)}
.cart-item-qty span{width:40px;text-align:center;font-size:.9rem;font-weight:600;color:var(--fg);user-select:none}
.cart-item-remove{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--fg-muted);font-size:.95rem;flex-shrink:0;transition:all var(--duration) var(--ease)}
.cart-item-remove:hover{background:var(--red-light);color:var(--red);transform:scale(1.05)}

.cart-panel-footer{padding:28px;border-top:1px solid var(--border-light);flex-shrink:0;background:var(--bg-elevated)}
.cart-subtotal{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
.cart-subtotal label{font-size:.9rem;color:var(--fg-secondary)}
.cart-subtotal span{font-size:1.05rem;font-weight:600;color:var(--fg)}
.cart-total{display:flex;justify-content:space-between;align-items:center;margin-bottom:28px;padding-top:18px;border-top:1px dashed var(--border)}
.cart-total label{font-size:1.15rem;font-weight:700;color:var(--fg)}
.cart-total span{font-size:1.6rem;font-weight:700;color:var(--red);font-family:var(--font-head)}
.cart-checkout-btn{width:100%;padding:18px;border-radius:var(--radius-full);background:var(--fg);color:#fff;font-size:1rem;font-weight:600;text-align:center;transition:all var(--duration) var(--ease);display:flex;align-items:center;justify-content:center;gap:10px;box-shadow:0 10px 24px rgba(28,21,23,.2)}
.cart-checkout-btn:hover{background:var(--red);transform:translateY(-2px);box-shadow:0 16px 32px rgba(184,48,46,.35)}
.cart-continue-shopping{display:block;text-align:center;margin-top:18px;font-size:.9rem;font-weight:600;color:var(--fg-secondary);cursor:pointer;transition:color var(--duration) var(--ease)}
.cart-continue-shopping:hover{color:var(--red)}
.cart-free-delivery{text-align:center;margin-top:16px;font-size:.8rem;color:#4EA66A;font-weight:500;background:rgba(107,203,139,.1);padding:10px;border-radius:var(--radius-sm)}
.cart-free-delivery i{color:#4EA66A;margin-right:6px}

/* Contact */
.contact-section{padding:120px 0}
.contact-grid{display:grid;grid-template-columns:1fr 1.2fr;gap:80px}
.contact-info h3{font-size:1.75rem;font-weight:700;color:var(--fg);margin-bottom:16px}
.contact-info>p{font-size:.95rem;color:var(--fg-secondary);line-height:1.75;margin-bottom:36px}
.contact-details{display:flex;flex-direction:column;gap:24px;margin-bottom:36px}
.contact-detail-item{display:flex;gap:16px;align-items:flex-start}
.contact-detail-icon{width:48px;height:48px;border-radius:var(--radius-md);background:var(--cream);color:var(--red);display:flex;align-items:center;justify-content:center;font-size:1.1rem;flex-shrink:0}
.contact-detail-item strong{display:block;font-size:.95rem;font-weight:700;color:var(--fg);margin-bottom:4px}
.contact-detail-item span{font-size:.88rem;color:var(--fg-muted);line-height:1.5}
.contact-socials{display:flex;gap:12px}
.contact-social-link{width:46px;height:46px;border-radius:var(--radius-md);background:var(--cream);color:var(--fg-secondary);display:flex;align-items:center;justify-content:center;font-size:1.05rem;transition:all var(--duration) var(--ease)}
.contact-social-link:hover{background:var(--fg);color:#fff;transform:translateY(-3px)}
.contact-form-card{background:var(--bg-elevated);border:1px solid var(--border-light);border-radius:var(--radius-xl);padding:40px;box-shadow:var(--shadow-sm)}
.contact-form-card h4{font-size:1.35rem;font-weight:700;color:var(--fg);margin-bottom:28px}
.contact-form textarea.form-input{resize:vertical;min-height:140px}
.contact-success{text-align:center;padding:48px 20px}
.contact-success i{font-size:3.5rem;color:#6BCB8B;margin-bottom:20px}
.contact-success h4{font-size:1.25rem;font-weight:700;color:var(--fg);margin-bottom:8px}
.contact-success p{font-size:.95rem;color:var(--fg-muted)}

/* Footer */
.footer{background:var(--fg);color:rgba(255,255,255,.7);padding:80px 0 0}
.footer-inner{max-width:var(--container);margin:0 auto;padding:0 40px;display:grid;grid-template-columns:1.5fr 1fr 1fr 1fr;gap:48px}
.footer-brand .nav-logo-name{color:#fff}
.footer-brand .nav-logo-tagline{color:var(--pink)}
.footer-brand p{font-size:.9rem;line-height:1.75;margin-top:20px;max-width:320px}
.footer-col h4{font-size:.85rem;font-weight:700;text-transform:uppercase;letter-spacing:.1em;color:#fff;margin-bottom:24px}
.footer-col a{display:block;font-size:.9rem;padding:6px 0;transition:color var(--duration) var(--ease)}
.footer-col a:hover{color:var(--pink)}
.footer-bottom{margin-top:56px;padding:24px 40px;border-top:1px solid rgba(255,255,255,.08);max-width:var(--container);margin-left:auto;margin-right:auto;display:flex;align-items:center;justify-content:space-between;font-size:.85rem}

/* Toast */
.toast-container{position:fixed;bottom:32px;right:32px;z-index:9999;display:flex;flex-direction:column;gap:12px;pointer-events:none}
.toast{display:flex;align-items:center;gap:12px;padding:16px 24px;border-radius:var(--radius-md);background:var(--fg);color:#fff;box-shadow:var(--shadow-lg);font-size:.92rem;font-weight:500;pointer-events:auto;animation:toastIn .4s var(--ease) forwards}
.toast.success i{color:#6BCB8B}.toast.error i{color:#E07070}.toast.info i{color:var(--pink)}
@keyframes toastIn{from{opacity:0;transform:translateY(16px) scale(.96)}to{opacity:1;transform:translateY(0) scale(1)}}

/* Account Modal */
.account-modal .modal-box { max-width: 460px; }
.account-box { padding: 40px; }
.form-box { display: none; animation: fadeIn .4s ease; }
.form-box.active { display: block; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }
.logreg-title { text-align: center; margin-bottom: 32px; }
.logreg-title h2 { font-size: 2rem; font-weight: 700; color: var(--fg); margin-bottom: 8px; }
.logreg-title p { font-size: .9rem; color: var(--fg-muted); }
.input-box { position: relative; margin-bottom: 28px; border-bottom: 2px solid var(--border); }
.input-box .icon { position: absolute; right: 8px; top: 50%; transform: translateY(-50%); color: var(--fg-muted); font-size: 1rem; }
.input-box input { width: 100%; height: 54px; background: transparent; border: none; outline: none; font-size: 1rem; color: var(--fg); padding: 0 35px 0 5px; }
.input-box label { position: absolute; top: 50%; left: 5px; transform: translateY(-50%); font-size: 1rem; color: var(--fg-muted); pointer-events: none; transition: .3s var(--ease); }
.input-box input:focus ~ label,
.input-box input:valid ~ label { top: -12px; font-size: .85rem; color: var(--red); }
.remember-forgot { display: flex; justify-content: space-between; align-items: center; font-size: .88rem; color: var(--fg-secondary); margin-bottom: 24px; gap: 10px; flex-wrap: wrap; }
.remember-forgot label { display: flex; align-items: center; gap: 8px; cursor: pointer; }
.remember-forgot a { color: var(--red); font-weight: 500; }
.logreg-link { text-align: center; margin-top: 28px; font-size: .9rem; color: var(--fg-secondary); }
.logreg-link a { color: var(--red); font-weight: 600; margin-left: 6px; cursor: pointer; }

.dashboard-quick-links { display: flex; gap: 14px; margin-top: 36px; padding-top: 28px; border-top: 1px solid var(--border-light); }
.quick-link-btn { flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 12px; border-radius: var(--radius-md); background: var(--cream); color: var(--fg-secondary); font-size: .88rem; font-weight: 600; transition: all .2s ease; text-decoration: none; }
.quick-link-btn:hover { background: var(--cream-dark); color: var(--fg); transform: translateY(-2px); }

/* Responsive */
@media(max-width:1100px){
    .hero h1{font-size:3.2rem}
    .products-grid{grid-template-columns:repeat(3,1fr)}
    .deals-grid{grid-template-columns:repeat(2,1fr)}
    .footer-inner{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:768px){
    :root{--nav-height:68px}
    .nav{padding:0 20px}
    .nav-links{display:none}
    .btn-nav-account.nav-desktop{display:none}
    .nav-menu-btn{display:flex}
    .hero{padding-top:calc(var(--nav-height) + 40px);padding-bottom:60px}
    .hero-inner{grid-template-columns:1fr;gap:48px}
    .hero h1{font-size:2.5rem}
    .hero-image{max-width:400px;margin:0 auto}
    .hero-float-card{left:0;bottom:-10px}
    .section-container{padding:0 24px}
    .section-header{font-size:1.8rem}
    .deals-grid{grid-template-columns:1fr 1fr;gap:18px}
    .deal-card{padding:24px 20px}
    .about-grid{grid-template-columns:1fr;gap:48px}
    .about-image-wrapper{max-width:360px;margin:0 auto}
    .about-card p{padding-left:0}
    .products-grid{grid-template-columns:repeat(2,1fr);gap:20px}
    .product-detail{grid-template-columns:1fr}
    .pd-carousel-main{aspect-ratio:1/1}
    .pd-info{padding:32px 28px}
    .contact-grid{grid-template-columns:1fr;gap:48px}
    .footer-inner{grid-template-columns:1fr;gap:36px}
    .footer-bottom{flex-direction:column;gap:10px;text-align:center}
    .cart-panel{width:100vw}
    .upload-previews{grid-template-columns:repeat(3,1fr)}
}
@media(max-width:480px){
    .hero h1{font-size:2rem}
    .deals-grid{grid-template-columns:1fr}
    .products-grid{grid-template-columns:1fr}
    .product-card-row{grid-template-columns:1fr}
    .form-row{grid-template-columns:1fr}
    .upload-previews{grid-template-columns:repeat(2,1fr)}
    .account-box { padding: 32px 28px; }
}
:focus-visible{outline:2px solid var(--red);outline-offset:2px}
        
    </style>
</head>
<body>

<!-- ======================== NAVIGATION ======================== -->
<nav class="nav" id="nav">
    <div class="nav-inner">
        <a href="#home" class="nav-logo">
             <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
            <span class="logo-text">
                <span class="nav-logo-name">Hattie's</span>
                <span class="nav-logo-tagline">Hat'istical Hats</span>
            </span>
        </a>             
        
        <ul class="nav-links">
            <li><a href="#home" class="active">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#catalog">Catalog</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="nav-actions">
            <button class="nav-action-btn" id="navSearchBtn" aria-label="Search products">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <button class="nav-action-btn" id="navCartBtn" aria-label="Open cart">
                <i class="fa-solid fa-bag-shopping"></i>
                <span class="cart-badge" id="cartBadge">0</span>
            </button>
            <button class="btn-nav-account btnAccount-popup">
                <i class="fa-solid fa-user"></i> Account
            </button>
            
            <button class="nav-menu-btn" id="mobileMenuBtn" aria-label="Open menu">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay"></div>
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu-header">
        <a href="#home" class="nav-logo">
            <img src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats" class="nav-logo-img">
        </a>
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close menu">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="mobile-menu-links">
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#catalog">Catalog</a>
        <a href="#contact">Contact Us</a>
    </div>
    <div class="mobile-menu-footer">
        <button class="btn-nav-account btnAccount-popup" style="display:flex;align-items:center;justify-content:center;text-align:center;width:100%;margin-left:0;padding:14px;">
            <i class="fa-solid fa-user"></i> Account
        </button>
    </div>
</div>

<!-- ======================== HERO ======================== -->
<header class="hero" id="home">
    <div class="section-container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-badge">
                    <i class="fa-solid fa-sparkles"></i>
                    Handcrafted with Love in South Africa
                </div>
                <h1>Elegance For <span>Every Occasion</span></h1>
                <p class="hero-description">
                    Discover our curated collection of bespoke hats and headpieces — 
                    from classic fedoras to show-stopping fascinators. Each piece is 
                    meticulously handcrafted to make you feel extraordinary.
                </p>
                <div class="hero-actions">
                    <a href="#catalog" class="btn-primary">
                        <i class="fa-solid fa-hat-cowboy"></i>
                        Browse Catalog
                    </a>
                    <a href="#about" class="btn-outline">
                        <i class="fa-solid fa-play"></i>
                        Our Story
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img class="hero-image-main" src="/assets/images/logo.png" alt="Hattie's Hat'istical Hats">
                <div class="hero-float-card">
                    <div class="hero-float-icon"><i class="fa-solid fa-star"></i></div>
                    <div class="hero-float-text">
                        <strong>500+ Happy Clients</strong>
                        <span>Trusted since 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ======================== DEALS ======================== -->
<section class="deals-section">
    <div class="section-container">
        <div class="deals-grid">
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-calendar-check"></i></div>
                <h4>30-Day Terms</h4>
                <p>Take advantage of our 30-day payment term, completely interest-free. Shop now, pay later.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-tags"></i></div>
                <h4>Seasonal Savings</h4>
                <p>Lots of special offers for hats for any season and any occasion throughout the year.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-rotate-left"></i></div>
                <h4>Easy Returns</h4>
                <p>If not up to standard, we accept returns with up to 70% refund of the original price — good condition and proof of payment required.</p>
            </div>
            <div class="deal-card">
                <div class="deal-card-icon"><i class="fa-solid fa-truck-fast"></i></div>
                <h4>Free Delivery</h4>
                <p>Free delivery on bulk orders and purchases of R 1,500 and above across South Africa.</p>
            </div>
        </div>
    </div>
</section>

<!-- ======================== ABOUT ======================== -->
<section class="about-section" id="about">
    <div class="section-container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <img class="about-image-main" src="/assets/images/img_1.png" alt="About Hattie's Hat'istical Hats">
                <img class="about-image-accent" src="/assets/images/img_2.png" alt="Hat detail">
            </div>
            <div>
                <div class="section-label">Our Story</div>
                <h2 class="section-header">Behind Every Hat, There's a Story</h2>
                <p class="section-subheader" style="margin-bottom:32px;">What started as a passion project has blossomed into one of South Africa's most loved hat boutiques.</p>
                <div class="about-cards">
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">1</div>
                            <h4>Who Are We</h4>
                        </div>
                        <p>We are Hattie's Hat'istical Hats — a South African-born hat boutique specialising in handcrafted headwear for every occasion. From elegant wedding fascinators to bold everyday fedoras, we celebrate individuality through the art of millinery.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">2</div>
                            <h4>How We Started</h4>
                        </div>
                        <p>Founded in 2019 by Hattie herself, the journey began at a kitchen table with a single fascinator and a dream. What started as gifts for friends quickly grew into a thriving business fueled by word-of-mouth and a loyal community.</p>
                    </div>
                    <div class="about-card">
                        <div class="about-card-header">
                            <div class="about-card-number">3</div>
                            <h4>Our Promise</h4>
                        </div>
                        <p>We promise quality craftsmanship, personal attention to every detail, and a commitment to making you feel confident and beautiful. Every hat is made with premium materials, and every customer is treated like family.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======================== CATALOG ======================== -->
<section class="catalog-section" id="catalog">
    <div class="section-container">
        <div class="section-label">Shop</div>
        <div class="catalog-header">
            <div>
                <h2 class="section-header">Our Catalog</h2>
                <p class="section-subheader" style="margin-bottom:0;">Handpicked pieces for every style and occasion</p>
            </div>
            <div class="catalog-filters" id="catalogFilters">
                <button class="filter-chip active" data-filter="all">All</button>
                <!-- Category chips populated dynamically from Database -->
            </div>
        </div>
        <div id="catalogLoading" class="catalog-loading">
            <div class="spinner"></div>
            <span>Loading products...</span>
        </div>
        <div class="products-grid" id="productsGrid" style="display:none;"></div>
        <div class="catalog-empty" id="catalogEmpty" style="display:none;">
            <i class="fa-solid fa-box-open"></i>
            <h4>No products found</h4>
            <p>Check back soon — we're always adding new pieces.</p>
        </div>
        <div class="catalog-show-more" id="catalogShowMore" style="display:none;">
            <button class="btn-outline" id="showMoreBtn">
                <i class="fa-solid fa-grid-2"></i>
                View All Products
            </button>
        </div>
    </div>
</section>

<!-- ======================== CONTACT ======================== -->
<section class="contact-section" id="contact">
    <div class="section-container">
        <div class="section-label">Get in Touch</div>
        <h2 class="section-header">Contact Us</h2>
        <p class="section-subheader">Have a question, custom request, or just want to say hello? We'd love to hear from you.</p>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Let's Start a Conversation</h3>
                <p>Whether you need help choosing the perfect hat, want to discuss a custom order, or have feedback — our team is here for you. We typically respond within 24 hours.</p>
                <div class="contact-details">
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div><strong>Visit Our Studio</strong><span>123 Millinery Lane, Rosebank<br>Johannesburg, Gauteng, 2196</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-phone"></i></div>
                        <div><strong>Call Us</strong><span>+27 (0) 11 234 5678<br>Mon – Fri, 8:00 – 17:00</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-solid fa-envelope"></i></div>
                        <div><strong>Email Us</strong><span>hello@hatties.co.za<br>orders@hatties.co.za</span></div>
                    </div>
                    <div class="contact-detail-item">
                        <div class="contact-detail-icon"><i class="fa-brands fa-whatsapp"></i></div>
                        <div><strong>WhatsApp</strong><span>+27 (0) 82 345 6789<br>Quick queries & custom orders</span></div>
                    </div>
                </div>
                <div class="contact-socials">
                    <a href="#" class="contact-social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="contact-social-link" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="contact-social-link" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="#" class="contact-social-link" aria-label="Pinterest"><i class="fa-brands fa-pinterest-p"></i></a>
                </div>
            </div>
            <div class="contact-form-card" id="contactFormCard">
                <h4>Send Us a Message</h4>
                <form id="contactForm" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactName">Full Name <span style="color:var(--red)">*</span></label>
                            <input type="text" id="contactName" class="form-input" placeholder="Your full name" required>
                            <span class="form-error" id="contactNameError"></span>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email Address <span style="color:var(--red)">*</span></label>
                            <input type="email" id="contactEmail" class="form-input" placeholder="you@example.com" required>
                            <span class="form-error" id="contactEmailError"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contactPhone">Phone Number</label>
                            <input type="tel" id="contactPhone" class="form-input" placeholder="+27 82 345 6789">
                        </div>
                        <div class="form-group">
                            <label for="contactSubject">Subject <span style="color:var(--red)">*</span></label>
                            <select id="contactSubject" class="form-input" required style="cursor:pointer;">
                                <option value="">Select a subject</option>
                                <option value="general">General Enquiry</option>
                                <option value="custom-order">Custom Order Request</option>
                                <option value="order-status">Order Status</option>
                                <option value="returns">Returns & Refunds</option>
                                <option value="wholesale">Wholesale Enquiry</option>
                                <option value="other">Other</option>
                            </select>
                            <span class="form-error" id="contactSubjectError"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactMessage">Message <span style="color:var(--red)">*</span></label>
                        <textarea id="contactMessage" class="form-input" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                        <span class="form-error" id="contactMessageError"></span>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                        <i class="fa-solid fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ======================== FOOTER ======================== -->
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-brand">
            <div class="nav-logo">
                <div class="nav-logo-mark">H</div>
                <div class="nav-logo-text">
                    <span class="nav-logo-name">Hattie's</span>
                    <span class="nav-logo-tagline">Hat'istical Hats</span>
                </div>
            </div>
            <p>Handcrafted hats and headpieces for every occasion. Made with love in Johannesburg, South Africa.</p>
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <a href="#home">Home</a><a href="#about">About Us</a><a href="#catalog">Catalog</a><a href="#contact">Contact</a>
        </div>
        <div class="footer-col">
            <h4>Categories</h4>
            <div id="footerCategories"><!-- populated by JS --></div>
        </div>
        <div class="footer-col">
            <h4>Support</h4>
            <a href="/api/support/help_centre.php">Help Centre</a><a href="/api/support/returns_policy.php">Returns Policy</a><a href="/api/support/custom_orders.php">Custom Orders</a><a href="/api/support/shipping_info.php">Shipping Info</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; 2025 Hattie's Hat'istical Hats. All rights reserved.</span>
        <span>Crafted with <i class="fa-solid fa-heart" style="color:var(--red);font-size:.75rem;"></i> By Justin Plaatjies</span>
    </div>
</footer>

<!-- ======================== SEARCH OVERLAY ======================== -->
<div class="search-overlay" id="searchOverlay" role="dialog" aria-label="Search products">
    <div class="search-popup">
        <div class="search-popup-header">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search hats, fascinators, fedoras..." id="searchInput" aria-label="Search query">
            <span class="esc-hint">ESC</span>
        </div>
        <div class="search-popup-body" id="searchResults">
            <div class="search-popup-empty">
                <i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>
                Start typing to search our catalog
            </div>
        </div>
    </div>
</div>

<!-- ======================== ACCOUNT MODAL ======================== -->
<div class="modal-overlay account-modal" id="accountModal">
    <div class="modal-box">
        <button class="modal-close" id="accountClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="account-box">
            <!-- Login Form -->
            <div class="form-box login active" id="loginFormBox">
                <div class="logreg-title">
                    <h2>Login</h2>
                    <p>Please login to use platform</p>
                </div>
                <form action="#" id="loginForm">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox"> Remember Me</label>
                        <a href="/public/auth/forgot_password.php">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:10px;">Login</button>
                    <div class="logreg-link">
                        <p>Don't have an account? <a href="#" class="register-link">Register</a></p>
                    </div>
                </form>
            </div>

            <!-- Registration Form -->
            <div class="form-box register" id="registerFormBox">
                <div class="logreg-title">
                    <h2>Registration</h2>
                    <p>Please provide the following to create your account</p>
                </div>
                <form action="#" id="registerForm">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" required>
                        <label>Full Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" required>
                        <label>Password</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox"> I agree to the terms & conditions</label>
                    </div>
                    <button type="submit" class="btn-primary" style="width:100%;justify-content:center;margin-top:10px;">Register</button>
                    <div class="logreg-link">
                        <p>Already have an account? <a href="#" class="login-link">Login</a></p>
                    </div>
                </form>
            </div>
            
            <div class="dashboard-quick-links">
                <a href="/dashboards/admin/index.php" class="quick-link-btn"><i class="fa-solid fa-user-shield"></i> Admin</a>
                <a href="/dashboards/user/index.php" class="quick-link-btn"><i class="fa-solid fa-user-gear"></i> User</a>
            </div>
        </div>
    </div>
</div>

<!-- ======================== CART PANEL ======================== -->
<div class="cart-overlay" id="cartOverlay"></div>
<div class="cart-panel" id="cartPanel">
    <div class="cart-panel-header">
        <h3><i class="fa-solid fa-bag-shopping"></i> Your Cart <span id="cartPanelCount">0 items</span></h3>
        <button class="cart-panel-close" id="cartPanelClose" aria-label="Close cart"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="cart-panel-body" id="cartPanelBody"></div>
    <div class="cart-panel-footer" id="cartPanelFooter" style="display:none;">
        <div class="cart-subtotal"><label>Subtotal</label><span id="cartSubtotal">R 0.00</span></div>
        <div class="cart-total"><label>Total</label><span id="cartTotal">R 0.00</span></div>
        <button class="cart-checkout-btn" id="checkoutBtn"><i class="fa-solid fa-lock"></i> Proceed to Checkout</button>
        <div class="cart-continue-shopping" id="continueShoppingBtn">Continue Shopping</div>
        <div class="cart-free-delivery" id="freeDeliveryNote" style="display:none;"><i class="fa-solid fa-truck-fast"></i> You qualify for free delivery!</div>
    </div>
</div>

<!-- ======================== PRODUCT DETAIL MODAL (Carousel) ======================== -->
<div class="modal-overlay" id="productDetailModal">
    <div class="modal-box" style="position:relative;">
        <button class="modal-close" id="productDetailClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="product-detail" id="productDetailContent"><!-- populated by JS --></div>
    </div>
</div>

<!-- ======================== CUSTOM REQUEST MODAL ======================== -->
<div class="modal-overlay custom-modal" id="customRequestModal">
    <div class="modal-box" style="position:relative;">
        <button class="modal-close" id="customRequestClose" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        <div class="custom-modal-body">
            <div class="custom-modal-product" id="customRefProduct"><!-- populated by JS --></div>
            <h4 style="font-size:1.25rem;font-weight:700;color:var(--fg);margin-bottom:28px;">
                <i class="fa-solid fa-wand-magic-sparkles" style="color:var(--red);margin-right:8px;"></i>
                Request a Custom Version
            </h4>
            <form id="customRequestForm" novalidate>
                <div class="form-row">
                    <div class="form-group">
                        <label for="customName">Full Name <span style="color:var(--red)">*</span></label>
                        <input type="text" id="customName" class="form-input" placeholder="Your full name" required>
                        <span class="form-error" id="customNameError"></span>
                    </div>
                    <div class="form-group">
                        <label for="customEmail">Email <span style="color:var(--red)">*</span></label>
                        <input type="email" id="customEmail" class="form-input" placeholder="you@example.com" required>
                        <span class="form-error" id="customEmailError"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="customPhone">Phone Number</label>
                        <input type="tel" id="customPhone" class="form-input" placeholder="+27 82 345 6789">
                    </div>
                    <div class="form-group">
                        <label for="customBudget">Budget Range</label>
                        <select id="customBudget" class="form-input" style="cursor:pointer;">
                            <option value="">Select budget</option>
                            <option value="under-500">Under R 500</option>
                            <option value="500-1000">R 500 – R 1,000</option>
                            <option value="1000-2000">R 1,000 – R 2,000</option>
                            <option value="2000-plus">R 2,000+</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customDescription">Describe What You Want <span style="color:var(--red)">*</span></label>
                    <textarea id="customDescription" class="form-input" rows="4" placeholder="E.g. I'd like this hat in navy blue with a wider brim and a feather accent..." required></textarea>
                    <span class="form-error" id="customDescriptionError"></span>
                </div>
                <div class="form-group">
                    <label>Reference Images <span style="font-weight:400;color:var(--fg-muted);">(optional — up to 5)</span></label>
                    <div class="upload-zone" id="customUploadZone">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <p>Click to upload or drag and drop</p>
                        <span>PNG, JPG, WEBP up to 5MB each</span>
                        <input type="file" id="customFileInput" multiple accept="image/png,image/jpeg,image/webp" hidden>
                    </div>
                    <div class="upload-previews" id="customUploadPreviews"></div>
                </div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                    <i class="fa-solid fa-paper-plane"></i> Submit Custom Request
                </button>
            </form>
        </div>
    </div>
</div>

<!-- ======================== TOAST ======================== -->
<div class="toast-container" id="toastContainer"></div>

<script>
/* ================================================================
   STATE — no dummy data, all fetched from API
   ================================================================ */
var allProducts = [];
var categories = [];
//var cart = [];
var cart = JSON.parse(localStorage.getItem('cart')) || [];
var currentFilter = 'all';
var showingAll = false;
var INITIAL_SHOW = 8;
var customReferenceImages = []; // { file: File, preview: string }

/* ================================================================
   UTILITIES
   ================================================================ */
function formatPrice(n) { return 'R ' + Number(n).toFixed(2); }
function escapeHtml(s) { var d = document.createElement('div'); d.textContent = s; return d.innerHTML; }
function categoryLabel(slug) { return (slug || '').split('-').map(function(w) { return w.charAt(0).toUpperCase() + w.slice(1); }).join(' '); }
function statusInfo(s) {
    var m = { 'in-stock':{l:'In Stock',d:'in-stock'},'on-sale':{l:'On Sale',d:'on-sale'},'low-stock':{l:'Low Stock',d:'low-stock'},'out-of-stock':{l:'Out of Stock',d:'out-of-stock'},'featured':{l:'Featured',d:'in-stock'} };
    return m[s] || {l:s,d:'in-stock'};
}
function firstImage(images) { return (images && images.length > 0) ? images[0] : '/assets/images/placeholder.jpg'; }

function showToast(msg, type) {
    type = type || 'info';
    var c = document.getElementById('toastContainer');
    var t = document.createElement('div');
    t.className = 'toast ' + type;
    var icon = type === 'success' ? 'fa-circle-check' : type === 'error' ? 'fa-circle-xmark' : 'fa-circle-info';
    t.innerHTML = '<i class="fa-solid ' + icon + '"></i> ' + escapeHtml(msg);
    c.appendChild(t);
    setTimeout(function() { t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all .3s ease'; setTimeout(function(){ t.remove(); },300); }, 3000);
}

/* ================================================================
   API FETCH — Products
   ================================================================ */
function fetchProducts() {
    var loading = document.getElementById('catalogLoading');
    var grid = document.getElementById('productsGrid');
    var empty = document.getElementById('catalogEmpty');
    loading.style.display = '';
    grid.style.display = 'none';
    empty.style.display = 'none';

    setTimeout(function() {
        allProducts = [];
        categories = [];
        renderCatalog();
    }, 800);
}

/* ================================================================
   CATALOG RENDERING
   ================================================================ */
function renderCatalog() {
    var loading = document.getElementById('catalogLoading');
    var grid = document.getElementById('productsGrid');
    var empty = document.getElementById('catalogEmpty');
    var showMore = document.getElementById('catalogShowMore');
    loading.style.display = 'none';

    var filtersEl = document.getElementById('catalogFilters');
    filtersEl.innerHTML = '<button class="filter-chip active" data-filter="all">All</button>';
    categories.forEach(function(cat) {
        filtersEl.innerHTML += '<button class="filter-chip" data-filter="' + escapeHtml(cat.id) + '">' + escapeHtml(cat.name) + '</button>';
    });

    var footerCats = document.getElementById('footerCategories');
    footerCats.innerHTML = categories.map(function(cat) {
        return '<a href="#catalog">' + escapeHtml(cat.name) + '</a>';
    }).join('');

    if (allProducts.length === 0) {
        grid.style.display = 'none';
        empty.style.display = '';
        showMore.style.display = 'none';
        return;
    }

    empty.style.display = 'none';
    renderFilteredProducts();
    bindFilterChips();
}

function getFilteredProducts() {
    if (currentFilter === 'all') return allProducts;
    return allProducts.filter(function(p) { return p.category === currentFilter; });
}

function renderFilteredProducts() {
    var grid = document.getElementById('productsGrid');
    var showMore = document.getElementById('catalogShowMore');
    var filtered = getFilteredProducts();
    var display = showingAll ? filtered : filtered.slice(0, INITIAL_SHOW);

    grid.style.display = '';
    showMore.style.display = (!showingAll && filtered.length > INITIAL_SHOW) ? '' : 'none';

    grid.innerHTML = display.map(function(p) {
        var badgeHtml = '';
        if (p.badge === 'sale') badgeHtml = '<span class="product-card-badge sale">Sale</span>';
        else if (p.badge === 'new') badgeHtml = '<span class="product-card-badge new">New</span>';
        else if (p.badge === 'featured') badgeHtml = '<span class="product-card-badge featured">Featured</span>';

        var imgCount = (p.images && p.images.length > 1) ? '<span class="product-card-img-count"><i class="fa-solid fa-images" style="font-size:.55rem;margin-right:2px;"></i>' + p.images.length + '</span>' : '';

        var priceHtml = formatPrice(p.price);
        if (p.oldPrice) priceHtml += '<span class="old-price">' + formatPrice(p.oldPrice) + '</span>';

        return '<div class="product-card" data-category="' + escapeHtml(p.category) + '">' +
            '<div class="product-card-image">' + badgeHtml + imgCount +
                '<img src="' + escapeHtml(firstImage(p.images)) + '" alt="' + escapeHtml(p.name) + '" loading="lazy">' +
            '</div>' +
            '<div class="product-card-body">' +
                '<span class="product-card-category">' + categoryLabel(p.category) + '</span>' +
                '<h4 class="product-card-name">' + escapeHtml(p.name) + '</h4>' +
                '<div class="product-card-price">' + priceHtml + '</div>' +
                '<div class="product-card-actions">' +
                    '<button class="btn-card-primary" data-add-cart="' + p.id + '"><i class="fa-solid fa-bag-shopping"></i> Add to Cart</button>' +
                    '<div class="product-card-row">' +
                        '<button class="btn-card-small view" data-view="' + p.id + '"><i class="fa-solid fa-eye"></i> View More</button>' +
                        '<button class="btn-card-small custom" data-custom="' + p.id + '"><i class="fa-solid fa-wand-magic-sparkles"></i> Custom</button>' +
                    '</div>' +
                '</div>' +
            '</div></div>';
    }).join('');

    grid.querySelectorAll('[data-add-cart]').forEach(function(b) { b.addEventListener('click', function(){ addToCart(b.dataset.addCart); }); });
    grid.querySelectorAll('[data-view]').forEach(function(b) { b.addEventListener('click', function(){ openProductDetail(b.dataset.view); }); });
    grid.querySelectorAll('[data-custom]').forEach(function(b) { b.addEventListener('click', function(){ openCustomRequest(b.dataset.custom); }); });
}

function bindFilterChips() {
    document.getElementById('catalogFilters').addEventListener('click', function(e) {
        var chip = e.target.closest('.filter-chip');
        if (!chip) return;
        document.querySelectorAll('.filter-chip').forEach(function(c){ c.classList.remove('active'); });
        chip.classList.add('active');
        currentFilter = chip.dataset.filter;
        showingAll = false;
        renderFilteredProducts();
    });
}

document.getElementById('showMoreBtn').addEventListener('click', function() {
    showingAll = true;
    renderFilteredProducts();
});

fetchProducts();

/* ================================================================
   PRODUCT DETAIL — IMAGE CAROUSEL
   ================================================================ */
var productDetailModal = document.getElementById('productDetailModal');
var productDetailContent = document.getElementById('productDetailContent');
var productDetailClose = document.getElementById('productDetailClose');
var currentCarouselIndex = 0;
var carouselImages = [];
var carouselTimer = null;

function openProductDetail(productId) {
    var p = allProducts.find(function(x){ return x.id === productId; });
    if (!p) return;

    carouselImages = p.images && p.images.length > 0 ? p.images : ['/assets/images/placeholder.jpg'];
    currentCarouselIndex = 0;

    var si = statusInfo(p.status);
    var priceHtml = formatPrice(p.price);
    if (p.oldPrice) priceHtml += '<span class="old-price">' + formatPrice(p.oldPrice) + '</span>';

    productDetailContent.innerHTML =
        '<div class="pd-carousel">' +
            '<div class="pd-carousel-main" id="pdCarouselMain">' +
                carouselImages.map(function(img, i) {
                    return '<img src="' + escapeHtml(img) + '" alt="' + escapeHtml(p.name) + ' image ' + (i+1) + '" class="' + (i === 0 ? 'active' : '') + '">';
                }).join('') +
                (carouselImages.length > 1 ?
                    '<button class="pd-carousel-arrow prev" id="pdPrev" aria-label="Previous image"><i class="fa-solid fa-chevron-left"></i></button>' +
                    '<button class="pd-carousel-arrow next" id="pdNext" aria-label="Next image"><i class="fa-solid fa-chevron-right"></i></button>' +
                    '<span class="pd-carousel-counter" id="pdCounter">1 / ' + carouselImages.length + '</span>'
                : '') +
            '</div>' +
            (carouselImages.length > 1 ?
                '<div class="pd-carousel-thumbs" id="pdThumbs">' +
                    carouselImages.map(function(img, i) {
                        return '<div class="pd-thumb ' + (i === 0 ? 'active' : '') + '" data-slide="' + i + '"><img src="' + escapeHtml(img) + '" alt="Thumbnail ' + (i+1) + '"></div>';
                    }).join('') +
                '</div>'
            : '') +
        '</div>' +
        '<div class="pd-info">' +
            '<span class="pd-category">' + categoryLabel(p.category) + '</span>' +
            '<h2 class="pd-name">' + escapeHtml(p.name) + '</h2>' +
            '<div class="pd-price">' + priceHtml + '</div>' +
            '<p class="pd-desc">' + escapeHtml(p.description || 'No description available.') + '</p>' +
            '<div class="pd-meta">' +
                '<div class="meta-row"><span class="meta-label">Category</span><span class="meta-value">' + categoryLabel(p.category) + '</span></div>' +
                '<div class="meta-row"><span class="meta-label">Availability</span><span class="meta-value"><span class="status-dot ' + si.d + '"></span>' + si.l + '</span></div>' +
                '<div class="meta-row"><span class="meta-label">Delivery</span><span class="meta-value">3–5 business days</span></div>' +
                '<div class="meta-row"><span class="meta-label">Photos</span><span class="meta-value">' + carouselImages.length + ' images</span></div>' +
            '</div>' +
            '<div class="pd-actions">' +
                '<button class="btn-primary" style="width:100%;justify-content:center;" data-add-cart-detail="' + p.id + '"><i class="fa-solid fa-bag-shopping"></i> Add to Cart</button>' +
                '<button class="btn-outline" style="width:100%;justify-content:center;" data-custom-detail="' + p.id + '"><i class="fa-solid fa-wand-magic-sparkles"></i> Request Custom Version</button>' +
            '</div>' +
        '</div>';

    productDetailModal.classList.add('visible');
    document.body.style.overflow = 'hidden';

    if (carouselImages.length > 1) {
        document.getElementById('pdPrev').addEventListener('click', function(){ carouselGo(currentCarouselIndex - 1); });
        document.getElementById('pdNext').addEventListener('click', function(){ carouselGo(currentCarouselIndex + 1); });
        document.querySelectorAll('#pdThumbs .pd-thumb').forEach(function(th) {
            th.addEventListener('click', function(){ carouselGo(parseInt(th.dataset.slide)); });
        });
        startCarouselAutoplay();
    }

    productDetailContent.querySelector('[data-add-cart-detail]').addEventListener('click', function(){ addToCart(p.id); closeProductDetail(); });
    productDetailContent.querySelector('[data-custom-detail]').addEventListener('click', function(){ closeProductDetail(); openCustomRequest(p.id); });
}

function carouselGo(index) {
    if (carouselImages.length <= 1) return;
    if (index < 0) index = carouselImages.length - 1;
    if (index >= carouselImages.length) index = 0;
    currentCarouselIndex = index;

    var mainImgs = document.querySelectorAll('#pdCarouselMain img');
    mainImgs.forEach(function(img, i){ img.classList.toggle('active', i === index); });

    var thumbs = document.querySelectorAll('#pdThumbs .pd-thumb');
    thumbs.forEach(function(th, i){
        th.classList.toggle('active', i === index);
        if (i === index) th.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
    });

    var counter = document.getElementById('pdCounter');
    if (counter) counter.textContent = (index + 1) + ' / ' + carouselImages.length;

    resetCarouselAutoplay();
}

function startCarouselAutoplay() {
    if (carouselImages.length <= 1) return;
    carouselTimer = setInterval(function(){ carouselGo(currentCarouselIndex + 1); }, 4000);
}
function resetCarouselAutoplay() {
    clearInterval(carouselTimer);
    startCarouselAutoplay();
}

function closeProductDetail() {
    productDetailModal.classList.remove('visible');
    document.body.style.overflow = '';
    clearInterval(carouselTimer);
}
productDetailClose.addEventListener('click', closeProductDetail);
productDetailModal.addEventListener('click', function(e){ if (e.target === productDetailModal) closeProductDetail(); });

/* ================================================================
   CUSTOM REQUEST MODAL — with reference image uploads
   ================================================================ */
var customRequestModal = document.getElementById('customRequestModal');
var customRequestClose = document.getElementById('customRequestClose');
var customUploadZone = document.getElementById('customUploadZone');
var customFileInput = document.getElementById('customFileInput');
var customRefProductEl = document.getElementById('customRefProduct');

function openCustomRequest(productId) {
    var p = allProducts.find(function(x){ return x.id === productId; });
    customReferenceImages = [];
    renderCustomPreviews();

    if (p) {
        customRefProductEl.style.display = '';
        customRefProductEl.innerHTML =
            '<img src="' + escapeHtml(firstImage(p.images)) + '" alt="' + escapeHtml(p.name) + '">' +
            '<div><strong>' + escapeHtml(p.name) + '</strong><span>' + formatPrice(p.price) + ' &middot; ' + categoryLabel(p.category) + '</span></div>';
    } else {
        customRefProductEl.style.display = 'none';
    }

    document.getElementById('customRequestForm').reset();
    ['customName','customEmail','customDescription'].forEach(function(id){
        document.getElementById(id + 'Error').textContent = '';
        document.getElementById(id).classList.remove('invalid');
    });

    customRequestModal.classList.add('visible');
    document.body.style.overflow = 'hidden';
}

function closeCustomRequest() {
    customRequestModal.classList.remove('visible');
    document.body.style.overflow = '';
    customReferenceImages.forEach(function(img){ URL.revokeObjectURL(img.preview); });
    customReferenceImages = [];
}
customRequestClose.addEventListener('click', closeCustomRequest);
customRequestModal.addEventListener('click', function(e){ if (e.target === customRequestModal) closeCustomRequest(); });

customUploadZone.addEventListener('click', function(){ customFileInput.click(); });
customUploadZone.addEventListener('dragover', function(e){ e.preventDefault(); customUploadZone.classList.add('drag-over'); });
customUploadZone.addEventListener('dragleave', function(){ customUploadZone.classList.remove('drag-over'); });
customUploadZone.addEventListener('drop', function(e){ e.preventDefault(); customUploadZone.classList.remove('drag-over'); handleCustomFiles(e.dataTransfer.files); });
customFileInput.addEventListener('change', function(){ handleCustomFiles(customFileInput.files); customFileInput.value = ''; });

function handleCustomFiles(files) {
    for (var i = 0; i < files.length; i++) {
        if (customReferenceImages.length >= 5) { showToast('Maximum 5 reference images allowed', 'error'); break; }
        var f = files[i];
        if (!f.type.match(/^image\/(png|jpeg|webp)$/)) { showToast('"' + f.name + '" is not a supported format', 'error'); continue; }
        if (f.size > 5 * 1024 * 1024) { showToast('"' + f.name + '" exceeds 5MB', 'error'); continue; }
        customReferenceImages.push({ file: f, preview: URL.createObjectURL(f) });
    }
    renderCustomPreviews();
}

function removeCustomImage(index) {
    URL.revokeObjectURL(customReferenceImages[index].preview);
    customReferenceImages.splice(index, 1);
    renderCustomPreviews();
}

function renderCustomPreviews() {
    var container = document.getElementById('customUploadPreviews');
    container.innerHTML = customReferenceImages.map(function(img, i) {
        return '<div class="upload-preview">' +
            '<img src="' + img.preview + '" alt="Reference ' + (i+1) + '">' +
            '<button type="button" class="upload-preview-remove" data-rm="' + i + '" aria-label="Remove"><i class="fa-solid fa-xmark"></i></button>' +
            '<span class="upload-preview-order">' + (i+1) + '</span>' +
        '</div>';
    }).join('');
    container.querySelectorAll('[data-rm]').forEach(function(btn){
        btn.addEventListener('click', function(){ removeCustomImage(parseInt(btn.dataset.rm)); });
    });
}

document.getElementById('customRequestForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var name = document.getElementById('customName').value.trim();
    var email = document.getElementById('customEmail').value.trim();
    var desc = document.getElementById('customDescription').value.trim();
    var valid = true;

    ['customName','customEmail','customDescription'].forEach(function(id){
        document.getElementById(id + 'Error').textContent = '';
        document.getElementById(id).classList.remove('invalid');
    });

    if (!name) { document.getElementById('customNameError').textContent = 'Name is required'; document.getElementById('customName').classList.add('invalid'); valid = false; }
    if (!email || !/\S+@\S+\.\S+/.test(email)) { document.getElementById('customEmailError').textContent = 'Valid email is required'; document.getElementById('customEmail').classList.add('invalid'); valid = false; }
    if (!desc) { document.getElementById('customDescriptionError').textContent = 'Please describe what you want'; document.getElementById('customDescription').classList.add('invalid'); valid = false; }
    if (!valid) return;

    showToast('Custom request submitted! We\'ll be in touch soon.', 'success');
    closeCustomRequest();
});

/* ================================================================
   SEARCH
   ================================================================ */
var searchOverlay = document.getElementById('searchOverlay');
var searchInputEl = document.getElementById('searchInput');
var searchResultsEl = document.getElementById('searchResults');

function openSearch() { searchOverlay.classList.add('visible'); document.body.style.overflow='hidden'; setTimeout(function(){ searchInputEl.focus(); },100); }
function closeSearch() { searchOverlay.classList.remove('visible'); document.body.style.overflow=''; searchInputEl.value=''; searchResultsEl.innerHTML='<div class="search-popup-empty"><i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>Start typing to search our catalog</div>'; }

document.getElementById('navSearchBtn').addEventListener('click', openSearch);
searchOverlay.addEventListener('click', function(e){ if(e.target===searchOverlay) closeSearch(); });

searchInputEl.addEventListener('input', function() {
    var q = searchInputEl.value.toLowerCase().trim();
    if (!q) { searchResultsEl.innerHTML='<div class="search-popup-empty"><i class="fa-solid fa-magnifying-glass" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>Start typing to search our catalog</div>'; return; }
    var matches = allProducts.filter(function(p){ return p.name.toLowerCase().includes(q) || p.category.toLowerCase().includes(q) || (p.description||'').toLowerCase().includes(q); });
    if (!matches.length) { searchResultsEl.innerHTML='<div class="search-popup-empty" style="padding:36px 20px;text-align:center;"><i class="fa-solid fa-face-meh" style="font-size:1.5rem;display:block;margin-bottom:8px;"></i>No results for "'+escapeHtml(q)+'"</div>'; return; }
    searchResultsEl.innerHTML = matches.map(function(p){
        return '<div class="search-result-item" data-sid="'+p.id+'"><img class="search-result-thumb" src="'+escapeHtml(firstImage(p.images))+'" alt="'+escapeHtml(p.name)+'"><div class="search-result-info"><strong>'+escapeHtml(p.name)+'</strong><span>'+categoryLabel(p.category)+'</span></div><span class="search-result-price">'+formatPrice(p.price)+'</span></div>';
    }).join('');
    searchResultsEl.querySelectorAll('.search-result-item').forEach(function(item){
        item.addEventListener('click', function(){ closeSearch(); openProductDetail(item.dataset.sid); });
    });
});

/* ================================================================
   CART
   ================================================================ */
var cartOverlay = document.getElementById('cartOverlay');
var cartPanel = document.getElementById('cartPanel');
var cartBadge = document.getElementById('cartBadge');

function openCart() { cartPanel.classList.add('open'); cartOverlay.classList.add('visible'); document.body.style.overflow='hidden'; }
function closeCart() { cartPanel.classList.remove('open'); cartOverlay.classList.remove('visible'); document.body.style.overflow=''; }

document.getElementById('navCartBtn').addEventListener('click', function(){ 
    if(cart.length>0) openCart(); 
    else showToast('Your cart is empty — browse our catalog first!','info'); 
});
document.getElementById('cartPanelClose').addEventListener('click', closeCart);
document.getElementById('continueShoppingBtn').addEventListener('click', closeCart);
cartOverlay.addEventListener('click', closeCart);

function addToCart(productId) {
    var p = allProducts.find(function(x){ return x.id===productId; });
    if(!p) return;
    var existing = cart.find(function(i){ return i.id===productId; });
    if(existing) existing.qty++;
    else cart.push({ id:p.id, name:p.name, price:p.price, image:firstImage(p.images), qty:1 });
    renderCart();
    showToast(p.name+' added to cart','success');
    openCart();
}
function removeFromCart(id) { cart=cart.filter(function(i){return i.id!==id;}); renderCart(); if(!cart.length) closeCart(); }
function updateQty(id,d) { var item=cart.find(function(i){return i.id===id;}); if(!item) return; item.qty+=d; if(item.qty<=0){removeFromCart(id);return;} renderCart(); }

function renderCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    var totalItems = cart.reduce(function(s,i){return s+i.qty;},0);
    var subtotal = cart.reduce(function(s,i){return s+(i.price*i.qty);},0);
    cartBadge.textContent = totalItems;
    cartBadge.classList.toggle('visible', totalItems>0);
    document.getElementById('cartPanelCount').textContent = totalItems+' item'+(totalItems!==1?'s':'');
    document.getElementById('cartPanelFooter').style.display = cart.length?'':'none';
    document.getElementById('freeDeliveryNote').style.display = subtotal>=1500?'':'none';
    document.getElementById('cartSubtotal').textContent = formatPrice(subtotal);
    document.getElementById('cartTotal').textContent = formatPrice(subtotal);

    var body = document.getElementById('cartPanelBody');
    if(!cart.length){ body.innerHTML='<div class="cart-empty"><i class="fa-solid fa-bag-shopping"></i><h4>Your cart is empty</h4><p>Browse our catalog and add some beautiful hats!</p></div>'; return; }

    body.innerHTML = cart.map(function(item){
        return '<div class="cart-item"><img class="cart-item-image" src="'+escapeHtml(item.image)+'" alt="'+escapeHtml(item.name)+'"><div class="cart-item-info"><div class="cart-item-name">'+escapeHtml(item.name)+'</div><div class="cart-item-price">'+formatPrice(item.price*item.qty)+'</div><div class="cart-item-qty"><button data-qm="'+item.id+'" aria-label="Decrease"><i class="fa-solid fa-minus"></i></button><span>'+item.qty+'</span><button data-qp="'+item.id+'" aria-label="Increase"><i class="fa-solid fa-plus"></i></button></div></div><button class="cart-item-remove" data-rm="'+item.id+'" aria-label="Remove"><i class="fa-solid fa-trash-can"></i></button></div>';
    }).join('');

    body.querySelectorAll('[data-rm]').forEach(function(b){b.addEventListener('click',function(){removeFromCart(b.dataset.rm);});});
    body.querySelectorAll('[data-qm]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qm,-1);});});
    body.querySelectorAll('[data-qp]').forEach(function(b){b.addEventListener('click',function(){updateQty(b.dataset.qp,1);});});
}
renderCart();

document.getElementById('checkoutBtn').addEventListener('click', function(){
    if(!cart.length) return;
    window.location.href = '/api/users/manage_cart.php';
});

/* ================================================================
   NAV SCROLL & MOBILE MENU
   ================================================================ */
var nav = document.getElementById('nav');
window.addEventListener('scroll', function(){ nav.classList.toggle('scrolled', window.scrollY>20); });

var sections = document.querySelectorAll('header[id],section[id]');
var navLinks = document.querySelectorAll('.nav-links a');
function updateActiveNav() {
    var sp = window.scrollY + 120;
    sections.forEach(function(s){ var t=s.offsetTop,h=s.offsetHeight,id=s.getAttribute('id'); if(sp>=t&&sp<t+h){navLinks.forEach(function(l){l.classList.remove('active');if(l.getAttribute('href')==='#'+id)l.classList.add('active');});} });
}
window.addEventListener('scroll', updateActiveNav);

var mobileMenu = document.getElementById('mobileMenu');
var mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
function openMobileMenu(){mobileMenu.classList.add('open');mobileMenuOverlay.classList.add('visible');document.body.style.overflow='hidden';}
function closeMobileMenu(){mobileMenu.classList.remove('open');mobileMenuOverlay.classList.remove('visible');document.body.style.overflow='';}
document.getElementById('mobileMenuBtn').addEventListener('click', openMobileMenu);
document.getElementById('mobileMenuClose').addEventListener('click', closeMobileMenu);
mobileMenuOverlay.addEventListener('click', closeMobileMenu);
mobileMenu.querySelectorAll('a').forEach(function(l){l.addEventListener('click',closeMobileMenu);});

/* ================================================================
   ACCOUNT MODAL LOGIC
   ================================================================ */
var accountModal = document.getElementById('accountModal');
var accountClose = document.getElementById('accountClose');
var loginFormBox = document.getElementById('loginFormBox');
var registerFormBox = document.getElementById('registerFormBox');

// Open Modal
document.querySelectorAll('.btnAccount-popup').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        accountModal.classList.add('visible');
        document.body.style.overflow = 'hidden';
    });
});

// Close Modal
accountClose.addEventListener('click', function() {
    accountModal.classList.remove('visible');
    document.body.style.overflow = '';
});

accountModal.addEventListener('click', function(e) {
    if (e.target === accountModal) {
        accountModal.classList.remove('visible');
        document.body.style.overflow = '';
    }
});

// Switch to Register
document.querySelectorAll('.register-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        loginFormBox.classList.remove('active');
        registerFormBox.classList.add('active');
    });
});

// Switch to Login
document.querySelectorAll('.login-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        registerFormBox.classList.remove('active');
        loginFormBox.classList.add('active');
    });
});

// Handle Submits (Placeholder)
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('Login functionality is not yet connected to backend.', 'info');
    // accountModal.classList.remove('visible'); document.body.style.overflow = '';
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();
    showToast('Registration functionality is not yet connected to backend.', 'info');
    // accountModal.classList.remove('visible'); document.body.style.overflow = '';
});

/* ================================================================
   CONTACT FORM
   ================================================================ */
document.getElementById('contactForm').addEventListener('submit', function(e){
    e.preventDefault();
    var name=document.getElementById('contactName').value.trim(), email=document.getElementById('contactEmail').value.trim(), subject=document.getElementById('contactSubject').value, message=document.getElementById('contactMessage').value.trim(), valid=true;
    ['contactName','contactEmail','contactSubject','contactMessage'].forEach(function(id){document.getElementById(id+'Error').textContent='';document.getElementById(id).classList.remove('invalid');});
    if(!name){document.getElementById('contactNameError').textContent='Name is required';document.getElementById('contactName').classList.add('invalid');valid=false;}
    if(!email||!/\S+@\S+\.\S+/.test(email)){document.getElementById('contactEmailError').textContent='Please enter a valid email';document.getElementById('contactEmail').classList.add('invalid');valid=false;}
    if(!subject){document.getElementById('contactSubjectError').textContent='Please select a subject';document.getElementById('contactSubject').classList.add('invalid');valid=false;}
    if(!message){document.getElementById('contactMessageError').textContent='Message is required';document.getElementById('contactMessage').classList.add('invalid');valid=false;}
    if(!valid) return;
    document.getElementById('contactFormCard').innerHTML='<div class="contact-success"><i class="fa-solid fa-circle-check"></i><h4>Message Sent Successfully!</h4><p>Thank you, '+escapeHtml(name)+'. We\'ll get back to you within 24 hours.</p></div>';
    showToast('Your message has been sent!','success');
});

/* ================================================================
   KEYBOARD SHORTCUTS
   ================================================================ */
document.addEventListener('keydown', function(e){
    if(e.key==='Escape'){closeSearch();closeCart();closeProductDetail();closeCustomRequest();closeMobileMenu(); if(accountModal.classList.contains('visible')){accountModal.classList.remove('visible'); document.body.style.overflow='';}}
    if((e.ctrlKey||e.metaKey)&&e.key==='k'){e.preventDefault();openSearch();}
});
</script>
</body>
</html>