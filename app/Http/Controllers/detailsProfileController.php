<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class detailsProfileController extends Controller
{
   public function viewProfile($id){
 
        $details = DB::table('user_profile')->where('USER_ID', $id)->first();




        $query="SELECT
category.CAT_NAME,
preference.USER_ID
FROM
category
INNER JOIN preference ON category.CAT_ID = preference.CAT_ID

 
            ";
        $pref= DB::select( DB::raw($query) );

        $data = array('pref'  => $pref,'details' => $details
            );
        
        return view('user/detailsProfile')->with('data',$data);


        
    }
}
