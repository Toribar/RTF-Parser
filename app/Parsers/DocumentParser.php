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
        $pattern = $this->createPattern($rules);

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

    /**
     * Here we can build our regex pattern based on rules.
     *
     * @param  array $rules
     * @return string Regex pattern
     */
    private function createPattern(array $rules)
    {
        // Text can optionally have anything on the begining.
        $pattern = '.*';

        foreach ($rules as $key => $search) {

            // We need to escape given text to search
            // before we can use it in regex.
            // Example "Foo:" => "Foo\:".
            $escaped = preg_quote($search, '/');

            // Text can optionally contain some white-space
            // characters between text we search for and value
            // we want to extract.
            // Example: "Foo:  bar"
            $pattern .= '\s*';

            // This is pattern group we want to extract.
            $pattern .= '(.*)';

            // Pattern needs to ignore new-line characters.
            $pattern = '/' . $pattern . '/s';

        }

        return $pattern;
    }
}
