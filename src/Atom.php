<?php

namespace CloudSearchQueryBuilder;

class Atom
    implements Token 
{
    private $_right; 
    private $_token; 
    private $_term; 

    use JoinTrait;
    use AttributeTrait;
   
    function __construct($token, $term, $attributes=array())
    {
        $this->_token = $token; 

        $this->_term = $term; 
        $this->setAttributes($attributes);
    }

    function getTerm()
    {
        return $this->_term;
    }

    function __toString()
    {
        return sprintf(
            "(%s%s '%s')",
            $this->_token,
            $this->getAttributesString(),
            addcslashes($this->_term, '\'\\')
        );
    }
}
