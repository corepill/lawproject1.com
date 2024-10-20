@extends('layouts.admin.admin')
@section('title')
    Kariyer İlanı {{ isset($career) ? 'Güncelle' : 'Oluştur' }}
@endsection
@section('css')
@endsection
@section('content')
    <h2 class="text-3xl mb-6">{{ isset($career) ? 'Kariyer İlanı Güncelle' : 'Kariyer İlanı Oluştur' }}</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 mb-5">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" enctype="multipart/form-data" class="space-y-5"
        action="{{ isset($career) ? route('careers.edit', $career->slug) : route('careers.create') }}">
        @csrf

        <select name="role_id" id="role_id" class="border border-orange-600 rounded-md px-1 py-2 w-full">
            <option value="{{ null }}">Pozisyon Seçiniz</option>
            @foreach ($roles as $item)
                <option value="{{ $item->id }}" {{ isset($career) && $career->role_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <x-input-field type="text" for="location" title="Lokasyon" :item="$career->location ?? null" />

        <select name="type" id="type" class="border border-orange-600 rounded-md px-1 py-2 w-full">
            <option value="{{ null }}">Çalışma Türü</option>
            <option value="Tam Zamanlı" {{ isset($career) && $career->type == 'Tam Zamanlı' ? 'selected' : '' }}>Tam Zamanlı
            </option>
            <option value="Yarı Zamanlı" {{ isset($career) && $career->type == 'Yarı Zamanlı' ? 'selected' : '' }}>Yarı
                Zamanlı</option>
            <option value="Proje Bazlı" {{ isset($career) && $career->type == 'Proje Bazlı' ? 'selected' : '' }}>Proje
                Bazlı</option>
        </select>

        <div x-data="{
            startTime: '{{ isset($career) ? $career->start_time : '09:00' }}',
            endTime: '{{ isset($career) ? $career->end_time : '09:30' }}',
            availableTimes: [],
            generateTimes() {
                let start = 9 * 60; // 9:00
                let end = 18 * 60; // 18:00
                for (let minutes = start; minutes <= end; minutes += 30) {
                    this.availableTimes.push(this.formatTime(minutes));
                }
            },
            formatTime(minutes) {
                let hours = String(Math.floor(minutes / 60)).padStart(2, '0');
                let mins = String(minutes % 60).padStart(2, '0');
                return `${hours}:${mins}`;
            },
        }" x-init="generateTimes();" class="flex space-x-5">
            <div class="w-1/2">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Başlangıç Saati</label>
                <select name="start_time" id="start_time" x-model="startTime"
                    class="border border-orange-600 rounded-md px-1 py-2 w-full">
                    <template x-for="(time, index) in availableTimes" :key="index">
                        <option :value="time" x-text="time" :selected="time === startTime"></option>
                    </template>
                </select>
            </div>
            <div class="w-1/2">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Bitiş Saati</label>
                <select name="end_time" id="end_time" x-model="endTime"
                    class="border border-orange-600 rounded-md px-1 py-2 w-full">
                    <template x-for="(time, index) in availableTimes" :key="index">
                        <option :value="time" x-text="time" :disabled="startTime && time <= startTime"
                            :selected="time === endTime"></option>
                    </template>
                </select>
            </div>
        </div>


        <textarea name="content" id="summernote">{!! isset($career) ? $career->content : '' !!}</textarea>
        <div class="formItem">
            <label for="status">Sayfada görünsün mü ?</label>
            <input class="formCheckbox" type="checkbox" value="1" id="status" name="status"
                {{ isset($career) && $career->status ? 'checked' : '' }}>
        </div>
        <button class="bg-orange-600 px-5 py-2 rounded">{{ isset($career) ? 'Kaydet' : 'Paylaş' }}</button>
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
