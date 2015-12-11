<?php

namespace App\Http\Controllers;

use RTFLex\io\StreamReader;
use RTFLex\tree\RTFDocument;
use Illuminate\Http\Request;
use App\Parsers\DocumentParser;
use RTFLex\tokenizer\RTFTokenizer;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function getIndex()
    {
        $documentPath = public_path('uploads/sample.rtf');

        $reader = new StreamReader($documentPath);
        $tokenizer = new RTFTokenizer($reader);
        $document = new RTFDocument($tokenizer);

        $text = $document->extractText();

        $rules = [
            'order_for' => 'JP BVK Nalog za',
            'read_date' => 'oèitavanje/proveru Datum:',
            'issued_by' => 'Nalogodavac:',
            'campaign_id' => 'ID kampanje:',
            'reading_number' => 'Ocitavanje br:',
            'charging' => 'NAPLATA',
            'reon' => 'Reon:',
            'adress' => 'Ulica:',
            'number' => 'Broj:',
            'import' => 'Ulaz:',
            'costumer' => 'Potrosac:',
            'idmm' => 'ID mernog mesta:',
            'id_brojila' => 'ID brojila:',
            'issue' => 'Stanje brojila:',
            'idmm_' => ' *',
            'endless_gliberish_string' => 'Fabricki broj:',
            
        ];

        $parser = new DocumentParser($text, $rules);

        return view('index', compact('parser'));    
    }

    public function getUpload()
    {

        return view('upload');

    }
}
