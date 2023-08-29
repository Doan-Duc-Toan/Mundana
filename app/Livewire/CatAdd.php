<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Cat;

class CatAdd extends Component
{
    #[Rule('required|string', message: 'Hãy nhập tên danh mục', translate: false)]
    public string $name;
    #[Rule('required|string', message: 'Hãy nhập mô tả cho danh mục', translate: false)]
    public string $content;
    public $cats;
    public function mount()
    {
        $this->arrange();
    }
    public function arrange()
    {
        $this->cats = Cat::orderBy('created_at', 'asc')->get();
    }
    public function save()
    {
        $validated = $this->validate();
        Cat::create([
            'name' => $this->name,
            'content' => $this->content
        ]);
        $this->name = '';
        $this->content = '';
        $this->arrange();
    }
    public function render()
    {
        return view('livewire.cat-add');
    }
}
