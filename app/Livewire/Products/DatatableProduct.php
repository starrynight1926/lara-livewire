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

    public $editingProduct;

    public function refreshList()
    {
        // Khi có sản phẩm mới, component sẽ tự động cập nhật danh sách
    }

    public function render()
    {
        $products = Product::orderBy('id', 'desc')->paginate(5);
        return view('livewire.products.datatable-product', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->dispatch('editProduct', $product); // Gửi sự kiện để mở form chỉnh sửa
    }

    public function updateProduct($id, $data)
    {
        $product = Product::find($id);

        if ($product) {
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->detail = $data['detail'];
            $product->save();

            $this->dispatch('productUpdated'); // Gửi sự kiện cập nhật danh sách
        }
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