<div>
    @foreach($data as $comment)
    <div class="my-4 flex items-center ">
        <h4 class="mt-6 text-sm font-bold text-gray-900">{{ $comment->name }}</h4>
    </div>

    <h5 class="flex">{{ $comment->title }}</h5><br>
    <div class="flex text-base italic text-gray-600 border-b border-gray-100">
        <p class="flex-auto mb-6">{{ $comment->contents }}</p>
        @if(Auth()->user())
            @if($comment->user_id == Auth()->user()->id)
            <button wire:click="delete({{$comment->id}})"><p class="flex mb-6">ลบ</p></button>
            @endif  
        @endif
    </div>

    @endforeach
</div>
