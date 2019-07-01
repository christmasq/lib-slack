<?php


namespace LibSlack\Components\Objects;


/**
 * Class OptionGroup
 *
 * reference url:
 * https://api.slack.com/reference/messaging/composition-objects#option-group
 *
 * @package LibSlack\Objects
 */
class OptionGroup
{
    /**
     * @var PlainText
     */
    public $label;
    /**
     * @var Option[]
     */
    public $options;

    /**
     * OptionGroup constructor.
     * @param string|PlainText $label
     * @param array $options
     */
    public function __construct($label, array $options)
    {
        $this->label = (is_string($label)) ? new PlainText($label) : $label;
        $this->options = $options;
    }
}
