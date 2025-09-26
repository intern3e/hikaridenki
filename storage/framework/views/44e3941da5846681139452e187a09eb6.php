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
  <link rel="icon" type="image/png" href="<?php echo e(asset('storage/logo/PNG.png')); ?>">
  <link rel="canonical" href="https://www.powercare.co.th/">

  <!-- Preload key image -->
  <link rel="preload" as="image" href="<?php echo e(asset('storage/logo/20.png')); ?>">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root{
      --brand:#0b2a6b;
      --brand-2:#1552a7;
      --accent:#f59e0b;
      --ink:#0f172a;
      --muted:#475569;
    }
    body{ font-family:'Prompt',sans-serif; color:var(--ink); background:#f8fafc; }
    .soft{ box-shadow: 0 6px 20px rgba(2,6,23,.08), 0 2px 10px rgba(2,6,23,.06); }
    .btn{ display:inline-flex; align-items:center; gap:.5rem; padding:.75rem 1.1rem; border-radius:14px; font-weight:600; line-height:1; }
    .btn-primary{ background:linear-gradient(135deg,var(--brand),var(--brand-2)); color:#fff; }
    .btn-primary:hover{ filter:brightness(1.05); }
  </style>
</head>
<body class="bg-slate-50">

  <!-- ===== Header ===== -->
  <header class="sticky top-0 z-50 transition-all bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto flex items-center justify-between py-3.5 px-4 md:px-6">
      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        <img src="<?php echo e(asset('storage/logo/PNG.png')); ?>"
             alt="PowerCare logo"
             class="w-8 h-8 object-contain"
             loading="eager" decoding="async">
        <span class="font-bold text-xl" style="color:var(--brand)">PowerCare</span>
        <span class="text-sm text-slate-500">by Hikari</span>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center gap-6 text-sm font-medium ml-auto mr-6">
        <a href="/" class="hover:text-blue-700">HOME</a>
        <a href="<?php echo e(route('product.index')); ?>" class="hover:text-blue-700">SERVICE</a>
        <a href="<?php echo e(route('showproduct')); ?>" class="hover:text-blue-700">ALL PRODUCT</a>
      </nav>


      <!-- CTA -->
      <div class="hidden md:flex items-center gap-6 text-sm text-slate-700">
        <a href="tel:+66990802197" class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-telephone"></i> 099-080-2197
        </a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@hikaridenki.co.th" 
          target="_blank" 
          class="flex items-center gap-2 hover:text-blue-700">
          <i class="bi bi-envelope"></i> Info@hikaridenki.co.th
        </a>
        <a href="#contact" class="btn btn-primary">
          <i class="bi bi-send"></i> Contact
        </a>
      </div>
    </div>
  </header>

  <!-- ===== Main / Product Detail ===== -->
  <main id="main" class="max-w-7xl mx-auto px-4 md:px-6 py-8 md:py-12">
    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" class="text-sm mb-6">
      <ol class="flex items-center gap-2 text-slate-500">
        <li><a href="/" class="hover:text-blue-700">หน้าแรก</a></li>
        <li>/</li>
        <li><a href="/showproduct" class="hover:text-blue-700">สินค้าทั้งหมด</a></li>
        <li>/</li>
        <li class="text-slate-700 font-semibold">
          <?php echo e($product->name ?? 'รายละเอียดสินค้า'); ?>

        </li>
      </ol>
    </nav>

    <?php
      // เตรียมข้อมูลแสดงผล
      $imgSrc    = $product->pic ?: asset('storage/logo/20.png');
      $nameTxt   = $product->name ?? '—';
      $modelTxt  = $product->model ?? null;
      $brandTxt  = $product->brand ?? null;

      // ระยะเวลาจัดส่ง
      $leadRaw   = trim((string)($product->lead_time_web ?? ''));
      $leadTxt   = ($leadRaw === '' || $leadRaw === '-' || $leadRaw === '—') ? '3-5 days' : $leadRaw;

      // ราคา
      $rawPrice  = $product->webpriceTHB ?? null;
      $priceNum  = is_null($rawPrice) ? null : (float) preg_replace('/[^\d\.\-]+/','', (string) $rawPrice);
      $priceTxt  = is_null($priceNum) ? '—' : number_format($priceNum, 2);

      // สต็อก
      $stockRaw  = trim((string)($product->stock ?? ''));
      if ($stockRaw === '' || $stockRaw === '-' || $stockRaw === '—') {
          $stockTxt = 'ติดต่อสอบถาม';
      } else {
          $stockTxt = is_numeric($stockRaw) ? number_format((float)$stockRaw) . ' ชิ้น' : $stockRaw;
      }
    ?>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12">
      <!-- รูปสินค้า -->
      <div class="bg-white rounded-2xl soft p-6 flex items-center justify-center">
        <figure class="flex flex-col items-center">
          <div class="w-[300px] h-[300px] bg-white border border-slate-200 rounded-2xl flex items-center justify-center overflow-hidden">
            <img
              src="<?php echo e($imgSrc); ?>"
              alt="<?php echo e($nameTxt); ?>"
              width="300" height="300"
              class="w-[300px] h-[300px] object-contain"
              loading="eager" decoding="async" />
          </div>
          <?php if($brandTxt || $modelTxt): ?>
            <figcaption class="mt-3 text-xs text-slate-500">
              <?php echo e($brandTxt ? 'แบรนด์: '.$brandTxt : ''); ?><?php echo e($brandTxt && $modelTxt ? ' • ' : ''); ?><?php echo e($modelTxt ? 'รุ่น: '.$modelTxt : ''); ?>

            </figcaption>
          <?php endif; ?>
        </figure>
      </div>

      <!-- รายละเอียดสินค้า -->
      <div class="space-y-4">
        <h1 class="text-2xl md:text-3xl font-extrabold leading-tight"><?php echo e($nameTxt); ?></h1>

        <div class="flex flex-wrap items-center gap-3 text-sm">
          <!-- ระยะเวลาจัดส่ง -->
          <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-50 text-amber-700 ring-1 ring-amber-200">
            <i class="bi bi-clock-history"></i>
            ระยะเวลาจัดส่ง: <strong class="ml-1"><?php echo e($leadTxt); ?></strong>
          </span>

          <!-- สต็อก -->
          <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full
            <?php echo e($stockTxt === 'ติดต่อสอบถาม'
                ? 'bg-gray-100 text-gray-600 ring-1 ring-gray-300'
                : 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200'); ?>">
            <i class="bi bi-box-seam"></i>
            สต็อก: <strong class="ml-1"><?php echo e($stockTxt); ?></strong>
          </span>
        </div>

        <!-- ราคา -->
        <div class="pt-2">
          <div class="text-slate-500 text-sm">ราคา</div>
          <div class="text-3xl font-black tracking-tight mt-1">
            <?php echo e($priceTxt === '—' ? '—' : $priceTxt.' ฿'); ?>

          </div>
        </div>

        <!-- ปุ่มสอบถาม -->
        <div class="flex flex-wrap gap-3 pt-2">
          <?php
            $to      = 'Info@hikaridenki.co.th';
            $subject = 'สอบถามสินค้า: ' . $nameTxt;
            $body    = "สวัสดีทีม Hikari,\n\nต้องการสอบถามข้อมูลสินค้า:\n"
                      . "- ชื่อสินค้า: {$nameTxt}\n"
                      . "- ราคา: {$priceTxt} THB\n\n"
                      . "ขอบคุณครับ/ค่ะ";

            $gmailUrl = 'https://mail.google.com/mail/?view=cm&fs=1'
                      . '&to='   . rawurlencode($to)
                      . '&su='   . rawurlencode($subject)
                      . '&body=' . rawurlencode($body);
          ?>

          <a href="<?php echo e($gmailUrl); ?>" target="_blank" rel="noopener" class="btn btn-primary">
            <i class="bi bi-chat-dots"></i> สอบถามเพิ่มเติม
          </a>
        </div>

        <!-- รายละเอียดโดยย่อ -->
        <div class="mt-6 p-4 bg-white rounded-xl border border-slate-200">
          <h2 class="font-semibold mb-2">รายละเอียดโดยย่อ</h2>
          <ul class="list-disc pl-5 text-slate-700 space-y-1">
            <li>คุณภาพมาตรฐานอุตสาหกรรม เหมาะกับงานไฟฟ้า/สำรองไฟ</li>
            <li>บริการหลังการขายโดยทีมวิศวกรมากประสบการณ์</li>
            <li>รองรับการจัดส่งทั่วประเทศ</li>
          </ul>
        </div>
      </div>
    </section>
  </main>

  
  <?php echo $__env->make('footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\hikaridenki\resources\views/productdetail.blade.php ENDPATH**/ ?>