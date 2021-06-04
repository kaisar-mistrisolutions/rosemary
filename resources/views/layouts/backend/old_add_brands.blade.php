<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>
  
    <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="h-screen flex overflow-hidden bg-gray-100">
  
    @include('layouts.backend.partials.sidebar')

<div class="space-y-6 pt-32 pl-48">
  <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 ">
    <div class="md:grid md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Add a New Brand</h3>
        
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form class="space-y-6" action="#" method="POST">
          <div class="grid grid-cols-3 gap-6">
            <div class="col-span-3 sm:col-span-2">
              <label for="category" class="block text-sm font-medium text-gray-700">
                Brand Name
              </label>
              <div class="mt-1 flex rounded-md shadow-sm">
               
                <input type="text" name="category" id="category" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="name">
              </div>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700">
              Icon
            </label>
            <div class="mt-1 flex items-center space-x-5">
              <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
              </span>
              <button type="button" class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Select
              </button>
            </div>
          </div>  
        </form>
      </div>
    </div>
  </div>

  <div class="flex justify-end">
    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Cancel
    </button>
    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Save
    </button>
  </div>
</div>


</x-app-layout>
