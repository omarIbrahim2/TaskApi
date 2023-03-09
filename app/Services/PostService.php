<?php

namespace App\Services;

use App\Helpers\uploadImage;
use App\Repositories\PostRepo;

class PostService{
    
    private $postRepo;
    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }


    public function getPosts(){
        return $this->postRepo->getAll();
    }

    public function getPost($id){

        return $this->postRepo->getOne($id);
    }

    public function createPost($data){
        return $this->postRepo->create($data);
    }

    public function deletePost($id){

        
        return $this->postRepo->delete($id);
    }

    public function updatePost($data , $id){
        
         return $this->postRepo->update($data , $id);

    }
}