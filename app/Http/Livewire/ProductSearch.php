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
    public $subCategory = null;
    public $selectedSub = null;
    public $confirming = null;

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
            Product::latest()->when($this->selectedCategory,function($query){$query->where('category_id',$this->selectedCategory);
            })
            ->when($this->selectedSub,function($query){$query->where('sub_category_id',$this->selectedSub);
            })
            ->paginate(2) 
            : Product::where('name','LIKE','%'.$this->search.'%')->latest()->when($this->selectedCategory,function($query){$query->where('category_id',$this->selectedCategory);})->paginate(2)
        ]);
    }

    public function updatedSelectedCategory($category_id)
    {
        $this->subCategory = SubCategory::where('category_id', $category_id)->get();
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Product::destroy($id);
    }

}
