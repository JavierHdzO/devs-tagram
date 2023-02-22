<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id'
    ];

    protected $hidden = [
        'user_id'
    ];

    

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function checkReaction(User $user){
        return $this->reactions->contains('user_id', $user->id);
    }
}
