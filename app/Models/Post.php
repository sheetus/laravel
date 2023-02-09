<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
//     $comment = Comment::find(1)
 
// return $comment->post->title ;
    
    use HasFactory;
    protected $fillable = ['title', 'description','user_id','created_at'];

    public function user(){
        return $this->belongsTo(related:User::class);

    }
 
 

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
//  pub function myUserRelation(){
//     return $this->belongsTo(User::class ,'user_id');
// }
