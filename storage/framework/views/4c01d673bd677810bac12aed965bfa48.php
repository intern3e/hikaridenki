<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PowerCare by Hikari — โซลูชันระบบไฟสำรองสำหรับองค์กร</title>
  <meta name="description" content="ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉินสำหรับองค์กร ติดตั้ง บำรุงรักษา ตรวจรับรอง และให้คำปรึกษา โดยทีมวิศวกรมากประสบการณ์กว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <link rel="icon" type="image/png" href="<?php echo e(asset('storage/logo/PNG.png')); ?>">

  <?php echo $__env->make('header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  
  <?php
    // อ่าน brand/category จาก route param ก่อน แล้วค่อย fallback เป็น query string
    $brandInRoute  = request()->route('brand');
    $brandParam    = $brandParam    ?? $brandInRoute ?? request('brand');
    $categoryParam = $categoryParam ?? request()->route('category') ?? request('category', request('catagory'));
  ?>

  
  <?php
    $canon = route('showproduct');
    if (!empty($brandParam)) {
      $canon = route('showproduct.bybrand', ['brand' => $brandParam]);
      $catq  = $categoryParam ?? request('category', request('catagory'));
      if (!empty($catq)) $canon .= '?' . http_build_query(['catagory' => $catq]);
    }
  ?>
  <link rel="canonical" href="<?php echo e($canon); ?>"/>

  <!-- OG -->
  <meta property="og:title" content="PowerCare by Hikari — B2B Power Solutions">
  <meta property="og:description" content="โซลูชันระบบไฟสำรองและไฟฉุกเฉินแบบครบวงจรสำหรับองค์กร">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="th_TH">

  <!-- Tailwind & Icons -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --brand:#0b2a6b; --accent:#f59e0b; --line:#e6edf5; --bg:#f8fafc;
      --fs-2xs: clamp(10px, 0.24rem + 0.25vw, 12px);
      --fs-xs:  clamp(11px, 0.30rem + 0.45vw, 13.5px);
      --fs-sm:  clamp(12.5px, 0.36rem + 0.65vw, 15px);
      --fs-md:  clamp(14px, 0.42rem + 0.9vw, 17.5px);
      --fs-lg:  clamp(16px, 0.52rem + 1.2vw, 21px);
      --fs-2xl: clamp(22px, 0.9rem + 2.4vw, 34px);
      --img-size: 222.5px;
    }
    body{ font-family:"Prompt",system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue","Noto Sans Thai",Arial,"Apple Color Emoji","Segoe UI Emoji"; background:var(--bg); }
    .soft{ box-shadow:0 1px 2px rgba(2,6,23,.04), 0 6px 24px rgba(2,6,23,.06) }
    .chips{ display:flex; flex-wrap:wrap; gap:8px; align-items:center }
    .chip{ display:inline-flex; align-items:center; gap:.5rem; padding:.5rem .75rem; border-radius:999px; line-height:1; font-size:var(--fs-xs); white-space:nowrap; border:1px solid var(--line) }
    .img-rail{ position:relative; display:flex; align-items:center; justify-content:center; background:#fff; padding:8px; width:100% }
    .img-square{ width:var(--img-size); height:var(--img-size); display:flex; align-items:center; justify-content:center; margin-inline:auto }
    .img-square>img{ max-width:100%; max-height:100%; width:auto; height:auto; object-fit:contain; object-position:center; display:block; margin:auto }
    .toolbar{ background:rgba(255,255,255,.86); backdrop-filter:saturate(120%) blur(10px); border:1px solid var(--line); border-radius:18px; box-shadow:0 10px 30px rgba(2,15,46,.06) }
    .seg{ display:inline-grid; grid-auto-flow:column; gap:2px; background:#e7effb; padding:4px; border-radius:999px }
    .seg input{ display:none }
    .seg label{ padding:.55rem .9rem; font-size:var(--fs-xs); border-radius:999px; cursor:pointer; user-select:none; color:#334155; display:inline-flex; align-items:center; gap:.4rem }
    .seg input:checked + label{ background:#fff; color:#0b2a6b; box-shadow:0 1px 0 rgba(0,0,0,.04), inset 0 0 0 1px rgba(17,64,138,.12) }
    .chip-toggle{ display:inline-flex; align-items:center; gap:.5rem; padding:.55rem .8rem; border-radius:999px; border:1px solid var(--line); background:#fff; font-size:var(--fs-xs) }
    .chip-toggle.active{ background:#ecfdf5; color:#047857; border-color:#a7f3d0 }
    .mcard{ border-radius:16px; background:#fff; border:1px solid var(--line); box-shadow:0 6px 20px rgba(2,15,46,.05); padding:12px }
    .mcard-grid{ display:grid; grid-template-columns:96px minmax(0,1fr); gap:12px; align-items:start }
    .mcard-img{ width:96px; height:96px; border-radius:12px; background:#fff; border:1px solid #e5e7eb; display:grid; place-items:center; overflow:hidden }
    .pill{ display:inline-flex; gap:.4rem; align-items:center; padding:.25rem .55rem; border-radius:999px; font-size:12px; border:1px solid #e6edf5; background:#f1f5ff; color:#0b3d91 }
    .pill-lead{ background:#fff7ed; border-color:#fde68a; color:#b45309 }
    .pill-stock{ background:#ecfdf5; border-color:#a7f3d0; color:#047857 }
    .pill-stock.badge-muted{ background:#f1f5f9; border-color:#e2e8f0; color:#475569 }
    .m-title{ font-size:var(--fs-sm); font-weight:600; color:#0f172a; line-height:1.35 }
    .m-price{ font-weight:800; color:#b45309; font-size:15.5px; letter-spacing:.2px }
    .line-clamp-2{ display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden }
    .no-scrollbar{ scrollbar-width:none } .no-scrollbar::-webkit-scrollbar{ display:none }
    .dd-root{ position:relative }
    .dd-trigger{ display:flex; align-items:center; justify-content:space-between; gap:.75rem; width:100%; border:1px solid #e2e8f0; border-radius:.75rem; background:#fff; padding:.625rem .875rem; font-size:var(--fs-sm); color:#334155; box-shadow:0 1px 1px rgba(2,6,23,.04), 0 8px 24px rgba(2,6,23,.06) }
    .dd-chev{ transition: transform .2s ease }
    .dd-root.open .dd-chev{ transform: rotate(180deg) }
    .dd-panel{ position:absolute; inset-inline-start:0; top:calc(100% + .375rem); width:100%; background:#fff; border:1px solid #e2e8f0; border-radius:.75rem; box-shadow:0 10px 30px rgba(2,6,23,.12); overflow:hidden; z-index:50; max-height:0; opacity:.0; transform:translateY(-4px); transition:max-height .22s ease, opacity .18s ease, transform .18s ease }
    .dd-root.open .dd-panel{ max-height:320px; opacity:1; transform:translateY(0) }
    .dd-item{ width:100%; text-align:left; border-radius:.5rem; padding:.625rem .75rem; font-size:var(--fs-sm); color:#0f172a }
    .dd-item:hover{ background:#f1f5f9 }
    .dd-item.active{ background:#0b2a6b; color:#fff }
  </style>
</head>

<body>
  <?php
    // Helper: แนบ query ปัจจุบันแบบเลือกได้ว่าตัด key ไหนทิ้ง (กัน brand ซ้อน)
    $keepQS = function(string $url, array $extra = [], array $drop = []) {
      $q = request()->query();
      foreach ($drop as $rm) { unset($q[$rm]); }
      foreach ($extra as $k=>$v) { if ($v === null) unset($q[$k]); else $q[$k]=$v; }
      $qs = http_build_query($q);
      return $qs ? $url.'?'.$qs : $url;
    };
  ?>

  <main class="max-w-7xl mx-auto px-4 md:px-6 py-6" id="main">
    
    <?php
      if (!isset($brandThumbs) || !is_array($brandThumbs)) { $brandThumbs = []; }
    ?>

    
    <?php
      use Illuminate\Support\Facades\Schema;
      use Illuminate\Support\Facades\DB;
      use Illuminate\Pagination\LengthAwarePaginator;

      $brand    = is_string($brandParam ?? null)
                    ? trim($brandParam)
                    : (is_string(request('brand')) ? trim(request('brand')) : null);
      $sort     = request('sort','new');   // new|price_asc|price_desc|name
      $inStock  = request('in_stock') === '1';
      $viewAll  = request('view') === 'all';

      $perPage  = $viewAll
                  ? 100000
                  : (($items ?? null) instanceof \Illuminate\Contracts\Pagination\Paginator
                        ? $items->perPage()
                        : 40);

      // ===== ตรวจหา table ที่ใช้งานได้ =====
      $table = null;
      if (Schema::hasTable('items')) {
        $table = 'items';
      } elseif (Schema::hasTable('hikaridenki')) {
        $table = 'hikaridenki';
      } else {
        try {
          $tables = collect(DB::select('SHOW TABLES'))->map(fn($r)=>array_values((array)$r)[0]);
          foreach ($tables as $t) {
            $hasId = Schema::hasColumn($t,'iditem') || Schema::hasColumn($t,'id');
            if ($hasId) { $table = $t; break; }
          }
        } catch (\Throwable $e) { $table = null; }
      }

      // ===== ดึงรายการสินค้า =====
      if ($table) {
        $qb = DB::table($table);

        // columns
        if (Schema::hasColumn($table,'iditem')) $qb->addSelect('iditem');
        elseif (Schema::hasColumn($table,'id')) $qb->addSelect(DB::raw('id as iditem'));

        foreach (['brand','name','model','stock','created_at','updated_at'] as $c) {
          if (Schema::hasColumn($table,$c)) $qb->addSelect($c);
        }
        if (Schema::hasColumn($table,'webpriceTHB'))       $qb->addSelect('webpriceTHB');
        elseif (Schema::hasColumn($table,'price'))         $qb->addSelect(DB::raw('price as webpriceTHB'));

        if (Schema::hasColumn($table,'pic_resolved'))      $qb->addSelect('pic_resolved');
        elseif (Schema::hasColumn($table,'pic'))           $qb->addSelect(DB::raw('pic as pic_resolved'));
        elseif (Schema::hasColumn($table,'image_url'))     $qb->addSelect(DB::raw('image_url as pic_resolved'));

        if (Schema::hasColumn($table,'lead_time_web'))     $qb->addSelect('lead_time_web');
        elseif (Schema::hasColumn($table,'lead_time'))     $qb->addSelect(DB::raw('lead_time as lead_time_web'));
        elseif (Schema::hasColumn($table,'lead'))          $qb->addSelect(DB::raw('lead as lead_time_web'));

        // where brand (case-insensitive + trim)
        if ($brand && Schema::hasColumn($table,'brand')) {
          $qb->whereRaw('TRIM(UPPER(brand)) = ?', [mb_strtoupper(trim($brand))]);
        }

        // in stock filter
        if ($inStock && Schema::hasColumn($table,'stock')) {
          $qb->where(function($q){
            $q->whereNotNull('stock')
              ->whereRaw("NULLIF(TRIM(stock),'') IS NOT NULL")
              ->whereRaw("TRIM(stock) <> '-'")
              ->whereRaw("TRIM(stock) <> '—'")
              ->whereRaw("CAST(stock AS SIGNED) > 0");
          });
        }

        // sorting
        if ($sort === 'price_asc') {
          $qb->orderByRaw('CAST(webpriceTHB AS DECIMAL(18,4)) ASC');
        } elseif ($sort === 'price_desc') {
          $qb->orderByRaw('CAST(webpriceTHB AS DECIMAL(18,4)) DESC');
        } elseif ($sort === 'name') {
          $case = "CASE ";
          if (Schema::hasColumn($table,'name'))  $case .= "WHEN NULLIF(TRIM(name),'')  IS NOT NULL THEN SUBSTRING_INDEX(TRIM(name),' ',1) ";
          if (Schema::hasColumn($table,'model')) $case .= "WHEN NULLIF(TRIM(model),'') IS NOT NULL THEN TRIM(model) ";
          if (Schema::hasColumn($table,'iditem'))$case .= "WHEN iditem IS NOT NULL THEN CAST(iditem AS CHAR) ";
          elseif (Schema::hasColumn($table,'id'))$case .= "WHEN id IS NOT NULL THEN CAST(id AS CHAR) ";
          $case .= "ELSE '' END";
          $qb->orderByRaw("$case ASC");
          if (Schema::hasColumn($table,'name')) $qb->orderBy('name','asc');
        } else {
          if (Schema::hasColumn($table,'updated_at'))      $qb->orderBy('updated_at','desc');
          elseif (Schema::hasColumn($table,'created_at'))  $qb->orderBy('created_at','desc');
          else                                             $qb->orderBy('iditem','desc');
        }

        $items = $qb->paginate($perPage)->withQueryString();

        // ===== สร้าง brandCounts =====
        if (Schema::hasColumn($table,'brand')) {
          $brandCounts = DB::table($table)
            ->selectRaw('TRIM(brand) as brand, COUNT(*) as c')
            ->whereRaw("NULLIF(TRIM(brand),'') IS NOT NULL")
            ->groupBy(DB::raw('TRIM(brand)'))
            ->orderBy('brand')
            ->pluck('c','brand');
        } else {
          $brandCounts = collect([]);
        }

      } else {
        // ===== Fallback: ใช้ $items ที่ controller ส่งมา แล้วจัดเรียงเอง =====
        $original = ($items ?? null) instanceof \Illuminate\Contracts\Pagination\Paginator
                      ? collect($items->items())
                      : collect($items ?? []);

        if ($inStock) {
          $original = $original->filter(function($it){
            $raw = isset($it->stock) ? trim((string)$it->stock) : '';
            if ($raw === '' || $raw === '-' || $raw === '—') return false;
            return (int)$raw > 0;
          });
        }

        $getKey = function($it) use ($sort){
          $name  = isset($it->name)  ? trim((string)$it->name)  : '';
          $model = isset($it->model) ? trim((string)$it->model) : '';
          $idit  = isset($it->iditem)? (string)$it->iditem      : (isset($it->id)? (string)$it->id : '');
          $price = isset($it->webpriceTHB) ? (float)str_replace([',',' '],'',(string)$it->webpriceTHB) : 0;
          if ($sort === 'price_asc' || $sort === 'price_desc') return $price;
          if ($sort === 'name') {
            if ($name !== '') { $first = preg_split('/\s+/', $name, 2)[0] ?? $name; return mb_strtoupper($first.' '.$name); }
            if ($model !== '') return mb_strtoupper($model);
            return mb_strtoupper($idit);
          }
          $updated = isset($it->updated_at)? strtotime((string)$it->updated_at) : null;
          $created = isset($it->created_at)? strtotime((string)$it->created_at) : null;
          return -1 * ( $updated ?? $created ?? (is_numeric($idit)? (int)$idit : 0) );
        };

        if     ($sort === 'price_desc') $original = $original->sortByDesc($getKey, SORT_REGULAR);
        elseif ($sort === 'price_asc')  $original = $original->sortBy($getKey, SORT_REGULAR);
        elseif ($sort === 'name')       $original = $original->sortBy($getKey, SORT_NATURAL|SORT_FLAG_CASE);
        else                            $original = $original->sortBy($getKey, SORT_REGULAR);

        $original = $original->values();

        $page  = (int) request('page', 1);
        $total = $original->count();
        $slice = $viewAll ? $original : $original->slice(($page-1)*$perPage, $perPage)->values();

        $items = new LengthAwarePaginator(
          $slice, $total, $perPage, $page, ['path' => request()->url(), 'query' => request()->query()]
        );

        // brandCounts จาก original
        $brandCounts = $original->groupBy(function($it){
          return trim((string)($it->brand ?? ''));
        })->map->count()->sortKeys();
      }

      // สำหรับ sidebar ไฮไลต์แบรนด์ปัจจุบัน
      $currentBrandSlug = $brandParam
        ? \Illuminate\Support\Str::slug($brandParam, '-')
        : '*';

      // คีย์ที่ต้องพกต่อ (ยกเว้น brand เมื่ออยู่บน route แบรนด์)
      $persistKeys = ['in_stock','view','q','category','catagory'];
      if (!$brandInRoute && request()->has('brand')) { $persistKeys[] = 'brand'; }
    ?>
    

    <!-- Header -->
    <header class="mb-5 space-y-3">
      <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
        <div>
          <h1 class="font-bold tracking-tight" style="color:var(--brand);font-size:var(--fs-2xl)">สินค้าทั้งหมด</h1>
          <p class="text-slate-600" style="font-size:var(--fs-sm)">ดูราคา สต็อก และเวลาส่งได้ทันที</p>
        </div>
      </div>

      <!-- Toolbar -->
      <div class="toolbar relative mt-8 md:mt-0 z-[20] p-3 md:p-4">
        <div class="grid gap-3 md:grid-cols-[minmax(0,1fr)_auto_auto] md:items-center">
          <!-- Search -->
          <div class="relative">
            <i class="bi bi-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-500"></i>
            <input id="globalSearch" type="text"
              class="w-full rounded-xl pl-10 pr-3 py-2 border focus:outline-none focus:ring-2 focus:ring-amber-400"
              style="font-size:var(--fs-sm)" placeholder="ค้นหาชื่อรุ่น / แบรนด์..." autocomplete="off" aria-label="ค้นหาสินค้า">
            <div id="searchResultsDesktop" role="listbox" aria-label="ผลการค้นหา"
                 class="absolute left-0 right-0 top-[calc(100%+6px)] hidden bg-white border rounded-xl shadow-lg z-[40] overflow-hidden"></div>
          </div>

          <?php
            $sortVal   = request('sort','new');
            $sortLabel = ['new'=>'มาใหม่','price_asc'=>'ราคาต่ำ → สูง','price_desc'=>'ราคาสูง → ต่ำ','name'=>'รหัส/ชื่อ (A–Z)'][$sortVal] ?? 'มาใหม่';
          ?>

          <!-- Sort (desktop) -->
          <div class="hidden md:block">
            <form method="GET" data-seg-sort>
              <?php $__currentLoopData = $persistKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(request()->has($k)): ?> <input type="hidden" name="<?php echo e($k); ?>" value="<?php echo e(request($k)); ?>"> <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="sort" value="<?php echo e(request('sort','new')); ?>">
              <fieldset class="seg">
                <input type="radio" id="s-new"   name="segSort" value="new"        <?php echo e(request('sort','new')==='new' ? 'checked' : ''); ?>>
                <label for="s-new"><i class="bi bi-stars"></i> มาใหม่</label>

                <input type="radio" id="s-asc"   name="segSort" value="price_asc"  <?php echo e(request('sort')==='price_asc' ? 'checked' : ''); ?>>
                <label for="s-asc"><i class="bi bi-arrow-down-up"></i> ต่ำ→สูง</label>

                <input type="radio" id="s-desc"  name="segSort" value="price_desc" <?php echo e(request('sort')==='price_desc' ? 'checked' : ''); ?>>
                <label for="s-desc"><i class="bi bi-arrow-up-down"></i> สูง→ต่ำ</label>

                <input type="radio" id="s-name"  name="segSort" value="name"       <?php echo e(request('sort')==='name' ? 'checked' : ''); ?>>
                <label for="s-name"><i class="bi bi-sort-alpha-down"></i> รหัส/ชื่อ (A–Z)</label>
              </fieldset>
            </form>
          </div>

          <!-- MOBILE: เรียงโดย + สต็อก -->
          <div class="md:hidden flex items-center justify-between gap-2">
            <form method="GET" id="sortForm" class="flex items-center gap-2 flex-1 min-w-0">
              <?php $__currentLoopData = $persistKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(request()->has($k)): ?> <input type="hidden" name="<?php echo e($k); ?>" value="<?php echo e(request($k)); ?>"> <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="sort" id="sortInput" value="<?php echo e($sortVal); ?>">
              <span class="text-slate-600 whitespace-nowrap" style="font-size:var(--fs-sm)">เรียงโดย</span>
              <div class="dd-root flex-1 min-w-0" id="sortDropdown">
                <button type="button" class="dd-trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="sortPanel">
                  <span class="truncate"><?php echo e($sortLabel); ?></span>
                  <i class="bi bi-caret-down-fill dd-chev" aria-hidden="true"></i>
                </button>
                <div id="sortPanel" class="dd-panel" hidden>
                  <div class="dd-list" role="listbox" aria-label="เลือกการเรียงลำดับ">
                    <?php $__currentLoopData = [
                      ['value'=>'new','label'=>'มาใหม่'],
                      ['value'=>'price_asc','label'=>'ราคาต่ำ → สูง'],
                      ['value'=>'price_desc','label'=>'ราคาสูง → ต่ำ'],
                      ['value'=>'name','label'=>'รหัส/ชื่อ (A–Z)']
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <button type="button" role="option"
                        aria-selected="<?php echo e($sortVal === $o['value'] ? 'true' : 'false'); ?>"
                        data-value="<?php echo e($o['value']); ?>"
                        class="dd-item <?php echo e($sortVal === $o['value'] ? 'active' : ''); ?>"><?php echo e($o['label']); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </form>

            <button type="button"
              class="chip-toggle whitespace-nowrap shrink-0 <?php echo e(request('in_stock')==='1' ? 'active' : ''); ?>"
              onclick="location.search=toggleQS('in_stock','1');">
              <i class="bi bi-box-seam"></i> เฉพาะสินค้ามีสต็อค
            </button>
          </div>

          <!-- DESKTOP: ปุ่มสต็อก -->
          <div class="hidden md:flex items-center gap-2 md:justify-end">
            <button type="button"
              class="chip-toggle <?php echo e(request('in_stock')==='1' ? 'active' : ''); ?>"
              onclick="location.search=toggleQS('in_stock','1');">
              <i class="bi bi-box-seam"></i> เฉพาะสินค้ามีสต็อค
            </button>
          </div>
        </div>
      </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-[270px_minmax(0,1fr)] gap-6">
      <!-- Sidebar -->
      <aside class="hidden md:block md:sticky md:top-20 self-start" aria-label="ตัวกรองสินค้า">
        <div class="bg-white border rounded-xl soft overflow-hidden">
          <div class="px-4 py-3 border-b font-semibold text-slate-700 flex items:center gap-2" style="font-size:var(--fs-sm)">
            <i class="bi bi-tags"></i> เลือกยี่ห้อ
          </div>

          <nav class="max-h-[70vh] overflow-y-auto no-scrollbar py-2" aria-label="กรองตามยี่ห้อ">
            <a href="<?php echo e($keepQS(route('showproduct'), [], ['brand'])); ?>"
               class="block px-4 py-2 mx-2 rounded-md <?php echo e($currentBrandSlug==='*' ? 'bg-blue-600 text-white' : 'hover:bg-slate-50'); ?>"
               style="font-size:var(--fs-sm)">ทั้งหมด</a>

            <?php $__currentLoopData = $brandCounts->keys(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brandName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $slug = \Illuminate\Support\Str::slug($brandName, '-');
                $isActive = $currentBrandSlug === $slug;
                // ตัด brand ออกจาก query เพื่อไม่ให้ซ้อนกับ route
                $brandUrl = $keepQS(route('showproduct.bybrand', ['brand' => $brandName]), [], ['brand']);
              ?>
              <a href="<?php echo e($brandUrl); ?>"
                 class="flex items-center justify-between px-4 py-2 mx-2 rounded-md <?php echo e($isActive ? 'bg-blue-600 text-white' : 'hover:bg-slate-50'); ?>"
                 style="font-size:var(--fs-sm)">
                <span class="truncate"><?php echo e($brandName); ?></span>
                <?php if(isset($brandCounts[$brandName])): ?>
                  <span class="<?php echo e($isActive ? 'text-white/90' : 'text-slate-500'); ?>" style="font-size:var(--fs-2xs)"><?php echo e($brandCounts[$brandName]); ?></span>
                <?php endif; ?>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </nav>

          <div class="px-4 py-3 border-t text-slate-600 space-y-2" style="font-size:var(--fs-sm)">
            <label class="flex items-center gap-2">
              <input type="checkbox" class="rounded" onclick="location.search=toggleQS('in_stock','1');" <?php echo e(request('in_stock')==='1' ? 'checked' : ''); ?>>
              เฉพาะสินค้ามีสต็อค
            </label>
          </div>
        </div>
      </aside>

      <!-- Main list -->
      <section aria-live="polite">
        <?php if($items->isEmpty()): ?>
          <div class="text-center text-slate-600 py-16 bg-white rounded-xl border soft">
            <div class="mx-auto w-14 h-14 rounded-full grid place-items-center bg-amber-50 border border-amber-200 mb-4">
              <i class="bi bi-search text-xl text-amber-600"></i>
            </div>
            <h2 class="font-semibold mb-2" style="font-size:var(--fs-md)">ไม่พบสินค้าในหมวดนี้</h2>
            <p class="mb-6" style="font-size:var(--fs-sm)">ลองลบตัวกรอง หรือพิมพ์คำค้นหาอื่น ๆ</p>
            <a href="<?php echo e(route('showproduct')); ?>" class="inline-flex items-center gap-2 rounded-lg px-4 py-2 bg-blue-600 text-white" style="font-size:var(--fs-sm)">
              <i class="bi bi-arrow-counterclockwise"></i> เคลียร์ตัวกรอง
            </a>
          </div>
        <?php else: ?>

          
          <div class="sm:hidden space-y-4">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $leadRaw  = trim((string)($item->lead_time_web ?? ''));
                $leadTxt  = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3-5 days' : $leadRaw;

                $rawStock = is_null($item->stock) ? '' : trim((string)$item->stock);
                $hasStock = ($rawStock !== '' && $rawStock !== '-' && $rawStock !== '—' && (int)$rawStock > 0);
                $stockTxt = $hasStock ? number_format((int)$rawStock).' ชิ้น' : 'ติดต่อสอบถาม';

                $rawPrice  = trim((string)($item->webpriceTHB ?? ''));
                $priceNum  = (float) str_replace([',',' '], '', $rawPrice);
                $hasPrice  = ($rawPrice !== '' && $priceNum > 0);

                $brandUpper = strtoupper(trim((string)($item->brand ?? '')));
                $imgSrc = !empty($item->pic_resolved) ? $item->pic_resolved
                        : ($brandUpper && isset($brandThumbs[$brandUpper]) ? $brandThumbs[$brandUpper] : asset('https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000'));

                $idForRoute = $item->iditem ?? $item->id ?? null;
              ?>

              <article class="mcard js-card cursor-pointer"
                       <?php if($idForRoute): ?> data-href="<?php echo e(route('showproduct.byiditem', ['iditem' => $idForRoute])); ?>" <?php endif; ?>
                       aria-label="ดูรายละเอียด <?php echo e($item->name ?? $item->model ?? 'สินค้า'); ?>">
                <div class="mcard-grid">
                  <div class="mcard-img">
                    <img src="<?php echo e($imgSrc); ?>" alt="<?php echo e($item->model ?? ($item->name ?? 'Product')); ?>"
                         loading="lazy" decoding="async"
                         onerror="this.onerror=null;this.src='<?php echo e(asset('storage/fallback/battery_sad_300.png')); ?>'">
                  </div>
                  <div class="min-w-0">
                    <?php if(!empty($item->brand)): ?>
                      <div class="mb-1"><span class="pill"><i class="bi bi-building"></i><?php echo e($item->brand); ?></span></div>
                    <?php endif; ?>
                    <div class="m-title line-clamp-2"><?php echo e($item->name ?? $item->model ?? '—'); ?></div>
                    <div class="mt-1">
                      <?php if($hasPrice): ?> <div class="m-price"><?php echo e(e($rawPrice)); ?> ฿</div>
                      <?php else: ?> <div class="font-semibold text-slate-600" style="font-size:var(--fs-sm)">สอบถามเพิ่มเติม</div><?php endif; ?>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-2">
                      <span class="pill pill-lead"><i class="bi bi-truck"></i> ส่ง: <strong class="ml-1"><?php echo e($leadTxt); ?></strong></span>
                      <span class="pill <?php echo e($hasStock ? 'pill-stock' : 'pill-stock badge-muted'); ?>"><i class="bi bi-box-seam"></i> คงเหลือ: <strong class="ml-1"><?php echo e($stockTxt); ?></strong></span>
                    </div>
                    <?php if($idForRoute): ?>
                      <a href="<?php echo e(route('showproduct.byiditem', ['iditem' => $idForRoute])); ?>" class="mt-3 inline-flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-blue-600 text-white w-full font-semibold">
                        <i class="bi bi-card-text"></i> ดูรายละเอียด
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          
          <div class="hidden sm:grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
                $leadRaw  = trim((string)($item->lead_time_web ?? ''));
                $leadTxt  = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3-5 days' : $leadRaw;

                $rawStock = is_null($item->stock) ? '' : trim((string)$item->stock);
                $hasStock = ($rawStock !== '' && $rawStock !== '-' && $rawStock !== '—' && (int)$rawStock > 0);
                $stockTxt = $hasStock ? number_format((int)$rawStock).' ชิ้น' : 'ติดต่อสอบถาม';

                $rawPrice  = trim((string)($item->webpriceTHB ?? ''));
                $priceNum  = (float) str_replace([',',' '], '', $rawPrice);
                $hasPrice  = ($rawPrice !== '' && $priceNum > 0);

                $brandUpper = strtoupper(trim((string)($item->brand ?? '')));
                $imgSrc = !empty($item->pic_resolved) ? $item->pic_resolved
                        : ($brandUpper && isset($brandThumbs[$brandUpper]) ? $brandThumbs[$brandUpper] : asset('https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000'));

                $idForRoute = $item->iditem ?? $item->id ?? null;
              ?>

              <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md js-card cursor-pointer"
                       <?php if($idForRoute): ?> data-href="<?php echo e(route('showproduct.byiditem', ['iditem' => $idForRoute])); ?>" <?php endif; ?>
                       aria-label="ดูรายละเอียด <?php echo e($item->name ?? $item->model ?? 'สินค้า'); ?>">

                <!-- รูปสินค้า 225x225 -->
                <div class="img-rail p-3 pb-0">
                  <div class="relative mx-auto w-[225px] h-[225px] overflow-hidden rounded-xl bg-white ring-1 ring-slate-200 grid place-items-center">
                    <img
                      src="<?php echo e($imgSrc); ?>"
                      alt="<?php echo e($item->model ?? ($item->name ?? 'Product')); ?>"
                      loading="lazy" decoding="async"
                      width="225" height="225"
                      class="h-full w-full object-contain transition duration-300 group-hover:scale-[1.02]"
                      onerror="this.onerror=null; this.setAttribute('data-placeholder','1'); this.src='<?php echo e(asset('storage/fallback/battery_sad_300.png')); ?>';"
                    >
                  </div>
                </div>

                <!-- เนื้อหา -->
                <div class="p-3 sm:p-4 flex-1 flex flex-col">
                  <!-- แบรนด์ -->
                <h3 class="inline-flex items-center justify-center
                          h-6 sm:h-7 px-2
                          font-extrabold text-black text-[13px] sm:text-[14px] leading-none
                          rounded-full bg-amber-400 border border-amber-500 shadow-sm
                          whitespace-nowrap w-fit">
                  <?php echo e($item->brand ?? '—'); ?>

                </h3>


                  <h4 class="mt-2 font-semibold text-slate-900 leading-snug text-[13px] sm:text-[14px]">
                    <span class="text-slate-500">รุ่น :</span>
                    <span class="ml-1"><?php echo e($item->model ?? '—'); ?></span>
                  </h4>

                  <!-- ชื่อสินค้า -->
                  <p class="mt-1 text-slate-600 leading-snug text-[11px] sm:text-[12px] line-clamp-2">
                    <?php echo e($item->name ?? '—'); ?>

                  </p>

                  <!-- ราคา -->
                  <?php if($hasPrice): ?>
                    <div class="mt-2 mb-3 text-amber-600">
                      <span class="font-extrabold text-[20px] sm:text-[22px] align-baseline"><?php echo e(e($rawPrice)); ?></span>
                      <span class="font-bold text-[16px] align-baseline">฿</span>
                    </div>
                  <?php else: ?>
                    <div class="mt-2 mb-3 font-semibold text-slate-600">สอบถามเพิ่มเติม</div>
                  <?php endif; ?>

                  
                  <?php
                    $leadTxt  = trim((string)($leadTxt  ?? '3–5 days'));
                    $stockTxt = trim((string)($stockTxt ?? 'ติดต่อสอบถาม'));
                    $qty = $stockTxt; $status = '';
                    if (preg_match('/^(.+?)\s*(\((?:.+?)\))\s*$/u', $stockTxt, $m)) { $qty = trim($m[1]); $status = trim($m[2]); }
                    $statusClass = ($status !== '' && function_exists('str_contains') && str_contains($status, 'มีของ'))
                                    ? 'text-emerald-600' : 'text-rose-600';
                  ?>

                  <div class="rounded-[18px] border border-blue-100 bg-white p-2.5 sm:p-3" role="group" aria-label="ข้อมูลการจัดส่งและสต็อก">
                    <div class="flex items-center gap-2">
                      <i class="bi bi-truck text-[16px] sm:text-[18px] text-blue-600 leading-none"></i>
                      <div class="min-w-0 leading-tight">
                        <div class="font-semibold text-slate-800 text-[12px] sm:text-[12px] tracking-tight">การจัดส่ง</div>
                        <div class="text-slate-500 text-[12px] sm:text-[12.5px] whitespace-nowrap tracking-tight">
                          พร้อมจัดส่ง: <strong class="text-slate-800 font-semibold"><?php echo e($leadTxt); ?></strong>
                        </div>
                      </div>
                    </div>

                    <div class="h-px my-2 bg-slate-100"></div>

                    <div class="flex items-center gap-2">
                      <i class="bi bi-box-seam text-[16px] sm:text-[18px] text-emerald-600 leading-none"></i>
                      <div class="min-w-0 leading-tight">
                        <div class="inline-flex items-baseline gap-2 text-slate-800 whitespace-nowrap">
                          <span class="font-semibold text-[13px] sm:text-[13px] tracking-tight">สต็อก</span>
                          <span class="text-[13px] sm:text-[13px] tracking-tight">
                            <strong class="text-slate-800 font-semibold"><?php echo e($qty); ?></strong>
                            <?php if($status !== ''): ?>
                              <span class="<?php echo e($statusClass); ?>"> <?php echo e($status); ?> </span>
                            <?php endif; ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <!-- ปุ่ม -->
                  <div class="mt-auto grid grid-cols-1 gap-2">
                    <?php if($idForRoute): ?>
                      <a href="<?php echo e(route('showproduct.byiditem', ['iditem' => $idForRoute])); ?>"
                         class="inline-flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-blue-600 text-white font-semibold
                                hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 active:translate-y-[1px]">
                        <i class="bi bi-card-text"></i>
                        ดูรายละเอียด
                      </a>
                    <?php endif; ?>
                  </div>
                </div>
              </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <?php if(request('view') !== 'all'): ?>
            <div class="mt-6">
              <?php echo e($items->withQueryString()->onEachSide(1)->links()); ?>

            </div>
          <?php endif; ?>
        <?php endif; ?>
      </section>
    </div>
  </main>

  <!-- Utilities + Search + Sort JS -->
  <script>
    function toggleQS(key, val){
      const url = new URL(window.location.href);
      if(url.searchParams.get(key) === val){ url.searchParams.delete(key); }
      else{ url.searchParams.set(key, val); }
      return url.search;
    }

    // segmented sort
    document.addEventListener('DOMContentLoaded', function(){
      document.querySelectorAll('form[data-seg-sort]').forEach(form=>{
        form.addEventListener('change', (e)=>{
          if(e.target && e.target.name === 'segSort'){
            form.querySelector('input[name="sort"]').value = e.target.value;
            form.submit();
          }
        });
      });
    });

    // ทำให้ทั้งการ์ดกดนำทางได้
    document.addEventListener('DOMContentLoaded', function () {
      const INTERACTIVE = 'a,button,input,select,textarea,label,[data-no-nav]';
      document.querySelectorAll('.js-card[data-href]').forEach(card => {
        const href = card.dataset.href; if (!href) return;
        card.setAttribute('role','link'); card.setAttribute('tabindex','0');
        const go = (e) => {
          if (e && e.target && e.target.closest(INTERACTIVE)) return;
          const sel = window.getSelection && String(window.getSelection()); if (sel) return;
          window.location.href = href;
        };
        card.addEventListener('click', go);
        card.addEventListener('dblclick', go);
        card.addEventListener('keydown', (e) => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); go(e); }});
      });
    });

    // Mobile sort dropdown
    (function(){
      const root  = document.getElementById('sortDropdown');
      if(!root) return;
      const btn   = root.querySelector('.dd-trigger');
      const panel = document.getElementById('sortPanel');
      const form  = document.getElementById('sortForm');
      const input = document.getElementById('sortInput');
      function openDD(){ if(root.classList.contains('open')) return; root.classList.add('open'); panel.hidden=false; panel.style.maxHeight=panel.scrollHeight+'px'; btn.setAttribute('aria-expanded','true'); }
      function closeDD(){ if(!root.classList.contains('open')) return; root.classList.remove('open'); panel.style.maxHeight='0px'; btn.setAttribute('aria-expanded','false'); setTimeout(()=>{ if(!root.classList.contains('open')) panel.hidden=true; },220); }
      function toggleDD(){ root.classList.contains('open') ? closeDD() : openDD(); }
      btn.addEventListener('click', toggleDD);
      panel.querySelectorAll('[data-value]').forEach(el => el.addEventListener('click', () => { input.value = el.dataset.value; form.submit(); }));
      document.addEventListener('click', (e)=>{ if(!root.contains(e.target)) closeDD(); });
      document.addEventListener('keydown', (e)=>{ if(e.key==='Escape') closeDD(); });
      window.addEventListener('resize', ()=>{ if(root.classList.contains('open')) panel.style.maxHeight = panel.scrollHeight + 'px'; });
    })();

    // Search dropdown (AJAX) — เคารพ in_stock + ไม่พก brand ใน query
    document.addEventListener('DOMContentLoaded', function(){
      const SEARCH_URL = "<?php echo e(route('search.products')); ?>";
      const BRAND_THUMBS = <?php echo json_encode($brandThumbs ?? [], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); ?>;
      const ROUTE_SHOW      = <?php echo json_encode(route('showproduct'), 15, 512) ?>;
      const ROUTE_BY_BRAND  = <?php echo json_encode(route('showproduct.bybrand', ['brand'  => '___BRAND___']), 512) ?>;
      const ROUTE_BY_IDITEM = <?php echo json_encode(route('showproduct.byiditem', ['iditem' => '___ID___']), 512) ?>;
      const input  = document.getElementById('globalSearch');
      const dd     = document.getElementById('searchResultsDesktop');
      if(!input || !dd) return;

      const MIN = 2; let timer=null; let idx=-1;
      const FALLBACK_PIC = "<?php echo e(asset('storage/fallback/battery_sad_300.png')); ?>";

      const PERSIST_QS = new URLSearchParams(location.search);
      const IN_STOCK_ON = PERSIST_QS.get('in_stock') === '1';
      const KEEP_QS = (urlStr) => {
        const u = new URL(urlStr, location.origin);
        // ลบ brand ออกเสมอ เพื่อไม่ให้ซ้อนกับ route
        u.searchParams.delete('brand');
        if (IN_STOCK_ON) u.searchParams.set('in_stock','1');
        ['q','view','category','catagory'].forEach(k=>{
          if(PERSIST_QS.has(k) && !u.searchParams.has(k)) u.searchParams.set(k,PERSIST_QS.get(k));
        });
        return u.toString();
      };

      function closeDD(){ dd.classList.add('hidden'); dd.innerHTML=''; idx=-1; }
      function openDD(){ dd.classList.remove('hidden'); }

      async function fetchDB(q){
        try{
          const url = new URL(SEARCH_URL, window.location.origin);
          url.searchParams.set('q', q);
          if (IN_STOCK_ON) url.searchParams.set('in_stock','1');
          const res = await fetch(url, { headers: { 'Accept':'application/json' }});
          if(!res.ok) return [];
          const data = await res.json();
          return Array.isArray(data) ? data : [];
        }catch(e){ console.error(e); return []; }
      }

      function buildHref(it){
        try{
          if(it && it.url && String(it.url).trim()) return KEEP_QS(it.url);
          if(it && (it.iditem || it.id)) return KEEP_QS(ROUTE_BY_IDITEM.replace('___ID___', encodeURIComponent(it.iditem || it.id)));
          if(it && it.brand && !(it.name || it.model)) return KEEP_QS(ROUTE_BY_BRAND.replace('___BRAND___', encodeURIComponent(it.brand)));
          const q = (it && (it.name || it.model || it.brand)) ? String(it.name || it.model || it.brand).trim() : '';
          return KEEP_QS(q ? `${ROUTE_SHOW}?q=${encodeURIComponent(q)}` : ROUTE_SHOW);
        }catch(e){ console.error(e); return KEEP_QS(ROUTE_SHOW); }
      }

      function render(items){
        dd.innerHTML = '';
        if(!items.length){ dd.innerHTML = '<div class="px-3 py-2 text-slate-500" style="font-size:var(--fs-sm)">ไม่พบผลลัพธ์</div>'; openDD(); return; }
        const frag = document.createDocumentFragment();
        items.forEach((it, i)=>{
          const brandThumb = it.brand ? BRAND_THUMBS[String(it.brand).toUpperCase()] : null;
          const imgSrc = (it.pic && String(it.pic).trim()) ? it.pic : (brandThumb || FALLBACK_PIC);
          const a = document.createElement('a');
          a.href = buildHref(it);
          a.className='result-row flex gap-3 items-center px-3 py-2 hover:bg-amber-50';
          a.setAttribute('role','option'); a.setAttribute('data-idx', i);
          a.innerHTML = `
            <div class="h-10 w-10 rounded border bg-gray-50 overflow-hidden shrink-0">
              <img src="${imgSrc}" alt="" class="w-full h-full object-contain"
                   onerror="this.onerror=null;this.src='${FALLBACK_PIC}'">
            </div>
            <div class="min-w-0 flex-1">
              <div class="truncate" style="font-size:var(--fs-sm);color:#0f172a">${(it.name||it.model||it.brand||'—')}</div>
              <div class="truncate" style="font-size:var(--fs-2xs);color:#64748b">${(it.brand||'')}${it.model? ' · '+it.model:''}</div>
            </div>`;
          frag.appendChild(a);
        });
        dd.appendChild(frag);
        dd.style.maxHeight='60vh';
        dd.style.overflowY='auto';
        openDD();
      }

      function highlight(i){
        const rows = dd.querySelectorAll('.result-row');
        rows.forEach(r=> r.classList.remove('bg-amber-50'));
        if(i>=0 && i<rows.length){ rows[i].classList.add('bg-amber-50'); rows[i].scrollIntoView({block:'nearest'}); }
      }

      input.addEventListener('input', ()=>{
        const q = input.value.trim();
        if(q.length<MIN){ closeDD(); return; }
        clearTimeout(timer);
        timer = setTimeout(async ()=> { render(await fetchDB(q)); }, 200);
      });

      input.addEventListener('keydown', (e)=>{
        if(dd.classList.contains('hidden')) return;
        const rows = dd.querySelectorAll('.result-row');
        if(!rows.length) return;
        if(e.key==='ArrowDown'){ e.preventDefault(); idx = (idx+1) % rows.length; highlight(idx); }
        if(e.key==='ArrowUp'){   e.preventDefault(); idx = (idx-1+rows.length) % rows.length; highlight(idx); }
        if(e.key==='Enter' && idx>=0){ e.preventDefault(); rows[idx].click(); }
        if(e.key==='Escape'){ closeDD(); }
      });

      document.addEventListener('click', (e)=>{ const hit = e.target.closest('#'+dd.id+', #'+input.id); if(!hit) closeDD(); });
    });

    // ล้าง brand ใน query หากอยู่บน route แบรนด์ (กันซ้อน /brand/{brand}?brand=XYZ)
    (function () {
      var routeBrand = <?php echo json_encode($brandInRoute, 15, 512) ?>;
      if (routeBrand) {
        var u = new URL(window.location.href);
        if (u.searchParams.has('brand')) {
          u.searchParams.delete('brand');
          history.replaceState(null, '', u.toString());
        }
      }
    })();
  </script>

  <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


  <!-- NOTE: ตรวจสอบ routes/web.php ให้ใช้ path ที่ถูกต้อง -->
  <!-- ควรเป็น: Route::get('/showproduct/brand/{brand}', ...)->name('showproduct.bybrand'); -->
</body>
</html>
<?php /**PATH C:\xampp\htdocs\hikaridenki\resources\views/allproduct.blade.php ENDPATH**/ ?>