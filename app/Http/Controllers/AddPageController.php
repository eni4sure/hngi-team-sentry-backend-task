<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddPageController extends Controller {

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {

        try {

            //store the post values in input array
            $input = $request->all();

            //initialize an empty array to store errors
            $errors = array();

            //if {page name is null || empty} add error to errors array
            if ( !isset($input['page_name']) || $input['page_name'] == "" ) {
                $errors[] = 'No page name';
            }

            //if page content is null add error to errors array
            if (!isset($input['page_content'])) {
                $errors[] = 'No page content';
            }

            //if there are errors return error response
            if (sizeof($errors) > 0) {
                return response()
                    ->json($errors, 400);
            }

            Storage::disk('local')->put($input['page_name'], $input['page_content']);

            return response()
                ->json(['success_message' => 'Page added successfully'], 201);

        } catch (\Exception $e) {

            return response()
                ->json(['error' => $e], 400);
        }
    }
}