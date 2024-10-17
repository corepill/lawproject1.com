@extends('admin.dashboard')
@section('title')
    Duyurular
@endsection
@section('css')
@endsection
@section('content')
    <div x-data="announcement()">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Duyurular</h2>
            <a href="kariyer-ilan-olustur" class="bg-orange-600 py-2 px-8 rounded">Yeni</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Başlık</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Aktif</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ziyaretçi Sayısı</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template x-for="announcement in announcements" :key="announcement.id">
                        <tr class="hover:bg-gray-50" :data-id="announcement.id">
                            <td class="p-4 text-[15px] text-gray-800" x-text="announcement.title"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)"
                                    :class="{
                                        'bg-green-500': announcement.status,
                                        'bg-red-500': !announcement.status
                                    }"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus(announcement.status, announcement.id, 'Announcement', '{{ url('admin/duyuru/changeStatus') }}')">
                                    <span x-text="announcement.status ? 'Aktif' : 'Pasif'"></span>
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800" x-text="announcement.view_count"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <span x-text="new Date(announcement.created_at).toLocaleDateString('tr-TR')"></span>
                            </td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit"
                                    :href="`{{ route('announcements.edit', '') }}/${announcement.slug}`">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete(announcement.id, '{{ url('admin/duyuru-sil') }}')">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    </template>
                </tbody>


            </table>
        </div>
    </div>
@endsection

{{-- @section('js')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script>
        function announcement() {
            return {
                announcements: @json($announcements), // Duyuruları burada tanımlayın
                changeStatus(currentStatus, dataId, type, url) {

                    currentStatus = currentStatus ? 1 : 0;
                    window.confirmStatusChange(currentStatus, dataId, type, url)
                        .then((response) => {
                            if (response === 'success') {
                                const announcementIndex = this.announcements.findIndex(announcement => announcement
                                    .id === dataId);
                                if (announcementIndex !== -1) {
                                    // Durumu tersine çevir
                                    this.announcements[announcementIndex].status = !currentStatus;
                                }
                            }
                        })
                        .catch((error) => {
                            console.log("Durum değişikliği başarısız veya iptal edildi.", error);
                        });
                },
                confirmDelete(id, url) {
                    window.confirmDelete(id, url).then((response) => {
                        if (response === "success") {
                            document.querySelector(`tr[data-id="${id}"]`).remove();
                        }
                    }).catch((error) => {
                        console.log("Silme işlemi başarısız veya iptal edildi.", error);
                    });
                }
            };
        }
    </script>
@endsection --}}
