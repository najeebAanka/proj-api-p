<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    //
    
    public function submit(Request $request){
       $lang = $this->getLang($request); 
        $input = $request->all();
        $item = new \App\Models\Lead();
        $item->name = $input["name"];
        $item->phone = "";
        $item->email = $input["email"];
        $item->message = $input["message"];
        $item->source = "App";
        $item->save();
       $res = new \stdClass();
       $res->message = "Submitted successfully";
       
        return response()->json($res ,200);   
        
    }
    
    
    
    
    
    
    
    
    
    
    
}
