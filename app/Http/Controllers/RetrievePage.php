<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RetrievePage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = $request->input('page_title');

        try {
            if ($title === NULL) {
                return response()->json([
                    'code' => 400, 
                    'error' => 'Invalid request message'
                    ]);
            }
    
            if (Storage::exists($title)) {
                return response()->json([
                    'code' => 200, 
                    'page_content' => Storage::get($title)
                    ]);
            } else {
                return response()->json([
                    'code' => 404, 
                    'error' => 'File not found'
                    ]);
            }
        } catch (\Exception $e) {
            // return error response to the user
            return response()->json(['error' => $e]);
        }
        
    }
}
