<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Layout;
use App\Models\Cat;
class CatProduct extends Component
{
    public $cat;
    public $posts;
    public $popular;
    public $last;
    public function mount($id){
       $this->cat = Cat::find($id);
       $this->posts = $this->cat->posts;
       $this->popular = $this->cat->posts->random(4);
       $this->last = $this->cat->posts->sortByDesc('created_at')->take(3);
    }
    #[Layout('client.layout')] 
    public function render()
    {
        return view('livewire.cat-product');
    }
}
