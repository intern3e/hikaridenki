<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PowerCare by Hikari — โซลูชันระบบไฟสำรองสำหรับองค์กร</title>
  <meta name="description" content="ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉินสำหรับองค์กร ติดตั้ง บำรุงรักษา ตรวจรับรอง และให้คำปรึกษา โดยทีมวิศวกรมากประสบการณ์กว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">
  <link rel="canonical" href="https://www.powercare.co.th/">

  <!-- Open Graph -->
  <meta property="og:title" content="PowerCare by Hikari — B2B Power Solutions">
  <meta property="og:description" content="โซลูชันระบบไฟสำรองและไฟฉุกเฉินแบบครบวงจรสำหรับองค์กร">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="th_TH">

  <!-- Tailwind & Icons -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand:#0b2a6b; --brand-2:#12336f; --accent:#f59e0b;
      --ink:#0f172a; --muted:#475569; --bg:#f8fafc; --line:#e6edf5;
      --glass-bg:rgba(255,255,255,.86); --ring:0 0 0 3px rgba(17,64,138,.18);
      --nav:#0b2a6b; --brand-hover:#facc15;
      --fs-2xs: clamp(10px, 0.28rem + 0.2vw, 12px);
      --fs-xs:  clamp(11px, 0.32rem + 0.35vw, 13px);
      --fs-sm:  clamp(12px, 0.36rem + 0.55vw, 14.5px);
      --fs-md:  clamp(14px, 0.42rem + 0.8vw, 17px);
      --fs-lg:  clamp(16px, 0.5rem + 1.2vw, 21px);
      --fs-xl:  clamp(18px, 0.6rem + 1.6vw, 26px);
      --fs-icon: clamp(20px, 1rem + 2vw, 28px);
    }
    html{scroll-behavior:smooth}
    body{font-family:system-ui,-apple-system,Segoe UI,Roboto,'Prompt',sans-serif;background:var(--bg);color:var(--ink)}
    .soft{box-shadow:0 8px 30px rgba(2,6,23,.08)}
    .card{transition:transform .2s ease, box-shadow .2s ease}
    .card:hover{transform:translateY(-2px); box-shadow:0 16px 46px rgba(2,6,23,.12)}
    .btn{display:inline-flex;align-items:center;gap:.5rem;border-radius:.75rem;font-weight:600}
    .btn-primary{background:var(--brand);color:#fff;padding:.5rem 1rem;transition:transform .15s ease, box-shadow .15s ease, opacity .15s ease}
    .btn-primary:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(11,42,107,.18);opacity:.98}
    .btn-ghost{border:1px solid rgba(2,6,23,.1);color:var(--brand)}
    .chip{padding:.35rem .6rem;border-radius:999px;border:1px solid rgba(2,6,23,.1);font-size:.8rem}

    .header-glass{background:var(--glass-bg);backdrop-filter:saturate(1.1) blur(8px);-webkit-backdrop-filter:saturate(1.1) blur(8px)}
    .header-glass.is-scrolled{background:rgba(255,255,255,.96);box-shadow:0 6px 24px rgba(15,23,42,.06)}
    .nav-link{position:relative;color:var(--nav);padding:.25rem .125rem;transition:color .2s ease;font-weight:500;letter-spacing:.2px;white-space:nowrap}
    .nav-link:hover{color:var(--brand)}
    .nav-link:focus-visible{outline:none;box-shadow:var(--ring);border-radius:10px}
    .nav-link[aria-current="page"]{color:var(--brand);font-weight:700}

    .dropdown{position:relative}
    .dropdown-toggle{display:inline-flex;align-items:center;gap:.4rem;padding:.25rem .125rem;color:var(--nav);font-weight:500;letter-spacing:.2px;transition:color .2s ease}
    .dropdown-toggle:hover{color:var(--brand)}
    .dropdown.open .dropdown-toggle{color:var(--brand)}
    .dropdown-toggle i{transition:transform .18s ease}
    .dropdown.open .dropdown-toggle i{transform:rotate(180deg)}
    .dropdown-panel{
      position:absolute;left:0;top:calc(100% + .75rem);width:min(75vw,780px);padding:14px;border-radius:16px;background:#fff;z-index:60;
      border:1px solid var(--line);box-shadow:0 22px 60px rgba(2,6,23,.14);display:none;max-height:70vh;overflow:auto;background-clip:padding-box;-webkit-overflow-scrolling:touch
    }
    .dropdown.open .dropdown-panel{display:block}
    .product-grid{display:grid;gap:6px 8px;grid-template-columns:repeat(3,minmax(0,1fr));justify-items:center;padding-bottom:6px}
    @media (max-width:992px){.product-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
    .product-link{display:block;width:86%;margin-inline:auto;text-decoration:none;color:var(--nav);font-weight:500;font-size:.88rem;line-height:1.25;letter-spacing:.01em;padding:5px;border-radius:6px;background:#fff;border:1.5px solid #e7edf5;transition:background .15s ease,border-color .15s ease,transform .12s ease,box-shadow .15s ease,color .15s ease}
    .product-link:hover{background:#f4f7fb;border-color:#dbe5f0;transform:translateY(-1px);box-shadow:0 8px 20px rgba(2,6,23,.06);color:var(--brand)}
    .product-link i{display:none!important}

    .drawer-backdrop{position:fixed;inset:0;background:rgba(2,6,23,.45);backdrop-filter:blur(2px);opacity:0;pointer-events:none;transition:opacity .22s ease;z-index:49}
    .drawer{position:fixed;top:0;right:0;height:100dvh;width:88vw;max-width:420px;background:#fff;border-left:1px solid var(--line);box-shadow:-28px 0 64px rgba(2,6,23,.14);transform:translateX(100%);transition:transform .25s ease;z-index:50;display:flex;flex-direction:column}
    .drawer.open{transform:translateX(0)} .drawer-backdrop.open{opacity:1;pointer-events:auto} .body-lock{overflow:hidden}
    .drawer-head{display:flex;align-items:center;justify-content:space-between;gap:8px;padding:14px 16px;border-bottom:1px solid var(--line);background:#fff;position:sticky;top:0;z-index:2}
    .drawer-title{font-weight:800;color:var(--ink);letter-spacing:.2px}
    .drawer-section{padding:14px 16px}
    .menu-list{display:grid;gap:8px}
    .menu-item{display:flex;align-items:center;justify-content:space-between;gap:10px;padding:14px 12px;border-radius:12px;color:var(--nav);font-weight:500;letter-spacing:.2px;text-decoration:none;transition:background .15s ease,color .15s ease,transform .12s ease}
    .menu-item:hover{background:#f8fafc;color:var(--brand);transform:translateX(2px)}
    .collapse-toggle{width:100%;display:flex;align-items:center;justify-content:space-between;gap:10px;padding:14px 12px;border-radius:12px;background:#f8fafc;border:1px solid #ebf0f6;font-weight:500;letter-spacing:.2px;color:var(--nav)}
    .collapse-toggle[aria-expanded="true"]{color:var(--brand)}
    .collapse-panel{margin-top:10px;border:1px solid #ebf0f6;border-radius:12px;padding:10px;max-height:0;overflow:hidden;transition:max-height .25s ease}
    .collapse-panel.open{max-height:60vh;overflow:auto}
    .sub-list{display:grid;grid-template-columns:1fr;gap:6px}
    .sub-item{display:block;padding:10px;border-radius:8px;color:var(--nav);text-decoration:none;font-weight:500;letter-spacing:.2px}
    .sub-item:hover{background:#eef2f7;color:var(--brand)}
    .action-card{display:flex;align-items:center;gap:12px;padding:12px 14px;min-height:48px;border-radius:999px;background:#fff;border:1px solid var(--line);color:var(--ink);font-weight:800;text-decoration:none;transition:transform .12s ease,box-shadow .15s ease,border-color .15s ease,background .15s ease}
    .action-card:hover{transform:translateY(-1px);box-shadow:0 10px 22px rgba(2,6,23,.08);border-color:#dbe5f0;background:#f8fafc}
    .icon-bubble{width:34px;height:34px;border-radius:999px;display:grid;place-items:center;flex:0 0 auto;background:#eef2ff;border:1px solid #e2e8f0}
    .drawer-footer{margin-top:auto;padding:16px;padding-bottom:max(16px, env(safe-area-inset-bottom));border-top:1px solid var(--line);background:#fff}
    .btn-rfq{width:100%;display:flex;align-items:center;justify-content:center;gap:10px;padding:16px 18px;min-height:54px;border-radius:18px;font-weight:900;background:linear-gradient(180deg,var(--brand-2),var(--brand));color:#fff;text-decoration:none;box-shadow:0 10px 26px rgba(11,42,107,.22)}
    .btn-rfq:hover{color:var(--brand-hover)}
    @media (min-width:768px){#mDrawer,#mBackdrop{display:none!important}}

    .header-glass .nav-link,
    .header-glass .dropdown-toggle,
    .header-glass .dropdown-panel,
    .header-glass .product-link span{font-size:var(--fs-sm);line-height:1.45}
    .header-glass .brand-title{font-size:var(--fs-xl);line-height:1.1;letter-spacing:.01em}
    .header-glass .subbrand{font-size:var(--fs-xs);color:#64748b}
    .header-glass .desk-cta a,
    .header-glass .desk-cta .btn{font-size:var(--fs-sm);line-height:1.4}
    #menuBtn{font-size:var(--fs-icon)}
    .header-glass i.bi{font-size:1em}

    @media (prefers-reduced-motion: reduce){
      .card,.soft,.drawer,.drawer-backdrop,.dropdown-panel,.collapse-panel{transition:none!important}
      html{scroll-behavior:auto}
    }
  </style>

  {{-- JSON-LD --}}
  @php
    $schema = [
      '@context' => 'https://schema.org',
      '@type' => 'Organization',
      'name' => 'PowerCare by Hikari',
      'url' => url('/'),
      'logo' => asset('storage/logo/PNG.png'),
      'contactPoint' => [
        '@type' => 'ContactPoint',
        'telephone' => '+66-99-080-2197',
        'contactType' => 'customer service',
        'areaServed' => 'TH',
      ],
    ];
  @endphp
  <script type="application/ld+json">
    {!! json_encode($schema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}
  </script>

  <script>
    // ====== LINE opener ======
    function openLINE(el){
      var rawId = (el.getAttribute('data-line-id') || el.getAttribute('data-lineid') || '@543ubjtx').trim();
      var id = rawId.startsWith('@') ? rawId : ('@' + rawId);
      var webURL = 'https://line.me/R/ti/p/' + encodeURIComponent(id);
      var scheme = 'line://ti/p/' + id;
      var ua = navigator.userAgent || '';
      var isiOS = /iP(hone|od|ad)/.test(ua);
      var isAndroid = /Android/i.test(ua);
      var isChrome = /Chrome|CriOS/i.test(ua);
      var opened=false;
      function fallback(){ if(!opened){ opened=true; window.open(webURL,'_blank','noopener'); } }
      var t = setTimeout(fallback, 1200);
      document.addEventListener('visibilitychange', function onVis(){ if(document.hidden){ clearTimeout(t); document.removeEventListener('visibilitychange', onVis);} });
      try{
        if(isiOS){ window.location.href = scheme; return false; }
        if(isAndroid && isChrome){
          var intent='intent://ti/p/'+encodeURIComponent(id)+'#Intent;scheme=line;package=jp.naver.line.android;S.browser_fallback_url='+encodeURIComponent(webURL)+';end';
          window.location.href=intent; clearTimeout(t); return false;
        }
        window.location.href = scheme; return false;
      }catch(e){ clearTimeout(t); fallback(); return false; }
    }

    // ====== RFQ opener — เปิดแท็บใหม่เสมอ (Gmail → mailto fallback) ======
    function openRFQ(evt){
      if (evt && evt.preventDefault) evt.preventDefault();

      const to = 'Info@hikaridenki.co.th';
      const subject = 'ขอใบเสนอราคา จาก PowerCare by Hikari';

      let prod = '';
      try{
        const raw = (document.title || '').split('|')[0].trim();
        if (raw && !/PowerCare by Hikari/i.test(raw)) prod = raw;
      }catch(_){}

      const lines = [
        'สวัสดีทีมงาน Hikari,',
        '',
        'ต้องการขอใบเสนอราคาสำหรับ:',
        '- รายการ/รุ่นสินค้า:' + (prod ? ' ' + prod : ''),
        '- จำนวน:',
        '- ชื่อบริษัท/ผู้ติดต่อ:',
        '- เบอร์โทร:',
        '- ที่อยู่จัดส่ง:',
        '',
        'ขอบคุณครับ/ค่ะ'
      ];
      const body = lines.join('\n');

      const gmail = 'https://mail.google.com/mail/?view=cm&fs=1'
        + '&to='   + encodeURIComponent(to)
        + '&su='   + encodeURIComponent(subject)
        + '&body=' + encodeURIComponent(body);

      const mailto = 'mailto:' + encodeURIComponent(to)
        + '?subject=' + encodeURIComponent(subject)
        + '&body='    + encodeURIComponent(body);

      let win = window.open(gmail, '_blank', 'noopener,noreferrer');

      if (!win) {
        const a = document.createElement('a');
        a.href = gmail; a.target = '_blank'; a.rel = 'noopener'; a.style.display='none';
        document.body.appendChild(a); a.click(); a.remove();
      }

      setTimeout(() => {
        try{
          if (document.visibilityState === 'visible') {
            window.open(mailto, '_blank', 'noopener');
          }
        }catch(_){}
      }, 800);

      return false;
    }

    // ====== Email opener สำหรับ Info@... — เปิดแท็บใหม่เสมอ ======
    function openEmail(evt, to, subject = '', body = ''){
      if (evt && evt.preventDefault) evt.preventDefault();

      const gmail = 'https://mail.google.com/mail/?view=cm&fs=1'
        + '&to=' + encodeURIComponent(to)
        + (subject ? '&su=' + encodeURIComponent(subject) : '')
        + (body    ? '&body=' + encodeURIComponent(body)    : '');

      const mailto = 'mailto:' + encodeURIComponent(to)
        + (subject || body ? '?' : '')
        + (subject ? 'subject=' + encodeURIComponent(subject) : '')
        + (subject && body ? '&' : '')
        + (body ? 'body=' + encodeURIComponent(body) : '');

      let win = window.open(gmail, '_blank', 'noopener,noreferrer');

      if (!win) {
        const a = document.createElement('a');
        a.href = gmail; a.target = '_blank'; a.rel = 'noopener'; a.style.display='none';
        document.body.appendChild(a); a.click(); a.remove();
      }

      setTimeout(() => {
        try{
          if (document.visibilityState === 'visible') {
            window.open(mailto, '_blank', 'noopener');
          }
        }catch(_){}
      }, 700);

      return false;
    }
  </script>
</head>

<body>
  <script defer src="/assets/boot.js?v=1"></script>
  <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-blue-700 px-3 py-2 rounded-md shadow">ข้ามไปยังเนื้อหา</a>

  <!-- ===== Header ===== -->
  <header class="header-glass sticky top-0 z-50 border-b border-slate-200" id="siteHeader">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-3 flex items-center gap-3">
      <!-- Brand -->
      <a href="{{ url('/') }}" class="flex items-center gap-2" aria-label="หน้าแรก PowerCare">
        <img src="{{ asset('storage/logo/PNG.png') }}" alt="PowerCare" class="w-9 h-9 object-contain" loading="eager" decoding="async" fetchpriority="high">
        <span class="brand-title font-bold" style="color:var(--brand)">PowerCare</span>
        <span class="subbrand">by Hikari</span>
      </a>

      <!-- Desktop nav -->
      <nav class="hidden md:flex items-center gap-6 ml-8 font-medium" aria-label="เมนูหลัก">
        <a href="{{ url('/') }}" class="nav-link">HOME</a>

        <!-- PRODUCT dropdown -->
        <div class="dropdown" id="productDropdown">
          <button class="dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false" aria-controls="productPanel">
            PRODUCT <i class="bi bi-chevron-down" aria-hidden="true"></i>
          </button>
          <div class="dropdown-panel" id="productPanel" role="menu" aria-label="Product list">
            <div class="product-grid">
              <a class="product-link" href="{{ url('showproduct') }}"><span>สินค้าทั้งหมด</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=MAKITA"><span>MAKITA</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=NANABOSHI"><span>NANABOSHI</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KRANZLE"><span>KRANZLE</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=MITSUBISHI"><span>MITSUBISHI</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=SPARE%20PART%20PUMP"><span>SPARE PART PUMP</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=SEALAND"><span>SEALAND</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=TOYO"><span>TOYO</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=SUPER-X"><span>SUPER-X</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=MARUYAMA"><span>MARUYAMA</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=MAKTEC"><span>MAKTEC</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=SUPER%20PUMP"><span>SUPER PUMP</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=BELLPONY"><span>BELLPONY</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KOGU"><span>KOGU</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=AXEMAN"><span>AXEMAN</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=HITACHI"><span>HITACHI</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KING"><span>KING</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=SPARE%20PART%20MOTOR"><span>SPARE PART MOTOR</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=REX"><span>REX</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=HF"><span>HF</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=TSURUMI"><span>TSURUMI</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=Gear-Cyclo%20Drive"><span>Gear-Cyclo Drive</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=TAIHOKOHZAI"><span>TAIHOKOHZAI</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=Gear-Helical"><span>Gear-Helical</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=ICHINEN"><span>ICHINEN</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=ELEPHANT"><span>ELEPHANT</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=HERO"><span>HERO</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=HUZEY"><span>HUZEY</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=IWARA"><span>IWARA</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=WINNER"><span>WINNER</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=JSAP"><span>JSAP</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=PICUS"><span>PICUS</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=mitsubishi-premium"><span>mitsubishi-premium</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=NKC"><span>NKC</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KF"><span>KF</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KSU"><span>KSU</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=KYOWA"><span>KYOWA</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=LEOU-N"><span>LEOU-N</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=TDK"><span>TDK</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=E-WELD"><span>E-WELD</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=HONDA"><span>HONDA</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=OP"><span>OP</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=MASADA%20JACK"><span>MASADA JACK</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=Non-Automatic%20Pump"><span>Non-Automatic Pump</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=IWOOD"><span>IWOOD</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=Refrigerator"><span>Refrigerator</span></a>
              <a class="product-link" href="{{ url('showproduct') }}?brand=X-WELD"><span>X-WELD</span></a>
            </div>
          </div>
        </div>
      </nav>

      <!-- Desktop CTAs -->
      <div class="hidden md:flex items-center gap-5 ml-auto desk-cta">
        <a href="tel:+66990802197" class="flex items-center gap-2 hover:text-blue-700" rel="nofollow noopener"><i class="bi bi-telephone" aria-hidden="true"></i> 099-080-2197</a>

        <!-- อีเมล: เปิดแท็บใหม่เสมอ -->
        <a href="mailto:Info@hikaridenki.co.th"
           class="flex items-center gap-2 hover:text-blue-700"
           rel="nofollow noopener"
           onclick="return openEmail(event, 'Info@hikaridenki.co.th');">
          <i class="bi bi-envelope" aria-hidden="true"></i> Info@hikaridenki.co.th
        </a>

        <a href="https://line.me/R/ti/p/@543ubjtx" class="flex items-center gap-2 hover:text-green-600" aria-label="เพิ่มเพื่อน LINE @543ubjtx" rel="noopener" onclick="return openLINE(this)" data-line-id="@543ubjtx">
          <i class="bi bi-chat-dots" aria-hidden="true"></i> LINE
        </a>

        <!-- ปุ่ม RFQ ใช้ JS (เปิดแท็บใหม่เสมอ) -->
        <a href="#rfq" onclick="return openRFQ(event);" class="btn btn-primary" rel="noopener">
          <i class="bi bi-send" aria-hidden="true"></i> ขอใบเสนอราคา
        </a>
      </div>

      <!-- Mobile menu button -->
      <button id="menuBtn" class="md:hidden ml-auto" aria-label="เปิดเมนู" aria-controls="mDrawer" aria-expanded="false">
        <i class="bi bi-list" aria-hidden="true"></i>
      </button>
    </div>
  </header>

  <!-- ===== Backdrop + Drawer (Mobile) ===== -->
  <div id="mBackdrop" class="drawer-backdrop" hidden></div>

  <aside id="mDrawer"
         class="drawer"
         role="dialog"
         aria-modal="true"
         aria-labelledby="mDrawerTitle"
         aria-hidden="true">
    <div class="drawer-head">
      <div class="drawer-title" id="mDrawerTitle">เมนู</div>
      <button id="mClose" class="drawer-close" aria-label="ปิดเมนู">
        <i class="bi bi-x-lg" aria-hidden="true"></i>
      </button>
    </div>

    <section class="drawer-section">
      <nav class="menu-list" aria-label="เมนูมือถือ">
        <a href="{{ url('/') }}" class="menu-item">HOME <i class="bi bi-chevron-right" aria-hidden="true"></i></a>

        <!-- PRODUCT Accordion (Mobile) -->
        <button class="collapse-toggle" type="button" id="mProdToggle" aria-expanded="false" aria-controls="mProdPanel">
          PRODUCT <i class="bi bi-chevron-down" aria-hidden="true"></i>
        </button>
        <div id="mProdPanel" class="collapse-panel" role="region" aria-label="Product list">
          <div class="sub-list">
            <a class="sub-item" href="{{ url('showproduct') }}">สินค้าทั้งหมด</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=MAKITA">MAKITA</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=NANABOSHI">NANABOSHI</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KRANZLE">KRANZLE</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=MITSUBISHI">MITSUBISHI</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=SPARE%20PART%20PUMP">SPARE PART PUMP</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=SEALAND">SEALAND</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=TOYO">TOYO</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=SUPER-X">SUPER-X</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=MARUYAMA">MARUYAMA</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=MAKTEC">MAKTEC</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=SUPER%20PUMP">SUPER PUMP</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=BELLPONY">BELLPONY</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KOGU">KOGU</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=AXEMAN">AXEMAN</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=HITACHI">HITACHI</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KING">KING</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=SPARE%20PART%20MOTOR">SPARE PART MOTOR</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=REX">REX</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=HF">HF</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=TSURUMI">TSURUMI</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=Gear-Cyclo%20Drive">Gear-Cyclo Drive</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=TAIHOKOHZAI">TAIHOKOHZAI</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=Gear-Helical">Gear-Helical</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=ICHINEN">ICHINEN</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=ELEPHANT">ELEPHANT</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=HERO">HERO</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=HUZEY">HUZEY</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=IWARA">IWARA</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=WINNER">WINNER</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=JSAP">JSAP</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=PICUS">PICUS</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=mitsubishi-premium">mitsubishi-premium</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=NKC">NKC</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KF">KF</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KSU">KSU</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=KYOWA">KYOWA</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=LEOU-N">LEOU-N</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=TDK">TDK</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=E-WELD">E-WELD</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=HONDA">HONDA</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=OP">OP</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=MASADA%20JACK">MASADA JACK</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=Non-Automatic%20Pump">Non-Automatic Pump</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=IWOOD">IWOOD</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=Refrigerator">Refrigerator</a>
            <a class="sub-item" href="{{ url('showproduct') }}?brand=X-WELD">X-WELD</a>
          </div>
        </div>
      </nav>
    </section>

    <section class="drawer-section">
      <a href="tel:+66990802197" class="action-card" aria-label="โทร 099-080-2197" rel="nofollow noopener">
        <span class="icon-bubble"><i class="bi bi-telephone-fill" aria-hidden="true"></i></span><span>099-080-2197</span>
      </a>
      <div style="height:10px"></div>

      <!-- อีเมล (มือถือ): เปิดแท็บใหม่เสมอ -->
      <a href="mailto:Info@hikaridenki.co.th"
         class="action-card"
         aria-label="อีเมลติดต่อ"
         rel="nofollow noopener"
         onclick="return openEmail(event, 'Info@hikaridenki.co.th');">
        <span class="icon-bubble"><i class="bi bi-envelope-fill" aria-hidden="true"></i></span><span>Info@hikaridenki.co.th</span>
      </a>

      <div style="height:10px"></div>
      <a href="https://line.me/R/ti/p/@543ubjtx" class="action-card" aria-label="เพิ่มเพื่อน LINE @543ubjtx" onclick="return openLINE(this)" data-line-id="@543ubjtx" rel="noopener">
        <span class="icon-bubble"><i class="bi bi-chat-dots" aria-hidden="true"></i></span><span>LINE</span>
      </a>
    </section>

    <div class="drawer-footer">
      <!-- ปุ่ม RFQ (Mobile) -->
      <a href="#rfq" onclick="return openRFQ(event);" class="btn-rfq" rel="noopener">
        <i class="bi bi-send-fill" aria-hidden="true"></i><span>ขอใบเสนอราคา</span>
      </a>
    </div>
  </aside>

  <!-- ===== Header scripts (dropdown + drawer) ===== -->
  <script>
  document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const header = document.getElementById('siteHeader');
    const onScroll = () => { if (window.scrollY > 6) header.classList.add('is-scrolled'); else header.classList.remove('is-scrolled'); };
    onScroll(); document.addEventListener('scroll', onScroll, {passive:true});

    try{
      const path = location.pathname.replace(/\/+$/,'') || '/';
      document.querySelectorAll('nav[aria-label="เมนูหลัก"] .nav-link').forEach(a=>{
        const href=(a.getAttribute('href')||'').replace(/\/+$/,'')||'/';
        if (href === path) a.setAttribute('aria-current','page');
      });
    }catch(_){}

    const dd = document.getElementById('productDropdown');
    if (dd){
      const ddBtn   = dd.querySelector('.dropdown-toggle');
      const ddPanel = dd.querySelector('.dropdown-panel');

      const openDD  = () => { dd.classList.add('open'); ddBtn.setAttribute('aria-expanded','true'); };
      const closeDD = () => { dd.classList.remove('open'); ddBtn.setAttribute('aria-expanded','false'); };
      const toggleDD= (e) => { e.preventDefault(); dd.classList.contains('open') ? closeDD() : openDD(); };

      ddBtn.addEventListener('click', (e)=>{ e.stopPropagation(); toggleDD(e); });
      ddPanel.addEventListener('click', (e)=> e.stopPropagation());
      document.addEventListener('click', (e)=>{ if(!dd.contains(e.target)) closeDD(); });
      document.addEventListener('keydown', (e)=>{ if(e.key==='Escape') closeDD(); });
    }

    const btn = document.getElementById('menuBtn');
    const drawer = document.getElementById('mDrawer');
    const backdrop = document.getElementById('mBackdrop');
    const closeBtn = document.getElementById('mClose');
    let lastFocus = null;
    const focusablesSelector = 'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])';
    const getFocusables = () => drawer ? Array.from(drawer.querySelectorAll(focusablesSelector)) : [];

    function openDrawer(){
      lastFocus = document.activeElement;
      drawer.classList.add('open'); drawer.setAttribute('aria-hidden','false');
      backdrop.classList.add('open'); backdrop.hidden = false;
      btn.setAttribute('aria-expanded','true'); body.classList.add('body-lock');
      const f = getFocusables(); if (f.length) f[0].focus();
      btn.innerHTML = '<i class="bi bi-x-lg" aria-hidden="true"></i>';
    }
    function closeDrawer(){
      drawer.classList.remove('open'); drawer.setAttribute('aria-hidden','true');
      backdrop.classList.remove('open'); setTimeout(()=>{ backdrop.hidden = true; }, 200);
      btn.setAttribute('aria-expanded','false'); body.classList.remove('body-lock');
      btn.innerHTML = '<i class="bi bi-list" aria-hidden="true"></i>';
      lastFocus && lastFocus.focus?.();
    }

    btn?.addEventListener('click', () => drawer.classList.contains('open') ? closeDrawer() : openDrawer());
    closeBtn?.addEventListener('click', closeDrawer);
    backdrop?.addEventListener('click', closeDrawer);
    drawer?.addEventListener('click', (e) => { const a = e.target.closest('a'); if (a) closeDrawer(); });
    drawer?.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') { e.preventDefault(); closeDrawer(); return; }
      if (e.key === 'Tab') {
        const f = getFocusables(); if (!f.length) return;
        const first = f[0], last = f[f.length - 1];
        if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
        else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });
    window.addEventListener('resize', () => { if (window.innerWidth >= 768 && drawer.classList.contains('open')) closeDrawer(); });

    const mToggle = document.getElementById('mProdToggle');
    const mPanel  = document.getElementById('mProdPanel');
    mToggle?.addEventListener('click', ()=>{
      const isOpen = mPanel.classList.toggle('open');
      mToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  });
  </script>
</body>
</html>
