<?php

class Label
{
    private $labelName;

    private $keywords = array();

    private static $TYPE_OPTION = 1;

    private static $TYPE_MUST = 0;

    function __construct($label)
    {
        $label=(array)($label);
        $this->labelName = $label['name'];
        foreach ($label as $key => $value) {
            if ($key == "name") {
                continue;
            } else {
                if ($value == "*") {
                    $this->assignKeyword($key, Label::$TYPE_MUST);
                } else {
                    $this->assignKeyword($key, Label::$TYPE_OPTION);
                }
            }
        }
    }

    function assignKeyword($keyword, $type)
    {
        $this->keywords[$keyword] = $type;
    }
}