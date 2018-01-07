<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\prods;
use App\Product;
use App\rating;
use App\Prod_has_spec;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Input as Input;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class addController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewAdd(){
 
        $categories = DB::table('category')->get();
        $specification = DB::table('specification')->get();
        $spec_value = DB::table('spec_value')->get();
        $dataSubmit=null;
        

        $data = array('cat'  => $categories,'spec' => $specification,
            'spec_val'  => $spec_value,'dataSubmit'=>$dataSubmit);
       

        
        
        return view('product/add')->with('data',$data);
    }
    public function viewAfterSubmit(Request $request ,$id,$admin){


        
        $prod=new prods;
        $prod->PROD_NAME=$request->input('prod_name');
        $prod->CAT_ID=$request->input('cat');
        $prod->PRICE_low=$request->input('price_low');
        
        $prod->STATUS=0;
        $prod->PRICE_high=$request->input('price_high');
        $prod->STATUS=$admin;
        $prod->Added_ID=$id;

        $image=$request->input('prod_name').'.'.Input::file('output1')->getClientOriginalExtension()  ; 
           
        
        Input::file('output1')->move("product_img",$image);
        $prod->image=$image;


        $prod->save();

        $temp = $request->all();
        

        $demo=$prod->id;
        

        foreach($temp as $key=>$value) {

          
            if ($key[0] == "@") {

                DB::table('prod_has_spec')->insert(
                        ['PROD_ID' => $demo, 'SPEC_VAL_ID' => $request->input($key)]
                );

                
            }
         }


         DB::table('user_profile')->increment('REP_POINTS', 10);

         if($admin==1)
            return redirect()->back();

         return redirect()->back()->with('data', ['1']);;

        

 
        
    }

    public function confirm($id)
    {
        DB::table('product')
                ->where('PROD_ID', $id)
                ->update(
                        array('STATUS'=>1)
                );
        //$users=\App\user_profile::all();
        //$products=\App\prods::all();

        //$data = array('userlistall'  => $users,'products'  => $products,'tab'=>1);
        return redirect()->back();
    }

    public function del($id)
    {
        DB::table('product')
                ->where('PROD_ID', $id)
                ->update(
                        array('STATUS'=>2)
                );
       // $users=\App\user_profile::all();
        //$products=\App\prods::all();

        //$data = array('userlistall'  => $users,'products'  => $products,'tab'=>1);
        return redirect()->back();
    }

    public function promote($id)
    {
        DB::table('user_profile')
                ->where('USER_ID', $id)
                ->update(
                        array('ADMIN'=>1)
                );
       // $users=\App\user_profile::all();
        //$products=\App\prods::all();

        //$data = array('userlistall'  => $users,'products'  => $products,'tab'=>1);
        return redirect()->back();
    }

     public function rate(Request $request ){


        
        $rating=rating::where('PROD_ID', $request->input('prod_id'))
          ->where('USER_ID', $request->input('user_id'))
          ->where('RAT_CAT_ID', $request->input('rate_citeria'))->first();

      
        if ($rating==null) {
            DB::table('rating')->insert(
            ['USER_ID' => $request->input('user_id'),'PROD_ID' => $request->input('prod_id'),'RAT_CAT_ID' => $request->input('rate_citeria'),'RATING_VAL' =>  $request->input('rating')]
            );
        } else {
            $rating=rating::where('PROD_ID', $request->input('prod_id'))
          ->where('USER_ID', $request->input('user_id'))
          ->where('RAT_CAT_ID', $request->input('rate_citeria'))
          ->update(['RATING_VAL' => $request->input('rating')]);

        } 

        $avg_rating = DB::table('rating')
                ->where('PROD_ID',  $request->input('prod_id'))
                ->avg('RATING_VAL');

        Product::where('PROD_ID', $request->input('prod_id'))
          ->update(['AVG_RATING' => $avg_rating]);


          DB::table('user_profile')->increment('REP_POINTS', 10);
        
        return redirect()->back();

 
        
    }

   public function viewSearch(){
 
        $categories = DB::table('category')->get();
        $specification = DB::table('specification')->get();
        $spec_value = DB::table('spec_value')->get();
        $prod_has_spec = DB::table('prod_has_spec')->get();
        $product = DB::table('product')->get();
        $product_rate=DB::table('product')->orderBy('AVG_RATING','desc')->get();
        $product_view=DB::table('product')->orderBy('views','desc')->get();
        $product_date=DB::table('product')->orderBy('created_at','desc')->get();
        $dataSubmit=null;
        $singleSearch=null;

        $data = array('singleSearch'=> $singleSearch,'cat'  => $categories,'spec' => $specification,
            'spec_val'  => $spec_value,'prod_has_spec'  => $prod_has_spec,'product_view'  => $product_view,'product_date'  => $product_date,'product_rate'  => $product_rate,'product'  => $product,'dataSubmit'=>$dataSubmit);
       

        
        
        return view('product/search')->with('data',$data);
    }




public function singleSearch(Request $request ){


        $categories = DB::table('category')->get();
        $specification = DB::table('specification')->get();
        $spec_value = DB::table('spec_value')->get();
        $prod_has_spec = DB::table('prod_has_spec')->get();
        $product = DB::table('product')->get();
        $dataSubmit=null;
        $singleSearch=$request->input('Search-5');
        $product_rate=DB::table('product')->orderBy('AVG_RATING','desc')->get();
        $product_view=DB::table('product')->orderBy('views','desc')->get();
        $product_date=DB::table('product')->orderBy('created_at','desc')->get();

        $data = array('singleSearch'=> $singleSearch, 'cat'  => $categories,'spec' => $specification,
            'spec_val'  => $spec_value,'prod_has_spec'  => $prod_has_spec,'prod_has_spec'  => $prod_has_spec,'product_view'  => $product_view,'product_date'  => $product_date,'product_rate'  => $product_rate,'product'  => $product,'dataSubmit'=>$dataSubmit);
       

        
        
        return view('product/search')->with('data',$data);

}
}