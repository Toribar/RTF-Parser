<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
 	protected $dates = ['issued_on'];
	
    protected $fillable = ['idmm', 'customer_name', 'customer_address_street', 
    'customer_address_number', 'customer_address_location', 'issue_code', 'issue_type', 
    'issued_on', 'document'];
}
