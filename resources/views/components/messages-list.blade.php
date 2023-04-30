<div class="fixed bottom-0 items-center hidden text-white bg-gray-600 border rounded-t cursor-pointer border-x border-gray-600 message-container lg:block messages-box right-24 w-80 hover:opacity-90">
    <div class="flex px-5 py-2">
        <div class="flex items-center gap-2">
            <h2 class="text-sm text-white" style="margin-top: 2px">Minhas Conversas</h2>
            <p class="bg-red-500 h-5 w-5 rounded-full flex items-center justify-center text-white text-xs"> 6 </p>
        </div>
        <div class="absolute right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="arrow-up w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden arrow-down w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>                  
        </div>
    </div>
    <div class="px-3 py-1 bg-white messages hidden">
        <div class="flex items-center gap-5 mt-3 mb-3 max-h-20">
            <div>
                <img src="{{ asset('images/user.png') }}" width="80px" />
            </div>
            <div>
                <h2 class="text-sm font-black text-gray-800 flex gap-1">Teste Teste <p class="bg-red-500 h-4 rounded-full flex items-center justify-center text-white text-xs" style="padding-inline: 5px"> 6 </p></h2>
                <p class="text-xs text-gray-400 relative line-clamp-2" style="overflow: hidden;
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2;">Lorem ipsum dolor sit amet consectetur afdssdfdsfdsfddipisicing elit. Expedita voluptas</p>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.querySelector('.message-container').addEventListener('click', (event) => {
        event.preventDefault();
        document.querySelector('.message-container').classList.toggle('open');

        if (document.querySelector('.message-container').classList.contains('open'))
            openMessages();
        else
            closeMessages();
    });

    function openMessages () {
        document.querySelector(".messages").classList.remove("hidden");

        document.querySelector(".arrow-up").classList.add("hidden");
        document.querySelector(".arrow-down").classList.remove("hidden");
    }

    function closeMessages () {
        document.querySelector(".messages").classList.add("hidden");

        document.querySelector(".arrow-down").classList.add("hidden");
        document.querySelector(".arrow-up").classList.remove("hidden");
    }
</script>