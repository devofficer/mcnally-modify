<?php

namespace App\Http\Controllers;

use App\Notification;
use App\NotificationView;
use Illuminate\Http\Request;

use Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data = Notification::latest()->take(10)->get();

        $count = 0;

        foreach ($data as $notification) {
            $check = NotificationView::where('notification_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $count++;
            }
        }

        $response = [
            'count'=> $count,
            'listing' => $data->toArray()
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $args = [
            'title' => $request['title'],
            'description' => $request['desc']
        ];

        Notification::create($args);

        return response()->json(['success' => 1]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noti = Notification::find((int)$id);
        if (!empty($noti)) {
            $noti->delete();
            $json['type'] = 'success';
            $json['message'] = "Notification deleted";
            return $json;
        } else {
            $json['message'] = "Something wrong happened";
            $json['type'] = 'error';
            return $json;
        }
    }

    public function checkView()
    {
        $data = Notification::latest()->take(10)->get();

        foreach ($data as $notification) {
            $check = NotificationView::where('notification_id', $notification['id'])
                ->where('user_id', Auth::user()->id)
                ->get();

            if(empty($check[0])) {
                $args = [
                    'notification_id' => $notification['id'],
                    'user_id' => Auth::user()->id,
                ];
                NotificationView::create($args);
            }
        }

        $response = [
            'message'=> 'success',
        ];

        return response()->json($response);
    }
}
