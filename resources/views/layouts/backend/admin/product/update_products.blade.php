@extends('layouts.backend.app')
@section('title','Update Product')

@section('content')
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
                    <a href="{{ route('app.products.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">All Products</a>
                </div>
                </li>
            </ol>
          </nav>
          
          <div class="ml-4 mt-2 pr-16 mt-9 flex-shrink-0">
              <a href="{{route('app.products.index')}}">
                <button type="button" class="relative inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
                  Back
                </button>
              </a>
            </div>
          </div>
     </div>

      
    <div class="md:grid md:grid-cols-3 md:gap-6 pr-20 pl-10 pb-20 pt-10">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Add a New Product</h3>
        <p class="mt-1 text-sm text-gray-600">
         Fill the form to add a new product.
        </p>
      </div>
    </div>

    <!-- Product Update Form Start -->
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="{{ route('app.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700">
                  Product Name
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="name" id="name" value="{{ $product->name }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="product name">
                </div>
              </div>
            </div>

            <div>
              <label for="description" class="block text-sm font-medium text-gray-700">
                Description
              </label>
              <div class="mt-1">
                <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="write here..">{{ $product->description }}</textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Brief description for the product
              </p>
            </div>

            <!-- cat-sub livewire component -->
            @livewire('cat-sub')
            
            <div class="col-span-3 sm:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                  Brand
                </label>
                <select id="brand" name="brand" autocomplete="brand" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if($product->brand->id==$brand->id)selected @endif>{{ $brand->name }}</option>
                  @endforeach
                </select>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-gray-700">
                  Quantity
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="number" min="1" name="quantity" id="quantity" value="{{ $product->quantity }}" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="">
                </div>
            </div>

            <div class="col-span-3 sm:col-span-2">
                <label for="per_unit_price" class="block text-sm font-medium text-gray-700">
                  Per Unit Price
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="number" min="1" step="any" value="{{ $product->per_unit_price }}" name="per_unit_price" id="per_unit_price" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="">
                </div>
            </div>

            <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
            <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                  Discount Type
                </label>
            <select id="discount_type" name="discount_type" value=""  autocomplete="discount_type" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
                  <option value="{{ $product->discount_type }}" hidden="">
                    Choose Discount Type
                  </option>
                  <option>Flat</option>
                  <option>Percentage</option>
              </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="discount" class="block text-sm font-medium text-gray-700">Discount</label>
              <input type="number" min="1" name="discount" value="{{ $product->discount }}" id="discount" autocomplete="discount" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="discount" class="block text-sm font-medium text-gray-700 pb-2">Status</label>
              <span class="slider round mx-1">Active : </span> 
              <input type="checkbox" name="status" {{ ($product->status=="1")? "checked" : "" }}>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Product Current Thumbnail
              </label>
               <!-- Current Profile Photo -->
               <div class="mt-2" x-show="! photoPreview" value="{{ $product->thumbnail_image }}" style="display: block;">
                    <img class="h-80 w-80 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md" src="{{Storage::url($product->thumbnail_image)}}" class="rounded-full h-20 w-20 object-cover">
                </div>

              <label class="block text-sm font-medium text-gray-700 mt-6">
                Upload New Product Thumbnail
              </label>
              <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                  <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                  
                  <div class="flex text-sm text-gray-600">
                    <label for="thumbnail_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                      <span>Upload a Thumbnail Image</span>
                      <input id="thumbnail_image" name="thumbnail_image" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                  </div>
                  <p class="text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                  </p>
                </div>
              </div>

            <div x-data="{photoName: null, photoPreview: null}" class="col-span-2 ">
                <input type="file" class="hidden" name="multiple_image" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            ">
                <div class="mt-2" x-show="photoPreview" >
                  <span class="block  w-50 h-80" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'"></span>
                </div>
              
                <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2" x-on:click.prevent="$refs.photo.click()">
                  Upload Multiple Image
                </button>
              </div>    
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
               Update
            </button>
          </div>
        </div>
      </form>
    </div>
    <!-- Product Update Form End -->

  </div>
</main>

@endsection