<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class profileController extends Controller
{
    public function viewProfile(){
 
        
        $cat = DB::table('category')->get();

        $query="SELECT
preference.USER_ID,
category.CAT_NAME,
preference.CAT_ID
FROM
category
INNER JOIN preference ON category.CAT_ID = preference.CAT_ID

 
            ";
        $pref= DB::select( DB::raw($query) );

        $data2 = array('cat'  => $cat,'pref' => $pref
            );
        
        return view('user/profile')->with('data2',$data2);
    }

     public function storeImage( Storage $storage, Request $request ,$id)
    {
        if ( $request->isXmlHttpRequest() )
        {
            $image = $request->file( 'image' );
            $timestamp = $this->getFormattedTimestamp();
            $savedImageName = $this->getSavedImageName( $timestamp, $image );

            $imageUploaded = $this->uploadImage( $image, $savedImageName, $storage );


            





            if ( $imageUploaded )
            {
                $data = [
                    'original_path' => asset( '/images/' . $savedImageName )
                ];
                DB::table('user_profile')
                ->where('USER_ID',$id )
                ->update(array('image' => $savedImageName ));
                return redirect()->back()->with('data', ['1']);;

            }
            return "uploading failed";
        }


    }


    
     
    public function uploadImage( $image, $imageFullName, $storage )
    {
        $filesystem = new Filesystem;
        return $storage->disk( 'image' )->put( $imageFullName, $filesystem->get( $image ) );
    }

    /**
     * @return string
     */
    protected function getFormattedTimestamp()
    {
        return str_replace( [' ', ':'], '-', Carbon::now()->toDateTimeString() );
    }

    /**
     * @param $timestamp
     * @param $image
     * @return string
     */
    protected function getSavedImageName( $timestamp, $image )
    {
        return $timestamp . '-' . $image->getClientOriginalName();
    }



        public function saveName(Request $request,$id ){


                DB::table('user_profile')
            ->where('USER_ID', $id)
            ->update(array('USER_NAME' => $request->input("name"),
                'email' => $request->input("email"),
                'ADDRESS' => $request->input("address")));
                


                return redirect()->back()->with('data', ['1']);;

                
            }
        public function savePass(Request $request,$id ){


                DB::table('user_profile')
            ->where('USER_ID', $id)
            ->update(array('password' => bcrypt($request->input("newpass"))
                ));
                


                return redirect()->back()->with('data', ['1']);;

                
            }

            public function storePref(Request $request,$id)
            {

                $data = Input::get('ch');
                DB::table('preference')->where('USER_ID', '=', $id)->delete();

                foreach ($data as $d){ 

                    DB::table('preference')->insert(
                   array('USER_ID' => $id, 'CAT_ID' => $d)
                    );
                
                    
                }

                return redirect()->back();

               


               
                
                
            }


}
