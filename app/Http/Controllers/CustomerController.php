<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Document;
use App\Costumer;

class CustomerController extends Controller
{
	public function getIndex(Request $request)
    {

        return view('customers');

    }

    public function postIndex(Request $request)
    {

    	if ($request->has('idmm')) {

    		$inputCatch = $request->input('idmm');

    		$customerArray = Document::where('idmm', $inputCatch)->get()->toArray();

    		$customerObject = new Costumer($customerArray);
    		dd($customerObject);
    	}

    }
}
