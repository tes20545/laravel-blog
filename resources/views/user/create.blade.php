<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <form class="space-y-6" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                        <div class="md:grid md:grid-cols-3 md:gap-6">
                            <div class="md:col-span-1">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">เพิ่มผู้ใช้งาน</h3>
                                <p class="mt-1 text-sm text-gray-500">เพิ่มผู้ใช้งาน</p>
                            </div>
                            <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
                                <div>
                                    <label for="about"
                                           class="block text-sm font-medium leading-6 text-gray-900">ชื่อ</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name"
                                               class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                    <div>
                                        <label for="about"
                                               class="block text-sm font-medium leading-6 text-gray-900">อีเมล</label>
                                        <div class="mt-2">
                                            <input type="email" name="email" id="email"
                                                   class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                        <div>
                                            <label for="about"
                                                   class="block text-sm font-medium leading-6 text-gray-900">รหัสผ่าน</label>
                                            <div class="mt-2">
                                                <input type="password" name="password" id="password"
                                                       class="mt-2 block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                            <div>
                                                <label for="about"
                                                       class="block text-sm font-medium leading-6 text-gray-900">ตำแหน่ง</label>
                                                <div class="mt-2">
                                                    <select id="position" name="position" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                        <option value="admin">ผู้ดูแล</option>
                                                        <option value="user">ผู้ใช้งาน</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-between mt-9 px-4 sm:px-0">
                                        <a href="{{ route('user.index') }}">
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
