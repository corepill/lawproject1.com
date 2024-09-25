@extends('layouts.public.public')
@section('title')
    İletişim
@endsection
@section('content')
    <x-pageHero title="İletişim" imagetitle="iletisim.webp" />
    <div class="mt-20">
        @include('components.contact')
    </div>
    @endsection
