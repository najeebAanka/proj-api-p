<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\GoldUnit;
use Illuminate\Http\Request;


class GoldUnitController extends Controller
{



    function deleteItem(Request $request)
    {


        $request->validate([
            'id' => 'required',

        ]);

        $data = GoldUnit::find($request->id);
        $data->delete();
        return back()->with('msg', 'Deleted succesfully');
    }

    function addItem(Request $request)
    {


        $request->validate([

            'name_en' => 'required',
            'name_ar' => 'required',
           
        ]);

        $data = new GoldUnit();

        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
        
       
        $data->save();
        return back()->with('msg', 'Added succesfully');
    }

    function editItem(Request $request)
    {


        $request->validate([

            'name_en' => 'required',
            'name_ar' => 'required',

        ]);


        $data = GoldUnit::find($request->id);

     
        $data->name_en = $request->name_en;
        $data->name_ar = $request->name_ar;
       
        $data->save();
        return back()->with('msg', 'Edited successfully');
    }
}
