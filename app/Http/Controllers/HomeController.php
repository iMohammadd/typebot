<?php

namespace App\Http\Controllers;

use App\Helper\Translate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('query')) {
            $content = $this->convert($request->input('query'));
            $query = $request->input('query');
            return view('pages.index', compact('content', 'query'));
        }
        return view('pages.index');
    }

    public function convert($query)
    {
        $keys = Translate::getPlainKey();
        $array = Translate::toArray($query);
        $resp = [];
        //return $array;
        for ($i=0; $i<count($array); $i++) {
            //$converted[] = \App\Helper\Translate::trans($array[$i]);
            foreach ($keys as $k => $v) {
                if ($array[$i] == $k) {
                    $resp[] = $v;
                    break;
                } elseif ($array[$i] == $v) {
                    $resp[] = $k;
                    break;
                } else {
                    $resp[] = $array[$i];
                    break;
                }
            }
        }
        return implode($resp);
    }
}
