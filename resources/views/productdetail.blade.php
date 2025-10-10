<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $product->name ?? 'รายละเอียดสินค้า' }} | PowerCare by Hikari</title>
  <meta name="description" content="ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉินสำหรับองค์กร ติดตั้ง บำรุงรักษา ตรวจรับรอง และให้คำปรึกษา โดยทีมวิศวกรมากประสบการณ์กว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">
  <link rel="canonical" href="{{ url()->current() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  @include('header')

  @php
    /* ===================== Normalize fields ===================== */
    $nameTxt    = trim((string)($product->name ?? '—'));
    $brandTxt   = trim((string)($product->brand ?? ''));
    $modelTxt   = trim((string)($product->model ?? ''));
    $skuTxt     = trim((string)($product->sku ?? ''));

    // num_model สำรอง model
    $moTxtRaw   = trim((string)($product->num_model ?? ''));
    $moTxt      = $moTxtRaw !== '' ? $moTxtRaw : $modelTxt;

    
        $brandThumbs = [
            'MAKITA' => 'https://drive.google.com/thumbnail?id=1oCLDXm-YckE1pxdGiUlz0EmGg4fGimCu&sz=w1000',
            'NANABOSHI' => 'https://drive.google.com/thumbnail?id=1WJwlCP-EtwISVk8139dB1zkLKTsyGoGC&sz=w1000',
            'KRANZLE' => 'https://drive.google.com/thumbnail?id=1kJVxf42NY_8ig4l8Iw0tZ18g9nb73jTU&sz=w1000',
            'MITSUBISHI' => 'https://drive.google.com/thumbnail?id=1Yxcj66hz2SK8bwadkN5YoVqTBwv90mVT&sz=w1000',
            'SPARE PART PUMP' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'SEALAND' => 'https://drive.google.com/thumbnail?id=1_3E3sxucBZBOjFabPcCRQUHbPFD_3Q61&sz=w1000',
            'TOYO' => 'https://drive.google.com/thumbnail?id=1SQUc-xvdGKeXa0mCUt_Cw7NRK80GS2Se&sz=w1000',
            'SUPER-X' => 'https://drive.google.com/thumbnail?id=1gGP_ztP6O5Pwxsv7iew-MyzAzDyRJpOE&sz=w1000',
            'MARUYAMA' => 'https://drive.google.com/thumbnail?id=1jEAkDPk7LlbMcI-8CiouKRC9G6LYaZB5&sz=w1000',
            'MAKTEC' => 'https://drive.google.com/thumbnail?id=1HEPVqCEHbjZ-JjOoAMPHckpTnC_tWfM_&sz=w1000',
            'SUPER PUMP' => 'https://drive.google.com/thumbnail?id=1ZRPMsF3x-tGy0xo_Ddf1D-FAvL9m-shn&sz=w1000',
            'BELLPONY' => 'https://drive.google.com/thumbnail?id=1YmiURn8q9ELjYnxSnk-Nw8nOtIGh6PIF&sz=w1000',
            'KOGU' => 'https://drive.google.com/thumbnail?id=1WmSjB_NVMCIsHZpTZEg3AOgu_Bc5BX53&sz=w1000',
            'AXEMAN' => 'https://drive.google.com/thumbnail?id=1-Gts2JbR71_J6mhgr5TiCor-WruvqLXJ&sz=w1000',
            'HITACHI' => 'https://drive.google.com/thumbnail?id=1jB5tXja7NrsKchxtgQdPneZTtig8_bxk&sz=w1000',
            'KING' => 'https://drive.google.com/thumbnail?id=1Q-qfhloC4DSPQgG6vVMqpLCzRsos9j6L&sz=w1000',
            'SPARE PART MOTOR' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'REX' => 'https://drive.google.com/thumbnail?id=1HqwYDbjlpPjxY8k3Zn-_viWZHdHnIhsm&sz=w1000',
            'HF' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'TSURUMI' => 'https://drive.google.com/thumbnail?id=1CIqRXONCG7QRMpyRp-0Q7N5TAvCoS2ne&sz=w1000',
            'Gear-Cyclo Drive' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'TAIHOKOHZAI' => 'https://drive.google.com/thumbnail?id=1SUMYv1FMyA72nFD2GO1vRLML6dY92LDH&sz=w1000',
            'Gear-Helical' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'ICHINEN' => 'https://drive.google.com/thumbnail?id=1BX5pNyzveZMUKvOExgWjgRqnu8YNOOGc&sz=w1000',
            'ELEPHANT' => 'https://drive.google.com/thumbnail?id=1VyLWqmnzNQNrfezDXetl2aK8KWqej_Dj&sz=w1000',
            'HERO' => 'https://drive.google.com/thumbnail?id=1Vsq6W7thPZfoLncKmidHa0R4aKLguwqU&sz=w1000',
            'HUZEY' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'IWARA' => 'https://drive.google.com/thumbnail?id=1edLIMHt2sgdHyai1hBzFJd6guVGcAQV6&sz=w1000',
            'WINNER' => 'https://drive.google.com/thumbnail?id=1GQbalsy_X1I2lSv-IsKUOPBg9-DmcwX6&sz=w1000',
            'JSAP' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'PICUS' => 'https://drive.google.com/thumbnail?id=1FmKqgyRkZoyvl1npw5AU3igNLlTgICLv&sz=w1000',
            'mitsubishi-premium' => 'https://drive.google.com/thumbnail?id=1r09w9yFJmMYK4DNvLeJq8T-qgwO0hCF7&sz=w1000',
            'NKC' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'KF' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'KSU' => 'https://drive.google.com/thumbnail?id=1wyMy9ZwrKIG2mTQ55xMoD1uC0edZtVTL&sz=w1000',
            'KYOWA' => 'https://drive.google.com/thumbnail?id=1z5duSag2J8l7uvDyiFo3X4aMEkrxKRe3&sz=w1000',
            'LEOU-N' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'TDK' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'E-WELD' => 'https://drive.google.com/thumbnail?id=1-TTyKLbD9p2x4K1ftR8LTPiIk664oS3S&sz=w1000',
            'HONDA' => 'https://drive.google.com/thumbnail?id=1-ixvbbiUj8D0yX2u55tqsVCEvtqSRbUs&sz=w1000',
            'OP' => 'https://drive.google.com/thumbnail?id=1lG6xKYITra0qTQtD_2ZVqHH05KNFq3gi&sz=w1000',
            'MASADA JACK' => 'https://drive.google.com/thumbnail?id=1fsEdzQkL1ZWDLbTTMGbgouOUzppju-Tt&sz=w1000',
            'Non-Automatic Pump' => 'https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000',
            'IWOOD' => 'https://drive.google.com/thumbnail?id=12uoB6Kt_ahfFTqdIze6DPjG2iD6XjMPq&sz=w1000',
            'X-WELD' => 'https://drive.google.com/thumbnail?id=145IjmGedj8w03N-kYC6VPJDra4Oqyu_e&sz=w1000',
        ];
    $brandKey = strtoupper(preg_replace('/\s+/', ' ', str_replace('_', '-', $brandTxt)));
    $brandThumb = $brandThumbs[$brandKey] ?? null;

    $rawPic = trim((string)($product->pic ?? ''));
    if ($rawPic === '' || $rawPic === '-' || $rawPic === '—') { $rawPic = ''; }
    $imgSrc = $rawPic !== '' ? $rawPic : ($brandThumb ?: asset('https://drive.google.com/thumbnail?id=1zBSHzOsaxkFRiemPhZUZHDXm1kgwe3eA&sz=w1000'));

    /* ===== Delivery / Price / Stock ===== */
    $leadRaw  = trim((string)($product->lead_time_web ?? ''));
    $leadTxt  = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3–5 วัน' : $leadRaw;

    $rawPrice = $product->webpriceTHB ?? null;
    $priceNum = is_null($rawPrice) ? null : (float) preg_replace('/[^\d\.\-]+/','', (string) $rawPrice);
    $hasPrice = !is_null($priceNum) && $priceNum > 0;
    $priceTxt = $hasPrice ? number_format($priceNum, 2) . ' ฿' : 'ติดต่อสอบถามราคา';

    $stockRaw   = trim((string)($product->stock ?? ''));
    $stockIsNum = is_numeric($stockRaw);
    $stockQty   = $stockIsNum ? (float)$stockRaw : null;
    if ($stockRaw === '' || $stockRaw === '-' || $stockRaw === '—') {
      $stockTxt = 'ติดต่อสอบถาม';
      $inStock  = null;
    } else {
      $stockTxt = $stockIsNum ? (number_format($stockQty) . ' ชิ้น') : $stockRaw;
      $inStock  = $stockIsNum ? ($stockQty > 0) : null;
    }

    /* ===================== SUBLINE (ขึ้นบรรทัดใหม่ ไม่มี "\") ===================== */
    $displayModel = $moTxt !== '' ? $moTxt : $modelTxt;

    $nameClean = $nameTxt;
    if ($brandTxt !== '') {
      $nameClean = preg_replace('/^(?:' . preg_quote($brandTxt, '/') . ')\s*[:\-•|]?\s*/ui', '', $nameClean);
    }
    if ($displayModel !== '') {
      $rxModel   = preg_quote($displayModel, '/');
      $nameClean = preg_replace('/^\(?\s*(?:รุ่น\s*)?' . $rxModel . '\s*\)?\s*/ui', '', $nameClean);
      $nameClean = preg_replace('/\b' . $rxModel . '\b\s*/ui', ' ', $nameClean, 1);
    }
    $nameClean = trim(preg_replace('/\s{2,}/', ' ', $nameClean));

    $parts = [];
    if ($brandTxt !== '')      $parts[] = $brandTxt;
    if ($displayModel !== '')  $parts[] = 'รุ่น ' . $displayModel;
    $sublineCore = implode(' • ', $parts);
    $hasCore = ($sublineCore !== '');
    $hasName = ($nameClean !== '' && $nameClean !== '—');

    /* ===================== Add-ons: rating / colors ===================== */
    $ratingAvg   = (float)($product->rating_avg ?? 0);
    $ratingCount = (int)($product->rating_count ?? 0);
    $colorRaw    = trim((string)($product->color_options ?? ''));
    $colorList   = $colorRaw !== '' ? preg_split('/\s*,\s*|\s+\|\s+/', $colorRaw) : [];
    if (is_array($colorList)) { $colorList = array_values(array_filter($colorList, fn($v)=>$v!=='')); } else { $colorList = []; }

    /* ===================== H1 title / contacts ===================== */
    $titleLine = trim(implode(' ', array_filter([$brandTxt, $moTxt ?: $modelTxt ?: ''])));
    if ($titleLine === '' && $nameTxt !== '—') $titleLine = $nameTxt;

    $tel        = '+66990802197';
    $lineId     = '@543ubjtx';
    $lineScheme = 'line://ti/p/' . urlencode($lineId);
    $lineWeb    = 'https://line.me/R/ti/p/' . urlencode($lineId);

    $to = 'Info@hikaridenki.co.th';
    $subjectModel = ($displayModel ?: ($moTxt ?: $modelTxt ?: $titleLine ?: $nameTxt));
    $subject = 'สอบถามสินค้า: รุ่น ' . $subjectModel;
    $lineName = trim(($subjectModel ? $subjectModel . ' ' : '') . ($nameClean !== '' ? $nameClean : $nameTxt));
    $body  = "สวัสดีทีม Hikari,\n\n";
    $body .= "ต้องการขอใบเสนอราคาสำหรับ:\n";
    $body .= "- ชื่อสินค้า/รุ่น: {$lineName}\n";
    if ($brandTxt !== '')     { $body .= "- แบรนด์: {$brandTxt}\n"; }
    if ($subjectModel !== '') { $body .= "- รุ่น (Model): {$subjectModel}\n"; }
    $body .= "- ราคาแสดงหน้าเว็บ: " . ($hasPrice ? number_format($priceNum, 2) . " THB" : "ติดต่อสอบถาม") . "\n\n";
    $body .= "ขอบคุณครับ/ค่ะ";
    $gmailUrl = 'https://mail.google.com/mail/?view=cm&fs=1'
              . '&to='   . rawurlencode($to)
              . '&su='   . rawurlencode($subject)
              . '&body=' . rawurlencode($body);

    /* ===================== JSON-LD ===================== */
    $jsonLd = [
      '@context' => 'https://schema.org',
      '@type'    => 'Product',
      'name'     => $titleLine ?: $nameTxt,
      'image'    => [$imgSrc],
      'brand'    => $brandTxt ?: 'PowerCare',
      'model'    => $modelTxt ?: ($moTxt ?: ''),
      'url'      => url()->current(),
    ];
    if ($skuTxt) $jsonLd['sku'] = $skuTxt;
    if ($hasPrice) {
      $offer = [
        '@type'         => 'Offer',
        'priceCurrency' => 'THB',
        'price'         => number_format($priceNum, 2, '.', ''),
        'url'           => url()->current(),
      ];
      if (!is_null($inStock)) {
        $offer['availability'] = 'https://schema.org/' . ($inStock ? 'InStock' : 'OutOfStock');
      }
      $jsonLd['offers'] = $offer;
    }
  @endphp

  <style>
    :root{
      --brand:#0b2a6b;
      --radius:1.1rem;
      --safe:env(safe-area-inset-bottom,0px);
    }
    .soft{ box-shadow: 0 1px 2px rgba(2,6,23,.05), 0 10px 36px rgba(2,6,23,.08); }
    .glass{ background: rgba(255,255,255,.66); backdrop-filter: saturate(150%) blur(10px); }
    .btn{ border-radius: var(--radius); }
    .badge{ display:inline-flex; align-items:center; gap:.5rem; padding:.48rem .78rem; border-radius: 9999px; font-size:.9rem; line-height:1; border:1px solid; white-space:nowrap; }
    .tabnums{ font-variant-numeric: tabular-nums lining-nums; }

    /* ===== หัวบน: ทำให้ "X-WELD รุ่น • …" เล็กลง ===== */
    .titlebar{
      display:flex; align-items:baseline; gap:.6rem;
      flex-wrap:nowrap; overflow:hidden; white-space:nowrap;
      font-weight:800;
      font-size: clamp(1.1rem, 0.8rem + 1.6vw, 2rem); /* เล็กลงจากเดิม */
      letter-spacing:-.015em;
    }
    .titlebar .brand{ color: var(--brand); }
    .titlebar .model{ font-size:.55em; color:#465265; font-weight:600; }

    /* ===== สองบรรทัดล่าง: เพิ่มขนาดให้อ่านชัด ===== */
    .subline{
      max-width:95ch;
      text-wrap:pretty;
      line-height:1.7;
      color:#0f172a;
      font-weight:600;
      font-size:18px !important; /* เดิม 16px → 18px */
    }
    @media (max-width:480px){
      .subline{ font-size:17px !important; }
    }

    /* Gallery */
    .product-box{ width:100%; aspect-ratio: 16/11; border-radius:1rem; border:1px solid rgb(226,232,240); display:flex; align-items:center; justify-content:center; background:#fff; }
    .product-img{ max-width:100%; max-height:100%; object-fit:contain; }

    @media (max-width:767px){ #main{ padding-bottom: calc(84px + var(--safe)); } }
    @media (min-width:1024px){ .sticky-buy{ position: sticky; top: 1.25rem; } }
    /* Subline: "X-WELD • รุ่น …" + "MMA400 เครื่องเชื่อม …" */
/* Subline: ย่อขนาดลง */
  .subline{
    max-width: 95ch;
    text-wrap: pretty;
    line-height: 1.65;
    color: #334155 !important;
    font-weight: 600;
    /* เดิม 20–26px → ลดเป็น 16–20px */
    font-size: clamp(16px, 0.9vw + 12px, 24px) !important;
  }

/* มือถือ: คงไว้ที่ 16px ให้อ่านง่าย */
@media (max-width: 480px){
  .subline{ font-size: 16px !important; }
}


  </style>
</head>

<body class="bg-slate-50 text-slate-900">
  <!-- ===== HERO ===== -->
  <section class="relative">
    <div class="max-w-7xl mx-auto px-4 md:px-6 pt-3 pb-4 md:pb-6">
      <nav aria-label="Breadcrumb" class="text-xs md:text-sm mb-1.5">
        <ol class="flex items-center gap-2">
          <li><a href="{{ url('/') }}" class="text-[color:var(--brand)] hover:underline">หน้าแรก</a></li>
          <li class="text-slate-400">/</li>
          <li><a href="{{ route('showproduct') }}" class="text-[color:var(--brand)] hover:underline">ประเภทสินค้า</a></li>
          <li class="text-slate-400">/</li>
          <li class="font-medium line-clamp-1 text-[color:var(--brand)]">{{ $modelTxt ?: $nameTxt }}</li>
        </ol>
      </nav>

      <h1 class="titlebar mt-2" aria-label="{{ trim($brandTxt.' รุ่น • '.($moTxt ?: $modelTxt ?: '')) }}">
        <span class="brand">{{ $brandTxt ?: '—' }}</span>
        @if($moTxt || $modelTxt)
          <span class="model">รุ่น • <span class="tabnums">{{ $moTxt ?: $modelTxt }}</span></span>
        @endif
      </h1>

      {{-- SUBLINE: core ↵ name (ขยายขนาด) --}}
      @if($hasCore || $hasName)
        <p class="subline mt-1">

          @if($hasName)
            <span class="subline-name">{{ $nameClean }}</span>
          @endif
          @if($skuTxt)
            <span> • SKU: {{ $skuTxt }}</span>
          @endif
        </p>
      @endif
    </div>
  </section>

  <!-- ===== MAIN ===== -->
  <main id="main" class="max-w-7xl mx-auto px-4 md:px-6 pb-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
      <!-- Left: gallery -->
      <section class="lg:col-span-7">
        <div class="soft rounded-2xl bg-white p-4 md:p-6">
          <figure class="product-box">
            <img src="{{ $imgSrc }}" alt="{{ $titleLine ?: $nameTxt }}" class="product-img" loading="eager" decoding="async" />
          </figure>
          @if($sublineCore)
            <figcaption class="mt-3 text-xs text-slate-500 text-center">{{ $sublineCore }}</figcaption>
          @endif
        </div>
      </section>

      <!-- Right: summary card -->
      <aside class="lg:col-span-5">
        <div class="sticky-buy soft rounded-2xl bg-white p-5 md:p-6 space-y-5">
          {{-- ราคา --}}
          <div>
            <div class="text-slate-500 text-sm">ราคา</div>
            <div class="text-[2.25rem] md:text-[2.6rem] font-black tracking-tight tabnums">
              {{ $priceTxt }}
            </div>
          </div>

          {{-- ดาวรีวิว --}}
          @if($ratingAvg > 0)
            <div class="flex items-center gap-2 text-slate-700" aria-label="คะแนน {{ number_format($ratingAvg,1) }} จาก {{ $ratingCount }} รีวิว">
              @php
                $full = floor($ratingAvg);
                $half = ($ratingAvg - $full) >= 0.5 ? 1 : 0;
                $empty = 5 - $full - $half;
              @endphp
              <div class="flex items-center text-amber-500 text-lg">
                @for($i=0;$i<$full;$i++)<i class="bi bi-star-fill"></i>@endfor
                @for($i=0;$i<$half;$i++)<i class="bi bi-star-half"></i>@endfor
                @for($i=0;$i<$empty;$i++)<i class="bi bi-star"></i>@endfor
              </div>
              <span class="text-sm">({{ $ratingCount }})</span>
            </div>
          @endif

          {{-- เลือกสี/รุ่น (ถ้ามี) --}}
          @if(count($colorList))
            <div>
              <div class="font-medium mb-2">เลือกสี</div>
              <div class="flex flex-wrap gap-2">
                @foreach($colorList as $c)
                  <button type="button" class="px-3 py-1.5 rounded-full border border-slate-300 hover:bg-slate-50 text-sm" aria-pressed="false">{{ $c }}</button>
                @endforeach
              </div>
            </div>
          @endif

          {{-- วิธีรับสินค้า / สถานะ --}}
          <div class="rounded-xl border border-slate-200 p-4 space-y-3">
            <div class="flex items-center gap-3">
              <i class="bi bi-truck text-blue-700 text-xl"></i>
              <div class="text-sm">
                <div class="font-semibold">การจัดส่ง</div>
                <div class="text-slate-600">พร้อมจัดส่ง: <strong>{{ $leadTxt }}</strong></div>
              </div>
            </div>
            <div class="flex items-center gap-3">
              <i class="bi bi-box-seam @if($inStock===false) text-rose-600 @else text-emerald-600 @endif text-xl"></i>
              <div class="text-sm">
                <div class="font-semibold">สต็อก</div>
                <div class="text-slate-600">
                  <strong>{{ $stockTxt }}</strong>
                  @if(!is_null($inStock))
                    <span class="@if($inStock) text-emerald-600 @else text-rose-600 @endif">(@if($inStock) มีของ @else สินค้าหมด @endif)</span>
                  @endif
                </div>
              </div>
            </div>
          </div>



          {{-- CTA ทางเลือก --}}
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <button type="button"
              class="btn inline-flex items-center justify-center gap-2 px-4 h-[46px] font-semibold soft bg-[#06C755] text-white hover:brightness-110"
              onclick="openLineDeepLink('{{ $lineScheme }}','{{ $lineWeb }}')"
              aria-label="คุยกับเรา (LINE)">
              <i class="bi bi-line"></i> <span>คุยกับเรา (LINE)</span>
            </button>

            <a href="tel:{{ $tel }}" class="btn inline-flex items-center justify-center gap-2 px-4 h-[46px] font-semibold soft bg-slate-900 text-white hover:bg-slate-800" aria-label="โทรหาเรา">
              <i class="bi bi-telephone-fill"></i> <span>โทร : 099-080-2197</span>
            </a>

            <a href="{{ $gmailUrl }}" target="_blank" rel="noopener"
               class="btn sm:col-span-2 inline-flex items-center justify-center gap-2 px-4 h-[46px] font-semibold soft bg-white text-slate-900 hover:bg-slate-50 border border-slate-200"
               aria-label="ส่งอีเมลสอบถาม">
              <i class="bi bi-envelope-fill"></i> <span>ส่งอีเมลสอบถาม (Gmail)</span>
            </a>
          </div>

          {{-- จุดเด่นบริการ --}}
          <ul class="grid gap-2 text-sm text-slate-700">
            <li class="flex items-start gap-2"><i class="bi bi-shield-check text-emerald-600 mt-0.5"></i><span>รับประกันและดูแลโดยทีมวิศวกร</span></li>
            <li class="flex items-start gap-2"><i class="bi bi-truck text-blue-700 mt-0.5"></i><span>จัดส่งทั่วประเทศ / นัดติดตั้งหน้างาน</span></li>
            <li class="flex items-start gap-2"><i class="bi bi-receipt text-amber-600 mt-0.5"></i><span>ออกใบเสนอราคา/ใบกำกับภาษี ได้</span></li>
          </ul>
        </div>
      </aside>
    </div>
  </main>

  <!-- JSON-LD -->
  <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

  <!-- Helpers -->
  <script>
    function qtyStep(delta){
      const el = document.getElementById('qty');
      const v = Math.max(1, (parseInt(el.value || '1', 10) + delta));
      el.value = v;
    }
    function handleAddToCart(){
      const qty = document.getElementById('qty')?.value || 1;
      // TODO: ผูกกับระบบตะกร้าจริงของโปรเจกต์ (route/ajax) ได้ตามสะดวก
      alert('เพิ่มลงตะกร้า: จำนวน ' + qty);
    }
    function openLineDeepLink(schemeUrl, webUrl){
      const t = Date.now();
      try { window.location.href = schemeUrl; } catch(e){}
      setTimeout(function(){
        const elapsed = Date.now() - t;
        if (document.visibilityState === 'visible' || elapsed < 1200){
          window.open(webUrl, '_blank', 'noopener');
        }
      }, 800);
    }
  </script>

  @include('footer')


</body>
</html>
