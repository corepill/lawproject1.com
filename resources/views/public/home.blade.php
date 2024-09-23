@extends('layouts.public.public')
@section('title')
    Lorem Anasayfa
@endsection
@section('content')
    <div class="relative min-h-[100vh] bg-no-repeat bg-cover pt-44 flex flex-col justify-center items-center overflow-hidden"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.767), rgba(0, 0, 0, 0.507)), url('{{ asset('assets/images/hukuk1.webp') }}'); background-position: center;">
        <div class="max-w-7xl justify-center items-center md:items-start text-white flex flex-col gap-20 px-4 lg:px-0">
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
            <div class="w-full mb-5">
                <div class="bg-slate-800 mx-auto p-6 md:p-8 flex flex-wrap justify-around">
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
    <div
        class="grid md:grid-cols-2 items-center md:gap-8 gap-6 font-[sans-serif] max-w-7xl max-md:max-w-md mx-auto py-24 px-4">
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
                                    <div class="w-6 h-6 cursor-pointer flex flex-col items-center justify-center relative">
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
    <div class="max-w-7xl mx-auto my-20">
        <x-title heading="Hizmetlerimiz" subtext="Davalarınız için iletişime geçinmekten çekinmeyin." />
        @include('components.services')
    </div>
    <div class="font-sans  py-12">
        <div class="max-w-7xl max-md:max-w-md mx-auto">
            <div class="grid md:grid-cols-2 items-center justify-between gap-8">
                <div>
                    <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-gray-800 mb-4">Haklarınız önemlidir,
                        onları savunmak için buradayız</h2>
                    <p class="mt-4 text-base text-gray-600 leading-relaxed">Her vakanın benzersiz olduğunu anlayarak
                        müşterilerimizin ihtiyaçlarına öncelik veriyoruz. Deneyimli avukatlardan oluşan ekibimiz, hak
                        ettiğiniz
                        ilgiyi ve temsili almanızı sağlayarak size özel çözümler sunmayı taahhüt eder. Kapsamlı
                        uzmanlığımız, çok
                        çeşitli yasal konuları etkin bir şekilde ele almamızı sağlar.</p>
                    <div class="mt-8">
                        <a href=""
                            class="border border-slate-800 bg-slate-800 text-white hover:bg-white hover:text-black duration-300 py-2 px-7 rounded-3xl inline-block">Ücretsiz
                            Ön Danışmanlık</a>
                    </div>
                </div>

                <div class="space-y-4 max-md:max-w-md">
                    <div class="flex max-sm:flex-col sm:gap-6 gap-2 bg-slate-300 p-4 rounded">
                        <div
                            class="shrink-0 w-12 h-12 rounded-full max-sm:mb-2 shadow-[7px_-3px_0px_rgba(253,224,71,1)] flex items-center justify-center">
                            <span class="font-semibold text-xl text-slate-800">01</span>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-medium text-2xl">Özel temsil</h4>
                            <p class="text-gray-600 text-sm mt-1">Kapsamlı uzmanlığımız, çok çeşitli yasal konuları etkin
                                bir şekilde ele almamızı sağlar.</p>
                        </div>
                    </div>
                    <div class="flex max-sm:flex-col sm:gap-6 gap-2 bg-slate-800 p-4 rounded ">
                        <div
                            class="shrink-0 w-12 h-12 rounded-full max-sm:mb-2 shadow-[7px_-3px_0px_rgba(253,224,71,1)] flex items-center justify-center">
                            <span class="font-semibold text-xl text-white">02</span>
                        </div>
                        <div>
                            <h4 class="text-white font-medium text-2xl">Özel temsil</h4>
                            <p class="text-gray-300 text-sm mt-1">Kapsamlı uzmanlığımız, çok çeşitli yasal konuları etkin
                                bir şekilde ele almamızı sağlar.</p>
                        </div>
                    </div>
                    <div class="flex max-sm:flex-col sm:gap-6 gap-2 bg-slate-300 p-4 rounded">
                        <div
                            class="shrink-0 w-12 h-12 rounded-full max-sm:mb-2 shadow-[7px_-3px_0px_rgba(253,224,71,1)] flex items-center justify-center">
                            <span class="font-semibold text-xl text-slate-800">03</span>
                        </div>
                        <div>
                            <h4 class="text-gray-800 font-medium text-2xl">Özel temsil</h4>
                            <p class="text-gray-600 text-sm mt-1">Kapsamlı uzmanlığımız, çok çeşitli yasal konuları etkin
                                bir şekilde ele almamızı sağlar.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ open: false }"
        class="h-[40rem] relative font-sans before:absolute before:w-full before:h-full before:inset-0 before:bg-black before:opacity-50 before:z-10">
        <img src="https://images.pexels.com/photos/4049960/pexels-photo-4049960.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="Banner Image" class="absolute inset-0 w-full h-full object-cover" />

        <div
            class="min-h-[20rem] relative z-50 h-full max-w-7xl mx-auto flex flex-col justify-end items-center md:text-left text-center text-white p-6">
            <div class="w-full flex flex-col md:flex-row justify-between mb-12">
                <div class="w-full md:w-3/5">
                    <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-white mb-4">Güven, herhangi bir
                        avukat-müvekkil ilişkisinin temelidir</h2>
                    <p class="mt-4 text-base text-gray-300 leading-relaxed">En yüksek dürüstlük ve şeffaflık standartlarını
                        koruyoruz. Müvekkillerimizi yasal süreç boyunca bilgilendirir ve bilinçli kararlar vermeleri için
                        onlara bilgi veririz.</p>
                </div>
                <div class="w-full md:w-2/5 flex items-center justify-end mt-4 md:mt-0">
                    <button
                        class="bg-transparent text-white text-base py-3 px-6 border border-white rounded-lg hover:bg-white hover:text-black transition duration-300"
                        @click="open = true; $nextTick(() => document.getElementById('videoFrame').src = 'https://www.youtube.com/embed/hWMRd2mslCo')">
                        <i class="fa-solid fa-play"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-[20000] bg-black bg-opacity-80"
            @click="open = false; $nextTick(() => document.getElementById('videoFrame').src = '')">
            <button @click="open = false; $nextTick(() => document.getElementById('videoFrame').src = '')"
                class="absolute top-4 right-4 text-white text-5xl">&times;</button>
            <div class="relative w-full max-w-3xl" @click.stop>
                <iframe id="videoFrame" class="w-full h-80" src="" title="YouTube Video" frameborder="0"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
    <div x-data="{
        teamMembers: [
            { id: 1, name: 'John Doe', role: 'Software Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 2, name: 'Jane Smith', role: 'Product Manager', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 3, name: 'Alice Johnson', role: 'UI/UX Designer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 4, name: 'Bob Brown', role: 'DevOps Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 5, name: 'Charlie Davis', role: 'Data Scientist', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 6, name: 'Eva White', role: 'Marketing Specialist', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 7, name: 'Frank Black', role: 'QA Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
            { id: 8, name: 'Grace Green', role: 'Business Analyst', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        ]
    }" class="font-[sans-serif]">
        <div class="max-w-7xl mx-auto">
            <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-gray-800 mb-4">Ekibimizle Tanışın</h2>
            <p class="text-gray-600 mt-6">Her vakanın benzersiz olduğunu anlayarak müşterilerimizin ihtiyaçlarına öncelik
                veriyoruz. Deneyimli avukatlardan oluşan ekibimiz, hak ettiğiniz ilgiyi ve temsili almanızı sağlayarak size
                özel çözümler sunmayı taahhüt eder. Kapsamlı uzmanlığımız, çok çeşitli yasal konuları etkin bir şekilde ele
                almamızı sağlar.</p>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-8 text-center mt-16 max-w-7xl mx-auto">
            <template x-for="member in teamMembers" :key="member.id">
                <div>
                    <img :src="member.image" class="w-32 h-32 rounded-full inline-block object-cover object-top"
                        alt="" />
                    <div class="py-4">
                        <h4 class="text-gray-800 text-base font-bold" x-text="member.name"></h4>
                        <p class="text-gray-800 text-xs mt-1" x-text="member.role"></p>
                        <div class="space-x-4 mt-4">
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-instagram"></i>
                            </button>
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-linkedin"></i>
                            </button>
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-x-twitter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    @include('components.contact')
@endsection
