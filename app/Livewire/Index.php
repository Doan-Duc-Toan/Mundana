<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cat;
use Livewire\Attributes\Layout;
use App\Models\Post;
class Index extends Component
{
    public $cats;
    public $posts;
    public $bot;
    public $right;
    public $random;
    public $popular;
    public function mount(){
        $this->cats = Cat::all();
        $this->posts = Post::all();
        $this->bot = $this->posts->last();
        $this->right = $this->posts->random(3); 
        $this->random = $this->posts -> random(3);
        $this->popular = $this->posts ->random(4);
    }
    // #[cat($this->cats)]
    #[Layout('client.layout')] 
    public function render()
    {
        return view('livewire.index');
    }
}
