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

    // Lắng nghe sự kiện productDeleted để cập nhật danh sách sản phẩm
    protected $listeners = ['productDeleted' => 'refreshTable'];

    // Hàm refresh lại danh sách sản phẩm khi có sản phẩm bị xóa
    public function refreshTable()
    {
        $this->dispatch('productAdded');
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
