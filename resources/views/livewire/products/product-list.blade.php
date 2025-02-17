<div>
    @if($updateProduct)
        @include('livewire.products.product-update')
    @endif
    
    @session('message')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession()

    @if($addProduct)
        @include('livewire.products.product-create')
    @else
        <button class="btn btn-primary mt-3" wire:click="createProduct()">Thêm sản phẩm</button>
    @endif

    <h2 class="mb-4 mt-3">Danh sách sản phẩm</h2>
    <table class="table table-striped">
        <thead>
            <tr scope="row">
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Mô tả sản phẩm</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($products))
                @foreach ($products as $product)
                    <tr scope="row">
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</th>
                        <td>{{$product->price}}</th>
                        <td>{{$product->detail}}</th>
                            <td>
                                <button class="btn btn-primary" wire:click="editProduct({{$product->id}})">Sửa</button>
                                <button class="btn btn-danger" wire:click="deleteProduct({{$product->id}})">Xóa</button>
                            </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>