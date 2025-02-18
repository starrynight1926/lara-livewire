<div>
    @if($updatePost)
        @include('livewire.posts.post-update')
    @endif
    
    @session('message')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession()

    @if($addPost)
        @include('livewire.posts.post-create')
    @else
        <button class="btn btn-primary mt-3" wire:click="createPost()">Thêm bài viết</button>
    @endif

    <h2 class="mb-4 mt-3">Danh sách bài viết</h2>
    <table class="table table-striped">
        <thead>
            <tr scope="row">
                <th scope="col">#</th>
                <th scope="col">Tên bài viết</th>
                <th scope="col">Giá</th>
                <th scope="col">Nội dung</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($posts))
                @foreach ($posts as $post)
                    <tr scope="row">
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</th>
                        <td>{{$post->detail}}</th>
                            <td>
                                <button class="btn btn-primary" wire:click="editPost({{$post->id}})">Sửa</button>
                                <button class="btn btn-danger" wire:click="deletePost({{$post->id}})">Xóa</button>
                            </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>