<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursel extends Model
{
    use HasFactory;


    protected $fillable = [
        'content',
        'media',
        'see_more',
        'post_id',
        'id_ad',
    ];


    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
