<div>
    @if (isset($productEdit->id)) <!-- Kiểm tra xem $productEdit->id có tồn tại không -->
        <form wire:submit.prevent="save">
            <!-- Trường Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input 
                    type="text" 
                    wire:model="productEdit.name"
                    id="name" 
                    class="w-full px-3 py-2 border rounded" 
                >
                @error('productEdit.name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Trường Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price</label>
                <input 
                    type="number" 
                    wire:model="productEdit.price"
                    id="price" 
                    class="w-full px-3 py-2 border rounded" 
                >
                @error('productEdit.price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Trường Detail -->
            <div class="mb-4">
                <label for="detail" class="block text-gray-700">Detail</label>
                <textarea 
                    wire:model="productEdit.detail"
                    id="detail" 
                    class="w-full px-3 py-2 border rounded"
                ></textarea>
                @error('productEdit.detail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Nút Save -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Save</button>
        </form>
    @endif
</div>