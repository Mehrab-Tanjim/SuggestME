<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\user_profile;
use App\prods;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class panelController extends Controller
{
    public function viewPanel(){
 
        $users=\App\user_profile::all();
        

        $query="SELECT
product.PROD_ID,
product.PROD_NAME,
category.CAT_NAME,
user_profile.USER_NAME,
product.created_at,
product.STATUS,
product.PRICE_low,
product.AVG_RATING,
product.PRICE_high,
product.Added_ID
FROM
category
INNER JOIN product ON category.CAT_ID = product.CAT_ID
INNER JOIN user_profile ON user_profile.USER_ID = product.Added_ID

";

$products=DB::select( DB::raw($query) );;

        $data = array('userlistall'  => $users,'products'  => $products,'tab'=>0);
        
        return view('user\panel')->with('data',$data);
        
    }

}
