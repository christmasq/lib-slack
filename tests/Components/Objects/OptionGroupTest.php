<?php

namespace LibSlack\Tests\Components\Objects;

use LibSlack\Components\Objects\Option;
use LibSlack\Components\Objects\OptionGroup;
use PHPUnit\Framework\TestCase;

/**
 * Class OptionGroupTest
 * @package LibSlack\Tests\Components\Objects
 */
class OptionGroupTest extends TestCase
{

    /**
     * test OptionGroup class constructor
     */
    public function test__construct()
    {
        $option = new Option('text', 'value');
        $option_group = new OptionGroup('label', [$option]);
        $this->assertEquals('label', $option_group->label->text);
        $this->assertEquals([$option], $option_group->options);
    }
}
