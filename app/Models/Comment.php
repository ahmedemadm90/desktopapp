<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['file_id','comment'];
    public function file()
    {
        return $this->belongsTo(File::class,'file_id');
    }
}
