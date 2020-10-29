<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('pages-404');
    }

    public function topMarketNews(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function comProfile(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function recTrends(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function priceTar(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function epsSurprice(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function basFinancials(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function comNews(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }
}
