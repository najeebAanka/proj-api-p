<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
USE Illuminate\Support\Facades\DB;

class SpendingsController extends Controller {

    //


    private function buildQuery(Request $request){
         $data = \App\Models\Spending::where('user_id' ,Auth::id())->orderBy('id'  ,'desc');
        if($request->has('start')){
            $data =   $data ->where('created_at' ,'>=' ,$request->start) ;
        }
          if($request->has('end')){
            $data =   $data ->where('created_at' ,'<=' ,$request->end) ;
        }
        return $data;
    }
       public function list(Request $request){



           $wrapper = new \stdClass();
            $wrapper->items =  $this->buildQuery($request)->select(['id' , 'notes as contents' ,'amount' , DB::RAW('DATE(created_at) as date')])->paginate(10); ;
              $wrapper->total =  $this->buildQuery($request)->sum('amount');

               return response()->json($wrapper ,200);

       }

       public function chart(Request $request){



          $data =  [] ;
          $data[] = ["date"=>"5/2022" ,"avg_amount" => -2365.7];
          $data[] = ["date"=>"6/2022" ,"avg_amount" => 3542.7];
          $data[] = ["date"=>"7/2022" ,"avg_amount" => 4524.7];
          $data[] = ["date"=>"8/2022" ,"avg_amount" => 3986.7];
          $data[] = ["date"=>"9/2022" ,"avg_amount" => 2673.7];
          $data[] = ["date"=>"10/2022" ,"avg_amount" => 1275.7];
          $data[] = ["date"=>"11/2022" ,"avg_amount" => 1907.7];
          $data[] = ["date"=>"12/2022" ,"avg_amount" => 2765.7];

          $wrapper = new \stdClass();
          $wrapper->data = $data;
          $wrapper->info = [];


           $wrapper->info [] = ["Best month"=>"5/2022"];
           $wrapper->info [] = ["Worst month"=>"2/2022"];
           $wrapper->info [] = ["sab_test advice"=>"Create a saving account ans use it in the begining of the year"];


               return response()->json($wrapper ,200);

       }


        public function submit(Request $request){
       $lang = $this->getLang($request);

           $validator = Validator::make($request->all(), [
            'notes' => 'required',
            'amount' => 'required|numeric'
        ]);

          if ($validator->fails()) {

             return response()->json(['error' => $this->failedValidation($validator)], 401);
        }
        $input = $request->all();
        $item = new \App\Models\Spending();
        $item->user_id = Auth::id();
        $item->notes = $input["notes"];
        $item->amount = $input["amount"];
        $item->save();
       $res = new \stdClass();
       $res->message = "Submitted successfully";

        return response()->json($res ,200);

    }


        public function remove(Request $request ,$id){

            \App\Models\Spending::find($id)->delete();
       $res = new \stdClass();
       $res->message = "Removed successfully";

        return response()->json($res ,200);

    }


}
