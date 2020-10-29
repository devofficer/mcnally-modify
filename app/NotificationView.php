<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationView extends Model
{
   protected $table = 'notification_view';

   protected $fillable = [
    'notification_id',
    'user_id',
   ];
}
