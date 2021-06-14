<div class="flex-1 px-4 flex justify-between">
        <div class="flex-1 flex">
          <form class="w-full flex md:ml-0" action="#" method="GET">
            <label for="search_field" class="sr-only">Search</label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
              <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input id="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
          </form>
        </div>
        <div class="ml-4 flex items-center md:ml-6">

          <!-- Profile dropdown -->
          <div class="ml-3 relative">
          <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <button @click="open = !open" type="button" class="max-w-xs bg-white flex items-center text-sm  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="sr-only">Open user menu</span>
            <div class="widget-content-left  ml-3 header-user-info">
                <div class="widget-heading mx-2">
                    {{ Auth::user()->name }}
                </div>
                <div class="widget-subheading mx-2">
                    Role: {{ Auth::user()->role->name }}
                </div>
            </div>
            <img class="h-8 w-8 rounded-full" src="{{ Storage::url(Auth::user()->image) }}" alt="">
          </button>
          <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg">
          <div class="px-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              <a class="dropdown-item block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" href="{{ route('app.users.show',Auth::user()->id) }}">
             {{ __('Profile') }}
            </a>
          </div>
            
            <div class="px-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              {{-- <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ url('/categories') }}">Logout</a> --}}
              <a class="dropdown-item block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
          </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>
            </div>
          </div>
        </div>

          
        </div>
        </div>
      </div>