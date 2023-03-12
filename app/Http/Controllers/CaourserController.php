<?php

namespace App\Http\Controllers;

use App\Helpers\uploadImage;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Repositories\PostRepo;
use App\Http\Requests\CaourselAddReq;
use App\Http\Requests\CaourselUpdateReq;
use App\Http\Resources\CourselResource;
use Illuminate\Http\Resources\Json\ResourceResponse;
use Illuminate\Support\Facades\Response;

class CaourserController extends Controller
{
    private $PostService;

    public function __construct(PostService $PostService)
    {
        $this->PostService = $PostService;
    }

    public function index($PostId){
         
        $caoursels = $this->PostService->getCauorselsPost($PostId);

        return  CourselResource::collection($caoursels);
        
             
    }


    public function store(CaourselAddReq $request){
         
         $validatedReq =  $request->validated();


         if ($request->has('media')){
                   
            $imagePath = uploadImage::upload($request->file('media') , 'caoursels');
            $validatedData["media"] = $imagePath;
             
         }


         $caoursel = $this->PostService->AddCoursel($validatedReq);


         if ($caoursel) {
            return Response::json([
                'message' => "caoursel created successfully",
                'caoursel' => $caoursel,
               ]);
         }

         return Response::json([
            'message' => "error in creating caoursel ..!",
            
          ],401);

    }

     
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CaourselUpdateReq $request , $id){
             
        $validatedReq = $request->validated();

       $caoursel = $this->PostService->getCoursel($id);

       
        if ($request->has('media')){
            uploadImage::deleteImage($caoursel->media);  
            $imagePath = uploadImage::upload($request->file('media') , 'caoursels');
            $validatedReq["media"] = $imagePath;
        }

        $action = $this->PostService->UpdateCaoursel($validatedReq , $caoursel);


        if ($action) {
            return Response::json([
                'message' => "Caoursel updated successfully",
               ]);
          }
    
    
          return Response::json([
            'message' => "Caoursel not exist ..!",
            
          ],404);



    }

    public function destroy($courselId){
         
              
        $action = $this->PostService->DeleteCaoursel($courselId);

        if ($action) {
            return Response::json([
                'message' => "Caoursel deleted successfully",
               ]);
          }
    
    
          return Response::json([
            'message' => "Caoursel not Exit ..!",
            
          ],404);

    }
}
