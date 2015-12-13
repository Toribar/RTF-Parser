<?php

namespace App\Http\Controllers;

use RTFLex\io\StreamReader;
use RTFLex\tree\RTFDocument;
use Illuminate\Http\Request;
use App\Parsers\DocumentParser;
use RTFLex\tokenizer\RTFTokenizer;
use App\Http\Controllers\Controller;
use Input;

class MainController extends Controller
{
    public function index(Request $request)
    {
        
        return view('index');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('attach'))
        {
            $file = Input::file('attach');

            $content =  file_get_contents($file);

            $search = array("\'8a", "\'d0", "\'c8", "\'c6", "\'8e", "\'9a", "\'f0", "\'e8", "\'e6", "\'9e");
            $replace = array("S~", "D~", "C^", "C~", "Z~", "s~", "d~", "c^", "c~", "z~");

            $textForParser = str_replace($search, $replace, $content);

            return $textForParser;
        }
    }


    public function show()
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
            'place' => 'Ulica:',
            'street' =>',',
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

        return view('table', compact('parser'));

    }
}
