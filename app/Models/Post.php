<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'title',
        'media',
        'category_id',
    ];



    public function Category(){

        return $this->belongsTo(Category::class);
    }


    public function Coursels()
    {
        return $this->hasMany(Coursel::class);
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
?>