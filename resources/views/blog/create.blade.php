<x-app-layout>
    @if(count($type) == 0)
        <script>
            alert("กรุณาเพิ่มประเภทบทความ อย่างน้อย 1 ประเภท");
            window.location.href="{{ route('blog.index')}}"
        </script>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('สร้างบทความ') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-fixed w-full h-full text-primary-100 heropattern-jigsaw-white">
        <!-- Image gallery -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div x-data="showImage()">
                        <div class="bg-white py-8 rounded-lg px-8">
                        <label for="file_upload"
                               class="@error('file_upload') text-red-500 @enderror text-lg font-medium leading-6 text-gray-900">
                            {{ __('รูปภาพหน้าปก') }}</label>
                        
                            <div
                            class="mt-1 mb-2 bg-white flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md @error('file_upload') border-red-500 @enderror">
                            <div class="space-y-1 text-center">

                                <div class="relative flex flex-col items-center justify-center my-4">
                                    <img id="preview" class="w-full max-h-48 mb-4"
                                         style="width:auto; height:auto">
                                </div>

                                <div class="flex text-sm text-gray-600">
                                    <label for="file_upload"
                                           class=" relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 @error('file_upload') text-red-500 @enderror">
                                        <span>{{ __('อัพโหลดภาพ') }}</span>
                                        <input id="file_upload" name="file_upload" type="file"
                                               accept="image/*" @change="showPreview(event)"
                                               class="sr-only">
                                    </label>
                                    <p
                                        class="text-sm ml-2 text-gray-500 @error('file_upload') text-red-500 @enderror">
                                        {{ __('ประเภทไฟล์') }} jpg, jpeg, png
                                        {{ __('ไฟล์ต้องไม่เกิน') }} 10
                                        {{ __('MB') }}</p>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('file_upload'))
                            @error('file_upload')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        @else
                            <dt class="text-sm font-medium text-gray-500">
                                <small class="text-xs text-gray-400">*
                                    {{ __('ขนาดรูปภาพ') }} 1920x400.
                                </small>
                            </dt>
                        @endif
                    </div>
                    </div>

                    <div class="mt-8 bg-white py-8 rounded-lg px-8">
                    <div>
                        <br>
                        <label for="about" class="block text-sm font-medium text-gray-700">ประเภทบทความ</label>
                        <div class="mt-1">
                            <select id="type" name="type" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @foreach($type as $t)
                                    <option value="{{ $t->name }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <br>
                        <label for="about" class="block text-sm font-medium text-gray-700">หัวข้อเรื่อง</label>
                        <div class="mt-1">
                            <input type="text" id="title" name="title" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <br>
                        <label for="about" class="block text-sm font-medium text-gray-700">ลิ้งก์เส้นทาง</label>
                        <div class="mt-1">
                            <input type="text" id="route" name="route" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <label for="about" class="mt-4 block text-sm font-medium text-gray-700">เนื้อหาบทความ</label>
                    <textarea id="editor" name="contents"></textarea>
                    <div class="px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">บันทึก</button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
<script>
    const watchdog = new CKSource.EditorWatchdog();

    window.watchdog = watchdog;

    watchdog.setCreator((element, config) => {
        return CKSource.Editor
            .create(element, config)
            .then(editor => {

                return editor;
            })
    });

    watchdog.setDestructor(editor => {


        return editor.destroy();
    });

    watchdog.on('error', handleError);

    watchdog
        .create(document.querySelector('#editor'), {
            licenseKey: '',
            ckfinder: {
                uploadUrl: '{{ route('blog.store') . '?_token=' . csrf_token() }}',
            },

        })
        .catch(handleError);
    function handleError(error) {

        console.error(error);
    }


    // preview images
    document.getElementById('logo').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    function showImage() {
        return {
            showPreview(event) {
                let src = URL.createObjectURL(event.target.files[0]);
                let preview = document.getElementById("preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    }

</script>
