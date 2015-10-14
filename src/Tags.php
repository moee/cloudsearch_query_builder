<?php

namespace CloudSearchQueryBuilder;

class Tags
    implements Token 
{
    private $_tags = array(); 

    use JoinTrait;
    use AttributeTrait;
   
    function __construct($prototype)
    {
        if (!is_callable($prototype)) {
            throw new InvalidArgumentException('$prototype must be callable');
        }

        $this->_prototype = $prototype; 
    }

    function add($tag)
    {
        $this->_tags[md5($tag)] = $tag;
        return $this;
    }

    function remove($tag)
    {
        unset($this->_tags[md5($tag)]);
    }

    function isEmpty()
    {
        return sizeof($this->_tags) == 0;
    }

    function __toString()
    {
        $r = null;
        foreach ($this->_tags as $tag) {
            $q = call_user_func_array($this->_prototype, array($tag));
            $r = $r !== null ? $r->join('or', $q) : $q;
        }
        return $r === null ? "" : $r->__toString();
    }
}
