<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //

    public function index(Request $request){



       $lang = $this->getLang($request);
       $data = \App\Models\Section::select(['id' , 'section_type', 'title_'.$lang.' as title' ,'subtitle_'.$lang.' as subtitle' ,'col_count'])->
               where('section_model' ,'blog')->where('status' ,'1')->
               get();

       foreach ($data as $item){
        $item->published_at =  $lang == 'en'  ? '1 hours ago' : 'منذ ساعة';
       $item->blocks = \App\Models\Block::select(['thumbnail' ,'media_link' ,'target_type' ,'target_id' ,
           'title_'.$lang.' as title' ,'subtitle_'.$lang.' as subtitle'])->where('section_id' ,$item->id)->get();
foreach ($item->blocks as $block){
      $block->published_at =  $lang == 'en'  ? '1 hours ago' : 'منذ ساعة';

}
       }
       $response = new \stdClass();
       $response->base_media_url = "https://app.sab_test.net/public/storage/";
       $response->data = $data;
        return response()->json( $response);

    }











}
