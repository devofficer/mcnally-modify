<?php
namespace App\Http\Controllers;

use App\FileManager;
use App\PdfView;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Storage;

use App\Http\Requests\PdfCreateRequest;
use App\Http\Requests\PdfFileRequest;

use Auth;

class FileManagerController extends Controller
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
    public function index(Request $request)
    {
        if(!$request->ajax()){
            return view('admin.index');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $pdfs = FileManager::orderBy('date', 'DESC')->get();

        foreach ($pdfs as $notification) {
            $check = PdfView::where('pdf_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $args = [
                    'pdf_id' => $notification['id'],
                    'user_id' => Auth::user()->id,
                ];
                PdfView::create($args);
            }
        }

        return response()->json($pdfs);
    }

    public function getListFilter(Request $request)
    {

        $pdfs = FileManager::whereYear('date', '=', $request['year'])
          ->whereMonth('date', '=', $request['month'])
          ->orderBy('date', 'DESC')
          ->get();

        foreach ($pdfs as $notification) {
            $check = PdfView::where('pdf_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $args = [
                    'pdf_id' => $notification['id'],
                    'user_id' => Auth::user()->id,
                ];
                PdfView::create($args);
            }
        }

        return response()->json($pdfs);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function show(FileManager $fileManager)
    {
        //
    }

    public function create(PdfCreateRequest $request)
    {

      $v ='';
      foreach ($request['visibility'] as $visibility) {
        $v .= $visibility.',';
      }

      $arg = [
        'title' => $request['title'],
        'slug' => $request['title'],
        'desc' => $request['desc'],
        'date' => $request['date'].' '.date('H:i:s'),
        'visibility' => $v,
        'file' => $request['file'],
      ];

      try {
        FileManager::create($arg);
        session(['session' => 1]);
        return response()->json(['success' => 1]);
      } catch (QueryException $e) {
        session(['session' => 2]);
        return response()->json(['error' => 1]);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id File ID
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!empty($id)) {
            $data = FileManager::find($id);
            if (!empty($data)) {
                $data->date_str = Carbon::parse($data->date)->format('d M, Y');
                $data->visibility = explode(',', $data->visibility);
                if (Storage::exists('public/uploads/pdf/'.$data->file)) {
                    $file = new \stdClass();
                    $file->name = $data->file;
                    $file->size = Storage::size('public/uploads/pdf/'.$data->file);
                    $file->url  = asset('public/storage/uploads/pdf/'.$data->file);
                    $data->file = $file;
                } else {
                    $data->file = null;
                }
                $file = $data;
                return view('admin/pdf-edit', compact('file'));
            } else {
                return abort('404');
            }
        } else {
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PdfCreateRequest $request, $id)
    {

        $v ='';
        foreach ($request['visibility'] as $visibility) {
            $v .= $visibility.',';
        }

        $arg = [
            'title' => $request['title'],
            'slug' => $request['title'],
            'desc' => $request['desc'],
            'date' => $request['date'].' '.date('H:i:s'),
            'visibility' => $v,
            'file' => $request['file'],
        ];

        try {
            FileManager::where('id', $id)->update($arg);
            session(['session' => 1]);
            return response()->json(['success' => 1]);
        } catch (QueryException $e) {
            session(['session' => 2]);
            return response()->json(['error' => 1]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $pdf = FileManager::find($request['id']);
            $pdf->delete();
            return response()->json(['success' => 1]);
        } catch (QueryException $e) {
            return response()->json(['success' => 2]);   
        }
    }

    public function attach(PdfFileRequest $request)
    {
        if($request->hasfile('file')){
            $file = $request->file('file');
            $name = time().'-'.$file->getClientoriginalname();
            $file->move(public_path().'/assets/files/pdf/',$name);
        }

        return response()->json(['success' => 1, 'pdf' => $name]);
    }

    public function notifications()
    {
        $data = FileManager::All();

        $count = 0;

        foreach ($data as $pdf) {
            $check = PdfView::where('pdf_id', $pdf['id'])
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
