@extends('layouts.backend.app')
@section('title', 'Users')

@section('content')
    <div class="flex flex-col px-6 py-8 w-full">
        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
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
            <div class="w-full flex items-end justify-between pb-6 pt-2 pl-6 pr-6 space-x-6">
            <div class="flex-2 truncate">
                <div class="flex items-center space-x-3">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Users Information
                    </h3>
                </div>
            </div>
            <a href="{{ route('app.users.create') }}" type="button" class="inline-flex items-center px-4 py-2 mt-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
                Add New User
            </a>
        </div>

        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
              @foreach($users as $key=>$user)
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                <td class="px-2 py-2 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $key+1 }}</div>
                  </td>
                  <!-- <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10" src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}">
                      </div>
                    </div>
                  </td> -->
                  <td class="px-2 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                                <img class="h-10 w-10 ml-10" src="{{ Storage::url($user->image) }}" alt="{{ $user->name }}">
                            </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $user->name }}</div>
                  </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                  </td>
                  <td class="px-6 py-4 text-center whitespace-nowrap">
                    @if ($user->status==1)
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                        Active
                      </span>
                    @else 
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                      Inactive
                    </span>
                    @endif
                  </td>
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $user->created_at->diffForHumans() }}</div>
                  </td>
                  
                  <td class="px-2 py-3 text-center whitespace-nowrap">
                <a href="{{ route('app.users.edit', $user->id) }}" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                </a>
                
                @if ($user->role->deletable == true)
                    <form action="{{ route('app.users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                        </svg>
                      </button>
                    </form> 
                    @endif
                    
                </td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
    </div>
</div>

@endsection