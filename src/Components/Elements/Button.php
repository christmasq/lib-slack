<?php


namespace LibSlack\Components\Elements;


use LibSlack\Components\Component;
use LibSlack\Components\Element;
use LibSlack\Components\Objects\PlainText;

/**
 * Class Button
 * @package LibSlack\Components\Elements
 */
class Button extends Component
{

    /**
     * @var PlainText
     */
    public $text;
    /**
     * @var
     */
    public $action_id;
    /**
     * @var
     */
    public $url;
    /**
     * @var
     */
    public $value;
    /**
     * @var
     */
    public $style;
    /**
     * @var
     */
    public $confirm;

    /**
     * Button constructor.
     * @param $text
     * @param $action_id
     * @param array $params
     */
    public function __construct($text, $action_id, $params = [])
    {
        $this->require_fields = ['type', 'text', 'action_id'];
        $this->type = Element::TYPE_BUTTON;
        $this->text = (is_string($text)) ? new PlainText($text) : $text;
        $this->action_id = $action_id;

        // set optional fields
        $this->setOptionalFields($params);

        // removed unnecessary empty fields
        $this->checkFields();
    }


}
