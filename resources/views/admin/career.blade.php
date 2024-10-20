@extends('admin.dashboard')
@section('title')
    Kariyer İlan
@endsection
@section('css')
@endsection
@section('content')
    <div x-data="career()">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Kariyer İlan</h2>
            <a href="kariyer-ilan-olustur" class="bg-orange-600 py-2 px-8 rounded">Yeni</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Başlık</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Lokasyon</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Tür</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Aktif</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template x-for="career in careers" :key="career.id">
                        <tr class="hover:bg-gray-50" :data-id="career.id">
                            <td class="p-4 text-[15px] text-gray-800" x-text="career.role.name"></td>
                            <td class="p-4 text-[15px] text-gray-800" x-text="career.location"></td>
                            <td class="p-4 text-[15px] text-gray-800" x-text="career.type"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)"
                                    :class="{
                                        'bg-green-500': career.status,
                                        'bg-red-500': !career.status
                                    }"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus(career.status, career.id, 'career', '{{ url('admin/changeStatus') }}')">
                                    <span x-text="career.status ? 'Aktif' : 'Pasif'"></span>
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <span x-text="new Date(career.created_at).toLocaleDateString('tr-TR')"></span>
                            </td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit" :href="`{{ route('careers.edit', '') }}/${career.slug}`">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete(career.id, '{{ url('admin/kariyer-sil') }}')">
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

@section('js')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script>
        function career() {
            return {
                careers: @json($careers), // Duyuruları burada tanımlayın
                changeStatus(currentStatus, dataId, type, url) {

                    currentStatus = currentStatus ? 1 : 0;
                    window.confirmStatusChange(currentStatus, dataId, type, url)
                        .then((response) => {
                            if (response === 'success') {
                                const careerIndex = this.careers.findIndex(career => career
                                    .id === dataId);
                                if (careerIndex !== -1) {
                                    // Durumu tersine çevir
                                    this.careers[careerIndex].status = !currentStatus;
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
@endsection
