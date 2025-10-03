<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dash Board</title>
  <meta name="description" content="PowerCare by Hikari — ผู้เชี่ยวชาญระบบไฟสำรอง แบตเตอรี่ และไฟฉุกเฉิน ครบวงจร ติดตั้ง บำรุงรักษา และที่ปรึกษา โดยทีมงานมืออาชีพมากกว่า 15 ปี">
  <meta name="theme-color" content="#0b2a6b">
  <meta property="og:title" content="PowerCare by Hikari">
  <meta property="og:description" content="โซลูชันระบบไฟสำรองและไฟฉุกเฉินแบบครบวงจร โดยทีมงานมืออาชีพ">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="th_TH">
  <link rel="icon" type="image/png" href="{{ asset('storage/logo/PNG.png') }}">
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
    <style>
        body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; margin: 0; background: #f4f6f9; display: flex; }
        .topbar { position: fixed; top: 0; left: 220px; right: 0; height: 60px; background: #fff; border-bottom: 1px solid #ddd; display: flex; align-items: center; justify-content: flex-end; padding: 0 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); z-index: 100; }
        .topbar a { text-decoration: none; background: #e74c3c; color: #fff; padding: 8px 16px; border-radius: 6px; font-size: 14px; transition: background 0.3s; }
        .topbar a:hover { background: #c0392b; }
        .sidebar { width: 220px; background: #2c3e50; color: white; min-height: 100vh; padding-top: 20px; position: fixed; left: 0; top: 0; bottom: 0; }
        .sidebar h2 { text-align: center; margin-bottom: 30px; font-size: 20px; font-weight: bold; }
        .sidebar a { display: block; padding: 14px 20px; text-decoration: none; color: white; font-size: 15px; border-left: 4px solid transparent; transition: all 0.3s; }
        .sidebar a:hover { background: #34495e; border-left: 4px solid #1abc9c; }
        .content { flex: 1; padding: 80px 20px 20px 240px; }
        h1 { font-size: 24px; margin-bottom: 20px; color: #333; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 6px; overflow: hidden; }
        th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background: #2c3e50; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
    </style>
</head>
<body>
    <div class="topbar">
        <a href="/admin/logout">Logout & Home</a>
    </div>

    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="/admin?tab=edit-product">Edit Product</a>
        <a href="/admin?tab=brochure">Brochure</a>
    </div>

    <div class="content">
        @php
            $tab = request()->get('tab', 'dashboard');
        @endphp

        @if($tab === 'dashboard')
            <h1>Admin Dashboard</h1>
            <!-- รายการสินค้า -->
        @elseif($tab === 'edit-product')
        <h1 class="text-2xl font-bold mb-4">Edit Products</h1>
        <span>เพิ่มสินค้าและอัปเดตสินค้า<span>     
        <form action="{{ route('admin.upload-csv') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file" accept=".csv" required>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Upload CSV เพิ่มรายการสินค้า</button>
        </form>


        <input type="text" id="searchInput" placeholder="ค้นหาด้วยชื่อ" 
            class="px-2 py-1 border border-gray-300 rounded mb-4 w-64">

        <table id="productTable" class="border-collapse border border-gray-300 w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">ID</th>
                    <th class="border px-2 py-1">Model</th>
                    <th class="border px-2 py-1">Name</th>
                    <th class="border px-2 py-1">Price (THB)</th>
                    <th class="border px-2 py-1">Discount</th>
                    <th class="border px-2 py-1">Size</th>
                    <th class="border px-2 py-1">Lead Time</th>
                    <th class="border px-2 py-1">Stock</th>
                    <th class="border px-2 py-1">Brand</th>
                    <th class="border px-2 py-1">จัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr x-data="{ editing: false, model: '{{ $product->Model }}', name: '{{ $product->name }}', price: '{{ $product->webpriceTHB }}', discount: '{{ $product->discount }}', size: '{{ $product->size }}', lead_time: '{{ $product->lead_time }}', stock: '{{ $product->stock }}', brand: '{{ $product->brand }}' }" class="hover:bg-gray-50">
                    <td class="border px-2 py-1">{{ $product->iditem }}</td>

                    <!-- Model -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="model"></span></template>
                        <template x-if="editing"><input type="text" x-model="model" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Name -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="name"></span></template>
                        <template x-if="editing"><input type="text" x-model="name" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Price -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="price"></span></template>
                        <template x-if="editing"><input type="text" x-model="price" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Discount -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="discount"></span></template>
                        <template x-if="editing"><input type="text" x-model="discount" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Size -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="size"></span></template>
                        <template x-if="editing"><input type="text" x-model="size" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Lead Time -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="lead_time"></span></template>
                        <template x-if="editing"><input type="text" x-model="lead_time" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Stock -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="stock"></span></template>
                        <template x-if="editing"><input type="text" x-model="stock" class="border px-1 py-1 w-full rounded"></template>
                    </td>

                    <!-- Brand -->
                    <td class="border px-2 py-1">
                        <template x-if="!editing"><span x-text="brand"></span></template>
                        <template x-if="editing"><input type="text" x-model="brand" class="border px-1 py-1 w-full rounded"></template>
                    </td>
<!-- Actions -->
<td class="border px-2 py-1 space-x-2">
    <!-- โหมดปกติ -->
    <template x-if="!editing">
        <button @click="editing = true" class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">แก้ไขข้อมูล</button>
    </template>

    <!-- โหมดแก้ไข -->
    <template x-if="editing">
        <button 
            @click="
                fetch('/admin/product/{{ $product->iditem }}/update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ 
                        model, name, webpriceTHB: price, discount, size, lead_time, stock, brand 
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        editing = false; // กลับไปโหมดปกติ
                        alert('อัปเดตเรียบร้อยแล้ว');
                    } else {
                        alert('เกิดข้อผิดพลาด: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(err => {
                    alert('เกิดข้อผิดพลาด: ' + err);
                });
            " 
            class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600"
        >Save</button>

        <button @click="editing = false" class="px-2 py-1 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</button>
    </template>
    <button 
    @click="if(confirm('คุณแน่ใจว่าต้องการลบสินค้านี้หรือไม่?')){
        fetch('/admin/product/{{ $product->iditem }}/delete', {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                alert('ลบข้อมูลเรียบร้อยแล้ว');
                // ลบแถวจริงโดยไม่ใช้ $refs
                $el.closest('tr').remove();
            } else {
                alert('เกิดข้อผิดพลาด: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(err => alert('เกิดข้อผิดพลาด: ' + err));
    }" 
    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"
    >ลบ</button>

    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top:15px;">
            {{ $products->appends(request()->query())->links() }}
        </div>






<!-- โบชัว -->
     @elseif($tab === 'brochure')
    <h1>Edit brochure</h1>

    <!-- ปุ่มเพิ่มข้อมูล -->
    <button type="button" onclick="toggleForm()" class="btn btn-success mb-3">
        + เพิ่มข้อมูล
    </button>

    <!-- ฟอร์มเพิ่มข้อมูล-->
    <form id="addForm" action="{{ route('service.addbrochures') }}" method="POST" enctype="multipart/form-data" style="display:none; margin-bottom:20px;">
        @csrf
        <div style="margin-bottom:10px;">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control" required>
        </div>
        <div style="margin-bottom:10px;">
            <label>ชื่อ</label>
            <input type="text" name="name_brochure" class="form-control" required>
        </div>
        <div style="margin-bottom:10px;">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control" required>
                <option value="">-- เลือก Category --</option>
                <option value="UPS เครื่องสำรองไฟ">UPS เครื่องสำรองไฟ</option>
                <option value="แบตเตอรี่">แบตเตอรี่</option>
                <option value="ไฟฉุกเฉิน และ ป้ายหนีไฟ">ไฟฉุกเฉิน และ ป้ายหนีไฟ</option>
                <option value="ระบบแจ้งเหตุเพลิงไหม้">ระบบแจ้งเหตุเพลิงไหม้</option>
            </select>
        </div>
        <div style="margin-bottom:10px;">
            <label>PDF</label>
            <input type="file" name="pdf" class="form-control" accept="application/pdf" required>
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>

    <!-- ช่องค้นหา -->
    <input type="text" id="searchbrochureInput" placeholder="ค้นหาด้วยยี่ห้อ"
           style="padding:6px; width:250px; border-radius:4px; border:1px solid #ccc; margin-bottom:15px;">

    <!-- ตาราง -->
    <table id="brochureTable" border="1" cellpadding="8" cellspacing="0" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>brand</th>
                <th>category</th>
                <th>pdf</th>
                <th>จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brochure as $item)
            <tr>
                <td>{{ $item->id_service }}</td>
                <td>{{ $item->name_brochure}}</td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->category }}</td>
                <td>
                    <a href="{{ asset('storage/'.$item->pdf) }}" target="_blank">เปิด PDF</a>
                </td>
                <td x-data>
                    <button 
                    @click="
                        if(confirm('คุณแน่ใจว่าต้องการลบโบชัวนี้หรือไม่?')){
                            fetch('/admin/brochure/{{ $item->id_service }}/delete', {
                                method: 'DELETE',
                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if(data.success){
                                    alert('ลบข้อมูลเรียบร้อยแล้ว');
                                    $el.closest('tr').remove();
                                } else {
                                    alert('เกิดข้อผิดพลาด: ' + (data.message || 'Unknown error'));
                                }
                            })
                            .catch(err => alert('เกิดข้อผิดพลาด: ' + err));
                        }
                    " 
                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                >ลบ</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <!-- pagination -->
    <div style="margin-top:15px;">
        {{ $brochure->appends(request()->query())->links() }}
    </div>
@endif

<script>
function toggleForm() {
    const form = document.getElementById("addForm");
    form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
}
</script>


<!-- ค้นหาของ -->
 <script>
    document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchInput');
    let timeout = null;

    input.addEventListener('keyup', function() {
        clearTimeout(timeout);
        const query = this.value;

        if (query.length >= 3 || query.length === 0) {
            timeout = setTimeout(function() {
                fetchProducts(query);
            }, 300); 
        }
    });

    function fetchProducts(search) {
    fetch(`/admin?tab=edit-product&search=${search}`)
    .then(response => response.text()) // ใช้ text() แทน json()
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newTbody = doc.querySelector('#productTable tbody');
        document.querySelector('#productTable tbody').innerHTML = newTbody.innerHTML;
            })
            .catch(err => console.error(err));
    }
});
</script>
<!-- ค้นหาโบชัว -->
 <script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('searchbrochureInput');
    let timeout = null;

    input.addEventListener('keyup', function() {
        clearTimeout(timeout);
        const query = this.value;

        if (query.length >= 1 || query.length === 0) {
            timeout = setTimeout(function() {
                fetchbrochure(query);
            }, 300); 
        }
    });

    function fetchbrochure(searchbrochure) {
        fetch(`/admin?tab=brochure&searchbrochure=${searchbrochure}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newTbody = doc.querySelector('#brochureTable tbody');
                document.querySelector('#brochureTable tbody').innerHTML = newTbody.innerHTML;
            })
            .catch(err => console.error(err));
    }
});
</script>
<!-- edit product -->
<script src="//unpkg.com/alpinejs" defer></script>
<script>
function save(iditem, data) {
    fetch(`/admin/product/${iditem}/update`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        if (!response.ok) {
            const text = await response.text();
            throw new Error(`HTTP ${response.status}: ${text}`);
        }
        return response.json();
    })
    .then(res => {
        if(res.success){
            alert('Update สำเร็จ!');
        } else {
            alert('Update ล้มเหลว!'); 
        }
    })
    .catch(err => {
        alert('เกิดข้อผิดพลาด: ' + err.message);
        console.error(err);
    });
}

</script>
