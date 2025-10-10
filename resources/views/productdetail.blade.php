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
    // ===== Normalize fields / fallbacks =====
    $nameTxt    = trim((string)($product->name ?? '—'));
    $brandTxt   = trim((string)($product->brand ?? ''));          // แบรนด์
    $modelTxt   = trim((string)($product->model ?? ''));          // รุ่น (model)
    $skuTxt     = trim((string)($product->sku ?? ''));

    // ใช้ num_model เป็นสำรอง ถ้าไม่มี model
    $moTxtRaw   = trim((string)($product->num_model ?? ''));
    $moTxt      = $moTxtRaw !== '' ? $moTxtRaw : $modelTxt;

    // ===== ตารางรูปสำรองตาม "แบรนด์" (ถ้าไม่มีรูปสินค้า) =====
    // ใช้ key เป็น UPPERCASE เพื่อเทียบแบบไม่สนตัวพิมพ์เล็ก/ใหญ่
    $brandThumbs = [
        'MAKITA' => 'https://drive.google.com/thumbnail?id=1oCLDXm-YckE1pxdGiUlz0EmGg4fGimCu&sz=w1000',
        'NANABOSHI' => 'https://drive.google.com/thumbnail?id=1WJwlCP-EtwISVk8139dB1zkLKTsyGoGC&sz=w1000',
        'KRANZLE' => 'https://drive.google.com/thumbnail?id=1kJVxf42NY_8ig4l8Iw0tZ18g9nb73jTU&sz=w1000',
        'MITSUBISHI' => 'https://drive.google.com/thumbnail?id=1Yxcj66hz2SK8bwadkN5YoVqTBwv90mVT&sz=w1000',
        'SPARE PART PUMP' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
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
        'SPARE PART MOTOR' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'REX' => 'https://drive.google.com/thumbnail?id=1HqwYDbjlpPjxY8k3Zn-_viWZHdHnIhsm&sz=w1000',
        'HF' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'TSURUMI' => 'https://drive.google.com/thumbnail?id=1CIqRXONCG7QRMpyRp-0Q7N5TAvCoS2ne&sz=w1000',
        'GEAR-CYCLO DRIVE' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'TAIHOKOHZAI' => 'https://drive.google.com/thumbnail?id=1SUMYv1FMyA72nFD2GO1vRLML6dY92LDH&sz=w1000',
        'GEAR-HELICAL' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'ICHINEN' => 'https://drive.google.com/thumbnail?id=1BX5pNyzveZMUKvOExgWjgRqnu8YNOOGc&sz=w1000',
        'ELEPHANT' => 'https://drive.google.com/thumbnail?id=1VyLWqmnzNQNrfezDXetl2aK8KWqej_Dj&sz=w1000',
        'HERO' => 'https://drive.google.com/thumbnail?id=1Vsq6W7thPZfoLncKmidHa0R4aKLguwqU&sz=w1000',
        'HUZEY' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'IWARA' => 'https://drive.google.com/thumbnail?id=1edLIMHt2sgdHyai1hBzFJd6guVGcAQV6&sz=w1000',
        'WINNER' => 'https://drive.google.com/thumbnail?id=1GQbalsy_X1I2lSv-IsKUOPBg9-DmcwX6&sz=w1000',
        'JSAP' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'PICUS' => 'https://drive.google.com/thumbnail?id=1FmKqgyRkZoyvl1npw5AU3igNLlTgICLv&sz=w1000',
        'MITSUBISHI-PREMIUM' => 'https://drive.google.com/thumbnail?id=1r09w9yFJmMYK4DNvLeJq8T-qgwO0hCF7&sz=w1000',
        'NKC' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'KF' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'KSU' => 'https://drive.google.com/thumbnail?id=1wyMy9ZwrKIG2mTQ55xMoD1uC0edZtVTL&sz=w1000',
        'KYOWA' => 'https://drive.google.com/thumbnail?id=1z5duSag2J8l7uvDyiFo3X4aMEkrxKRe3&sz=w1000',
        'LEOU-N' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'TDK' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'E-WELD' => 'https://drive.google.com/thumbnail?id=1-TTyKLbD9p2x4K1ftR8LTPiIk664oS3S&sz=w1000',
        'HONDA' => 'https://drive.google.com/thumbnail?id=1-ixvbbiUj8D0yX2u55tqsVCEvtqSRbUs&sz=w1000',
        'OP' => 'https://drive.google.com/thumbnail?id=1lG6xKYITra0qTQtD_2ZVqHH05KNFq3gi&sz=w1000',
        'MASADA JACK' => 'https://drive.google.com/thumbnail?id=1fsEdzQkL1ZWDLbTTMGbgouOUzppju-Tt&sz=w1000',
        'NON-AUTOMATIC PUMP' => 'https://drive.google.com/thumbnail?id=1nntqUdGv51yaDpB0pLWLHP_CZSm9HlZ7&sz=w1000',
        'IWOOD' => 'https://drive.google.com/thumbnail?id=12uoB6Kt_ahfFTqdIze6DPjG2iD6XjMPq&sz=w1000',
        'X-WELD' => 'https://drive.google.com/thumbnail?id=145IjmGedj8w03N-kYC6VPJDra4Oqyu_e&sz=w1000',
    ];

    // ปรับชื่อแบรนด์เป็น key สำหรับค้นในตาราง (UPPERCASE, ลดช่องว่างซ้ำ, แทน _ เป็น -)
    $brandKey = strtoupper(preg_replace('/\s+/', ' ', str_replace('_', '-', $brandTxt)));
    $brandThumb = $brandThumbs[$brandKey] ?? null;

    // เลือกรูป: รูปสินค้าจริง -> รูปตามแบรนด์ -> รูป placeholder
    $rawPic = trim((string)($product->pic ?? ''));
    if ($rawPic === '' || $rawPic === '-' || $rawPic === '—') { $rawPic = ''; }
    $imgSrc = $rawPic !== '' ? $rawPic : ($brandThumb ?: asset('storage/logo/20.png'));

    // ระยะเวลาจัดส่ง
    $leadRaw    = trim((string)($product->lead_time_web ?? ''));
    $leadTxt    = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3–5 วัน' : $leadRaw;

    // ราคา
    $rawPrice   = $product->webpriceTHB ?? null;
    $priceNum   = is_null($rawPrice) ? null : (float) preg_replace('/[^\d\.\-]+/','', (string) $rawPrice);
    $hasPrice   = !is_null($priceNum) && $priceNum > 0;
    $priceTxt   = $hasPrice ? number_format($priceNum, 2) . ' ฿' : 'ติดต่อสอบถามราคา';

    // สต็อก
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

    // ===== Subline: "BRAND • รุ่น MODEL … {name}"
    $displayModel = $modelTxt !== '' ? $modelTxt : $moTxt;
    $sublineCore  = implode(' • ', array_filter([
      $brandTxt !== '' ? $brandTxt : null,
      $displayModel !== '' ? ('รุ่น ' . $displayModel) : null,
    ]));
    $subline = trim($sublineCore . ($nameTxt !== '—' ? ' ' . $nameTxt : ''));

    // ===== H1 line (สำรอง alt/title)
    $titleLine = trim(implode(' ', array_filter([$brandTxt, $moTxt ?: $modelTxt ?: ''])));
    if ($titleLine === '' && $nameTxt !== '—') $titleLine = $nameTxt;

    // ===== Contact / CTA =====
    $tel        = '+66990802197';
    $lineId     = '@543ubjtx';
    $lineScheme = 'line://ti/p/' . urlencode($lineId);
    $lineWeb    = 'https://line.me/R/ti/p/' . urlencode($lineId);

    // Gmail compose
    $to      = 'Info@hikaridenki.co.th';
    $subject = 'สอบถามสินค้า: ' . ($titleLine ?: $nameTxt);
    $body    = "สวัสดีทีม Hikari,\n\nต้องการขอใบเสนอราคาสำหรับ:\n"
              . "- ชื่อสินค้า/รุ่น: " . ($titleLine ?: $nameTxt) . "\n"
              . ($brandTxt ? "- แบรนด์: {$brandTxt}\n" : '')
              . ($modelTxt ? "- รุ่น (Model): {$modelTxt}\n" : '')
              . ($moTxt    ? "- หมายเลขรุ่น : {$moTxt}\n" : '')
              . "- ราคาแสดงหน้าเว็บ: " . ($hasPrice ? number_format($priceNum,2) . " THB" : "ติดต่อสอบถาม") . "\n\n"
              . "ขอบคุณครับ/ค่ะ";
    $gmailUrl = 'https://mail.google.com/mail/?view=cm&fs=1'
              . '&to='   . rawurlencode($to)
              . '&su='   . rawurlencode($subject)
              . '&body=' . rawurlencode($body);

    // ===== JSON-LD =====
    $jsonLd = [
      '@context' => 'https://schema.org',
      '@type'    => 'Product',
      'name'     => $titleLine ?: $nameTxt,
      'image'    => [$imgSrc],
      'brand'    => $brandTxt ?: 'PowerCare',
      'model'    => $modelTxt ?: ($moTxt ?: ''),
      'url'      => url()->current(),
    ];
    if ($skuTxt) { $jsonLd['sku'] = $skuTxt; }
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

    /* กล่อง/ปุ่ม/ป้าย ใช้สไตล์ร่วมกัน */
    .soft{ box-shadow: 0 1px 2px rgba(2,6,23,.05), 0 10px 36px rgba(2,6,23,.08); }
    .glass{ background: rgba(255,255,255,.66); backdrop-filter: saturate(150%) blur(10px); }
    .btn{ border-radius: var(--radius); }
    .badge{
      display:inline-flex; align-items:center; gap:.5rem;
      padding:.48rem .78rem; border-radius: 9999px;
      font-size:.9rem; line-height:1; border:1px solid;
      white-space:nowrap;
    }
    .tabnums{ font-variant-numeric: tabular-nums lining-nums; }

    /* ===== Title: “AXEMAN รุ่น • XXXX”  — ให้ AXEMAN เท่ากับขนาดรุ่น */
    .titlebar{
      display:flex; align-items:baseline; gap:.55rem;
      flex-wrap:nowrap; overflow:hidden; white-space:nowrap;
      font-weight:800;
      font-size:clamp(1.45rem, 1.05rem + 2.9vw, 3rem);
      letter-spacing:-.015em;
    }
    .titlebar .brand{
      min-width:0; overflow:hidden; text-overflow:ellipsis;
      color: var(--brand);
      font-size:.62em;        /* ↓ ลดขนาดแบรนด์ให้เท่ากับ .model */
      font-weight:800;
    }
    .titlebar .model{
      flex:0 0 auto; white-space:nowrap;
      font-size:.62em;        /* ขนาดเดียวกับแบรนด์ */
      font-weight:700; letter-spacing:.01em;
      color: rgb(69,83,103);
    }

    /* Subline โทนแบรนด์ ใหญ่ขึ้น อ่านง่าย */
    .subline{
      max-width: 95ch; text-wrap: pretty; line-height:1.45;
      color:#0b2a6b; font-weight:600;
      font-size: clamp(1.125rem, 1rem + 1vw, 1.6rem);
    }
    @media (max-width:360px){
      .subline{ font-size: clamp(1.05rem, 3.4vw + .7rem, 1.25rem); }
      .titlebar{ font-size:clamp(1.25rem, 3.4vw + .7rem, 1.6rem); }
    }

    /* Sticky buy card บนเดสก์ท็อป + safe-area มือถือ */
    @media (max-width:767px){ #main{ padding-bottom: calc(84px + var(--safe)); } }
    @media (min-width:1024px){ .sticky-buy{ position: sticky; top: 1.25rem; } }

    /* ภาพสินค้า 225x225 ให้ขอบและพื้นหลังนิ่ง */
    .product-box{
      width:225px; height:225px; border-radius:1rem;
      border:1px solid rgb(226,232,240);
      display:flex; align-items:center; justify-content:center;
      background:#fff;
    }
    .product-img{ width:225px; height:225px; object-fit:contain; }
  </style>
</head>

<body class="bg-slate-50 text-slate-900">
<style>
  :root{
    --brand: #0b2a6b;
    --title-brand-size: clamp(20px, 3.0vw, 32px);
    /* ↓ เล็กลงกว่าก่อนหน้า */
    --title-model-size: clamp(10px, 1.5vw, 14px);
  }

  .titlebar{
    display:flex; align-items:baseline; gap:.4ch;
    line-height:1.05; margin-top:.1rem;
  }
  .titlebar .brand{
    font-size: var(--title-brand-size);
    font-weight: 800;
    color: var(--brand);
    white-space: nowrap;
  }
  .titlebar .model{
    display:inline-flex; align-items:baseline; gap:.35ch;
    font-size: var(--title-model-size);   /* ← ขนาดที่ลดลง */
    font-weight: 500;
    color: rgb(69 83 103);
    white-space: nowrap;
    letter-spacing:.2px;
  }
  .titlebar .model .prefix{ font-weight:500; opacity:.9; }
  .titlebar .model .tabnums{ font-variant-numeric: tabular-nums; letter-spacing:.3px; }

  /* เล็กลงเพิ่มบนมือถือ */
  @media (max-width:480px){
    .titlebar .model{ font-size: clamp(9px, 3.2vw, 12px); }
  }
  /* ลดขนาดตัว "AXEMAN" (แบรนด์) */
  .titlebar .brand{
    font-size: clamp(18px, 2.2vw, 26px) !important; /* ← เล็กลงชัดเจน */
    font-weight: 800;
    letter-spacing: .2px;
    line-height: 1.05;
  }

  /* มือถือเล็กลงอีกนิด */
  @media (max-width: 480px){
    .titlebar .brand{
      font-size: clamp(16px, 5vw, 20px) !important;
    }
  }
  .subline { color: #0f172a !important; } /* โทนดำ-เข้ม */
</style>

<br>
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
<br>
      <h1 class="titlebar" aria-label="{{ trim($brandTxt.' รุ่น • '.($moTxt ?: $modelTxt ?: '')) }}">
        <span class="brand">{{ $brandTxt ?: '—' }}</span>
        @if($moTxt || $modelTxt)
          <span class="model"><span class="prefix">รุ่น •</span> <span class="tabnums">{{ $moTxt ?: $modelTxt }}</span></span>
        @endif
      </h1>

@if($subline !== '')
  <p class="subline mt-1 text-slate-900">  {{-- หรือใช้ text-black --}}
    {{ $subline }}@if($skuTxt) • SKU: {{ $skuTxt }} @endif
  </p>
@endif

    </div>
  </section>

  <!-- ===== MAIN ===== -->
  <main id="main" class="max-w-7xl mx-auto px-4 md:px-6 py-6 md:py-8">
    <div class="grid grid-cols-1 lg:[grid-template-columns:1fr_minmax(420px,520px)] gap-6 lg:gap-8 items-stretch">

      <!-- ภาพ/คำอธิบายซ้าย -->
      <section class="h-full">
        <div class="soft rounded-2xl bg-white px-5 md:px-6 py-6 md:py-7 h-full flex flex-col">
          <figure class="flex-1 flex flex-col items-center justify-center">
            <div class="product-box">
              <img src="{{ $imgSrc }}" alt="{{ $titleLine ?: $nameTxt }}" width="225" height="225"
                   class="product-img" loading="eager" decoding="async" />
            </div>
            @if($sublineCore)
              <figcaption class="mt-3 text-xs text-slate-500 text-center">{{ $sublineCore }}</figcaption>
            @endif
          </figure>
        </div>
      </section>

      <!-- Buy card ขวา -->
      <aside class="h-full">
        <div class="lg:ml-auto h-full">
          <div class="sticky-buy soft rounded-2xl glass p-5 md:p-6 border border-white/40 h-full flex flex-col">

            <!-- Badges -->
            <div class="flex flex-wrap items-center gap-2">
              <span class="badge bg-amber-50 text-amber-700 border-amber-200">
                <i class="bi bi-clock-history"></i>
                <span>จัดส่ง: <strong>{{ $leadTxt }}</strong></span>
              </span>
              @php
                $stockBadgeClass = is_null($inStock) ? 'bg-gray-100 text-gray-700 border-gray-300'
                                  : ($inStock ? 'bg-emerald-50 text-emerald-700 border-emerald-200'
                                              : 'bg-rose-50 text-rose-700 border-rose-200');
              @endphp
              <span class="badge {{ $stockBadgeClass }}">
                <i class="bi bi-box-seam"></i>
                <span>สต็อก: <strong class="tabnums">{{ $stockTxt }}</strong></span>
              </span>
            </div>

            <!-- ราคา -->
            <div class="mt-4">
              <div class="text-slate-500 text-sm">ราคา</div>
              <div class="text-[1.85rem] md:text-[2.25rem] font-black tracking-tight mt-1 tabnums">
                {{ $priceTxt }}
              </div>
            </div>

            <!-- CTA -->
            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3">
              <button type="button"
                class="btn inline-flex items-center justify-center gap-2 px-4 py-3 font-semibold soft bg-[#06C755] text-white hover:brightness-110"
                onclick="openLineDeepLink('{{ $lineScheme }}','{{ $lineWeb }}')"
                aria-label="คุยกับเรา (LINE)">
                <i class="bi bi-line"></i> <span>คุยกับเรา (LINE)</span>
              </button>

              <a href="tel:{{ $tel }}" class="btn inline-flex items-center justify-center gap-2 px-4 py-3 font-semibold soft bg-slate-900 text-white hover:bg-slate-800" aria-label="โทรหาเรา">
                <i class="bi bi-telephone-fill"></i> <span>โทร : 099-080-2197</span>
              </a>

              <a href="{{ $gmailUrl }}" target="_blank" rel="noopener"
                 class="btn sm:col-span-2 inline-flex items-center justify-center gap-2 px-4 py-3 font-semibold soft bg-white text-slate-900 hover:bg-slate-50 border border-slate-200"
                 aria-label="ส่งอีเมลสอบถาม">
                <i class="bi bi-envelope-fill"></i> <span>ส่งอีเมลสอบถาม (Gmail)</span>
              </a>
            </div>
            <br>
            <!-- จุดเด่นบริการ -->
            <ul class="mt-5 grid gap-2 text-sm text-slate-700 md:mt-auto">
              <li class="flex items-start gap-2"><i class="bi bi-shield-check text-emerald-600 mt-0.5"></i><span>รับประกันและดูแลโดยทีมวิศวกร</span></li>
              <li class="flex items-start gap-2"><i class="bi bi-truck text-blue-700 mt-0.5"></i><span>จัดส่งทั่วประเทศ / นัดติดตั้งหน้างาน</span></li>
              <li class="flex items-start gap-2"><i class="bi bi-receipt text-amber-600 mt-0.5"></i><span>ออกใบเสนอราคา/ใบกำกับภาษี ได้</span></li>
            </ul>
          </div>
        </div>
      </aside>
    </div>
  </main>

  <!-- JSON-LD -->
  <script type="application/ld+json">{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE) !!}</script>

  <!-- LINE deep link fallback -->
  <script>
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
<br><br><br>
 <!-- ===== Footer ===== -->
<footer class="relative text-white" role="contentinfo" aria-label="PowerCare footer">
  <div class="absolute inset-0 bg-gradient-to-br from-[#0a2356] via-[#0b2a6b] to-[#0f4c75]"></div>
  <div class="pointer-events-none absolute inset-0 opacity-[.12]"
       style="background:
         radial-gradient(900px 280px at 15% -10%, rgba(255,255,255,.35), rgba(255,255,255,0)),
         radial-gradient(700px 240px at 85% 110%, rgba(255,255,255,.2), rgba(255,255,255,0));"></div>

  <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-10 sm:py-14">
    <div class="grid gap-y-6 sm:gap-y-8 gap-x-8 lg:gap-x-12 xl:gap-x-16 grid-cols-1 sm:grid-cols-2 md:grid-cols-12 items-start">
      <section class="order-1 md:order-none w-full md:col-span-3 p-4 sm:p-5 md:p-0 bg-white/5 md:bg-transparent ring-1 ring-white/10 md:ring-0 rounded-xl" aria-labelledby="ft-brand">
        <div class="flex items-center gap-3">
          <img src="{{ asset('storage/logo/PNG.png') }}" alt="PowerCare" class="w-10 h-10 object-contain drop-shadow-md" loading="lazy" decoding="async">
          <h2 id="ft-brand" class="font-semibold text-[20px] sm:text-[22px] leading-tight tracking-tight">PowerCare by Hikari</h2>
        </div>
        <p class="mt-3 text-[13px] sm:text-sm leading-relaxed text-white/80">โซลูชันระบบไฟสำรองสำหรับองค์กร — ติดตั้ง บำรุงรักษา ตรวจรับรอง โดยทีมวิศวกรมืออาชีพ</p>
      </section>

      <section class="order-2 md:order-none w-full md:col-span-3 rounded-xl p-4 sm:p-5 md:p-0 bg-white/5 md:bg-transparent ring-1 ring-white/10 md:ring-0 backdrop-blur md:backdrop-blur-0" aria-labelledby="ft-contact">
        <h3 id="ft-contact" class="font-semibold mb-3 sm:mb-4 text-white/95 tracking-tight">ติดต่อเรา</h3>
        <ul class="space-y-2.5 sm:space-y-3 text-[13px] sm:text-[14px] text-white/85">
          <li class="group -m-2 p-2 rounded-lg hover:bg-white/5 active:bg-white/10 flex items-start gap-3">
            <i class="bi bi-telephone-fill opacity-90 text-base leading-6 shrink-0" aria-hidden="true"></i>
            <div class="flex flex-col leading-6">
              <a href="tel:021172995" class="hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40" aria-label="โทร 02-117-2995 คุณอาร์ท">02-117-2995 (คุณ อาร์ท)</a>
              <a href="tel:0990802197" class="hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40" aria-label="โทร 099-080-2197">099-080-2197</a>
            </div>
          </li>

          <li class="group -m-2 p-2 rounded-lg hover:bg-white/5 active:bg-white/10 flex items-center gap-3">
            <i class="bi bi-envelope-fill opacity-90 text-base leading-6 shrink-0" aria-hidden="true"></i>
            <a href="mailto:Info@hikaridenki.co.th" class="hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40">Info@hikaridenki.co.th</a>
          </li>

          <li class="group -m-2 p-2 rounded-lg hover:bg-white/5 active:bg-white/10 flex items-center gap-3">
            <i class="bi bi-chat-dots-fill opacity-90 text-base leading-6 shrink-0" aria-hidden="true"></i>
            <a href="https://line.me/R/ti/p/@543ubjtx" data-smartline data-lineid="@543ubjtx" class="inline-flex items-center gap-2 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40" target="_blank" rel="noopener" aria-label="เพิ่มเพื่อน LINE @543ubjtx">
              LINE: @543ubjtx
              <i class="bi bi-box-arrow-up-right text-xs opacity-80" aria-hidden="true"></i>
            </a>
          </li>

        </ul>
      </section>

      <section class="order-4 md:order-none w-full md:col-span-2 p-4 sm:p-5 md:p-0 bg-white/5 md:bg-transparent ring-1 ring-white/10 md:ring-0 rounded-xl" aria-labelledby="ft-b2b">
        <h3 id="ft-b2b" class="font-semibold mb-3 sm:mb-4 text-white/95 tracking-tight md:whitespace-nowrap">พร้อมสำหรับงาน B2B</h3>
        <ul class="space-y-2 text-[13px] sm:text-[14px] text-white/85">
          <li class="flex items-start gap-2 leading-6"><i class="bi bi-check2-circle mt-[2px] text-base shrink-0" aria-hidden="true"></i><span class="md:whitespace-nowrap">ใบเสนอราคา / PO / ใบกำกับภาษี</span></li>
          <li class="flex items-start gap-2 leading-6"><i class="bi bi-check2-circle mt-[2px] text-base shrink-0" aria-hidden="true"></i><span class="md:whitespace-nowrap">รองรับเครดิตเทอมองค์กร</span></li>
          <li class="flex items-start gap-2 leading-6"><i class="bi bi-check2-circle mt-[2px] text-base shrink-0" aria-hidden="true"></i><span class="md:whitespace-nowrap">ทีมวิศวกรมีใบรับรอง</span></li>
        </ul>
      </section>

      <!-- แผนที่: เปลี่ยนเป็น ทริปเปิ้ล อี เทรดดิ้ง ทั้งชื่อ + ลิงก์ + iframe -->
      <section class="order-3 md:order-none w-full md:col-span-4 md:pl-8 xl:pl-12 md:border-l md:border-white/10" aria-labelledby="ft-map">
        <h3 id="ft-map" class="sr-only">แผนที่</h3>


        <div class="rounded-xl overflow-hidden ring-1 ring-white/10 bg-white/5 backdrop-blur">
          <iframe
            title="ทริปเปิ้ล อี เทรดดิ้ง — แผนที่"
            src="https://www.google.com/maps?hl=th&q=13.717683,100.4732644&z=17&output=embed"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="block w-full aspect-[4/3] sm:aspect-[16/10]"
            style="border:0;filter:contrast(1.02) brightness(.98)"></iframe>
        </div>

        <a href="https://www.google.com/maps/place/%E0%B8%97%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5+%E0%B8%AD%E0%B8%B5+%E0%B9%80%E0%B8%97%E0%B8%A3%E0%B8%94%E0%B8%94%E0%B8%B4%E0%B9%89%E0%B8%87/@13.717683,100.4706895,17z/data=!3m1!4b1!4m6!3m5!1s0x30e2991a367db98b:0x4c961d180eb9153f!8m2!3d13.717683!4d100.4732644!16s%2Fg%2F1xg5q33q?entry=ttu"
           target="_blank" rel="noopener"
           class="mt-2 inline-flex items-center gap-2 text-white/85 hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40">
          <i class="bi bi-geo-alt" aria-hidden="true"></i>
          เปิดใน Google Maps
          <i class="bi bi-box-arrow-up-right text-xs opacity-80" aria-hidden="true"></i>
        </a>
      </section>
    </div>
  </div>

  <div class="relative border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-5 sm:py-6 text-[12px] sm:text-xs text-white/80">
      <nav aria-label="Legal" class="flex flex-col items-center gap-2 sm:gap-3">
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
          <span>© {{ date('Y') }} PowerCare by Hikari</span>
          <a href="#privacy" class="hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40">นโยบายความเป็นส่วนตัว</a>
          <a href="#terms" class="hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-white/40">เงื่อนไขการใช้งาน</a>
        </div>
      </nav>
    </div>
  </div>

  <!-- Smart LINE opener (data-smartline anchors) -->
  <script>
    (function () {
      const anchors = document.querySelectorAll('a[data-smartline][data-lineid]');
      function tryOpenLine(e) {
        e.preventDefault();
        const a = e.currentTarget;
        const id = a.getAttribute('data-lineid');
        if (!id) return;
        const scheme = 'line://ti/p/' + encodeURIComponent(id);
        const webUrl = 'https://line.me/R/ti/p/' + encodeURIComponent(id);
        let opened = false;
        const t = setTimeout(() => { if (!opened) window.open(webUrl, '_blank', 'noopener'); }, 700);
        try { opened = true; window.location.href = scheme; } finally { setTimeout(() => clearTimeout(t), 1200); }
      }
      anchors.forEach(a => a.addEventListener('click', tryOpenLine, { passive: false }));
    })();
  </script>
</footer>
</body>
</html>
