<?php

namespace CloudSearchQueryBuilder;

trait JoinTrait
{
    function join($type, Token $token)
    {
        return new Join($type, $this, $token);
    }
}
