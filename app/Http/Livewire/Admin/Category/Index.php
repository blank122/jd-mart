<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Controllers\Admin\CategoryController;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $categories = Category::orderBy('id', 'DESC')->paginate(10); //all() is an eloquent method that gets all the query from a certain model
        // we will get the data from our server and will paginate it 
        //       
        return view('livewire.admin.category.index', ['categories' => '$categories']);
    }
}
