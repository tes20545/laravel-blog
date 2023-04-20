<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use Livewire\Component;

class Comment extends Component
{
    public $description,$title,$user_id,$blog_id;

    public function mount()
    {
        $this->user_id = request()->user()->id;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function comment()
    {
        if(!request()->user()){
            abort(403);
        }else{
            $comment = new ModelsComment();
 
            $comment->title     = $this->title;
            $comment->contents  = $this->description;
            $comment->user_id   = $this->user_id;
            $comment->blog_id   = $this->blog_id;
            
            if($comment->save()){
                $this->title = '';
                $this->description = '';

                $this->emit('refreshComponent');

                session()->flash('success');
            }else{
                $this->title = '';
                $this->description = '';
                session()->flash('error');
            }
        }
    }
}
