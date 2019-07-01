<?php

namespace LibSlack\Tests\Components;

use LibSlack\Components\Block;
use LibSlack\Components\Element;
use LibSlack\Components\Elements\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class BlockTest
 * @package LibSlack\Tests\Components
 */
class BlockTest extends TestCase
{

    /**
     * test add action block method
     */
    public function testAddAction()
    {
        $element = new Element();
        $element->addImage('image_url', 'alt_text');
        $block = new Block();
        $block->addAction($element->elements, 'action_block');

        // expected
        $expected = [
            [
                'type' => 'actions',
                'elements' => [
                    [
                        'type' => 'image',
                        'image_url' => 'image_url',
                        'alt_text' => 'alt_text',
                    ],
                ],
                'block_id' => 'action_block',
            ],
        ];

        $this->assertEquals($expected, $block->blocks);
    }

    /**
     * test add context block method
     */
    public function testAddContext()
    {
        $element = new Element();
        $element->addImage('image_url', 'alt_text');
        $block = new Block();
        $block->addContext($element->elements, 'context_block');

        // expected
        $expected = [
            [
                'type' => 'context',
                'elements' => [
                    [
                        'type' => 'image',
                        'image_url' => 'image_url',
                        'alt_text' => 'alt_text',
                    ],
                ],
                'block_id' => 'context_block',
            ],
        ];

        $this->assertEquals($expected, $block->blocks);
    }

    /**
     * test add section block method
     */
    public function testAddSection()
    {
        $image = new Image('image_url', 'alt_text');
        $params = ['block_id' => 'section_block', 'accessory' => $image];
        $block = new Block();
        $block->addSection('text', $params);

        // expected
        $expected = [
            [
                'type' => 'section',
                'text' => [
                    'type' => 'plain_text',
                    'text' => 'text',
                    'emoji' => true,
                ],
                'accessory' => [
                    'type' => 'image',
                    'image_url' => 'image_url',
                    'alt_text' => 'alt_text',
                ],
                'block_id' => 'section_block',
            ],
        ];

        $this->assertEquals($expected, $block->blocks);
    }

    /**
     * test add image block method
     */
    public function testAddImage()
    {
        $block = new Block();
        $block->addImage('image_url', 'alt_text');

        // expected
        $expected = [
            [
                'type' => 'image',
                'image_url' => 'image_url',
                'alt_text' => 'alt_text',
                'title' => [
                    'type' => 'plain_text',
                    'text' => 'alt_text',
                    'emoji' => true,
                ],
            ],
        ];

        $this->assertEquals($expected, $block->blocks);
    }

    /**
     * test add divider block method
     */
    public function testAddDivider()
    {
        $block = new Block();
        $block->addDivider('divider_block');

        // expected
        $expected = [
            [
                'type' => 'divider',
                'block_id' => 'divider_block',
            ],
        ];

        $this->assertEquals($expected, $block->blocks);
    }
}
