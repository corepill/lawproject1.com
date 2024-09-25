<div x-data="{ open: false }"
            class="h-[40rem] relative before:absolute before:w-full before:h-full before:inset-0 before:bg-black before:opacity-50 before:z-10">
            <img src="https://images.pexels.com/photos/4049960/pexels-photo-4049960.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="Banner Image" class="absolute inset-0 w-full h-full object-cover" />

            <div
                class="min-h-[20rem] relative z-50 h-full max-w-7xl mx-auto flex flex-col justify-end items-center md:text-left text-center text-white">
                <div class="w-full flex flex-col md:flex-row justify-between mb-12">
                    <div class="w-full md:w-3/5">
                        <h2 class="md:text-4xl text-3xl md:leading-10 font-medium text-white mb-4">Güven, herhangi bir
                            avukat-müvekkil ilişkisinin temelidir</h2>
                        <p class="mt-4 text-base text-gray-300 leading-relaxed">En yüksek dürüstlük ve şeffaflık
                            standartlarını
                            koruyoruz. Müvekkillerimizi yasal süreç boyunca bilgilendirir ve bilinçli kararlar vermeleri
                            için
                            onlara bilgi veririz.</p>
                    </div>
                    <div class="w-full md:w-2/5 flex items-center justify-end mt-4 md:mt-0">
                        <button
                            class="bg-transparent text-white text-base py-3 px-6 border border-white rounded-lg hover:bg-white hover:text-black transition duration-300"
                            @click="open = true; $nextTick(() => document.getElementById('videoFrame').src = 'https://www.youtube.com/embed/hWMRd2mslCo')">
                            <i class="fa-solid fa-play"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 flex items-center justify-center z-[20000] bg-black bg-opacity-80"
                @click="open = false; $nextTick(() => document.getElementById('videoFrame').src = '')">
                <button @click="open = false; $nextTick(() => document.getElementById('videoFrame').src = '')"
                    class="absolute top-4 right-4 text-white text-5xl">&times;</button>
                <div class="relative w-full max-w-3xl" @click.stop>
                    <iframe id="videoFrame" class="w-full h-80" src="" title="YouTube Video" frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>