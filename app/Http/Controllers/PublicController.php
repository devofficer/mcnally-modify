<?php
/**
 * Class PublicController
 *
 * @package McNally
 * @author  Joan Zabala <jmjzabala@gmail.com>
 * @version <1.0.0>
 * @link    https://www.jbosolutions.com
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use File;
use Storage;

class PublicController extends Controller
{

    /**
     * Upload file to temporary folder.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempFile(Request $request)
    {
        if (!empty($request['file'])) {
            $file = $request->file('file');

            $json = array();
            if (!empty($file)) {
                $temp_path = 'public/temp';
                $file_original_name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $extValid = ['pdf'];
                if (in_array($extension, $extValid)) {
                    // create directory if not exist.
                    if (!File::exists($temp_path)) {
                        File::makeDirectory($temp_path, 0755, true, true);
                    }
                    $path = Storage::putFileAs($temp_path, $file, $file_original_name);
                    $json['type'] = 'success';
                } else {
                    $json['message'] = "Invalid file";
                    $json['type'] = 'error';
                }
            } else {
                $json['message'] = "File not found";
                $json['type'] = 'error';
            }
            return $json;
        }
    }


    /**
     * Upload file to temporary folder.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadTempImage(Request $request)
    {
        if (!empty($request['file'])) {
            $file = $request->file('file');

            $json = array();
            if (!empty($file)) {
                $temp_path = 'public/temp';
                $file_original_name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $extValid = ['gif','jpg','jpeg','png','svg'];
                if (in_array($extension, $extValid)) {
                    // create directory if not exist.
                    if (!File::exists($temp_path)) {
                        File::makeDirectory($temp_path, 0755, true, true);
                    }
                    $path = Storage::putFileAs($temp_path, $file, $file_original_name);
                    $json['type'] = 'success';
                } else {
                    $json['message'] = "Invalid image";
                    $json['type'] = 'error';
                }
            } else {
                $json['message'] = "File not found";
                $json['type'] = 'error';
            }
            return $json;
        }
    }


    /**
     * Delete file in temporary folder.
     *
     * @param \Illuminate\Http\Request $request request attributes
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteTempFile(Request $request)
    {
        if (!empty($request['name'])) {
            $file = $request['name'];

            $json = array();
            if (!empty($file)) {
                $temp_path = 'public/temp/';
                $path = Storage::delete($temp_path . $file);
                $json['type'] = 'success';
            } else {
                $json['message'] = "File not found";
                $json['type'] = 'error';
            }
            return $json;
        }
    }

    public function coreFundamentalIndia(Request $request)
    {
        return view('landingpage.coreFundamentalIndia');
    }

    public function terminal(Request $request)
    {
        return view('landingpage.terminal');
    }
}
