<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class DatatableProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['productAdded' => 'refreshList'];

    public function refreshList()
    {
        // Khi có sản phẩm mới, component sẽ tự động cập nhật danh sách
    }

    public function render()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('livewire.datatable-product', compact('products'));
    }
}

