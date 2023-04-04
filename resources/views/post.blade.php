<x-guest-layout>

<!-- Top Bar Nav -->
<x-navbar/>

<!-- Text Header -->
<div>
    <header class="max-w-full  mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                {{ $setting->name ?? 'ท่องเที่ยว'}}
            </a>
            <p class="text-lg text-gray-600">
                {{ $setting->description ?? 'ท่องเที่ยว'}}
            </p>
        </div>
    </header>
</div>

<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            @foreach($type as $eiei)
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $eiei->name }}</a>
            @endforeach
        </div>
    </div>
</nav>

<div class="max-w-full bg-gray-100 mx-auto flex flex-wrap pb-6 rounded-lg ">

    <!-- Post Section -->
    <section class="max-w-full flex flex-col items-center px-8 rounded-lg ">

        <article class="flex flex-col my-4 rounded-lg shadow-md">
            <!-- Article Image -->
                <img src="{{ asset('storage/'.$home->images) }}" class="rounded-t-lg">
            <div class="bg-white flex flex-col justify-start p-6 rounded-lg">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $home->type }}</a>
                <p href="#" class="text-sm pb-8">
                    โดย <a href="#" class="font-semibold hover:text-gray-800">ผู้ดูแล</a>, เผยแพร่เมื่อ {{ \Carbon\Carbon::parse($home->created_at)->thaidate('j F Y') }}
                </p>
                {!! $home->contents !!}
                
                <div>
                    <a href="{{ $home->route }}" class="mt-12 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="mr-2 w-5 h-5">
                            <path d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                          </svg>
                          
                        เส้นทาง
                    </a>
                </div>
            </div>
            
        </article>
    </section>

</div>

<div class="max-w-full bg-gray-100 px-8 mx-auto pb-6 rounded-lg mb-12 ">
    <div class="max-w-full bg-white px-8 mx-auto pb-6 rounded-lg mb-12 shadow-md">
        <h3 class="text-2xl py-6">รีวิวโดยผู้ใช้</h3>

        <div class="flow-root">
            <div class="-my-12 divide-y divide-gray-200">
                <div class="py-12">
                    <div class="my-4 flex items-center ">
                            <h4 class="mt-6 text-sm font-bold text-gray-900">Emily Selman</h4>
                    </div>

                    <div class="mt-4 space-y-6 text-base italic text-gray-600 border-b border-gray-100">
                        <p class="mb-6">This is the bag of my dreams. I took it on my last vacation and was able to fit an absurd amount of snacks for the many long and hungry flights.</p>
                    </div>

                     <div class="my-4 flex items-center ">
                            <h4 class="mt-6 text-sm font-bold text-gray-900">Emily Selman</h4>
                    </div>

                    <div class="mt-4 space-y-6 text-base italic text-gray-600 border-b border-gray-100">
                        <p class="mb-6">This is the bag of my dreams. I took it on my last vacation and was able to fit an absurd amount of snacks for the many long and hungry flights.</p>
                    </div>
                </div>

                <!-- More reviews... -->
            </div>
        </div>


@if(request()->user() == null){}
<div class="backdrop-blur bg-white">
    <form action="#" class="mt-6">
    <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
        <label for="title" class="sr-only">Title</label>
        <input type="text" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium placeholder:text-gray-400 focus:ring-0" placeholder="Title">
        <label for="description" class="sr-only">Description</label>
        <textarea rows="2" name="description" id="description" class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Write a description..."></textarea>
    </div>
    <div class="flex items-center justify-between space-x-3 border-t border-gray-200 px-2 py-2 sm:px-3">
        <div class="flex">

        </div>
        <div class="flex-shrink-0">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">รีวิว</button>
        </div>
    </div>
    </form>
</div>
@else
<div class="backdrop-blur-sm bg-white/30">
    <form action="#" class="mt-6 backdrop-blur-sm bg-white/30">
    <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500">
        <label for="title" class="sr-only">Title</label>
        <input type="text" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium placeholder:text-gray-400 focus:ring-0" placeholder="Title">
        <label for="description" class="sr-only">Description</label>
        <textarea rows="2" name="description" id="description" class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Write a description..."></textarea>
    </div>
    <div class="flex items-center justify-between space-x-3 border-t border-gray-200 px-2 py-2 sm:px-3">
        <div class="flex">

        </div>
        <div class="flex-shrink-0">
            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">รีวิว</button>
        </div>
    </div>
    </form>
</div>
@endif

    </div>
</div>



<footer class="w-full bg-white pb-12">
    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="#" class="uppercase px-3">About Us</a>
            <a href="#" class="uppercase px-3">Privacy Policy</a>
            <a href="#" class="uppercase px-3">Terms & Conditions</a>
            <a href="#" class="uppercase px-3">Contact Us</a>
        </div>
        <div class="uppercase pb-6">&copy; myblog.com</div>
    </div>
</footer>

</body>
</html>
</x-guest-layout>
