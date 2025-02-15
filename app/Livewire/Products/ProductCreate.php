<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;

class ProductCreate extends Component
{
    public $name = '';
    public $price = '';
    public $detail  = '';

    public function mount()
    {

    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255', // Validate dữ liệu
            'price' => 'required|numeric'
        ]);

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail
        ]);

        session()->flash('message', 'Product created successfully!');
        $this->reset(['name', 'price', 'detail']); // Clear the form
        $this->dispatch('productAdded'); // Gửi sự kiện Livewire
    }

    public function render()
    {
        return view('livewire.products.product-create');
    }
}
