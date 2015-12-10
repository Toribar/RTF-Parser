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
    private $values = [];

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
        $values = $this->extractValues($pattern, $text);

        // 3. Fill $matches field with found values for each given rule key.
        $index = 0;

        foreach ($rules as $key => $rule) {
            $this->values[$key] = $values[$index++];
        }
    }

    /**
     * Get parsed value for given rule key.
     *
     * @param  string $key Key from rules array.
     * @return string
     */
    public function get($key)
    {
        // Trim white-space from string before return.
        return trim(array_get($this->values, $key));
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
            // Example "Foo\Bar" => "Foo\\Bar".
            $pattern .= preg_quote($search, '/');

            // Text can optionally contain some white-space
            // characters between text we search for and value
            // we want to extract.
            // Example: "Foo:  bar"
            $pattern .= '\s*';

            // This is pattern group we want to extract.
            $pattern .= '(.*)';
        }

        // Pattern needs to ignore new-line characters.
        return '/' . $pattern . '/s';
    }

    /**
     * Use regex pattern to extract values from text.
     *
     * @param  string $pattern Regex pattern.
     * @param  string $text Text to be parsed.
     * @return array Array of found values.
     */
    private function extractValues($pattern, $text)
    {
        $results = [];

        preg_match_all($pattern, $text, $results);

        $values = [];

        if (count($results) > 1) {
            for ($i = 1; $i < count($results); $i++) {
                $values[] = $results[$i][0];
            }
        }

        return $values;
    }
}
