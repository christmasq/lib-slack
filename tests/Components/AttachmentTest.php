<?php

namespace LibSlack\Tests\Components;

use LibSlack\Components\Attachment;
use PHPUnit\Framework\TestCase;

class AttachmentTest extends TestCase
{
    public function testAttachment()
    {
        $attachment = new Attachment();
        $attachment->addText('text');
        $attachment->addImage('title', 'image_url');

        //expected
        $expected = [
            [
                'type' => 'text',
                'text' => 'text',
            ],
            [
                'type' => 'image',
                'title' => 'title',
                'image_url' => 'image_url',
            ],
        ];

        // assert
        $this->assertEquals($expected, $attachment->attachments);
    }
}
