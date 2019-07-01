<?php


namespace LibSlack\Components\Objects;


/**
 * Class PlainText
 * @package LibSlack\Objects
 */
class PlainText extends Text
{
    /**
     * @var bool
     */
    public $emoji = true;

    /**
     * PlainText constructor.
     * @param string $text
     * @param bool $emoji
     */
    public function __construct(string $text, $emoji = true)
    {
        // only used for Text
        unset($this->verbatim);

        $this->type = Text::TYPE_PLAINTEXT;
        $this->text = $text;
        $this->emoji = $emoji;
    }
}
