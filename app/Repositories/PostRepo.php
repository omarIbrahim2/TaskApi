<?php
namespace App\Repositories;

use App\Helpers\uploadImage;
use App\Models\Post;
use App\Interfaces\RepoInterface;
use Illuminate\Support\Facades\Storage;

class PostRepo implements RepoInterface{

   public function getAll()
   {
       return Post::paginate(); 
   }

   public function getOne($id)
   {
       $post = Post::find($id);
        
       return $post;
   }


   public function delete($Id)
   {
       $post = $this->getOne($Id);
       if ($post) {
         
        uploadImage::deleteImage($post->media);
        return $post->delete();
       } 
       
       return NULL;
    
       
        
   }

   public function create($data)
   {
       return Post::create($data);
   }

   public function update($data, $id)
   {
      $post = $this->getOne($id);
       
      if ($post) {
        uploadImage::deleteImage($post->media);
        return $post->update($data);
      }
      
 
      return NULL;
        
   }

}