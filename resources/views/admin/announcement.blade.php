@extends('admin.dashboard')
@section('title')
    Duyurular
@endsection
@section('css')
@endsection
@section('content')
    <div x-data="announcement">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Duyurular</h2>
            <a href="duyuru-olustur" class="bg-orange-600 py-2 px-8 rounded">Yeni</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Başlık</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Aktif</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ziyaretci Sayısı</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap">
                    @foreach ($announcements as $announcement)
                        <tr class="hover:bg-gray-50" data-id="{{ $announcement->id }}">
                            <td class="p-4 text-[15px] text-gray-800">{{ $announcement->title }}</td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)"
                                    :class="{
                                        'bg-green-500': {{ $announcement->status }},
                                        'bg-red-500': !{{ $announcement->status }}
                                    }"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus({{ $announcement->id }}, {{ $announcement->status }})">
                                    {{ $announcement->status ? 'Aktif' : 'Pasif' }}
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">{{ $announcement->view_count }}</td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ \Carbon\Carbon::parse($announcement->created_at)->format('d-m-Y') }}</td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit"
                                    href="{{ route('announcements.edit', $announcement->slug) }}">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete({{ $announcement->id }}, '{{ url('admin/duyuru-sil') }}')">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/common.js') }}"></script>
@endsection
