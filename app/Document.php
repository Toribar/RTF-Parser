<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
	protected $dates = ['issued_on'];
    protected $fillable = ['idmm', 'customer_name', 'customer_address', 'filename', 'issued_on', 'document'];
}
