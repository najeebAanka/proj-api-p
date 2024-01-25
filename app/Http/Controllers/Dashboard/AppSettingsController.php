<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class AppSettingsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = AppSetting::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{
        

    $request->validate([

        'code' => 'required',
        'contents_en' => 'required',
        'contents_ar' => 'required',
        
    ]);

        $data = new AppSetting();

        $data->code = $request->code;
        $data->contents_en = $request->contents_en;
        $data->contents_ar = $request->contents_ar;
       
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


        $request->validate([

            'code' => 'required',
            'contents_en' => 'required',
            'contents_ar' => 'required',
            
        ]);


        $data = AppSetting::find($request->id);

        $data->code = $request->code;
        $data->contents_en = $request->contents_en;
        $data->contents_ar = $request->contents_ar;
       
        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


}







