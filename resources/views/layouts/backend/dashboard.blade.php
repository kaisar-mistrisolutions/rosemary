@extends('layouts.backend.app')
@section('title','Dashboard')

@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
  <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        @role('admin')
          <h1 class="text-2xl font-semibold text-gray-900">@lang('dashboard.admindashboarad')</h1>
          (@lang('dashboard.hi') {{ Auth::user()->name }} , @lang('dashboard.welcomeback'))
        @else 
         Hi {{ Auth::user()->name }} !
        <h1 class="text-2xl font-semibold text-gray-900">@lang('dashboard.welcome')</h1>
        @endrole
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">

          <!-- Stats Start -->
          <div class="py-4">
            <div class="border-4 border-dashed border-gray-200 rounded-lg h-120">
                  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 pl-6 pt-2 pr-6 pb-6">
                    <div class="relative bg-white hover:bg-blue-100 pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">@lang('dashboard.total_users')</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $userCount }}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.users.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> @lang('dashboard.view_all')<span class="sr-only"> Total Subscribers stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>

                    <div class="relative bg-white hover:bg-blue-100 pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">@lang('dashboard.total_roles')</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $roleCount }}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.roles.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> @lang('dashboard.view_all')<span class="sr-only"> Avg. Open Rate stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>

                    <div class="relative bg-white hover:bg-blue-100  pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                      <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                          <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                          </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">@lang('dashboard.total_products')</p>
                      </dt>
                      <dd class="ml-16 pb-6 flex items-baseline sm:pb-7">
                        <p class="text-2xl font-semibold text-gray-900">
                          {{ $productCount}}
                        </p>
                        <div class="absolute bottom-0 inset-x-0 bg-gray-50 px-4 py-4 sm:px-6">
                          <div class="text-sm">
                            <a href="{{ route('app.products.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500"> @lang('dashboard.view_all')<span class="sr-only"> Avg. Click Rate stats</span></a>
                          </div>
                        </div>
                      </dd>
                    </div>
                  </dl>
                </div>
                <!-- Stats End -->

                <!-- Last Logged Section Start-->
            <div class="shadow overflow-hidden border-b p-8 border-gray-200 sm:rounded-lg">
            @lang('dashboard.last_loggedin')
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-2 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    @lang('dashboard.serial')
                    </th>
                    <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    @lang('dashboard.name')
                    </th>
                    <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    @lang('dashboard.role')
                    </th>
                    <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    @lang('dashboard.email')
                    </th>
                    <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    @lang('dashboard.last_login')
                    </th>
                  </tr>
                </thead>
                
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $key=>$user)
                  <tr>
                  <td class="px-2 py-2 text-center whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $key+1 }}</div>
                    </td>
                    <td class="px-2 py-3 text-center whitespace-nowrap">
                      <div class="text-sm text-gray-900 ">{{ $user->name }}</div>
                    </td>
                    <td class="px-2 py-3 text-center whitespace-nowrap">
                    @if($user->role->name == "Admin")
                      <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-500 text-white">{{ $user->role->name }}</div>
                    @else
                    <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">{{ $user->role->name }}</div>
                    @endif
                    </td>
                    <td class="px-2 py-3 text-center whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $user->email }}</div>
                    </td>
                    <td class="px-2 py-3 text-center whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $user->last_login_at  }}</div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
          <!-- Last Logged Section End-->
      </div>
    </div>
  </div>
</main>
@endsection