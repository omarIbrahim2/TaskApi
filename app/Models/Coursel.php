<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected function media() :Attribute
    {

        return Attribute::make(get:function( $value){
              
            if ($value) {
                $value = "uploads/".$value;
            }

            return $value;
        });
    } 
}
