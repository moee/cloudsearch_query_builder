<?php

use CloudSearchQueryBuilder\Join;

class JoinTest
    extends PHPUnit_Framework_TestCase
{

    private function _getMock($class, $returnValue)
    {
        $m = $this->getMockBuilder(
            sprintf(
                '\CloudSearchQueryBuilder\%s',
                $class
            )
        )->disableOriginalConstructor()
            ->getMock();
        $m->method('__toString')->willReturn($returnValue);
        return $m;
    }

    public function testSimpleJoin()
    {
        $this->assertEquals(
            '(and (left) (right))',
            new Join(
                'and',
                $this->_getMock('Atom', '(left)'),
                $this->_getMock('Atom', '(right)')
            )
        );
    }

    public function testNestedJoin()
    {
        $this->assertEquals(
            '(and (and (left1) (left2)) (right))',
            new Join(
                'and',
                $this->_getMock('Join', '(and (left1) (left2))'),
                $this->_getMock('Atom', '(right)')
            )
        );
    }
}
