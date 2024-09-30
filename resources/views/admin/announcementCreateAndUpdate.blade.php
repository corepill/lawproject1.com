@extends('layouts.admin.admin')
@section('title')
    Duyurular {{ isset($article) ? 'Güncelle' : 'Oluştur' }}
@endsection
@section('css')
@endsection
@section('content')
    <h2 class="text-3xl mb-6">{{ isset($article) ? 'Duyuruyu Güncelle' : 'Duyuru Oluştur' }}</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 mb-5">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <x-input-field type="text" for="title" title="Başlık" :item="$article->title ?? null" />

        <textarea name="content" id="summernote">{!! isset($portfoy) ? $portfoy->content : '' !!}</textarea>
        <div class="formItem">
            <label for="status">Sayfada görünsün mü ?</label>
            <input class="formCheckbox" type="checkbox" value="1" id="status" name="status"
                {{ isset($article) && $article->status ? 'checked' : '' }}>
        </div>
        <button class="bg-orange-600 px-5 py-2 rounded">{{ isset($article) ? 'Kaydet' : 'Paylaş' }}</button>
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
