<?php


namespace LibSlack\Components\Objects;


/**
 * Class Text
 *
 * reference url:
 * https://api.slack.com/reference/messaging/composition-objects#text
 *
 * @package LibSlack\Objects
 */
class Text
{
    const TYPE_TEXT = 'mrkdwn';
    const TYPE_PLAINTEXT = 'plain_text';

    /**
     * @var string
     */
    public $type;
    /**
     * @var string
     */
    public $text = '';
    /**
     * Using a value of true will skip any preprocessing of this nature, although you can still include manual parsing strings
     * @var bool
     */
    public $verbatim = false;

    /**
     * Text constructor.
     * @param string $text
     * @param boolean $verbatim
     */
    public function __construct($text = '', $verbatim = false)
    {
        $this->type = self::TYPE_TEXT;
        $this->text = $text;
        $this->verbatim = $verbatim;
    }
}
