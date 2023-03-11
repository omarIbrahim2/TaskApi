<?php

namespace App\Http\Controllers;

use App\Helpers\uploadImage;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostUpdateReq;
use App\Http\Resources\PostResource;
use App\Http\Requests\PostAddRequest;
use App\Http\Resources\PostsResource;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $posts = $this->postService->getPosts();
         return PostsResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostAddRequest $request)
    {
        $validatedData =  $request->validated();
      
        if($request->has('media')){
                     
          $media = uploadImage::upload($request->file('media') , 'posts');
          $validatedData["media"] = $media;

        }

        
       $post = $this->postService->createPost($validatedData);
       
       
      if ($post) {
        return Response::json([
            'message' => "Post created successfully",
            'Post' => $post,
           ]);
      }


      return Response::json([
        'message' => "error in creating post ..!",
        
      ],401);




     
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postService->getPost($id);
    
        if($post){
             
          return new PostResource($post);
        

        }

        return Response::json([
          'message' => 'NOT FOUND ..!'
        ] , 404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateReq $request, $id)
    {
         $validatedReq =  $request->validated();

           

         $action = $this->postService->updatePost($validatedReq , $id);

         if ($request->hasFile('media')) {
               
            $media  = uploadImage::upload($request->file("media") , 'posts');

            $validatedReq['media'] = $media;
          
      }

         if ($action) {
            return Response::json([
                'message' => "Post updated successfully",
               ]);
          }
    
    
          return Response::json([
            'message' => "post not exist ..!",
            
          ],404);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = $this->postService->deletePost($id);


          
        if ($action) {
            return Response::json([
                'message' => "Post deleted successfully",
               ]);
          }
    
    
          return Response::json([
            'message' => "post not Exit ..!",
            
          ],404);

    }
}
