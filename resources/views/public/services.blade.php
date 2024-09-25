@extends('layouts.public.public')
@section('title')
    Hizmetler
@endsection

@section('content')
    <x-pageHero title="Hizmetlerimiz" imagetitle="hukuk1.webp"/>
    <div class="max-w-7xl mx-auto my-20">
        @include('components.services')
    </div>
@endsection
