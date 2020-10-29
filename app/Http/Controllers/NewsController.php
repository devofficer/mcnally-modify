<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsView;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewIDescRequest;

use Auth;



class NewsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function invNews(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    public function index()
    {
        $news = News::orderBy('date', 'DESC')->get();

        foreach ($news as $notification) {
            $check = NewsView::where('news_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $args = [
                    'news_id' => $notification['id'],
                    'user_id' => Auth::user()->id,
                ];
                NewsView::create($args);
            }
        }

        return response()->json($news);
    }

    public function getListFilter(Request $request)
    {

        $news = News::whereYear('date', '=', $request['year'])
          ->whereMonth('date', '=', $request['month'])
          ->orderBy('date', 'DESC')
          ->get();

        foreach ($news as $notification) {
            $check = NewsView::where('news_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $args = [
                    'news_id' => $notification['id'],
                    'user_id' => Auth::user()->id,
                ];
                NewsView::create($args);
            }
        }

        return response()->json($news);
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {

      $v ='';
      foreach ($request['visibility'] as $visibility) {
        $v .= $visibility.',';
      }

      $arg = [
        'title' => $request['title'],
        'slug' => $request['title'],
        'subtitle' => $request['subtitle'],
        'description' => $request['description'],
        'date' => $request['date'].' '.date('H:i:s'),
        'visibility' => $v,
        'image' => $request['image'],
        'epigraph' => $request['epigraph'],
      ];

      try {
        News::create($arg);
        session(['session' => 1]);
        return response()->json(['success' => 1]);
      } catch (QueryException $e) {
        session(['session' => 2]);
        return response()->json(['error' => 1]);
      }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::where('id', $id)->get();
        $new = $new[0];

        return view('admin.news.show',compact('new'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id News ID
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::where('id', $id)->get();
        $new = $new[0];
      
      return view('admin.news.edit',compact('new'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCreateRequest $request, $id)
    {
      $v ='';
      foreach ($request['visibility'] as $visibility) {
        $v .= $visibility.',';
      }

        $arg = [
            'title' => $request['title'],
            'slug' => $request['title'],
            'subtitle' => $request['subtitle'],
            'description' => $request['description'],
            'date' => $request['date'].' '.date('H:i:s'),
            'visibility' => $v,
            'image' => $request['image'],
            'epigraph' => $request['epigraph'],
        ];

        
            News::where('id', $id)->update($arg);
            return response()->json(['success' => 1]);
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $note = News::find($request['id']);
            $note->delete();
            return response()->json(['success' => 1]);
        } catch (QueryException $e) {
            return response()->json(['success' => 2]);   
        }
    }

    public function imgdesc(Request $request)
    {

        if($request->hasfile('file')){
            $file = $request->file('file');
            $name = time().'-'.$file->getClientoriginalname();
            $file->move(public_path().'/assets/images/newsdesc/',$name);
        }
        return response()->json(['success' => 1, 'image' => $name]);
    }

    public function imgprin(Request $request)
    {

        if($request->hasfile('file')){
            $file = $request->file('file');
            $name = time().'-'.$file->getClientoriginalname();
            $file->move(public_path().'/assets/images/newsprin/',$name);
        }

        session(['imgPrincipalNew' => $name]);
        return response()->json(['success' => 1, 'image' => $name]);
    }

    public function notifications()
    {
        $data = News::All();

        $count = 0;

        foreach ($data as $news) {
            $check = NewsView::where('news_id', $news['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $count++;
            }
        }

        $response = [
            'count'=> $count
        ];

        return response()->json($response);
    }
}
