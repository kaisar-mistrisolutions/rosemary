<div>
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
            
                <!-- Category info -->
            <div class="w-full flex items-end justify-between p-6 space-x-6">
                <div class="flex-2 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Category List
                        </h3>
                    </div>
                    
                
                <!-- Category Search -->
                <form action="#" method="get" role="search">
                    <input type="text" name="search" id="search" wire:model="search" class="mt-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Search Here"/>
                </form>
                
                </div>
                <a href="{{ route('app.categories.create') }}" type="button" class="inline-flex items-center px-4 py-2 mt-5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                    Create New Category
                </a>
            </div>

        <!-- Category info End -->

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Serial
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Image
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Category Name
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Total Sub Categories
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created at
                </th>
                <th scope="col" class="px-20 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
                </th>
            </tr>
            </thead>
            @foreach ($categories as $key => $category)
            <tbody>
            <!-- Odd row -->

                <tr class="bg-white">
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                        {{ $key + 1 }}
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                        <img class="h-10 w-10 ml-4 rounded-full" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}">
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">{{$category->name}}</div>
                        <a href="{{ route('app.sub.categories.index', $category->id)}}" class="text-sm leading-5 text-gray-500 hover:text-indigo-900">
                        View sub category
                        </a>
                    </td>
                    </td>
                    <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                        <a class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-800" >{{ $category->subcategories->count() }}</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $category->created_at->diffForHumans() }}
                    </td>
                    <td class="ml-2 px-6 py-4 text-center whitespace-nowrap text-sm font-medium">
                    <a href="{{ route('app.categories.edit', $category->id) }}" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </a>

                    <!-- <form action="{{route('app.categories.delete',$category->id)}}" method="POST" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </button>               
                    </form> -->
                    
                    @if($confirming===$category->id)
                    <button wire:click="kill({{ $category->id }})"
                    class="bg-red-600 text-white hover:bg-red-700 inline-flex items-center justify-center px-2 pt-1 border border-transparent font-medium rounded-md bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                    <p class="h-5 w-20">Confirm</p>
                    </button>   
                    @else
                    <a href="#" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" wire:click="confirmDelete({{ $category->id }})" fill="currentColor">
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
            <span>{{ $categories->links() }}</span>
        </div>
        
        </div>
    </div>

</div>
