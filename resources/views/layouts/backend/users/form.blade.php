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

    <div class="px-4 py-5 ">
          <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
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
                    <a href="{{ route('app.users.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">All Users</a>
                </div>
                </li>
            </ol>
          </nav>
          </div>
     </div>

      
    <div class="md:grid md:grid-cols-3 md:gap-6 pr-20 pl-10 pb-20 pt-10">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Add a New User</h3>
        <p class="mt-1 text-sm text-gray-600">
         Fill the form to add a new user.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
    <form id="userFrom" role="form" method="POST" action="{{ isset($user) ? route('app.users.update',$user->id)  : route('app.users.store') }}" enctype="multipart/form-data">
      @csrf
      @if (isset($user))
          @method('PUT')
      @endif
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            
              <div class="col-span-3 sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700">
                  User Name
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}" @error('name') is-invalid @enderror class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="User name">
                </div>
                @error('name')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>

              <div class="col-span-3 sm:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                  Role
                </label>
              <select id="role" name="role" autocomplete="role" @error('role') is-invalid @enderror class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
                  <option hidden>
                    Select Role
                  </option>
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}" @isset($user) {{ $user->role->id == $role->id ? 'selected' : ''}} @endisset >{{ $role->name }}</option>
                  @endforeach
              </select>
            </div>
              @error('role')
              <span class="invalid-feedback text-red-600" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <div class="col-span-6 sm:col-span-3">
                <label for="discount" class="block text-sm font-medium text-gray-700 pb-2">Status</label>
                <span class="slider round mx-1">Active : </span>
                <input type="checkbox" name="status" checked?value=1:value=0 @isset($user) {{ $user->status == true ? 'checked' : ''}} @endisset>
            </div>


            <div>
              <label for="description" class="block text-sm font-medium text-gray-700">
                Email Address
              </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="email" name="email" id="email" value="{{ $user->email ?? old('email') }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="example@email.com">
                </div>
                @error('email')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700">
                  Phone Number
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="tel" name="phone" id="phone" value="{{ $user->phone ?? old('phone') }}" @error('phone') is-invalid @enderror class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="+880">
                </div>
                @error('phone')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700">
                  Address
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="address" id="address" value="{{ $user->address ?? old('address') }}" @error('address') is-invalid @enderror class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="Write the address here">
                </div>
                @error('address')
                <span class="invalid-feedback text-red-600" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="password" class="block text-sm font-medium text-gray-700">
                  Password
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="password" name="password" id="password" @error('password') is-invalid @enderror class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="">
                </div>
                @error('password')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">
                  Confirm Password
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="password" name="password_confirmation" id="confirm_password" @error('password') is-invalid @enderror class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="">
                </div>
                @error('password')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
            </div>


            <div x-data="{photoName: null, photoPreview: null}" class="col-span-2 ">
                <input type="file" class="hidden" name="image" @error('image') is-invalid @enderror x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            ">
              
                <div class="mt-2" x-show="photoPreview">
                  <span class="block  w-50 h-80" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"></span>
                </div>
              
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2" x-on:click.prevent="$refs.photo.click()">
                  Upload Profile Photo
              </button>
              </div>    
              @error('image')
                <span class="invalid-feedback text-red-600" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror

          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
               Add
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

    </main>
  </div>
</div>
</x-app-layout>