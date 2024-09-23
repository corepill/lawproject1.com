@extends('layouts.public.public')
@section('title')
    Hizmetler
@endsection

@section('content')
    <div class="w-full max-h-[20rem] min-h-[24rem]  bg-red-600 flex items-center justify-center bg-no-repeat bg-cover"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.767), rgba(0, 0, 0, 0.507)), url('{{ asset('assets/images/hukuk1.webp') }}'); background-position: center;">
        <h2 class="md:text-5xl text-4xl md:leading-10 font-medium text-white text-center">Hizmetlerimiz</h2>
    </div>
    <div class="max-w-7xl mx-auto my-20">
        @include('components.services')
    </div>
@endsection
