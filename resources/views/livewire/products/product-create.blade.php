<div style="max-width: 400px; margin: 0 auto;">
    <form wire:submit.prevent="submit">
        <div style="margin-bottom: 10px;">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" wire:model="name" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error("name")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        
        <div style="margin-bottom: 10px;">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control" wire:model="price" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error("price")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 10px;">
            <label for="detail">Detail:</label>
            <input type="text" name="detail" class="form-control" wire:model="detail" style="width: 100%; padding: 8px; margin-top: 5px;">
            @error("detail")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" style="padding: 10px 15px; background-color: blue; color: white; border: none; cursor: pointer;">
            Submit
        </button>
    </form>
</div>