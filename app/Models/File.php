<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','file_memo','file_type', 'file_name'];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
