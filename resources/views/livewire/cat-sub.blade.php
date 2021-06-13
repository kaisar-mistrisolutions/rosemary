<div>
    <div class="col-span-3 sm:col-span-2">
        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
            Category
        </label>
            <select id="category" name="category" wire:model="selectedCategory" autocomplete="category" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
                    <option hidden>
                        Select Category
                    </option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>
    </div>
        
    @if (!is_null($sub_categories))
    <div class="col-span-3 sm:col-span-2">
        <label for="quantity" class="block text-sm font-medium text-gray-700 mt-6 mb-2">
            Sub Category
        </label>
        <select id="sub_category" name="sub_category" wire:model="selectedSubCategory" autocomplete="sub_category" class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500  shadow-sm sm:max-w-lg sm:text-sm border-gray-300 rounded-md">
                <option hidden>
                    Select Sub Category
                </option>
                @foreach($sub_categories as $sub_category)
                <option value="{{ $sub_category->id }}">{{ $sub_category->name}}</option>
                @endforeach
        </select>
        
    </div>
    @endif


</div>
