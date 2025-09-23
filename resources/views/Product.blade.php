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
      --shadow:0 10px 24px rgba(2,6,23,.10);
    }
    html{ scroll-behavior:smooth; }
    body{ font-family:'Prompt',sans-serif; color:var(--ink); background:#f8fafc; }

    .soft{ box-shadow: 0 6px 20px rgba(2,6,23,.08), 0 2px 10px rgba(2,6,23,.06); }
    header{ background:rgba(255,255,255,.88); backdrop-filter: blur(10px); border-bottom:1px solid rgba(2,6,23,.06); }
    .header-scrolled{ box-shadow:0 8px 22px rgba(2,6,23,.10); }

    /* ======= PDF VIEWER LAYOUT ======= */
    #pdfViewport{ min-height: 90vh; padding-bottom: 72px; background: transparent; border-radius: 12px; }
    .a4-page{
      width: 100%; max-width: 210mm; aspect-ratio: 1 / 1.41421356; background:#fff; border-radius:12px;
      box-shadow:var(--shadow); margin: 0 auto 32px; position:relative; overflow:hidden;
    }
    .a4-fit{ position:absolute; inset:0; padding:12mm 10mm; display:flex; align-items:center; justify-content:center; }
    .a4-fit>canvas{ max-width:100%; max-height:100%; width:auto; height:auto; display:block; border-radius:8px; }
    .page-meta{ position:absolute; right:10px; bottom:8px; font-size:12px; color:#64748b; background:#ffffffcc; padding:2px 8px; border-radius:999px }
    .loader{ border:4px solid #e5e7eb; border-top:4px solid var(--brand); border-radius:50%; width:36px; height:36px; animation:spin .9s linear infinite; margin:20px auto; }
    @keyframes spin{ to{ transform:rotate(360deg);} }

    /* ===== Off-canvas Drawer (mobile) ===== */
    #drawerOverlay{
      position: fixed; inset:0; background: rgba(2,6,23,.5); backdrop-filter: blur(2px);
      opacity:0; visibility:hidden; pointer-events:none; transition:opacity .2s ease, visibility .2s ease;
      z-index:59;
    }
    #drawerPanel{
      position: fixed; left:0; top:0; bottom:0; width:min(86vw,360px); background:#fff; box-shadow: 0 20px 60px rgba(2,6,23,.25);
      transform: translateX(-100%); transition: transform .3s ease; z-index:60; display:flex; flex-direction:column;
    }
    #drawerPanel.open{ transform: translateX(0); }
    #drawerOverlay.open{ opacity:1; visibility:visible; pointer-events:auto; }

    @media (max-width:640px){
      #pdfViewport{ min-height: 82vh; padding-bottom: 96px; }
      .a4-fit{ padding:10mm 8mm; }
    }
    @media print{
      @page{ size:A4; margin:10mm; }
      header, aside, footer, #floating-buttons, #drawerOverlay, #drawerPanel{ display:none !important; }
      #pdfViewport{ min-height:auto !important; padding:0 !important; overflow:visible !important; }
      .a4-page{ box-shadow:none; margin:0 0 8mm 0; }
      body{ background:#fff }
    }

    /* Floating Buttons */
    #floating-buttons{
      position: fixed; right: 18px; bottom: calc(18px + env(safe-area-inset-bottom, 0px));
      display:flex; flex-direction:column; gap:16px; z-index: 55;
    }
    .fb-circle{ width:56px; height:56px; border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow:0 8px 20px rgba(2,6,23,.16); background:#fff; }
    .fb-line img{ width:40px; height:40px; object-fit:contain; display:block; }
    #toTop{ background:#0b2a6b; color:#fff; border:none; font-size:22px; }

    /* ===== Slim scrollbar for desktop left pane ===== */
    @media (min-width:768px){
      .scroll-y::-webkit-scrollbar{ width:8px; }
      .scroll-y::-webkit-scrollbar-thumb{ background:#cbd5e1; border-radius:8px; }
      .scroll-y:hover::-webkit-scrollbar-thumb{ background:#94a3b8; }
    }
  </style>
</head>
<body id="top">

  <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-blue-700 px-3 py-2 rounded-md shadow">ข้ามไปยังเนื้อหา</a>

  <!-- ===== Header ===== -->
  <header class="sticky top-0 z-50 transition-all bg-white" role="banner">
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
        <a href="Product" class="hover:text-blue-700">OUR CATALOG</a>
        <a href="showproduct" class="hover:text-blue-700">ALL PRODUCT</a>
      </nav>

      <!-- CTA (desktop) -->
      <div class="hidden md:flex items-center gap-6 text-sm text-slate-700">
        <a href="tel:+66990802197" class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-telephone"></i> 099-080-2197
        </a>
        <a href="mailto:powercarebyhikari@gmail.com" class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-envelope"></i> powercarebyhikari@gmail.com
        </a>
        <a href="#contact" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-white" style="background:linear-gradient(135deg,#0b2a6b,#1552a7)">
          <i class="bi bi-send"></i> Contact
        </a>
      </div>

      <!-- Mobile Hamburger Button -->
      <div class="md:hidden">
        <button id="menuToggle" class="text-slate-700 text-2xl" aria-label="Toggle menu" aria-expanded="false" aria-controls="drawerPanel">
          <i class="bi bi-list"></i>
        </button>
      </div>
    </div>

    <!-- Compact contact (Mobile bottom bar) -->
    <div class="md:hidden bg-blue-100 text-blue-900 text-xs px-4 py-2 flex items-center justify-center gap-4">
      <a href="tel:+66990802197" class="flex items-center gap-1">
        <i class="bi bi-telephone-fill"></i> 099-080-2197
      </a>
      <a href="mailto:powercarebyhikari@gmail.com" class="flex items-center gap-1">
        <i class="bi bi-envelope-fill"></i> powercarebyhikari@gmail.com
      </a>
    </div>
  </header>

  <!-- ===== OFF-CANVAS (Mobile) : เมนูสามขีดเลื่อนออกจากซ้าย ===== -->
  <div id="drawerOverlay" class="md:hidden"></div>

  <aside id="drawerPanel" class="md:hidden" role="dialog" aria-modal="true" aria-label="เมนูนำทางมือถือ">
    <!-- Header ของแผง -->
    <div class="flex items-center justify-between px-4 py-3 border-b">
      <div class="flex items-center gap-2">
        <img src="{{ asset('storage/logo/Gemini_Generated_Image_44k6m544k6m544k6.png') }}" alt="PowerCare" class="w-7 h-7 object-contain">
        <span class="font-semibold text-lg" style="color:#0b2a6b">เมนู</span>
      </div>
      <button id="drawerClose" class="p-2 rounded-lg hover:bg-slate-100" aria-label="ปิดเมนู">
        <i class="bi bi-x-lg"></i>
      </button>
    </div>

    <!-- เนื้อหาเมนู (Mobile → chips แบบเดียวกับ PC) -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-4" id="mobile-accordion">
      @php
        // ปุ่มชิปใช้ร่วมกัน
        $chipBox = 'flex items-center justify-center h-10 w-full
                    rounded-lg border border-slate-300 bg-white/90 text-slate-700
                    shadow-sm transition
                    hover:bg-blue-50 hover:border-blue-400 hover:text-blue-700
                    focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-300
                    active:translate-y-px';
      @endphp



      <!-- ===== UPS (chips 2 คอลัมน์) ===== -->
      <section class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur p-4">
        <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">UPS</div>

        <details class="group border border-slate-200 rounded-xl px-3 py-2" data-acc="m-section">
          <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none py-2">
            <span class="leading-none">UPS เครื่องสำรองไฟ</span>
            <i class="bi bi-chevron-down text-slate-500 transition-transform duration-200 group-open:rotate-180"></i>
          </summary>

          <div class="grid grid-rows-[0fr] group-open:grid-rows-[1fr] transition-[grid-template-rows] duration-300">
            <div class="overflow-hidden">
              <ul class="mt-3 grid grid-cols-2 gap-3 text-sm">
                <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/UPS/APC/APC Easy UPS Single Phase Family Brochure.pdf') }}')"><span class="truncate">APC</span></button></li>
                <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/UPS/CyberPower/CyberPower_CL_UPS-2016.pdf') }}')"><span class="truncate">CyberPower</span></button></li>
                <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/UPS/Delta/Delta-UPS-en-us.pdf') }}')"><span class="truncate">Delta</span></button></li>
                <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/UPS/Eaton/eaton_ups_product_catalogue_en-gb-anz.pdf') }}')"><span class="truncate">Eaton</span></button></li>
                <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/UPS/Vertiv/Vertiv-ups-catalogue-en.pdf') }}')"><span class="truncate">Vertiv</span></button></li>
              </ul>
            </div>
          </div>
        </details>
      </section>

      <!-- ===== EMERGENCY (chips 2 คอลัมน์; Sunny เต็มแถว) ===== -->
      <section class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur p-4">
        <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">EMERGENCY</div>

        <details class="group border border-slate-200 rounded-xl px-3 py-2" data-acc="m-section">
          <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none py-2">
            <span class="leading-none">ไฟฉุกเฉินและป้ายหนีไฟ</span>
            <i class="bi bi-chevron-down text-slate-500 transition-transform duration-200 group-open:rotate-180"></i>
          </summary>

        <div class="grid grid-rows-[0fr] group-open:grid-rows-[1fr] transition-[grid-template-rows] duration-300">
          <div class="overflow-hidden">
            <ul class="mt-3 grid grid-cols-2 gap-3 text-sm">
              <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/Emergency/Dyno/Dyno ไฟฉุกเฉิน Cover-front.pdf') }}')"><span class="truncate">Dyno</span></button></li>
              <li class="min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/Emergency/Maxbright/MaxBright  ไฟฉุกเฉิน.pdf') }}')"><span class="truncate">Maxbright</span></button></li>
              <li class="col-span-2 min-w-0"><button class="{{ $chipBox }}" onclick="showPDF('{{ asset('storage/Emergency/Sunny/Sunny-Catalog_2024.pdf') }}')"><span class="truncate">Sunny</span></button></li>
            </ul>
          </div>
        </div>
        </details>
      </section>

      <!-- ===== BATTERY (chips 1 คอลัมน์/รายการต่อแถว + ห่อบรรทัด) ===== -->
      <section class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur p-4">
        <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">BATTERY</div>

        <details class="group border border-slate-200 rounded-xl px-3 py-2" data-acc="m-section">
          <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none py-2">
            <span class="leading-none">แบตเตอรี่</span>
            <i class="bi bi-chevron-down text-slate-500 transition-transform duration-200 group-open:rotate-180"></i>
          </summary>

          <div class="grid grid-rows-[0fr] group-open:grid-rows-[1fr] transition-[grid-template-rows] duration-300">
            <div class="overflow-hidden">

              <!-- Leoch -->
              <details class="group border border-slate-200 rounded-lg px-3 py-2 mt-3" data-acc="m-batt">
                <summary class="cursor-pointer font-semibold flex justify-between items-center select-none py-2">
                  <span>Leoch Battery</span>
                  <i class="bi bi-chevron-down text-slate-500 transition-transform duration-200 group-open:rotate-180"></i>
                </summary>

                <div class="grid grid-rows-[0fr] group-open:grid-rows-[1fr] transition-[grid-template-rows] duration-300">
                  <div class="overflow-hidden">
                    <ul class="mt-3 grid grid-cols-1 gap-3 text-sm">
                      <li class="min-w-0">
                        <button class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
                                onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LHR Series ups.pdf') }}')">
                          <span class="leading-snug">Leoch LHR Series ups</span>
                        </button>
                      </li>
                      <li class="min-w-0">
                        <button class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
                                onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch LP Series Battery.pdf') }}')">
                          <span class="leading-snug">Leoch LP Series Battery</span>
                        </button>
                      </li>
                      <li class="min-w-0">
                        <button class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
                                onclick="showPDF('{{ asset('storage/Battery/Leoch Battery/Leoch XP -series-sheet_july-2024.pdf') }}')">
                          <span class="leading-snug">Leoch XP -series</span>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
              </details>

              <!-- Long -->
              <details class="group border border-slate-200 rounded-lg px-3 py-2 mt-3" data-acc="m-batt">
                <summary class="cursor-pointer font-semibold flex justify-between items-center select-none py-2">
                  <span>Long Battery</span>
                  <i class="bi bi-chevron-down text-slate-500 transition-transform duration-200 group-open:rotate-180"></i>
                </summary>

                <div class="grid grid-rows-[0fr] group-open:grid-rows-[1fr] transition-[grid-template-rows] duration-300">
                  <div class="overflow-hidden">
                    <ul class="mt-3 grid grid-cols-1 gap-3 text-sm">
                      <li class="min-w-0">
                        <button class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
                                onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long IDCUPS_Batteries.pdf') }}')">
                          <span class="leading-snug">Long IDCUPS_Batteries</span>
                        </button>
                      </li>
                      <li class="min-w-0">
                        <button class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
                                onclick="showPDF('{{ asset('storage/Battery/Long Battery/Long Sealed_Lead_Acid_Batteries.pdf') }}')">
                          <span class="leading-snug">Long Sealed-Lead-Acid</span>
                        </button>
                      </li>
                    </ul>
                  </div>
                </div>
              </details>

            </div>
          </div>
        </details>
      </section>
    </nav>

    <!-- ลิงก์ด่วน -->
    <div class="border-t px-4 py-3 text-sm">
      <a href="tel:+66990802197" class="flex items-center gap-2 py-2"><i class="bi bi-telephone"></i> 099-080-2197</a>
      <a href="mailto:powercarebyhikari@gmail.com" class="flex items-center gap-2 py-2"><i class="bi bi-envelope"></i> powercarebyhikari@gmail.com</a>
    </div>
  </aside>

  <!-- ===== Layout: ซ้ายเมนู / ขวาเอกสาร (Responsive) ===== -->
  <main id="main" class="max-w-7xl mx-auto px-3 md:px-6 py-6 grid grid-cols-1 md:grid-cols-[320px,1fr] gap-6">

    <!-- ===== ซ้าย: หมวดหมู่ (Desktop only) ===== -->
    <aside class="bg-white rounded-xl shadow p-4 md:sticky md:top-20 hidden md:block text-[#0b2a6b]">
      <!-- กล่องภายในที่สกอร์ลได้บนเดสก์ท็อป -->
      <div class="md:max-h-[calc(100vh-7rem)] md:overflow-y-auto overscroll-contain pr-1 scroll-y">

@php
  // กล่องปุ่มสี่เหลี่ยม (ตัวคุมกรอบ) — ความสูงเท่ากัน, กดแล้วมีเอฟเฟกต์
  $chipBox = 'flex items-center justify-center h-10 w-full
              rounded-lg border border-slate-300 bg-white/90 text-slate-700
              shadow-sm transition
              hover:bg-blue-50 hover:border-blue-400 hover:text-blue-700
              focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-300
              active:translate-y-px';
@endphp

<!-- CONNECTOR ▸ NANABOSHI -->
<div class="rounded-2xl border border-slate-200 bg-white/70 p-4">
  <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">CONNECTOR</div>

  <details class="border border-slate-200 rounded-xl p-3 group" open>
    <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none">
      <span>CONNECTOR</span>
      <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
    </summary>

    @php
      // เหลือแค่ brand อย่างเดียว
      $brand = 'NANABOSHI';
      $chipBase   = $chipBox ?? 'flex items-center justify-between gap-2 px-3 py-2 border rounded-lg hover:bg-amber-50 transition text-sm w-full';
      $chipActive = '';
      $chipNormal = 'bg-white text-slate-700 border-slate-200';
      $urlBrand   = route('showproduct.bybrand', ['brand' => $brand]);
    @endphp

    <!-- ไม่มีซีรีส์แล้ว เหลือปุ่มเดียว -->
    <ul class="mt-3 grid grid-cols-1 gap-3 text-sm">
      <li class="min-w-0">
        <a href="{{ $urlBrand }}"
           class="{{ $chipBase }} {{ $chipActive }}"
           title="{{ $brand }}">
          <span >{{ $brand }}</span>
        </a>
      </li>
    </ul>
  </details>
</div>


<!-- UPS -->
<div class="rounded-2xl border border-slate-200 bg-white/70 p-4 mt-4">
  <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">UPS</div>

  <details class="border border-slate-200 rounded-xl p-3 group">
    <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none">
      <span>UPS เครื่องสำรองไฟ</span>
      <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
    </summary>

    <ul class="mt-3 grid grid-cols-2 gap-3 text-sm">
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/UPS/APC/APC Easy UPS Single Phase Family Brochure.pdf') }}`)"
          title="APC"><span class="truncate">APC</span></button>
      </li>
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/UPS/CyberPower/CyberPower_CL_UPS-2016.pdf') }}`)"
          title="CyberPower"><span class="truncate">CyberPower</span></button>
      </li>
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/UPS/Delta/Delta-UPS-en-us.pdf') }}`)"
          title="Delta"><span class="truncate">Delta</span></button>
      </li>
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/UPS/Eaton/eaton_ups_product_catalogue_en-gb-anz.pdf') }}`)"
          title="Eaton"><span class="truncate">Eaton</span></button>
      </li>
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/UPS/Vertiv/Vertiv-ups-catalogue-en.pdf') }}`)"
          title="Vertiv"><span class="truncate">Vertiv</span></button>
      </li>
    </ul>
  </details>
</div>

<!-- EMERGENCY -->
<div class="rounded-2xl border border-slate-200 bg-white/70 p-4 mt-4">
  <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">EMERGENCY</div>

  <details class="border border-slate-200 rounded-xl p-3 group">
    <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none">
      <span>ไฟฉุกเฉินและป้ายหนีไฟ</span>
      <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
    </summary>

    <ul class="mt-3 grid grid-cols-2 gap-3 text-sm">
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/Emergency/Dyno/Dyno ไฟฉุกเฉิน Cover-front.pdf') }}`)"
          title="Dyno"><span class="truncate">Dyno</span></button>
      </li>
      <li class="min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/Emergency/Maxbright/MaxBright  ไฟฉุกเฉิน.pdf') }}`)"
          title="Maxbright"><span class="truncate">Maxbright</span></button>
      </li>
      <li class="col-span-2 min-w-0">
        <button type="button" class="{{ $chipBox }}"
          onclick="showPDF(`{{ asset('storage/Emergency/Sunny/Sunny-Catalog_2024.pdf') }}`)"
          title="Sunny"><span class="truncate">Sunny</span></button>
      </li>
    </ul>
  </details>
</div>

<!-- BATTERY -->
<div class="rounded-2xl border border-slate-200 bg-white/70 p-4 mt-4">
  <div class="text-[11px] font-semibold tracking-widest text-slate-500 mb-2">BATTERY</div>

  <details class="border border-slate-200 rounded-xl p-3 group">
    <summary class="cursor-pointer font-semibold text-base flex justify-between items-center select-none">
      <span>แบตเตอรี่</span>
      <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
    </summary>

    <div class="mt-3 space-y-3 text-sm">

      <!-- Leoch -->
      <details class="border border-slate-200 rounded-lg p-3 group">
        <summary class="cursor-pointer font-semibold flex justify-between items-center select-none">
          <span>Leoch Battery</span>
          <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
        </summary>

        <!-- 1 คอลัมน์เฉพาะ BATTERY -->
        <ul class="mt-2 grid grid-cols-1 gap-3">
          <li class="min-w-0">
            <button type="button"
              class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
              onclick="showPDF(`{{ asset('storage/Battery/Leoch Battery/Leoch LHR Series ups.pdf') }}`)"
              title="Leoch LHR Series ups">
              <span class="leading-snug">Leoch LHR Series ups</span>
            </button>
          </li>

          <li class="min-w-0">
            <button type="button"
              class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
              onclick="showPDF(`{{ asset('storage/Battery/Leoch Battery/Leoch LP Series Battery.pdf') }}`)"
              title="Leoch LP Series Battery">
              <span class="leading-snug">Leoch LP Series Battery</span>
            </button>
          </li>

          <li class="min-w-0">
            <button type="button"
              class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
              onclick="showPDF(`{{ asset('storage/Battery/Leoch Battery/Leoch XP -series-sheet_july-2024.pdf') }}`)"
              title="Leoch XP -series">
              <span class="leading-snug">Leoch XP -series</span>
            </button>
          </li>
        </ul>
      </details>

      <!-- Long -->
      <details class="border border-slate-200 rounded-lg p-3 group">
        <summary class="cursor-pointer font-semibold flex justify-between items-center select-none">
          <span>Long Battery</span>
          <i class="bi bi-chevron-down transition-transform duration-200 group-open:rotate-180"></i>
        </summary>

        <!-- 1 คอลัมน์เฉพาะ BATTERY -->
        <ul class="mt-2 grid grid-cols-1 gap-3">
          <li class="min-w-0">
            <button type="button"
              class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
              onclick="showPDF(`{{ asset('storage/Battery/Long Battery/Long IDCUPS_Batteries.pdf') }}`)"
              title="Long IDCUPS_Batteries">
              <span class="leading-snug">Long IDCUPS_Batteries</span>
            </button>
          </li>

          <li class="min-w-0">
            <button type="button"
              class="{{ $chipBox }} h-auto min-h-10 py-2 px-3 justify-start text-left whitespace-normal break-words"
              onclick="showPDF(`{{ asset('storage/Battery/Long Battery/Long Sealed_Lead_Acid_Batteries.pdf') }}`)"
              title="Long Sealed-Lead-Acid">
              <span class="leading-snug">Long Sealed-Lead-Acid</span>
            </button>
          </li>
        </ul>
      </details>

    </div>
  </details>
</div>

      </div> <!-- /scroll container -->
    </aside>

    <!-- ===== ขวา: Viewer A4 ===== -->
    <section aria-label="PDF viewer">
      <div id="pdfViewport" class="soft">
        <div id="pdfContainer" class="mx-auto px-2 py-4"></div>
      </div>
    </section>

  </main>

  <!-- Footer -->
  <footer id="contact" class="mt-auto bg-gradient-to-r from-blue-800 via-blue-700 to-teal-600 text-white relative">
    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 py-12">

      <!-- Mobile: Accordion ใน footer -->
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
    <a class="fb-circle fb-line" aria-label="LINE" href="line://ti/p/@Hikaridenki" title="Chat on LINE">
      <img src="{{ asset('storage/line.avif') }}" alt="LINE">
    </a>
    <button id="toTop" class="fb-circle" aria-label="กลับขึ้นด้านบน" title="กลับขึ้นด้านบน">
      <i class="bi bi-arrow-up"></i>
    </button>
  </div>

  <!-- ===== Scripts ===== -->
  <script>
    // Header shadow
    const header = document.querySelector('header');
    window.addEventListener('scroll', ()=> {
      const y = window.scrollY || document.documentElement.scrollTop;
      header.classList.toggle('header-scrolled', y>8);
    }, { passive:true });
  </script>

  <!-- ===== PDF.js renderer (A4 Portrait, progressive) ===== -->
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

  <!-- ===== Drawer + Accordion (mobile) ===== -->
  <script>
    (function () {
      const menuToggle = document.getElementById('menuToggle');
      const overlay    = document.getElementById('drawerOverlay');
      const panel      = document.getElementById('drawerPanel');
      const closeBtn   = document.getElementById('drawerClose');
      const accRoot    = document.getElementById('mobile-accordion');

      function openDrawer(){
        panel.classList.add('open');
        overlay.classList.add('open');
        document.body.classList.add('overflow-hidden');
        menuToggle.setAttribute('aria-expanded','true');

        const f = panel.querySelectorAll('a,button,[tabindex]:not([tabindex="-1"])');
        if (f.length) f[0].focus();
      }
      function closeDrawer(){
        panel.classList.remove('open');
        overlay.classList.remove('open');
        document.body.classList.remove('overflow-hidden');
        menuToggle.setAttribute('aria-expanded','false');
        menuToggle.focus({preventScroll:true});
      }

      menuToggle.addEventListener('click', openDrawer);
      overlay.addEventListener('click', closeDrawer);
      closeBtn.addEventListener('click', closeDrawer);

      window.addEventListener('keydown', (e)=>{
        if(e.key === 'Escape' && overlay.classList.contains('open')) closeDrawer();
      });

      window.addEventListener('resize', ()=>{
        if (window.innerWidth >= 768) closeDrawer();
      });

      // Single-open เฉพาะภายใน scope เดียวกัน (ใช้ data-acc ให้ต่างระดับกัน)
      if (accRoot){
        accRoot.addEventListener('toggle', function (e) {
          const current = e.target;
          if (current.tagName !== 'DETAILS' || !current.open) return;
          const scope = current.getAttribute('data-acc');
          if (!scope) return;
          accRoot.querySelectorAll(`details[data-acc="${scope}"]`).forEach(d => {
            if (d !== current) d.open = false;
          });
        });
      }

      panel.addEventListener('touchmove', (e)=>{}, {passive:false});
    })();
  </script>

  <!-- Smooth scroll to top -->
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
