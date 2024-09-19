@extends('layouts.public.public')
@section('title')
    Lorem Anasayfa
@endsection
@section('content')
    <div class="relative min-h-[100vh] bg-no-repeat bg-cover pt-44 flex flex-col justify-center items-center overflow-hidden"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.767), rgba(0, 0, 0, 0.507)), url('{{ asset('assets/images/hukuk1.webp') }}'); background-position: center;">
        <div class="max-w-7xl justify-center items-center md:items-start text-white flex flex-col gap-20 px-4 md:px-0">
            <div class="flex flex-col gap-8 text-center md:text-left w-11/12 md:w-4/5 mb-0 md:mb-16">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-medium leading-snug">Yaklaşımımızı bireysel
                    ihtiyaçları karşılayacak şekilde uyarlarız</h1>
                <p class="text-sm sm:text-base md:text-lg">Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz ilgiyi ve
                    temsili almanızı sağlayarak size özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok çeşitli
                    yasal konuları etkin bir şekilde ele almamızı sağlar.</p>
                <div class="flex gap-5 md:justify-start w-full justify-center">
                    <a href=""
                        class="bg-slate-300 hover:bg-slate-800 hover:text-white duration-300 text-black py-2 px-7 rounded-3xl">İletişim</a>
                    <a href=""
                        class="bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Daha
                        Fazla</a>
                </div>
            </div>
            <div class="w-full">
                <div class="bg-slate-800 w-full max-w-7xl mx-auto p-6 md:p-8 flex flex-wrap justify-around">
                    <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                        <span class="text-4xl md:text-5xl font-semibold">15+</span>
                        <span class="text-gray-300 text-sm md:text-base">Yıllık Tecrübe</span>
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                        <span class="text-4xl md:text-5xl font-semibold">84k</span>
                        <span class="text-gray-300 text-sm md:text-base">Mutlu Müşteri</span>
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                        <span class="text-4xl md:text-5xl font-semibold">98%</span>
                        <span class="text-gray-300 text-sm md:text-base">Başarı Oranı</span>
                    </div>
                    <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                        <span class="text-4xl md:text-5xl font-semibold">28</span>
                        <span class="text-gray-300 text-sm md:text-base">Ödül</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid md:grid-cols-2 items-center md:gap-8 gap-6 font-[sans-serif] max-w-7xl max-md:max-w-md mx-auto py-24 px-4">
        <div class="max-md:order-1 max-md:text-center">
            <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-gray-800 mb-4">En yüksek dürüstlük standartlarını
                koruyoruz.</h2>
            <p class="mt-4 text-base text-gray-600 leading-relaxed">Her vakanın benzersiz olduğunu anlayarak
                müşterilerimizin ihtiyaçlarına öncelik veriyoruz. Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz
                ilgiyi ve temsili almanızı sağlayarak size özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok
                çeşitli yasal konuları etkin bir şekilde ele almamızı sağlar.</p>
            <div class="mt-8 flex items-center gap-4 justify-center md:justify-start">
                <a href=""
                    class="bg-transparent block border border-slate-800 bg-slate-800 text-white hover:bg-white hover:text-black duration-300 py-2 px-7 rounded-3xl">Daha
                    Fazla</a>
                    <a href=""
                    class="bg-transparent block border border-slate-800 hover:bg-slate-800 hover:text-white bg-white text-black duration-300 py-2 px-7 rounded-3xl">İletişime Geç</a>
            </div>
        </div>
        <div class="md:h-[450px]">
            <img src="https://images.pexels.com/photos/5673485/pexels-photo-5673485.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="w-full h-full object-cover rounded-lg shadow-xl"
                alt="Dining Experience" />
        </div>
    </div>
@endsection
