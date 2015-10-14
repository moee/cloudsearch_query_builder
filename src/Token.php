<?php

namespace CloudSearchQueryBuilder;

interface Token
{
    function join($term, Token $token);
}
