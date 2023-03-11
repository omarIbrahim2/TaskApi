<?php

namespace App\Interfaces;


interface PostRepoInterface{

    public function getAll();

    public function getOne($id);
    
    public function create($data);

    public function delete($Id);

    public function update($data , $id);

    public function createCaoursel($data);

    public function getPostCaoursels($postId);

    public function deleteCaoursel($caourselId);

    public function updateCaoursel($data , $id);


    
}