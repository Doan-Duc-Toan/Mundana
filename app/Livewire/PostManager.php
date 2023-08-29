<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Post;
use App\Models\Cat;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class PostManager extends Component
{
    use WithFileUploads;
    public $cats;

    #[Rule('required', message: 'Hãy nhập tiêu đề cho bài viết', translate: false)]
    public string $title;
    #[Rule('required', message: 'Hãy nhập phần giới thiệu cho bài viết', translate: false)]
    public string $intro;
    #[Rule('required', message: 'Hãy nhập nội dung bài viết', translate: false)]
    public string $content;

    #[Rule('required', message: "Hãy chọn danh mục cho bài viết", translate: false)]
    public $select_cats = [];

    #[Rule('image|max:10240', message: "Hãy chọn hình ảnh cho bài viết")] // 1MB Max
    public $photo;
    public function mount()
    {
        $this->cats = Cat::all();
    }
    public function save()
    {
        $user = Auth::user();
        $this->validate();
        $path = $this->photo->store('images', 'public');
        $post = Post::create([
            'title' => $this->title,
            'intro' => $this->intro,
            'content' => $this->content,
            'user_id' => $user->id,
            'thumb' => $path
        ]);
        $post->cats()->attach($this->select_cats);
        $this->photo = null;
        $this->select_cats = [];
        $this->title = '';
        $this->content = '';
        $this->intro = '';
        session()->flash('message', 'Bài viết đã được tạo thành công.');
    }
    public function render()
    {
        return view('livewire.post-manager');
    }
}
