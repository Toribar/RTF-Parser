<?php 

namespace App;

use RTFLex\io\StreamReader;
use RTFLex\tree\RTFDocument;
use App\Parsers\DocumentParser;
use RTFLex\tokenizer\RTFTokenizer;

class Parser {

	public function getParser ()

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

	    return $parser;
	}

}