<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Validator;
use App\Models\Blog;
use App\Http\Resources\Blog as BlogResources;

class BlogsController extends BaseController
{
    public function index() {
        $blog = Blog::all();
        return $this -> sendResponse(BlogResources::collection($blog),"Posztok letöltve");
    }
    public function store(Request $request){
        //dd($request);
        $input = $request->all();
        $validator = Validator::make($input,[
            "title" => "required",
            "description" => "required"
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $blog = Blog::create($input);

        return $this->sendResponse(new BlogResources($blog),"Poszt kiírva");
    }
    public function show($id){
        $blog = Blog::find($id);
        if(is_null($blog)){
            return $this->senError("Nincs ilyen poszt");
        }
        return $this->sendResponse(new BlogResources($blog),"Poszt betöltve");
    }
    public function update(Request $request, Blog $blog){
        $input = $request -> all();
        $validator = validator::make($input,[
            "title" => "required",
            "description" => "required"
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        
        $blog -> title = $input["title"];
        $blog -> description = $input["description"];
        $blog -> save();

        return $this->sendResponse(new BlogResources($blog),"Poszt módosítva");
    }
    public function destroy(Blog $blog){
        $blog->delete();

        return $this->sendResponse([],"Poszt törölve");

    }
}
