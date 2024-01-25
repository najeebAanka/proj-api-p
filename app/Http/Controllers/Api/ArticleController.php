<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function index(Request $request ,$id){



       $lang = $this->getLang($request);
       $data = \App\Models\Blog::select('id' ,'title_'.$lang.' as title' ,'content_'.$lang.' as content' ,'author_'.$lang.' as author' ,
               'blog_footer_'.$lang.' as footer')->find($id);

        $data->media = \App\Models\BlogMedia::where('blog_id' ,$id)->get();
          $data->published_at =  $lang == 'en'  ? '1 hours ago' : 'منذ ساعة';

       $response = new \stdClass();
       $response->base_media_url = "https://app.sab_test.net/public/storage/";
       $response->data = $data;
        return response()->json( $response);

    }











}
