<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PowerCare by Hikari</title>

  <meta name="description" content="PowerCare by Hikari — ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉิน ครบวงจร ติดตั้ง บำรุงรักษา และที่ปรึกษา โดยทีมงานมืออาชีพมากกว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <meta property="og:title" content="PowerCare by Hikari">
  <meta property="og:description" content="โซลูชันระบบไฟสำรองและไฟฉุกเฉินแบบครบวงจร โดยทีมงานมืออาชีพ">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="th_TH">
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/Gemini_Generated_Image_44k6m544k6m544k6.png') }}">
  <link rel="canonical" href="https://www.powercare.co.th/">

  <!-- Preload key image -->
  <link rel="preload" as="image" href="{{ asset('storage/logo/20.png') }}">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Swiper -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- PDF.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js"></script>

  <style>
    :root{
      --brand:#0b2a6b;
      --brand-2:#1552a7;
      --accent:#f59e0b;
      --ink:#0f172a;
      --muted:#475569;
      --surface:#ffffff;
      --shadow:0 10px 24px rgba(2,6,23,.10);
    }

    html{ scroll-behavior:smooth; }
    body{ font-family:'Prompt',sans-serif; color:var(--ink); background:#f8fafc; }

    /* ---------- Elevation & motion ---------- */
    .soft{ box-shadow: 0 6px 20px rgba(2,6,23,.08), 0 2px 10px rgba(2,6,23,.06); }
    .card{ transition: transform .2s ease, box-shadow .2s ease; }
    .card:hover{ transform: translateY(-2px); box-shadow: 0 14px 40px rgba(2,6,23,.12); }

    /* ---------- Buttons ---------- */
    .btn{ display:inline-flex; align-items:center; gap:.5rem; padding:.75rem 1.1rem; border-radius:14px; font-weight:600; line-height:1; }
    .btn:focus-visible{ outline:none; box-shadow:0 0 0 4px rgba(14,165,233,.25); }
    .btn-primary{ background:linear-gradient(135deg,var(--brand),var(--brand-2)); color:#fff; }
    .btn-primary:hover{ filter:brightness(1.05); }
    .btn-outline{ border:1px solid rgba(255,255,255,.7); color:#fff; }
    .btn-outline:hover{ background:rgba(255,255,255,.12); }

    /* ---------- Header on scroll ---------- */
    header{ background:rgba(255,255,255,.88); backdrop-filter: blur(10px); border-bottom:1px solid rgba(2,6,23,.06); }
    .header-scrolled{ box-shadow:0 8px 22px rgba(2,6,23,.10); }

    /* ---------- Partner logos ---------- */
    .brand-logo{ filter:none; opacity:1; transition: transform .18s ease, opacity .18s ease; }
    .brand-logo:hover{ transform: translateY(-3px); }

    /* ======= PDF VIEWER LAYOUT ======= */
    #pdfViewport{
      min-height: 90vh;
      padding-bottom: 72px;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #94a3b8 #f1f5f9;
      background: transparent;
      border-radius: 12px;
    }
    .a4-page{
      width: 100%;
      max-width: 210mm;
      aspect-ratio: 1 / 1.41421356;
      background:#fff;
      border-radius:12px;
      box-shadow:var(--shadow);
      margin: 0 auto 32px;
      position:relative;
      overflow:hidden;
    }
    .a4-fit{
      position:absolute; inset:0;
      padding:12mm 10mm;
      display:flex; align-items:center; justify-content:center;
    }
    .a4-fit > canvas{
      max-width:100%; max-height:100%;
      width:auto; height:auto; display:block; border-radius:8px;
    }
    .page-meta{
      position:absolute; right:10px; bottom:8px;
      font-size:12px; color:#64748b; background:#ffffffcc;
      padding:2px 8px; border-radius:999px
    }
    .loader {
      border: 4px solid #e5e7eb;
      border-top: 4px solid var(--brand);
      border-radius: 50%;
      width: 36px; height: 36px;
      animation: spin 0.9s linear infinite;
      margin: 20px auto;
    }
    @keyframes spin { to { transform: rotate(360deg); } }

    @media (max-width:640px){
      #pdfViewport{ min-height: 82vh; padding-bottom: 96px; }
      .a4-fit{ padding:10mm 8mm; }
    }

    @media print{
      @page{ size:A4; margin:10mm; }
      body{ background:#fff }
      .a4-page{ box-shadow:none; margin:0 0 8mm 0; }
      header, aside, footer, #floating-buttons{ display:none !important; }
      #pdfViewport{ min-height:auto !important; padding:0 !important; overflow:visible !important; }
    }

    /* ========== Floating Buttons (STACK — แสดงตั้งแต่แรก) ========== */
    #floating-buttons{
      position: fixed;
      right: 18px;
      bottom: calc(18px + env(safe-area-inset-bottom, 0px));
      display: flex;
      flex-direction: column;
      gap: 16px;
      z-index: 9999;

      /* แสดงตั้งแต่โหลดหน้า */
      opacity: 1 !important;
      pointer-events: auto !important;
      transform: none !important;
      transition: .25s ease;
    }

    .fb-circle{
      width: 56px; height: 56px;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 8px 20px rgba(2,6,23,.16);
      transition: transform .2s ease, box-shadow .2s ease;
      will-change: transform;
      background:#fff0;
    }
    .fb-circle:hover{ transform: translateY(-1px); box-shadow: 0 12px 28px rgba(2,6,23,.18); }

    .fb-line{ background:#fff; }
    .fb-line img{ width:40px; height:40px; object-fit:contain; display:block; }

    /* ปุ่มขึ้นบนในสแต็ก */
    #floating-buttons #toTop{
      background:#0b2a6b; color:#fff; border:none;
      font-size:22px; line-height:1; cursor:pointer;
      position: static;
    }
  </style>
</head>
<body id="top">

  <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-blue-700 px-3 py-2 rounded-md shadow">ข้ามไปยังเนื้อหา</a>

  <!-- ===== Header ===== -->
  <header class="sticky top-0 z-50 transition-all bg-white shadow" role="banner">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3.5 px-4 md:px-6">
      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        <img src="{{ asset('storage/logo/Gemini_Generated_Image_44k6m544k6m544k6.png') }}" alt="PowerCare logo"
             class="w-8 h-8 object-contain" loading="eager" decoding="async" fetchpriority="high">
        <span class="font-bold text-xl" style="color:var(--brand)">PowerCare</span>
        <span class="text-sm text-slate-500">by Hikari</span>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium ml-auto mr-6">
        <a href="/" class="hover:text-blue-700">HOME</a>
        <a href="Product" class="hover:text-blue-700">PRODUCT</a>
      </nav>

      <!-- CTA (desktop) -->
      <div class="hidden md:flex items-center gap-6 text-sm text-slate-700">
        <a href="tel:+6620000000" class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-telephone"></i> 099-080-2197
        </a>
        <a href="mailto:powercarebyhikari@gmail.com" class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-envelope"></i> powercarebyhikari@gmail.com
        </a>
        <a href="#contact" class="btn btn-primary">
          <i class="bi bi-send"></i> Contact
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <div class="md:hidden">
        <button id="menuToggle" class="text-slate-700 text-2xl" aria-label="Toggle menu">
          <i class="bi bi-list"></i>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <nav id="mobileMenu" class="hidden md:hidden bg-blue-50 border-t text-sm font-medium flex justify-center gap-6 py-3">
      <a href="/" class="hover:text-blue-700">HOME</a>
      <a href="Product" class="hover:text-blue-700">PRODUCT</a>
      <a href="#contact" class="btn btn-primary text-xs px-3 py-1">
        <i class="bi bi-chat-dots"></i> Contact
      </a>
    </nav>

    <!-- Compact contact (Mobile bottom bar) -->
    <div class="md:hidden bg-blue-100 text-blue-900 text-xs px-4 py-2 flex items-center justify-center gap-4">
      <a href="tel:+6620000000" class="flex items-center gap-1">
        <i class="bi bi-telephone-fill"></i> 099-080-2197
      </a>
      <a href="mailto:powercarebyhikari@gmail.com" class="flex items-center gap-1">
        <i class="bi bi-envelope-fill"></i> powercarebyhikari@gmail.com
      </a>
    </div>
  </header>

  <script>
    // Toggle mobile menu
    document.getElementById("menuToggle").addEventListener("click", function(){
      document.getElementById("mobileMenu").classList.toggle("hidden");
    });
  </script>

   <!-- ===== Layout: ซ้ายเมนู / ขวาเอกสาร (Responsive) ===== -->
   <main id="main" class="max-w-7xl mx-auto px-3 md:px-6 py-6 grid grid-cols-1 md:grid-cols-[320px,1fr] gap-6">

<!-- ===== ซ้าย: หมวดหมู่ ===== -->
<aside class="bg-white rounded-xl shadow p-4 md:sticky md:top-20 h-max text-[#0b2a6b]">

  <!-- ✅ Mobile: Accordion -->
  <div class="md:hidden">
    <details class="border-b py-2">
      <summary class="cursor-pointer font-semibold text-base flex justify-between items-center">
        UPS เครื่องสำรองไฟ <i class="bi bi-chevron-down"></i>
      </summary>
      <ul class="list-none mt-2 space-y-2 text-sm">
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/UPS/APC/APC Easy UPS Single Phase Family Brochure.pdf') }}')">APC</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/UPS/CyberPower/CyberPower_CL_UPS-2016.pdf') }}')">CyberPower</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/UPS/Delta/Delta-UPS-en-us.pdf') }}')">Delta</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/UPS/Eaton/eaton_ups_product_catalogue_en-gb-anz.pdf') }}')">Eaton</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/UPS/Vertiv/Vertiv-ups-catalogue-en.pdf') }}')">Vertiv</button></li>
      </ul>
    </details>

    <details class="border-b py-2">
      <summary class="cursor-pointer font-semibold text-base flex justify-between items-center">
        ไฟฉุกเฉินและป้ายหนีไฟ <i class="bi bi-chevron-down"></i>
      </summary>
      <ul class="list-none mt-2 space-y-2 text-sm">
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Emergency/Dyno/Dyno ไฟฉุกเฉิน Cover-front.pdf') }}')">Dyno</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Emergency/Maxbright/MaxBright  ไฟฉุกเฉิน.pdf') }}')">Maxbright</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Emergency/Sunny/Sunny-Catalog_2024.pdf') }}')">Sunny</button></li>
      </ul>
    </details>

    <details class="py-2">
      <summary class="cursor-pointer font-semibold text-base flex justify-between items-center">
        แบตเตอรี่ <i class="bi bi-chevron-down"></i>
      </summary>
      <ul class="list-none mt-2 space-y-2 text-sm">
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LHR Series ups.pdf') }}')">Leoch LHR Series ups</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LP Series Battery.pdf') }}')">Leoch LP Series Battery</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch XP -series-sheet_july-2024.pdf') }}')">Leoch XP -series</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long IDCUPS_Batteries.pdf') }}')">Long IDCUPS_Batteries</button></li>
        <li><button class="block w-full text-left py-2 px-3 rounded hover:bg-blue-50"
          onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long Sealed_Lead_Acid_Batteries.pdf') }}')">Long Sealed_Lead_Acid</button></li>
      </ul>
    </details>
  </div>

  <!-- ✅ Desktop: Sidebar เดิม -->
  <div class="hidden md:block">
    <details open class="border-b py-2">
      <summary class="cursor-pointer font-semibold text-base">UPS เครื่องสำรองไฟ</summary>
      <ul class="list-none mt-2 space-y-1 text-sm">
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/UPS/APC/APC Easy UPS Single Phase Family Brochure.pdf') }}')">APC</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/UPS/CyberPower/CyberPower_CL_UPS-2016.pdf') }}')">CyberPower</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/UPS/Delta/Delta-UPS-en-us.pdf') }}')">Delta</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/UPS/Eaton/eaton_ups_product_catalogue_en-gb-anz.pdf') }}')">Eaton</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/UPS/Vertiv/Vertiv-ups-catalogue-en.pdf') }}')">Vertiv</button></li>
      </ul>
    </details>

    <details open class="border-b py-2">
      <summary class="cursor-pointer font-semibold text-base">ไฟฉุกเฉินและป้ายหนีไฟ</summary>
      <ul class="list-none mt-2 space-y-1 text-sm">
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/Emergency/Dyno/Dyno ไฟฉุกเฉิน Cover-front.pdf') }}')">Dyno</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/Emergency/Maxbright/MaxBright  ไฟฉุกเฉิน.pdf') }}')">Maxbright</button></li>
        <li><button class="text-left hover:underline"
          onclick="showPDF('{{ asset('storage/Emergency/Sunny/Sunny-Catalog_2024.pdf') }}')">Sunny</button></li>
      </ul>
    </details>

    <details open class="py-2">
      <summary class="cursor-pointer font-semibold text-base">แบตเตอรี่</summary>
      <div class="mt-2 space-y-2">
        <details open>
          <summary class="cursor-pointer font-semibold">Leoch Battery</summary>
          <ul class="list-none mt-2 pl-4 space-y-1 text-sm">
            <li><button class="hover:underline text-left"
              onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LHR Series ups.pdf') }}')">Leoch LHR Series ups</button></li>
            <li><button class="hover:underline text-left"
              onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LP Series Battery.pdf') }}')">Leoch LP Series Battery</button></li>
            <li><button class="hover:underline text-left"
              onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch XP -series-sheet_july-2024.pdf') }}')">Leoch XP -series</button></li>
          </ul>
        </details>
        <details open>
          <summary class="cursor-pointer font-semibold">Long Battery</summary>
          <ul class="list-none mt-2 pl-4 space-y-1 text-sm">
            <li><button class="hover:underline text-left"
              onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long IDCUPS_Batteries.pdf') }}')">Long IDCUPS_Batteries</button></li>
            <li><button class="hover:underline text-left"
              onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long Sealed_Lead_Acid_Batteries.pdf') }}')">Long Sealed_Lead_Acid</button></li>
          </ul>
        </details>
      </div>
    </details>
  </div>
</aside>

<!-- ===== ขวา: Viewer A4 ===== -->
<section aria-label="PDF viewer">
  <div id="pdfViewport" class="soft">
    <div id="pdfContainer" class="mx-auto px-2 py-4"></div>
  </div>
</section>
</main>

  <!-- ===== Script: A4 Portrait PDF Renderer ===== -->
  <script>
  (function(){
    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc =
      "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

    const container = document.getElementById('pdfContainer');
    const DPR_LIMIT = 2;

    async function renderOnePage(pdf, pageNum){
      const page = await pdf.getPage(pageNum);
      const raw = page.getViewport({ scale: 1 });
      const isLandscape = raw.width > raw.height;

      const wrap = document.createElement('div');
      wrap.className = 'a4-page';
      const fit = document.createElement('div');
      fit.className = 'a4-fit';
      wrap.appendChild(fit);
      container.appendChild(wrap);

      const rect = fit.getBoundingClientRect();
      const cssW = rect.width || 794;
      const cssH = rect.height || 1123;

      const rotation = isLandscape ? 90 : 0;
      const baseW = isLandscape ? raw.height : raw.width;
      const baseH = isLandscape ? raw.width  : raw.height;

      const dpr = Math.min(window.devicePixelRatio || 1, DPR_LIMIT);
      const scale = Math.min((cssW * dpr) / baseW, (cssH * dpr) / baseH);

      const viewport = page.getViewport({ scale, rotation });

      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d', { alpha:false });

      canvas.width  = Math.ceil(viewport.width);
      canvas.height = Math.ceil(viewport.height);
      canvas.style.width  = Math.round(viewport.width  / dpr) + 'px';
      canvas.style.height = Math.round(viewport.height / dpr) + 'px';

      fit.appendChild(canvas);

      const meta = document.createElement('div');
      meta.className = 'page-meta';
      meta.textContent = pageNum + ' / ' + pdf.numPages;
      wrap.appendChild(meta);

      await page.render({ canvasContext: ctx, viewport }).promise;
    }

    window.showPDF = async function(pdfPath){
      container.innerHTML = `
        <div class="flex flex-col items-center justify-center my-6 text-slate-500">
          <div class="loader"></div>
          <p class="mt-3">กำลังโหลดเอกสาร…</p>
        </div>
      `;

      const pdf = await pdfjsLib.getDocument(pdfPath).promise;
      container.innerHTML = '';

      await renderOnePage(pdf, 1);

      let n = 2;
      (function step(){
        if(n > pdf.numPages) return;
        renderOnePage(pdf, n++).then(()=>requestAnimationFrame(step));
      })();
    };

    document.addEventListener("DOMContentLoaded", function(){
      showPDF("{{ asset('storage/k.pdf') }}");
    });
  })();
  </script>

  <!-- Footer -->
  <footer id="contact" class="mt-auto bg-gradient-to-r from-blue-800 via-blue-700 to-teal-600 text-white relative">
    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 py-12">

      <!-- Mobile: Accordion -->
      <div class="md:hidden space-y-4">
        <details class="bg-white/10 rounded-lg p-4">
          <summary class="flex items-center justify-between cursor-pointer text-lg font-semibold">
            <span class="flex items-center gap-2">
              <i class="bi bi-geo-alt-fill text-2xl"></i> ที่อยู่
            </span>
            <i class="bi bi-chevron-down"></i>
          </summary>
          <div class="mt-2 text-sm opacity-90 pl-8">
            <a href="https://www.google.com/maps?q=Triple+E+Trading,39/7+วุฒากาศ+1+แขวงตลาดพลู+ธนบุรี+กรุงเทพมหานคร+10600"
               target="_blank" rel="noopener" class="hover:underline block">
              Triple E Trading<br>
              39/7 วุฒากาศ 1 แขวงตลาดพลู<br>
              เขตธนบุรี กรุงเทพมหานคร 10600
            </a>
          </div>
        </details>

        <details class="bg-white/10 rounded-lg p-4">
          <summary class="flex items-center justify-between cursor-pointer text-lg font-semibold">
            <span class="flex items-center gap-2">
              <i class="bi bi-telephone-fill text-2xl"></i> การติดต่อ
            </span>
            <i class="bi bi-chevron-down"></i>
          </summary>
          <div class="mt-2 text-sm pl-8">
          <a href="tel:+6621172995" class="hover:underline block">02-117-2995 (คุณ อาร์ท)</a>
          <a href="tel:+66990802197" class="hover:underline block">099-080-2197</a>
          <span class="italic text-amber-200 block mt-2">บริการ 9.00-18.00</span>
          </div>
        </details>

        <details class="bg-white/10 rounded-lg p-4">
          <summary class="flex items-center justify-between cursor-pointer text-lg font-semibold">
            <span class="flex items-center gap-2">
              <i class="bi bi-envelope-fill text-2xl"></i> เว็บไซต์และอีเมล
            </span>
            <i class="bi bi-chevron-down"></i>
          </summary>
          <div class="mt-2 text-sm pl-8">
            <a href="https://www.powercare.co.th" target="_blank" rel="noopener"
               class="font-bold hover:underline block">www.powercare.co.th</a>
            <a href="mailto:powercarebyhikari@gmail.com" class="hover:underline block mt-2">powercarebyhikari@gmail.com</a>
          </div>
        </details>
      </div>

      <!-- PC: Grid 3 Columns -->
      <div class="hidden md:grid grid-cols-3 gap-8 mb-10">
        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-geo-alt-fill"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2">ที่อยู่</h3>
          <a href="https://www.google.com/maps?q=Triple+E+Trading,39/7+วุฒากาศ+1+แขวงตลาดพลู+ธนบุรี+กรุงเทพมหานคร+10600"
             target="_blank" rel="noopener"
             class="hover:underline block text-sm opacity-90">
            Triple E Trading<br>
            39/7 วุฒากาศ 1 แขวงตลาดพลู<br>
            เขตธนบุรี กรุงเทพมหานคร 10600
          </a>
        </div>

        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-telephone-fill"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2">การติดต่อ</h3>
          <a href="tel:+6621172995" class="hover:underline block">02-117-2995 (คุณ อาร์ท)</a>
          <a href="tel:+66990802197" class="hover:underline block">099-080-2197</a>
          <span class="italic text-amber-200 block mt-2">บริการ 9.00-18.00</span>
        </div>

        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2">เว็บไซต์และอีเมล</h3>
          <a href="https://www.powercare.co.th" target="_blank" rel="noopener"
             class="font-bold hover:underline block">www.powercare.co.th</a>
          <a href="mailto:powercarebyhikari@gmail.com" class="hover:underline block mt-2">powercarebyhikari@gmail.com</a>
        </div>
      </div>

      <div class="border-t border-white/20 mb-6"></div>

      <div class="text-center text-xs md:text-sm opacity-90">
        <p>© 2025 PowerCare by Hikari. All rights reserved.</p>
        <p class="italic mt-2">"PowerCare by Hikari - We Care Your Power System"</p>
      </div>
    </div>
  </footer>

  <!-- ========== Floating Buttons (LINE + Back to top) ========== -->
  <div id="floating-buttons" aria-label="Quick actions">
    <!-- LINE (บน) -->
    <a class="fb-circle fb-line" aria-label="LINE"
       href="line://ti/p/@Hikaridenki" title="Chat on LINE">
      <img src="{{ asset('storage/line.avif') }}" alt="LINE">
    </a>

    <!-- Back to top (ล่าง) -->
    <button id="toTop" class="fb-circle" aria-label="กลับขึ้นด้านบน" title="กลับขึ้นด้านบน">
      <i class="bi bi-arrow-up"></i>
    </button>
  </div>

  <!-- ===== Scripts ===== -->
  <script>
    // Header shadow only
    const header = document.querySelector('header');
    window.addEventListener('scroll', ()=>{
      const y = window.scrollY || document.documentElement.scrollTop;
      header.classList.toggle('header-scrolled', y>8);
    }, { passive: true });
  </script>

  <!-- ========== JS: Smooth scroll ขึ้นบน (ไม่มีการซ่อน/แสดงอีกต่อไป) ========== -->
  <script>
    (function(){
      const toTop = document.getElementById('toTop');
      toTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    })();
  </script>
</body>
</html>
