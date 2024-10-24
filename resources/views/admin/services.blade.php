@extends('admin.dashboard')
@section('title')
    Hizmetler
@endsection
@section('css')
@endsection
@section('content')
    <div x-data="service()">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Hizmetler</h2>
            <a href="hizmet-olustur" class="bg-orange-600 py-2 px-8 rounded">Yeni</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Başlık</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Görsel</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ziyaretci</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Durumu</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template x-for="service in services" :key="service.id">
                        <tr class="hover:bg-gray-50" :data-id="service.id">
                            <td class="p-4 text-[15px] text-gray-800" x-text="service.title"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <img :src="`${window.location.origin}/${service.image_path}`" alt="Service Image"
                                    class="w-16 h-16 object-cover">
                            </td>
                            <td class="p-4 text-[15px] text-gray-800" x-text="service.view_count"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)"
                                    :class="{
                                        'bg-green-500': service.status,
                                        'bg-red-500': !service.status
                                    }"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus(service.status, service.id, 'service', '{{ url('admin/changeStatus') }}')">
                                    <span x-text="service.status ? 'Aktif' : 'Pasif'"></span>
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <span x-text="new Date(service.created_at).toLocaleDateString('tr-TR')"></span>
                            </td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit" :href="`{{ route('services.edit', '') }}/${service.slug}`">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete(service.id, '{{ url('admin/hizmet-sil') }}')">
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
        function service() {
            return {
                services: @json($services), // Duyuruları burada tanımlayın
                changeStatus(currentStatus, dataId, type, url) {

                    currentStatus = currentStatus ? 1 : 0;
                    window.confirmStatusChange(currentStatus, dataId, type, url)
                        .then((response) => {
                            if (response === 'success') {
                                const serviceIndex = this.services.findIndex(service => service
                                    .id === dataId);
                                if (serviceIndex !== -1) {
                                    // Durumu tersine çevir
                                    this.services[serviceIndex].status = !currentStatus;
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
