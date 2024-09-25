<div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-12 border bg-slate-300">
        <div class="md:col-span-4">
            <img class="w-full h-full object-cover"
                src="https://images.pexels.com/photos/4491469/pexels-photo-4491469.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="">
        </div>
        <form action="" method="post" class="md:col-span-8 p-10">
            <x-title heading="İletişime Geçin" subtext="Davalarınız için iletişime geçinmekten çekinmeyin." />
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-full-name">
                        Ad Soyad
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-full-name" type="text" name="full-name">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                        Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email" type="email" name="email">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
                        Telefon No
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-phone" type="text" name="phone">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-service-type">
                        Hizmet Tipi
                    </label>
                    <select
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-service-type" name="service-type">
                        <option value="ticari-davalar">Ticari Davalar</option>
                        <option value="ceza-davaları">Ceza Davaları</option>
                        <option value="aile-hukuku">Aile Hukuku</option>
                        <option value="iş-hukuku">İş Hukuku</option>
                        <option value="idari-hukuk">İdari Hukuk</option>
                        <option value="gayrimenkul-hukuku">Gayrimenkul Hukuku</option>
                        <option value="gayrimenkul-hukuku">Diğer</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-message">
                        Mesajınız
                    </label>
                    <textarea rows="10"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-message" name="message"></textarea>
                </div>
                <div class="flex justify-between w-full px-3">
                    <button type="submit"
                        class="mt-6 border border-slate-800 bg-slate-800 text-white hover:bg-white hover:text-black duration-300 py-2 px-7 rounded-3xl">
                        Gönder
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
