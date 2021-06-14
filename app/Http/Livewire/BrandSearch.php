<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Brand;
use Livewire\WithPagination;

class BrandSearch extends Component
{
    public $search;
    public $confirming;

    use WithPagination;

    protected $quaryString = ['search'];

    public function render()
    {
        return view('livewire.brand-search', [
            'brands' => $this->search === null ? Brand::latest()->paginate(2) : Brand::where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate(2)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Brand::destroy($id);
    }
}
