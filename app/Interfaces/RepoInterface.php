<?php

namespace App\Interfaces;


interface RepoInterface{

    public function getAll();

    public function getOne($id);
    
    public function create($data);

    public function delete($Id);

    public function update($data , $id);
}