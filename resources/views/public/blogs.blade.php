@extends('layouts.public.public')
@section('title')
    Bloglar
@endsection
@section('content')
    <x-pageHero title="Bloglar" imagetitle="iletisim.webp" />
    <div class="max-w-7xl mx-auto mt-20">
        @include('components.blogs')
    </div>
    @endsection
