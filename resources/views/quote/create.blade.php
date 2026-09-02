
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ขอใบเสนอราคา | LD Elevator</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, "Noto Sans Thai", sans-serif;
        }

        input,
        select,
        textarea {
            transition: all 0.2s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.08);
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <header class="border-b bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">

            <div>
                <div class="text-xl font-bold text-gray-900">
                    LD <span class="text-red-600">Elevator</span>
                </div>

                <div class="text-xs text-gray-500">
                    ขอใบเสนอราคา
                </div>
            </div>

            <a
                href="{{ url('/') }}"
                class="text-sm font-medium text-gray-600 transition hover:text-red-600"
            >
                กลับหน้าหลัก
            </a>

        </div>
    </header>


    {{-- Main --}}
    <main class="px-4 py-10 sm:px-6 lg:py-16">

        <div class="mx-auto max-w-3xl">

            {{-- Heading --}}
            <div class="mb-8 text-center">

                <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-red-50">
                    <svg
                        class="h-7 w-7 text-red-600"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 14l2 2 4-4m5-2a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7A8.38 8.38 0 014 11.5a8.5 8.5 0 1117 0z"
                        />
                    </svg>
                </div>

                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    ขอใบเสนอราคา
                </h1>

                <p class="mx-auto mt-3 max-w-xl text-sm leading-6 text-gray-500 sm:text-base">
                    กรุณากรอกข้อมูลโครงการของคุณ
                    ทางบริษัทจะติดต่อกลับเพื่อสอบถามรายละเอียดเพิ่มเติม
                </p>

            </div>


            {{-- Success --}}
            @if(session('success'))

                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-800">
                    <div class="flex items-start gap-3">

                        <svg
                            class="mt-0.5 h-5 w-5 shrink-0"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        <div>
                            <div class="font-semibold">
                                ส่งข้อมูลสำเร็จ
                            </div>

                            <div class="mt-1">
                                {{ session('success') }}
                            </div>
                        </div>

                    </div>
                </div>

            @endif


            {{-- Errors --}}
            @if($errors->any())

                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800">

                    <div class="mb-2 font-semibold">
                        กรุณาตรวจสอบข้อมูล
                    </div>

                    <ul class="list-disc space-y-1 pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            @endif


            {{-- Form --}}
            <form
                action="{{ route('quote.store') }}"
                method="POST"
                class="space-y-6"
            >

                @csrf


                {{-- Contact --}}
                <section class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">

                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">
                            ข้อมูลสำหรับติดต่อ
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            ข้อมูลที่ใช้สำหรับให้บริษัทติดต่อกลับ
                        </p>
                    </div>


                    {{-- Name --}}
                    <div class="mb-5">

                        <label
                            for="full_name"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            ชื่อ - นามสกุล
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            type="text"
                            id="full_name"
                            name="full_name"
                            value="{{ old('full_name') }}"
                            placeholder="กรุณากรอกชื่อ - นามสกุล"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-900"
                        >

                    </div>


                    {{-- Email --}}
                    <div class="mb-5">

                        <label
                            for="email"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            อีเมล
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="example@email.com"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-900"
                        >

                    </div>


                    {{-- Phone --}}
                    <div>

                        <label
                            for="phone"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            เบอร์โทรศัพท์
                            <span class="text-red-600">*</span>
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="08x-xxx-xxxx"
                            required
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-900"
                        >

                    </div>

                </section>


                {{-- Project --}}
                <section class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm sm:p-8">

                    <div class="mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">
                            รายละเอียดโครงการ
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            ข้อมูลเบื้องต้นเกี่ยวกับโครงการที่ต้องการติดตั้ง
                        </p>
                    </div>


                    {{-- Floor --}}
                    <div class="mb-5">

                        <label
                            for="floor_count"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            จำนวนชั้นที่ต้องการติดตั้ง
                        </label>

                        <select
                            id="floor_count"
                            name="floor_count"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900"
                        >

                            <option value="">
                                เลือกจำนวนชั้น
                            </option>

                            @for($i = 1; $i <= 100; $i++)

                                <option
                                    value="{{ $i }}"
                                    @selected(old('floor_count') == $i)
                                >
                                    {{ $i }} ชั้น
                                </option>

                            @endfor

                        </select>

                    </div>


                    {{-- Contact Time --}}
                    <div class="mb-5">

                        <label class="mb-3 block text-sm font-medium text-gray-700">
                            ช่วงเวลาที่สะดวกให้ติดต่อกลับ
                        </label>

                        <div class="grid gap-3 sm:grid-cols-3">

                            @foreach([
                                '09.00 - 12.00 น.',
                                '13.00 - 17.00 น.',
                                '17.00 - 20.00 น.'
                            ] as $time)

                                <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-gray-200 px-4 py-3 transition hover:border-red-300 hover:bg-red-50">

                                    <input
                                        type="radio"
                                        name="contact_time"
                                        value="{{ $time }}"
                                        @checked(old('contact_time') === $time)
                                        class="h-4 w-4 accent-red-600"
                                    >

                                    <span class="text-sm text-gray-700">
                                        {{ $time }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>


                    {{-- Province --}}
                    <div class="mb-5">

                        <label
                            for="installation_province"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            จังหวัดสถานที่ติดตั้ง
                        </label>

                        <select
                            id="installation_province"
                            name="installation_province"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900"
                        >

                            <option value="">
                                เลือกจังหวัด
                            </option>

                            @php
                                $provinces = [
                                    'กรุงเทพมหานคร',
                                    'กระบี่',
                                    'กาญจนบุรี',
                                    'กาฬสินธุ์',
                                    'กำแพงเพชร',
                                    'ขอนแก่น',
                                    'จันทบุรี',
                                    'ฉะเชิงเทรา',
                                    'ชลบุรี',
                                    'ชัยนาท',
                                    'ชัยภูมิ',
                                    'ชุมพร',
                                    'ตรัง',
                                    'ตราด',
                                    'ตาก',
                                    'นครนายก',
                                    'นครปฐม',
                                    'นครพนม',
                                    'นครราชสีมา',
                                    'นครศรีธรรมราช',
                                    'นครสวรรค์',
                                    'นนทบุรี',
                                    'นราธิวาส',
                                    'น่าน',
                                    'บึงกาฬ',
                                    'บุรีรัมย์',
                                    'ปทุมธานี',
                                    'ประจวบคีรีขันธ์',
                                    'ปราจีนบุรี',
                                    'ปัตตานี',
                                    'พะเยา',
                                    'พังงา',
                                    'พัทลุง',
                                    'พิจิตร',
                                    'พิษณุโลก',
                                    'ภูเก็ต',
                                    'มหาสารคาม',
                                    'มุกดาหาร',
                                    'ยะลา',
                                    'ยโสธร',
                                    'ร้อยเอ็ด',
                                    'ระนอง',
                                    'ระยอง',
                                    'ราชบุรี',
                                    'ลพบุรี',
                                    'ลำปาง',
                                    'ลำพูน',
                                    'ศรีสะเกษ',
                                    'สกลนคร',
                                    'สงขลา',
                                    'สตูล',
                                    'สมุทรปราการ',
                                    'สมุทรสงคราม',
                                    'สมุทรสาคร',
                                    'สระแก้ว',
                                    'สระบุรี',
                                    'สิงห์บุรี',
                                    'สุพรรณบุรี',
                                    'สุราษฎร์ธานี',
                                    'สุรินทร์',
                                    'สุโขทัย',
                                    'หนองคาย',
                                    'หนองบัวลำภู',
                                    'อ่างทอง',
                                    'อำนาจเจริญ',
                                    'อุดรธานี',
                                    'อุตรดิตถ์',
                                    'อุทัยธานี',
                                    'อุบลราชธานี',
                                ];
                            @endphp

                            @foreach($provinces as $province)

                                <option
                                    value="{{ $province }}"
                                    @selected(old('installation_province') === $province)
                                >
                                    {{ $province }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Details --}}
                    <div>

                        <label
                            for="details"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            รายละเอียดเพิ่มเติม
                            <span class="text-red-600">*</span>
                        </label>

                        <textarea
                            id="details"
                            name="details"
                            rows="6"
                            required
                            placeholder="เช่น จำนวนลิฟต์ ประเภทอาคาร วันที่ต้องการเริ่มงาน หรือรายละเอียดอื่น ๆ"
                            class="w-full resize-none rounded-xl border border-gray-300 px-4 py-3 text-sm text-gray-900"
                        >{{ old('details') }}</textarea>

                    </div>

                </section>


                {{-- Submit --}}
                <div class="pt-2 text-center">

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-8 py-3.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-100 sm:w-auto"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M22 2L11 13"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M22 2l-7 20-4-9-9-4 20-7z"
                            />
                        </svg>

                        ส่งคำขอใบเสนอราคา

                    </button>

                    <p class="mt-3 text-xs text-gray-400">
                        ข้อมูลของคุณจะถูกใช้สำหรับติดต่อเกี่ยวกับคำขอใบเสนอราคาเท่านั้น
                    </p>

                </div>

            </form>

        </div>

    </main>


    {{-- Footer --}}
    <footer class="border-t bg-white py-6">

        <div class="text-center text-xs text-gray-400">
            © {{ date('Y') }} LD Elevator. All rights reserved.
        </div>

    </footer>

</body>
</html>
