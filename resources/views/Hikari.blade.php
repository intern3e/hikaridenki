  
  <!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PowerCare by Hikari — โซลูชันระบบไฟสำรองสำหรับองค์กร</title>
  <meta name="description" content="ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉินสำหรับองค์กร ติดตั้ง บำรุงรักษา ตรวจรับรอง และให้คำปรึกษา โดยทีมวิศวกรมากประสบการณ์กว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">
  <link rel="canonical" href="https://www.powercare.co.th/">

  @include('header')
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <main id="main">
    <!-- ===== Hero (Luxury Calm Aurora) ===== -->
    <section class="relative overflow-hidden bg-[#0b2a6b]" data-hero>
      <style>
        [data-hero] .hero-title{letter-spacing:.015em;line-height:1.22}
        @media (min-width:768px){[data-hero] .hero-title{letter-spacing:.02em;line-height:1.2}}
        [data-hero] .hero-lead{letter-spacing:.005em;line-height:1.7}
        [data-hero]{position:relative;z-index:0;--navy:#0b2a6b;--navy-2:#092457;--navy-3:#071b45;--ice:#7dd3fc;--pearl:rgba(255,255,255,.22)}
        [data-hero] .hero-aurora{
          position:absolute;inset:-20%;z-index:0;pointer-events:none;
          background:
            radial-gradient(1000px 520px at 12% -8%, rgba(255,255,255,.20), transparent 62%),
            radial-gradient(900px 560px at 88% 0%, rgba(125,211,252,.20), transparent 60%),
            radial-gradient(1200px 680px at 20% 100%, rgba(56,189,248,.14), transparent 62%),
            linear-gradient(180deg, var(--navy) 0%, var(--navy-2) 48%, var(--navy-3) 100%);
          filter:saturate(1.02) contrast(1.02); will-change:transform,opacity; transform:translate3d(0,0,0);
          animation:auroraDrift 10s cubic-bezier(.22,.61,.36,1) infinite alternate
        }
        @keyframes auroraDrift{0%{transform:translate3d(-0.9%,-0.7%,0) scale(1.008)}100%{transform:translate3d(0.9%,0.7%,0) scale(1.014)}}
        [data-hero] .hero-silk{
          position:absolute;inset:-24%;z-index:1;pointer-events:none;mix-blend-mode:screen;
          background:
            linear-gradient(115deg, transparent 40%, rgba(255,255,255,.14) 50%, transparent 60%),
            linear-gradient(300deg, transparent 42%, rgba(125,211,252,.16) 50%, transparent 58%);
          opacity:.50; will-change:transform,opacity; transform:translate3d(-65%,0,0);
          animation:silkSweep 4.5s cubic-bezier(.22,.61,.36,1) infinite alternate
        }
        @keyframes silkSweep{0%{transform:translate3d(-65%,0,0)}100%{transform:translate3d(65%,0,0)}}
        [data-hero] .hero-vignette{position:absolute;inset:0;z-index:2;pointer-events:none;background:radial-gradient(120% 120% at 50% 40%,transparent 0 62%,rgba(0,0,0,.24) 100%);opacity:.20}
        @media (max-width:640px){
          [data-hero] h1.hero-title{font-size:clamp(18px,5.2vw,26px);letter-spacing:.012em;line-height:1.18}
          [data-hero] span.hero-title{font-size:clamp(18px,6.2vw,30px);line-height:1.14}
          [data-hero] .hero-lead{font-size:clamp(12px,3.2vw,14px);line-height:1.6}
          [data-hero] aside{padding:1rem;border-radius:16px}
          [data-hero] aside h3{font-size:clamp(13px,3.1vw,16px)}
          [data-hero] aside .font-extrabold{font-size:clamp(18px,6vw,24px);line-height:1.1}
          [data-hero] aside .text-slate-600{font-size:clamp(10px,3vw,12px);line-height:1.4}
        }
        @media (max-width:400px){
          [data-hero] h1.hero-title{font-size:clamp(16px,5.2vw,22px)}
          [data-hero] span.hero-title{font-size:clamp(16px,6vw,26px)}
          [data-hero] .hero-lead{font-size:clamp(11px,3vw,13px)}
          [data-hero] aside .font-extrabold{font-size:clamp(16px,5.8vw,22px)}
        }
        @media (prefers-reduced-motion: reduce){[data-hero] .hero-aurora,[data-hero] .hero-silk{animation:none}}
      </style>

      <div class="hero-aurora" aria-hidden="true"></div>
      <div class="hero-silk" aria-hidden="true"></div>
      <div class="hero-vignette" aria-hidden="true"></div>

      <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-6 py-10 md:py-24">
        <div class="text-white text-center md:text-left md:grid md:grid-cols-2 md:items-center md:gap-10">
          <div>
            <h1 class="hero-title text-[clamp(22px,6vw,34px)] md:text-4xl font-extrabold">
              โซลูชันระบบไฟสำรองสำหรับองค์กร
            </h1>
            <span class="block bg-clip-text hero-title text-transparent font-extrabold mt-1
                          text-[clamp(22px,7vw,40px)] md:text-5xl
                          bg-gradient-to-r from-amber-200 to-amber-400">
              ติดตั้ง-บำรุงรักษา-ที่ปรึกษา
            </span>
            <p class="hero-lead mt-4 md:mt-6 text-white/90 md:text-lg md:max-w-xl text-[clamp(13px,3.7vw,16px)]">
              ทีมวิศวกรผู้เชี่ยวชาญด้าน UPS, Battery, ไฟฉุกเฉิน และระบบแจ้งเหตุเพลิงไหม้
              ประสบการณ์กว่า 15 ปี ครอบคลุมงานติดตั้ง ตรวจรับรอง 
            </p>
          </div>

          <aside class="mt-8 md:mt-0 bg-white/90 backdrop-blur rounded-2xl p-5 md:p-8 shadow-xl ring-1 ring-slate-200">
            <h3 class="font-semibold text-[clamp(14px,3.6vw,18px)] md:text-lg text-[#0b2a6b]">เหตุผลที่องค์กรเลือกเรา</h3>
            <div class="grid grid-cols-3 gap-3 md:gap-4 mt-4 md:mt-5">
              <div class="p-3 md:p-4 rounded-xl bg-slate-50 text-center">
                <div class="font-extrabold md:text-3xl text-[clamp(20px,7vw,30px)] text-[#0b2a6b]">15+</div>
                <div class="text-slate-600 md:text-sm text-[clamp(10px,3.3vw,12px)]">ปีประสบการณ์</div>
              </div>
              <div class="p-3 md:p-4 rounded-xl bg-slate-50 text-center">
                <div class="font-extrabold md:text-3xl text-[clamp(20px,7vw,30px)] text-[#0b2a6b]">500+</div>
                <div class="text-slate-600 md:text-sm text-[clamp(10px,3.3vw,12px)]">โครงการสำเร็จ</div>
              </div>
              <div class="p-3 md:p-4 rounded-xl bg-slate-50 text-center">
                <div class="font-extrabold md:text-3xl text-[clamp(20px,7vw,30px)] text-[#0b2a6b]">24</div>
                <div class="text-slate-600 md:text-sm text-[clamp(10px,3.3vw,12px)]">ชั่วโมงบริการ</div>
              </div>
            </div>
            <div class="mt-4 md:mt-5 text-slate-600 flex items-center gap-2 justify-center md:justify-start md:text-sm text-[clamp(11px,3.2vw,13px)]">
              <i class="bi bi-shield-check text-emerald-600" aria-hidden="true"></i>
              ทีมงานผ่านการอบรมความปลอดภัยและอุตสาหกรรมที่เกี่ยวข้อง
            </div>
          </aside>
        </div>
      </div>
    </section>
  </main>

  <!-- ===== Services ===== -->
  <section id="services" class="bg-white" data-services>
    <style>
      [data-services] .cards{
        display:grid; grid-auto-flow:column; grid-auto-columns:85%; gap:1rem; overflow-x:auto;
        padding:.25rem .25rem .5rem; scroll-snap-type:x mandatory; scroll-padding-left:.25rem; -webkit-overflow-scrolling:touch; overscroll-behavior-x:contain
      }
      [data-services] .card{scroll-snap-align:start;border-color:#e6edf5;background:#fff;transition:transform .2s ease,box-shadow .2s ease,border-color .2s ease;box-shadow:0 1px 0 rgba(15,23,42,.03)}
      [data-services] .card:hover{transform:translateY(-2px);box-shadow:0 10px 24px rgba(15,23,42,.08);border-color:#dbe7f3}
      [data-services] .card:focus-within{outline:none;box-shadow:0 0 0 3px rgba(59,130,246,.15),0 10px 24px rgba(15,23,42,.08);border-color:#bfdbfe}
      [data-services] .card .ico{transition:transform .2s ease}
      [data-services] .card:hover .ico{transform:translateY(-2px) scale(1.03)}
      @media (min-width:768px){
        [data-services] .cards{grid-auto-flow:initial;grid-auto-columns:initial;grid-template-columns:repeat(3,minmax(0,1fr));overflow:visible;padding:0}
        [data-services] .card{height:100%}
      }
      @media (prefers-reduced-motion: reduce){[data-services] .card,[data-services] .card .ico{transition:none}}
    </style>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-16">
      <h2 class="text-2xl md:text-3xl font-bold mb-1" style="color:var(--brand)">บริการสำหรับองค์กร</h2>
      <p class="text-slate-600 mb-8">ตั้งแต่สำรวจหน้างาน ออกแบบ ติดตั้ง ทดสอบ รับประกัน และบริการหลังการขาย</p>

      <div class="cards">
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center text-2xl"><i class="bi bi-tools" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">ติดตั้งระบบ (Install)</h3>
          <p class="text-sm text-slate-600 mt-2">ทีมวิศวกรควบคุมงานตามมาตรฐานอุตสาหกรรม พร้อมรายงานผลการทดสอบ</p>
        </article>
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl"><i class="bi bi-battery-half" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">เปลี่ยนแบตเตอรี่ (Battery)</h3>
          <p class="text-sm text-slate-600 mt-2">VRLA/Flooded/NiCd พร้อมบริการยกย้าย-กำจัดตามข้อกำหนดสิ่งแวดล้อม</p>
        </article>
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center text-2xl"><i class="bi bi-gear-wide-connected" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">บำรุงรักษา (Maintenance)</h3>
          <p class="text-sm text-slate-600 mt-2">แผน PM/CM, Load Bank, Thermal Imaging, รายงานผลพร้อมคำแนะนำ</p>
        </article>
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl"><i class="bi bi-graph-up-arrow" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">มอนิเตอร์ (Monitoring)</h3>
          <p class="text-sm text-slate-600 mt-2">ติดตั้งระบบติดตามสถานะแบตเตอรี่/UPS บนแพลตฟอร์มชั้นนำ</p>
        </article>
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-orange-100 text-orange-700 flex items-center justify-center text-2xl"><i class="bi bi-truck" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">จัดส่งและรวมของ (Delivery & Consolidate)</h3>
          <p class="text-sm text-slate-600 mt-2">ทดสอบและรวมอุปกรณ์ที่คลังปลอดภัย พร้อมจัดส่งหน้างานตามกำหนด</p>
        </article>
        <article class="rounded-2xl p-7 border card">
          <div class="ico w-14 h-14 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center text-2xl"><i class="bi bi-recycle" aria-hidden="true"></i></div>
          <h3 class="font-semibold text-lg mt-4">กำจัด/รีไซเคิล (Recycling)</h3>
          <p class="text-sm text-slate-600 mt-2">คู่ค้าตามมาตรฐานสิ่งแวดล้อม ออกใบรับรองการกำจัด</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== About ===== -->
  <section id="about" class="relative bg-slate-50" data-about>
    <style>
      [data-about] .bg-soft{position:absolute;inset:0;pointer-events:none;opacity:.22;background:radial-gradient(700px 280px at 10% -10%, rgba(255,255,255,.7), rgba(255,255,255,0)),radial-gradient(560px 220px at 95% 110%, rgba(125,211,252,.25), rgba(125,211,252,0))}
      [data-about] .ttl{position:relative;display:inline-block;font-weight:800;color:var(--brand);font-size:clamp(22px,5.6vw,34px);line-height:1.15;margin-bottom:1rem}
      [data-about] .ttl:before{content:"";position:absolute;left:0;bottom:-10px;height:4px;width:72px;border-radius:999px;background:linear-gradient(90deg,var(--brand),#60a5fa,#fde68a)}
      [data-about] .copy{background:linear-gradient(180deg,#ffffff,rgba(255,255,255,.92));border:1px solid #e6edf5;border-radius:20px;padding:1rem;box-shadow:0 6px 22px rgba(2,6,23,.05)}
      [data-about] p.lead{color:#334155;font-size:clamp(13px,3.6vw,16px);line-height:1.7}
      @media (min-width:768px){[data-about] .copy{background:transparent;border:0;box-shadow:none;padding:0}[data-about] p.lead{font-size:clamp(14px,1.1vw,16px)}}
      [data-about] .feat{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.75rem .9rem;margin-top:.25rem;font-size:clamp(12px,3.4vw,14px)}
      [data-about] .chip{display:flex;align-items:center;gap:.55rem;background:linear-gradient(180deg,#ffffff,#f8fbff);border:1px solid #e6edf5;border-radius:999px;padding:.65rem .75rem;box-shadow:0 4px 14px rgba(2,6,23,.05);transition:transform .18s ease,box-shadow .18s ease,border-color .18s ease}
      [data-about] .chip:hover{box-shadow:0 8px 22px rgba(2,6,23,.08);border-color:#dbe7f3}
      [data-about] .badge{width:1.6rem;height:1.6rem;border-radius:999px;flex:0 0 auto;display:flex;align-items:center;justify-content:center;color:#059669;background:radial-gradient(120% 120% at 30% 20%, rgba(255,255,255,.95), rgba(255,255,255,0)),linear-gradient(135deg, rgba(16,185,129,.22), rgba(11,42,107,.10));box-shadow:inset 0 1px 0 rgba(255,255,255,.9),0 3px 10px rgba(16,185,129,.18);font-size:.9rem}
      @media (min-width:768px){[data-about] .feat{gap:.9rem 2rem}[data-about] .chip{border-radius:14px;padding:.75rem .9rem;box-shadow:0 6px 18px rgba(2,6,23,.05)}[data-about] .badge{width:1.9rem;height:1.9rem;font-size:1rem}}
      @media (max-width:768px){[data-about] .grid{gap:1.25rem}}
      @media (prefers-reduced-motion: reduce){[data-about] .chip{transition:none}}
    </style>

    <div class="bg-soft" aria-hidden="true"></div>

    <div class="relative max-w-7xl mx-auto px-4 md:px-6 py-16">
      <div class="grid md:grid-cols-12 gap-10 items-start">
        <div class="md:col-span-7 copy">
          <h2 class="ttl">เกี่ยวกับเรา</h2>
          <p class="lead"><span class="font-semibold">PowerCare by Hikari</span> ผู้ให้บริการระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉิน มุ่งมั่นส่งมอบโซลูชันที่เชื่อถือได้ในการดูแลระบบไฟฟ้าสำคัญ</p>
          <p class="lead mt-4">ประสบการณ์มากกว่า 15 ปี เชี่ยวชาญงานติดตั้ง บำรุงรักษา และที่ปรึกษาเพื่อวางระบบที่เหมาะสมที่สุด</p>
        </div>

        <div class="md:col-span-5">
          <ul role="list" class="feat">
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">ประสบการณ์ 15+ ปี</span></li>
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">ทีมวิศวกรผู้เชี่ยวชาญ</span></li>
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">บริการ 24 ชั่วโมง</span></li>
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">มาตรฐานสากล</span></li>
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">บริการครบวงจร</span></li>
            <li class="chip"><span class="badge"><i class="bi bi-check-lg" aria-hidden="true"></i></span><span class="text-slate-800">แบรนด์ชั้นนำ</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== Partners ===== -->
  <section class="py-20 px-4" data-partners>
    <style>
      [data-partners]{--ink:#111827;--muted:#6b7280;--card:#ffffff;--line:#e5e7eb;--radius:18px}
      [data-partners] .kicker{display:inline-block;letter-spacing:.08em;font-weight:600;font-size:.8rem;text-transform:uppercase;color:var(--muted)}
      [data-partners] .title{color:var(--ink);font-weight:800;line-height:1.15}
      [data-partners] .subtitle{color:var(--muted);max-width:48rem;margin-inline:auto}
      [data-partners] .partner-card{position:relative;background:var(--card);border:1px solid var(--line);border-radius:var(--radius);padding:1.25rem 1.25rem 1.5rem;transition:box-shadow .25s ease,transform .2s ease,border-color .2s ease;box-shadow:0 6px 22px rgba(2,6,23,.04)}
      [data-partners] .partner-card:hover{transform:translateY(-2px);box-shadow:0 10px 32px rgba(2,6,23,.07);border-color:rgba(2,6,23,.08)}
      [data-partners] .partner-card::before{content:"";position:absolute;inset:0 0 auto 0;height:6px;border-radius:var(--radius) var(--radius) 0 0;background:var(--ac,linear-gradient(90deg,#2563eb,#60a5fa))}
      [data-partners] .accent-emerald{--ac:linear-gradient(90deg,#059669,#34d399)}
      [data-partners] .accent-blue{--ac:linear-gradient(90deg,#2563eb,#60a5fa)}
      [data-partners] .accent-amber{--ac:linear-gradient(90deg,#d97706,#f59e0b)}
      [data-partners] .accent-red{--ac:linear-gradient(90deg,#dc2626,#f87171)}
      [data-partners] .partner-head{display:flex;align-items:center;gap:.5rem;margin:.25rem 0 1rem;color:var(--ink);font-weight:700}
      [data-partners] .partner-head i{font-size:1.125rem;opacity:.9}
      [data-partners] .logo-grid{display:grid;gap:1.25rem;place-items:center;grid-template-columns:repeat(2,minmax(0,1fr))}
      [data-partners] .logo-grid img{max-height:56px;width:auto;object-fit:contain;opacity:1;filter:none;transition:transform .2s ease,box-shadow .2s ease}
      [data-partners] .logo-grid img:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(2,6,23,.08)}
      @media (max-width:640px){
        [data-partners] .title{font-size:clamp(20px,6vw,28px)}
        [data-partners] .subtitle{font-size:clamp(12px,3.6vw,14px);padding:0 .25rem}
        [data-partners] .partner-card{border-radius:16px;padding:.9rem .9rem 1.1rem;box-shadow:0 6px 18px rgba(2,6,23,.05);transition:transform .16s ease,box-shadow .16s ease}
        [data-partners] .partner-card:active{transform:translateY(1px) scale(.998);box-shadow:0 3px 10px rgba(2,6,23,.05)}
        [data-partners] .partner-head{font-size:.98rem;margin:.25rem 0 .75rem}
        [data-partners] .logo-grid{gap:.85rem}
        [data-partners] .logo-grid img{height:48px;max-height:none;padding:10px 12px;background:linear-gradient(180deg,#ffffff,#f8fbff);border:1px solid #e6edf5;border-radius:14px;box-shadow:0 4px 12px rgba(2,6,23,.05);transition:transform .14s ease,box-shadow .14s ease}
        [data-partners] .logo-grid img:active{transform:scale(.985);box-shadow:0 2px 8px rgba(2,6,23,.05)}
      }
      @media (min-width:641px){[data-partners] .logo-grid img{height:auto;max-height:56px;padding:0;border:0;border-radius:0;box-shadow:none;background:none}}
    </style>

    <div class="max-w-7xl mx-auto">
      <div class="text-center">
        <h2 class="title text-3xl md:text-4xl mt-2" style="color:var(--brand)">พันธมิตรแบรนด์ชั้นนำ</h2>
        <p class="subtitle mt-3">เราทำงานร่วมกับผู้ผลิตระดับสากล เพื่อส่งมอบโซลูชันที่เชื่อถือได้สำหรับองค์กรของคุณ</p>
      </div>

<div class="mt-12 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
  <!-- UPS -->
  <article class="partner-card accent-emerald" aria-labelledby="ups-heading">
    <h3 id="ups-heading" class="partner-head"><i class="bi bi-plug" aria-hidden="true"></i> UPS เครื่องสำรองไฟ</h3>
    <div class="flex flex-col gap-3">
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/apc.png') }}" alt="APC — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/cyberpower-seeklogo.png') }}" alt="CyberPower — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/delta-electronics-seeklogo.png') }}" alt="Delta — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/eaton-seeklogo.png') }}" alt="Eaton — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/schneider.png') }}" alt="Schneider — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/vertiv-seeklogo.png') }}" alt="Vertiv — พันธมิตร UPS" loading="lazy" decoding="async">
      </div>
    </div>
  </article>

  <!-- Battery -->
  <article class="partner-card accent-blue" aria-labelledby="battery-heading">
    <h3 id="battery-heading" class="partner-head"><i class="bi bi-battery-charging" aria-hidden="true"></i> แบตเตอรี่</h3>
    <div class="flex flex-col gap-3">
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/666_0.png') }}" alt="Long — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/Accu.png') }}" alt="Accu — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/csb-battery-seeklogo.png') }}" alt="CSB — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/Leoch Battery.png') }}" alt="Leoch — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/panasonic-seeklogo.png') }}" alt="Panasonic — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/yuasa-seeklogo.png') }}" alt="Yuasa — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/cyberpower-seeklogo.png') }}" alt="CyberPower — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/eaton-seeklogo.png') }}" alt="Eaton — พันธมิตรแบตเตอรี่" loading="lazy" decoding="async">
      </div>
    </div>
  </article>

  <!-- Emergency light -->
  <article class="partner-card accent-amber" aria-labelledby="emg-heading">
    <h3 id="emg-heading" class="partner-head"><i class="bi bi-lightbulb" aria-hidden="true"></i> ไฟฉุกเฉิน และ ป้ายหนีไฟ</h3>
    <div class="flex flex-col gap-3">
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/111_0.png') }}" alt="Sunny" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/222_0.png') }}" alt="Iwachi" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/333_0.png') }}" alt="BEC" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/444_0.png') }}" alt="Delight" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/555_0.png') }}" alt="Dyno" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/888_0.png') }}" alt="Safeguard" loading="lazy" decoding="async"></div>
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm"><img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/MAXBRIGHT.png') }}" alt="Max Bright" loading="lazy" decoding="async"></div>
    </div>
  </article>

  <!-- Fire alarm -->
  <article class="partner-card accent-red" aria-labelledby="fa-heading">
    <h3 id="fa-heading" class="partner-head"><i class="bi bi-lightning-charge" aria-hidden="true"></i> ระบบแจ้งเหตุเพลิงไหม้</h3>
    <div class="flex flex-col gap-3">
      <div class="flex items-center justify-center h-24 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
        <img class="max-h-16 w-auto object-contain select-none pointer-events-none" src="{{ asset('storage/logo/notifier-seeklogo.png') }}" alt="Notifier — พันธมิตรระบบแจ้งเหตุเพลิงไหม้" loading="lazy" decoding="async">
      </div>
    </div>
  </article>
</div>

  </section>

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
