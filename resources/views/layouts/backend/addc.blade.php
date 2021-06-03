<x-app-layout>
    <!-- component -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
      <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }">
  
        {{-- @include('layouts.admin.navigation') --}}
        @include('layouts.backend.partials.sidebar')
      </div>
      <!-- Flex 2 -->
        <div class="flex flex-col px-6 py-8 w-screen">
            
  
          
                <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <!-- Category info -->
                <div class="w-full flex items-center justify-between p-6 space-x-6">
                    <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Category Information
                    </h3>
                        </div>
                    </div>
                    <a href="#" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create New Category
                    <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                    </svg>
                    </a>
                </div>
            
            <!-- Category info End -->
  
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Category Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total Products
                  </th>
                  <th scope="col" class="px-20 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <!-- Odd row -->
               
                <tr class="bg-white">
                  <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    asdfs
                  </td>
                  <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                  asdf
                  </td>
                  {{-- <td class="px-20 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $category->slug }}
                  </td> --}}
                  <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                    <a href="#" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                        Edit
                    </a>
  
                    <a href="#" type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                        Delete
                    </a >
                  </td>
                </tr>
  
                <!-- More items... -->
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  
      <!-- </div> -->
    <!--END... -->
    </div>
    </x-app-layout>
  