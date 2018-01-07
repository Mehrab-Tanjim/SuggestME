<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Input as Input;
use Carbon\Carbon;

class addSpecController extends Controller
{
    
    public function viewSpec()
    {
        //
        $categories = DB::table('category')->get();
        $specification = DB::table('specification')->get();
        $spec_value = DB::table('spec_value')->get();
        $criteria=DB::table('rate_citeria')->get();
        

        $data = array('cat'  => $categories,'spec' => $specification,
            'spec_val'  => $spec_value,'criteria'=>$criteria);
       

        
        
        return view('product/addSpec')->with('data',$data);

       
    }

    public function viewAfterCatAdd(Request $request)
    {
       //echo $request->get('catAdd');
        DB::table('category')->insert(
                        ['CAT_NAME' => $request->get('catAdd')]
                );
        return redirect()->back();

    }

    public function viewAfterSpecAdd(Request $request)
    {
        //echo $request->get('specAdd');
        DB::table('specification')->insert(
                        ['CAT_ID' => $request->get('cat'),'SPEC_NAME' => $request->get('specAdd')]
                );
        return redirect()->back();
    }
    public function viewAfterCritAdd(Request $request)
    {
        //echo $request->get('specAdd');
        DB::table('rate_citeria')->insert(
                        ['CAT_ID' => $request->get('cat2'),'RAT_CAT_NAME' => $request->get('critAdd')]
                );
        return redirect()->back();
    }

    public function viewSpecVal(Request $request)
    {
        
            $temp = $request->all();
        

       
        

        foreach($temp as $key=>$value) {

          
                        if ($key[0] == "#") {

                DB::table('spec_value')->insert(
                        ['SPEC_ID' => substr($key, 1),'SPEC_VAL' => $value]

                            
                );
                
            }
            

                
            
         }

        

        

         
                
        return redirect()->back();

    }
}
