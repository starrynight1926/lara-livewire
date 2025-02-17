<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class ProductList extends Component
{
	public $products, $name, $price, $detail, $addProduct = false, $updateProduct = false, $productId;

	public function mount()
    {

    }

    public function render()
    {
        $this->products = Product::latest()->get();
        return view('livewire.products.product-list');
    }

    public function createProduct()
    {
        $this->addProduct = true;
    }

    public function cancelAdd()
    {
        $this->addProduct = false;
    }

	public function storeProduct()
    {

       Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail
            // 'slug' => \Str::slug($this->title)
        ]);

        session()->flash('message', 'Thêm mới thành công.');
        $this->addProduct = false;
        $this->resetInputFields();
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->detail = $product->detail;
        $this->productId = $product->id;
        // dd($this->productId); // Add this line for debugging

        $this->updateProduct = true;
    }

    public function updateDataProduct()
    {
        $product = Product::find((int)$this->productId);
        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'detail' => $this->detail
        ]);

        session()->flash('message', 'Cập nhật thành công!.');
        $this->updateProduct = false;
        $this->resetInputFields();
    }

	public function cancelUpdate()
    {
        $this->reset();
        $this->updateProduct = false;
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'Xóa thành công!.');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->detail = '';
    }


}