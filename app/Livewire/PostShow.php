<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Post;
class PostShow extends Component
{
    use WithPagination;
    // public $posts;
    // public function mount()
    // {
    //     $this->order();
    // }
    // public function order()
    // {
    //     $this->posts = Post::orderBy('created_at', 'desc')->paginate(10);
    // }
    public function delete($id)
    {
        Post::find($id)->delete();
        // $this->order();
    }
    public function render()
    {
        return view('livewire.post-show',['posts' => Post::orderBy('created_at', 'desc')->simplePaginate(10)]);
    }
}
