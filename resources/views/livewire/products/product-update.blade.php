<div class="card">
    <div class="card-header">
        Sửa sản phẩm
    </div>
    <div class="card-body">
        <form wire:submit="updateDataProduct">
            <div class="mt-2">
                <label for="name">Tên</label>
                <input type="text" class="form-control" id="name" wire:model="name">

                <label for="price">Giá</label>
                <input type="text" class="form-control" id="price" wire:model="price">

                <label for="detail">Nội dung</label>
                <input type="text" class="form-control" id="detail" wire:model="detail">
            </div>
            <button class="btn btn-success mt-3" type="submit">Sửa</button>
            <button class="btn btn-cancel mt-3" type="button" wire:click="cancelUpdate()">Hủy</button>
        </form>
        
    </div>
</div>