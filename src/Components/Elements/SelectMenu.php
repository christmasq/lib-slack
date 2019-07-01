<?php


namespace LibSlack\Components\Elements;


use LibSlack\Components\Component;
use LibSlack\Components\Element;
use LibSlack\Components\Objects\PlainText;

/**
 * Class SelectMenu
 * @package LibSlack\Components\Elements
 */
class SelectMenu extends Component
{
    /**
     * @var PlainText
     */
    public $placeholder;
    /**
     * @var string
     */
    public $action_id;
    /**
     * @var
     */
    public $confirm;

    /**
     * @var Option[]
     */
    public $options;
    /**
     * @var Option[]
     */
    public $option_groups;
    /**
     * @var Option
     */
    public $initial_option;

    /**
     * for select menu with external data source
     * @var int
     */
    public $min_query_length;

    //
    /**
     * for select menu with user list
     * @var string
     */
    public $initial_user;

    /**
     * for select menu with conversations list
     * @var string
     */
    public $initial_conversation;

    /**
     * for select menu with channels list
     * @var string
     */
    public $initial_channel;

    /**
     * SelectMenu constructor.
     * @param string $type
     * @param $placeholder
     * @param string $action_id
     * @param array $params
     */
    public function __construct(string $type, $placeholder, string $action_id, array $params = [])
    {
        $this->setRequireFields($type);
        $this->type = $type;
        $this->placeholder = (is_string($placeholder)) ? new PlainText($placeholder) : $placeholder;
        $this->action_id = $action_id;

        // set optional fields
        $this->setOptionalFields($params);

        // removed unnecessary empty fields
        $this->checkFields();
    }


    /**
     * set require field by type
     * @param string $type
     */
    public function setRequireFields(string $type)
    {
        if (Element::TYPE_STATIC_SELECT == $type) {
            $this->require_fields = ['type', 'placeholder', 'action_id', 'options'];
        } else {
            $this->require_fields = ['type', 'placeholder', 'action_id'];
        }
    }
}
