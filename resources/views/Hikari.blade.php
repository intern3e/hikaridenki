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

  <style>
    :root{
      /* Professional palette */
      --brand:#0b2a6b;      /* deep brand navy */
      --brand-2:#1552a7;    /* darker accent */
      --accent:#f59e0b;     /* amber-500 */
      --ink:#0f172a;        /* slate-900 */
      --muted:#475569;      /* slate-600 */
      --surface:#ffffff;    /* white */
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

    /* ---------- Reveal animation (with reduced motion) ---------- */
    .reveal{ opacity:0; transform: translateY(10px); transition: opacity .5s ease, transform .5s ease; }
    .reveal.in{ opacity:1; transform:none; }
    @media (prefers-reduced-motion: reduce){
      .reveal{ opacity:1 !important; transform:none !important; transition:none !important; }
    }

    /* ---------- Partner logos ---------- */
    .brand-logo{ filter:none; opacity:1; transition: transform .18s ease, opacity .18s ease; }
    .brand-logo:hover{ transform: translateY(-3px); }

    /* ---------- Floating buttons (LINE + Back-to-top) ---------- */
    #floating-buttons{
      position: fixed;
      right: 18px;
      bottom: 18px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      z-index: 70;
      opacity: 0;
      pointer-events: none;
      transform: translateY(8px);
      transition: .25s ease;
    }
    #floating-buttons.show{
      opacity: 1;
      pointer-events: auto;
      transform: none;
    }
    #floating-buttons .circle{
      width: 56px;
      height: 56px;
      border-radius: 50%;
      box-shadow: 0 6px 16px rgba(0,0,0,.15);
      display: flex;
      align-items: center;
      justify-content: center;
      background:#fff;
      transition: transform .25s ease;
    }
    #floating-buttons .circle:hover{
      transform: scale(1.06);
    }
    /* ปุ่ม Back-to-top ให้เป็นทรงกลมด้วย */
    #toTop{
      width: 56px;
      height: 56px;
      border-radius: 50%;
      padding: 0;
      display:flex;
      align-items:center;
      justify-content:center;
    }
  </style>
</head>
<body id="top">

  <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-blue-700 px-3 py-2 rounded-md shadow">ข้ามไปยังเนื้อหา</a>

  <!-- ===== Header ===== -->
  <header class="sticky top-0 z-50 transition-all bg-white shadow" role="banner">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3.5 px-4 md:px-6">
      <!-- Logo -->
      <a href="Hikari" class="flex items-center gap-2">
        <img src="{{ asset('storage/logo/Gemini_Generated_Image_44k6m544k6m544k6.png') }}"
             alt="PowerCare logo"
             class="w-8 h-8 object-contain"
             loading="eager" decoding="async" fetchpriority="high">
        <span class="font-bold text-xl" style="color:var(--brand)">PowerCare</span>
        <span class="text-sm text-slate-500">by Hikari</span>
      </a>

      <!-- ========== Desktop Navigation ========== -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium ml-auto mr-6">
        <a href="Hikari" class="hover:text-blue-700">HOME</a>
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

      <!-- ========== Mobile Hamburger Button ========== -->
      <div class="md:hidden">
        <button id="menuToggle" class="text-slate-700 text-2xl" aria-label="Toggle menu">
          <i class="bi bi-list"></i>
        </button>
      </div>
    </div>

    <!-- ========== Mobile Menu (horizontal bar) ========== -->
    <nav id="mobileMenu" class="hidden md:hidden bg-blue-50 border-t text-sm font-medium flex justify-center gap-6 py-3">
      <a href="Hikari" class="hover:text-blue-700">HOME</a>
      <a href="Product" class="hover:text-blue-700">PRODUCT</a>
      <a href="#contact" class="btn btn-primary text-xs px-3 py-1">
        <i class="bi bi-chat-dots"></i> Contact
      </a>
    </nav>

    <!-- ========== Compact contact (Mobile bottom bar) ========== -->
    <div class="md:hidden bg-blue-100 text-blue-900 text-xs px-4 py-2 flex items-center justify-center gap-4">
      <a href="tel:+6620000000" class="flex items-center gap-1">
        <i class="bi bi-telephone-fill"></i> 063-323-5272
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

  <main id="main" tabindex="-1">
    <!-- ===== Hero ===== -->
    <section class="relative overflow-hidden" aria-label="ภาพพื้นหลังขนาดจริง">
      <figure class="relative m-0">
        <img src="{{ asset('storage/logo/20.png') }}" alt="PowerCare hero" class="block max-w-full h-auto w-full" loading="eager" decoding="async" fetchpriority="high">
        <div class="absolute inset-0" style="background:linear-gradient(180deg, rgba(2,6,23,.25) 0%, rgba(2,6,23,.35) 40%, rgba(2,6,23,.45) 100%);"></div>
        <figcaption class="sr-only">ภาพหน้าปก PowerCare พร้อมเลเยอร์ไล่เฉดเพื่อให้อ่านปุ่มได้ชัดเจน</figcaption>
      </figure>

      <!-- เนื้อหาทับบนภาพ -->
      <div class="absolute inset-0 z-10 flex items-center justify-center text-center">
        <div class="w-full max-w-6xl mx-auto px-3 sm:px-6 md:px-12 text-white scale-95 sm:scale-105 md:scale-110">

          <!-- ปุ่มเรียกใช้งาน (PC/Tablet) -->
          <div class="hidden sm:flex flex-wrap justify-center gap-4 reveal mt-[200px] md:mt-[300px]">
            <a href="#services" class="btn btn-primary text-xs sm:text-sm md:text-lg px-2 sm:px-4 md:px-6 py-1 sm:py-2 md:py-3">
              <i class="bi bi-grid"></i> ดูบริการ
            </a>
            <a href="#contact" class="btn btn-outline text-xs sm:text-sm md:text-lg px-2 sm:px-4 md:px-6 py-1 sm:py-2 md:py-3">
              <i class="bi bi-clipboard-check"></i> ขอใบเสนอราคา
            </a>
          </div>

          <!-- สถิติ (PC/Tablet) -->
          <div class="hidden sm:flex justify-center gap-10 md:gap-16 mt-12 md:mt-16 text-sm sm:text-lg md:text-xl text-center" aria-label="สถิติองค์กร">
            <div class="reveal flex flex-col items-center w-1/3 min-w-[90px]">
              <span class="text-2xl sm:text-4xl md:text-6xl font-extrabold block">15+</span>
              <p class="opacity-90">ปีประสบการณ์</p>
            </div>
            <div class="reveal flex flex-col items-center w-1/3 min-w-[90px]">
              <span class="text-2xl sm:text-4xl md:text-6xl font-extrabold block">500+</span>
              <p class="opacity-90">โครงการสำเร็จ</p>
            </div>
            <div class="reveal flex flex-col items-center w-1/3 min-w-[90px]">
              <span class="text-2xl sm:text-4xl md:text-6xl font-extrabold block">24</span>
              <p class="opacity-90">ชั่วโมงบริการ</p>
            </div>
          </div>

          <!-- สถิติ (Mobile) -->
          <div class="sm:hidden flex justify-center gap-6 mt-8 text-center text-sm" aria-label="สถิติองค์กร">
            <div class="reveal flex flex-col items-center min-w-[80px]">
              <span class="text-2xl font-extrabold block">15+</span>
              <p class="opacity-90">ปีประสบการณ์</p>
            </div>
            <div class="reveal flex flex-col items-center min-w-[80px]">
              <span class="text-2xl font-extrabold block">500+</span>
              <p class="opacity-90">โครงการสำเร็จ</p>
            </div>
            <div class="reveal flex flex-col items-center min-w-[80px]">
              <span class="text-2xl font-extrabold block">24</span>
              <p class="opacity-90">ชั่วโมงบริการ</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ===== Services ===== -->
    <section id="services" class="max-w-7xl mx-auto px-4 md:px-6 py-20">
      <h2 class="text-center text-3xl font-bold mb-3" style="color:var(--brand)">Our Services</h2>
      <span class="block w-20 h-1 mx-auto mb-12 rounded" style="background:var(--accent)"></span>

      <!-- 📱 Mobile: List style -->
      <div class="space-y-6 sm:hidden">
        <!-- Install -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 text-blue-700 text-2xl flex-shrink-0">
            <i class="bi bi-tools"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Install</h3>
            <p class="text-slate-600 text-sm mt-1">ติดตั้งระบบ UPS ครบวงจรและงาน DC โดยทีมงานประสบการณ์กว่า 15 ปี ประสิทธิภาพและความปลอดภัยสูงสุด</p>
          </div>
        </article>

        <!-- Battery -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-emerald-100 text-emerald-700 text-2xl flex-shrink-0">
            <i class="bi bi-battery-charging"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Battery Replacements</h3>
            <p class="text-slate-600 text-sm mt-1">เชี่ยวชาญ VRLA, Flooded, NiCd พร้อมอุปกรณ์ยกย้ายเฉพาะทางและมาตรฐานความปลอดภัย</p>
          </div>
        </article>

        <!-- Maintenance -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-amber-100 text-amber-700 text-2xl flex-shrink-0">
            <i class="bi bi-gear-wide-connected"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Maintenance</h3>
            <p class="text-slate-600 text-sm mt-1">โปรแกรมบำรุงรักษา: DC load bank, ตรวจ specific gravity, วินิจฉัยด้วย thermal imaging</p>
          </div>
        </article>

        <!-- Monitoring -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-purple-100 text-purple-700 text-2xl flex-shrink-0">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Monitoring</h3>
            <p class="text-slate-600 text-sm mt-1">ให้คำปรึกษาและติดตั้งระบบมอนิเตอร์แบตเตอรี่จากผู้ผลิตชั้นนำ หลายแพลตฟอร์ม</p>
          </div>
        </article>

        <!-- Delivery -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-orange-100 text-orange-700 text-2xl flex-shrink-0">
            <i class="bi bi-truck"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Delivery & Consolidate</h3>
            <p class="text-slate-600 text-sm mt-1">ตรวจคุณภาพ/รวมชิ้นส่วนที่คลังปลอดภัย พร้อมส่งมอบหน้างานเพื่อลด downtime</p>
          </div>
        </article>

        <!-- Recycling -->
        <article class="flex items-start gap-4 bg-white p-5 rounded-xl shadow-sm">
          <div class="w-14 h-14 flex items-center justify-center rounded-full bg-teal-100 text-teal-700 text-2xl flex-shrink-0">
            <i class="bi bi-recycle"></i>
          </div>
          <div>
            <h3 class="font-semibold text-lg">Recycling</h3>
            <p class="text-slate-600 text-sm mt-1">คู่ค้ารีไซเคิลตามมาตรฐาน COSHH เก็บกวาดหน้างานครบจบ ไม่ทิ้งตกค้าง</p>
          </div>
        </article>
      </div>

      <!-- 🖥 PC/Tablet: Grid style -->
      <div class="hidden sm:grid md:grid-cols-3 gap-8">
        <!-- Install -->
        <article class="bg-white p-8 rounded-2xl soft text-center card" aria-labelledby="svc-install">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-blue-100 text-blue-700 text-3xl" aria-hidden="true">
            <i class="bi bi-tools"></i>
          </div>
          <h3 id="svc-install" class="font-semibold text-xl mt-6">Install</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">ติดตั้งระบบ UPS ครบวงจรและงาน DC โดยทีมงานประสบการณ์กว่า 15 ปี ประสิทธิภาพและความปลอดภัยสูงสุด</p>
        </article>

        <!-- Battery -->
        <article class="bg-white p-8 rounded-2xl soft text-center card" aria-labelledby="svc-batt">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-emerald-100 text-emerald-700 text-3xl" aria-hidden="true">
            <i class="bi bi-battery-charging"></i>
          </div>
          <h3 id="svc-batt" class="font-semibold text-xl mt-6">Battery Replacements</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">เชี่ยวชาญ VRLA, Flooded, NiCd พร้อมอุปกรณ์ยกย้ายเฉพาะทางและมาตรฐานความปลอดภัย</p>
        </article>

        <!-- Maintenance -->
        <article class="bg-white p-8 rounded-2xl soft text-center card" aria-labelledby="svc-mnt">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-amber-100 text-amber-700 text-3xl" aria-hidden="true">
            <i class="bi bi-gear-wide-connected"></i>
          </div>
          <h3 id="svc-mnt" class="font-semibold text-xl mt-6">Maintenance</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">โปรแกรมบำรุงรักษา: DC load bank, ตรวจ specific gravity, วินิจฉัยด้วย thermal imaging</p>
        </article>

        <!-- Monitoring -->
        <article class="bg-white p-8 rounded-2xl soft text-center card md:col-span-3 lg:col-span-1" aria-labelledby="svc-mon">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-purple-100 text-purple-700 text-3xl" aria-hidden="true">
            <i class="bi bi-graph-up-arrow"></i>
          </div>
          <h3 id="svc-mon" class="font-semibold text-xl mt-6">Monitoring</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">ให้คำปรึกษาและติดตั้งระบบมอนิเตอร์แบตเตอรี่จากผู้ผลิตชั้นนำ หลายแพลตฟอร์ม</p>
        </article>

        <!-- Delivery -->
        <article class="bg-white p-8 rounded-2xl soft text-center card" aria-labelledby="svc-dlv">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-orange-100 text-orange-700 text-3xl" aria-hidden="true">
            <i class="bi bi-truck"></i>
          </div>
          <h3 id="svc-dlv" class="font-semibold text-xl mt-6">Delivery & Consolidate</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">ตรวจคุณภาพ/รวมชิ้นส่วนที่คลังปลอดภัย พร้อมส่งมอบหน้างานเพื่อลด downtime</p>
        </article>

        <!-- Recycling -->
        <article class="bg-white p-8 rounded-2xl soft text-center card" aria-labelledby="svc-rcy">
          <div class="mx-auto w-16 h-16 flex items-center justify-center rounded-full bg-teal-100 text-teal-700 text-3xl" aria-hidden="true">
            <i class="bi bi-recycle"></i>
          </div>
          <h3 id="svc-rcy" class="font-semibold text-xl mt-6">Recycling</h3>
          <p class="text-slate-600 mt-3 text-sm leading-relaxed">คู่ค้ารีไซเคิลตามมาตรฐาน COSHH เก็บกวาดหน้างานครบจบ ไม่ทิ้งตกค้าง</p>
        </article>
      </div>
    </section>

    <!-- ===== About ===== -->
    <section class="bg-gray-50 py-20 px-4 md:px-6">
      <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-start">
        <div class="reveal">
          <h2 class="text-3xl font-bold mb-6" style="color:var(--brand)">เกี่ยวกับเรา</h2>
          <p class="text-slate-700 leading-relaxed mb-4"><strong>PowerCare by Hikari</strong> ผู้ให้บริการระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉิน มุ่งมั่นส่งมอบโซลูชันที่เชื่อถือได้ในการดูแลระบบไฟฟ้าสำคัญ</p>
          <p class="text-slate-700 leading-relaxed">ประสบการณ์มากกว่า 15 ปี เชี่ยวชาญงานติดตั้ง บำรุงรักษา และที่ปรึกษาเพื่อวางระบบที่เหมาะสมที่สุด</p>
        </div>

        <div class="grid grid-cols-2 gap-y-5 gap-x-8 reveal" aria-label="จุดเด่นของบริการ">
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">ประสบการณ์ 15+ ปี</span></div>
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">ทีมวิศวกรผู้เชี่ยวชาญ</span></div>
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">บริการ 24 ชั่วโมง</span></div>
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">มาตรฐานสากล</span></div>
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">บริการครบวงจร</span></div>
          <div class="flex items-center gap-2"><div class="w-6 h-6 flex items-center justify-center bg-emerald-600 text-white rounded-full text-sm" aria-hidden="true"><i class="bi bi-check-lg"></i></div><span class="text-slate-700">แบรนด์ชั้นนำ</span></div>
        </div>
      </div>
    </section>

    <!-- ===== Partners ===== -->
    <section class="bg-white py-20 px-4">
      <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-3xl font-bold" style="color:var(--brand)">พันธมิตรแบรนด์ชั้นนำ</h2>
        <div class="w-16 h-1 mx-auto mt-3 mb-12 rounded" style="background:var(--accent)"></div>

        <div class="grid md:grid-cols-3 gap-10">

          <!-- UPS -->
          <section class="bg-gray-50 rounded-2xl p-8 border-l-4 border-emerald-600 soft text-left reveal">
            <h3 class="font-semibold mb-6 flex items-center gap-2" style="color:var(--brand)">
              <i class="bi bi-plug text-emerald-600"></i> UPS เครื่องสำรองไฟ
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 place-items-center">
              <img src="{{ asset('storage/logo/apc.png') }}" alt="APC" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/cyberpower-seeklogo.png') }}" alt="CyberPower" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/delta-electronics-seeklogo.png') }}" alt="Delta" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/eaton-seeklogo.png') }}" alt="Eaton" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/schneider.png') }}" alt="Schneider" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/vertiv-seeklogo.png') }}" alt="Vertiv" class="h-20 object-contain">
            </div>
          </section>

          <!-- Battery -->
          <section class="bg-gray-50 rounded-2xl p-8 border-l-4 border-blue-600 soft text-left reveal">
            <h3 class="font-semibold mb-6 flex items-center gap-2" style="color:var(--brand)">
              <i class="bi bi-battery-charging text-blue-600"></i> แบตเตอรี่
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 place-items-center">
              <img src="{{ asset('storage/logo/666_0.png') }}" alt="Long" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/Accu.png') }}" alt="Accu" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/csb-battery-seeklogo.png') }}" alt="CSB" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/Global Power45.png') }}" alt="Global Power" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/Leoch Battery.png') }}" alt="Leoch" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/panasonic-seeklogo.png') }}" alt="Panasonic" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/yuasa-seeklogo.png') }}" alt="Yuasa" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/apc.png') }}" alt="APC" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/cyberpower-seeklogo.png') }}" alt="CyberPower" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/eaton-seeklogo.png') }}" alt="Eaton" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/vertiv-seeklogo.png') }}" alt="Vertiv" class="h-20 object-contain">
            </div>
          </section>

          <!-- Emergency -->
          <section class="bg-gray-50 rounded-2xl p-8 border-l-4 border-amber-500 soft text-left reveal">
            <h3 class="font-semibold mb-6 flex items-center gap-2" style="color:var(--brand)">
              <i class="bi bi-lightbulb text-amber-500"></i> ไฟฉุกเฉิน และ ป้ายหนีไฟ
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 place-items-center">
              <img src="{{ asset('storage/logo/111_0.png') }}" alt="Sunny" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/222_0.png') }}" alt="Iwachi" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/333_0.png') }}" alt="BEC" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/444_0.png') }}" alt="Delight" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/555_0.png') }}" alt="Dyno" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/888_0.png') }}" alt="Safeguard" class="h-20 object-contain">
              <img src="{{ asset('storage/logo/MAXBRIGHT.png') }}" alt="Max Bright" class="h-20 object-contain">
            </div>
          </section>

        </div>
      </div>
    </section>
  </main>

  {{-- footer --}}
  @include('footer')

  <!-- ===== Floating buttons (LINE + Back to top) ===== -->
  <div id="floating-buttons" aria-label="Quick actions">
<!-- LINE -->
<a href="line://ti/p/@Hikaridenki" aria-label="LINE" class="circle" title="Chat on LINE"
   style="display:flex;align-items:center;justify-content:center;">
  <img src="{{ asset('storage/line.avif') }}" alt="LINE" 
       style="width:40px;height:40px;object-fit:contain;">
</a>

    <!-- Back to top -->
    <button id="toTop" aria-label="กลับขึ้นด้านบน" 
  class="btn circle rounded-full" 
  title="กลับขึ้นด้านบน"
  style="background-color:#0b2a6b; color:#fff; border:none; width:56px; height:56px; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 10px rgba(0,0,0,.2); transition:background-color 0.3s ease;">
  <i class="bi bi-arrow-up"></i>
</button>

  </div>


  <!-- ===== Scripts ===== -->
  <script>
    // Reveal on view
    const reveals = document.querySelectorAll('.reveal');
    const io = ('IntersectionObserver' in window) ? new IntersectionObserver((entries)=>{
      entries.forEach(e=>{
        if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); }
      });
    }, {threshold:.14}) : null;
    if(io){ reveals.forEach(el=>io.observe(el)); } else { reveals.forEach(el=>el.classList.add('in')); }

    // Header shadow on scroll + Floating buttons show/hide
    const header = document.querySelector('header');
    const floatingBtns = document.getElementById('floating-buttons');
    const toTopBtn = document.getElementById('toTop');

    window.addEventListener('scroll', ()=>{
      const y = window.scrollY || document.documentElement.scrollTop;
      header.classList.toggle('header-scrolled', y > 8);
      floatingBtns.classList.toggle('show', y > 480);  // แสดงสองปุ่มพร้อมกันเมื่อเลื่อนลงเกิน 480px
    });

    toTopBtn.addEventListener('click', ()=> window.scrollTo({top:0, behavior:'smooth'}));
  </script>
</body>
</html>
