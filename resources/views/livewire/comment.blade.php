<div>
    <div class="bg-white mt-8">
        <div class="flex space-x-1 rating">
            <label for="star1">
                <input hidden wire:model="rating" type="radio" id="star1" name="rating" value="1" class="invisible"/>
                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 1 ) text-yellow-400 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            </label>
            <label for="star2">
                <input hidden wire:model="rating" type="radio" id="star2" name="rating" value="2" class="invisible"/>
                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 2 ) text-yellow-400 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            </label>
            <label for="star3">
                <input hidden wire:model="rating" type="radio" id="star3" name="rating" value="3" class="invisible"/>
                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 3 ) text-yellow-400 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            </label>
            <label for="star4">
                <input hidden wire:model="rating" type="radio" id="star4" name="rating" value="4" class="invisible"/>
                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 4 ) text-yellow-400 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            </label>
            <label for="star5">
                <input hidden wire:model="rating" type="radio" id="star5" name="rating" value="5" class="invisible"/>
                <svg class="cursor-pointer block w-8 h-8 @if($rating >= 5 ) text-yellow-400 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
            </label>
        </div>
        <form action="#" class="mt-6 "> 
        <div class="overflow-hidden rounded-lg border border-gray-300 shadow-sm focus-within:border-indigo-500 focus-within:ring-1 focus-within:ring-indigo-500 bg-white">
            <label for="title" class="sr-only">หัวข้อ</label>
            <input type="text" wire:model="title" name="title" id="title" class="block w-full border-0 pt-2.5 text-lg font-medium placeholder:text-gray-400 focus:ring-0" placeholder="หัวข้อ">
            <label for="description" class="sr-only">รายละเอียด</label>
            <textarea rows="2" wire:model="description" name="description" id="description" class="block w-full resize-none border-0 py-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="รายละเอียด..."></textarea>
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
