@extends('layouts.admin.admin')

@section('title')
    Admin Kategoriler
@endsection

@section('css')
@endsection

@section('content')
    <div x-data="modal">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Kategoriler</h2>
            <div>
                <button class="bg-orange-600 py-2 px-8 rounded" @click="openCategoryModal()">Yeni Üye</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Başlık</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Durum</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    <template x-for="category in categories" :key="category.id">
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-[15px] text-gray-800" x-text="category.title"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)" :class="category.status == 1 ? 'bg-green-500' : 'bg-red-500'"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus(category.status, category.id, 'Category' ,'{{ url('admin/changeStatus') }}')">
                                    <span x-text="category.status == 1 ? 'Aktif' : 'Pasif'"></span>
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800"
                                x-text="new Date(category.created_at).toLocaleDateString('tr-TR', { day: '2-digit', month: '2-digit', year: 'numeric' })">
                            </td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit" href="javascript:void(0)"
                                    @click="openEditCategoryModal(category)">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete(category.id, '{{ url('admin/kategori-sil') }}')">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Modal for adding member -->
            <div x-show="openCategory" x-transition class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-40">
                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg min-w-[80%] md:min-w-[40%]">
                        <h2 class="text-xl mb-4"
                            x-text="isEditMode ? 'Kategori Bilgilerini Güncelle' : 'Yeni Kategori Ekle'"></h2>
                        <form id="categoryForm" @submit.prevent="submitCategoryForm" action="" method="POST"
                            class="space-y-5">
                            @csrf
                            <div class="w-full">
                                <label for="title" class="block text-sm font-medium text-gray-700">Başlık
                                </label>
                                <input type="text" id="title" name="title"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                    required>
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Durum</label>
                                <select id="status" name="status"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                            <div class="mt-6 flex justify-end text-white">
                                <button type="button" @click="closeCategoryModal()"
                                    class="bg-orange-600  py-2 px-4 rounded mr-2">İptal</button>
                                <button type="submit" x-text="isEditMode ? 'Güncelle' : 'Kaydet'"
                                    class="bg-orange-600  py-2 px-4 rounded"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/js/common.js') }}"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('modal', () => ({
                categories: @json($categories),
                openCategory: false,
                isEditMode: false, 

                openEditCategoryModal(category) {
                    if (!category) return; // Boş category objesi varsa işlemi durdur

                    this.openCategory = true;
                    this.openRole = false;
                    this.isEditMode = true; // Güncelleme moduna geçiyoruz

                    document.getElementById('title').value = category.title;
                    document.getElementById('status').value = category.status;

                    // Güncelleme URL'si
                    document.getElementById('categoryForm').action =
                        `/admin/kategori-guncelle/${category.id}`;
                },
                openCategoryModal() {
                    this.openRole = false;
                    this.openCategory = true;
                    this.isEditMode = false; // Yeni bir üye eklerken
                    document.getElementById('categoryForm').reset();
                    // Yeni ekleme için formun action URL'si
                    document.getElementById('categoryForm').action = '{{ route('category.create') }}';
                },
                closeCategoryModal() {
                    this.openCategory = false;
                    this.isEditMode = false;
                    document.getElementById('categoryForm').reset();
                },
                changeStatus(currentStatus, dataId, type, url) {
                    let newStatus = currentStatus == 1 ? 0 : 1;
                    window.confirmStatusChange(newStatus, dataId, type, url)
                        .then((response) => {
                            if (response === 'success') {
                                const categoryIndex = this.categories.findIndex(category => category
                                    .id ===
                                    dataId);
                                if (categoryIndex !== -1) {
                                    this.categories[categoryIndex].status =
                                        newStatus;
                                }
                            }
                        })
                        .catch((error) => {
                            console.log("Durum değişikliği başarısız veya iptal edildi.", error);
                        });
                },
                async submitCategoryForm() {
                    try {
                        const form = document.getElementById('categoryForm');
                        const formData = new FormData(form);
                        const isUpdate = form.action.includes('kategori-guncelle');

                        const response = await fetch(form.action, {
                            method: "POST",
                            body: formData,
                        });

                        const result = await response.json();
                        console.log(result); // Gelen yanıtı kontrol et

                        if (result.status === 'success') {
                            if (isUpdate) {
                                const updatedCategory = result.category;
                                const categoryIndex = this.categories.findIndex(category => category
                                    .id ===
                                    updatedCategory.id);

                                if (categoryIndex !== -1) {
                                    this.categories[categoryIndex] = {
                                        ...updatedCategory
                                    }; // Mevcut takım objesini güncellenmiş takım ile değiştir
                                } else {
                                    console.error('Güncelleme için takım bulunamadı!');
                                }
                            } else {
                                console.log(result.category);
                                // Yeni takım ekleme işleminde takımı ekle
                                this.categories = [...this.categories, result
                                    .category
                                ]; // Diziyi yay
                            }
                            form.reset();
                            this.closeCategoryModal(); // Modal'ı kapat
                        } else {
                            alert(result.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Beklenmeyen bir hata oluştu.');
                    }
                },
                confirmDelete(id, url) {
                    window.confirmDelete(id, url).then((response) => {
                        if (response === "success") {
                            if (response.type === "role") {
                                this.roles = this.roles.filter(role => role.id !== id);
                            } else {
                                this.categories = this.categories.filter(category => category
                                    .id !==
                                    id);
                            }
                        }
                    }).catch((error) => {
                        console.log("Silme işlemi başarısız veya iptal edildi.", error);
                    });
                }
            }));
        });
    </script>
@endsection
