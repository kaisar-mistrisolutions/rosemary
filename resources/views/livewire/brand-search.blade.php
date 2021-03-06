<div>
<x-app-layout>    
    <!-- This example requires Tailwind CSS v2.0+ -->
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
    <div class="flex flex-col px-6 py-8 w-full">
        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <nav class="flex mb-5" aria-label="Breadcrumb">
                <ol class="bg-white rounded-md shadow px-6 flex space-x-4">
                    <li class="flex">
                        <div class="flex items-center">
                        <a href="{{ route('app.dashboard') }}" class="text-gray-400 hover:text-gray-500">
                            <!-- Heroicon name: solid/home -->
                            <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                            <span class="sr-only">Home</span>
                        </a>
                        </div>
                    </li>

                    <li class="flex">
                        <div class="flex items-center">
                        <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Brand</a>
                        </div>
                    </li>
                </ol>
            </nav>

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="mx-5">
            {{-- Alert message --}}
            @if(session()->has('success'))
                @include('layouts.backend.alerts.alert-success')
            @endif
            {{-- End alert message --}}

            {{-- Errors Message --}}
            @if ($errors->any())
                @include('layouts.backend.alerts.alert-danger')
            @endif
            {{-- End error message --}}
        </div>

            <!-- Brand info -->
        <div class="w-full flex items-end justify-between p-6 space-x-6">
            <div class="flex-2 truncate">
                <div class="flex items-center space-x-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Brand Information
                    </h3>
                </div>
                <form action="#" method="get" role="search">
                    <input type="text" name="search" id="email" wire:model="search" class="mt-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Here"/>
                </form>
            </div>
            <a href="{{ route('app.brands.create') }}" type="button" class="inline-flex items-center px-4 py-2 mt-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
                Add New Brand
            </a>
        </div>
      <!-- Brand info End -->

      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Serial
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
             Brand Logo
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
             Brand Name
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
             Slug
            </th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
             Date
            </th>
            <th scope="col" class="px-20 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
              Actions
            </th>
          </tr>
        </thead>
        @foreach ($brands as $key => $brand)
        <tbody>
          <!-- Odd row -->

            <tr class="bg-white">
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $key + 1 }}
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                    <img class="h-10 w-10 ml-8 rounded-full" src="{{ Storage::url($brand->image) }}" alt="{{ $brand->name }}">
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="px-4 py-2 rounded-lg" href="#">{{ $brand->name }}</a>
                </td>
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500"> {{ $brand->slug}} </td>
                <td class="px-6 py-4 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $brand->created_at->diffForHumans() }}</div>
                </td>
                <td class="ml-2 px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                <a href="{{ route('app.brands.edit', $brand->id) }}" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
                <!-- <form action="{{route('app.brands.delete', $brand->id)}}" method="POST" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm">
                    @method('DELETE')
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                        </svg>
                    </button>               
                  </form> -->

                  @if($confirming===$brand->id)
                    <button wire:click="kill({{ $brand->id }})"
                    class="bg-red-600 text-white hover:bg-red-700 inline-flex items-center justify-center px-2 pt-1 border border-transparent font-medium rounded-md bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    <p class="h-5 w-20"> Confirm</p>
                    </button>   
                    @else
                    <a href="#" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" wire:click="confirmDelete({{ $brand->id }})" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                       </svg>
                    </a>
                    @endif
                </td>
            </tr>

          </tbody>
          @endforeach
      </table>
      
      <div class="px-6 py-5">
      <span>{{ $brands->links() }}</span>
    </div>
    
  </div>
</div>
</div>

    
</x-app-layout>

</div>
