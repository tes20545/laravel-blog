<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">รีวิวสถานที่ท่องเที่ยว</h1>
                        <p class="mt-2 text-sm text-gray-700">เพิ่มการรีวิวสถานที่ท่องเที่ยว</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <a href="{{ route('review.create') }}"><button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">เพิ่มการรีวิวของฉัน</button></a>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ลำดับ</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">หัวข้อ</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">เนื้อหาบางส่วน</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach($review as $key => $b)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $key+1 }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $b->title }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ substr($b->contents,0,50),'...' }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="{{ route('blog.edit',$b->id) }}" class="text-indigo-600 hover:text-indigo-900">แก้ไข</a>

                                            <a href="javascript:void(0);"
                                               id="deleteTopic_{{ $b->id }}"
                                               class="ml-4 font-medium text-red-600 hover:underline deleteAss"
                                               data-id="{{ route('blog.delete', $b->id) }}"
                                               data-topic="{{ $b->title }}"
                                               title="DELETE">
                                                ลบ
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  modal delete  --}}
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display:none"
         id="modalDelete">
        <div class="fixed z-10 inset-0 overflow-y-auto bg-gray-700 bg-opacity-25">
            <div class="flex items-center sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                <div
                    class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg w-full sm:p-6">
                    <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                        <button type="button"
                                class="bg-white closeModal rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <span class="sr-only">ลบข้อมูล</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">ยืนยันการลบ
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="modal-body-delete">
                                </p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" id="confirmDelete">
                        @method('DELETE')
                        @csrf
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <button type="submit" id="confirmDelete"

                                    class=" w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                {{ __('backend/community.confirm') }}
                            </button>
                            <button type="button" id="CancelDelete"
                                    class="closeModal mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:w-auto sm:text-sm">
                                {{ __('backend/community.cancel') }}

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  modal delete  --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.deleteAss').on('click', function(e) {
                $('#modalDelete').show();
                let topic = $(this).data('topic')
                $('#modal-body-delete').html('{{ __('backend/community.are_you_sure') }} <b>' + topic + '</b>' + ' ?')
                $('#confirmDelete').attr('action', $(this).data('id'))
            });
            $('.closeModal').on('click', function(e) {
                $('#modalDelete').hide();
            });

            $('.hidden_article').on('click', function(e) {
                $('#modalHide').show();
                let topic = $(this).data('topic')
                $('#modal-body-hidden').html('Hidden  Article <b>' + topic + '</b>')
                $('#confirmHidden').attr('action', $(this).data('id'))
            });
            $('.closeModalHidden').on('click', function(e) {
                $('#modalHide').hide();
            });
        });
    </script>
</x-app-layout>
