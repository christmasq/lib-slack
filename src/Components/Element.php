<?php


namespace LibSlack\Components;


use LibSlack\Components\Elements\Button;
use LibSlack\Components\Elements\DatePicker;
use LibSlack\Components\Elements\Image;
use LibSlack\Components\Elements\Overflow;
use LibSlack\Components\Elements\SelectMenu;
use LibSlack\Components\Objects\Dialog;
use LibSlack\Components\Objects\Text;
use LibSlack\Objects\Components\PlainText;

/**
 * Create element component
 *
 * reference url:
 * https://api.slack.com/reference/messaging/block-elements
 *
 * @package LibSlack
 */
class Element
{
    const TYPE_BUTTON = 'button';
    const TYPE_IMAGE = 'image';
    const TYPE_STATIC_SELECT = 'static_select';
    const TYPE_EXTERNAL_SELECT = 'external_select';
    const TYPE_USERS_SELECT = 'users_select';
    const TYPE_CONVERSATIONS_SELECT = 'conversations_select';
    const TYPE_CHANNELS_SELECT = 'channels_select';
    const TYPE_OVERFLOW = 'overflow';
    const TYPE_DATE_PICKER = 'date_picker';

    /**
     * contain all elements
     * @var array
     */
    public $elements = [];

    /**
     * create a button element
     * @param string|PlainText $text
     * @param string $action_id
     * @param array $params
     * @return void
     */
    public function addButton($text, $action_id = 'button', array $params = [])
    {
        $button = new Button($text, $action_id, $params);
        $this->addElement($button->toArray());
    }

    /**
     * create an image element
     * @param string $image_url
     * @param string $alt_text
     * @return void
     */
    public function addImage(string $image_url, string $alt_text)
    {
        $image = new Image($image_url, $alt_text);

        $this->addElement($image->toArray());
    }


    /**
     * Create a select menu element
     * (`static_select` type must have `options` field)
     * @param string $type
     * @param string|PlainText $placeholder
     * @param string $action_id
     * @param array $params
     * @return void
     */
    public function addSelectMenu(string $type, $placeholder, string $action_id, array $params = [])
    {
        $select_menu = new SelectMenu($type, $placeholder, $action_id, $params);

        $this->addElement($select_menu->toArray());
    }

    /**
     * Create an overflow element
     * @param string $action_id
     * @param array $options
     * @param Dialog|null $confirm
     * @return void
     */
    public function addOverflow(string $action_id, array $options, Dialog $confirm = null)
    {
        $overflow = new Overflow($action_id, $options, $confirm);

        $this->addElement($overflow->toArray());
    }

    /**
     * Create a date picker element
     * (Date picker elements can be used inside of `section` and `actions` blocks.)
     * @param string $action_id
     * @param Dialog|null $confirm
     * @param string $initial_date
     * @return void
     */
    public function addDatePicker(string $action_id, Dialog $confirm = null, string $initial_date = null)
    {
        $date_picker = new DatePicker($action_id, $confirm, $initial_date);

        $this->addElement($date_picker->toArray());
    }

    public function addText($text) {
        $text_object = new Text($text);
        $this->addElement($text_object);
    }

    /**
     * add element to element array
     * @param array $element
     */
    private function addElement(array $element)
    {
        // removed unnecessary empty fields
        $this->elements[] = $element;
    }
}