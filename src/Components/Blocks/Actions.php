<?php


namespace LibSlack\Components\Blocks;


use LibSlack\Components\Block;
use LibSlack\Components\Component;

/**
 * Class Actions
 * @package LibSlack\Components\Blocks
 */
class Actions extends Component
{
    /**
     * An array of interactive element objects - buttons, select menus, overflow menus, or date pickers
     * @var array
     */
    public $elements;
    /**
     * @var string
     */
    public $block_id;

    /**
     * Actions constructor.
     * @param array $elements
     * @param string $block_id
     */
    public function __construct(array $elements, $block_id = '')
    {
        $this->require_fields = ['type', 'elements'];
        $this->type = Block::TYPE_ACTIONS;
        $this->elements = $elements;
        $this->block_id = $block_id;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}