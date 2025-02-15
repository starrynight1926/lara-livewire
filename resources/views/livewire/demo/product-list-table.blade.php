<div>
    <!-- Ô tìm kiếm -->
    <input type="text" wire:model="search" placeholder="🔍 Tìm kiếm sản phẩm..." 
           style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;">

    @if (session()->has('message'))
        <div style="background-color: #4CAF50; color: white; padding: 10px; border-radius: 5px; margin-bottom: 10px;">
            {{ session('message') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse;">
        <thead style="background-color: #18181b; color: white;">
            <tr>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">ID</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Name</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Price</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Detail</th>
                <th style="padding: 10px; text-align: left; border-bottom: 2px solid #ddd;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->id }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->name }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ number_format($product->price, 0, ',', '.') }} VND</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->detail }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                        <button style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 4px;">
                            Edit
                        </button>
                        <button wire:click="deleteProduct({{ $product->id }})"
                                style="padding: 5px 10px; background-color: #f44336; color: white; border: none; cursor: pointer; border-radius: 4px;">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Phân trang -->
    <div style="margin-top: 10px;">
        {{ $products->links() }}
    </div>
</div>