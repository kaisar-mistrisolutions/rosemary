@extends('layouts.backend.app')
@section('title', 'Add Role')

@section('content')

<main class="flex-1 relative z-0 overflow-y-auto focus:outline-none">
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
              <a href="{{ route('app.roles.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">All Roles</a>
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

  <div class="row">
    <div class="col-12">
        <div class="main-card mb-3 card">
          <form id="roleFrom" role="form" method="POST" action="{{ isset($role) ? route('app.roles.update',$role->id)  : route('app.roles.store') }}">
              @csrf
              @if (isset($role))
                  @method('PUT')
              @endif
            <div class="sm:col-span-4">
                <label for="email" class="block text-sm font-medium text-gray-700">
                  Role Name
                </label>
                <div class="mt-2 w-80">
                  <input id="email" name="name" type="text" value="{{ $role->name ?? old('name') }}" @error('name') is-invalid @enderror autocomplete="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('name')
                  <span class="invalid-feedback text-red-600" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="text-center pt-6 pb-4">
                <strong>Manage permissions for role</strong>
                @error('permissions')
                <p class="p-2">
                  <span class="text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                </p>
                @enderror
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
                                  <strong>No Module Found</strong>
                              </div>
                          </div>
                        @endforelse
            </fieldset>
          </div>
          <div class="pt-5">
            <div class="flex justify-end">
              <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </div>
      </form>
</main>

@endsection