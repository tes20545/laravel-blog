<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <form class="space-y-6" action="{{ route('setting.update',$setting->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">สามารถเพิ่มชื่อเว็บไซต์</h3>
                                <p class="mt-1 text-sm text-gray-500">สามารถเพิ่มชื่อเว็บไซต์</p>
                            </div>
                            <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
                                <div>
                                    <label for="about"
                                           class="block text-sm font-medium leading-6 text-gray-900">ชื่อเว็บไซต์</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" value="{{ $setting->name }}" class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="about"
                                           class="block text-sm font-medium leading-6 text-gray-900">คำอธิบายเว็บไซต์</label>
                                    <div class="mt-2">
                                        <input type="text" name="description" id="description" value="{{ $setting->description }}" class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between mt-9 px-4 sm:px-0">
                            <a href="{{ route('setting.index') }}">
                                <button type="button"
                                        class="rounded-md bg-white py-2 px-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                    ย้อนกลับ
                                </button>
                            </a>
                            <button type="submit"
                                    class="ml-3 inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                                บันทึก
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
