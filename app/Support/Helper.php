<?php

namespace Msenl\Support;

/**
 * Class Helper
 * @package Msenl\Support
 */
class Helper
{
    /**
     * @param $objects
     * @param $arrayName
     * @return array
     */
    public static function checkedObject($objects, $arrayName)
    {
        $checked = [];
        if ($objects) {
            foreach ($objects as $object) {
                $checked[$arrayName . '[' . $object->id . ']'] = 'true';
            }
        }

        return $checked;
    }
}