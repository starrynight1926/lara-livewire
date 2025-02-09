<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="flex flex-col items-center p-6 space-y-6">
        <h1 class="text-4xl font-bold w-4/5 text-center">Quản lý sản phẩm</h1>
        
        <div class="w-4/5 p-4 bg-white shadow rounded-lg">
            <livewire:product-create />
            {{-- <form class="space-y-4" method="POST" action="{{ route('products.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Tên sản phẩm" class="w-full p-2 border rounded" required>
                <input type="number" name="price" placeholder="Giá sản phẩm" class="w-full p-2 border rounded" required>
                <input type="text" name="description" placeholder="Mô tả sản phẩm" class="w-full p-2 border rounded" required>
                <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Thêm sản phẩm</button>
            </form> --}}
        </div>
        
        @livewire('datatable-product')
        {{-- <table class="w-4/5 bg-white shadow rounded-lg">
            <thead>
                <tr class="border-b">
                    <th class="p-2">ID</th>
                    <th class="p-2">Tên sản phẩm</th>
                    <th class="p-2">Giá</th>
                    <th class="p-2">Mô tả</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="border-b">
                    <td class="p-2">{{ $product->id }}</td>
                    <td class="p-2">{{ $product->name }}</td>
                    <td class="p-2">{{ $product->price }}</td>
                    <td class="p-2">{{ $product->description }}</td>
                    <td class="p-2 flex space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">✏️</a>
                        <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div>
</body>
</html>
