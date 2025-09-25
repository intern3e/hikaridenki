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

  <!-- Footer -->
  <footer id="contact" class="mt-auto bg-gradient-to-r from-blue-800 via-blue-700 to-teal-600 text-white relative">
    <div class="relative max-w-6xl mx-auto px-6 lg:px-8 py-12">

      <!-- 📱 Mobile: Accordion -->
      <div class="md:hidden space-y-4">
        
        <details class="bg-white/10 rounded-lg p-4">
          <summary class="flex items-center justify-between cursor-pointer text-lg font-semibold">
            <span class="flex items-center gap-2">
              <i class="bi bi-geo-alt-fill text-2xl"></i> ที่อยู่
            </span>
            <i class="bi bi-chevron-down"></i>
          </summary>
          <div class="mt-2 text-sm opacity-90 pl-8">
            <a href="https://www.google.com/maps/place/Hikari+Thailand.co.Ltd.+%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%AE%E0%B8%B4%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B8%B4+(%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%97%E0%B8%A8%E0%B9%84%E0%B8%97%E0%B8%A2)+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/@13.5511999,100.6676464,21z/data=!4m10!1m2!2m1!1zaGlrYXJpIGRlbmtpIOC4l-C4teC5iOC4reC4ouC4ueC5iA!3m6!1s0x311d58dd5128c8ed:0x1b3fc8268126b0d3!8m2!3d13.551206!4d100.6678593!15sCiJoaWthcmkgZGVua2kg4LiX4Li14LmI4Lit4Lii4Li54LmIIgJIAVoOIgxoaWthcmkgZGVua2mSAQ5tZXRhbF93b3Jrc2hvcJoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VSV2MzVkxVa3BuRUFFqgFHEAEqECIMaGlrYXJpIGRlbmtpKDUyHxABIhtS9pmK1l0-goJGUIY45Qgc6IonW2MgYruelXQyEBACIgxoaWthcmkgZGVua2ngAQD6AQQIABAe!16s%2Fg%2F11b6d01qrs?entry=ttu&g_ep=EgoyMDI1MDkyMS4wIKXMDSoASAFQAw%3D%3D"
               target="_blank" rel="noopener"
               class="hover:underline block">
              บริษัท ฮิคาริ เดงกิ จำกัด<br>
                39/7, ชั้น 4, วุฒากาส, ตลาดพลู<br>
                เขตธนบุรี , กรุงเทพมหานคร 10600
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
          <a href="https://www.hikaridenki.co.th" target="_blank" rel="noopener"
            class="font-bold hover:underline block">www.hikaridenki.co.th</a>

          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@hikaridenki.co.th"
            target="_blank" rel="noopener"
            class="hover:underline block mt-2">Info@hikaridenki.co.th</a>
        </div>

        </details>

      </div>

      <!-- 🖥 PC: Grid 3 Columns -->
      <div class="hidden md:grid grid-cols-3 gap-8 mb-10">
        
        <!-- Address -->
        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-geo-alt-fill"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2">ที่อยู่</h3>
          <a href="https://www.google.com/maps/place/Hikari+Thailand.co.Ltd.+%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%AE%E0%B8%B4%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B8%B4+(%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B9%80%E0%B8%97%E0%B8%A8%E0%B9%84%E0%B8%97%E0%B8%A2)+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/@13.5511999,100.6676464,21z/data=!4m10!1m2!2m1!1zaGlrYXJpIGRlbmtpIOC4l-C4teC5iOC4reC4ouC4ueC5iA!3m6!1s0x311d58dd5128c8ed:0x1b3fc8268126b0d3!8m2!3d13.551206!4d100.6678593!15sCiJoaWthcmkgZGVua2kg4LiX4Li14LmI4Lit4Lii4Li54LmIIgJIAVoOIgxoaWthcmkgZGVua2mSAQ5tZXRhbF93b3Jrc2hvcJoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VSV2MzVkxVa3BuRUFFqgFHEAEqECIMaGlrYXJpIGRlbmtpKDUyHxABIhtS9pmK1l0-goJGUIY45Qgc6IonW2MgYruelXQyEBACIgxoaWthcmkgZGVua2ngAQD6AQQIABAe!16s%2Fg%2F11b6d01qrs?entry=ttu&g_ep=EgoyMDI1MDkyMS4wIKXMDSoASAFQAw%3D%3D"
             target="_blank" rel="noopener"
             class="hover:underline block text-sm opacity-90">
            บริษัท ฮิคาริ เดงกิ จำกัด<br>
            39/7, ชั้น 4, วุฒากาส, ตลาดพลู<br>
            เขตธนบุรี , กรุงเทพมหานคร 10600
          </a>
        </div>

        <!-- Phone -->
        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-telephone-fill"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2">การติดต่อ</h3>
          <a href="tel:+6621172995" class="hover:underline block">02-117-2995 (คุณ อาร์ท)</a>
        <a href="tel:+66990802197" class="hover:underline block">099-080-2197</a>

            <span class="italic text-amber-200 block mt-2">บริการ 9.00-18.00</span>
        </div>

        <!-- Website & Email -->
        <div class="text-center hover:scale-105 transition">
          <div class="flex justify-center mb-4 text-4xl text-white">
            <i class="bi bi-envelope-fill"></i>
          </div>
        <h3 class="font-semibold text-lg mb-2">เว็บไซต์และอีเมล</h3>
        <a href="https://www.hikaridenki.co.th" target="_blank" rel="noopener"
          class="font-bold hover:underline block">www.hikaridenki.co.th</a>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=Info@hikaridenki.co.th"
          target="_blank" rel="noopener"
          class="hover:underline block mt-2">Info@hikaridenki.co.th</a>

        </div>
      </div>

      <!-- Divider -->
      <div class="border-t border-white/20 mb-6"></div>

      <!-- Bottom -->
      <div class="text-center text-xs md:text-sm opacity-90">
        <p>© 2025 hikaridenki by Hikari. All rights reserved.</p>
        <p class="italic mt-2">"hikaridenki by Hikari - We Care Your Power System"</p>
      </div>
    </div>
  </footer>

</body>
</html>
