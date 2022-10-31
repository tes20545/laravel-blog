<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-head.tinymce-config/>
    <div class="py-12">
            <!-- Image gallery -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div>
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                                <div class="mt-1">
                                    <textarea id="title" name="title" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are hyperlinked.</p>
                            </div>
                            <textarea id="myeditorinstance" name="editor" rows="50">{!! $blog_select->contents !!}</textarea>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
</x-app-layout>
