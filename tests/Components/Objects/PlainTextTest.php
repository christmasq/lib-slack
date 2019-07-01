<?php

namespace LibSlack\Tests\Components\Objects;

use LibSlack\Components\Objects\PlainText;
use LibSlack\Components\Objects\Text;
use PHPUnit\Framework\TestCase;

/**
 * Class PlainTextTest
 * @package LibSlack\Tests\Components\Objects
 */
class PlainTextTest extends TestCase
{

    /**
     * test PlainText class constructor
     */
    public function test__construct()
    {
        $plain_text = new PlainText('text', false);
        $this->assertEquals(Text::TYPE_PLAINTEXT, $plain_text->type);
        $this->assertEquals('text', $plain_text->text);
        $this->assertEquals(false, $plain_text->emoji);
    }
}
