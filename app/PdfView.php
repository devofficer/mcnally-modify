<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PdfView extends Model
{
   protected $table = 'pdf_view';

   protected $fillable = [
    'pdf_id',
    'user_id',
   ];
}
