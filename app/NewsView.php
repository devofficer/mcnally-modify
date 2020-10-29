<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsView extends Model
{
   protected $table = 'news_view';

   protected $fillable = [
    'news_id',
    'user_id',
   ];
}
