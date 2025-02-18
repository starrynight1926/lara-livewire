<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class PostList extends Component
{
	public $posts, $title, $detail, $addPost = false, $updatePost = false, $postId;

	public function mount()
    {

    }

    public function render()
    {
        $this->posts = Post::latest()->get();
        return view('livewire.posts.post-list');
    }

    public function createPost()
    {
        $this->addPost = true;
    }

    public function cancelAdd()
    {
        $this->addPost = false;
    }

	public function storePost()
    {

       Post::create([
            'title' => $this->title,
            'detail' => $this->detail
            // 'slug' => \Str::slug($this->title)
        ]);

        session()->flash('message', 'Thêm mới thành công.');
        $this->addPost = false;
        $this->resetInputFields();
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        $this->title = $post->title;
        $this->detail = $post->detail;
        $this->postId = $post->id;
        // dd($this->postId); // Add this line for debugging

        $this->updatePost = true;
    }

    public function updateDataPost()
    {
        $post = Post::find((int)$this->postId);
        $post->update([
            'title' => $this->title,
            'detail' => $this->detail
        ]);

        session()->flash('message', 'Cập nhật thành công!.');
        $this->updatePost = false;
        $this->resetInputFields();
    }

	public function cancelUpdate()
    {
        $this->reset();
        $this->updatePost = false;
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        session()->flash('message', 'Xóa thành công!.');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->price = '';
        $this->detail = '';
    }


}