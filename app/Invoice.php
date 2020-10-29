<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
    	'user_id',
    	'stripe_id',
		'name_plan',
		'card_brand',
		'card_number',
		'paid_out',
		'number',
		'created',
		'hosted_invoice_url',
		'invoice_pdf',
    ];
}
