<?php

// select * from documents order by created_at desc limit 1
$document = Document::latest()->first();

$next = 1;

if ($document and $document->created_at->format('Ym') == date('Ym'))
{
	$next = $document->number + 1;
}

Document::create([
	'number' => $next,
	...
]);
