<nav class="container mx-auto px-4 flex items-center justify-between py-4" x-data="{ isOpen: false, selected: null }">
    <div class="flex">
        <button @click="isOpen = !isOpen" aria-label="Toggle Menu">
            <i class="fa-solid fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Overlay -->
    <div x-show="isOpen" class="fixed inset-0 bg-black bg-opacity-50 z-40 transition-opacity" @click="isOpen = false"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    </div>

    <!-- Sidebar -->
    <div class="fixed top-0 left-0 bg-white w-72 z-50 overflow-y-auto h-screen" x-show="isOpen"
        @click.away="isOpen = false" x-transition:enter="transition ease-out duration-300 transform -translate-x-64"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-64">
        <div class="flex justify-end">
            <button class="text-3xl mr-3 mt-1" @click="isOpen = false">&times;</button>
        </div>
        <nav class="mt-5 flex flex-col" x-data="{
            selected: null,
            items: [{
                    id: 1,
                    title: 'Portföy',
                    icon: 'fa-handshake',
                    links: [
                        { title: 'Portföy Oluştur', href: '/admin/portfoy-olustur' },
                        { title: 'Portföy Listesi', href: '/admin/portfoy' }
                    ]
                },
                {
                    id: 2,
                    title: 'Blog',
                    icon: 'fa-book-bookmark',
                    links: [
                        { title: 'Blog Oluştur', href: '/admin/blog-olustur' },
                        { title: 'Blog Listesi', href: '/admin/blog' }
                    ]
                }
            ]
        }">
            <a href="/admin" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-100">
                <i class="fa-solid fa-house"></i>
                <span class="mx-4 font-medium">Ana Sayfa</span>
            </a>
            <template x-for="item in items" :key="item.id">
                <li class="relative list-none">
                    <button class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-100 justify-between w-full"
                        @click="selected !== item.id ? selected = item.id : selected = null"
                        aria-expanded="selected === item.id">
                        <div class="flex items-center">
                            <i :class="'fa-solid ' + item.icon"></i>
                            <span class="mx-4 font-medium" x-text="item.title"></span>
                        </div>
                        <div class="w-6 h-6 cursor-pointer flex flex-col items-center justify-center relative">
                            <input class="hidden peer" type="checkbox" :checked="selected === item.id" />
                            <i :class="{ 'fa-chevron-right': selected !== item.id, 'fa-angle-down': selected === item.id }"
                                class="fa-solid transition-transform duration-300"></i>
                        </div>
                    </button>

                    <div class="relative overflow-hidden transition-all duration-500" x-ref="container"
                        x-bind:style="selected === item.id ? 'max-height: ' + $refs.container.scrollHeight + 'px' : 'max-height: 0'">
                        <div class="pb-6 px-6">
                            <template x-for="link in item.links" :key="link.href">
                                <a :href="link.href"
                                    class="block py-2 text-sm text-gray-600 hover:bg-blue-500 hover:text-white"
                                    x-text="link.title"></a>
                            </template>
                        </div>
                    </div>
                </li>
            </template>

            <a href="/admin/kategoriler" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-100">
                <i class="fa-solid fa-layer-group"></i>
                <span class="mx-4 font-medium">Kategoriler</span>
            </a>
            <a href="/admin/ayarlar" class="flex items-center py-3 px-6 text-gray-600 hover:bg-gray-100">
                <i class="fa-solid fa-gear"></i>
                <span class="mx-4 font-medium">Ayarlar</span>
            </a>
        </nav>
    </div>
</nav>
