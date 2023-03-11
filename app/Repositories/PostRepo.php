<?php
namespace App\Repositories;

use App\Models\Post;
use App\Models\Coursel;
use App\Helpers\uploadImage;
use App\Interfaces\PostRepoInterface;
use Illuminate\Support\Facades\Storage;

class PostRepo implements PostRepoInterface{

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


   public function createCaoursel($data)
   {
        return Coursel::create($data);
   }

   public function getPostCaoursels($postId)
   {
      return Coursel::where("post_id" , $postId)->get();
   }


   public function deleteCaoursel($caourselId){

        $caoursel =  Coursel::find($caourselId);


        if ($caoursel) {
             
            uploadImage::deleteImage($caoursel->media);

            return $caoursel->delete();

        }

        return NULL;


   }


   public function updateCaoursel($data , $caourselId){

    $caoursel =  Coursel::find($caourselId);


    if ($caoursel) {
        uploadImage::deleteImage($caoursel->media);
        return $caoursel->update($data);
    }

    return NULL;


   }
           
   


}