<?php


namespace LibSlack\Components\Blocks;


use LibSlack\Components\Block;
use LibSlack\Components\Component;

/**
 * Class Divider
 * @package LibSlack\Components\Blocks
 */
class Divider extends Component
{
    /**
     * @var string
     */
    public $block_id;

    /**
     * Divider constructor.
     * @param string $block_id
     */
    public function __construct($block_id = '')
    {
        $this->require_fields = ['type'];
        $this->type = Block::TYPE_DIVIDER;
        $this->block_id = $block_id;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}