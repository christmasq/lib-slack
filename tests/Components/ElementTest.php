<?php

namespace LibSlack\Tests\Components;

use LibSlack\Components\Element;
//use LibSlack\Components\Elements\Button;
//use LibSlack\Components\Elements\DatePicker;
//use LibSlack\Components\Elements\Image;
//use LibSlack\Components\Elements\Overflow;
//use LibSlack\Components\Elements\SelectMenu;
use LibSlack\Components\Objects\Option;
use PHPUnit\Framework\TestCase;

/**
 * Class ElementTest
 * @package LibSlack\Tests\Components
 */
class ElementTest extends TestCase
{
    /**
     * test addOverflow method
     */
    public function testAddOverflow()
    {
        $option = new Option('text', 'value');
        $element = new Element();
        $element->addOverflow('overflow', [$option]);

        // expected
        $expected = [
            [
                'type' => 'overflow',
                'action_id' => 'overflow',
                'options' => [
                    [
                        'text' => [
                            'type' => 'plain_text',
                            'text' => 'text',
                            'emoji' => true,
                        ],
                        'value' => 'value',
                    ],
                ],
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }


    /**
     * test add static select menu method
     */
    public function testAddStaticSelectMenu()
    {
        $option = new Option('text', 'value');
        $params = ['options' => [$option]];
        $element = new Element();
        $element->addSelectMenu(Element::TYPE_STATIC_SELECT, 'placeholder', 'select_menu', $params);

        // expected
        $expected = [
            [
                'type' => 'static_select',
                'placeholder' => [
                    'type' => 'plain_text',
                    'text' => 'placeholder',
                    'emoji' => true,
                ],
                'action_id' => 'select_menu',
                'options' => [
                    [
                        'text' => [
                            'type' => 'plain_text',
                            'text' => 'text',
                            'emoji' => true,
                        ],
                        'value' => 'value',
                    ],
                ],
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test add external select menu method
     */
    public function testAddExternalSelectMenu()
    {
        $params = ['min_query_length' => 1];
        $element = new Element();
        $element->addSelectMenu(Element::TYPE_EXTERNAL_SELECT, 'placeholder', 'select_menu', $params);

        // expected
        $expected = [
            [
                'type' => 'external_select',
                'placeholder' => [
                    'type' => 'plain_text',
                    'text' => 'placeholder',
                    'emoji' => true,
                ],
                'action_id' => 'select_menu',
                'min_query_length' => 1,
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test add user select menu method
     */
    public function testAddUserSelectMenu()
    {
        $params = ['initial_user' => 'user_id'];
        $element = new Element();
        $element->addSelectMenu(Element::TYPE_USERS_SELECT, 'placeholder', 'select_menu', $params);

        // expected
        $expected = [
            [
                'type' => 'users_select',
                'placeholder' => [
                    'type' => 'plain_text',
                    'text' => 'placeholder',
                    'emoji' => true,
                ],
                'action_id' => 'select_menu',
                'initial_user' => 'user_id',
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test add channel select menu method
     */
    public function testAddChannelSelectMenu()
    {
        $params = ['initial_channel' => 'channel_id'];
        $element = new Element();
        $element->addSelectMenu(Element::TYPE_CHANNELS_SELECT, 'placeholder', 'select_menu', $params);

        // expected
        $expected = [
            [
                'type' => 'channels_select',
                'placeholder' => [
                    'type' => 'plain_text',
                    'text' => 'placeholder',
                    'emoji' => true,
                ],
                'action_id' => 'select_menu',
                'initial_channel' => 'channel_id',
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test add conversations select menu method
     */
    public function testAddConversationsSelectMenu()
    {
        $params = ['initial_conversation' => 'conversation_id'];
        $element = new Element();
        $element->addSelectMenu(Element::TYPE_CONVERSATIONS_SELECT, 'placeholder', 'select_menu', $params);

        // expected
        $expected = [
            [
                'type' => 'conversations_select',
                'placeholder' => [
                    'type' => 'plain_text',
                    'text' => 'placeholder',
                    'emoji' => true,
                ],
                'action_id' => 'select_menu',
                'initial_conversation' => 'conversation_id',
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test addImage method
     */
    public function testAddImage()
    {
        $element = new Element();
        $element->addImage('image_url', 'alt_text');

        // expected
        $expected = [
          [
              'type' => 'image',
              'image_url' => 'image_url',
              'alt_text' => 'alt_text',
          ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test addDatePicker method
     */
    public function testAddDatePicker()
    {
        $element = new Element();
        $element->addDatePicker('date_picker');

        // expected
        $expected = [
            [
                'type' => 'date_picker',
                'action_id' => 'date_picker',
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test addButton method
     */
    public function testAddButton()
    {
        $element = new Element();
        $element->addButton('text', 'button');

        // expected
        $expected = [
            [
                'type' => 'button',
                'text' => [
                    'type' => 'plain_text',
                    'text' => 'text',
                    'emoji' => true,
                ],
                'action_id' => 'button',
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }

    /**
     * test add divider block method
     */
    public function testAddText()
    {
        $element = new Element();
        $element->addText('text');

        // expected
        $expected = [
            [
                'type' => 'mrkdwn',
                'text' => 'text',
                'verbatim' => false,
            ],
        ];

        // assert
        $this->assertEquals($expected, $element->elements);
    }
}
