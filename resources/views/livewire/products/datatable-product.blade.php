<div>
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
            @foreach($products as $product)
            <tr>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->id }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->name }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">${{ number_format($product->price, 2) }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $product->detail }}</td>
                <td style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <button wire:click="edit({{ $product->id }})" style="padding: 5px 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 4px;">Edit</button>
                    <button wire:click="delete({{ $product->id }})" style="padding: 5px 10px; background-color: #f44336; color: white; border: none; cursor: pointer; border-radius: 4px;">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center">
        {{ $products->links() }}
    </div>
</div>

