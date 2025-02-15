<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductEdit extends Component
{
    public Product $productEdit; // Khai báo biến public
    // public $productEdit = ['id' => null, 'name' => '', 'price' => '', 'detail' => ''];


    protected $listeners = ['editProduct' => 'loadProduct'];

    public function mount($productId = null)
    {
        $this->productEdit = new Product(['id' => null]); // Initialize with a new Product
        if ($productId) {
            $this->loadProduct($productId);
        }
    }

    public function loadProduct($productId)
    {
        logger("Loading product with ID: $productId");
        try {
            $this->productEdit = Product::findOrFail($productId);
            // logger("Product loaded: " . json_encode($this->productEdit->toArray()));
            $this->render(); // Render lại view
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Product not found!');
            $this->productEdit = new Product();
        }
    }

    // Log khi giá trị thay đổi
    public function updated($propertyName)
    {
        logger("Property updated: $propertyName");
        logger("Current productEdit data: " . json_encode($this->productEdit->toArray()));
    }

    public function saveEdit()
    {
        // $this->validate([
        //     'productEdit.name' => 'required|string|max:255', // Validate dữ liệu
        //     'productEdit.price' => 'required|numeric',
        //     'productEdit.detail' => 'required|string',
        // ]);

        try {
            $product = Product::findOrFail($this->productEdit->id);
            $product->name = $this->productEdit->name;
            $product->price = $this->productEdit->price;
            $product->detail = $this->productEdit->detail;
            $product->save();

            session()->flash('success', 'Product updated successfully!');

            // Reset form after successful save
            $this->reset('productEdit');
            $this->productEdit = new Product(['id' => null]);

        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Product not found!');
        }
    }


    public function render()
    {
        return view('livewire.products.product-edit');
    }
}
