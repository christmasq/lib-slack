<?php


namespace LibSlack\Components;


use LibSlack\Utility;

/**
 * Class Component
 * parent class of Attachment, Block, Element class
 *
 * @package LibSlack
 */
class Component
{
    /**
     * type of element or block
     * @var string
     */
    public $type = '';

    /**
     * require fields of element or block by type
     * @var array
     */
    protected $require_fields = [];

    /**
     * removed unnecessary empty fields
     * @return Component
     */
    protected function checkFields()
    {
        foreach ($this as $field => $value) {
            if (!in_array($field, $this->require_fields) && !$value) {
                unset($this->$field);
            }
        }
        return $this;
    }

    /**
     * set optional fields
     * @param array $params
     */
    protected function setOptionalFields(array $params)
    {
        foreach ($params as $field => $value) {
            $this->$field = $value;
        }
    }

    /**
     * change object to array
     * @return mixed
     */
    public function toArray()
    {
        return Utility::objectToArray($this);
    }
}
