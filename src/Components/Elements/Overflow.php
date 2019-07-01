<?php


namespace LibSlack\Components\Elements;


use LibSlack\Components\Component;
use LibSlack\Components\Element;
use LibSlack\Components\Objects\Dialog;

/**
 * Class Overflow
 * @package LibSlack\Components\Elements
 */
class Overflow extends Component
{
    /**
     * @var
     */
    public $action_id;

    /**
     * @var
     */
    public $options;

    /**
     * @var Dialog
     */
    public $confirm;

    /**
     * Overflow constructor.
     * @param $action_id
     * @param $options
     * @param Dialog|null $confirm
     */
    public function __construct($action_id, $options, Dialog $confirm = null)
    {
        $this->require_fields = ['type', 'action_id', 'options'];
        $this->type = Element::TYPE_OVERFLOW;
        $this->action_id = $action_id;
        $this->options = $options;
        $this->confirm = $confirm;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}