<?php

namespace Tests;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    // personal, money, family
    public function test_it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];

        $this->assertSame($expected, $result);
    }
}