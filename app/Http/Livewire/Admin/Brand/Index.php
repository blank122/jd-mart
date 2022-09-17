<?php

namespace App\Http\Livewire\Admin\Brand;


use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;


class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand_id;

    public function delete($brand_id)
    {

        // dd($category_id);
        $this->brand_id = $brand_id;
    }

    public function destroy()
    {
       $brand = Brand::find($this->brand_id); //will search the id of categories from the database
       $brand->delete();
       session()->flash('message', 'Category Deleted');
       $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
