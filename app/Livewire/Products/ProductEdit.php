<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductEdit extends Component
{
    public Product $productEdit; // Khai báo biến public

    protected $listeners = ['editProduct' => 'loadProduct'];

    public function mount()
    {
        $this->productEdit = new Product(['id' => null]); // Khởi tạo với id là null
    }

    public function loadProduct($productId)
    {
        logger("Loading product with ID: $productId"); // Debug log
        try {
            $this->productEdit = Product::findOrFail($productId); // Tìm sản phẩm theo ID
            logger("Product loaded: " . json_encode($this->productEdit->toArray())); // Debug log
            $this->render(); // Render lại view
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Product not found!');
            $this->productEdit = new Product(); // Reset product
        }
    }

    public function save()
    {
        $this->validate([
            'productEdit.name' => 'required|string|max:255', // Validate dữ liệu
            'productEdit.price' => 'required|numeric',
            'productEdit.detail' => 'required|string',
        ]);

        $this->productEdit->save(); // Lưu thay đổi

        session()->flash('message', 'Product updated successfully!');
        $this->dispatch('productUpdated'); // Gửi sự kiện Livewire
    }

    public function render()
    {
        return view('livewire.products.product-edit');
    }
}