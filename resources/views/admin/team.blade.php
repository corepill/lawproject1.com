@extends('layouts.admin.admin')

@section('title')
    Admin Ekip
@endsection

@section('css')
@endsection

@section('content')
    <div x-data="modal">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-3xl">Ekip</h2>
            <div>
                <button class="bg-orange-600 py-2 px-8 rounded" @click="openRoleModal()">Yeni Rol</button>
                <button class="bg-orange-600 py-2 px-8 rounded" @click="openMemberModal()">Yeni Üye</button>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-100 whitespace-nowrap">
                    <tr>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ad Soyad</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Rol</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Fotoğraf</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Durum</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Oluşturma Tarihi</th>
                        <th class="p-4 text-left text-xs font-semibold text-gray-800">Ayarlar</th>
                    </tr>
                </thead>
                <tbody class="whitespace-nowrap">
                    @foreach ($teams as $team)
                        <tr class="hover:bg-gray-50" data-id="{{ $team->id }}">
                            <td class="p-4 text-[15px] text-gray-800">{{ $team->title }}</td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)"
                                    :class="{ 'bg-green-500': {{ $team->status }}, 'bg-red-500': !{{ $team->status }} }"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus({{ $team->id }}, {{ $team->status }})">
                                    {{ $team->status ? 'Aktif' : 'Pasif' }}
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <img src="{{ $team->photo ? asset($team->photo) : asset('default-photo.jpg') }}"
                                    alt="{{ $team->title }}" class="h-10 w-10 rounded-full">

                            </td>
                            <td class="p-4 text-[15px] text-gray-800">
                                {{ \Carbon\Carbon::parse($team->created_at)->format('d-m-Y') }}</td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit" href="javascript:void(0)"
                                    @click="openEditModal({{ $team->id }}, '{{ $team->title }}', {{ $team->status }})">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete({{ $team->id }})">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Modal for adding role -->
            <div x-show="openRole" x-transition class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-60">
                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg min-w-[80%] md:min-w-[40%]">
                        <h2 class="text-xl mb-4">Yeni Rol Ekle</h2>
                        <form id="roleForm" @submit.prevent="submitRoleForm" action="{{ route('role.create') }}"
                            method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="roleName" class="block text-sm font-medium text-gray-700">Rol Adı</label>
                                <input type="text" id="roleName" name="name"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <button type="button" @click="closeRoleModal()"
                                    class="bg-gray-500 text-white py-2 px-4 rounded mr-2">İptal</button>
                                <button type="submit" class="bg-orange-600 text-white py-2 px-4 rounded">Kaydet</button>
                            </div>
                        </form>
                        <div>
                            <div>
                                <h5>Roller</h5>
                                <div>
                                    <template x-for="role in roles" :key="role.id">
                                        <div class="flex items-center justify-between mb-2">
                                            <span x-text="role.name"></span>
                                            <a class="mr-4 btnDelete" href="javascript:void(0)"
                                                @click="confirmDelete(role.id, '{{ url('admin/rol-sil') }}')">
                                                <i class="fa-solid fa-trash-can text-red-500"></i>
                                            </a>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Modal for adding member -->
            <div x-show="openMember" x-transition class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-40">
                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg min-w-[80%] md:min-w-[40%]">
                        <h2 class="text-xl mb-4">Yeni Üye Ekle</h2>
                        <form id="memberForm" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="memberName" class="block text-sm font-medium text-gray-700">Üye Adı</label>
                                <input type="text" id="memberName" name="memberName"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="memberRole" class="block text-sm font-medium text-gray-700">Rol</label>
                                <select id="memberRole" name="memberRole"
                                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                    <template x-for="role in roles" :key="role.id">
                                        <option :value="role.id" x-text="role.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div class="mt-6 flex justify-end text-white">
                                <button type="button" @click="closeMemberModal()"
                                    class="bg-orange-600  py-2 px-4 rounded mr-2">İptal</button>
                                <button type="submit" class="bg-orange-600  py-2 px-4 rounded">Kaydet</button>
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
                openRole: false,
                roles: @json($roles),
                openMember: false,
                openRoleModal() {
                    this.openRole = true;
                    this.openMember = false; // Üye modalını kapat
                    document.getElementById('roleForm').reset();
                },
                openMemberModal() {
                    this.openMember = true;
                    this.openRole = false; // Rol modalını kapat
                    document.getElementById('memberForm').reset();
                },
                closeRoleModal() {
                    this.openRole = false;
                    document.getElementById('roleForm').reset(); // Reset the role form on close
                },
                closeMemberModal() {
                    this.openMember = false;
                    document.getElementById('memberForm').reset(); // Reset the member form on close
                },
                changeStatus(teamId, currentStatus) {
                    // status değişim kodu
                },
                confirmDelete(teamId) {
                    // silme onay kodu
                },
                openEditModal(id, title, status) {
                    // düzenleme modalı açma kodu
                },
                async submitRoleForm() {
                    try {
                        const form = document.getElementById('roleForm');
                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                        });
                        const result = await response.json();

                        if (result.status === 'success') {
                            // Mevcut rolleri kopyalayıp yeni rolü ekleyerek listeyi yeniden oluştur
                            this.roles = [...this.roles, result.role];
                            this.closeRoleModal();
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
                            this.roles = this.roles.filter(role => role.id !== id);
                        }
                    }).catch((error) => {
                        console.log("Silme işlemi başarısız veya iptal edildi.", error);
                    });
                }
            }));
        });
    </script>
@endsection
