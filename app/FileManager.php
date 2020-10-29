<?php
/**
 * Class FileManager
 *
 * @package McNally
 * @author  Joan Zabala <jmjzabala@gmail.com>
 * @version <1.0.0>
 * @link    https://www.jbosolutions.com
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;
use Storage;

class FileManager extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'date',
        'visibility',
        'file',
    ];

	public $visibilities = [
		'1' => 'Landing Page',
		'2' => 'Pro',
		'3' => 'Expert'
	];

	/**
     * Set slug before saving in DB
     *
     * @param string $value value
     *
     * @access public
     *
     * @return string
     */
    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $temp = Str::slug($value, '-');
            if (!FileManager::all()->where('slug', $temp)->isEmpty()) {
                $i = 1;
                $new_slug = $temp . '-' . $i;
                while (!FileManager::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp . '-' . $i;
                }
                $temp = $new_slug;
            }
            $this->attributes['slug'] = $temp;
        }
    }

    /**
     * Store file.
     *
     * @param mixed $request request->attr
     *
     * @return json
     */
    public function storeFile($request)
    {
        $json = array();
        if (!empty($request)) {
            $this->title 	= filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->slug  	= filter_var($request['title'], FILTER_SANITIZE_STRING);
            $this->desc   	= filter_var($request['desc'], FILTER_SANITIZE_STRING);
            $this->visibility = implode(",", $request['visibility']);
            $this->date 	= $request['date'];
            $this->file   	= "";

            $temp_path = 'public/temp';
            $new_path  = 'public/uploads/pdf';
            $pdf_file  = $request['pdf_file'];
            if (Storage::disk('local')->exists($temp_path . '/' . $pdf_file)) {
                if (!file_exists(storage_path('app') . '/' . $new_path)) {
                    File::makeDirectory($new_path, 0755, true, true);
                }
                $filename = time() . '-' . $pdf_file;
                Storage::move($temp_path . '/' . $pdf_file, $new_path . '/' . $filename);
                $this->file = $filename;
            }
            $this->save();
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }


    /**
     * Update file.
     *
     * @param mixed $request request->attr
     *
     * @return json
     */
    public static function updateFile($request)
    {
        $json = array();
        if (!empty($request) && !empty($request['id'])) {
        	$model 			= FileManager::find($request['id']);
            $model->title 	= filter_var($request['title'], FILTER_SANITIZE_STRING);
            $model->slug  	= filter_var($request['title'], FILTER_SANITIZE_STRING);
            $model->desc   	= filter_var($request['desc'], FILTER_SANITIZE_STRING);
            $model->visibility = implode(",", $request['visibility']);
            $model->date 	= $request['date'];

            if ($request['prevfile'] != $request['pdf_file']) {
	            $temp_path = 'public/temp';
	            $new_path  = 'public/uploads/pdf';
	            $pdf_file  = $request['pdf_file'];
	            if (Storage::disk('local')->exists($new_path . '/' . $request['prevfile'])) {
	                Storage::delete($new_path . '/' . $request['prevfile']);
	            }
	            if (Storage::disk('local')->exists($temp_path . '/' . $pdf_file)) {
	                if (!file_exists(storage_path('app') . '/' . $new_path)) {
	                    File::makeDirectory($new_path, 0755, true, true);
	                }
	                $filename = time() . '-' . $pdf_file;
	                Storage::move($temp_path . '/' . $pdf_file, $new_path . '/' . $filename);
	                $model->file = $filename;
	            }
            }
            $model->save();
            $json['type'] = 'success';
            return $json;
        } else {
            $json['type'] = 'error';
            return $json;
        }
    }

    public static function getFiles($request)
    {
    	if (!empty($request['month']) || !empty($request['year'])) {
    		if (!empty($request['month']) && empty($request['year'])) {
    			$year = Carbon::now()->format('Y');
    			$data = FileManager::whereYear('date', $year)->whereMonth('date', $request['month'])->latest()->get();
    		} else
    		if (empty($request['month']) && !empty($request['year'])) {
    			$month = Carbon::now()->format('m');
    			$data = FileManager::whereYear('date', $request['year'])->whereMonth('date', $month)->latest()->get();
    		} else {
    			$data = FileManager::whereYear('date', $request['year'])->whereMonth('date', $request['month'])->latest()->get();
    		}
    	} else {
    		$data = FileManager::latest()->get();
    	}

        for ($i=0; $i < $data->count(); $i++) {
            $data[$i]->date_str = Carbon::parse($data[$i]->date)->format('d M, Y');
            $data[$i]->file_url = asset('storage/uploads/pdf/'.$data[$i]->file);
            $data[$i]->visibility = explode(',', $data[$i]->visibility);
        }

        $response = [
        	'count'=> $data->count(),
        	'files' => $data->toArray()
        ];

        return $response;
    }
}
