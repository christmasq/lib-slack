<?php


namespace LibSlack\Components\Blocks;


use LibSlack\Components\Block;
use LibSlack\Components\Component;
use LibSlack\Components\Objects\PlainText;

/**
 * Class Image
 * @package LibSlack\Components\Blocks
 */
class Image extends Component
{
    /**
     * @var string
     */
    public $image_url;
    /**
     * @var string
     */
    public $alt_text;
    /**
     * @var PlainText
     */
    public $title;
    /**
     * @var
     */
    public $block_id;

    /**
     * Image constructor.
     * @param string $image_url
     * @param string $alt_text
     * @param array $params
     */
    public function __construct(string $image_url, string $alt_text, array $params = [])
    {
        $this->require_fields = ['type', 'image_url', 'alt_text'];
        $this->type = Block::TYPE_IMAGE;
        $this->image_url = $image_url;
        $this->alt_text = $alt_text;
        $this->title = new PlainText($alt_text);

        // set optional fields
        $this->setOptionalFields($params);

        // removed unnecessary empty fields
        $this->checkFields();
    }
}