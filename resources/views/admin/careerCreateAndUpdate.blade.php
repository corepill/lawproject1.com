@extends('layouts.admin.admin')
@section('title')
    Kariyer İlanı {{ isset($announcement) ? 'Güncelle' : 'Oluştur' }}
@endsection
@section('css')
@endsection
@section('content')
    <h2 class="text-3xl mb-6">{{ isset($announcement) ? 'Kariyer İlanı Güncelle' : 'Kariyer İlanı Oluştur' }}</h2>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-red-500 mb-5">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST" enctype="multipart/form-data" class="space-y-5"
        action="{{ isset($announcement) ? route('announcements.edit', $announcement->slug) : route('announcements.create') }}">
        @csrf

        <select name="category_id" id="role_id" class="border border-orange-600 rounded-md px-1 py-2 w-full">
            <option value="{{ null }}">Pozisyon Seçiniz</option>
            @foreach ($roles as $item)
                <option value="{{ $item->id }}"
                    {{ isset($announcement) && $announcement->category_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>

        <x-input-field type="text" for="location" title="Lokasyon" :item="$announcement->location ?? null" />

        <select name="work_type" id="work_type" class="border border-orange-600 rounded-md px-1 py-2 w-full">
            <option value="{{ null }}">Çalışma Türü</option>
            <option value="Tam Zamanlı">Tam Zamanlı</option>
            <option value="Yarı Zamanlı">Yarı Zamanlı</option>
            <option value="Proje Bazlı">Proje Bazlı</option>
        </select>

        <div x-data="{
            startTime: null,
            endTime: null,
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
            }
        }" x-init="generateTimes()" class="flex space-x-5">
            <div class="w-1/2">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Başlangıç Saati</label>
                <select name="start_time" id="start_time" x-model="startTime"
                    class="border border-orange-600 rounded-md px-1 py-2 w-full">
                    <template x-for="(time, index) in availableTimes" :key="index">
                        <option :value="time" x-text="time"></option>
                    </template>
                </select>
            </div>
            <div class="w-1/2">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Bitiş Saati</label>
                <select name="end_time" id="end_time" x-model="endTime"
                    class="border border-orange-600 rounded-md px-1 py-2 w-full">
                    <template x-for="(time, index) in availableTimes" :key="index">
                        <option :value="time" x-text="time" :disabled="startTime && time <= startTime"></option>
                    </template>
                </select>
            </div>
        </div>

        <textarea name="content" id="summernote">{!! isset($announcement) ? $announcement->content : '' !!}</textarea>

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
