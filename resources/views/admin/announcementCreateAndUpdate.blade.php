@extends('layouts.admin.admin')
@section('title')
    Duyurular {{ isset($announcement) ? 'Güncelle' : 'Oluştur' }}
@endsection
@section('css')
@endsection
@section('content')
    <h2 class="text-3xl mb-6">{{ isset($announcement) ? 'Duyuruyu Güncelle' : 'Duyuru Oluştur' }}</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 mb-5">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" enctype="multipart/form-data" class="space-y-5"
        action="{{ isset($announcement) ? route('announcements.edit', $announcement->slug) : route('announcements.create') }}">
        @csrf
        <x-input-field type="text" for="title" title="Başlık" :item="$announcement->title ?? null" />

        <textarea name="content" id="summernote">{!! isset($announcement) ? $announcement->content : '' !!}</textarea>
        <div class="formItem">
            <label for="status">Sayfada görünsün mü ?</label>
            <input class="formCheckbox" type="checkbox" value="1" id="status" name="status"
                {{ isset($announcement) && $announcement->status ? 'checked' : '' }}>
        </div>
        <button class="bg-orange-600 px-5 py-2 rounded">{{ isset($announcement) ? 'Kaydet' : 'Paylaş' }}</button>
    </form>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']]
                ]
            });
        });
    </script>
@endsection

