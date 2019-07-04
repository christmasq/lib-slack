<?php

namespace LibSlack\Tests;

use LibSlack\Components\Objects\Text;
use LibSlack\Utility;
use PHPUnit\Framework\TestCase;

/**
 * Class UtilityTest
 * @package LibSlack\Tests\Utility
 */
class UtilityTest extends TestCase
{

    /**
     * test objectToArray method
     */
    public function testObjectToArray()
    {
        $object = new Text('text');

        $expected = [
            'type' => 'mrkdwn',
            'text' => 'text',
            'verbatim' => false,
        ];

        $this->assertEquals($expected, Utility::objectToArray($object));
    }
}
