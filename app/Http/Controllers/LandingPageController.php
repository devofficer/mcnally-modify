<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $path = $request->path() == '/'?'index':$request->path();
        if(view()->exists('landingpage/'.$path)){
            return view('landingpage.'.$path);
        }
        return view('pages-404');
    }

    public function register_step1(Request $request)
    {
        return response()->json($request->all());
        //return view('landingpage.register_step1');
    }
}
