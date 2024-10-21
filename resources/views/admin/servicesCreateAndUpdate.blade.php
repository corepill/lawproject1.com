@extends('layouts.admin.admin')
@section('title')
    Hizmet {{ isset($service) ? 'Güncelle' : 'Oluştur' }}
@endsection
@section('css')
@endsection
@section('content')
    <h2 class="text-3xl mb-6">{{ isset($service) ? 'Hizmet Güncelle' : 'Hizmet Oluştur' }}</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 mb-5">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" enctype="multipart/form-data" class="space-y-5"
        action="{{ isset($service) ? route('services.edit', $service->slug) : route('services.create') }}">
        @csrf

        <x-input-field type="text" for="title" title="Başlık" :item="$service->title ?? null" />
        <textarea name="content" id="summernote">{!! isset($service) ? $service->content : '' !!}</textarea>
        <div class="flex flex-col gap-2">
            <label for="image_path">Görsel <span class="labelLitDesc">maksimum 2mb olmalıdır.</span></label>
            <input type="file" id="image_path" name="image_path" accept="image/png, image/jpeg, image/jpg, image/webp">
            @if (isset($service) && $service->image_path)
                <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}" class="w-32 h-32 object-cover">
            @endif
        </div>
        <div class="formItem">
            <label for="status">Sayfada görünsün mü ?</label>
            <input class="formCheckbox" type="checkbox" value="1" id="status" name="status"
                {{ isset($service) && $service->status ? 'checked' : '' }}>
        </div>
        <button class="bg-orange-600 px-5 py-2 rounded">{{ isset($service) ? 'Kaydet' : 'Paylaş' }}</button>
    </form>

@endsection

@section('js')
    <script>
        let imagesToDelete = [];

        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    },
                    onMediaDelete: function(target) {
                        // Silinecek görselleri diziye ekliyoruz
                        imagesToDelete.push(target[0].src);
                    }
                }
            });

            $('form').on('submit', function(event) {
                event.preventDefault();
                let form = $(this);

                // Eğer silinecek resim varsa
                if (imagesToDelete.length > 0) {
                    $.ajax({

                        method: 'POST',
                        data: {
                            images: imagesToDelete,
                        },
                        success: function(response) {
                            // Eğer silme başarılıysa formu gönderiyoruz
                            form.off('submit').submit();
                        },
                        error: function(error) {
                            alert('Bir hata oluştu, lütfen tekrar deneyin.');
                        }
                    });
                } else {
                    // Eğer silinecek resim yoksa formu direkt gönder
                    form.off('submit').submit();
                }
            });

            function uploadImage(file) {
                let formData = new FormData();
                formData.append('file', file);

                $.ajax({
                    url: '/admin/upload-image',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Görseli summernote'a ekliyoruz
                        $('#summernote').summernote('insertImage', response.path);
                    },
                    error: function(error) {
                        console.log(error.responseText);
                    }
                });
            }
        });
    </script>
@endsection
