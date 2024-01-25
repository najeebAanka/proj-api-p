<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoldPricesController extends Controller
{
    //

    public function countries(Request $request){



       $lang = $this->getLang($request);

       $response = new \stdClass();
       $response->base_media_url = "https://app.sab_test.net/public/storage/";

       $response->data = \App\Models\Country::select('id' ,'name_'.$lang.' as name' ,'flag_pic')->orderBy('order_sn')->get();
        return response()->json( $response);

    }



}
