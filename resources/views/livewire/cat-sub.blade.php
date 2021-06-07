<div>
     <select id="category" name="category" wire:model="selectedCategory" autocomplete="category" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
            <option value="" hidden >
                Select Category
            </option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
    </select>

    
    @if (!is_null($sub_categories))
    <div class="mt-8">
    <select id="sub-category" name="sub_category" wire:model="selectedSubCategory" autocomplete="sub-category" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
            <option selected="" disabled="" hidden="">
                Select Sub Category
            </option>
            @foreach($sub_categories as $sub_category)
            <option value="{{ $sub_category->id }}">{{ $sub_category->name}}</option>
            @endforeach
    </select>
    </div>
    @endif

</div>
