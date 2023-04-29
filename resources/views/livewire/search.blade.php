<div>
   
<form>   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">ค้นหา</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <input type="search" wire:keydown="search_func" wire:model="search" id="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ค้นหา..." required>
    </div>
</form>

@if($length != 0)
<div class="bg-white rounded-lg mt-6">
    <div class="mx-auto max-w-full px-4 py-16">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">ผลลัพธ์การค้นหา</h2>
  
      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach($data as $item)
            <div class="group relative">
                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                <img src="{{ asset('storage/'.$item->images) }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                </div>
                <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                    <a href="#">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $item->title }}
                    </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ substr($item->contents,0,10).'...' }}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">{{ $item->rating ?? 0 }}⭐</p>

                </div>
            </div>
        @endforeach

        </div>
    </div>
  </div>
@endif
<script>
    var u = document.getElementById('search')
    var f = document.getElementById('search').addEventListener('keyup', function(e) {
        Livewire.emit('length',u.value.length);
    });
</script>
</div>
