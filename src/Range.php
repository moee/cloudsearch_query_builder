<?php

namespace CloudSearchQueryBuilder;

class Range
    implements Token 
{
    use JoinTrait;
    use AttributeTrait;

    public function __construct($from, $to, $attributes=array())
    {
        $this->_from = $from;
        $this->_to = $to;
        $this->setAttributes($attributes);
    }

    public function __toString()
    {
        return sprintf(
            '(range%s %s%s,%s%s)',
            $this->getAttributesString(),
            $this->_from === null ? '{' : '[',
            $this->_from === null ? '' : $this->_from,
            $this->_to === null ? '' : $this->_to,
            $this->_to === null ? '}' : ']'
        );
    }
}
