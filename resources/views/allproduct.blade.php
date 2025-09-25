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
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">

  @php
    $canon = route('showproduct');
    if (!empty($brandParam)) {
      $canon = route('showproduct.bybrand', ['brand' => $brandParam]);
      $catq  = $categoryParam ?? request('category', request('catagory'));
      if (!empty($catq)) $canon .= '?' . http_build_query(['catagory' => $catq]);
    }
  @endphp
  <link rel="canonical" href="{{ $canon }}"/>

  <!-- Assets -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{ --brand:#0b2a6b; --brand-2:#1552a7; --ink:#0f172a; --muted:#475569; }
    body{ font-family:'Prompt',sans-serif; color:var(--ink); background:#f8fafc; }
    .soft{ box-shadow:0 6px 20px rgba(2,6,23,.08), 0 2px 10px rgba(2,6,23,.06); }
    .btn{ display:inline-flex;align-items:center;gap:.5rem;padding:.65rem 1rem;border-radius:14px;font-weight:600 }
    .btn-primary{ background:linear-gradient(135deg,var(--brand),var(--brand-2)); color:#fff }
    .line-2{ display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden; }
    .no-scrollbar::-webkit-scrollbar{ display:none } .no-scrollbar{ -ms-overflow-style:none; scrollbar-width:none }

    /* รูปสินค้า: ใช้ขนาดจริง (ไม่ล็อก 300px) */
    .product-img{ width:100%; height:auto; object-fit:contain; background:#f1f5f9; display:block; }
    .product-img[data-placeholder="1"]{ min-height:160px; }

    /* กล่องค้นหา */
    .search-input{ border:1.5px solid var(--brand) !important; outline:none; border-radius:12px; }
    .search-input:focus{ box-shadow:0 0 0 3px rgba(11,42,107,.18); }

    /* Pagination (ล่างเท่านั้น) */
    .pager{ margin:1rem 0 0; }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex{
      gap:.4rem; flex-wrap:wrap; align-items:center;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > :not([hidden]) ~ :not([hidden]){
      margin-left:0 !important; margin-right:0 !important;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > *{
      --pg-border:#e6eaf0; --pg-bg:#fff; --pg-ink:#0f172a;
      border:1px solid var(--pg-border); background:var(--pg-bg); color:var(--pg-ink);
      min-width:34px; min-height:34px; padding:.40rem .55rem;
      font-size:.875rem; border-radius:10px;
      display:flex; align-items:center; justify-content:center;
      line-height:1; font-weight:600;
      box-shadow:0 1px 2px rgba(2,6,23,.04);
      transition:transform .16s, box-shadow .16s, background .16s, color .16s, border-color .16s;
      position:relative;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex a:hover{
      transform:translateY(-1px);
      box-shadow:0 4px 12px rgba(2,6,23,.08);
      border-color:#d7ddeb; background:#fbfdff;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex a:focus{
      outline:none; box-shadow:0 0 0 2px rgba(11,42,107,.18), 0 1px 2px rgba(2,6,23,.04);
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > span[aria-current="page"]{
      background:#eef2ff; border-color:#c7d2fe; color:#0b2a6b;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > span:not([aria-current])[class*="px-"]{
      background:#f8fafc; color:#64748b; border-color:#ecf0f5; font-weight:500;
    }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > :first-child,
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > :last-child{ width:34px; padding:0; }
    .pager nav[aria-label="Pagination Navigation"] .inline-flex > * > *{ pointer-events:none; }

    /* มือถือ: ปุ่มเล็กลง + จัดกึ่งกลาง */
    @media (max-width:480px){
      .pager{ margin-top:1rem; }
      .pager nav[aria-label="Pagination Navigation"] .inline-flex{ gap:.3rem; }
      .pager nav[aria-label="Pagination Navigation"] .inline-flex > *{
        min-width:30px; min-height:30px; padding:.3rem .45rem; font-size:.8125rem;
      }
      .pager nav[aria-label="Pagination Navigation"] .inline-flex > :first-child,
      .pager nav[aria-label="Pagination Navigation"] .inline-flex > :last-child{ width:30px; }
    }
  </style>
</head>
<body class="min-h-screen" id="top">

  <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 bg-white text-blue-700 px-3 py-2 rounded-md shadow">ข้ามไปยังเนื้อหา</a>

  <!-- Header -->
  <header class="sticky top-0 z-50 transition-all bg-white shadow" role="banner">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3.5 px-4 md:px-6">
      <a href="/" class="flex items-center gap-2">
        <img src="{{ asset('storage/logo/PNG.png') }}" alt="PowerCare logo" class="w-8 h-8 object-contain" loading="eager" decoding="async" fetchpriority="high">
        <span class="font-bold text-xl" style="color:var(--brand)">PowerCare</span>
        <span class="text-sm text-slate-500">by Hikari</span>
      </a>

      <nav class="hidden md:flex items-center gap-6 text-sm font-medium ml-auto mr-6">
        <a href="/" class="hover:text-blue-700">HOME</a>
       <a href="{{ route('product.index') }}" class="hover:text-blue-700">SERVICE</a>
        <a href="showproduct" class="hover:text-blue-700">ALL PRODUCT</a>
      </nav>

      <div class="hidden md:flex items-center gap-6 text-sm text-slate-700">
        <a href="tel:+6620000000" class="flex items-center gap-2 hover:text-blue-700"><i class="bi bi-telephone"></i> 099-080-2197</a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@hikaridenki.co.th" 
          target="_blank" 
          class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-envelope"></i> Info@hikaridenki.co.th
        </a>
        <a href="#contact" class="btn btn-primary"><i class="bi bi-send"></i> Contact</a>
      </div>

      <div class="md:hidden">
        <button id="menuToggle" class="text-slate-700 text-2xl" aria-label="Toggle menu"><i class="bi bi-list"></i></button>
      </div>
    </div>

    <nav id="mobileMenu" class="hidden md:hidden bg-blue-50 border-t text-sm font-medium flex justify-center gap-6 py-3">
      <a href="/" class="hover:text-blue-700">HOME</a>
      <a href="Product" class="hover:text-blue-700">SERVICE</a>
      <a href="showproduct" class="hover:text-blue-700">ALL PRODUCT</a>
      <a href="#contact" class="btn btn-primary text-xs px-3 py-1"><i class="bi bi-chat-dots"></i> Contact</a>
    </nav>

    <div class="md:hidden bg-blue-100 text-blue-900 text-xs px-4 py-2 flex items-center justify-center gap-4">
      <a href="tel:+6620000000" class="flex items-center gap-1"><i class="bi bi-telephone-fill"></i> 099-080-2197</a>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@hikaridenki.co.th" 
          target="_blank" 
          class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-envelope"></i> Info@hikaridenki.co.th
        </a>
    </div>
  </header>

  <script>
    document.getElementById("menuToggle").addEventListener("click", function(){
      document.getElementById("mobileMenu").classList.toggle("hidden");
    });
  </script>

  <!-- Main -->
  <main class="max-w-7xl mx-auto px-4 md:px-6 py-6" id="main">
    <h1 class="text-2xl font-bold mb-4" style="color:var(--brand)">All Products</h1>

    <!-- แถวบน: ค้นหา (ลบเพจด้านบนออกแล้ว) -->
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between mb-4">
      <div class="relative w-full md:max-w-xs">
        <input id="globalSearch" type="text" class="search-input w-full rounded-lg px-3 py-2 text-sm"
               placeholder="ค้นหาสินค้า..." autocomplete="off">
        <div id="searchResultsDesktop"
             class="absolute left-0 right-0 top-[calc(100%+4px)] hidden bg-white border rounded-xl shadow-lg z-50 overflow-hidden"></div>
      </div>
      <!-- (ไม่มี pager ด้านบนตามที่ขอ) -->
    </div>

    <!-- เลย์เอาท์ 2 คอลัมน์ -->
    <div class="grid grid-cols-1 md:grid-cols-[260px_minmax(0,1fr)] gap-5">
      <aside class="md:sticky md:top-20 self-start">
        <div class="bg-white border rounded-xl soft">
          <div class="px-3 py-2 border-b font-semibold text-slate-700 flex items-center gap-2">
            <i class="bi bi-tags"></i> เลือกยี่ห้อ
          </div>

          @php $currentBrandSlug = $activeBrandSlug ?? '*'; @endphp

          <div class="hidden md:block max-h-[70vh] overflow-y-auto no-scrollbar py-2">
            <a href="{{ route('showproduct') }}"
               class="block px-3 py-2 text-sm {{ $currentBrandSlug==='*' ? 'bg-blue-600 text-white rounded-md mx-2' : 'hover:bg-slate-50' }}">ทั้งหมด</a>
            @foreach ($brandCounts->keys() as $brandName)
              @php $slug = \Illuminate\Support\Str::slug($brandName, '-'); $isActive = $currentBrandSlug === $slug; @endphp
              <a href="{{ route('showproduct.bybrand', ['brand' => $brandName]) }}"
                 class="block px-3 py-2 text-sm mx-2 rounded-md {{ $isActive ? 'bg-blue-600 text-white' : 'hover:bg-slate-50' }}">{{ $brandName }}</a>
            @endforeach
          </div>

          <div class="md:hidden p-3">
            <select class="w-full border rounded-lg px-3 py-2 text-sm" onchange="if(this.value) location.href=this.value;">
              <option value="{{ route('showproduct') }}" {{ $currentBrandSlug==='*' ? 'selected' : '' }}>ทั้งหมด</option>
              @foreach ($brandCounts->keys() as $brandName)
                @php $slug = \Illuminate\Support\Str::slug($brandName, '-'); $url  = route('showproduct.bybrand', ['brand' => $brandName]); @endphp
                <option value="{{ $url }}" {{ $currentBrandSlug===$slug ? 'selected' : '' }}>{{ $brandName }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </aside>

    <!-- Product Grid -->
<section>
  @if($items->isEmpty())
    <div class="text-center text-slate-500 py-10 bg-white rounded-xl border">
      ไม่พบสินค้าในหมวดนี้
    </div>
  @else
    <div class="grid gap-4 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      @foreach ($items as $item)
        <div class="bg-white rounded-xl overflow-hidden soft ring-1 ring-slate-200 flex flex-col">
          {{-- รูปสินค้า --}}
          <div class="relative">
            @php $fallback = asset('storage/fallback/battery_sad_300.png'); @endphp
            <img
              src="{{ $item->pic ?: $fallback }}"
              alt="{{ $item->model ?? ($item->name ?? 'Product') }}"
              class="product-img w-full object-contain bg-white"
              loading="lazy" decoding="async"
              onerror="this.onerror=null;this.src='{{ $fallback }}'; this.setAttribute('data-placeholder','1');"
            >
          </div>

          {{-- เนื้อหา --}}
          <div class="p-3 sm:p-4 flex-1 flex flex-col">
            {{-- ชื่อสินค้า --}}
            <h3 class="font-semibold text-sm sm:text-base mb-2 line-2">
              {{ $item->name ?? $item->model ?? '—' }}
            </h3>

            {{-- ราคา --}}
            <div class="text-lg sm:text-xl font-bold text-amber-600 mb-3">
              {{ $item->webpriceTHB }} ฿
            </div>

            @php
              // ----- Normalize values -----
              $modelTxt = blank($item->model) ? '—' : trim($item->model);

              $leadRaw  = trim((string)($item->lead_time_web ?? ''));
              $leadTxt  = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3-5 days' : $leadRaw;

              $hasStock = filled($item->stock) && (int)$item->stock > 0;
              $stockTxt = $hasStock ? number_format((int)$item->stock).' ชิ้น' : 'ติดต่อสอบถาม';

              $stockChip = $hasStock
                ? 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'
                : 'bg-slate-100 text-slate-600 ring-1 ring-slate-300';

              $leadChip  = 'bg-amber-50 text-amber-700 ring-1 ring-amber-200';
              $modelChip = 'bg-sky-50 text-sky-700 ring-1 ring-sky-200';
            @endphp

            {{-- Badges --}}
            <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm mb-3">
              {{-- @if($modelTxt !== '—')
                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full {{ $modelChip }}">
                  <i class="bi bi-cpu"></i>
                  รุ่น: <strong>{{ $modelTxt }}</strong>
                </span>
              @endif --}}

              <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full {{ $leadChip }}">
                <i class="bi bi-truck"></i>
                ส่ง: <strong>{{ $leadTxt }}</strong>
              </span>

              <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full {{ $stockChip }}">
                <i class="bi bi-box-seam"></i>
                คงเหลือ: <strong>{{ $stockTxt }}</strong>
              </span>
            </div>

            {{-- ปุ่มดูรายละเอียด --}}
            <a href="{{ route('showproduct.byiditem', ['iditem' => $item->iditem]) }}"
               class="btn btn-primary mt-auto justify-center text-xs sm:text-sm">
              <i class="bi bi-cart-plus"></i> ดูรายละเอียด
            </a>
          </div>
        </div>
      @endforeach
    </div>

    <br>

    <!-- Pager (ล่างเท่านั้น) -->
    <div>
      {{ $items->withQueryString()->onEachSide(1)->links() }}
    </div>
  @endif
  
</section>

    </div>
  </main>

  {{-- footer --}}
  @include('footer')

  <!-- Search dropdown -->
  <script>
  document.addEventListener('DOMContentLoaded', function(){
    const SEARCH_URL = "{{ route('search.products') }}";
    const input  = document.getElementById('globalSearch');
    const dd     = document.getElementById('searchResultsDesktop');
    if(!input || !dd) return;

    const MIN = 3; let timer=null;
    const FALLBACK_PIC = "{{ asset('storage/fallback/battery_sad_300.png') }}";

    function closeDD(){ dd.classList.add('hidden'); dd.innerHTML=''; }
    function openDD(){ dd.classList.remove('hidden'); }

    async function fetchDB(q){
      try{
        const url = new URL(SEARCH_URL, window.location.origin);
        url.searchParams.set('q', q);
        const res = await fetch(url, { headers: { 'Accept':'application/json' }});
        if(!res.ok) return [];
        const data = await res.json();
        return Array.isArray(data) ? data : [];
      }catch(e){ console.error(e); return []; }
    }

    function render(items){
      dd.innerHTML = '';
      if(!items.length){ dd.innerHTML = '<div class="px-3 py-2 text-sm text-slate-500">ไม่พบผลลัพธ์</div>'; openDD(); return; }
      const frag = document.createDocumentFragment();
      items.forEach(it=>{
        const imgSrc = (it.pic && String(it.pic).trim()) ? it.pic : FALLBACK_PIC;
        const a = document.createElement('a');
        a.href = it.url; a.className='flex gap-3 items-center px-3 py-2 hover:bg-amber-50';
        a.innerHTML = `
          <div class="h-10 w-10 rounded border bg-gray-50 overflow-hidden shrink-0">
            <img src="${imgSrc}" alt="" class="w-full h-full object-cover"
                 onerror="this.onerror=null;this.src='${FALLBACK_PIC}'">
          </div>
          <div class="min-w-0 flex-1">
            <div class="text-sm text-gray-800 truncate">${(it.name||it.model||'—')}</div>
            <div class="text-xs text-slate-500 truncate">${(it.brand||'')}${it.model? ' · '+it.model:''}</div>
          </div>`;
        frag.appendChild(a);
      });
      dd.appendChild(frag);
      dd.style.maxHeight='60vh'; dd.style.overflowY='auto';
      openDD();
    }

    input.addEventListener('input', ()=>{
      const q = input.value.trim();
      if(q.length<MIN){ closeDD(); return; }
      clearTimeout(timer);
      timer = setTimeout(async ()=> render(await fetchDB(q)), 220);
    });

    document.addEventListener('click', (e)=>{
      const hit = e.target.closest('#'+dd.id+', #'+input.id);
      if(!hit) closeDD();
    });
  });
  </script>
</body>
</html>
