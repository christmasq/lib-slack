<?php


namespace LibSlack\Components\Blocks;


use LibSlack\Components\Block;
use LibSlack\Components\Component;
use LibSlack\Components\Objects\PlainText;

/**
 * Class Section
 * @package LibSlack\Components\Blocks
 */
class Section extends Component
{
    /**
     * @var Text
     */
    public $text;
    /**
     * @var
     */
    public $block_id;
    /**
     * An array of text objects
     * @var Text[]
     */
    public $fields;
    /**
     * One of the available element objects.
     * @var Element
     */
    public $accessory;

    /**
     * Section constructor.
     * @param $text
     * @param array $params
     */
    public function __construct($text, $params = [])
    {
        $this->require_fields = ['type', 'text'];
        $this->type = Block::TYPE_SECTION;
        $this->text = (is_string($text)) ? new Text($text) : $text;

        // set optional fields
        $this->setOptionalFields($params);

        // removed unnecessary empty fields
        $this->checkFields();
    }
}