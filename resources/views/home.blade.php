<x-guest-layout>
    <div class="max-h-screen" style="">
  
        <div x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-white">
          <!-- Mobile menu -->
          
            <div x-show="open" class="relative z-40 lg:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true" style="display: none;">
              
                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" style="display: none;"></div>
              
      
              <div class="fixed inset-0 z-40 flex">
                
                  <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl" @click.away="open = false" style="display: none;">
                    <div class="flex px-4 pb-2 pt-5">
                      <button type="button" class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400" @click="open = false">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
                      </button>
                    </div>
      
                    <!-- Links -->
                    <div class="mt-2" x-data="Components.tabs()" @tab-click.window="onTabClick" @tab-keydown.window="onTabKeydown">
                      <div class="border-b border-gray-200">
                        <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                          
                            <button id="tabs-1-tab-1" class="flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium border-indigo-600 text-indigo-600" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'border-indigo-600 text-indigo-600': selected, 'border-transparent text-gray-900': !(selected) }" x-data="Components.tab(0)" aria-controls="tabs-1-panel-1" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="0" aria-selected="true">Women</button>
                          
                            <button id="tabs-1-tab-2" class="border-transparent text-gray-900 flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'border-indigo-600 text-indigo-600': selected, 'border-transparent text-gray-900': !(selected) }" x-data="Components.tab(0)" aria-controls="tabs-1-panel-2" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">Men</button>
                          
                        </div>
                      </div>
                      
                        
                          <div id="tabs-1-panel-1" class="space-y-12 px-4 py-6" x-description="'Women' tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-1-tab-1" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0">
                            <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    New Arrivals
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Basic Tees
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-03.jpg" alt="Model wearing minimalist watch with black wristband and white watch face." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Accessories
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-04.jpg" alt="Model opening tan leather long wallet with credit card pockets and cash pouch." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Carry
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                            </div>
                          </div>
                        
                          <div id="tabs-1-panel-2" class="space-y-12 px-4 py-6" x-description="'Men' tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-1-tab-2" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">
                            <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-01.jpg" alt="Hats and sweaters on wood shelves next to various colors of t-shirts on hangers." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    New Arrivals
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-02.jpg" alt="Model wearing light heather gray t-shirt." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Basic Tees
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-03.jpg" alt="Grey 6-panel baseball hat with black brim, black mountain graphic on front, and light heather gray body." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Accessories
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                                <div class="group relative">
                                  <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-md bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-01-men-category-04.jpg" alt="Model putting folded cash into slim card holder olive leather wallet with hand stitching." class="object-cover object-center">
                                  </div>
                                  <a href="#" class="mt-6 block text-sm font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Carry
                                  </a>
                                  <p aria-hidden="true" class="mt-1 text-sm text-gray-500">Shop now</p>
                                </div>
                              
                            </div>
                          </div>
                        
                      
                    </div>
      
                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                      
                        <div class="flow-root">
                          <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                        </div>
                      
                        <div class="flow-root">
                          <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                        </div>
                      
                    </div>
      
                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                      <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create an account</a>
                      </div>
                      <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                      </div>
                    </div>
      
                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                      <!-- Currency selector -->
                      <form>
                        <div class="inline-block">
                          <label for="mobile-currency" class="sr-only">Currency</label>
                          <div class="group relative -ml-2 rounded-md border-transparent focus-within:ring-2 focus-within:ring-white">
                            <select id="mobile-currency" name="currency" class="flex items-center rounded-md border-transparent bg-none py-0.5 pl-2 pr-5 text-sm font-medium text-gray-700 focus:border-transparent focus:outline-none focus:ring-0 group-hover:text-gray-800">
                              
                                <option>CAD</option>
                              
                                <option>USD</option>
                              
                                <option>AUD</option>
                              
                                <option>EUR</option>
                              
                                <option>GBP</option>
                              
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center">
                              <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
      </svg>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                
              </div>
            </div>
          
      
          <!-- Hero section -->
          <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
              <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-hero-full-width.jpg" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>
      

      
                <!-- Secondary navigation -->
                <div class="bg-white bg-opacity-10 backdrop-blur-md backdrop-filter">
                  <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
                    <div>
                      <div class="flex h-16 items-center justify-between">
                        <!-- Logo (lg+) -->
                        <div class="hidden lg:flex lg:flex-1 lg:items-center">
                          <a href="#">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="{{ asset('storage/logo/logo.png')}}" alt="">
                          </a>
                        </div>
      
                        <!-- Mobile menu and search (lg-) -->
                        <div class="flex flex-1 items-center lg:hidden">
                          <button type="button" x-description="Mobile menu toggle, controls the 'mobileMenuOpen' state." class="-ml-2 p-2 text-white" @click="open = true">
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
      </svg>
                          </button>
      
                          <!-- Search -->
                          <a href="#" class="ml-2 p-2 text-white">
                            <span class="sr-only">Search</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
      </svg>
                          </a>
                        </div>
      
                        <!-- Logo (lg-) -->
                        <a href="#" class="lg:hidden">
                          <span class="sr-only">Your Company</span>
                          <img src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="" class="h-8 w-auto">
                        </a>
      
                        @if(request()->user() == null)
                        <div class="flex flex-1 items-center justify-end">

                          <a href="{{ route('login') }}" class="hidden text-sm font-medium text-white lg:block">เข้าสู่ระบบ</a>
      
                          <div class="flex items-center lg:ml-8"> 
                            <a href="{{ route('register') }}" class="hidden text-sm font-medium text-white lg:block">ลงทะเบียน</a>
                        
                          </div>
                        </div>
                        @else
                        <div class="flex flex-1 items-center justify-end">

                            <a href="{{ route('login') }}" class="hidden text-sm font-medium text-white lg:block">แดชบอร์ด</a>

                          </div>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
              </nav>
            </header>
      
            <div class="relative mx-auto flex max-w-7xl flex-col items-center px-6 py-96 text-center lg:px-0 min-h-screen">
              <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">NA & CHANG WEB ABSTRACTION CAFE</h1>
              <a href="{{ route('home.home') }}" class="animate-bounce mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100">สถานที่ท่องเที่ยวทั้งหมด
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-5 h-5">
                    <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd" />
                  </svg>
                  
              </a>
            </div>
          </div>
      
      
        </div>
      
      </div>
</x-guest-layout>