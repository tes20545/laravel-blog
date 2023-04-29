<?php

namespace App\Http\Livewire;

use App\Models\Comment as ModelsComment;
use App\Models\Blog;
use Livewire\Component;

class Comment extends Component
{
    public $description,$title,$user_id,$blog_id,$rating;

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
            $comment->rating    = $this->rating;
            
            if($comment->save()){
                $blog = Blog::where('id', $this->blog_id)->first();
                if($blog->rating == null){
                    $blog_rating = new Blog();
                    $blog->rating = $this->rating;
                    $blog->save();
                }else{
                    $comment = ModelsComment::where('blog_id',$this->blog_id)->avg('rating');
                    Blog::where('id',$this->blog_id)->update(['rating' => $comment]);
                }


                $this->title = '';
                $this->description = '';
                $this->rating = '';

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
