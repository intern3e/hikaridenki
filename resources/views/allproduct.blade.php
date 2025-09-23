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
  @php
    $canon = route('showproduct'); // default = ทั้งหมด
    if (!empty($brandParam)) {
      $canon = route('showproduct.bybrand', ['brand' => $brandParam]);
      $catq  = $categoryParam ?? request('category', request('catagory'));
      if (!empty($catq)) {
        $canon .= '?' . http_build_query(['catagory' => $catq]); // ใช้คีย์ตามที่ต้องการ
      }
    }
  @endphp
  <link rel="canonical" href="{{ $canon }}"/>

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

  <!-- Swiper (ถ้ามีใช้งาน) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <style>
    :root{
      --brand:#0b2a6b;
      --brand-2:#1552a7;
      --accent:#f59e0b;
      --ink:#0f172a;
      --muted:#475569;
      --surface:#ffffff;
      --sticky-top: 64px; /* ความสูง header สำหรับ sticky filter bar */
    }

    html{ scroll-behavior:smooth; }
    body{ font-family:'Prompt',sans-serif; color:var(--ink); background:#f8fafc; }

    /* ---------- Elevation & motion ---------- */
    .soft{ box-shadow: 0 6px 20px rgba(2,6,23,.08), 0 2px 10px rgba(2,6,23,.06); }
    .card{ transition: transform .2s ease, box-shadow .2s ease; }
    .card:hover{ transform: translateY(-2px); box-shadow: 0 14px 40px rgba(2,6,23,.12); }

    /* ---------- Buttons ---------- */
    .btn{ display:inline-flex; align-items:center; gap:.5rem; padding:.7rem 1rem; border-radius:14px; font-weight:600; line-height:1; }
    .btn:focus-visible{ outline:none; box-shadow:0 0 0 4px rgba(14,165,233,.25); }
    .btn-primary{ background:linear-gradient(135deg,var(--brand),var(--brand-2)); color:#fff; }
    .btn-primary:hover{ filter:brightness(1.05); }

    /* ---------- Header ---------- */
    header{ background:rgba(255,255,255,.88); backdrop-filter: blur(10px); border-bottom:1px solid rgba(2,6,23,.06); }
    .header-scrolled{ box-shadow:0 8px 22px rgba(2,6,23,.10); }

    /* ---------- Utilities ---------- */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* line clamp fallback */
    .line-2, .line-clamp-2{
      display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;
    }

    /* chips */
    .chip{
      display:inline-flex;align-items:center;gap:.5rem;
      padding:.4rem .75rem;border:1px solid; border-radius:9999px;
      white-space:nowrap; font-size:.875rem; line-height:1;
      transition:all .15s ease;
    }
    .chip:hover{ transform: translateY(-1px); }

    /* Floating buttons */
    #floating-buttons{position:fixed;right:16px;bottom:16px;display:flex;flex-direction:column;gap:12px;opacity:0;pointer-events:none;transform:translateY(8px);transition:opacity .2s ease, transform .2s ease;z-index:60}
    #floating-buttons.show{opacity:1;pointer-events:auto;transform:translateY(0)}
    #floating-buttons .circle{width:56px;height:56px;border-radius:9999px;background:#fff;border:1px solid rgba(2,6,23,.08);box-shadow:0 8px 18px rgba(2,6,23,.15)}
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
        <a href="{{ url('Product') }}" class="hover:text-blue-700">OUR CATALOG</a>
        <a href="{{ route('showproduct') }}" class="hover:text-blue-700">ALL PRODUCT</a>
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
      <a href="{{ url('Product') }}" class="hover:text-blue-700">OUR CATALOG</a>
      <a href="{{ route('showproduct') }}" class="hover:text-blue-700">ALL PRODUCT</a>
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
    document.addEventListener('DOMContentLoaded', function(){
      const btn = document.getElementById('menuToggle');
      const menu = document.getElementById('mobileMenu');
      if(btn && menu){ btn.addEventListener('click', ()=> menu.classList.toggle('hidden')); }
    });
  </script>



 <script>
document.addEventListener('DOMContentLoaded', function(){
  const SEARCH_URL = "{{ route('search.products') }}"; // ต้องมีใน web.php
  const input  = document.getElementById('globalSearch');
  const dd     = document.getElementById('searchResultsDesktop');

  if (!input || !dd) {
    console.warn('Search elements not found');
    return;
  }
  const MIN = 3;         
  let timer = null;
  function closeDD(){ dd.classList.add('hidden'); dd.innerHTML=''; }
  function openDD(){ dd.classList.remove('hidden'); }
  async function fetchDB(q){
    try{
      const url = new URL(SEARCH_URL, window.location.origin);
      url.searchParams.set('q', q);
      const res = await fetch(url.toString(), { headers: { 'Accept': 'application/json' } });

      console.log('[SEARCHBAR] q=', q, {
        status: res.status,
        db:   res.headers.get('X-Search-DB'),
        cnt:  res.headers.get('X-Search-Count'),
        time: res.headers.get('X-Search-Time'),
        err:  res.headers.get('X-Search-Error')
      });

      if (!res.ok) {
        const errData = await res.json().catch(()=> ({}));
        console.error('[SEARCHBAR] backend error:', errData);
        return [];
      }

      const data = await res.json();
      return Array.isArray(data) ? data : [];
    }catch(err){
      console.error('Search error', err);
      return [];
    }
  }


  function render(items){
    dd.innerHTML = '';
    if (!items.length){
      dd.innerHTML = `<div class="px-3 py-2 text-sm text-slate-500">ไม่พบผลลัพธ์</div>`;
      openDD(); return;
    }
    const frag = document.createDocumentFragment();
    items.forEach(it => {
      const FALLBACK_PIC = 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000';
      const imgSrc = (it.pic && String(it.pic).trim()) ? it.pic : FALLBACK_PIC;
      const a = document.createElement('a');
      a.href = it.url;
      a.className = 'flex gap-3 items-center px-3 py-2 hover:bg-amber-50 transition-colors';
      a.innerHTML = `
        <div class="h-10 w-10 rounded border bg-gray-50 overflow-hidden flex-shrink-0">
          <img src="${imgSrc}" alt="" class="w-full h-full object-cover"
              onerror="this.onerror=null;this.src='${FALLBACK_PIC}';">
        </div>
        <div class="min-w-0 flex-1">
          <div class="text-sm text-gray-800 truncate">${(it.name||it.model||'—')}</div>
          <div class="text-xs text-slate-500 truncate">${(it.brand||'')}${it.model? ' · '+it.model:''}</div>
        </div>
      `;
      frag.appendChild(a);
    });
    dd.appendChild(frag);
    dd.style.maxHeight = '60vh';
    dd.style.overflowY = 'auto';
    openDD();
  }

  input.addEventListener('input', ()=>{
    const q = input.value.trim();
    if (q.length < MIN){ closeDD(); return; }
    clearTimeout(timer);
    timer = setTimeout(async ()=>{
      const items = await fetchDB(q);
      render(items);
    }, 220);
  });

  document.addEventListener('click', (e)=>{
    const hit = e.target.closest('#'+dd.id+', #'+input.id);
    if (!hit) closeDD();
  });

  // Debug ช่วยตรวจ route ได้จาก console
  console.log('Search ready →', SEARCH_URL);
});

</script>




  <main id="main">
    <section id="products" class="max-w-7xl mx-auto px-4 md:px-6 py-10">
      <h1 class="text-2xl font-bold text-center mb-6" style="color:var(--brand)">All Products</h1>
  <div class="relative">
    <input id="globalSearch" type="text"
           class="border rounded-lg px-3 py-1.5 text-sm w-64 focus:ring-2 focus:ring-[var(--brand)]"
           placeholder="ค้นหาสินค้า..." autocomplete="off">
    <div id="searchResultsDesktop"
         class="absolute left-0 right-0 top-[calc(100%+4px)] hidden bg-white rounded-xl shadow-xl z-[80] border overflow-hidden"></div>
  </div>


    {{-- หาแบรน์ --}}
      @if($brandCounts->isNotEmpty())
        <div class="sticky top-[var(--sticky-top)] z-20 bg-white/80 backdrop-blur border rounded-xl mb-6 p-2">
          <div class="grid grid-cols-[minmax(0,1fr)_auto] items-center gap-2">
            <div class="relative">
              <button id="catPrev"
                      class="hidden md:flex absolute left-1 top-1/2 -translate-y-1/2 z-10 w-8 h-8 rounded-full bg-white/90 border shadow items-center justify-center transition-opacity"
                      type="button" aria-label="เลื่อนไปซ้าย"><i class="bi bi-chevron-left"></i></button>

              <button id="catNext"
                      class="hidden md:flex absolute right-1 top-1/2 -translate-y-1/2 z-10 w-8 h-8 rounded-full bg-white/90 border shadow items-center justify-center transition-opacity"
                      type="button" aria-label="เลื่อนไปขวา"><i class="bi bi-chevron-right"></i></button>

              <div id="fadeLeft"  class="pointer-events-none hidden md:block absolute inset-y-0 left-0 w-8 z-[5] bg-gradient-to-r from-white to-transparent opacity-0 transition-opacity"></div>
              <div id="fadeRight" class="pointer-events-none hidden md:block absolute inset-y-0 right-0 w-8 z-[5] bg-gradient-to-l from-white to-transparent opacity-0 transition-opacity"></div>

              @php
                $currentBrandSlug = $activeBrandSlug ?? '*';
              @endphp

              <div id="catRail" class="flex flex-nowrap items-center gap-2 overflow-x-auto no-scrollbar pr-10 pl-10" role="tablist" aria-label="ยี่ห้อสินค้า">
                {{-- ทั้งหมด --}}
                <a href="{{ route('showproduct') }}"
                  class="chip {{ $currentBrandSlug === '*' ? 'bg-amber-600 text-white border-amber-600 shadow' : 'bg-white text-slate-600 border-slate-200' }}"
                  data-brand="*" aria-pressed="{{ $currentBrandSlug === '*' ? 'true' : 'false' }}">
                  <i class="bi bi-stars"></i><span class="whitespace-nowrap">ทั้งหมด</span>
                </a>

                {{-- วนแบรนด์จากฐานข้อมูล --}}
                @foreach ($brandCounts->keys() as $brandName)
                  @php
                    $slug = \Illuminate\Support\Str::slug($brandName, '-');
                    $isActive = ($activeBrandSlug ?? '*') === $slug;
                  @endphp
                  <a href="{{ route('showproduct.bybrand', ['brand' => $brandName]) }}"
                    class="chip {{ $isActive ? 'bg-amber-600 text-white border-amber-600 shadow' : 'bg-white text-slate-600 border-slate-200' }}"
                    data-brand="{{ $slug }}" aria-pressed="{{ $isActive ? 'true' : 'false' }}">
                    <i class="bi bi-tags"></i><span class="whitespace-nowrap">{{ $brandName }}</span>
                  </a>
                @endforeach
              </div>
            </div>

            {{-- คอลัมน์ขวา: select (PC) --}}
            <div class="hidden md:flex items-center gap-2 pl-1 shrink-0">
              <i class="bi bi-funnel"></i>
              <select id="catSelect" class="border rounded-lg px-3 py-1.5 text-sm">
                <option value="{{ route('showproduct') }}" {{ ($activeBrandSlug ?? '*') === '*' ? 'selected' : '' }}>ทั้งหมด</option>
                @foreach ($brandCounts->keys() as $brandName)
                  @php
                    $slug = \Illuminate\Support\Str::slug($brandName, '-');
                    $isActive = ($activeBrandSlug ?? '*') === $slug;
                    $url = route('showproduct.bybrand', ['brand' => $brandName]); // ไม่มี query
                  @endphp
                  <option value="{{ $url }}" {{ $isActive ? 'selected' : '' }}>{{ $brandName }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        @endif
{{-- หาแบรน --}}

      {{-- ===== กริดสินค้า (มือถือ = 2 คอลัมน์) ===== --}}
      @if($items->isEmpty())
        <div class="text-center text-slate-500 py-10">ไม่พบสินค้าในหมวดนี้</div>
      @else
        <div id="productGrid" class="grid gap-4 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          @foreach ($items as $item)
            <div class="card bg-white rounded-xl overflow-hidden soft flex flex-col ring-1 ring-slate-200 transition hover:shadow-md">
              <!-- รูปสินค้า -->
              <div class="relative">
                <img   src="{{ $item->pic ?: 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000' }}"
                    alt="{{ $item->model ?? '—' }}"
                    class="w-full h-36 sm:h-44 md:h-48 object-cover"
                    loading="lazy" decoding="async">
              </div>

              <!-- เนื้อหา -->
              <div class="p-3 sm:p-4 flex-1 flex flex-col">
                <h3 class="font-semibold text-base sm:text-lg mb-2 line-2">{{ $item->name ?? '—' }}</h3>

                <div class="text-lg sm:text-xl font-bold text-amber-600 mb-2">
                  {{ ($item->webpriceTHB) }} ฿
                </div>

                <div class="text-xs sm:text-sm text-slate-600 mb-1">
                  <i class="bi bi-truck"></i> วันที่ส่ง: {{ $item->lead_time_web ?? '—' }}
                </div>
                <div class="text-xs sm:text-sm text-slate-600 mb-3">
                  <i class="bi bi-tags"></i> ประเภท: {{ $item->category ?? '—' }}
                </div>

                <!-- ปุ่ม -->
                <a href="/product/{{ $item->iditem }}" class="btn btn-primary mt-auto text-xs sm:text-sm justify-center">
                  <i class="bi bi-cart-plus"></i> ดูรายละเอียด
                </a>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </section>
    <div class="mt-6">
  {{ $items->withQueryString()->links() }}
</div>
  </main>

  {{-- footer --}}
  @include('footer')

  <!-- ===== Floating buttons (LINE + Back to top) ===== -->
  <div id="floating-buttons" aria-label="Quick actions">
    <!-- LINE -->
    <a href="line://ti/p/@Hikaridenki" aria-label="LINE" class="circle" title="Chat on LINE"
       style="display:flex;align-items:center;justify-content:center;">
      <img src="{{ asset('storage/line.avif') }}" alt="LINE" style="width:40px;height:40px;object-fit:contain;">
    </a>

    <!-- Back to top -->
    <button id="toTop" aria-label="กลับขึ้นด้านบน" class="btn circle rounded-full" title="กลับขึ้นด้านบน"
      style="background-color:#0b2a6b; color:#fff; border:none; width:56px; height:56px; display:flex; align-items:center; justify-content:center; box-shadow:0 4px 10px rgba(0,0,0,.2); transition:background-color 0.3s ease;">
      <i class="bi bi-arrow-up"></i>
    </button>
  </div>

  <!-- ===== Scripts ===== -->
  <script>
    // Header shadow on scroll + Floating buttons show/hide
    const header = document.querySelector('header');
    const floatingBtns = document.getElementById('floating-buttons');
    const toTopBtn = document.getElementById('toTop');
    window.addEventListener('scroll', ()=>{
      const y = window.scrollY || document.documentElement.scrollTop;
      header.classList.toggle('header-scrolled', y > 8);
      floatingBtns.classList.toggle('show', y > 480);
    });
    toTopBtn.addEventListener('click', ()=> window.scrollTo({top:0, behavior:'smooth'}));

    // ====== Arrow Scroll Controls for category rail ======
    (function(){
      const rail = document.getElementById('catRail');
      if (!rail) return;

      const prevBtn = document.getElementById('catPrev');
      const nextBtn = document.getElementById('catNext');
      const fadeL   = document.getElementById('fadeLeft');
      const fadeR   = document.getElementById('fadeRight');

      const STEP = 260; // ระยะเลื่อนต่อคลิก (px)

      function updateNav() {
        const atStart = rail.scrollLeft <= 2;
        const atEnd   = rail.scrollLeft + rail.clientWidth >= rail.scrollWidth - 2;

        prevBtn?.classList.toggle('invisible', atStart);
        nextBtn?.classList.toggle('invisible', atEnd);
        if (fadeL) fadeL.style.opacity = atStart ? '0' : '1';
        if (fadeR) fadeR.style.opacity = atEnd   ? '0' : '1';
      }

      prevBtn?.addEventListener('click', () => rail.scrollBy({ left: -STEP, behavior: 'smooth' }));
      nextBtn?.addEventListener('click', () => rail.scrollBy({ left:  STEP, behavior: 'smooth' }));

      // เลื่อนด้วยล้อเมาส์แนวตั้ง -> แปลงเป็นแนวนอน (ใช้งานง่ายบน PC)
      rail.addEventListener('wheel', (e) => {
        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
          rail.scrollLeft += e.deltaY;
          e.preventDefault();
        }
      }, { passive: false });

      rail.addEventListener('scroll', updateNav);
      window.addEventListener('resize', updateNav);
      window.addEventListener('load', updateNav);
      updateNav();
    })();

    // ====== Select -> เปลี่ยนหน้าไปตาม URL ======
    (function(){
      const sel = document.getElementById('catSelect');
      if(!sel) return;
      sel.addEventListener('change', (e)=>{
        const url = e.target.value;
        if(url) window.location.href = url;
      });
    })();
  </script>

</body>
</html>