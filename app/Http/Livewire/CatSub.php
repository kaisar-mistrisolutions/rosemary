<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use App\Models\SubCategory;

class CatSub extends Component
{
    public $selectedCategory = null;
    public $selectedSubCategory = null;
    public $sub_categories = null;
    
    public function render()
    {
        return view('livewire.cat-sub',[
            'categories' => Category::all(),
        ]);
    }

    public function updatedSelectedCategory($category_id)
    {
        $this->sub_categories = SubCategory::where('category_id', $category_id)->get();
    }
}
