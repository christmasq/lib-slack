<?php

namespace LibSlack\Tests\Components\Objects;

use LibSlack\Components\Objects\Text;
use PHPUnit\Framework\TestCase;

/**
 * Class TextTest
 * @package LibSlack\Tests\Components\Objects
 */
class TextTest extends TestCase
{

    /**
     * test Text class constructor
     */
    public function test__construct()
    {
        $text = new Text('text', true);
        $this->assertEquals(Text::TYPE_TEXT, $text->type);
        $this->assertEquals('text', $text->text);
        $this->assertEquals(true, $text->verbatim);
    }
}
