<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 p-6">
    <div class="flex flex-col items-center p-6 space-y-6">
        <h1 class="text-4xl font-bold w-4/5 text-center">Quản lý sản phẩm</h1>

        <div class="w-4/5 p-4 shadow rounded-lg">
            @livewire('products.product-create')
        </div>

        @livewire('products.datatable-product')


        @livewire('products.product-edit')
    </div>
    @livewireScripts
</body>
</html>
