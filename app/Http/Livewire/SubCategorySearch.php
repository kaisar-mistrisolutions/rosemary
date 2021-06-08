<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\SubCategory;
use App\Models\Category;

class SubCategorySearch extends Component
{
    public $search;

    // use WithPagination;

    protected $quaryString = ['search'];

    public function render()
    {
        // $category=Category::findOrFail($id);
        return view('livewire.sub-category-search', [
            // 'category' => $category,
            'sub_categories' => $this->search === null ? SubCategory::latest()->paginate(2) : SubCategory::where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate(2)
        ]);
    }
}
