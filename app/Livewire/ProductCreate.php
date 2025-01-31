<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductCreate extends Component
{
    public $name, $price, $detail;

    public function render()
    {
        return view('livewire.product-create');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'detail' => 'nullable|string',
        ]);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail,
        ]);

        // Reset input fields
        $this->reset(['name', 'price', 'detail']);

        // Gửi event productAdded để cập nhật danh sách
        $this->dispatch('productAdded');
    }
}
