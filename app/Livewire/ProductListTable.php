<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductListTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['productAdded' => 'refreshList'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Sản phẩm đã bị xóa!');
        }
    }

    public function refreshList()
    {
        // Khi có sản phẩm mới, Livewire sẽ tự động render lại danh sách
    }

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return view('livewire.product-list-table', compact('products'));
    }

}
