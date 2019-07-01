<?php

namespace LibSlack\Tests\Components\Objects;

use LibSlack\Components\Objects\Option;
use PHPUnit\Framework\TestCase;

/**
 * Class OptionTest
 * @package LibSlack\Tests\Components\Objects
 */
class OptionTest extends TestCase
{

    /**
     * test Option class constructor
     */
    public function test__construct()
    {
        $option = new Option('text', 'value');
        $this->assertEquals('text', $option->text->text);
        $this->assertEquals('value', $option->value);
    }
}
