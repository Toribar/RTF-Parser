<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Document;
use App\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use RTFLex\io\StreamReader;
use RTFLex\tree\RTFDocument;
use App\Parsers\DocumentParser;
use RTFLex\tokenizer\RTFTokenizer;

class MainController extends Controller
{
    public function getIndex(Request $request)
    {
        $documents = Document::all();

        return view('index', compact('documents'));
    }

    public function postIndex(Request $request)
    {

        if ($request->hasFile('attach'))
        {
            $file = Input::file('attach');

            $filename = str_replace('.' . $file->getClientOriginalExtension(), null, $file->getClientOriginalName());

            $content =  file_get_contents($file);

            $search = array("\'8a", "\'d0", "\'c8", "\'c6", "\'8e", "\'9a", "\'f0", "\'e8", "\'e6", "\'9e");
            $replace = array("S~", "D~", "C^", "C~", "Z~", "s~", "d~", "c^", "c~", "z~");

            $textForParser = str_replace($search, $replace, $content);

            file_put_contents('uploads/sample.rtf', $textForParser);

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
            
            //database
            Document::create([
                'idmm' =>                      $parser->get('idmm'),
                'customer_name' =>             $parser->get('costumer'),
                'customer_address_street' =>   $parser->get('street'),
                'customer_address_number' =>   $parser->get('number'),
                'customer_address_location' => $parser->get('place'),
                'issue_code' =>                $filename,
                'issue_type' =>                $parser->get('issue'),
                'issued_on' =>                 Carbon::parse($parser->get('read_date')),
                'document' =>                  $text,
            ]);
            
        }
    
        return redirect('index');
    }

    public function getCustomer()
    {


        return view('customers');

    }

    
}
