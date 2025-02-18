<div class="card">
    <div class="card-header">
        Cập nhật bài viết
    </div>
    <div class="card-body">
       <form wire:submit.prevent="updateDataPost">
            <div class="mt-2">
                <label for="title">Tên bài viết</label>
                <input type="text" class="form-control" id="title" wire:model="title">

                <label for="detail">Nội dung</label>
                <input type="text" class="form-control" id="detail" wire:model="detail">
            </div>
            <button class="btn btn-success mt-3">Cập nhật bài viết</button>
            <button class="btn btn-cancel mt-3" type="button" wire:click="cancelUpdate()">Hủy</button>
       </form>
        
    </div>
</div>