<?php

namespace LibSlack\Components;

use LibSlack\Components\Blocks\Actions;
use LibSlack\Components\Blocks\Context;
use LibSlack\Components\Blocks\Divider;
use LibSlack\Components\Blocks\Image;
use LibSlack\Components\Blocks\Section;
use LibSlack\Objects\Components\PlainText;
use LibSlack\Objects\Components\Text;

/**
 * Create block component
 *
 * reference url:
 * https://api.slack.com/reference/messaging/blocks
 *
 * @package LibSlack
 */
class Block extends Component
{
    const TYPE_SECTION = 'section';
    const TYPE_DIVIDER = 'divider';
    const TYPE_IMAGE = 'image';
    const TYPE_ACTIONS = 'actions';
    const TYPE_CONTEXT = 'context';

    /**
     * contain all blocks
     * @var array
     */
    public $blocks = [];

    /**
     * create a section block
     * @param string|Text $text
     * @param array $params
     * @return void
     */
    public function addSection($text, array $params = [])
    {
        $section = new Section($text, $params);

        $this->addBlock($section->toArray());
    }

    /**
     * create a image block
     * @param string $image_url
     * @param string $alt_text
     * @param array $params
     * @return void
     */
    public function addImage($image_url, $alt_text, array $params = [])
    {
        $image = new Image($image_url, $alt_text, $params);

        $this->addBlock($image->toArray());
    }

    /**
     * create a action block
     * An array of interactive element objects - buttons, select menus, overflow menus, or date pickers
     * @param array $elements
     * @param string $block_id
     * @return void
     */
    public function addAction(array $elements, $block_id = '')
    {
        $action = new Actions($elements, $block_id);

        $this->addBlock($action->toArray());
    }

    /**
     * create a context block
     * An array of image elements and text objects. Maximum number of items is 10
     * @param array $elements
     * @param string $block_id
     * @return void
     */
    public function addContext(array $elements, $block_id = '')
    {
        $context = new Context($elements, $block_id);

        $this->addBlock($context->toArray());
    }


    /**
     * create a divider block
     * @param string $block_id
     */
    public function addDivider($block_id = '')
    {
        $divider = new Divider($block_id);

        $this->addBlock($divider->toArray());
    }

    /**
     * add a block to block array
     * @param array $block
     */
    private function addBlock(array $block)
    {
        // removed unnecessary empty fields
        $this->blocks[] = $block;
    }
}
