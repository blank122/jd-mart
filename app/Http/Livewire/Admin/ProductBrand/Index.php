<?php

namespace App\Http\Livewire\Admin\ProductBrand;

use App\Models\ProductBrand;
use Livewire\WithPagination;
use Livewire\Component;

class Index extends Component
{   

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $product_brand_id;

    public function delete($product_brand_id)
    {
        // dd($category_id);
        $this->product_brand_id = $product_brand_id;
    }

    public function destroy()
    {
       $product_brand = ProductBrand::find($this->product_brand_id); //will search the id of categories from the database
       $product_brand->delete();
       session()->flash('message', 'Brand has been Deleted');
       $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {   
        $product_brands = ProductBrand::orderBy('id', 'DESC')->paginate(3);
        return view('livewire.admin.product-brand.index', ['product_brands' => $product_brands]);
    }
}
