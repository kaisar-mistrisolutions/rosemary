<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use Livewire\WithPagination;


class ProductSearch extends Component
{
    public $search;

    use WithPagination;

    protected $quaryString = ['search'];

    public function render()
    {
        return view('livewire.product-search', [
            
            'products' => $this->search === null ? Product::latest()->paginate(2) : Product::where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate(2)
        ]);
    }
}
