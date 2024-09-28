@extends('layouts.public.public')
@section('title')
    Ekibimiz
@endsection
@section('content')
    <x-pageHero title="Kariyer" imagetitle="iletisim.webp" />
    <div class="max-w-7xl mx-auto px-4 space-y-20 mt-20">
        <div class="grid md:grid-cols-2 items-center md:gap-8 gap-6 px-4">
            <div class="max-md:order-1 max-md:text-center">
                <x-title heading="En yüksek dürüstlük standartlarını
            koruyoruz."
                    subtext="Her vakanın benzersiz olduğunu anlayarak
            müşterilerimizin ihtiyaçlarına öncelik veriyoruz. Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz
            ilgiyi ve temsili almanızı sağlayarak size özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok
            çeşitli yasal konuları etkin bir şekilde ele almamızı sağlar." />
                <div class="mt-8 flex items-center gap-4 justify-center md:justify-start">
                    <a href=""
                        class="border border-slate-800 bg-slate-800 text-white hover:bg-white hover:text-black duration-300 py-2 px-7 rounded-3xl">Daha
                        Fazla</a>
                    <a href=""
                        class="bg-transparent border border-slate-800 hover:bg-slate-800 hover:text-white bg-white text-black duration-300 py-2 px-7 rounded-3xl">İletişime
                        Geç</a>
                </div>
            </div>
            <div class="md:h-[450px]">
                <img src="https://images.pexels.com/photos/5673485/pexels-photo-5673485.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    class="w-full h-full object-cover rounded-lg shadow-xl" alt="Dining Experience" />
            </div>
        </div>
        <div class="w-full">
            <x-title heading="Ailemize Katılın" subtext="Lorem lorem aaa admsamdasm asdmasmdas dsamdsa " />
            <div class="flex flex-col gap-5">
                <div
                    class="bg-slate-900 w-full text-white py-8 px-5  max-md:text-center  flex flex-col gap-5  md:gap-0 md:flex-row items-center justify-around">
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Pozisyon</span>
                        <span>Yönetici</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Lokasyon</span>
                        <span>Ankara</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Tür</span>
                        <span>Tam Zamanlı</span>
                    </div>
                    <a href=""
                        class="max-md:w-full bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Ziyaret
                        Et</a>
                </div>
                <div
                    class="bg-slate-900 w-full text-white py-8 px-5  max-md:text-center  flex flex-col gap-5  md:gap-0 md:flex-row items-center justify-around">
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Pozisyon</span>
                        <span>Stajyer</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Lokasyon</span>
                        <span>İzmir</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Tür</span>
                        <span>Yarı Zamanlı</span>
                    </div>
                    <a href=""
                        class="max-md:w-full bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Ziyaret
                        Et</a>
                </div>
                <div
                    class="bg-slate-900 w-full text-white py-8 px-5  max-md:text-center  flex flex-col gap-5  md:gap-0 md:flex-row items-center justify-around">
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Pozisyon</span>
                        <span>Avukat</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Lokasyon</span>
                        <span>İstanbul</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Tür</span>
                        <span>Tam Zamanlı</span>
                    </div>
                    <a href=""
                        class="max-md:w-full bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Ziyaret
                        Et</a>
                </div>
                <div
                    class="bg-slate-900 w-full text-white py-8 px-5  max-md:text-center  flex flex-col gap-5  md:gap-0 md:flex-row items-center justify-around">
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Pozisyon</span>
                        <span>Avukat</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Lokasyon</span>
                        <span>İstanbul</span>
                    </div>
                    <div class="w-1/4">
                        <span class="max-md:block hidden text-gray-500">Tür</span>
                        <span>Tam Zamanlı</span>
                    </div>
                    <a href=""
                        class="max-md:w-full bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Ziyaret
                        Et</a>
                </div>
            </div>
        </div>
    </div>
@endsection
