<?php

namespace CloudSearchQueryBuilder;

trait AttributeTrait
{

    private $_attributes = [];

    private function setAttributes($attributes)
    {
        $attr = [];
        foreach ($attributes as $key=>$value) {
            $attr[] = sprintf("%s=%s", $key, $value);
        }
        $this->_attributes = implode(' ', $attr);
    }

    private function getAttributesString()
    {
        if(strlen($this->_attributes) == 0) {
            return '';
        }
       return sprintf(" %s", $this->_attributes);
    }
}
