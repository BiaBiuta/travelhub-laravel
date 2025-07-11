<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
    public function getUserIdTo()
    {
        return User::find($this->id_user_to);
    }
}
