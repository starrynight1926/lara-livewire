<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class DatatableProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    protected $listeners = ['productAdded' => 'refreshList', 'productUpdated' => 'refreshList', 'productDeleted' => 'refreshList'];

    public function refreshList()
    {
        // Khi có sản phẩm mới, component sẽ tự động cập nhật danh sách
    }

    public function render()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('livewire.products.datatable-product', compact('products'));
    }

    public function edit($productId)
    {
        $this->dispatch('editProduct', productId: $productId); // Gửi sự kiện đến ProductEdit Component
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            $this->dispatch('productDeleted'); // Gửi sự kiện cập nhật danh sách
        }
    }
}
