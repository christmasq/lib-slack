<?php

namespace LibSlack\Tests\Components\Objects;

use LibSlack\Components\Objects\Dialog;
use PHPUnit\Framework\TestCase;

/**
 * Class DialogTest
 * @package LibSlack\Tests\Components\Objects
 */
class DialogTest extends TestCase
{

    /**
     * test Dialog class constructor
     */
    public function test__construct()
    {
        $dialog = new Dialog('title', 'text', 'confirm', 'deny');
        $this->assertEquals('title', $dialog->title->text);
        $this->assertEquals('text', $dialog->text->text);
        $this->assertEquals('confirm', $dialog->confirm->text);
        $this->assertEquals('deny', $dialog->deny->text);
    }
}
