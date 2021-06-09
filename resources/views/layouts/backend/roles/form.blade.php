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

                        <!-- This example requires Tailwind CSS v2.0+ -->
          <nav class="flex" aria-label="Breadcrumb">
            <ol class="bg-white rounded-md shadow px-3 flex space-x-2 m mt-8 ml-8">
                <li class="flex">
                <div class="flex items-center">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
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
                    <a href="{{ route('app.dashboard') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Dashboard</a>
                </div>
                </li>

                <li class="flex">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                    </svg>
                    <a href="{{ route('app.categories.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">All Categories</a>
                </div>
                </li>
            </ol>
          </nav>
          
          <div class="pt-8 mx-24 pb-14">
      <div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Roles Management
        </h3>
        <p class="mt-1 text-sm text-gray-500">
          Fill the form to add a new role.
        </p>
      </div>
      <div class="mt-6">

      <div class="sm:col-span-4">
          <label for="email" class="block text-sm font-medium text-gray-700">
            Role Name
          </label>
          <div class="mt-2 w-80">
            <input id="email" name="name" type="text" autocomplete="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
          </div>
      </div>

        <fieldset class="grid grid-cols-2 gap-4 mt-5">
          @forelse($modules->chunk(2) as $key => $chunks)
                  <div class="form-row">
                      @foreach($chunks as $key=>$module)
                          <div class="col">
                              <h5>Module: {{ $module->name }}</h5>
                              @foreach($module->permissions as $key=>$permission)
                                  <div class="mb-3 ml-4">
                                      <div class="custom-control custom-checkbox mb-2">
                                          <input type="checkbox" class="custom-control-input"
                                                id="permission-{{ $permission->id }}"
                                                value="{{ $permission->id }}"
                                                name="permissions[]"
                                          @if(isset($role))
                                              @foreach($role->permissions as $rPermission)
                                              {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                              @endforeach
                                          @endif
                                          >
                                          <label class="custom-control-label"
                                                for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      @endforeach
                  </div>
                    @empty
                        <div class="row">
                            <div class="col text-center">
                                <strong>No Module Found.</strong>
                            </div>
                        </div>
                    @endforelse
              </fieldset>
            </div>
        <div class="pt-5">
          <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Cancel
            </button>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
        </div>
      </form>
    </main>
  </div>
</div>
  
</x-app-layout>