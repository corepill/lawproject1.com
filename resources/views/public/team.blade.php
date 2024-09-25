@extends('layouts.public.public')
@section('title')
    Ekibimiz
@endsection
@section('content')
    <x-pageHero title="Ekibimiz" imagetitle="iletisim.webp" />
    <div class="mt-20 max-w-7xl mx-auto">
        @include('components.teamPeople')
    </div>
    @endsection
