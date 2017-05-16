<?php

namespace App\Http\Controllers;

use App\Helper\Translate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('query')) {
            $content = Translate::translate($request->input('query'));
            $query = $request->input('query');
            return view('pages.index', compact('content', 'query'));
        }
        return view('pages.index');
    }


}
