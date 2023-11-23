<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'title', 'content', 'users_id'];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function scopeUserId($query,$request){
        $userid = $request->user()->id;
        return $query->where('users_id',$userid);
    }
}
