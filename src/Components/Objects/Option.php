<?php


namespace LibSlack\Components\Objects;


use LibSlack\Components\Component;

/**
 * Class Option
 *
 * reference url:
 * https://api.slack.com/reference/messaging/composition-objects#option
 *
 * @package LibSlack\Objects
 */
class Option extends Component
{
    /**
     * @var PlainText|string
     */
    public $text;
    /**
     * @var string|string
     */
    public $value;
    /**
     * only available in overflow menus
     * @var null
     */
    public $url;

    /**
     * Option constructor.
     * @param string|PlainText $text
     * @param string $value
     * @param null $url
     */
    public function __construct($text, string $value, $url = null)
    {
        $this->require_fields = ['text', 'value'];
        $this->text = (is_string($text)) ? new PlainText($text) : $text;
        $this->value = $value;
        $this->url = $url;
        $this->checkFields();
    }
}
