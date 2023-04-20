<div>
    <div class="bg-white">
        <form action="#" class="mt-6 "> 
        <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500 bg-white">
            <label for="title" class="sr-only">Title</label>
            <input type="text" wire:model="title" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium placeholder:text-gray-400 focus:ring-0" placeholder="Title">
            <label for="description" class="sr-only">Description</label>
            <textarea rows="2" wire:model="description" name="description" id="description" class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Write a description..."></textarea>
        </div>
        <div class="flex items-center justify-between space-x-3 border-t border-gray-200 px-2 py-2 sm:px-3">
            <div class="flex">
    
            </div>
            <div class="flex-shrink-0">
                <button wire:click="comment" type="button" class="inline-flex items-center rounded-md bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">รีวิว</button>
            </div>
        </div>
        </form>
    </div>
</div>
