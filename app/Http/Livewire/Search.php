<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class Search extends Component
{
    public $search,$data,$length = 0;

    protected $listeners = ['length'];

    public function render()
    {
        return view('livewire.search');
    }

    public function search_func()
    {
        $this->data = Blog::where('title','LIKE', "%{$this->search}%")->Where('contents','LIKE', "%{$this->search}%")->get();
    }

    public function length($l)
    {
        $this->length = $l;
    }
}
