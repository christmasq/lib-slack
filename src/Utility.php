<?php


namespace LibSlack;


/**
 * Class Utility
 * @package LibSlack
 */
class Utility
{

    /**
     * change object to array
     * @param $object
     * @return mixed
     */
    public static function objectToArray($object)
    {
        return json_decode(json_encode($object), true);
    }
}