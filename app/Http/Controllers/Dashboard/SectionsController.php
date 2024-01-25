<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class SectionsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',
       
    ]);

    $data = Section::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{
        

    // $request->validate([

    //     'key' => 'required',
    //     'name_en' => 'required',
    //     'name_ar' => 'required',
    //     'url' => 'required',
    //     'order_index' => 'required',
        
    // ]);

        $data = new Section();

        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->subtitle_en = $request->subtitle_en;
        $data->subtitle_ar = $request->subtitle_ar;
        $data->publish_date = $request->publish_date;
        $data->section_type = $request->section_type;
        $data->col_count = $request->col_count;
        $data->section_model = $request->section_model;
        $data->status = $request->status;



    if ($request->hasFile('image')) {
        $file = $request->only('image')['image'];
        $fileArray = array('image' => $file);
        $rules = array(
            'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
        );
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            return back()->with('error', "Image validation says it is not correct");
            ;
        } else {
            $uniqueFileName = uniqid()
                    . '.' . $file->getClientOriginalExtension();
            $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
            try {
                if (!Storage::disk('public')->has('sections/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('sections/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/sections/' . $name));
                $data->thumbnail = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }
    $data->save();


    if($data->section_type == "youtube_video"){

        $data_ = new Block();

       $data_->title_en = "YouTube Video";
       $data_->title_ar = "يوتيوب فيديو";
       $data_->section_id = $data->id;
       $data_->status = "0";
       $data_->media_link = "VDCttJchFKg";

       $data_->save();
    }


    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {


    //     $request->validate([

    //         'key' => 'required',
    //         'name_en' => 'required',
    //         'name_ar' => 'required',
    //         'url' => 'required',
    //         'order_index' => 'required',
            
        
    // ]);


        $data = Section::find($request->id);

        $data->title_en = $request->title_en;
        $data->title_ar = $request->title_ar;
        $data->subtitle_en = $request->subtitle_en;
        $data->subtitle_ar = $request->subtitle_ar;
        $data->publish_date = $request->publish_date;
        $data->section_type = $request->section_type;
        $data->col_count = $request->col_count;
        $data->section_model = $request->section_model;
        $data->status = $request->status;



    if ($request->hasFile('image')) {
        $file = $request->only('image')['image'];
        $fileArray = array('image' => $file);
        $rules = array(
            'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
        );
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            return back()->with('error', "Image validation says it is not correct");
            ;
        } else {
            $uniqueFileName = uniqid()
                    . '.' . $file->getClientOriginalExtension();
            $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
            try {
                if (!Storage::disk('public')->has('sections/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
                    Storage::disk('public')->makeDirectory('sections/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
                }
                Image::make($file)->resize(512, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(storage_path('app/public/sections/' . $name));
                $data->thumbnail = $name;
                
            } catch (Exception $r) {
                return back()->with('error', "Failed to upload image " . $r);
            }
        }
    }


        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    
   


}







