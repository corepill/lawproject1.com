@extends('layouts.public.public')
@section('title')
    Hakkımızda
@endsection
@section('content')
    <div class="space-y-20">
        <x-pageHero title="Hakkımızda" imagetitle="hukuk1.webp" />
        <div class="md:max-w-7xl max-w-xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="text-left">
                    <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-gray-800 mb-4">Elevate Your Online
                        Presence
                    </h2>
                    <p class="mb-4 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                        aliquam, ipsum vel iaculis bibendum, justo turpis ullamcorper mauris, non aliquam nisi purus vel
                        nisl. Integer efficitur turpis in bibendum tincidunt.</p>
                    <p class="text-gray-500">Nulla facilisi. Vestibulum fringilla leo et purus consectetur, vel
                        tincidunt dolor rhoncus. In hac habitasse platea dictumst. Fusce vel sodales elit. Suspendisse
                        potenti. Sed eget consequat nisi.</p>
                    <button type="button"
                        class="mt-6 px-5 py-2.5 rounded-full text-white text-sm tracking-wider font-medium border border-current outline-none bg-blue-700 hover:bg-blue-800 active:bg-blue-700">Get
                        started</button>
                </div>
                <div class="max-h-72">
                    <img src="https://readymadeui.com/management-img.webp" alt="Placeholder Image"
                        class="rounded-lg object-contain w-full h-full" />
                </div>
            </div>
            <hr class="border-gray-300 my-12" />
            <div class="grid md:grid-cols-2 gap-12">
                <div class="max-h-72 max-md:order-1">
                    <img src="https://readymadeui.com/analtsis.webp" alt="Placeholder Image"
                        class="rounded-lg object-contain w-full h-full" />
                </div>
                <div class="text-left">
                    <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-gray-800 mb-4">Your Success, Our
                        Commitment
                    </h2>
                    <p class="mb-4 text-gray-500">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
                        aliquam, ipsum vel iaculis bibendum, justo turpis ullamcorper mauris, non aliquam nisi purus vel
                        nisl. Integer efficitur turpis in bibendum tincidunt.</p>
                    <p class=" text-gray-500">Nulla facilisi. Vestibulum fringilla leo et purus consectetur, vel
                        tincidunt dolor rhoncus. In hac habitasse platea dictumst. Fusce vel sodales elit. Suspendisse
                        potenti. Sed eget consequat nisi.</p>
                    <button type="button"
                        class="mt-6 px-5 py-2.5 rounded-full text-white text-sm tracking-wider font-medium border border-current outline-none bg-blue-700 hover:bg-blue-800 active:bg-blue-700">Get
                        started</button>
                </div>
            </div>
        </div>
        @include('components.videoInfo')
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-x-6 gap-y-12 divide-x divide-gray-300">
                <div class="text-center">
                    <i class="fa-solid fa-people-group text-slate-800  text-4xl inline-block"></i>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-5">400+</h3>
                    <p class="text-base text-gray-800 font-semibold mt-3">Müvekkil</p>
                </div>
                <div class="text-center">
                    <i class="fa-solid fa-ranking-star text-slate-800  text-4xl inline-block"></i>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-5">90%</h3>
                    <p class="text-base text-gray-800 font-semibold mt-3">Başarı Oranı</p>
                </div>
                <div class="text-center">
                    <i class="fa-solid fa-thumbs-up text-slate-800  text-4xl inline-block"></i>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-5">500+</h3>
                    <p class="text-base text-gray-800 font-semibold mt-3">Başarılı Dava</p>
                </div>
                <div class="text-center">
                    <i class="fa-solid fa-clock text-slate-800  text-4xl inline-block"></i>
                    <h3 class="text-3xl font-extrabold text-blue-600 mt-5">24</h3>
                    <p class="text-base text-gray-800 font-semibold mt-3">Geçmeden İşleme Başlama</p>
                </div>
            </div>
        </div>
        @include('components.staps')
    </div>
@endsection
