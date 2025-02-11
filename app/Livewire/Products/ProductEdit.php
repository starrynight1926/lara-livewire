<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductEdit extends Component
{
    public $product;

    protected $listeners = ['editProduct' => 'loadProduct'];

    public function mount()
    {
        $this->product = new Product(); // Khởi tạo đối tượng Product mặc định
    }

    public function loadProduct(Product $product)
    {
        $this->product = $product;
    }

    public function save()
    {
        $this->validate([
            'product.name' => 'required|string|max:255',
            'product.price' => 'required|numeric',
            'product.detail' => 'required|string',
        ]);

        $this->product->save();

        $this->dispatch('productUpdated'); // Gửi sự kiện cập nhật danh sách
    }

    public function render()
    {
        return view('livewire.products.product-edit');
    }
}