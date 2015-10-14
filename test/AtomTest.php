<?php

use CloudSearchQueryBuilder\Atom;

class AtomTest
    extends PHPUnit_Framework_TestCase
{
    public function testSimpleTerm()
    {
        $sq = new Atom('term', 'jack');
        $this->assertEquals(
            sprintf("(term '%s')", 'jack'),
            strval($sq)
        );
    }

    public function testJoinTerm()
    {
        $jack = new Atom('term', 'jack');
        $jim = new Atom('term', 'jim');
        $this->assertEquals(
            sprintf("(and (term 'jack') (term 'jim'))"),
            strval($jack->join('and', $jim))
        );
    }

    public function testSimpleTermWithAttributes()
    {
        $sq = new Atom('term', 'jack', array('field' => 'name'));
        $this->assertEquals(
            "(term field=name 'jack')",
            strval($sq)
        );
    }
}
