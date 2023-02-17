<?php

namespace Tests;
use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
//    protected TagParser $parser;
//
//    protected function setUp(): void
//    {
//        $this->parser = new TagParser();
//    }

    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        $parser = new TagParser();
        $result = $parser->parse($input);
        $this->assertSame($expected, $result);
    }

    public static function tagsProvider()
    {
        return [
            ['personal', ['personal']],
            ['personal, money, family', ['personal', 'money', 'family']],
            ['personal,money,family', ['personal', 'money', 'family']],
            ['personal | money | family', ['personal', 'money', 'family']],
            ['personal|money|family', ['personal', 'money', 'family']],
            ['personal!money!family', ['personal', 'money', 'family']],
        ];
    }

    /*
    public function test_it_parses_a_single_tag()
    {
        // Given - Arrange
//        $parser = new TagParser();

        // When - Act - Do something
        $result = $this->parser->parse('personal');
        $expected = ['personal'];

        // Then - Assert
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_with_space_separated_lisf_of_tags()
    {
//        $parser = new TagParser();

        $result = $this->parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_separated_lisf_of_tags()
    {
//        $parser = new TagParser();

        $result = $this->parser->parse('personal,money,family');
        $expected = ['personal', 'money', 'family'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_pipe_separeted_lists_of_tags()
    {
//        $parser = new TagParser();

        $result = $this->parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_pipe_no_spaces_separeted_lists_of_tags()
    {
//        $parser = new TagParser();

        $result = $this->parser->parse('personal|money|family');
        $expected = ['personal', 'money', 'family'];

        $this->assertSame($expected, $result);
    }
    */
}