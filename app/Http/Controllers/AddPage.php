<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $input = $request->all(); //store the post values in input array
        $errors = array(); //inialize an empty array to store errors

        try {
            // this will create a file on local storage with the markdown extension
            if (!isset($input['page_title'])) { 
                //if file name is empty add error to errors array
                $errors[] = 'No file name';
            }
    
            if (!isset($input['page_content'])) { 
                //if file content is empty add error to errors array
                $errors[] = 'No file content';
            }
    
            //if there are errors return error response
            if (sizeof($errors) > 0) {
                return response()
                    ->json([
                        'code' => '400', 
                        'errors' => $errors
                        ]);
            }
    
            Storage::disk('local')->put($input['page_title'], $input['page_content']);
            return response()
                ->json([
                    'code' => '201', 
                    'message' => 'Page added successfully']
                );

        } catch (\Exception $e) {
            // return error response to the user
            return response()->json(['error' => $e]);
        }

        
    }
}
