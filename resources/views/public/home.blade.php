@extends('layouts.public.public')
@section('title')
    Lorem Anasayfa
@endsection
@section('content')
    <div class="custom-space">
        <div class="relative min-h-[100vh] bg-no-repeat bg-cover pt-44 flex flex-col justify-center items-center overflow-hidden"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.767), rgba(0, 0, 0, 0.507)), url('{{ asset('assets/images/hukuk1.webp') }}'); background-position: center;">
            <div class="max-w-7xl justify-center items-center md:items-start text-white flex flex-col gap-20 px-4 lg:px-0">
                <div class="flex flex-col gap-8 text-center md:text-left w-11/12 md:w-4/5 mb-0 md:mb-16">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-medium leading-snug">Yaklaşımımızı bireysel
                        ihtiyaçları karşılayacak şekilde uyarlarız</h1>
                    <p class="text-sm sm:text-base md:text-lg">Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz ilgiyi
                        ve
                        temsili almanızı sağlayarak size özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok
                        çeşitli
                        yasal konuları etkin bir şekilde ele almamızı sağlar.</p>
                    <div class="flex gap-5 md:justify-start w-full justify-center">
                        <a href=""
                            class="bg-slate-300 hover:bg-slate-800 hover:text-white duration-300 text-black py-2 px-7 rounded-3xl">İletişim</a>
                        <a href=""
                            class="bg-transparent border border-slate-300 hover:bg-slate-300 hover:text-black duration-300 py-2 px-7 rounded-3xl">Daha
                            Fazla</a>
                    </div>
                </div>
                <div class="w-full mb-5">
                    <div class="bg-slate-800 mx-auto p-6 md:p-8 flex flex-wrap justify-around">
                        <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                            <span class="text-4xl md:text-5xl font-semibold">15+</span>
                            <span class="text-gray-300 text-sm md:text-base">Yıllık Tecrübe</span>
                        </div>
                        <div class="flex flex-col gap-2 items-center justify-center w-1/2 md:w-auto">
                            <span class="text-4xl md:text-5xl font-semibold">1000+</span>
                            <span class="text-gray-300 text-sm md:text-base">Mutlu Müvekkil</span>
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
        <div class="grid md:grid-cols-2 items-center md:gap-8 gap-6 max-w-7xl mx-auto px-4">
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
        <div class="bg-[#DDEBF9]">
            <div class="max-w-7xl mx-auto py-20 px-4 lg:px-0">
                <x-title heading="Sıkca Sorulan Sorular"
                    subtext="Her vakanın benzersiz olduğunu anlayarak müşterilerimizin ihtiyaçlarına öncelik veriyoruz." />
                <div x-data="{
                    selected: null,
                    items: [
                        { id: 1, title: 'Accordion Item 1', content: 'Content for accordion item 1 goes here. You can add any HTML content.' },
                        { id: 2, title: 'Accordion Item 2', content: 'Content for accordion item 2 goes here. You can add any HTML content.' },
                        { id: 3, title: 'Accordion Item 3', content: 'Content for accordion item 3 goes here. You can add any HTML content.' },
                    ]
                }">
                    <ul class="shadow-box list-none">
                        <template x-for="item in items" :key="item.id">
                            <li class="relative border-b border-gray-800">
                                <button type="button" class="w-full py-6 text-left flex items-center justify-between"
                                    @click="selected !== item.id ? selected = item.id : selected = null">
                                    <div class="flex items-center justify-between">
                                        <span class="text-lg font-medium text-gray-900" x-text="item.title"></span>
                                    </div>

                                    <!-- Artı/Eksi Animasyonu -->
                                    <label>
                                        <div
                                            class="w-6 h-6 cursor-pointer flex flex-col items-center justify-center relative">
                                            <!-- Gizli Checkbox -->
                                            <input class="hidden peer" type="checkbox" :checked="selected === item.id" />

                                            <!-- Yatay Çizgi (Eksi işareti) -->
                                            <div
                                                class="w-full h-[2px] bg-black rounded-sm transition-all duration-300 origin-center">
                                            </div>

                                            <!-- Dikey Çizgi (Artıdan Eksiye Dönen Kısım) -->
                                            <div
                                                class="absolute w-full h-[2px] bg-black rounded-sm transition-all duration-300 origin-center rotate-90 peer-checked:rotate-0">
                                            </div>
                                        </div>
                                    </label>
                                </button>

                                <div class="relative overflow-hidden transition-all max-h-0 duration-700" x-ref="container"
                                    x-bind:style="selected === item.id ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''">
                                    <div class="pb-6 px-6">
                                        <p class="text-gray-700" x-text="item.content"></p>
                                    </div>
                                </div>
                            </li>
                        </template>
                    </ul>







                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto">
            <x-title heading="Hizmetlerimiz" subtext="Davalarınız için iletişime geçinmekten çekinmeyin." />
            @include('components.services')
        </div>

        @include('components.staps')
        @include('components.videoInfo')
        <div class="max-w-7xl mx-auto">
            <x-title heading="Ekibimizle Tanışın"
                subtext="Her vakanın benzersiz olduğunu anlayarak müşterilerimizin ihtiyaçlarına öncelik
        veriyoruz. Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz ilgiyi ve temsili almanızı sağlayarak size
        özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok çeşitli yasal konuları etkin bir şekilde ele
        almamızı sağlar." />
            @include('components.teamPeople')
        </div>
        <div class="max-w-7xl px-4 md:px-0 mx-auto">
            <x-title heading="Blog Yazılarımız"
                subtext="Her vakanın benzersiz olduğunu anlayarak müşterilerimizin ihtiyaçlarına öncelik veriyoruz." />
            @include('components.blogs')
        </div>
        @include('components.contact')
    </div>
@endsection
