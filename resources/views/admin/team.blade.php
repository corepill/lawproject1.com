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
                <button class="bg-orange-600 py-2 px-8 rounded" @click="openTeamModal()">Yeni Üye</button>
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
                    <template x-for="team in teams" :key="team.id">
                        <tr class="hover:bg-gray-50">
                            <td class="p-4 text-[15px] text-gray-800" x-text="team.name_surname"></td>
                            <td class="p-4 text-[15px] text-gray-800" x-text="team.role.name"></td>
                            <td class="p-4 text-[15px] text-gray-800">
                                <img :src="team.photo ? '/' + team.photo :
                                    '{{ asset('assets/images/default-photo.jpg') }}'"
                                    :alt="team.name_surname" class="h-10 w-10 rounded-full object-cover">
                            </td>

                            <td class="p-4 text-[15px] text-gray-800">
                                <a href="javascript:void(0)" :class="team.status ? 'bg-green-500' : 'bg-red-500'"
                                    class="py-2 px-4 rounded"
                                    @click="changeStatus(team.status, team.id, 'Team' ,'{{ url('admin/ekip/changeStatus') }}')">
                                    <span x-text="team.status ? 'Aktif' : 'Pasif'"></span>
                                </a>
                            </td>
                            <td class="p-4 text-[15px] text-gray-800"
                                x-text="new Date(team.created_at).toLocaleDateString('tr-TR', { day: '2-digit', month: '2-digit', year: 'numeric' })">
                            </td>
                            <td class="p-4">
                                <a class="mr-4" title="Edit" href="javascript:void(0)" @click="openEditTeamModal()">
                                    <i class="fa-regular fa-pen-to-square text-blue-500"></i>
                                </a>
                                <a class="mr-4 btnDelete" href="javascript:void(0)"
                                    @click="confirmDelete(team.id, '{{ url('admin/ekip-sil') }}')">
                                    <i class="fa-solid fa-trash-can text-red-500"></i>
                                </a>
                            </td>
                        </tr>
                    </template>
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
            <div x-show="openTeam" x-transition class="fixed z-10 inset-0 overflow-y-auto bg-black bg-opacity-40">
                <div class="min-h-screen flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg min-w-[80%] md:min-w-[40%]">
                        <h2 class="text-xl mb-4">Yeni Üye Ekle</h2>
                        <form id="teamForm" @submit.prevent="submitTeamForm" action="{{ route('team.create') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 flex justify-between gap-5">
                                <div class="w-full">
                                    <label for="name_surname" class="block text-sm font-medium text-gray-700">Adı
                                        Soyadı</label>
                                    <input type="text" id="name_surname" name="name_surname"
                                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                        required>
                                </div>
                                <div class="w-full">
                                    <label for="x_username" class="block text-sm font-medium text-gray-700">X Kullanıcı
                                        Adı</label>
                                    <input type="text" id="x_username" name="x_username"
                                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                        required>
                                </div>
                            </div>
                            <div class="mb-4 flex justify-between gap-5">
                                <div class="w-full">
                                    <label for="instagram_username"
                                        class="block text-sm font-medium text-gray-700">Instagram
                                        Kullanıcı Adı</label>
                                    <input type="text" id="instagram_username" name="instagram_username"
                                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                        required>
                                </div>
                                <div class="w-full">
                                    <label for="linkedin_username"
                                        class="block text-sm font-medium text-gray-700">Linkedin
                                        Kullanıcı Adı</label>
                                    <input type="text" id="linkedin_username" name="linkedin_username"
                                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
                                        required>
                                </div>
                            </div>
                            <div class="mb-4 flex justify-between gap-5">
                                <div class="w-full">
                                    <label for="role_id" class="block text-sm font-medium text-gray-700">Rol</label>
                                    <select id="role_id" name="role_id"
                                        class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                                        <template x-for="role in roles" :key="role.id">
                                            <option :value="role.id" x-text="role.name"></option>
                                        </template>
                                    </select>
                                </div>
                                <div class="grid w-full gap-1.5">
                                    <label class="block text-sm font-medium text-gray-700">Görsel</label>
                                    <input id="photo" type="file" name="photo"
                                        class="flex h-10 w-full rounded-md border border-input bg-white px-3 py-2 text-sm text-gray-400 file:border-0 file:bg-transparent file:text-gray-600 file:text-sm file:font-medium">
                                </div>
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
                teams: @json($teams),
                openTeam: false,
                openRoleModal() {
                    this.openRole = true;
                    this.openTeam = false;
                    document.getElementById('roleForm').reset();
                },
                openTeamModal() {
                    this.openTeam = true;
                    this.openRole = false;
                    document.getElementById('teamForm').reset();
                },
                openEditTeamModal() {
                    // düzenleme modalı açma kodu
                },
                closeRoleModal() {
                    this.openRole = false;
                    document.getElementById('roleForm').reset(); // Reset the role form on close
                },
                closeMemberModal() {
                    this.openTeam = false;
                    document.getElementById('teamForm').reset(); // Reset the member form on close
                },
                changeStatus(currentStatus, dataId, type, url) {
                    currentStatus = currentStatus ? 1 : 0;
                    window.confirmStatusChange(currentStatus, dataId, type, url)
                        .then((response) => {
                            if (response === 'success') {
                                const teamIndex = this.teams.findIndex(team => team.id === dataId);
                                if (teamIndex !== -1) {
                                    this.teams[teamIndex].status = !
                                        currentStatus;
                                }
                            }
                        })
                        .catch((error) => {
                            console.log("Durum değişikliği başarısız veya iptal edildi.", error);
                        })
                },
                async submitTeamForm() {
                    try {
                        const form = document.getElementById('teamForm');
                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                        });
                        const result = await response.json();

                        if (result.status === 'success') {

                            this.teams = [...this.teams, result.team];
                            form.reset();
                        } else {
                            alert(result.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Beklenmeyen bir hata oluştu.');
                    }
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
                            this.roles = [...this.roles, result.role];
                            form.reset();
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
                                this.teams = this.teams.filter(team => team.id !== id);
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
