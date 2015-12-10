<?php

namespace App\Http\Controllers;

use RTFLex\io\StreamReader;
use RTFLex\tree\RTFDocument;
use Illuminate\Http\Request;
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

        return $text;
    }
}
