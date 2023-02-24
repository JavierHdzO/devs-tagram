<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $reactions;

    public function mount($post){
        $this->isLiked = $post->checkReaction(auth()->user());
        $this->reactions = $post->reactions->count();
    }

    public function like(){

        if($this->post->checkReaction(auth()->user())){
            $this->post->reactions()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
        }else{
            $this->post->reactions()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
        }

        $this->reactions = $this->post->reactions->count();
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
