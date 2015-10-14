<?php

namespace CloudSearchQueryBuilder;

class Join
    implements Token 
{
    use JoinTrait;

    function __construct($type, Token $left, Token $right)
    {
        $this->_type = $type;
        $this->_left = $left;
        $this->_right = $right;
    }

    function __toString()
    {
        return sprintf(
            "(%s %s %s)",
            $this->_type,
            $this->_left,
            $this->_right
        );
    }
}
