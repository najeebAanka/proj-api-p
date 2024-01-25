<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    public function index(Request $request){



       $lang = $this->getLang($request);
       $data = \App\Models\Product::select(['id' ,'title_'.$lang.' as title' ,'thumb_url'])->
               get();


       $response = new \stdClass();
       $response->base_media_url = "https://app.sab_test.net/public/storage/";
       $response->data = $data;
        return response()->json( $response);

    }
    public function single(Request $request ,$id){



       $lang = $this->getLang($request);
       $data = \App\Models\Product::select(['id' ,'title_'.$lang.' as title','contents_'.$lang.' as contents' ,'thumb_url'])->
               find($id);


       $response = new \stdClass();
       $response->base_media_url = "https://app.sab_test.net/public/storage/";
       $response->data = $data;
        return response()->json( $response);

    }



}
