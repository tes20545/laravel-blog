<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class Search extends Component
{
    public $type,$search,$data,$length = 0;

    protected $listeners = ['length'];

    public function render()
    {
        return view('livewire.search');
    }

    public function search_func()
    {
        if($this->type != null){
            
            $this->data = Blog::where([

                ['type', '=', $this->type],
        
                ['title', 'LIKE', "%{$this->search}%"],

                ['contents', 'LIKE', "%{$this->search}%"]
        
            ])->get();
        }
        $this->data = Blog::where('title','LIKE', "%{$this->search}%")->Where('contents','LIKE', "%{$this->search}%")->get();
    }

    public function length($l)
    {
        $this->length = $l;
    }
}
