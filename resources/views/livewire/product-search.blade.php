<div>


  <main class="flex-1 relative z-0 overflow-y-fixed focus:outline-none">

        <div class="mx-5 mt-6">
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
      <h3 class="text-lg leading-6 font-medium text-gray-900 pt-8 pl-8 pb-2">
      Product List
      </h3>

      <div class="pb-5 bg-white shadow mx-6 my-2 border-gray-200 sm:flex sm:items-center sm:justify-between pt-4 pb-4">
        <div class="mt-3 sm:mt-0 sm:ml-4">
          <form class="text-lg leading-6 font-medium text-gray-900">
            <input id="search" name="search" type="search" wire:model="search" autocomplete="search" required class="w-full px-5 py-2 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs border-gray-300 rounded-md" placeholder="search product">
          </form>
      </div>

      <select id="category" name="category" autocomplete="category" wire:model="selectedCategory" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
          <option value="" >
            All Category
        </option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name}}</option>
        @endforeach
      </select>

      @if($selectedCategory !=0 && !is_null($selectedCategory))
      <select id="sub-category" name="sub-category" wire:model="selectedSub" autocomplete="sub-category" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
          <option value="hidden">
            All Sub Category
        </option>
        @foreach($sub_categories as $sub_category)
        <option value="{{ $sub_category->id}}">{{ $sub_category->name }}</option>
        @endforeach
      </select>
      @endif

          <div class="mt-3 sm:mt-0 sm:ml-4 pr-4 ">
          <a href="{{ route('app.products.create') }}"><button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 pr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
              Add a new product
          </button> </a>
          </div>
      </div>


      <!-- Product List -->
  <div class="flex flex-col">
  <div class="-my-2 overflow-x-fixed sm:-mx-6 lg:-mx-8 pl-12 pr-12">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-2">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-2 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Serial
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Product Image
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Product id
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Product Name
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Category
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Brand
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Status
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Quantity
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Unit Price After Discount
              </th>
              <th scope="col" class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
              </th>
              
            </tr>
          </thead>
          @foreach($products as $key=>$product)
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
            <td class="px-2 py-2 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $key+1 }}</div>
              </td>
              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img class="h-10 w-10 ml-8" src="{{ Storage::url($product->thumbnail_image) }}" alt="{{ $product->name }}">
                  </div>
                </div>
              </td>

              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->id }}</div>
              </td>

              <td class="px-6 py-4 text-center whitespace-nowrap text-sm font-medium text-gray-900">
                <a class="hover:bg-green-200 px-2 py-2 rounded-lg" href="{{ route('app.products.show', $product->id) }}">{{ $product->name }}</a>
              </td>

              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
              </td>

              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ $product->brand->name }}</div>
              </td>

              <td class="px-6 py-4 whitespace-nowrap">
                @if ($product->status==1)
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
                <div class="text-sm text-gray-900">{{ $product->quantity }}</div>
              </td>
              
              @if($product->discount_type == 'Percentage')
              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ ($product->per_unit_price * $product->discount) / 100 }} TK</div>
              </td>
              @else
              <td class="px-2 py-3 text-center whitespace-nowrap">
                <div class="text-sm text-gray-900">{{ ($product->per_unit_price - $product->discount) }} TK</div>
              </td>
              @endif
              
              <td class="ml-2 px-6 py-4 text-center text-center whitespace-nowrap text-sm font-medium">
              <a href="{{ route('app.products.edit', $product->id) }}" type="button" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg>
              </a>
              
            <form action="{{route('app.products.delete', $product->id)}}" method="POST" class="inline-flex items-center justify-center px-2 py-2 border border-transparent font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 sm:text-sm">
              @method('DELETE')
              @csrf
              <button type="submit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                  </svg>
              </button>               
            </form>
            </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      
      
      <div class="px-6 py-5">
          <span>{{ $products->links() }}</span>
      </div>

    </div>
  </div>
  </div>
  </main>

  
</div>