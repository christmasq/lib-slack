<?php


namespace LibSlack\Components\Objects;


/**
 * Class Dialog
 *
 * reference url:
 * https://api.slack.com/reference/messaging/composition-objects#confirm
 *
 * @package LibSlack\Objects
 */
class Dialog
{
    /**
     * @var PlainText|string
     */
    public $title;
    /**
     * @var Text|string
     */
    public $text;
    /**
     * @var PlainText|string
     */
    public $confirm;
    /**
     * @var PlainText|string
     */
    public $deny;

    /**
     * Dialog constructor.
     * @param string|PlainText $title
     * @param string|Text $text
     * @param string|PlainText $confirm
     * @param string|PlainText $deny
     */
    public function __construct($title, $text, $confirm, $deny)
    {
        $this->title = (is_string($title)) ? new PlainText($title) : $title;
        $this->text = (is_string($text)) ? new Text($text) : $text;
        $this->confirm = (is_string($confirm)) ? new PlainText($confirm) : $confirm;
        $this->deny = (is_string($deny)) ? new PlainText($deny) : $deny;
    }
}
