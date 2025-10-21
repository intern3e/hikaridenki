<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>hikaridenki by Hikari</title>
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Prompt', sans-serif;
      background: #f8fafc;
      color: #0f172a;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col">
<!-- ===== Footer ===== -->
<footer class="relative text-white" role="contentinfo" aria-label="PowerCare footer">
  <!-- Gradient background -->
  <div class="absolute inset-0 bg-gradient-to-br from-[#0a2356] via-[#0b2a6b] to-[#0f4c75]"></div>
  <!-- Soft light halos -->
  <div class="pointer-events-none absolute inset-0 opacity-[.12]"
       style="background:
         radial-gradient(900px 280px at 15% -10%, rgba(255,255,255,.35), rgba(255,255,255,0)),
         radial-gradient(700px 240px at 85% 110%, rgba(255,255,255,.22), rgba(255,255,255,0));"></div>

  <!-- Content -->
  <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-12 sm:py-16">
    <div class="grid gap-y-8 gap-x-8 lg:gap-x-12 grid-cols-1 md:grid-cols-12 items-start">

      <!-- Brand & tagline -->
      <section class="md:col-span-7 space-y-4">
        <div>
          <p class="text-sm/5 tracking-wider uppercase text-amber-300">PowerCare</p>
          <h2 class="mt-1 text-2xl sm:text-3xl font-extrabold">PowerCare by Hikari</h2>
          <p class="mt-2 text-slate-100/90 leading-relaxed">
            โซลูชันระบบไฟสำรองสำหรับองค์กร — ติดตั้ง บำรุงรักษา ตรวจรับรอง โดยทีมวิศวกรมืออาชีพ
          </p>
        </div>

        <!-- Contact -->
        <address class="not-italic grid sm:grid-cols-2 gap-3 text-[15px] leading-6">
          <a href="tel:021172995" class="group inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white/5 hover:bg-white/10 transition">
            <i class="bi bi-telephone-inbound"></i>
            <span>02-117-2995 <span class="text-white/75">(คุณ อาร์ท)</span></span>
          </a>
          <a href="tel:0990802197" class="group inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white/5 hover:bg-white/10 transition">
            <i class="bi bi-telephone"></i>
            <span>099-080-2197</span>
          </a>
          <a href="tel:+66660975697" class="group inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white/5 hover:bg-white/10 transition" aria-label="โทร 066-097-5697">
            <i class="bi bi-telephone"></i>
            <span>066-097-5697 <span class="text-white/75">(คุณ ผักบุ้ง)</span></span>
          </a>

          <!-- Email: เปิดแท็บใหม่เสมอ -->
          <a href="mailto:Info@hikaridenki.co.th"
             class="group inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white/5 hover:bg-white/10 transition"
             rel="nofollow noopener"
             onclick="return openEmail(event, 'Info@hikaridenki.co.th');">
            <i class="bi bi-envelope"></i>
            <span>Info@hikaridenki.co.th</span>
          </a>

          <!-- LINE: ใช้ openLINE (ไม่เปลี่ยนหน้าเดิม) -->
          <a href="https://line.me/R/ti/p/@543ubjtx"
             class="group inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white/5 hover:bg-white/10 transition"
             aria-label="เพิ่มเพื่อน LINE @543ubjtx"
             rel="noopener"
             onclick="return openLINE(this)"
             data-line-id="@543ubjtx">
            <i class="bi bi-line"></i>
            <span>LINE: @543ubjtx</span>
          </a>
        </address>

        <!-- B2B badges -->
        <div class="mt-2">
          <p class="font-semibold text-amber-300 mb-2">พร้อมสำหรับงาน B2B</p>
          <ul class="grid sm:grid-cols-2 gap-2 text-[15px]">
            <li class="inline-flex items-center gap-2">
              <i class="bi bi-receipt-cutoff text-amber-300"></i>
              ใบเสนอราคา / PO / ใบกำกับภาษี
            </li>
            <li class="inline-flex items-center gap-2">
              <i class="bi bi-building-check text-amber-300"></i>
              รองรับเครดิตเทอมองค์กร
            </li>
            <li class="inline-flex items-center gap-2">
              <i class="bi bi-award text-amber-300"></i>
              ทีมวิศวกรมีใบรับรอง
            </li>
          </ul>
        </div>
      </section>

<!-- Map & CTA -->
<section class="md:col-span-5">
  <div class="rounded-2xl overflow-hidden ring-1 ring-white/10 bg-white/5 backdrop-blur-sm">
    <div class="p-4 sm:p-5 border-b border-white/10 flex items-center justify-between gap-3">
      <h3 class="font-semibold">บริษัท ฮิคาริ เดงกิ จำกัด</h3>

      <!-- ปุ่มเปิดใน Google Maps -->
      <a
        href="https://www.google.com/maps/place/%E0%B8%97%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5+%E0%B8%AD%E0%B8%B5+%E0%B9%80%E0%B8%97%E0%B8%A3%E0%B8%94%E0%B8%94%E0%B8%B4%E0%B9%89%E0%B8%87/@13.717683,100.473264,1929m/data=!3m1!1e3!4m6!3m5!1s0x30e2991a367db98b:0x4c961d180eb9153f!8m2!3d13.717683!4d100.4732644!16s%2Fg%2F1xg5q33q?hl=th&entry=ttu"
        target="_blank" rel="noopener"
        class="inline-flex items-center gap-2 rounded-lg px-3 py-2 bg-white text-[#0b2a6b] hover:bg-amber-400 hover:text-black transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-amber-300"
        aria-label="เปิดตำแหน่งบน Google Maps">
        <i class="bi bi-geo-alt-fill"></i>
        เปิดใน Google Maps
      </a>
    </div>

    <!-- กล่องแผนที่ + ป้ายชื่อซ้อนทับ -->
    <div class="relative aspect-[16/10] sm:aspect-[16/9] bg-black/20">
      <div class="pointer-events-none absolute top-3 left-3 z-10">
        <div class="rounded-lg bg-white/95 backdrop-blur shadow-md ring-1 ring-black/5 px-3 py-2">
          <div class="text-[15px] font-semibold leading-tight text-slate-900">
            บริษัท ฮิคาริ เดงกิ จำกัด
          </div>
        </div>
      </div>

      <!-- กล่องแผนที่ (Leaflet) -->
      <div
        id="gmap"
        class="absolute inset-0"
        role="img"
        aria-label="แผนที่บริษัท ฮิคาริ เดงกิ จำกัด"
        data-lat="13.717683"
        data-lng="100.473264"
        data-zoom="17"></div>
    </div>

    <!-- ปุ่มล่าง (มือถือ) -->
    <div class="p-4 sm:p-5 border-t border-white/10 sm:hidden">
      <a
        href="https://www.google.com/maps/place/%E0%B8%97%E0%B8%A3%E0%B8%B4%E0%B8%9B%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B9%89%E0%B8%A5+%E0%B8%AD%E0%B8%B5+%E0%B9%80%E0%B8%97%E0%B8%A3%E0%B8%94%E0%B8%94%E0%B8%B4%E0%B9%89%E0%B8%87/@13.717683,100.473264,1929m/data=!3m1!1e3!4m6!3m5!1s0x30e2991a367db98b:0x4c961d180eb9153f!8m2!3d13.717683!4d100.4732644!16s%2Fg%2F1xg5q33q?hl=th&entry=ttu"
        target="_blank" rel="noopener"
        class="w-full inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 bg-white text-[#0b2a6b] hover:bg-amber-400 hover:text-black transition">
        <i class="bi bi-map"></i>
        เปิดใน Google Maps
      </a>
    </div>
  </div>
</section>

<!-- Leaflet (ฟรี, ไม่ต้อง API Key) -->
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""
/>
<script
  src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
  integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
  crossorigin="">
</script>

<style>
  /* ป้ายชื่อบนแผนที่ (อยู่เหนือหัวลูกศร) */
  .leaflet-tooltip.company-label {
    background: rgba(255,255,255,0.95);
    color: #0f172a;
    border: 1px solid rgba(0,0,0,0.06);
    border-radius: 12px;
    padding: 6px 10px;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 6px 18px rgba(2,6,23,0.12);
    white-space: nowrap;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('gmap');
    if (!el) return;

    const lat = parseFloat(el.dataset.lat);
    const lng = parseFloat(el.dataset.lng);
    const zoom = parseInt(el.dataset.zoom || '17', 10);

    // สร้างแผนที่ Leaflet + OSM
    const map = L.map(el, {
      zoomControl: true,
      attributionControl: true,    // ยังเปิดอยู่ เพื่อแสดงเครดิต OSM
      scrollWheelZoom: false
    });

    // เอาโลโก้/ลิงก์ "Leaflet" ออก (เหลือแค่ OSM)
    map.attributionControl.setPrefix(false);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    map.setView([lat, lng], zoom);

    // ไอคอนหมุด "สีแดง"
    const redIcon = L.icon({
      iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
      iconSize:     [25, 41],
      iconAnchor:   [12, 41],
      popupAnchor:  [1, -34],
      shadowUrl:    'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
      shadowSize:   [41, 41],
      shadowAnchor: [12, 41]
    });

    // หมุด + ป้ายชื่อถาวร (วางเหนือหัวลูกศร)
    const marker = L.marker([lat, lng], {
      title: 'บริษัท ฮิคาริ เดงกิ จำกัด',
      icon: redIcon
    }).addTo(map);

    marker.bindTooltip('บริษัท ฮิคาริ เดงกิ จำกัด', {
      permanent: true,
      direction: 'top',
      offset: [0, -35],   // สูงกว่าหัวลูกศร (ปรับได้ -10 ถึง -20)
      className: 'company-label'
    }).openTooltip();

    setTimeout(() => map.invalidateSize(), 0);
  });
</script>

    </div>

    <!-- Bottom bar -->
    <div class="mt-10 pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3 text-sm text-white/80">
      <p>© <span class="tabular-nums">{{ date('Y') }}</span> PowerCare by Hikari. สงวนลิขสิทธิ์.</p>
      <div class="flex items-center gap-4">
        <a href="#" class="hover:text-white">นโยบายความเป็นส่วนตัว</a>
        <span aria-hidden="true" class="opacity-50">•</span>
        <a href="#" class="hover:text-white">ข้อตกลงการใช้งาน</a>
      </div>
    </div>
  </div>
</footer>
<!-- ===== /Footer ===== -->

<!-- ===== Footer helpers (เฉพาะถ้ายังไม่มีฟังก์ชันบนเพจ) ===== -->
<script>
  // ถ้ายังไม่เคยประกาศ openEmail ในหน้า ให้ประกาศที่นี่
  if (typeof window.openEmail !== 'function') {
    window.openEmail = function (evt, to, subject = '', body = '') {
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

      // เปิด Gmail ในแท็บใหม่
      let win = window.open(gmail, '_blank', 'noopener,noreferrer');

      // ถ้าถูกบล็อค popup → ใช้ <a> ชั่วคราว
      if (!win) {
        const a = document.createElement('a');
        a.href = gmail; a.target = '_blank'; a.rel = 'noopener'; a.style.display='none';
        document.body.appendChild(a); a.click(); a.remove();
      }

      // ถ้าแท็บเดิมยังโฟกัสอยู่ → เปิด mailto ในแท็บใหม่ (หน้าเดิมไม่เปลี่ยน)
      setTimeout(() => {
        try {
          if (document.visibilityState === 'visible') {
            window.open(mailto, '_blank', 'noopener');
          }
        } catch (_) {}
      }, 700);

      return false;
    };
  }

  // ถ้ายังไม่เคยประกาศ openLINE ในหน้า ให้ประกาศที่นี่
  if (typeof window.openLINE !== 'function') {
    window.openLINE = function (el) {
      var rawId = (el.getAttribute('data-line-id') || el.getAttribute('data-lineid') || '@543ubjtx').trim();
      var id = rawId.startsWith('@') ? rawId : ('@' + rawId);
      var webURL = 'https://line.me/R/ti/p/' + encodeURIComponent(id);

      // พยายามเปิดเว็บ LINE ในแท็บใหม่ก่อน (ไม่เปลี่ยนหน้าเดิม)
      var win = window.open(webURL, '_blank', 'noopener');

      // หากอยู่บน iOS/Android และมีแอป ให้พยายามเปิดแอปผ่าน intent/URI โดยไม่เปลี่ยนหน้าเดิม
      try {
        var ua = navigator.userAgent || '';
        var isiOS = /iP(hone|od|ad)/.test(ua);
        var isAndroid = /Android/i.test(ua);

        // เปิด scheme ผ่านหน้าต่างที่เพิ่งเปิด (ถ้าอนุญาต) เพื่อลดผลกระทบแท็บปัจจุบัน
        if (isAndroid && win) {
          // Android: ใช้ intent
          var intent = 'intent://ti/p/' + encodeURIComponent(id)
            + '#Intent;scheme=line;package=jp.naver.line.android;end';
          setTimeout(() => { try { win.location = intent; } catch(_){} }, 50);
        } else if (isiOS && win) {
          // iOS: ใช้ line:// scheme
          setTimeout(() => { try { win.location = 'line://ti/p/' + id; } catch(_){} }, 50);
        }
      } catch (_) {}

      return false;
    };
  }
</script>


</body>
</html>
