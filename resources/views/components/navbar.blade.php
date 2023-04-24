<div>
    <nav class="w-full py-4 bg-gray-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('home.index') }}">หน้าแรก</a></li>
                    <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('home.review') }}">รีวิวโดยผู้ใช้</a></li>
                    {{-- <li><a class="hover:text-gray-200 hover:underline px-4" href="#">About</a></li> --}}
                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="https://www.facebook.com/profile.php?id=100091749566368">
                    <i class="fab fa-facebook"></i>
                </a>
            </div>
        </div>

    </nav>
</div>
