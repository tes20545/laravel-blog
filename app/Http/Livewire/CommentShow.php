<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Comment as ModelsComment;

class CommentShow extends Component
{
    public $data,$blog_id;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->data = ModelsComment::join('users','users.id','=','comment.user_id')->select('comment.*','users.name')->where('blog_id',$this->blog_id)->get();
    }

    public function render()
    {
        $this->data = ModelsComment::join('users','users.id','=','comment.user_id')->select('comment.*','users.name')->where('blog_id',$this->blog_id)->get();
        return view('livewire.comment-show');
    }

    public function delete($id)
    {
        ModelsComment::find($id)->delete();
        $rating = ModelsComment::where('blog_id', $this->blog_id)->avg('rating');
        
        if($rating == null){
            Blog::where('id', $this->blog_id)->update(['rating' => null]);
        }else{
            Blog::where('id',$this->blog_id)->update(['rating' => $rating]);
        }
    }
}
