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
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'detail' => 'nullable|string',
            'price' => 'required|numeric|min:0'
        ]);
        $product = Product::create($validatedData);
        // $info($this->name);
        $this->reset(['name', 'detail', 'price']);
        session()->flash('message', 'Sản phẩm đã được tạo thành công!');
    }
}
