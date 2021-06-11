<x-app-layout>

<div class="h-screen flex overflow-hidden bg-gray-100">
  <div class="fixed inset-0 flex z-40 md:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
    <div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-indigo-700">

      <div class="absolute top-0 right-0 -mr-12 pt-2">
        <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <span class="sr-only">Close sidebar</span>
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex-shrink-0 flex items-center px-4">
        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-300-mark-white-text.svg" alt="Workflow">
      </div>
      
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
      <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
  </div>

  @include('layouts.backend.partials.sidebar')

  <div class="flex flex-col w-0 flex-1 overflow-hidden">
    <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
      <button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-2 -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
        </svg>
      </button>
      @include('layouts.backend.partials.header')
    </div>

    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">

    
      <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          
            @role('admin')
              <h1 class="text-2xl font-semibold text-gray-900">Admin Dashboard</h1>
              (Hi Admin, Welcome Back!)
            @else 
            <h1 class="text-2xl font-semibold text-gray-900">Wlcome to Dashboard</h1>
            @endrole
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <!-- Replace with your content -->
          <div class="py-4">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-96">
              <!-- This example requires Tailwind CSS v2.0+ -->
                <div>

                  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 p-6">
                    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <!-- Heroicon name: outline/users -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Users</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $userCount }}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.users.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Total Subscribers stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>

                    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <!-- Heroicon name: outline/mail-open -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Roles</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $roleCount }}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.roles.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Open Rate stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>

                    <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <!-- Heroicon name: outline/cursor-click -->
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">All Products</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $productCount}}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.products.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> View all<span class="sr-only"> Avg. Click Rate stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>
                  </dl>

                  <!-- User List Details -->
                  <div class="shadow overflow-hidden border-b p-6 border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="px-2 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Serial
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User Image
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User Name
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Joined At
                  </th>
                  <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                  </th>
                  
                </tr>
              </thead>
              
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                <td class="px-2 py-2 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">asd</div>
                  </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">sdf</div>
                  </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">sdf</div>
                  </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">asdf</div>
                  </td>
                  
                  
                </tr>
              </tbody>
             
            </table>
          </div>
                </div>

            </div>
          </div>
          <!-- /End replace -->
          


        </div>
      </div>
    </main>
  </div>
</div>
  
</x-app-layout>