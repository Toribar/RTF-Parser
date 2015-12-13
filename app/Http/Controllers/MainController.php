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
    public function getIndex(Request $request)
    {
        
        return view('index');
    }

    public function postIndex(Request $request)
    {

        if ($request->hasFile('attach'))
        {
            $file = Input::file('attach');

            $filename = str_replace('.' . $file->getClientOriginalExtension(), null, $file->getClientOriginalName());

            dd($file);

            $content =  file_get_contents($file);

            $search = array("\'8a", "\'d0", "\'c8", "\'c6", "\'8e", "\'9a", "\'f0", "\'e8", "\'e6", "\'9e");
            $replace = array("S~", "D~", "C^", "C~", "Z~", "s~", "d~", "c^", "c~", "z~");

            $textForParser = str_replace($search, $replace, $content);

            file_put_contents('uploads/sample.rtf', $textForParser);
        }
        return redirect('show');
    }

    public function getShow()
    {

        $documentPath = public_path('uploads/sample.rtf');

        $reader = new StreamReader($documentPath);
        $tokenizer = new RTFTokenizer($reader);
        $document = new RTFDocument($tokenizer);

        $text = $document->extractText();

        $search = array("S~", "D~", "C^", "C~", "Z~", "s~", "d~", "c^", "c~", "z~");
        $replace = array("Š", "Đ", "Č", "Ć", "Ž", "š", "đ", "č", "ć", "ž");

        $text = str_replace($search, $replace, $text);


        $rules = [
            'order_for' => 'JP BVK Nalog za',
            'read_date' => 'očitavanje/proveru Datum:',
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
