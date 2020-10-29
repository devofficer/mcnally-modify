<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{

    /**
     * Store notification.
     *
     * @param mixed $request request->attr
     *
     * @return json
     */
    public static function store($request)
    {
        $json = array();
        if (!empty($request)) {
        	$note				= new Notification();
            $note->title 		= filter_var($request['title'].' '.$i, FILTER_SANITIZE_STRING);
            $note->description 	= filter_var($request['description'], FILTER_SANITIZE_STRING);
            $note->save();
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }

    protected $fillable = [
        'title',
        'description'
    ];
}
