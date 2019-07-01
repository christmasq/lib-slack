<?php


namespace LibSlack\Components\Elements;


use LibSlack\Components\Component;
use LibSlack\Components\Element;

/**
 * Class Image
 * @package LibSlack\Components\Elements
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
     * Image constructor.
     * @param string $image_url
     * @param string $alt_text
     */
    public function __construct(string $image_url, string $alt_text)
    {
        $this->require_fields = ['type', 'image_url', 'alt_text'];
        $this->type = Element::TYPE_IMAGE;
        $this->image_url = $image_url;
        $this->alt_text = $alt_text;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}
