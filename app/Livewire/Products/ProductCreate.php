<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductCreate extends Component
{
    public Product $newProduct; // Biến riêng cho form create

    public function mount()
    {
        $this->newProduct = new Product(); // Khởi tạo đối tượng mới
    }

    public function save()
    {
        $this->validate([
            'newProduct.name' => 'required|string|max:255', // Validate dữ liệu
            'newProduct.price' => 'required|numeric',
            'newProduct.detail' => 'required|string',
        ]);

        $this->newProduct->save(); // Lưu sản phẩm mới

        session()->flash('message', 'Product created successfully!');
        $this->dispatch('productCreated'); // Gửi sự kiện Livewire
    }

    public function render()
    {
        return view('livewire.products.product-create');
    }
}