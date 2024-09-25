<div x-data="{
    teamMembers: [
        { id: 1, name: 'John Doe', role: 'Software Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 2, name: 'Jane Smith', role: 'Product Manager', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 3, name: 'Alice Johnson', role: 'UI/UX Designer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 4, name: 'Bob Brown', role: 'DevOps Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 5, name: 'Charlie Davis', role: 'Data Scientist', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 6, name: 'Eva White', role: 'Marketing Specialist', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 7, name: 'Frank Black', role: 'QA Engineer', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
        { id: 8, name: 'Grace Green', role: 'Business Analyst', image: 'https://images.pexels.com/photos/5439472/pexels-photo-5439472.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1' },
    ]
}" class="">
        

        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-8 text-center">
            <template x-for="member in teamMembers" :key="member.id">
                <div>
                    <img :src="member.image" class="w-32 h-32 rounded-full inline-block object-cover object-top"
                        alt="" />
                    <div class="py-4">
                        <h4 class="text-gray-800 text-base font-bold" x-text="member.name"></h4>
                        <p class="text-gray-800 text-xs mt-1" x-text="member.role"></p>
                        <div class="space-x-4 mt-4">
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-instagram"></i>
                            </button>
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-linkedin"></i>
                            </button>
                            <button type="button"
                                class="w-7 h-7 inline-flex items-center justify-center rounded-full border-none outline-none bg-gray-100 hover:bg-gray-200">
                                <i class="fa-brands fa-x-twitter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
</div>
