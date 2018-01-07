<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class detailsProductController extends Controller
{
    

   public function viewProduct($id){

        

        DB::table('product')->where('PROD_ID', $id)->increment('views');
        
        $product = DB::table('product')->where('PROD_ID', $id)->first();
        
        $category =DB::table('category')->where('CAT_ID', $product->CAT_ID)->first();


        $query="SELECT

    specification.SPEC_NAME,
    spec_value.SPEC_VAL
    FROM
                product
                INNER JOIN category ON product.CAT_ID = category.CAT_ID
                INNER JOIN prod_has_spec ON product.PROD_ID = prod_has_spec.PROD_ID
                INNER JOIN spec_value ON spec_value.SPEC_VAL_ID = prod_has_spec.SPEC_VAL_ID
                INNER JOIN specification ON spec_value.SPEC_ID = specification.SPEC_ID
    WHERE
                product.PROD_ID =$id

                ";

        $specifications= DB::select( DB::raw($query) );
        
        $rating_citeria = DB::table('product')
            ->join('rate_citeria', 'product.CAT_ID', '=', 'rate_citeria.CAT_ID')
            ->where('product.PROD_ID', $id)
            ->get();

        $rating = DB::table('product')
            ->join('rating', 'product.PROD_ID', '=', 'rating.PROD_ID')
            ->where('product.PROD_ID', $id)
            ->get();


            $query="SELECT
user_profile.USER_NAME,
review.REVIEW
FROM
review
INNER JOIN user_profile ON user_profile.USER_ID = review.USER_ID && PROD_ID=$id



                ";

        $review= DB::select( DB::raw($query) );

        $data = array('spec'  => $specifications,'cat' => $category,
            'prod'  => $product, 'rating_citeria' => $rating_citeria ,'rating' => $rating,'review'=>$review);





        return view('product/specification')->with('data',$data);


    }

    public function review(Request $request)
    {

        DB::table('review')->insert(
                        ['USER_ID' => $request->input('user_id'), 'PROD_ID' => $request->input('prod_id'),'REVIEW'=>$request->input('review')]
                );



        $query="SELECT
user_profile.USER_NAME,
review.REVIEW
FROM
review
INNER JOIN user_profile ON user_profile.USER_ID = review.USER_ID


                ";

        $review= DB::select( DB::raw($query) );

        return redirect()->back();

        
    }


}
