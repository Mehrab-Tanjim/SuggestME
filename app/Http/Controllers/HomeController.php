<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index (){
    	$categories = DB::table('category')->get();
            //dont need so many similar queries
            //optimize it
            //simple way to do this is to make a view first then sort as needed
			//many work is needed to be done in query
			$products = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->get();

			$most_recents =	DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.created_at', 'desc')
						->get();

			$top_rated = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.AVG_RATING', 'desc')
						->get();

			$most_viewed = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.views', 'desc')
						->get();

			return view('welcome', compact('most_recents', 'top_rated', 'most_viewed', 'products', 'categories'));
		//make both user and guest's homepage identical for now
		/*
		if(Auth::guest()){
			//$products= Product::all();
			$categories = DB::table('category')->get();
            //dont need so many similar queries
            //optimize it
            //simple way to do this is to make a view first then sort as needed
			//many work is needed to be done in query
			$products = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->get();

			$most_recents =	DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.created_at', 'desc')
						->get();

			$top_rated = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.AVG_RATING', 'desc')
						->get();

			$most_viewed = DB::table('product')
						->where('product.STATUS', 1)
						->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
						->orderBy('product.views', 'desc')
						->get();

			return view('welcome', compact('most_recents', 'top_rated', 'most_viewed', 'products', 'categories'));
		}
		else{
			//$products= Product::all();
			$categories = DB::table('user_profile')
            ->join('preference', 'user_profile.USER_ID', '=', 'preference.USER_ID')
            ->join('category', 'preference.CAT_ID', '=', 'category.CAT_ID')
            ->get();

			$products = DB::table('user_profile')
            ->join('preference', 'user_profile.USER_ID', '=', 'preference.USER_ID')
            ->join('product', 'preference.CAT_ID', '=', 'product.CAT_ID')
            ->join('category', 'product.CAT_ID', '=', 'category.CAT_ID')
            ->select('product.*', 'category.CAT_NAME')
            ->where('product.STATUS', 1)
            ->get();

			$most_recents = Product::where('product.STATUS', 1)->orderBy('created_at', 'desc')->take(5)->get();

			$top_rated = Product::where('product.STATUS', 1)->orderBy('AVG_RATING', 'desc')->take(5)->get();

			$most_viewed = Product::where('product.STATUS', 1)->orderBy('views', 'desc')->take(5)->get();

			return view('welcome', compact('most_recents', 'top_rated', 'most_viewed', 'products', 'categories'));
		}
		*/
			
    }
     public function viewMostViewed (){
		

			$most_viewed = Product::where('product.STATUS', 1)->orderBy('views', 'desc')->get();

			return view('homeMostViewed', compact( 'most_viewed'));
		
			
    }
     public function viewMostRated (){
		

			$most_viewed = Product::where('product.STATUS', 1)->orderBy('AVG_RATING', 'desc')->get();

			return view('homeMostRated', compact( 'most_viewed'));
		
			
    }
     public function viewMostRecent (){
		

			$most_viewed = Product::where('product.STATUS', 1)->orderBy('created_at', 'desc')->get();

			return view('homeMostRecent', compact( 'most_viewed'));
		
			
    }
    public function laptop (){
		

			$most_viewed = Product::where('product.STATUS', 1)->where('CAT_ID', '=', 1)->get();

			return view('laptop', compact( 'most_viewed'));
		
			
    }
    public function mobile (){
		

			$most_viewed = Product::where('product.STATUS', 1)->where('CAT_ID', '=', 2)->get();

			return view('mobile', compact( 'most_viewed'));
		
			
    }
    public function book (){
		

			$most_viewed = Product::where('product.STATUS', 1)->where('CAT_ID', '=', 3)->get();

			return view('book', compact( 'most_viewed'));
		
			
    }
}
