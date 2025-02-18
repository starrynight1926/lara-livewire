<div class="card">
    <div class="card-header">
        Thêm sản phẩm
    </div>
    <div class="card-body">
       <form wire:submit.prevent="storePost">
            <div class="mt-2">
                <label for="title">Tên sản phẩm</label>
                <input type="text" class="form-control" id="title" wire:model="title">

                <label for="detail">Nội dung</label>
                <input type="text" class="form-control" id="detail" wire:model="detail">
            </div>
            <button class="btn btn-success mt-3">Thêm sản phẩm</button>
            <button class="btn btn-cancel mt-3" type="button" wire:click="cancelAdd()">Hủy</button>
       </form>
        
    </div>
</div>