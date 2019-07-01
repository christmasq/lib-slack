<?php


namespace LibSlack\Components;


/**
 * Create attachment component
 *
 * reference url:
 * https://api.slack.com/reference/messaging/attachments
 *
 * @package LibSlack
 */
class Attachment
{
    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';

    /**
     * contain all attachments
     * @var array
     */
    public $attachments = [];

    public $type_require_fields = [];

    /**
     * Attachment constructor.
     */
    public function __construct()
    {
        $this->type_require_fields = [
            static::TYPE_TEXT => ['text'],
            static::TYPE_IMAGE => ['title', 'image_url'],
        ];
    }

    /**
     * Create a text attachment
     * @param string $text
     * @param array $params
     * @return string
     */
    public function addText(string $text, array $params = [])
    {
        $params['type'] = static::TYPE_TEXT; // not field but use for checkFields method
        $params['text'] = $text;

        $this->addAttachment($params);
    }

    /**
     * Create an image attachment
     * @param string $title
     * @param string $image_url
     * @param array $params
     * @return string
     */
    public function addImage(string $title, string $image_url, array $params = [])
    {
        $params['type'] = static::TYPE_IMAGE; // not field but use for checkFields method
        $params['title'] = $title;
        $params['image_url'] = $image_url;

        $this->addAttachment($params);
    }

    /**
     * add attachment to attachment array
     * @param array $params
     */
    private function addAttachment(array $params)
    {
        // removed unnecessary empty fields
        $this->attachments[] = $this->checkFields($params);
    }

    /**
     * removed unnecessary empty fields
     * @param array $params
     * @return array
     */
    private function checkFields(array $params)
    {
        foreach ($params as $field => $value) {
            if (!in_array($field, $this->type_require_fields[$params['type']]) && !$value) {
                unset($params[$field]);
            }
        }
        return $params;
    }
}
