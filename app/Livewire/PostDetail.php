<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Post;
use App\Models\Comment;
class PostDetail extends Component
{
    public $post;
    public $bot;
    public $right;
    public $comments;

    #[Rule('required|string', message: 'Hãy nhập tên của bạn', translate: false)]
    public $name;
    #[Rule('required|email', message: 'Hãy nhập email của bạn', translate: false)]
    public $email;
    #[Rule('required|string', message: 'Nội dung comment', translate: false)]
    public $content;
    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->bot = Post::whereNot('id', $this->post->id)->inRandomOrder()->first();
        $this->right = Post::whereNot('id', $this->post->id)->inRandomOrder()->take(3)->get();
        $this->order();
    }
    public function order(){
        $this->comments = $this->post->comments->sortByDesc('created_at');
    }
    public function store(){
         $this->validate();
         Comment::create([
            'comment'=>$this->content,
            'name' => $this->name,
            'email' => $this->email,
            'post_id' => $this->post->id
         ]);
         $this->order();
         $this->content ='';
         $this->name ='';
         $this->email ='';
    }
    #[Layout('client.layout')]
    public function render()
    {
        return view('livewire.post-detail');
    }
}
