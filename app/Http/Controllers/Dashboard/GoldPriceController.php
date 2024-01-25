<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\GoldPrice;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GoldPriceController extends Controller
{



    function deleteItem(Request $request)
    {


        $request->validate([
            'id' => 'required',

        ]);

        $data = GoldPrice::find($request->id);
        $data->delete();
        return back()->with('msg', 'Deleted succesfully');
    }

    function addItem(Request $request)
    {


        $request->validate([

            'country_id' => 'required',
            'unit_id' => 'required',
            'amount' => 'required',
        ]);

        $checkdata = \App\Models\GoldPrice::where('country_id', $request->country_id)->where('unit_id', $request->unit_id)->whereDate('created_at', Carbon::today())->first();
        if ($checkdata) {
            // return back()->with('error', 'You have previously added this price for today!');

            $data_ = GoldPrice::find($checkdata->id);

            $data_->country_id = $request->country_id;
            $data_->unit_id = $request->unit_id;
            $data_->amount = $request->amount;

            $data_->save();
            return back()->with('msg', 'Updated succesfully');

        } else {

            $data = new GoldPrice();

            $data->country_id = $request->country_id;
            $data->unit_id = $request->unit_id;
            $data->amount = $request->amount;

            $data->save();
            return back()->with('msg', 'Added succesfully');
        }
    }

    function editItem(Request $request)
    {


        $request->validate([

            // 'country_id' => 'required',
            // 'unit_id' => 'required',
            'amount' => 'required',

        ]);



        $data = GoldPrice::find($request->id);

        // $data->country_id = $request->country_id;
        // $data->unit_id = $request->unit_id;
        $data->amount = $request->amount;

        $data->save();
        return back()->with('msg', 'Edited successfully');
    }
}
