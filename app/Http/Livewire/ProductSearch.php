<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Livewire\WithPagination;


class ProductSearch extends Component
{
    public $search;
    public $selectedCategory = null;

    use WithPagination;

    protected $quaryString = ['search'];

    public function render()
    {
        $categories=Category::all();
        $sub_categories = SubCategory::all();

        return view('livewire.product-search',[
            'categories' => $categories,
            'sub_categories' => $sub_categories,

            'products' =>$this->search===null? 
            Product::latest()->when($this->selectedCategory,function($query){$query->where('category_id',$this->selectedCategory);})->paginate(2) 
            : Product::where('name','LIKE','%'.$this->search.'%')->latest()->when($this->selectedCategory,function($query){$query->where('category_id',$this->selectedCategory);})->paginate(2)
        ]);
    }
}
