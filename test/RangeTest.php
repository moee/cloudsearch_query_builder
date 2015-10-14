<?php

use CloudSearchQueryBuilder\Range;

class RangeTest
    extends PHPUnit_Framework_TestCase
{
    public function testClosedRange()
    {
        $sq = new Range(0, 50, array('field' => 'bewertungen'));
        $this->assertEquals(
            sprintf("(range field=bewertungen [0,50])"),
            strval($sq)
        );
    }

    public function testOpenRangeMax()
    {
        $sq = new Range(50, null, array('field' => 'bewertungen'));
        $this->assertEquals(
            sprintf("(range field=bewertungen [50,})"),
            strval($sq)
        );
    }

    public function testOpenRangeMin()
    {
        $sq = new Range(null, 50, array('field' => 'bewertungen'));
        $this->assertEquals(
            sprintf("(range field=bewertungen {,50])"),
            strval($sq)
        );
    }
}

