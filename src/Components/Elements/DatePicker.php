<?php


namespace LibSlack\Components\Elements;


use LibSlack\Components\Component;
use LibSlack\Components\Element;
use LibSlack\Components\Objects\Dialog;

/**
 * Class DatePicker
 * @package LibSlack\Components\Elements
 */
class DatePicker extends Component
{
    /**
     * @var
     */
    public $action_id;
    /**
     * @var Dialog
     */
    public $confirm;

    /**
     * @var PlainText
     */
    public $placeholder;

    /**
     * @var string format: YYYY-MM-DD
     */
    public $initial_date;

    /**
     * DatePicker constructor.
     * @param $action_id
     * @param Dialog|null $confirm
     * @param string $initial_date
     */
    public function __construct($action_id, Dialog $confirm = null, $initial_date = '')
    {
        $this->require_fields = ['type', 'action_id'];
        $this->type = Element::TYPE_DATE_PICKER;
        $this->action_id = $action_id;
        $this->confirm = $confirm;
        $this->initial_date = $initial_date;

        // removed unnecessary empty fields
        $this->checkFields();
    }
}