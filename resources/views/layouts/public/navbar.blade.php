<div class="fixed w-full z-50 top-0 left-0">
    <!-- Desktop Menu -->
    <nav class="hidden lg:flex px-16 items-center justify-between relative py-5 text-white">
        <div>
            <img src="{{ asset('assets/images/logoipsum-317.svg') }}" alt="lorem hukuk logo">
        </div>
        <ul class="flex list-none">
            <li>
                <a href="#" class="flex md:inline-flex p-4 items-center hover:text-gray-300">
                    <span>Ana Sayfa</span>
                </a>
            </li>
            <li class="relative parent">
                <div
                    class="flex justify-between md:inline-flex p-4 items-center hover:text-gray-300 space-x-2 cursor-pointer">
                    <a href="">Hizmetler</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current pt-1" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </div>
                <ul
                    class="child transition duration-300 md:absolute top-full right-0 md:w-max bg-white md:shadow-lg md:rounded-b text-black list-none">
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Ticaret Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            İş Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Sözleşmeler ve Borçlar Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            İdare Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Vergi Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Bilişim Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Gayrimenkul Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Miras Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Ceza Hukuku
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="flex md:inline-flex p-4 items-center hover:text-gray-300">
                    <span>Blog</span>
                </a>
            </li>
            <li class="relative parent">
                <div
                    class="flex justify-between md:inline-flex p-4 items-center hover:text-gray-300 space-x-2 cursor-pointer">
                    <a href="">Kurumsal</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current pt-1" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </div>
                <ul
                    class="child transition duration-300 md:absolute top-full right-0 md:w-52 bg-white md:shadow-lg md:rounded-b text-black list-none">
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Hakkımızda
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Ekibimiz
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Kariyer
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            Duyrular
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="flex md:inline-flex p-4 items-center hover:text-gray-300">
                    <span> İletişim</span>
                </a>
            </li>
        </ul>
        <ul class="list-none">
            <li class="relative parent">
                <div
                    class="flex justify-between md:inline-flex p-4 items-center hover:text-gray-300 space-x-2 cursor-pointer ">
                    <a href="">TR</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current pt-1" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </div>
                <ul
                    class="child transition duration-300 md:absolute top-full right-0 md:w-max md:min-w-20 bg-white md:shadow-lg md:rounded-b text-black">
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            TR
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            EN
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-50">
                            RU
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Mobile Menu -->
    <nav class="lg:hidden  border-b shadow-lg" x-data="{ open: false, dropdownOpen: false }">
        <div class="flex items-center justify-between p-4">
            <div>
                <img src="{{ asset('assets/images/logoipsum-317.svg') }}" alt="lorem hukuk logo">
            </div>
            <div class="text-gray-500 cursor-pointer" @click="open = !open">
                <!-- Hamburger Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </div>
        </div>

        <!-- Mobile Menu Links -->
        <ul class="transition-transform transform-scale-0 duration-300 bg-white"
            :class="{ 'transform-scale-100': open, 'transform-scale-0': !open }"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform scale-y-0 opacity-0"
            x-transition:enter-end="transform scale-y-100 opacity-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="transform scale-y-100 opacity-100"
            x-transition:leave-end="transform scale-y-0 opacity-0">

            <!-- Menu Item with Dropdown -->
            <li>
                <a href="#" class="block p-4 hover:bg-gray-50">
                    <span>Ana Sayfa</span>
                </a>
            </li>
            <li x-data="{ openDropdown: false }">
                <a href="#" class="p-4 hover:bg-gray-50 flex justify-between items-center"
                    @click="openDropdown = !openDropdown">
                    <span>Hizmetler</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </a>
                <ul class="transition-transform transform-scale-0 duration-300 bg-white text-sm"
                    :class="{ 'transform-scale-100': openDropdown, 'transform-scale-0': !openDropdown }"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform scale-y-0 opacity-0"
                    x-transition:enter-end="transform scale-y-100 opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="transform scale-y-100 opacity-100"
                    x-transition:leave-end="transform scale-y-0 opacity-0">
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Ticaret Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            İş Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Sözleşmeler ve Borçlar Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            İdare Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Vergi Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Bilişim Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Gayrimenkul Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Miras Hukuku
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Ceza Hukuku
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#" class="block p-4 hover:bg-gray-50">
                    <span>Blog</span>
                </a>
            </li>
            <li x-data="{ openDropdown: false }">
                <a href="#" class="p-4 hover:bg-gray-50 flex justify-between items-center"
                    @click="openDropdown = !openDropdown">
                    <span>Kurumsal</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                    </svg>
                </a>
                <ul class="transition-transform transform-scale-0 duration-300 bg-white text-sm"
                    :class="{ 'transform-scale-100': openDropdown, 'transform-scale-0': !openDropdown }"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform scale-y-0 opacity-0"
                    x-transition:enter-end="transform scale-y-100 opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="transform scale-y-100 opacity-100"
                    x-transition:leave-end="transform scale-y-0 opacity-0">
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Hakkımızda
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Ekibimiz
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Kariyer
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block pl-8 py-3 hover:bg-gray-50">
                            Duyrular
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="block p-4 hover:bg-gray-50">
                    <span>İletişim</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
