<x-guest-layout>

<!-- Top Bar Nav -->
<x-navbar/>

<!-- Text Header -->
    <div>
        <header class="w-full container mx-auto">
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
                <a href="{{ route('home.tag',$eiei->name) }}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{ $eiei->name }}</a>
            @endforeach
        </div>
    </div>
</nav>
<div class="mt-6 mx-6">
<livewire:search/>
</div>


<div class="container mx-auto flex flex-wrap py-6">

    <!-- Posts Section -->
    <section class="w-full flex flex-col items-center px-3">
        @if(!$data->isEmpty())
        @foreach($data as $blog)
        <a href="{{ route('home.post',$blog->id) }}" class="hover:opacity-75">
            <article class="flex flex-col shadow my-4 overflow-hidden rounded-lg">
                <!-- Article Image -->
                
                    <img src="{{ asset('storage/'.$blog->images) }}">
                
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="{{ route('home.post',$blog->id) }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $blog->type }}</a>                    
                    <a href="{{ route('home.post',$blog->id) }}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $blog->title }}</a>
                    <p>Rating: <strong>{{ $blog->rating ?? 0 }}</strong> ⭐</p>
                    <p href="{{ route('home.post',$blog->id) }}" class="text-sm pb-3">
                        โดย <a href="#" class="font-semibold hover:text-gray-800">{{ $blog->name }}</a>, เผยแพร่เมื่อ {{ \Carbon\Carbon::parse($blog->created_at)->thaidate('j F Y') }}
                    </p>
                    <a href="{{ route('home.post',$blog->id) }}" class="uppercase text-gray-800 hover:text-black">อ่านต่อ<i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        </a>
        @endforeach
        @else
            <p>ไม่มีข้อมูล</p>
        @endif
            {{ $data->links() }}

    </section>


</div>

<footer class="w-full border-t bg-white pb-12">
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

</x-guest-layout>
