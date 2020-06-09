<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\HTMLToMarkdown\HtmlConverter;
use Illuminate\Support\Facades\Storage;

class SetMarkdown extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $page_name = $request->input('page_name');

        if ($page_name === NULL) {
            return response()->json(['code' => 400, 'error' => 'File name not specified']);
        }

        if (Storage::exists($page_name)) {
            $converter = new HtmlConverter();
            $markdown = $converter->convert(Storage::get($page_name));

            return response()->json(['code' => 200, 'markdown_content' => $markdown]);
        } else {
            return response()->json(['code' => 404, 'error' => 'File not found']);
        }
    }
}
