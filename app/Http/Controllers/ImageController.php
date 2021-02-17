<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Process Image

        
        if($request->hasFile('image')) {
            $date = date('YmdHis');
            
            $file_name=$request->file('image')->getClientOriginalName();
            $file_size=$request->file('image')->getSize();
            $file_tmp= $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            if($extension=='png' && $file_size<'80000000'){ /* Only PNG and 10MB max size */
        
                $dataimg = file_get_contents( $file_tmp );
                $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($dataimg);
            
                /*API endpoint*/
                # Our new data
                $data = array(
                    'imageData' => base64_encode($dataimg)
                );
                # Create a connection
                $url = 'https://test.rxflodev.com';
                $ch = curl_init($url);
                # Form data string
                $postString = http_build_query($data, '', '&');
                # Setting our options
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                # Get the response
                $response = curl_exec($ch);
                curl_close($ch);
                $values = json_decode($response, true);

                # Save values in Sessions
                Session::push('gallery', [
                    $date => $values['url']
                ]);  
              
                return redirect('/');
        
            }else{
              $alert = "Invalid format or size";
              return view('error', compact("alert"));;
            }
          }else{
            $alert = "Without Image, please select a png image";
            return view('error', compact("alert"));;
          }
    }
}
