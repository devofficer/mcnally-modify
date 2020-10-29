<?php
/**
 * Class News
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

class News extends Model
{
   protected $table = 'news';

   protected $fillable = [
    'title',
    'slug',
    'subtitle',
    'description',
    'date',
    'visibility',
    'image',
    'epigraph',
   ];


}
