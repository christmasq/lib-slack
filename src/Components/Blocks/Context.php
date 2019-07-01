<?php

namespace LibSlack\Components\Blocks;


use LibSlack\Components\Block;
use LibSlack\Components\Component;

/**
 * Class Context
 * @package LibSlack\Components\Blocks
 */
class Context extends Component
{
    /**
     * An array of image elements and text objects. Maximum number of items is 10
     * @var array
     */
    public $elements;
    /**
     * @var string
     */
    public $block_id;

    /**
     * Context constructor.
     * @param array $elements
     * @param string $block_id
     */
    public function __construct(array $elements, $block_id = '')
    {
        $this->require_fields = ['type', 'elements'];
        $this->type = Block::TYPE_CONTEXT;
        $this->elements = $elements;
        $this->block_id = $block_id;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}