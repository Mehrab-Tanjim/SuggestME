<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//handler of Rating, PART of Rate_and_Review Module
class RateController extends Controller
{
	/*this works whenever user clicks on rate_div 
	  this fetches rate_citeria from the database
	  all this done by ajax call*/
	public function fetchCiteria (Request $request){
		/*this converts to appropriate format, awesome*/
		$data=$request->all();
		/*get the value by key*/
		$user_id=$data['USER_ID'];
		$product_id=$data['PROD_ID'];
		$category_id=$data['CAT_ID'];
		/*fetch whatever you need*/
		
		if($user_id!=null){
			$query="SELECT r.RAT_CAT_ID, r.RAT_CAT_NAME, rt.RATING_VAL
					FROM rate_citeria r
					LEFT JOIN rating rt
					ON r.RAT_CAT_ID=rt.RAT_CAT_ID
					AND rt.USER_ID=$user_id
					AND rt.PROD_ID=$product_id				
					WHERE
		                r.CAT_ID =$category_id";//this works because the rating table gives only one row that 
		                //matches with rat_cat_id of rate_citeria table
		                //either that single row exists or not
			$rate_citeria = DB::select( DB::raw($query) );
							
		}
		else{
			$rate_citeria = DB::table('rate_citeria')
						->where('rate_citeria.CAT_ID',$category_id)
						->get();
		}
		/*return with success true*/
        return response()->json(['success' => true,'rate_citeria'=>$rate_citeria]);
		
	}


	/*this works whenever user clicks on rate_div 
	  this fetches rate_citeria from the database
	  all this done by ajax call*/
	public function submit_Rate_and_Review (Request $request){
		/*this converts to appropriate format, awesome*/
		$data=$request->all();
		/*get the value by key*/
		$user_id=$data['USER_ID'];
		$product_id=$data['PROD_ID'];
		$ratings=$data['rating'];
		$rat_cat_id=null;
		$rating_val=null;
		/*fetch whatever you need*/
		foreach ($ratings as $rating) {
	        $rat_cat_id=$rating["RAT_CAT_ID"];
	        $rating_val=$rating["RATING_VAL"];

	        //update or insert?? any better way to do this???
	        $rating_table=DB::table('rating')
	          	->where('USER_ID', $user_id)	          	
	        	->where('PROD_ID', $product_id)
	          	->where('RAT_CAT_ID', $rat_cat_id)->first();

	      	if ($rating_table==null) {
	            DB::table('rating')
	            ->insert(['USER_ID' => $user_id,'PROD_ID' => $product_id,'RAT_CAT_ID' => $rat_cat_id,'RATING_VAL' =>  $rating_val]);
	        } 
	        else {
				DB::table('rating')
				->where('USER_ID', $user_id)
				->where('PROD_ID', $product_id)
				->where('RAT_CAT_ID', $rat_cat_id)
				->update(['RATING_VAL' => $rating_val]);
	        }

	        //calculate avg_rating we should use other averaging techniques
	        //to give the most appropriate rating of a product
	        $avg_rating = DB::table('rating')
		                ->where('PROD_ID',  $product_id)
		                ->avg('RATING_VAL');

	        DB::table('product')
	        ->where('PROD_ID', $product_id)
	        ->update(['AVG_RATING' => $avg_rating]);

	        //worry about rep point later
	        //DB::table('user_profile')->increment('REP_POINTS', 10);
	      		        
	    }
		/*return with success true*/
        return response()->json(['success' => true]);
		
	}
}