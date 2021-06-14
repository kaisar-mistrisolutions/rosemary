<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Category;
use Livewire\WithPagination;

class CategorySearch extends Component
{
    public $search;
    public $confirming;

    use WithPagination;

    protected $quaryString = ['search'];

    public function render()
    {
        return view('livewire.category-search', [
            'categories' => $this->search === null ? Category::latest()->paginate(2) : Category::where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate(2)
        ]);
    }

    public function confirmDelete($id)
    {
        $this->confirming = $id;
    }

    public function kill($id)
    {
        Category::destroy($id);
    }
}
