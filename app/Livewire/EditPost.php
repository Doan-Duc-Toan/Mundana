<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use App\Models\Cat;

class EditPost extends Component
{
    use WithFileUploads;
    public $cats;
    public $post;
    #[Rule('required', message: 'Hãy nhập tiêu đề cho bài viết', translate: false)]
    public string $title;
    #[Rule('required', message: 'Hãy nhập phần giới thiệu cho bài viết', translate: false)]
    public string $intro;

    #[Rule('required', message: 'Hãy nhập nội dung bài viết', translate: false)]
    public string $content;
    public $select_cats = [];

    #[Rule('image|max:10240|nullable', message: "Hãy chọn hình ảnh cho bài viết")]
    public $photo;
    public $cats_name = [];
    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->cats = Cat::all();
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->intro = $this->post->intro;
        $this->cats_name = $this->post->cats->pluck('name')->toArray();
    }
    public function update()
    {
        $user = Auth::user();
        $this->validate();
        if (!empty($this->photo)) {
            $path = $this->photo->store('images', 'public');
            $this->post->update([
                'title' => $this->title,
                'content' => $this->content,
                'intro' => $this->intro,
                'user_id' => $user->id,
                'thumb' => $path
            ]);
        } else $this->post->update([
            'title' => $this->title,
            'intro' => $this->intro,
            'content' => $this->content,
            'user_id' => $user->id,
        ]);
        if (!empty($this->select_cats))
            $this->post->cats()->sync($this->select_cats);
        $this->photo = null;
        $this->select_cats = [];
        $this->title = '';
        $this->content = '';
        return redirect()->route('post.show')->with('message', 'Bài viết đã được chỉnh sửa thành công.');
    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
