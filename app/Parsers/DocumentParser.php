<?php

namespace App\Parsers;

/**
 * Class for parsing given text with given rules.
 */
class DocumentParser
{
    /**
     * Key-value array to hold all our found matches.
     * Key is the string provided for each rule.
     * Value is parsed text.
     *
     * @var array
     */
    private $matches = [];

    /**
     * Create new parser object.
     *
     * @param string $text Text to be parsed
     * @param array $rules Rules to apply when parsing text.
     */
    public function __construct($text, array $rules)
    {
        $this->parse($text, $rules);
    }

    /**
     * Parse given text with given rules.
     *
     * @return void
     */
    private function parse($text, array $rules)
    {
        // 1. Create regex pattern for all rules.
        // 2. Extract regex matches.
        // 3. Fill $matches field with found values for each given rule key.
    }

    /**
     * Get parsed value for given rule key.
     *
     * @param  string $key Key from rules array.
     * @return string
     */
    public function get($key)
    {
        //
    }
}
